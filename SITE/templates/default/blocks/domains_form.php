
	<?php
	include ('./templates/'.$template.'/checkform/jquery.proverka.domains.form.php');
	?>

	<aside class="widget">
		<div class="widget-header">
			<div class="row">
				<div class="widget-title col-sm-6 col-xs-12">
					<h3>Add the domain (example: domain.ru)</h3>
					<span>ADPAY SUPPORT</span>
				</div><!-- widget-title -->
			</div><!-- row -->
		</div><!-- widget-header -->

		<div class="widget-content">
			<div class="row">
				
				<div class="col-sm-12 col-xs-12">

					<form name="domains_form" class="report finance-form" method="post" action="domains.php?<?php echo @$_SERVER['QUERY_STRING']?>">
						<div class="row">

							<div class="form-item col-sm-6 col-xs-12">
								<label><?php echo $loc['domains.php']['t19']; ?></label>
								<input type="text" class="form-control" name="domain" class="search_pole" value="" maxlength="30" required />
								<div style="width:100%; margin-top:30px;">
									<button name="submit_adddomain" value="<?php echo $loc['button']['t01']; ?>" class="btn others_button_sohranit" type="submit">Continue</button>
								</div>
							</div><!-- form-item -->

							<div class="form-item alert col-sm-6 col-xs-12">
								
							</div><!-- form-item -->

						</div><!-- row -->
					</form><!-- finance-form -->

				</div>