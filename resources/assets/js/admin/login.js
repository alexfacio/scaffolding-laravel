$(document).ready(function(){
    $('input[name="email"]').focus();
});

//Forget password
$(document).on('click', '.btn-forget', function (e) {
    e.preventDefault();
    $('.login-container').fadeOut('fast', function () {
        $('.reset-psw').fadeIn('slow');
    });
});

//Back login admin
$(document).on('click', '.back-login', function (e) {
    e.preventDefault();
    $('.reset-psw').fadeOut('fast', function () {
        $('.login-container').fadeIn('slow');
    });
});

//Enviar información de contacto
$(document).on('click', '.btn-login', function (e) {
    e.preventDefault();
    var me = $(this);
    login(me);
});

function login(me) {
    var me = me || '';
    if ($('#frm_login').validationEngine('validate')) {
        if (me != '' && me.hasClass('disabled')) return false;
        $.ajax({
            type: 'post',
            url: getUrlBase + 'login',
            dataType: 'json',
            data: $('#frm_login').serialize(),
            beforeSend: function (xhr) {
                $('.alert-ajax').html('');
                if (me != '') {
                    me.addClass('disabled');
                    me.append('<i class="fa fa-spin fa-pulse"></i>');
                }
            },
            error: function () {
                //me.removeClass('disabled');
                if (me != '') {
                    me.find('i.fa-pulse').remove();
                }
            },
        }).done(function (data) {
            if (me != '') {
                me.removeClass('disabled');
                me.find('i.fa-pulse').remove();
            }

            if (data.success == true) {
                setTimeout(function () {
                    window.location.href = data.redirectTo;
                }, 1200);
            }

            var msg = processStrJson(data.msg);
            if (msg != '') {
                if (data.success == false) {
                    msg = '<div class="alert alert-danger alert-dismissible fade in" role="alert">' +
                        '<h4 class="alert-heading h4"><i class="fa fa-exclamation-circle"></i>¡Alerta!</h4>' +
                        msg +
                        '</div>';
                } else {
                    msg = '<div class="alert alert-success alert-dismissible fade in" role="alert">' +
                        '<h4 class="alert-heading h4"><i class="fa fa-thumbs-o-up"></i>'+ msg +'</h4>' +
                        '</div>';
                }
                $('.alert-ajax').html(msg);
            }
        }).fail(function (http) {
            if (http.status == 401) {
                location.reload();
                return false;
            }
            if (me != '') {
                me.removeClass('disabled');
            }
            //me.find('i.fa-spinner').remove();
            msg_ups();
        });
    }
}