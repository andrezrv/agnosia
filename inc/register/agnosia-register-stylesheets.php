<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the registration of Agnosia theme default CSS files.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

/* Register styles to be displayed. */
function agnosia_register_styles() {

   // Only for front-end
   if ( !is_admin() ) :

      // Register Bootstrap default styles - check for customized Bootstrap into child themes

      /**
       * If you want to use your custom Bootstrap compilation, then:
       * 1) name your compilation folder like the slug of your custom style (i.e. 'starter-kit-styles');
       * 2) copy your compilation folder into the Bootstrap folder of your child theme (i.e. bootstrap/starter-kit-styles);
       * 3) set the parameter $custom_boostrap of agnosia_register_style() to true.
       * To customize Boostrap, we suggest to use {@link http://fancyboot.designspebam.com/}.
       */
         
      if ( agnosia_style_has_custom_bootstrap( agnosia_get( 'stylesheet' ) ) ) :         
         wp_register_style( 'bootstrap.min.style' , agnosia_get_uri( '/bootstrap/' . agnosia_get( 'stylesheet' ) . '/css/bootstrap.min.css' ) , array() , '2.3.2' );     
      else :
         wp_register_style( 'bootstrap.min.style' , agnosia_get_uri( '/bootstrap/css/bootstrap.min.css' ), array() , '2.3.2' );
      endif;

      // Register Bootstrap responsive styles
      if ( agnosia_evaluate( 'responsive' ) ) : wp_register_style( 'bootstrap-responsive' , agnosia_get_uri( '/bootstrap/css/bootstrap-responsive.css' ) , array() , '2.3.2' ); endif;

      // Register Agnosia core styles
      wp_register_style( 'agnosia-core' , agnosia_get_uri( '/css/agnosia-core.css' ) , array() , '1.0' );

      // Register WordPress default stylesheet
      wp_register_style( 'agnosia-theme' , agnosia_get_uri( '/style.css' ) , array() , '1.0' );

      // Register Agnosia responsive styles
      if ( agnosia_evaluate( 'responsive' ) ) : wp_register_style( 'agnosia-responsive' , agnosia_get_uri( '/css/agnosia-responsive.css' ) , array() , '1.0' ); endif;

      // Register Agnosia selected stylesheet
      wp_register_style( agnosia_get( 'stylesheet' ) , agnosia_get_uri( '/css/' . agnosia_get( 'stylesheet' ) . '.css' ) , array() , '1.0' );

      // Register Agnosia custom stylesheet if specified
      if ( agnosia_has_custom_stylesheet() ) : 
         wp_register_style( 'custom-stylesheet' , agnosia_get( 'custom_stylesheet' ) , array() , '' ); 
      endif;

      // Register Agnosia custom post stylesheet if specified
      if ( is_singular() and agnosia_post_has_custom_stylesheet() ) :
         wp_register_style( 'custom-post-stylesheet' , esc_attr( agnosia_post_get_custom_stylesheet() ) , array() , '' );
      endif;

      // Register Agnosia styles for header when header image is present
      if ( get_header_image() ) :
         wp_register_style( 'css-text-color' , get_bloginfo( 'siteurl' ) . '/?agnosia_processed_css=custom-header-text-color' , array( agnosia_get( 'stylesheet' ) ) , '' ); 
      endif;

   else :

      // Register Agnosia admin styles
      wp_register_style( 'agnosia-admin-styles' , agnosia_get_uri( '/css/agnosia-admin.css' ) , array() , '' );
   
   endif;

}


/* Enqueue registered styles. */
function agnosia_enqueue_styles() {

   // Only for front-end
   if ( !is_admin() ) :

      // Enqueue Bootstrap default styles
      wp_enqueue_style( 'bootstrap.min.style' );

      // Enqueue Bootstrap responsive styles
      if ( agnosia_evaluate( 'responsive' ) ) : wp_enqueue_style( 'bootstrap-responsive' ); endif;

      // Enqueue Agnosia core styles
      wp_enqueue_style( 'agnosia-core' );

      // Enqueue WordPress default stylesheet
      wp_enqueue_style( 'agnosia-theme' );

      // Enqueue Agnosia responsive styles
      if ( agnosia_evaluate( 'responsive' ) ) : wp_enqueue_style( 'agnosia-responsive' ); endif;

      // Enqueue Agnosia selected stylesheet
      wp_enqueue_style( agnosia_get( 'stylesheet' ) );

      // Enqueue Agnosia custom stylesheet if specified
      if ( agnosia_has_custom_stylesheet() ) :
         wp_enqueue_style( 'custom-stylesheet' );
      endif;

      // Enqueue Agnosia styles for header texts
      if ( get_header_image() ) : 
         wp_enqueue_style( 'css-text-color' );
      endif;

      // Enqueue styles for singular views
      if ( is_singular() ) : 

         // Enqueue comments stylesheet
         wp_enqueue_script( 'comment-reply' ); 

         // Enqueue post specific style
         if ( agnosia_post_has_custom_stylesheet() ) :
            wp_enqueue_style( 'custom-post-stylesheet' );
         endif;

      endif;

   else :

      // Enqueue Agnosia admin styles
      wp_enqueue_style( 'agnosia-admin-styles' );

   endif;

}



/* Add support for Bootstrap, Agnosia and custom editor styles. */
function agnosia_add_editor_styles() {

   // Only for admin control panel
   if ( is_admin() and strstr( $_SERVER['REQUEST_URI'], 'wp-admin/post-new.php' ) or strstr( $_SERVER['REQUEST_URI'], 'wp-admin/post.php' ) ) :

      // Load Bootstrap default styles
      add_editor_style( 'bootstrap/css/bootstrap.min.css' );

      // Load Bootstrap responsive styles
      if ( agnosia_evaluate( 'responsive' ) ) : add_editor_style( 'bootstrap/css/bootstrap-responsive.min.css' ); endif;

      // Load Agnosia core styles
      add_editor_style( 'css/agnosia-core.css' );

      // Load Agnosia selected stylesheet
      add_editor_style( 'css/'.agnosia_get( 'stylesheet' ).'.css' );

      // Load WordPress default stylesheet
      add_editor_style( 'style.css' );

      // Load Agnosia responsive styles
      if ( agnosia_evaluate( 'responsive' ) ) : add_editor_style( 'css/agnosia-responsive.css' ); endif;

      // Load custom stylesheet if specified
      if ( agnosia_has_custom_stylesheet() ) :  add_editor_style( agnosia_get( 'custom_stylesheet' ) ); endif;

      // Load post custom stylesheet if specified - only if post is specified by GET
      if ( strstr( $_SERVER['REQUEST_URI'], 'wp-admin/post.php' ) and isset( $_GET['post'] ) and agnosia_post_has_custom_stylesheet() ) :

         add_editor_style( agnosia_post_get_custom_stylesheet() );

      endif;

   endif;

}


/* Add action hooks. */
add_action( 'wp', 'agnosia_register_styles' );
add_action( 'wp_enqueue_scripts', 'agnosia_enqueue_styles' );
add_action( 'admin_enqueue_scripts', 'agnosia_enqueue_styles' );
add_action( 'wp', 'agnosia_add_editor_styles' );


?>
