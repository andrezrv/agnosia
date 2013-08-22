<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows an edit link into a page.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php if ( !is_archive() and agnosia_evaluate('content_show_page_edit_bottom') ) : ?>

	<?php edit_post_link( __( 'Edit this page' , 'agnosia' ) , '<section id="edit-entry" class="edit page"><span>' , '</span></section>'); ?>
					
<?php endif; ?>