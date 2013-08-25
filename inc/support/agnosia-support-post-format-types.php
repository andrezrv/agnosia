<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles support for format types.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

function agnosia_initialize_post_formats() {

	global $post_formats;
	$post_formats = array();

	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );

	foreach ( $formats as $format ) :

		if ( agnosia_evaluate( 'content_enable_post_' . $format ) ) : $post_formats[] = $format ; endif ;

	endforeach;

}


function agnosia_support_post_formats() {

	global $post_formats;

	if ( is_array( $post_formats ) and !empty( $post_formats ) and !current_theme_supports( 'post-formats' )  ) : 

		add_theme_support( 'post-formats', $post_formats ) ;

	endif;

}


function agnosia_support_post_formats_pages() {

	global $post_formats;

	if ( is_array( $post_formats ) 
		and !empty( $post_formats ) 
		and agnosia_evaluate( 'content_enable_post_format_pages' ) 
		and !current_theme_supports( 'agnosia-post-formats-pages' ) 
		and !post_type_supports( 'page', 'post-formats' ) 
	) :

		add_post_type_support( 'page', 'post-formats' );

	endif;

}


/* Add post formats support to custom post types. */
/* This doesn't provide support for custom post types, but adds support 
** for post formats to already existent post types. */

function agnosia_support_post_formats_custom_post_types() {

	global $post_formats;

	$custom_post_types = get_post_types( array( 'public' => true , '_builtin' => false ) );

	if ( is_array( $post_formats ) 
		and !empty( $post_formats ) 
		and !empty( $custom_post_types )
		and agnosia_evaluate( 'content_enable_post_format_custom_post_types' ) 
		and !current_theme_supports( 'agnosia-post-formats-custom-post-types' )
	) :

		foreach ( $custom_post_types as $key => $value ) :

			if ( !post_type_support( $key , 'post-formats' ) ) :
				add_post_type_support( $key , 'post-formats' );
			endif;

		endforeach;

	endif;

}

add_action( 'init' , 'agnosia_initialize_post_formats' );
add_action( 'init' , 'agnosia_support_post_formats' );
add_action( 'init' , 'agnosia_support_post_formats_pages' );
add_action( 'init' , 'agnosia_support_post_formats_custom_post_types' );


?>