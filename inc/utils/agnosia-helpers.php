<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file provides helpers to use methods and execute processes in an easier way.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

/* Agnosia Theme Options helpers */


function agnosia_get_styles() {

    global $agnosia_styles;

    $styles = (array)$agnosia_styles->styles;

    return $styles;

}


function agnosia_get_customized_bootstrap() {

    global $agnosia_styles;

    $customized_bootstrap = !empty( $agnosia_styles->customized_bootstrap ) ? (array)$agnosia_styles->customized_bootstrap : false ;

    return $customized_bootstrap;

}



function agnosia_get( $option ) {

	global $agnosia;

	return $agnosia->get( $option ); 

}



function agnosia_evaluate( $option ) {

	global $agnosia;
	
	return $agnosia->evaluate( $option ); 

}



function agnosia_evaluate_variable( $variable ) {

    if ( 'true' === $variable or true === $variable ) : return true; endif;
    return false;

}



function agnosia_evaluate_show( $show_key , $hide_key , $object = false , $context = false ) {

    global $agnosia;

    return $agnosia->evaluate_show( $show_key , $hide_key , $object , $context );

}



function agnosia_get_template( $template , $type ) {

    global $agnosia;

    return $agnosia->get_template( $template , $type );

}



function agnosia_load_template( $template , $type ) {

    global $agnosia;

    $agnosia->load_template( $template , $type );

}



function agnosia_override_show( $evaluated , $show , $hide , $dependent = false ) {

    global $agnosia;

    return $agnosia->override_show( $evaluated , $show , $hide , $dependent );

}



function agnosia_get_form_options_by_category( $category ) {

    global $agnosia;

    return $agnosia->get_form_options_by_category( $category );
    
}


function agnosia_process( $request ) {

    global $agnosia;

    $agnosia->process( $request );

}



function agnosia_load_modules( $modules ) {

    if ( is_array( $modules ) and !empty( $modules ) ) :

        foreach ( $modules as $module ) :

            @include_once agnosia_get_path( $module );

        endforeach;

    endif;

}


function agnosia_add_theme_support( $modules ) {

    if ( is_array( $modules ) and !empty( $modules ) ) :

        foreach ( $modules as $name => $attrs ) :

            if ( $attrs ) :  add_theme_support( $name, $attrs );
            else : add_theme_support( $name );
            endif;

        endforeach;

    endif;

}


function agnosia_remove_theme_support( $modules ) {

    if ( is_array( $modules ) and !empty( $modules ) ) :

        foreach ( $modules as $module ) :

            remove_theme_support( $module );

        endforeach;

    endif;

}



function agnosia_load_text_domain() {

    load_theme_textdomain( 'agnosia' , agnosia_get_path( '/languages' ) );

}



function debug( $element , $die = false ) {

    echo '<pre>';

    if ( is_array($element) ) : print_r($element);
    else : echo $element;
    endif;

    echo '</pre>';

    if ( $die ) : die( $die ); endif;

}


?>