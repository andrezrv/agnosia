<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles views for WordPress pages.
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

<?php // The following call uses agnosia_get_template( 'page-hierarchy'  , 'content' ); ?>
<?php agnosia_page_hierarchy(); ?>

<section id="page-container" class="<?php agnosia_content_colspan(); ?> <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

	<?php agnosia_page_breadcrumb(); ?>
	<?php agnosia_before_content(); ?>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>
			
			<article class="page post <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>" id="post-<?php the_ID(); ?>">

				<?php // The following call uses agnosia_get_template( 'post-thumbnail', 'content' ); ?>
				<?php agnosia_post_thumbnail( 'post-before-header' ); ?>

				<?php // The following call uses agnosia_get_template( 'page-header', 'content' ); ?>
				<?php agnosia_page_header(); ?>

				<?php // The following call uses agnosia_get_template( 'post-thumbnail', 'content' ); ?>
				<?php agnosia_post_thumbnail( 'post-after-meta' ); ?>

				<section class="entry <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">
					<?php agnosia_load_template( 'the-content' , 'content' ); ?>
				</section>

				<?php agnosia_post_pages(); ?>

				<?php // The following call uses agnosia_get_template( 'page-footer', 'content' ); ?>
				<?php agnosia_page_footer(); ?>

			</article>

			<?php agnosia_load_template( 'separator'  , 'content' ); ?>			
			<?php agnosia_load_template( 'post-comments'  , 'content' ); ?>

		<?php endwhile;?>

	<?php endif; ?>

	<?php agnosia_after_content(); ?>

</section>

<?php get_sidebar( 'right' ); ?>

<?php get_footer(); ?>
