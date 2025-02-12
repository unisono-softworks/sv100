<?php

	// we need to explicitly define that for form fields, too,
	// to avoid that Chrome will override it with user agent style sheets.
	echo $_s->build_css(
		'.wp-site-blocks,
		.editor-styles-wrapper,
		.wp-site-blocks button.wp-block-button__link,
		.wp-site-blocks input,
		.wp-site-blocks select,
		.wp-site-blocks textarea,
		body.theme-sv100',
		array_merge(
			$module->get_setting('font')->get_css_data('font-family'),
			$module->get_setting('font_size')->get_css_data('font-size','','px'),
			$module->get_setting('line_height')->get_css_data('line-height'),
			$module->get_setting('text_color')->get_css_data(),
			$module->get_setting('hyphens')->get_css_data('-webkit-hyphens'),
			$module->get_setting('hyphens')->get_css_data('-moz-hyphens'),
			$module->get_setting('hyphens')->get_css_data('hyphens'),
			$module->get_setting('bg_color')->get_css_data('background-color')
		)
	);

	echo $_s->build_css(
		'.wp-site-blocks button.wp-block-button__link,
		.wp-site-blocks input[type="submit"]',
		array_merge(
			$module->get_setting('text_color')->get_css_data('background-color'),
			$module->get_setting('bg_color')->get_css_data()
		)
	);

	echo $_s->build_css(
		'main p a:where(:not(.wp-element-button)), main li a:where(:not(.wp-element-button)),
		.editor-styles-wrapper p a:where(:not(.wp-element-button)), .editor-styles-wrapper li a:where(:not(.wp-element-button))',
		array_merge(
			$module->get_setting('font_link')->get_css_data('font-family'),
			$module->get_setting('text_color_link')->get_css_data(),
			$module->get_setting('text_deco_link')->get_css_data('text-decoration')
		)
	);

	echo $_s->build_css(
		'main p a:where(:not(.wp-element-button)):hover, main p a:where(:not(.wp-element-button)):focus,
		main li a:where(:not(.wp-element-button)):hover, main li a:where(:not(.wp-element-button)):focus',
		array_merge(
			$module->get_setting('text_color_link_hover')->get_css_data(),
			$module->get_setting('text_deco_link_hover')->get_css_data('text-decoration')
		)
	);

	echo $_s->build_css(
		'html body',
		$module->get_setting( 'spacing' )->get_css_data('--wp--custom--sv-spacing')
	);

	echo $_s->build_css(
		'*::selection',
		array_merge(
			$module->get_setting( 'selection_color_background' )->get_css_data('background-color'),
			$module->get_setting( 'selection_color' )->get_css_data('color'),

		)
	);