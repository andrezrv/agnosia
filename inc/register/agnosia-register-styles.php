<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the registration of Agnosia theme default styles.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

function agnosia_load_styles() {

	agnosia_register_style( 'agnosia-basic' , __( 'Éros (Agnosia Basic Style)' , 'agnosia' ) );
	agnosia_register_style( 'agnosia-blank' , __( 'Gea (Agnosia Blank Style)' , 'agnosia' ) );

}



/* Add action hooks. */
add_action( 'agnosia_before_setup', 'agnosia_load_styles' );

?>