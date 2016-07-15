

	<main>
		
		<div class="page-title">
			<div class="container">
				<h1>LOG IN</h1>
				<span>We are a group of talented like-minded people, who are in love with stunning ads, <br>quality traffic and multi-aspect visual analytics.</span>
			</div><!-- container -->
		</div><!-- page-title -->

		<div class="panel-main-form">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<h2>LOG IN</h2>
						<div class="login-form">
							<form name="login_form" class="popup__form" action="./" method="post">
								<input type="mail" class="form-control" placeholder="<?php echo $loc['auth']['t02']; ?>">
								<input type="password" class="form-control" placeholder="<?php echo $loc['auth']['t03']; ?>">
								<button type="submit" class="btn"><?php echo $loc['auth']['t06']; ?></button>
							</form>
							<a href="./recover.php"><?php echo $loc['auth']['t04']; ?></a>
						</div>
					</div>
					<div class="col-sm-8 col-xs-12 border-lef">
						<h2>REGISTER NEW ACCOUNT</h2>
						<div class="signup-form">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<input type="text" class="form-control" placeholder="User Name">
								</div>
								<div class="col-sm-6 col-xs-12">
									<input type="mail" class="form-control" placeholder="E-Mail">
								</div>
								<div class="col-sm-6 col-xs-12">
									<input type="password" class="form-control" placeholder="Password">
								</div>
								<div class="col-sm-6 col-xs-12">
									<input type="password" class="form-control" placeholder="Password Again">
								</div>
								<div class="col-sm-12 col-xs-12">
									<input type="text" class="form-control" placeholder="Skype">
								</div>
								<div class="col-sm-12 col-xs-12">
									<textarea class="form-control" placeholder="About yourself"></textarea>
								</div>
								<div class="col-sm-6 col-xs-12">
									<button type="submit" class="btn">SUBMIT AN APPLICATION</button>
								</div>
							</div><!-- row -->
						</div><!-- signup-form -->
					</div>
				</div><!-- row -->
			</div><!-- container -->
		</div><!-- panel-main-form -->

	</main>
