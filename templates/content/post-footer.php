<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the post footer.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<footer class="post-footer <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

	<?php // The following call uses agnosia_get_template( 'posts-meta-after'  , 'content' ); ?>
	<?php agnosia_post_meta_after(); ?>

	<?php // The following call uses agnosia_get_template( 'post-edit', 'content' ); ?>
	<?php agnosia_post_edit_link(); ?>

	<?php // The following call uses agnosia_get_template( 'the-author'  , 'content' ); ?>
	<?php agnosia_the_author(); ?>	

</footer>