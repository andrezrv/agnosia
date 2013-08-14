<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the post author's Gravatar into the author box.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<div class="gravatar">
	
	<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
	
</div>