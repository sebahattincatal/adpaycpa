
<h1><?php echo $loc['cabinet.php']['t01']; ?></h1>

<p>
	<b><?php echo $loc['cabinet.php']['t02']; ?></b>
</p>

		<?php  
		// Получаем количество уникальных посещений (хостов) у пользователя за сегодня
		// Get the number of unique visits (hosts) from the user today
		$sql_user_hosts = "SELECT COUNT(DISTINCT(ip)) as hosts FROM clients_log WHERE `user_id`='$user_id' AND `date`>=CURDATE()";
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
		
		// Получаем количество неуникальных посещений (визитов) у пользователя за сегодня
		// Get the number of non-unique visits (visits) from the user today
		$sql_user_visits = "SELECT COUNT(id) as visits FROM clients_log WHERE `user_id`='$user_id' AND `date`>=CURDATE()";
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
		
		// Получаем количество конверсий (успешных принятых лидов) у пользователя за сегодня
		// Get the number of conversions (successful adoption disabilities) user today
		$sql_user_zakaz_ok = "SELECT COUNT(id) as zakaz_ok FROM zakaz WHERE `user_id`='$user_id' AND `status`='3' AND `date`>=CURDATE()";
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
		
		
		// Получаем количество заработанных средств (комиссия) у пользователя за сегодня
		// Get the number of earned money (commission) for the user today
		$sql_user_comission_ok = "SELECT SUM(`comission`*`kolvo`) as comission_ok FROM zakaz WHERE `user_id`='$user_id' AND `status`='3' AND `date`>=CURDATE()";
		$result_user_comission_ok=$mysqli->query($sql_user_comission_ok);
		if (mysqli_num_rows($result_user_comission_ok) > 0) 
			{
			$res_user_comission_ok=mysqli_fetch_assoc($result_user_comission_ok);
			$comission_ok=htmlentities($res_user_comission_ok['comission_ok']);
			}
		else
			{
			$comission_ok='0';
			}			
		?>

<p>
	<table class="activity_log">
		<tr class="first">
			<td><?php if ($hosts!='') {echo $hosts;} else {echo $hosts='0';} ?></td>
			<td><?php if ($visits!='') {echo $visits;} else {echo $visits='0';} ?></td>
			<td><?php if ($zakaz_ok!='') {echo $zakaz_ok;} else {echo $zakaz_ok='0';} ?></td>
			<td><?php if ($comission_ok!='') {echo $comission_ok;} else {echo $comission_ok='0';} ?></td>
			<td><?php if ($hosts!='0') {echo round($zakaz_ok/$hosts*100, 0);} else {echo '0';} ?></td>
			<td><?php if ($hosts!='0') {echo round($comission_ok/$hosts, 0);} else {echo '0';} ?></td>
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
			<td><span><?php echo $loc['cabinet.php']['t06']; ?></span></td>
			<td><span><?php echo $loc['cabinet.php']['t07']; ?></span></td>
			<td><span><?php echo $loc['cabinet.php']['t08']; ?></span></td>
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
