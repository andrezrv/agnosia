<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows an edit link into a post.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php 

if ( 
	( is_page() and agnosia_evaluate('content_show' . agnosia_get_prefixed_page_format() . '_edit_bottom' ) )
	or ( ( is_single() or is_home() or is_archive() or is_author() or is_search() ) and agnosia_evaluate('content_show_post' . agnosia_get_prefixed_post_format() . '_edit_bottom' ) )
) : 

	edit_post_link( __( 'Edit this entry' , 'agnosia' ) , '<section class="edit-entry"><span>' , '</span></section>');
				
endif;

?>