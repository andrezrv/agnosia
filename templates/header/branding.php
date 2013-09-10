<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the branding section.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<section id="branding" class="<?php agnosia_branding_navbar_class(); ?>">

	<nav class="<?php agnosia_branding_navbar_nav_class(); ?>">

		<section class="navbar-inner" <?php agnosia_custom_header(); ?>>

			<section class="<?php agnosia_wrapper_style(); ?>">

				<?php agnosia_branding_responsive_button(); // Uses agnosia_get_template( 'branding-responsive-button' , 'header' ) ?>

				<div id="branding-navbar-row" class="<?php agnosia_branding_navbar_row_class(); ?>">

					<?php agnosia_single_branding(); // Uses agnosia_get_template( 'single-branding' , 'header' ); ?>

					<?php agnosia_secondary_branding(); // Uses agnosia_get_template( 'double-branding' , 'header' ); ?>

					<div id="branding-navigation" class="<?php agnosia_branding_navigation_class(); ?>">
								
						<?php agnosia_branding_menu(); // Uses agnosia_get_template( 'branding-menu' , 'header' ); ?>

						<?php agnosia_branding_searchform(); // Uses agnosia_get_template( 'branding-searchform' , 'header' ); ?>

					</div>

				</div>

			</section>

		</section>

	</nav>

</section>