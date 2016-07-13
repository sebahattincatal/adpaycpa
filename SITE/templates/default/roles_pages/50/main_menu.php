
	<div class="block_top">
		<div class="content">
			<span class="block_top_zagolovok"><a href="./cabinet.php"><?php echo $settings_zagolovok; ?></a></span>
			<ul class="block_top_nav_menu">
				<li <?php if (curr_file()=='cabinet.php') {echo 'class="active"';} ?> >
					<a href="./cabinet.php"><?php echo $loc['in_header_top_menu']['t01']; ?></a>
				</li>
				<li <?php if (curr_file()=='Заказы.php') {echo 'class="active"';} ?> >
					<a href="./zakaz.php"><?php echo $loc['in_header_top_menu']['t19']; ?></a>
				</li>				
				<li <?php if (curr_file()=='finances.php') {echo 'class="active"';} ?> >
					<a href="./finances.php"><?php echo $loc['in_header_top_menu']['t06']; ?></a>
				</li>
				<li <?php if (curr_file()=='profile.php') {echo 'class="active"';} ?>>
					<a href="./profile.php"><?php echo $loc['in_header_top_menu']['t07']; ?></a>
				</li>
			</ul>	
			<ul class="block_top_nav_menu2">
				<li>
					<a href="./logout.php"><?php echo $loc['in_header_top_menu']['t09']; ?></a>
				</li>
			</ul>			
		</div>
	</div>
	<div class="block_information">
		<div class="block_information_content">
			<b><?php echo htmlentities($user_tip_title); ?>: </b><a href="profile.php"><?php echo htmlentities($user_email); ?></a>
			&nbsp;|&nbsp;
			<b><?php echo $loc['in_header_top_menu']['t17']; ?>&nbsp;</b><?php echo $user_balance; ?>&nbsp;<?php echo $loc['in_header_top_menu']['t16']; ?>&nbsp;
			<?php include 'main_menu_tickets.php'; ?>
		</div>
	</div>
