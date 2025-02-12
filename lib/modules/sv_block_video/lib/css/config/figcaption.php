<?php
	echo $_s->build_css(
		'.wp-block-video figcaption',
		array_merge(
			$module->get_setting('figcaption_font')->get_css_data('font-family'),
			$module->get_setting('figcaption_font_size')->get_css_data('font-size','','px'),
			$module->get_setting('figcaption_line_height')->get_css_data('line-height'),
			$module->get_setting('figcaption_text_color')->get_css_data(),
			$module->get_setting('figcaption_padding')->get_css_data('padding'),
			$module->get_setting('figcaption_margin')->get_css_data()
		)
	);