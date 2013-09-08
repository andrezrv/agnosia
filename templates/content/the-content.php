<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the content of a post, archive, index or page.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php

global $post;

$post_meta = get_post_meta( get_the_ID(), 'agnosia_post_meta' , true ) ;

if ( ( is_home() or is_archive() or is_search() or is_author() ) and 'standard' == agnosia_get_post_format() ) :

	if ( !isset( $post_meta['content_show_post_excerpt_in_index'] ) 
		or !agnosia_evaluate_variable( $post_meta['content_show_post_excerpt_in_index'] ) 
		or !get_the_excerpt() ) :

		the_content( __( 'Read more' , 'agnosia' ) );
	
	else :

		?>

		<?php agnosia_load_template( 'post-excerpt', 'content' ); ?>

		<?php

	endif;

else :

	if ( isset( $post_meta['content_show_post_excerpt_in_post'] ) and get_the_excerpt() ) :

		?>
		
		<?php agnosia_load_template( 'post-excerpt', 'content' ); ?>

		<?php
			
	endif;

	the_content();

endif;

?>