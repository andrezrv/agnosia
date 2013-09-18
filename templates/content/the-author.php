<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows a post author box.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>


<div id="authorarea">

	<?php // The following call uses agnosia_get_template( 'author-box-gravatar'  , 'content' ); ?>
	<?php agnosia_author_box_gravatar(); ?>

	<div class="authorinfo">
		<h3><?php the_author_posts_link(); ?></h3>
		<p><?php the_author_meta( 'description' ); ?></p>
	</div>
	
</div>