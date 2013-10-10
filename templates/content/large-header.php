<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows a large post header.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<header class="post-header <?php if ( is_page() ) : ?>page-header<?php endif; ?> <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

	<div class="container">						

		<?php agnosia_load_template( 'the-title'  , 'content' ); ?>

		<?php // The following call uses agnosia_get_template( 'post-thumbnail', 'content' ); ?>
		<?php agnosia_post_thumbnail( 'index-after-title' ); ?>

		<div class="page-excerpt">
			<?php the_excerpt(); ?>
		</div>

	</div>

</header>