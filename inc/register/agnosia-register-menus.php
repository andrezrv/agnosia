<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the registration custom menus.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

function agnosia_initialize_nav_menus() {

	if ( function_exists('register_nav_menus') ) :

		if ( current_theme_supports( 'agnosia-top-navbar' ) ) :

			register_nav_menus( array( 
				'top-menu' => __( 'Top Menu' , 'agnosia' ) ,
			) );

		endif;

		if ( current_theme_supports( 'agnosia-branding' ) ) :

			register_nav_menus( array( 
				'branding-menu' => __( 'Branding Menu' , 'agnosia' ) ,
			) );

		endif;

		if ( current_theme_supports( 'agnosia-header-navbar' ) ) :

			register_nav_menus( array( 
				'header-menu' => __( 'Header Menu' , 'agnosia' ) ,
			) );

		endif;

	endif;

}


/* Add action hooks. */
add_action( 'agnosia_after_setup', 'agnosia_initialize_nav_menus' );
add_action( 'after_theme_setup', 'agnosia_initialize_nav_menus' );

?>