<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the registration of content options.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

require_once agnosia_get_path( '/inc/register/agnosia-register-pages-options.php' );
require_once agnosia_get_path( '/inc/register/agnosia-register-posts-options.php' );

if ( current_theme_supports( 'agnosia-post-formats' ) ) :

	require_once agnosia_get_path( '/inc/register/agnosia-register-aside-options.php' );
	require_once agnosia_get_path( '/inc/register/agnosia-register-galleries-options.php' );
	require_once agnosia_get_path( '/inc/register/agnosia-register-links-options.php' );
	require_once agnosia_get_path( '/inc/register/agnosia-register-images-options.php' );
	require_once agnosia_get_path( '/inc/register/agnosia-register-quotes-options.php' );
	require_once agnosia_get_path( '/inc/register/agnosia-register-status-options.php' );
	require_once agnosia_get_path( '/inc/register/agnosia-register-videos-options.php' );
	require_once agnosia_get_path( '/inc/register/agnosia-register-audios-options.php' );
	require_once agnosia_get_path( '/inc/register/agnosia-register-chats-options.php' );

endif;

require_once agnosia_get_path( '/inc/register/agnosia-register-advanced-post-options.php' );

?>