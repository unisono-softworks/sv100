<?php
	namespace sv100;

	class sv_font_sizes extends init {
		public function init() {
			$this->set_module_title( __( 'SV Font Sizes', 'sv100' ) )
				->set_module_desc( __( 'Define your own font size presets.', 'sv100' ) )
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(700)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M22 0h-20v6h1.999c0-1.174.397-3 2.001-3h4v16.874c0 1.174-.825 2.126-2 2.126h-1v2h9.999v-2h-.999c-1.174 0-2-.952-2-2.126v-16.874h4c1.649 0 2.02 1.826 2.02 3h1.98v-6z"/></svg>')
				->get_root()
				->add_section( $this );

			// @todo: add to docs: Font Size Vars
			// WP default font sizes: small, medium, large, x-large
			// Use these slugs in font size settings and add additional ones if needed.
			// --wp--preset--font-size--$slug
			// .has-$slug-font-size
		}
		public function theme_json_update_data(){
			$theme_json     = $this->theme_json_get_data();

			$theme_json['settings']['typography']['fontSizes']   = array();

			foreach($this->get_list() as $size){
				$theme_json['settings']['typography']['fontSizes'][$size['slug']]   = array(
					'slug'              => $size['slug'],
					'name'              => $size['name'],
					'size'              => is_array($size['size']) ? $size['size']['desktop'] : $size['size']
				);
			}

			return $theme_json;
		}
		protected function load_settings(): sv_font_sizes {
			$this->get_setting( 'font_sizes' )
				 ->set_title( __( 'Font Sizes', 'sv100' ) )
				 ->load_type( 'group' );
			
			$this->get_setting( 'font_sizes' )
				 ->run_type()
				 ->add_child()
				 ->set_ID( 'entry_label' )
				 ->set_title( __( 'Name', 'sv100' ) )
				 ->set_description( __( 'Give your font size a name.', 'sv100' ) )
				 ->load_type( 'text' );
			
			$this->get_setting( 'font_sizes' )
				 ->run_type()
				 ->add_child()
				 ->set_ID( 'slug' )
				 ->set_title( __( 'Slug', 'sv100' ) )
				 ->set_description( __( 'This slug is used for the helper classes.', 'sv100' ) )
				 ->load_type( 'text' );
			
			$this->get_setting( 'font_sizes' )
				 ->run_type()
				 ->add_child()
				 ->set_ID( 'size' )
				 ->set_title( __( 'Size', 'sv100' ) )
				 ->set_is_responsive(true)
				 ->load_type( 'text' );
			
			return $this;
		}

		public function get_list(): array {
			$sizes		= array();
			$setting 	= $this->get_setting( 'font_sizes' );

			if ( $setting->get_data() ) {
				foreach ( $this->recursive_change_key(
					$setting->get_data(),
					array( 'entry_label' => 'name' )
				) as $group ) {
					$sizes[] = array(
						'name'	=> $group['name'],
						'slug'	=> $this->sanitize_slug($group['slug']),
						'size'	=> $group['size'],
					);

				}
			}

			return $sizes;
		}
		private function recursive_change_key( $arr, $set ) {
			if ( is_array( $arr ) && is_array( $set ) ) {
				$newArr = array();

				foreach ( $arr as $k => $v ) {
					$key = array_key_exists( $k, $set) ? $set[ $k ] : $k;
					$newArr[ $key ] = is_array( $v ) ? $this->recursive_change_key( $v, $set ) : $v;
				}

				return $newArr;
			}

			return $arr;
		}
		public function sanitize_slug(string $slug): string{
			$slug		= sanitize_title_with_dashes($slug);
			$slug		= str_replace('_','-', $slug);

			return $slug;
		}
	}