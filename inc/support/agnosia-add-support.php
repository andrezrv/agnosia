<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles dynamic theme support of Agnosia theme.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

/* Check and add all the support modules to be used within the theme. */

function agnosia_initialize_supported_dynamic_modules() {

	global $agnosia_supported_dynamic_modules;

	$agnosia_supported_dynamic_modules = array();

	/* Parse shortcodes from excerpts. */
	if ( current_theme_supports( 'agnosia-excerpt-shortcodes' ) ) :
		$agnosia_supported_dynamic_modules[] = '/inc/support/agnosia-support-excerpt-shortcodes.php';
	endif;

	/* Parse shortcodes from widgets. */
	if ( current_theme_supports( 'agnosia-widget-shortcodes' ) ) :
		$agnosia_supported_dynamic_modules[] = '/inc/support/agnosia-support-widget-shortcodes.php';
	endif;

	/* Parse shortcodes from terms. */
	if ( current_theme_supports( 'agnosia-term-shortcodes' ) ) :
		$agnosia_supported_dynamic_modules[] = '/inc/support/agnosia-support-term-shortcodes.php';
	endif;

	/* Parse shortcodes from excerpts. */
	if ( current_theme_supports( 'agnosia-excerpt-shortcodes' ) ) :
		$agnosia_supported_dynamic_modules[] = '/inc/support/agnosia-support-excerpt-shortcodes.php';
	endif;

	/* Show metabox for excerpt into page editor. */
	if ( current_theme_supports( 'agnosia-page-excerpts' ) ) :
		$agnosia_supported_dynamic_modules[] = '/inc/support/agnosia-support-page-excerpts.php';
	endif;

	/* Add options to manage post formats. */
	if ( current_theme_supports( 'agnosia-post-formats' ) ) :
		$agnosia_supported_dynamic_modules[] = '/inc/support/agnosia-support-post-format-types.php';
	endif;

}



function agnosia_load_supported_dynamic_modules() {

	global $agnosia_supported_dynamic_modules;

	agnosia_load_modules( $agnosia_supported_dynamic_modules );

}



/* Add action hooks. */
add_action( 'agnosia_after_setup', 'agnosia_initialize_supported_dynamic_modules' );
add_action( 'agnosia_after_setup', 'agnosia_load_supported_dynamic_modules' );

?>
