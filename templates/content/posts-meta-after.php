<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows meta data after a post.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<section class="info bottom">

	<div class="metadata bottom">

		<?php agnosia_post_author_bottom(); ?>

		<?php agnosia_post_date_bottom(); ?>

		<?php agnosia_post_categories_bottom(); ?>

		<?php agnosia_post_tags_bottom(); ?>

		<?php agnosia_post_comments_bottom(); ?>

		<?php agnosia_post_permalink_bottom(); ?>

	</div>	

</section>