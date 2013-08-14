<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles views for WordPress authors' archives.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php get_header(); ?>

<?php get_sidebar( 'left' ); ?>

<section id="archive-container" class="<?php agnosia_content_colspan(); ?> <?php agnosia_post_class(); ?>">

	<?php if ( have_posts() ) : ?>

			<?php $post = $posts[0]; // Little hack. Set $post so that the_date() works. ?>

			<div class="entry <?php agnosia_post_class(); ?>">

				<h2 class="pagetitle"><?php _e( 'Author Archive' , 'agnosia' ); ?></h2>

			</div>

		<?php while ( have_posts() ) : the_post(); ?>
		
			<article <?php post_class( agnosia_get_post_format() ) ?>>

				<?php if ( agnosia_index_show_thumbnail_before_header() ) : ?>

					<section class="post-thumbnail <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

						<?php agnosia_post_thumbnail_img(); ?>

					</section>

				<?php endif; ?>

				<?php if ( agnosia_show_post_header() ) : ?>
			
					<header class="post-header <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

						<?php if ( agnosia_show_post_author_gravatar() ) : ?>

							<?php agnosia_load_template( 'author-gravatar'  , 'content' ); ?>

						<?php endif; ?>

						<?php if ( agnosia_show_post_title() ) : ?>

							<?php agnosia_load_template( 'the-title'  , 'content' ); ?>

						<?php endif; ?>

						<?php if ( agnosia_index_show_thumbnail_after_title() ) : ?>

							<section class="post-thumbnail <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

								<?php agnosia_post_thumbnail_img(); ?>

							</section>

						<?php endif; ?>

						<?php agnosia_load_template( 'posts-meta-before'  , 'content' ); ?>

					</header>

				<?php endif; ?>

				<?php if ( agnosia_index_show_thumbnail_after_meta() ) : ?>

					<section class="post-thumbnail <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

						<?php agnosia_post_thumbnail_img(); ?>

					</section>

				<?php endif; ?>

				<section class="entry <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

					<?php agnosia_load_template( 'the-content'  , 'content' ); ?>

				</section>

				<?php if ( agnosia_show_post_footer() ) : ?>

					<footer class="post-footer <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

						<?php if ( agnosia_show_post_metadata() ) : ?>
								
							<?php agnosia_load_template( 'posts-meta-after'  , 'content' ); ?>

						<?php endif; ?>

						<?php agnosia_load_template( 'post-edit'  , 'content' ); ?>	

					</footer>

				<?php endif; ?>

			</article>

			<?php agnosia_load_template( 'separator'  , 'content' ); ?>

		<?php endwhile; ?>

		<?php agnosia_load_template( 'page-navigation' , 'content' ); ?>
		
	<?php else : ?>

		<h2><?php _e( 'Nothing Found' , 'agnosia' ); ?></h2>

	<?php endif; ?>

</section>

<?php get_sidebar( 'right' ); ?>

<?php get_footer(); ?>
