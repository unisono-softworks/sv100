<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_setting_subpage">
		<h2><?php _e('Input', 'sv100'); ?></h2>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'input_font' )->form();
				echo $module->get_setting( 'input_font_size' )->form();
			?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'input_line_height' )->form();
				echo $module->get_setting( 'input_text_color' )->form();
				echo $module->get_setting( 'input_background_color' )->form();
			?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'input_margin' )->form();
				echo $module->get_setting( 'input_padding' )->form();
			?>
		</div>
	</div>
<?php } ?>