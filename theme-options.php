<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file initializes the custom Agnosia theme options page into the WordPress Dashboard.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

function agnosia_initialize_theme_options_modules() {

	global $agnosia_theme_options_modules;

	$agnosia_theme_options_modules = array(
		'/inc/admin/agnosia-admin-theme-options.php',
	);

}


function agnosia_load_theme_options_modules() {

	global $agnosia_theme_options_modules;

	agnosia_load_modules( $agnosia_theme_options_modules );

}



/* Add action filters. */
add_action( 'agnosia_before_setup', 'agnosia_initialize_theme_options_modules' );
add_action( 'agnosia_before_setup', 'agnosia_load_theme_options_modules' );

?>