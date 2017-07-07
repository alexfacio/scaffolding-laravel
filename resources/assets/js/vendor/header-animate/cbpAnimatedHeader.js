/**
 * cbpAnimatedHeader.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */
if($(window).width() > 800 ){
	var cbpAnimatedHeader = (function() {

		var docElem = document.documentElement,
			header = document.querySelector( '.NavbarMain' ),
			didScroll = false,
			changeHeaderOn = 470;

		function init() {
			window.addEventListener( 'scroll', function( event ) {
				if( !didScroll ) {
					didScroll = true;
					setTimeout( scrollPage, 100 );
				}
			}, false );
		}

		function scrollPage() {
			var sy = scrollY();
			if ( sy >= changeHeaderOn ) {
				classie.add( header, 'NavbarMain-White' );
			}
			else {
				classie.remove( header, 'NavbarMain-White' );
			}
			didScroll = false;
		}

		function scrollY() {
			return window.pageYOffset || docElem.scrollTop;
		}

		init();

	})();
} else if($(window).width() > 767 ){
	var cbpAnimatedHeader = (function() {

		var docElem = document.documentElement,
			header = document.querySelector( '.NavbarMain' ),
			didScroll = false,
			changeHeaderOn = 575;

		function init() {
			window.addEventListener( 'scroll', function( event ) {
				if( !didScroll ) {
					didScroll = true;
					setTimeout( scrollPage, 100 );
				}
			}, false );
		}

		function scrollPage() {
			var sy = scrollY();
			if ( sy >= changeHeaderOn ) {
				classie.add( header, 'NavbarMain-White' );
			}
			else {
				classie.remove( header, 'NavbarMain-White' );
			}
			didScroll = false;
		}

		function scrollY() {
			return window.pageYOffset || docElem.scrollTop;
		}

		init();

	})();
}else {
	$('.navbar-default').addClass('NavbarMain-White');
}