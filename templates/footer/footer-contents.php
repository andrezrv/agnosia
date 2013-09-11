<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the footer contents.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<footer id="footer">

	<section id="footer-content" class="<?php agnosia_wrapper_style(); ?>">

		<nav id="footer-sidebars" class="row-fluid">
			<?php agnosia_footer_sidebars(); ?>
		</nav>

	</section>

</footer>

<?php agnosia_footer_credits(); ?>