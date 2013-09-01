<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the registration of image format type options.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

/*Images options*/

agnosia_register_option( 'content_enable_post_image' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '<div class="misc-pub-section" style="padding: 0;"><h4>' . __( 'Images' , 'agnosia' ) . '</h4> ',
		'label' => '<strong>' . __( 'Enable image post format' , 'agnosia' ) . '</strong>' ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_breadcrumb' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '',
		'label' => __( 'Show breadcrumb if available' , 'agnosia' ) ,
		'description' => '<em><small>' . __( 'Show breadcrumb if the WordPress SEO plugin is installed and active.' , 'agnosia' ) . '</small></em>' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_header' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '<div class="dependent" id="content[content_enable_post_image][dependent]">',
		'label' => __( 'Show header' , 'agnosia' ) ,
		'description' => '<em><small>' . __( 'Show title, author and meta data of the currently retrieved post into post header.' , 'agnosia' ) . '</small></em>' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_title' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_post_image_header' , 
	'html' => array(
		'before' => '<div class="dependent" id="content[content_show_post_image_header][dependent]">' ,
		'label' => __( 'Show titles' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_author' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_post_image_header' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show author' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_author_gravatar' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_post_image_header' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show author avatar' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_meta' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_post_image_header' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show meta data' , 'agnosia' ) ,
		'description' => '<em><small>' . __( 'Show adittional information about the currently retrieved post.' , 'agnosia' ) . '</small></em>' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_date_top' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_post_image_header' , 
	'html' => array(
		'before' => '<div class="dependent" id="content[content_show_post_image_meta][dependent]">' ,
		'label' => __( 'Show date' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_categories_top' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_post_image_header' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show categories' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_tags_top' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_post_image_header' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show tags' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_comments_top' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_post_image_header' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show number of comments' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_permalinks_top' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_post_image_header' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show permalink to post' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '</div></div>' ,
	),
) );

agnosia_register_option( 'content_show_post_image_footer' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '',
		'label' => __( 'Show footer' , 'agnosia' ) ,
		'description' => '<em><small>' . __( 'Show title, author and meta data of the currently retrieved post into post footer.' , 'agnosia' ) . '</small></em>' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_title_bottom' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '<div class="dependent" id="content[content_show_post_image_footer][dependent]">' ,
		'label' => __( 'Show title' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_metadata' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show meta data' , 'agnosia' ) ,
		'description' => '<em><small>' . __( 'Show adittional information about the currently retrieved post.' , 'agnosia' ) . '</small></em>' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_author_bottom' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_post_image_footer' , 
	'html' => array(
		'before' => '<div class="dependent" id="content[content_show_post_image_metadata][dependent]">' ,
		'label' => __( 'Show author' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_date_bottom' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_post_image_footer' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show date' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_categories_bottom' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show categories' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_tags_bottom' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_post_image_footer' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show tags' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_comments_bottom' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show number of comments' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_permalinks_bottom' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show permalink to post' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '</div>' ,
	),
) );

agnosia_register_option( 'content_show_post_image_navigation' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show navigation on bottom of post' , 'agnosia' ) ,
		'description' => '<small>' . sprintf( __( 'Display %1$sNext Post%2$s and %1$sPrevious Post%2$s links.' , 'agnosia' ), '<strong>', '</strong>' ) . '</small>' ,
		'after' => '' ,
	),
	
) );

agnosia_register_option( 'content_show_post_image_edit_bottom' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show edit link' , 'agnosia' ) ,
		'description' => '<em><small>' . __( 'Display edit link to users with given permissions.', 'agnosia' ) . '</small></em>' ,
		'after' => '' ,
	),
) );


agnosia_register_option( 'content_show_post_image_author_box' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show author information' , 'agnosia' ) ,
		'description' => '<em><small>' . __( 'Display information about the author of the post.' , 'agnosia' ) . '</small></em>' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_post_image_author_box_gravatar' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '<div class="dependent" id="content[content_show_post_image_author_box][dependent]">' ,
		'label' => __( 'Show author avatar' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '</div></div></div></div>' ,
	),
) );


?>