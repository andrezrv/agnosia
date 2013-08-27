<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the registration of header options.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

// Header properties

agnosia_register_option( 'show_header' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'header' , 
	'parent' => '' , 
	'position' => 0 ,
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show header' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '<br /><div class="dependent" id="header[show_header][dependent]">' ,
	),
) );

// header_top_navbar

if ( current_theme_supports( 'agnosia-top-navbar' ) ) :

	agnosia_register_option( 'show_header_top_navbar' , array( 
		'type' => 'checkbox' , 
		'value' => 'false' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'header' , 
		'parent' => 'show_header' , 
		'position' => 1 ,
		'html' => array(
			'before' => '<div class="misc-pub-section" style="padding: 0;"><h4 style="margin-top:0;">' . __( 'Top Menu' , 'agnosia' ) . '</h4>' ,
			'label' => '<strong>' . __( 'Show top menu' , 'agnosia' ) . '</strong>' ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'header_top_navbar_color_scheme' , array( 
		'type' => 'select' , 
		'value' => 'default' , 
		'values' => array( 'default' => 'Default' , 'inverse' => 'Inverse' ) , 
		'category' => 'header' , 
		'parent' => 'show_header_top_navbar' , 
		'position' => 2 ,
		'html' => array(
			'before' => '<div class="dependent" id="header[show_header_top_navbar][dependent]">' ,
			'label' => '<strong>' . __( 'Colour scheme' , 'agnosia' ) . '</strong>' ,
			'description' => '<br /><small>' . __( 'Use <code>class="navbar navbar-default"</code> for navigation bar, or <code>class="navbar navbar-inverse"</code> instead.' , 'agnosia' ) . ' ' . sprintf( __( '%1$sView more%2$s' , 'agnosia' ) , '<a href="http://twitter.github.com/bootstrap/components.html#navbar">', '</a>' ) . '.</small>' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'header_top_navbar_show_brand' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'header' , 
		'parent' => 'show_header_top_navbar' , 
		'position' => 3 ,
		'html' => array(
			'before' => '' ,
			'label' => '<strong>' . __( 'Show sitename' , 'agnosia' ) . '</strong>' ,
			'description' => '<small>' . __( 'Show sitename as text.' , 'agnosia' ) . '</small>' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'header_top_navbar_show_navigation' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'header' , 
		'parent' => 'show_header_top_navbar' , 
		'position' => 4 ,
		'html' => array(
			'before' => '' ,
			'label' => '<strong>' . __( 'Show navigation menu' , 'agnosia' ) . '</strong>' ,
			'description' => '<small>' . sprintf( __( 'When enabled, show %1$scustom menu%2$s (if specified) or default WordPress menu.' , 'agnosia' ) , '<a href="' . get_admin_url( false , 'nav-menus.php' ) . '">', '</a>' ) . '</small>' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'header_top_navbar_show_search' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'header' , 
		'parent' => 'show_header_top_navbar' , 
		'position' => 5 ,
		'html' => array(
			'before' => '' ,
			'label' => '<strong>' . __( 'Show search form' , 'agnosia' ) . '</strong>' ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'header_top_navbar_fixed' , array( 
		'type' => 'checkbox' , 
		'value' => 'false' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'header' , 
		'parent' => 'show_header_top_navbar' , 
		'position' => 6 ,
		'html' => array(
			'before' => '' ,
			'label' => '<strong>' . __( 'Fix to top' , 'agnosia' ) . '</strong>' ,
			'description' => '<small>' . sprintf( __( 'Only works when this same option is not enabled for %1$sheader menu%2$s.' , 'agnosia' ) , '<strong>' , '</strong>') . '</small>' ,
			'after' => '</div></div>' ,
		),
	) );

endif;

// branding

if ( current_theme_supports( 'agnosia-branding' ) ) :

	agnosia_register_option( 'show_header_branding_section' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'header' , 
		'parent' => 'show_header' , 
		'position' => 7 ,
		'html' => array(
			'before' => '<div class="misc-pub-section" style="padding: 0;"><h4>' . __( 'Branding Section' , 'agnosia' ) . '</h4>' ,
			'label' => __( 'Show branding section' , 'agnosia' ) ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'header_branding_section_site_description' , array( 
		'type' => 'checkbox' , 
		'value' => 'false' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'header' , 
		'parent' => 'show_header_branding_section' , 
		'position' => 8 ,
		'html' => array(
			'before' => '<div class="dependent" id="header[show_header_branding_section][dependent]">' ,
			'label' => '<strong>' . __( 'Show site description' , 'agnosia' ) . '</strong>' ,
			'description' => '<small>' . sprintf( __( 'Display site description defined in %1$sSettings%2$s.' , 'agnosia' ) , '<a href="' . agnosia_get_admin_settings_url() . '">', '</a>' ) . '</small>' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'header_branding_section_show_navigation' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'header' , 
		'parent' => 'show_header_branding_section' , 
		'position' => 9 ,
		'html' => array(
			'before' => '' ,
			'label' => '<strong>' . __( 'Show navigation' , 'agnosia' ) . '</strong>' ,
			'description' => '<small>' . sprintf( __( 'When enabled, show %1$scustom menu%2$s (if specified).' , 'agnosia' ) , '<a href="' . get_admin_url( false , 'nav-menus.php' ) . '">', '</a>' ) . '</small>' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'header_branding_section_show_search' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'header' , 
		'parent' => 'show_header_branding_section' , 
		'position' => 10 ,
		'html' => array(
			'before' => '' ,
			'label' => '<strong>' . __( 'Show search form' , 'agnosia' ) . '</strong>' ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'header_branding_section_use_logo' , array( 
		'type' => 'checkbox' , 
		'value' => 'false' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'header' , 
		'parent' => 'show_header_branding_section' , 
		'position' => 11 ,
		'html' => array(
			'before' => '' ,
			'label' => '<strong>' . __( 'Use logo image' , 'agnosia' ) . '</strong>' ,
			'description' => '<small>' . __( 'Use logo instead of sitename text.' , 'agnosia' ) . '</small>' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'header_branding_section_logo_url' , array( 
		'type' => 'input-upload' , 
		'value' => '' , 
		'values' => 'any' , 
		'category' => 'header' , 
		'parent' => 'header_branding_section_use_logo' , 
		'position' => 12 ,
		'html' => array(
			'before' => '<div class="dependent" id="header[header_branding_section_use_logo][dependent]">' ,
			'label' => '<strong>' . __( 'Logo URL' , 'agnosia' ) . '</strong>' ,
			'description' => '<br /><small>' . __( 'Type URL or add from Media' , 'agnosia' ) . '</small>' ,
			'after' => current_theme_supports( 'agnosia-secondary-branding' ) ? '</div>' : '</div></div></div>',
		),
	) );

	if ( current_theme_supports( 'agnosia-secondary-branding' ) ) :

		agnosia_register_option( 'header_branding_section_use_secondary_logo' , array( 
			'type' => 'checkbox' , 
			'value' => 'false' , 
			'values' => array( 'true' , 'false' ) , 
			'category' => 'header' , 
			'parent' => 'show_header_branding_section' , 
			'position' => 13 ,
			'html' => array(
				'before' => '' ,
				'label' => '<strong>' . __( 'Use secondary brand' , 'agnosia' ) . '</strong>' ,
				'description' => '<small>' . __( 'Use a secondary brand besides main branding.' , 'agnosia' ) . '</small>' ,
				'after' => '' ,
			),
		) );

		agnosia_register_option( 'header_branding_section_secondary_logo_title' , array( 
			'type' => 'input' , 
			'value' => '' , 
			'values' => 'any' , 
			'category' => 'header' , 
			'parent' => 'header_branding_section_use_secondary_logo' , 
			'position' => 14 ,
			'html' => array(
				'before' => '<div class="dependent" id="header[header_branding_section_use_secondary_logo][dependent]">' ,
				'label' => '<strong>' . __( 'Secondary brand title' , 'agnosia' ) . '</strong>' ,
				'description' => '<br /><small>' . __( 'Name of secondary brand. Text for <code>title</code> and <code>alt</code> attributes for image logo when it\'s present.' , 'agnosia' ) . '</small>' ,
				'after' => '' ,
			),
		) );

		agnosia_register_option( 'header_branding_section_secondary_logo_subtitle' , array( 
			'type' => 'input' , 
			'value' => '' , 
			'values' => 'any' , 
			'category' => 'header' , 
			'parent' => 'header_branding_section_use_secondary_logo' , 
			'position' => 15 ,
			'html' => array(
				'before' => '' ,
				'label' => '<strong>' . __( 'Secondary brand subtitle' , 'agnosia' ) . '</strong>' ,
				'description' => '<br /><small>' . __( 'Subtitle for brand name when image logo is not present.' , 'agnosia' ) . '</small>' ,
				'after' => '' ,
			),
		) );

		agnosia_register_option( 'header_branding_section_secondary_logo_url' , array( 
			'type' => 'input-upload' , 
			'value' => '' , 
			'values' => 'any' , 
			'category' => 'header' , 
			'parent' => 'header_branding_section_use_secondary_logo' , 
			'position' => 16 ,
			'html' => array(
				'before' => '' ,
				'label' => '<strong>' . __( 'Secondary brand logo URL' , 'agnosia' ) . '</strong>' ,
				'description' => '<br /><small>' . __( 'Type URL or add from Media' , 'agnosia' ) . '</small>' ,
				'after' => '' ,
			),
		) );

		agnosia_register_option( 'header_branding_section_secondary_logo_website' , array( 
			'type' => 'input' , 
			'value' => '' , 
			'values' => 'any' , 
			'category' => 'header' , 
			'parent' => 'header_branding_section_use_secondary_logo' , 
			'position' => 17 ,
			'html' => array(
				'before' => '' ,
				'label' => '<strong>' . __( 'Secondary brand website' , 'agnosia' ) . '</strong>' ,
				'description' => '<br /><small>' . __( 'URL to link logo to.' , 'agnosia' ) . '</small>' ,
				'after' => '</div></div></div>' ,
			),
		) );

	endif;

endif;

// header_navbar

if ( current_theme_supports( 'agnosia-header-navbar' ) ) :

	agnosia_register_option( 'show_header_navbar' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'header' , 
		'parent' => 'show_header' , 
		'position' => 18 ,
		'html' => array(
			'before' => '<div class="misc-pub-section" style="padding: 0;"><h4>' . __( 'Header Menu' , 'agnosia' ) . '</h4>' ,
			'label' => '<strong>' . __( 'Show navigation menu' , 'agnosia' ) . '</strong>' ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'header_navbar_color_scheme' , array( 
		'type' => 'select' , 
		'value' => 'inverse' , 
		'values' => array( 'default' => 'Default' , 'inverse' => 'Inverse' ) , 
		'category' => 'header' , 
		'parent' => 'show_header_navbar' , 
		'position' => 19 ,
		'html' => array(
			'before' => '<div class="dependent" id="header[show_header_navbar][dependent]">' ,
			'label' => '<strong>' . __( 'Colour scheme' , 'agnosia' ) . '</strong>' ,
			'description' => '<br /><small>' . __( 'Use <code>class="navbar navbar-default"</code> for navigation bar, or <code>class="navbar navbar-inverse"</code> instead.' , 'agnosia' ) . ' ' . sprintf( __( '%1$sView more%2$s' , 'agnosia' ) , '<a href="http://twitter.github.com/bootstrap/components.html#navbar">', '</a>' ) . '.</small>' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'header_navbar_show_brand' , array( 
		'type' => 'checkbox' , 
		'value' => 'false' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'header' , 
		'parent' => 'show_header_navbar' , 
		'position' => 20 ,
		'html' => array(
			'before' => '' ,
			'label' => '<strong>' . __( 'Show sitename' , 'agnosia' ) . '</strong>' ,
			'description' => '<small>' . __( 'Show sitename as text.' , 'agnosia' ) . '</small>' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'header_navbar_show_navigation' , array( 
		'type' => 'checkbox' , 
		'value' => 'true' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'header' , 
		'parent' => 'show_header_navbar' , 
		'position' => 21 ,
		'html' => array(
			'before' => '' ,
			'label' => '<strong>' . __( 'Show navigation' , 'agnosia' ) . '</strong>' ,
			'description' => '<small>' . sprintf( __( 'When enabled, show %1$scustom menu%2$s (if specified) or default WordPress menu.' , 'agnosia' ) , '<a href="' . get_admin_url( false , 'nav-menus.php' ) . '">', '</a>' ) . '</small>' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'header_navbar_show_search' , array( 
		'type' => 'checkbox' , 
		'value' => 'false' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'header' , 
		'parent' => 'show_header_navbar' , 
		'position' => 22 ,
		'html' => array(
			'before' => '' ,
			'label' => '<strong>' . __( 'Show search form' , 'agnosia' ) . '</strong>' ,
			'description' => '' ,
			'after' => '' ,
		),
	) );

	agnosia_register_option( 'header_navbar_fixed' , array( 
		'type' => 'checkbox' , 
		'value' => 'false' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'header' , 
		'parent' => 'show_header_navbar' , 
		'position' => 23 ,
		'html' => array(
			'before' => '' ,
			'label' => '<strong>' . __( 'Fix to top' , 'agnosia' ) . '</strong>' ,
			'description' => '<small>' . sprintf( __( 'Fix menu to top. Overrides this setting in %1$stop menu%2$s.' , 'agnosia' ), '<strong>', '</strong>' ) . '</small>' ,
			'after' => '</div></div>' ,
		),
	) );

endif;

// site_description

if ( current_theme_supports( 'agnosia-additional-site-description' ) ) :

	agnosia_register_option( 'show_site_description' , array( 
		'type' => 'checkbox' , 
		'value' => 'false' , 
		'values' => array( 'true' , 'false' ) , 
		'category' => 'header' , 
		'parent' => 'show_header' , 
		'position' => 24 ,
		'html' => array(
			'before' => '<div class="misc-pub-section" style="padding: 0; border-bottom: none;"><h4>' . __( 'Site description' , 'agnosia' ) . '</h4>' ,
			'label' => '<strong>' . __( 'Show site description' , 'agnosia' ) . '</strong>' ,
			'description' => '<small>' . sprintf( __( 'Display site description defined in %1$sSettings%2$s into a separated element' , 'agnosia' ) , '<a href="' . agnosia_get_admin_settings_url() . '">', '</a>' ) . '</small>' ,
			'after' => '</div></div>' ,
		),
	) );

endif;

?>