<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the header navigation bar searchform.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php if ( agnosia_evaluate('header_navbar_show_search') ) : ?>

	<div id="header-searchform-container" class="<?php agnosia_top_searchform_container_class(); ?>">

		<section id="header-searchform" class="searchform">

			<?php agnosia_header_navbar_search_form(); ?>

		</section>

	</div>

<?php endif; ?>