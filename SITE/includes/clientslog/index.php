<?php

	// Пишем в базу данные о визите посетителя
	// Write to the data on the visit of the visitor database
	if (!isset($userid)) {$userid = '0';} else {$userid = $mysqli -> real_escape_string($userid);}
	if (!isset($offerid)) {$offerid = '0';} else {$offerid = $mysqli -> real_escape_string($offerid);}
	if (!isset($ownerid)) {$ownerid = '0';} else {$ownerid = $mysqli -> real_escape_string($ownerid);}
	if (!isset($landingid)) {$landingid = '0';} else {$landingid = $mysqli -> real_escape_string($landingid);}
	if (!isset($code)) {$code = '';} else {$code = $mysqli -> real_escape_string($code);}
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
	$code=partnerstroka_encode($userid.'-'.$offerid.'-'.$landingid);
	$sql = "INSERT INTO clients_log (`user_id`, `offer_id`, `owner_id`, `landing_id`, `code`, `country`, `short_country`, `region`, `town`, `ip`, `browser_name`, `browser_version`, `referer`, `useragent`, `platform`, `mobile`, `subid1`, `subid2`, `subid3`) VALUES ('$userid', '$offerid', '$ownerid', '$landingid', '$code', '$country', '$short_country', '$region', '$town', '$ip', '$browser_name', '$browser_version', '$referer', '$useragent', '$platform', '$mobile', '$subid1', '$subid2', '$subid3')";
	$result = $mysqli->query($sql);
	
?>