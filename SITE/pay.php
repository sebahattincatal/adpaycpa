<?php

// Открываем сессию
session_start();

// Подключаем необходимые служебные файлы и библиотеки
include './includes/includes_login.php';

// Если пользователь не администратор, и в админке включено пополнение баланса через WebMoney и RoboKassa, то перебрасываем на соответствующую страницу
if ($user_tip!='70' && $settings_paysystem_pay=='1')
	{
	Header('Location: ./finances.php');
	exit;
	}

// Пишем в базу данные о посетителе
include_once './includes/userslog/index.php';

// Подключаем системную ТДС
include './includes/systemtds/index.php';
	
// Подгружаем шаблон хидера
include './templates/'.$template.'/in_header.php';

// Подгружаем шаблон контента страницы
include './templates/'.$template.'/roles_pages/'.$user_tip.'/'.curr_file();

// Подгружаем шаблон футера
include './templates/'.$template.'/in_footer.php';

?>