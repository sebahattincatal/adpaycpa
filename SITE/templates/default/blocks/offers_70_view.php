<?php

// Блок с выводом отдельно взятого оффера
// Block with the output of a single offer
$offer_id=htmlentities($_GET['offer']);
$sql = "SELECT * FROM offers WHERE `id`='$offer_id'";
$result = $mysqli->query($sql);
if (mysqli_num_rows($result) > 0) 
	{
	$res=mysqli_fetch_array($result);
	
	// Назначаем переменные
	// Assign variables
	$offer_id=htmlentities($res['id']);
	$offer_tip=htmlentities($res['tip']);
	$offer_active=htmlentities($res['active']);
	$offer_uroven_dostupa=htmlentities($res['uroven_dostupa']);
	$offer_name=htmlentities($res['name']);
	$offer_url=htmlentities($res['url']);
	$offer_category=htmlentities($res['category']);
	$offer_owner_id=htmlentities($res['owner_id']);
	$offer_deystvie=htmlentities($res['deystvie']);
	$offer_cena=htmlentities($res['cena']);
	$offer_comission=htmlentities($res['comission']);
	$offer_tip_comission=htmlentities($res['tip_comission']);
	$offer_comission_cpa=htmlentities($res['comission_cpa']);
	$offer_tip_comission_cpa=htmlentities($res['tip_comission_cpa']);
	$offer_postclick=htmlentities($res['postclick']);
	$offer_timeobrabotka=htmlentities($res['timeobrabotka']);
	$offer_hold=htmlentities($res['hold']);
	$offer_sms_ok=htmlentities($res['sms_ok']);
	$offer_sms_phone=htmlentities($res['sms_phone']);
	$offer_email_ok=htmlentities($res['email_ok']);
	$offer_email_box=htmlentities($res['email_box']);	
	$offer_sms_text_zakaz=htmlentities($res['sms_text_zakaz']);
	$offer_sms_text_send=htmlentities($res['sms_text_send']);
	$offer_sms_text_way=htmlentities($res['sms_text_way']);
	$offer_sms_text_success=htmlentities($res['sms_text_success']);	
	$offer_allow_success_status_zakaz=htmlentities($res['allow_success_status_zakaz']);	
	$offer_off_balance=htmlentities($res['off_balance']);	
	
	// Переводим переменную отвечающую за тип принимаемого трафика в удобный вид
	// Translate variable responsible for the type of traffic received in convenient form
	$offer_tip_traffic=htmlentities($res['tip_traffic']);
	list($tip_traffic1, $tip_traffic2, $tip_traffic3, $tip_traffic4, $tip_traffic5, $tip_traffic6, $tip_traffic7, $tip_traffic8, $tip_traffic9, $tip_traffic10, $tip_traffic11, $tip_traffic12, $tip_traffic13, $tip_traffic14, $tip_traffic15, $tip_traffic16) = explode('|', trim($offer_tip_traffic, '|'));	

	// Переводим переменную ГЕО в удобный вид
	// Translate variable GEO convenient form
	$offer_geo=htmlentities($res['geo']);	
	list($offer_country_iso1, $offer_region_id1, $offer_city_id1) = explode('|', trim($offer_geo, '|'));
	?>
			
			<aside class="widget">
				<div class="widget-header">
					<div class="row">
						<div class="widget-title col-sm-6 col-xs-12">
							<h3>Offer "Earrings Mise en Dior"</h3>
							<span>ADPAY Offery Detail</span>
						</div><!-- widget-title -->
					</div><!-- row -->
				</div><!-- widget-header -->

				<div class="widget-content">
					<div class="row">
						<form form name="moderate_offer" id="moderate_offer" method="post" action="./offers.php?<?php echo @$_SERVER['QUERY_STRING']?>" class="order-detail-form">
						<label class="order-name">
							<span><?php echo $loc['offers.php']['t03']; ?></span>
							<input type="text" name="name" placeholder="<?php echo $loc['offers.php']['t151']; ?>" required style="width: 350px; text-align: center;" maxlength="90" value="<?php echo html_entity_decode($offer_name, ENT_QUOTES, 'utf-8'); ?>">
						</label>
						<div class="page-offer-status green"><i class="fa fa-check"></i>
							<?php
							if ($offer_active=='0') {?><td style="background: red; color: white;"><?php echo $loc['offers.php']['t168']; ?>&nbsp;<a onclick="if (!confirm('<?php echo $loc['offers.php']['t171']; ?>'))return false;" href="./offers.php?on=<?php echo $offer_id; ?>"><?php echo $loc['offers.php']['t174']; ?></a>&nbsp;<?php echo $loc['offers.php']['t176']; ?>&nbsp;<a href="./offers.php?delete=<?php echo $offer_id; ?>" onclick="if (!confirm('Вы действительно желаете удалить этот оффер?'))return false;"><?php echo $loc['offers.php']['t177']; ?></a>.</td><?}
							if ($offer_active=='1') {?><td style="background: green; color: white;"><?php echo $loc['offers.php']['t169']; ?>&nbsp;<a onclick="if (!confirm('<?php echo $loc['offers.php']['t172']; ?>'))return false;" href="./offers.php?off=<?php echo $offer_id; ?>"><?php echo $loc['offers.php']['t175']; ?></a>&nbsp;<?php echo $loc['offers.php']['t176']; ?>&nbsp;<a href="./offers.php?delete=<?php echo $offer_id; ?>" onclick="if (!confirm('Вы действительно желаете удалить этот оффер?'))return false;"><?php echo $loc['offers.php']['t177']; ?></a>.</td><?}
							if ($offer_active=='2') {?><td style="background: yellow; color: red;"><?php echo $loc['offers.php']['t170']; ?>&nbsp;<a onclick="if (!confirm('<?php echo $loc['offers.php']['t173']; ?>'))return false;" href="./offers.php?on=<?php echo $offer_id; ?>"><?php echo $loc['offers.php']['t174']; ?></a>,&nbsp;<a onclick="if (!confirm('<?php echo $loc['offers.php']['t172']; ?>'))return false;" href="./offers.php?off=<?php echo $offer_id; ?>"><?php echo $loc['offers.php']['t175']; ?></a>&nbsp;<?php echo $loc['offers.php']['t176']; ?>&nbsp;<a href="./offers.php?delete=<?php echo $offer_id; ?>" onclick="if (!confirm('<?php echo $loc['offers.php']['t178']; ?>'))return false;"><?php echo $loc['offers.php']['t177']; ?></a>.</td><?}
							?>
						</div>
						<div class="order-header">
							<div class="row">

								<div class="col-sm-3 col-xs-12">
									<div id="navwrap"><img src="assets/images/offer3.jpg">
									<div class="upload-order-image">
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<span class="btn btn-primary btn-file"><span class="fileupload-new">Select Offer Image</span>
											<span class="fileupload-exists">Change Image</span>         <input type="file" /></span>
											<span class="fileupload-preview"></span>
											<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
										</div>
									</div>
									<div class="name">Earrings Mise en Dior</div></div>
								</div>
								<div class="col-sm-9 col-xs-12">
									<div class="order-name">Earrings Mise en Dior</div>

									<div class="detail-item">
										<p><?php echo $loc['offers.php']['t121']; ?> <?php $_SESSION['offer_id']=$offer_id; ?> ( <a href="#" data-toggle="modal" data-target="#landing">code for landing pages</a> & <a href="#" data-toggle="modal" data-target="#store">code for online-stores</a> )</p>
										<ul>
											<li><span>Landing</span> <a href="http://adpaystat.com/miseendior/?stats=tntnB" target="_blank">LP # 1</a></li>
											<li><span>Link</span> <input type="url" class="form-control" value="http://adpaystat.com/miseendior/"></li>
										</ul>
									</div><!-- detail-item -->

									<div class="detail-item">
										<p><?php echo $loc['offers.php']['t122']; ?></p>
										<ul>
											<li><span><?php echo $loc['offers.php']['t180']; ?></span>
												<select name="category" class="form-control">
													<?php
													$sql_category = "SELECT * FROM category_tpl";
													$result_category = $mysqli->query($sql_category);
													if (mysqli_num_rows($result_category) > 0) 
														{
														while($res_category=mysqli_fetch_array($result_category)) 
															{
															$category_id=htmlentities($res_category['id']);
															$category_name=htmlentities($res_category['name']);
															if ($category_id==$offer_category)
																{
																?>
																<option value="<?php echo $category_id; ?>" selected><?php echo $category_name; ?></option>
																<?php
																}
															else
																{
																?>
																<option value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
																<?php
																}													
															}
														}
													?>
												</select>
											</li>
											<li>
											<span>
												<?php echo $loc['offers.php']['t181']; ?>&nbsp;(<a target="_blank" href="users.php?edit=<?php echo $offer_owner_id; ?>" class="normal_link"><?php echo $loc['offers.php']['t182']; ?></a>,&nbsp;<a target="_blank" href="./tickets.php?komu=<?php echo $offer_owner_id; ?>"><span class="send_ticket"></span></a>):
												<input type="hidden" name="id_owner" value="<?php echo $offer_owner_id; ?>">
											</span> 
												<select name="vladelec" class="form-control">
													<option value="<?php echo $userdata_id; ?>" selected="selected"><?php echo $userdata_email; ?></option>
													<?php
													$sql_rekl = "SELECT * FROM users WHERE `tip`='40' AND `active`='1' AND `uroven_dostupa`='2' ORDER BY `email`";
													$result_rekl = $mysqli->query($sql_rekl);
													if (mysqli_num_rows($result_rekl) > 0) 
														{
														while($res_rekl=mysqli_fetch_array($result_rekl)) 
															{
															$rekl_id=htmlentities($res_rekl['id']);
															$rekl_email=htmlentities($res_rekl['email']);
															if ($rekl_email!=$userdata_email)
																{
																?>
																<option value="<?php echo $rekl_id; ?>"><?php echo $rekl_email; ?></option>
																<?php
																}
															}
														}
													?>
												</select>
											</li>

											<li><span><?php echo $loc['offers.php']['t183']; ?></span> <?php echo $userdata_balance; ?>&nbsp;<?php echo $loc['offers.php']['t17']; ?></li>

											<li><span><?php echo $loc['offers.php']['t28']; ?></span> <div class="small-form">
												<input type="text" class="form-control" name="cena" style="width: 50px; text-align: center;" maxlength="10" value="<?php echo $offer_cena; ?>">&nbsp;<?php echo $loc['offers.php']['t17']; ?>
											</div> rub.</li>

											<li><span><?php echo $loc['offers.php']['t184']; ?></span>
												<div class="small-form-x">
													<input type="text" class="form-control" name="comission_cpa" style="width: 50px; text-align: center;" maxlength="10" value="<?php echo $offer_comission_cpa; ?>" onmouseover="if (document.getElementById('tip_comission').value==1) {document.getElementById('tip_comission_cpa').value=1;} if (document.getElementById('tip_comission').value==2) {document.getElementById('tip_comission_cpa').value=2;}">
												</div>
												<div class="small-form-x">
													<select name="tip_comission_cpa" class="form-control" id="tip_comission_cpa" onmouseover="if (document.getElementById('tip_comission').value==1) {document.getElementById('tip_comission_cpa').value=1;} if (document.getElementById('tip_comission').value==2) {document.getElementById('tip_comission_cpa').value=2;}" onchange="if (document.getElementById('tip_comission_cpa').value==1) {document.getElementById('tip_comission').value=1;} if (document.getElementById('tip_comission_cpa').value==2) {document.getElementById('tip_comission').value=2;}">
														<option value="1" <?php if (isset($offer_tip_comission_cpa) && $offer_tip_comission_cpa=='1') {?>selected="selected"<?php } ?>>&nbsp;<?php echo $loc['offers.php']['t17']; ?>&nbsp;</option>
														<option value="2" <?php if (isset($offer_tip_comission_cpa) && $offer_tip_comission_cpa=='2') {?>selected="selected"<?php } ?>>&nbsp;<?php echo $loc['offers.php']['t18']; ?>&nbsp;</option>
													</select>
												</div>
											</li>

											<li><span><?php echo $loc['offers.php']['t30']; ?></span>
												<select name="uroven_dostupa" class="form-control">
													<?php
													$sql_checkdostup = "SELECT tip_account, uroven_dostupa, opisanie FROM uroven_tpl WHERE `tip_account`='10'";
													$result_checkdostup = $mysqli->query($sql_checkdostup);
													if (mysqli_num_rows($result_checkdostup) > 0) 
														{
														while($res_checkdostup=mysqli_fetch_array($result_checkdostup))
															{
															$checkdostup_uroven_dostupa=htmlentities($res_checkdostup['uroven_dostupa']);
															$checkdostup_opisanie=htmlentities($res_checkdostup['opisanie']);
															?>
															<option value="<?php echo $checkdostup_uroven_dostupa; ?>" 
															<?php
															$res_checkdostup2 = "SELECT tip_account, uroven_dostupa, opisanie FROM uroven_tpl WHERE `uroven_dostupa`='$offer_uroven_dostupa' AND `tip_account`='10'";
															$result_checkdostup2 = $mysqli->query($res_checkdostup2);
															$res_checkdostup2=mysqli_fetch_array($result_checkdostup2);
															$checkdostup_uroven_dostupa2=htmlentities($res_checkdostup2['uroven_dostupa']);
															if ($checkdostup_uroven_dostupa==$checkdostup_uroven_dostupa2) {echo 'selected="selected"';}
															?>><?php echo $checkdostup_opisanie; ?></option>
															<?php
															}
														}
													?>		
												</select>
											</li>

											<li><span><?php echo $loc['offers.php']['t185']; ?></span>
												<select name="allow_success_status_zakaz" class="form-control">
													<option value="0" <?php if ($offer_allow_success_status_zakaz=='0') {?>selected="selected"<?php } ?>>&nbsp;<?php echo $loc['offers.php']['t186']; ?>&nbsp;</option>
													<option value="1" <?php if ($offer_allow_success_status_zakaz=='1') {?>selected="selected"<?php } ?>>&nbsp;<?php echo $loc['offers.php']['t187']; ?>&nbsp;</option>
												</select>
											</li>

											<li><span><?php echo $loc['offers.php']['t188']; ?></span>
												<select name="off_balance" class="form-control">
													<option value="0" <?php if ($offer_off_balance=='0') {?>selected="selected"<?php } ?>>&nbsp;<?php echo $loc['offers.php']['t189']; ?>&nbsp;</option>
													<option value="1000" <?php if ($offer_off_balance=='1000') {?>selected="selected"<?php } ?>>&nbsp;1000&nbsp;<?php echo $loc['offers.php']['t17']; ?>&nbsp;</option>
													<option value="2000" <?php if ($offer_off_balance=='2000') {?>selected="selected"<?php } ?>>&nbsp;2000&nbsp;<?php echo $loc['offers.php']['t17']; ?>&nbsp;</option>
													<option value="3000" <?php if ($offer_off_balance=='3000') {?>selected="selected"<?php } ?>>&nbsp;3000&nbsp;<?php echo $loc['offers.php']['t17']; ?>&nbsp;</option>
													<option value="5000" <?php if ($offer_off_balance=='5000') {?>selected="selected"<?php } ?>>&nbsp;5000&nbsp;<?php echo $loc['offers.php']['t17']; ?>&nbsp;</option>
													<option value="10000" <?php if ($offer_off_balance=='10000') {?>selected="selected"<?php } ?>>&nbsp;10000&nbsp;<?php echo $loc['offers.php']['t17']; ?>&nbsp;</option>
													<option value="15000" <?php if ($offer_off_balance=='15000') {?>selected="selected"<?php } ?>>&nbsp;15000&nbsp;<?php echo $loc['offers.php']['t17']; ?>&nbsp;</option>
													<option value="20000" <?php if ($offer_off_balance=='20000') {?>selected="selected"<?php } ?>>&nbsp;20000&nbsp;<?php echo $loc['offers.php']['t17']; ?>&nbsp;</option>
												</select>
											</li>

										</ul>
									</div><!-- detail-item -->

									<div class="detail-item">
										<p><?php echo $loc['offers.php']['t31']; ?></p>
										<ul>
											<li>
											<span>
												<select name="deystvie" class="form-control">
													<?php			
													// Выводим список целевых действий
													// Display a list of targeted actions
													$sql_deystvie = "SELECT id,deystvie FROM deystvie_tpl";
													$result_deystvie = $mysqli->query($sql_deystvie);
													if (mysqli_num_rows($result_deystvie) > 0) 
														{
														while($res_deystvie=mysqli_fetch_array($result_deystvie)) 
															{ 
															$id_deystvie=htmlentities($res_deystvie['id']);
															$descr_deystvie=htmlentities($res_deystvie['deystvie']);
															if ($id_deystvie==$offer_deystvie)
																{?><option selected value="<?php echo $id_deystvie; ?>"><?php echo $descr_deystvie; ?></option><?php }
															else
																{?><option value="<?php echo $id_deystvie; ?>"><?php echo $descr_deystvie; ?></option><?php }
															}
														}
													?>		
												</select>
											</span>
												<div class="small-form-x">
													<input type="text" class="form-control" name="comission" style="width: 50px; text-align: center;" maxlength="10" value="<?php echo $offer_comission; ?>"> 
												</div>
												<div class="small-form-x">
													<select name="tip_comission" class="form-control" id="tip_comission" onchange="if (document.getElementById('tip_comission').value==1) {document.getElementById('tip_comission_cpa').value=1;} if (document.getElementById('tip_comission').value==2) {document.getElementById('tip_comission_cpa').value=2;}">
														<option value="1" <?php if (isset($offer_tip_comission) && $offer_tip_comission=='1') {?>selected="selected"<?php } ?>>&nbsp;<?php echo $loc['offers.php']['t17']; ?>&nbsp;</option>
														<option value="2" <?php if (isset($offer_tip_comission) && $offer_tip_comission=='2') {?>selected="selected"<?php } ?>>&nbsp;<?php echo $loc['offers.php']['t18']; ?>&nbsp;</option>
													</select>
												</div>
											</li>
										</ul>
									</div><!-- detail-item -->

									<div class="detail-item">
										<p><?php echo $loc['offers.php']['t32']; ?></p>
										<ul>
											<li><?php echo $loc['offers.php']['t33']; ?>&nbsp;<span class="smallinfo" title="<?php echo $loc['offers.php']['t35']; ?>"><?php echo $loc['offers.php']['t37']; ?></span> <input name="hold" value="<?php echo $offer_hold; ?>" maxlength="2" style="width: 30px; text-align: center;"></li>

											<li><?php echo $loc['offers.php']['t34']; ?>&nbsp;<span class="smallinfo" title="<?php echo $loc['offers.php']['t36']; ?>"><?php echo $loc['offers.php']['t37']; ?></span> <input name="timeobrabotka" value="<?php echo $offer_timeobrabotka; ?>" maxlength="2" style="width: 30px; text-align: center;"></li>

											<li><?php echo $loc['offers.php']['t38']; ?>&nbsp;<span class="smallinfo" title="<?php echo $loc['offers.php']['t39']; ?>"><?php echo $loc['offers.php']['t37']; ?></span> <input name="postclick" value="<?php echo $offer_postclick; ?>" maxlength="2" style="width: 30px; text-align: center;"></li>
										</ul>
									</div><!-- detail-item -->

									<div class="detail-item">
										<p><?php echo $loc['offers.php']['t41']; ?></p>
										<ul>
											<li><span><?php echo $loc['offers.php']['t42']; ?></span> 
												<select name="country1" onchange="javascript:selectRegion1(); $('#city1').prop('value', '0');" style="width: 200px;">
												<option value="0"><?php echo $loc['offers.php']['t190']; ?></option>
												<?php
												$sql_spisokstran = "SELECT * FROM sxgeo_country ORDER BY `name_ru` ASC";
												$result_spisokstran=$mysqli->query($sql_spisokstran);
												if (mysqli_num_rows($result_spisokstran) > 0) 
													{
													while ($res_spisokstran=mysqli_fetch_array($result_spisokstran)) 
														{
														$current_country_iso=htmlentities($res_spisokstran['iso']);
														$current_country_name=htmlentities($res_spisokstran['name_ru']);
														?>
														<option value="<?php echo $current_country_iso; ?>" <?php if ($current_country_iso==$offer_country_iso1) {echo 'selected="selected"';} 
														?>><?php echo $current_country_name; ?></option>
														<?php
														}
													}
												else
													{
													echo '<option value="0">'.$loc['offers.php']['t190'].'</option>';
													}
												?>
												</select>
												<?php include_once './templates/'.$template.'/js/geo_spisok_js.php'; ?>
											</li>

											<li><span><?php echo $loc['offers.php']['t43']; ?></span> 
												<span name="selectDataRegion1" style="">
												<?php
												echo '<select name="region1" style="width: 200px; margin-left: 20px;" onchange="javascript:selectCity1();"><option value="0">'.$loc['offers.php']['t190'].'</option>';
												$sql_region = "SELECT * FROM sxgeo_regions WHERE `country`='$offer_country_iso1' ORDER BY `name_ru` ASC";
												$result_region = $mysqli->query($sql_region);
												if (mysqli_num_rows($result_region) > 0) 
													{
													while ($res_region=mysqli_fetch_array($result_region)) 
														{
														$current_region_id=htmlentities($res_region['id']);
														$current_region_name=htmlentities($res_region['name_ru']);
														?>
														<option value="<?php echo $current_region_id; ?>" <?php if ($current_region_id==$offer_region_id1) {echo 'selected="selected"';}
														?>><?php echo $current_region_name; ?></option>
														<?php 
														}
													}
												else
													{
													echo '<option value="0">'.$loc['offers.php']['t190'].'</option>';
													}
												echo '</select>';
												?>
												</span>
												<?php include_once './templates/'.$template.'/js/geo_spisok_js.php'; ?>
											</li>

											<li><span><?php echo $loc['offers.php']['t44']; ?></span> 
												<span name="selectDataCity1" style="">
												<?php
												echo '<select name="city1" class="form-control" id="city1" style="width: 200px; margin-left: 20px;"><option value="0">'.$loc['offers.php']['t190'].'</option>';
												$sql_cities = "SELECT * FROM sxgeo_cities WHERE `id`='$offer_city_id1' ORDER BY `name_ru` ASC";
												$result_cities = $mysqli->query($sql_cities);
												if (mysqli_num_rows($result_cities) > 0) 
													{
													while ($res_cities=mysqli_fetch_array($result_cities)) 
														{
														$current_cities_id=htmlentities($res_cities['id']);
														$current_cities_name=htmlentities($res_cities['name_ru']);
														?>
														<option value="<?php echo $current_cities_id; ?>" <?php if ($current_cities_id==$offer_city_id1) {echo 'selected="selected"';}
														?>><?php echo $current_cities_name; ?></option>
														<?php
														}
													}
												else
													{
													echo '<option value="0">'.$loc['offers.php']['t190'].'</option>';
													}
												echo '</select>';
												?>
											</span>
											<?php include_once './templates/'.$template.'/js/geo_spisok_js.php'; ?>

											</li>
										</ul>
									</div><!-- detail-item -->

									<div class="detail-item">
										<p><?php echo $loc['offers.php']['t45']; ?></p>
										<?php
										$sql_tip_traffic = "SELECT * FROM tip_traffic_tpl ORDER BY `tip` ASC";
										$result_tip_traffic=$mysqli->query($sql_tip_traffic);
										if (mysqli_num_rows($result_tip_traffic) > 0) 
											{
											while ($res_tip_traffic=mysqli_fetch_array($result_tip_traffic)) 
												{
												$tip_traffic=htmlentities($res_tip_traffic['tip']);
												$id_tip_traffic=htmlentities($res_tip_traffic['id']);
										?>
										<ul>
											<li><span class="red"><?php echo $tip_traffic; ?></span>
												<input name="tip_traffic<?php echo $id_tip_traffic; ?>" type="checkbox" 
													<?php
													if ($id_tip_traffic==1) {if ($tip_traffic1==1) {echo 'checked=checked';}}
													if ($id_tip_traffic==2) {if ($tip_traffic2==1) {echo 'checked=checked';}}
													if ($id_tip_traffic==3) {if ($tip_traffic3==1) {echo 'checked=checked';}}
													if ($id_tip_traffic==4) {if ($tip_traffic4==1) {echo 'checked=checked';}}
													if ($id_tip_traffic==5) {if ($tip_traffic5==1) {echo 'checked=checked';}}
													if ($id_tip_traffic==6) {if ($tip_traffic6==1) {echo 'checked=checked';}}
													if ($id_tip_traffic==7) {if ($tip_traffic7==1) {echo 'checked=checked';}}
													if ($id_tip_traffic==8) {if ($tip_traffic8==1) {echo 'checked=checked';}}
													if ($id_tip_traffic==9) {if ($tip_traffic9==1) {echo 'checked=checked';}}
													if ($id_tip_traffic==10) {if ($tip_traffic10==1) {echo 'checked=checked';}}
													if ($id_tip_traffic==11) {if ($tip_traffic11==1) {echo 'checked=checked';}}
													if ($id_tip_traffic==12) {if ($tip_traffic12==1) {echo 'checked=checked';}}
													if ($id_tip_traffic==13) {if ($tip_traffic13==1) {echo 'checked=checked';}}
													if ($id_tip_traffic==14) {if ($tip_traffic14==1) {echo 'checked=checked';}}
													if ($id_tip_traffic==15) {if ($tip_traffic15==1) {echo 'checked=checked';}}
													if ($id_tip_traffic==16) {if ($tip_traffic16==1) {echo 'checked=checked';}}
													?>
													> 
												
											</li>
											<?php
												}
											}
										?>
										</ul>
									</div><!-- detail-item -->

									<form name="moderate_email_offer" id="moderate_email_offer" method="post" action="./offers.php?<?php echo @$_SERVER['QUERY_STRING']?>">
										<div class="detail-item">
											<p><?php echo $loc['offers.php']['t124']; ?></p>
											<ul>
												<li>
													<div class="half-column">
														<?php echo $loc['offers.php']['t191']; ?>
															<div class="half-item-xs">
														<select name="email_ok" style="width: 200px;" class="form-control">
															<option class="options" value="0" <?php if ($offer_email_ok=='0') { ?>selected="selected"<?php } ?>><?php echo $loc['offers.php']['t193']; ?></option>
															<option class="options" value="1" <?php if ($offer_email_ok=='1') { ?>selected="selected"<?php } ?>><?php echo $loc['offers.php']['t194']; ?></option>
														</select>
														</div>
													</div>
													<div class="half-column">
														<?php echo $loc['offers.php']['t192']; ?>
														<div class="half-item-xs">
															<input type="text" class="form-control" name="email_box" id="email_box" maxlength="50" value="<?php echo $offer_email_box; ?>" style="width: 200px; text-align: center;" placeholder="<?php echo $loc['offers.php']['t195']; ?>&nbsp;email@mail.ru">
														</div>
													</div>
												</li>
											</ul>
										</div><!-- detail-item -->
									</form>

									<?php 
									// Если в настройках системы разрешены СМС-уведомления, то выводим этот блок
									// If the system settings enabled SMS-notification, we derive the block
									if ($settings_sms_ok==1)
										{
										?>
										<table class="offer_table2">
											<tr class="table_zagolovki">
												<td colspan="2"><?php echo $loc['offers.php']['t196']; ?></td>
											</tr>
											<tr>
												<td style="width: 50%; line-height: 23px;">
													<?php echo $loc['offers.php']['t191']; ?><br />
													<select name="sms_ok" style="width: 200px;">
														<option class="options" value="0" <?php if ($offer_sms_ok=='0') { ?>selected="selected"<?php } ?>><?php echo $loc['offers.php']['t193']; ?></option>
														<option class="options" value="1" <?php if ($offer_sms_ok=='1') { ?>selected="selected"<?php } ?>><?php echo $loc['offers.php']['t194']; ?></option>
													</select>
												</td>
												<td style="width: 50%; line-height: 23px;">
													<?php echo $loc['offers.php']['t197']; ?><br />
													<input type="text" name="sms_phone" id="sms_phone" maxlength="50" value="<?php echo $offer_sms_phone; ?>" style="width: 200px; text-align: center;" placeholder="<?php echo $loc['offers.php']['t195']; ?>&nbsp;79111234567">
												</td>								
											</tr>
										</table>
										
										<table class="offer_table2">
											<tr class="table_zagolovki">
												<td><?php echo $loc['offers.php']['t198']; ?></td>
											</tr>
											<tr>
												<td style="width: 38%; text-align: left; text-indent: 6px; line-height: 23px;">
													<b><?php echo $loc['offers.php']['t199']; ?>&nbsp;</b>"<?php echo $loc['offers.php']['t200']; ?>"
													<br>
													<input type="text" name="sms_text_zakaz" maxlength="100" value="<?php echo html_entity_decode($offer_sms_text_zakaz, ENT_QUOTES, 'utf-8'); ?>" style="width: 99%; text-align: center;" >
												</td>
											<tr>
												<td style="width: 38%; text-align: left; text-indent: 6px; line-height: 23px;">
													<b><?php echo $loc['offers.php']['t201']; ?>&nbsp;</b>"<?php echo $loc['offers.php']['t202']; ?>"
													<br>
													<input type="text" name="sms_text_send" maxlength="100" value="<?php echo html_entity_decode($offer_sms_text_send, ENT_QUOTES, 'utf-8'); ?>" style="width: 99%; text-align: center;" >
												</td>
											</tr>
											<tr>
												<td style="width: 38%; text-align: left; text-indent: 6px; line-height: 23px;">
													<b><?php echo $loc['offers.php']['t201']; ?>&nbsp;</b>"<?php echo $loc['offers.php']['t203']; ?>"
													<br>
													<input type="text" name="sms_text_way" maxlength="100" value="<?php echo html_entity_decode($offer_sms_text_way, ENT_QUOTES, 'utf-8'); ?>" style="width: 99%; text-align: center;" >
												</td>
											</tr>
											<tr>
												<td style="width: 38%; text-align: left; text-indent: 6px; line-height: 23px;">
													<b><?php echo $loc['offers.php']['t201']; ?>&nbsp;</b>"<?php echo $loc['offers.php']['t204']; ?>"
													<br>
													<input type="text" name="sms_text_success" maxlength="100" value="<?php echo html_entity_decode($offer_sms_text_success, ENT_QUOTES, 'utf-8'); ?>" style="width: 99%; text-align: center;" >
												</td>
											</tr>							
										</table>
										
										<p>
											<p>
												<button type="button" onclick="$('#spisok_makros').toggle();" style="background: #d3d3d3;"><b><?php echo $loc['offers.php']['t205']; ?></b></button>
											</p>
											<table id="spisok_makros" style="display: none; border: 0; " align=center>
												<tr>
													<td><b>{net_name}</b></td>
													<td><?php echo $loc['offers.php']['t206']; ?></td>
												</tr>
												<tr>
													<td><b>{offer_name}</b></td>
													<td><?php echo $loc['offers.php']['t207']; ?></td>
												</tr>
												<tr>
													<td><b>{zakaz_date}</b></td>
													<td><?php echo $loc['offers.php']['t208']; ?></td>
												</tr>							
												<tr>
													<td><b>{zakaz_time}</b></td>
													<td><?php echo $loc['offers.php']['t209']; ?></td>
												</tr>								
												<tr>
													<td><b>{date}</b></td>
													<td><?php echo $loc['offers.php']['t210']; ?></td>
												</tr>
												<tr>
													<td><b>{time}</b></td>
													<td><?php echo $loc['offers.php']['t211']; ?></td>
												</tr>							
											</table>
										</p>
										<?php
										}
									?>

									<button type="submit" class="btn btn-default submit" name="moderate_submit" value="<?php echo $loc['button']['t01']; ?>" class="others_button_sohranit" style="margin-top: 6px;" onclick="if (!confirm('<?php echo $loc['offers.php']['t212']; ?>'))return false;">Save Settings</button>
								</div>
								</form>
							</div><!-- row -->
						</div><!-- order-header -->
					</div><!-- row -->
				</div><!-- widget-content -->
			</aside><!-- widget -->
	<?php 
	}
?>