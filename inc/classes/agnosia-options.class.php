<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles registration and initialization of Agnosia theme options.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

class agnosia_options {

	var $options = array();

	function __construct() {

		do_action( 'agnosia_before_setup_options' );
		do_action( 'agnosia_setup_options' );
		do_action( 'agnosia_after_setup_options' );

	}

}



function agnosia_register_option( $name , $values = array() ) {

	do_action( 'agnosia_before_register_option', $name , $values );

	global $agnosia_options;

	$options = $agnosia_options->options;
	$options[$name] = $values;

	$agnosia_options->options = $options;

	do_action( 'agnosia_after_register_option', $name , $values );

}



function agnosia_unregister_option( $name ) {

	do_action( 'agnosia_before_unregister_option', $name );

	global $agnosia_options;

	$options = $agnosia_options->options;

	if ( isset( $options[$name] ) ) : unset( $options[$name] ); endif;

	$agnosia_options->options = $options;

	do_action( 'agnosia_after_unregister_option', $name );

}



function agnosia_reset_option_default( $name , $value ) {

	do_action( 'agnosia_before_unregister_option', $name );

	global $agnosia_options;

	$options = $agnosia_options->options;

	if ( isset( $options[$name] ) ) : $options[$name]['value'] = $value; endif;

	$agnosia_options->options = $options;

	do_action( 'agnosia_after_unregister_option', $name );

}



function agnosia_option_exists( $option ) {

	global $agnosia_options;

	if ( isset( $agnosia_options['options'][$option] ) ) : return true;
	endif;

	return false;

}



function agnosia_load_options() {

	global $agnosia_options;
	
	$agnosia_options = new agnosia_options();

}

/* Add action hooks. */
add_action( 'agnosia_before_setup', 'agnosia_load_options' );

?>