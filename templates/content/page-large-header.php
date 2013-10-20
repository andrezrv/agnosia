<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template meant to show a large header section.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<header class="post-header page-header <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

	<div class="container">						

		<?php agnosia_load_template( 'the-title'  , 'content' ); ?>

		<?php agnosia_get_post_thumbnail( 'post-after-title' ); ?>

		<div class="page-excerpt">
			<?php agnosia_inserted_html(); ?>
		</div>

	</div>

</header>