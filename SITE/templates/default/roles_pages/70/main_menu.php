<div class="main-menu pull-right">
			<ul>
				<li class="child-item active"><a href="index.html">Settings</a>
					<ul>
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
				</li>
				<li <?php if (curr_file()=='cabinet.php') {echo 'class="active"';} ?> >
					<a href="./cabinet.php"><?php echo $loc['in_header_top_menu']['t01']; ?></a>
				</li>
				<li class="child-item"><a href="statics.html">Statistics</a>
					<ul>
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
				</li>
				<li <?php if (curr_file()=='news.php') {echo 'class="active"';} ?> >
					<a href="./news.php"><?php echo $loc['in_header_top_menu']['t22']; ?></a>
				</li>
				<li class="child-item"><a href="offers.html">Offers</a>
					<ul>
						<li <?php if (curr_file()=='offers.php') {echo 'class="active"';} ?> >
					<a href="./offers.php"><?php echo $loc['in_header_top_menu']['t03']; ?></a>
					</li>
					<li <?php if (curr_file()=='landings.php') {echo 'class="active"';} ?>>
						<a href="./landings.php"><?php echo $loc['in_header_top_menu']['t18']; ?></a>
					</li>
					</ul>
				</li>
				<li class="child-item"><a href="users.html">Users</a>
					<ul>
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
				</li>
				<li <?php if (curr_file()=='finances.php') {echo 'class="active"';} ?> >
					<a href="./finances.php"><?php echo $loc['in_header_top_menu']['t06']; ?></a>
				</li>
				<li <?php if (curr_file()=='profile.php') {echo 'class="active"';} ?>>
					<a href="./profile.php"><?php echo $loc['in_header_top_menu']['t07']; ?></a>
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
								<h3>Martin LAUREN</h3>
								<span>Your Profile</span>
							</div><!-- profile-detail -->
						</div><!-- panel-profile -->

						<div class="balance-profile">
							<div class="balance-detail">
								<img src="assets/images/coin.png">
								<div class="balance-inwrap">
									<div class="total-price">0,00</div>
									<span>Balance</span>
								</div><!-- balance-inwrap -->
							</div><!-- balance-detail -->
							<div class="hold-detail">
								<div class="total-price">0,00</div>
								<span>Hold</span>
							</div><!-- hold-detail -->
						</div><!-- balance-profile -->
				</div><!-- panel-info -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- header-bottom -->