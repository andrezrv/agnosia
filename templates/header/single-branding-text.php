<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the single brand text section.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<section id="single-branding-text" class="brand">

	<?php if ( agnosia_evaluate_show_branding_text() ) : ?>

		<h1><a href="<?php agnosia_home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>

		<?php if ( agnosia_evaluate('header_branding_section_site_description') ) : ?>

			<h2><?php bloginfo('description'); ?></h2>

		<?php endif; ?>
	
	<?php endif; ?>

</section>