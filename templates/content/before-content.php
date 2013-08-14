<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows contents before main content section.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>


<?php

if ( is_page() or is_single() ) :

	ob_start();
	do_action( 'agnosia_ac_before_content_html' );
	$before_content_html = ob_get_contents();
	ob_end_clean();

	if ( $before_content_html ) :

	?>

		<div id="before-content-html" class="extra-content">
			
			<?php echo $before_content_html ; ?>

		</div>

	<?php

	endif;

	wp_reset_query();

endif;

?>