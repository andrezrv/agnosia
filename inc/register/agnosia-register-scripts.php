<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the registration of Agnosia theme javascript files.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

/* Enqueue scripts for admin. */
function agnosia_admin_enqueue_scripts() {

   // Register Agnosia admin functions
   wp_enqueue_script( 'agnosia-admin-functions' , agnosia_get_uri( '/js/agnosia-admin-functions.js' ) , array( 'jquery' ) , '1.0' );

}



/* Register scripts to be displayed. */
function agnosia_enqueue_scripts() {

   // Register -prefix-free script for cross-browser compatibility
   if ( agnosia_evaluate( 'use_prefixfree' ) ) : wp_enqueue_script( 'prefixfree.min' , agnosia_get_uri( '/js/prefixfree.min.js' ) , array() , '1.0.7' ); endif;

   /**
    * If you want to use your custom Bootstrap compilation, then:
    * 1) name your compilation folder like the slug of your custom style (i.e. 'starter-kit-styles');
    * 2) copy your compilation folder into the Bootstrap folder of your child theme (i.e. bootstrap/starter-kit-styles);
    * 3) set the parameter $custom_boostrap of agnosia_register_style() to true.
    * To customize Boostrap, we suggest to use @link http://fancyboot.designspebam.com/.
    */

   // Register Bootstrap default scripts
   if ( agnosia_style_has_custom_bootstrap( agnosia_get( 'stylesheet' ) ) ) :         
      wp_enqueue_script( 'bootstrap.min.script' , agnosia_get_uri( '/bootstrap/' . agnosia_get( 'stylesheet' ) . '/js/bootstrap.min.js' ) , array() , '2.3.2' );     
   else :
      wp_enqueue_script( 'bootstrap.min.script' , agnosia_get_uri( '/bootstrap/js/bootstrap.min.js' ) , array() , '2.3.2' );
   endif;

   // Register Agnosia script in order to set body class by window size when responsive mode is enabled
   if ( agnosia_evaluate( 'responsive' ) ) : wp_enqueue_script( 'agnosia-set-body-class' , agnosia_get_uri( '/js/agnosia-set-body-class.js' ) , array( 'jquery' ) , '1.0' ); endif;

   // Register Agnosia script in order to fix navigation bar to top when specified
   if ( agnosia_evaluate( 'header_top_navbar_fixed' ) or agnosia_evaluate( 'header_navbar_fixed' ) ) : wp_enqueue_script( 'agnosia-fix-navbar' , agnosia_get_uri( '/js/agnosia-fix-navbar.js' ) , array( 'jquery' ) , '1.0' ); endif;

   // Register Agnosia script in order to tweak lists and insert dropdown-menu class into them
   wp_enqueue_script( 'agnosia-set-dropdown-menus' , agnosia_get_uri( '/js/agnosia-set-dropdown-menus.js' ) , array( 'jquery' ) , '1.0' );

   // Register Agnosia script in order to add btn class to <button> and <input type="submit"> tags for Bootstrap compatibility
   if ( agnosia_evaluate( 'general_transform_btn' ) ) : wp_enqueue_script( 'agnosia-add-btn' , agnosia_get_uri( '/js/agnosia-add-btn.js' ) , array( 'jquery' ) , '1.0' ); endif;

   // Register Agnosia script in order to add table class to <table> tags for Bootstrap compatibility
   if ( agnosia_evaluate( 'general_transform_table' ) ) : wp_enqueue_script( 'agnosia-add-table' , agnosia_get_uri( '/js/agnosia-add-table.js' ) , array( 'jquery' ) , '1.0' ); endif;

   // Register Agnosia script with Agnosia basic JS functions
   wp_enqueue_script( 'agnosia-functions' , agnosia_get_uri( '/js/agnosia-functions.js' ) , array( 'jquery' ) , '1.0' );

   // Register Agnosia script with user custom functions
   if ( agnosia_get_uri( '/js/agnosia-custom-scripts.js' ) ) :
      wp_enqueue_script( 'agnosia-custom-scripts' , agnosia_get_uri( '/js/agnosia-custom-scripts.js' ) , array( 'jquery' ) , '1.0' );
   endif;

}



/* Add action hooks. */
add_action( 'admin_enqueue_scripts', 'agnosia_admin_enqueue_scripts' );
add_action( 'wp_enqueue_scripts', 'agnosia_enqueue_scripts' );


?>
