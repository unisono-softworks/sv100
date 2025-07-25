<?php
	namespace sv100;

	class sv_block_button extends init {
		public function init() {
			$this->set_module_title( __( 'Block: Button', 'sv100' ) )
				->set_module_desc( __( 'Settings for Gutenberg Block', 'sv100' ) )
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(5000)
				->set_section_icon('<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" fill-rule="evenodd" clip-rule="evenodd"><path serif:id="shape 4" d="M22 0c1.104 0 2 .896 2 2v20c0 1.104-.896 2-2 2h-20c-1.104 0-2-.896-2-2v-20c0-1.104.896-2 2-2h20zm0 2.75c0-.413-.335-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75v18.5c0 .415.337.75.75.75h18.5c.414 0 .75-.336.75-.75v-18.5z"/></svg>')
				->set_block_handle('wp-block-button')
				->set_block_name('core/button')
				->get_root()
				->add_section( $this );
		}
		protected function register_scripts(): sv_block_button {
			parent::register_scripts();

			$this->get_script('buttons')
			     ->set_path('lib/css/common/buttons.css')
			     ->set_is_gutenberg()
			     ->set_inline();

			if(!is_admin()) {
				add_action( 'wp_enqueue_scripts', function () { wp_dequeue_style( 'wp-block-buttons' ); } );
			}else{
				$this->get_script('buttons')
					 ->set_ID('wp-block-buttons')
				     ->set_is_no_prefix();
			}

			return $this;
		}
		public function load_settings(): sv_block_button {
			$this->get_setting( 'gap' )
			     ->set_title( __( 'Gap', 'sv100' ) )
			     ->set_description( __( 'Gap between Buttons', 'sv100' ) )
			     ->set_is_responsive(true)
				 ->set_default_value(20)
			     ->load_type( 'number' );

			$this->get_setting( 'font' )
				->set_title( __( 'Font Family', 'sv100' ) )
				->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				->set_options( $this->get_module( 'sv_webfontloader' ) ? $this->get_module( 'sv_webfontloader' )->get_font_options() : array('' => __('Please activate module SV Webfontloader for this Feature.', 'sv100')) )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'font_size' )
				->set_title( __( 'Font Size', 'sv100' ) )
				->set_description( __( 'Font Size in pixel.', 'sv100' ) )
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

			$this->get_setting( 'bg_color' )
				->set_title( __( 'Background Color', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'outline_text_color' )
				->set_title( __( 'Text Color', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'outline_bg_color' )
				->set_title( __( 'Background Color', 'sv100' ) )
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