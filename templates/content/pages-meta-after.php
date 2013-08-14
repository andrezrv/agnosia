<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows meta data after a page.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php if ( agnosia_show_page_metadata() ) : ?>

	<section class="info bottom">

		<div class="metadata bottom">

			<?php if ( agnosia_show_page_author_bottom() ) : ?>

				<section class="author">
					<span><?php _e( 'By' , 'agnosia' ); ?> <?php the_author_posts_link(); ?></span>
				</section>

			<?php endif; ?>

			<?php if ( agnosia_show_page_comments_bottom() and comments_open() ) : ?>

				<section class="comments">
					<span><?php comments_popup_link( __( 'No Comments' , 'agnosia' ) , __( '1 Comment' , 'agnosia' ) , __( '% Comments' , 'agnosia' ) , 'comments-link' , '' ); ?></span>
				</section>

			<?php endif; ?>

			<?php if ( agnosia_show_page_permalinks_bottom() ) : ?>

				<section class="permalink">
					<span><a href="<?php the_permalink(); ?>" class="permalink"><?php _e( 'Permalink' , 'agnosia' ); ?></a></span>
				</section>

			<?php endif; ?>

		</div>	

	</section>

<?php endif; ?>