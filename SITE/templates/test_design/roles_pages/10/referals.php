
<h1><?php echo $loc['referals.php']['t01']; ?></h1>

<p>
	<?php echo $loc['referals.php']['t02']; ?>&nbsp;<b><?php echo site_url().'/?ref='.$user_id; ?></b>
</p>

<p>
	<b><?php echo $loc['referals.php']['t03']; ?></b>
</p>

<p>
	<table class="stats_table">
		<tr class="table_zagolovki">
			<td width="120"><?php echo $loc['referals.php']['t04']; ?></td>
			<td width="200"><?php echo $loc['referals.php']['t05']; ?></td>
			<td width="200"><?php echo $loc['referals.php']['t06']; ?></td>
			<td width="180"><?php echo $loc['referals.php']['t07']; ?></td>
		</tr>
	</table>
</p>

<p>
	<?php
	// Получаем список всех рефералов пользователя
	// Get a list of all user referrals
	$sql_referals_data = "SELECT * from users WHERE `myrefovod`='$user_id' ORDER BY `id` DESC";	
	$result_referals_data = $mysqli->query($sql_referals_data);
	if (mysqli_num_rows($result_referals_data) > 0) 
		{
		while($res_referals_data=mysqli_fetch_array($result_referals_data)) 
			{
			$referal_id=htmlentities($res_referals_data['id']);
			$referal_date_registration=htmlentities($res_referals_data['date_registration']);
			$referal_date_activity=htmlentities($res_referals_data['date_activity']);
			$referal_date_summ=0;
			// Определяем сумму всего дохода, который принес Вам данный реферал
			// Determine the total amount of income, which has brought you to this referral
			$sql_zakaz_data = "SELECT SUM(comission*kolvo) as summ FROM zakaz WHERE `user_id`='$referal_id' AND `status`='3'";	
			$result_zakaz_data = $mysqli->query($sql_zakaz_data);
			if (mysqli_num_rows($result_zakaz_data) > 0) 
				{
				while($res_zakaz_data=mysqli_fetch_array($result_zakaz_data)) 
					{
					$referal_date_summ=$referal_date_summ+htmlentities($res_zakaz_data['summ']);
					}
				}
			?>
			<p>
				<table class="stats_table">
					<tr>
						<td width="120"><?php echo $referal_id; ?></td>
						<td width="200"><?php if ($referal_date_registration!='') {echo date('d.m.Y / H:i:s', strtotime($referal_date_registration));} else {echo $loc['referals.php']['t09'];} ?></td>
						<td width="200"><?php echo date('d.m.Y / H:i:s', strtotime($referal_date_activity)); ?></td>
						<td width="180"><?php echo $referal_date_summ/100*$settings_refprocent; ?>&nbsp;<?php echo $loc['referals.php']['t08']; ?>&nbsp;</td>
					</tr>
				</table>
			</p>
			<?php
			}
		}
	?>
</p>

<p>
	&nbsp;
</p>
