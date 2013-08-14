<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file adds parsing for shortcodes into term descriptions.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

/* Enable shortcodes into category, tag, and taxonomy Descriptions*/
add_filter( 'term_description', 'shortcode_unautop' );
add_filter( 'term_description', 'do_shortcode' );

?>