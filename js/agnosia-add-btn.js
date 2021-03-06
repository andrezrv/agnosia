/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file adds support for Bootstrap buttons.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */
function add_btn_class() {
	jQuery( 'input[type="submit"], button' ).addClass( 'btn' );
}

jQuery( document ).ready( function() {
	add_btn_class();
} );