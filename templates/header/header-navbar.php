<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the header navigation bar.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php if ( agnosia_evaluate('show_header_navbar') ) : ?>

	<section id="header-navbar" class="<?php agnosia_header_navbar_class(); ?>">

		<nav class="navbar <?php agnosia_header_navbar_color_scheme(); ?>">

			<section class="navbar-inner">

				<section class="<?php agnosia_wrapper_style(); ?>">

					<?php agnosia_load_template( 'header-responsive-button' , 'header' ); ?>

					<div id="top-navbar-row" class="<?php agnosia_top_navbar_row_class(); ?>">

						<?php agnosia_load_template( 'header-brand' , 'header' ); ?>

						<div id="header-navigation" class="<?php agnosia_header_navigation_class(); ?>">
									
							<?php agnosia_load_template( 'header-menu' , 'header' ); ?>

							<?php agnosia_load_template( 'header-searchform' , 'header' ); ?>

						</div>

					</div>

				</section>

			</section>

		</nav>

	</section>

<?php endif; ?>