<?php
// Блок с выводом отдельно взятого заказа
// Block with the output of a single order
if (isset($_GET['ob']) && $_GET['ob']!='' && $user_tip=='70')
	{
	$ob=htmlentities($_GET['ob']);
	$sql_zakaz_view = "SELECT * FROM zakaz WHERE `id`='$ob'";
	$result_zakaz_view = $mysqli->query($sql_zakaz_view);
	if (mysqli_num_rows($result_zakaz_view)>0) 
		{
		$res_zakaz_view=mysqli_fetch_array($result_zakaz_view);
				
		$zakaz_view_id=htmlentities($res_zakaz_view['id']);
		$zakaz_view_number=htmlentities($res_zakaz_view['zakaz_number']);
		$zakaz_view_user_id=htmlentities($res_zakaz_view['user_id']);
		$zakaz_view_offer_id=htmlentities($res_zakaz_view['offer_id']);
		$zakaz_view_owner_id=htmlentities($res_zakaz_view['owner_id']);
		$zakaz_view_landing_id=htmlentities($res_zakaz_view['landing_id']);
		$zakaz_view_date=htmlentities($res_zakaz_view['date']);
		$zakaz_view_geo=htmlentities($res_zakaz_view['geo']);
		$zakaz_view_ip=htmlentities($res_zakaz_view['ip']);
		$zakaz_view_referer=htmlentities($res_zakaz_view['referer']);
		$zakaz_view_useragent=htmlentities($res_zakaz_view['useragent']);
		$zakaz_view_subid1=htmlentities($res_zakaz_view['subid1']);
		$zakaz_view_subid2=htmlentities($res_zakaz_view['subid2']);
		$zakaz_view_subid3=htmlentities($res_zakaz_view['subid3']);
		$zakaz_view_name=htmlentities($res_zakaz_view['name']);
		$zakaz_view_phone=htmlentities($res_zakaz_view['phone']);
		$zakaz_view_email=htmlentities($res_zakaz_view['email']);
		$zakaz_view_client_address=htmlentities($res_zakaz_view['client_address']);
		$zakaz_view_street=htmlentities($res_zakaz_view['street']);
		$zakaz_view_dom=htmlentities($res_zakaz_view['dom']);
		$zakaz_view_kvartira=htmlentities($res_zakaz_view['kvartira']);
		$zakaz_view_kolvo=htmlentities($res_zakaz_view['kolvo']);
		$zakaz_view_cena=htmlentities($res_zakaz_view['cena']);
		$zakaz_view_artikul=htmlentities($res_zakaz_view['artikul']);
		$zakaz_view_comission=htmlentities($res_zakaz_view['comission']);
		$zakaz_view_status=htmlentities($res_zakaz_view['status']);
		$zakaz_view_addstatus=htmlentities($res_zakaz_view['addstatus']);
		$zakaz_view_comments=htmlentities($res_zakaz_view['comments']);
		$zakaz_view_tracking_number=htmlentities($res_zakaz_view['tracking_number']);
		$zakaz_view_post_status=htmlentities($res_zakaz_view['post_status']);
		$zakaz_view_country=htmlentities($res_zakaz_view['country']);
		$zakaz_view_zipcode=htmlentities($res_zakaz_view['zipcode']);
		$zakaz_view_short_country=htmlentities($res_zakaz_view['short_country']);
		$zakaz_view_browser_name=htmlentities($res_zakaz_view['browser_name']);
		$zakaz_view_browser_version=htmlentities($res_zakaz_view['browser_version']);
		$zakaz_view_platform=htmlentities($res_zakaz_view['platform']);
		$zakaz_view_mobile=htmlentities($res_zakaz_view['mobile']);
		$zakaz_view_region=htmlentities($res_zakaz_view['region']);
		$zakaz_view_town=htmlentities($res_zakaz_view['town']);
		$zakaz_view_date_obrabotka=htmlentities($res_zakaz_view['date_obrabotka']);
		$zakaz_view_shop_zakaz_id=htmlentities($res_zakaz_view['shop_zakaz_id']);
		
		// Получаем данные об оффере по которому был заказ
		// Get the data on offer by which the order was
		$sql_offer = "SELECT * FROM offers WHERE id = $zakaz_view_offer_id";
		$result_offer = $mysqli->query($sql_offer);
		$res_offer=mysqli_fetch_array($result_offer);
		$zakaz_offer_name=htmlentities($res_offer['name']);
		$zakaz_offer_cena=htmlentities($res_offer['cena']);
		$zakaz_offer_deystvie=htmlentities($res_offer['deystvie']);
		$zakaz_offer_sms_ok=htmlentities($res_offer['sms_ok']);
		?>
			
			<aside class="widget">
				<div class="widget-header">
					<div class="row">
						<div class="widget-title col-sm-6 col-xs-12">
							<h3>Orders</h3>
							
						</div><!-- widget-title -->
					</div><!-- row -->
				</div><!-- widget-header -->

				<div class="widget-content">
					<div class="row">
						
						<div class="statics-table-form-filter">
							<div class="asd">
								<div class="row">
									<form method="get" action="./zakaz.php" class="orders-form">
										<div class="col-sm-6 form-filter-item">
											<div class="row">
												<div class="col-sm-6 col-xs-12">
											        <div class="control-group">
											          <div class="controls">
											          	<label>Period From</label>
											          	<i class="fa fa-calendar"></i>
											            <input type="text" id="dpd1"  class="span2 form-control" name="date1" maxlength="10" value="<?php if ( !isset( $_GET['date1'] ) ) {echo date('d.m.Y',strtotime($dat1));} else {echo $_GET['date1'];} ?>" style="width: 87px; height: 24px; border: 1; margin: 0; padding: 0; text-align: center;" id="datepicker" readonly />
											          </div>
											        </div>
												</div>
												<div class="col-sm-6 col-xs-12">
											        <div class="control-group">
											          <div class="controls">
											          	<label>Period To</label>
											          	<i class="fa fa-calendar"></i>
											            <input type="text" class="span2 form-control" id="dpd2" name="date2" maxlength="10" value="<?php if ( !isset( $_GET['date2'] ) ) {echo date('d.m.Y',strtotime($dat2));} else {echo $_GET['date2'];} ?>" style="width: 87px; height: 24px; border: 1; margin: 0; padding: 0; text-align: center;" id="datepicker2" readonly />
											          </div>
											        </div>
												</div>
											</div><!-- row -->
										</div>
										<div class="col-sm-6 form-filter-item">
											<label><?php echo $loc['zakaz.php']['t14']; ?></label>
											<select name="status" style="height: 27px;" class="form-control">
											<option class="options" value="-1" <?php if (isset($_GET['status']) && $_GET['status']=="-1") { ?>selected="selected"<?php } ?>><?php echo $loc['zakaz.php']['t123']; ?></option>
											<option class="options" value="1" <?php if (!isset($_GET['status']) || $_GET['status']=="1") { ?>selected="selected"<?php } ?>><?php echo $loc['zakaz.php']['t124']; ?></option>
											<option class="options" value="2" <?php if (isset($_GET['status']) && $_GET['status']=="2") { ?>selected="selected"<?php } ?>><?php echo $loc['zakaz.php']['t125']; ?></option>
											<option class="options" value="3" <?php if (isset($_GET['status']) && $_GET['status']=="3") { ?>selected="selected"<?php } ?>><?php echo $loc['zakaz.php']['t126']; ?></option>
											<option class="options" value="0" <?php if (isset($_GET['status']) && $_GET['status']=="0") { ?>selected="selected"<?php } ?>><?php echo $loc['zakaz.php']['t127']; ?></option>
											</select>
										</div>

										<div class="col-sm-6 form-filter-item">
											<label><?php echo $loc['zakaz.php']['t13']; ?></label>
											<select name="offer" style="height: 27px;" class="form-control">
												<option class="options" value="-1"><?php echo $loc['zakaz.php']['t123']; ?></option>
												<?php
												$sql_offer_view = "SELECT DISTINCT offer_id FROM zakaz";
												$result_offer_view = $mysqli->query($sql_offer_view);
												if (mysqli_num_rows($result_offer_view)>0) 
													{
													while($res_offer_view=mysqli_fetch_array($result_offer_view)) 
														{
														$of_id=htmlentities($res_offer_view['offer_id']);
														$sql_offer_name = "SELECT name FROM offers WHERE `id`='$of_id'";
														$result_offer_name = $mysqli->query($sql_offer_name);
														$res_offer_name=mysqli_fetch_array($result_offer_name);
														$of_name=htmlentities($res_offer_name['name']);
														?>
														<option class="options" value="<?php echo $of_id; ?>"<?php if (isset($_GET['offer']) && $_GET['offer']==$of_id) {echo 'selected="selected"';} ?>><?php echo $of_name; ?></option>
														<?php
														}
													}
												?>
											</select>
										</div>

										<div class="col-sm-6 form-filter-item">
											<label><?php echo $loc['zakaz.php']['t55']; ?></label>
											<select name="webmaster" style="height: 27px;">
												<option class="options form-control" value="-1"><?php echo $loc['zakaz.php']['t123']; ?></option>
												<?php
												$sql_webmaster_view = "SELECT DISTINCT user_id FROM zakaz";
												$result_webmaster_view = $mysqli->query($sql_webmaster_view);
												if (mysqli_num_rows($result_webmaster_view)>0) 
													{
													while($res_webmaster_view=mysqli_fetch_array($result_webmaster_view)) 
														{
														$id_webmaster=htmlentities($res_webmaster_view['user_id']);
														?>
														<option class="options" value="<?php echo $id_webmaster; ?>"<?php if (isset($_GET['webmaster']) && $_GET['webmaster']==$id_webmaster) {echo 'selected="selected"';} ?>><?php echo $id_webmaster; ?></option>
														<?php
														}
													}
												?>
											</select>
										</div>

										<div class="col-sm-8 form-filter-item last-item">
											<button name="submit" value="<?php echo $loc['button']['t02']; ?>" class="btn others_button_vyvesti" type="submit" style="top: -2px; margin-left: 0px;">Filter Table</button>
											<a href="./zakaz.php"><?php echo $loc['zakaz.php']['t128']; ?></a>
											<input type="hidden" name="page" value="1">
										</div>

										<div class="col-sm-12 col-xs-12 form-list-filter">
											<a href="./zakaz.php?<?=prepare_get_query($_GET,Array('status' => 1, 'page' => 1))?>"><?php echo $loc['zakaz.php']['t07']; ?>&nbsp;<?php if (isset($k_zakaz_wait) && $k_zakaz_wait>0) {echo "(".$k_zakaz_wait.")";} ?></a>
											<a href="./zakaz.php?<?=prepare_get_query($_GET,Array('status' => 2, 'page' => 1))?>"><?php echo $loc['zakaz.php']['t09']; ?>&nbsp;<?php if (isset($k_zakaz_hold) && $k_zakaz_hold>0) {echo "(".$k_zakaz_hold.")";} ?></a>
											<a href="./zakaz.php?<?=prepare_get_query($_GET,Array('status' => 3, 'page' => 1))?>"><?php echo $loc['zakaz.php']['t145']; ?>&nbsp;<?php if (isset($k_zakaz_ok) && $k_zakaz_ok>0) {echo "(".$k_zakaz_ok.")";} ?></a>
											<a href="./zakaz.php?<?=prepare_get_query($_GET,Array('status' => 0, 'page' => 1))?>"><?php echo $loc['zakaz.php']['t130']; ?>&nbsp;<?php if (isset($k_zakaz_cancel) && $k_zakaz_cancel>0) {echo "(".$k_zakaz_cancel.")";} ?></a>
										</div>
									</form><!-- form -->
								</div><!-- row -->
							</div>
						</div><!-- statics-table-form-filter -->
						
						<div class="statics-table text-center">

							<div class="table-responsive">
								<table class="list-table display table" width="100%" >
							        <thead>
							          <tr>
						                  <th colspan="3">Traffic</th>
						                  <th colspan="4">Actions</th>
						                  <th colspan="4">Finance</th>
						                  <th colspan="2">Conversion</th>
						              </tr>
							          <tr>
							            <th>Date</th>
							            <th>Clicks</th>
							            <th>Hosts</th>
							            <th>Accepted</th>
							            <th>Hold</th>
							            <th>Pending</th>
							            <th>Rejected</th>
							            <th>Accepted</th>
							            <th>Hold</th>
							            <th>Pending</th>
							            <th>Rejected</th>
							            <th>CR,%</th>
							            <th>EPC</th>
							          </tr>
							        </thead>
							        <tbody>
							          <?php
										// получаем результат и вызываем файл zakaz_sql.php, в котором выводится результат
										// Get the result and call zakaz_sql.php file in which the result is output
										$result_to_display=$zp->get_result();
										include('zakaz_sql.php');
									  ?>
							        </tbody>
							        <tfoot>
							          <tr>
							            <th>Total</th>
							            <th>3</th>
							            <th>2</th>
							            <th>0</th>
							            <th>0</th>
							            <th>0</th>
							            <th>0</th>
							            <th>0 p.</th>
							            <th>0 p.</th>
							            <th>0 p.</th>
							            <th>0 p.</th>
							            <th>0</th>
							            <th>0</th>
							          </tr>
							        </tfoot>
								</table>
							</div>

						</div><!-- statics-table -->

					</div><!-- row -->
				</div><!-- widget-content -->
			</aside><!-- widget -->

		<div>
			<?php echo $paging_html; ?>
		</div>

		<?php
	}
?>		
