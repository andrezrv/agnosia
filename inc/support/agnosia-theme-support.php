<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the default theme support for the Agnosia theme.
 * You can add or remove theme support features via child themes.
 * For further information, visit @link http://codex.wordpress.org/Function_Reference/add_theme_support.
 * 
 * @package Agnosia
 */



function agnosia_wordpress_required_support() {

	add_theme_support( 'automatic-feed-links' ); // Adds RSS links to <head> section

}



/* Add theme support for certain WordPress features */

function agnosia_initialize_wordpress_theme_support() {

	global $agnosia_wordpress_theme_support;

	$agnosia_wordpress_theme_support = array(

		'post-thumbnails' => true, // Adds support for featured images - support by default
		'custom-background' => false,
		'custom-header' => array( 'default-text-color' => '000000' ),

	);

}



function agnosia_add_wordpress_theme_support() {

	global $agnosia_wordpress_theme_support;

	agnosia_add_theme_support( $agnosia_wordpress_theme_support );

}



/* Add theme support for Agnosia features */

function agnosia_initialize_custom_theme_support() {

	global $agnosia_custom_theme_support;

	$agnosia_custom_theme_support = array(

		'agnosia-branding' => false , /* Allows to manage a branding section as the main element of the site header. */
		'agnosia-header-navbar' => false , /* Allows to manage an additional navigation bar, by default as the last element of the site header. */
		'agnosia-right-sidebar' => false , /* Adds options to manage a traditional sidebar-like navigation bar, by default to the right of the content */

		/**
		 * WARNING: Please don't uncomment any of the following lines, 
		 * they're here only as documentation and for testing purposes.
		 * You can add support for the following functions via child themes.
		 */

		'agnosia-post-formats' => true , /* Allows to manage and support post formats through the Agnosia Options admin page. */
		//'agnosia-post-formats-custom-post-types' => false , /* Allows to manage and support post formats for custom post types through the Agnosia Options page. */
		//'agnosia-post-formats-pages' => false , /* Allows to manage and support post formats for pages through the Agnosia Options page. */
		//'agnosia-widget-shortcodes' => false , /* Adds shortcode parsing in widgets. */
		//'agnosia-excerpt-shortcodes' => false , /* Adds shortcode parsing in excerpts. */
		//'agnosia-term-shortcodes' => false , /* Adds shortcode parsing in taxonomies descriptions. */
		//'agnosia-top-navbar' => false , /* Allows to manage an additional navigation bar, by default in the top of the site. */
		//'agnosia-secondary-branding' => false , /* Adds options to manage a secondary brand into branding template. */
		//'agnosia-additional-site-description' => false , /* Allows to show the site description in a separate template, by default after the site header. */
		//'agnosia-left-sidebar' => false , /* Adds options to manage an additional navigation bar, by default to the left of the content. */
		//'agnosia-footer-columns-selection' => false , /* Allows to select the number of columns that will be shown in the site footer. */
		//'agnosia-page-excerpts' => false , /* Adds the post excerpt metabox into pages. */
		//'agnosia-dynamic-wrapper' => false, /* Adds the option to select the type of wrapping of your page. Not recommended unless you want to write A LOT of CSS for your theme. */

	);

}


function agnosia_add_custom_theme_support() {

	global $agnosia_custom_theme_support;

	agnosia_add_theme_support( $agnosia_custom_theme_support );

}



/* Add action filters. */
add_action( 'agnosia_before_setup', 'agnosia_wordpress_required_support' );
add_action( 'agnosia_before_setup', 'agnosia_initialize_wordpress_theme_support' );
add_action( 'agnosia_before_setup', 'agnosia_initialize_custom_theme_support' );
add_action( 'agnosia_before_setup', 'agnosia_add_wordpress_theme_support' );
add_action( 'agnosia_before_setup', 'agnosia_add_custom_theme_support' );

?>