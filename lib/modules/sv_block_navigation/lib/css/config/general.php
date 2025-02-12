<?php
	echo $_s->build_css(
		'.wp-block-navigation',
		array_merge(
			$module->get_setting('padding')->get_css_data('padding'),
			$module->get_setting('margin')->get_css_data()
		)
	);

	echo $_s->build_css(
		'.wp-block-navigation .wp-block-navigation__container',
		array_merge(
			$module->get_setting('gap')->get_css_data('gap','','px')
		)
	);