<?php
// Вывод списка всех офферов
// Display a list of all offers

function build_pagination_url( $page ) 
	{
	$parameters = array(
	'sort_id' =>  ( isset($_GET['sort_id']) ) ? $_GET['sort_id'] : '',
	'sort_cena' =>  ( isset($_GET['sort_cena']) ) ? $_GET['sort_cena'] : '',
	'sort_comission' =>  ( isset($_GET['sort_comission']) ) ? $_GET['sort_comission'] : '',
	'sort_status' =>  ( isset($_GET['sort_status']) ) ? $_GET['sort_status'] : '',
	'page' => $page
	);
	return '?' . http_build_query( $parameters );
	}
$result = $mysqli->query( "SELECT COUNT(id) AS count FROM `offers` WHERE `owner_id`='$user_id'" );
?>

<div>
	<?php
	// Вывод количества страниц
	// Display the number of pages
	pagination($result,20,11);
	?>
</div>
			
			<aside class="widget">
				<div class="widget-header">
					<div class="row">
						<div class="widget-title col-sm-6 col-xs-12">
							<h3>Offers</h3>
							<span>THE LIST OF OFFERS</span>
						</div><!-- widget-title -->
					</div><!-- row -->
				</div><!-- widget-header -->

				<div class="widget-content">
					<div class="row">
						<div class="offers-content">
							<div class="offers-list-header">
								<div class="col-sm-5 col-xs-12 text-center"><span><?php echo $loc['offers.php']['t03']; ?></span></div>
								<div class="col-sm-2 col-xs-12 text-left"><span><?php echo $loc['offers.php']['t04']; ?></span></div>
								<div class="col-sm-2 col-xs-12 text-center"><span><a href="offers.php?sort_cena=ok" class="normal_link"><?php echo $loc['offers.php']['t156']; ?></a></span></div>
								<div class="col-sm-1 col-xs-12 text-right"><span><a href="offers.php?sort_comission=ok" class="normal_link"><?php echo $loc['offers.php']['t157']; ?></a></span></div>
								<div class="col-sm-1 col-xs-12 text-center"><span class="paddingLeft15"><?php echo $loc['offers.php']['t158']; ?></span></div>
								<div class="col-sm-1 col-xs-12 text-center"><span class="paddingLeft15"><a href="offers.php?sort_status=ok" class="normal_link"><?php echo $loc['offers.php']['t159']; ?></a></span></div>
							</div><!-- offers-list-header -->

							<?php
								if (isset($_GET['sort_status']) && $_GET['sort_status']=='ok') 
									{
									if (isset($offset) && isset($show_pages))
										{
										$sql = "SELECT * FROM offers WHERE `owner_id`='$user_id' ORDER BY `active` DESC LIMIT $offset, $show_pages";
										}
									else
										{
										$sql = "SELECT * FROM offers WHERE `owner_id`='$user_id' ORDER BY `active` DESC";
										}
									}
								elseif (isset($_GET['sort_comission']) && $_GET['sort_comission']=='ok') 
									{
									if (isset($offset) && isset($show_pages))
										{
										$sql = "SELECT * FROM offers WHERE `owner_id`='$user_id' ORDER BY `comission` DESC LIMIT $offset, $show_pages";
										}
									else
										{
										$sql = "SELECT * FROM offers WHERE `owner_id`='$user_id' ORDER BY `comission` DESC";
										}
									}
								elseif (isset($_GET['sort_cena']) && $_GET['sort_cena']=='ok') 
									{
									if (isset($offset) && isset($show_pages))
										{
										$sql = "SELECT * FROM offers WHERE `owner_id`='$user_id' ORDER BY `cena` DESC LIMIT $offset, $show_pages";
										}
									else
										{
										$sql = "SELECT * FROM offers WHERE `owner_id`='$user_id' ORDER BY `cena` DESC";
										}
									}
								elseif (isset($_GET['sort_id']) && $_GET['sort_id']=='ok') 
									{
									if (isset($offset) && isset($show_pages))
										{
										$sql = "SELECT * FROM offers WHERE `owner_id`='$user_id' ORDER BY `id` DESC LIMIT $offset, $show_pages";
										}
									else
										{
										$sql = "SELECT * FROM offers WHERE `owner_id`='$user_id' ORDER BY `id` DESC";
										}
									}
								else
									{
									if (isset($offset) && isset($show_pages))
										{
										$sql = "SELECT * FROM offers WHERE `owner_id`='$user_id' ORDER BY `id` DESC LIMIT $offset, $show_pages";
										}
									else
										{
										$sql = "SELECT * FROM offers WHERE `owner_id`='$user_id' ORDER BY `id` DESC";
										}
									}

								$result = $mysqli->query($sql);
								$cvet=0;
								if (mysqli_num_rows($result) > 0) 
									{
									while($res=mysqli_fetch_array($result)) 
										{ 
										// Получаем ID оффера
										// Get the ID offer
										$offer_id=htmlentities($res['id']);
										// Получаем название оффера
										// Get the name of the offer
										$offer_name=htmlentities($res['name']);	
										// Узнаем категорию оффера
										// Learn category offer
										$offer_category=htmlentities($res['category']);		
										$sql_category = "SELECT name FROM category_tpl WHERE `id`='$offer_category'";
										$result_category = $mysqli->query($sql_category);
										$res_category=mysqli_fetch_array($result_category);
										$offer_category_name=htmlentities($res_category['name']);			
										// Получаем ГЕО оффера
										// Get GEO offer
										$offer_geo=htmlentities($res['geo']);		
										// Получаем цену на оффере
										// Get the price of the offer
										$offer_cena=htmlentities($res['cena']);
										// Получаем комиссию вебмастеру на оффере
										// Get the commission webmaster to offer
										$offer_comission=htmlentities($res['comission']);
										// Получаем комиссию CPA-сети на оффере
										// Get the CPA-network comission on offer
										$offer_comission_cpa=htmlentities($res['comission_cpa']);
										// Получаем тип комиссии
										// Get the type of commission
										$offer_tip_comission=htmlentities($res['tip_comission']);
										// Получаем информацию о активности оффера
										// Get information about offer activity
										$offer_active=htmlentities($res['active']);
										// Переводим переменную ГЕО в удобочитаемый вид
										// Translate variable GEO readable view
										$offer_geo=htmlentities($res['geo']);	
										list($offer_country_iso1, $offer_region_id1, $offer_city_id1) = explode('|', trim($offer_geo, '|'));
										
										$sql_geo = "SELECT name_ru FROM sxgeo_country WHERE `iso`='$offer_country_iso1'";
										$result_geo = $mysqli->query($sql_geo);
										if (mysqli_num_rows($result_geo) > 0) 
											{
											$res_geo=mysqli_fetch_array($result_geo);
											$geo_country=htmlentities($res_geo['name_ru']);
											}
										else
											{
											$geo_country=$loc['offers.php']['t09'];
											}
											
										$sql_geo = "SELECT name_ru FROM sxgeo_regions WHERE `id`='$offer_region_id1'";
										$result_geo = $mysqli->query($sql_geo);
										if (mysqli_num_rows($result_geo) > 0) 
											{
											$res_geo=mysqli_fetch_array($result_geo);
											$geo_region=htmlentities($res_geo['name_ru']);
											}
										else
											{
											$geo_region=$loc['offers.php']['t09'];
											}
										$sql_geo = "SELECT name_ru FROM sxgeo_cities WHERE `id`='$offer_city_id1'";
										$result_geo = $mysqli->query($sql_geo);
										if (mysqli_num_rows($result_geo) > 0) 
											{
											$res_geo=mysqli_fetch_array($result_geo);
											$geo_city=htmlentities($res_geo['name_ru']);
											}
										else
											{
											$geo_city=$loc['offers.php']['t09'];
											}
										$offer_geo='<b>'.$loc['offers.php']['t10'].'</b>&nbsp;'.$geo_country.'<br /><b>'.$loc['offers.php']['t11'].'</b>&nbsp;'.$geo_region.'<br /><b>'.$loc['offers.php']['t12'].'</b>&nbsp;'.$geo_city.'';
										
											
										// определяем по ID действия, что это за действие
										// Define the ID for action, what kind of action
										$o_deystvie=htmlentities($res['deystvie']);
										$o_sql = "SELECT deystvie FROM deystvie_tpl WHERE `id`='$o_deystvie'";
										$o_result = $mysqli->query($o_sql);
										$o_res=mysqli_fetch_array($o_result);
										
										// Получаем название действия
										// Get the name of the action
										$o_deystvie=htmlentities($o_res['deystvie']);
									?>


							<div class="offers-list-content">
								<ul>
									<li>
										<div class="row">
											<div class="col-sm-5 col-xs-12">
												<?php
												// Проверка, назначено ли промо для оффера.
												// Check if the promo is scheduled to offer.
												if (file_exists('./tmp/offer'.$offer_id.'.jpg')) 
													{
													?>
													<a style="border: 0; text-decoration: none;" href="./offers.php?offer=<?php echo $offer_id; ?>">
														<img class="cropimage_spisok" src="./tmp/offer<?php echo $offer_id; ?>.jpg">
													</a>
													<?php
													}
												else
													{
													?>
													<a style="border: 0; text-decoration: none;" href="./offers.php?offer=<?php echo $offer_id; ?>">
														<div class="cropimage_spisok"></div>
													</a>
													<?php
													}							
												?>
												<div style="text-align: left; margin-top: 8px; line-height: 21px;">
													<a href="./offers.php?offer=<?php echo $offer_id; ?>"><b><?php echo html_entity_decode($offer_name, ENT_QUOTES, 'utf-8'); ?></b></a><br /><nobr><font style="color: gray; font-weight: bold;"><?php echo $o_deystvie.' / '.$offer_category_name; ?></font></nobr><br />
													<br />
													<?php
													if ($offer_active=="2") {?><span style="background: yellow; color: red;">&nbsp;<?php echo $loc['offers.php']['t160']; ?>&nbsp;</span><?} 
													if ($offer_active=="1") {?><span style="background: green; color: white;">&nbsp;<?php echo $loc['offers.php']['t161']; ?>&nbsp;</span><?} 
													if ($offer_active=="0") {?><span style="background: red; color: white;">&nbsp;<?php echo $loc['offers.php']['t162']; ?>&nbsp;</span><?}
													
													// Определеляем CR и EPC оффера
													// Determine the CR and EPC offer
													$result_z1 = $mysqli->query("SELECT COUNT(id) AS kolvo_zakaz_success FROM `zakaz` WHERE `offer_id`='$offer_id' AND `status`='3'");
													$row_z1 = mysqli_fetch_assoc($result_z1);
													$result_z2 = $mysqli->query("SELECT SUM(comission) AS vyplachennaya_summa FROM `zakaz` WHERE `offer_id`='$offer_id' AND `status`='3'");
													$row_z2 = mysqli_fetch_assoc($result_z2);
													$result_z3 = $mysqli->query("SELECT COUNT(id) AS hostov_po_offeru FROM `clients_log` WHERE `offer_id`='$offer_id' AND `user_id`!='0'");
													$row_z3 = mysqli_fetch_assoc($result_z3);
													if($row_z3['hostov_po_offeru']!='0') {$cr_view=$row_z1['kolvo_zakaz_success']/$row_z3['hostov_po_offeru']*100;} else {$cr_view='0';}
													if($row_z3['hostov_po_offeru']!='0') {$epc_view=$row_z2['vyplachennaya_summa']/$row_z3['hostov_po_offeru'];} else {$epc_view='0';}
													
													?>
													<b><?php echo $loc['offers.php']['t163']; ?>&nbsp;</b><?php if (round($cr_view,2)=='0') {echo $loc['offers.php']['t19'];} else {echo round($cr_view,2);} ?>,&nbsp;<b><?php echo $loc['offers.php']['t164']; ?>&nbsp;</b><?php if (round($epc_view,2)=='0') {echo $loc['offers.php']['t19'];} else {echo round($epc_view,2);} ?>
												</div>
											</div>
											<div class="col-sm-2 col-xs-12">
												<?php
													echo $offer_geo;
												?>
											</div>
											<div class="col-sm-2 col-xs-12">
												<div class="order-confirm text-center">
													<?php if (isset($offer_cena) && $offer_cena!='0') {echo $offer_cena.'&nbsp;'.$loc['offers.php']['t17'].'&nbsp;';} else {?>&nbsp;<?php echo $loc['offers.php']['t29']; ?>&nbsp;<?php } ?>
												</div><!-- order-confirm -->
											</div>
											<div class="col-sm-1 col-xs-12">
												<?php 
												if (isset($offer_comission) && isset($offer_comission_cpa)) 
													{
													if (isset($offer_tip_comission) && ($offer_tip_comission)=='1') 
														{
														echo $offer_comission+$offer_comission_cpa.'&nbsp;'.$loc['offers.php']['t17'].'&nbsp;';
														}
													if (isset($offer_tip_comission) && ($offer_tip_comission)=='2') 
														{
														echo $offer_comission+$offer_comission_cpa.'&nbsp;'.$loc['offers.php']['t18'].'&nbsp;';
														}		
													} 
												else 
													{
													echo $loc['offers.php']['t47'];
													} 
												?>
											</div>
											<div class="col-sm-1 col-xs-12">
												<div class="offer-epc">
													<?php
														$uroven_dostupa=htmlentities($res['uroven_dostupa']);
														$sql_ur_v = "SELECT tip_account, uroven_dostupa, opisanie FROM uroven_tpl WHERE `uroven_dostupa`='$uroven_dostupa' AND `tip_account`='10'";
														$result_ur_v = $mysqli->query($sql_ur_v);
														$res_ur_v=mysqli_fetch_array($result_ur_v);	
														echo htmlentities($res_ur_v['opisanie']);
													?>
												</div>
											</div>
											<div class="col-sm-1 col-xs-12 text-center">
												<?php
												if ($offer_active=="2") {?><div class="order-status green"><i class="fa fa-check"></i></div><?} 
												if ($offer_active=="1") {?><div class="order-status green"><i class="fa fa-check"></i></div><?} 
												if ($offer_active=="0") {?><div class="order-status green"><i class="fa fa-close"></i></div><?}
												?>
											</div>
										</div><!-- row -->
									</li>
								</ul>
							</div><!-- row -->
						</div><!-- offers-content -->
					</div><!-- row -->
				</div><!-- widget-content -->
			</aside><!-- widget -->
			<?php
			}
		}
	?>  

<div>
	<?php
	// Вывод количества страниц
	// Display the number of pages
	pagination($pagination_fetched_row,20,11);
	?>
</div>