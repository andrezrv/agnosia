<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the registration of page options.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

/*Pages options*/

agnosia_register_option( 'content_show_page_hierarchy' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'position' => 8 ,
	'html' => array(
		'before' => '<div class="misc-pub-section" style="padding: 0;"><h4>' . __( 'Pages' , 'agnosia' ) . '</h4> ',
		'label' => __( 'Show hierarchy' , 'agnosia' ) ,
		'description' => '<em><small>' . __( 'Display a hierarchical navigation list containing the parent, children and sibling pages of the currently retrieved page.' , 'agnosia' ) . '</small></em>' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_page_header' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'position' => 8 ,
	'html' => array(
		'before' => '',
		'label' => __( 'Show header' , 'agnosia' ) ,
		'description' => '<em><small>' . __( 'Show title, author and meta data of the currently retrieved page into page header.' , 'agnosia' ) . '</small></em>' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_page_title' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_page_header' , 
	'position' => 9 ,
	'html' => array(
		'before' => '<div class="dependent" id="content[content_show_page_header][dependent]">' ,
		'label' => __( 'Show titles' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_page_author' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_page_header' , 
	'position' => 11 ,
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show author' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_page_meta' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_page_header' , 
	'position' => 10 ,
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show meta data' , 'agnosia' ) ,
		'description' => '<em><small>' . __( 'Show adittional information about the currently retrieved page.' , 'agnosia' ) . '</small></em>' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_page_comments_top' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_page_header' , 
	'html' => array(
		'before' => '<div class="dependent" id="content[content_show_page_meta][dependent]">' ,
		'label' => __( 'Show number of comments' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_page_permalinks_top' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_page_header' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show permalink to page' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '</div></div>' ,
	),
) );

agnosia_register_option( 'content_show_page_footer' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'position' => 8 ,
	'html' => array(
		'before' => '',
		'label' => __( 'Show footer' , 'agnosia' ) ,
		'description' => '<em><small>' . __( 'Show title, author and meta data of the currently retrieved page into page footer.' , 'agnosia' ) . '</small></em>' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_page_title_bottom' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '<div class="dependent" id="content[content_show_page_footer][dependent]">' ,
		'label' => __( 'Show title' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_page_metadata' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show meta data' , 'agnosia' ) ,
		'description' => '<em><small>' . __( 'Show additional information about the currently retrieved page.' , 'agnosia' ) . '</small></em>' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_page_author_bottom' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => 'content_show_page_footer' , 
	'position' => 11 ,
	'html' => array(
		'before' => '<div class="dependent" id="content[content_show_page_metadata][dependent]">' ,
		'label' => __( 'Show author' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_page_comments_bottom' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show number of comments on bottom of pages' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_page_permalinks_bottom' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show permalink to page' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '</div>' ,
	),
) );

agnosia_register_option( 'content_show_page_edit_bottom' , array( 
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

agnosia_register_option( 'content_show_page_author_box' , array( 
	'type' => 'checkbox' , 
	'value' => 'false' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '' ,
		'label' => __( 'Show author information' , 'agnosia' ) ,
		'description' => '<em><small>' . __( 'Display information about the author of the page.' , 'agnosia' ) . '</small></em>' ,
		'after' => '' ,
	),
) );

agnosia_register_option( 'content_show_page_author_box_gravatar' , array( 
	'type' => 'checkbox' , 
	'value' => 'true' , 
	'values' => array( 'true' , 'false' ) , 
	'category' => 'content' , 
	'parent' => '' , 
	'html' => array(
		'before' => '<div class="dependent" id="content[content_show_page_author_box][dependent]">' ,
		'label' => __( 'Show author avatar' , 'agnosia' ) ,
		'description' => '' ,
		'after' => '</div></div></div>' ,
	),
) );

?>