<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the Agnosia theme framework functions.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */


/* Set content width. */
require_once get_template_directory() . '/inc/support/agnosia-support-content-width.php';

/* Initialize Agnosia theme */

function agnosia_init() {
	require_once get_template_directory() . '/inc/agnosia-load.php';
}



/* Add action filters. */

add_action( 'agnosia_init', 'agnosia_init' );
add_action( 'agnosia_after_init', 'agnosia_init' );


/* Execute actions. */

do_action( 'agnosia_init' );
do_action( 'agnosia_after_init' );

?>
