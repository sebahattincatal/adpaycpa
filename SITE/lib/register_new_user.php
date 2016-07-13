<?php

// Если была передана форма регистрации
// If the registration form has been transferred
if (isset($_POST['registration_submit']))
	{
	if (isset($_POST['registration_email']) && $_POST['registration_email']!='')
		{
		if (preg_match("~^([a-z0-9_\-\.])+@([a-z0-9_\-\.])+\.([a-z0-9])+$~i", $_POST['registration_email']))
			{
			if (isset($_POST['registration_password_1']) && $_POST['registration_password_1']!='')
				{
				if (isset($_POST['registration_password_2']) && $_POST['registration_password_2']!='')
					{
					if (isset($_POST['registration_tip']) && $_POST['registration_tip']!='')
						{
						if ($_POST['registration_password_1'] == $_POST['registration_password_2'])
							{
							if (isset($_POST['registration_agree_rules']) && $_POST['registration_agree_rules']!='true')
								{
								$email = $mysqli -> real_escape_string(htmlspecialchars($_POST['registration_email']));
								$tip = $mysqli -> real_escape_string(htmlentities($_POST['registration_tip']));
								$password = $mysqli -> real_escape_string(htmlspecialchars(md5(md5($_POST['registration_password_1']))));
								$activation_code = md5($email.'SECRET CODE');
							
								// Проверяем наличие в базе пользователя с таким e-mail
								// Check the existence of the database user with this e-mail
								$sql = "SELECT email FROM users WHERE `email`='$email'";
								$result = $mysqli->query($sql);
								if (mysqli_num_rows($result)==0) 
									{
									// Проверяем, есть ли в базе пользователи
									// Check whether there is a base of users
									$sql = "SELECT id FROM users";
									$result = $mysqli->query($sql);
									if (mysqli_num_rows($result)==0) 
										{
										// Если никого не найдено, то добавляем первого пользователя в качестве администратора
										// If no one is found, add the first user as the administrato
										$sql = "INSERT INTO users (`email`, `password`, `active`, `tip`) VALUES ('$email', '$password', '1', '70')";
										$result = $mysqli->query($sql);
										}
									else
										{
										// Если пользователи в базе были найдены, то добавляем информацию о новом пользователе в базу
										// If the users in the database have been found , then add the information for the new user to the database
										
										// Проверка, что передан ID рефовода и что реферал регистрируется как вебмастер
										// Check if the transmitted ID referrer and referral that registers as a webmaster
										if (isset($_POST['refovod']) && $tip=='10')
											{
											$refovod=htmlentities((int)$_POST['refovod']);
											
											// Проверяем, есть ли в базе пользователь с ID рефовода
											// Check whether there is a basis of a user ID with the referrer
											$sql_check_refovod = "SELECT id FROM users WHERE `id`='$refovod'";
											$result_check_refovod = $mysqli->query($sql_check_refovod);
											if (mysqli_num_rows($result_check_refovod)>0) 
												{
												$sql = "INSERT INTO users (`email`, `password`, `tip`, `activation_code`, `date_registration`, `myrefovod`) VALUES ('$email', '$password', '$tip', '$activation_code', NOW() , '$refovod')";
												}
											else
												{
												$sql = "INSERT INTO users (`email`, `password`, `tip`, `activation_code`, `date_registration`) VALUES ('$email', '$password', '$tip', '$activation_code', NOW())";
												}
											}
										else
											{
											$sql = "INSERT INTO users (`email`, `password`, `tip`, `activation_code`, `date_registration`) VALUES ('$email', '$password', '$tip', '$activation_code', NOW())";
											}
										$result = $mysqli->query($sql);
										$email=htmlentities($email);
	
										// На почту указанную пользователем при регистрации, отсылается письмо с кодом активации
										// On the specified user's mail in the registration, sent a letter with an activation code
										$userdata="<br /><br />Ваш код активации аккаунта: <b>".$activation_code."</b><br />(Введите этот код в профиле Вашего аккаунта в CPA-сети)";
										$mail_subj = domain().": Ваш код активации аккаунта";
										$mail_body = "Здравствуйте!<br /><br />Вы или кто-то другой запустили процедуру регистрации на сайте CPA-сети ".domain().". Если это сделали не Вы, то просто проигнорируйте данное письмо.<br />Если Вы все же хотите зарегистрироваться в CPA-сети, то используйте указанный ниже код для активации Вашего аккаунта.".$userdata."<br /><br />CPA-сеть ".domain()."<br /><a href=".site_url().">".site_url()."</a>";
										SendEMail($email, $mail_subj, $mail_body);
										$mail_sended = true;
										}
	
									// Проверяем корректность добавления информации о новом пользователе в базу и находим его
									// Check the correctness of adding information about the new user to the database and find him
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
										$deystvie='2';
										include_once './includes/userslog/index.php';
										Header('Location: ./cabinet.php');
										exit;
										}
									else
										{$errortext_registration="Регистрация не успешна";}
									} 
								else 
									{$errortext_registration="E-mail уже используется";}
								}
							else 
								{$errortext_registration="Вы не приняли с правила";}
							} 
						else 
							{$errortext_registration="Пароли не совпадают";}
						}
					else 
						{$errortext_registration="Не выбран тип аккаунта";}							
					} 
				else 
					{$errortext_registration="Вы не подтвердили пароль";}					} 
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