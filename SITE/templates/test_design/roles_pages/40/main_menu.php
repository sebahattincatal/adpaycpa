
	<div class="block_top">
		<div class="content">
			<span class="block_top_zagolovok"><a href="./cabinet.php"><?php echo $settings_zagolovok; ?></a></span>
			<ul class="block_top_nav_menu">
				<li <?php if (curr_file()=='cabinet.php') {echo 'class="active"';} ?> >
					<a href="./cabinet.php"><?php echo $loc['in_header_top_menu']['t01']; ?></a>
				</li>
				<li>
					<a href="./stats.php" <?php if (curr_file()=='stats.php' || curr_file()=='zakaz.php') {echo 'style="color: white;"';} ?>><?php echo $loc['in_header_top_menu']['t02']; ?></a>
				</li>				
				<li <?php if (curr_file()=='offers.php') {echo 'class="active"';} ?> >
					<a href="./offers.php"><?php echo $loc['in_header_top_menu']['t03']; ?></a>
				</li>
				<li <?php if (curr_file()=='landings.php') {echo 'class="active"';} ?> >
					<a href="./landings.php"><?php echo $loc['in_header_top_menu']['t18']; ?></a>
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
	<div class="block_top_menu2" <?php if (curr_file()=='stats.php' || curr_file()=='zakaz.php') {echo 'style="display: block;"';} ?>>
		<div class="content">
			<ul class="block_top_nav_menu">
				<li <?php if (curr_file()=='stats.php') {echo 'class="active"';} ?> >
					<a href="./stats.php"><?php echo $loc['in_header_top_menu']['t02']; ?></a>
				</li>
				<li <?php if (curr_file()=='zakaz.php') {echo 'class="active"';} ?>>
					<a href="./zakaz.php"><?php echo $loc['in_header_top_menu']['t19']; ?></a>
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
			<?php
			$sql = "SELECT COUNT(`id`) as count_zakaz FROM zakaz WHERE `owner_id`='$user_id' AND `status`='1'";
			$result = $mysqli->query($sql);
			$count=mysqli_fetch_assoc($result);
			$count_zakaz=htmlentities($count['count_zakaz']);
			?>
			&nbsp;|&nbsp;
			<b><?php echo $loc['in_header_top_menu']['t20']; ?>&nbsp;</b><a href="./zakaz.php?status=1&page=1"><?php echo $count_zakaz; ?></a>
			&nbsp;|&nbsp;
			<b><?php echo $loc['in_header_top_menu']['t21']; ?>&nbsp;</b><a href="./zakaz.php?status=2&page=1">
			<?php
			$sql = "SELECT COUNT(`id`) as count_zakaz FROM zakaz WHERE `owner_id`='$user_id' AND `status`='2'";
			$result = $mysqli->query($sql);
			$count=mysqli_fetch_assoc($result);
			echo $count_zakaz=htmlentities($count['count_zakaz']);
			?></a>
			&nbsp;|&nbsp;
			<b><?php echo $loc['in_header_top_menu']['t17']; ?>&nbsp;</b><?php echo $user_balance; ?>&nbsp;<?php echo $loc['in_header_top_menu']['t16']; ?>&nbsp;
			<?php include 'main_menu_tickets.php'; ?>
		</div>
	</div>
