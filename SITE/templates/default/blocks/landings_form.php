
	<?php
	include ('./templates/'.$template.'/checkform/jquery.proverka.landings.form.php');
	?>

	<aside class="widget">
		<div class="widget-header">
			<div class="row">
				<div class="widget-title col-sm-6 col-xs-12">
					<h3>Landing Pages and Web Sites</h3>
					<span>Landing adding</span>
				</div><!-- widget-title -->
			</div><!-- row -->
		</div><!-- widget-header -->

		<div class="widget-content">
			<div class="row">

				<div class="col-sm-12 col-xs-12">

					<form name="landings_form" method="post" action="./landings.php?<?php echo @$_SERVER['QUERY_STRING']?>" class="report finance-form landing-form">
						<div class="row">

							<div class="form-item col-sm-6 col-xs-12">
								<label><?php echo $loc['landings.php']['t12']; ?></label>
								<input type="text" class="form-control marginBottom10" name="name" value="" maxlength="90" required />

								<label>http://&nbsp;<?php echo $loc['landings.php']['t14']; ?>&nbsp;https://&nbsp;</label>
								<input type="text" class="form-control marginBottom10" name="url" value="" maxlength="250" required />

								<label><?php echo $loc['landings.php']['t15']; ?></label>
								<select name="offer_id" aria-invalid="false" class="form-control valid">
									<?php
									if ($user_tip=='70')
										{
										$sql_offer = "SELECT id,name FROM offers ORDER BY id DESC";								
										}
									else
										{	
										// Рекламодатель может выбирать из списка только свои офферы находящиеся на модерации
										// An advertiser can select from a list of only your offery are moderated
										$sql_offer = "SELECT id,name FROM offers WHERE `owner_id`='$user_id' AND `active`!='1' ORDER BY id DESC";								
										}
									$result_offer = $mysqli->query($sql_offer);
									if (mysqli_num_rows($result_offer) > 0) 
										{
										while($res_offer=mysqli_fetch_array($result_offer)) 
											{
											$of_id=htmlentities($res_offer['id']);
											$of_name=htmlentities($res_offer['name']);
											?> 
											<option class="options" value="<?php echo $of_id; ?>"><?php echo html_entity_decode($of_name, ENT_QUOTES, 'utf-8'); ?></option>
											<?php
											}
										}
									?>
								</select>

								<div style="width:100%; margin-top:30px;">
									<button name="submit_addlanding" value="<?php echo $loc['button']['t01']; ?>" class="btn others_button_sohranit" type="submit">Continue</button>
								</div>
							</div><!-- form-item -->

							<div class="form-item alert col-sm-6 col-xs-12">
								
							</div><!-- form-item -->

						</div><!-- row -->
					</form><!-- finance-form -->

				</div>