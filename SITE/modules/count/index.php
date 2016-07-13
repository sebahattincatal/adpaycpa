<?php

// Если был переход по партнерской ссылке выданной вебмастеру в свойствах оффера
// If there was a transition on affiliate link issued by the webmaster in the properties offer
if (isset($_GET['p']) && $_GET['p']!='' && $_GET['p']!='0')
	{
	$partnerlink=partnerstroka_decode(htmlentities($_GET['p']),true);
	$userid=htmlentities($partnerlink[0]);
	if ($userid=='1') {$userid='0';}
	$offerid=htmlentities($partnerlink[1]);
	$landingid=htmlentities($partnerlink[2]);

	// Проверяем есть ли оффер с указанным ID
	// Check whether the offer is, with the specified ID
	$sql_checkoffer = "SELECT id,owner_id,postclick,off_balance FROM offers WHERE `id`='$offerid'";
	$result_checkoffer=$mysqli->query($sql_checkoffer);
	if (mysqli_num_rows($result_checkoffer) > 0) 
		{
		$res_checkoffer=mysqli_fetch_array($result_checkoffer);
		$offerid=htmlentities($res_checkoffer['id']);
		$ownerid=htmlentities($res_checkoffer['owner_id']);
		$postclick=htmlentities($res_checkoffer['postclick']);
		$off_balance=htmlentities($res_checkoffer['off_balance']);

		// Если указано при каком минимальном балансе рекламодателя оффер должен отключаться то выполняем проверку
		// If you specify at what minimum balance of advertiser's offer must be switched off then complete the checkout
		if ($off_balance!='0')
			{
			// Узнаем баланс рекламодателя
			// Learn advertiser balance
			$sql_reklamodatel_data = "SELECT balance FROM users WHERE `id`='$ownerid'";
			$result_reklamodatel_data=$mysqli->query($sql_reklamodatel_data);
			$res_reklamodatel_data=mysqli_fetch_array($result_reklamodatel_data);
			$balance_reklamodatel=htmlentities($res_reklamodatel_data['balance']);
				
			// Если на балансе у рекламодателя сумма меньше или равна той при которой оффер должен выключаться, то выключаем оффер.
			// If the balance of the advertiser's total is less than or equal to that in which the offer should be turned off, then turn off the offer.
			if ($balance_reklamodatel<=$off_balance)
				{
				$sql_off_offer = "UPDATE offers SET `active`='0' WHERE `id`='$offerid' AND `owner_id`='$ownerid'";
				$result_off_offer=$mysqli->query($sql_off_offer);
				
				// Определяем какой домен используется для витрины
				// Determine which domain is used for showcase
				$sql_domain_vitrina = "SELECT domain FROM domains WHERE `active`='2' ORDER BY `id` DESC";
				$result_domain_vitrina = $mysqli->query($sql_domain_vitrina);
				$res_domain_vitrina=mysqli_fetch_array($result_domain_vitrina);
			
				// Помещаем домен в переменную
				// Put the variable domain
				$domain_vitrina=htmlentities($res_domain_vitrina['domain']);
				
				// Редиректим посетителя на витрину
				// Redirect the visitor to the shop window
				Header('Location: http://'.$domain_vitrina);
				exit;
				}
			}
	
		// Проверяем есть ли лендинг с указанным ID
		// Check whether there landing with the specified ID
		$sql_checklanding = "SELECT id,url FROM landings WHERE `id`='$landingid'";
		$result_checklanding=$mysqli->query($sql_checklanding);
		if (mysqli_num_rows($result_checklanding) > 0) 
			{
			$res_checklanding=mysqli_fetch_array($result_checklanding);
			$url=htmlentities($res_checklanding['url']);
			
			// Подключаем все необходимые функции
			// Connect all the necessary functions
			include $_SERVER['DOCUMENT_ROOT'].'/../modules/count/functions.php';
			}
		}
	}
	
// Если был переход по ссылке субаккаунта выданной вебмастеру в разделе СУБАККАУНТЫ
// If there was a transition to the link subaccount webmaster issued under subaccounts
if (isset($_GET['s']) && $_GET['s']!='' && $_GET['s']!='0')
	{
	$subacc_id=htmlentities($_GET['s']);
	// Проверяем есть ли субаккаунт с указанным ID
	// Check whether there subaccount with the specified ID
	$sql_readsubacc = "SELECT * FROM subacc WHERE `id`='$subacc_id'";
	$result_readsubacc=$mysqli->query($sql_readsubacc);
	if (mysqli_num_rows($result_readsubacc) > 0) 
		{
		$res_readsubacc=mysqli_fetch_array($result_readsubacc);
		$userid=htmlentities($res_readsubacc['user_id']);
		if ($userid=='1') {$userid='0';}
		$offerid=htmlentities($res_readsubacc['offer_id']);
		$landingid=htmlentities($res_readsubacc['landing_id']);
		$page=$res_readsubacc['page'];	
		$page=html_entity_decode($page, ENT_QUOTES, 'utf-8');		
		
		// Проверяем есть ли оффер с указанным ID
		// Check whether the offer is, with the specified ID
		$sql_checkoffer = "SELECT id,owner_id,postclick,off_balance FROM offers WHERE `id`='$offerid'";
		$result_checkoffer=$mysqli->query($sql_checkoffer);
		if (mysqli_num_rows($result_checkoffer) > 0) 
			{
			$res_checkoffer=mysqli_fetch_array($result_checkoffer);
			$offerid=htmlentities($res_checkoffer['id']);
			$ownerid=htmlentities($res_checkoffer['owner_id']);
			$postclick=htmlentities($res_checkoffer['postclick']);
			$off_balance=htmlentities($res_checkoffer['off_balance']);
	
			// Если указано при каком минимальном балансе рекламодателя оффер должен отключаться то выполняем проверку
			// If you specify at what minimum balance of advertiser's offer must be switched off then complete the checkout
			if ($off_balance!='0')
				{
				// Узнаем баланс рекламодателя
				// Learn advertiser balance
				$sql_reklamodatel_data = "SELECT balance FROM users WHERE `id`='$ownerid'";
				$result_reklamodatel_data=$mysqli->query($sql_reklamodatel_data);
				$res_reklamodatel_data=mysqli_fetch_array($result_reklamodatel_data);
				$balance_reklamodatel=htmlentities($res_reklamodatel_data['balance']);
					
				// Если на балансе у рекламодателя сумма меньше или равна той при которой оффер должен выключаться, то выключаем оффер.
				// If the balance of the advertiser's total is less than or equal to that in which the offer should be turned off, then turn off the offer 
				if ($balance_reklamodatel<=$off_balance)
					{
					$sql_off_offer = "UPDATE offers SET `active`='0' WHERE `id`='$offerid' AND `owner_id`='$ownerid'";
					$result_off_offer=$mysqli->query($sql_off_offer);
					
					// Определяем какой домен используется для витрины
					// Determine which domain is used for showcase
					$sql_domain_vitrina = "SELECT domain FROM domains WHERE `active`='2' ORDER BY `id` DESC";
					$result_domain_vitrina = $mysqli->query($sql_domain_vitrina);
					$res_domain_vitrina=mysqli_fetch_array($result_domain_vitrina);
				
					// Помещаем домен в переменную
					// Put the variable domain
					$domain_vitrina=htmlentities($res_domain_vitrina['domain']);
					
					// Редиректим посетителя на витрину
					// Redirect the visitor to the shop window
					Header('Location: http://'.$domain_vitrina);
					exit;
					}
				}
		
			// Проверяем есть ли лендинг с указанным ID
			// Check whether there landing with the specified ID
			$sql_checklanding = "SELECT id,url FROM landings WHERE `id`='$landingid'";
			$result_checklanding=$mysqli->query($sql_checklanding);
			if (mysqli_num_rows($result_checklanding) > 0) 
				{
				$res_checklanding=mysqli_fetch_array($result_checklanding);
				$url=htmlentities($res_checklanding['url']);
				if (isset($page)){$url=$page;}
				
				// Подключаем все необходимые функции
				// Connect all the necessary functions
				include $_SERVER['DOCUMENT_ROOT'].'/../modules/count/functions.php';
				}
			}
		}
	}	
	
?>