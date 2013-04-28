<?php
	//---------------------------------------------------------------------------------
	//	Fallback functions for Houstons bundled plugins.
	//---------------------------------------------------------------------------------
	$plugin_functions = array(
		//ACF
		'get_field',
		'the_field',
		'get_sub_field',
		'the_sub_field',
	
		//Mobble
		'is_handheld',	// any handheld device (phone, tablet, Nintendo)
		'is_mobile',	// any type of mobile phone (iPhone, Android, Nokia etc)
		'is_tablet',	// any tablet device (currently iPad, Galaxy Tab)
		'is_ios'		// any Apple device (iPhone, iPad, iPod)	
	);
	foreach($plugin_functions as $plugin_function) {
		eval("if (!function_exists('".$plugin_function."')) { function ".$plugin_function."() { return false; } }");
	}