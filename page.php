<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles views for WordPress pages.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php get_header(); ?>

<?php get_sidebar( 'left' ); ?>

<?php agnosia_load_template( 'page-hierarchy'  , 'content' ); ?>

<section id="page-container" class="<?php agnosia_content_colspan(); ?> <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

	<?php agnosia_page_breadcrumb(); ?>

	<?php if ( function_exists( 'agnosia_ac_post_additional_html' ) ) : ?>
		<?php agnosia_load_template( 'before-content' , 'content' ); ?>
	<?php endif; ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $post = get_post( get_the_ID() ); ?>
			
		<article class="post <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>" id="post-<?php the_ID(); ?>">

			<?php if ( agnosia_post_show_thumbnail_before_header() ) : ?>

				<section class="post-thumbnail <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

					<?php agnosia_post_thumbnail_img(); ?>

				</section>

			<?php endif; ?>

			<?php if ( agnosia_show_page_header() ) : ?>

				<header class="post-header <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

					<?php if ( agnosia_show_page_author_gravatar() ) : ?>

						<?php agnosia_load_template( 'author-gravatar'  , 'content' ); ?>

					<?php endif; ?>

					<?php if ( agnosia_show_page_title() ) : ?>

						<?php agnosia_load_template( 'the-title'  , 'content' ); ?>

					<?php endif; ?>

					<?php if ( agnosia_post_show_thumbnail_after_title() ) : ?>

						<section class="post-thumbnail <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

							<?php agnosia_post_thumbnail_img(); ?>

						</section>

					<?php endif; ?>
					
					<?php if ( agnosia_show_page_meta() ) : ?>
					
						<?php agnosia_load_template( 'pages-meta-before'  , 'content' ); ?>

					<?php endif; ?>

				</header>

			<?php endif; ?>

			<?php if ( agnosia_post_show_thumbnail_after_meta() ) : ?>

				<section class="post-thumbnail <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

					<?php agnosia_post_thumbnail_img(); ?>

				</section>

			<?php endif; ?>

			<section class="entry <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

				<?php agnosia_load_template( 'the-content' , 'content' ); ?>

			</section>

			<?php agnosia_load_template( 'post-pages'  , 'content' ); ?>

			<?php if ( agnosia_show_page_footer() ) : ?>

				<footer class="page-footer single">

					<?php if ( agnosia_show_page_metadata() ) : ?>
							
						<?php agnosia_load_template( 'pages-meta-after'  , 'content' ); ?>

					<?php endif; ?>

					<?php agnosia_load_template( 'post-edit'  , 'content' ); ?>	

					<?php agnosia_load_template( 'the-author'  , 'content' ); ?>	
			
				</footer>

			<?php endif; ?>	

		</article>

		<?php agnosia_load_template( 'separator'  , 'content' ); ?>
		
		<?php agnosia_load_template( 'post-comments'  , 'content' ); ?>

	<?php endwhile; endif; ?>

	<?php if ( function_exists( 'agnosia_ac_post_additional_html' ) ) : ?>
		<?php agnosia_load_template( 'after-content' , 'content' ); ?>
	<?php endif; ?>

</section>

<?php get_sidebar( 'right' ); ?>

<?php get_footer(); ?>
