<?php

// Если была передана форма активация аккаунта профиля
// If the form is activated the account was transferred Profile
if (isset($_POST['profile_activation_submit']) && isset($_POST['activation_code']))
	{
	$activation_code=htmlentities($_POST['activation_code']);
	$sql_checkactivationcode = "SELECT activation_code FROM users WHERE `id` = '$user_id'";
	$result_checkactivationcode = $mysqli -> query($sql_checkactivationcode);
	$res_checkactivationcode=mysqli_fetch_array($result_checkactivationcode);
	
	if ($activation_code==$res_checkactivationcode['activation_code'])
		{
		// Активация аккаунта
		// Account activation
		$deystvie='7';
		include_once './includes/userslog/index.php';
		$sql_smena_parola = "UPDATE users SET active = '1' WHERE id = $user_id";
		$mysqli -> query($sql_smena_parola);
		Header ('Location: ./cabinet.php');
		exit;
		}
	else
		{$errortext_profile='<font color=red>Вы ввели неверный код активации</font>';}
	}

// Если была передана форма изменения профиля
// If the form has been transferred Profile changes
if (isset($_POST['profile_rekvizit_submit']))
	{
	// Проверяем, есть ли в базе пользователь пославший запрос на изменение профиля
	// Check whether there is a basis of the user who sent the request to change the profile
	$sql = "SELECT id FROM users WHERE `id` = '$user_id'";
	$res = $mysqli -> query($sql);
	$result = $res -> fetch_assoc();
	if ((int)$result['id'])
		{
		if (isset($_POST['profile_wmr'])) {$profile_wmr=htmlentities($_POST['profile_wmr']);} else {$profile_wmr='';}
		if (isset($_POST['profile_name'])) {$profile_name=htmlentities($_POST['profile_name']);} else {$profile_name='';}
		if (isset($_POST['profile_phone'])) {$profile_phone=htmlentities($_POST['profile_phone']);} else {$profile_phone='';}
		if (isset($_POST['profile_skype'])) {$profile_skype=htmlentities($_POST['profile_skype']);} else {$profile_skype='';}
		if (isset($_POST['profile_icq'])) {$profile_icq=htmlentities($_POST['profile_icq']);} else {$profile_icq='';}

		// Пишем в базу данные о посетителе и о том, что он инициировал изменение данных профиля
		// Список действий ($deystvie):
		// 1 - Посещение страницы
		// 2 - Регистрация
		// 3 - Авторизация
		// 4 - Неудачная авторизация					
		// 5 - Смена реквизитов
		// 6 - Смена пароля доступа
		
		// Write in the visitor data base and that he initiated the change in the profile data
		// Action List ($deystvie):
		// 1 - Visiting the page
		// 2 - Registration
		// 3 - Authorization
		// 4 - Authorization Failed
		// 5 - Change details
		// 6 - Change the access password		
		
		$deystvie='5';
		include_once './includes/userslog/index.php';
		$sql_smena_rekvizitov = "UPDATE users SET wmr = '$profile_wmr', name = '$profile_name', phone = '$profile_phone', skype = '$profile_skype', icq = '$profile_icq' WHERE id = $user_id";
		$mysqli -> query($sql_smena_rekvizitov);
		Header ('Location: ./profile.php?success');
		exit;
		} else {Header('Location: ./logout.php'); exit;}
	}

// Если была передана форма изменения пароля доступа
// If the form was given to change the access password
if (isset($_POST['profile_changepassword_submit']))
	{
	// Проверяем, есть ли в базе пользователь пославший запрос на изменение пароля доступа
	// Check whether there is a basis of the user who sent the request to change the access password
	$sql = "SELECT id FROM users WHERE `id` = '$user_id'";
	$res = $mysqli -> query($sql);
	$result = $res -> fetch_assoc();
	if ((int)$result['id'])
		{
		if ((isset($_POST['profile_password_1']) && $_POST['profile_password_1']!='') && (isset($_POST['profile_password_2']) && $_POST['profile_password_2']!=''))
			{
			$profile_password_1=htmlentities($_POST['profile_password_1']);
			$profile_password_2=htmlentities($_POST['profile_password_2']);
			if ($profile_password_1==$profile_password_2)
				{
				// шифруем пароль
				// Encrypt the password
				$profile_password_1=md5(md5($profile_password_1));
				
				// Пишем в базу данные о посетителе и о том, что он инициировал смену пароля
				// Список действий ($deystvie):
				// 1 - Посещение страницы
				// 2 - Регистрация
				// 3 - Авторизация
				// 4 - Неудачная авторизация					
				// 5 - Смена реквизитов
				// 6 - Смена пароля доступа
				
				// Write in the visitor data base and that he initiated the change password
				// Action List ($deystvie):
				// 1 - Visiting the page
				// 2 - Registration
				// 3 - Authorization
				// 4 - Authorization Failed
				// 5 - Change details
				// 6 - Change the access password				
				
				$deystvie='6';
				include_once './includes/userslog/index.php';
				$sql_smena_parola = "UPDATE users SET password = '$profile_password_1' WHERE id = $user_id";
				$mysqli -> query($sql_smena_parola);
				Header ('Location: ./profile.php?successpasswd');
				exit;
				} else {$errortext_profile='Введенные пароли не совпадают';}
			} else {$errortext_profile='Пароль не может быть пустым';}
		} else {Header('Location: ./logout.php'); exit;}
	}
	
?>