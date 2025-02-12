<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_setting_subpage">
		<h2><?php _e('Submit', 'sv100'); ?></h2>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'submit_font' )->form();
				echo $module->get_setting( 'submit_font_size' )->form();
			?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'submit_line_height' )->form();
				echo $module->get_setting( 'submit_text_color' )->form();
				echo $module->get_setting( 'submit_background_color' )->form();
			?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'submit_margin' )->form();
				echo $module->get_setting( 'submit_padding' )->form();
			?>
		</div>
	</div>
<?php } ?>