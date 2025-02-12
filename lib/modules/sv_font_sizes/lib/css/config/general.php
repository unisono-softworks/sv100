<?php
	$properties					= array();

	foreach($module->get_list() as $font_size){
		if(!is_array($font_size['size'])){
			continue;
		}
		$properties['--wp--preset--font-size--'.$font_size['slug']]		= $_s->prepare_css_property_responsive($font_size['size'],'',' !important');
	}

	echo $_s->build_css(
		'body',
		$properties
	);