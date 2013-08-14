<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows both the primary and secondary brands.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php if ( agnosia_header_branding_has_secondary_logo() ) : ?>

	<div id="double-branding-container" class="<?php agnosia_double_branding_container_class(); ?>">

		<?php agnosia_load_template( 'primary-brand' , 'header' ); ?>

		<?php agnosia_load_template( 'secondary-brand' , 'header' ); ?>

	</div>

<?php endif; ?>