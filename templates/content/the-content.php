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

		<div id="post-excerpt" role="excerpt">

			<?php the_excerpt(); ?>

		</div>

		<?php

	endif;

else :

	if ( isset( $post_meta['content_show_post_excerpt_in_post'] ) and get_the_excerpt() ) :

		?>
		
		<div id="post-excerpt" role="excerpt">

			<?php the_excerpt(); ?>

		</div>

		<?php
			
	endif;

	switch ( agnosia_get_post_format() ) {

		case 'aside' : ?>

			<aside>
				
				<?php the_content(); ?>

			</aside>

		<?php break;

		case 'quote' : ?>

			<?php the_content(); ?>

		<?php break;

		case 'status' : ?>

			<?php if ( ( is_page() and agnosia_show_page_status_thumbnail() ) or ( ( is_single() or is_home() ) and agnosia_show_post_status_thumbnail() )  ) : ?>
				
				<div class="gravatar">
					
					<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
					
				</div>
				
			<?php endif; ?>

			<div class="status">
				
				<?php if ( ( is_page() and agnosia_show_page_status_author_name() ) or ( ( is_single() or is_home() ) and agnosia_show_post_status_author_name() ) ) : ?>
					
					<h4><?php the_author_posts_link(); ?></h4>

				<?php endif; ?>

				<div class="content">
					
					<?php the_content(); ?>

				</div>

			</div>

		<?php break;

		case 'video' :

			the_content();

			if ( agnosia_show_post_title_bottom() ) :

				agnosia_load_template( 'the-title'  , 'content' );

			endif;

		break;

		case 'chat' : 

			?>

			<pre>
				<?php the_content(); ?>
			</pre>

			<?php

		break;

		default:
			
			the_content();

		break;
	}

endif;

?>