<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles views for WordPress home (blog or index, depending on your settings).
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php get_header(); ?>

<?php get_sidebar( 'left' ); ?>

<section id="posts-container" class="<?php agnosia_content_colspan(); ?> <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $post = get_post( get_the_ID() ); ?>

		<?php agnosia_load_template( 'home-post' , 'content' ); ?>

	<?php endwhile; ?>

	<?php agnosia_load_template( 'page-navigation' , 'content' ); ?>

	<?php wp_reset_query(); ?>

	<?php else : ?>

		<h2><?php _e( 'Not Found' , 'agnosia' ); ?></h2>

	<?php endif; ?>

</section>

<?php get_sidebar( 'right' ); ?>

<?php get_footer(); ?>
