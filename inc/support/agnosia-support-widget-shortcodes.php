<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file adds parsing for shortcodes into widgets.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

/* Enable shorcodes into text widgets */
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );

?>