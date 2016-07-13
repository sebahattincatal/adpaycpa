
<h1><?php echo $loc['users.php']['t01']; ?></h1>

<p>
	<?php if (isset($xtext) && $xtext!='') { ?><p><?php echo $xtext; ?></p><? } ?>
</p>

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
		<p>
			<b><?php echo $loc['users.php']['t02']; ?></b>&nbsp;<?php echo $cur_email; ?> <a target="_blank" href="./tickets.php?komu=<?php echo $cur_id; ?>"><span class="send_ticket"></span></a>, <b>Статус:</b>  
			<?php
			if ($cur_active=='0') {?><font style="background: yellow; color: black;">&nbsp;<?php echo $loc['users.php']['t03']; ?>&nbsp;</font><?}
			if ($cur_active=='1') {?><font style="background: green; color: white;">&nbsp;<?php echo $loc['users.php']['t04']; ?>&nbsp;</font><?}
			if ($cur_active=='5') {?><font style="background: red; color: white;">&nbsp;<?php echo $loc['users.php']['t05']; ?>&nbsp;</font><?}			
			?>
		</p>
		
		<p>
			<form name="edit_user" method="post" action="./users.php?<?php echo @$_SERVER['QUERY_STRING']; ?>">		
				<table>
					<tr height="60">
						<td style="width: 250px;">
							<b><?php echo $loc['users.php']['t06']; ?></b><br />
							<input type="text" name="email" value="<?php echo $cur_email; ?>">
						</td>
						<td>
							<b><?php echo $loc['users.php']['t07']; ?></b><br />
							<input type="text" name="wmr" value="<?php echo $cur_wmr; ?>">
						</td>				
					</tr>
					<tr height="60">
						<td>
							<b><?php echo $loc['users.php']['t08']; ?></b><br />
							<input type="text" name="name" value="<?php echo $cur_name; ?>">
						</td>
						<td>
							<b><?php echo $loc['users.php']['t09']; ?></b><br />
							<?php echo $cur_ip;	?>
							<input type="hidden" name="ip" value="<?php echo $cur_ip; ?>">
						</td>				
					</tr>
					<tr height="60">
						<td>
							<b><?php echo $loc['users.php']['t09']; ?></b><br />
							<input type="text" name="phone" value="<?php echo $cur_phone; ?>">
						</td>
						<td>
							<b><?php echo $loc['users.php']['t10']; ?></b><br />
							<input type="text" name="hold" value="<?php echo $cur_hold; ?>">
						</td>			
					</tr>
					<tr height="60">
						<td>
							<b><?php echo $loc['users.php']['t11']; ?></b><br />
							<input type="text" name="skype" value="<?php echo $cur_skype; ?>">
						</td>
						<td>
							<b><?php echo $loc['users.php']['t12']; ?></b><br />
							<input type="text" name="balance" value="<?php echo $cur_balance; ?>">
						</td>				
					</tr>
					<tr height="60">
						<td>
							<b><?php echo $loc['users.php']['t13']; ?></b><br />
							<input type="text" name="icq" value="<?php echo $cur_icq; ?>">
						</td>
						<td>
							<b><?php echo $loc['users.php']['t14']; ?></b><br />
							<?php 
							echo date('d.m.Y / H:m:s', $cur_date_activity = strtotime($cur_date_activity));
							?>
						</td>				
					</tr>			
					<tr height="60">
						<td>
							<b><?php echo $loc['users.php']['t15']; ?></b><br />
							<input type="password" name="password" value="">
						</td>
						<td>
							<b><?php echo $loc['users.php']['t16']; ?></b><br />
							<?php 
							echo $cur_registration_date;
							?>
						</td>			
					</tr>			
				</table>
				<p>
					<b><?php echo $loc['users.php']['t17']; ?></b>&nbsp;
					<select name="active">
						<option value="0"<?php if ($cur_active=='0') {?>selected="selected"<?} ?>><?php echo $loc['users.php']['t18']; ?></option>
						<option value="1"<?php if ($cur_active=='1') {?>selected="selected"<?} ?>><?php echo $loc['users.php']['t04']; ?></option>			
						<option value="5"<?php if ($cur_active=='5') {?>selected="selected"<?} ?>><?php echo $loc['users.php']['t05']; ?></option>
					</select>
				</p>
				<p>
					<b><?php echo $loc['users.php']['t19']; ?></b>&nbsp;
					<select name="tip">
						<?php
						$sql_uroven = "SELECT tip,title FROM users_roles_tpl WHERE active='1'";
						$result_uroven = $mysqli->query($sql_uroven);
						if (mysqli_num_rows($result_uroven) > 0) 
							{
							while($res_uroven=mysqli_fetch_array($result_uroven)) 
								{ 
								?>
								<option value="<?php echo htmlentities($res_uroven['tip']); ?>"<?php if ($cur_tip_acc==$res_uroven['tip']) {?>selected="selected"<?} ?>><?php echo htmlentities($res_uroven['title']); ?></option>
								<?php
								}
							}
						?>
					</select>
				</p>
				<p>
					<b><?php echo $loc['users.php']['t20']; ?></b>&nbsp;
					<?php
					if ($cur_tip_acc=='10' || $cur_tip_acc=='40')
						{
						?>
						<select name="uroven_dostupa">
							<?php
							$sql_ur_v = "SELECT tip_account, uroven_dostupa, opisanie FROM uroven_tpl WHERE `uroven_dostupa`='$cur_uroven_dostupa' AND `tip_account`='$cur_tip_acc'";
							$result_ur_v = $mysqli->query($sql_ur_v);
							$res_ur_v=mysqli_fetch_array($result_ur_v);
							?>
							<option value="<?php echo htmlentities($res_ur_v['uroven_dostupa']); ?>" selected="selected"><?php echo htmlentities($res_ur_v['opisanie']); ?></option>
							<?php
							// Запоминаем текущий уровень пользователя
							// Stores the current user level
							$selected_uroven=$res_ur_v['uroven_dostupa'];
							$sql_ur_v = "SELECT tip_account, uroven_dostupa, opisanie FROM uroven_tpl WHERE `tip_account`='$cur_tip_acc'";
							$result_ur_v = $mysqli->query($sql_ur_v);
							if (mysqli_num_rows($result_ur_v) > 0) 
								{
								while($res_ur_v=mysqli_fetch_array($result_ur_v)) 
									{
									if ($res_ur_v['uroven_dostupa']!=$selected_uroven)
										{
										?>
										<option value="<?php echo htmlentities($res_ur_v['uroven_dostupa']); ?>"><?php echo htmlentities($res_ur_v['opisanie']); ?></option>
										<?php
										}
									}
								}
							?>
						</select>
						<?php
						}
					else
						{
						?>
						<input type="hidden" name="uroven_dostupa" value="<?php echo $cur_uroven_dostupa; ?>">
						<?php echo $loc['users.php']['t21']; ?>
						<?php
						}
					?>
				</p>
				<p>
					<input type="button" name="return" value="<?php echo $loc['users.php']['t22']; ?>" onclick="document.location.href='users.php'">
					<input type="submit" name="submit_user" value="<?php echo $loc['users.php']['t23']; ?>" onclick="if (!confirm('<?php echo $loc['users.php']['t24']; ?>'))return false;"><br /><br />
					<input name="id" type="hidden" value="<?php echo htmlentities($id_edit); ?>">
				</p>
			</form>
		</p>
		<?
		} 
	else 
		{
		echo $loc['users.php']['t25'];
		}
	}
else
	{
	?>
	<p>
		<form name="user_poisk" class="report" method="get" action="./users.php?<?php echo @$_SERVER['QUERY_STRING']?>">
			<p>
				<b><?php echo $loc['users.php']['t26']; ?>&nbsp;</b>
				<select name="search_type">
					<option class="options" value="1" <? if (isset($_GET['search_type']) && $_GET['search_type']=='1') {echo 'selected="selected"';} ?>><?php echo $loc['users.php']['t29']; ?></option>
				</select>
			</p>
			<p>
				<b><?php echo $loc['users.php']['t27']; ?>&nbsp;</b>
				<input type="text" name="search_zapros" class="search_pole" value="<? if (isset($_GET['search_zapros'])) {echo $_GET['search_zapros'];} ?>" maxlength="100" />
			</p>
			<p>
				<b>&nbsp;</b><input type="hidden" name="add"><input name="submit_search" value="<?php echo $loc['button']['t02']; ?>" class="others_button_vyvesti" type="submit">
			</p>
		</form>
	</p>
	<?php
	if (isset($_GET['submit_search']) && isset($_GET['search_zapros']) && isset($_GET['search_type']) && $_GET['search_zapros']!='' && $_GET['search_type']!='')
		{
		$search_zapros=$_GET['search_zapros'];
		if ($_GET['search_type']=='2') {$search_type='2';}	else {$search_type='1';}
		?>
		<table class="stats_table" width="100%">
			<tr class="table_zagolovki">
				<td colspan="9"><?php echo $loc['users.php']['t28']; ?></td>
			</tr>
			<tr class="table_zagolovki">
				<td><?php echo $loc['users.php']['t30']; ?></td>	
				<td><?php echo $loc['users.php']['t31']; ?></td>
				<td><?php echo $loc['users.php']['t32']; ?></td>
				<td><?php echo $loc['users.php']['t33']; ?></td>		
				<td><?php echo $loc['users.php']['t34']; ?></td>			
				<td><?php echo $loc['users.php']['t35']; ?></td>		
				<td><?php echo $loc['users.php']['t36']; ?></td>
				<td><?php echo $loc['users.php']['t37']; ?></td>		
				<td><?php echo $loc['users.php']['t38']; ?></td>				
			</tr>
			<?
			if ($search_type=='1')
				{
				$sql = "SELECT * FROM users WHERE `email` like '%$search_zapros%' ORDER BY `id` DESC";
				}
			else
				{
				$sql = "SELECT * FROM users ORDER BY `id` DESC";
				}
			$result = $mysqli->query($sql);
			$cvet=0;
			if (mysqli_num_rows($result) > 0) 
				{
				while($res=mysqli_fetch_array($result)) 
					{ 
					$cur_id=htmlentities($res['id']);
					$cur_email=htmlentities($res['email']);
					$cur_hold=htmlentities($res['hold']);
					$cur_balance=htmlentities($res['balance']);	
					$cur_tip_acc=htmlentities($res['tip']);
					$cur_uroven_dostupa=htmlentities($res['uroven_dostupa']);
					$cur_ip=htmlentities($res['ip']);
					$cur_date_activity=htmlentities($res['date_activity']);
					?> 
					<tr class="<?php if ( $cvet & 1 ) {echo 'col2';} else {echo '';} $cvet++; ?>">
						<td><?php echo $cur_id; ?></td>
						<td><?php echo $cur_email; ?></td>
						<td><?php echo $cur_hold; ?></td>
						<td><?php echo $cur_balance; ?></td>
						<td>
							<?php
							$sql_uroven = "SELECT title FROM users_roles_tpl WHERE `tip`='$cur_tip_acc'";
							$result_uroven = $mysqli->query($sql_uroven);
							$res_uroven=mysqli_fetch_array($result_uroven);
							echo htmlentities($res_uroven['title']);
							?>
						</td>			
						<td>
							<?php
							$sql_ur_v = "SELECT tip_account, uroven_dostupa, opisanie FROM uroven_tpl WHERE `uroven_dostupa`='$cur_uroven_dostupa' AND `tip_account`='$cur_tip_acc'";
							$result_ur_v = $mysqli->query($sql_ur_v);
							$res_ur_v=mysqli_fetch_array($result_ur_v);
							if ($res_ur_v['opisanie']!='')
								{echo htmlentities($res_ur_v['opisanie']);}
							else
								{echo $loc['users.php']['t21'];}
							?>
						</td>
						<td>
							<?php echo $cur_ip;	?>
						</td>			
						<td>
							<?php echo $cur_date_activity; ?>
						</td>
						<td><a href="users.php?edit=<?php echo $cur_id; ?>" class="normal_link"><?php echo $loc['users.php']['t39']; ?></a></td>
					</tr>
					<?php
					}
				}
			?>  
		</table>
		<?php
		}
	else
		{
		?>
		<p>
			<?php
			function build_pagination_url( $page ) 
				{
				$parameters = array
					(
					'hold' => ( isset($_GET['hold']) ) ? $_GET['hold'] : '',
					'balance' => ( isset($_GET['balance']) ) ? $_GET['balance'] : '',
					'ip' => ( isset($_GET['ip']) ) ? $_GET['ip'] : '',
					'date_activity' => ( isset($_GET['date_activity']) ) ? $_GET['date_activity'] : '',		
					'page' => $page
					);
				return '?' . http_build_query( $parameters );
				}
			$result = $mysqli->query( "SELECT COUNT(id) AS count FROM `users`" );
			// Вывод количества страниц
			// Display the number of pages
			pagination($result,100,11);
			?>
		</p>
		<p>
			<table class="stats_table" width="100%">
				<tr class="table_zagolovki">
					<td colspan="9"><?php echo $loc['users.php']['t40']; ?>&nbsp;[<a href="./adduser.php" class="normal_link"><?php echo $loc['users.php']['t41']; ?></a>]</td>
				</tr>
				<tr class="table_zagolovki">
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
			</table>
		</p>
		<p>
			<?php
			// Вывод количества страниц
			// Display the number of pages
			pagination($pagination_fetched_row,100,11);
			?>
		</p>
		<p>
			&nbsp;
		</p>
		<p>
			&nbsp;
		</p>		
		<?php
		}
	}
?>
