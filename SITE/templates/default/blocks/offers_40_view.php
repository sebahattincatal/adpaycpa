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
				<div class="page-offer-status green"><i class="fa fa-check"></i><span>Offer available. You can get started with it.</span></div>
				<div class="order-header">
					<div class="row">

						<div class="col-sm-3 col-xs-12">
							<div id="navwrap">
							<?php $_SESSION['offer_id']=$offer_id; ?>

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

							<div class="name">Earrings Mise en Dior</div>
							</div>
						</div>
						<div class="col-sm-9 col-xs-12">
							<div class="order-name">Earrings Mise en Dior</div>

							<div class="detail-item">
								<p><?php echo $loc['offers.php']['t22']; ?></p>
								<ul>
									<li><span><?php echo $loc['offers.php']['t23']; ?></span> <a href="http://adpaystat.com/miseendior/?stats=tntnB" target="_blank">LP # 1</a></li>
									<li><span><?php echo $loc['offers.php']['t24']; ?></span> http://adpaystat.com/?p=tntnB</li>
								</ul>
							</div><!-- detail-item -->

							<div class="detail-item">
								<p><?php echo $loc['offers.php']['t27']; ?></p>
								<ul>
									<li><span>
										<?php echo $loc['offers.php']['t28']; ?>
									</span> 
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
									</li>
									<li><span><?php echo $loc['offers.php']['t30']; ?></span> 
										<?php
										$res_checkdostup = "SELECT tip_account, uroven_dostupa, opisanie FROM uroven_tpl WHERE `uroven_dostupa`='$offer_uroven_dostupa' AND `tip_account`='10'";
										$result_checkdostup = $mysqli->query($res_checkdostup);
										$res_checkdostup=mysqli_fetch_array($result_checkdostup);
										echo $checkdostup_uroven_dostupa=htmlentities($res_checkdostup['opisanie']);
										?>	
									</li>
								</ul>
							</div><!-- detail-item -->

							<div class="detail-item">
								<p><?php echo $loc['offers.php']['t31']; ?></p>
								<ul>
									<li><span>
										<?php			
										$sql_deystvie = "SELECT deystvie FROM deystvie_tpl WHERE `id`='$offer_deystvie'";
										$result_deystvie = $mysqli->query($sql_deystvie);
										$res_deystvie=mysqli_fetch_array($result_deystvie);
										echo $deystvie_opisanie=htmlentities($res_deystvie['deystvie']);
										?>	
									</span> 
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
							</li>
								</ul>
							</div><!-- detail-item -->

							<div class="detail-item">
								<p><?php echo $loc['offers.php']['t32']; ?></p>
								<ul>
									<li><?php echo $loc['offers.php']['t33']; ?>&nbsp;<span class="smallinfo" title="<?php echo $loc['offers.php']['t35']; ?>"><?php echo $loc['offers.php']['t37']; ?></span><?php echo $offer_hold; ?></li>
									<li><?php echo $loc['offers.php']['t34']; ?>&nbsp;<span class="smallinfo" title="<?php echo $loc['offers.php']['t36']; ?>"><?php echo $loc['offers.php']['t37']; ?></span> <?php echo $offer_timeobrabotka; ?></li>
									<li><?php echo $loc['offers.php']['t38']; ?>&nbsp;<span class="smallinfo" title="<?php echo $loc['offers.php']['t39']; ?>"><?php echo $loc['offers.php']['t37']; ?></span> <?php echo $offer_postclick; ?></li>
								</ul>
							</div><!-- detail-item -->

							<div class="detail-item">
								<p><?php echo $loc['offers.php']['t41']; ?></p>
								<ul>
									<li><?php echo $loc['offers.php']['t42']; ?></li>
									<li><?php echo $loc['offers.php']['t43']; ?></li>
									<li><?php echo $loc['offers.php']['t44']; ?></li>
								</ul>
							</div><!-- detail-item -->

							<div class="detail-item">
								<p><?php echo $loc['offers.php']['t45']; ?></p>
								<ul>
									<li><span class="red"><?php if ($id_tip_traffic==1) {if ($tip_traffic1==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}} ?> </div></li>

									<li><span><?php if ($id_tip_traffic==2) {if ($tip_traffic2==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}} ?></div></li>

									<li><span><?php if ($id_tip_traffic==3) {if ($tip_traffic3==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}} ?></div></li>

									<li><span><?php if ($id_tip_traffic==4) {if ($tip_traffic4==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}} ?></div></li>
									
									<li><span><?php if ($id_tip_traffic==5) {if ($tip_traffic5==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}} ?></div></li>

									<li><span><?php if ($id_tip_traffic==6) {if ($tip_traffic6==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}} ?></div></li>

									<li><span><?php if ($id_tip_traffic==7) {if ($tip_traffic7==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}} ?></div></li>

									<li><span><?php if ($id_tip_traffic==8) {if ($tip_traffic8==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}} ?></div></li>

									<li><span class="red"><?php if ($id_tip_traffic==9) {if ($tip_traffic9==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}} ?></div></li>

									<li><span class="red"><?php if ($id_tip_traffic==10) {if ($tip_traffic10==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}} ?></div></li>

									<li><span class="red"><?php if ($id_tip_traffic==11) {if ($tip_traffic11==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}} ?></div></li>

									<li><span><?php if ($id_tip_traffic==12) {if ($tip_traffic12==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}} ?></div></li>

									<li><span><?php if ($id_tip_traffic==13) {if ($tip_traffic13==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}} ?></div></li>

									<li><span><?php if ($id_tip_traffic==14) {if ($tip_traffic14==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}} ?></div></li>

									<li><span><?php if ($id_tip_traffic==15) {if ($tip_traffic15==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}} ?></div></li>

									<li><span><?php if ($id_tip_traffic==16) {if ($tip_traffic16==1) {echo '<font color=green><b>'.$loc['offers.php']['t46'].'</b></font>';} else {echo '<font color=red><b>'.$loc['offers.php']['t47'].'</b></font>';}} ?></div></li>
								</ul>
							</div><!-- detail-item -->

							<form name="moderate_email_offer" id="moderate_email_offer" method="post" action="./offers.php?<?php echo @$_SERVER['QUERY_STRING']?>">
								<div class="detail-item">
									<p><?php echo $loc['offers.php']['t124']; ?></p>
									<ul class="ord-ml">
										<li>
											<div class="half-column marginBottom15">
												<?php echo $loc['offers.php']['t125']; ?>
												<div class="half-item-xs">
													<select name="email_ok" class="form-control" style="width: 200px;">
														<option class="options" value="0" <?php if ($offer_email_ok=='0') { ?>selected="selected"<?php } ?>><?php echo $loc['offers.php']['t126']; ?></option>
														<option class="options" value="1" <?php if ($offer_email_ok=='1') { ?>selected="selected"<?php } ?>><?php echo $loc['offers.php']['t127']; ?></option>
													</select>
												</div>
											</div>
											<div class="half-column">
												<?php echo $loc['offers.php']['t128']; ?>
												<div class="half-item-xs">
													<input type="text" class="form-control" name="email_box" id="email_box" maxlength="50" value="<?php echo $offer_email_box; ?>" style="width: 200px; text-align: center;" placeholder="<?php echo $loc['offers.php']['t129']; ?>&nbsp;email@mail.ru">
												</div>
											</div>
										</li>
									</ul>
								</div>
							</form>


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
								<button type="submit" name="moderate_sms_submit" value="<?php echo $loc['button']['t01']; ?>"  style="margin-top: 6px;" onclick="if (!confirm('<?php echo $loc['offers.php']['t149']; ?>'))return false;" class="btn btn-default submit others_button_sohranit">Save Settings</button>

								<input type="hidden" name="offer_id" value="<?php echo $offer_id; ?>">
								</form>
								<?php
								}
							?>

							<button type="submit" name="moderate_sms_submit" value="<?php echo $loc['button']['t01']; ?>"  style="margin-top: 6px;" onclick="if (!confirm('<?php echo $loc['offers.php']['t149']; ?>'))return false;" class="btn btn-default submit others_button_sohranit">Save Settings</button>

							<input type="hidden" name="offer_id" value="<?php echo $offer_id; ?>">

						</div>

					</div><!-- row -->
				</div><!-- order-header -->
			</div><!-- row -->
		</div><!-- widget-content -->
	</aside><!-- widget -->
<?php 
	}

?>