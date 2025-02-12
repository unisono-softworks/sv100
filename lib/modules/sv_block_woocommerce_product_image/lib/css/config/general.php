<?php
	echo $_s->build_css(
		'.wc-block-components-product-image',
		array_merge(
			$module->get_setting('padding')->get_css_data('padding'),
			$module->get_setting('margin')->get_css_data()
		)
	);

	echo $_s->build_css(
		'.wc-block-components-product-image .wc-block-components-product-sale-badge',
		array_merge(
			$module->get_setting('label_font')->get_css_data('font-family'),
			$module->get_setting('label_font_size')->get_css_data('font-size','','px'),
			$module->get_setting('label_line_height')->get_css_data('line-height'),
			$module->get_setting('label_text_color')->get_css_data(),
			$module->get_setting('label_background_color')->get_css_data('background-color'),
			$module->get_setting('label_padding')->get_css_data('padding'),
			$module->get_setting('label_margin')->get_css_data()
		)
	);