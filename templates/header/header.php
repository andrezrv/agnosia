<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the site header block.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php if ( agnosia_get('show_header') == 'true' ) : ?>

	<header id="header">

		<?php if ( current_theme_supports( 'agnosia-top-navbar' )) : 
			agnosia_load_template( 'top-navbar' , 'header' ); 
		endif; ?>

		<?php if ( current_theme_supports( 'agnosia-branding' ) ) : 
			agnosia_load_template( 'branding' , 'header' );
		endif; ?>

		<?php if ( current_theme_supports( 'agnosia-header-navbar' ) ) : 
			agnosia_load_template( 'header-navbar' , 'header' );
		endif; ?>

		<?php if ( current_theme_supports( 'agnosia-additional-site-description' ) ) :
			agnosia_load_template( 'site-description' , 'header' );
		endif; ?>

		<?php if ( agnosia_post_show_thumbnail_after_header_img() ) : ?> 

			<section class="post-thumbnail">

				<?php agnosia_post_thumbnail_img(); ?>

			</section>

		<?php endif; ?>

	</header>

<?php endif; ?>