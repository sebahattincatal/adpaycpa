
	<main>
		
		<div class="page-title">
			<div class="container">
				<h1>REGISTER</h1>
				<span>CPA network Cpain presents: How to make 2000$ from 200$ ? <br>Using our scheme - EASILY!</span>
			</div><!-- container -->
		</div><!-- page-title -->

		<div class="panel-main-form centering-form">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-8 col-xs-12 border-lef">
						<h2>REGISTER NEW ACCOUNT</h2>
						<div class="signup-form">
							<div class="row">

								<form name="registration_form" class="grab__form" method="post">

									<div class="col-sm-6 col-xs-12">
										<input type="text" class="form-control" placeholder="User Name">
									</div>
									<div class="col-sm-6 col-xs-12">
										<input type="text" class="form-control" name="registration_email" placeholder="<?php echo $loc['reg']['t02']; ?>">
									</div>
									<div class="col-sm-6 col-xs-12">
										<input type="password" class="form-control" name="registration_password_1" id="registration_password_1" placeholder="<?php echo $loc['reg']['t03']; ?>">
									</div>
									<div class="col-sm-6 col-xs-12">
										<input type="password" class="form-control" name="registration_password_2" placeholder="<?php echo $loc['reg']['t04']; ?>">
									</div>
									<div class="col-sm-12 col-xs-12">
										<input type="text" class="form-control" placeholder="Skype">
									</div>
									<div class="col-sm-12 col-xs-12">
										<textarea class="form-control" placeholder="About yourself"></textarea>
									</div>
									<div class="col-sm-12 col-xs-12">
										<button type="submit" class="btn"><?php echo $loc['reg']['t10']; ?></button>
									</div>

									<?php
									// Если в GET-запросе был передан ID рефовода, то добавляем в форму скрытое поле с этим значением
									// If the GET-request was handed partner ID, then add in the form of a hidden field with the same value
									if (isset($_GET['ref']))
										{
										$refovod=htmlentities((int)$_GET['ref']);
										echo '<input type="hidden" name="refovod" value="'.$refovod.'">';
										}
									?>

								</form>
							</div><!-- row -->
						</div><!-- signup-form -->
					</div>
				</div><!-- row -->
			</div><!-- container -->
		</div><!-- panel-main-form -->

	</main>
