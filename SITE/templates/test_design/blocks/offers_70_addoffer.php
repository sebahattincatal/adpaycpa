
	<form name="addoffer" id="addoffer" method="post" action="offers.php?<?php echo @$_SERVER['QUERY_STRING']?>">
		<table class="stats_table">
			<tr class="table_zagolovki">
				<td><?php echo $loc['offers.php']['t150']; ?>&nbsp;&laquo;<input type="text" name="name" placeholder="<?php echo $loc['offers.php']['t151']; ?>" required style="width: 350px; text-align: center;" maxlength="90" value="">&raquo;</td>
			</tr>
			<tr class="row_title">
				<td valign="top">
					<p>
						<table class="offer_table2">
							<tr class="table_zagolovki">
								<td><?php echo $loc['offers.php']['t152']; ?></td>
							</tr>
							<tr>
								<td>
									<div class="offer_text_description" style="text-align: center; line-height: 25px;">
									<input name="url" value="" maxlength="200" required style="width: 500px; text-align: center;">
									</div>
								</td>
							</tr>
						</table>

						<table class="offer_table2">
							<tr class="table_zagolovki">
								<td colspan="2"><?php echo $loc['offers.php']['t122']; ?></td>
							</tr>
							<tr>
								<td width="70%">
									<?php echo $loc['offers.php']['t213']; ?>&nbsp;
								</td>
								<td>
									<select name="vladelec">
										<?php
										$sql_rekl = "SELECT * FROM users WHERE `tip`='40' AND `active`='1' AND `uroven_dostupa`='2' ORDER BY `email`";
										$result_rekl = $mysqli->query($sql_rekl);
										if (mysqli_num_rows($result_rekl) > 0) 
											{
											while($res_rekl=mysqli_fetch_array($result_rekl)) 
												{
												$rekl_id=htmlentities($res_rekl['id']);
												$rekl_email=htmlentities($res_rekl['email']);
												?>
												<option value="<?php echo $rekl_id; ?>"><?php echo $rekl_email; ?></option>
												<?php
												}
											}
										else
											{
											?>
											<option value=""><?php echo $loc['offers.php']['t214']; ?></option>
											<?
											}
										?>
									</select>									
								</td>
							</tr>
							<tr>
								<td width="70%">
									<?php echo $loc['offers.php']['t28']; ?>&nbsp;
								</td>
								<td>
									<input type="text" name="cena" style="width: 50px; text-align: center;" maxlength="10" value="">&nbsp;<?php echo $loc['offers.php']['t17']; ?>&nbsp;
								</td>
							</tr>
							<tr>
								<td width="70%">
									<?php echo $loc['offers.php']['t184']; ?>&nbsp;
								</td>
								<td>
									<input type="text" name="comission_cpa" style="width: 50px; text-align: center;" maxlength="10" value="" onmouseover="if (document.getElementById('tip_comission').value==1) {document.getElementById('tip_comission_cpa').value=1;} if (document.getElementById('tip_comission').value==2) {document.getElementById('tip_comission_cpa').value=2;}">
									<select name="tip_comission_cpa" id="tip_comission_cpa" onmouseover="if (document.getElementById('tip_comission').value==1) {document.getElementById('tip_comission_cpa').value=1;} if (document.getElementById('tip_comission').value==2) {document.getElementById('tip_comission_cpa').value=2;}" onchange="if (document.getElementById('tip_comission_cpa').value==1) {document.getElementById('tip_comission').value=1;} if (document.getElementById('tip_comission_cpa').value==2) {document.getElementById('tip_comission').value=2;}">
										<option value="1" <?php if (isset($offer_tip_comission_cpa) && $offer_tip_comission_cpa=='1') {?>selected="selected"<?php } ?>>&nbsp;<?php echo $loc['offers.php']['t17']; ?>&nbsp;</option>
										<option value="2" <?php if (isset($offer_tip_comission_cpa) && $offer_tip_comission_cpa=='2') {?>selected="selected"<?php } ?>>&nbsp;<?php echo $loc['offers.php']['t18']; ?>&nbsp;</option>
									</select>
								</td>
							</tr>
							<tr>
								<td width="70%">
									<?php echo $loc['offers.php']['t30']; ?>&nbsp;
								</td>
								<td>
									<select name="uroven_dostupa">
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
											<option value="<?php echo $checkdostup_uroven_dostupa; ?>"><?php echo $checkdostup_opisanie; ?></option>
											<?php
											}
										}
									?>		
									</select>
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
									<select name="deystvie" class="">
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
												?><option value="<?php echo $id_deystvie; ?>"><?php echo $descr_deystvie; ?></option><?php
												}
											}
										?>		
									</select>
								</td>
								<td>
									<input type="text" name="comission" style="width: 50px; text-align: center;" maxlength="10" value=""> 
									<select name="tip_comission" id="tip_comission" onchange="if (document.getElementById('tip_comission').value==1) {document.getElementById('tip_comission_cpa').value=1;} if (document.getElementById('tip_comission').value==2) {document.getElementById('tip_comission_cpa').value=2;}">
										<option value="1" <?php if (isset($offer_tip_comission) && $offer_tip_comission=='1') {?>selected="selected"<?php } ?>>&nbsp;<?php echo $loc['offers.php']['t17']; ?>&nbsp;</option>
										<option value="2" <?php if (isset($offer_tip_comission) && $offer_tip_comission=='2') {?>selected="selected"<?php } ?>>&nbsp;<?php echo $loc['offers.php']['t18']; ?>&nbsp;</option>
									</select>
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
									<input name="hold" value="" maxlength="2" style="width: 30px; text-align: center;">
								</td>
							</tr>
							<tr>
								<td><?php echo $loc['offers.php']['t34']; ?>&nbsp;<span class="smallinfo" title="<?php echo $loc['offers.php']['t36']; ?>"><?php echo $loc['offers.php']['t37']; ?></span></td>
								<td>
									<input name="timeobrabotka" value="" maxlength="2" style="width: 30px; text-align: center;">
								</td>
							</tr>  
							<tr>
								<td><?php echo $loc['offers.php']['t38']; ?>&nbsp;<span class="smallinfo" title="<?php echo $loc['offers.php']['t39']; ?>"><?php echo $loc['offers.php']['t37']; ?></span></td>
								<td>
									<input name="postclick" value="" maxlength="2" style="width: 30px; text-align: center;">
								</td>
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
								<td>
									<select name="country1" onchange="javascript:selectRegion1(); $('#city1').prop('value', '0');" style="width: 200px;">
									<option value="0"><?php echo $loc['offers.php']['t154']; ?></option>
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
											<option value="<?php echo $current_country_iso; ?>"><?php echo $current_country_name; ?></option>
											<?php
											}
										}
									else
										{
										echo '<option value="0">'.$loc['offers.php']['t154'].'</option>';
										}
									?>
									</select>
									<?php include_once './templates/'.$template.'/js/geo_spisok_js.php'; ?>
								</td>
								<td>
									<span name="selectDataRegion1" style="">
									<?php
									echo '<select name="region1" style="width: 200px; margin-left: 20px;" onchange="javascript:selectCity1();"><option value="0">'.$loc['offers.php']['t154'].'</option>';
									echo '</select>';
									?>
									</span>
									<?php include_once './templates/'.$template.'/js/geo_spisok_js.php'; ?>
								</td>
								<td>										
									<span name="selectDataCity1" style="">
										<?php
										echo '<select name="city1" id="city1" style="width: 200px; margin-left: 20px;"><option value="0">'.$loc['offers.php']['t154'].'</option>';
										echo '</select>';
										?>
									</span>
									<?php include_once './templates/'.$template.'/js/geo_spisok_js.php'; ?>
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
										<td><input name="tip_traffic<?php echo $id_tip_traffic; ?>" type="checkbox"></td>
									</tr>
									<?php
									}
								}
							?>
						</table>
					</p>
					<p>
						<input type="submit" name="addoffer_submit" value="<?php echo $loc['button']['t01']; ?>" class="others_button_sohranit" style="margin-top: 6px;">
					</p>
				</td>
			</tr>  
		</table>
	</form>
