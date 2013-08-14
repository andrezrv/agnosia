<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the text domain for the Agnosia theme.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

function agnosia_language_setup() {
	
	agnosia_load_text_domain();
	
}


/* Add action hooks. */
add_action( 'after_setup_theme' , 'agnosia_language_setup' );

?>
