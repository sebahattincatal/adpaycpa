
	<main>
		<div class="main-slider">
			<ul>
				<li>
					<div class="slider-content">
						<div class="container">
							<div class="row">
								<div class="col-md-3 col-sm-12 col-xs-12 wow fadeInLeft animated">
									<div class="slider-text">
										<h2><?php echo $loc['index.php']['t03']; ?></h2>
										<p>Want to quickly and profitably sell your traffic?</p>
										<div class="slider-buttons">
											<a href="#">Web Master</a>
										</div><!-- slider-buttons -->
									</div><!-- slider-text -->
									<div class="slider-text">
										<h2><?php echo $loc['index.php']['t04']; ?></h2>
										<p>Selling real goods, services or digital products?</p>
										<div class="slider-buttons">
											<a href="#">Advertiser</a>
										</div><!-- slider-buttons -->
									</div><!-- slider-text -->
								</div>
								<div class="col-md-9 col-sm-12 col-xs-12 wow fadeInRight animated">
									<img src="./templates/<?php echo $template; ?>/images/slider-image-01.png">
								</div>
							</div><!-- row -->
						</div><!-- container -->
					</div><!-- slider-content -->
				</li>
			</ul>
		</div><!-- main-slider -->

		<div class="home-module module-white how-works-module">
			<div class="container">
				
				<div class="module-title wow fadeInDown center animated"><h3>How it works</h3></div>

				<div class="module-works">
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-12 wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">
							<div class="icon-image"><img src="./templates/<?php echo $template; ?>/images/puzzle.png"></div>
							<h3><?php echo $loc['index.php']['t08']; ?></h3>
							<p>to the advertiser’s site or landing</p>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp center animated" data-wow-offset="10" data-wow-duration="1.5s">
							<div class="icon-image"><img src="./templates/<?php echo $template; ?>/images/map.png"></div>
							<h3><?php echo $loc['index.php']['t09']; ?></h3>
							<p>of advertiser pays for product or service</p>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12 wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s">
							<div class="icon-image"><img src="./templates/<?php echo $template; ?>/images/savings.png"></div>
							<h3><?php echo $loc['index.php']['t10']; ?></h3>
							<p>Web-Master gets remuneration</p>
						</div>
					</div><!-- row -->
				</div><!-- module-works -->

			</div><!-- container -->
		</div><!-- module-white -->

		<div class="home-module module-blue">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft animated">
						<div class="original-graphic"><img class="graphic-image" src="./templates/<?php echo $template; ?>/images/original-graphic.png"></div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="module-title wow fadeInDown animated"><h3><?php echo $loc['index.php']['t13']; ?></h3><span>Would you like to become part of our team?</span></div>

						<div class="module-advertiser">
							<h3 class="wow fadeInUp animated" data-wow-delay="0s" data-wow-duration="1.5s">START COOPERATION RIGHT NOW</h3>
							<span class="wow fadeInUp animated" data-wow-delay="0.3s" data-wow-duration="1.5s">ADVERTISING NETWORK №1
for online-sales of goods and services</span>
							<ul>
								<li class="wow fadeInRight animated animated" data-wow-delay="0s" data-wow-duration="1.5s"><img src="./templates/<?php echo $template; ?>/images/check.png"> <p><?php echo $loc['index.php']['t14']; ?></p></li>
								<li class="wow fadeInRight animated animated" data-wow-delay="0.1s" data-wow-duration="1.5s"><img src="./templates/<?php echo $template; ?>/images/check.png"> <p><?php echo $loc['index.php']['t15']; ?></p></li>
								<li class="wow fadeInRight animated animated" data-wow-delay="0.2s" data-wow-duration="1.5s"><img src="./templates/<?php echo $template; ?>/images/check.png"> <p><?php echo $loc['index.php']['t16']; ?></p></li>
							</ul>
						</div><!-- module-advertiser -->
						<div class="module-adv-button wow fadeInUp animated animated">

							<a href="./registration.php" class="menu__link">
								<span class="img-icon-menu6"></span>
								REGISTRATION
							</a>

						</div><!-- module-adv-button -->
					</div>
				</div><!-- row -->
			</div><!-- container -->
		</div><!-- home-module -->

	</main>

	<?php
	// Выводим форму логина
	// Display the login form
	include './templates/'.$template.'/blocks/login_form.php';
	?>

	<script src="./templates/<?php echo $template; ?>/js/scripts.js"></script>