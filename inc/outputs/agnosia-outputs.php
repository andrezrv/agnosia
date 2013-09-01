<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file contains functions that return or echo little dynamic chunks of HTML code.
 * All the functions contained in this file are filterable.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */


/* HTML outputs and respective getters */


function agnosia_home_url() {

    $agnosia_home_url = agnosia_get_home_url();
    $agnosia_home_url = apply_filters( __FUNCTION__ , $agnosia_home_url );

    echo $agnosia_home_url;

}



function agnosia_get_home_url() {

    $agnosia_home_url = home_url();
    $agnosia_home_url = apply_filters( __FUNCTION__, $agnosia_home_url );

    return $agnosia_home_url;

}



function agnosia_admin_settings_url() {

    $agnosia_admin_settings_url = agnosia_get_admin_settings_url();
    $agnosia_admin_settings_url = apply_filters( __FUNCTION__ , $agnosia_admin_settings_url );

    echo $agnosia_admin_settings_url;

}


/**
 * Obtain URL of settings page in admin dashboard.
 * Is there a native way to do this? I didn't find any and feel kinda silly doing this.
 * @author: andrezrv
 */
function agnosia_get_admin_settings_url() {

    $agnosia_admin_settings_url = get_admin_url() . 'options-general.php';
    $agnosia_admin_settings_url = apply_filters( __FUNCTION__, $agnosia_admin_settings_url );

    return $agnosia_admin_settings_url;

}



function agnosia_reset_link_url() {

    $agnosia_reset_link_url = agnosia_get_reset_link_url();
    $agnosia_reset_link_url = apply_filters( __FUNCTION__ , $agnosia_reset_link_url );

    echo $agnosia_reset_link_url;

}



function agnosia_get_reset_link_url() {

    $agnosia_reset_link_url = get_admin_url() . 'themes.php?page=agnosia-theme-options&reset=defaults';
    $agnosia_reset_link_url = apply_filters( __FUNCTION__, $agnosia_reset_link_url );

    return $agnosia_reset_link_url;

}



function agnosia_bootstrap_url() {

    $agnosia_bootstrap_url = agnosia_get_bootstrap_url();
    $agnosia_bootstrap_url = apply_filters( __FUNCTION__ , $agnosia_bootstrap_url );

    echo $agnosia_bootstrap_url;

}



function agnosia_get_bootstrap_url() {

    $agnosia_bootstrap_url = 'http://getbootstrap.com/';
    $agnosia_bootstrap_url = apply_filters( __FUNCTION__, $agnosia_bootstrap_url );

    return $agnosia_bootstrap_url;

}



function agnosia_prefixfree_url() {

    $agnosia_prefixfree_url = agnosia_get_prefixfree_url();
    $agnosia_prefixfree_url = apply_filters( __FUNCTION__ , $agnosia_prefixfree_url );

    echo $agnosia_prefixfree_url;

}



function agnosia_get_prefixfree_url() {

    $agnosia_prefixfree_url = 'http://leaverou.github.com/prefixfree/';
    $agnosia_prefixfree_url = apply_filters( __FUNCTION__, $agnosia_prefixfree_url );

    return $agnosia_prefixfree_url;

}



function agnosia_body_class() {

    $output =  agnosia_get_body_class();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;
}



function agnosia_get_body_class() {

    global $post;
    
    $body_class = '';

    // Add class depending on responsive settings
    if( agnosia_evaluate('responsive') ) : $body_class .= ' responsive';
    else : $body_class .= 'non-responsive';
    endif;

    // Add class depending on left sidebar presence
    if ( agnosia_evaluate_show( 'show_left_sidebar' , 'hide_left_sidebar' , $post ) ) :
        $body_class .= ' has-left-sidebar';
    else :
        $body_class .= ' no-left-sidebar';
    endif;

    // Add class depending on right sidebar presence
    if ( agnosia_evaluate_show( 'show_right_sidebar' , 'hide_right_sidebar' , $post ) ) :
        $body_class .= ' has-right-sidebar';
    else :
        $body_class .= ' no-right-sidebar';
    endif;

    if ( get_header_image() ) : $body_class .= ' has-custom-header';
    endif;

    if ( current_theme_supports( 'agnosia-dynamic-wrapper' ) ) :

        // Add class depending on wrapper settings
        $body_class .= ' ' . agnosia_get_wrapper_class();

    endif;

    $body_class = apply_filters( __FUNCTION__, $body_class );

    return $body_class;

}



function agnosia_get_wrapper_class() {

    $wrap_to_content = agnosia_get('wrap_to_content');
    $wrap_to_content = apply_filters( __FUNCTION__, $wrap_to_content );

    return $wrap_to_content;

}



function agnosia_custom_header() {

    $output = agnosia_get_custom_header();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_custom_header() {

    $output = false;
    
    if ( get_header_image() ) : $output = 'style="background-image: url(\''.get_header_image().'\')"'; endif;
    
    $output = apply_filters( __FUNCTION__, $output );

    return $output;

}



function agnosia_wrapper_style() {

    $output = agnosia_get_wrapper_style();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_wrapper_style() {

    $style = '';

    if ( current_theme_supports( 'agnosia-dynamic-wrapper' ) 
        and 'no-wrap' == agnosia_get( 'wrap_to_content' ) 
    ) : $style = 'wide-container';
    else : $style = 'container';
    endif;

    $style = apply_filters( __FUNCTION__ , $style );

    return $style; 

}



function agnosia_archive_title() {

    $output = agnosia_get_archive_title();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_archive_title() {

    /* Block output */
    ob_start();
    
    if ( is_category() ) : 
        echo sprintf( __('Archive for the %s Category' , 'agnosia' ) , single_term_title('',false) );

    /* If this is a tag archive */ elseif ( is_tag() ) :
        _e( 'Posts tagged' , 'agnosia' ); echo ' &#8216'; single_tag_title(); echo '&#8217';

    /* If this is a daily archive */ elseif ( is_day() ) :
        _e( 'Archive For ' , 'agnosia' ); echo ' '; the_time( get_option( 'date_format' ) );

    /* If this is a monthly archive */ elseif ( is_month() ) :
        _e( 'Archive For ' , 'agnosia' ); echo ' '; the_time( agnosia_get_month_format() );

    /* If this is a yearly archive */ elseif ( is_year() ) :
        _e( 'Archive For ' , 'agnosia' ); echo ' '; the_time( agnosia_get_year_format() );

    /* If this is an author archive */ elseif ( is_author() ) :
        _e( 'Author Archive' , 'agnosia' );

    /* If this is a paged archive */ elseif ( get_query_var( 'paged' ) ) :
        _e( 'Blog Archives' , 'agnosia' );
            
    endif;

    /* Capture output */
    $archive_title = ob_get_contents();

    /* Unblock output */
    ob_end_clean();

    $archive_title = apply_filters( __FUNCTION__, $archive_title );

    return $archive_title;

}


/**
 * This should be obtained from an option, not hardcoded. Set for v1.0-RC1.2
 * @author: andrezrv
 */
function agnosia_get_month_format() {
    $output = agnosia_get( 'general_month_format' );
    $output = apply_filters( __FUNCTION__, $output );
    return $output;
}


/**
 * This should be obtained from an option, not hardcoded. Set for v1.0-RC1.2
 * @author: andrezrv
 */
function agnosia_get_year_format() {
    $output = agnosia_get( 'general_year_format' );;
    $output = apply_filters( __FUNCTION__, $output );
    return $output;
}



function agnosia_header_branding_logo() {

    $output = agnosia_get_header_branding_logo();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_header_branding_logo() {

    $output = '';

    if ( wp_remote_get( agnosia_get( 'header_branding_section_logo_url' ) ) ) :

        $output = agnosia_get( 'header_branding_section_logo_url' );

    endif;

    $output = apply_filters( __FUNCTION__ , $output );

    return $output;

}



function agnosia_search_form() {

    $output = agnosia_get_search_form();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_search_form() {

    $html = false;

    if ( agnosia_get('header_navbar_show_search') == 'true' ) :

        /* Block output */
        ob_start();

        get_search_form();

        /* Capture output */
        $html = ob_get_contents();

        /* Unblock output */
        ob_end_clean();

    endif;

    $html = apply_filters( __FUNCTION__ , $output );

    return $html;

}



function agnosia_header_navbar_search_form() {
    
    $output = agnosia_get_header_navbar_search_form();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_header_navbar_search_form() {

    /* Block output */
    ob_start();

    get_search_form();

    /* Capture output */
    $html = ob_get_contents();

    /* Unblock output */
    ob_end_clean();

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}



function agnosia_header_navbar_class() {

    $output = agnosia_get_header_navbar_class();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_header_navbar_class() {

    $class = false;

    if ( agnosia_get( 'header_navbar_fixed' ) == 'true' ) : $class = 'fix-to-top'; endif;
    
    $class = apply_filters( __FUNCTION__ , $class );

    return $class;

}



function agnosia_branding_navbar_class() {

    $output = agnosia_get_branding_navbar_class();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_branding_navbar_class() {

    $class = 'branding';    
    $class = apply_filters( __FUNCTION__ , $class );

    return $class;

}



function agnosia_header_menu_class() {

    $output = agnosia_get_header_menu_class();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_header_menu_class() {

    $class = 'menu-container';
    $class = apply_filters( __FUNCTION__, $class );

    return $class;

}



function agnosia_header_navbar_toggle() {
    
    $output = agnosia_get_header_navbar_toggle();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_header_navbar_toggle() {

    $html = false;

    if ( agnosia_evaluate( 'header_navbar_show_search' ) ) : $html = 'onclick="jQuery(\'#header-searchform\').toggle();"';  endif;
    
    $html = apply_filters( __FUNCTION__, $output );

    return $html;

}



function agnosia_header_top_navbar_search_form() {

    $output = agnosia_get_header_top_navbar_search_form();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_header_top_navbar_search_form() {

    /* Block output */
    ob_start();

    agnosia_load_template( 'top-navbar-searchform'  , 'header' );

    /* Capture output */
    $html = ob_get_contents();

    /* Unblock output */
    ob_end_clean();

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}



function agnosia_header_top_navbar_class() {

    $output = agnosia_get_header_top_navbar_class();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_header_top_navbar_class() {

    $class = false;

    if ( agnosia_evaluate('header_top_navbar_fixed') ) : $class = 'fix-to-top'; endif;
    
    $class = apply_filters( __FUNCTION__, $class );

    return $class;

}



function agnosia_top_navbar_row_class() {

    $output = agnosia_get_top_navbar_row_class();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_top_navbar_row_class() {

    $class = 'navbar-row';
    $class = apply_filters( __FUNCTION__, $class );

    return $class;

}



function agnosia_header_navbar_row_class() {

    $output = agnosia_get_header_navbar_row_class();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_header_navbar_row_class() {

    $class = 'navbar-row';
    $class = apply_filters( __FUNCTION__, $class );

    return $class;

}



function agnosia_branding_navbar_nav_class() {

    $output = agnosia_get_branding_navbar_nav_class();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_branding_navbar_nav_class() {

    $class = 'navbar';
    $class = apply_filters( __FUNCTION__, $class );

    return $class;

}



function agnosia_branding_navbar_row_class() {

    $output = agnosia_get_branding_navbar_row_class();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_branding_navbar_row_class() {

    $class = 'navbar-row';
    $class = apply_filters( __FUNCTION__, $class );

    return $class;

}



function agnosia_top_brand_container_class() {

    $output = agnosia_get_top_brand_container_class();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_top_brand_container_class() {

    $class = 'brand-container';
    $class = apply_filters( __FUNCTION__, $class );

    return $class;

}



function agnosia_header_brand_container_class() {

    $output = agnosia_get_header_brand_container_class();
    $output = apply_filters( __FUNCTION__ , $output );

    echo $output;

}



function agnosia_get_header_brand_container_class() {

    $class = 'brand-container';
    $class = apply_filters( __FUNCTION__ , $class );

    return $class;

}



function agnosia_single_branding_container_class() {

    $output = agnosia_get_single_branding_container_class();
    $output = apply_filters( __FUNCTION__ , $output );

    echo $output;

}



function agnosia_get_single_branding_container_class() {

    $class = 'brand-container sitename';
    $class = apply_filters( __FUNCTION__ , $class );

    return $class;

}



function agnosia_primary_branding_container_class() {

    $output = agnosia_get_primary_branding_container_class();
    $output = apply_filters( __FUNCTION__ , $output );

    echo $output;

}



function agnosia_get_primary_branding_container_class() {

    $class = 'brand-container sitename span6';
    $class = apply_filters( __FUNCTION__ , $class );
    return $class;

}



function agnosia_secondary_branding_container_class() {

    $output = agnosia_get_secondary_branding_container_class();
    $output = apply_filters( __FUNCTION__ , $output );

    echo $output;

}



function agnosia_get_secondary_branding_container_class() {

    $class = 'brand-container sitename span6';
    $class = apply_filters( __FUNCTION__ , $class );

    return $class;

}



function agnosia_double_branding_container_class() {

    $output = agnosia_get_double_branding_container_class();
    $output = apply_filters( __FUNCTION__ , $output );

    echo $output;

}



function agnosia_get_double_branding_container_class() {

    $class = 'brands-container row-fluid';
    $class = apply_filters( __FUNCTION__ , $class );

    return $class;

}



function agnosia_top_navigation_class() {

    $output = agnosia_get_top_navigation_class();
    $output = apply_filters( __FUNCTION__ , $output );

    echo $output;

}



function agnosia_get_top_navigation_class() {

    $class = 'nav-collapse collapse';
    $class = apply_filters( __FUNCTION__ , $class );

    return $class;

}



function agnosia_header_navigation_class() {

    $output = agnosia_get_header_navigation_class();
    $output = apply_filters( __FUNCTION__ , $output );

    echo $output;

}



function agnosia_get_header_navigation_class() {

    $class = 'nav-collapse collapse';
    $class = apply_filters( __FUNCTION__ , $class );

    return $class;

}



function agnosia_branding_navigation_class() {

    $output = agnosia_get_branding_navigation_class();
    $output = apply_filters( __FUNCTION__ , $output );

    echo $output;

}



function agnosia_get_branding_navigation_class() {

    $class = 'nav-collapse collapse';
    $class = apply_filters( __FUNCTION__ , $class );

    return $class;

}



function agnosia_header_navbar_span() {

    $output = agnosia_get_header_top_navbar_span();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_header_navbar_span() {

    $span = 12;

    if ( agnosia_evaluate('header_navbar_show_search') ) : $span = $span - 3; endif;

    $span = 'span' . $span;
    
    $span = apply_filters( __FUNCTION__, $span );

    return $span;

}



function agnosia_header_top_navbar_span() {

    $output = agnosia_get_header_top_navbar_span();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_header_top_navbar_span() {

    $span = 12;

    if ( agnosia_evaluate( 'header_top_navbar_show_search' ) ) : $span = $span - 3; endif;

    $span = 'span' . $span;
    
    $span = apply_filters( __FUNCTION__, $span );

    return $span;

}



function agnosia_header_top_menu_class() {

    $output = agnosia_get_header_top_menu_class();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_header_top_menu_class() {

    $class = 'menu-container';
    $class = apply_filters( __FUNCTION__, $class );

    return $class;

}



function agnosia_branding_top_menu_class() {

    $output = agnosia_get_branding_top_menu_class();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_branding_top_menu_class() {

    $class = 'menu-container';
    $class = apply_filters( __FUNCTION__, $class );

    return $class;

}



function agnosia_top_searchform_container_class() {

    $output = agnosia_get_top_searchform_container_class();
    $output = apply_filters( __FUNCTION__ , $output );

    echo $output;

}



function agnosia_get_top_searchform_container_class() {

    $class = 'searchform-container';
    $class = apply_filters( __FUNCTION__ , $class );

    return $class;

}



function agnosia_header_searchform_container_class() {

    $output = agnosia_get_header_searchform_container_class();
    $output = apply_filters( __FUNCTION__ , $output );

    echo $output;

}



function agnosia_get_header_searchform_container_class() {

    $class = 'searchform-container';
    $class = apply_filters( __FUNCTION__ , $class );

    return $class;

}



function agnosia_branding_searchform_container_class() {

    $output = agnosia_get_branding_searchform_container_class();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_branding_searchform_container_class() {

    $class = 'searchform-container';
    $class = apply_filters( __FUNCTION__, $class );
    return $class;

}



function agnosia_header_top_navbar_toggle() {

    $output = agnosia_get_header_top_navbar_toggle();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_header_top_navbar_toggle() {

    $html = false;

    if ( agnosia_evaluate( 'header_top_navbar_show_search' ) ) : $html = 'onclick="jQuery(\'#top-searchform\').toggle();"';  endif;
    
    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}



function agnosia_header_branding_navbar_search_form() {
    
    $output = agnosia_get_header_branding_navbar_search_form();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_header_branding_navbar_search_form() {

    /* Block output */
    ob_start();

    agnosia_load_template( 'branding-navbar-searchform'  , 'header' );

    /* Capture output */
    $html = ob_get_contents();

    /* Unblock output */
    ob_end_clean();

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}



function agnosia_header_branding_navbar_toggle() {

    $output = agnosia_get_header_branding_navbar_toggle();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_header_branding_navbar_toggle() {

    $html = false;

    if ( agnosia_evaluate( 'header_branding_section_show_search' ) ) : $html = 'onclick="jQuery(\'#branding-searchform\').toggle();"';  endif;
    
    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}



function agnosia_header_branding_navigation_class() {
    
    $output = agnosia_get_header_branding_navigation_class();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_header_branding_navigation_class() {

    $html = false;

    if ( !agnosia_evaluate('header_branding_section_show_search') or agnosia_header_branding_has_secondary_logo() ) : return 'full-navigation span12';
    else : return 'span9';
    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}



function agnosia_branding_menu_class() {

    $output = agnosia_get_branding_menu_class();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_branding_menu_class() {

    $class = '';

    if ( agnosia_header_branding_has_secondary_logo() ) : $class .= '';
    else : $class .= 'span8 ';
    endif;

    if ( !agnosia_evaluate( 'header_branding_section_show_search' ) or agnosia_header_branding_has_secondary_logo() ) : $class .= 'no-search '; endif;

    $class = apply_filters( __FUNCTION__, $class );
    
    return $class;

}



function agnosia_header_branding_background() {
    
    $output = agnosia_get_header_branding_background();
    $output = apply_filters( __FUNCTION__ , $output );

    echo $output;

}



function agnosia_get_header_branding_background() {

    $html = false;
    
    if ( get_header_image() ) : $html = 'style="background-image: url(\''.get_header_image().'\')"'; endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}



function agnosia_content_colspan() {

    $output = agnosia_get_content_colspan();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_content_colspan() {

    global $post;

    $span = 0;

    if ( !is_404() or !is_search() ) :

        if ( 
            agnosia_evaluate_show( 'content_show_page_hierarchy' , 'content_hide_page_hierarchy' , $post ) 
            and agnosia_has_page_hierarchy( $post ) 
        ) :

            $span = $span + 3;

        endif;

    endif;

    if ( current_theme_supports( 'agnosia-left-sidebar' ) 
        and agnosia_evaluate_show( 'show_left_sidebar' , 'hide_left_sidebar' , $post ) 
    ) : 
        $span = $span + 3;
    endif;
        
    if ( current_theme_supports( 'agnosia-right-sidebar' ) 
        and agnosia_evaluate_show( 'show_right_sidebar' , 'hide_right_sidebar' , $post ) ) : 
        $span = $span + 3;
    endif;

    $span = 12 - $span;
    $span = 'span' . $span;

    $span = apply_filters( __FUNCTION__, $span );

    return $span;

}


function agnosia_footer_colspan() {
    
    $output = agnosia_get_footer_colspan();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_footer_colspan() {

    $columns = agnosia_get('footer_columns_number');
    $span = ( 12 / $columns );
    $span = 'span' . $span;

    $span = apply_filters( __FUNCTION__ , $span );

    return $span;

}



function agnosia_post_class() {

    $output = agnosia_get_post_class();
    $output = apply_filters( __FUNCTION__ , $output );

    echo $output;

}



function agnosia_get_post_class() {

    $class = '';

    if ( is_home() ) : $class = 'home';
    elseif ( is_author() ) : $class = 'author';
    elseif ( is_search() ) : $class = 'search';
    elseif ( is_date() ) : $class = 'date';
    elseif ( is_month() ) : $class = 'month';
    elseif ( is_year() ) : $class = 'year';
    elseif ( is_category() ) : $class = 'category';
    elseif ( is_archive() ) : $class = 'archive';
    elseif ( is_page() ) : $class = 'page';
    elseif ( is_single() ) : $class = 'single';
    elseif ( is_404() ) : $class = '404';
    endif;

    if ( is_front_page() ) : $class .= ' frontpage'; endif;

    if ( is_archive() ) : 
        $page = get_query_var('paged') ? get_query_var('paged') : '1';
        $class .= ' page-' . $page;
    endif;

    if ( is_sticky() ) : $class .= ' sticky'; endif;

    $class = apply_filters( __FUNCTION__ , $class );

    return $class;

}



function agnosia_post_format() {

    $output = agnosia_get_post_format();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_post_format() {

    $post_format = get_post_format() ? get_post_format() : 'standard';
    $post_format = apply_filters( __FUNCTION__, $post_format );

    return $post_format;

}



function agnosia_prefixed_post_format() {

    $output = agnosia_get_prefixed_post_format();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_prefixed_post_format() {

    $prefixed_post_format = get_post_format() ? '_' . get_post_format() : '';
    $prefixed_post_format = apply_filters( __FUNCTION__, $prefixed_post_format );

    return $prefixed_post_format;

}



function agnosia_prefixed_page_format() {

    $output = agnosia_get_prefixed_page_format();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_prefixed_page_format() {

    $prefixed_post_format = get_post_format() ? '_post_' . get_post_format() : '_page';
    $prefixed_post_format = apply_filters( __FUNCTION__, $prefixed_post_format );
    
    return $prefixed_post_format;

}



function agnosia_wp_link_pages() {

    global $page;

    $html = agnosia_get_wp_link_pages();

    /*$html = str_replace( '<a' , '<li><a' , $html );*/
    $html = str_replace( '</li></a>' , '</a></li>' , $html );
    $html = str_replace( '><li>' , '>' , $html );
    $html = str_replace( '<a' , '<li><a' , $html );
    $html = str_replace( ' ' . $page . ' <', '<li class="active disabled"><a> ' . $page . ' </a></li><' , $html );
    $html = str_replace( '<li>' . $page . '</li>', '<li class="active disabled"><a> ' . $page . ' </a></li>' , $html );

    $html = apply_filters( __FUNCTION__, $html );

    echo $html;

}



function agnosia_get_wp_link_pages() {

    $args = array(
        'before'           => '<section class="pagination"><div class="pull-left"><span>' . __( 'Pages:' , 'agnosia' ) . '</span></div><ul>',
        'after'            => '</ul></section>',
        'link_before'      => '<li>',
        'link_after'       => '</li>',
        'next_or_number'   => 'number',
        'nextpagelink'     => __( 'Next page' , 'agnosia' ),
        'previouspagelink' => __( 'Previous page' , 'agnosia' ),
        'pagelink'         => '%',
        'echo'             => 0
    );

    $html = wp_link_pages( $args );

    $html = apply_filters( __FUNCTION__, $html );
    
    return $html;

}



function agnosia_span_for_sitename_single_branding() {

    $output = agnosia_get_span_for_sitename_single_branding();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_span_for_sitename_single_branding() {

    $span = 12;

    if ( agnosia_evaluate( 'header_branding_section_show_search' ) ) : $span = $span - 3; endif;

    $span = 'span' . $span;

    $span = apply_filters( __FUNCTION__, $span );

    return $span;

}




function agnosia_span_for_navigation_single_branding() {

    $output = agnosia_get_span_for_navigation_single_branding();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_span_for_navigation_single_branding() {

    $html = '';

    if ( agnosia_evaluate('header_branding_section_show_search') ) : 
    
        $html = 'span8';
    
    else : $html = 'span12';

    endif;

    $html = apply_filters( __FUNCTION__ , $html );

    return $html;

}



function agnosia_span_for_search_single_branding() {

    $output = agnosia_get_span_for_search_single_branding();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_span_for_search_single_branding() {

    $html = '';

    if ( agnosia_evaluate('header_branding_section_show_navigation') ) : 
    
        $html = 'span4';
    
    else : 

        $html = 'span12';
    
    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;    

}



function agnosia_span_for_branding_left_column_single_branding () {

    $output = agnosia_get_span_for_branding_left_column_single_branding();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_span_for_branding_left_column_single_branding() {

    $html = '';

    if ( agnosia_evaluate( 'header_branding_section_show_search' ) ) : 
    
        $html = 'span9';
    
    else : $html = 'span12';
    
    endif;

    $html = apply_filters( __FUNCTION__ , $html );

    return $html;

}



function agnosia_span_for_branding_menu_double_branding () {

    $output = agnosia_get_span_for_branding_menu_double_branding();
    $output = apply_filters( __FUNCTION__, $output );
    
    echo $output;

}



function agnosia_get_span_for_branding_menu_double_branding() {

    $html = '';

    if ( agnosia_evaluate( 'header_branding_section_show_search' ) ) : 
    
        $html = 'span9';
    
    else : $html = 'span12';
    
    endif;

    $html = apply_filters( __FUNCTION__, $html );
    
    return $html;

}



function agnosia_span_for_branding_search_double_branding () {

    $output = agnosia_get_span_for_branding_search_double_branding();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_get_span_for_branding_search_double_branding() {

    $html = '';

    if ( agnosia_evaluate( 'header_branding_section_show_navigation' ) ) : 
    
        $html = 'span3';
    
    else : $html = 'span12';
    
    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}



function agnosia_post_thumbnail_img() {

    $output = '';

    if ( has_post_thumbnail() ) :

        $img_data = wp_get_attachment_image_src( get_post_thumbnail_id() , 'full' );
        $img_url = $img_data[0]; // the url of the thumbnail picture
        $img_width = $img_data[1]; // thumbnail's width
        $img_height = $img_data[2]; // thumbnail's height 

        ob_start(); ?> 

        <section id="post-<?php echo get_post_thumbnail_id(); ?>-thumbnail">

            <?php the_post_thumbnail(); ?>

        </section>

        <?php

        $output .= ob_get_contents();

        ob_end_clean();
        ob_flush();

    endif;

    $output = apply_filters( __FUNCTION__, $output );

    echo $output;
    
}



function agnosia_try_post_thumbnail_bg() {

    $html = '';

    if( agnosia_post_show_thumbnail_after_header_bg() ) :

        ob_start();

        agnosia_post_thumbnail_after_header_bg();

        $html = ob_get_contents();

        ob_end_clean();
        ob_flush();

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    echo $html;

}



function agnosia_post_thumbnail_after_header_bg() {

    $output = '';

    if ( has_post_thumbnail() ) :

        $img_data = wp_get_attachment_image_src( get_post_thumbnail_id() , 'full' );
        $img_url = $img_data[0]; // the url of the thumbnail picture
        $img_width = $img_data[1]; // thumbnail's width
        $img_height = $img_data[2]; // thumbnail's height 

        $output = ' style="background-image: url(\'' . $img_url . '\');"';

    endif;

    $output = apply_filters( __FUNCTION__, $output );

    echo $output;
    
}



function agnosia_header_branding_secondary_logo() {

    $output = '';

    if ( agnosia_header_branding_has_secondary_logo() ) : 

        ob_start();

        ?>

        <?php if ( agnosia_get( 'header_branding_section_secondary_logo_website' ) ) : ?>
            <a href="<?php echo agnosia_get( 'header_branding_section_secondary_logo_website' ); ?>">
        <?php endif; ?>

        <?php if ( agnosia_header_branding_secondary_logo_img_exists() ) : ?>
                <img alt="<?php echo agnosia_get( 'header_branding_section_secondary_logo_title' ); ?>" title="<?php echo agnosia_get('header_branding_section_secondary_logo_title'); ?>" src="<?php echo agnosia_get('header_branding_section_secondary_logo_url') ?>" />
        <?php else : ?>
                <?php echo agnosia_get( 'header_branding_section_secondary_logo_title' ); ?>
        <?php endif; ?>

        <?php if ( agnosia_get( 'header_branding_section_secondary_logo_website' ) ) : ?>
            </a>
        <?php endif; ?>

        <?php

        $output = ob_get_contents();

        ob_end_clean();
        ob_flush();

    endif;

    $output = apply_filters( __FUNCTION__, $output );
    echo $output;

}



function agnosia_header_branding_section_secondary_logo_subtitle() {

    $output = agnosia_get( 'header_branding_section_secondary_logo_subtitle' );
    $output = apply_filters( __FUNCTION__ , $output );

    echo $output;

}



function agnosia_header_navbar_color_scheme() {

    if ( 'inverse' == agnosia_get( 'header_navbar_color_scheme' ) ) : $output = ' navbar-inverse ';
    elseif ( 'default' == agnosia_get( 'header_navbar_color_scheme' ) ) : $output = ' navbar-default ';
    else : $output = '';
    endif;

    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_header_top_navbar_color_scheme() {

    if ( 'inverse' == agnosia_get( 'header_top_navbar_color_scheme' ) ) : $output = ' navbar-inverse ';
    elseif ( 'default' == agnosia_get( 'header_top_navbar_color_scheme' ) ) : $output = ' navbar-default ';
    else : $output = '';
    endif;

    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_post_custom_stylesheet() {

    $output = '';

    if ( agnosia_post_has_custom_stylesheet() ) :

        $output = '<link rel="stylesheet" id="post-custom-stylesheet" type="text/css" href="'. esc_attr( agnosia_post_get_custom_stylesheet() ). '" media="all" />';

    endif;

    $output = apply_filters( __FUNCTION__ , $output );

    echo $output;
    
}



function agnosia_custom_favicon() {

    $output = '';

    if ( agnosia_has_custom_favicon() ) :

        $output .= '<link rel="shortcut icon" id="post-custom-favicon" href="'. agnosia_get_home_url() . '/' . esc_attr( agnosia_get_custom_favicon() ). '?v=' . sanitize_title( current_time( 'mysql' ) ) . '" />';

    endif;

    $output = apply_filters( __FUNCTION__, $output );

    echo $output;
    
}



function agnosia_post_get_custom_stylesheet() {

    $stylesheet = false;

    if ( isset( $_GET['post']) and $_GET['post'] ) : 
    
        $post = get_post( $_GET['post'], $output = OBJECT, $filter = 'raw' );
    
    else : 

        global $post;

    endif;

    if ( isset($post) ) :
        $post_meta_data = get_post_meta( $post->ID, 'agnosia_post_meta', true );
    endif;

    if ( isset( $post_meta_data['custom_stylesheet'] ) ) :
        $stylesheet = $post_meta_data['custom_stylesheet'];
    endif;

    $stylesheet = apply_filters( __FUNCTION__, $stylesheet );

    return $stylesheet;

}



function agnosia_get_custom_favicon() {

    $favicon = '';

    if ( agnosia_has_custom_favicon() ) :

        $favicon = agnosia_get( 'custom_favicon' );

    endif;

    $favicon = apply_filters( __FUNCTION__, $favicon );

    return $favicon;

}



function agnosia_get_css_for_text_color() {

    $output = '';

    if ( get_header_image() ) :

        ob_start();

        ?>

        <style type="text/css">
            
            #branding h1, #branding h2, #branding h3, #branding h1 a, #branding h2 a, #branding h3 a, #branding ul.menu.nav > li > a {
                color: #<?php echo get_header_textcolor(); ?> !important;
                text-shadow: none;
            }

            #branding a b.caret {
                border-bottom-color: #<?php echo get_header_textcolor(); ?>;
                border-top-color: #<?php echo get_header_textcolor(); ?>;
            }

        </style>

        <?php

        $output .= ob_get_contents();
        
        ob_end_clean();
        ob_flush();

    endif;

    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_post_info_top_class() {

    $output = agnosia_get_post_info_top_class();

    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

} 



function agnosia_get_post_info_top_class() {

    $class = 'info top';

    if ( !agnosia_show_post_meta() ) : $class .= ' no-meta'; 
    endif;

    $class = apply_filters( __FUNCTION__, $class );

    return $class;

} 



/* Get pages hierarchy */


function agnosia_get_pages() {

    $wp_query = new WP_Query();
    $wp_pages = $wp_query->query( array( 'post_type' => 'page' ) );

    $wp_pages = apply_filters( __FUNCTION__, $wp_pages );

    return $wp_pages;

}



function agnosia_page_hierarchy( $post ) {

    $output = '';

    $children = agnosia_get_page_children($post);

    // Get parent for filter
    $parent = agnosia_get_page_parent_for_hierarchy($post);

    if ( !empty($children) ) :

        // Create string to store the IDs of the pages we want to show

        $string = $parent;

        foreach ($children as $child) :

            $string .= ',' . $child->ID;

        endforeach;

        ob_start();

        // Show list of pages
        wp_list_pages( array( 'title_li' => '' , 'include' => $string ) );

        $output = ob_get_contents();

        ob_end_clean();
        ob_flush();

    endif;

    $output = apply_filters( __FUNCTION__ , $output );

    echo $output;

}



function agnosia_get_page_children($post) {

    // Get parent for filter
    $parent = agnosia_get_page_parent_for_hierarchy($post);

    // Filter pages by parent to obtain children
    $params = array( 'post_type' => 'page' , 'post_parent'=> $parent );
    $children = query_posts($params);

    // Reset query to avoid unexpected behavior
    wp_reset_query();

    $children = apply_filters( __FUNCTION__, $children );

    return $children;

}



function agnosia_get_page_parent_for_hierarchy($post) {

    // Get parent for hierarchy
    
    if ( isset($post) ) :
        if ( $post->post_parent != '0' ) : $parent = $post->post_parent;
        else : $parent = $post->ID;
        endif;
    else :
        return false;
    endif;

    $parent = apply_filters( __FUNCTION__, $parent );
    
    return $parent;

}



function agnosia_page_breadcrumb() {

    ob_start();

    if ( function_exists( 'yoast_breadcrumb' ) and agnosia_show_page_breadcrumb() ) :
        yoast_breadcrumb( '<div id="breadcrumbs"><p>', '</p></div>' );
    endif;

    $output = ob_get_contents();
    ob_end_clean();

    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}



function agnosia_post_breadcrumb() {

    ob_start();

    if ( function_exists( 'yoast_breadcrumb' ) and agnosia_show_post_breadcrumb() ) :
        yoast_breadcrumb( '<div id="breadcrumbs"><p>', '</p></div>' );
    endif;

    $output = ob_get_contents();
    ob_end_clean();

    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


?>