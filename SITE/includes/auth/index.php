<?php

if (!isset($_SESSION['id']) || !(int)$_SESSION['id']) 
	{
	header('Location: ./'); 
	exit;
	}
else 
	{
	$user_id = $_SESSION['id'];
	$sql = "SELECT * FROM users WHERE id = $user_id";
	$res = $mysqli -> query($sql);
	$result = $res -> fetch_assoc();
	if(!$result)
		{
		header('Location: ./');
		exit;
		}
	$user_email = htmlentities($result['email']);
	$user_active = htmlentities($result['active']);
	$user_tip = htmlentities($result['tip']);
	$user_uroven_dostupa = htmlentities($result['uroven_dostupa']);
	$user_name = htmlentities($result['name']);
	$user_skype = htmlentities($result['skype']);
	$user_icq = htmlentities($result['icq']);
	$user_phone = htmlentities($result['phone']);
	$user_wmr = htmlentities($result['wmr']);
	$user_hold = htmlentities($result['hold']);
	$user_balance = htmlentities($result['balance']);
	$user_myrefovod = htmlentities($result['myrefovod']);
	
	// Получаем буквенное название роли пользователя
	// Get the name of the letter the user's role
	$sql_tip_title = "SELECT title FROM users_roles_tpl WHERE `tip`='$user_tip'";
	$result_tip_title=$mysqli->query($sql_tip_title);
	$res_tip_title=mysqli_fetch_array($result_tip_title);
	$user_tip_title=htmlentities($res_tip_title['title']);
	
	// Если аккаунт пользователя заблокирован, то логаут из системы
	// Список вариантов значений активности зарегистрированного пользователя
	// 0 - Неподтвержденный зарегистрированный пользователь
	// 1 - Активный зарегистрированный пользователь
	// 5 - Заблокированный зарегистрированный пользователь
	
	// If the user account is locked , then log out of the system
	// The list of options activity values ​​registered user
	// 0 - Unconfirmed registered user
	// 1 - Active registered user
	// 5 - Locked registered user	
	
	if ($user_active=='5') 
		{
		Header('Location: ./logout.php'); 
		exit;
		}	
	}

?>