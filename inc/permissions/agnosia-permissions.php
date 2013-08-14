<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles permissions over the Agnosia theme features.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

/* Load advanced permissions for pages and posts. */
function agnosia_initialize_permissions_modules() {

	global $agnosia_permissions_modules;

	$agnosia_permissions_modules = array(
		'/inc/permissions/agnosia-advanced-post-and-pages-permissions.php',
	);

}


function agnosia_load_permissions_modules() {

	global $agnosia_permissions_modules;

	agnosia_load_modules( $agnosia_permissions_modules );

}



/* Add action filters. */
add_action( 'agnosia_after_setup', 'agnosia_initialize_permissions_modules' );
add_action( 'agnosia_after_setup', 'agnosia_load_permissions_modules' );

?>