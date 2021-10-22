<h1>Zillow Manager</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php">
	<?php
	settings_fields( 'grouptwo_options_group' );
	do_settings_sections( 'grouptwo_builder_fields_setting' );
	submit_button();
	?>
</form>
