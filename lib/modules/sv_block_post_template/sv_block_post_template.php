<?php
	namespace sv100;

	class sv_block_post_template extends init {
		public function init() {
			$this->set_module_title( __( 'Block: Post Template', 'sv100' ) )
				->set_module_desc( __( 'Settings for Gutenberg Block', 'sv100' ) )
				->set_css_cache_active()
				->set_block_handle('wp-block-post-template')
				->set_block_name('core/post-template');
		}
	}