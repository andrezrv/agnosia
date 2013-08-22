/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles javascript functions in WordPress Dashboard.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */



function toggle_form_element( toggler , dependent , evaluate ) {

	if ( !evaluate || evaluate == 'show' ) {

		if ( !jQuery(toggler).is(':checked') ) {
			jQuery(dependent).addClass('disabled');
		}

		else {
			jQuery(dependent).removeClass('disabled');
		}

	}

	else if ( evaluate == 'hide' ) {

		if ( jQuery(toggler).is(':checked') ) {
			jQuery(dependent).addClass('disabled');
		}

		else {
			jQuery(dependent).removeClass('disabled');
		}

	}

	if ( jQuery(dependent).hasClass('disabled') ) {
		jQuery(dependent).find( 'input , select' ).attr( 'disabled' , true );
	}
	else {
		jQuery(dependent).find( 'input , select' ).attr( 'disabled' , false );
	}

}



function has_dependent( element ) {

	if( jQuery( '.dependent[id="' + element + '[dependent]"]' ).length ) return true;
	return false;

}

function load_dynamic_settings_with_format( format ) {

	var post_type = 'post';
	if(jQuery('#post_type').length) post_type = jQuery('#post_type').attr('value') ;

	var post_ID = 0;
	if(jQuery('#post_ID').length) post_ID = jQuery('#post_ID').attr('value') ;

	var post_format = format ;

	var url = jQuery('#agnosia-ajax-url').attr('href');
	
	var home_path = jQuery('#agnosia-home-path').attr('href');

	jQuery.ajax({
		type: 'POST' ,
		url: url ,
		data: { post_type : post_type , post_ID : post_ID , post_format : post_format , home_path : home_path }
	}).done( function( html ) {
		jQuery("#agnosia-settings-container").html(html);
	});

}



jQuery(document).ready(function() {

	if( jQuery('form#post').length ) {

		if( jQuery('#formatdiv').length ) {

			load_dynamic_settings_with_format( jQuery('input.post-format:checked').attr('value') );

			jQuery('input.post-format').click( function() {

				load_dynamic_settings_with_format( jQuery(this).attr('value') );

			} );

		}

		else load_dynamic_settings_with_format( 'standard' );

	}

	jQuery('ul.category-tabs li a').click( function(event) {
		event.preventDefault();
		var id = jQuery(this).parent().parent().parent().attr('id');
	    jQuery('#' + id + ' .tabs-panel').addClass('hidden');
	    jQuery('#' + id + ' .tabs').removeClass('tabs');
	    jQuery(jQuery(this).attr('href')).removeClass('hidden');
	    jQuery(this).parent().addClass('tabs');
	});

});



