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



function agnosia_get_template( $template, $type, $insert = false ) {

    global $agnosia;

    return $agnosia->get_template( $template , $type, $insert );

}



function agnosia_load_template( $template, $type, $insert = false ) {

    global $agnosia;

    $agnosia->load_template( $template , $type, $insert );

}



function agnosia_inserted_html() {

    $output = agnosia_get_inserted_html();

    echo $output;

}


function agnosia_get_inserted_html() {

    global $inserted_html;

    $html = '';

    if ( $inserted_html ) :
        $html = $inserted_html;
    endif;

    return $html;

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

    if ( is_array( $modules ) and !empty( $modules ) ) {

        foreach ( $modules as $module ) {

            @include_once agnosia_get_path( $module );

        }

    }

}


function agnosia_add_theme_support( $modules ) {

    if ( is_array( $modules ) and !empty( $modules ) ) :

        foreach ( $modules as $name => $attrs ) :

            if ( $attrs and 'custom-header' == $name ) :

                add_theme_support( 'custom-header', $attrs ); // Required to pass theme checks

            elseif ( $attrs and 'custom-background' == $name ) :

                add_theme_support( 'custom-background', $attrs ); // Required to pass theme checks

            elseif ( $attrs ) :  

               add_theme_support( $name, $attrs );

            else : 

               add_theme_support( $name );

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



function agnosia_load_textdomain() {

    load_theme_textdomain( 'agnosia' , get_template_directory() . '/languages' );

    agnosia_load_child_theme_textdomain();

}


function agnosia_load_child_theme_textdomain() {

    do_action( 'agnosia_load_child_theme_textdomains' );

    global $agnosia_child_theme_textdomains;

    if ( is_array( $agnosia_child_theme_textdomains ) and !empty( $agnosia_child_theme_textdomains ) ) {
        foreach ( $agnosia_child_theme_textdomains as $child_theme ) {
            load_child_theme_textdomain( $child_theme , get_stylesheet_directory() . '/languages' );
        }
    }

}


function agnosia_infinite_render() {

    while( have_posts() ) :
        
        the_post();  
        agnosia_load_template( 'home-post' , 'content' );
        echo '<script type="text/javascript">add_btn_class();</script>';
        
    endwhile;

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