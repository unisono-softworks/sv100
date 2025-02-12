<?php
	namespace sv100;

	class sv_block_spacer extends init {
		public function init() {
			$this->set_module_title( __( 'Block: Spacer', 'sv100' ) )
				->set_module_desc( __( 'Settings for Gutenberg Block', 'sv100' ) )
				->set_block_handle('wp-block-spacer')
				->set_block_name('core/spacer')
				->set_css_cache_active();
		}
	}