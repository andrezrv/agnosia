<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the registration of Agnosia theme options.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

function agnosia_initialize_options_modules() {

	global $agnosia_options_modules;

	$agnosia_options_modules = array(
		'/inc/register/agnosia-register-general-options.php',
		'/inc/register/agnosia-register-sidebar-options.php',
		'/inc/register/agnosia-register-header-options.php',
		'/inc/register/agnosia-register-content-options.php',
		'/inc/register/agnosia-register-footer-options.php',
	);

}



function agnosia_load_options_modules() {

	global $agnosia_options_modules;

	agnosia_load_modules( $agnosia_options_modules );

}



/* Add action filters. */
add_action( 'agnosia_before_setup', 'agnosia_initialize_options_modules' );
add_action( 'agnosia_before_setup', 'agnosia_load_options_modules' );

?>