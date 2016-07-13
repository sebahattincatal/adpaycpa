
<aside class="widget">
	<div class="widget-header">
		<div class="row">
			<div class="widget-title col-sm-6 col-xs-12">
				<h3>Users</h3>
			</div><!-- widget-title -->
		</div><!-- row -->
	</div><!-- widget-header -->

	<?php
		if (isset($_GET['edit']) && $_GET['edit']!='')
		{
		$id_edit=htmlentities($_GET['edit']);
		$sql = "SELECT * FROM users WHERE `id`='$id_edit'";
		$result = $mysqli->query($sql);
		if (mysqli_num_rows($result) > 0) 
			{
			$res=mysqli_fetch_array($result);
			$cur_id=htmlentities($res['id']);
			$cur_name=htmlentities($res['name']);
			$cur_email=htmlentities($res['email']);
			$cur_phone=htmlentities($res['phone']);
			$cur_skype=htmlentities($res['skype']);
			$cur_icq=htmlentities($res['icq']);		
			$cur_active=htmlentities($res['active']);
			$cur_ip=htmlentities($res['ip']);
			$cur_date_activity=htmlentities($res['date_activity']);
			$cur_hold=htmlentities($res['hold']);
			$cur_balance=htmlentities($res['balance']);
			$cur_tip_acc=htmlentities($res['tip']);
			$cur_uroven_dostupa=htmlentities($res['uroven_dostupa']);
			$cur_wmr=htmlentities($res['wmr']);
			
			// Определяем дату и время регистрации пользователя
			// Determine the date and time the user logs
			$sql_registration_date = "SELECT date FROM users_log WHERE `id_user`='$cur_id' ORDER BY `id` ASC LIMIT 1";
			$result_registration_date = $mysqli->query($sql_registration_date);
			if (mysqli_num_rows($result_registration_date) > 0) 
				{
				$res_registration_date=mysqli_fetch_array($result_registration_date);
				$cur_registration_date=date('d.m.Y / H:m:s', $cur_registration_date = strtotime(htmlentities($res_registration_date['date'])));
				}
			else
				{
				$cur_registration_date='Нет данных';
				}
		?>

		<div class="widget-content">
			<div class="row">

				<div class="col-sm-12 col-xs-12">

					<form class="finance-form landing-form" name="user_poisk" class="report" method="get" action="./users.php?<?php echo @$_SERVER['QUERY_STRING']?>">
						<div class="row">

							<div class="form-item col-sm-6 col-xs-12">
								<label><?php echo $loc['users.php']['t26']; ?></label>
								<select name="search_type" class="form-control form-select marginBottom10">
									<option class="options" value="1" <? if (isset($_GET['search_type']) && $_GET['search_type']=='1') {echo 'selected="selected"';} ?>><?php echo $loc['users.php']['t29']; ?></option>
								</select>
								<label><?php echo $loc['users.php']['t27']; ?></label>
								<input type="text" name="search_zapros" class="form-control search_pole" value="<? if (isset($_GET['search_zapros'])) {echo $_GET['search_zapros'];} ?>" maxlength="100" />
								<div style="width:100%; margin-top:30px;">
									<input type="hidden" name="add"><button name="submit_search" value="<?php echo $loc['button']['t02']; ?>" class="btn others_button_vyvesti" type="submit" >Search by E-mail</button>
								</div>
							</div><!-- form-item -->

							<div class="form-item alert col-sm-6 col-xs-12">
								
							</div><!-- form-item -->

						</div><!-- row -->
					</form><!-- finance-form -->

				</div>

				<div class="finance-list">
					<div class="table-responsive">
						<table class="list-table display table" width="100%" >
					        <thead>
					          <tr>
					            <th><?php echo $loc['users.php']['t30']; ?></th>	
								<th><?php echo $loc['users.php']['t31']; ?></th>
								<th><?php echo $loc['users.php']['t32']; ?></th>
								<th><?php echo $loc['users.php']['t33']; ?></th>		
								<th><?php echo $loc['users.php']['t34']; ?></th>			
								<th><?php echo $loc['users.php']['t35']; ?></th>		
								<th><?php echo $loc['users.php']['t36']; ?></th>
								<th><?php echo $loc['users.php']['t37']; ?></th>		
								<th><?php echo $loc['users.php']['t38']; ?></th>
					          </tr>
					        </thead>
					        <tbody>
					          <tr>
					            <td><nobr><a href="users.php?id=<?php if (isset($_GET['id']) && $_GET['id']=='desc') {echo "asc";} else {echo "desc";} ?>"><?php echo $loc['users.php']['t30']; ?></a></nobr></td>	
								<td><nobr><?php echo $loc['users.php']['t31']; ?></nobr></td>
								<td><nobr><a href="users.php?hold=<?php if (isset($_GET['hold']) && $_GET['hold']=='desc') {echo "asc";} else {echo "desc";} ?>"><?php echo $loc['users.php']['t32']; ?></a></nobr></td>
								<td><nobr><a href="users.php?balance=<?php if (isset($_GET['balance']) && $_GET['balance']=='desc') {echo "asc";} else {echo "desc";} ?>"><?php echo $loc['users.php']['t33']; ?></a></nobr></td>		
								<td><nobr><a href="users.php?tip=<?php if (isset($_GET['tip']) && $_GET['tip']=='desc') {echo "asc";} else {echo "desc";} ?>"><?php echo $loc['users.php']['t34']; ?></a></nobr></td>			
								<td><nobr><a href="users.php?dostup=<?php if (isset($_GET['dostup']) && $_GET['dostup']=='desc') {echo "asc";} else {echo "desc";} ?>"><?php echo $loc['users.php']['t35']; ?></a></nobr></td>		
								<td><nobr><a href="users.php?ip=<?php if (isset($_GET['ip']) && $_GET['ip']=='desc') {echo "asc";} else {echo "desc";} ?>"><?php echo $loc['users.php']['t36']; ?></a></nobr></td>
								<td><nobr><a href="users.php?date_activity=<?php if (isset($_GET['date_activity']) && $_GET['date_activity']=='desc') {echo "asc";} else {echo "desc";} ?>"><?php echo $loc['users.php']['t37']; ?></a></nobr></td>		
								<td><nobr><?php echo $loc['users.php']['t38']; ?></nobr></td>
					          </tr>

					          <?
								if (isset($_GET['id']) && $_GET['id']=='desc') {$sql = "SELECT * FROM users ORDER BY `id` DESC LIMIT $offset, $show_pages";}
								elseif (isset($_GET['id']) && $_GET['id']=='asc') {$sql = "SELECT * FROM users ORDER BY `id` ASC LIMIT $offset, $show_pages";}			
								elseif (isset($_GET['balance']) && $_GET['balance']=='desc') {$sql = "SELECT * FROM users ORDER BY `balance` DESC LIMIT $offset, $show_pages";}
								elseif (isset($_GET['balance']) && $_GET['balance']=='asc') {$sql = "SELECT * FROM users ORDER BY `balance` ASC LIMIT $offset, $show_pages";}				
								elseif (isset($_GET['hold']) && $_GET['hold']=='desc') {$sql = "SELECT * FROM users ORDER BY `hold` DESC LIMIT $offset, $show_pages";}
								elseif (isset($_GET['hold']) && $_GET['hold']=='asc') {$sql = "SELECT * FROM users ORDER BY `hold` ASC LIMIT $offset, $show_pages";}				
								elseif (isset($_GET['ip']) && $_GET['ip']=='desc') {$sql = "SELECT * FROM users ORDER BY `ip` DESC LIMIT $offset, $show_pages";}	
								elseif (isset($_GET['ip']) && $_GET['ip']=='asc') {$sql = "SELECT * FROM users ORDER BY `ip` ASC LIMIT $offset, $show_pages";}					
								elseif (isset($_GET['date_activity']) && $_GET['date_activity']=='desc') {$sql = "SELECT * FROM users ORDER BY `date_activity` DESC LIMIT $offset, $show_pages";}	
								elseif (isset($_GET['date_activity']) && $_GET['date_activity']=='asc') {$sql = "SELECT * FROM users ORDER BY `date_activity` ASC LIMIT $offset, $show_pages";}
								elseif (isset($_GET['tip']) && $_GET['tip']=='desc') {$sql = "SELECT * FROM users ORDER BY `tip` DESC LIMIT $offset, $show_pages";}	
								elseif (isset($_GET['tip']) && $_GET['tip']=='asc') {$sql = "SELECT * FROM users ORDER BY `tip` ASC LIMIT $offset, $show_pages";}					
								elseif (isset($_GET['dostup']) && $_GET['dostup']=='desc') {$sql = "SELECT * FROM users ORDER BY `uroven_dostupa` DESC LIMIT $offset, $show_pages";}	
								elseif (isset($_GET['dostup']) && $_GET['dostup']=='asc') {$sql = "SELECT * FROM users ORDER BY `uroven_dostupa` ASC LIMIT $offset, $show_pages";}					
								else {$sql = "SELECT * FROM users ORDER BY `id` DESC LIMIT $offset, $show_pages";}
								$result = $mysqli->query($sql);
								$cvet=0;
								if (mysqli_num_rows($result) > 0) 
									{
									while($res=mysqli_fetch_array($result)) 
										{ 
										$cur_id=htmlentities($res['id']);
										$cur_email=htmlentities($res['email']);
										$cur_active=htmlentities($res['active']);
										$cur_hold=htmlentities($res['hold']);
										$cur_balance=htmlentities($res['balance']);
										$cur_tip_acc=htmlentities($res['tip']);
										$cur_uroven_dostupa=htmlentities($res['uroven_dostupa']);
										$cur_ip=htmlentities($res['ip']);
										$cur_date_activity=htmlentities($res['date_activity']);
										?> 
										<tr class="<?php if ( $cvet & 1 ) {echo 'col2';} else {echo '';} $cvet++; ?>">
											<td style="<?php
												if ($cur_active=='0') {?>background: yellow; color: black;<?}
												if ($cur_active=='1') {?>background: green; color: white;<?}
												if ($cur_active=='5') {?>background: red; color: white;<?} 
												?>"><nobr><?php echo $cur_id; ?></nobr>
											</td>
											<td><nobr><?php echo $cur_email; ?></nobr></td>
											<td><nobr><?php echo $cur_hold; ?></nobr></td>
											<td><nobr><?php echo $cur_balance; ?></nobr></td>
											<td>
												<nobr>
													<?php
													$sql_uroven = "SELECT title FROM users_roles_tpl WHERE `tip`='$cur_tip_acc'";
													$result_uroven = $mysqli->query($sql_uroven);
													$res_uroven=mysqli_fetch_array($result_uroven);
													echo htmlentities($res_uroven['title']);
													?>
												</nobr>
											</td>			
											<td>
												<nobr>
													<?php
													$sql_ur_v = "SELECT tip_account, uroven_dostupa, opisanie FROM uroven_tpl WHERE `uroven_dostupa`='$cur_uroven_dostupa' AND `tip_account`='$cur_tip_acc'";
													$result_ur_v = $mysqli->query($sql_ur_v);
													$res_ur_v=mysqli_fetch_array($result_ur_v);
													if ($res_ur_v['opisanie']!='')
														{echo htmlentities($res_ur_v['opisanie']);}
													else
														{echo $loc['users.php']['t21'];}
													?>
												</nobr>
											</td>			
											<td><nobr><?php echo $cur_ip; ?></nobr></td>			
											<td><nobr><?php echo date('d.m.Y / H:m:s', $cur_date_activity = strtotime($cur_date_activity)); ?></nobr></td>
											<td><nobr><a href="users.php?edit=<?php echo $cur_id; ?>"><?php echo $loc['users.php']['t39']; ?></a>&nbsp;|&nbsp;<a target="_blank" href="./tickets.php?komu=<?php echo $cur_id; ?>"><span class="send_ticket"></span></a></nobr></td>
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
				
		<?php
		}
	}
?>






















