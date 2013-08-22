<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles registration and initialization of Agnosia theme styles.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */


class agnosia_styles {

	var $styles = array();

	var $customized_bootstrap = array();

	function __construct() {

		do_action( 'agnosia_before_setup_styles' );

		agnosia_load_text_domain();

		do_action( 'agnosia_after_setup_styles' );

	}

}



/**
 * If you want to use your custom Bootstrap compilation, then:
 * 1) name your compilation folder like the slug of your custom style (i.e. 'starter-kit-styles');
 * 2) copy your compilation folder into the Bootstrap folder of your child theme (i.e. bootstrap/starter-kit-styles);
 * 3) set the parameter $custom_boostrap of agnosia_register_style() to true.
 * To customize Boostrap, we suggest to use @link http://fancyboot.designspebam.com/.
 */

function agnosia_register_style( $slug , $name , $custom_bootstrap = false ) {

	do_action( 'agnosia_before_register_style', $slug , $name , $custom_bootstrap );

	global $agnosia_styles;

	$styles = $agnosia_styles->styles;
	$styles[$slug] = $name;
	$customized_bootstrap[$slug] = $custom_bootstrap;

	$agnosia_styles->styles = $styles;
	$agnosia_styles->customized_bootstrap = $customized_bootstrap;

	do_action( 'agnosia_after_register_style', $slug , $name , $custom_bootstrap );

}



function agnosia_unregister_style( $slug ) {

	do_action( 'agnosia_before_unregister_style', $slug );

	global $agnosia_styles;

	$styles = $agnosia_styles->styles;

	if ( isset( $styles[$slug] ) ) : unset( $styles[$slug] ); endif;

	$agnosia_styles->styles = $styles;

	do_action( 'agnosia_after_unregister_style', $slug );

}



function agnosia_initialize_styles() {

	global $agnosia_styles;

	$agnosia_styles = new agnosia_styles();

}



/* Add action filters. */
add_action( 'agnosia_before_setup', 'agnosia_initialize_styles' );


?>