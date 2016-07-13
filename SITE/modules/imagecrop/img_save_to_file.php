<?php

session_start();

// Подключаем файл конфигурации
// Connect configuration file
include '../../includes/config.php';

// Подключаем файл с аутентификацией
// Connect to the authenticated file
include '../../includes/auth/index.php';

if (!isset($user_id) && $user_id!='70')
	{
	Header ('Location: /');	
	exit;
	}

/*
*	!!! THIS IS JUST AN EXAMPLE !!!, PLEASE USE ImageMagick or some other quality image processing libraries
*/

$offer_id=$_SESSION['offer_id'];

    $imagePath = '../../tmp/';

	$allowedExts = array("jpeg", "jpg","JPEG", "JPG");
	$temp = explode(".", $_FILES["img"]["name"]);
	$extension = end($temp);
	
	//Check write Access to Directory

	if(!is_writable($imagePath)){
		$response = Array(
			"status" => 'error',
			"message" => 'Не получается загрузить картинку. Каталог защищен от записи.'
		);
		print json_encode($response);
		return;
	}
	
	if ( in_array($extension, $allowedExts))
	  {
	  if ($_FILES["img"]["error"] > 0)
		{
			 $response = array(
				"status" => 'error',
				"message" => 'ERROR Return Code: '. $_FILES["img"]["error"],
			);			
		}
	  else
		{
	    $filename = $_FILES["img"]["tmp_name"];
		list($width, $height) = getimagesize( $filename );
		move_uploaded_file($filename,  $imagePath . 'temp_offer'.$offer_id.'.'.$extension);
		$response = array(
		"status" => 'success',
		"url" => $imagePath.'temp_offer'.$offer_id.'.'.$extension,
		"width" => $width,
		"height" => $height
		);
		}
	  }
	else
	  {
	   $response = array(
			"status" => 'error',
			"message" => 'Ошибка загрузки. Возможно либо превышен лимит размера файла, либо это не JPG-картинка.',
		);
	  }
	  
	  print json_encode($response);

?>
