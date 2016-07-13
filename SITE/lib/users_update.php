<?php

// Блок с обновлением в базе данных пользователя
// Block the update in the user database
if (isset($_POST['submit_user']) && $user_tip=='70')
	{
	$id=htmlspecialchars(trim($_POST['id']));	
	if (isset($_POST['email'])) {$email=htmlspecialchars(trim($_POST['email']));} else {$email='';}
	
	// Проверка, нет ли уже другого пользователя с таким же email
	// Check to see if there is already another user with the same email
	$sql_user_check= "SELECT id,email FROM users WHERE `email`='$email' AND `id`!='$id'";
	$result_user_check=$mysqli->query($sql_user_check);
	if (mysqli_num_rows($result_user_check) > 0) 
		{
		header('location:' . $_SERVER['PHP_SELF'] . '?edit=' .$id. '&xtext=2');
		exit;
		}
	
	if (isset($_POST['name'])) {$name=htmlspecialchars(trim($_POST['name']));} else {$name='';}
	if (isset($_POST['phone'])) {$phone=htmlspecialchars(trim($_POST['phone']));} else {$phone='';}
	if (isset($_POST['skype'])) {$skype=htmlspecialchars(trim($_POST['skype']));} else {$skype='';}
	if (isset($_POST['icq'])) {$icq=htmlspecialchars(trim($_POST['icq']));} else {$icq='';}
	if (isset($_POST['wmr'])) {$wmr=htmlspecialchars(trim($_POST['wmr']));} else {$wmr='';}
	if (isset($_POST['ip'])) {$ip=htmlspecialchars(trim($_POST['ip']));} else {$ip='';}
	if (isset($_POST['hold'])) {$hold=htmlspecialchars(trim($_POST['hold']));} else {$hold='';}
	if (isset($_POST['balance'])) {$balance=htmlspecialchars(trim($_POST['balance']));} else {$balance='';}
	$active=htmlspecialchars(trim($_POST['active']));	
	$tip=htmlspecialchars(trim($_POST['tip']));	
	$uroven_dostupa=htmlspecialchars(trim($_POST['uroven_dostupa']));
	if (isset($_POST['password']) && $_POST['password']!='')
		{
		$password = md5(md5($_POST['password']));
		$request= "UPDATE `users` SET `password`='$password',`email`='$email',`name`='$name',`phone`='$phone',`skype`='$skype',`icq`='$icq',`wmr`='$wmr',`hold`='$hold',`balance`='$balance',`active`='$active',`tip`='$tip',`uroven_dostupa`='$uroven_dostupa' WHERE `id`='$id'";
		}
		else
		{
		$request= "UPDATE `users` SET `email`='$email',`name`='$name',`phone`='$phone',`skype`='$skype',`icq`='$icq',`wmr`='$wmr',`hold`='$hold',`balance`='$balance',`active`='$active',`tip`='$tip',`uroven_dostupa`='$uroven_dostupa' WHERE `id`='$id'";
		}
	$result=$mysqli->query($request);
	header('location:' . $_SERVER['PHP_SELF'] . '?edit=' .$id. '&xtext=1');
	exit;
	}

if (isset($_GET['xtext']) && $_GET['xtext']=='1') {$xtext='<font color=green><b>Данные аккаунта успешно изменены</b></font>';}
elseif (isset($_GET['xtext']) && $_GET['xtext']=='2') {$xtext='<font color=red><b>Пользователь с таким e-mail уже есть в системе</b></font>';}

?>