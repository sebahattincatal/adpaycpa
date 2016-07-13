
<h1><?php echo $loc['settings.php']['t01']; ?></h1>

<p>
	<?php if (isset($_GET['success'])) {echo '<b><font color=green>'.$loc['settings.php']['t02'].'</font></b>';} ?>
</p>

<p>
	<?php
	// Выводим форму системных настроек
	// Display the form of system settings
	include ('./templates/'.$template.'/blocks/settings_form.php');
	?>
</p>

<p>
	&nbsp;
</p>