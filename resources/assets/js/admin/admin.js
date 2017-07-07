//Get UrlBase
var getUrlBase = $('.url_base').data("url") + '/' + $('.url_base').data("url_sindi");

//To instantiate FastClick on the body
$(document).ready(function() {
    if ('addEventListener' in document) {
        document.addEventListener('DOMContentLoaded', function() {
            FastClick.attach(document.body);
        }, false);
    }
});

//Process a json chain to alerts
function processStrJson(str, htmlPre, htmlPos) {
    if (str == '') return '';

    var htmlPre = htmlPre || '<p>';
    var htmlPos = htmlPos || '</p>';

    if (typeof str == 'string') {
        return htmlPre + str + htmlPos;
    } else if ($.isArray(str) || typeof str == 'object') {
        var salida = '';
        $.each(str, function(index, obj) {
            if ($.isArray(obj)) {
                $.each(obj, function(key, value) {
                    if (value != '') {
                        salida += htmlPre + value + htmlPos;
                    }
                });
            } else {
                salida += htmlPre + obj + htmlPos;
            }
        });
        return salida;
    }
    return '';
}

function msg_ups() {
    $.alert({
        title: '¡Ups!',
        content: '<span style="text-align:center;"><p>Inténtalo nuevamente</p></span>',
        //autoClose: 'confirm|5000',
        backgroundDismiss: false,
        buttons: {
            continuar: {}
        },
    });
}

//Menu Button
$(document).on('click', '.btn-menuside', function(e) {
    e.preventDefault();
    $('.content').toggleClass('active');
});

//Close menu if mouseleave this menu
$(document).on('mouseleave', '.nav-container', function() {
    $('.content').toggleClass('active');
});

function contentHeight() {
    var window_height = $(window).height();

    var sidebar_height = $('.nav-container').height();
    $(".content, .sidebar").css('min-height', window_height);

    //Menu lateral
    if (typeof $.fn.slimScroll != 'undefined') {
        //Destroy if it exists
        $(".nav-container").slimScroll({
            destroy: true
        }).height("auto");
        //Add slimscroll
        $('.nav-container').slimscroll({
            height: (window_height - $('.header-admin').height()) + "px",
            color: "rgba(0,0,0,0.2)",
            size: "3px"
        });
    }
    var header_actions = $('.btn-menuside').width() + $('.logo').width() + $('.slash-container').width() + 189;
    var breadcumWith = $('.header-admin').width() - header_actions;

    $('.breadcums-header').width(breadcumWith);
    var eachElement = 0;
    $('.protect-items .item').each(function(index) {
        eachElement = eachElement + $(this).width() + 20;
    });
    $('.protect-items').width(eachElement);
    //Breadcums Header
    if (typeof $.fn.slimScroll != 'undefined') {
        //Destroy if it exists
        $(".breadcums-container").slimScroll({
            destroy: true
        }).width("auto");
        //Add slimscroll
        $('.breadcums-container').slimscroll({
            axis: 'x',
            width: (breadcumWith) + "px",
            height: "49px",
            color: "rgba(0,0,0,0.2)",
            size: "3px",
            distance: "1px"
        });
    }


    var eachElementLi = 0;
    $('ol.breadcrumb .item').each(function(index) {
        eachElementLi = eachElementLi + $(this).width();
    });
    $('ol.breadcrumb').width(eachElementLi);
    //Breadcums moviles
    if (typeof $.fn.slimScroll != 'undefined') {
        //Destroy if it exists
        $(".protect-items-li").slimScroll({
            destroy: true
        }).width("auto");
        //Add slimscroll
        $('.protect-items-li').slimscroll({
            axis: 'x',
            width: ($('.header-admin').width() - 15) + "px",
            height: "49px",
            color: "rgba(0,0,0,0.2)",
            size: "3px",
            distance: "1px"
        });
    }
}
contentHeight();

$(window).on('orientationchange resize', function() {
    contentHeight();
});

//Activate Tooltip
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
})

//Pace Loading
$(document).ajaxStart(function() {
    Pace.restart();
});