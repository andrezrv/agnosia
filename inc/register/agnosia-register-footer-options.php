<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the registration of footer options.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

// Footer handling

agnosia_register_option( 'show_footer' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'footer' , 
	'parent' => '' , 
	'position' => 0 ,
	'html' => array(
		'before' => '<div class="misc-pub-section" style="padding:0;">' ,
		'label' => '<strong>' . __( 'Show footer' , 'agnosia' ) . '</strong>' ,
		'description' => '' ,
		'after' => current_theme_supports( 'agnosia-footer-columns-selection' ) ? '' : '</div>' ,
	) ,
) );

agnosia_register_option( 'footer_columns_number' , array( 
	'type' => 'select' , 
	'value' => 3 , 
	'values' => array( 1 => __( 'One' , 'agnosia' ) , 2 => __( 'Two' , 'agnosia' ) , 3 => __( 'Three' , 'agnosia' ) , 4 => __( 'Four' , 'agnosia' ) ) , 
	'category' => 'footer' , 
	'parent' => 'show_footer' , 
	'position' => 1 ,
	'html' => array(
		'before' => '<div class="dependent" id="footer[show_footer][dependent]">' ,
		'label' => '<strong>' . __( 'Number of columns' , 'agnosia' ) . '</strong>' ,
		'description' => '' ,
		'after' => '</div></div>' ,
	) ,
	'display' => current_theme_supports( 'agnosia-footer-columns-selection' ) ? true : false ,
) );

agnosia_register_option( 'footer_show_credits' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'footer' , 
	'parent' => 'show_footer' , 
	'position' => 4 ,
	'html' => array(
		'before' => '<div class="misc-pub-section" style="padding:0; border-bottom:0;"><h4>' . __( 'Credits' , 'agnosia' ) . '</h4>' ,
		'label' => '<strong>' . __( 'Show credits' , 'agnosia' ) . '</strong>' ,
		'description' => '<small>' . sprintf( __( 'Support %1$sAgnosia%2$s development!' , 'agnosia' ), '<strong>' , '</strong>' ) . '</small>' ,
		'after' => '</div>' ,
	) ,
) );

?>