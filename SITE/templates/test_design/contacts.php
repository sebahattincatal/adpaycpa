
	<div class="wrapper">
		<!--[if lt IE 9]>
			<div class="browsehappy"><?php echo $loc['service']['t01']; ?></div>
		<![endif]-->

		<?php
		// Выводим шапку сайта
		// Print cap site
		include './templates/'.$template.'/blocks/shapka_not_login.php';

		// Выводим верхнее горизонтальное меню
		// Display the top horizontal menu
		include './templates/'.$template.'/blocks/top_menu_not_login.php';
		?>

		<div class="page">
			<div class="cnt">
				<div class="page__title"><span><?php echo $loc['contacts.php']['t01']; ?></span></div>
				<div class="page__text">
					<h2><?php echo $loc['contacts.php']['t02']; ?></h2>
					<?php echo $loc['contacts.php']['t03']; ?>
					<?php
					if (isset($settings_email) && $settings_email!='') 
							{echo '<p><b>'.$loc['contacts.php']['t04'].'</b><br /><a href="mailto:'.$settings_email.'">'.$settings_email.'</a></p>';}
					?>
					<p>
						<b><?php echo $loc['contacts.php']['t05']; ?></b><br />
						<?php 
						// Данные выводятся из базы MySQL, таблица "settings"
						// Data is output from the MySQL database, table "settings"
						if (isset($settings_icq) && $settings_icq!='') 
							{echo $loc['contacts.php']['t06'].'&nbsp;'.$settings_icq.'<br />';}
						
						if (isset($settings_skype) && $settings_skype!='') 
							{echo $loc['contacts.php']['t07'].'&nbsp;<a href="skype:'.$settings_skype.'?add">'.$settings_skype.'</a><br />';}
						
						if (isset($settings_email) && $settings_email!='') 
							{echo $loc['contacts.php']['t08'].'&nbsp;<a href="mailto:'.$settings_email.'">'.$settings_email.'</a><br />';}
						
						if (isset($settings_phone) && $settings_phone!='') 
							{echo $loc['contacts.php']['t09'].'&nbsp;'.$settings_phone.'<br />';}
						?>
 					</p>
					<p>
						<?php echo $loc['contacts.php']['t10']; ?>
					</p>					
				</div>
			</div>
		</div>

		<?php
		// То что выводится на каждой странице до авторизации
		// What is displayed on each page to login
		include './templates/'.$template.'/blocks/always_not_login.php';

		// Выводим нижнее горизонтальное меню
		// Display the bottom horizontal menu
		include './templates/'.$template.'/blocks/bottom_menu_not_login.php';
		?>

	</div>

	<?php
	// Выводим форму логина
	// Display the login form
	include './templates/'.$template.'/blocks/login_form.php';
	?>

	<script src="./templates/<?php echo $template; ?>/js/scripts.js"></script>
	
	<!--[if lt IE 10]>
	<script src="./templates/<?php echo $template; ?>/js/attrplaceholder.js"></script>
	<![endif]-->
