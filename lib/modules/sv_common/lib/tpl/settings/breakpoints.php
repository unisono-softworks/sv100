<div class="sv_setting_subpage">
	<h2><?php _e('Breakpoints', 'sv100'); ?></h2>
	<p><?php _e( 'Define the min-width for the different devices (in pixel).' ); ?></p>

	<div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'breakpoint_mobile' )->form();
		echo $module->get_setting( 'breakpoint_mobile_landscape' )->form();
		?>
	</div>
	<div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'breakpoint_tablet' )->form();
		echo $module->get_setting( 'breakpoint_tablet_landscape' )->form();
		?>
	</div>
	<div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'breakpoint_tablet_pro' )->form();
		echo $module->get_setting( 'breakpoint_tablet_pro_landscape' )->form();
		?>
	</div>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'breakpoint_desktop' )->form();
			echo $module->get_setting( 'spacing' )->form();
		?>
	</div>
</div>