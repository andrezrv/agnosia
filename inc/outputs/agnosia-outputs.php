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
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */



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
 * 
 * Is there a native way to do this? I didn't find any and feel kinda silly doing this.
 * 
 * @author andrezrv
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
    if( agnosia_evaluate('responsive') ) : $body_class .= ' responsive wide';
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

    if ( agnosia_evaluate( 'header_branding_section_show_navigation' ) ) : 
    
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

    ob_start();

    ?>
        
#branding h1, #branding h2, #branding h3, #branding h1 a, #branding h2 a, #branding h3 a, #branding ul.menu.nav > li > a {
    color: #<?php echo get_header_textcolor(); ?> !important;
    text-shadow: none;
}

#branding a b.caret {
    border-bottom-color: #<?php echo get_header_textcolor(); ?>;
    border-top-color: #<?php echo get_header_textcolor(); ?>;
}

    <?php

    $output .= ob_get_contents();
    
    ob_end_clean();

    $output = apply_filters( __FUNCTION__, $output );

    header( 'Content-Type: text/css' );

    echo $output;

    die();


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


function agnosia_page_hierarchy_content() {

    $output = agnosia_get_page_hierarchy_content();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}

function agnosia_get_page_hierarchy_content() {

    global $post;

    $html = '';

    $children = agnosia_get_page_children( $post );

    // Get parent for filter
    $parent = agnosia_get_page_parent_for_hierarchy( $post );

    if ( !empty( $children ) ) :

        // Create string to store the IDs of the pages we want to show

        $string = $parent;

        foreach ( $children as $child ) :

            $string .= ',' . $child->ID;

        endforeach;

        ob_start();

        // Show list of pages
        wp_list_pages( array( 'title_li' => '' , 'include' => $string ) );

        $html = ob_get_contents();

        ob_end_clean();
        ob_flush();

    endif;

    $html = apply_filters( __FUNCTION__ , $html );

    return $html;

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


function agnosia_static_breadcrumb() {

    ob_start();

    if ( function_exists( 'yoast_breadcrumb' ) ) :
        yoast_breadcrumb( '<div id="breadcrumbs"><p>', '</p></div>' );
    else :
        echo '<h4 class="pagetitle">' . agnosia_get_archive_title() . '</h4>';
    endif;

    $output = ob_get_contents();
    ob_end_clean();

    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_quote_cite() {

    $output = agnosia_get_quote_cite();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_quote_cite() {

    $html = '';

    if ( agnosia_show_page_quote_source() ) :
        $html = agnosia_get_template( 'quote-cite', 'content' );
    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_status_gravatar() {

    $output = agnosia_get_status_gravatar();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_status_gravatar() {

    $html = '';

    if ( ( is_page() and agnosia_show_page_status_thumbnail() ) 
        or ( ( is_single() or is_home() ) and agnosia_show_post_status_thumbnail() ) ) :
        $html = agnosia_get_template( 'gravatar', 'content' );
    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_the_author_posts_link() {

    $output = agnosia_get_the_author_posts_link();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;
    
}


function agnosia_get_the_author_posts_link() {

    $html = '';

    if ( ( is_page() and agnosia_show_page_status_author_name() ) or ( ( is_single() or is_home() ) and agnosia_show_post_status_author_name() ) ) :

        $html = agnosia_get_template( 'author-posts-link', 'content' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_branding_responsive_button() {

    $output = agnosia_get_branding_responsive_button();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_branding_responsive_button() {

    $html = '';

    if ( agnosia_show_branding_responsive_button() ) :

        $html = agnosia_get_template( 'branding-responsive-button' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_header_responsive_button() {

    $output = agnosia_get_header_responsive_button();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_header_responsive_button() {

    $html = '';

    if ( agnosia_show_header_responsive_button() ) :

        $html = agnosia_get_template( 'header-responsive-button' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_top_responsive_button() {

    $output = agnosia_get_top_responsive_button();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_top_responsive_button() {

    $html = '';

    if ( agnosia_show_top_responsive_button() ) :

        $html = agnosia_get_template( 'top-responsive-button' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_single_branding() {

    $output = agnosia_get_single_branding();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_single_branding() {

    $html = '';

    if ( !agnosia_header_branding_has_secondary_logo() ) :

        $html = agnosia_get_template( 'single-branding' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_single_branding_contents() {

    $output = agnosia_get_single_branding_contents();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_single_branding_contents() {

    $html = '';

    if ( !agnosia_header_branding_has_logo() ) : 

        if ( agnosia_evaluate_show_branding_text() ) :
            $html = agnosia_get_template( 'single-branding-text', 'header' );
        endif;

    else :

        $html = agnosia_get_template( 'single-branding-image', 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_secondary_branding() {

    $output = agnosia_get_secondary_branding();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_secondary_branding() {

    $html = '';

    if ( current_theme_supports( 'agnosia-secondary-branding' )
        and agnosia_header_branding_has_secondary_logo() 
    ) :

        $html = agnosia_get_template( 'double-branding' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_primary_brand_content() {

    $output = agnosia_get_primary_brand_content();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_primary_brand_content() {

    $html = '';

    if ( !agnosia_header_branding_has_logo() and agnosia_evaluate_show_branding_text() ) : 

        $html = agnosia_get_template( 'primary-brand-text', 'header' );

    else : 

        $html = agnosia_get_template( 'primary-brand-image', 'header' );

    endif; 

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_secondary_brand_content() {

    $output = agnosia_get_secondary_brand_content();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_secondary_brand_content() {

    $html = '';

    if ( agnosia_header_branding_secondary_logo_img_exists() ) : 

        $html = agnosia_get_template( 'secondary-brand-image', 'content' );

    else : 

        $html = agnosia_get_template( 'secondary-brand-text', 'content' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_branding() {

    $output = agnosia_get_branding();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_branding() {

    $html = '';

    if ( current_theme_supports( 'agnosia-branding' )
        and agnosia_evaluate('show_header_branding_section')
     ) :

        $html = agnosia_get_template( 'branding' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_branding_menu() {

    $output = agnosia_get_branding_menu();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_branding_menu() {

    $html = '';

    if ( agnosia_evaluate( 'header_branding_section_show_navigation' ) ) :

        $html = agnosia_get_template( 'branding-menu' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_header_menu() {

    $output = agnosia_get_header_menu();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_header_menu() {

    $html = '';

    if ( agnosia_evaluate( 'header_navbar_show_navigation' ) ) :

        $html = agnosia_get_template( 'header-menu' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_top_menu() {

    $output = agnosia_get_top_menu();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_top_menu() {

    $html = '';

    if ( agnosia_evaluate( 'header_top_navbar_show_navigation' ) ) :

        $html = agnosia_get_template( 'top-menu' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_branding_nav_menu() {

    $output = agnosia_get_branding_nav_menu();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_branding_nav_menu() {

    $html = '';

    if ( $agnosia_branding_menu = wp_nav_menu( array( 
        'theme_location' => 'branding-menu' ,
        'container'  => 'div' , 
        'container_class' => '', 
        'menu_class' => 'menu nav' ,
        'fallback_cb' => false ,
        'echo' => 0 ,
        ) 
    ) ) :

        $html = $agnosia_branding_menu;
    
    else : 

        ob_start();

        wp_page_menu( array(
                'menu_class' => 'menu-header-menu-container',
            )
        );

        $html = ob_get_contents();

        ob_end_clean();

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_header_nav_menu() {

    $output = agnosia_get_header_nav_menu();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_header_nav_menu() {

    $html = '';

    if ( $agnosia_header_menu = wp_nav_menu( array( 
        'theme_location' => 'header-menu' ,
        'container'  => 'div' , 
        'container_class' => 'menu-header-menu-container', 
        'menu_class' => 'menu nav' ,
        'fallback_cb' => false ,
        'echo' => 0 ,
        ) 
    ) ) :

        $html = $agnosia_header_menu;
    
    else : 

        ob_start();

        wp_page_menu( array(
                'menu_class' => 'menu-header-menu-container',
            )
        );

        $html = ob_get_contents();

        ob_end_clean();

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_top_nav_menu() {

    $output = agnosia_get_top_nav_menu();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_top_nav_menu() {

    $html = '';

    if ( $agnosia_top_menu = wp_nav_menu( array( 
                'theme_location' => 'top-menu' ,
                'container'  => 'div' , 
                'container_class' => '', 
                'menu_class' => 'menu nav' ,
                'fallback_cb' => false ,
                'echo' => 0 ,
                ) 
        ) ) :

        $html = $agnosia_top_menu;
    
    else : 

        ob_start();

        wp_page_menu( array(
                'menu_class' => 'menu-header-menu-container',
            )
        );

        $html = ob_get_contents();

        ob_end_clean();

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_branding_searchform() {

    $output = agnosia_get_branding_searchform();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_branding_searchform() {

    $html = '';

    if ( agnosia_evaluate( 'header_branding_section_show_search' ) ) :

        $html = agnosia_get_template( 'branding-searchform' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_header_navbar_searchform() {

    $output = agnosia_get_header_navbar_searchform();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_header_navbar_searchform() {

    $html = '';

    if ( agnosia_evaluate( 'header_navbar_show_search' ) ) :

        $html = agnosia_get_template( 'header-searchform' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_top_navbar_searchform() {

    $output = agnosia_get_top_navbar_searchform();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_top_navbar_searchform() {

    $html = '';

    if ( agnosia_evaluate( 'header_top_navbar_show_search' ) ) :

        $html = agnosia_get_template( 'top-searchform' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_header_navbar() {

    $output = agnosia_get_header_navbar();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_header_navbar() {

    $html = '';

    if ( current_theme_supports( 'agnosia-header-navbar' )
        and agnosia_evaluate( 'show_header_navbar' )
     ) :

        $html = agnosia_get_template( 'header-navbar' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_header_navbar_brand() {

    $output = agnosia_get_header_navbar_brand();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_header_navbar_brand() {

    $html = '';

    if ( agnosia_evaluate( 'header_navbar_show_brand' ) ) :

        $html = agnosia_get_template( 'header-brand' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_top_navbar_brand() {

    $output = agnosia_get_top_navbar_brand();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_top_navbar_brand() {

    $html = '';

    if ( agnosia_evaluate( 'header_top_navbar_show_brand' ) ) :

        $html = agnosia_get_template( 'top-brand' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_top_navbar() {

    $output = agnosia_get_top_navbar();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_top_navbar() {

    $html = '';

    if ( current_theme_supports( 'agnosia-top-navbar' )
        and agnosia_evaluate( 'show_header_top_navbar' )
     ) :

        $html = agnosia_get_template( 'top-navbar' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_branding_site_description() {

    $output = agnosia_get_branding_site_description();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_branding_site_description() {

    $html = '';

    if ( agnosia_evaluate( 'header_branding_section_site_description' ) ):

        $html = agnosia_get_template( 'branding-site-description' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_branding_secondary_logo_subtitle() {

    $output = agnosia_get_branding_secondary_logo_subtitle();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_branding_secondary_logo_subtitle() {

    $html = '';

    if ( agnosia_get( 'header_branding_section_secondary_logo_subtitle' ) ):

        $html = agnosia_get_template( 'branding-secondary-logo-subtitle' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_site_description() {

    $output = agnosia_get_site_description();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_site_description() {

    $html = '';

    if ( current_theme_supports( 'agnosia-additional-site-description' )
        and agnosia_evaluate( 'show_site_description' )
     ) :

        $html = agnosia_get_template( 'site-description' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_after_header_thumbnail() {

    $output = agnosia_get_after_header_thumbnail();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_after_header_thumbnail() {

    $html = '';

    if ( agnosia_post_show_thumbnail_after_header_img() ) :

        $html = agnosia_get_template( 'after-header-thumbnail', 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_header() {

    $output = agnosia_get_header();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_header() {

    $html = '';

    if ( agnosia_show_header() ) : 

        $html = agnosia_get_template( 'header' , 'header' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_footer_contents() {

    $output = agnosia_get_footer_contents();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_footer_contents() {

    $html = '';

    if ( agnosia_show_footer() ) : 

        $html = agnosia_get_template( 'footer-contents' , 'footer' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_footer_credits() {

    $output = agnosia_get_footer_credits();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_footer_credits() {

    $html = '';

    if ( agnosia_evaluate( 'footer_show_credits' ) ) : 

        $html = agnosia_get_template( 'footer-credits' , 'footer' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_content_left_sidebar() {

    $output = agnosia_get_content_left_sidebar();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_content_left_sidebar() {

    $html = '';

    ob_start();

    if ( dynamic_sidebar( __( 'Left sidebar' , 'agnosia' ) ) ) : 
        // Sidebar is printed.
    else :
        agnosia_load_template( 'sidebar-widget' , 'sidebar' );            
    endif;

    $html = ob_get_contents();

    ob_end_clean();

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_content_right_sidebar() {

    $output = agnosia_get_content_right_sidebar();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_content_right_sidebar() {

    $html = '';

    ob_start();

    if ( dynamic_sidebar( __( 'Right sidebar' , 'agnosia' ) ) ) : 
        // Sidebar is printed.
    else :
        agnosia_load_template( 'sidebar-widget' , 'sidebar' );            
    endif;

    $html = ob_get_contents();

    ob_end_clean();

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_sidebar_template( $key ) {

    $output = agnosia_get_sidebar_template( $key );
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_sidebar_template( $key ) {

    global $sidebar_templates;

    $code = $sidebar_templates[$key];
    $code = apply_filters( __FUNCTION__, $code );

    return $code;

}


function agnosia_footer_sidebar() {

    $output = agnosia_get_footer_sidebar();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_footer_sidebar() {

    $html = '';

    ob_start();

    if ( dynamic_sidebar( __( 'Footer' , 'agnosia' ) . ' #' . agnosia_get_footer_sidebar_counter() ) ) : 
        // Sidebar is printed.
    else :
        agnosia_load_template( 'footer-widget' , 'footer' );            
    endif;

    $html = ob_get_contents();

    ob_end_clean();

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_footer_sidebars() {

    $output = agnosia_get_footer_sidebars();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_footer_sidebars() {

    global $sidebar_templates, $sidebars, $counter;

    $sidebars = agnosia_get( 'footer_columns_number' , 'footer' );
    $counter = 1;

    $html = '';

    while ( $counter <= $sidebars ) :

        $html .= agnosia_get_template( 'footer-sidebar' , 'footer' );
        $counter++; 

    endwhile;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_footer_sidebar_span() {

    $output = agnosia_get_footer_sidebar_span();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_footer_sidebar_span() {

    global $sidebars;

    $html = ( 12 / $sidebars );

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_footer_sidebar_counter() {

    $output = agnosia_get_footer_sidebar_counter();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_footer_sidebar_counter() {

    global $counter;

    $html = $counter;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_footer_sidebar_template() {

    $output = agnosia_get_footer_sidebar_template();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_footer_sidebar_template() {

    global $sidebar_templates, $counter;

    $html = $sidebar_templates[ $counter ];

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_after_container() {

    $output = agnosia_get_after_container();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_after_container() {

    global $post;

    $html = '';

    ob_start();
    do_action( 'agnosia_ac_after_container_html' );
    $after_container_html = ob_get_contents();
    ob_end_clean();

    if ( $after_container_html ) :

        $html = agnosia_get_template( 'after-container', 'content', $after_container_html );

    endif;

    wp_reset_query();

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_left_sidebar() {

    $output = agnosia_get_left_sidebar();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_left_sidebar() {

    $html = '';

    if ( current_theme_supports( 'agnosia-left-sidebar' ) ) :

        global $post, $sidebar_templates ;

        if ( agnosia_evaluate_show( 'show_left_sidebar' , 'hide_left_sidebar' , $post ) ) :

            $html = agnosia_get_template( 'left-sidebar' , 'sidebar' );

        endif;

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_right_sidebar() {

    $output = agnosia_get_right_sidebar();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_right_sidebar() {

    $html = '';

    if ( current_theme_supports( 'agnosia-right-sidebar' ) ) :

        global $post, $sidebar_templates;

        if ( agnosia_evaluate_show( 'show_right_sidebar' , 'hide_right_sidebar' , $post ) ) :

            $html = agnosia_get_template( 'right-sidebar' , 'sidebar' );

        endif;

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}



function agnosia_post_thumbnail( $position ) {

    $output = agnosia_get_post_thumbnail( $position );
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_thumbnail( $position ) {

    $show = false;

    $html = '';

    switch ( $position ) {

        case 'index-before-header' :

            if ( agnosia_index_show_thumbnail_before_header() )
                $show = true;

        break;

        case 'index-after-title' :

            if ( agnosia_index_show_thumbnail_after_title() )
                $show = true;

        break;

        case 'index-after-meta' :

            if ( agnosia_index_show_thumbnail_after_meta() ) 
                $show = true;

        break;

        case 'post-before-header' :

            if ( agnosia_post_show_thumbnail_before_header() )
                $show = true;

        break;

        case 'post-after-title' :

            if ( agnosia_post_show_thumbnail_after_title() )
                $show = true;

        break;

        case 'post-after-meta' :

            if ( agnosia_post_show_thumbnail_after_meta() ) 
                $show = true;

        break;

        case 'post-after-author' :

            if ( agnosia_post_show_thumbnail_after_author() or agnosia_index_show_thumbnail_after_author() ) 
                $show = true;

        case 'page-after-author' :

            if ( agnosia_post_show_thumbnail_after_author() ) 
                $show = true;

        break;

        default :
            $html = '';
        break;

    }

    if ( $show ) {
        $html = agnosia_get_template( 'post-thumbnail', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}



function agnosia_post_title() {

    $output = agnosia_get_post_title();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_title() {

    $html = '';

    if ( agnosia_show_post_title() ) {
        $html = agnosia_get_template( 'the-title', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}



function agnosia_page_title() {

    $output = agnosia_get_page_title();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_title() {

    $html = '';

    if ( agnosia_show_page_title() ) {
        $html = agnosia_get_template( 'the-title', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}



function agnosia_post_author_gravatar() {

    $output = agnosia_get_post_author_gravatar();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_author_gravatar() {

    $html = '';

    if ( agnosia_show_post_author_gravatar() ) {
        $html = agnosia_get_template( 'author-gravatar', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}



function agnosia_page_author_gravatar() {

    $output = agnosia_get_page_author_gravatar();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_author_gravatar() {

    $html = '';

    if ( agnosia_show_page_author_gravatar() ) {
        $html = agnosia_get_template( 'author-gravatar', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_meta_before() {

    $output = agnosia_get_post_meta_before();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_meta_before() {

    $html = '';

    if ( agnosia_show_post_author() or agnosia_show_post_meta() ) {
        $html = agnosia_get_template( 'posts-meta-before', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_page_meta_before() {

    $output = agnosia_get_page_meta_before();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_meta_before() {

    $html = '';

    if ( agnosia_show_page_author() or agnosia_show_page_meta() ) {
        $html = agnosia_get_template( 'pages-meta-before', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_header() {

    $output = agnosia_get_post_header();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_header() {

    $html = '';

    if ( agnosia_show_post_header() ) {
        $html = agnosia_get_template( 'post-header', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}



function agnosia_page_header() {

    $output = agnosia_get_page_header();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_header() {

    $html = '';

    if ( agnosia_show_page_header() ) {
        $html = agnosia_get_template( 'page-header', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}



function agnosia_post_footer() {

    $output = agnosia_get_post_footer();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_footer() {

    $html = '';

    if ( agnosia_show_post_footer() ) {
        $html = agnosia_get_template( 'post-footer', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_page_footer() {

    $output = agnosia_get_page_footer();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_footer() {

    $html = '';

    if ( agnosia_show_page_footer() ) {
        $html = agnosia_get_template( 'page-footer', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_page_hierarchy() {

    $output = agnosia_get_page_hierarchy();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_hierarchy() {

    global $post;

    $html = '';

    if ( agnosia_evaluate_show( 'content_show_page_hierarchy' , 'content_hide_page_hierarchy' , $post ) 
        and agnosia_has_page_hierarchy($post) 
    ) {
        $html = agnosia_get_template( 'page-hierarchy', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_search_input() {

    $output = agnosia_get_search_input();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_search_input() {

    $html = '';

    if ( !function_exists( 'yoast_breadcrumb' ) ) {
        $html = '<p><em>' . sprintf( __( 'You searched for &quot;%s&quot;' , 'agnosia' ) , esc_html( $_GET['s'] ) ) . '</em></p>';
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_before_container() {

    $output = agnosia_get_before_container();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_before_container() {

    $html = '';

    ob_start();
    do_action( 'agnosia_ac_before_container_html' );
    $before_container_html = ob_get_contents();
    ob_end_clean();

    $has_large_header = agnosia_page_has_large_header();

    if ( $before_container_html or $has_large_header ) {

        $inserted_html = $before_container_html;

        if ( $has_large_header and agnosia_show_page_header() ) {
            global $post;
            $inserted_html .= agnosia_get_template( 'page-large-header', 'content', wpautop( $post->post_excerpt ) );
        }

        $html = agnosia_get_template( 'before-container', 'content', $inserted_html );

    }

    wp_reset_query();

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_before_content() {

    $output = agnosia_get_before_content();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_before_content() {

    $html = '';

    ob_start();
    do_action( 'agnosia_ac_before_content_html' );
    $before_content_html = ob_get_contents();
    ob_end_clean();

    if ( $before_content_html ) :

        $html = agnosia_get_template( 'before-content', 'content', $before_content_html );

    endif;

    wp_reset_query();

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_after_content() {

    $output = agnosia_get_after_content();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_after_content() {

    global $post;

    $html = '';

    ob_start();
    do_action( 'agnosia_ac_after_content_html' );
    $after_content_html = ob_get_contents();
    ob_end_clean();

    if ( $after_content_html ) :

        $html = agnosia_get_template( 'after-content', 'content', $after_content_html );

    endif;

    wp_reset_query();

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_the_title() {

    $output = agnosia_get_the_title();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_the_title() {

    global $post;

    $html = $post->post_title;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_the_content() {

    $output = agnosia_get_the_content();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_the_content() {

    global $post;

    $post_meta = get_post_meta( get_the_ID(), 'agnosia_post_meta' , true ) ;

    $html = '';

    ob_start();

    if ( ( is_home() or is_archive() or is_search() or is_author() ) and 'standard' == agnosia_get_post_format() ) :

        if ( !isset( $post_meta['content_show_post_excerpt_in_index'] ) 
            or !agnosia_evaluate_variable( $post_meta['content_show_post_excerpt_in_index'] ) 
            or !get_the_excerpt() 
        ) :

            the_content( __( 'Read more' , 'agnosia' ) );
        
        else :

            ob_start();
            the_excerpt();
            $the_excerpt = ob_get_contents();
            ob_end_clean();
            agnosia_load_template( 'post-excerpt', 'content', $the_excerpt );

        endif;

    else :

        if ( isset( $post_meta['content_show_post_excerpt_in_post'] ) and get_the_excerpt() ) :

            agnosia_load_template( 'post-excerpt', 'content', wpautop( $post->post_excerpt ) );
                
        endif;

        the_content();

    endif;

    $html .= ob_get_contents();

    ob_end_clean();

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_gravatar() {

    $output = agnosia_get_post_gravatar();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_gravatar() {

    $html = '';

    if ( !agnosia_thumbnail_replaces_gravatar() ) :
                    
        $html = get_avatar( get_the_author_meta( 'user_email' ) );

    elseif ( get_the_post_thumbnail( get_the_ID() ) ) :

        $html = the_post_thumbnail( array( 100 , 100 ) );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_page_comments_template() {

    $output = agnosia_get_page_comments_template();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_comments_template() {

    global $post;

    $html = '';

    if ( agnosia_evaluate_show( 'content_show_page_comments_bottom' , 'content_hide_comments_bottom' , $post ) ) :
        
        /* Block output */
        ob_start();

        comments_template();

        /* Capture output */
        $html = ob_get_contents();

        /* Unblock output */
        ob_end_clean();

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_the_author() {

    $output = agnosia_get_the_author();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_the_author() {

    global $post;

    $html = '';

    if ( ( is_single() and agnosia_show_post_author_information() )
        or ( is_page() and agnosia_show_page_author_information() )
    ) : 

        $html = agnosia_get_template( 'the-author', 'content' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_page_title_bottom() {

    $output = agnosia_get_page_title_bottom();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_title_bottom() {

    global $post;

    $html = '';

    if ( agnosia_show_page_title_bottom() ) : 

        $html = agnosia_get_template( 'the-title', 'content' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_title_bottom() {

    $output = agnosia_get_post_title_bottom();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_title_bottom() {

    global $post;

    $html = '';

    if ( agnosia_show_post_title_bottom() ) : 

        $html = agnosia_get_template( 'the-title', 'content' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_author_box_gravatar() {

    $output = agnosia_get_author_box_gravatar();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_author_box_gravatar() {

    global $post;

    $html = '';

    if ( ( is_single() and agnosia_show_post_author_avatar() )
        or ( is_page() and agnosia_show_page_author_avatar() )
    ) : 

        $html = agnosia_get_template( 'author-box-gravatar', 'content' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_page_meta_after() {

    $output = agnosia_get_page_meta_after();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_meta_after() {

    $html = '';

    if ( agnosia_show_page_metadata() ) :

        $html = agnosia_get_template( 'pages-meta-after', 'content' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_meta_after() {

    $output = agnosia_get_post_meta_after();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_meta_after() {

    $html = '';

    if ( agnosia_show_post_metadata() ) : 

        $html = agnosia_get_template( 'posts-meta-after', 'content' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_edit_link() {

    $output = agnosia_get_post_edit_link();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_edit_link() {

    global $post;

    $html = '';

    if ( 
        ( is_page() and agnosia_evaluate( 'content_show' . agnosia_get_prefixed_page_format() . '_edit_bottom' ) )
        or ( ( is_single() or is_home() or is_archive() or is_author() or is_search() ) and agnosia_evaluate('content_show_post' . agnosia_get_prefixed_post_format() . '_edit_bottom' ) )
    ) :

        $html = agnosia_get_template( 'post-edit', 'content' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_navigation() {

    $output = agnosia_get_post_navigation();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_navigation() {

    global $post;

    $html = '';

    if ( agnosia_show_post_navigation() ) :

        $html = agnosia_get_template( 'post-navigation', 'content' );

    endif;

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_page_author() {

    $output = agnosia_get_page_author();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_author() {

    $html = '';

    if ( agnosia_show_page_author() ) {
        $html = agnosia_get_template( 'author-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_author() {

    $output = agnosia_get_post_author();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_author() {

    $html = '';

    if ( agnosia_show_post_author() ) {
        $html = agnosia_get_template( 'author-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_page_comments() {

    $output = agnosia_get_page_comments();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_comments() {

    $html = '';

    if ( agnosia_show_page_comments() and comments_open() ) {
        $html = agnosia_get_template( 'comments-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_page_permalink() {

    $output = agnosia_get_page_permalink();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_permalink() {

    $html = '';

    if ( agnosia_show_page_permalinks() ) {
        $html = agnosia_get_template( 'permalink-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_page_author_bottom() {

    $output = agnosia_get_page_author_bottom();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_author_bottom() {

    $html = '';

    if ( agnosia_show_page_author_bottom() ) {
        $html = agnosia_get_template( 'author-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_author_bottom() {

    $output = agnosia_get_page_author_bottom();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_author_bottom() {

    $html = '';

    if ( agnosia_show_post_author_bottom() ) {
        $html = agnosia_get_template( 'author-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_page_comments_bottom() {

    $output = agnosia_get_page_comments_bottom();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_comments_bottom() {

    $html = '';

    if ( agnosia_show_page_comments_bottom() and comments_open() ) {
        $html = agnosia_get_template( 'comments-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_page_comments_top() {

    $output = agnosia_get_page_comments_top();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_comments_top() {

    $html = '';

    if ( agnosia_show_page_comments_top() and comments_open() ) {
        $html = agnosia_get_template( 'comments-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_comments_top() {

    $output = agnosia_get_page_comments_top();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_comments_top() {

    $html = '';

    if ( agnosia_show_post_comments_top() and comments_open() ) {
        $html = agnosia_get_template( 'comments-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_comments_bottom() {

    $output = agnosia_get_page_comments_bottom();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_comments_bottom() {

    $html = '';

    if ( agnosia_show_post_comments_bottom() and comments_open() ) {
        $html = agnosia_get_template( 'comments-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_page_permalink_bottom() {

    $output = agnosia_get_page_permalink_bottom();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_permalink_bottom() {

    $html = '';

    if ( agnosia_show_page_permalinks_bottom() ) {
        $html = agnosia_get_template( 'permalink-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_page_permalink_top() {

    $output = agnosia_get_page_permalink_top();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_permalink_top() {

    $html = '';

    if ( agnosia_show_page_permalinks_top() ) {
        $html = agnosia_get_template( 'permalink-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_permalink_bottom() {

    $output = agnosia_get_post_permalink_bottom();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_permalink_bottom() {

    $html = '';

    if ( agnosia_show_post_permalinks_bottom() ) {
        $html = agnosia_get_template( 'permalink-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_permalink_top() {

    $output = agnosia_get_post_permalink_top();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_permalink_top() {

    $html = '';

    if ( agnosia_show_post_permalinks_top() ) {
        $html = agnosia_get_template( 'permalink-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_date_top() {

    $output = agnosia_get_post_date_top();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_date_top() {

    $html = '';

    if ( agnosia_show_post_date_top() ) {
        $html = agnosia_get_template( 'date-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_date_bottom() {

    $output = agnosia_get_post_date_bottom();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_date_bottom() {

    $html = '';

    if ( agnosia_show_post_date_bottom() ) {
        $html = agnosia_get_template( 'date-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_categories_top() {

    $output = agnosia_get_post_categories_top();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_categories_top() {

    $html = '';

    if ( agnosia_show_post_categories_top() and wp_get_post_categories( get_the_ID() ) ) {
        $html = agnosia_get_template( 'categories-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}

function agnosia_post_categories_bottom() {

    $output = agnosia_get_post_categories_bottom();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_categories_bottom() {

    $html = '';

    if ( agnosia_show_post_categories_bottom() and wp_get_post_categories( get_the_ID() ) ) {
        $html = agnosia_get_template( 'categories-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_tags_bottom() {

    $output = agnosia_get_post_tags_bottom();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_tags_bottom() {

    $html = '';

    if ( agnosia_show_post_tags_bottom() and wp_get_post_tags( get_the_ID() ) ) {
        $html = agnosia_get_template( 'tags-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_tags_top() {

    $output = agnosia_get_post_tags_top();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_tags_top() {

    $html = '';

    if ( agnosia_show_post_tags_top() and wp_get_post_tags( get_the_ID() ) ) {
        $html = agnosia_get_template( 'tags-section', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_page_meta() {

    $output = agnosia_get_page_meta();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_page_meta() {

    $html = '';

    if ( agnosia_show_page_meta() ) {
        $html = agnosia_get_template( 'page-meta', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_meta() {

    $output = agnosia_get_post_meta();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_meta() {

    $html = '';

    if ( agnosia_show_post_meta() ) {
        $html = agnosia_get_template( 'post-meta', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_post_pages() {

    $output = agnosia_get_post_pages();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_post_pages() {

    $html = '';

    if ( agnosia_get_wp_link_pages() ) {
        $html = agnosia_get_template( 'post-pages', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_footer_wrapper_start() {

    $output = agnosia_get_footer_wrapper_start();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_footer_wrapper_start() {

    $html = '';

    if ( agnosia_footer_is_wrapped() ) {
        $html = agnosia_get_template( 'footer-wrapper-start', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_footer_wrapper_end() {

    $output = agnosia_get_footer_wrapper_end();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_footer_wrapper_end() {

    $html = '';

    if ( agnosia_footer_is_wrapped() ) {
        $html = agnosia_get_template( 'footer-wrapper-end', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_header_wrapper_start() {

    $output = agnosia_get_header_wrapper_start();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_header_wrapper_start() {

    $html = '';

    if ( agnosia_header_is_wrapped() ) {
        $html = agnosia_get_template( 'header-wrapper-start', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_header_wrapper_end() {

    $output = agnosia_get_header_wrapper_end();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_header_wrapper_end() {

    $html = '';

    if ( agnosia_header_is_wrapped() ) {
        $html = agnosia_get_template( 'header-wrapper-end', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_global_wrapper_start() {

    $output = agnosia_get_global_wrapper_start();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_global_wrapper_start() {

    $html = '';

    if ( agnosia_header_and_footer_are_wrapped() ) {
        $html = agnosia_get_template( 'global-wrapper-start', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_global_wrapper_end() {

    $output = agnosia_get_global_wrapper_end();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_global_wrapper_end() {

    $html = '';

    if ( agnosia_header_and_footer_are_wrapped() ) {
        $html = agnosia_get_template( 'global-wrapper-end', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_dynamic_wrapper_start() {

    $output = agnosia_get_dynamic_wrapper_start();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_dynamic_wrapper_start() {

    $html = '';

    if ( current_theme_supports( 'agnosia-dynamic-wrapper' ) ) {
        $html = agnosia_get_template( 'dynamic-wrapper-start', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_dynamic_wrapper_end() {

    $output = agnosia_get_dynamic_wrapper_end();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_dynamic_wrapper_end() {

    $html = '';

    if ( current_theme_supports( 'agnosia-dynamic-wrapper' ) ) {
        $html = agnosia_get_template( 'dynamic-wrapper-end', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_standard_wrapper_start() {

    $output = agnosia_get_standard_wrapper_start();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_standard_wrapper_start() {

    $html = '';

    if ( !current_theme_supports( 'agnosia-dynamic-wrapper' ) and agnosia_show_header() ) {
        $html = agnosia_get_template( 'standard-wrapper-start', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_standard_wrapper_end() {

    $output = agnosia_get_standard_wrapper_end();
    $output = apply_filters( __FUNCTION__, $output );

    echo $output;

}


function agnosia_get_standard_wrapper_end() {

    $html = '';

    if ( !current_theme_supports( 'agnosia-dynamic-wrapper' ) and agnosia_show_header() ) {
        $html = agnosia_get_template( 'standard-wrapper-end', 'content' );
    }

    $html = apply_filters( __FUNCTION__, $html );

    return $html;

}


function agnosia_processed_css() {

    if ( isset( $_GET['agnosia-processed-css'] ) and 'text-color' == $_GET['agnosia-processed-css'] ) {
        agnosia_get_css_for_text_color();
    }

}

add_action( 'wp', 'agnosia_processed_css' );