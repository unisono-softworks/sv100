<?php
	echo $_s->build_css(
		'.wp-block-quote cite',
		array_merge(
			$module->get_setting('cite_font')->get_css_data('font-family'),
			$module->get_setting('cite_font_size')->get_css_data('font-size','','px'),
			$module->get_setting('cite_line_height')->get_css_data('line-height'),
			$module->get_setting('cite_text_color')->get_css_data(),
			$module->get_setting('cite_padding')->get_css_data('padding'),
			$module->get_setting('cite_margin')->get_css_data()
		)
	);