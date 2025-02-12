<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_setting_subpage">
		<h2><?php _e('Cite', 'sv100'); ?></h2>
		<h3 class="divider"><?php _e( 'Font', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'cite_font' )->form();
				echo $module->get_setting( 'cite_font_size' )->form();
			?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'cite_line_height' )->form();
				echo $module->get_setting( 'cite_text_color' )->form();
			?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'cite_margin' )->form();
				echo $module->get_setting( 'cite_padding' )->form();
			?>
		</div>
	</div>
<?php } ?>