<?php
	/*
	 * has outline
	 * not hover
	 * not active
	 * not text color
	 */
	echo $_s->build_css(
		'.wp-block-button.is-style-outline .wp-block-button__link:not(:hover):not(:active):not(.has-text-color)',
		array_merge(
			$module->get_setting('outline_text_color')->get_css_data('color')
		)
	);

	/*
	 * has outline
	 * has hover
	 * has active
	 */
	echo $_s->build_css(
		'.wp-block-button.is-style-outline .wp-block-button__link:hover, .wp-block-button.is-style-outline .wp-block-button__link:active',
		array_merge(
			$module->get_setting('outline_text_color')->get_css_data('background-color'),
			$module->get_setting('outline_bg_color')->get_css_data('color')
		)
	);

	/*
	 * has background
	 * has outline
	 * has hover
	 * has active
	 */
	echo $_s->build_css(
		'.sv100_sv_content_wrapper article .has-background .wp-block-button.is-style-outline .wp-block-button__link:hover, .sv100_sv_content_wrapper article .has-background .wp-block-button.is-style-outline .wp-block-button__link:active',
		array_merge(
			$module->get_setting('outline_text_color')->get_css_data('background-color')
		)
	);

	/*
	 * has color
	 * has outline
	 * has hover
	 * has active
	 */

	echo $_s->build_css(
		'.sv100_sv_content_wrapper article .has-text-color .wp-block-button.is-style-outline .wp-block-button__link:hover, .sv100_sv_content_wrapper article .has-text-color .wp-block-button.is-style-outline .wp-block-button__link:active',
		array_merge(
			$module->get_setting('outline_bg_color')->get_css_data('color')
		)
	);

	/*
	 * has color
	 * has outline
	 * has radius
	 * has focus
	 */
	echo $_s->build_css(
		'.sv100_sv_content_wrapper article .is-style-outline .wp-block-button__link[style*=radius]:focus, .sv100_sv_content_wrapper article .editor-styles-wrapper .wp-block-button a.wp-block-button__link[style*=radius]:focus',
		array_merge(
			$module->get_setting('outline_bg_color')->get_css_data('outline-color')
		)
	);