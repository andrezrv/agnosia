<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the post content of status format type.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php agnosia_status_gravatar(); ?>

<div class="status">
	
	<?php agnosia_the_author_posts_link(); ?>

	<div class="content">
		
		<?php agnosia_inserted_html(); ?>

	</div>

</div>