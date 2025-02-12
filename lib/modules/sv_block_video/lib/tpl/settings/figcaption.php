<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_setting_subpage">
		<h2><?php _e('Caption', 'sv100'); ?></h2>
		<h3 class="divider"><?php _e( 'Font', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'figcaption_font' )->form();
				echo $module->get_setting( 'figcaption_font_size' )->form();
				echo $module->get_setting( 'figcaption_line_height' )->form();
				echo $module->get_setting( 'figcaption_text_color' )->form();
			?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'figcaption_margin' )->form();
				echo $module->get_setting( 'figcaption_padding' )->form();
			?>
		</div>
	</div>
<?php } ?>