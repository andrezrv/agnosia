<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows a post navigation links.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<section id="post-navigation-bottom">
	<div id="previous-post" class="navigation"><?php previous_post_link(); ?></div>	
	<div id="next-post" class="navigation"><?php next_post_link(); ?></div>
</section>