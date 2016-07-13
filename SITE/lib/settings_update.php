<?php

// Блок с изменением системных настроек
// Block to change the system settings
if (isset($_POST['submit_settings']) && $user_tip=='70')
	{
	$settings_zagolovok=htmlentities($_POST['settings_zagolovok']);
	$settings_podzagolovok=htmlentities($_POST['settings_podzagolovok']);	
	$settings_registration_wm=htmlentities($_POST['settings_registration_wm']);
	$settings_registration_rk=htmlentities($_POST['settings_registration_rk']);	
	$settings_balance_cpa=htmlentities($_POST['settings_balance_cpa']);
	$settings_min_vyvod=htmlentities($_POST['settings_min_vyvod']);
	$settings_sms_ok=htmlentities($_POST['settings_sms_ok']);
	$settings_smslogin=htmlentities($_POST['settings_smslogin']);
	$settings_smspassword=htmlentities($_POST['settings_smspassword']);
	$settings_smsapikey=htmlentities($_POST['settings_smsapikey']);
	$settings_sms_price=htmlentities($_POST['settings_sms_price']);
	$settings_russianpost_ok=htmlentities($_POST['russianpost_ok']);
	$settings_russianpost_login=htmlentities($_POST['russianpost_login']);
	$settings_russianpost_password=htmlentities($_POST['russianpost_password']);	
	$settings_paysystem_pay=htmlentities($_POST['settings_paysystem_pay']);
	$settings_paysystem_landings=htmlentities($_POST['settings_paysystem_landings']);
	$settings_webmoney_wmr=htmlentities($_POST['settings_webmoney_wmr']);
	$settings_webmoney_key=htmlentities($_POST['settings_webmoney_key']);
	$settings_yk_shopid=htmlentities($_POST['settings_yk_shopid']);
	$settings_yk_shoppassword=htmlentities($_POST['settings_yk_shoppassword']);
	$settings_yk_scid=htmlentities($_POST['settings_yk_scid']);
	$settings_yk_obrabotchik=htmlentities($_POST['settings_yk_obrabotchik']);
	$settings_refprocent=htmlentities($_POST['settings_refprocent']);
	$settings_account_max_offers=htmlentities($_POST['settings_account_max_offers']);
	$settings_account_max_landings=htmlentities($_POST['settings_account_max_landings']);
	$settings_account_max_subacc=htmlentities($_POST['settings_account_max_subacc']);
	$settings_email=htmlentities($_POST['settings_email']);
	$settings_icq=htmlentities($_POST['settings_icq']);
	$settings_skype=htmlentities($_POST['settings_skype']);
	$settings_phone=htmlentities($_POST['settings_phone']);
	$settings_ip_otladka=htmlentities($_POST['settings_ip_otladka']);	
	$request="UPDATE `settings` SET `registration_wm`='$settings_registration_wm',`registration_rk`='$settings_registration_rk', `zagolovok`='$settings_zagolovok', `podzagolovok`='$settings_podzagolovok', `balance_cpa`='$settings_balance_cpa', `min_vyvod`='$settings_min_vyvod', `paysystem_pay`='$settings_paysystem_pay', `paysystem_landings`='$settings_paysystem_landings', `webmoney_wmr`='$settings_webmoney_wmr',`webmoney_key`='$settings_webmoney_key', `yk_shopid`='$settings_yk_shopid', `yk_shoppassword`='$settings_yk_shoppassword', `yk_scid`='$settings_yk_scid', `yk_obrabotchik`='$settings_yk_obrabotchik', `refprocent`='$settings_refprocent', `sms_ok`='$settings_sms_ok', `smslogin`='$settings_smslogin', `smspassword`='$settings_smspassword', `smsapikey`='$settings_smsapikey', `sms_price`='$settings_sms_price', `russianpost_ok`='$settings_russianpost_ok', `russianpost_login`='$settings_russianpost_login', `russianpost_password`='$settings_russianpost_password', `account_max_offers`='$settings_account_max_offers',`account_max_landings`='$settings_account_max_landings',`account_max_subacc`='$settings_account_max_subacc',`email`='$settings_email',`icq`='$settings_icq',`skype`='$settings_skype',`phone`='$settings_phone',`ip_otladka`='$settings_ip_otladka' WHERE `id`='1'";
	$result=$mysqli->query($request);
	header('location:' . $_SERVER['PHP_SELF'] .'?success');
	exit;
	}

?>