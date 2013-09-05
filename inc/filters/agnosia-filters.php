<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles filters for default WordPress functions.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */


/* Handlers for WordPress default functions filters */


function agnosia_apply_filters() {

    $filters = agnosia_get_filters();

    foreach ( $filters as $tag => $function ) :
        
        add_filter( $tag , $function );

    endforeach;

}



function agnosia_get_filters() {

    $filters = array( 
            'the_title' => 'agnosia_filter_title', 
            'the_category' => 'agnosia_add_nofollow_cat', 
            'wp_nav_menu' => 'agnosia_filter_top_navigation', 
            'wp_page_menu' => 'agnosia_filter_page_navigation', 
            'wp_nav_menu_objects' => 'agnosia_filter_nav_menu_objects', 
            'cancel_comment_reply_link' => 'agnosia_filter_cancel_comment_reply_link',  
            'comment_reply_link' => 'agnosia_filter_comment_reply',
            'comment_text' => 'agnosia_filter_comment_text', 
            'the_content' => 'agnosia_filter_content',
            'the_excerpt' => 'agnosia_filter_excerpt',
            'the_content_more_link' => 'agnosia_filter_content_more_link'
    );

    return $filters;

}



/* Filters for WordPress default functions */


function agnosia_filter_content_more_link( $html ) {

    $new_classes = array( 'btn', 'btn-primary' );
    $html = str_replace( 'class="more-link', 'class="more-link ' . implode( ' ', $new_classes ), $html );

    return $html;

}



function agnosia_filter_title( $text ) {

    /* Block output */
    ob_start();

    if ( is_front_page() or is_home() ) :

       bloginfo( 'name' );
       echo ' - '; 
       bloginfo( 'description' );

    elseif ( is_single() or is_page() ) :

        global $post;

        echo $post->post_title;
        echo ' - '; 
        bloginfo( 'name' );

    elseif ( is_archive() ) :

        echo agnosia_get_archive_title() . ' - ';
        bloginfo( 'name' );

    elseif ( is_search() ) :

        echo ' ' . __( 'Search For' , 'agnosia' ) . ' &quot;'. esc_html($_GET['s']) . '&quot; - '; 
        bloginfo( 'name' );
    
    elseif ( is_404() ) :

        echo __( 'Not Found' , 'agnosia' );
        echo ' - ';
        bloginfo( 'name' );

    else :

        bloginfo( 'name' );

    endif;
    
    if ( isset($_GET['paged']) and $_GET['paged'] > 1 ) :
        echo ' - ' . __( 'Page' , 'agnosia' ) . $_GET['paged'];

    endif;

    /* Capture output */
    $title = ob_get_contents();

    /* Unblock output */
    ob_end_clean();

    /* Prevent the filter from running more than once */
    if( has_filter( 'the_title' , __FUNCTION__ ) ) :
        remove_filter( 'the_title' , __FUNCTION__ );
    endif;

    return $title;

}



function agnosia_add_nofollow_cat( $text ) {

    $text = str_replace('rel="category tag"', "", $text); return $text;

}



function agnosia_filter_top_navigation( $html ) {

    /* Modifiy content */
    $html = str_replace( 'class="sub-menu"' , 'class="sub-menu dropdown-menu"' , $html );
    $html = str_replace( 'current-menu-item' , 'current-menu-item active' , $html );

    return $html;

}



function agnosia_filter_page_navigation($html) {

    /* Modifiy content */
    $html = str_replace( '<ul>' , '<ul class="menu nav">' , $html );
    $html = str_replace( 'children' , 'sub-menu dropdown-menu' , $html );

    return $html;

}



function agnosia_filter_nav_menu_objects($items) {

    if ( !function_exists( 'has_sub' ) ) :

        function has_sub( $menu_item_id, $items ) {

            foreach ( $items as $item ) :

                if ( $item->menu_item_parent and $item->menu_item_parent == $menu_item_id ) :
                    return true;
                endif;

            endforeach;

            return false;

        }

    endif;

    foreach ($items as $item) {

        if ( has_sub ( $item->ID , $items ) ) :
            $item->classes[] = 'dropdown'; // all elements of field "classes" of a menu item get join together and render to class attribute of 
        endif;

    } 

    return $items; 

}



function agnosia_filter_cancel_comment_reply_link($text) {

    /* Modifiy content */
    $text = str_replace ( __( 'Click here to cancel reply.'  , 'agnosia' ) , '<span class="btn btn-danger">'.__('Click here to cancel reply.').'</span>' , $text );
    
    /* Return content */
    return $text;

}



function agnosia_filter_comment_reply($text) {


    /* Modifiy content */
    $text = str_replace( 'comment-reply-link' , 'comment-reply-link btn' , $text );

    /* Return HTML */
    return $text;

}


function agnosia_filter_comment_text( $text ) {

    $text = '<div class="comment-text">' . $text . '</div>';
    return $text;

}



function agnosia_comment_form( $args ) {

    ob_start();

    comment_form( $args );

    $output = ob_get_contents();
    $output = str_replace( 'id="' . $args['id_submit'] . '"' , 'id="' . $args['id_submit'] . '" class="btn btn-large btn-primary btn-submit"' , $output );

    ob_end_clean();

    echo $output;

}



function agnosia_filter_content($html) {

    /* Modifiy content */
    $html = str_replace( 'id="content"' , 'id="article-content"' , $html );

    if ( agnosia_show_page_quote_source() ) :
        global $post;
        ob_start();
        echo '<cite>' . $post->post_title . '</cite>';
        $html = '<blockquote>' . $html . ob_get_contents() . '</blockquote>';
        ob_end_clean();
    endif;

    return $html;

}



function agnosia_filter_excerpt( $html ) {

    $html = $html . agnosia_get_template( 'read-more' , 'content' );

    return $html;

}



/* Add action filters. */
add_action( 'agnosia_after_setup', 'agnosia_apply_filters' );

?>