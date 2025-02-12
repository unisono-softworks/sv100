<?php
	echo $_s->build_css(
		'.wp-block-gallery',
		array_merge(
			$module->get_setting('padding')->get_css_data('padding'),
			$module->get_setting('margin')->get_css_data()
		)
	);

	/* Global Vars */
	echo ':root { --gallery-block--gutter-size: '.$module->get_setting('spacing')->get_data().'px; }';