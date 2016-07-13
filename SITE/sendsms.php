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

// Подключаем модуль отправки СМС
// Connect SMS sending module
include './modules/sms/sendsms.php';
	
?>