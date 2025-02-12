<?php
	namespace sv100;

	class sv_block_search extends init {
		public function init() {
			$this->set_module_title( __( 'Block: Search', 'sv100' ) )
				->set_module_desc( __( 'Settings for Gutenberg Block', 'sv100' ) )
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(5000)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M23.111 20.058l-4.977-4.977c.965-1.52 1.523-3.322 1.523-5.251 0-5.42-4.409-9.83-9.829-9.83-5.42 0-9.828 4.41-9.828 9.83s4.408 9.83 9.829 9.83c1.834 0 3.552-.505 5.022-1.383l5.021 5.021c2.144 2.141 5.384-1.096 3.239-3.24zm-20.064-10.228c0-3.739 3.043-6.782 6.782-6.782s6.782 3.042 6.782 6.782-3.043 6.782-6.782 6.782-6.782-3.043-6.782-6.782zm2.01-1.764c1.984-4.599 8.664-4.066 9.922.749-2.534-2.974-6.993-3.294-9.922-.749z"/></svg>')
				->set_block_handle('wp-block-search')
				->set_block_name('core/search')
				->get_root()
				->add_section( $this );
		}

		protected function load_settings(): sv_block_search {
			// Wrapper
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

			// Input
			$this->get_setting( 'input_font' )
			     ->set_title( __( 'Font Family', 'sv100' ) )
			     ->set_description( __( 'Choose a font for your text.', 'sv100' ) )
			     ->set_options( $this->get_module( 'sv_webfontloader' ) ? $this->get_module( 'sv_webfontloader' )->get_font_options() : array('' => __('Please activate module SV Webfontloader for this Feature.', 'sv100')) )
			     ->set_is_responsive(true)
			     ->load_type( 'select' );

			$this->get_setting( 'input_font_size' )
			     ->set_title( __( 'Font Size', 'sv100' ) )
			     ->set_description( __( 'Font Size in pixel.', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'number' );

			$this->get_setting( 'input_line_height' )
			     ->set_title( __( 'Line Height', 'sv100' ) )
			     ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'text' );

			$this->get_setting( 'input_text_color' )
			     ->set_title( __( 'Text Color', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'color' );

			$this->get_setting( 'input_background_color' )
			     ->set_title( __( 'Background Color', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'color' );

			$this->get_setting( 'input_margin' )
			     ->set_title( __( 'Margin', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'margin' );

			$this->get_setting( 'input_padding' )
			     ->set_title( __( 'Padding', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'margin' );

			// Submit
			$this->get_setting( 'submit_font' )
			     ->set_title( __( 'Font Family', 'sv100' ) )
			     ->set_description( __( 'Choose a font for your text.', 'sv100' ) )
			     ->set_options( $this->get_module( 'sv_webfontloader' ) ? $this->get_module( 'sv_webfontloader' )->get_font_options() : array('' => __('Please activate module SV Webfontloader for this Feature.', 'sv100')) )
			     ->set_is_responsive(true)
			     ->load_type( 'select' );

			$this->get_setting( 'submit_font_size' )
			     ->set_title( __( 'Font Size', 'sv100' ) )
			     ->set_description( __( 'Font Size in pixel.', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'number' );

			$this->get_setting( 'submit_line_height' )
			     ->set_title( __( 'Line Height', 'sv100' ) )
			     ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'text' );

			$this->get_setting( 'submit_text_color' )
			     ->set_title( __( 'Text Color', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'color' );

			$this->get_setting( 'submit_background_color' )
			     ->set_title( __( 'Background Color', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'color' );

			$this->get_setting( 'submit_margin' )
			     ->set_title( __( 'Margin', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'margin' );

			$this->get_setting( 'submit_padding' )
			     ->set_title( __( 'Padding', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'margin' );

			return $this;
		}
	}