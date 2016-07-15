
	<main>
		
		<div class="page-title">
			<div class="container">
				<h1><?php echo $loc['system_offers.php']['t01']; ?></h1>
			</div><!-- container -->
		</div><!-- page-title -->

		<div class="page-module">
			<div class="container">
				<div class="page-module-title text-center">
					<h2><?php echo $loc['system_offers.php']['t02']; ?></h2>
				</div><!-- page-module-title -->

				<div class="module-content">
					<div class="offers-content">
						<div class="offers-list-content">

							<?php
							$sql_ok = "SELECT id,name,deystvie,cena,comission,tip_comission,geo,category FROM offers WHERE `active`='1' ORDER BY `id` DESC";
							$result_ok = $mysqli->query($sql_ok);
							$cvet=0;
							if (mysqli_num_rows($result_ok) > 0) 
								{
								while($res_ok=mysqli_fetch_array($result_ok)) 
									{
							?>
								<ul>
									<li>
										<div class="row">
											<div class="col-sm-10 col-xs-12">
												
												<?php
												$offer_id=htmlentities($res_ok['id']);
												$name=htmlentities($res_ok['name']);
												$id_deystvie=htmlentities($res_ok['deystvie']);
												$cena=htmlentities($res_ok['cena']);
												$comission=htmlentities($res_ok['comission']);
												$tip_comission=htmlentities($res_ok['tip_comission']);
												$geo=htmlentities($res_ok['geo']);
												
												// Получаем категорию оффера
												// Get the offer category
												$offer_category=htmlentities($res_ok['category']);		
												$sql_category = "SELECT name FROM category_tpl WHERE `id`='$offer_category'";
												$result_category = $mysqli->query($sql_category);
												$res_category=mysqli_fetch_array($result_category);
												$offer_category_name=htmlentities($res_category['name']);

												$sql_d = "SELECT deystvie FROM deystvie_tpl WHERE `id`='$id_deystvie'";
												$result_d = $mysqli->query($sql_d);
												$res_d=mysqli_fetch_array($result_d);
												$deystvie_name=htmlentities($res_d['deystvie']);
											
												if (file_exists('./tmp/offer'.$offer_id.'.jpg')) 
													{
													?>
														<img src="./tmp/offer<?php echo $offer_id; ?>.jpg">
													<?php
													}
												else
													{
													?>
													<a class="open-popup" style="border: 0; text-decoration: none;" href="#"><div style="float: left; width: 100px; height: 100px; margin: 10px 10px 10px 10px; padding: 0; border: 1px solid gray; text-decoration: none;"></div></a>
													<?php
													}							
												?>

												<div class="offer-detail">
													<div class="offer-name"><a href="order-detail.html"><?php echo html_entity_decode($name, ENT_QUOTES, 'utf-8'); ?></a></div>
													<div class="offer-balance"><?php echo $loc['system_offers.php']['t05']; ?> - <span>Confirmed order</span>  </div>
													<div class="fix-off"><span><?php echo $loc['system_offers.php']['t09']; ?></span><?php echo $offer_category_name; ?></div>
													<div class="fix-off"><span><?php echo $loc['system_offers.php']['t10']; ?> </span>

														<?php
														list($offer_country_iso1, $offer_region_id1, $offer_city_id1) = explode('|', trim($geo, '|'));
														$sql_geo = "SELECT name_ru FROM sxgeo_country WHERE `iso`='$offer_country_iso1'";
														$result_geo = $mysqli->query($sql_geo);
														if (mysqli_num_rows($result_geo) > 0) 
															{
															$res_geo=mysqli_fetch_array($result_geo);
															$geo_country=htmlentities($res_geo['name_ru']);
															}
														else
															{
															$geo_country=$loc['system_offers.php']['t11'];
															}
														echo $geo_country;
														?>

													</div>
												</div><!-- offer-detail -->
											</div>
											<div class="col-sm-2 col-xs-12">
												<div class="order-confirm text-center">
													<div class="total-price">
														
														<?php 
														if (isset($comission)) 
															{
															if (isset($tip_comission) && $tip_comission=='1') 
																{
																echo $comission.'&nbsp;'.$loc['system_offers.php']['t06'].'&nbsp;';
																}
															if (isset($tip_comission) && $tip_comission=='2')
																{
																echo $comission.'&nbsp;'.$loc['system_offers.php']['t07'].'&nbsp;';
																}		
															} 
														else 
															{
															echo $loc['system_offers.php']['t08'];
															} 
														?>

													</div>
													<span>Order Confirmation</span>
												</div><!-- order-confirm -->
											</div>
										</div><!-- row -->
									</li>
								</ul>
									<?php
									}
								}
							?>
							</div>
						</div>
				</div><!-- module-content -->

			</div><!-- container -->
		</div><!-- page-module -->

		<div class="page-module module-blue">
			
			<div class="container">
				<div class="page-module-title text-center color-white margin-bottom-cs">
					<h2>WHY IT’S WORTH TO WORK WITH US?</h2>
					<span>1 DAY HOLD FOR OFFERS</span>
					<p>Online-payment is connected for some offers, web-masters won’t have to wait long untill
earned funds will be transferred from hold to your balance. Thanks to our partner (Yandex.Kassa) we
can provide 1 day hold for offers with online-payment to all web-masters.</p>
<span>WITHDRAWALS CAN BE RECEIVED ANY DAY</span>
<p>We have technical capability to make payments at any time. If you have on balance
		the minimum withdrawal sum, you can order withdrawal and receive funds the same day.
		We are trying to do everything to make your cooperation with us even more comfortable.</p>
				</div><!-- page-module-title -->
			</div><!-- container -->

		</div><!-- page-module -->

	</main>

























	<?php
	// Выводим форму логина
	// Display the login form
	include './templates/'.$template.'/blocks/login_form.php';
	?>

	<script src="./templates/<?php echo $template; ?>/js/scripts.js"></script>
	
	