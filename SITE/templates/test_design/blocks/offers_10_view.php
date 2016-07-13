<?php

// Блок с выводом отдельно взятого оффера
// Block with the output of a single offer
$offer_id=htmlentities($_GET['offer']);
$sql = "SELECT * FROM offers WHERE `active`='1' AND `id`='$offer_id'";
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
	
	// Переводим переменную отвечающая за тип принимаемого трафика в удобочитаемый вид
	// Translate variable responsible for the type of traffic received in convenient form
	$offer_tip_traffic=htmlentities($res['tip_traffic']);
	list($tip_traffic1, $tip_traffic2, $tip_traffic3, $tip_traffic4, $tip_traffic5, $tip_traffic6, $tip_traffic7, $tip_traffic8, $tip_traffic9, $tip_traffic10, $tip_traffic11, $tip_traffic12, $tip_traffic13, $tip_traffic14, $tip_traffic15, $tip_traffic16) = explode('|', trim($offer_tip_traffic, '|'));	

	// Переводим переменную ГЕО в удобочитаемый вид
	// Translate variable GEO readable view
	$offer_geo=htmlentities($res['geo']);	
	list($offer_country_iso1, $offer_region_id1, $offer_city_id1) = explode('|', trim($offer_geo, '|'));
	?>
	<p>
		<table class="stats_table" style="width: 750px;">
			<tr class="table_zagolovki">
				<td><?php echo $loc['offers.php']['t03']; ?>&nbsp;&laquo;<?php echo html_entity_decode($offer_name, ENT_QUOTES, 'utf-8'); ?>&raquo;</td>
			</tr>
			<tr class="row_title" style="font-weight: normal;">
						<?php
						$sql_ur_v = "SELECT tip_account, uroven_dostupa, opisanie FROM uroven_tpl WHERE `uroven_dostupa`='$offer_uroven_dostupa' AND `tip_account`='10'";
						$result_ur_v = $mysqli->query($sql_ur_v);
						$res_ur_v=mysqli_fetch_array($result_ur_v);	
						$ur_v=htmlentities($res_ur_v['opisanie']);
						if ($user_uroven_dostupa>=$offer_uroven_dostupa) 
							{?><td style="background: green; color: white;"><nobr><?php echo $loc['offers.php']['t20']; ?></nobr><?php } 
						else
							{?><td style="background: red; color: white;"><nobr><?php echo $loc['offers.php']['t21']; ?>&nbsp;<?php echo $ur_v.'.</nobr>'; } 
						?>
						</td>
			</tr>
			<tr class="row_title">
				<td valign="top">
					<?php
					// определяем данные рекламодателя чей оффер выводится
					// Define the data the advertiser whose offer appears
					$sql_userdata = "SELECT * FROM users WHERE `id`='$offer_owner_id'";
					$result_userdata = $mysqli->query($sql_userdata);
					$res_userdata=mysqli_fetch_array($result_userdata);
					
					$userdata_id=htmlentities($res_userdata['id']);
					$userdata_email=htmlentities($res_userdata['email']);
					$userdata_balance=htmlentities($res_userdata['balance']);
					?>
						
					<p>
						<?php
						if ($user_uroven_dostupa>=$offer_uroven_dostupa) 
							{
							// Определяем домен который используется для лендингов
							// Determine the domain that is used for landing
							$sql_domain = "SELECT domain FROM domains WHERE `active`='1' ORDER BY `id` DESC";
							$result_domain = $mysqli->query($sql_domain);
							$res_domain=mysqli_fetch_array($result_domain);
							$domain=htmlentities($res_domain['domain']);
							?>
							<table class="offer_table2">
								<tr class="table_zagolovki">
									<td colspan="2" style="color: green;"><?php echo $loc['offers.php']['t22']; ?></td>
								</tr>
								<tr class="table_zagolovki">
									<td><?php echo $loc['offers.php']['t23']; ?></td>
									<td><?php echo $loc['offers.php']['t24']; ?></td>
								</tr>								
								<?php
								$sql_landings = "SELECT id,name,url FROM landings WHERE `offer_id`='$offer_id'";
								$result_landings = $mysqli->query($sql_landings);
								if (mysqli_num_rows($result_landings) > 0) 
									{
									while($res_landings=mysqli_fetch_array($result_landings)) 
										{
										?>
										<tr>
											<td width="60%">
												<?php
												$land_id=htmlentities($res_landings['id']);
												$land_name=htmlentities($res_landings['name']);
												$land_url=htmlentities($res_landings['url']);
												
												// Формируем партнерскую ссылку (формируем ее из ID пользователя, ID оффера и ID лендинга)
												// Form the affiliate link (forming it from the User ID, offer ID and landing ID)
												$partnerlink='http://'.$domain.'/?p='.partnerstroka_encode($user_id.'-'.$offer_id.'-'.$land_id);
												
												echo '<a target="_blank" href="'.$partnerlink.'"><b>'.html_entity_decode($land_name, ENT_QUOTES, 'utf-8').'</b></a>';
												?>
											</td>
											<td>
												<span class="btn-copy" data-clipboard-text="<?php echo $partnerlink; ?>"><?php echo $partnerlink; ?></span>
												<script src="./templates/<?php echo $template; ?>/js/ZeroClipboard.min.js"></script>
												<script src="./templates/<?php echo $template; ?>/js/ZeroClipboard.common.js"></script>
											</td>
										</tr>
										<?php
										}
									}
								else
									{
									echo '<tr><td colspan="2" style="background: red; color: white;">'.$loc['offers.php']['t25'].'</td></tr>';		
									}
								?>
							</table>
							<?php
							}
						?>
						
						<table class="offer_table2">
							<tr class="table_zagolovki">
								<td colspan="1"><?php echo $loc['offers.php']['t26']; ?></td>
							</tr>
							<tr>
								<td>
						
									<?php $_SESSION['offer_id']=$offer_id; ?>

									<div class="cropimage_view">
										<?php
										// Проверка, назначено ли промо для оффера
										// Check if the promo is scheduled to offera
										if (file_exists('./tmp/offer'.$offer_id.'.jpg')) 
											{
											?>
											<img border="0" src="./tmp/offer<?php echo $offer_id; ?>.jpg">
											<?php
											} 
										?>
									</div>

								</td>
							</tr>
						</table> 
							
						<table class="offer_table2">
							<tr class="table_zagolovki">
								<td colspan="2"><?php echo $loc['offers.php']['t27']; ?></td>
							</tr>
							<tr>
								<td width="70%">
									<?php echo $loc['offers.php']['t28']; ?>
								</td>
								<td>
									<?php 
									if ($offer_cena=='0')
										{
										echo $loc['offers.php']['t29'];
										}
									else
										{
										echo $offer_cena.'&nbsp;'.$loc['offers.php']['t17'];
										}
									?>
								</td>
							</tr>
							<tr>
								<td width="70%">
									<?php echo $loc['offers.php']['t30']; ?>
								</td>
								<td>
									<?php
									$res_checkdostup = "SELECT tip_account, uroven_dostupa, opisanie FROM uroven_tpl WHERE `uroven_dostupa`='$offer_uroven_dostupa' AND `tip_account`='10'";
									$result_checkdostup = $mysqli->query($res_checkdostup);
									$res_checkdostup=mysqli_fetch_array($result_checkdostup);
									echo $checkdostup_uroven_dostupa=htmlentities($res_checkdostup['opisanie']);
									?>		
								</td>
							</tr>								
						</table>							
					</p>

					<p>
						<table class="offer_table2">
							<tr class="table_zagolovki">
								<td colspan="2"><?php echo $loc['offers.php']['t31']; ?></td>
							</tr>
							<tr>
								<td width="70%">
										<?php			
										$sql_deystvie = "SELECT deystvie FROM deystvie_tpl WHERE `id`='$offer_deystvie'";
										$result_deystvie = $mysqli->query($sql_deystvie);
										$res_deystvie=mysqli_fetch_array($result_deystvie);
										echo $deystvie_opisanie=htmlentities($res_deystvie['deystvie']);
										?>		
								</td>
								<td>
									<?php
									if ($offer_tip_comission=='1')
										{
										echo $offer_comission.'&nbsp;'.$loc['offers.php']['t17'].'&nbsp;';
										}
									elseif ($offer_tip_comission=='2')
										{
										echo $offer_comission.'&nbsp;'.$loc['offers.php']['t18'].'&nbsp;';
										}
									?>
								</td>
							</tr>
						</table>  

						<table class="offer_table2">
							<tr class="table_zagolovki">
								<td colspan="2"><?php echo $loc['offers.php']['t32']; ?></td>
							</tr>
							<tr>
								<td width="70%"><?php echo $loc['offers.php']['t33']; ?>&nbsp;<span class="smallinfo" title="<?php echo $loc['offers.php']['t35']; ?>"><?php echo $loc['offers.php']['t37']; ?></span></td>
								<td>
									<?php echo $offer_hold; ?>
								</td>
							</tr>
							<tr>
								<td><?php echo $loc['offers.php']['t34']; ?>&nbsp;<span class="smallinfo" title="<?php echo $loc['offers.php']['t36']; ?>"><?php echo $loc['offers.php']['t37']; ?></span></td>
								<td>
									<?php echo $offer_timeobrabotka; ?>
								</td>
							</tr>  
							<tr>
								<td><?php echo $loc['offers.php']['t38']; ?>&nbsp;<span class="smallinfo" title="<?php echo $loc['offers.php']['t39']; ?>"><?php echo $loc['offers.php']['t37']; ?></span></td>
								<td>
									<?php echo $offer_postclick; ?>
								</td>
							</tr>      
						</table> 

						<table class="offer_table2">
							<tr class="table_zagolovki">
								<td colspan="2"><?php echo $loc['offers.php']['t40']; ?></td>
							</tr>
							
							<?php
							// Определение CR и EPC оффера
							// Define CR and EPC offer
							$result_z1 = $mysqli->query("SELECT COUNT(id) AS kolvo_zakaz_success FROM `zakaz` WHERE `offer_id`='$offer_id' AND `status`='3'");
							$row_z1 = mysqli_fetch_assoc($result_z1);
							$result_z2 = $mysqli->query("SELECT SUM(comission) AS vyplachennaya_summa FROM `zakaz` WHERE `offer_id`='$offer_id' AND `status`='3'");
							$row_z2 = mysqli_fetch_assoc($result_z2);
							$result_z3 = $mysqli->query("SELECT COUNT(id) AS hostov_po_offeru FROM `clients_log` WHERE `offer_id`='$offer_id' AND `user_id`!='0'");
							$row_z3 = mysqli_fetch_assoc($result_z3);
							if($row_z3['hostov_po_offeru']!='0') {$cr_view=$row_z1['kolvo_zakaz_success']/$row_z3['hostov_po_offeru']*100;} else {$cr_view='0';}
							if($row_z3['hostov_po_offeru']!='0') {$epc_view=$row_z2['vyplachennaya_summa']/$row_z3['hostov_po_offeru'];} else {$epc_view='0';}
							?>
							
							<tr>
								<td width="70%"><?php echo $loc['offers.php']['t06']; ?></td>
								<td><?php if (round($cr_view,2)=='0') {echo $loc['offers.php']['t19'];} else {echo round($cr_view,2);} ?></td>
							</tr>
							<tr>
								<td><?php echo $loc['offers.php']['t07']; ?></td>
								<td><?php if (round($epc_view,2)=='0') {echo $loc['offers.php']['t19'];} else {echo round($epc_view,2);} ?></td>
							</tr>  
						</table>

						<table class="offer_table2">
							<tr class="table_zagolovki">
   								<td colspan="3"><?php echo $loc['offers.php']['t41']; ?></td>
							</tr>
								<tr class="table_zagolovki">
   								<td><?php echo $loc['offers.php']['t42']; ?></td>
								<td><?php echo $loc['offers.php']['t43']; ?></td>
								<td><?php echo $loc['offers.php']['t44']; ?></td>
							</tr>								
							<tr>
								<td width="33%">
									<?php
									$sql_spisokstran = "SELECT name_ru FROM sxgeo_country WHERE `iso`='$offer_country_iso1'";
									$result_spisokstran=$mysqli->query($sql_spisokstran);
									$res_spisokstran=mysqli_fetch_array($result_spisokstran);
									$current_country_name=htmlentities($res_spisokstran['name_ru']);
									if ($current_country_name=='' || $current_country_name=='0')
										{
										echo $loc['offers.php']['t09'];
										}
									else
										{
										echo $current_country_name;
										}
									?>
								</td>
								<td width="33%">
									<?php
									$sql_region = "SELECT * FROM sxgeo_regions WHERE `id`='$offer_region_id1'";
									$result_region=$mysqli->query($sql_region);
									$res_region=mysqli_fetch_array($result_region);
									$current_region_name=htmlentities($res_region['name_ru']);
									if ($current_region_name=='' || $current_region_name=='0')
										{
										echo $loc['offers.php']['t09'];
										}
									else
										{
										echo $current_region_name;
										}
									?>
								</td>
								<td width="33%">
									<?php
									$sql_cities = "SELECT * FROM sxgeo_cities WHERE `id`='$offer_city_id1'";
									$result_cities=$mysqli->query($sql_cities);
									$res_cities=mysqli_fetch_array($result_cities);
									$current_cities_name=htmlentities($res_cities['name_ru']);
									if ($current_cities_name=='' || $current_cities_name=='0')
										{
										echo $loc['offers.php']['t09'];
										}
									else
										{
										echo $current_cities_name;
										}
									?>
								</td>
							</tr>
						</table>

						<table class="offer_table2">
							<tr class="table_zagolovki">
								<td colspan="2"><?php echo $loc['offers.php']['t45']; ?></td>
							</tr>
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
									<tr>
										<td width="70%"><?php echo $tip_traffic; ?></td>
										<td>
										<?php
										if ($id_tip_traffic==1) {if ($tip_traffic1==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}}
										if ($id_tip_traffic==2) {if ($tip_traffic2==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}}
										if ($id_tip_traffic==3) {if ($tip_traffic3==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}}
										if ($id_tip_traffic==4) {if ($tip_traffic4==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}}
										if ($id_tip_traffic==5) {if ($tip_traffic5==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}}
										if ($id_tip_traffic==6) {if ($tip_traffic6==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}}
										if ($id_tip_traffic==7) {if ($tip_traffic7==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}}
										if ($id_tip_traffic==8) {if ($tip_traffic8==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}}
										if ($id_tip_traffic==9) {if ($tip_traffic9==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}}
										if ($id_tip_traffic==10) {if ($tip_traffic10==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}}
										if ($id_tip_traffic==11) {if ($tip_traffic11==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}}
										if ($id_tip_traffic==12) {if ($tip_traffic12==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}}
										if ($id_tip_traffic==13) {if ($tip_traffic13==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}}
										if ($id_tip_traffic==14) {if ($tip_traffic14==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}}
										if ($id_tip_traffic==15) {if ($tip_traffic15==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}}
										if ($id_tip_traffic==16) {if ($tip_traffic16==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}}
										?>										
										</td>
									</tr>
									<?php
									}
								}
							?>
						</table>
					</p>
				</td>
			</tr>  
		</table>
	</p>
	<?php 
	}

?>
