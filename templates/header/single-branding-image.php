<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the single brand image section.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<section id="single-branding-image" class="brand">

	<h1>
		<a href="<?php agnosia_home_url(); ?>/">
			<img alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" src="<?php agnosia_header_branding_logo(); ?>" />
		</a>
	</h1>

	<?php if ( agnosia_evaluate('header_branding_section_site_description') ) : ?>

		<h2><?php bloginfo('description'); ?></h2>

	<?php endif; ?>

</section>