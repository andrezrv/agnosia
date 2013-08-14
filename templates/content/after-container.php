<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows contents after main container element.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

if ( is_page() or is_single() ) :

	ob_start();
	do_action( 'agnosia_ac_after_container_html' );
	$after_container_html = ob_get_contents();
	ob_end_clean();

	if ( $after_container_html ) :

	?>

		<div id="after-container-html" class="extra-content">
			
			<?php echo $after_container_html ; ?>

		</div>

	<?php

	endif;

	wp_reset_query();

endif;

?>