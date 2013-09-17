<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the view for a typical WordPress home post.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<article <?php post_class( agnosia_get_post_format() ) ?> id="post-<?php the_ID(); ?>">

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