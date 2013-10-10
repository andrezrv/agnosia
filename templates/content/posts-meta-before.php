<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows meta data before a post.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<section class="<?php agnosia_post_info_top_class(); ?>">

	<?php agnosia_post_author(); ?>

	<?php agnosia_get_post_thumbnail( 'post-after-author' ); ?>

	<?php agnosia_post_meta(); ?>

</section>