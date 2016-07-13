<?php

// Инициирование редактирования оффера рекламодателем (изменение СМС-уведомлений)
// Initiate editing offer advertiser (change SMS notifications)
if (isset($_POST['moderate_sms_submit']) && isset($_POST['offer_id']) && $user_tip=='40' && $settings_sms_ok=='1')
	{
	$offer_id=htmlentities($_POST['offer_id']);
	$offer_sms_ok=htmlentities($_POST['sms_ok']);
	$offer_sms_phone=htmlentities($_POST['sms_phone']);
	$offer_sms_text_zakaz=htmlentities($_POST['sms_text_zakaz']);
	$offer_sms_text_send=htmlentities($_POST['sms_text_send']);
	$offer_sms_text_way=htmlentities($_POST['sms_text_way']);
	$offer_sms_text_success=htmlentities($_POST['sms_text_success']);	

	$sql_sms_moderation = "UPDATE offers SET `sms_ok`='$offer_sms_ok', `sms_phone`='$offer_sms_phone', `sms_text_zakaz`='$offer_sms_text_zakaz', `sms_text_send`='$offer_sms_text_send', `sms_text_way`='$offer_sms_text_way', `sms_text_success`='$offer_sms_text_success'  WHERE `id`='$offer_id' AND `owner_id`='$user_id'";
	$result_sms_moderation = $mysqli->query($sql_sms_moderation);
	Header('Location:' . $_SERVER['PHP_SELF'] .'?offer='.$offer_id.'&xtext=7');
	exit;
	}
	
// Инициирование редактирования оффера рекламодателем (изменение EMAIL-уведомлений)
// Initiate editing offer advertiser (change EMAIL-notifications)
if (isset($_POST['moderate_email_submit']) && isset($_POST['offer_id']) && $user_tip=='40')
	{
	$offer_id=htmlentities($_POST['offer_id']);
	$offer_email_ok=htmlentities($_POST['email_ok']);
	$offer_email_box=htmlentities($_POST['email_box']);	

	$sql_sms_moderation = "UPDATE offers SET `email_ok`='$offer_email_ok', `email_box`='$offer_email_box'  WHERE `id`='$offer_id' AND `owner_id`='$user_id'";
	$result_sms_moderation = $mysqli->query($sql_sms_moderation);
	Header('Location:' . $_SERVER['PHP_SELF'] .'?offer='.$offer_id.'&xtext=8');
	exit;
	}	

// Инициирование редактирования/модерации оффера администратором
// Initiate editing / moderation offer administrator
if (isset($_POST['moderate_submit']) && $user_tip=='70')
	{
	if (isset($_POST['id_owner']) && isset($_POST['vladelec']))
		{
		$offer_id=htmlentities($_GET['offer']);
		if (isset($_POST['name']) && $_POST['name']!='')
			{
			$offer_name=htmlentities($_POST['name']);
			if (isset($_POST['url']) && $_POST['url']!='')
				{
				$offer_url=htmlentities($_POST['url']);
				$offer_category=htmlentities($_POST['category']);
				$offer_cena=htmlentities($_POST['cena']);
				$offer_old_owner=htmlentities($_POST['id_owner']);
				$offer_new_owner=htmlentities($_POST['vladelec']);
				$offer_comission_cpa=htmlentities($_POST['comission_cpa']);
				$offer_uroven_dostupa=htmlentities($_POST['uroven_dostupa']);
				$offer_deystvie=htmlentities($_POST['deystvie']);
				$offer_comission=htmlentities($_POST['comission']);
				$offer_tip_comission=htmlentities($_POST['tip_comission']);
				$offer_tip_comission_cpa=htmlentities($_POST['tip_comission_cpa']);
				$offer_hold=htmlentities($_POST['hold']);
				$offer_timeobrabotka=htmlentities($_POST['timeobrabotka']);
				$offer_postclick=htmlentities($_POST['postclick']);
				
				$offer_email_ok=htmlentities($_POST['email_ok']);
				$offer_email_box=htmlentities($_POST['email_box']);
				
				// Если в настройках сети включены СМС-уведомления, то обрабатываем POST-переменные отвечающие за СМС-уведомления.
				// If the network settings are included SMS notifications, then we treat the POST-variables responsible for SMS notifications .
				if ($settings_sms_ok==1)
					{
					$offer_sms_ok=htmlentities($_POST['sms_ok']);
					$offer_sms_phone=htmlentities($_POST['sms_phone']);
					$offer_sms_text_zakaz=htmlentities($_POST['sms_text_zakaz']);
					$offer_sms_text_send=htmlentities($_POST['sms_text_send']);
					$offer_sms_text_way=htmlentities($_POST['sms_text_way']);
					$offer_sms_text_success=htmlentities($_POST['sms_text_success']);
					}
				//
		
				if (isset($_POST['allow_success_status_zakaz'])) {$allow_success_status_zakaz=htmlentities($_POST['allow_success_status_zakaz']);}
				if (isset($_POST['off_balance'])) {$off_balance=htmlentities($_POST['off_balance']);}
		
				$offer_tip_traffic='';
				if (isset($_POST['tip_traffic1']) && $_POST['tip_traffic1']=='on') {$offer_tip_traffic.='1';} else {$offer_tip_traffic.='0';}
				if (isset($_POST['tip_traffic2']) && $_POST['tip_traffic2']=='on') {$offer_tip_traffic.='|1';} else {$offer_tip_traffic.='|0';}
				if (isset($_POST['tip_traffic3']) && $_POST['tip_traffic3']=='on') {$offer_tip_traffic.='|1';} else {$offer_tip_traffic.='|0';}
				if (isset($_POST['tip_traffic4']) && $_POST['tip_traffic4']=='on') {$offer_tip_traffic.='|1';} else {$offer_tip_traffic.='|0';}
				if (isset($_POST['tip_traffic5']) && $_POST['tip_traffic5']=='on') {$offer_tip_traffic.='|1';} else {$offer_tip_traffic.='|0';}
				if (isset($_POST['tip_traffic6']) && $_POST['tip_traffic6']=='on') {$offer_tip_traffic.='|1';} else {$offer_tip_traffic.='|0';}
				if (isset($_POST['tip_traffic7']) && $_POST['tip_traffic7']=='on') {$offer_tip_traffic.='|1';} else {$offer_tip_traffic.='|0';}
				if (isset($_POST['tip_traffic8']) && $_POST['tip_traffic8']=='on') {$offer_tip_traffic.='|1';} else {$offer_tip_traffic.='|0';}
				if (isset($_POST['tip_traffic9']) && $_POST['tip_traffic9']=='on') {$offer_tip_traffic.='|1';} else {$offer_tip_traffic.='|0';}
				if (isset($_POST['tip_traffic10']) && $_POST['tip_traffic10']=='on') {$offer_tip_traffic.='|1';} else {$offer_tip_traffic.='|0';}
				if (isset($_POST['tip_traffic11']) && $_POST['tip_traffic11']=='on') {$offer_tip_traffic.='|1';} else {$offer_tip_traffic.='|0';}
				if (isset($_POST['tip_traffic12']) && $_POST['tip_traffic12']=='on') {$offer_tip_traffic.='|1';} else {$offer_tip_traffic.='|0';}
				if (isset($_POST['tip_traffic13']) && $_POST['tip_traffic13']=='on') {$offer_tip_traffic.='|1';} else {$offer_tip_traffic.='|0';}
				if (isset($_POST['tip_traffic14']) && $_POST['tip_traffic14']=='on') {$offer_tip_traffic.='|1';} else {$offer_tip_traffic.='|0';}
				if (isset($_POST['tip_traffic15']) && $_POST['tip_traffic15']=='on') {$offer_tip_traffic.='|1';} else {$offer_tip_traffic.='|0';}
				if (isset($_POST['tip_traffic16']) && $_POST['tip_traffic16']=='on') {$offer_tip_traffic.='|1';} else {$offer_tip_traffic.='|0';}

				// Формирование переменной для поля ГЕО-локации клиента
				// Formation of variable fields customer GEO-location
				if (isset($_POST['country1']) && $_POST['country1']!='') 
					{
					$offer_country1=htmlentities($_POST['country1']);
					$sql_country_name = "SELECT iso,name_ru FROM sxgeo_country WHERE `iso`='$offer_country1'";
					$result_country_name=$mysqli->query($sql_country_name);
					if (mysqli_num_rows($result_country_name) > 0) 
						{
						$res_country_name=mysqli_fetch_array($result_country_name);
						$offer_country1=htmlentities($res_country_name['name_ru']);
						$offer_iso1=htmlentities($res_country_name['iso']);
						} else {$offer_iso1='0'; $offer_country1='0';}
					} else {$offer_iso1='0'; $offer_country1='0';}
					
				if (isset($_POST['region1']) && $_POST['region1']!='') 
					{
					$offer_region1=htmlentities($_POST['region1']);
					$sql_region_name = "SELECT id,name_ru FROM sxgeo_regions WHERE `id`='$offer_region1'";
					$result_region_name=$mysqli->query($sql_region_name);
					if (mysqli_num_rows($result_region_name) > 0) 
						{
						$res_region_name=mysqli_fetch_array($result_region_name);
						$offer_region_id1=htmlentities($res_region_name['id']);
						$offer_region1=htmlentities($res_region_name['name_ru']);
						} else {$offer_region_id1='0'; $offer_region1='0';}
					} else {$offer_region_id1='0'; $offer_region1='0';}
					
					
				if (isset($_POST['city1']) && $_POST['city1']!='') 
					{
					$offer_city1=htmlentities($_POST['city1']);
					$sql_cities_name = "SELECT id,name_ru FROM sxgeo_cities WHERE `id`='$offer_city1'";
					$result_cities_name=$mysqli->query($sql_cities_name);
					if (mysqli_num_rows($result_cities_name) > 0) 
						{
						$res_cities_name=mysqli_fetch_array($result_cities_name);
						$offer_city_id1=htmlentities($res_cities_name['id']);
						$offer_city1=htmlentities($res_cities_name['name_ru']);
						} else {$offer_city_id1='0'; $offer_city1='0';}
					} else {$offer_city_id1='0'; $offer_city1='0';}			
					
				$offer_geo=$offer_iso1.'|'.$offer_region_id1.'|'.$offer_city_id1;
		
				$sql_moderation = "UPDATE offers SET 
				`cena`='$offer_cena', 
				`owner_id`='$offer_new_owner', 
				`name`='$offer_name',
				`url`='$offer_url',
				`category`='$offer_category',
				`comission_cpa`='$offer_comission_cpa', 
				`uroven_dostupa`='$offer_uroven_dostupa', 
				`deystvie`='$offer_deystvie', 
				`comission`='$offer_comission', 
				`tip_comission`='$offer_tip_comission', 
				`tip_comission_cpa`='$offer_tip_comission_cpa',
				`hold`='$offer_hold', 
				`tip_traffic`='$offer_tip_traffic',
				`timeobrabotka`='$offer_timeobrabotka', 
				`geo`='$offer_geo', 
				`postclick`='$offer_postclick',
				`email_ok`='$offer_email_ok', 
				`email_box`='$offer_email_box'
				";
				
				// Если в настройках сети включены СМС-уведомления, то включаем передачу соответствующих параметров
				// If the network settings are included SMS-notification, include the transfer of the relevant parameters
				if ($settings_sms_ok==1)
					{
					$sql_moderation.="
					, `sms_ok`='$offer_sms_ok', 
					`sms_phone`='$offer_sms_phone', 
					`sms_text_zakaz`='$offer_sms_text_zakaz', 
					`sms_text_send`='$offer_sms_text_send', 
					`sms_text_way`='$offer_sms_text_way', 
					`sms_text_success`='$offer_sms_text_success' ";
					}
				//
				
				if (isset($allow_success_status_zakaz))
					{
					$sql_moderation.=" , `allow_success_status_zakaz`='$allow_success_status_zakaz' ";
					}
					
				if (isset($off_balance))
					{
					$sql_moderation.=" , `off_balance`='$off_balance' ";
					}					
				
				$sql_moderation.="
				WHERE `id`='$offer_id'";
		
				$result_moderation = $mysqli->query($sql_moderation);
				Header('Location:' . $_SERVER['PHP_SELF'] .'?offer='.$offer_id.'&xtext=5');
				exit;
				}
			else
				{
				Header('Location:' . $_SERVER['PHP_SELF'] .'?offer='.$offer_id.'&xtext=1');
				exit;
				}	
			}
		else
			{
			Header('Location:' . $_SERVER['PHP_SELF'] .'?offer='.$offer_id.'&xtext=2');
			exit;
			}
		}
	}
		
// Инициация включения оффера администратором
// Initiate inclusion offer administrator
if (isset($_GET['on']) && $_GET['on']!='' && $user_tip=='70')
	{
	$on=htmlentities($_GET['on']);
	// Проверяем, подключены ли к офферу лендинги. Если нет - то не активируем оффер
	// Check whether to offer Landing connected. If not - do not activate the offer
	$sql_landings = "SELECT id FROM landings WHERE `offer_id`='$on'";
	$result_landings = $mysqli->query($sql_landings);
	$cvet=0;
	if (mysqli_num_rows($result_landings) > 0) 
		{
		$sql10 = "UPDATE offers SET `active`='1' WHERE `id`='$on'";
		$result10 = $mysqli->query($sql10);
		header('location:' . $_SERVER['PHP_SELF'].'?offer='.$on.'&xtext=7');
		exit;
		}
	else
		{
		header('location:' . $_SERVER['PHP_SELF'].'?offer='.$on.'&xtext=8');
		exit;
		}
	}

// Инициация выключения оффера администратором
// Initiate off offer administrator
if (isset($_GET['off']) && $_GET['off']!='' && $user_tip=='70')
	{
	$off=htmlentities($_GET['off']);
	$sql10 = "UPDATE offers SET `active`='0' WHERE `id`='$off'";
	$result10 = $mysqli->query($sql10);
	header('location:' . $_SERVER['PHP_SELF']);
	exit;	
	}

// Инициация удаления оффера администратором
// Initiate removal offer administrator
if (isset($_GET['delete']) && $_GET['delete']!='' && $user_tip=='70')
	{
	$id_offer=htmlentities($_GET['delete']);
	$sql = "SELECT * FROM offers WHERE `id`='$id_offer'";
	$result = $mysqli->query($sql);
	if (mysqli_num_rows($result) > 0) 
		{
		$request = "DELETE from offers WHERE `id`='$id_offer'";
		$result = $mysqli->query($request);
		
		// Если находим промо-картинку от оффера то удаляем ее.
		// If we find a promo picture from offer then remove it.
		$promo_img='./tmp/offer'.$id_offer.'.jpg';
		$promo_img_temp='./tmp/temp_offer'.$id_offer.'.jpg';
		if (file_exists($promo_img)) 
			{
			unlink ($promo_img);
			}
		if (file_exists($promo_img_temp)) 
			{
			unlink ($promo_img_temp);
			}			
		
		header('location:' . $_SERVER['PHP_SELF']);
		exit;
		} 
	}

?>