<?php
	namespace sv100;
	class sv_block_image extends init {
		public function init() {
			$this->set_module_title( __( 'Block: Image', 'sv100' ) )
				->set_module_desc( __( 'Settings for Gutenberg Block', 'sv100' ) )
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(5000)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z"/></svg>')
				->set_block_handle('wp-block-image')
				->set_block_name('core/image')
				->get_root()
				->add_section( $this );
		}
		protected function load_settings(): sv_block_image {
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

			// figcaption
			$this->get_setting( 'figcaption_font' )
				->set_title( __( 'Font Family', 'sv100' ) )
				->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				->set_options( $this->get_module( 'sv_webfontloader' ) ? $this->get_module( 'sv_webfontloader' )->get_font_options() : array('' => __('Please activate module SV Webfontloader for this Feature.', 'sv100')) )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'figcaption_font_size' )
				->set_title( __( 'Font Size', 'sv100' ) )
				->set_description( __( 'Font Size in Pixel', 'sv100' ) )
				->set_default_value( $this->get_module( 'sv_common' ) ? $this->get_module( 'sv_common' )->get_setting('font_size')->get_data() : false )
				->set_is_responsive(true)
				->load_type( 'number' );

			$this->get_setting( 'figcaption_line_height' )
				->set_title( __( 'Line Height', 'sv100' ) )
				->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				->set_default_value(1)
				->set_is_responsive(true)
				->load_type( 'text' );

			$this->get_setting( 'figcaption_text_color' )
				->set_title( __( 'Text Color', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'figcaption_margin' )
				->set_title( __( 'Margin', 'sv100' ) )
				->set_is_responsive(true)
				->set_default_value(array(
					'top'		=> '10px',
					'right'		=> 'auto', // could be wrong
					'bottom'	=> '20px',
					'left'		=> 'auto' // could be wrong
				))
				->load_type( 'margin' );

			$this->get_setting( 'figcaption_padding' )
				->set_title( __( 'Padding', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'margin' );

			return $this;
		}
		protected function register_scripts(): sv_block_image {
			parent::register_scripts();

			// Register Styles
			$this->get_script( 'cover' )
				->set_is_gutenberg()
				->set_block_style(__('Cover', 'sv100'))
				->set_path( 'lib/css/styles/cover.css' );

			return $this;
		}
	}