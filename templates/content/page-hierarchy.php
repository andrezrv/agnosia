<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the page hierarchy of a page.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php global $post; ?>

<?php if ( agnosia_evaluate_show( 'content_show_page_hierarchy' , 'content_hide_page_hierarchy' , $post ) and agnosia_has_page_hierarchy($post) ) : ?>

	<section id="page-hierarchy" class="span3">

		<ul class="nav nav-list">

		<?php agnosia_page_hierarchy($post); ?>

		</ul>

	</section>

<?php endif;?>