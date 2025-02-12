<?php
	echo $_s->build_css(
		'body .wp-block-search .wp-block-search__button',
		array_merge(
			$module->get_setting('submit_font')->get_css_data('font-family'),
			$module->get_setting('submit_font_size')->get_css_data('font-size','','px'),
			$module->get_setting('submit_line_height')->get_css_data('line-height'),
			$module->get_setting('submit_text_color')->get_css_data(),
			$module->get_setting('submit_background_color')->get_css_data('background-color'),
			$module->get_setting('submit_padding')->get_css_data('padding'),
			$module->get_setting('submit_margin')->get_css_data()
		)
	);