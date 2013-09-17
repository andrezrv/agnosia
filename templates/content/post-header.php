<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the post header.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<header class="post-header <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">
	<?php agnosia_post_author_gravatar(); ?>
	<?php agnosia_post_title(); // Uses agnosia_get_template( 'the-title', 'content' ) and the_title(). ?>
	<?php agnosia_post_thumbnail( 'index-after-title' ); ?>
	<?php agnosia_post_meta_before(); // Uses agnosia_get_template( 'posts-meta-before', 'content' ); ?>
</header>