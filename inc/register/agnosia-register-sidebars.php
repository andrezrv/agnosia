<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the registration of Agnosia theme sidebars.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

function agnosia_initialize_sidebars() {

    if ( function_exists('register_sidebar') ) {


        /* Initialize left sidebar */


        register_sidebar( array(
            'name' => __( 'Left sidebar' , 'agnosia' ) , 
            'id'   => 'left-sidebar-widgets-container' ,
            'before_widget' => '<div id="%1$s" class="extra widget %2$s">' ,
            'after_widget' => '</div>' ,
            'before_title' => '<h2>' ,
            'after_title' => '</h2>' ,
            'class' => 'nav',
        ) ) ;


        /* Initialize right sidebar */

        register_sidebar( array(
            'name' => __( 'Right sidebar' , 'agnosia' ) , 
            'id'   => 'right-sidebar-widgets-container' ,
            'before_widget' => '<div id="%1$s" class="extra widget %2$s">' ,
            'after_widget' => '</div>' ,
            'before_title' => '<h2>' ,
            'after_title' => '</h2>' ,
            'class' => 'nav',
        ) ) ;


        /* Initialize sidebars for footer */

        $sidebars = !current_theme_supports( 'agnosia-footer-columns-selection' ) ? 4 : agnosia_get( 'footer_columns_number', 'footer' );

        $counter = 1; while ( $counter <= $sidebars ) :

            register_sidebar( array(
                'name' => __( 'Footer' , 'agnosia' ) . ' #' . $counter , 
                'id'   => 'footer-widgets-container-' . $counter ,
                'before_widget' => '<div id="%1$s" class="extra widget %2$s">' ,
                'after_widget' => '</div>' ,
                'before_title' => '<h2>' ,
                'after_title' => '</h2>' ,
                'class' => 'nav',
            ) ) ;

        $counter++; endwhile;


    }

}



/* Add action filters. */
add_action( 'agnosia_start', 'agnosia_initialize_sidebars', 11 );

?>