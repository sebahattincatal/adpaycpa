
	<div class="block_top">
		<div class="content">
			<span class="block_top_zagolovok"><a href="./cabinet.php"><?php echo $settings_zagolovok; ?></a></span>
			<ul class="block_top_nav_menu">
				<li>
					<a href="./settings.php" <?php if (curr_file()=='settings.php' || curr_file()=='system_tds.php' || curr_file()=='domains.php' || curr_file()=='cat_offers.php') {echo 'style="color: white;"';} ?>><?php echo $loc['in_header_top_menu']['t23']; ?></a>
				</li>
				<li <?php if (curr_file()=='cabinet.php') {echo 'class="active"';} ?> >
					<a href="./cabinet.php"><?php echo $loc['in_header_top_menu']['t01']; ?></a>
				</li>
				<li>
					<a href="./stats.php" <?php if (curr_file()=='stats.php' || curr_file()=='zakaz.php' || curr_file()=='traffic.php') {echo 'style="color: white;"';} ?>><?php echo $loc['in_header_top_menu']['t02']; ?></a>
				</li>				
				<li <?php if (curr_file()=='news.php') {echo 'class="active"';} ?> >
					<a href="./news.php"><?php echo $loc['in_header_top_menu']['t22']; ?></a>
				</li>
				<li>
					<a href="./offers.php" <?php if (curr_file()=='offers.php' || curr_file()=='landings.php') {echo 'style="color: white;"';} ?>><?php echo $loc['in_header_top_menu']['t03']; ?></a>
				</li>
				<li>
					<a href="./users.php" <?php if (curr_file()=='users.php' || curr_file()=='adduser.php' || curr_file()=='users_log.php' || curr_file()=='multiacc.php' || curr_file()=='tickets.php') {echo 'style="color: white;"';} ?>><?php echo $loc['in_header_top_menu']['t24']; ?></a>
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
	<div class="block_top_menu2" <?php if (curr_file()=='settings.php' || curr_file()=='system_tds.php' || curr_file()=='domains.php' || curr_file()=='cat_offers.php') {echo 'style="display: block;"';} ?>>
		<div class="content">
			<ul class="block_top_nav_menu">
				<li <?php if (curr_file()=='settings.php') {echo 'class="active"';} ?> >
					<a href="./settings.php"><?php echo $loc['in_header_top_menu']['t23']; ?></a>
				</li>
				<li <?php if (curr_file()=='system_tds.php') {echo 'class="active"';} ?>>
					<a href="./system_tds.php"><?php echo $loc['in_header_top_menu']['t25']; ?></a>
				</li>
				<li <?php if (curr_file()=='domains.php') {echo 'class="active"';} ?> >
					<a href="./domains.php"><?php echo $loc['in_header_top_menu']['t26']; ?></a>
				</li>
				<li <?php if (curr_file()=='cat_offers.php') {echo 'class="active"';} ?> >
					<a href="./cat_offers.php"><?php echo $loc['in_header_top_menu']['t27']; ?></a>
				</li>				
			</ul>
		</div>
	</div>
	<div class="block_top_menu2" <?php if (curr_file()=='stats.php' || curr_file()=='zakaz.php' || curr_file()=='traffic.php') {echo 'style="display: block;"';} ?>>
		<div class="content">
			<ul class="block_top_nav_menu">
				<li <?php if (curr_file()=='stats.php') {echo 'class="active"';} ?> >
					<a href="./stats.php"><?php echo $loc['in_header_top_menu']['t02']; ?></a>
				</li>
				<li <?php if (curr_file()=='zakaz.php') {echo 'class="active"';} ?>>
					<a href="./zakaz.php"><?php echo $loc['in_header_top_menu']['t19']; ?></a>
				</li>
				<li <?php if (curr_file()=='traffic.php') {echo 'class="active"';} ?>>
					<a href="./traffic.php"><?php echo $loc['in_header_top_menu']['t04']; ?></a>
				</li>				
			</ul>
		</div>
	</div>	
	<div class="block_top_menu2" <?php if (curr_file()=='offers.php' || curr_file()=='landings.php') {echo 'style="display: block;"';} ?>>
		<div class="content">
			<ul class="block_top_nav_menu">
				<li <?php if (curr_file()=='offers.php') {echo 'class="active"';} ?> >
					<a href="./offers.php"><?php echo $loc['in_header_top_menu']['t03']; ?></a>
				</li>
				<li <?php if (curr_file()=='landings.php') {echo 'class="active"';} ?>>
					<a href="./landings.php"><?php echo $loc['in_header_top_menu']['t18']; ?></a>
				</li>
			</ul>
		</div>
	</div>	
	<div class="block_top_menu2" <?php if (curr_file()=='users.php' || curr_file()=='adduser.php' || curr_file()=='users_log.php' || curr_file()=='multiacc.php' || curr_file()=='tickets.php') {echo 'style="display: block;"';} ?>>
		<div class="content">
			<ul class="block_top_nav_menu">
				<li <?php if (curr_file()=='users.php') {echo 'class="active"';} ?> >
					<a href="./users.php"><?php echo $loc['in_header_top_menu']['t24']; ?></a>
				</li>
				<li <?php if (curr_file()=='adduser.php') {echo 'class="active"';} ?> >
					<a href="./adduser.php"><?php echo $loc['in_header_top_menu']['t28']; ?></a>
				</li>				
				<li <?php if (curr_file()=='users_log.php') {echo 'class="active"';} ?>>
					<a href="./users_log.php"><?php echo $loc['in_header_top_menu']['t29']; ?></a>
				</li>
				<li <?php if (curr_file()=='multiacc.php') {echo 'class="active"';} ?>>
					<a href="./multiacc.php"><?php echo $loc['in_header_top_menu']['t30']; ?></a>
				</li>				
				<li <?php if (curr_file()=='tickets.php') {echo 'class="active"';} ?>>
					<a href="./tickets.php"><?php echo $loc['in_header_top_menu']['t14']; ?></a>
				</li>								
			</ul>
		</div>
	</div>	
	<div class="block_information">
		<div class="block_information_content">
			<b><?php echo htmlentities($user_tip_title); ?>: </b><a href="profile.php"><?php echo htmlentities($user_email); ?></a>
			&nbsp;|&nbsp;
			<b><?php echo $loc['in_header_top_menu']['t31']; ?>&nbsp;</b><?php echo $settings_balance_cpa; ?>&nbsp;<?php echo $loc['in_header_top_menu']['t16']; ?>&nbsp;
			<?php include 'main_menu_tickets.php'; ?>
		</div>
	</div>
	