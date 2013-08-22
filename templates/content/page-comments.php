<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the comments of a page.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php if ( agnosia_evaluate_show( 'content_show_page_comments_bottom' , 'content_hide_comments_bottom' , $post ) ) : ?>

	<?php comments_template(); ?>

<?php endif; ?>