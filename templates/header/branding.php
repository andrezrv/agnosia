<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the branding section.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php if ( agnosia_evaluate('show_header_branding_section') ) : ?>

	<section id="branding" class="<?php agnosia_branding_navbar_class(); ?>">

		<nav class="<?php agnosia_branding_navbar_nav_class(); ?>">

			<section class="navbar-inner" <?php agnosia_custom_header(); ?>>

				<section class="<?php agnosia_wrapper_style(); ?>">

					<?php agnosia_load_template( 'branding-responsive-button' , 'header' ); ?>

					<div id="branding-navbar-row" class="<?php agnosia_branding_navbar_row_class(); ?>">

						<?php agnosia_load_template( 'single-branding' , 'header' ); ?>

						<?php if ( current_theme_supports( 'agnosia-secondary-branding' ) ) :
							agnosia_load_template( 'double-branding' , 'header' );
						endif; ?>

						<div id="branding-navigation" class="<?php agnosia_branding_navigation_class(); ?>">
									
							<?php agnosia_load_template( 'branding-menu' , 'header' ); ?>

							<?php agnosia_load_template( 'branding-searchform' , 'header' ); ?>

						</div>

					</div>

				</section>

			</section>

		</nav>

	</section>

<?php endif; ?>