<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_setting_subpage">
		<h2><?php _e('Outline', 'sv100'); ?></h2>
		<h3 class="divider"><?php _e( 'Colors', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'outline_text_color' )->form();
				echo $module->get_setting( 'outline_bg_color' )->form();
			?>
		</div>
	</div>
<?php } ?>