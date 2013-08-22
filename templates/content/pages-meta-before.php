<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows meta data before a page.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php if ( agnosia_show_page_author() or agnosia_show_page_meta() ) : ?>

	<section class="info top">

		<?php if ( agnosia_show_page_author() ) : ?>

			<section class="author">
				<span><?php _e( 'By' , 'agnosia' ); ?> <?php the_author_posts_link(); ?></span>
			</section>

		<?php endif; ?>

		<?php if ( agnosia_post_show_thumbnail_after_author() ) : ?>

			<section class="post-thumbnail single <?php agnosia_post_format(); ?>">

				<?php agnosia_post_thumbnail_img(); ?>

			</section>

		<?php endif; ?>

		<?php if ( agnosia_show_page_meta() ) : ?>

			<div class="metadata top">

				<?php if ( agnosia_show_page_comments_top() and comments_open() ) : ?>

					<section class="comments">
						<span><?php comments_popup_link( __( 'No Comments' , 'agnosia' ) , __( '1 Comment' , 'agnosia' ) , __( '% Comments' , 'agnosia' ) , 'comments-link' , '' ); ?></span>
					</section>

				<?php endif; ?>

				<?php if ( agnosia_show_page_permalinks_top() ) : ?>

					<section class="permalink">
						<span><a href="<?php the_permalink(); ?>" class="permalink"><?php _e( 'Permalink' , 'agnosia' ); ?></a></span>
					</section>

				<?php endif; ?>

			</div>

		<?php endif; ?>

	</section>

<?php endif; ?>