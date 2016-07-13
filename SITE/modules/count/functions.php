<?php
// Защита от инжекта для передаваемых переменных
// Protection of Injection for the transmission of variables
include $_SERVER['DOCUMENT_ROOT'].'/../includes/antiinject/index.php';

// Функция отправки письма на почту
// Function of sending a letter to the post office
include $_SERVER['DOCUMENT_ROOT'].'/../includes/sendemail/index.php';

// Функция определения УРЛа и типа соединения (HTTP или HTTPS)
// Function definition of URL and the connection type (HTTP or HTTPS)
include $_SERVER['DOCUMENT_ROOT'].'/../includes/detecturl/index.php';
	
// Функция определения домена
// Function definition domain
include $_SERVER['DOCUMENT_ROOT'].'/../includes/detectdomain/index.php';
	
// Функция определения текущего имени файла
// Function to determine the current file name
include $_SERVER['DOCUMENT_ROOT'].'/../includes/detectfilename/index.php';

// Определяем ГЕО, IP и другие параметры посетителя
// Define GEO, IP and other settings visitor
include $_SERVER['DOCUMENT_ROOT'].'/../modules/detectclient/detector.php';
$country=$detector->get('country');
$short_country=$detector->get('country_code');
$region=$detector->get('region');
$town=$detector->get('city');
$ip=$detector->get('ip');
$browser_name=$detector->get('browser_name');
$browser_version=$detector->get('browser_ver');
$useragent=$detector->get('agent');
$platform=$detector->get('platform');
$referer=$detector->get('referer');
$mobile=$detector->get('mobile'); 

// Определяем SubID если таковые есть
// Determine if any SubID
$subid = array_values($_GET);
if (isset($subid[1])) {$subid1=htmlspecialchars($subid[1]);} else {$subid1='';}
if (isset($subid[2])) {$subid2=htmlspecialchars($subid[2]);} else {$subid2='';}
if (isset($subid[3])) {$subid3=htmlspecialchars($subid[3]);} else {$subid3='';}

// Проверка нужна ли переадресация или же нет (если правило не прописано в ТДС вебмастера)
// Check whether the forwarding is necessary or not (if the rule is not spelled out in the TDS webmaster)
$sovpadenie=1;

$sql_user_tds = "SELECT * FROM user_tds WHERE `user_id`='$userid'";
$result_user_tds = $mysqli->query($sql_user_tds);
if (mysqli_num_rows($result_user_tds) > 0) 
	{
	while ($res_user_tds=mysqli_fetch_array($result_user_tds)) 
		{
		if ($res_user_tds['offer_id']!=$offerid || $res_user_tds['offer_id']=='' || $res_user_tds['offer_id']=='0') {$sovpadenie=0;}
		if ($res_user_tds['landing_id']!=$landingid || $res_user_tds['landing_id']=='' || $res_user_tds['landing_id']=='0') {$sovpadenie=0;}
		if (($res_user_tds['referer']!=$referer) && ($res_user_tds['referer']!='')) {$sovpadenie=0;}
		if (($res_user_tds['ip']!=$ip) && ($res_user_tds['ip']!='')) {$sovpadenie=0;}
		if (($res_user_tds['platform']!=$platform) && ($res_user_tds['platform']!='All')) {$sovpadenie=0;}
		if (($res_user_tds['useragent']!=$useragent) && ($res_user_tds['useragent']!='')) {$sovpadenie=0;}
		if (($res_user_tds['country']!=$country) && ($res_user_tds['country']!='')) {$sovpadenie=0;}
		if ($res_user_tds['offer_dest_id']=='' || $res_user_tds['offer_dest_id']=='0') {$sovpadenie=0;}
		if ($res_user_tds['landing_dest_id']=='' || $res_user_tds['landing_dest_id']=='') {$sovpadenie=0;} else {$sovpadenie=$sovpadenie+1;}

		if ($sovpadenie==2) 
			{
			$offer_dest_id=htmlentities($res_user_tds['offer_dest_id']);
			$landing_dest_id=htmlentities($res_user_tds['landing_dest_id']);

			// Определяем домен который используется для лендингов
			// Determine the domain that is used for landing
			$sql_domain = "SELECT domain FROM domains WHERE `active`='1' ORDER BY `id` DESC";
			$result_domain = $mysqli->query($sql_domain);
			$res_domain=mysqli_fetch_array($result_domain);
			$domain=htmlentities($res_domain['domain']);	
	
			// Формируем партнерскую ссылку (формируем ее из ID пользователя, ID оффера и ID лендинга)
			// Form the affiliate link (forming it from the UserID ,ID offer and ID landing)
			$redirect_partnerlink='http://'.$domain.'/?p='.partnerstroka_encode($userid.'-'.$offer_dest_id.'-'.$landing_dest_id);
			if ($subid1!='') {$redirect_partnerlink.='&subid1='.$subid1;}
			if ($subid2!='') {$redirect_partnerlink.='&subid2='.$subid2;}
			if ($subid3!='') {$redirect_partnerlink.='&subid3='.$subid3;}
			Header ("Location: $redirect_partnerlink");
			exit;
			}
		$sovpadenie=0;
		}
	}

// Пишем в базу данные о посетителе
// Write in the visitor data base
include_once $_SERVER['DOCUMENT_ROOT'].'/../includes/clientslog/index.php';	
?>
