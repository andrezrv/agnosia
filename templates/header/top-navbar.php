<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the top navigation bar.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<section id="top-navbar" class="<?php agnosia_header_top_navbar_class(); ?>">

	<nav class="navbar<?php agnosia_header_top_navbar_color_scheme(); ?>">

		<section class="navbar-inner">

			<section class="<?php agnosia_wrapper_style(); ?>">

				<?php agnosia_load_template( 'top-responsive-button' , 'header' ); ?>

				<div id="top-navbar-row" class="<?php agnosia_top_navbar_row_class(); ?>">

					<?php agnosia_load_template( 'top-brand' , 'header' ); ?>

					<div id="top-navigation" class="<?php agnosia_top_navigation_class(); ?>">

						<?php agnosia_load_template( 'top-menu' , 'header' ); ?>

						<?php agnosia_load_template( 'top-searchform' , 'header' ); ?>

					</div>

				</div>

			</section>

		</section>

	</nav>

</section>