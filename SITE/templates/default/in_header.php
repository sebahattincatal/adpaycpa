<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php echo $page_title; ?></title>

<!-- STYLESHEET -->
<link rel="stylesheet" href="./templates/<?php echo $template; ?>/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="./templates/<?php echo $template; ?>/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="./templates/<?php echo $template; ?>/css/flaticon.css" type="text/css">
<link rel="stylesheet" href="./templates/<?php echo $template; ?>/css/jquery.dataTables.css" type="text/css">
<link rel="stylesheet" href="./templates/<?php echo $template; ?>/css/style.css" type="text/css">
<link rel="stylesheet" href="./templates/<?php echo $template; ?>/css/mobile-app.css" type="text/css">

<!-- GOOGLE FONT -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<!-- JQUERY -->
<script type="text/javascript" src="./templates/<?php echo $template; ?>/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="./templates/<?php echo $template; ?>/js/jquery-migrate.min.js"></script>

</head>

<body>

<header>
	<div class="container">
		<div class="brand-logo pull-left">
			<a href="#"><img src="./templates/<?php echo $template; ?>/images/cpain-logo.png"></a>
		</div><!-- brand-logo -->
		<div class="log-out pull-right">
			<div class="ticket-button">
				<a class="tooltip--triangle" href="#" data-tooltip="Your Ticket">0 <span>?</span></a>
			</div><!-- ticket-button -->
			<div class="logout-button">
				<a href="#"><i class="flaticon-on-off-button"></i><span>LOG OUT</span></a>
			</div><!-- logout-button -->
		</div><!-- log-out -->
		<?php

		// Блок с верхним горизонтальное меню
		// Block the upper horizontal menu
		include './templates/'.$template.'/roles_pages/'.$user_tip.'/main_menu.php';
		?>
		<div class="container">

			<div class="widget-main">



