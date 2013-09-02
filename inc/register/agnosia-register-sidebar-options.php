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
			'after' => '' ,
		) ,
	) );

	agnosia_register_option( 'show_left_sidebar_home' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'html' => array(
			'before' => '<div class="dependent" id="sidebar[show_left_sidebar][dependent]">',
			'label' => __( 'Show in blog index' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'show_left_sidebar_category' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'html' => array(
			'before' => '',
			'label' => __( 'Show in category index' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'show_left_sidebar_search' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'html' => array(
			'before' => '',
			'label' => __( 'Show in search results page' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'show_left_sidebar_tag' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'html' => array(
			'before' => '',
			'label' => __( 'Show in tag index' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'show_left_sidebar_404' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'html' => array(
			'before' => '',
			'label' => __( 'Show in error 404 page' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'show_left_sidebar_date' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'html' => array(
			'before' => '',
			'label' => __( 'Show in date index' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'show_left_sidebar_author' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'html' => array(
			'before' => '',
			'label' => __( 'Show in author index' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'show_left_sidebar_archive' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'html' => array(
			'before' => '',
			'label' => __( 'Show in archive index' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '</div></div>' ,
		),
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
			'after' => '' ,
		) ,
	) );

	agnosia_register_option( 'show_right_sidebar_home' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'html' => array(
			'before' => '<div class="dependent" id="sidebar[show_right_sidebar][dependent]">',
			'label' => __( 'Show in blog index' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'show_right_sidebar_category' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'html' => array(
			'before' => '',
			'label' => __( 'Show in category index' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'show_right_sidebar_search' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'html' => array(
			'before' => '',
			'label' => __( 'Show in search results page' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'show_right_sidebar_tag' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'html' => array(
			'before' => '',
			'label' => __( 'Show in tag index' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'show_right_sidebar_404' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'html' => array(
			'before' => '',
			'label' => __( 'Show in error 404 page' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'show_right_sidebar_date' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'html' => array(
			'before' => '',
			'label' => __( 'Show in date index' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'show_right_sidebar_author' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'html' => array(
			'before' => '',
			'label' => __( 'Show in author index' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'show_right_sidebar_archive' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'sidebar' , 
		'parent' => '' , 
		'html' => array(
			'before' => '',
			'label' => __( 'Show in archive index' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '</div></div>' ,
		),
	) );

endif;

?>