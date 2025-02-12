<?php
	echo $_s->build_css(
		'body .wp-block-search',
		array_merge(
			$module->get_setting('background_color')->get_css_data('background-color'),
			$module->get_setting('padding')->get_css_data('padding'),
			$module->get_setting('margin')->get_css_data()
		)
	);