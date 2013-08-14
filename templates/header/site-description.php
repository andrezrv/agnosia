<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the extra site description section.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php

if ( agnosia_get('show_site_description') == 'true' ) :

?>

	<section id="site-description" class="description">

		<div class="<?php agnosia_wrapper_style(); ?>">
			<span class=""><?php bloginfo('description'); ?></span>
		</div>

	</section>

<?php

endif;
