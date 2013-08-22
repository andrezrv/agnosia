<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the right sidebar.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php if ( current_theme_supports( 'agnosia-right-sidebar' ) ) : ?>

    <?php global $post , $sidebar_templates ; ?>

    <?php if ( agnosia_evaluate_show( 'show_right_sidebar' , 'hide_right_sidebar' , $post ) ) : ?>

        <div id="right-sidebar" class="span3 sidebar">

            <nav id="right-sidebar-nav">

                <div class="right-sidebar sidebar-<?php $sidebars; ?>">
                    
                    <?php if ( dynamic_sidebar( __( 'Right sidebar' , 'agnosia' ) ) ) : ?>
                    
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