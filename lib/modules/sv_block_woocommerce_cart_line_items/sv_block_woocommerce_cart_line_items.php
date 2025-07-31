<?php

namespace sv100;

class sv_block_woocommerce_cart_line_items extends init {
	public function init() {
		if (class_exists('WooCommerce')) {
			$this->set_module_title(__('Block: WooCommerce Cart Line Items', 'sv100'))
				->set_module_desc(__('Settings for Gutenberg Block', 'sv100'))
				->set_css_cache_active()
				->set_section_title($this->get_module_title())
				->set_section_desc($this->get_module_desc())
				->set_section_template_path()
				->set_section_order(5000)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z"/></svg>')
				//->set_block_handle('wp-block-woocommerce-cart-line-items-block')
				//->set_block_name('woocommerce/cart-line-items-block')
				->get_root()
				->add_section($this);
			
		}
		
		$this->get_script('config')->set_is_enqueued(false);
	}
	
	public function enqueue_scripts(): void {
		if (
			class_exists('WooCommerce')
			|| function_exists('is_cart') && is_cart()
			|| function_exists('is_checkout') && is_checkout()
		) {
			parent::enqueue_scripts();
			$this->get_script('config')->set_is_enqueued(true);
		}
	}
	
	public function load_settings(): sv_block_woocommerce_cart_line_items {
		$this->get_setting('font')
			->set_title(__('Font Family', 'sv100'))
			->set_description(__('Choose a font for your text.', 'sv100'))
			->set_options($this->get_module('sv_webfontloader') ? $this->get_module('sv_webfontloader')->get_font_options() : array('' => __('Please activate module SV Webfontloader for this Feature.', 'sv100')))
			->set_is_responsive(true)
			->load_type('select');
		
		$this->get_setting('font_size')
			->set_title(__('Font Size', 'sv100'))
			->set_description(__('Font Size in pixel.', 'sv100'))
			->set_is_responsive(true)
			->load_type('number');
		
		$this->get_setting('line_height')
			->set_title(__('Line Height', 'sv100'))
			->set_description(__('Set line height as multiplier or with a unit.', 'sv100'))
			->set_is_responsive(true)
			->load_type('text');
		
		$this->get_setting('text_color')
			->set_title(__('Text Color', 'sv100'))
			->set_is_responsive(true)
			->load_type('color');
		
		$this->get_setting('background_color')
			->set_title(__('Background Color', 'sv100'))
			->set_is_responsive(true)
			->load_type('color');
		
		$this->get_setting('margin')
			->set_title(__('Margin', 'sv100'))
			->set_is_responsive(true)
			->load_type('margin');
		
		$this->get_setting('padding')
			->set_title(__('Padding', 'sv100'))
			->set_is_responsive(true)
			->load_type('margin');
		
		return $this;
	}
}