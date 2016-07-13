<?php

// Подключаем файл конфигурации
// Connect configuration file
include $_SERVER['DOCUMENT_ROOT'].'/../includes/config.php';
	
// Подключаем файл защиты от инжекта для передаваемых переменных
// Connect the protection of Injection file transmitted variables
include $_SERVER['DOCUMENT_ROOT'].'/../includes/antiinject/index.php';

// Подключаем файл с настройками системы
// Connect the file system settings
include $_SERVER['DOCUMENT_ROOT'].'/../includes/settings/index.php';

// Функция определения домена
// Function definition domain
include $_SERVER['DOCUMENT_ROOT'].'/../includes/detectdomain/index.php';

// Функция формирования партнерской ссылки
// Function of formation of affiliate links
include $_SERVER['DOCUMENT_ROOT'].'/../includes/partnerstroka/index.php';

// Подключаем файл локализации
// Connect the localization file
include $_SERVER['DOCUMENT_ROOT'].'/../localizations/'.$localization_file;

// Что будет если передана короткая ссылка в GET-запросе
// What happens if you pass a short reference to the GET-request
if (isset($_GET['shortlink']) && $_GET['shortlink']!='') 
	{
	$shortlink = htmlentities($_GET['shortlink']);
	
	$sql_data_shortlink = "SELECT link,user_id FROM shortlinks WHERE `id`='$shortlink'";
	$result_data_shortlink = $mysqli->query($sql_data_shortlink);
	if (mysqli_num_rows($result_data_shortlink) > 0) 
		{
		$res_data_shortlink=mysqli_fetch_array($result_data_shortlink);
		$link=htmlentities($res_data_shortlink['link']);
		$user_id=htmlentities($res_data_shortlink['user_id']);
		}
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo 'Возможно, это будет Вам интересно! | CPA-сеть '.domain(); ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="data:image/x-icon;base64,AAABAAEAEBAAAAEACABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAAAAAAyuf/AEZGRgCOjo8AT09PABvA/wBN0v8AlZWVAP39/QCwsLAAAML/AAS1/wD+//8A////AObm5gAAl/8AALv/AHd3dwDj9/8A8fHxAAGQ/wCkpKQATk5OAACq/wB20v8AlJSUAACg/wDQ8/4A/Pz8AJ2dnQDa2toAUFBQAFlZWQCNjY0A9fX1AJjG4wAAj/8AW1tbAACz/wD39/cA5vn/AKqqqgBLS0sAAJ//AG9vbwCKiooAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0CDQ0NDA0NDQENDQ0NDQ0NJQ0NDRQNDSQkDQ0NDQ0ZDSUNDSMPDQ8PDQ0NDQ0NIgICAgIrKysaDQ0NDQ0CDQICAgIDFxcXFxgNDQ0NDQICHgICBSYmJiYLEg0NHAICAgICFhAQEAYNDQ0NDQ0IISACFRsKKA0NDQ0NDQ0tKQICAhMRIA4NDQ0NDQ0NDQ0CICwHAh8NDQ0NDQ0NDQ0NDSoCAgQJDQ0NDQ0NDQ0NDScdKg0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NAAAAAAAAAAAAAAAAAAAAAP//AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAP//AAA=" rel="icon" type="image/x-icon" />
		<link rel="stylesheet" href="./css/styles.css">
		<script src="./js/jquery-1.11.2.min.js"></script>
		<script src="./js/moment.js"></script>
		<script src="./js/jquery.countdown.min.js"></script>
		<script src="./js/counter.js"></script>
	</head>
	<body>

		<div class="block2" style="<?php if (!isset($user_id)) {echo 'display: none;';} ?>">
			<div class="block2_content">
				<div class="block2_a_place">
					<div class="redirect" style="display:none" id="redirect">Спасибо за ожидание. Ссылка для перехода находится внизу этой страницы.</div>
					<div class="timer">Вы сможете пропустить рекламу через <span id="divCountdown"></span> секунд</div>
				</div>
			</div>
		</div>

		<div class="others_block4">
			<div class="others_block4_content">
				<div class="others_block4_zagolovok">ВНИМАНИЕ! ВОЗМОЖНО, ЭТО ВАМ БУДЕТ ИНТЕРЕСНО!</div>
			</div>
		</div>

		<div class="others_block5" style="margin-bottom: 20px;">
			<div class="others_block5_content">
				<?php
				// Определяем какой домен используется для партнерских ссылок
				// Determine which domain is used for affiliate links
				$sql_domain = "SELECT domain FROM domains WHERE `active`='1' ORDER BY `id` DESC";
				$result_domain = $mysqli->query($sql_domain);
				$res_domain=mysqli_fetch_array($result_domain);
				
				// Помещаем домен в переменную
				// Put the variable domain
				$domain=htmlentities($res_domain['domain']);
				
				// Получаем список работающих на данный момент офферов и их свойств
				// Get the list of running at the moment and their properties offers
				$sql_offers = "SELECT * FROM offers WHERE `active`='1' ORDER BY `id` DESC";
				$result_offers = $mysqli->query($sql_offers);
				if (mysqli_num_rows($result_offers) > 0) 
					{
					while($res_offers=mysqli_fetch_array($result_offers)) 
						{
						// Назначаем переменной ID оффера
						// Assign a variable ID offer
						$offer_id=htmlentities($res_offers['id']);
						
						// Назначаем переменной название оффера
						// Assign a variable name offer
						$offer_name=htmlentities($res_offers['name']);
						
						// Назначаем переменной ID владельца оффера
						// Assign a variable ID offera owner
						$owner_id=htmlentities($res_offers['owner_id']);
						
						// Назначаем переменной цену на оффере
						// Assign a variable rate on offer
						$offer_cena=htmlentities($res_offers['cena']);
						
						$sql_landings = "SELECT id,name,url FROM landings WHERE `offer_id`='$offer_id'";
						$result_landings = $mysqli->query($sql_landings);
						if (mysqli_num_rows($result_landings) > 0) 
							{
							while($res_landings=mysqli_fetch_array($result_landings)) 
								{
								$land_id=htmlentities($res_landings['id']);
								$land_name=htmlentities($res_landings['name']);
								$land_url=htmlentities($res_landings['url']);
								
								if (isset($user_id))
									{
									// Формируем партнерскую ссылку (формируем ее из ID пользователя, ID оффера и ID лендинга)
									// Form the affiliate link (forming it from the UserID, ID, offer ID, landing ID)
									$partnerlink='http://'.$domain.'/?p='.partnerstroka_encode($user_id.'-'.$offer_id.'-'.$land_id);
									}
									else
									{
									// Формируем партнерскую ссылку (формируем ее из ID пользователя, ID оффера и ID лендинга)
									// Form the affiliate link (forming it from the UserID, ID, offer ID, landing ID)
									$partnerlink='http://'.$domain.'/?p='.partnerstroka_encode('1'.'-'.$offer_id.'-'.$land_id);
									}
								}
							}
						else
							{
							$partnerlink='';
							}
	
						
						?>
						<div style="display: inline-block; margin: 17px 17px 0px 17px; width: 200px;  vertical-align: top; text-align: center;">
							<?php
							// Проверка, назначено ли промо для оффера. Если не назначено, то выводим сообщение об этом
							// Check if the promo is scheduled to offer. If not set, the message about this
							if (file_exists('../tmp/offer'.$offer_id.'.jpg')) 
								{
								?>
								<a target="_blank" style="border: 0; text-decoration: none;" href="<?php echo $partnerlink; ?>" />
									<img class="img_vitrina" border="0" src="<?php echo $settings_url; ?>/tmp/offer<?php echo $offer_id; ?>.jpg">
								</a>
								<?php
								}
							else
								{
								?>
								<a target="_blank" style="border: 0; text-decoration: none;" href="<?php echo $partnerlink; ?>" />
									<div class="img_vitrina"></div>
								</a>
								<?php
								}							
							?>
							<div class="others_block5_offer_text2">
								<b><a target="_blank" href="<?php echo $partnerlink; ?>" /><?php echo $offer_name; ?></a></b><br />
								<?php 
								if ($offer_cena!='' && $offer_cena!='0')
									{
									echo 'Цена: <span>'.$offer_cena.' руб. </span>'; 
									}
								?>
							</div>
						</div>
						<?
						}
					}
				?>
			</div>
		</div>

		<div class="others_block6">
			<div class="others_block6_content">
				<div class="others_block6_zagolovok">МЫ ПРЕДЛАГАЕМ ВАМ ДОПОЛНИТЕЛЬНЫЙ ЗАРАБОТОК</div>
				<div class="others_block6_podzagolovok1">Распространяйте короткие ссылки и получайте деньги</div>
				<div class="others_block6_podzagolovok2">Этот вид заработка реально очень выгоден для Вас</div>
				<div class="others_block6_text1">- Вы часто оставляете ссылки на форумах, соцсетях и блогах? Теперь Вы можете на этом заработать. Берете свою ссылку, укорачиваете ее в нашей системе, размещаете ее где это необходимо и получаете стабильный доход.<br /><br />- Посетитель переходит по Вашей ссылке и попадает на промежуточную страницу с рекламой. Определенный процент людей делает покупки и Вы получаете свои комиссионные с каждой продажи товара или услуги.</div>
				<div class="others_block6_text2">- Приведем пример. Посетитель, ожидая, переходит на сайт магазина, совершает покупку на сумму 2000 рублей. Ваша приблизительная комиссия (Ваш заработок) составит в этом случае около 700 рублей. Реально выгодно!</div>
			</div>
		</div>

		<div class="block5">
			<div class="block5_content">
				<div class="block5_zagolovok">НАЧНИТЕ ЗАРАБАТЫВАТЬ НА ССЫЛКАХ УЖЕ СЕЙЧАС!</div>
				<a target="_blank" href="<?php if (isset($user_id)) {echo $settings_url.'?ref='.$user_id;} else {echo $settings_url;} ?>"><input type="button" class="block5_button_register" value="<?php echo $loc['button']['t05']; ?>"></div></a>
			</div>
		</div>

		<div class="block2" style="<?php if (!isset($user_id)) {echo 'display: none;';} ?>">
			<div class="block2_content">
				<div class="block2_a_place">
					<div class="redirect" style="display:none" id="redirect2">
						<?php 
						if (isset($link) && $link!='0' && $link!='') 
							{
							?>
							Нажмите на <a href="<?php echo $link; ?>" title="перейти" target="_blank">ссылку</a>, чтобы перейти на запрашиваемую страницу.
							<?php 
							} 
						?>	
					</div>
				</div>
			</div>
		</div>

	</body>
</html>
