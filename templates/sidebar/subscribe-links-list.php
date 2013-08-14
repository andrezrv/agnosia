<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows a list of subscription links.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<h2><?php _e( 'Subscribe' , 'agnosia' ); ?></h2>

<ul>
	<li><a href="<?php bloginfo('rss2_url'); ?>"><?php _e( 'Entries (RSS)' , 'agnosia' ); ?></a></li>
	<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e( 'Comments (RSS)' , 'agnosia' ); ?></a></li>
</ul>