<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the site header block.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<header id="header" role="main-header">

	<?php agnosia_top_navbar(); // Uses agnosia_get_template( 'top-navbar', 'header' ); ?>
	<?php agnosia_branding(); // Uses agnosia_get_template( 'branding', 'header' ); ?>
	<?php agnosia_header_navbar(); // Uses agnosia_get_template( 'header-navbar', 'header' ); ?>
	<?php agnosia_site_description(); // Uses agnosia_get_template( 'site-description', 'header' ); ?>
	<?php agnosia_after_header_thumbnail(); // Uses agnosia_get_template( 'after-header-thumbnail', 'header' ); ?>

</header>