<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the inclusion of all the other files that are required for the Agnosia theme to work properly.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */



/**
 * Load file getter to ensure child themes compatibility.
 */

function agnosia_initialize_file_getter() {

	require_once get_template_directory() . '/inc/utils/agnosia-file-getter.php';

}



/**
 * Load helpers separatedly in order to use some helper functions before loading the main modules.
 */

function agnosia_initialize_helpers() {

	include_once agnosia_get_path( '/inc/utils/agnosia-helpers.php' );

}



/**
 * List all the relative paths of the modules that will be used within the theme. 
 */

function agnosia_initialize_main_modules() {

	global $agnosia_main_modules;

	$agnosia_main_modules = array(
		
		'/theme-options.php', /* Load theme configuration page. */	
		'/inc/admin/agnosia-admin-metaboxes.php', /* Load metaboxes for posts and pages. */	
		'/inc/support/agnosia-theme-support.php', /* Add support for custom headers, backgrounds, post formats, post types, etc. */	
		'/inc/support/agnosia-custom-theme-support.php', /* Additional custom theme support. */	### CUSTOMIZABLE FILE! ###
		'/inc/classes/agnosia-styles.class.php', /* Initiate global variable to store styles's settings into. */ 
		'/inc/register/agnosia-register-styles.php', /* Register all styles to be used through the theme. */
		'/inc/register/agnosia-register-custom-styles.php', /* Register custom styles or ungister previous ones. */	### CUSTOMIZABLE FILE! ###
		'/inc/classes/agnosia-options.class.php', /* Handle Agnosia theme settings. */
		'/inc/register/agnosia-register-options.php', /* Register all options to be used through the theme. */	
		'/inc/register/agnosia-register-custom-options.php', /* Register your custom options or unregister previous ones. */ ### CUSTOMIZABLE FILE! ###
		'/inc/permissions/agnosia-permissions.php', /* Load theme permissions. */
		'/inc/permissions/agnosia-custom-permissions.php', /* Handle your custom theme permissions. */ ### CUSTOMIZABLE FILE! ###
		'/inc/register/agnosia-register-menus.php', /* Register navigation menus. */
		'/inc/register/agnosia-register-custom-menus.php', /* Register your custom navigation menus. */ ### CUSTOMIZABLE FILE! ###
		'/inc/register/agnosia-register-scripts.php', /* Register JS scripts. */
		'/inc/register/agnosia-register-custom-scripts.php', /* Register your custom JS scripts. */ ### CUSTOMIZABLE FILE! ###
		'/inc/register/agnosia-register-stylesheets.php', /* Register CSS files. */
		'/inc/register/agnosia-register-custom-stylesheets.php', /* Register your custom CSS files. */ ### CUSTOMIZABLE FILE! ###
		'/inc/filters/agnosia-filters.php', /* Load HTML and hook filter functions for native WordPress functions. */
		'/inc/filters/agnosia-custom-filters.php', /* handle your own HTML and hook filter functions for native WordPress functions. */ ### CUSTOMIZABLE FILE! ###
		'/inc/outputs/agnosia-outputs.php', /* Load HTML output functions. */
		'/inc/outputs/agnosia-custom-outputs.php', /* Handle your own HTML output functions. */ ### CUSTOMIZABLE FILE! ###
		'/inc/evaluation/agnosia-evaluations.php', /* Load validation functions. */
		'/inc/evaluation/agnosia-custom-evaluations.php', /* Handle your own validation functions. */ ### CUSTOMIZABLE FILE! ###
		'/inc/support/agnosia-add-support.php', /* Add dynamic support depending on previously added features. */
		'/inc/support/agnosia-add-custom-support.php', /* Handle your own dynamic support depending on previously added features. */ ### CUSTOMIZABLE FILE! ###
		'/inc/register/agnosia-register-sidebars.php', /* Register sidebars. */
		'/inc/register/agnosia-register-custom-sidebars.php', /* Register your custom sidebars. */ ### CUSTOMIZABLE FILE! ###
		'/inc/language/agnosia-language-setup.php', /* Load Agnosia theme's text domain. */
		'/inc/language/agnosia-custom-language-setup.php', /* Handle your custom text domain. */ ### CUSTOMIZABLE FILE! ###
		'/inc/classes/agnosia-setup.class.php', /* Load theme configuration. */

	);

}



/**
 * Load all the modules to be used within the theme.
 */

function agnosia_load_main_modules() {

	global $agnosia_main_modules;

	agnosia_load_modules( $agnosia_main_modules );

}



/**
 * Add action hooks.
 */

add_action( 'after_setup_theme', 'agnosia_initialize_file_getter' );
add_action( 'after_setup_theme', 'agnosia_initialize_helpers' );
add_action( 'after_setup_theme', 'agnosia_initialize_main_modules' );
add_action( 'after_setup_theme', 'agnosia_load_main_modules' );

?>