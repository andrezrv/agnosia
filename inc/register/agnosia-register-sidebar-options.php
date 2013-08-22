<?php 

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the registration of sidebars options.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

if ( current_theme_supports( 'agnosia-left-sidebar' ) ) :

	agnosia_register_option( 'show_left_sidebar' , array( 
		'type' => 'checkbox' , 
		'value' => 'false' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'position' => 0 ,
		'html' => array(
			'before' => '<div class="misc-pub-section" style="padding:0;">' ,
			'label' => '<strong>' . __( 'Show left sidebar' , 'agnosia' ) . '</strong>' ,
			'description' => '' ,
			'after' => '</div>' ,
		) ,
	) );

endif;

if ( current_theme_supports( 'agnosia-right-sidebar' ) ) :

	agnosia_register_option( 'show_right_sidebar' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'position' => 0 ,
		'html' => array(
			'before' => '<div class="misc-pub-section" style="padding:0;">' ,
			'label' => '<strong>' . __( 'Show right sidebar' , 'agnosia' ) . '</strong>' ,
			'description' => '' ,
			'after' => '</div>' ,
		) ,
	) );

endif;

?>