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
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
    <title>Christian Dior</title>
    <link href="img/favicon.png" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/popup.css" />
    <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script src="slimbox/js/slimbox2.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/popup.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
    <script src="slimbox/js/slimbox2.js" type="text/javascript"></script>
    <link media="screen" type="text/css" href="slimbox/css/slimbox2.css" rel="stylesheet" />
    <script src="js/jquery-2.0.3.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
	<script language="JavaScript" type="text/javascript" src="./js/zatemnenie.js"></script>	
	<script language="JavaScript" type="text/javascript" src="./js/jquery.counter.js"></script>	

<style>
.a1 {
  background: url("img/head.jpg") no-repeat center top;
  height: 594px; }
  
.a2 {
  background: url("img/gal_fon.jpg") no-repeat center top;
  height: 935px; }

.a3 {
  background: url("img/kyp_fon.jpg") no-repeat center top;
  height: 502px; }
  .a3 .center:before {
    content: url("img/flower4.png");
    position: absolute;
    top: 3490px;
    right: 10px; }
  .a3:after {
    content: url("img/flower3.png");
    position: absolute;
    top: 3001px;
    left: -268px; }
    
.a4 {
  background: url("img/works.jpg") no-repeat center top;
  height: 457px; }
  
.a5 {
  background: url("img/footer.png") no-repeat center top;
  height: 230px; }
</style>

  </head>
  <body topmargin="0" leftmargin="0" rightmargin="0">

<!-- Всплывающее окно, после подачи заявки -->
<?php
if (isset($_GET['success']) && $_GET['success']=='ok')
{?>
<script>zatemnenie();</script>
<div id="book" class="book"></div>
<?php
}
?>
<!-- Конец всплывающего окна, после подачи заявки -->

<script>
function proverka_form() {
var $error;
$error='';
obj_form=document.forms.zakazform;
if (obj_form.clientname.value==""){$error=$error+" Вы не указали имя. ";}
if (obj_form.phone.value==""){$error=$error+" Вы не указали телефон. ";}
if (obj_form.address.value==""){$error=$error+" Вы не указали адрес доставки. ";}
if ($error!=''){alert($error); return;}
obj_form.submit();
}
</script>
  
<!-- Верхнее МЕНЮ -->
		<table align="center" cellpadding="0" cellspacing="0" border="0" width="1000">
			<tr>
				<td width="200" style="font-size:18px; font-family: arial; font-weight: bold;"><img src="img/logo.jpg" border="0"></td>
				<td width="200" align="right" style="font-size:18px; font-family: arial; font-weight: bold;">
				<a href="#" class='view' data-route="vopros" style="text-decoration: none"><font color="#000000">Вопросы и ответы</font></a></td>
				<td width="200" align="center" style="font-size:18px; font-family: arial; font-weight: bold;">
				<a href="#" class='view' data-route="garants" style="text-decoration: none"><font color="#000000">Гарантии</font></a></td>
				<td width="200" align="left" style="font-size:18px; font-family: arial; font-weight: bold;">
				<a href="#" class='view' data-route="dostavka" style="text-decoration: none"><font color="#000000">Доставка и оплата</font></a></td>
				<td width="200" style="font-size:18px; font-family: arial; font-weight: bold;"><a rel="order_popup" class="open_popup">
				<font color="#ff2626">Заказать в 1 клик!</font></a></td>
			</tr>
		</table>			
<!-- Верхнее МЕНЮ -->

<!-- ШАПКА -->
<table align="center" cellpadding="15" cellspacing="0" border="0" width="100%" height="594" class="a1">
	<tr align="center" valign="top">
	<td>
	<span style="font-size: 37pt; font-family: calibri, arial; font-weight: bold; color: #ffffff; text-shadow: black 0px 2px 3px;">Серьги "Tribales" 
	из новой коллекции</span><br/><br/>
	<span style="font-size: 37pt; font-family: calibri, arial; font-weight: bold; color: #000000; text-shadow: #ffffff 2px 2px 3px;">"Mise en Dior"</span><br/>
	<img src="img/top.png" border="0"><br/>
	<table align="center" border="0" width="830">
	<tr align="center">
		<td width="220" valign="top"><span style="font-size: 25pt; font-family: calibri, arial; color: #ffffff; text-shadow: #000000 1px 1px 3px;"><del>3980 руб.</del><br/>новая цена за</span></td>
		<td width="400" valign="top"><span style="font-size: 50pt; font-family: calibri, arial; color: #c00; text-shadow: #ffffff 1px 1px 3px;">3 комплекта</span></td>
		<td valign="center"><span style="font-size: 30pt; font-family: calibri, arial; color: #ffffff; text-shadow: #000000 1px 1px 3px;">1990 руб.</span></td>
	</tr>
</table>
	</td>
	</tr>
</table>
<!-- ШАПКА -->
<br/>

<center><span style="font-size: 32pt; font-family: calibri, arial; font-weight: bold; color: #bf3059;">Стильно</span><br>
<span style="font-size: 32pt; font-family: calibri, arial; font-weight: bold; color: #414146;">Роскошная асимметрия</span></center><br/>

	<table align="center" cellpadding="0" cellspacing="0" border="0" width="1000">
	<tr>
		<td align="left" valign="top" width="310"><img src="img/ico1.png" border="0"><br/><br/><br/></td>
		<td align="right" valign="top" width="275"><img src="img/ico2.png" border="0"></td>
		<td align="center" valign="center" width="110"><img src="img/flower.png" border="0"></td>
		<td align="right" valign="bottom"><img src="img/ico3.png" border="0"></td>
	</tr>
	</table>
	<table align="center" cellpadding="0" cellspacing="0" border="0" width="1000">
	<tr>
		<td align="left" valign="top">
		<span style="font-size: 15pt; font-family: calibri, arial; color: #414146;">В этом сезоне бешеной популярностью среди «продвинутых» 
		модниц пользуются сережки шарики от знаменитого бренда Диор, Mise en Dior.<br/><br/><br/>
		Очень многим поклонницам знаменитого Дома они пришлись по вкусу, ведь эти украшения выглядят благородно и стильно, 
		благодаря относительно скромной форме и элегантному виду.</span>
		</td>
		<td align="right" valign="top" width="275"><img src="img/ico5.png" border="0"></td>
		<td align="left" valign="bottom" width="276" rowspan="2"><img src="img/ico4.png" border="0"></td>
	</tr>
	<tr>
		<td align="left" width="1000" colspan="2">
		<span style="font-size: 15pt; font-family: calibri, arial; color: #414146;">Смелый асимметричный дизайн серег с двумя бусинами 
		навеян экзотическими мотивами. Меньшая из бусин украшает мочку уха спереди, а более крупная окружает ее ореолом сзади. 
		Можно носить самостоятельно или в сочетании с другими украшениями.</span>
		</td>	
	</tr>
	</table><br/>
	<center><img src="img/kn.png" rel="order_popup" class="button open_popup"></center><br/>
	
<table cellpadding="0" cellspacing="0" border="0" width="100%" height="935" class="a2">
	<tr>
	<td valign="top"><br/>
	<center><span style="font-size: 32pt; font-family: calibri, arial; font-weight: bold; color: #414146;">Галерея</span></center><br/><br/>
	
	<table align="center" cellpadding="0" cellspacing="0" border="0" width="960">
		<tr>
			<td align="left" width="320"><a rel="lightbox[is]" href="img/gal/imgg1.png"><img src="img/gal/img_s1.png" border="0"></a></td>
			<td align="center" width="320"><a rel="lightbox[is]" href="img/gal/imgg2.png"><img src="img/gal/img_s2.png" border="0"></a></td>
			<td align="right" width="320"><a rel="lightbox[is]" href="img/gal/imgg3.png"><img src="img/gal/img_s3.png" border="0"></a></td>
		</tr>
		<tr>
			<td height="30"></td>
		</tr>
		<tr>
			<td align="left" width="320"><a rel="lightbox[is]" href="img/gal/imgg4.jpg"><img src="img/gal/img_s4.jpg" border="0"></a></td>
			<td align="center" width="320"><a rel="lightbox[is]" href="img/gal/imgg5.jpg"><img src="img/gal/img_s5.jpg" border="0"></a></td>
			<td align="right" width="320"><a rel="lightbox[is]" href="img/gal/imgg6.jpg"><img src="img/gal/img_s6.jpg" border="0"></a></td>
		</tr>
		<tr>
			<td height="30"></td>
		</tr>
		<tr>
			<td align="left" width="320"><a rel="lightbox[is]" href="img/gal/imgg7.jpg"><img src="img/gal/img_s7.png" border="0"></a></td>
			<td align="center" width="320"><a rel="lightbox[is]" href="img/gal/imgg8.jpg"><img src="img/gal/img_s8.jpg" border="0"></a></td>
			<td align="right" width="320"><a rel="lightbox[is]" href="img/gal/imgg9.jpg"><img src="img/gal/img_s9.jpg" border="0"></a></td>
		</tr>
		</table>
		
	</td>
	</tr>
</table><br/><br/>

<center><span style="font-size: 32pt; font-family: calibri, arial; font-weight: bold; color: #bf3059;">Cерьги </span><span style="font-size: 32pt; font-family: calibri, arial; font-weight: bold; color: #414146;">Mise En Dior</span></center><br/>

<table cellpadding="0" cellspacing="0" width="1000" align="center" border="0">
	<tr>
		<td align="left" valign="center"><img src="img/sergi.png" border="0"></td>
		<td width="500">
			<span style="font-size: 15pt; font-family: calibri, arial; color: #414146;">Известный дизайнер, мадам Камилла 
			Мичели не так давно создала серьги нового, весьма <span style="color: #bf3059; font-weight: bold;">оригинального дизайна</span>, и эти украшения 
			в кратчайшие сроки завоевали сердца модниц, в чем же секрет популярности?<br/><br/>
			Главная их изюминка – необычная асимметричность, она придает изделиям <span style="color: #bf3059; font-weight: bold;">стиль и оригинальность</span>.
			Серьги выглядят как двухсторонние, и этим особенно притягательны.<br/><br/>
			<b>Материал:</b> высококачественная ювелирная сталь марки 316L - никогда не темнеет, гипоаллергенна, не подвержена коррозии, воздействию солнца.<br/>
			<b>Диаметр малого шара:</b> 0.7 см<br/> <b>Диаметр большого шара:</b> 1.5 см.</span><br/><br/>
			<center><img src="img/kn_s.png" border="0" rel="order_popup" class="button open_popup"></center>
		</td>
	</tr>
</table><br/><br/>

<table cellpadding="0" cellspacing="0" width="100%" align="center" border="0" class="a3">
	<tr><td><br/>
	<center><span style="font-size: 32pt; font-family: calibri, arial; font-weight: bold; color: #bf3059;">Причины купить серьги </span>
	<span style="font-size: 32pt; font-family: calibri, arial; font-weight: bold; color: #414146;">Mise En Dior</span></center><br/><br/>
		<div class="center">
	<table cellpadding="0" cellspacing="0" width="1000" align="center" border="0">
	<tr style="font-size: 14pt; font-family: calibri, arial; color: #000000;">
		<td width="200"> </td>
		<td width="222" valign="center"><b>Качество<br/> на высшем уровне</b><br/> Качественная копия<br/> Mise En Dior, не отличишь.<br/> По приятной цене.</td>
		<td width="103" valign="center"><img src="img/rea1.png" border="0"></td>
		<td width="150"> </td>
		<td width="222" valign="center"><b>Мировое признание.</b><br/>Серьги моментально набрали популярность среди мировых звезд и стали культовыми!</td>
		<td width="103" valign="center"><img src="img/rea2.png" border="0"></td>
	</tr>
	</table><br/><br/><br/>
	<table cellpadding="0" cellspacing="0" width="1000" align="center" border="0">
	<tr style="font-size: 14pt; font-family: calibri, arial; color: #000000;">
		<td width="252" valign="center"><b>Изюминка</b><br/>Необычная асимметричность, она придает изделиям стиль и оригинальность.</td>
		<td width="103"><img src="img/rea3.png" border="0"></td>
		<td width="140"> </td>
		<td width="222" valign="center"><b>100% гарантия</b><br/>Если товар не подойдет, мы вернем вам деньги. Оплата при получении.</td>
		<td width="103"><img src="img/rea4.png" border="0"></td>
		<td width="180"> </td>
	</tr>
	</table><br/><br/><br/></div>
	</td></tr>
</table>

<!-- Заголовок -->
<table align="center" cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#c20f05">
	<tr height="80" align="center"><td style="font-size: 30pt; font-family: calibri, arial; font-weight: bold; color: #ffffff">ОТЗЫВЫ ПОКУПАТЕЛЕЙ</td></tr>
</table><br/>
<!-- Заголовок -->

<table align="center" cellpadding="0" cellspacing="0" border="0" width="1000"><tr>
		<td width="125" valign="top" align="center"><img src="img/ava1.png" border="0"><br/><br/></td>
		<td style="font-size: 12pt; font-family: calibri, arial;" valign="top" width="375"><b>Наталья, Санкт -Петербург</b><br/>
		Сегодня получила посылку, не могла вас не отблагодарить! Давно искала, хотелось купить качественные, что бы были как в оригинале. 
		Спасибо, серьги действительно как в оригинале, выполнены аккуратно, и на ушках смотрятся бесподобно!</td>
		<td width="125" valign="top" align="center"><img src="img/ava2.png" border="0"><br/><br/></td>
		<td style="font-size: 12pt; font-family: calibri, arial;" valign="top" width="375"><b>Михаил, пос. Малые Серьги</b><br/>
		Лучшего подарка за все годы не было - слова моей жены! спасибо, серьги понравились, слов нет.. одни эмоции</td>
	</tr><tr>
		<td valign="top" align="center"><img src="img/ava3.png" border="0"><br/><br/></td>
		<td style="font-size: 12pt; font-family: calibri, arial;" valign="top"><b>Ольга, Липецк</b><br/>
		Не могу не выразить благодарность за доставленный товар, а именно, эти сережки. Очень красивые, удобные, 
		смотрятся невероятно красиво, заказывала в офис, понравились всем!</td>
		<td valign="top" align="center"><img src="img/ava4.png" border="0"></td>
		<td style="font-size: 12pt; font-family: calibri, arial;" valign="top"><b>Оксана, Омск</b><br/>
		Спасибо, я просто в восторге, такая красота, и кто придумывает такие дизайны, которые поражают!!!Стильно, эффектно, дорого!</td>
	</tr><tr>
		<td valign="top" align="center"><img src="img/ava5.png" border="0"><br/><br/></td>
		<td style="font-size: 12pt; font-family: calibri, arial;" valign="top"><b>Ира, Нижний Тагил</b><br/>
		Нереальные серьги! Очень понравилось качество. Желаю вам процветания, удачи</td>
		<td valign="top" align="center"><img src="img/ava0.png" border="0"></td>
		<td style="font-size: 12pt; font-family: calibri, arial;" valign="top"><br/>
		Присылайте Ваши отзывы на адрес <b>admin@novinka116.ru</b></td>
	</tr>
</table><br/>


<div class="a4">
	<center><span style="font-size: 32pt; font-family: calibri, arial; font-weight: bold; color: #bf3059;">Как </span>
	<span style="font-size: 32pt; font-family: calibri, arial; font-weight: bold; color: #414146;">мы работаем?</span></center><br/><br/><br/><br/><br/>
	<table cellpadding="0" cellspacing="0" width="1000" align="center" border="0">
	<tr style="font-size: 14pt; font-family: calibri, arial; color: #414146;">
		<td width="190" align="center" valign="top"><img src="img/w1.png" border="0"><br/><br/>Вы оставляете<br/>заявку на сайте</td>
		<td width="80" align="center" valign="top"><img src="img/str.png" border="0"></td>
		<td width="190" align="center" valign="top"><img src="img/w2.png" border="0"><br/><br/>Менеджер<br/> связывается с Вами<br/> для подтверждения заказа</td>
		<td width="80" align="center" valign="top"><img src="img/str.png" border="0"></td>
		<td width="190" align="center" valign="top"><img src="img/w3.png" border="0"><br/><br/>Мы быстро<br/>доставляем Вашу<br/> посылку по<br/> 
		указанному<br/> адресу в любую<br/> точку страны</td>
		<td width="80" align="center" valign="top"><img src="img/str.png" border="0"></td>
		<td width="190" align="center" valign="top"><img src="img/w4.png" border="0"><br/><br/>Вы получаете свой<br/>товар и платите за<br/>него на почте<br/>или курьеру.</td>
	</tr>
	</table><br/><br/><br/><br/><br/><br/>
</div><br/><br/>

<!-- АКЦИЯ -->
		<table align="center" cellpadding="0" cellspacing="0" border="0" width="1100">
			<tr>
				<td width="500" align="left"><img src="img/akc.jpg" border="0"></td>
				<td align="center" valign="top">
				<span style="font-family: calibri, arial; font-size: 45pt; font-weight: bold; color: #ff0f15">Внимание Акция!</span><br/>
				<span style="font-family: calibri, arial; font-size: 14pt; font-weight: bold; color: #000000">Скидка 50% (экономия 1990 руб.)</span><br/>
				<span style="font-family: calibri, arial; font-size: 37pt; font-weight: bold; color: #414146"><del>3980 руб.</del></span><br/>
				<span style="font-family: calibri, arial; font-size: 30pt; font-weight: bold; color: #bf3059">1990 руб.</span><br/><br/>
				<span style="font-family: calibri, arial; font-size: 14pt; font-weight: bold; color: #000000">До конца акции осталось:<br />
				<div class="block2_counter_place1" style="display: inline-block; margin: 10px;"><span style="font-size: 45px;"><span id="day0">0</span><span id="day1">0</span></span><br />дней</div>
				<div class="block2_counter_place2" style="display: inline-block; margin: 10px;"><span style="font-size: 45px;"><span id="hour0">0</span><span id="hour1">0</span></span><br />часов</div>
				<div class="block2_counter_place3" style="display: inline-block; margin: 10px;"><span style="font-size: 45px;"><span id="min0">0</span><span id="min1">0</span></span><br />минут</div>
				<div class="block2_counter_place4" style="display: inline-block; margin: 10px;"><span style="font-size: 45px;"><span id="sec0">0</span><span id="sec1">0</span></span><br />секунд</div>
				</span><br/>

				<img src="img/sale.png" border="0" rel="order_popup" class="open_popup" alt="Заказать"><br/><br/>
				<span style="font-family: calibri, arial; font-size: 17pt; font-weight: bold; color: #000000">
				В связи с высокой активностью покупателей акция со скидкой 50% заканчивается.</span><br/>
				<span style="font-family: calibri, arial; font-size: 18pt; font-weight: bold; color: green; background-color: #eeeeee;">
				Из 100 Комплектов осталось всего 
				<span style="font-family: calibri, arial; font-size: 18pt; font-weight: bold; color: red; background-color: #eeeeee;"> 9</span></span><br/><br/>
				</td>
			</tr>
		</table>
<!-- АКЦИЯ -->

<!-- Футер -->
<div class="a5">
	<center><br/><br/><br/><br/><br/><br/>
		<span style="font-size: 12pt; font-family: calibri, arial; color: #414146;">ИП Земляков В.С., ОГРН 314168911800067</span><br/>
	<span style="font-size: 12pt; font-family: calibri, arial; color: #414146;">Татарстан, г.Лениногорск, ул.Тукая, д.11, офис 7 </span><br/>
	<a href="#" class='view' data-route="politika" style="text-decoration: none; font-size: 12pt; font-family: calibri, arial; color: #000000;"><u>Политика конфиденциальности</u></a><br/><br/>
	</center>
</div>
<!-- Футер -->

<div id="data-vopros" style="display:none;">
	<span style="font-family: calibri, arial; font-size: 12pt; color: #000000"><b>- Как я могу узнать местоположение моей посылки?</b><br/><br/>
		В любой момент Вы можете отследить где находится посылка в данный момент перейдя на страницу отслеживания почтовых отправлений:<br/>
		<a href="http://www.russianpost.ru/tracking20/" target="_blank">http://www.russianpost.ru/tracking20/</a><br/><br/>
		<b>- Как мне заказать серьги Dior?</b><br/><br/>
		Чтобы заказать серьги Dior перейдите в самый низ страницы и нажмите кнопку Оформить заказ. Заполните все необходимые поля и нажмите кнопку Заказать.<br/><br/>
		<b>- Я не помню индекс своего почтового отделения. Что делать?</b><br/><br/>
		Если Вы не знаете или затрудняетесь указать свой почтовый индекс, то можете легко его определить на сервисах:<br/>
		<a href="http://kladr-online.ru">kladr-online.ru</a><br/>
		<a href="http://www.infokladr.ru">infokladr.ru</a><br/><br/>
		<b>- Каким образом мне доставят заказ?</b><br/><br/>
		Заказ будет выслан вам бандеролью по почте (отправление 1 класса) c наложенным платежом. 
		Вы платите деньги только тогда, когда товар уже придет в ваше почтовое отделение.<br/><br/>
		<b>- Прошёл месяц, а посылка так и не пришла, что делать?</b><br/><br/>
		Свяжитесь с нами, и мы определим местоположение Вашей посылки, в почте России зачастую бывают задержки.<br/><br/>
		<b>- Даёте ли вы трек номер для отслеживания посылки?</b><br/><br/>
		Да, как только Ваша посылка отправлена мы высылаем номер почтового отправления в СМС.<br/><br/>
		<b>- Я оформил заказ, а сейчас хочу его изменить.</b><br/><br/>
		Оформите на сайте новый заказ и пришлите нам письмо (либо позвоните) и сообщите, что прежний заказ нужно отменить. 
		В любом случае с вами свяжется наш менеджер и уточнит у вас все детали.<br/><br/>
		<b>- Помогите мне разобраться на сайте.</b><br/><br/>
		Если в данном разделе Вы не нашли ответ на интересующий вопрос, то вы можете написать нам письмо на адрес admin@novinka116.ru. 
		Мы с удовольствием на него ответим.<br/><br/>
	</span>
</div>

<div id="data-garants" style="display:none;">
	<span style="font-family: calibri, arial; font-size: 12pt; color: #000000">
		<b>Оплата при получении</b><br/><br/>
		Мы не берем с вас предоплату.<br/><br/>
		Оплата заказа осуществляется при получении в почтовом отделении.<br/><br/>
		<b>Гарантии на товар</b><br/><br/>
		Перед отправкой товары проходят 100% проверку.<br/><br/>
		Мы вернем вам деньги если что-то окажется не так.<br/><br/>
		<b>Мы соблюдаем Закон «О защите прав потребителей»</b><br/><br/>
		- Вы вправе отказаться от покупки в течение 14 дней с момента получения заказа, не зависимо от причины возврата.<br/><br/>
		- Вы можите вернуть товар с недостатками в течение 6 месяцев с момента получения заказа.<br/><br/>
		<b>Возврат денег</b><br/><br/>
		- Вам необходимо обратиться в службу поддержки клиентов;<br/><br/>
		- После потверждения, выслать нам купленный товар.<br/><br/><br/>
		Для нас важны долгосрочные отношения с покупателями, поэтому мы ценим каждого клиента. Нам не выгодно обманывать Вас, мы дорожим своей репутацией.<br/><br/>
		Наша деятельность полностью легальна и мы имеем свидетельство о государственной регистрации в качестве индивидуального предпринимателя.<br/><br/>
		<center><a href="img/doc.jpg" target="_blank"><img height="367" width="256" src="img/doc.jpg"></a></center><br/><br/>
	</span>
</div>

<div id="data-dostavka" style="display:none;">
	<span style="font-family: calibri, arial; font-size: 12pt; color: #000000">
		<b style="font-size: 14pt">Доставка Почтой России 1 классом</b><br/><br/>
		Мы вам доверяем и не требуем с вас предоплаты.<br/><br/>
		Мы уважаем ваше время, и поэтому все заказы отправляем только <b>бандеролями 1 класса</b>.<br/><br/>
		Вы можете забрать и оплатить свои новые серьги Dior на почте в любое удобное для вас время.<br/><br/><br/>
		<b>Стоимость доставки Почтой России</b><br/><br/>
		Стоимость доставки в любую точку России составляет 300 рублей.<br/><br/><br/>
		<b>Сроки доставки Почтой России</b><br/><br/>
		Мы отправлим ваш заказ уже сегодня 1 классом.<br/><br/>
		Посылка с заказом дойдёт до Вас быстро и без единого дефекта.<br/><br/>
		Доставка займет 5-10 рабочих дней.<br/><br/>
		Чтобы ускорить прибытие вашего заказа, мы отправляем бандероли с Главпочтампта, включая выходные дни.<br/><br/><br/>
		<b>Оплата заказа наложенным платежом</b><br/><br/>
		Оплата осуществляется в почтовом отделении при получении заказа.<br/><br/><br/>
		<b>Условия доставки Почтой России</b><br/><br/>
		- В момент отправки, каждому заказу присваивается номер. По номеру можно отследить доставку посылки на 
		<a href="http://www.russianpost.ru/tracking20/" target="_blank"><b>сайте Почты России</b></a>. 
		Мы незамедлительно вышлем номер на ваш номер телефона.<br/>
		- Получить заказ можно в почтовом отделении, индекс которого был указан при оформлении заказа. 
		Уведомление о доставке заказа придет по вашему адресу. Если уведомление вам не поступило, то через 10 дней сходите на почту самостоятельно, 
		скорее всего ваша посылка уже ждёт Вас на почте.<br/>
		- Для получения заказа на почте возьмите с собой паспорт. Срок хранения заказа в почтовом отделении составляет 1 месяц с момента поступления. 
		Просим вас <b>своевременно</b> получить пришедший заказ.<br/>
		- В настоящее время, мы осуществляем доставку только по России.<br/><br/><br/>
		<b style="font-size: 17pt; color: #ff0000">Черный список клиентов</b><br/><br/>
		<b>Если вы заказываете товар наложенным платежом и не забираете его, Вы автоматически попадаете в Черный список покупателей Рунета.</b><br/><br/>
		<b>Черный список покупателей</b> - в этот список входят люди, которые заказали товар наложенным платежом Почтой России и не забрали его на Почте.<br/><br/>
		<b>Сколько интернет-магазинов формируют его?</b><br/>
		На данный момент недобросовестных покупателей отслеживают 2411 магазинов.<br/><br/>
		<b>Что происходит, когда человек попадает в него?</b><br/>
		После попадания в этот список, товар будет отправляться только по предоплате.<br/><br/>
		<b>Сколько человек находится в черном списке?</b><br/>
		На текущий момент более 26000 человек.<br/><br/>
		<b>У меня интернет-магазин, как я могу получить доступ к черному списку и участвовать в его формировании?</b><br/>
		Для этого необходимо зарегистрироваться в проекте: <a href="http://www.blclient.ru" target="_blank">blclient.ru</a><br/><br/>
	</span>
</div>

<div id="data-politika" style="display:none;">
	<span style="font-family: calibri, arial; font-size: 13pt; color: #000000">
	<b>Политика конфиденциальности</b><br/><br/>
	Сайт уважает ваше право и соблюдает конфиденциальность при заполнении, передачи и хранении ваших конфиденциальных сведений. 
	Размещение заявки на сайте означает Ваше согласие на обработку данных. Под персональными данными подразумевается информация, 
	относящаяся к субъекту персональных данных, в частности фамилия, имя и отчество, дата рождения, адрес, контактные реквизиты 
	(телефон, адрес электронной почты), семейное, имущественное положение и иные данные, относимые Федеральным законом от 27 июля 
	2006 года № 152-ФЗ «О персональных данных» (далее – «Закон») к категории персональных данных. Целью обработки персональных 
	данных является оказание сайтом услуг. В случае отзыва согласия на обработку своих персональных данных мы обязуемся удалить 
	Ваши персональные данные в срок не позднее 3 рабочих дней. Отзыв согласия можно отправить в электронном виде на наш электронный адрес. 
	</span>
</div>

<div id="order_popup" class="popup"> <span class="close" style="font-family: calibri, arial; font-size: 14pt; color: #ff0000"><b>X</b></span>
<div class="content_wrapper">
<p style="font-family: calibri, arial; font-size: 19pt;"><b>Заполните простую форму заказа</b></p>

<form name="zakazform" id="send" action="./_success_/" method="post" onSubmit="proverka_form(); return(false);">
<div class="block2_input_fio_place"><input type="text" name="clientname" class="block2_input_fio" value="" placeholder="Ваше имя" /></div>
<div class="block2_input_phone_place"><input type="text" name="phone" class="block2_input_phone" value="" placeholder="Ваш телефон" /></div>
<div class="block2_input_address_place"><input type="text" name="address" class="block2_input_phone" value="" placeholder="Адрес доставки" /></div>
<div class="block2_button_zakazat_place" id="block2_button_zakazat_place"><input type="submit" name="submit" value="" class="block2_button_zakazat"/></div>
<input type="hidden" name="send" value="ok">
<!-- <input type="hidden" name="cena" value="1200"> -->
</form>


</div></div>
	
  </body>
</html>