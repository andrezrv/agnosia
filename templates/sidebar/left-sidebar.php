<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the left sidebar.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php if ( current_theme_supports( 'agnosia-left-sidebar' ) ) : ?>

    <?php global $post , $sidebar_templates ; ?>

    <?php if ( agnosia_evaluate_show( 'show_left_sidebar' , 'hide_left_sidebar' , $post ) ) : ?>

        <div id="left-sidebar" class="span3 sidebar">

            <nav id="left-sidebar-nav">

                <div class="left-sidebar sidebar-1">
                    
                    <?php if ( dynamic_sidebar( __( 'Left sidebar' , 'agnosia' ) ) ) : ?>
                    
                        <?php /* Sidebar is printed */ ?>
                        
                    <?php else : ?>
                    
                        <div class="extra widget">

                            <?php agnosia_load_template( $sidebar_templates[1] , 'sidebar' ); ?>
                            <?php agnosia_load_template( $sidebar_templates[2] , 'sidebar' ); ?>
                            <?php agnosia_load_template( $sidebar_templates[3] , 'sidebar' ); ?>
                            <?php agnosia_load_template( $sidebar_templates[4] , 'sidebar' ); ?>

                        </div>
                        
                    <?php endif; ?>
                    
                </div>

            </nav>

        </div>

    <?php endif; ?>

<?php endif; ?>