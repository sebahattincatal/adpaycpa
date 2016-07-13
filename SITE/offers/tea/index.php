<?php 
// Этот код добавляем на страницу входа 
session_set_cookie_params(60*60*24*60); 
session_start(); 
if (isset($_GET['stats']) && $_GET['stats']!='' && $_GET['stats']!='0') 
	{ 
	$_SESSION['code']=htmlentities($_GET['stats']); 
	} 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Пурпурный чай</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<script type="text/javascript" src="./js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="./js/jquery.placeholder.js"></script>
<script type="text/javascript" src="./js/main_counter.js"></script>
<script type="text/javascript" src="./js/zatemnenie.js"></script>
<link rel="stylesheet" href="./css/styles.css" type="text/css" media="screen" />
</head>
<body>

<!-- Начало первого блока -->
<div class="block_1">
<div class="block_1_970">
</div>
</div>
<!-- Конец первого блока -->

<!-- Начало второго блока -->
<div class="block_2">
<div class="block_2_970">
<div class="block_2_970_text1">От сидячей работы у меня появился лишний вес. И что я только ни делала, но сбросить вес никак не получалось. И тут подруга посоветовала мне чай “Чанг-Шу”. Я особенно не верила в его чудодейственность, но все-таки попробовала. Я пью его уже 4 месяца и сбросила 25 килограмм! Хочу посоветовать всем, кто хочет сбросить лишний вес не отчаиваться! У меня получилось, получится и у вас!</div>
<div class="block_2_970_text2">Всю жизнь была достаточно полной, но серьезно худеть не пробовала. Что поделать, люблю поесть :) Сидеть на диете или совсем отказаться от еды я не могу. Случайно в интернете наткнулась на статью про пурпурный чай, взяла на пробу - он мне сразу понравился: приятный вкус и обалденный цвет! Обожаю пить его с долькой лимона - дает заряд бодрости на целый день! А главное с ним я похудела на 23 килограмма!</div>
</div>
</div>
<!-- Конец второго блока -->

<!-- Начало третьего блока -->
<div class="block_3">
<div class="block_3_970">
<div class="block_3_970_text">Пурпурный чай  прошел государственную сертификацию, внесен в Реестр свидетельств<br />о государственной регистрации RU.77.99.34.014.E.031838.08. и соответствует Единым<br />санитарно-эпидемиологическим и гигиеническим требованиям к товарам, подлежащим<br />санитарно-эпидемиологическому надзору.</div>
</div>
</div>
<!-- Конец третьего блока -->

<!-- Начало четвертого блока -->
<div class="block_4" id="zakaz">
<div class="block_4_970">

<div class="block_4_970_place">
<form action="./_success_/" method="post">
<div class="block_4_970_place_el1">Фамилия, имя, отчество:</div>
<div class="block_4_970_place_el2"><input type="text" name="name" placeholder="Ф.И.О" class="block_4_970_place_el2_input" maxlength="40" value="<?php if ((isset($_POST['fio'])) && ($_POST['fio']!='')) {echo $_POST['fio'];} ?>" /></div>
<div class="block_4_970_place_el3">Номер сотового (для уточнения адреса доставки):</div>
<div class="block_4_970_place_el4"><input type="text" name="phone" placeholder="Телефон" class="block_4_970_place_el2_input" maxlength="20" value="<?php if ((isset($_POST['phone'])) && ($_POST['phone']!='')) {echo $_POST['phone'];} ?>" /></div>
<div class="block_4_970_place_el5">Обычная цена: 4 000 р.</div>
<div class="block_4_970_place_el6">ЦЕНА СЕГОДНЯ:</div>
<div class="block_4_970_place_el7"><label /><div class="l"><input type="radio" name="cena" class="block_4_970_place_cena" value="1" /></div><div class="r">Пробный курс похудения 1 упаковка -<br />1990 рублей + 310 рублей доставка</div></label></div>
<div class="block_4_970_place_el8"><label /><div class="l"><input type="radio" name="cena" class="block_4_970_place_cena" value="2" /></div><div class="r">Пробный курс похудения 2 упаковки -<br />3990 рублей + 310 рублей доставка</div></label></div>
<div class="block_4_970_place_el9"><label /><div class="l"><input type="radio" name="cena" class="block_4_970_place_cena" value="3" /></div><div class="r">Полный курс похудения 3 упаковки -<br />4990 рублей <font color="#ffef61">+ БЕСПЛАТНАЯ ДОСТАВКА</font></div></label></div>
<div class="block_4_970_place_el10">Всего с учетом доставки: <b>4990 рублей</b></div>
<input type="hidden" name="send" value="ok">
<input type="submit" id="btn_zakazat" class="block_4_970_place_button" value="">
</form>
</div>

<!-- Начало блока обратного отсчета и количества оставшегося товара -->
<div class="hour"><span id="hour0">0</span><span id="hour1">0</span></div>
<div class="hour2"><span id="hour00">0</span><span id="hour11">0</span></div>
<div class="min"><span id="min0">0</span><span id="min1">0</span></div>
<div class="min2"><span id="min00">0</span><span id="min11">0</span></div>
<div class="sec"><span id="sec0">0</span><span id="sec1">0</span></div>
<div class="sec2"><span id="sec00">0</span><span id="sec11">0</span></div>
<div class="ostalos">25</div>
<div class="ostalos2">25</div>
<!-- Конец блока обратного отсчета и количества оставшегося товара -->

</div>
</div>
<!-- Конец четвертого блока -->

<!-- Начало пятого блока -->
<div class="block_5">
<div class="block_5_970">

<div class="block_5_970_text1">Copyright © 2014, «Пурпурный чай»</div>
<div class="block_5_970_text2">ООО «Пурпурный чай»<br />Москва, ул. Ваша улица, д.1<br />E-mail: info@cheai.com</div>

</div>
</div>
<!-- Конец пятого блока -->

</body>
</html>