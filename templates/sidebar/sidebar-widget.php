<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the default navigation blocks for a sidebar.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<div class="extra widget">

    <?php agnosia_load_template( agnosia_get_sidebar_template( 1 ) , 'sidebar' ); ?>
    <?php agnosia_load_template( agnosia_get_sidebar_template( 2 ) , 'sidebar' ); ?>
    <?php agnosia_load_template( agnosia_get_sidebar_template( 3 ) , 'sidebar' ); ?>
    <?php agnosia_load_template( agnosia_get_sidebar_template( 4 ) , 'sidebar' ); ?>

</div>