<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles views for WordPress header.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
		
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		
		<?php if ( is_search() ) : ?><meta name="robots" content="noindex, nofollow" /><?php endif; ?>

		<title><?php the_title(); ?></title>

		<?php agnosia_custom_favicon(); ?>
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php wp_head(); ?>
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
		
	</head>

	<body <?php body_class( agnosia_get_body_class() ); ?>>
		
		<div id="page-wrap">

			<?php agnosia_load_template( 'content-wrapper-start' , 'content' ); ?>

			<?php agnosia_before_container(); ?>
			
			<section id="content" class="content">

				<div class="<?php agnosia_wrapper_style(); ?> main">

					<div class="row-fluid">
