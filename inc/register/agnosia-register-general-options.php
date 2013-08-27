<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the registration of general options.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

agnosia_register_option( 'responsive' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'general' , 
	'parent' => '' , 
	'position' => 0 ,
	'html' => array(
		'before' => '<div class="misc-pub-section" style="padding:0;"><h4>' . __( 'Compatibility' , 'agnosia' ) . '</h4>' ,
		'label' => sprintf( __( 'Make %1$sAgnosia%2$s responsive' , 'agnosia' ), '<strong>', '</strong>' ) ,
		'description' => '<small>' . sprintf( __( 'Enable %1$sBootstrap%2$s responsive features' , 'agnosia') , '<strong>' , '</strong>' ) . '. ' . sprintf( __( '%1$sView more info%2$s' , 'agnosia' ), '<a href="' . agnosia_get_bootstrap_url() . '">', '</a>' ) . '.</small>' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'use_prefixfree' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'general' , 
	'parent' => '' , 
	'position' => 1 ,
	'html' => array(
		'before' => '' ,
		'label' => sprintf( __( 'Use %1$s-prefix-free%2$s' , 'agnosia' ), '<strong>', '</strong>' ) ,
		'description' => '<small>' . sprintf( __( 'The %1$s-prefix-free%2$s tool lets you use only unprefixed CSS properties everywhere. It works behind the scenes, adding the current browser\'s prefix to any CSS code, only when it\'s needed.' , 'agnosia' ) , '<strong>' , '</strong>' ) . ' ' . sprintf( __( '%1$sView more info%2$s' , 'agnosia' ), '<a href="' . agnosia_get_prefixfree_url() . '">', '</a>' ) . '</small>' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'general_transform_btn' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'general' , 
	'parent' => '' , 
	'position' => 2 ,
	'html' => array(
		'before' => '<h5>' . __( 'Bootstrap' , 'agnosia' ) . '</h5>' ,
		'label' => __( 'Adapt buttons' , 'agnosia' ) ,
		'description' => '<small>' . __( 'Add <code>class="btn"</code> to <code>button</code> and <code>input[type="submit"]</code> tags via jQuery.' , 'agnosia' ) . '</small>' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'general_transform_table' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'general' , 
	'parent' => '' , 
	'position' => 3 ,
	'html' => array(
		'before' => '' ,
		'label' => __( 'Adapt tables' , 'agnosia' ),
		'description' => '<small>' . __( 'Add <code>class="table"</code> to <code>table</code> tags via jQuery.' , 'agnosia' ) . '</small>' ,
		'after' => '</div>' ,
	),
) );

agnosia_register_option( 'stylesheet' , array( 
	'type' => 'select' , 
	'value' => 'agnosia-basic' , 
	'values' => agnosia_get_styles() ,
	'category' => 'general' , 
	'parent' => '' , 
	'position' => 4 ,
	'html' => array(
		'before' => '<div class="misc-pub-section" style="padding:0;"><h4>' . __( 'Style' , 'agnosia' ) . '</h4>' ,
		'label' => '<strong>' . __( 'Main Template' , 'agnosia' ) . '</strong>' ,
		'description' => ' <small>' . sprintf( __( 'Choose from %1$sAgnosia%2$s built-in styles.' , 'agnosia' ), '<strong>', '</strong>' ) . '</small>',
		'after' => '' ,
	) ,
) );

if ( current_theme_supports( 'agnosia-dynamic-wrapper' ) ) :

	agnosia_register_option( 'wrap_to_content' , array( 
		'type' => 'select' , 
		'value' => 'wrap-with-container' , 
		'values' => array( 
			'no-wrap' => __( 'No wrap' , 'agnosia' ) , 
			'wrap-with-container' => __( 'Wrap with container' , 'agnosia' ) , 
			'wrap-header' => __( 'Wrap header to content' , 'agnosia' ) , 
			'wrap-footer' => __( 'Wrap footer to content' , 'agnosia' ) , 
			'wrap-both' => __( 'Wrap both header and footer to content' , 'agnosia' ) 
		) ,
		'category' => 'general' , 
		'parent' => '' , 
		'position' => 5 ,
		'html' => array(
			'before' => '' ,
			'label' => '<strong>' . __( 'Wrapper style' , 'agnosia' ) . '</strong>',
			'description' => ' <small>' . __( 'Define how to wrap the site containers.' , 'agnosia' ) . '</small>' ,
			'after' => '' ,
		) ,
	) );

endif;

agnosia_register_option( 'custom_stylesheet' , array( 
	'type' => 'input' , 
	'value' => '' , 
	'values' => 'any' ,
	'category' => 'general' , 
	'parent' => '' , 
	'position' => 6 ,
	'html' => array(
		'before' => '' ,
		'label' => '<strong>' . __( 'Custom stylesheet' , 'agnosia' ) . '</strong>' ,
		'description' => '<br /><small>' . __( 'Use your own CSS file for adding details and/or overriding the main styles' , 'agnosia' ) . '.<br /><strong>' . __( 'It must be a valid URL, and you have to upload the file to your desired location on your own.', 'agnosia' ) . '</strong></small>' ,
		'after' => '</div>' ,
	) ,
) );

agnosia_register_option( 'custom_favicon' , array( 
	'type' => 'input' , 
	'value' => '' , 
	'values' => 'any' ,
	'category' => 'general' , 
	'parent' => '' , 
	'position' => 7 ,
	'html' => array(
		'before' => '<div class="misc-pub-section" style="padding:0; border-bottom: none;">' ,
		'label' => '<strong>' . __( 'Custom Favicon' , 'agnosia' ) . '</strong>' ,
		'description' => '<br /><small>' . __( 'Use your own favicon.' , 'agnosia' ) . ' <strong>' . __( 'It must be a valid URL, and you have to upload the file manually or via FTP to your desired location into your WordPress installation.' , 'agnosia' ) . '</strong></small>' ,
		'after' => '</div>' ,
		'relative_to' => agnosia_get_home_url() . '/' ,
	) ,
) );

?>