<?php

// Блок с выводом отдельно взятого оффера
// Block with the output of a single offer
$offer_id=htmlentities($_GET['offer']);
$sql = "SELECT * FROM offers WHERE `owner_id`='$user_id' AND `id`='$offer_id'";
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
	$offer_sms_ok=htmlentities($res['sms_ok']);
	$offer_sms_phone=htmlentities($res['sms_phone']);
	$offer_email_ok=htmlentities($res['email_ok']);
	$offer_email_box=htmlentities($res['email_box']);	
	$offer_sms_text_zakaz=htmlentities($res['sms_text_zakaz']);
	$offer_sms_text_send=htmlentities($res['sms_text_send']);
	$offer_sms_text_way=htmlentities($res['sms_text_way']);
	$offer_sms_text_success=htmlentities($res['sms_text_success']);
	
	// Переводим переменную отвечающую за тип принимаемого трафика в удобный вид
	// Translate variable responsible for the type of traffic received in convenient form
	$offer_tip_traffic=htmlentities($res['tip_traffic']);
	list($tip_traffic1, $tip_traffic2, $tip_traffic3, $tip_traffic4, $tip_traffic5, $tip_traffic6, $tip_traffic7, $tip_traffic8, $tip_traffic9, $tip_traffic10, $tip_traffic11, $tip_traffic12, $tip_traffic13, $tip_traffic14, $tip_traffic15, $tip_traffic16) = explode('|', trim($offer_tip_traffic, '|'));	

	// Переводим переменную ГЕО в удобный вид
	// Translate variable GEO convenient form
	$offer_geo=htmlentities($res['geo']);	
	list($offer_country_iso1, $offer_region_id1, $offer_city_id1) = explode('|', trim($offer_geo, '|'));
	?>
	
	<div id="parent_popup_click">
		<div id="popup_click">
			<div style="overflow-y: auto; padding: 0px 20px 0px 20px; margin: 0px 0px 0px 0px;">
				<?php include ('./templates/'.$template.'/blocks/codelanding.php'); ?>
				<a class="closebutton" title="<?php echo $loc['offers.php']['t112']; ?>" onclick="document.getElementById('parent_popup_click').style.display='none';"><?php echo $loc['offers.php']['t167']; ?></a>
			</div>
		</div>
	</div>	

	<div id="parent_popup_click2">
		<div id="popup_click2">
			<div style="overflow-y: auto; padding: 0px 20px 0px 20px; margin: 0px 0px 0px 0px;">
				<?php include ('./templates/'.$template.'/blocks/codemagazin.php'); ?>
				<a class="closebutton" title="<?php echo $loc['offers.php']['t112']; ?>" onclick="document.getElementById('parent_popup_click2').style.display='none';"><?php echo $loc['offers.php']['t167']; ?></a>
			</div>
		</div>
	</div>	
	
		<table class="stats_table" style="width: 750px;">
			<tr class="table_zagolovki">
				<td><?php echo $loc['offers.php']['t03']; ?>&nbsp;&laquo;<?php echo html_entity_decode($offer_name, ENT_QUOTES, 'utf-8'); ?>&raquo;</td>
			</tr>
			<tr class="row_title" style="font-weight: normal;">
				<?php
				if ($offer_active=='0') {?><td style="background: red; color: white;"><?php echo $loc['offers.php']['t113']; ?></td><?}
				if ($offer_active=='1') {?><td style="background: green; color: white;"><?php echo $loc['offers.php']['t114']; ?></td><?}
				if ($offer_active=='2') {?><td style="background: yellow; color: red;"><?php echo $loc['offers.php']['t115']; ?></td><?}
				?>
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
						
						<table class="offer_table2">
							<tr class="table_zagolovki">
								<td colspan="2"><?php echo $loc['offers.php']['t116']; ?>&nbsp;(<a href="#codelanding" onclick="document.getElementById('parent_popup_click').style.display='block';"><?php echo $loc['offers.php']['t117']; ?></a> | <a href="#codelanding" onclick="document.getElementById('parent_popup_click2').style.display='block';"><?php echo $loc['offers.php']['t118']; ?></a>)</td>
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
										<td width="70%">
											<?php
											$land_id=htmlentities($res_landings['id']);
											$land_name=htmlentities($res_landings['name']);
											$land_url=htmlentities($res_landings['url']);
											echo '<b>'.html_entity_decode($land_name, ENT_QUOTES, 'utf-8').'</b>';
											?>
										</td>
										<td>
											<?php echo '<a target="_blank" href="'.$land_url.'">'.$loc['offers.php']['t119'].'</a>'; ?>
										</td>
									</tr>
									<?php
									}
								}
							else
								{
								echo '<tr><td colspan="2" style="background: red; color: white;">'.$loc['offers.php']['t120'].'</td></tr>';		
								}
							?>
						</table>						
						
						<table class="offer_table2">
							<tr class="table_zagolovki">
								<td colspan="1" ><?php echo $loc['offers.php']['t121']; ?></td>
							</tr>
							<tr>
								<td>
								
									<?php $_SESSION['offer_id']=$offer_id; ?>

									<div class="cropimage_view">
										<?php
										// Проверка, назначено ли промо для оффера.
										// Check if the promo is scheduled to offer.
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
									if ($offer_cena!='0')
										{
										echo $offer_cena.'&nbsp;'.$loc['offers.php']['t17'].'&nbsp;'; 
										}
									else
										{
										echo $loc['offers.php']['t29']; 
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
										echo $offer_comission+$offer_comission_cpa.'&nbsp;'.$loc['offers.php']['t17'].'&nbsp;';
										}
									elseif ($offer_tip_comission=='2')
										{
										echo $offer_comission+$offer_comission_cpa.'&nbsp;'.$loc['offers.php']['t18'].'&nbsp;';
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

						<?php
						// Определяем CR и EPC оффера
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
						
						<table class="offer_table2">
							<tr class="table_zagolovki">
								<td colspan="2"><?php echo $loc['offers.php']['t123']; ?></td>
							</tr>
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
						
						<br /><hr><br />
						
						<form name="moderate_email_offer" id="moderate_email_offer" method="post" action="./offers.php?<?php echo @$_SERVER['QUERY_STRING']?>">
							<table class="offer_table2">
								<tr class="table_zagolovki">
							<td colspan="2"><?php echo $loc['offers.php']['t124']; ?></td>
								</tr>
								<tr>
									<td style="width: 50%; line-height: 23px;">
										<?php echo $loc['offers.php']['t125']; ?><br />
										<select name="email_ok" style="width: 200px;">
											<option class="options" value="0" <?php if ($offer_email_ok=='0') { ?>selected="selected"<?php } ?>><?php echo $loc['offers.php']['t126']; ?></option>
											<option class="options" value="1" <?php if ($offer_email_ok=='1') { ?>selected="selected"<?php } ?>><?php echo $loc['offers.php']['t127']; ?></option>
										</select>
									</td>
									<td style="width: 50%; line-height: 23px;">
										<?php echo $loc['offers.php']['t128']; ?><br />
										<input type="text" name="email_box" id="email_box" maxlength="50" value="<?php echo $offer_email_box; ?>" style="width: 200px; text-align: center;" placeholder="<?php echo $loc['offers.php']['t129']; ?>&nbsp;email@mail.ru">
									</td>								
								</tr>
							</table>
							<p>
								<input type="submit" name="moderate_email_submit" value="<?php echo $loc['button']['t01']; ?>" class="others_button_sohranit" style="margin-top: 6px;" onclick="if (!confirm('<?php echo $loc['offers.php']['t130']; ?>'))return false;">
							</p>
							<input type="hidden" name="offer_id" value="<?php echo $offer_id; ?>">
						</form>						
						
						<br /><hr><br />
						
						<?php 
						// Если в настройках системы разрешены СМС-уведомления, то выводим этот блок
						// If the system settings enabled SMS-notification, we derive the block
						if ($settings_sms_ok==1)
							{
							?>
							<form name="moderate_sms_offer" id="moderate_sms_offer" method="post" action="./offers.php?<?php echo @$_SERVER['QUERY_STRING']?>">
							<table class="offer_table2">
								<tr class="table_zagolovki">
							<td colspan="2"><?php echo $loc['offers.php']['t131']; ?>&nbsp;<span style="font-size: 12px; color: green;">(<?php echo $loc['offers.php']['t132']; ?>&nbsp;-&nbsp;<?php echo $settings_sms_price; ?>&nbsp;<?php echo $loc['offers.php']['t17']; ?>)</span></td>
								</tr>
								<tr>
									<td style="width: 50%; line-height: 23px;">
										<?php echo $loc['offers.php']['t133']; ?><br />
										<select name="sms_ok" style="width: 200px;">
											<option class="options" value="0" <?php if ($offer_sms_ok=='0') { ?>selected="selected"<?php } ?>><?php echo $loc['offers.php']['t126']; ?></option>
											<option class="options" value="1" <?php if ($offer_sms_ok=='1') { ?>selected="selected"<?php } ?>><?php echo $loc['offers.php']['t127']; ?></option>
										</select>
									</td>
									<td style="width: 50%; line-height: 23px;">
										<?php echo $loc['offers.php']['t134']; ?><br />
										<input type="text" name="sms_phone" id="sms_phone" maxlength="50" value="<?php echo $offer_sms_phone; ?>" style="width: 200px; text-align: center;" placeholder="<?php echo $loc['offers.php']['t129']; ?>&nbsp;79111234567">
									</td>								
								</tr>
							</table>
							
							<table class="offer_table2">
								<tr class="table_zagolovki">
									<td><?php echo $loc['offers.php']['t135']; ?></td>
								</tr>
								<tr>
									<td style="width: 38%; text-align: left; text-indent: 6px; line-height: 23px;">
										<b><?php echo $loc['offers.php']['t136']; ?>&nbsp;</b>"<?php echo $loc['offers.php']['t137']; ?>"
										<br>
										<input type="text" name="sms_text_zakaz" maxlength="100" value="<?php echo html_entity_decode($offer_sms_text_zakaz, ENT_QUOTES, 'utf-8'); ?>" style="width: 99%; text-align: center;" >
									</td>
								<tr>
									<td style="width: 38%; text-align: left; text-indent: 6px; line-height: 23px;">
										<b><?php echo $loc['offers.php']['t138']; ?>&nbsp;</b>"<?php echo $loc['offers.php']['t139']; ?>"
										<br>
										<input type="text" name="sms_text_send" maxlength="100" value="<?php echo html_entity_decode($offer_sms_text_send, ENT_QUOTES, 'utf-8'); ?>" style="width: 99%; text-align: center;" >
									</td>
								</tr>
								<tr>
									<td style="width: 38%; text-align: left; text-indent: 6px; line-height: 23px;">
										<b><?php echo $loc['offers.php']['t138']; ?>&nbsp;</b>"<?php echo $loc['offers.php']['t140']; ?>"
										<br>
										<input type="text" name="sms_text_way" maxlength="100" value="<?php echo html_entity_decode($offer_sms_text_way, ENT_QUOTES, 'utf-8'); ?>" style="width: 99%; text-align: center;" >
									</td>
								</tr>
								<tr>
									<td style="width: 38%; text-align: left; text-indent: 6px; line-height: 23px;">
										<b><?php echo $loc['offers.php']['t138']; ?>&nbsp;</b>"<?php echo $loc['offers.php']['t141']; ?>"
										<br>
										<input type="text" name="sms_text_success" maxlength="100" value="<?php echo html_entity_decode($offer_sms_text_success, ENT_QUOTES, 'utf-8'); ?>" style="width: 99%; text-align: center;" >
									</td>
								</tr>							
							</table>
							
							<p>
								<p>
									<button type="button" onclick="$('#spisok_makros').toggle();" style="background: #d3d3d3;"><b><?php echo $loc['offers.php']['t142']; ?></b></button>
								</p>
								<table id="spisok_makros" style="display: none; border: 0; " align=center>
									<tr>
										<td><b>{net_name}</b></td>
										<td><?php echo $loc['offers.php']['t143']; ?></td>
									</tr>
									<tr>
										<td><b>{offer_name}</b></td>
										<td><?php echo $loc['offers.php']['t144']; ?></td>
									</tr>
									<tr>
										<td><b>{zakaz_date}</b></td>
										<td><?php echo $loc['offers.php']['t145']; ?></td>
									</tr>							
									<tr>
										<td><b>{zakaz_time}</b></td>
										<td><?php echo $loc['offers.php']['t146']; ?></td>
									</tr>								
									<tr>
										<td><b>{date}</b></td>
										<td><?php echo $loc['offers.php']['t147']; ?></td>
									</tr>
									<tr>
										<td><b>{time}</b></td>
										<td><?php echo $loc['offers.php']['t148']; ?></td>
									</tr>							
								</table>
							</p>
							<p>
								<input type="submit" name="moderate_sms_submit" value="<?php echo $loc['button']['t01']; ?>" class="others_button_sohranit" style="margin-top: 6px;" onclick="if (!confirm('<?php echo $loc['offers.php']['t149']; ?>'))return false;">
							</p>
							<input type="hidden" name="offer_id" value="<?php echo $offer_id; ?>">
							</form>
							<?php
							}
						?>						
					</p>
				</td>
			</tr>  
		</table>
	<?php 
	}
	
?>
