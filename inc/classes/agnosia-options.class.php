<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles registration and initialization of Agnosia theme options.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */


/**
 * Provides a container for dynamic options that can be managed both through
 * the Agnosia Options page in the admin dashboard and through a lot of functions.
 * 
 * @since 1.0
 * @author andrezrv
 */
class agnosia_options {

	var $options = array();
	var $stored_options = array();

	function __construct() {

		do_action( 'agnosia_before_setup_options' );
		do_action( 'agnosia_setup_options' );
		do_action( 'agnosia_after_setup_options' );

	}

}



/**
 * Registers an option that can be handled through the Agnosia Options page in the admin dashboard.
 * 
 * If $before is set, $after will be ignored.
 * 
 * @param string $name The name of the option. It will be used as the name and ID of the corresponding form element.
 * @param array $values An array containing default values, accepted values, description and HTML markup for the option.
 * @param string $before The name of the option to which the present one should be positioned before. 
 * @param string $after The name of the option to which the present one should be positioned after. 
 *
 * @since 1.0
 * @author andrezrv
 * 
 * @example  
 * agnosia_register_option( 
 * 		$name = 'option_name', 
 * 		$values = array( 
 *			'type' => 'checkbox' , 
 *			'value' => 'true' , 
 *			'values' => array( 'true' , 'false' ) , 
 *			'category' => 'general' , 
 *			'html' => array(
 *				'before' => '<div>' ,
 *				'label' => 'Option name' ,
 *				'description' => 'Some description. HTML is <strong>accepted</strong>.' ,
 *				'after' => '</div>' ,
 *			),
 * 		),
 * 		$before = 'some_other_option',
 * 		$after = false,
 * ); 
 */
function agnosia_register_option( $name , $values = array(), $before = false, $after = false ) {

	do_action( 'agnosia_before_register_option', $name , $values );

	global $agnosia_options;

	$options = $agnosia_options->options;
	$stored_options = $agnosia_options->stored_options;

	// Set the position of the option before an option that was previously registered.
	if ( $before and isset( $options[$before] ) ) {
		$options = agnosia_locate_option( $before, $options, $name, $values, 'before' );
	}

	// Store the current action until the one specified in $before is registered.
	elseif ( $before ) {
		agnosia_store_option( $before, $name, $values, 'before' );
	}

	// Set the position of the option after an option that was previously registered.
	elseif ( $after and isset( $options[$after] ) ) {
		$options = agnosia_locate_option( $before, $options, $name, $values, 'after' );
	}

	// Store the current action until the one specified in $after is registered.
	elseif ( $after ) {
		agnosia_store_option( $after, $name, $values, 'after' );
	}

	// Regular registering process. 
	else {

		$stored_options = $agnosia_options->stored_options;

		// Register the stored options that should be positioned before the current one.
		agnosia_locate_stored_options( $stored_options, $name, 'before' );
		$options = $agnosia_options->options;

		 // Register the current option.
		$options[$name] = $values;
		$agnosia_options->options = $options;

		// Register the stored options that should be positioned after the current one.
		agnosia_locate_stored_options( $stored_options, $name, 'after' );
		$options = $agnosia_options->options;

	}

	$agnosia_options->options = $options;

	do_action( 'agnosia_after_register_option', $name , $values );

}



/**
 * Sets an array of stored options before or after a given option which belongs to another array.
 * 
 * @param array $stored_options An array containing the stored options that should be located.
 * @param string $name The name of the option that should be used as reference.
 * @param string $position The position where the stored options must be located. Accepts only 'before' or 'after'.
 * 
 * @since 1.0
 * @author andrezrv
 */
function agnosia_locate_stored_options( $stored_options, $name, $position ) {

	do_action( 'agnosia_before_locate_stored_options', $stored_options, $name, $position );

	global $agnosia_options;

	$options = $agnosia_options->options;

	if ( isset( $stored_options[$name] ) and ( 'before' or 'after' ) == $position ) {

		foreach ( $stored_options[$name] as $stored_option ) {

			if ( $position == $stored_option['position'] ) {

				$options[$stored_option['name']] = $stored_option['values'];

				$agnosia_options->options = $options;

				unset( $stored_options[$name][$stored_option['name']] );

				if ( empty( $stored_options[$name] ) ) {
					unset( $stored_options[$name] );
				}

				if ( empty( $stored_options ) ) {
					unset( $stored_options );
				}

				$agnosia_options->stored_options = $stored_options;

			}

		}

	}

	do_action( 'agnosia_after_locate_stored_options', $stored_options, $name, $position );

}



/**
 * Sets an option into an array before or after a given key.
 * 
 * @param string $key The name of the reference key.
 * @param array $options The current array to be modified.
 * @param string $name The name of the new key.
 * @param array $values The values for the new option.
 * @param string $position The position where the new option must be located. Accepts only 'before' or 'after'.
 * 
 * @since 1.0
 * @author andrezrv
 */
function agnosia_locate_option( $key, $options, $name, $values, $position ) {

	if ( ( 'before' or 'after' ) == $position ) {

		$key_position = array_search( $key, array_keys( $options ) );

		$key_forced_position = ( 'before' == $position ) ? $key_position : ( $key_position + 1 );

		$new_options = array_slice( $options, 0, $key_forced_position, true ) 
					+ array( $name => $values ) 
					+ array_slice( $options, $key_forced_position, NULL, true );

		return $new_options;

	}

	return false;

}


/**
 * Stores an option into the $agnosia_options->stored_options global variable,
 * in order for this option to be registered in the same process as its reference key.
 * 
 * @param string $key The name of the reference key.
 * @param string $name The name of the current option.
 * @param array $values The values for the current option.
 * @param string $position The position where the option must be located. Accepts only 'before' or 'after'.
 * 
 * @since 1.0
 * @author andrezrv
 */
function agnosia_store_option( $key, $name, $values, $position ) {

	if ( ( 'before' or 'after' ) == $position ) {

		global $agnosia_options;

		$stored_options = $agnosia_options->stored_options;

		$stored_options[$key][$name] = array( 'name' => $name, 'values' => $values, 'position' => $position );
		$agnosia_options->stored_options = $stored_options;
		$agnosia_options->options = $options;

	}

}



/**
 * Removes an option from the $agnosia_options->options global variable.
 * 
 * @param string $name The name of the option to be removed.
 * 
 * @since 1.0
 * @author andrezrv
 */
function agnosia_unregister_option( $name ) {

	do_action( 'agnosia_before_unregister_option', $name );

	global $agnosia_options;

	$options = $agnosia_options->options;

	if ( isset( $options[$name] ) ) { 
		unset( $options[$name] ); 
	}

	$agnosia_options->options = $options;

	do_action( 'agnosia_after_unregister_option', $name );

}



/**
 * Resets the default value of an option to a given one.
 * 
 * @param string $name The name of the option.
 * @param string $value The new default value.
 * 
 * @since 1.0
 * @author andrezrv
 */
function agnosia_reset_option_default( $name , $value ) {

	do_action( 'agnosia_before_unregister_option', $name );

	global $agnosia_options;

	$options = $agnosia_options->options;

	if ( isset( $options[$name] ) ) { 
		$options[$name]['value'] = $value; 
	}

	$agnosia_options->options = $options;

	do_action( 'agnosia_after_unregister_option', $name );

}



/**
 * Checks if an option exists.
 * 
 * @param string $name The name of the option.
 * 
 * @since 1.0
 * @author andrezrv
 */
function agnosia_option_exists( $name ) {

	global $agnosia_options;

	if ( isset( $agnosia_options['options'][$name] ) ) {
		return true;
	}

	return false;

}



/**
 * Loads all the options.
 * 
 * Magic begins here!
 *  
 * @since 1.0
 * @author andrezrv
 * 
 * {@link http://www.youtube.com/watch?v=YWf5BLUOhNM}
 */
function agnosia_load_options() {

	global $agnosia_options;
	
	$agnosia_options = new agnosia_options();

}


// This makes magic actually happen.
add_action( 'agnosia_before_setup', 'agnosia_load_options' );