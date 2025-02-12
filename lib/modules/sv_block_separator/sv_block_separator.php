<?php
	namespace sv100;

	class sv_block_separator extends init {
		public function init() {
			$this->set_module_title( __( 'Block: Separator', 'sv100' ) )
				->set_module_desc( __( 'Settings for Gutenberg Block', 'sv100' ) )
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(5000)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><path class="cls-1" d="M24,13H0V12H24Z"/></svg>')
				->set_block_handle('wp-block-separator')
				->set_block_name('core/separator')
				->get_root()
				->add_section( $this );
		}

		protected function load_settings(): sv_block_separator {
			$this->get_setting( 'background_color' )
			     ->set_title( __( 'Background Color', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'color' );

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

			$this->get_setting( 'max_width' )
				->set_title( __( 'Max Width', 'sv100' ) )
				->set_default_value(100)
				->set_is_responsive(true)
				->load_type( 'number' );

			$this->get_setting( 'max_width_style_wide' )
				->set_title( __( 'Max Width Style Wide', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'number' );

			return $this;
		}
	}