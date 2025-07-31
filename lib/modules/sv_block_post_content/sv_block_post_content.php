<?php
	namespace sv100;

	class sv_block_post_content extends init {
		public function init() {
			$this->set_module_title( __( 'Block: Post Content', 'sv100' ) )
				->set_module_desc( __( 'Settings for Gutenberg Block', 'sv100' ) )
				//->set_css_cache_active()->set_block_handle('wp-block-post-content')
				->set_block_name('core/post-content');

			if(!is_admin()){
				add_action('wp', array($this, 'has_classic_block'));
			}
		}
		public function register_scripts() {
			parent::register_scripts();

			$this->get_script('legacy')
				->set_path('lib/css/common/legacy.css')
				->set_inline();

			return $this;
		}

		public function has_classic_block(){
			if(has_blocks()){
				$this->get_script('legacy')->set_is_enqueued(false);
			}else{
				$this->get_script('legacy')->set_is_enqueued();
			}
		}
	}