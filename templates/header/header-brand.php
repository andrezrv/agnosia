<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the brand name into the header navigation bar.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php if ( agnosia_get('header_navbar_show_brand') == 'true' ) : ?>

	<div id="header-brand-container" class="<?php agnosia_header_brand_container_class(); ?>">

		<section class="brand">
			<h1><a href="<?php agnosia_home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
		</section>

	</div>

<?php endif; ?>