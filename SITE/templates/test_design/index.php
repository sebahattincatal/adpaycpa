
	<div class="wrapper">
		<!--[if lt IE 9]>
			<div class="browsehappy"><?php echo $loc['service']['t01']; ?></div>
		<![endif]-->

		<?php
		// Выводим шапку сайта
		// Print the cap site
		include './templates/'.$template.'/blocks/shapka_not_login.php';

		// Выводим верхнее горизонтальное меню
		// Display the top horizontal menu
		include './templates/'.$template.'/blocks/top_menu_not_login.php';
		?>

		<div class="grab">
			<div class="cnt">
				<div class="grab__title"><?php echo $loc['index.php']['t01']; ?></div>
				<div class="grab__mini"><?php echo $loc['index.php']['t02']; ?></div>
				<div class="grab__question">
					<span class="img-icon-grab1"></span>
					<?php echo $loc['index.php']['t03']; ?>
				</div>
				<div class="grab__question">
					<span class="img-icon-grab2"></span>
					<?php echo $loc['index.php']['t04']; ?>
				</div>
				<div class="grab__center">
					<?php
					// Если регистрация полностью выключена для всех, то выводим сообщение об этом.
					// If the registration is completely disabled for all, the message of this.
					if ($settings_registration_wm!='1' && $settings_registration_rk!='1') 
						{
						echo $loc['index.php']['t05'];
						}
					else
						{
						echo $loc['index.php']['t06'];
						}
					?>
				</div>

				<?php
				// Если регистрация разрешена хотя бы для одной роли, то выводим форму регистрации
				// If the registration is allowed for at least one role, a registration form
				if ($settings_registration_wm=='1' || $settings_registration_rk=='1') 
					{
					?>
					<div class="grab__wrap-form">
						<?php
						// Выводим форму регистрации
						// Print the registration form
						include './templates/'.$template.'/blocks/registration_form.php';
						?>
					</div>
					<?php
					}
				?>
				
			</div>
		</div>

		<div class="steps">
			<div class="cnt">
				<div class="steps__title"><?php echo $loc['index.php']['t07']; ?></div>
				<div class="steps__item">
					<span class="img-icon-step1"></span>
					<div>
						<?php echo $loc['index.php']['t08']; ?>
					</div>
				</div>
				<div class="steps__item steps__item_center">
					<span class="img-icon-step2"></span>
					<div>
						<?php echo $loc['index.php']['t09']; ?>
					</div>
				</div>
				<div class="steps__item">
					<span class="img-icon-step3"></span>
					<div>
						<?php echo $loc['index.php']['t10']; ?>
					</div>
				</div>
			</div>
		</div>

		<div class="cooperation">
			<div class="cnt">
				<div class="cooperation__title"><span><?php echo $loc['index.php']['t11']; ?></span></div>
				<span class="cooperation__wrap-button"><button class="cooperation__button" onClick="window.location.href = './';"><span><?php echo $loc['index.php']['t12']; ?></span></button></span>
			</div>
		</div>

		<div class="advantages">
			<div class="cnt">
				<div class="advantages__title"><?php echo $loc['index.php']['t13']; ?></div>
				<div class="advantages__img">
					<span class="img-advantages"></span>
					<div class="advantages__text advantages__text_pos1">
						<?php echo $loc['index.php']['t14']; ?>
					</div>
					<div class="advantages__text advantages__text_pos2">
						<?php echo $loc['index.php']['t15']; ?>
					</div>
					<div class="advantages__text advantages__text_pos3">
						<?php echo $loc['index.php']['t16']; ?>
					</div>
				</div>
			</div>
		</div>

		<?php
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
	