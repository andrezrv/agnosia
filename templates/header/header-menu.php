<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the header navigation menu.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php if ( agnosia_evaluate('header_navbar_show_navigation') ) : ?>

	<section id="header-menu" class="<?php agnosia_header_menu_class(); ?>">

		<?php

		if ( $agnosia_header_menu = wp_nav_menu( array( 
					'theme_location' => 'header-menu' ,
					'container'  => 'div' , 
					'container_class' => 'menu-header-menu-container', 
					'menu_class' => 'menu nav' ,
					'fallback_cb' => false ,
					'echo' => 0 ,
					) 
			) ) :

			echo $agnosia_header_menu;

		else : 

			wp_page_menu( array(
					'menu_class' => 'menu-header-menu-container',
				)
			);

		endif;

		?>

	</section>

<?php endif; ?>