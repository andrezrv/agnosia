<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the author's Gravatar.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<div class="gravatar">

	<?php if ( !agnosia_thumbnail_replaces_gravatar() ) : ?>
					
		<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>

	<?php elseif( get_the_post_thumbnail( get_the_ID() ) ): ?>

		<?php echo the_post_thumbnail( array( 100 , 100 ) ); ?>

	<?php endif; ?>
					
</div>