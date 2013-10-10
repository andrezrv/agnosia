<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows a meta section for comments.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<section class="comments">
	<span><?php comments_popup_link( __( 'No Comments' , 'agnosia' ) , __( '1 Comment' , 'agnosia' ) , __( '% Comments' , 'agnosia' ) , 'comments-link' , '' ); ?></span>
</section>