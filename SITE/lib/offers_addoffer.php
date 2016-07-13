<?php

// Что будет при добавлении оффера
// What happens when you add offer
if (isset($_POST['addoffer_submit']) && ($user_tip=='40' || $user_tip=='70'))
	{
	// Если текущая роль - рекламодатель, то действует ограничение на количество офферов на аккаунте
	// If the current role - the advertiser, the effect on the number of offerov on account limit
	if ($user_tip=='40')
		{
		$sql_account_count_offers = "SELECT id FROM offers WHERE `owner_id`='$user_id'";
		$result_account_count_offers=$mysqli->query($sql_account_count_offers);
		if (mysqli_num_rows($result_account_count_offers)>=$settings_account_max_offers) 
			{
			Header('Location: ./offers.php?xtext=6');
			exit;	
			}
		}
		
	if (isset($_POST['vladelec']) && $_POST['vladelec']!='')
		{
		if (isset($_POST['name']) && $_POST['name']!='')
			{
			$offer_name=htmlentities($_POST['name']);
			if (isset($_POST['url']) && $_POST['url']!='')
				{
				$offer_url=htmlentities($_POST['url']);
				$offer_owner=htmlentities($_POST['vladelec']);
				$offer_cena=htmlentities($_POST['cena']);
				if (isset($_POST['comission_cpa']))	{$offer_comission_cpa=htmlentities($_POST['comission_cpa']);} else {$offer_comission_cpa='0';}
				if (isset($_POST['comission_cpa'])) {$offer_uroven_dostupa=htmlentities($_POST['uroven_dostupa']);} else {$offer_uroven_dostupa='2';}					
				if (isset($_POST['tip_comission'])) {$offer_tip_comission=htmlentities($_POST['tip_comission']);} else {$offer_tip_comission='1';}
				if (isset($_POST['tip_comission_cpa'])) {$offer_tip_comission_cpa=htmlentities($_POST['tip_comission_cpa']);} else {$offer_tip_comission_cpa=$offer_tip_comission;}
				$offer_deystvie=htmlentities($_POST['deystvie']);
				$offer_comission=htmlentities($_POST['comission']);
				$offer_hold=htmlentities($_POST['hold']);
				$offer_timeobrabotka=htmlentities($_POST['timeobrabotka']);
				$offer_postclick=htmlentities($_POST['postclick']);
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
				// Formation of variable fields сustomer GEO-location
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
		
				$sql_moderation = "INSERT INTO offers (`name`,`url`,`owner_id`,`cena`,`comission_cpa`,`uroven_dostupa`,`deystvie`,`comission`,`tip_comission`,`tip_comission_cpa`,`hold`,`timeobrabotka`,`postclick`,`tip_traffic`,`geo`) VALUES ('$offer_name','$offer_url','$offer_owner','$offer_cena','$offer_comission_cpa','$offer_uroven_dostupa','$offer_deystvie','$offer_comission','$offer_tip_comission','$offer_tip_comission_cpa','$offer_hold','$offer_timeobrabotka','$offer_postclick','$offer_tip_traffic','$offer_geo')";
				$result_moderation = $mysqli->query($sql_moderation);
				Header('Location: ./offers.php?xtext=4');
				exit;
				}
			else
				{
				Header('Location: ./offers.php?xtext=1');
				exit;
				}
			}
		else
			{
			Header('Location: ./offers.php?xtext=2');
			exit;	
			}
		}
	else
		{
		Header('Location: ./offers.php?xtext=3');
		}
	}
		
?>