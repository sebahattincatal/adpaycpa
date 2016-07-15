
	<main>
		
		<div class="page-title">
			<div class="container">
				<h1><?php echo $loc['contacts.php']['t01']; ?></h1>
				<span><?php echo $loc['contacts.php']['t02']; ?> <br><?php echo $loc['contacts.php']['t03']; ?></span>
			</div><!-- container -->
		</div><!-- page-title -->
		
		<div class="adget-map">
			<div id="map_addresses" class="map"><p>This will be replaced with the Google Map.</p></div>
		</div><!-- Cpain-map -->

		<div class="contact-info">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<h3>CREDENTIALS</h3>
						<span>Postal address</span>
						<p>Control Access LP 
							No. SL17120 
							SUITE 2,5ST VINCENT STREET 
							EDINBURGH, EH3 6SW 
							SCOTLAND, UK
						</p>
						<span>Skype support</span>
						<p>
							
							<?php
							if (isset($settings_skype) && $settings_skype!='') 
							{echo $loc['contacts.php']['t07'].'&nbsp;<a href="skype:'.$settings_skype.'?add">'.$settings_skype.'</a><br />';}
							?>

						</p>

						<span>E-Mail support</span>
						<p>
							<?php
							if (isset($settings_email) && $settings_email!='') 
									{echo '<p><b>'.$loc['contacts.php']['t04'].'</b><br /><a href="mailto:'.$settings_email.'">'.$settings_email.'</a></p>';}
							?>
						</p>

						<span>Business Hours</span>
						<p>24-hour support</p>
					</div>
					<div class="col-sm-8 col-xs-12">
						<h3>FEEDBACK</h3>
						<form class="contact-form">
							<div class="row">
								<div class="col-sm-6 col-xs-12"><input class="form-control" type="text" placeholder="Your Name"></div>
								<div class="col-sm-6 col-xs-12"><input class="form-control" type="mail" placeholder="Your Email"></div>
								<div class="col-sm-12 col-xs-12">
									<select class="form-control">
										<option value="0" selected="selected" disabled="disabled">Buraya ne gelcek</option>
										<option value="0">Advertiser Inquiry</option>
										<option value="0">Publisher Inquiry</option>
										<option value="0">Technical Issue</option>
										<option value="0">Other</option>
									</select>
								</div>
								<div class="col-sm-12 col-xs-12"><input class="form-control" type="text" placeholder="Your Subject"></div>
								<div class="col-sm-12 col-xs-12"><textarea class="form-control" placeholder="Message"></textarea></div>
								<div class="col-sm-4 col-xs-12"><button type="submit" class="btn">Submit Form</button></div>
							</div><!-- row -->
						</form>
					</div>
				</div><!-- row -->
			</div><!-- container -->
		</div><!-- contact-info -->

	</main>

	<script src="./templates/<?php echo $template; ?>/js/scripts.js"></script>