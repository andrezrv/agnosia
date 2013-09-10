<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the primary brand text section.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<section id="primary-branding-text" class="brand">

	<h1><a href="<?php agnosia_home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>

	<?php if ( agnosia_evaluate('header_branding_section_site_description') ) : ?>

		<h2><?php bloginfo('description'); ?></h2>

	<?php endif; ?>

</section>