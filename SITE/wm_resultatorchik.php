<?php

// Подключаем файл конфигурации
// Connect configuration file
include './includes/config.php';

// Подключаем файл защиты от инжекта для передаваемых переменных
// Connect the protection of Injection file transmitted variables
include './includes/antiinject/index.php';

// Подключаем файл с настройками системы
// Connect the file system settings
include './includes/settings/index.php';

// Подключаем файл с определением того, какую версию дизайна выводить
// Connect file with the definition of what type of design output version
include './includes/otladka/index.php';

$module = new wm_result();

// Параметры базы данных
// Database Options
$module->db_host = $dbhost;
$module->db_user = $dblogin;
$module->db_pass = $dbpass;
$module->db_name = $dbbase;

// Параметры Webmoney
// Options Webmoney
$module->wm_wmr = $settings_webmoney_wmr;
$module->wm_secret = $settings_webmoney_key;

$module->init();

class wm_result
	{
	public function init()
		{
		mysql_connect( $this->db_host, $this->db_user, $this->db_pass );
		mysql_select_db( $this->db_name );
		if( isset( $_POST['LMI_PREREQUEST'] ) and $_POST['LMI_PREREQUEST'] == 1 )
			{
			echo "YES";
			exit;
			}
		$chkstring =  $this->wm_wmr.$_POST['LMI_PAYMENT_AMOUNT'].$_POST['LMI_PAYMENT_NO'].$_POST['LMI_MODE'].$_POST['LMI_SYS_INVS_NO'].$_POST['LMI_SYS_TRANS_NO'].$_POST['LMI_SYS_TRANS_DATE'].$this->wm_secret.$_POST['LMI_PAYER_PURSE'].$_POST['LMI_PAYER_WM'];
	    $md5sum = strtoupper(hash('sha256',$chkstring));
		if( $_POST['LMI_HASH'] != $md5sum )
			{
			exit;
			}
		if( isset( $_POST['LMI_PAYMENT_NO'] ) && $_POST['LMI_PAYEE_PURSE'] == $this->wm_wmr && isset( $_POST['LMI_PAYMENT_AMOUNT'] ) && isset( $_POST['LMI_MODE'] ) )
			{
			$invoice_id = intval( $_POST['LMI_PAYMENT_NO'] );
			$q = mysql_query( "SELECT * FROM finances_log WHERE id={$invoice_id}" );
			$n = mysql_num_rows( $q );
			if( !$n )
				{
				exit();
				}
			$row = mysql_fetch_array( $q );
			if( $row['status'] != 1 )
				{
				exit();
				}
			$row_user_id=htmlentities($row['user_id']);
			$uq = mysql_query( "SELECT * FROM users WHERE `id`='$row_user_id'" );
			$un = mysql_num_rows( $uq );
			if( !$un )
				{
				exit();
				}
			$user = mysql_fetch_array( $uq );
			$new_balance = $user['balance'] + intval( $_POST['LMI_PAYMENT_AMOUNT'] );
			mysql_query( "UPDATE users SET `balance`={$new_balance} WHERE `id`='$row_user_id'" );
			mysql_query( "UPDATE finances_log SET `status`='2', `balance`={$new_balance} WHERE `id`={$invoice_id}" );
			}
		}
	}
?>