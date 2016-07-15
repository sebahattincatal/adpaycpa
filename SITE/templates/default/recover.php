
	<div class="wrapper">
		<!--[if lt IE 9]>
			<div class="browsehappy"><?php echo $loc['service']['t01']; ?></div>
		<![endif]-->

		<?php
		// Выводим шапку сайта
		// Print cap site
		include './templates/'.$template.'/blocks/shapka_not_login.php';

		?>

		<div class="page">
			<div class="cnt">
				<div class="page__title"><span><?php echo $loc['recover.php']['t01']; ?></span></div>
				<div class="page__text">
					<h2><?php echo $loc['recover.php']['t02']; ?></h2>
					<p>
						<?php echo $loc['recover.php']['t03']; ?>
					</p>
					
					<p>
						<center>
							<? if(isset($error_message)): ?>
							<strong style="color:red"><?php echo $error_message; ?></strong>
							<? endif; ?>
						</center>
					</p>
					
					<p>

						<?php
						// Выводим форму восстановления утраченного доступа
						// Display the form of restoration of the lost access
						include './templates/'.$template.'/blocks/recover_form.php';
						?>
						
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





	<div class="sidebar-navigation">
		<div class="sidebar-menu"></div>
	</div><!-- sidebar-navigation -->
	<div class="sidebar-overlay close-btn"></div>

	<div class="blog-inwrap">


		<?php
		// Выводим шапку сайта
		// Print cap site
		include './templates/'.$template.'/blocks/shapka_not_login.php';

		?>