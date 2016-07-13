<?php

// Подключаем файл конфигурации
// Connect configuration file
include './includes/config.php';

// Подключаем файл с функциями
// Connect to the file functions
include './includes/functions.php';

// Подключаем файл с настройками системы
// Connect the file system settings
include './includes/settings/index.php';

// Подключаем файл с аутентификацией
// Connect to the authenticated file
include './includes/auth/index.php';

// Подключаем файл с проверкой прав доступа к странице
// Include file checking permissions page
include './includes/accesscontent/index.php';

// Подключаем файл с определением того, какую версию дизайна выводить
// Connect file with the definition of what type of design output version
include './includes/otladka/index.php';

// Подключаем файл локализации
// Connect the localization file
include './localizations/'.$localization_file;

// Назначаем TITLE для страницы
// Assign the TITLE of the page
$page_title = $loc[curr_file()]['title'];

?>