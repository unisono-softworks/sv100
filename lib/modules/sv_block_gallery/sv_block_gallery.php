<?php
	namespace sv100;

	class sv_block_gallery extends init {
		public function init() {
			$this->set_module_title( __( 'Block: Gallery', 'sv100' ) )
				->set_module_desc( __( 'Settings for Gutenberg Block', 'sv100' ) )
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(5000)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M9 12c0-.552.448-1 1.001-1s.999.448.999 1-.446 1-.999 1-1.001-.448-1.001-1zm6.2 0l-1.7 2.6-1.3-1.6-3.2 4h10l-3.8-5zm8.8-5v14h-20v-3h-4v-15h21v4h3zm-20 9v-9h15v-2h-17v11h2zm18-7h-16v10h16v-10z"/></svg>')
				->set_block_handle('wp-block-gallery')
				->set_block_name('core/gallery')
				->get_root()
				->add_section( $this );
		}
		public function enqueue_scripts() {
			parent::enqueue_scripts();
			$this->get_script('config')->set_inline()->set_is_enqueued(true);
			return $this;
		}
		public function load_settings(): sv_block_gallery {
			$this->get_setting( 'spacing' )
				->set_title( __( 'Spacing', 'sv100' ) )
				->load_type( 'number' );

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
	}