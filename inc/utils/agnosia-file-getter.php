<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * It's not recommended to modify this file, even if you are using a child theme.
 * Keep in mind that any modifications to this file may be overwritten by future core updates.
 *
 * This file handles the necessary functions to get full paths or URLs for your theme, given a relative path to your parent or child theme.
 * If you're in a child theme, the functions look for a file relative to the child theme folder.
 * If the file doesn't exist into your child theme, the functions will look for it into the parent theme.
 * All the functions in this file are filterable.
 *
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

/* If file exists into child theme, returns URI of child theme file.
 * Else, returns URI of parent theme file. */
function agnosia_get_uri( $file ) {

	do_action( 'agnosia_before_get_uri' , $file );

	if ( file_exists( get_stylesheet_directory() . $file ) ) : 
		$file = get_stylesheet_directory_uri() . $file;
		$file = apply_filters( __FUNCTION__, $file );
		return $file;

	elseif ( file_exists( get_template_directory() . $file ) ) :
		$file = get_template_directory_uri() . $file;
		$file = apply_filters( __FUNCTION__, $file );
		return $file;

	else :
		do_action( 'agnosia_get_uri_failed' , $file );
		return false;

	endif;

}

/* If file exists into child theme, returns path of child theme file.
 * Else, returns path of parent theme file. */
function agnosia_get_path( $file ) {
	
	do_action( 'agnosia_before_get_path' , $file );

	if ( file_exists( $path = get_stylesheet_directory() . $file ) ) : 
		$path = apply_filters( __FUNCTION__, $path );
		return $path;

	elseif ( file_exists( $path = get_template_directory() . $file ) ) :
		$path = apply_filters( __FUNCTION__, $path );
		return $path;

	else :
		do_action( 'agnosia_get_path_failed' , $file );
		return false;

	endif;

}

?>