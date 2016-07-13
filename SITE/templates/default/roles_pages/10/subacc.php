

<aside class="widget">
	<div class="widget-header">
		<div class="row">
			<div class="widget-title col-sm-6 col-xs-12">
				<h3>SUB-ACCOUNT</h3>
				<span>Here you can get link for traffic attraction to any internal page of chosen landing page or online shop.</span>
			</div><!-- widget-title -->
		</div><!-- row -->
	</div><!-- widget-header -->

	<div class="widget-content">
		<div class="row">
			<div class="col-sm-12 col-xs-12">

			<form name="add_subacc" class="report" method="post" action="./subacc.php?<?php echo @$_SERVER['QUERY_STRING']; ?>">
				<script>
					function selectLandings()
						{
						var offer_id = $('select[name="offer_id"]').val();
						if(!offer_id)
							{
							$('p[name="landing_place"]').html('<b><?php echo $loc['subacc.php']['t10']; ?></b><br /><select name="landing_id" disabled="disabled"><option><?php echo $loc['subacc.php']['t09']; ?></option></select>');
							$('p[name="url_place"]').html('<b><?php echo $loc['subacc.php']['t11']; ?></b><br /><input type="text" name="page_url" disabled="disabled" value="<?php echo $loc['subacc.php']['t22']; ?>">');
							}
						else
							{
							$.ajax(
								{
								type: "POST",
								url: "/subacc_functions.php",
								data: { action: 'showLandingsNames', offer_id: offer_id },
								cache: false,
								success: function(responce){ $('p[name="landing_place"]').html(responce); }
								});
							};
						};
					function showPageUrl()
						{
						var landing_id = $('select[name="landing_id"]').val();
						if(!landing_id)
							{
							$('p[name="url_place"]').html('<b><?php echo $loc['subacc.php']['t11']; ?></b><br /><input type="text" name="page_url" disabled="disabled" value="<?php echo $loc['subacc.php']['t22']; ?>">');
							}
						else
							{
							$.ajax(
								{
								type: "POST",
								url: "/subacc_functions.php",
								data: { action: 'showLandingUrl', landing_id: landing_id },
								cache: false,
								success: function(responce){ $('p[name="url_place"]').html(responce); }
								});
							};
						};	
					function showButton()
						{
						var page_url = $('input[name="page_url"]').val();
						if(!page_url)
							{
							$('p[name="button_place"]').html('<input type="submit" name="submit_subacc" class="others_button_sohranit" value="<?php echo $loc['button']['t01']; ?>" style="display: none;">');
							}
						else
							{
							$.ajax(
								{
								type: "POST",
								url: "/subacc_functions.php",
								data: { action: 'showButtonPlace', page_url: page_url },
								cache: false,
								success: function(responce){ $('p[name="button_place"]').html(responce); }
								});
							};
						};			
					</script>
				<div class="row">
					<div class="form-item col-sm-6 col-xs-12">
						<label><?php echo $loc['subacc.php']['t08']; ?></label>
						<select name="offer_id" onchange="javascript:selectLandings();" class="form-control form-select marginBottom10">
							<option value=""><?php echo $loc['subacc.php']['t09']; ?></option>
							<?php
							$sql_getoffersdata = "SELECT id,name FROM offers WHERE `active`='1' ORDER BY `id` DESC";
							$result_getoffersdata = $mysqli->query($sql_getoffersdata);
							if (mysqli_num_rows($result_getoffersdata) > 0) 
								{
								while ($res_getoffersdata=mysqli_fetch_array($result_getoffersdata)) 
									{
									$offer_id=htmlentities($res_getoffersdata['id']);
									$offer_name=htmlentities($res_getoffersdata['name']);
									?>
									<option value="<?php echo $offer_id; ?>"><?php echo html_entity_decode($offer_name, ENT_QUOTES, 'utf-8'); ?></option>
									<?php
									}
								}
							?>
						</select>
						<label><?php echo $loc['subacc.php']['t10']; ?></label>
						<select name="landing_id" disabled="disabled" class="form-control form-select marginBottom10">
							<option><?php echo $loc['subacc.php']['t09']; ?></option>
						</select>
						<label><?php echo $loc['subacc.php']['t11']; ?></label>
						<div class="internal-page">http://adpaystat.com/miseendior/<input type="text" name="page_url" disabled="disabled" value="- Не указано -" class="form-control marginBottom10" placeholder="Any"></div>

						<div style="width:100%; margin-top:30px;">
							<button type="submit" name="submit_subacc" class="btn" value="<?php echo $loc['button']['t01']; ?>" style="display: none;">Save</button>
						</div>
					</div><!-- form-item -->

					<div class="form-item col-sm-6 col-xs-12">

					</div><!-- form-item -->

				</div><!-- row -->
			</form><!-- finance-form -->

		</div>

		<span><?php echo $loc['subacc.php']['t12']; ?></span>
		
		<div class="finance-list">
			<div class="table-responsive">
				<table class="horizontal-table display nowrap" cellspacing="0" width="100%" >
			        <thead>
			          <tr>
			            <th><?php echo $loc['subacc.php']['t13']; ?></th>
						<th><?php echo $loc['subacc.php']['t14']; ?></th>
						<th><?php echo $loc['subacc.php']['t15']; ?></th>	
						<th><?php echo $loc['subacc.php']['t16']; ?></th>	
						<th><?php echo $loc['subacc.php']['t17']; ?></th>
			          </tr>
			        </thead>
			        <tbody>
			          <?php
							$sql_getsubaccdata = "SELECT * FROM subacc WHERE `user_id`='$user_id' ORDER BY `id` DESC";
							$result_getsubaccdata = $mysqli->query($sql_getsubaccdata);
							if (mysqli_num_rows($result_getsubaccdata) > 0) 
								{
								while ($res_getsubaccdata=mysqli_fetch_array($result_getsubaccdata)) 
									{
									$subacc_id=htmlentities($res_getsubaccdata['id']);
									$subacc_offer_id=htmlentities($res_getsubaccdata['offer_id']);
									$subacc_landing_id=htmlentities($res_getsubaccdata['landing_id']);
									$subacc_page=htmlentities($res_getsubaccdata['page']);
									
									// Определяем домен который используется для лендингов
									// Determine the domain that is used for landing
									$sql_domain = "SELECT domain FROM domains WHERE `active`='1' ORDER BY `id` DESC";
									$result_domain = $mysqli->query($sql_domain);
									$res_domain=mysqli_fetch_array($result_domain);
									$domain=htmlentities($res_domain['domain']);
									$subacc_link='http://'.$domain.'/?s='.$subacc_id;
									
									// Определяем название оффера
									// Determine the name offer
									$sql_getnameoffer = "SELECT name FROM offers WHERE `id`='$subacc_offer_id'";
									$result_getnameoffer = $mysqli->query($sql_getnameoffer);
									$res_getnameoffer=mysqli_fetch_array($result_getnameoffer);
									$offer_name=htmlentities($res_getnameoffer['name']);
									
									// Определяем название лендинга
									// Determine the name of landing
									$sql_getnamelanding = "SELECT name FROM landings WHERE `id`='$subacc_landing_id'";
									$result_getnamelanding = $mysqli->query($sql_getnamelanding);
									$res_getnamelanding=mysqli_fetch_array($result_getnamelanding);
									$landing_name=htmlentities($res_getnamelanding['name']);				
									?>
									<tr>
										<td><?php if (isset($subacc_offer_id)) {echo html_entity_decode($offer_name, ENT_QUOTES, 'utf-8');} ?></td>
										<td><?php if (isset($subacc_landing_id)) {echo html_entity_decode($landing_name, ENT_QUOTES, 'utf-8');} ?></td>
										<td><?php if (isset($subacc_page)) {echo html_entity_decode($subacc_page, ENT_QUOTES, 'utf-8');} ?></td>	
										<td><?php if (isset($subacc_link)) {echo $subacc_link;} ?></td>	
										<td>&nbsp;<a href="./subacc.php?delete=<?php if (isset($subacc_id)) {echo $subacc_id;} ?>" onclick="if (!confirm('<?php echo $loc['subacc.php']['t18']; ?>'))return false;"><?php echo $loc['subacc.php']['t19']; ?></a>&nbsp;</td>	
									</tr>	
									<?php
									}
								}
							?>
			        	</tbody>
					</table>
				</div>
			</div><!-- finance-list -->
		</div><!-- row -->
	</div><!-- widget-content -->
</aside><!-- widget -->


