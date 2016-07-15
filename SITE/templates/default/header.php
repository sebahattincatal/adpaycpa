
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php echo $page_title; ?></title>
<meta name="description" content="Cpain - Advertising Network">

<!-- STYLESHEET -->
<link rel="stylesheet" href="./templates/<?php echo $template; ?>/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="./templates/<?php echo $template; ?>/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="./templates/<?php echo $template; ?>/css/slick.css" type="text/css">
<link rel="stylesheet" href="./templates/<?php echo $template; ?>/css/animate.css" type="text/css">
<link rel="stylesheet" href="./templates/<?php echo $template; ?>/css/style/style.css" type="text/css">
<link rel="stylesheet" href="./templates/<?php echo $template; ?>/css/mobile-app.css" type="text/css">

<!-- GOOGLE FONT -->
<link href='https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900' rel='stylesheet' type='text/css'>

<!-- JQUERY -->
<script type="text/javascript" src="./templates/<?php echo $template; ?>/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="./templates/<?php echo $template; ?>/js/jquery-migrate.min.js"></script>

</head>

<body class="home">

	<div class="sidebar-navigation">
		<div class="sidebar-menu"></div>
	</div><!-- sidebar-navigation -->
	<div class="sidebar-overlay close-btn"></div>

		<div class="blog-inwrap">

		<?php
			// Выводим шапку сайта
			// Print cap site
			include './templates/'.$template.'/blocks/shapka_not_login.php';
		?>