<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the inclusion of metaboxes modules.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

/* Initialize admin metaboxes. */
function agnosia_initialize_admin_metaboxes_modules() {

	global $agnosia_admin_metaboxes_modules;

	$agnosia_admin_metaboxes_modules = array(
		'/inc/admin/agnosia-post-metaboxes.php',
	);

}


function agnosia_load_admin_metaboxes_modules() {

	global $agnosia_admin_metaboxes_modules;

	agnosia_load_modules( $agnosia_admin_metaboxes_modules );

}



/* Add action filters. */
add_action( 'agnosia_before_setup', 'agnosia_initialize_admin_metaboxes_modules' );
add_action( 'agnosia_before_setup', 'agnosia_load_admin_metaboxes_modules' );

?>