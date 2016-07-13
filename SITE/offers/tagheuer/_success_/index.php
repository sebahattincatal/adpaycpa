
    <?php  
    session_start(); 
    // Этот код добавляем на целевую страницу  
    if (isset($_SESSION['code']))  
        {  
        if (isset($_POST['clientname'])) {$name=htmlentities($_POST['clientname']);} else {$name='';} 
        if (isset($_POST['phone'])) {$phone=htmlentities($_POST['phone']);} else {$phone='';}
        if (isset($_POST['email'])) {$email=htmlentities($_POST['email']);} else {$email='';}
        if (isset($_POST['address'])) {$address=htmlentities($_POST['address']);} else {$address='';}
        if (isset($_POST['kolvo'])) {$kolvo=htmlentities($_POST['kolvo']);} else {$kolvo='';}
        if (isset($_POST['cena'])) {$cena=htmlentities($_POST['cena']);} else {$cena='';} 
        if (isset($_POST['artikul'])) {$artikul=htmlentities($_POST['artikul']);} else {$artikul='';}
        $url = 'http://cpatraf.ru';  
        $data = array  
            (  
            'code' => htmlentities($_SESSION['code']),  
            'name' => $name,  
            'phone' => $phone,  
            'email' => $email, 
            'address' => $address, 
            'kolvo' => $kolvo, 
            'cena' => $cena, 
            'artikul' => $artikul, 
            );  
        $options = array ('http' => array ('header' => "Content-type: application/x-www-form-urlencoded\r\n", 'method'  => 'POST', 'content' => http_build_query($data)));  
        $context  = stream_context_create($options);  
        $result = file_get_contents($url, false, $context);  
        if ($result === FALSE) {echo 'Соединение неудачно.';}  
        unset ($_SESSION['code']);  
        }  
    ?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Ваша заявка успешно принята!</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./css/styles.css" type="text/css" media="screen" />
</head>
<body>

<!-- Блок №1 -->
<div class="block1">
<div class="block1_content">

<div class="block1_zagolovok1">Спасибо!<br />Ваш заказ успешно принят!</div>
<div class="block1_zagolovok2">Мы скоро свяжемся с Вами для уточнения заказа.<br />Пожалуйста, включите Ваш контактный телефон.</div>

</div>
</div>
<!-- Конец блока №1 -->



</body>
</html>
