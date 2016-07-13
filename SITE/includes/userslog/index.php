<?php

	// Пишем в базу данные о визите посетителя
	// Write to the data on the visit of the visitor database
	if (!isset($user_id)) {$user_id = '0';}
	if (!isset($user_session)) {$user_session = '';}
	if (!isset($deystvie)) {$deystvie='1';}
	$page = $mysqli -> real_escape_string(site_url(). $_SERVER['REQUEST_URI']);
	$country = $mysqli -> real_escape_string($country);
	$short_country = $mysqli -> real_escape_string($short_country);
	$region = $mysqli -> real_escape_string($region);
	$town = $mysqli -> real_escape_string($town);
	$ip = $mysqli -> real_escape_string($ip);
	$browser_name = $mysqli -> real_escape_string($browser_name);
	$browser_version = $mysqli -> real_escape_string($browser_version);
	$referer = $mysqli -> real_escape_string($referer);
	$useragent = $mysqli -> real_escape_string($useragent);
	$platform = $mysqli -> real_escape_string($platform);
	$mobile = $mysqli -> real_escape_string($mobile);
	$subid1 = $mysqli -> real_escape_string($subid1);
	$subid2 = $mysqli -> real_escape_string($subid2);
	$subid3 = $mysqli -> real_escape_string($subid3);
	$sql = "INSERT INTO users_log (`id_user`, `user_session`, `deystvie`, `page`, `country`, `short_country`, `region`, `town`, `ip`, `browser_name`, `browser_version`, `referer`, `useragent`, `platform`, `mobile`, `subid1`, `subid2`, `subid3`) VALUES ('$user_id', '$user_session', '$deystvie', '$page', '$country', '$short_country', '$region', '$town', '$ip', '$browser_name', '$browser_version', '$referer', '$useragent', '$platform', '$mobile', '$subid1', '$subid2', '$subid3')";
	$result = $mysqli->query($sql);
	
	if (isset($user_id) && isset($user_session))
		{
		// Записываем сессию в таблицу users
		// Нужно для последующего определения аккаунтов-дублей

		// Write the session in the users table
		// We need to follow a specific account-takes		
		$sql_sesionupdate = "UPDATE users SET `user_session`='$user_session', `ip`='$ip', `date_activity`=CURRENT_TIMESTAMP WHERE `id`='$user_id'";
		$result_sesionupdate = $mysqli->query($sql_sesionupdate);
		}
	
?>