
<h1><?php echo $loc['adduser.php']['t01']; ?></h1>

<p>
	<?php
	if (isset($_GET['xtext']) && $_GET['xtext']!='')
		{
		// Сообщения об ошибках либо об успехе
		// Service messages
		$xtext=htmlentities($_GET['xtext']);
		if ($xtext=='1') {echo '<font color=red>'.$loc['adduser.php']['t02'].'</font>';}
		if ($xtext=='2') {echo '<font color=red>'.$loc['adduser.php']['t03'].'</font>';}
		if ($xtext=='3') {echo '<font color=red>'.$loc['adduser.php']['t04'].'</font>';}
		if ($xtext=='4') {echo '<font color=red>'.$loc['adduser.php']['t05'].'</font>';}
		if ($xtext=='5') {echo '<font color=red>'.$loc['adduser.php']['t06'].'</font>';}
		if ($xtext=='6') {echo '<font color=red>'.$loc['adduser.php']['t07'].'</font>';}
		if ($xtext=='7') {echo '<font color=red>'.$loc['adduser.php']['t08'].'</font>';}
		if ($xtext=='8') {echo '<font color=green>'.$loc['adduser.php']['t09'].'</font>';}	
		}
	?>
</p>
	
<p>
	<?php
	// Форма добавления пользователя
	// Add a user form
	include './templates/'.$template.'/blocks/adduser_form.php';
	?>
</p>
