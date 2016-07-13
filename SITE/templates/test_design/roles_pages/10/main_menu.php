
	<div class="block_top">
		<div class="content">
			<span class="block_top_zagolovok"><a href="./cabinet.php"><?php echo $settings_zagolovok; ?></a></span>
			<ul class="block_top_nav_menu">
				<li <?php if (curr_file()=='cabinet.php') {echo 'class="active"';} ?> >
					<a href="./cabinet.php"><?php echo $loc['in_header_top_menu']['t01']; ?></a>
				</li>
				<li <?php if (curr_file()=='stats.php') {echo 'class="active"';} ?> >
					<a href="./stats.php"><?php echo $loc['in_header_top_menu']['t02']; ?></a>
				</li>				
				<li <?php if (curr_file()=='offers.php') {echo 'class="active"';} ?> >
					<a href="./offers.php"><?php echo $loc['in_header_top_menu']['t03']; ?></a>
				</li>
				<li>
					<a href="./traffic.php" <?php if (curr_file()=='traffic.php' || curr_file()=='user_tds.php' || curr_file()=='subacc.php') {echo 'style="color: white;"';} ?>><?php echo $loc['in_header_top_menu']['t04']; ?></a>
				</li>				
				<li>
					<a href="./shortlinks.php" <?php if (curr_file()=='shortlinks.php' || curr_file()=='referals.php') {echo 'style="color: white;"';} ?>><?php echo $loc['in_header_top_menu']['t05']; ?></a>
				</li>
				<li <?php if (curr_file()=='finances.php') {echo 'class="active"';} ?> >
					<a href="./finances.php"><?php echo $loc['in_header_top_menu']['t06']; ?></a>
				</li>
				<li <?php if (curr_file()=='profile.php') {echo 'class="active"';} ?>>
					<a href="./profile.php"><?php echo $loc['in_header_top_menu']['t07']; ?></a>
				</li>
				<li>
					<a href="./help.php" <?php if (curr_file()=='help.php' || curr_file()=='tickets.php') {echo 'style="color: white;"';} ?>><?php echo $loc['in_header_top_menu']['t08']; ?></a>
				</li>				
			</ul>	
			<ul class="block_top_nav_menu2">
				<li>
					<a href="./logout.php"><?php echo $loc['in_header_top_menu']['t09']; ?></a>
				</li>
			</ul>			
		</div>
	</div>
	<div class="block_top_menu2" <?php if (curr_file()=='shortlinks.php' || curr_file()=='referals.php') {echo 'style="display: block;"';} ?>>
		<div class="content">
			<ul class="block_top_nav_menu">
				<li <?php if (curr_file()=='shortlinks.php') {echo 'class="active"';} ?> >
					<a href="./shortlinks.php"><?php echo $loc['in_header_top_menu']['t10']; ?></a>
				</li>
				<li <?php if (curr_file()=='referals.php') {echo 'class="active"';} ?> >
					<a href="./referals.php"><?php echo $loc['in_header_top_menu']['t11']; ?></a>
				</li>
			</ul>
		</div>
	</div>		
	<div class="block_top_menu2" <?php if (curr_file()=='traffic.php' || curr_file()=='user_tds.php' || curr_file()=='subacc.php') {echo 'style="display: block;"';} ?>>
		<div class="content">
			<ul class="block_top_nav_menu">
				<li <?php if (curr_file()=='traffic.php') {echo 'class="active"';} ?> >
					<a href="./traffic.php"><?php echo $loc['in_header_top_menu']['t04']; ?></a>
				</li>
				<li <?php if (curr_file()=='user_tds.php') {echo 'class="active"';} ?> >
					<a href="./user_tds.php"><?php echo $loc['in_header_top_menu']['t12']; ?></a>
				</li>				
				<li <?php if (curr_file()=='subacc.php') {echo 'class="active"';} ?> >
					<a href="./subacc.php"><?php echo $loc['in_header_top_menu']['t13']; ?></a>
				</li>
			</ul>
		</div>
	</div>	
	<div class="block_top_menu2" <?php if (curr_file()=='help.php' || curr_file()=='tickets.php') {echo 'style="display: block;"';} ?>>
		<div class="content">
			<ul class="block_top_nav_menu">
				<li <?php if (curr_file()=='help.php') {echo 'class="active"';} ?> >
					<a href="./help.php"><?php echo $loc['in_header_top_menu']['t08']; ?></a>
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
			<b><?php echo $loc['in_header_top_menu']['t15']; ?>&nbsp;</b><?php echo $user_hold; ?>&nbsp;<?php echo $loc['in_header_top_menu']['t16']; ?>&nbsp;
			&nbsp;|&nbsp;
			<b><?php echo $loc['in_header_top_menu']['t17']; ?>&nbsp;</b><?php echo $user_balance; ?>&nbsp;<?php echo $loc['in_header_top_menu']['t16']; ?>&nbsp;
			<?php include 'main_menu_tickets.php'; ?>
		</div>
	</div>
