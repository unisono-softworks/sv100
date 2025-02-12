<?php
	echo $_s->build_css(
		'.wp-block-separator',
		array_merge(
			$module->get_setting('padding')->get_css_data('padding'),
			$module->get_setting('margin')->get_css_data()
		)
	);

	echo $_s->build_css(
		'.wp-block-separator:not(.is-style-dots)',
		array_merge(
			$module->get_setting('background_color')->get_css_data('background-color')
		)
	);

	echo $_s->build_css(
		'.wp-block-separator:not(.is-style-wide):not(.is-style-dots)',
		array_merge(
			$module->get_setting('max_width')->get_css_data('max-width', '', 'px !important')
		)
	);

	echo $_s->build_css(
		'.wp-block-separator.is-style-wide',
		array_merge(
			$module->get_setting('max_width_style_wide')->get_css_data('max-width', '', 'px !important')
		)
	);

	if($module->get_module('sv_colors')){
		$colors		= $module->get_module('sv_colors')->get_list();

		foreach($colors as $color){
			echo '.wp-block-separator.has-'.$color['slug'].'-color{';
			echo 'color:rgba('.$color['color'].');';
			echo 'border-color:currentColor;';
			echo '}';
		}
	}