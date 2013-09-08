<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the default and user-opted settings of the Agnosia theme.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */


class agnosia_setup {


	private $general = array();
	private $header = array();
	private $sidebar = array();
	private $footer = array();
	private $content = array();



	public function __construct() {

		do_action( 'agnosia_before_setup' );

		/**
		 * Reset to default settings based on value of AGNOSIA_DEVELOPMENT_MODE.
		 */

		if ( defined( 'AGNOSIA_DEVELOPMENT_MODE' ) 
			and isset( $_GET['reset'] )
			and 'defaults' == $_GET['reset'] 
		) :

			delete_option( $this->get_theme_options_name() );

		endif;

		/**
		 * Initialize and stabilize object and options values.
		 */

		$this->init();
		$this->initialize_options();
		$this->initialize_default_values();
		$this->stabilize_values();

		do_action( 'agnosia_after_setup' );

	}




	public function get_theme_options_name() {

		$child = 'Agnosia' != wp_get_theme()->Name ? sanitize_title( wp_get_theme()->Name ) . '_' : '';
		return 'agnosia_' . $child . 'theme_options';

	}



	/* Check if an option matches a select element */
	private function is_select( $var , $parent = false ) {

		global $agnosia_options;

		$options = $agnosia_options->options;

		$parent = $parent ? $parent : $this->get_parent( $var );

		if ( isset( $options[$var] ) and $options[$var]['category'] == $parent ) :

			$object = $options[$var];
	
			if ( $object['type'] == 'select' ) : return true;
			endif;

		endif;

		return false;

	}



	/* Check if an option matches an uploader element */
	private function is_uploader( $var , $parent = false ) {

		global $agnosia_options;

		$options = $agnosia_options->options;

		$parent = $parent ? $parent : $this->get_parent( $var );

		if ( isset( $options[$var] ) and $options[$var]['category'] == $parent ) :

			$object = $options[$var];
		
			if ( $object['type'] == 'input-upload' ) : return true;
			endif;

		endif;

		return false;

	}



	/* Check if an option matches a text input element */
	private function is_input( $var , $parent = false ) {

		global $agnosia_options;

		$options = $agnosia_options->options;

		$parent = $parent ? $parent : $this->get_parent( $var );

		if ( isset( $options[$var] ) and $options[$var]['category'] == $parent ) :

			$object = $options[$var];
			
			if ( $object['type'] == 'input' ) : return true;
			endif;

		endif;

		return false;

	}



	/* Check if an option matches a checkbox element */
	private function is_checkbox( $var , $parent = false ) {

		global $agnosia_options;

		$options = $agnosia_options->options;

		$parent = $parent ? $parent : $this->get_parent( $var );

		if ( isset( $options[$var] ) and $options[$var]['category'] == $parent ) :

			$object = $options[$var];

			if ( $object['type'] == 'checkbox' ) : return true;
			endif;

		endif;

		return false;

	}



	/* Get HTML form element for a given option */
	public function get_field( $var , $parent = false , $context = false , $object = false ) {

		$parent = $parent ? $parent : $this->get_parent( $var );

		if ( $this->is_select( $var, $parent ) ) : return $this->get_select_field( $var, $parent , $context , $object );
		elseif ( $this->is_input( $var, $parent ) ) : return $this->get_input_field( $var, $parent , $context , $object );
		elseif ( $this->is_uploader( $var, $parent ) ) : return $this->get_uploader_field( $var, $parent , $context , $object );
		elseif ( $this->is_checkbox( $var, $parent ) ) : return $this->get_checkbox_field( $var, $parent , $context , $object );
		endif;

		return false;

	}



	/* Print $this->get_field() */
	public function print_field( $var, $parent = false , $context = false , $object = false ) {

		$parent = $parent ? $parent : $this->get_parent( $var );

		$field = $this->get_field( $var, $parent , $context , $object );
		$field = apply_filters( 'agnosia_print_field', $field );

		echo $field;

	}



	/* Get label for HTML element */
	public function print_label( $var, $parent = false , $message , $context = false ) {

		$parent = $parent ? $parent : $this->get_parent( $var );

		$label = $this->get_label( $var, $parent , $message , $context );
		$label = apply_filters( 'agnosia_print_label', $label );

		echo $label;

	}



	/* Get select HTML for option */
	public function get_select_field( $var, $parent = false , $context = false , $object ) {

		$parent = $parent ? $parent : $this->get_parent( $var );

		if ( $this->exists( $var, $parent ) ) :

			if ( $this->is_select( $var, $parent ) ) :

				if ( isset( $context ) and $context ) : $id = $context . '['.$var.']';
				else : $id = $var;
				endif;

				$html = '<select name="' . $parent . '[' . $id . ']" id="' . $parent . '[' . $id . ']">';
				$html .= $this->get_select_options( $var, $parent , true , $context , $object );
				$html .= '</select>';

				return $html;

			else :

				die( $var . ' is not a select field' );

			endif;

		else :

			die( $var . ' is not a property of ' . get_class( $this ) );

		endif;

	}



	/* Get input HTML for option */
	public function get_input_field( $var, $parent = false , $context = false , $object = false ) {

		$parent = $parent ? $parent : $this->get_parent( $var );

		if ( $this->exists( $var, $parent ) ) :

			if ( $this->is_input( $var, $parent ) ) :

				if ( isset( $context ) and $context ) :

					$id = $context . '['. $var .']';
					
					$array = get_post_meta( $object->ID, $context , true );
			
					if ( isset( $array[$var] ) ) : $value = $array[$var];
					else : $value = '';
					endif;
				
				else :
					
					$id = $var;
					$value = $this->get( $var, $parent );
		
				endif;

				$html = '<input type="text" name="' . $parent . '[' . $id . ']" id="' . $parent . '[' . $id . ']" value="'.$value.'" />';
				$html = apply_filters( 'agnosia_get_input_field', $html );

				return $html;

			else :

				die( $var . ' is not a text input field' );

			endif;

		else :

			die( $var . ' is not a property of ' . get_class( $this ) );

		endif;

	}


	// not working properly
	public function get_uploader_field( $var, $parent = false , $context = false , $object = false ) {

		$parent = $parent ? $parent : $this->get_parent( $var );

		if ( $this->exists( $var, $parent ) ) :

			if ( $this->is_uploader( $var, $parent ) ) :

				if ( isset( $context ) and $context ) :
					
					$id = $context . '['. $var .']';
				
					$array = esc_attr( get_post_meta( $object->ID, $context , true ) );
					$value = $array[$var];
		
				else :
			
					$id = $parent . '[' . $var . ']';
					$value = $this->get( $var, $parent );
		
				endif;

				$html = '<input id="'.$id.'" type="text" class="url" name="'.$id.'" value="'.$value.'" />
				<input id="button_'.$id.'" class="button button-primary insert" type="button" value="'.__( 'Select Media' , 'agnosia' ).'" />';
				$html = apply_filters( 'agnosia_get_uploader_field', $html );

				return $html;

			else :

				die( $var . ' is not an uploader field' );

			endif;

		else :

			die( $var . ' is not a property of ' . get_class( $this ) );

		endif;

	}



	/* Get checkbox HTML for option */
	public function get_checkbox_field( $var, $parent = false , $context = false , $object = false ) {

		$parent = $parent ? $parent : $this->get_parent( $var );

		if ( $this->exists( $var, $parent ) ) :

			if ( $this->is_checkbox( $var, $parent ) ) :

				if ( isset( $context ) and $context ) : $id = $context . '['. $var .']';
				else : $id = $var;
				endif;

				$html = '<input type="checkbox" name="' . $parent . '[' . $id . ']" id="' . $parent . '[' . $id . ']" value="true" '.$this->get_checked( $var , $context , $object ).' />';
				$html = apply_filters( 'agnosia_get_checkbox_field', $html );

				return $html;

			else :

				die( $var . ' is not a checkbox field' );

			endif;

		else :

			die( $var . ' is not a property of ' . get_class( $this ) );

		endif;

	}



	/* Get options for HTML select element */
	public function get_select_options( $var, $parent = false , $html = false , $context = false , $object = false ) {

		$parent = $parent ? $parent : $this->get_parent();

		$parent_object = $this->$parent;
		$object = $parent_object[$var];
		$select = $object['values'];

		if ( $html ) :

			$output = '';

			foreach ( $select as $value => $message ) :

				$output .= '<option value="'.$value.'" '.$this->get_selected( $var, $parent , $value , $context , $object ).'>'.$message.'</option>';

			endforeach;

			$output = apply_filters( 'agnosia_get_select_options', $output );

			return $output;

		endif;

		$select = apply_filters( 'agnosia_get_select_options', $select );

		return $select;

	}



	/* Get HTML label for option */
	public function get_label( $var , $parent = false , $message , $context = false ) {

		$parent = $parent ? $parent : $this->get_parent( $var );

		if ( $this->exists( $var , $parent ) ) :

			if ( $context ) : $id = $context . '['. $var .']';
			else : $id = $var; endif;

		$html = '<label for="' . $parent . '[' . $id . ']">'.$message.'</label>';
		$html = apply_filters( 'agnosia_get_label', $html );

		return $html;

		else :

			die( $var . ' is not a property of ' . get_class( $this ) );

		endif;

	}



	/* Check if an option is checked */
	public function get_checked( $var , $parent = false , $context = false , $object = false ) {

		$parent = $parent ? $parent : $this->get_parent( $var );

		if ( $this->exists( $var , $parent ) ) :

			if ( $this->is_checkbox( $var , $parent ) ) :

				if ( isset( $context ) and $context ) :

					$post_meta = get_post_meta( $object->ID, $context , true );
					$value = isset( $post_meta[$var] ) ? esc_attr( $post_meta[$var] ) : 'false';

				else : $value = $this->get( $var , $parent );

			endif;

			if ( $value == 'true' ) : return 'checked="true"'; endif;
			return false;

		else :

			die( $var . ' is not a checkbox field' );

		endif;

		else :

			die( $var . ' is not a property of ' . get_class( $this ) );

		endif;

	}



	function get_checked_external( $value ) {

		if ( $value == 'true' ) : return 'checked="true"'; endif;
		return false;

	}



	/* Check if an option is selected */
	public function get_selected( $var , $parent = false , $value , $context = false , $object = false ) {

		$parent = $parent ? $parent : $this->get_parent();

		if ( $this->exists( $var , $parent ) ) :

			if ( $this->is_select( $var , $parent ) ) :

				if ( isset( $context ) and $context ) : $_value = esc_attr( get_post_meta( $object->ID, $context , true ) );
				else : $_value = $this->get( $var , $parent );
				endif;

			if ( $_value == $value ) : return 'selected="true"'; endif;
		return false;

		else :

			die( $var . ' is not a select field' );

		endif;

		else :

			die( $var . ' is not a property of ' . get_class( $this ) );

		endif;

	}



	/* Associate previously registered options with object properties */
	private function init() {

		do_action( 'agnosia_before_setup_init' );

		global $agnosia_options;

		$options = $agnosia_options->options;

		$vars = $this->get_vars();

		foreach ( $vars as $key => $val ) :

			$values = array();

		foreach ( $options as $option => $value ) :

			if ( isset( $value['category'] ) and $value['category'] == $key ) : $values[$option] = $value;
			endif; ;

		endforeach;

		$this->$key = $values;

		endforeach;

		do_action( 'agnosia_after_setup_init' );

	}



	/* Store default options values into database */
	private function initialize_options() {

		do_action( 'agnosia_before_initialize_options' );

		if ( !$this->get_options() ) :

			if ( function_exists( 'add_option' ) ) :

				add_option( $this->get_theme_options_name() , $this->get_defaults() );

			else :

				die( 'Function add_option does not exist' );

			endif;

		endif;

		do_action( 'agnosia_before_initialize_options' );

	}



	/* Store default options values into object */
	private function initialize_default_values() {

		do_action( 'agnosia_before_initialize_default_values' );

		$options = $this->get_options();

		$vars = $this->get_vars();

		$difference = false;

		foreach ( $vars as $parent => $default_values ) :

			$object = $this->$parent;

			foreach ( $object as $key => $values ) :

				if ( !isset( $options[$parent][$key] ) ) :

					$options[$parent][$key] = $values['value'];

					$this->set( $key , $parent , $options[$parent][$key] );

					$difference = true;

				endif;

			endforeach;

		endforeach;

		if ( $difference ) : $this->save(); endif;

		do_action( 'agnosia_after_initialize_default_values' );

	}



	/* Make sure database values and object values are always the same */
	private function stabilize_values() {

		do_action( 'agnosia_before_stabilize_values' );

		$options = $this->get_options();

		if ( is_array( $options ) and !empty( $options ) ) :

			foreach ( $options as $parent ) :

				foreach ( $parent as $key => $value ) :

					$parent = isset( $value['category'] ) ? $value['category'] : false ;

					if ( $this->exists( $key , $parent ) ) :

						$this->set( $key , $parent , isset( $value['value'] ) ? $value['value'] : $this->get_default_value( $key ) );

					else :

						$this->set( $key , $parent , false );

					endif;

				endforeach;

			endforeach;

		endif;

		do_action( 'agnosia_after_stabilize_values' );

	}



	/* Remove all options that could remain in the database but are not used anymore */
	function remove_unused_options() {

		do_action( 'agnosia_before_remove_unused_options' );

		$options = $this->get_options();

		if ( is_array( $options ) and !empty( $options ) ) :

			$difference = false;

			foreach ( $options as $parent ) :

				foreach ( $parent as $key => $values ) :

					$parent_value = isset( $value['category'] ) ? $value['category'] : false;

					/* I will not delete the following until I'm sure it is totally irrelevant */
					
					/*if ( !$this->exists( $key , $parent_value ) ) :

						$this->remove( $key , $parent_value );

					endif;*/

				endforeach;

			endforeach;

			if ( $difference ) : $this->save(); endif;

		endif;

		do_action( 'agnosia_after_remove_unused_options' );

	}



	/* Process a request in order to update the option values */
	public function process( $request ) {

		do_action( 'agnosia_before_process_options' );

		$options = $this->get_options();

		if ( is_array( $options ) and !empty( $options ) ) :

			if ( is_array( $request ) and !empty( $request ) ) :

				$difference = false;

				foreach ( $options as $parent => $values ) :

					foreach ( $values as $key => $value ) :

						if ( $this->exists( $key , $parent ) ) :

							if ( $this->is_checkbox( $key , $parent ) and ( !isset( $request[$parent][$key] ) or $request[$parent][$key] != 'true' ) ) :

								$this->set( $key , $parent , 'false' );

							else :

								if ( isset( $request[$parent][$key] ) ) :
									$this->set( $key , $parent , $request[$parent][$key] );
								else :
									$this->set( $key , $parent , $this->get( $key , $parent ) );
								endif;

							endif;

							$difference = true;

						endif;

					endforeach;

				endforeach;

				if ( $difference ) : $this->save(); endif;

			else :

				die( 'Request was empty' );

			endif;

		endif;

		do_action( 'agnosia_after_process_options' );

	}



	/* Save object values into the database */
	public function save() {

		do_action( 'agnosia_before_save_options' );

		if ( function_exists( 'update_option' ) ) :

			update_option( $this->get_theme_options_name() , $this->get_object_vars() );

		else :

			die( 'Function update_option does not exist' );

		endif;

		do_action( 'agnosia_after_save_options' );

	}



	/* Get values from database */
	public function get_options() {

		if ( function_exists( 'get_option' ) ) :

			$options = get_option( $this->get_theme_options_name() );

			if ( !$options or ( is_array( $options ) and !empty( $options ) ) ) :

				return $options;

			else :

				die( 'agnosia_theme_options should be false or not empty array' );

			endif;

		else :

			die( 'Function get_option does not exist' );

		endif;

	}



	/* Check if an option exists */
	public function exists( $var , $parent = false ) {

		global $agnosia_options;

		$options = $agnosia_options->options;

		$parent = $parent ? $parent : $this->get_parent( $var );

		if ( isset( $options[$var] ) and isset( $options[$var]['category'] ) and $options[$var]['category'] == $parent ) :

			return true;

		endif;

		return false;

	}



	/* Get the value of an option */
	public function get( $var , $parent = false ) {

		$parent = $parent ? $parent : $this->get_parent( $var );

		if( isset( $this->$parent ) ) : $object = $this->$parent; endif;
		
		return isset( $object[$var]['value'] ) ? $object[$var]['value'] : false ;

	}



	/* Get the parent of an options (basically, the object property which it belongs to) */
	public function get_parent( $var ) {

		global $agnosia_options;

		$options = $agnosia_options->options;

		if ( isset( $options[$var]['category'] ) ) : 

			$parent = $options[$var]['category'];

			return $parent;

		endif;

		return false;

	}



	/* Get the default value of an option */
	public function get_default_value( $var , $parent = false ) {

		global $agnosia_options;

		$options = $agnosia_options->options;

		$parent = $parent ? $parent : $this->get_parent( $var );

		$default_value = '';

		if ( $options[$var]['category'] == $parent ) :

			$default_value = $options[$var]['value'];

		endif;

		return $default_value;

	}



	/* Checks an element and returs true (if true or string or not empty) or false (if false or blank or empty) */
	public function evaluate( $var , $parent = false ) {

		do_action( 'agnosia_before_evaluate_option', $var , $parent );

		$parent = $parent ? $parent : $this->get_parent( $var );

		if ( $this->get( $var , $parent ) != 'false' and $this->get( $var , $parent ) != '' ) :

			return true;

		endif;

		return false;

	}



	/* Sets the value to a given option into object properties */
	public function set( $var , $parent = false , $value ) {

		do_action( 'agnosia_before_set_option', $parent, $value );

		$parent = $parent ? $parent : $this->get_parent( $var );

		if ( $parent ) :

			if ( $this->exists( $var , $parent ) ) :

				$object = $this->$parent;

				$object = $object[$var];

				if ( $object['values'] == 'any' or in_array( $value , $object['values'] ) or isset( $object['values'][$value] ) ) :
					/* Check for string first to prevent array warning */

					$object['value'] = $value;
					$new_object = $this->$parent;				

				else :

					die( $value . ' is not a possible value for ' . $var );

				endif;

			/* If option does not exist into parent array, set it to false. Otherwise, 
			 * all options will be reseted to default values */
			else :

				$object[$var] = false;
				$object['value'] = $value;
				$new_object = $this->$parent;

			endif;
			

			$new_object[$var] = $object;
			$this->$parent = $new_object;

		endif;

		do_action( 'agnosia_after_set_option', $parent, $value );

	}



	/* Removes not used option values from object properties */
	public function remove( $var , $parent = false ) {

		// Removes the complete property, not only its value

		do_action( 'agnosia_before_remove_option', $var , $parent );

		$parent = $parent ? $parent : $this->get_parent( $var );

		$object = $this->$parent;
		unset( $object[$var] );
		$this->$parent = $object;

		do_action( 'agnosia_after_remove_option', $var , $parent );

	}



	/* Returns the original object properties and its values */
	public function get_vars() {

		return get_class_vars( get_class( $this ) );

	}



	/* Returns all the options default values */
	public function get_defaults() {

		$vars = $this->get_vars();

		$defaults = array();

		foreach ( $vars as $parent => $value ) :

			$object = $this->$parent;

			foreach ( $object as $key => $values ) :

				$defaults[$parent][$key] = $values['value'];

			endforeach;

		endforeach;

		return $defaults;

	}



	/* Return all the options with populated values */
	public function get_object_vars() {

		$vars = $this->get_vars();
		$object_vars = array();

		foreach ( $vars as $var => $value ) :

			$object_vars[$var] = $this->$var;

		endforeach;

		return $object_vars;

	}



	/* Returns ordered list of object properties under a given category */
	public function get_object_properties_values( $category ) {

		global $agnosia_options;

		$options = $agnosia_options->options;

		$object = array();

		foreach ( $options as $name => $value ) :

			if ( isset( $value['category'] ) and $value['category'] == $category ) :
				$object[$name] = $value;
				/*$position[] = $object[$name]['position'];*/
			endif;

		endforeach;

		/* Commented the following because array_multisort() forces to specify the option's position,
		** and I'm seriously doubting that's a good practice.*/
		/*array_multisort( $position , SORT_ASC , $object );*/

		return $object;

	}



	/* Pretty much the same than get_object_properties_values(), but returning values by given category string */
	function get_object_properties_values_by_category( $category ) {

		global $agnosia_options;

		$options = $agnosia_options->options;
		$properties = $this->get_object_properties_values( $category );

		$object = array();

		foreach ( $properties as $property => $value ) :

			foreach ( $value as $p => $v ) :

				if ( $p == 'category' and $v == $category ) :

					$parent = $this->$category;
					$object[$property] = $options[$property];

				endif;

			endforeach;

		endforeach;

		return $object;

	}



	/**
	  * Gets a template from theme files. It's like a get_template_part()
	  * (in fact, it uses that function) on steroids: besides getting a
	  * template HTML, it executes actions and applies filters to the HTML,
	  * so you can modify it in any way you want.
	  * 
	  * @author andrezrv
	  * 
	  */
	public function get_template( $template, $type, $insert = false ) {

		do_action( 'agnosia_before_get_template', $template, $type );

		if ( function_exists( 'get_template_directory' ) ) :

			/**
			 * This little snippet allows you to insert external HTML in 
			 * any place that a template accepts it, making it possible
			 * through the global variable.
			 */
			if ( $insert ) :  
				global $inserted_html; 
				$inserted_html = $insert;
			endif;
			
			/** Start catching the HTML output. */
			ob_start();

			get_template_part( '/templates/' . $type . '/' . $template );

			$output = ob_get_contents();
			ob_end_clean();

			/** Set the $insert global variable to false, clearing it for further uses. */
			if ( $insert ) : $insert = false; endif;

			/** Create a filter for this template. */
			$output = apply_filters( 'agnosia_get_template_' . $type . '_' . $template , $output );

			return $output;

		else :

			die( 'Function get_template_directory does not exists.' );

		endif;

	}


	/**
	 * Outputs the HTML obtained with $this->get_template().
	 * See that method for further reference.
	 * 
	 * @author andrezrv
	 * 
	 */
	public function load_template( $template , $type, $locator = false ) {

		do_action( 'agnosia_before_load_template', $template, $type, $locator );

		$output = $this->get_template( $template, $type, $locator );
		$output = apply_filters( 'agnosia_load_template_' . $type . '_' . $template , $output );
		echo $output;

	}


	/* Displays options for showing or hiding elements of a post, 
	** opposite to those defined in Agnosia Options settings page */
	public function override_show( $evaluated , $show = array() , $hide = array() , $dependent = false ) {

		/* $evaluated must be a preevaluated $agnosia parameter.
		** i.e. agnosia_evaluate( 'content_show_header' , 'content' ) */

		do_action( 'agnosia_before_override_show', $evaluated, $show, $hide, $dependent );

		global $post; 

		$show = array( 
			'text' => $show['text'] ? $show['text'] : '' , 
			'key' => $show['key'] ? $show['key'] : '' , 
			'value' => $show['value'] ? $show['value'] : '' ,
		);

		$hide = array( 
			'text' => $hide['text'] ? $hide['text'] : '' , 
			'key' => $hide['key'] ? $hide['key'] : '' , 
			'value' => $hide['value'] ? $hide['value'] : '' ,
		);

		ob_start();

		/* Display hide option if show is setted to true in Agnosia options configuration */
		if ( $evaluated ) :  ?>

			<div class="agnosia-post-meta agnosia-field">
				<input type="checkbox" id="agnosia_post_meta[<?php echo $hide['key'] ; ?>]" name="agnosia_post_meta[<?php echo $hide['key'] ; ?>]" value="true" <?php echo $this->get_checked_external( $hide['value'] ) ; ?> />
				<label for="agnosia_post_meta[<?php echo $hide['key'] ; ?>]"><?php echo esc_html( $hide['text'] ) ; ?></label>
			</div>

			<?php /* Obtaind javascript for depending elements */ ?>
			<?php if ( $dependent ) : ?>

				<script type="text/javascript">

					jQuery(document).ready( function() {

						if ( jQuery('input[id="agnosia_post_meta[<?php echo $hide['key'] ; ?>]"]').length ) {
							toggle_form_element( 'input[id="agnosia_post_meta[<?php echo $hide['key'] ; ?>]"]' , '<?php echo $dependent ; ?>' , 'hide' );
						}

						jQuery('input[id="agnosia_post_meta[<?php echo $hide['key'] ; ?>]"]').click( function() {
							toggle_form_element( 'input[id="agnosia_post_meta[<?php echo $hide['key'] ; ?>]"]' , '<?php echo $dependent ; ?>' , 'hide' );
						} );

					});

				</script>

			<?php endif; ?>

		<?php /* Display show option if show is setted to false in Agnosia Options configuration */ ?>
		<?php else : ?>

			<div class="agnosia-post-meta agnosia-field">
				<input type="checkbox" id="agnosia_post_meta[<?php echo $show['key'] ; ?>]" name="agnosia_post_meta[<?php echo $show['key'] ; ?>]" value="true" <?php echo $this->get_checked_external( $show['value'] ) ; ?> />
				<label for="agnosia_post_meta[<?php echo $show['key'] ; ?>]"><?php echo esc_html( $show['text'] ) ; ?></label>
			</div>

			<?php /* Obtaind javascript for depending elements */ ?>
			<?php if ( $dependent ) : ?>

				<script type="text/javascript">

					if ( jQuery('input[id="agnosia_post_meta[<?php echo $show['key'] ; ?>]"]').length ) {
						toggle_form_element( 'input[id="agnosia_post_meta[<?php echo $show['key'] ; ?>]"]' , '<?php echo $dependent ; ?>' , 'show' );
					}

					jQuery('input[id="agnosia_post_meta[<?php echo $show['key'] ; ?>]"]').click( function() {
						toggle_form_element( 'input[id="agnosia_post_meta[<?php echo $show['key'] ; ?>]"]' , '<?php echo $dependent ; ?>' , 'show' );
					} );

				</script>

			<?php endif; ?>

		<?php endif; ?>

		<?php

		$html = ob_get_contents();

		ob_end_clean();

		$html = apply_filters( 'agnosia_override_show', $html );

		echo $html;


	}


	// this could be deprecated soon. Or not :O
	public function evaluate_show( $show_key , $hide_key , $object = false , $context = false ) {

		do_action( 'agnosia_before_evaluate_show', $show_key, $hide_key, $object, $context );

		if ( !$context ) : $context = 'agnosia_post_meta'; endif;

		if ( isset( $object ) ) :
			$post_meta = get_post_meta( $object->ID, $context , true );
		endif;

		if ( $this->evaluate( $show_key ) ) :

			if( is_home() ) : return true; endif;
			if( is_archive() ) : return true; endif;
			if( is_search() ) : return true; endif;

			if ( isset( $post_meta[$hide_key] ) and $post_meta[$hide_key] == 'true' ) : return false;
			else : return true; endif;

		else :

			if ( isset( $post_meta[$show_key] ) and $post_meta[$show_key] == 'true' ) : return true;
			else : return false; endif;

		endif;

	}



	/* Returns HTML for options under given category */
	public function get_form_options_by_category( $category ) {

		do_action( 'agnosia_before_get_form_options_by_category', $category );

		$properties = $this->get_object_properties_values_by_category( $category );
		$html = '';

		foreach ( $properties as $property => $value ) :

			if ( !isset( $properties[$property]['display'] ) or false != $properties[$property]['display'] ) :

				if ( isset( $properties[$property]['html']['label'] ) ) : $label = $properties[$property]['html']['label']; else : $label = $property; endif;
				if ( isset( $properties[$property]['html']['before'] ) ) : $before = $properties[$property]['html']['before']; else : $before = ''; endif;
				if ( isset( $properties[$property]['html']['description'] ) ) : $description = $properties[$property]['html']['description']; else : $description = ''; endif;
				if ( isset( $properties[$property]['html']['after'] ) ) : $after = $properties[$property]['html']['after']; else : $after = ''; endif;

				$html .= $before;

				$html .= '<div class="agnosia-field">';
				$html .= '<div class="left-column">';

				if ( $this->is_checkbox( $property ) ) : $html .= $this->get_field( $property ) . ' '; endif;
				$html .= $this->get_label( $property , $category , $label );

				$html .= '</div>';

				$html .= '<div class="right-column">';
				if ( isset( $properties[$property]['html']['relative_to'] ) ) : 
					$html .= '<code>' . $properties[$property]['html']['relative_to'] . '</code>';
				endif; 
				if ( !$this->is_checkbox( $property ) ) : $html .= $this->get_field( $property ) . ' '; endif;
				$html .= $description;

				$html .= '</div>';
				$html .= '</div>';
				
				$html .= $after;

			endif;

		endforeach;

		$html = apply_filters( 'agnosia_get_form_options_by_category', $html );

		return $html;

	}

	public function default_sidebar_templates() {

		$sidebar_templates = array( 
			1 => 'archives-list' , 
			2 => 'categories-list' , 
			3 => 'meta-links-list' , 
			4 => 'subscribe-links-list' 
		);

		$sidebar_templates = apply_filters( 'agnosia_default_sidebar_templates', $sidebar_templates );

		return $sidebar_templates;
	
	}

}




function agnosia_setup_theme() {

	global $agnosia;
	$agnosia = new agnosia_setup();

}




function agnosia_setup_sidebar_templates() {

	global $agnosia , $sidebar_templates;
	$sidebar_templates = $agnosia->default_sidebar_templates();

}


/* Add action hooks. */
add_action( 'agnosia_start', 'agnosia_setup_theme' );
add_action( 'agnosia_start', 'agnosia_setup_sidebar_templates' );

/* Setup everything! */
do_action( 'agnosia_start' );

?>
