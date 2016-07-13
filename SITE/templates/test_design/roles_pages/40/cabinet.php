
<h1><?php echo $loc['cabinet.php']['t09']; ?></h1>

<p>
	<b><?php echo $loc['cabinet.php']['t10']; ?></b>
</p>

		<?php  
		// Получаем количество уникальных посещений (хостов) у рекламодателя за сегодня
		// Get the number of unique visits (hosts) an advertiser today
		$sql_user_hosts = "SELECT COUNT(DISTINCT(ip)) as hosts FROM clients_log WHERE `owner_id`='$user_id' AND `date`>=CURDATE()";
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
		
		// Получаем количество неуникальных посещений (визитов) у рекламодателя за сегодня
		// Get the number of non-unique visits (visits) an advertiser today
		$sql_user_visits = "SELECT COUNT(id) as visits FROM clients_log WHERE `owner_id`='$user_id' AND `date`>=CURDATE()";
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
		
		// Получаем количество конверсий (успешных принятых лидов) у рекламодателя за сегодня
		// Get the number of conversions (successful adoption disabilities) an advertiser today
		$sql_user_zakaz_ok = "SELECT COUNT(id) as zakaz_ok FROM zakaz WHERE `owner_id`='$user_id' AND `status`='3' AND `date`>=CURDATE()";
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
		
		
		// Получаем количество заработанных средств у рекламодателя за сегодня
		// Get the amount of money earned from advertisers today
		$sql_user_cena_ok = "SELECT (SUM(`cena`)-SUM(`comission`)-SUM(`comission_cpa`)*`kolvo`) as cena_ok FROM zakaz WHERE `owner_id`='$user_id' AND `status`='3' AND `date`>=CURDATE()";
		$result_user_cena_ok=$mysqli->query($sql_user_cena_ok);
		if (mysqli_num_rows($result_user_cena_ok) > 0) 
			{
			$res_user_cena_ok=mysqli_fetch_assoc($result_user_cena_ok);
			$cena_ok=htmlentities($res_user_cena_ok['cena_ok']);
			}
		else
			{
			$cena_ok='0';
			}			
		?>

<p>
	<table class="activity_log">
		<tr class="first">
			<td><?php if ($hosts!='') {echo $hosts;} else {echo $hosts='0';} ?></td>
			<td><?php if ($visits!='') {echo $visits;} else {echo $visits='0';} ?></td>
			<td><?php if ($zakaz_ok!='') {echo $zakaz_ok;} else {echo $zakaz_ok='0';} ?></td>
			<td><?php if ($cena_ok!='') {echo $cena_ok;} else {echo $cena_ok='0';} ?></td>
			<td><?php if ($hosts!='0') {echo round($zakaz_ok/$hosts*100, 0);} else {echo '0';} ?></td>
			<td><?php if ($hosts!='0') {echo round($cena_ok/$hosts, 0);} else {echo '0';} ?></td>
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
			<td><span><?php echo $loc['cabinet.php']['t11']; ?></span></td>
			<td><span><?php echo $loc['cabinet.php']['t12']; ?></span></td>
			<td><span><?php echo $loc['cabinet.php']['t13']; ?></span></td>
			<td><span><?php echo $loc['cabinet.php']['t14']; ?></span></td>
			<td><span><?php echo $loc['cabinet.php']['t15']; ?></span></td>
			<td><span><?php echo $loc['cabinet.php']['t16']; ?></span></td>
		</tr>
	</table>
</p>

<p>
	&nbsp;
</p>

<?php
// Подгружаем вывод новостей
// Loads the output of the news
include ('./templates/'.$template.'/blocks/news_output.php');
?>
