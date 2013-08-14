<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file adds excerpt to page editor.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

function agnosia_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

add_action( 'init', 'agnosia_add_excerpts_to_pages' );

?>