<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the registration of advanced post options.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

if ( !function_exists( 'get_editable_roles' ) ) :

	require_once ABSPATH . '/wp-admin/includes/user.php';

endif;

$roles = get_editable_roles();

$quantity = count( $roles );

$i = 1;

foreach ( $roles as $key => $value ) :

	$before = ( 1 == $i ) ? '<div class="misc-pub-section" style="padding: 0;"><h3>' . __( 'Advanced permissions for pages and posts' , 'agnosia' ) . '</h3>' : '';
	$after = ( $quantity == $i ) ? '</div>' : '';
	$default = 'Administrator' == $roles[$key]['name'] ? 'true' : 'false';

	if ( function_exists( 'agnosia_ac_post_additional_html' ) ) : 
	
		agnosia_register_option( 'content_enable_additional_html_for_' . $key , array( 
			'type' => 'checkbox' , 
			'value' => $default , 
			'values' => array( 'true' , 'false' ) , 
			'category' => 'content' , 
			'parent' => '' , 
			'html' => array(
				'before' => $before . '<h4>' . $roles[$key]['name'] . '</h4> ',
				'label' => '<strong>' . __( 'Add additional HTML' , 'agnosia' ) . '</strong>' ,
				'description' => '' ,
				'after' => '' ,
			),
		) );

		$custom_stylesheet_before = '';

	else :

		$custom_stylesheet_before = $before . '<h4>' . $roles[$key]['name'] . '</h4> ';

	endif;

	agnosia_register_option( 'content_enable_custom_stylesheet_for_' . $key , array( 
		'type' => 'checkbox' , 
		'value' => $default , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'content' , 
		'parent' => '' , 
		'html' => array(
			'before' => $custom_stylesheet_before,
			'label' => '<strong>' . __( 'Set custom stylesheet' , 'agnosia' ) . '</strong>' ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'content_enable_featured_image_position_for_' . $key , array( 
		'type' => 'checkbox' , 
		'value' => $default , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'content' , 
		'parent' => '' , 
		'html' => array(
			'before' => '',
			'label' => '<strong>' . __( 'Set featured image position' , 'agnosia' ) . '</strong>' ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'content_enable_override_default_settings_for_' . $key , array( 
		'type' => 'checkbox' , 
		'value' => $default , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'content' , 
		'parent' => '' , 
		'html' => array(
			'before' => '',
			'label' => '<strong>' . __( 'Override default theme settings' , 'agnosia' ) . '</strong>' ,
			'description' => '' ,
			'after' => $after ,
		),
	) );

	$i++;

endforeach;

?>