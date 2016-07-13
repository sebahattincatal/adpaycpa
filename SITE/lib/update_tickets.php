<?php

// Если был запрос на создание нового тикета, то выполняем
// If there was a request to create a new ticket, then execute
if (isset($_POST['form_tickets_submit']))
	{
	if (isset($_POST['theme']) && $_POST['theme']!='')
		{
		if (isset($_POST['text']) && $_POST['text']!='')
			{
			$theme=htmlentities($_POST['theme']);
			$text=htmlentities($_POST['text']);
			if (isset($_POST['komu']) && $_POST['komu']!='')
				{
				$komu=htmlentities($_POST['komu']);
				$sql_ticket_add= "INSERT INTO `tickets` (`ot_kogo`,`komu`,`theme`,`text`,`status`) VALUES ('$user_id','$komu','$theme','$text','1')";
				}
			else
				{
				$sql_ticket_add= "INSERT INTO `tickets` (`ot_kogo`,`theme`,`text`,`status`) VALUES ('$user_id','$theme','$text','1')";
				}				
			$result_ticket_add=$mysqli->query($sql_ticket_add);	
			header('location:'.$_SERVER['PHP_SELF'].'?xtext=1');
			exit;
			}
		else
			{
			header('location:'.$_SERVER['PHP_SELF'].'?xtext=3');
			exit;
			}
		}
	else
		{
		header('location:'.$_SERVER['PHP_SELF'].'?xtext=2');
		exit;
		}
	}
	
// Если был запрос на создание ответа на тикет, то выполняем
// If there was a request to create a response to the ticket, then the
if (isset($_POST['form_ticket_reply_submit']) && isset($_POST['ticket_id']))
	{
	$ticket_id=htmlentities($_POST['ticket_id']);
	
	// Проверяем, есть ли тикет, ID которого был передан в POST-запросе
	// Check if the ticket is, whose ID was passed to the POST-request
	if ($user_tip=='70')
		{
		$res_check_ticket = $mysqli->query( "SELECT `id` FROM `tickets` WHERE `id`='$ticket_id'" );
		}
	else
		{
		$res_check_ticket = $mysqli->query( "SELECT `id` FROM `tickets` WHERE `komu`='$user_id' OR (`ot_kogo`='$user_id' AND `id`='$ticket_id')");
		}
	if (mysqli_num_rows($res_check_ticket)<> 0)
		{	
		if (isset($_POST['text']) && $_POST['text']!='')
			{
			$text=htmlentities($_POST['text']);
			$sql_ticket_add= "INSERT INTO `tickets_reply` (`ticket_id`,`ot_kogo`,`text`) VALUES ('$ticket_id','$user_id','$text')";
			$result_ticket_add=$mysqli->query($sql_ticket_add);	
			if (!isset($_GET['xtext'])) {$add_stroka='&xtext=7';} else {$add_stroka='';}
			header('location:'.$_SERVER['HTTP_REFERER'].$add_stroka);
			exit;
			}
		else
			{
			if (!isset($_GET['xtext'])) {$add_stroka='&xtext=3';} else {$add_stroka='';}
			header('location:'.$_SERVER['HTTP_REFERER'].$add_stroka);
			exit;
			}
		}
	else
		{
		if (!isset($_GET['xtext'])) {$add_stroka='&xtext=8';} else {$add_stroka='';}	
		header('location:'.$_SERVER['HTTP_REFERER'].$add_stroka);
		exit;
		}
	}

// Если был запрос на закрытие тикета, то выполняем	
// If there was a request to close the ticket, then the
if (isset($_GET['close']) && $_GET['close']!='')
	{
	$close_ticket=htmlentities($_GET['close']);
	// Проверяем, действительно ли пославший запрос является автором данного тикета или имеет право на его удаление
	// Check if the sent request is indeed the author of the ticket, or has the right to its removal
	if ($user_tip=='70')
		{
		$res_check_ticket = $mysqli->query( "SELECT `id` FROM `tickets` WHERE `id`='$close_ticket'" );
		}
	else
		{
		$res_check_ticket = $mysqli->query( "SELECT `id` FROM `tickets` WHERE (`ot_kogo`='$user_id' OR `komu`='$user_id') AND `id`='$close_ticket'" );
		}
	if (mysqli_num_rows($res_check_ticket)<> 0)
		{
		$sql_update_ticket= "UPDATE `tickets` SET `status`='0' WHERE `id`='$close_ticket'";
		$result_update_ticket=$mysqli->query($sql_update_ticket);
		header('location:'.$_SERVER['PHP_SELF'].'?xtext=4');
		exit;
		}
	else
		{
		header('location:'.$_SERVER['PHP_SELF'].'?xtext=6');
		exit;
		}
	}

// Если был запрос на открытие тикета, то выполняем
// If there was a request to open a ticket, then the
if (isset($_GET['open']) && $_GET['open']!='')
	{
	$open_ticket=htmlentities($_GET['open']);
	// Проверяем, действительно ли пославший запрос является автором данного тикета или имеет право на его открытие
	// Check if the sent request is indeed the author of the ticket, or has the right to its opening
	if ($user_tip=='70')
		{
		$res_check_ticket = $mysqli->query( "SELECT `id` FROM `tickets` WHERE `id`='$open_ticket'" );
		}
	else
		{
		$res_check_ticket = $mysqli->query( "SELECT `id` FROM `tickets` WHERE (`ot_kogo`='$user_id' OR `komu`='$user_id') AND `id`='$open_ticket'" );
		}
	if (mysqli_num_rows($res_check_ticket)<> 0)
		{	
		$sql_update_ticket= "UPDATE `tickets` SET `status`='1' WHERE `id`='$open_ticket'";
		$result_update_ticket=$mysqli->query($sql_update_ticket);
		header('location:'.$_SERVER['PHP_SELF'].'?closed&xtext=5');
		exit;
		}
	else
		{
		header('location:'.$_SERVER['PHP_SELF'].'?xtext=6');
		exit;
		}
	}

?>