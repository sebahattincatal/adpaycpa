<?php

// Реквизиты доступа к базе данных
// Details of database access
$dbhost="localhost";
$dbbase="admin_cpascript";
$dblogin="admin_cpascript";
$dbpass="ehcVtTyGeM";
$mysqli = new mysqli($dbhost, $dblogin, $dbpass, $dbbase);
$mysqli -> query('SET names utf8');

// Исплользуемый файл с локализацией (в каталоге ./localizations/)
// Used with localization file (in the directory ./localizations/)
// $localization_file = 'english.php';
$localization_file = 'english.php';

// Временной интервал (не изменяем)
// The time interval (no change)
$DT = '00:00:00';
$NT = '23:59:59';

?>