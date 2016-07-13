<?php

// Если была передана форма авторизации
// If the authorization has been transferred form
if (isset($_POST['login_submit']))
	{
	if (isset($_POST['login_email']) && $_POST['login_email']!='')
		{
		if (preg_match("~^([a-z0-9_\-\.])+@([a-z0-9_\-\.])+\.([a-z0-9])+$~i", $_POST['login_email']))
			{
			if (isset($_POST['login_password']) && $_POST['login_password']!='')
				{

				$email = $mysqli -> real_escape_string(htmlspecialchars($_POST['login_email']));
				$password = $mysqli -> real_escape_string(htmlspecialchars(md5(md5($_POST['login_password']))));
							
				// Проверяем, есть ли такой пользователь в базе и совпадает ли email/пароль с теми что в базе
				// Check whether there is a user in the database, and whether the same email / password to those in the base
				$sql = "SELECT id FROM users WHERE `email` = '$email' AND `password` = '$password'";
				$res = $mysqli -> query($sql);
				$result = $res -> fetch_assoc();
				if ((int)$result['id'])
					{
					$_SESSION['id'] = (int)$result['id'];
					$user_id = $_SESSION['id'];
					// Пишем в базу данные о посетителе и его успешной регистрации
					// Список действий ($deystvie):
					// 1 - Посещение страницы
					// 2 - Регистрация
					// 3 - Авторизация
					// 4 - Неудачная авторизация					
					// 5 - Смена реквизитов
					// 6 - Смена пароля доступа					
					
					// Write into the database data about the visitor and his successful registration
					// Action List ($ deystvie):
					// 1 - Visiting the page
					// 2 - Registration
					// 3 - Authorization
					// 4 - Authorization Failed
					// 5 - Change details
					// 6 - Change the access password					
					$deystvie='3';
					include_once './includes/userslog/index.php';
					Header('Location: ./cabinet.php');
					exit;
					}
				else
					{
					$errortext_registration="Неверные e-mail или пароль";
					$deystvie='4';
					include_once './includes/userslog/index.php';
					}
				}
			else 
				{$errortext_registration="Вы не ввели пароль";}
			} 
		else 
			{$errortext_registration="Вы ввели не верный e-mail";}
		} 
	else 
		{$errortext_registration="Вы не ввели e-mail";}
	}

?>