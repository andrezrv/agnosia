/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file fixes the navigation bar to the top of the site.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

 function fix_navbar( navbar , fixing_point ) {

	y = jQuery(this).scrollTop();

	if(y > fixing_point) {
		jQuery(navbar).addClass('fixed');
		jQuery(navbar).css( 'top' , jQuery('html').css( 'margin-top' ) );
		jQuery(navbar).css( 'width' , jQuery('#header').css( 'width' ) );
		jQuery('#header').css( 'margin-top' , jQuery(navbar).outerHeight() );
	}
	else {
		jQuery(navbar).removeClass('fixed');
		jQuery(navbar).css( 'top' , '' );
		jQuery(navbar).css( 'width' , 'auto' );
		jQuery('#header').css( 'margin-top' , '' );
	}

}

var navbar;
var fixing_point;
var top;
var y;

jQuery(document).ready(function() {

	setTimeout( function() {

		navbar = jQuery('#header .fix-to-top:first');
		fixing_point = jQuery(navbar).offset().top - jQuery('#wpadminbar').outerHeight();

		if ( jQuery('#header .fix-to-top').length ) {
			fix_navbar( navbar , fixing_point );
		}

		jQuery(window).resize(function() {
			fix_navbar( navbar , fixing_point );
		});


		jQuery(window).scroll(function(event) {
			fix_navbar( navbar , fixing_point );
		});

	} , 500 )
});