<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles all of the functions that return a boolean value through the Agnosia theme.
 * All the functions contained in this file are filterable.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */


/* Validations for wrappers. */


function agnosia_header_is_wrapped() {

	$wrapped = false;

	if ( 'wrap-header' == agnosia_get_wrapper_class() ) : $wrapped = true;
	endif;

	$wrapped = apply_filters( __FUNCTION__, $wrapped );

	return $wrapped;

}



function agnosia_footer_is_wrapped() {

	$wrapped = false;

	if ( 'wrap-footer' == agnosia_get_wrapper_class() ) : $wrapped = true;
	endif;

	$wrapped = apply_filters( __FUNCTION__, $wrapped );

	return $wrapped;

}



function agnosia_header_and_footer_are_wrapped() {

	$wrapped = false;

	if ( 'wrap-both' == agnosia_get_wrapper_class() ) : $wrapped = true;
	endif;

	$wrapped = apply_filters( __FUNCTION__, $wrapped );

	return $wrapped;

}



/* General header validations */


/**
 * If you want to use your custom Bootstrap compilation, then:
 * 1) name your compilation folder like the slug of your custom style (i.e. 'starter-kit-styles');
 * 2) copy your compilation folder into the Bootstrap folder of your child theme (i.e. bootstrap/starter-kit-styles);
 * 3) set the parameter $custom_boostrap of agnosia_register_style() to true.
 * To customize Boostrap, we suggest to use @link http://fancyboot.designspebam.com/.
 */

function agnosia_style_has_custom_bootstrap( $style ) {

	$styles = agnosia_get_customized_bootstrap();

	$has_custom_boostrap = isset( $styles[$style] ) ? $styles[$style] : false;
	$has_custom_boostrap = apply_filters( __FUNCTION__, $has_custom_boostrap );

	return $has_custom_boostrap;

}


function agnosia_evaluate_show_branding_text() {

	$show = false;

	if ( !agnosia_get_custom_header() or agnosia_header_has_text_color() ) : $show = true; endif;
	
	$show = apply_filters( __FUNCTION__, $show );

	return $show;

}



function agnosia_header_has_text_color() {

	$boolean = false;

	if ( get_header_textcolor() and 'blank' != get_header_textcolor() ) : $boolean = true; endif;

	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_header_branding_has_logo() {

	$boolean = false;

	if ( 
		agnosia_evaluate( 'header_branding_section_use_logo' ) 
		and wp_remote_get( agnosia_get( 'header_branding_section_logo_url' ) ) 
	) :

		$boolean = true;

	endif;

	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_header_branding_has_secondary_logo() {

	$boolean = false;

	if ( agnosia_evaluate( 'header_branding_section_use_secondary_logo' ) ) :

		if ( agnosia_evaluate( 'header_branding_section_secondary_logo_url' ) ) :

			if ( 
				agnosia_evaluate( 'header_branding_section_use_secondary_logo' ) 
				and wp_remote_get( agnosia_get( 'header_branding_section_secondary_logo_url' ) ) 
			) :

				$boolean = true;

			endif;

		elseif ( agnosia_evaluate( 'header_branding_section_secondary_logo_title' ) ) :

			$boolean = true;

		endif;

	endif;
	
	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_header_branding_secondary_logo_img_exists() {

	$boolean = false;

	if ( 
		agnosia_evaluate( 'header_branding_section_secondary_logo_url' ) 
		and wp_remote_get( agnosia_get( 'header_branding_section_secondary_logo_url' ) ) 
	) :

		$boolean = true;

	endif;
	
	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_show_top_responsive_button() {

	$boolean = false;

	if ( agnosia_evaluate( 'responsive' )
		and ( agnosia_evaluate( 'header_top_navbar_show_navigation' )
			or agnosia_evaluate( 'header_top_navbar_show_search' ) 
		)
	) :

		$boolean = true;

	endif;

	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_show_branding_responsive_button() {

	$boolean = false;

	if ( agnosia_evaluate( 'responsive' )
		and ( agnosia_evaluate( 'header_branding_show_navigation' )
			or agnosia_evaluate( 'header_branding_section_show_search' ) 
		)
	) :

		$boolean = true;

	endif;

	$boolean = apply_filters( __FUNCTION__, $boolean );
	
	return $boolean;

}



function agnosia_show_header_responsive_button() {

	$show = false;

	if ( agnosia_evaluate( 'responsive' )
		and ( agnosia_evaluate( 'header_navbar_show_navigation' )
			or agnosia_evaluate( 'header_navbar_show_search' ) 
		)
	) :

		$show = true;

	endif;

	$show = apply_filters( __FUNCTION__, $show );

	return $show;

}



/* Validations for custom stylesheets. */


function agnosia_has_custom_stylesheet() {

	$boolean = false;

	$remote = wp_remote_head( agnosia_get( 'custom_stylesheet' ) );

	if ( '' != agnosia_get( 'custom_stylesheet' )
		and ( !isset( $response['body'] ) or !$response['body'] )
	) :

		$boolean = true;

	endif;

	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_post_has_custom_stylesheet() {

	$boolean = false;

	$remote = wp_remote_head( esc_attr( agnosia_post_get_custom_stylesheet() ) );

	if ( 
		'' != esc_attr( agnosia_post_get_custom_stylesheet() ) 
		and ( !isset( $response['body'] ) or !$response['body'] ) 
	) :

		$boolean = true;

	endif;

	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



/* Validation for custom favicon. */


function agnosia_has_custom_favicon() {

	$boolean = false;

	if ( 
		'' != agnosia_get( 'custom_favicon' )
		and file_exists( ABSPATH . '/' . agnosia_get( 'custom_favicon' ) ) 
	) :

		$boolean = true;

	endif;

	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}


/* Validations for post and pages elements. */


function agnosia_show_header() {

	global $post;

	$boolean = agnosia_evaluate_show( 'show_header' , 'hide_header' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;

}



function agnosia_show_footer() {

	global $post;

	$boolean = agnosia_evaluate_show( 'show_footer' , 'hide_footer' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean );

	return $boolean;

}



function agnosia_show_post_header() {
	
	global $post;

	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_header' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_header' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;

}



function agnosia_show_page_header() {

	global $post;

	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_header' , 'content_hide' . agnosia_get_prefixed_page_format() . '_header' , $post ) ;
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;

}



function agnosia_show_post_title() {

	global $post;

	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_title' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_title' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean );

	return $boolean;

}



function agnosia_show_page_title() {

	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_title' , 'content_hide' . agnosia_get_prefixed_page_format() . '_title' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_meta() {
	
	global $post;

	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_meta' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_meta' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;

}



function agnosia_show_page_meta() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_meta' , 'content_hide' . agnosia_get_prefixed_page_format() . '_meta' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_author() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_author' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_author' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_author_gravatar() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_author_gravatar' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_author_gravatar' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_page_author_gravatar() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_author_gravatar' , 'content_hide' . agnosia_get_prefixed_page_format() . '_author_gravatar' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_page_author() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_author' , 'content_hide' . agnosia_get_prefixed_page_format() . '_author' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_date_top() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_date_top' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_date_top' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_categories_top() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_categories_top' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_categories_top' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_tags_top() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_tags_top' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_tags_top' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_comments_top() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_comments_top' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_comments_top' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_page_comments_top() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_comments_top' , 'content_hide' . agnosia_get_prefixed_page_format() . '_comments_top' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_permalinks_top() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_permalinks_top' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_permalinks_top' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_page_permalinks_top() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_permalinks_top' , 'content_hide' . agnosia_get_prefixed_page_format() . '_permalinks_top' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_author_bottom() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_author_bottom' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_author_bottom' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_page_author_bottom() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_author_bottom' , 'content_hide' . agnosia_get_prefixed_page_format() . '_author_bottom' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_date_bottom() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_date_bottom' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_date_bottom' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_categories_bottom() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_categories_bottom' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_categories_bottom' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_tags_bottom() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_tags_bottom' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_tags_bottom' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_comments_bottom() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_comments_bottom' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_comments_bottom' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_page_comments_bottom() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_comments_bottom' , 'content_hide' . agnosia_get_prefixed_page_format() . '_comments_bottom' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_permalinks_bottom() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_permalinks_bottom' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_permalinks_bottom' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_page_permalinks_bottom() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_permalinks_bottom' , 'content_hide' . agnosia_get_prefixed_page_format() . '_permalinks_bottom' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_title_bottom() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_title_bottom' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_title_bottom' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_page_title_bottom() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_title_bottom' , 'content_hide' . agnosia_get_prefixed_page_format() . '_title_bottom' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_author_information() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_author_box' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_author_box' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_page_author_information() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_author_box' , 'content_hide' . agnosia_get_prefixed_page_format() . '_author_box' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_author_avatar() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_author_box_gravatar' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_author_box_gravatar' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_page_author_avatar() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_author_box_gravatar' , 'content_hide' . agnosia_get_prefixed_page_format() . '_author_box_gravatar' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_footer() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_footer' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_footer' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_page_footer() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_footer' , 'content_hide' . agnosia_get_prefixed_page_format() . '_footer' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_metadata() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_metadata' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_metadata' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_page_metadata() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_metadata' , 'content_hide' . agnosia_get_prefixed_page_format() . '_metadata' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_navigation() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_navigation' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_navigation' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_quote_source() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_source' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_source' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_page_quote_source() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_source' , 'content_hide' . agnosia_get_prefixed_page_format() . '_source' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_status_thumbnail() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_thumbnail' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_thumbnail' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_page_status_thumbnail() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_thumbnail' , 'content_hide' . agnosia_get_prefixed_page_format() . '_thumbnail' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_post_status_author_name() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show_post' . agnosia_get_prefixed_post_format() . '_author_name' , 'content_hide_post' . agnosia_get_prefixed_post_format() . '_author_name' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_show_page_status_author_name() {
	
	global $post;
	
	$boolean = agnosia_evaluate_show( 'content_show' . agnosia_get_prefixed_page_format() . '_author_name' , 'content_hide_' . agnosia_get_prefixed_page_format() . '_author_name' , $post ) ; 
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;

}


/* Featured images validations */


function agnosia_thumbnail_replaces_gravatar() {

	$boolean = false;

	if ( is_single() or is_page() ) :
		$boolean = agnosia_thumbnail_replaces_gravatar_in_post();
	else :
		$boolean = agnosia_thumbnail_replaces_gravatar_in_index();
	endif;

	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;

}



function agnosia_thumbnail_replaces_gravatar_in_post() {
	
	global $post;

	$meta_value = get_post_meta( $post->ID, 'agnosia_post_meta' , true ) ;
	$value_post = isset( $meta_value['content_featured_image_replace_gravatar_in_post'] ) ? $meta_value['content_featured_image_replace_gravatar_in_post'] : '' ;
	
	$boolean = agnosia_evaluate_variable( $value_post );
	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;

}



function agnosia_thumbnail_replaces_gravatar_in_index() {

	global $post;

	$meta_value = get_post_meta( $post->ID, 'agnosia_post_meta' , true ) ;
	$value_index = isset( $meta_value['content_featured_image_replace_gravatar_in_index'] ) ? $meta_value['content_featured_image_replace_gravatar_in_index'] : '' ;

	$boolean = agnosia_evaluate_variable( $value_index );

	$boolean = apply_filters( __FUNCTION__ , $boolean ); 

	return $boolean;
	
}



function agnosia_get_thumbnail_position_in_post() {

	global $post;

	$meta_value = get_post_meta( $post->ID, 'agnosia_post_meta' , true ) ;
	$value_post = isset( $meta_value['content_featured_image_position_in_post'] ) ? $meta_value['content_featured_image_position_in_post'] : 'after-post-meta' ;
	
	$value_post = apply_filters( __FUNCTION__, $value_post );

	return $value_post;

}



function agnosia_get_thumbnail_position_in_index() {

	global $post;

	$meta_value = get_post_meta( $post->ID, 'agnosia_post_meta' , true ) ;
	$value_post = isset( $meta_value['content_featured_image_position_in_index'] ) ? $meta_value['content_featured_image_position_in_index'] : 'after-post-meta' ;
	
	$value_post = apply_filters( __FUNCTION__, $value_post );

	return $value_post;

}



function agnosia_can_show_post_thumbnail() {

	global $post;

	$boolean = false;

	if ( has_post_thumbnail( $post->ID ) and ( is_single() or is_page() ) ) : $boolean = true;
	endif;

	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_can_show_index_thumbnail() {

	global $post;

	$boolean = false;

	if ( has_post_thumbnail( $post->ID ) and ( is_home() or is_search() or is_author() or is_archive() ) ) : 
		$boolean = true;
	endif;

	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_post_show_thumbnail_after_header_img() {

	$boolean = agnosia_post_thumbnail_evaluate_position( 'after-general-header-img' );
	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_post_show_thumbnail_after_header_bg() {

	$boolean = agnosia_post_thumbnail_evaluate_position( 'after-general-header-bg' );
	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_post_show_thumbnail_before_header() {

	$boolean = agnosia_post_thumbnail_evaluate_position( 'before-post-header' );
	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_post_show_thumbnail_after_title() {

	$boolean = agnosia_post_thumbnail_evaluate_position( 'after-post-title' );
	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_post_show_thumbnail_after_author() {

	$boolean = agnosia_post_thumbnail_evaluate_position( 'after-post-author' );
	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_post_show_thumbnail_after_meta() {

	$boolean = agnosia_post_thumbnail_evaluate_position( 'after-post-meta' );
	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_index_show_thumbnail_before_header() {

	$boolean = agnosia_index_thumbnail_evaluate_position( 'before-post-header' );
	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_index_show_thumbnail_after_title() {

	$boolean = agnosia_index_thumbnail_evaluate_position( 'after-post-title' );
	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_index_show_thumbnail_after_author() {

	$boolean = agnosia_index_thumbnail_evaluate_position( 'after-post-author' );
	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_index_show_thumbnail_after_meta() {

	$boolean = agnosia_index_thumbnail_evaluate_position( 'after-post-meta' );
	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_post_thumbnail_evaluate_position( $position ) {

	$boolean = false;

	if (
		agnosia_can_show_post_thumbnail()
		and ( $position == agnosia_get_thumbnail_position_in_post() )
	) :

		$boolean = true;

	endif;

	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



function agnosia_index_thumbnail_evaluate_position( $position ) {

	$boolean = false;

	if (
		agnosia_can_show_index_thumbnail()
		and ( $position == agnosia_get_thumbnail_position_in_index() )
	) :

		$boolean = true;

	endif;

	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}



/* Validations for pages. */

function agnosia_has_page_hierarchy($post) {

	$boolean = false;

    $children = agnosia_get_page_children($post);

    if ( !empty($children) ) :

        $boolean = true;

    endif;

    $boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}

function agnosia_page_has_large_header() {

	$boolean = 'page-large-header.php' == get_page_template_slug();
	$boolean = apply_filters( __FUNCTION__, $boolean );

	return $boolean;

}


?>
