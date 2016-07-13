<div class="main-menu pull-right">
			<ul>
				<li <?php if (curr_file()=='cabinet.php') {echo 'class="active"';} ?> class="active" >
					<a href="./cabinet.php"><?php echo $loc['in_header_top_menu']['t01']; ?></a>
				</li>
				<li <?php if (curr_file()=='stats.php') {echo 'class="active"';} ?> class="child-item" >
					<a href="./stats.php"><?php echo $loc['in_header_top_menu']['t02']; ?></a>
				</li>
				<li <?php if (curr_file()=='offers.php') {echo 'class="active"';} ?> class="child-item" >
					<a href="./offers.php"><?php echo $loc['in_header_top_menu']['t03']; ?></a>
				</li>
				<li>
					<a href="./shortlinks.php" <?php if (curr_file()=='shortlinks.php' || curr_file()=='referals.php') {echo 'style="color: white;"';} ?>><?php echo $loc['in_header_top_menu']['t05']; ?></a>
				</li>
				<li <?php if (curr_file()=='finances.php') {echo 'class="active"';} ?> >
					<a href="./finances.php"><?php echo $loc['in_header_top_menu']['t06']; ?></a>
				</li>
				<li <?php if (curr_file()=='traffic.php') {echo 'class="active"';} ?> class="child-item">
					<a href="./traffic.php"><?php echo $loc['in_header_top_menu']['t04']; ?></a>
					<ul>
						<li <?php if (curr_file()=='user_tds.php') {echo 'class="active"';} ?> >
							<a href="./user_tds.php"><?php echo $loc['in_header_top_menu']['t12']; ?></a>
						</li>				
						<li <?php if (curr_file()=='subacc.php') {echo 'class="active"';} ?> >
							<a href="./subacc.php"><?php echo $loc['in_header_top_menu']['t13']; ?></a>
						</li>
					</ul>
				</li>
				<li <?php if (curr_file()=='profile.php') {echo 'class="active"';} ?>>
					<a href="./profile.php"><?php echo $loc['in_header_top_menu']['t07']; ?></a>
				</li>
				<li>
					<a href="./help.php" <?php if (curr_file()=='help.php' || curr_file()=='tickets.php') {echo 'style="color: white;"';} ?>><?php echo $loc['in_header_top_menu']['t08']; ?></a>
				</li>
			</ul>
		</div><!-- log-out -->
	</div><!-- container -->
</header>
<div class="main">

	<div class="header-bottom">
		<div class="container">
			<div class="row">
				<div class="page-title col-md-4 col-sm-4 col-xs-12">
					<div class="page-title-wrap">
						<i class="flaticon-four-squares-with-frame-shape"></i>
					</div><!-- page-title-wrap -->
				</div><!-- page-title -->
				<div class="panel-info text-right col-md-8 col-sm-8 col-xs-12">

						<div class="panel-profile">
							<i class="flaticon-profile"></i>
							<div class="profile-detail">
								<h3><?php echo htmlentities($user_tip_title); ?>:</h3>
								<a href="profile.php"><?php echo htmlentities($user_email); ?></a>
							</div><!-- profile-detail -->
						</div><!-- panel-profile -->

						<div class="balance-profile">
							<div class="balance-detail">
								<img src="assets/images/coin.png">
								<div class="balance-inwrap">
									<div class="total-price"><?php echo $user_balance; ?>&nbsp;<?php echo $loc['in_header_top_menu']['t16']; ?></div>
									<span><?php echo $loc['in_header_top_menu']['t17'];?></span>
								</div><!-- balance-inwrap -->
							</div><!-- balance-detail -->
							<div class="hold-detail">
								<div class="total-price"><?php echo $user_hold; ?>&nbsp;<?php echo $loc['in_header_top_menu']['t16']; ?></div>
								<span><?php echo $loc['in_header_top_menu']['t15']; ?></span>
							</div><!-- hold-detail -->
							&nbsp;
								<?php include 'main_menu_tickets.php'; ?>
						</div><!-- balance-profile -->
				</div><!-- panel-info -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- header-bottom -->