<?php

// Если был переход по партнерской ссылке выданной вебмастеру в личном кабинете
// If there was a transition on affiliate link webmaster issued in a private office
if (isset($_GET['p']) && $_GET['p']!='' && $_GET['p']!='0')
	{
	// Подключаем файл конфигурации
	// Connect configuration file
	include $_SERVER['DOCUMENT_ROOT'].'/../includes/config.php';
	
	// Подключаем файл защиты от инжекта для передаваемых переменных
	// Connect the protection of Injection file transmitted variables
	include $_SERVER['DOCUMENT_ROOT'].'/../includes/antiinject/index.php';

	// Подключаем функции кодирования и раскодирования партнерской строки
	// Connect the encoding and decoding functions affiliate line
	include $_SERVER['DOCUMENT_ROOT'].'/../includes/partnerstroka/index.php';
		
	// Подключаем необходимые библиотеки
	// Connect the required libraries
	include_once $_SERVER['DOCUMENT_ROOT'].'/../modules/count/index.php';
	header('Location: '.$url.'?stats='.$code);
	exit;
	}
	
// Если был переход по ссылке субаккаунта выданной вебмастеру в личном кабинете
// If there was a transition to the link subaccount webmaster issued in a private office
if (isset($_GET['s']) && $_GET['s']!='' && $_GET['s']!='0')
	{
	// Подключаем файл конфигурации
	// Connect configuration file
	include $_SERVER['DOCUMENT_ROOT'].'/../includes/config.php';
	
	// Подключаем файл защиты от инжекта для передаваемых переменных
	// Connect the protection of Injection file transmitted variable
	include $_SERVER['DOCUMENT_ROOT'].'/../includes/antiinject/index.php';
	
	// Подключаем функции кодирования и раскодирования партнерской строки
	// Connect the encoding and decoding functions affiliate line
	include $_SERVER['DOCUMENT_ROOT'].'/../includes/partnerstroka/index.php';	

	// Подключаем необходимые библиотеки
	// Connect the required libraries
	include_once $_SERVER['DOCUMENT_ROOT'].'/../modules/count/index.php';
	header('Location: '.$url.'?stats='.$code);
	exit;
	}	
	
// Если было инициировано добавление нового заказа (заявки/действия или пр.) в базу
// If it was initiated by the addition of a new order (orders/actions or e.t.c.) in the base
if (isset($_POST['code']) && $_POST['code']!='' && $_POST['code']!='0')
	{
	$code=htmlentities($_POST['code']);	
		
	// Подключаем файл конфигурации
	// Connect configuration file
	include $_SERVER['DOCUMENT_ROOT'].'/../includes/config.php';
	
	// Подключаем файл защиты от инжекта для передаваемых переменных
	// Connect the protection of injection file transmitted variables
	include $_SERVER['DOCUMENT_ROOT'].'/../includes/antiinject/index.php';

	// Подключаем файл с настройками системы
	// Connect the file system settings
	include $_SERVER['DOCUMENT_ROOT'].'/../includes/settings/index.php';	

	// Подключаем функции кодирования и раскодирования партнерской строки
	// Connect the encoding and decoding functions affiliate line
	include $_SERVER['DOCUMENT_ROOT'].'/../includes/partnerstroka/index.php';	
	
	// Подключаем файл с функцией генерации случайной строки
	// Include files with the function of generating a random string
	include $_SERVER['DOCUMENT_ROOT'].'/../includes/genrand50sym/index.php';	
	
	// Подключаем файл с функцией отправки почты
	// Include files with the function of sending mail
	include $_SERVER['DOCUMENT_ROOT'].'/../includes/sendemail/index.php';	
	
	// Получаем данные используя статистику посещений
	// Get the data using the statistics of visits
	$sql_getdata = "SELECT * FROM clients_log WHERE `code`='$code' ORDER BY id DESC";
	$result_getdata=$mysqli->query($sql_getdata);
	if (mysqli_num_rows($result_getdata) > 0) 
		{
		$res_getdata=mysqli_fetch_array($result_getdata);
	
		// Передаем значения в переменные
		// Pass values ​​to variables
		$userid=htmlentities($res_getdata['user_id']);
		$offerid=htmlentities($res_getdata['offer_id']);
		$ownerid=htmlentities($res_getdata['owner_id']);
		$landingid=htmlentities($res_getdata['landing_id']);
		$referer=htmlentities($res_getdata['referer']);
		$country=htmlentities($res_getdata['country']);
		$region=htmlentities($res_getdata['region']);
		$town=htmlentities($res_getdata['town']);
		$ip=htmlentities($res_getdata['ip']);
		$short_country=htmlentities($res_getdata['short_country']);
		$browser_name=htmlentities($res_getdata['browser_name']);
		$browser_version=htmlentities($res_getdata['browser_version']);
		$useragent=htmlentities($res_getdata['useragent']);
		$platform=htmlentities($res_getdata['platform']);
		$referer=htmlentities($res_getdata['referer']);
		$mobile=htmlentities($res_getdata['mobile']);
		$subid1=htmlentities($res_getdata['subid1']);
		$subid2=htmlentities($res_getdata['subid2']);
		$subid3=htmlentities($res_getdata['subid3']);
		
		// Задаем переменную для ГЕО
		// Set a variable for GEO
		if (isset($country) && ($country!='')) {if ((isset($region) && ($region!='')) && (isset($town) && ($town!=''))) {$geo=htmlentities($country).' / '.htmlentities($region).' / '.htmlentities($town);} else {$geo=htmlentities($country);}} else {$geo='Не определено';}
		if (isset($_POST['name']) && $_POST['name']!='') {$name=htmlentities($_POST['name']);} else {$name="";}
		if (isset($_POST['phone']) && $_POST['phone']!='') {$phone=htmlentities($_POST['phone']);} else {$phone="";}
		if (isset($_POST['email']) && $_POST['email']!='') {$email=htmlentities($_POST['email']);} else {$email="";}
		if (isset($_POST['address']) && $_POST['address']!='') {$address=htmlentities($_POST['address']);} else {$address="";}
		if (isset($_POST['kolvo']) && $_POST['kolvo']!='') {$kolvo=htmlentities($_POST['kolvo']);} else {$kolvo="1";}
		if (isset($_POST['artikul']) && $_POST['artikul']!='') {$artikul=htmlentities($_POST['artikul']);} else {$artikul="";}
		if (isset($_POST['comments']) && $_POST['comments']!='') {$comments=htmlentities($_POST['comments']);} else {$comments="";}
		
		// Получаем данные о цене и комиссии на оффере
		// Get information about the price and the commission on offers
		$sql_getdataoffer = "SELECT * FROM offers WHERE `id`='$offerid' AND `owner_id`='$ownerid'";
		$result_getdataoffer=$mysqli->query($sql_getdataoffer);
		if (mysqli_num_rows($result_getdataoffer) > 0) 
			{
			$res_getdataoffer=mysqli_fetch_array($result_getdataoffer);
			
			
			// Получаем email рекламодателя
			// Get email advertiser
			$sql_owneremail = "SELECT email FROM users WHERE `id`='$ownerid'";
			$result_owneremail=$mysqli->query($sql_owneremail);
			$res_owneremail=mysqli_fetch_array($result_owneremail);
			$owner_email=htmlentities($res_owneremail['email']);
			
			// Передаем значения в переменные
			// Pass values ​​to variables
			$deystvie=htmlentities($res_getdataoffer['deystvie']);

			$offer_name=htmlentities($res_getdataoffer['name']);
			if (isset($_POST['cena']))
				{
				$cena=htmlentities($_POST['cena']);	
				}
			else
				{
				$cena=htmlentities($res_getdataoffer['cena']);
				}

			// Узнаем тип комиссии
			// Find out the type of the commission
			$tip_comission=htmlentities($res_getdataoffer['tip_comission']);
			
			$comission=htmlentities($res_getdataoffer['comission']);
			$comission_cpa=htmlentities($res_getdataoffer['comission_cpa']);
				
			// Если комиссия выставлена в виде процентов от цены, то выполняем это.
			// If the commission is exhibited in the form of interest on prices, then we execute it.
			if ($tip_comission=='2')
				{
				$comission=$cena/100*$comission;
				$comission_cpa=$cena/100*$comission_cpa;
				}
				
			$sms_ok=htmlentities($res_getdataoffer['sms_ok']);
			$sms_text=htmlentities($res_getdataoffer['sms_text_zakaz']);

			// Если заказ был передан из интернет-магазина, пишем его shop_key и shop_zakaz_id
			// If the order has been transmitted from an online store, and write it shop_key shop_zakaz_id
			$shop_key='';
			$shop_zakaz_id='';
			if (isset($_POST['shop_key']) && isset($_POST['shop_zakaz_id']))
				{
				$shop_key=htmlentities($_POST['shop_key']);
				$shop_zakaz_id=htmlentities($_POST['shop_zakaz_id']);
				}
			
			// Узнаем, количество заказов у рекламодателя для определения номера у очередного заказа
			// We'll know the number of orders from the advertiser to determine the number of the next in order
			$sql_zakaz_kolvo = "SELECT COUNT(id) as count FROM zakaz WHERE `owner_id`='$ownerid'";
			$result_zakaz_kolvo = $mysqli->query($sql_zakaz_kolvo);
			$res_zakaz_kolvo = mysqli_fetch_assoc($result_zakaz_kolvo);
			$zakaz_kolvo=htmlentities($res_zakaz_kolvo['count']);
			if ($zakaz_kolvo==null || $zakaz_kolvo==0)
				{$zakaz_number=1;}
			else
				{$zakaz_number=$zakaz_kolvo+1;}
			
			$date_obrabotka=date('d.m.Y H:i:s');
			
			// Пишем в базу новый заказ
			// Write to the new order base
			$sql_save_zakaz= "INSERT INTO `zakaz` (`zakaz_number`,`user_id`,`offer_id`,`owner_id`,`landing_id`,`geo`,`ip`,`referer`,`useragent`,`subid1`,`subid2`,`subid3`,`name`,`phone`,`email`,`client_address`,`kolvo`,`artikul`,`status`,`comments`,`country`,`short_country`,`browser_name`,`browser_version`,`platform`,`mobile`,`region`,`town`,`cena`,`comission`,`comission_cpa`,`shop_key`,`shop_zakaz_id`,`date_obrabotka`) VALUES ('$zakaz_number','$userid','$offerid','$ownerid','$landingid','$geo','$ip','$referer','$useragent','$subid1','$subid2','$subid3','$name','$phone','$email','$address','$kolvo','$artikul','1','$comments','$country','$short_country','$browser_name','$browser_version','$platform','$mobile','$region','$town','$cena','$comission','$comission_cpa','$shop_key','$shop_zakaz_id','$date_obrabotka')";
			$result_save_zakaz=$mysqli->query($sql_save_zakaz);					
			
			// Если заказ успешно записался в базу, то отравляем рекламодателю СМС и на почту информацию об этом
			// If the order is successfully written to the database, then the poison advertiser SMS and e-mail information about this
			$sql_check_zakaz = "SELECT id FROM zakaz WHERE `zakaz_number`='$zakaz_number' AND `user_id`='$userid' AND `offer_id`='$offerid' AND `owner_id`='$ownerid' AND `landing_id`='$landingid'";
			$result_check_zakaz=$mysqli->query($sql_check_zakaz);
			if (mysqli_num_rows($result_check_zakaz) > 0) 
				{
				$res_check_zakaz=mysqli_fetch_array($result_check_zakaz);
				$zakaz_id=htmlentities($res_check_zakaz['id']);

				// Отправка E-mail рекламодателю
				// Sending E-mail to the advertiser
				$email_ok=htmlentities($res_getdataoffer['email_ok']);
				$email_box=htmlentities($res_getdataoffer['email_box']);
				
				if ($email_ok=='1')
					{
					$email=$email_box;
					$mail_subj = 'У Вас новый заказ в личном кабинете - CPA-сеть '.$settings_zagolovok;
					$mail_body = 'Здравствуйте!<br /><br />У Вас в личном кабинете CPA-сети '.$settings_zagolovok.', на оффере &laquo;'.$offer_name.'&raquo; появился новый необработанный заказ.<br />Пожалуйста, загляните и обработайте его, не забыв изменить статус заказа. Если у Вас будут вопросы или уточнения, пожалуйста, беспокойте техническую поддержку. Спасибо.<br /><br />CPA-сеть '.$settings_zagolovok.'<br />'.$settings_url;
					SendEMail($email, $mail_subj, $mail_body);
					$mail_sended = true;
					}				
				
				// Отправка СМС
				// Send SMS
				$url = $settings_url.'/sendsms.php'; 
				$data = array  
					(  
					'sms'			=>	'zakaz',
					'ob'			=>	$zakaz_id,
					'zakaz_number'	=>	$zakaz_number,
					'offer_id'		=>	$offerid,
					'owner_id'		=>	$ownerid
					);  
				$options = array ('http' => array ('header' => "Content-type: application/x-www-form-urlencoded\r\n", 'method'  => 'POST', 'content' => http_build_query($data)));  
				$context  = stream_context_create($options);  
				$result = file_get_contents($url, false, $context);  
				
				exit;
				}
			}
		}
	}
	
// Если поступил внешний запрос на изменение статуса заказа, то выполняем
// If you entered an external request to change the status of an order, then the
if (isset($_POST['shop_key']) && isset($_POST['shop_zakaz_id']) && isset($_POST['shop_zakaz_status']))
	{
	// Подключаем файл конфигурации
	// Connect configuration file
	include $_SERVER['DOCUMENT_ROOT'].'/../includes/config.php';
	
	// Подключаем файл защиты от инжекта для передаваемых переменных
	// Connect the protection of injection file transmitted variables
	include $_SERVER['DOCUMENT_ROOT'].'/../includes/antiinject/index.php';

	// Подключаем файл с настройками системы
	// Connect the file system settings
	include $_SERVER['DOCUMENT_ROOT'].'/../includes/settings/index.php';			
		
	$shop_key=htmlentities($_POST['shop_key']);
	$shop_zakaz_id=htmlentities($_POST['shop_zakaz_id']);
	$shop_zakaz_status=htmlentities($_POST['shop_zakaz_status']);
	

	$sql_getdatazakaz = "SELECT * FROM zakaz WHERE `shop_key`='$shop_key' AND `shop_zakaz_id`='$shop_zakaz_id'";
	$result_getdatazakaz=$mysqli->query($sql_getdatazakaz);
	if (mysqli_num_rows($result_getdatazakaz) > 0) 
		{
		$res_getdatazakaz=mysqli_fetch_array($result_getdatazakaz);
	
		// Функция обновления статуса заказа
		// Function updates the order status
		function update_zakaz()
			{
			global $mysqli, $id_zakaz, $status;
			$sql_update_zakaz = "UPDATE zakaz SET `status`='$status' WHERE `id`='$id_zakaz'";
			$result_update_zakaz = $mysqli->query($sql_update_zakaz);	
			}
		
		// Назначаем переменные под поступившие данные
		// Assign a variable received data
		$id_zakaz=htmlentities($res_getdatazakaz['id']);
		$date_obrabotka=date('d.m.Y H:i:s');
		$status=$shop_zakaz_status;

		// Узнаем, каков был статус заказа и ID оффера до нашего вмешательства
		// Find out what was the status of the order and ID offera before our intervention
		$sql_zakaz_data = "SELECT status, offer_id, cena, kolvo, user_id, comission, comission_cpa FROM zakaz WHERE `id`='$id_zakaz'";
		$result_zakaz_data = $mysqli->query($sql_zakaz_data);
		$res_zakaz_data=mysqli_fetch_array($result_zakaz_data);

		
		$cena=htmlentities($res_zakaz_data['cena']);
		$kolvo=htmlentities($res_zakaz_data['kolvo']);
		$webmaster_id=htmlentities($res_zakaz_data['user_id']);
		$comission=htmlentities($res_zakaz_data['comission']);
		$comission_cpa=htmlentities($res_zakaz_data['comission_cpa']);		
		
		
		// Назначаем переменную под ID оффера
		// Assign a variable ID offer
		$offer_id=htmlentities($res_zakaz_data['offer_id']);
		
		// Назначаем переменную под старый статус заказа
		// Assign a variable for the old order status
		$old_status_zakaza=htmlentities($res_zakaz_data['status']);
		
		// Узнаем, какой тип действия используется на оффере
		// Find out what type of action used to offer
		$sql_offers_data = "SELECT deystvie, owner_id FROM offers WHERE `id`='$offer_id'";
		$result_offers_data = $mysqli->query($sql_offers_data);
		$res_offers_data=mysqli_fetch_array($result_offers_data);
	
		// Назначаем переменную под тип действия на оффере
		// Assign a variable to the type of action to offer
		$offer_deystvie=htmlentities($res_offers_data['deystvie']);
		
		// Назначаем переменную под ID рекламодателя, владельца оффера
		// Assign a variable ID advertiser offer owner
		$owner_id=htmlentities($res_offers_data['owner_id']);
		
		// Сумма заказа = цена * количество заказанного
		// Amount of order = price * quantity ordered
		$summa_zakaza=$cena*$kolvo;
	
		// Комиссия вебмастеру = комиссия вебмастеру * количество заказанного
		// The commission = comission webmaster * amount ordered
		$summa_comission=$comission*$kolvo;
		
		// Комиссия в пользу CPA-сети = комиссия CPA-сети * количество заказанного
		// The commission in favor of the CPA-network = CPA-network comission * amount ordered
		$summa_comission_cpa=$comission_cpa*$kolvo;
		
		// Общая сумма вычитаемой с рекламодателя комиссии = комиссия вебмастеру + комиссия в пользу CPA-сети
		// The total amount is deducted from the advertiser's commission = commission webmaster + commission in favor of the CPA-network
		$comission_all=$summa_comission+$summa_comission_cpa;
		
		// Узнаем текущий баланс рекламодателя
		// Check the current balance of advertiser
		$sql_balance_reklamodatel = "SELECT balance FROM users WHERE id=$owner_id";
		$result_balance_reklamodatel = $mysqli->query($sql_balance_reklamodatel);
		$res_balance_reklamodatel=mysqli_fetch_array($result_balance_reklamodatel);
		
		// Назначаем переменную под текущий баланс рекламодателя
		// Assign a variable for the current balance of advertiser
		$balance_reklamodatel=htmlentities($res_balance_reklamodatel['balance']);
		
		// Узнаем текущий баланс вебмастера и ID его рефовода
		// Check the current balance of the webmaster and its referrer ID
		$sql_data_webmaster = "SELECT balance,myrefovod FROM users WHERE id=$webmaster_id";
		$result_data_webmaster = $mysqli->query($sql_data_webmaster);
		$res_data_webmaster=mysqli_fetch_array($result_data_webmaster);
	
		// Назначаем переменную под текущий баланс вебмастера
		// Assign a variable current balance webmaster
		$balance_webmaster=htmlentities($res_data_webmaster['balance']);
		
		// Назначаем переменную под ID рефовода вебмастера
		// Assign a variable referrer ID webmaster
		$refovod_webmaster=htmlentities($res_data_webmaster['myrefovod']);
		
		// Узнаем текущий баланс рефовода
		// Check the current balance of the referrer
		if ($settings_refprocent!='0' && $refovod_webmaster!='0' && $refovod_webmaster!='')
			{
			$sql_balance_refovod = "SELECT balance FROM users WHERE `id`='$refovod_webmaster'";
			$result_balance_refovod = $mysqli->query($sql_balance_refovod);
			$res_balance_refovod=mysqli_fetch_array($result_balance_refovod);
	
			// Назначаем переменную под текущий баланс рефовода
			// Assign a variable current balance referrer
			$balance_refovod=htmlentities($res_balance_refovod['balance']);	
			}
		
		
		// Если не было изменения статуса заказа, а было только изменение свойств заказа, то изменяем свойства заказа
		// If there was no change in the status of an order, and it was only a change in the order of properties, you are changing the properties of the order
		if ($status==$old_status_zakaza)
			{
			// Обновляем свойства заказа
			// Update the properties of the order				
			update_zakaz();
			}
	
	// ОЖИДАЕТ //		
	// EXPECTS //
			
		// Если происходит изменение статуса с ОЖИДАЕТ на В ХОЛДЕ
		// If there is a change of status with WAITING on HOLD
		elseif ($status=='2' && $old_status_zakaza=='1')
			{
			// Обновляем свойства заказа
			// Update the properties of the order
			update_zakaz();
				
			// Вычитаем у рекламодателя с баланса средства (сумма комиссии вебмастера для помещения в ХОЛД и сумму комиссии CPA-сети)
			// Subtract the advertiser with the balance of funds (the sum of commission webmasters for premises in HOLD and the amount comission of CPA-network)
			$sql_update_balance_reklamodatel = "UPDATE users SET `balance`=`balance`-'$comission_all' WHERE `id`='$owner_id'";
			$result_update_balance_reklamodatel = $mysqli->query($sql_update_balance_reklamodatel);	
	
			// Пишем в базу, в таблицу "finances", информацию о списании средств с баланса рекламодателя
			// Write to the database, in "finances" table, information about the funds are debited from the balance of advertiser
			$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$owner_id','2','$comission_all',12,'$balance_reklamodatel'-'$comission_all','2')";
			$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);		
	
			// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
			// If the order came from existing in the database webmaster, then execute
			if ($webmaster_id!='0')
				{
				// Начисляем снятые у рекламодателя с баланса средства вебмастеру в ХОЛД
				// Accrued removed from the advertiser with a balance means webmaster in HOLD
				$sql_update_hold_webmaster = "UPDATE users SET `hold`=`hold`+'$summa_comission' WHERE `id`='$webmaster_id'";
				$result_update_hold_webmaster = $mysqli->query($sql_update_hold_webmaster);
				}
			}	
			
		// Если происходит изменение статуса с ОЖИДАЕТ на ПРИНЯТ
		// If there is a change of status with EXPECT on ACCEPTED
		elseif ($status=='3' && $old_status_zakaza=='1')
			{
			// Обновляем свойства заказа
			// Update the properties of the order
			update_zakaz();
			
			// Вычитаем у рекламодателя с баланса средства (сумма комиссии вебмастера и сумму комиссии CPA-сети)
			// Subtract the advertiser with the balance of funds (sum commission of webmasters and the amount of CPA-network comission)
			$sql_update_balance_reklamodatel = "UPDATE users SET `balance`=`balance`-'$comission_all' WHERE `id`='$owner_id'";
			$result_update_balance_reklamodatel = $mysqli->query($sql_update_balance_reklamodatel);
			
			// Пишем в базу, в таблицу finances, информацию о списании средств с баланса рекламодателя
			// Write to the database, in finances table, information about the funds are debited from the balance of advertiser
			$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$owner_id','2','$comission_all',13,'$balance_reklamodatel'-'$comission_all','2')";
			$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);	
			
			// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
			// If the order came from existing in the database webmaster, then execute
			if ($webmaster_id!='0')
				{
				// Начисляем комиссию вебмастера на баланс вебмастеру
				// Commission is charged webmaster at webmaster balance
				$sql_update_balance_webmaster = "UPDATE users SET `balance`=`balance`+'$summa_comission' WHERE `id`='$webmaster_id'";
				$result_update_balance_webmaster = $mysqli->query($sql_update_balance_webmaster);
			
				// Пишем в базу, в таблицу finances, информацию о начислении средств на баланс вебмастеру
				// Write to the database, in finances table, information about the funds be credited to the balance webmaster
				$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$webmaster_id','1','$summa_comission',5,'$balance_webmaster'+'$summa_comission','2')";
				$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);	
	
				// Начисляем на счет баланса CPA-сети средства вычтенные с баланса рекламодателя в качестве комиссии CPA-сети
				// Is charged to the account of the CPA-network balance of funds deducted from the advertiser's balance sheet as a CPA-network commission
				$sql_update_balance_cpa = "UPDATE settings SET `balance_cpa`=`balance_cpa`+'$summa_comission_cpa'";
				$result_update_balance_cpa = $mysqli->query($sql_update_balance_cpa);
				}
			// Если заказ пришел БЕЗ УЧАСТИЯ ВЕБМАСТЕРА, то выполняем
			// If the order came without a webmaster, then execute
			else
				{
				// Начисляем на счет баланса CPA-сети средства вычтенные с баланса рекламодателя (комиссию вебмастера + комиссию CPA-сети)
				// Accrued on the account balance CPA-network money deducted from the advertiser's balance (commission webmaster + CPA-network comission)
				$sql_update_balance_cpa = "UPDATE settings SET `balance_cpa`=`balance_cpa`+'$comission_all'";
				$result_update_balance_cpa = $mysqli->query($sql_update_balance_cpa);	
				}
				
		// Если у вебмастера есть рефовод, то начисляем рефоводу реферальские
		// If the webmaster has a referrer, the referrer accrue referral bonus
		if ($settings_refprocent!='0' && $refovod_webmaster!='0' && $refovod_webmaster!='')
			{
			// Начисляем реферальские на счет рефовода
			// Referral bonus is charged to the account of the referrer
			$summ_referal=$summa_comission/100*$settings_refprocent;
			$sql_update_balance_refovod = "UPDATE users SET `balance`=`balance`+'$summ_referal' WHERE `id`='$refovod_webmaster'";
			$result_update_balance_refovod = $mysqli->query($sql_update_balance_refovod);	
			
			// Пишем в базу, в таблицу "finances", информацию о начислении реферальских на баланс рефовода
			// Write to the database, the table "finances", information on the calculation of the balance of referrers to a referrer
			$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$refovod_webmaster','1','$summ_referal',11,'$balance_refovod'+'$summ_referal','2')";
			$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);	
			}
		}
	// Если происходит изменение статуса с ОЖИДАЕТ на ОТКЛОНЕН
	// If there is a change of status with WAITING on REJECTED
	elseif ($status=='0' && $old_status_zakaza=='1')
		{
		// Обновляем свойства заказа
		// Update the properties of the order
		update_zakaz();
		}			
		
// В ХОЛДЕ //
// HOLD //

	// Если происходит изменение статуса с в ХОЛДЕ на ОЖИДАЕТ
	// If there is a change in status with HOLD on WAITING
	elseif ($status=='1' && $old_status_zakaza=='2')
		{
		// Обновляем свойства заказа
		// Update the properties of the order			
		update_zakaz();
		
		// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
		// If the order came from existing in the database webmaster, then execute
		if ($webmaster_id!='0')
			{
			// Вычитаем из холда у вебмастера комиссию вебмастера для последующего возврата на баланс рекламодателю
			// Subtract from Hold at webmaster webmaster commission to return for the advertiser to balance
			$sql_update_hold_webmaster = "UPDATE users SET `hold`=`hold`-'$summa_comission' WHERE `id`='$webmaster_id'";
			$result_update_hold_webmaster = $mysqli->query($sql_update_hold_webmaster);
			}
		
		// Возвращаем рекламодателю на баланса средства (сумма комиссии вебмастера и сумму комиссии CPA-сети)
		// Return the advertiser at the balance sheet assets (sum comission webmaster and sum CPA-network comission)
		$sql_update_balance_reklamodatel = "UPDATE users SET `balance`=`balance`+'$comission_all' WHERE `id`='$owner_id'";
		$result_update_balance_reklamodatel = $mysqli->query($sql_update_balance_reklamodatel);	
		
		// Пишем в базу, в таблицу "finances", информацию о возврате средств на баланс рекламодателю
		// Write to the database, the table "finances", the information on the return of funds to balance the advertiser
		$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$owner_id','1','$comission_all',14,'$balance_reklamodatel'+'$comission_all','2')";
		$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);	
		}

	// Если происходит изменение статуса с в ХОЛДЕ на ПРИНЯТ
	// If there is a change of status with HOLD on ACCEPTED
	elseif ($status=='3' && $old_status_zakaza=='2')
		{
		// Обновляем свойства заказа и изменяем дополнительный статус на "ЗАКАЗ ОПЛАЧЕН"
		// Update the properties of order and change the optional status to "order has been paid"
		update_zakaz('4');
		
		// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
		// If the order came from existing in the database webmaster, then execute
		if ($webmaster_id!='0')
			{		
			// Вычитаем средства из ХОЛДа у вебмастера, для последующего зачисления на баланс этому же вебмастеру
			// Subtract money from HOLD in webmaster for further admission to the balance of the same webmaster
			$sql_update_hold_webmaster = "UPDATE users SET `hold`=`hold`-'$summa_comission' WHERE `id`='$webmaster_id'";
			$result_update_hold_webmaster = $mysqli->query($sql_update_hold_webmaster);

			// Начисляем средства, до этого вычтенные их ХОЛДа вебмастера на баланс этому же вебмастеру
			// Accrued funds deducted before their Holden webmaster to balance the same webmaster
			$sql_update_balance_webmaster = "UPDATE users SET `balance`=`balance`+'$summa_comission' WHERE `id`='$webmaster_id'";
			$result_update_balance_webmaster = $mysqli->query($sql_update_balance_webmaster);

			// Пишем в базу, в таблицу "finances", информацию о начислении средств на баланс вебмастеру
			// Write to the database, the table "finances", information on the funds be credited to the balance webmaster
			$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$webmaster_id','1','$summa_comission',5,'$balance_webmaster'+'$summa_comission','2')";
			$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);
			}
		
		// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
		// If the order came from existing in the database webmaster, then execute
		if ($webmaster_id!='0')
			{		
			// Начисляем на счет баланса CPA-сети средства вычтенные с баланса рекламодателя в качестве комиссии CPA-сети
			// Is charged to the account of the CPA-network balance of funds deducted from the advertiser's balance sheet as a CPA-network commission
			$sql_update_balance_cpa = "UPDATE settings SET `balance_cpa`=`balance_cpa`+'$summa_comission_cpa'";
			$result_update_balance_cpa = $mysqli->query($sql_update_balance_cpa);		
			}
		// Если заказ пришел БЕЗ УЧАСТИЯ ВЕБМАСТЕРА, то выполняем
		// If the order came without a webmaster, then execute
		else
			{
			// Начисляем на счет баланса CPA-сети средства вычтенные с баланса рекламодателя (сумма комиссии вебмастера и сумму комиссии CPA-сети)
			// Accrued on the account balance CPA-network money deducted from the advertiser's balance (sum webmaster commission and sum CPA-network comission)
			$sql_update_balance_cpa = "UPDATE settings SET `balance_cpa`=`balance_cpa`+'$comission_all'";
			$result_update_balance_cpa = $mysqli->query($sql_update_balance_cpa);	
			}
			
		// Если у вебмастера есть рефовод, то начисляем рефоводу реферальские
		// If the webmaster has a referrer, the referrer accrue referral bonus
		if ($settings_refprocent!='0' && $refovod_webmaster!='0' && $refovod_webmaster!='')
			{
			// Начисляем реферальские на счет рефовода
			// Referral bonus is charged to the account of the referrer
			$summ_referal=$summa_comission/100*$settings_refprocent;
			$sql_update_balance_refovod = "UPDATE users SET `balance`=`balance`+'$summ_referal' WHERE `id`='$refovod_webmaster'";
			$result_update_balance_refovod = $mysqli->query($sql_update_balance_refovod);	
			
			// Пишем в базу, в таблицу finances, информацию о начислении реферальских на баланс рефовода
			// Write to the database, in finances table, information about the calculation of the balance of referrers to a referrer
			$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$refovod_webmaster','1','$summ_referal',11,'$balance_refovod'+'$summ_referal','2')";
			$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);	
			}			
		}
		
	// Если происходит изменение статуса с В ХОЛДЕ на ОТКЛОНЕН
	// If there is a change status with HOLD on REJECTED
	elseif ($status=='0' && $old_status_zakaza=='2')
		{
		// Обновляем свойства заказа
		// Update the properties of the order
		update_zakaz();
			
		// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
		// If the order came from existing in the database webmaster, then execute
		if ($webmaster_id!='0')
			{	
			// Вычитаем у вебмастера из ХОЛДа сумму холда
			// Subtract from the webmaster from HOLD sum Hold
			$sql_update_hold_webmaster = "UPDATE users SET `hold`=`hold`-'$summa_comission' WHERE `id`='$webmaster_id'";
			$result_update_hold_webmaster = $mysqli->query($sql_update_hold_webmaster);	
			}
		
		// Начисляем на баланс рекламодателя сумму, вычтенную у него ранее в качестве комиссии вебмастера и комиссии CPA-сети
		// Advertiser is charged on the balance amount subtracted from him earlier as a webmaster commission and CPA-network commission
		$sql_update_balance_reklamodatel = "UPDATE users SET `balance`=`balance`+'$comission_all' WHERE `id`='$owner_id'";
		$result_update_balance_reklamodatel = $mysqli->query($sql_update_balance_reklamodatel);	
		
		// Пишем в базу, в таблицу "finances", информацию о начислении средств на баланс рекламодателю
		// Write to the database, in "finances" table, information about the funds be credited to the balance of advertiser
		$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$owner_id','1','$comission_all',15,'$balance_reklamodatel'+'$comission_all','2')";
		$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);
		}
		
// ПРИНЯТ //
// ACCEPTED //

	// Если происходит изменение статуса с ПРИНЯТ на ОЖИДАЕТ
	// If there is a change of status with ACCEPTED on WAITING
	elseif ($status=='1' && $old_status_zakaza=='3')
		{
		// Обновляем свойства заказа
		// Update the properties of the order
		update_zakaz();
		
		// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
		// If the order came from existing in the database webmaster, then execute
		if ($webmaster_id!='0')
			{
			// Вычитаем с баланса CPA-сети средства начисленные с баланса рекламодателя в качестве комиссии CPA-сети
			// Subtract from the balance CPA-network funds accrued to the balance of the advertiser as a CPA-network commission
			$sql_update_balance_cpa = "UPDATE settings SET `balance_cpa`=`balance_cpa`-'$summa_comission_cpa'";
			$result_update_balance_cpa = $mysqli->query($sql_update_balance_cpa);
			}
		// Если заказ пришел БЕЗ УЧАСТИЯ ВЕБМАСТЕРА, то выполняем
		// If the order came without a webmaster, then execute
		else
			{
			// Вычитаем с баланса CPA-сети средства начисленные с баланса рекламодателя (комиссия вебмастера и комиссия CPA-сети)
			// Subtract with CPA-network balance funds accrued to the balance of advertiser (webmaster comission and CPA-network comission)
			$sql_update_balance_cpa = "UPDATE settings SET `balance_cpa`=`balance_cpa`-'$comission_all'";
			$result_update_balance_cpa = $mysqli->query($sql_update_balance_cpa);				
			}

		// Возвращаем рекламодателю на баланс вычтенную ранее сумму комиссии вебмастера и сумму комиссии CPA-сети
		// Return the advertiser to balance subtracted before the fee amount and webmasters CPA-network commission
		$sql_update_balance_reklamodatel = "UPDATE users SET `balance`=`balance`+'$comission_all' WHERE `id`='$owner_id'";
		$result_update_balance_reklamodatel = $mysqli->query($sql_update_balance_reklamodatel);
		
		// Пишем в базу, в таблицу finances, информацию о начислении средств на баланс рекламодателю
		// Write to the database, in finances table, information about the funds be credited to the balance of advertiser
		$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$owner_id','1','$comission_all',14,'$balance_reklamodatel'+'$comission_all','2')";
		$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);
		
		// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
		// If the order came from existing in the database webmaster, then execute
		if ($webmaster_id!='0')
			{
			// Вычитаем с баланса вебмастера сумму комиссии начисленную ранее
			// Subtract the amount from the balance webmaster commission assessed previously
			$sql_update_balance_webmaster = "UPDATE users SET `balance`=`balance`-'$summa_comission' WHERE `id`='$webmaster_id'";
			$result_update_balance_webmaster = $mysqli->query($sql_update_balance_webmaster);
		
			// Пишем в базу, в таблицу "finances", информацию о списании средств с баланса вебмастера
			// Write to the database, the table "finances", information about the funds are debited from the balance webmaster
			$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$webmaster_id','2','$summa_comission',14,'$balance_webmaster'-'$summa_comission','2')";
			$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);
			}	

		// Если у вебмастера есть рефовод, то вычитаем у рефовода реферальские
		// If the webmaster has referrer, then subtract from referrer referral bonus
		if ($settings_refprocent!='0' && $refovod_webmaster!='0' && $refovod_webmaster!='')
			{
			// Вычитаем реферальские со счета рефовода
			// Subtract from an account referral bonus referrer
			$summ_referal=$summa_comission/100*$settings_refprocent;
			$sql_update_balance_refovod = "UPDATE users SET `balance`=`balance`-'$summ_referal' WHERE `id`='$refovod_webmaster'";
			$result_update_balance_refovod = $mysqli->query($sql_update_balance_refovod);	
			
			// Пишем в базу, в таблицу "finances", информацию о вычитании реферальских с баланса рефовода
			// Write to the database, in "finances" table, information about referrers subtracted from the balance of the referrer
			$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$refovod_webmaster','2','$summ_referal',11,'$balance_refovod'-'$summ_referal','2')";
			$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);	
			}	
			
		}

	// Если происходит изменение статуса с ПРИНЯТ на ОТКЛОНЕН
	// If there is a change of status with ACCEPTED on REJECTED
	elseif ($status=='0' && $old_status_zakaza=='3')
		{
		// Обновляем свойства заказа
		// Update the properties of the order
		update_zakaz();
		
		// Если данный оффер работает по онлайн-оплате, то выполняем
		// If this offer works for online payment, then execute
		if ($offer_deystvie=='5')
			{
			// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
			// If the order came from existing in the database webmaster, then execute
			if ($webmaster_id!='0')
				{
				// Вычитаем с баланса CPA-сети средства начисленные в качестве комиссии CPA-сети (комиссия вебмастера)
				// Subtract from the balance CPA-network funds accrued as a CPA-network Commission (webmaster commission)
				$sql_update_balance_cpa = "UPDATE settings SET `balance_cpa`=`balance_cpa`-'$summa_comission_cpa'";
				$result_update_balance_cpa = $mysqli->query($sql_update_balance_cpa);		
				}
			// Если заказ пришел БЕЗ УЧАСТИЯ ВЕБМАСТЕРА, то выполняем
			// If the order came without a webmaster, then execute
			else
				{
				// Вычитаем с баланса CPA-сети средства начисленные в качестве комиссии CPA-сети (комиссия вебмастера и комиссию CPA-сети)
				// Subtract with CPA-network balance funds accrued as a CPA-network Commission (webmaster commission CPA-network comission)
				$sql_update_balance_cpa = "UPDATE settings SET `balance_cpa`=`balance_cpa`-'$comission_all'";
				$result_update_balance_cpa = $mysqli->query($sql_update_balance_cpa);						
				}		
			// Вычитаем у рекламодателю с баланса начисленную ранее сумму
			// Subtract advertisers with the balance of the amount previously accrued
			$vychet_u_rekla=$summa_zakaza-$comission_all;
			$sql_update_balance_reklamodatel = "UPDATE users SET `balance`=`balance`-'$vychet_u_rekla' WHERE `id`='$owner_id'";
			$result_update_balance_reklamodatel = $mysqli->query($sql_update_balance_reklamodatel);		

			// Пишем в базу, в таблицу "finances", информацию о списании средств с баланса рекламодателя
			// Write to the database, the table "finances", information about the funds are debited from the balance of advertiser
			$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$owner_id','2','$vychet_u_rekla',15,'$balance_reklamodatel'-'$vychet_u_rekla','2')";
			$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);	
			
			// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
			// If the order came from existing in the database webmaster, then execute
			if ($webmaster_id!='0')
				{		
				// Вычитаем с баланса вебмастера сумму комиссии начисленную ранее
				// Subtract the amount from the balance webmaster commission assessed previously
				$sql_update_balance_webmaster = "UPDATE users SET `balance`=`balance`-'$summa_comission' WHERE `id`='$webmaster_id'";
				$result_update_balance_webmaster = $mysqli->query($sql_update_balance_webmaster);	
			
				// Пишем в базу, в таблицу finances, информацию о списании средств с баланса вебмастера
				// Write to the database, the table finances, information about the funds are debited from the balance webmaster
				$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$webmaster_id','2','$summa_comission',15,'$balance_webmaster'-'$summa_comission','2')";
				$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);			
				}
				
			// Если у вебмастера есть рефовод, то вычитаем у рефовода реферальские
			// If the webmaster has referrer, then subtract from referrer referral bonus
			if ($settings_refprocent!='0' && $refovod_webmaster!='0' && $refovod_webmaster!='')
				{
				// Вычитаем реферальские со счета рефовода
				// Subtract referral bonus account referrer
				$summ_referal=$summa_comission/100*$settings_refprocent;
				$sql_update_balance_refovod = "UPDATE users SET `balance`=`balance`-'$summ_referal' WHERE `id`='$refovod_webmaster'";
				$result_update_balance_refovod = $mysqli->query($sql_update_balance_refovod);	
				
				// Пишем в базу, в таблицу "finances", информацию о вычитании реферальских с баланса рефовода
				// Write to the database, in "finances" table, information about referrers subtracted from the balance referrer
				$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$refovod_webmaster','2','$summ_referal',11,'$balance_refovod'-'$summ_referal','2')";
				$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);	
				}			
			}
		else
			{
			// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
			// If the order came from existing in the database webmaster, then execute
			if ($webmaster_id!='0')
				{
				// Вычитаем с баланса CPA-сети средства начисленные с баланса рекламодателя в качестве комиссии CPA-сети
				// Subtract from the balance CPA-network funds accrued to the balance of the advertiser as a CPA-network commission
				$sql_update_balance_cpa = "UPDATE settings SET `balance_cpa`=`balance_cpa`-'$summa_comission_cpa'";
				$result_update_balance_cpa = $mysqli->query($sql_update_balance_cpa);		
				}
			// Если заказ пришел БЕЗ УЧАСТИЯ ВЕБМАСТЕРА, то выполняем
			// If the order came without a webmaster, then execute
			else
				{
				// Вычитаем с баланса CPA-сети средства начисленные с баланса рекламодателя (комиссия вебмастера и комиссию CPA-сети)
				// Subtract with CPA-network balance funds accrued to the balance of advertiser (webmaster commission and CPA-network comission)
				$sql_update_balance_cpa = "UPDATE settings SET `balance_cpa`=`balance_cpa`-'$comission_all'";
				$result_update_balance_cpa = $mysqli->query($sql_update_balance_cpa);						
				}

			// Возвращаем рекламодателю на баланс вычтенную ранее сумму комиссии вебмастера и сумму комиссии CPA-сети
			// Return the advertiser to balance subtracted before sum commission webmasters and sum CPA-network commission
			$sql_update_balance_reklamodatel = "UPDATE users SET `balance`=`balance`+'$comission_all' WHERE `id`='$owner_id'";
			$result_update_balance_reklamodatel = $mysqli->query($sql_update_balance_reklamodatel);
			
			// Пишем в базу, в таблицу "finances", информацию о начислении средств на баланс рекламодателя
			// Write to the database, the table "finances", information on the funds be credited to the balance of advertiser
			$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$owner_id','1','$comission_all',15,'$balance_reklamodatel'+'$comission_all','2')";
			$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);		
			
			// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
			// If the order came from existing in the database webmaster, then execute
			if ($webmaster_id!='0')
				{		
				// Вычитаем с баланса вебмастера сумму комиссии начисленную ранее
				// Subtract the amount from the balance webmaster commission assessed previously
				$sql_update_balance_webmaster = "UPDATE users SET `balance`=`balance`-'$summa_comission' WHERE `id`='$webmaster_id'";
				$result_update_balance_webmaster = $mysqli->query($sql_update_balance_webmaster);	
			
				// Пишем в базу, в таблицу "finances", информацию о списании средств с баланса вебмастера
				// Write to the database, the table "finances", information about the funds are debited from the balance webmaster
				$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$webmaster_id','2','$summa_comission',15,'$balance_webmaster'-'$summa_comission','2')";
				$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);			
				}
				
			// Если у вебмастера есть рефовод, то вычитаем у рефовода реферальские
			// If the webmaster has referrer, then subtract from referrer referral bonus
			if ($settings_refprocent!='0' && $refovod_webmaster!='0' && $refovod_webmaster!='')
				{
				// Вычитаем реферальские со счета рефовода
				// Subtract referral bonus account referrer
				$summ_referal=$summa_comission/100*$settings_refprocent;
				$sql_update_balance_refovod = "UPDATE users SET `balance`=`balance`-'$summ_referal' WHERE `id`='$refovod_webmaster'";
				$result_update_balance_refovod = $mysqli->query($sql_update_balance_refovod);	
				
				// Пишем в базу, в таблицу finances, информацию о вычитании реферальских с баланса рефовода
				// Write to the database, in finances table, information about referrers subtracted from the balance referrer
				$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$refovod_webmaster','2','$summ_referal',11,'$balance_refovod'-'$summ_referal','2')";
				$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);	
				}	
			}			
		}
	// Если происходит изменение статуса с ПРИНЯТ на В ХОЛДЕ
	// If there is a change of status with ACCEPTED on HOLD
	elseif ($status=='2' && $old_status_zakaza=='3')
		{
		// Обновляем свойства заказа
		// Update the properties of the order
		update_zakaz();
		
		// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
		// If the order came from existing in the database webmaster, then execute
		if ($webmaster_id!='0')
			{
			// Вычитаем со счета CPA-сети средства (комиссию CPA-сети) для последующего возврата на счет рекламодателю
			// Subtract from the CPA-network account funds (CPA-network comission) to return for on advertiser account
			$sql_update_balance_cpa = "UPDATE settings SET `balance_cpa`=`balance_cpa`-'$summa_comission_cpa'";
			$result_update_balance_cpa = $mysqli->query($sql_update_balance_cpa);
			}
		// Если заказ пришел БЕЗ УЧАСТИЯ ВЕБМАСТЕРА, то выполняем
		// If the order came without a webmaster, then execute
		else
			{
			// Вычитаем со счета CPA-сети средства (комиссию вебмастера и комиссию CPA-сети) для последующего возврата на счет рекламодателю
			// Subtract from the CPA-network bill means (webmaster commission and CPA-network comission) for subsequent return to the account of the advertiser
			$sql_update_balance_cpa = "UPDATE settings SET `balance_cpa`=`balance_cpa`-'$comission_all'";
			$result_update_balance_cpa = $mysqli->query($sql_update_balance_cpa);				
			}
		
		// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
		// If the order came from existing in the database webmaster, then execute
		if ($webmaster_id!='0')
			{
			// Вычитаем средства с баланса вебмастера для последующего помещения их в ХОЛД этому же вебмастеру
			// Subtract the balance of funds from the webmaster for later placing them in HOLD the same webmaster
			$sql_update_balance_webmaster = "UPDATE users SET `balance`=`balance`-'$summa_comission' WHERE `id`='$webmaster_id'";
			$result_update_balance_webmaster = $mysqli->query($sql_update_balance_webmaster);
		
			// Пишем в базу, в таблицу finances, информацию о списании средств с баланса вебмастера
			// Write to the database, the table finances, information about the funds are debited from the balance webmaster
			$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$webmaster_id','2','$summa_comission',16,'$balance_webmaster'-'$summa_comission','2')";
			$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);
		
			// Начисляем средства, ранее взятые с баланса вебмастера в ХОЛД этому же вебмастеру
			// Accrued funds previously taken from the balance of the webmaster to HOLD the same webmaster
			$sql_update_hold_webmaster = "UPDATE users SET `hold`=`hold`+'$summa_comission' WHERE `id`='$webmaster_id'";
			$result_update_hold_webmaster = $mysqli->query($sql_update_hold_webmaster);
			}

		// Если у вебмастера есть рефовод, то вычитаем у рефовода реферальские
		// If the webmaster has referrer, then subtract from referrer referral bonus
		if ($settings_refprocent!='0' && $refovod_webmaster!='0' && $refovod_webmaster!='')
			{
			// Вычитаем реферальские со счета рефовода
			// Subtract referral bonus account referrer
			$summ_referal=$summa_comission/100*$settings_refprocent;
			$sql_update_balance_refovod = "UPDATE users SET `balance`=`balance`-'$summ_referal' WHERE `id`='$refovod_webmaster'";
			$result_update_balance_refovod = $mysqli->query($sql_update_balance_refovod);	
			
			// Пишем в базу, в таблицу finances, информацию о вычитании реферальских с баланса рефовода
			// Write to the database, in finances table, information about referrers subtracted from the balance referrer
			$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$refovod_webmaster','2','$summ_referal',11,'$balance_refovod'-'$summ_referal','2')";
			$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);	
			}				
			
		}		

// ОТКЛОНЕН //
// REJECTED //

	// Если происходит изменение статуса с ОТКЛОНЕН на ОЖИДАЕТ
	// If there is a change of status with REJECTED on WAITING
	elseif ($status=='1' && $old_status_zakaza=='0')
		{
		// Обновляем свойства заказа
		// Update the properties of the order
		update_zakaz();
		}
		
	// Если происходит изменение статуса с ОТКЛОНЕН на В ХОЛДЕ
	// If there is a change of status with REJECTED on HOLD
	elseif ($status=='2' && $old_status_zakaza=='0')
		{
		// Обновляем свойства заказа
		// Update the properties of the order
		update_zakaz();
		
		// Вычитаем с баланса рекламодателя суммы - сумму комиссию вебмастера и сумму комиссии CPA-сети
		// Subtract the amount from the balance of advertiser - the amount and the amount of commission webmaster CPA-network commission
		$sql_update_balance_reklamodatel = "UPDATE users SET `balance`=`balance`-'$comission_all' WHERE `id`='$owner_id'";
		$result_update_balance_reklamodatel = $mysqli->query($sql_update_balance_reklamodatel);	
		
		// Пишем в базу, в таблицу "finances", информацию о списании средств с баланса рекламодателя
		// Write to the database, in "finances" table, information about the funds are debited from the balance of advertiser
		$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$owner_id','2','$comission_all',12,'$balance_reklamodatel'-'$comission_all','2')";
		$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);
		
		// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
		// If the order came from existing in the database webmaster, then the
		if ($webmaster_id!='0')
			{
			// Начисляем вебмастеру в ХОЛД сумму комиссии вебмастера
			// Is charged webmaster Hold'em amount webmaster commission
			$sql_update_hold_webmaster = "UPDATE users SET `hold`=`hold`+'$summa_comission' WHERE `id`='$webmaster_id'";
			$result_update_hold_webmaster = $mysqli->query($sql_update_hold_webmaster);	
			}
		}		
		
	// Если происходит изменение статуса с ОТКЛОНЕН на ПРИНЯТ
	// If there is a change of status with REJECTED on ACCEPTED
	elseif ($status=='3' && $old_status_zakaza=='0')
		{
		// Обновляем свойства заказа
		// Update the properties of the order
		update_zakaz();
		
		// Если данный оффер работает по онлайн-оплате, то выполняем
		// If this offer works for online payment, then execute
		if ($offer_deystvie=='5')
			{
			// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
			// If the order came from existing in the database webmaster, then execute
			if ($webmaster_id!='0')
				{
				// Начисляем на баланс CPA-сети средства в качестве комиссии CPA-сети (комиссия вебмастера)
				// Is charged on the balance of CPA-network capability as a CPA-network commission (webmaster commission)
				$sql_update_balance_cpa = "UPDATE settings SET `balance_cpa`=`balance_cpa`+'$summa_comission_cpa'";
				$result_update_balance_cpa = $mysqli->query($sql_update_balance_cpa);		
				}
			// Если заказ пришел БЕЗ УЧАСТИЯ ВЕБМАСТЕРА, то выполняем
			// If the order came without a webmaster, then execute
			else
				{
				// Начисляем на баланс CPA-сети средства в качестве комиссии CPA-сети (комиссия вебмастера и комиссию CPA-сети)
				// Charged on CPA-network capability as a CPA-network balance commission (webmaster commission and CPA-network comission)
				$sql_update_balance_cpa = "UPDATE settings SET `balance_cpa`=`balance_cpa`+'$comission_all'";
				$result_update_balance_cpa = $mysqli->query($sql_update_balance_cpa);						
				}		
			// Начисляем рекламодателю на баланс заработанную сумму
			// Advertiser is charged on the balance of the amount earned
			$nachislenie_reklu=$summa_zakaza-$comission_all;
			$sql_update_balance_reklamodatel = "UPDATE users SET `balance`=`balance`+'$nachislenie_reklu' WHERE `id`='$owner_id'";
			$result_update_balance_reklamodatel = $mysqli->query($sql_update_balance_reklamodatel);		

			// Пишем в базу, в таблицу "finances", информацию о начислении средств на баланса рекламодателя
			// Write to the database, the table "finances", information on the funds be credited to the balance of advertiser
			$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$owner_id','1','$nachislenie_reklu',17,'$balance_reklamodatel'+'$nachislenie_reklu','2')";
			$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);	
			
			// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
			// If the order came from existing in the database webmaster, then execute
			if ($webmaster_id!='0')
				{		
				// Начисляем на баланс вебмастера сумму комиссии
				// Is charged on the balance of the amount of commission webmaster
				$sql_update_balance_webmaster = "UPDATE users SET `balance`=`balance`+'$summa_comission' WHERE `id`='$webmaster_id'";
				$result_update_balance_webmaster = $mysqli->query($sql_update_balance_webmaster);	
			
				// Пишем в базу, в таблицу "finances", информацию о начислении средств на баланс вебмастера
				// Write to the database, the table "finances", information on the funds be credited to the balance webmaster
				$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$webmaster_id','1','$summa_comission',13,'$balance_webmaster'+'$summa_comission','2')";
				$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);			
				}
				
			// Если у вебмастера есть рефовод, то начисляем рефоводу реферальские
			// If the webmaster has referrer then accrue referrer referral bonus
			if ($settings_refprocent!='0' && $refovod_webmaster!='0' && $refovod_webmaster!='')
				{
				// Начисляем реферальские на счет рефоводу
				// Referral bonus accrued to the account referrer
				$summ_referal=$summa_comission/100*$settings_refprocent;
				$sql_update_balance_refovod = "UPDATE users SET `balance`=`balance`+'$summ_referal' WHERE `id`='$refovod_webmaster'";
				$result_update_balance_refovod = $mysqli->query($sql_update_balance_refovod);	
				
				// Пишем в базу, в таблицу "finances", информацию о начислении реферальских на баланс рефоводу
				// Write to the database, in "finances" table, information about the calculation of referrers to balance referrer
				$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$refovod_webmaster','1','$summ_referal',11,'$balance_refovod'+'$summ_referal','2')";
				$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);	
				}			
			}
		else
			{		
			// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
			// If the order came from existing in the database webmaster, then execute
			if ($webmaster_id!='0')
				{
				// Начисляем вебмастеру на баланс сумму комиссии
				// Webmaster is charged on the balance of the amount of commission
				$sql_update_balance_webmaster = "UPDATE users SET `balance`=`balance`+'$summa_comission' WHERE `id`='$webmaster_id'";
				$result_update_balance_webmaster = $mysqli->query($sql_update_balance_webmaster);
			
				// Пишем в базу, в таблицу "finances", информацию о начислении средств на баланс вебмастера
				// Write to the database, the table "finances", information on the funds be credited to the balance webmaster
				$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$webmaster_id','1','$summa_comission',5,'$balance_webmaster'+'$summa_comission','2')";
				$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);		
				}
			
			// Вычитаем у рекламодателя с баланса сумму комиссии вебмастера и сумму комиссии CPA-сети
			// Subtract the advertiser to balance the amount of webmasters commission and the amount of commission CPA-network
			$sql_update_balance_reklamodatel = "UPDATE users SET `balance`=`balance`-'$comission_all' WHERE `id`='$owner_id'";
			$result_update_balance_reklamodatel = $mysqli->query($sql_update_balance_reklamodatel);
			
			// Пишем в базу, в таблицу "finances", информацию о списании средств с баланса рекламодателя
			// Write to the database, in "finances" table, information about the funds are debited from the balance of advertiser
			$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$owner_id','2','$comission_all',13,'$balance_reklamodatel'-'$comission_all','2')";
			$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);			
	
			// Если заказ пришел от имеющегося в базе вебмастера, то выполняем
			// If the order came from existing in the database webmaster, then execute
			if ($webmaster_id!='0')
				{		
				// Начисляем на баланс CPA-сети комиссию CPA-сети
				// Charged on CPA-net balance comission CPA-net
				$sql_update_balance_cpa = "UPDATE settings SET `balance_cpa`=`balance_cpa`+'$summa_comission_cpa'";
				$result_update_balance_cpa = $mysqli->query($sql_update_balance_cpa);				
				}
			// Если заказ пришел БЕЗ УЧАСТИЯ ВЕБМАСТЕРА, то выполняем
			// If the order came without a webmaster, then the
			else
				{
				// Начисляем на баланс CPA-сети комиссию (комиссию вебмастера и комиссию CPA-сети)
				// Charged comission on balance CPA-network (commission webmasters and CPA-network comission)
				$sql_update_balance_cpa = "UPDATE settings SET `balance_cpa`=`balance_cpa`+'$comission_all'";
				$result_update_balance_cpa = $mysqli->query($sql_update_balance_cpa);				
				}
				
			// Если у вебмастера есть рефовод, то начисляем рефоводу реферальские
			// If the webmaster has referrer then accrue referrer referral bonus
			if ($settings_refprocent!='0' && $refovod_webmaster!='0' && $refovod_webmaster!='')
				{
				// Начисляем реферальские на счет рефовода
				// Referral bonus accrued to the account referrer
				$summ_referal=$summa_comission/100*$settings_refprocent;
				$sql_update_balance_refovod = "UPDATE users SET `balance`=`balance`+'$summ_referal' WHERE `id`='$refovod_webmaster'";
				$result_update_balance_refovod = $mysqli->query($sql_update_balance_refovod);	
				
				// Пишем в базу, в таблицу "finances", информацию о начислении реферальских на баланс рефовода
				// Write to the database, the table "finances", information on the calculation of referrers to balance referrer
				$sql_insert_log_finances = "INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`,`status`) values ('$refovod_webmaster','1','$summ_referal',11,'$balance_refovod'+'$summ_referal','2')";
				$result_insert_log_finances = $mysqli->query($sql_insert_log_finances);	
				}		
			}
			}
		}				
	exit;
	}	
	
exit;

?>
