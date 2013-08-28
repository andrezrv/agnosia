/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles javascript functions for Agnosia Options in WordPress Dashboard.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */



 jQuery(document).ready( function() {

	var index;
	var checkboxes = jQuery( 'input[type="checkbox"]' );
	for ( index = 0; index < checkboxes.length; ++index ) {
		var id = jQuery(checkboxes[index]).attr('id');
		if( has_dependent( id ) ) {
			var source = 'input[id="' + id + '"]';
			var target = '.dependent[id="' + id + '[dependent]"]';
			toggle_form_element( source , target );
		}
	};

	jQuery('input[type="checkbox"]').click( function() {
		if( has_dependent( jQuery(this).attr( 'id' ) ) ) {
			var source = 'input[id="' + jQuery(this).attr( 'id' ) + '"]';
			var target = '.dependent[id="' + jQuery(this).attr( 'id' ) + '[dependent]"]';
			toggle_form_element( source , target );
		}
	});

	jQuery('#agnosia_options_navigation a').click( function(event) {

		event.preventDefault();
		location.hash = this.hash;

		/* Obtain element to show */
		var href = jQuery(this).attr('href');

		/* Remove class active from all elements */
		jQuery('#agnosia_options_navigation a.nav-tab-active').removeClass('nav-tab-active');
		/* Add class active to clicked element */
		jQuery(this).addClass('nav-tab-active');
		jQuery('.wrap > form').attr( 'action' , 'themes.php?page=agnosia-theme-options' + this.hash );

		jQuery('#agnosia_options_container fieldset').hide();

		jQuery(href).show();

		jQuery('body').scrollTop(0);

	});

	if ( window.location.hash ) {

		/* Remove class active from all elements */
		jQuery('#agnosia_options_navigation a').removeClass('nav-tab-active');
		/* Add class active to clicked element */
		jQuery( '#agnosia_options_navigation a[href="' + window.location.hash + '"]' ).addClass('nav-tab-active');

		jQuery('.wrap > form').attr( 'action' , 'themes.php?page=agnosia-theme-options' + window.location.hash );
		jQuery('#agnosia_options_container fieldset').hide();
		jQuery(window.location.hash).show();

		jQuery('body').scrollTop(0);
		jQuery( '#agnosia_options .updated.fade' ).fadeOut(5000);

	}

});



/* Including media uploader */

jQuery(document).ready(function($) {

  var _custom_media = true,
      _orig_send_attachment = wp.media.editor.send.attachment;

  $('input.insert[type="button"]').click(function(e) {
    var send_attachment_bkp = wp.media.editor.send.attachment;
    var button = $(this);
    var id = button.attr('id').replace('button_', '');
    alert(id);
    _custom_media = true;
    wp.media.editor.send.attachment = function(props, attachment){
      if ( _custom_media ) {
        $("input[id='"+id+"']").val(attachment.url);
      } else {
        return _orig_send_attachment.apply( this, [props, attachment] );
      };
    }

    wp.media.editor.open(button);
    return false;
  });

  $('.add_media').on('click', function(){
    _custom_media = false;
  });

});