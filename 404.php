<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles views for error code 404.
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

<section id="404-container" class="<?php agnosia_post_class(); ?> <?php agnosia_content_colspan(); ?>">

	<h2><?php _e( 'Error 404 - Page Not Found' , 'agnosia' ) ?></h2>
	<p><?php _e( 'The page you were looking for does not exist. You can try to find it by using the search option. ' , 'agnosia' ) ?></p>

</section>

<?php get_sidebar( 'right' ); ?>

<?php get_footer(); ?>