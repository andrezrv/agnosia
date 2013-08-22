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



jQuery(document).ready(function($) {

	display_searchforms();

	if ( $.trim( $( '.page .page-footer' ).html() ) == '' ) {
		$( '.page .page-footer' ).hide();
	}

	//$( '.page .page-footer' ).hide();

});

jQuery(window).resize(function() {
	display_searchforms();
});