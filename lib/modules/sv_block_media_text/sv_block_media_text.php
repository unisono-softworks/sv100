<?php
	namespace sv100;

	class sv_block_media_text extends init {
		public function init() {
			$this->set_module_title( __( 'Block: Media & Text', 'sv100' ) )
				->set_module_desc( __( 'Settings for Gutenberg Block', 'sv100' ) )
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(5000)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 1h24v2h-24v-2zm11 7h13v-2h-13v2zm0 5h13v-2h-13v2zm0 5h13v-2h-13v2zm-11 5h24v-2h-24v2zm0-5l8-6-8-6v12z"/></svg>')
				->set_block_handle('wp-block-media-text')
				->set_block_name('core/media-text')
				->get_root()
				->add_section( $this );
		}

		protected function load_settings(): sv_block_media_text {
			$this->get_setting( 'stack_active' )
				->set_title( __( 'Stack Media & Text', 'sv100' ) )
				->set_description( __( 'You may want to stack Media & Text on narrow viewports.', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'checkbox' );

			$this->get_setting( 'margin' )
				->set_title( __( 'Margin', 'sv100' ) )
				->set_is_responsive(true)
				->set_default_value(array(
					'top'		=> '0',
					'right'		=> 'auto',
					'bottom'	=> '0',
					'left'		=> 'auto'
				))
				->load_type( 'margin' );

			$this->get_setting( 'padding' )
				->set_title( __( 'Padding', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'margin' );

			return $this;
		}
	}