<?php
	namespace sv100;

	class sv_block_navigation_link extends init {
		public function init() {
			$this->set_module_title( __( 'Block: Navigation Link', 'sv100' ) )
				->set_module_desc( __( 'Settings for Gutenberg Block', 'sv100' ) )
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(5000)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>')
				->set_block_handle('wp-block-navigation-link')
				->set_block_name('core/navigation-link')
				->get_root()
				->add_section( $this );
		}
		public function load_settings(): sv_block_navigation_link {
			// Navigation Item
			$this->get_setting( 'font' )
			     ->set_title( __( 'Font Family', 'sv100' ) )
			     ->set_description( __( 'Choose a font for your text.', 'sv100' ) )
			     ->set_options( $this->get_module( 'sv_webfontloader' ) ? $this->get_module( 'sv_webfontloader' )->get_font_options() : array('' => __('Please activate module SV Webfontloader for this Feature.', 'sv100')) )
			     ->set_is_responsive(true)
			     ->load_type( 'select' );

			$this->get_setting( 'font_size' )
			     ->set_title( __( 'Font Size', 'sv100' ) )
			     ->set_description( __( 'Font Size in Pixel', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'number' );

			$this->get_setting( 'line_height' )
			     ->set_title( __( 'Line Height', 'sv100' ) )
			     ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'text' );

			$this->get_setting( 'text_color' )
			     ->set_title( __( 'Text Color', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'color' );

			$this->get_setting( 'margin' )
			     ->set_title( __( 'Margin', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'margin' );

			$this->get_setting( 'padding' )
			     ->set_title( __( 'Padding', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'margin' );

			return $this;
		}
	}