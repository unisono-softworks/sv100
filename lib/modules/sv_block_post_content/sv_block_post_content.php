<?php

namespace sv100;

class sv_block_post_content extends init {
	public function init() {
		$this->set_module_title(__('Block: Post Content', 'sv100'))
			->set_module_desc(__('Settings for Gutenberg Block', 'sv100'))
			->set_block_handle('wp-block-post-content')
			->set_block_name('core/post-content');
	}
}