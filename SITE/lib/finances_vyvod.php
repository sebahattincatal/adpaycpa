<?php

// Если был запрос на вывод средств из системы, то выполняем
// If there was a request for withdrawal from the system, then perform
if (isset($_POST['vyvod']) && $_POST['vyvod']=='ok')
	{
	if (isset($_POST['sum_vyvod']) && $_POST['sum_vyvod']!=''&& $_POST['sum_vyvod']>'0')
		{
		if ($_POST['sum_vyvod']<=$user_balance)
			{
			if ($_POST['sum_vyvod']>=$settings_min_vyvod)
				{
				$sql21 = "SELECT id,wmr FROM users WHERE `id`='$user_id'";
				$result21 = $mysqli->query($sql21);
				$res21=mysqli_fetch_array($result21);
				if (isset($res21['wmr']) AND $res21['wmr']!='')
					{
					$sum_vyvod=htmlentities($_POST['sum_vyvod']);
					$wmr=htmlentities($res21['wmr']);
					$new_user_balance=$user_balance-$sum_vyvod;
					$mysqli->query("UPDATE `users` SET `balance`='$new_user_balance' WHERE `id`='$user_id'");
					$mysqli->query("INSERT INTO `finances_log` (`user_id`,`operation`,`summ`,`description`,`balance`) values ('$user_id','2','$sum_vyvod',4,'$new_user_balance')");
					header('location:' . $_SERVER['PHP_SELF'] .'?xtext=5');
					exit;
					} 
				else 
					{
					header('location:' . $_SERVER['PHP_SELF'] .'?xtext=1');
					exit;
					}
				} 
			else 
				{
				header('location:' . $_SERVER['PHP_SELF'] .'?xtext=2');
				exit;
				}
			} 
		else 
			{
			header('location:' . $_SERVER['PHP_SELF'] .'?xtext=3');
			exit;			
			}
		} 
	else 
		{
		header('location:' . $_SERVER['PHP_SELF'] .'?xtext=4');
		exit;		
		}
	}
	
?>
