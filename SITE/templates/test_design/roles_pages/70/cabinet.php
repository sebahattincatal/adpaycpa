
<h1><?php echo $loc['cabinet.php']['t17']; ?></h1>

<p>
	<b><?php echo $loc['cabinet.php']['t18']; ?></b>
</p>

		<?php  
		// Получаем количество уникальных посещений (хостов) за сегодня
		// Get the number of unique visits (hosts) today
		$sql_user_hosts = "SELECT COUNT(DISTINCT(ip)) as hosts FROM clients_log WHERE `user_id`!='0' AND `date`>=CURDATE()";
		$result_user_hosts=$mysqli->query($sql_user_hosts);
		if (mysqli_num_rows($result_user_hosts) > 0) 
			{
			$res_user_hosts=mysqli_fetch_assoc($result_user_hosts);
			$hosts=htmlentities($res_user_hosts['hosts']);
			}
		else
			{
			$hosts='0';
			}
		
		// Получаем количество неуникальных посещений (визитов) за сегодня
		// Get the number of non-unique visits (visits) for today
		$sql_user_visits = "SELECT COUNT(id) as visits FROM clients_log WHERE `user_id`!='0' AND `date`>=CURDATE()";
		$result_user_visits=$mysqli->query($sql_user_visits);
		if (mysqli_num_rows($result_user_visits) > 0) 
			{
			$res_user_visits=mysqli_fetch_assoc($result_user_visits);
			$visits=htmlentities($res_user_visits['visits']);
			}
		else
			{
			$visits='0';
			}
		
		
			// Получаем количество уникальных посещений (хостов) за все время
			// Get the number of unique visits (hosts) for all time
			$sql_user_hosts = "SELECT COUNT(DISTINCT(ip)) as hosts FROM clients_log WHERE `user_id`!='0'";
			$result_user_hosts=$mysqli->query($sql_user_hosts);
			if (mysqli_num_rows($result_user_hosts) > 0) 
				{
				$res_user_hosts_all=mysqli_fetch_assoc($result_user_hosts);
				$hosts_all=htmlentities($res_user_hosts_all['hosts']);
				}
			else
				{
				$hosts_all='0';
				}
		
			// Получаем количество неуникальных посещений (визитов) за все время
			// Get the number of non-unique visits (visits) for all time
			$sql_user_visits = "SELECT COUNT(id) as visits FROM clients_log WHERE `user_id`!='0'";
			$result_user_visits=$mysqli->query($sql_user_visits);
			if (mysqli_num_rows($result_user_visits) > 0) 
				{
				$res_user_visits_all=mysqli_fetch_assoc($result_user_visits);
				$visits_all=htmlentities($res_user_visits_all['visits']);
				}
			else
				{
				$visits_all='0';
				}			
		
		// Выясняем сколько вебмастеров работало за последние сутки (привлекало трафик)
		// We find out how many webmasters worked for the last day (attracted traffic)
		$sql_user_rabotal = "SELECT COUNT(DISTINCT `user_id`) as kolvo_webmaster_rabotal FROM clients_log WHERE `user_id`!='0' AND `date` >= NOW() - INTERVAL 1 DAY";
		$result = $mysqli->query($sql_user_rabotal);
		$count=mysqli_fetch_assoc($result);
		$kolvo_webmaster_rabotal=htmlentities($count['kolvo_webmaster_rabotal']);		
		
		// Получаем количество конверсий (успешных принятых заявок / заказов) за сегодня
		// Get the number of conversions (successful received orders) today
		$sql_user_zakaz_ok = "SELECT COUNT(id) as zakaz_ok FROM zakaz WHERE `status`='3' AND `date`>=CURDATE()";
		$result_user_zakaz_ok=$mysqli->query($sql_user_zakaz_ok);
		if (mysqli_num_rows($result_user_zakaz_ok) > 0) 
			{
			$res_user_zakaz_ok=mysqli_fetch_assoc($result_user_zakaz_ok);
			$zakaz_ok=htmlentities($res_user_zakaz_ok['zakaz_ok']);
			}
		else
			{
			$zakaz_ok='0';
			}		
		
		
		// Получаем количество заработанных средств (комиссии CPA-сети) за сегодня
		// Get the number of earned money (CPA-network commission) today
		$comission_cpa_ok='0';
		
		// Узнаем сумму комиссии CPA-сети полученную с витрины ЗА СЕГОДНЯ
		// Find out the amount CPA-network commission received a showcase today
		$sql_comission_cpa_ok = "SELECT SUM((`comission`+`comission_cpa`)*`kolvo`) as comission_cpa_ok FROM zakaz WHERE `status`='3' AND `user_id`='0' AND `date`>=CURDATE()";
		$result_comission_cpa_ok=$mysqli->query($sql_comission_cpa_ok);
		if (mysqli_num_rows($result_comission_cpa_ok) > 0) 
			{
			$res_comission_cpa_ok=mysqli_fetch_assoc($result_comission_cpa_ok);
			$summ_comission_cpa_vitrina=htmlentities($res_comission_cpa_ok['comission_cpa_ok']);
			}
		else
			{
			$summ_comission_cpa_vitrina='0';
			}			
		// Узнаем сумму комиссии CPA-сети полученную от вебмастеров ЗА СЕГОДНЯ
		// Find out the amount CPA-network commissions received from webmasters today
		$sql_comission_cpa_ok = "SELECT SUM(`comission_cpa`*`kolvo`) as comission_cpa_ok FROM zakaz WHERE `status`='3' AND `user_id`!='0' AND `date`>=CURDATE()";
		$result_comission_cpa_ok=$mysqli->query($sql_comission_cpa_ok);
		if (mysqli_num_rows($result_comission_cpa_ok) > 0) 
			{
			$res_comission_cpa_ok=mysqli_fetch_assoc($result_comission_cpa_ok);
			$summ_comission_cpa_webmasters=htmlentities($res_comission_cpa_ok['comission_cpa_ok']);
			}
		else
			{
			$summ_comission_cpa_webmasters='0';
			}						
		// Суммируем сумму комиссии с витрины и комиссию от вебмастеров
		// Summarize the amount of commission and a commission from the windows webmasters
		$comission_cpa_ok=$summ_comission_cpa_vitrina+$summ_comission_cpa_webmasters;
		
		
		// Определяем количество мультиаккаунтов в системе
		// Determine the number of multi-accounts in the system
		$sql_detect_multiacc = "SELECT `id`,`email`,`user_session` FROM `users` WHERE `user_session` IN (SELECT `user_session` FROM `users` GROUP BY `user_session` HAVING count(*)>1)";
		$result_detect_multiacc = $mysqli->query($sql_detect_multiacc);
		$multiacc_kolvo=0;
		if (mysqli_num_rows($result_detect_multiacc) > 0) 
			{
			while($res_detect_multiacc=mysqli_fetch_array($result_detect_multiacc)) 
				{
				$multiacc_kolvo++;
				}
			}
		?>

<p>
	<table class="activity_log">
		<tr class="first">
			<td><?php if ($hosts!='') {echo $hosts;} else {echo $hosts='0';} ?></td>
			<td><?php if ($visits!='') {echo $visits;} else {echo $visits='0';} ?></td>
			<td><?php if ($zakaz_ok!='') {echo $zakaz_ok;} else {echo $zakaz_ok='0';} ?></td>
			<td><?php if ($comission_cpa_ok!='') {echo $comission_cpa_ok;} else {echo $comission_cpa_ok='0';} ?></td>
			<td><?php if ($hosts!='0') {echo round($zakaz_ok/$hosts*100, 0);} else {echo '0';} ?></td>
			<td><?php if ($hosts!='0') {echo round($comission_cpa_ok/$hosts, 0);} else {echo '0';} ?></td>
		</tr>
		<tr>
			<td><hr></td>
			<td><hr></td>
			<td><hr></td>
			<td><hr></td>
			<td><hr></td>
			<td><hr></td>
		</tr>		
		<tr>
			<td><span><?php echo $loc['cabinet.php']['t03']; ?></span></td>
			<td><span><?php echo $loc['cabinet.php']['t04']; ?></span></td>
			<td><span><?php echo $loc['cabinet.php']['t05']; ?></span></td>
			<td><span><?php echo $loc['cabinet.php']['t14']; ?></span></td>
			<td><span><?php echo $loc['cabinet.php']['t15']; ?></span></td>
			<td><span><?php echo $loc['cabinet.php']['t16']; ?></span></td>
		</tr>
	</table>
</p>

<p>
	&nbsp;
</p>

<?php include 'cabinet_sql.php'; ?>

<p>
	<table>
		<tr>
			<td width="450" valign="top"><b><?php echo $loc['cabinet.php']['t19']; ?></b></td>
			<td width="450" valign="top"><b><?php echo $loc['cabinet.php']['t20']; ?></b></td>
		</tr>
		<tr>
			<td width="450" valign="top"><?php echo $loc['cabinet.php']['t21']; ?>&nbsp;<a href="./users.php"><b><?php echo $kolvo_rekl; ?></b></a>&nbsp;<?php echo $loc['cabinet.php']['t22']; ?></td>
			<td width="450" valign="top"><?php echo $loc['cabinet.php']['t21']; ?>&nbsp;<a href="./users.php"><b><?php echo $kolvo_webmaster; ?></b></a>&nbsp;<?php echo $loc['cabinet.php']['t22']; ?><br /><?php echo $loc['cabinet.php']['t23']; ?>&nbsp;<a href="./users.php"><b><?php echo $kolvo_webmaster_rabotal; ?></b></a>&nbsp;<?php echo $loc['cabinet.php']['t22']; ?></td>
		</tr>
		<tr>
			<td width="450" valign="top">&nbsp;</td>
			<td width="450" valign="top">&nbsp;</td>
		</tr>
		<tr>
			<td width="450" valign="top"><b><?php echo $loc['cabinet.php']['t24']; ?></b></td>
			<td width="450" valign="top"><b><?php echo $loc['cabinet.php']['t25']; ?></b></td>
		</tr>
		<tr>
			<td width="450" valign="top"><?php echo $loc['cabinet.php']['t26']; ?>&nbsp;<a href="./zakaz.php?status=1&page=1"><b><?php echo $kolvo_not_leads; ?></b></a><br /><?php echo $loc['cabinet.php']['t28']; ?>&nbsp;<a href="./zakaz.php?status=2&page=1"><b><?php echo $kolvo_hold_leads; ?></b></a><br /><?php echo $loc['cabinet.php']['t35']; ?>&nbsp;<a href="./zakaz.php?status=3&page=1"><b><?php echo $kolvo_oplachen_leads; ?></b></a><br /><?php echo $loc['cabinet.php']['t34']; ?>&nbsp;<a href="./zakaz.php?status=0&page=1"><b><?php echo $kolvo_otkaz_leads; ?></b></a></td>
			<td width="450" valign="top"><?php echo $loc['cabinet.php']['t27']; ?>&nbsp;<a href="./traffic.php"><b><?php echo $visits_all; ?></b></a>&nbsp;<?php echo $loc['cabinet.php']['t29']; ?><br /><?php echo $loc['cabinet.php']['t30']; ?>&nbsp;<a href="./traffic.php"><b><?php echo $hosts_all; ?></b></a>&nbsp;<?php echo $loc['cabinet.php']['t31']; ?><br /><?php echo $loc['cabinet.php']['t32']; ?>&nbsp;<b><?php echo $visits; ?></b>&nbsp;<?php echo $loc['cabinet.php']['t29']; ?><br /><?php echo $loc['cabinet.php']['t33']; ?>&nbsp;<b><?php echo $hosts; ?></b>&nbsp;<?php echo $loc['cabinet.php']['t31']; ?></td>
		</tr>
		<tr>
			<td width="450" valign="top">&nbsp;</td>
			<td width="450" valign="top">&nbsp;</td>
		</tr>
		<tr>
			<td width="450" valign="top"><b><?php echo $loc['cabinet.php']['t36']; ?></b></td>
			<td width="450" valign="top"><b><?php echo $loc['cabinet.php']['t37']; ?></b></td>
		</tr>
		<tr>
			<td width="450" valign="top"><?php echo $loc['cabinet.php']['t38']; ?>&nbsp;<a href="./offers.php"><b><?php echo $kolvo_offer; ?></b></a><br /><?php echo $loc['cabinet.php']['t41']; ?>&nbsp;<a href="./offers.php"><b><?php echo $kolvo_active_offer; ?></b></a><br /><?php echo $loc['cabinet.php']['t43']; ?>&nbsp;<a href="./offers.php"><b><?php echo $kolvo_moderate_offer; ?></b></a></td>
			<td width="450" valign="top"><?php echo $loc['cabinet.php']['t39']; ?>&nbsp;<b><?php echo $summ_balance_rekl; ?></b>&nbsp;<?php echo $loc['cabinet.php']['t40']; ?><br /><?php echo $loc['cabinet.php']['t42']; ?>&nbsp;<b><?php echo $summ_balance_webmaster; ?></b>&nbsp;<?php echo $loc['cabinet.php']['t40']; ?><br /><?php echo $loc['cabinet.php']['t44']; ?>&nbsp;<a href="./finances.php"><b><?php echo $vyvod_ne_obrabotano; ?></b></a><br /><?php echo $loc['cabinet.php']['t45']; ?>&nbsp;<a href="./finances.php"><b><?php echo $vyvod_summa; ?></b></a>&nbsp;<?php echo $loc['cabinet.php']['t40']; ?></td>
		</tr>	
		<tr>
			<td width="450" valign="top">&nbsp;</td>
			<td width="450" valign="top">&nbsp;</td>
		</tr>
		<tr>
			<td width="450" valign="top"><b><?php echo $loc['cabinet.php']['t46']; ?></b></td>
			<td width="450" valign="top"></td>
		</tr>
		<tr>
			<td width="450" valign="top">
				<?php echo $loc['cabinet.php']['t47']; ?>&nbsp; 
				<a href="./users.php"><b><?php echo $kolvo_neactive_users; ?></b></a><br />
				<?php echo $loc['cabinet.php']['t48']; ?>&nbsp; 
				<a href="./users.php"><b><?php echo $kolvo_block_users; ?></b></a><br />
				<?php echo $loc['cabinet.php']['t49']; ?>&nbsp;<b><a href="./multiacc.php"><?php echo $multiacc_kolvo; ?></a></b>
			</td>
			<td width="450" valign="top"></td>
		</tr>	
	</table>
</p>

<p>
	&nbsp;
</p>

