<?php
	namespace sv100;

	class sv_common extends init {
		public function init() {
			$this->set_module_title( __( 'SV Common', 'sv100' ) )
				->set_module_desc( __( 'Common settings for your website', 'sv100' ) )
				->load_settings()
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(1000)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 2c1.654 0 3 1.346 3 3v14c0 1.654-1.346 3-3 3h-14c-1.654 0-3-1.346-3-3v-14c0-1.654 1.346-3 3-3h14zm5 3c0-2.761-2.238-5-5-5h-14c-2.762 0-5 2.239-5 5v14c0 2.761 2.238 5 5 5h14c2.762 0 5-2.239 5-5v-14zm-13 12h-2v3h-2v-3h-2v-3h6v3zm-2-13h-2v8h2v-8zm10 5h-6v3h2v8h2v-8h2v-3zm-2-5h-2v3h2v-3z"/></svg>')
				->get_root()
				->add_section( $this );

			$this->set_image_sizing();

			add_filter('sv100_breakpoints', array($this, 'set_breakpoints'));

			// Gutenberg
			add_action( 'wp_print_styles', array( $this, 'wp_print_styles' ), 100 );

			add_filter( 'styles_inline_size_limit', '__return_zero' );

			// Load block styles in separate files on demand only
			add_filter( 'should_load_separate_core_block_assets', '__return_true' );

			remove_filter( 'the_content', 'wpautop' );

			// @todo: https://github.com/WordPress/gutenberg/issues/38299
			remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
			remove_action( 'wp_body_open', 'gutenberg_global_styles_render_svg_filters' );

			return $this;
		}
		public function set_image_sizing(){
			// override default image sizes just in case
			add_filter( 'option_thumbnail_size_w', function(){ return intval($this->get_setting( 'max_width_content' )->get_data()) / 2; }, 10, 2 );
			add_filter( 'option_thumbnail_size_h', function(){ return 0; }, 10, 2 );
			add_filter( 'option_medium_size_w', function(){ return intval($this->get_setting( 'max_width_content' )->get_data()); }, 10, 2 );
			add_filter( 'option_medium_size_h', function(){ return 0; }, 10, 2 );
			add_filter( 'option_medium_large_size_w',  function(){ return intval($this->get_setting( 'max_width_content' )->get_data()) * 1.5; }, 10, 2 );
			add_filter( 'option_medium_large_size_h', function(){ return 0; }, 10, 2 );
			add_filter( 'option_large_size_w',  function(){ return intval($this->get_setting( 'max_width_wide' )->get_data()); }, 10, 2 );
			add_filter( 'option_large_size_h', function(){ return 0; }, 10, 2 );

			// add custom image sizes
			add_image_size( 'x_large', intval($this->get_setting( 'max_width_wide' )->get_data()) * 1.5, 0, 0 );
			add_image_size( 'xx_large', intval($this->get_setting( 'max_width_wide' )->get_data()) * 2, 0, 0 );

			add_filter( 'image_size_names_choose', function( $sizes ) {
				return array_merge( $sizes, array(
					'x_large' => __( 'XL', 'sv100' ),
					'xx_large' => __( 'XXL', 'sv100' ),
				) );
			} );

			// image scaling is not a reliable feature, currently not working for PNGs. Nevertheless, we set max resolution to 4k.
			add_filter('big_image_size_threshold', function(){ return 4096; }, 999, 1);

			// Prevent User from trying to change image sizes
			add_action( 'admin_enqueue_scripts', function () {
				// Only load this script on the media options page.
				$screen = get_current_screen();
				if ( 'options-media' === $screen->id ) {
					wp_enqueue_script( 'disable_image_sizing_settings', $this->get_url('lib/js/disable_image_sizing_settings.js') );
				}
			} );
		}
		public function image_sizes_update(){
			update_option( 'thumbnail_size_w', intval($this->get_setting( 'max_width_content' )->get_data()) / 2 );
			update_option( 'thumbnail_size_h', 0 );
			update_option( 'thumbnail_crop', 0 );

			update_option( 'medium_size_w', intval($this->get_setting( 'max_width_content' )->get_data()) );
			update_option( 'medium_size_h', 0 );
			update_option( 'medium_crop', 0 );

			update_option( 'medium_large_size_w', intval($this->get_setting( 'max_width_content' )->get_data()) * 1.5 );
			update_option( 'medium_large_size_h', 0 );
			update_option( 'medium_large_crop', 0 );

			update_option( 'large_size_w', intval($this->get_setting( 'max_width_wide' )->get_data()) );
			update_option( 'large_size_h', 0 );
			update_option( 'large_crop', 0 );
		}
		public function theme_json_update_data(){
			$theme_json     = $this->theme_json_get_data();

			// default values
			$theme_json['settings']['color']['defaultPalette']     = false;
			$theme_json['settings']['color']['defaultGradients']   = false;
			$theme_json['settings']['typography']['lineHeight']    = true;
			$theme_json['settings']['spacing']['padding']          = true;

			// Duotones
			if(!$this->get_setting( 'duotones' )->get_data()){
				// js error in site editor with wp 6.1.1
				//$theme_json['settings']['color']['duotone']        = null;
				$theme_json['settings']['color']['duotone']        = [];
				$theme_json['settings']['color']['customDuotone']  = false;
			}else{
				$theme_json['settings']['color']['duotone']        = [];
				$theme_json['settings']['color']['customDuotone']  = true;
			}

			// disable default link underline
			// a:where(:not(.wp-element-button)){text-decoration: underline;}
			$theme_json['styles']['elements']['link']['typography']['textDecoration']          = false;

			// @todo: allow custom colors as setting
			$theme_json['settings']['color']['custom']             = true;
			$theme_json['settings']['color']['customGradient']     = true;

			// max width
			$theme_json['settings']['layout']['contentSize']        = $this->get_setting( 'max_width_content' )->get_data().'px';
			$theme_json['settings']['layout']['wideSize']           = $this->get_setting( 'max_width_wide' )->get_data().'px';
			$theme_json['settings']['custom']['sv-content-size']    = $this->get_setting( 'max_width_content' )->get_data().'px';
			$theme_json['settings']['custom']['sv-wide-size']       = $this->get_setting( 'max_width_wide' )->get_data().'px';
			$theme_json['settings']['custom']['sv-spacing']         = $this->get_setting( 'spacing' )->get_data()['desktop'];

			// units
			if($this->get_setting( 'units' )->get_data()){
				$units  = explode(',',$this->get_setting( 'units' )->get_data());
				if($units && is_array($units) && count($units) > 0){
					$theme_json['settings']['spacing']['units']     = $units;
				}
			}

			// update image sizing options on settings change
			$this->image_sizes_update();

			return $theme_json;
		}
		protected function register_scripts(): sv_common {
			parent::register_scripts();

			// Editor optimization
			if(is_admin()){
				$this->get_script( 'optimize_editor' )
				     ->set_path( 'lib/css/common/editor.css' )
				     ->set_is_gutenberg()
				     ->set_is_enqueued();
			}


			// Register Styles
			$this->get_script( 'fix_svg_non_width' )
			     ->set_path( 'lib/css/common/fix_svg_non_width.css' )
				 ->set_inline()
			     ->set_is_gutenberg()
			     ->set_is_enqueued();

			return $this;
		}
		public function set_breakpoints(array $breakpoints){
			return array( // number = min width
				'mobile'						=> $this->get_setting( 'breakpoint_mobile' )->get_data(),		// mobile first!
				'mobile_landscape'				=> $this->get_setting( 'breakpoint_mobile_landscape' )->get_data(),
				'tablet'						=> $this->get_setting( 'breakpoint_tablet' )->get_data(),
				'tablet_landscape'				=> $this->get_setting( 'breakpoint_tablet_landscape' )->get_data(),
				'tablet_pro'					=> $this->get_setting( 'breakpoint_tablet_pro' )->get_data(),
				'tablet_pro_landscape'			=> $this->get_setting( 'breakpoint_tablet_pro_landscape' )->get_data(),
				'desktop'						=> $this->get_setting( 'breakpoint_desktop' )->get_data(),
			);
		}
		
		public function load_settings(): sv_common {
			$breakpoints = $this->get_breakpoints();
			// Breakpoints
			$this->get_setting( 'breakpoint_mobile' )
				->set_title( __( 'Mobile', 'sv100' ) )
				->set_description( __( 'Minimum Size', 'sv100' ) )
				->set_default_value( $breakpoints['mobile'] )
				->set_disabled(true)
				->load_type( 'number' );

			$this->get_setting( 'breakpoint_mobile_landscape' )
				->set_title( __( 'Mobile (Landscape)', 'sv100' ) )
				->set_description( __( 'Small devices like landscape phones and less.', 'sv100' ) )
				->set_default_value( $breakpoints['mobile_landscape'] )
				->load_type( 'number' );

			$this->get_setting( 'breakpoint_tablet' )
				->set_title( __( 'Tablet', 'sv100' ) )
				->set_description( __( 'Medium devices like tablets and less.', 'sv100' ) )
				->set_default_value( $breakpoints['tablet'] )
				->load_type( 'number' );

			$this->get_setting( 'breakpoint_tablet_landscape' )
				->set_title( __( 'Tablet (Landscape)', 'sv100' ) )
				->set_description( __( 'Medium devices like landscape tablets and up.', 'sv100' ) )
				->set_default_value( $breakpoints['tablet_landscape'] )
				->load_type( 'number' );

			$this->get_setting( 'breakpoint_tablet_pro' )
				->set_title( __( 'Tablet Pro', 'sv100' ) )
				->set_description( __( 'Large tablets or less.', 'sv100' ) )
				->set_default_value( $breakpoints['tablet_pro'] )
				->load_type( 'number' );

			$this->get_setting( 'breakpoint_tablet_pro_landscape' )
				->set_title( __( 'Tablet Pro (Landscape)', 'sv100' ) )
				->set_description( __( 'Large tablets landscape or laptops.', 'sv100' ) )
				->set_default_value( $breakpoints['tablet_pro_landscape'] )
				->load_type( 'number' );

			$this->get_setting( 'breakpoint_desktop' )
				->set_title( __( 'Desktop', 'sv100' ) )
				->set_description( __( 'Desktop Devices', 'sv100' ) )
				->set_default_value( $breakpoints['desktop'] )
				->load_type( 'number' );

			$this->get_setting( 'spacing' )
				->set_title( __( 'Spacing', 'sv100' ) )
				->set_description( __( 'The distance to the viewport left & right', 'sv100' ) )
				->set_default_value('32px')
				->set_is_responsive(true)
				->load_type( 'text' );

			$this->get_setting( 'duotones' )
				->set_title( __( 'Enable Duotones', 'sv100' ) )
				->set_description( __( 'Duotones Support in Block Editor', 'sv100' ) )
				->load_type( 'checkbox' );

			$this->get_setting( 'units' )
			     ->set_title( __( 'Units', 'sv100' ) )
			     ->set_description( __( 'comma separated list of available CSS unites', 'sv100' ) )
			     ->set_default_value('px,em,rem,%,vh,vw')
			     ->load_type( 'text' );

			$this->get_setting( 'hyphens' )
				->set_title( __( 'Hyphens', 'sv100' ) )
				->set_description( __( 'Browser Behavior', 'sv100' ) )
				->set_options(array(
					'none'		=> __('none', 'sv100'),
					'manual'	=> __('manual', 'sv100'),
					'auto'		=> __('auto', 'sv100')
				))
				->set_default_value( 'auto' )
				->set_is_responsive(true)
				->load_type( 'select' );

			// Mobile
			$this->get_setting( 'mobile_zoom' )
				 ->set_title( __( 'Mobile Zoom', 'sv100' ) )
				 ->set_description( __( 'Allows user to zoom in the page on mobile devices.', 'sv100' ) )
				 ->set_default_value( 1 )
				 ->load_type( 'checkbox' );

			// Content Settings
			$this->get_setting( 'bg_color' )
				->set_title( __( 'Background Color', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'max_width_content' )
			     ->set_title( __( 'Content Max Width in Pixel', 'sv100' ) )
			     ->set_default_value( '820' )
			     ->load_type( 'number' );

			$this->get_setting( 'max_width_wide' )
				 ->set_title( __( 'Wide Max Width in Pixel', 'sv100' ) )
				 ->set_default_value( '1300' )
				 ->load_type( 'number' );
			
			// Text Settings
			$this->get_setting( 'font' )
				 ->set_title( __( 'Font Family', 'sv100' ) )
				 ->set_description( __( 'Set a Font Family', 'sv100' ) )
				 ->set_default_value('sans-serif')
				 ->set_options( $this->get_module( 'sv_webfontloader' ) ? $this->get_module( 'sv_webfontloader' )->get_font_options() : array('' => __('Please activate module SV Webfontloader for this Feature.', 'sv100')) )
				 ->set_is_responsive(true)
				 ->load_type( 'select' );

			$this->get_setting( 'font_size' ) // default && normal
			     ->set_title( __( 'Font Size', 'sv100' ) )
			     ->set_description( __( 'Font Size in Pixel', 'sv100' ) )
			     ->set_default_value( 16 )
			     ->set_is_responsive(true)
			     ->load_type( 'number' );

			$this->get_setting( 'line_height' )
				 ->set_title( __( 'Line Height', 'sv100' ) )
				 ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				 ->set_default_value( '1.5' )
				->set_is_responsive(true)
				 ->load_type( 'text' );

			$this->get_setting( 'text_color' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				->set_is_responsive(true)
				 ->load_type( 'color' );
			
			// Link Settings
			$this->get_setting( 'font_link' )
				 ->set_title( __( 'Font Family', 'sv100' ) )
				 ->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				 ->set_options( $this->get_module( 'sv_webfontloader' ) ? $this->get_module( 'sv_webfontloader' )->get_font_options() : array('' => __('Please activate module SV Webfontloader for this Feature.', 'sv100')) )
				->set_is_responsive(true)
				 ->load_type( 'select' );

			$this->get_setting( 'text_color_link' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				->set_is_responsive(true)
				 ->load_type( 'color' );

			$this->get_setting( 'text_deco_link' )
				 ->set_title( __( 'Text Decoration', 'sv100' ) )
				 ->set_default_value( 'underline' )
				->set_is_responsive(true)
				 ->set_options( array(
					'none'					=> __( 'None', 'sv100' ),
					'underline'			=> __( 'Underline', 'sv100' )
				 ) )
				 ->load_type( 'select' );
			
			// Link Settings (Hover/Focus)
			$this->get_setting( 'text_color_link_hover' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				->set_is_responsive(true)
				 ->load_type( 'color' );

			$this->get_setting( 'text_deco_link_hover' )
				 ->set_title( __( 'Text Decoration', 'sv100' ) )
				 ->set_default_value( 'none' )
				 ->set_options( array(
					'none'					=> __( 'None', 'sv100' ),
					'underline'			=> __( 'Underline', 'sv100' )
				 ) )
				->set_is_responsive(true)
				 ->load_type( 'select' );
			
			// Selection Settings
			$this->get_setting( 'selection_color' )
				 ->set_title( __( 'Selection color', 'sv100' ) )
				 ->set_description( __( 'Color of selected text', 'sv100' ) )
				 ->set_is_responsive(true)
				 ->load_type( 'color' );
			
			$this->get_setting( 'selection_color_background' )
				 ->set_title( __( 'Selection background color', 'sv100' ) )
				 ->set_description( __( 'Background color of selected text', 'sv100' ) )
				 ->set_is_responsive(true)
				 ->load_type( 'color' );

			return $this;
		}
		public function get_max_width_options(): array{
			$alignfull_value = (is_numeric($this->get_setting( 'max_width_alignfull' )->get_data())) ?
				$this->get_setting( 'max_width_alignfull' )->get_data().'px' :
				$this->get_setting( 'max_width_alignfull' )->get_data();

			$alignwide_value = $this->get_setting( 'max_width_alignwide' )->get_data().'px';
			$text_value = $this->get_setting( 'max_width_text' )->get_data().'px';


			return array(
				'100vw'					=> 'Full Screen Width (100vw)',
				'100%'					=> 'Full Box Width (100%)',
				$alignfull_value		=> 	$this->get_setting( 'max_width_alignfull' )->get_title().' ('.$alignfull_value.')',
				$alignwide_value		=> 	$this->get_setting( 'max_width_alignwide' )->get_title().' ('.$alignwide_value.')',
				$text_value				=> 	$this->get_setting( 'max_width_text' )->get_title().' ('.$text_value.')'
			);
		}
		public function wp_print_styles() {
			if(! is_admin() && ! wp_doing_ajax()){
				// Gutenberg: load Styles inline for Pagespeed purposes
				wp_deregister_style( 'wp-block-library' );
				wp_dequeue_style( 'wp-block-library' );
				wp_dequeue_style( 'wp-block-library-theme' );
			}

		}
	}