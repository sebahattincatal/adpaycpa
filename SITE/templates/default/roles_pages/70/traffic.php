
<?php
// Если не переданы переменные (критерий поиска и поисковый запрос), то делать вывод по умолчанию.
// If the variable (the search criteria and search query) is not transferred, the inferred default.
if (!isset($_GET['search_type']) && !isset($_GET['search_zapros']))	
	{
	$default_view="1";
	$result = $mysqli->query( "SELECT COUNT(id) AS count FROM `clients_log` WHERE `user_id`!='0'" );
	} 
else 
	{
	$default_view="0"; 
	$search_type=htmlentities($_GET['search_type']); 
	$search_zapros=htmlentities($_GET['search_zapros']);

	if ($search_type=='1')
		{
		$sql33 = "SELECT id FROM users WHERE `email` LIKE '%$search_zapros%'";
		$q33 = $mysqli -> query($sql33);
		$res33=mysqli_fetch_array($q33);			
		$search_zapros=htmlentities($res33['id']);
		$result = $mysqli->query( "SELECT COUNT(id) AS count FROM `clients_log` WHERE `user_id` = '$search_zapros'" );
		}
	elseif ($search_type=='2')
		{
		$sql33 = "SELECT id FROM users WHERE `email` LIKE '%$search_zapros%'";
		$q33 = $mysqli -> query($sql33);
		$res33=mysqli_fetch_array($q33);			
		$search_zapros=htmlentities($res33['id']);
		$result = $mysqli->query( "SELECT COUNT(id) AS count FROM `clients_log` WHERE `owner_id` = '$search_zapros' AND `user_id`!='0'" );
		}
	elseif ($search_type=='3')
		{
		$result = $mysqli->query( "SELECT COUNT(id) AS count FROM `clients_log` WHERE `ip` = '$search_zapros' AND `user_id`!='0'" );
		}		
	elseif ($search_type=='4')
		{
		$sql33 = "SELECT id FROM offers WHERE `name` LIKE '%$search_zapros%'";
		$q33 = $mysqli -> query($sql33);
		$res33=mysqli_fetch_array($q33);			
		$search_zapros=htmlentities($res33['id']);
		$result = $mysqli->query("SELECT COUNT(id) AS count FROM `clients_log` WHERE `offer_id` = '$search_zapros' AND `user_id`!='0'");
		}		
	elseif ($search_type=='0')
		{
		$result = $mysqli->query("SELECT COUNT(id) AS count FROM `clients_log` WHERE `user_id`!='0'");
		}
	}
?>

<aside class="widget">
	<div class="widget-header">
		<div class="row">
			<div class="widget-title col-sm-6 col-xs-12">
				<h3>Traffic</h3>
			</div><!-- widget-title -->
		</div><!-- row -->
	</div><!-- widget-header -->

	<div class="widget-content">
		<div class="row">

			<div class="col-sm-12 col-xs-12">

				<form name="user_poisk" method="get" action="traffic.php" class="report finance-form landing-form">
					<div class="row">

						<div class="form-item col-sm-6 col-xs-12">
							<label><?php echo $loc['traffic.php']['t02']; ?></label>
							<select name="search_type" class="form-control form-select marginBottom10">
								<option class="options" value="0" <?php if (isset($_GET['search_type']) && $_GET['search_type']=='0') {echo 'selected="selected"';} ?>><?php echo $loc['traffic.php']['t04']; ?></option>
								<option class="options" value="1" <?php if (isset($_GET['search_type']) && $_GET['search_type']=='1') {echo 'selected="selected"';} ?>><?php echo $loc['traffic.php']['t32']; ?></option>
								<option class="options" value="2" <?php if (isset($_GET['search_type']) && $_GET['search_type']=='2') {echo 'selected="selected"';} ?>><?php echo $loc['traffic.php']['t33']; ?></option>
								<option class="options" value="3" <?php if (isset($_GET['search_type']) && $_GET['search_type']=='3') {echo 'selected="selected"';} ?>><?php echo $loc['traffic.php']['t05']; ?></option>
								<option class="options" value="4" <?php if (isset($_GET['search_type']) && $_GET['search_type']=='4') {echo 'selected="selected"';} ?>><?php echo $loc['traffic.php']['t06']; ?></option>
							</select>
							<label><?php echo $loc['traffic.php']['t03']; ?></label>
							<input type="text" class="form-control" name="search_zapros" class="search_pole" value="<? if (isset($_GET['search_zapros'])) {echo htmlentities($_GET['search_zapros']);} ?>" maxlength="100" />
							<div style="width:100%; margin-top:30px;">
								<input type="hidden" name="add"><button name="submit_search" value="<?php echo $loc['button']['t02']; ?>" class="others_button_vyvesti" type="submit" class="btn">Continue</button>
							</div>
						</div><!-- form-item -->

						<div class="form-item alert col-sm-6 col-xs-12">
							
						</div><!-- form-item -->

					</div><!-- row -->
				</form><!-- finance-form -->

				<div>
					<?php
					function build_pagination_url( $page ) 
						{
						$parameters = array
							(
							'traf_info' => '',
							'search_type' => ( isset($_GET['search_type']) ) ? $_GET['search_type'] : '0',
							'search_zapros' => ( isset($_GET['search_zapros'] ) ) ? $_GET['search_zapros'] : '',
							'page' => $page
							);
						return '?' . http_build_query( $parameters );
						}
					// Вывод количества страниц
					// Display the number of pages
					pagination($result,100,11);
					?>
				</div>

			</div>
			
			<span><?php echo $loc['traffic.php']['t34']; ?></span>

			<div class="finance-list">
				<div class="table-responsive">
					<table class="list-table display table" width="100%" >
				        <thead>
				          <tr>
				            <th><?php echo $loc['traffic.php']['t08']; ?></th>
							<th><?php echo $loc['traffic.php']['t35']; ?></th>
							<th><?php echo $loc['traffic.php']['t14']; ?></th>		
							<th><?php echo $loc['traffic.php']['t09']; ?></th>
							<th><?php echo $loc['traffic.php']['t36']; ?></th>		
							<th><?php echo $loc['traffic.php']['t17']; ?></th>
				          </tr>
				        </thead>
				        <tbody>
				          <?php 
								if ($default_view=="1")
									{
									if (isset($offset) && isset($show_pages))
										{
										$sql = "SELECT id,date,user_id,ip,offer_id,owner_id,referer FROM clients_log WHERE `user_id`!='0' ORDER BY `id` DESC LIMIT $offset, $show_pages";
										}
									else
										{
										$sql = "SELECT id,date,user_id,ip,offer_id,owner_id,referer FROM clients_log WHERE `user_id`!='0' ORDER BY `id` DESC";
										}
									}
								else
									{
									if ($search_type=='1')
										{
										if (isset($offset) && isset($show_pages))
											{
											$sql = "SELECT id,date,user_id,ip,offer_id,owner_id,referer FROM clients_log WHERE `user_id` = '$search_zapros' ORDER BY `id` DESC LIMIT $offset, $show_pages";
											}
										else
											{
											$sql = "SELECT id,date,user_id,ip,offer_id,owner_id,referer FROM clients_log WHERE `user_id` = '$search_zapros' ORDER BY `id` DESC";
											}
										}
									elseif ($search_type=='2')
										{
										if (isset($offset) && isset($show_pages))
											{
											$sql = "SELECT id,date,user_id,ip,offer_id,owner_id,referer FROM clients_log WHERE `owner_id` = '$search_zapros' AND `user_id`!='0' ORDER BY `id` DESC LIMIT $offset, $show_pages";
											}
										else
											{					
											$sql = "SELECT id,date,user_id,ip,offer_id,owner_id,referer FROM clients_log WHERE `owner_id` = '$search_zapros' AND `user_id`!='0' ORDER BY `id` DESC";
											}
										}	
									elseif ($search_type=='3')
										{
										if (isset($offset) && isset($show_pages))
											{
											$sql = "SELECT id,date,user_id,ip,offer_id,owner_id,referer FROM clients_log WHERE `ip` = '$search_zapros' AND `user_id`!='0' ORDER BY `id` DESC LIMIT $offset, $show_pages";
											}
										else
											{
											$sql = "SELECT id,date,user_id,ip,offer_id,owner_id,referer FROM clients_log WHERE `ip` = '$search_zapros' AND `user_id`!='0' ORDER BY `id` DESC";
											}
										}		
									elseif ($search_type=='4')
										{
										if (isset($offset) && isset($show_pages))
											{
											$sql = "SELECT id,date,user_id,ip,offer_id,owner_id,referer FROM clients_log WHERE `offer_id` = '$search_zapros' AND `user_id`!='0' ORDER BY `id` DESC LIMIT $offset, $show_pages";
											}
										else
											{
											$sql = "SELECT id,date,user_id,ip,offer_id,owner_id,referer FROM clients_log WHERE `offer_id` = '$search_zapros' AND `user_id`!='0' ORDER BY `id` DESC";
											}
										}			
									else
										{
										if (isset($offset) && isset($show_pages))
											{
											$sql = "SELECT id,date,user_id,ip,offer_id,owner_id,referer FROM clients_log WHERE `user_id`!='0' ORDER BY `id` DESC LIMIT $offset, $show_pages";
											}
											else
											{
											$sql = "SELECT id,date,user_id,ip,offer_id,owner_id,referer FROM clients_log WHERE `user_id`!='0' ORDER BY `id` DESC";
											}
										}
									}
									$q = $mysqli -> query($sql);
									$cvet=0;	
									if (mysqli_num_rows($q)>0)
										{
										$kolvo_strok=mysqli_num_rows($q);
										while($res=mysqli_fetch_array($q)) 
											{ 
											// Определяем текстовое название Оффера
											// Define a text name Offer
											$offer_id=htmlentities($res['offer_id']);
											$sql2 = "SELECT name FROM offers WHERE `id`='$offer_id'";
											$q2 = $mysqli -> query($sql2);
											$res2=mysqli_fetch_array($q2);
											// Определяем логины рекламодателя и вебмастера	
											// Define logins advertiser and webmaster
											$webmaster_id=htmlentities($res['user_id']);
											$reklamodatel_id=htmlentities($res['owner_id']);
											$sql3 = "SELECT email FROM users WHERE `id`='$webmaster_id'";
											$q3 = $mysqli -> query($sql3);
											$res3=mysqli_fetch_array($q3);			
											$wm_login=htmlentities($res3['email']);
											$sql3 = "SELECT email FROM users WHERE `id`='$reklamodatel_id'";
											$q3 = $mysqli -> query($sql3);
											$res3=mysqli_fetch_array($q3);			
											$rk_login=htmlentities($res3['email']);			
											?>
											<tr class="<?php if ( $cvet & 1 ) {echo 'col2';} else {echo '';} $cvet++; ?>">
												<td>
													<nobr><?php $qdata = strtotime( $res['date'] ); echo date( 'd.m.Y / H:i', $qdata ); ?></nobr>
												</td>
												<td>
													<nobr><?php if ($wm_login!='') {?><a href="./users.php?edit=<?php echo $webmaster_id; ?>" target="_blank"><?php echo $wm_login; ?></a><?php } else {echo $loc['traffic.php']['t29'];} ?></nobr>
												</td>
												<td>
													<nobr><?php echo htmlentities($res['ip']); ?></nobr>
												</td>
												<td>
													<nobr><?php if ($res2['name']!='') {?><a href="./offers.php?offer=<?php echo $offer_id; ?>" target="_blank"><?php echo html_entity_decode(htmlentities($res2['name']), ENT_QUOTES, 'utf-8'); ?></a><?php } else {?><font style="background: yellow; color: black;"><?php echo $loc['traffic.php']['t25']; ?></font><?php } ?></nobr>
												</td>
												<td>
													<nobr><?php if ($rk_login!='') {?><a href="./users.php?edit=<?php echo $reklamodatel_id; ?>" target="_blank"><?php echo $rk_login; ?></a><?php } else {echo $loc['traffic.php']['t29'];} ?></nobr>
												</td>			
												<td>
													<a href="<?php echo htmlentities($res['referer']); ?>" target="_blank" title="<?php echo htmlentities($res['referer']); ?>"><?php echo mb_substr(htmlentities($res['referer']), 0, 40, 'UTF-8'); ?></a>
												</td>			
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

<div>
	<?php
	// Вывод количества страниц
	// Display the number of pages
	pagination($pagination_fetched_row,100,11);
	?>
</div>

<br /><br />


