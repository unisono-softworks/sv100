<?php
	namespace sv100;

	class sv_block_woocommerce_product_image extends init {
		public function init() {
			if (class_exists('WooCommerce')) {
				$this->set_module_title(__('Block: WooCommerce Product Image', 'sv100'))
				     ->set_module_desc(__('Settings for Gutenberg Block', 'sv100'))
				     ->set_css_cache_active()
				     ->set_section_title($this->get_module_title())
				     ->set_section_desc($this->get_module_desc())
				     ->set_section_template_path()
				     ->set_section_order(5000)
				     ->set_section_icon(
					     '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z"/></svg>'
				     )
				     ->get_root()
				     ->add_section($this);
			}
			
			$this->get_script('config')->set_is_enqueued(false);
		}
		
		public function enqueue_scripts(): void {
			if (class_exists('WooCommerce')) {
				$this->get_script('config')->set_is_enqueued(true);
			}
		}
		public function load_settings(): sv_block_woocommerce_product_image {
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

			$this->get_setting( 'label_font' )
			     ->set_title( __( 'Label Font Family', 'sv100' ) )
			     ->set_description( __( 'Choose a font for your text.', 'sv100' ) )
			     ->set_options( $this->get_module( 'sv_webfontloader' ) ? $this->get_module( 'sv_webfontloader' )->get_font_options() : array('' => __('Please activate module SV Webfontloader for this Feature.', 'sv100')) )
			     ->set_is_responsive(true)
			     ->load_type( 'select' );

			$this->get_setting( 'label_font_size' )
			     ->set_title( __( 'Label Font Size', 'sv100' ) )
			     ->set_description( __( 'Font Size in pixel.', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'number' );

			$this->get_setting( 'label_line_height' )
			     ->set_title( __( 'Label Line Height', 'sv100' ) )
			     ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'text' );

			$this->get_setting( 'label_text_color' )
			     ->set_title( __( 'Label Text Color', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'color' );

			$this->get_setting( 'label_background_color' )
			     ->set_title( __( 'Label Background Color', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'color' );

			$this->get_setting( 'label_margin' )
			     ->set_title( __( 'Label Margin', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'margin' );

			$this->get_setting( 'label_padding' )
			     ->set_title( __( 'Label Padding', 'sv100' ) )
			     ->set_is_responsive(true)
			     ->load_type( 'margin' );

			return $this;
		}
	}