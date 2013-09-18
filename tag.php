<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles views for WordPress tags' archives.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<?php get_header(); ?>

<?php get_sidebar( 'left' ); ?>

<section id="tag-archive-container" class="<?php agnosia_content_colspan(); ?> <?php agnosia_post_class(); ?>">

	<?php if ( have_posts() ) : ?>

		<div class="entry <?php agnosia_post_class(); ?>">
			<?php agnosia_static_breadcrumb(); ?>				
		</div>

		<?php while ( have_posts() ) : the_post(); ?>
		
			<article <?php post_class( agnosia_get_post_format() ) ?>>

				<?php // The following call uses agnosia_get_template( 'post-thumbnail', 'content' ); ?>
				<?php agnosia_post_thumbnail( 'index-before-header' ); ?>
				
				<?php // The following call uses agnosia_get_template( 'post-header', 'content' ); ?>
				<?php agnosia_post_header(); ?>
				
				<?php // The following call uses agnosia_get_template( 'post-thumbnail', 'content' ); ?>
				<?php agnosia_post_thumbnail( 'index-after-meta' ); ?>

				<section class="entry <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">
					<?php agnosia_load_template( 'the-content'  , 'content' ); ?>
				</section>

				<?php // The following call uses agnosia_get_template( 'post-footer', 'content' ); ?>
				<?php agnosia_post_footer(); ?>

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
