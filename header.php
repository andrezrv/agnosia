<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles views for WordPress header.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
		
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		
		<?php if ( is_search() ) : ?><meta name="robots" content="noindex, nofollow" /><?php endif; ?>

		<title><?php the_title(); ?></title>

		<?php agnosia_custom_favicon(); ?>
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php if ( is_singular() and get_option( 'thread_comments' ) ) : wp_enqueue_script( 'comment-reply' ); endif; ?>

		<?php wp_head(); ?>
		
		<?php if( is_single() or is_page() ) : agnosia_post_custom_stylesheet(); endif; ?>

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->

	    <?php agnosia_get_css_for_text_color(); ?>
		
	</head>

	<body <?php body_class( agnosia_get_body_class() ); ?>>
		
		<div id="page-wrap">

			<?php agnosia_load_template( 'content-wrapper-start' , 'content' ); ?>

			<?php if ( function_exists( 'agnosia_ac_post_additional_html' ) or agnosia_page_has_large_header() ) : ?>
				<?php agnosia_load_template( 'before-container' , 'content' ); ?>
			<?php endif; ?>
			
			<section id="content" class="content">

				<div class="<?php agnosia_wrapper_style(); ?> main">

					<div class="row-fluid">
