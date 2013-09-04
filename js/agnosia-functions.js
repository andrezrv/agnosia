/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles basic javascript functions for Agnosia theme.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */


function display_searchforms() {

	var searchforms;

	if ( jQuery('.searchform').length ) {

		searchforms = jQuery('.searchform');

		jQuery.each( searchforms , function( searchform ) { 

			if ( ( jQuery('body.wide').length || jQuery('body.large').length ) && jQuery(this).css( 'display' ) == 'none' ) {
				jQuery(this).css( 'display' , 'block' );
			}
			else if ( ( jQuery('body.medium').length || jQuery('body.small').length ) && jQuery(this).parent().find('.collapsed').length ) {
				jQuery(this).css( 'display' , 'none' );
			}

		} );

	}

}


function resize_navbars() {

	if ( jQuery( 'body.wide' ).length || jQuery( 'body.large' ).length ) {

		/* Resize top menu */
		if ( jQuery( '#top-menu' ).length ) {
			jQuery( '#top-menu' ).css( 'width', jQuery( '#top-navbar .navbar-inner > .container' ).width() );
			if ( jQuery( '#top-searchform-container' ).length ) {
				jQuery( '#top-menu' ).css( 'width', parseInt( jQuery( '#top-menu' ).css( 'width' ) ) - parseInt( jQuery( '#top-searchform-container' ).outerWidth( true ) ) );
			}
			if ( jQuery( '#top-brand-container > .brand' ).length ) {
				jQuery( '#top-menu' ).css( 'width', parseInt( jQuery( '#top-menu' ).css( 'width' ) ) - parseInt( jQuery( '#top-brand-container > .brand' ).css( 'width' ) ) );
			}
		}

		/* Resize branding menu */
		if ( jQuery( '#branding-menu' ).length ) {
			jQuery( '#branding-menu' ).css( 'width', jQuery( '#branding .navbar-inner > .container' ).width() );
			if ( jQuery( '#branding-searchform-container' ).length ) {
				jQuery( '#branding-menu' ).css( 'width', parseInt( jQuery( '#branding-menu' ).css( 'width' ) ) - parseInt( jQuery( '#branding-searchform-container' ).outerWidth( true ) ) );
			}
			if ( jQuery( '#branding .navbar-inner > .container .brand' ).length ) {
				jQuery( '#branding-menu' ).css( 'width', parseInt( jQuery( '#branding-menu' ).css( 'width' ) ) - parseInt( jQuery( '#branding .navbar-inner > .container .brand' ).css( 'width' ) ) );
			}
		}

		/* Resize header menu */
		if ( jQuery( '#header-menu' ).length ) {
			jQuery( '#header-menu' ).css( 'width', jQuery( '#header-navbar .navbar-inner > .container' ).width() );
			if ( jQuery( '#header-searchform-container' ).length ) {
				jQuery( '#header-menu' ).css( 'width', parseInt( jQuery( '#header-menu' ).css( 'width' ) ) - parseInt( jQuery( '#header-searchform-container' ).outerWidth( true ) ) );
			}
			if ( jQuery( '#header-brand-container > .brand' ).length ) {
				jQuery( '#header-menu' ).css( 'width', parseInt( jQuery( '#header-menu' ).css( 'width' ) ) - parseInt( jQuery( '#header-brand-container > .brand' ).css( 'width' ) ) );
			}
		}

	}

	else {

		/* Resize top menu */
		if ( jQuery( '#top-menu' ).length ) {
			jQuery( '#top-menu' ).css( 'width', '100%' );
		}

		/* Resize branding menu */
		if ( jQuery( '#branding-menu' ).length ) {
			jQuery( '#branding-menu' ).css( 'width', '100%' );
		}

		/* Resize header menu */
		if ( jQuery( '#header-menu' ).length ) {
			jQuery( '#header-menu' ).css( 'width', '100%' );
		}

	}

}



jQuery(document).ready(function($) {

	display_searchforms();
	resize_navbars();

	if ( $.trim( $( '.page .page-footer' ).html() ) == '' ) {
		$( '.page .page-footer' ).hide();
	}

	( function( $ ) {
	    $( document.body ).on( 'post-load', function () {
	    	if ( $('#page-navigation').length ) {
		        $('#page-navigation').hide();
		    }
	    } );
	} )( jQuery );

});

jQuery(window).resize(function() {
	display_searchforms();
	resize_navbars();
});