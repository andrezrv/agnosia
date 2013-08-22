<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the seconday brand section.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<div id="double-branding-secondary-brand" class="<?php agnosia_secondary_branding_container_class(); ?>">

	<?php if ( agnosia_header_branding_secondary_logo_img_exists() ) : ?>

		<section id="secondary-branding-img" class="brand">

			<h2><?php agnosia_header_branding_secondary_logo(); ?></h2>

			<?php if ( agnosia_get( 'header_branding_section_secondary_logo_subtitle' ) ) : ?>

				<h3><?php agnosia_header_branding_section_secondary_logo_subtitle(); ?></h3>

			<?php endif; ?>

		</section>

	<?php else : ?>

		<section id="secondary-branding-text" class="brand">

			<h2><?php agnosia_header_branding_secondary_logo(); ?></h2>

			<?php if ( agnosia_get( 'header_branding_section_secondary_logo_subtitle' ) ) : ?>

				<h3><?php agnosia_header_branding_section_secondary_logo_subtitle(); ?></h3>

			<?php endif; ?>

		</section>

	<?php endif; ?>

</div>