/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles javascript functions for responsive features.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */



function set_body_class() {

	/* Change body class depending on window width */

	// Define object containing CSS classes and its properties
	var classes = { 
		'wide' : { max : 1000000 , min : 1180} , 
		'large' : { max : 1179 , min : 960 } , 
		'medium' : { max : 959 , min : 768 } ,
		'small' : { max : 767 , min : 0 } 
	};

	// Iterate the object
	for(var clazz in classes) {

		// Define variables to be passed as parameters
		var classname = clazz;
		var max = classes[clazz]['max'];
		var min = classes [clazz]['min'];

		// Call function using parameters
		set_class_with_width( clazz , max , min );
	}

}



function set_class_with_width($newClass, $maxWidth, $minWidth) {

	/* Change body class depending on window width with given classname, max-width and min-width */

	// Define classnames to be matched with the given one
	var classes = ['wide','large','medium', 'small'];
	// Obtain current window width
	var window_width = jQuery(window).width();

	// Check if window width stands between given max an min width and the body element hasn't the given classname 
	if( window_width <= $maxWidth && window_width > $minWidth && !jQuery('body').hasClass($newClass) ) {

		// Iterate object containing all the possible classnames
		for(var clazz in classes) {

			// If the currently classname matches the given one, add classname to body element
			if(classes[clazz] == $newClass) jQuery('body').addClass($newClass);
			// If not, then remove the classname from the body element
			else jQuery('body').removeClass(classes[clazz]);

		}

	}

}



jQuery(document).ready(function() {
	set_body_class();
});



jQuery(window).resize(function() {
	set_body_class();
});