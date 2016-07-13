<?php 
// Этот код добавляем на страницу входа 
session_set_cookie_params(60*60*24*60); 
session_start(); 
if (isset($_GET['stats']) && $_GET['stats']!='' && $_GET['stats']!='0') 
	{ 
	$_SESSION['code']=htmlentities($_GET['stats']); 
	} 
?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

        <!-- SITE TITLE -->
        <title>Tag Heuer Carrera X</title>

        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
        <link rel="stylesheet" href="css/nivo-lightbox.css">
        <link rel="stylesheet" href="css/nivo-theme.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/icomoon.css"> 
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/jquery.countdown.css" />

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
        <!-- *********************************** IMPORTANT BEGIN ********************************** -->
        <!-- CHOOSE LAYOUT: light or dark -->
        <link rel="stylesheet" href="css/dark.css">

        <!-- CHOOSE COLOR: red, purple, blue, aqua, green, yellow or orange -->
        <link rel="stylesheet" href="css/red.css">

        <!-- *********************************** IMPORTANT END ************************************ -->

        <!-- GOOGLE FONT -->
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:100,200,300,400,600" rel="stylesheet" type="text/css">

        <!-- FAVICON AND TOUCH ICONS -->
       
        <link rel="apple-touch-icon" href="img/icon.png">
        <link rel="icon" sizes="228x228" href="img/icon.png">

        <!--[if lt IE 9]>
                <script type="text/javascript" src="js/html5shiv.js"></script>
        <![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 


<!-- jQuery/Modal BEGIN -->
<link href="./css/modal.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="./js/modal.js"></script>
<!-- jQuery/Modal END -->


</head>
    <body>


<script>
function proverka_form1() {
var $error;
$error='';
obj_form=document.forms.zakazform1;
if (obj_form.clientname.value==""){$error=$error+" Вы не указали имя. ";}
if (obj_form.phone.value==""){$error=$error+" Вы не указали телефон. ";}
if ($error!=''){alert($error); return;}
obj_form.submit();
}
</script>	
	
        <!-- GLOBAL WRAP BEGIN -->
        <div class="global-wrap">


            <!-- PREALOADER BEGIN 
            <div class="preloader">
    
    
                    <div class="loader-one">Loading...</div>
    
            </div>
            PRELOADER END -->


            <!-- FULLSCREEN MENU BEGIN -->
            <nav class="cd-primary-nav" role="navigation">
                <button type="button" class="overlay-close cd-primary-nav-trigger">Close</button>
                <ul class="localScroll">


                    <li><a href="#home">главная</a></li>
                    <li><a href="#about">видео</a></li>
                    <li><a href="#features">характеристики</a></li>
                    <li><a href="#style">стиль</a></li>
                    <li><a href="#services">доставка и оплата</a></li>
                    <li><a href="#download">отзывы</a></li>
                    <li><a class="order" href="#" modal="zakaz">заказать сейчас</a></li>   


                </ul>
            </nav>
            <!--FULLSCREEN END -->



            <!-- NAVBAR BEGIN -->
            <div class="responsive-nav">
                <div class="container">


                    <div class="logo-nav localScroll">
                        <a href="#home">
                            <img src="img/thlogo_cr.png" alt="logo">
                        </a>
                    </div>


                    <nav role="navigation" id="scroll">
                        <ul id="menu">


                            <li><a href="#home">главная</a></li>
                            <li><a href="#about">видео</a></li>	
                            <li><a href="#features">характеристики</a></li>				
                            <li><a href="#style">стиль</a></li>

                            <li><a href="#services">доставка и оплата</a></li>
                            <li><a href="#download">отзывы</a></li>

                            <li><a href="#" modal="zakaz" class="last-md order">заказать</a></li>

                        </ul>
                    </nav>


                    <div class="responsive-button">
                        <a class="cd-primary-nav-trigger" href="#0">
                            <span class="visible-lg menu">меню</span>
                            <i class="icon-align-justify"></i>
                        </a>
                    </div>

                </div>
            </div>









            <!-- RESPONSIVE NAVBAR END -->


            <!-- HEADER BEGIN -->
            <header id="home">
                <div class="header-special-version image-overlay">

                    <!-- WELCOME MESSAGE AND BUTTONS -->
                    <div class="container">
                        <div class="col-sm-12 col-md-7 intro">

                            <!-- LOGO AND WELCOME MESSAGE -->
                            <div class="welcome-message">

                                <!-- LOGO -->
                                <img src="img/thlogo.png" alt="" style="max-width: 70%;" class="logo">

                                <!-- WELCOME MESSAGE -->
                                <h1>Суперпредложение<br>всего<span class="price_land_s1">1990</span>  <span class="price_currency"> <span class="price_land_curr">руб.</span></span> <sup>*</sup></h1>
                                <p id="note"></p>
                                <div id="countdown"></div>
                                <h5><sup>*</sup>Обычная стоимость модели<br>Tag Heuer Carrera X составляет <span class="price_land_s4">3980</span> <span class="price_land_curr">руб.</span></h5>

                            </div>

                            <div class="showHere localScroll">

                                <!-- BUTTONS -->
                                <a class="btn btn-theme pulse-hover" href="#" modal="zakaz">Заказать</a>
                                <a class="btn btn-theme btn-opacity pulse-hover" href="#about">Узнать больше</a>

                            </div>

                        </div>
                    </div>

                    <!-- HAND PHONE IMAGE -->
                    <div class="fadeScroll">
                        <img src="img/watchtrans.gif" style="" class="hand-phone" alt="img">
                    </div>

                    <!-- BUTTON TO FULLSCREEN MENU -->
                    <ul class="responsive-button">
                        <li>
                            <a href="#" modal="zakaz" class="visible-lg order">заказать сейчас</a>
                        </li>
                        <li id="fullscreen-menu-header">
                            <a class="cd-primary-nav-trigger" href="#0">
                                <span class="visible-lg menu">меню</span>
                                <i class="icon-align-justify"></i>
                            </a>
                        </li>
                    </ul>

                </div>
            </header>
            <!-- HEADER END -->


            <!-- SECTION 2 (ABOUT) BEGIN -->
            <section id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-push-6 vertical-center fadeInLeft"
                             data-wow-duration="1s"
                             data-wow-offset="150"
                             data-wow-delay="0s">

                            <!-- SECTION HEADER -->
                            <div class="intro">
                                <h2>Tag Heuer Carrera Space X</h2>
                                <p>Элитные часы, побывавшие в космосе!</p>
                                <hr class="hidden-md hidden-lg">
                            </div>

                            <!-- TAB BUTTONS -->

                            <!-- TAB CONTENT -->
                            <div class="tab-content" id="tab">

                                <!-- TAB CONTENT ONE -->
                                <div class="item tab-pane active" data-hash="one">
                                    <div class="text-icon-left">

                                        <div class="text">
                                            <p><i class="fa fa-check-square-o"></i>Модель SpaceX – доказательство непревзойденного мастерства часовщиков Tag Heuer.</p>
                                        </div>
                                    </div>
                                    <div class="text-icon-left">

                                        <div class="text">
                                            <p><i class="fa fa-check-square-o"></i>Инновации, идущие в ногу с традициями, великолепный современный дизайн, сочетающийся с функциональностью, где за кажущейся простотой стоят годы исследовательской работы и труд лучших мастеров.</p>
                                        </div>
                                    </div>
                                    <div class="text-icon-left">

                                        <div class="text">
                                            <p><i class="fa fa-check-square-o"></i>Новый SpaceX – его точность, лаконичность и многообразие функций – квинтэссенция наиболее впечатляющих изобретений мануфактуры.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB CONTENT TWO -->


                                <!-- TAB CONTENT THREE -->


                            </div>
                        </div>

                        <!-- PHONES IMAGES -->
                        <div class="col-md-6 col-md-pull-6 vertical-center phones">

                            <!-- VIDEO PHONE -->
                            <iframe width="100%" height="480px" src="https://www.youtube.com/embed/-7t7kuaVix0" frameborder="0" allowfullscreen></iframe>

                        </div>

                    </div>
                </div>
            </section>
            <!-- SECTION 2 (ABOUT) END -->


            <!-- SECTION 5 (FEATURES) BEGIN -->
            <section id="features" class="color-b">
                <div class="container">
                    <div class="row">

                        <!-- SECTION HEADER -->
                        <div class="intro wow fadeInDown"
                             data-wow-duration="1s"
                             data-wow-offset="200"
                             data-wow-delay="0s">
                            <h2>Качество познается в деталях</h2>
                            <p>Подробности о Tag Heuer Carrera X</p>
                        </div>

                        <!-- LEFT FEATURES -->
                        <div class="col-md-3 wow fadeInRight"
                             data-wow-duration="0.5s"
                             data-wow-offset="150"
                             data-wow-delay="0s">

                            <!-- FEATURE ONE -->
                            <div class="block text-icon-right">
                                <div class="text">
                                    <h3 class="right"><i class="fa fa2 fa-gavel"></i>Материал корпуса</h3>
                                    <p>Корпус выполнен из нержавеющей стали - он в 20 раз тверже и прочнее пластика. Этот материал используют в атомной энергетике и в вертолётах.</p>
                                </div>

                            </div>

                            <!-- FEATURE TWO -->
                            <div class="block text-icon-right">
                                <div class="text">
                                    <h3 class="right"><i class="fa fa2 fa-shield"></i>Сапфировое стекло</h3>
                                    <p> для циферблата отличается блеском и твердостью, благодаря чему его практически невозможно поцарапать. Антибликовое покрытие позволит увидеть время даже в самый солнечный день.</p>
                                </div>

                            </div>

                            <!-- FEATURE THREE -->
                            <div class="block text-icon-right">
                                <div class="text">
                                    <h3 class="right"><i class="fa fa2 fa-clock-o"></i>Диаметр циферблата 44мм</h3>
                                    <p>Такой диаметр часов, подойдёт практически на любую руку и гармонично сочетается с Вашим образом.</p>
                                </div>

                            </div>

                        </div>

                        <!-- RIGHT FEATURES -->
                        <div class="col-md-3 col-md-push-6 wow fadeInLeft"
                             data-wow-duration="0.5s"
                             data-wow-offset="150"
                             data-wow-delay="0s">

                            <!-- FEATURE ONE -->
                            <div class="block text-icon-left">

                                <div class="text">
                                    <h3 class="right"><i class="fa fa2 fa-compress"></i>Толщина циферблата: 14мм</h3>
                                    <p>Они прекрасно подойдут к свободному стилю одежды, для тех кто ценит свободу и отсутствие условностей.</p>
                                </div>
                            </div>

                            <!-- FEATURE TWO -->
                            <div class="block text-icon-left">

                                <div class="text">
                                    <h3 class="right"><i class="fa fa2 fa-tint"></i>Водонепроницаемость: 30м</h3>
                                    <p>Будьте спокойны, гуляя под дождём и умываясь с этими часами. Герметичность гарантирована высокими стандартами производства и строгими тестовыми испытаниями.</p>
                                </div>
                            </div>

                            <!-- FEATURE THREE -->
                            <div class="block text-icon-left">

                                <div class="text">
                                    <h3 class="right"><i class="fa fa2 fa-circle-o-notch"></i>Ремешок: кожа, длина 240 мм.</h3>
                                    <p>Кнопка блокировки на ремешке для комфорта при использовании предохраняет от случайного расстегивания.</p>
                                </div>
                            </div>

                        </div>

                        <!-- PHONE IMAGE -->
                        <div class="col-md-6 col-md-pull-3 phones wow fadeInUp"
                             data-wow-duration="1s"
                             data-wow-offset="300"
                             data-wow-delay="0s">
                            <img src="img/features.jpg" alt="img">
                        </div>

                    </div>
                </div>
            </section>
            <!-- SECTION 5 (FEATURES) END -->

            <!-- SECTION 6 (FEATURES) BEGIN -->
            <section id="style" class="dicaprio">
                <div class="container">
                    <div class="row">

                        <!-- SECTION HEADER -->


                        <!-- LEFT FEATURES -->
                        <div class="col-md-4 howcool wow fadeInRight"
                             data-wow-duration="1s"
                             data-wow-offset="150"
                             data-wow-delay="0s">

                            <div class="intro wow fadeInDown"
                                 data-wow-duration="1s"
                                 data-wow-offset="200"
                                 data-wow-delay="0s">
                                <h2>Выбор настоящих мужчин</h2>
                                <p>Часы, завоевавшие миллионы сердец по всему миру, теперь доступны и в <span class="country_name2">России</span>!</p>
                            </div>
                            <!-- FEATURE ONE -->
                            <div class="block text-icon-right">
                                <div class="text">
                                    <h3 class="right"><i class="fa fa2 fa-question"></i>Вам важно производить впечатление на окружающих</h3>
                                    <p>и иметь репутацию человека, знающего модные тенденции и обладающего отличным вкусом?<br>
                                        Элитные часы – модная новинка этого года. Современный и брутальный дизайн не останется незамеченным в любой компании.</p>
                                </div>

                            </div>

                            <!-- FEATURE TWO -->
                            <div class="block text-icon-right">
                                <div class="text">
                                    <h3 class="right"><i class="fa fa2 fa-question"></i>Вы активный и целеустремленный человек</h3>
                                    <p>поклонник спорта и приключений? С этими часами можно заниматься абсолютно любым видом спорта - они изготовлены из сверхнадежной авиационной стали, выдерживают механические воздействия, работают при любой погоде.</p>
                                </div>

                            </div>

                            <!-- FEATURE THREE -->
                            <div class="block text-icon-right">
                                <div class="text">
                                    <h3 class="right"><i class="fa fa2 fa-question"></i>Bы хотите порадовать близкого человека функциональным и красивым подарком</h3>
                                    <p>Часы Tag Heuer Carrera Space X – отличный подарок для настоящего мужчины, который любит спорт и экстрим. Такой подарок точно будет оценен по достоинству.</p>
                                </div>

                            </div>

                        </div>

                        <!-- RIGHT FEATURES -->


                        <!-- PHONE IMAGE -->


                    </div>
                </div>
            </section>
            <!-- SECTION 6 (FEATURES) END -->

            <!-- SECTION 1 (SERVICES) BEGIN -->
            <section id="services" class="color-b">
                <div class="container">
                    <div class="row">

                        <!-- SECTION HEADER -->
                        <div class="intro wow fadeInDown"
                             data-wow-duration="1s"
                             data-wow-offset="200"
                             data-wow-delay="0s">
                            <h2>Доставка и оплата</h2>
                            <p>Получить Ваш Tag Heuer Carrera X просто как раз-два-три!</p>
                        </div>

                    </div>
                    <div id="process" class="row wow fadeInUp"
                         data-wow-duration="1s"
                         data-wow-offset="300"
                         data-wow-delay="0s">

                        <!-- SINGLE SERVICE -->
                        <div class="col-md-4" data-toggle="modal" data-target="#contact" style="cursor:pointer">

                            <!-- SERVICES ICON -->
                            <h2><i class="fa fa3 fa-check-square"></i></h2>

                            <!-- SERVICE HEADING -->
                            <h3>Сделайте заявку<br>на сайте</h3>

                            <!-- SERVICE DESCRIPTION -->
                            <p>Воспользуйтесь формой заказа и оставьте Ваш телефон и имя получателя</p>

                        </div>

                        <!-- SINGLE SERVICE -->
                        <div class="col-md-4">

                            <!-- SERVICES ICON -->
                            <h2><i class="fa fa3 fa-phone-square"></i></h2>

                            <!-- SERVICE HEADING -->
                            <h3>Подтвердите<br>заказ</h3>

                            <!-- SERVICE DESCRIPTION -->
                            <p>Наш менеджер свяжется с Вами и уточнит адрес доставки</p>

                        </div>

                        <div class="col-md-4">

                            <!-- SERVICE ICON -->
                            <h2><i class="fa fa3 fa-dropbox"></i></h2>

                            <!-- SERVICE HEADING -->
                            <h3>Получите<br>товар</h3>

                            <!-- SERVICE DESCRIPTION -->
                            <p>Курьер приносит часы на дом или Вы забираете посылку на почте</p>

                        </div>
                    </div>

                    <div id="rowspace" class="row wow fadeInUp"
                         data-wow-duration="1s"
                         data-wow-offset="300"
                         data-wow-delay="0s">

                        <!-- SINGLE SERVICE -->
                        <div class="col-md-6">

                            <!-- SERVICES ICON -->
                            <h2><i class="fa fa3 fa-shield"></i></h2>

                            <!-- SERVICE HEADING -->
                            <h3>Гарантия<br>безопасности</h3>

                            <!-- SERVICE DESCRIPTION -->
                            <p><ol>
                                <li>Мы не берём никакой предоплаты. Вы оплачиваете свой заказ только при получении в Вашем почтовом отделении.<br></li>
                                <li>Гарантия на товар<br>
                                    Перед отправкой мы проверяем каждый экземпляр часов на
                                    работоспособность и отсутствие внешних дефектов.<br>
                                    Мы вернём Вам деньги, если Вы обнаружите какой-либо изъян.</li>
                                <li>Мы соблюдаем Закон «О защите прав потребителей»<br>
                                    ?   Вы вправе отказаться от покупки в течение 14 дней с момента
                                    получения заказа, независимо от причины возврата.<br>
                                    ?   Вы можете вернуть товар с производственным браком в
                                    течение 6 месяцев с момента получения заказа.<br></li>

                                <li>Для возврата денег Вам достаточно:<br>
                                    ?   Обратиться в службу поддержки клиентов;<br>
                                    ?   Выслать нам купленный товар;<br>
                                    ?   Мы вернём Вам деньги за товар в полном объёме.</p></li>
                            </ol>

                        </div>

                        <!-- SINGLE SERVICE -->
                        <div class="col-md-6">

                            <!-- SERVICES ICON -->
                            <h2><i class="fa fa3 fa-truck"></i></h2>

                            <!-- SERVICE HEADING -->
                            <h3>Условия доставки<br><span class="country_name">Почты России</span></h3>

                            <!-- SERVICE DESCRIPTION -->
                            <p><ul>
                                <li>В момент отправки посылки в почтовом отделении ей присваивается индивидуальный трек-номер, по которому можно отследить местоположение Вашей посылки на сайте <span class="country_name">Почты России</span>. Этот номер мы вышлем Вам в день отправки в SMS или по e-mail;<br></li>
                                <li>Получить посылку Вы сможете в почтовом отделении, индекс которого был указан при оформлении заказа. Уведомление о доставке заказа придёт по вашему адресу. Если уведомление не пришло, Вы можете самостоятельно сходить в Ваше почтовое отделение, скорее всего Ваша посылка уже там. Также в момент прибытия посылки в Ваше почтовое отделение мы известим Вас об этом по SMS;<br></li>
                                <li>Для получения посылки Вам необходимо иметь при себе паспорт;<br></li>
                                <li>Срок хранения заказа в почтовом отделении 1 месяц с момента поступления. Просим Вас своевременно забирать пришедший заказ!<br></li>
                                <li>Доставка осуществляется только по <span class="country_name3">России</span>.</li>
                            </ul>

                        </div>

                    </div>
                </div>
            </section>
            <!-- SECTION 1 (SERVICES) END -->


            <!-- SECTION 9 (DOWNLOAD) BEGIN -->
            <section id="download">
                <div class="image-overlay">
                    <div class="container">

                        <div class="intro wow fadeInDown animated" data-wow-duration="1s" data-wow-offset="200" data-wow-delay="0s" style="visibility: visible; -webkit-animation-duration: 1s; -webkit-animation-delay: 0s;">
                            <h2>Наши клиенты довольны покупкой</h2>
                            <p>Присоединитесь к числу счастливых обладателей часов класса элит!</p>
                        </div>

                        <div id="rowspace" class="row wow fadeInUp"
                             data-wow-duration="1s"
                             data-wow-offset="300"
                             data-wow-delay="0s">

                            <!-- SINGLE SERVICE -->
                            <div class="col-md-3">

                                <!-- SERVICES ICON -->
                                <h2><img src="img/photo11.jpg"></h2>

                                <!-- SERVICE HEADING -->
                                <h3>Кирилл<br>Фадеев</h3>
                                <h5></h5>

                                <!-- SERVICE DESCRIPTION -->
                                <p>Часы вчера доставили. Получил именно то, чего ожидал: качественно, стильно, надежно. Смотрятся намного дороже, чем на самом деле стоят, чем был приятно удивлен. На подарок друзьям тоже буду заказывать TAG HEUER. Благодарен!</p>

                            </div>

                            <!-- SINGLE SERVICE -->
                            <!-- SINGLE SERVICE -->
                            <div class="col-md-3">

                                <!-- SERVICES ICON -->
                                <h2><img src="img/photo21.jpg"></h2>

                                <!-- SERVICE HEADING -->
                                <h3>Наталья<br>&nbsp;</h3>
                                <h5></h5>

                                <!-- SERVICE DESCRIPTION -->
                                <p>Взяла своему на полгода отношений. Третий день любуется на себя в зеркало, собираясь на работу. Нет, ну скажите мне после этого, что это мы, девушки, помешаны на дорогих аксессуарах...</p>

                            </div>

                            <!-- SINGLE SERVICE -->
                            <!-- SINGLE SERVICE -->
                            <div class="col-md-3">

                                <!-- SERVICES ICON -->
                                <h2><img src="img/photo31.jpg"></h2>

                                <!-- SERVICE HEADING -->
                                <h3>Александр<br>Масликов</h3>
                                <h5></h5>

                                <!-- SERVICE DESCRIPTION -->
                                <p>Работаю менеджером по обслуживанию юридических лиц в банке. Часы отлично дополняют мой деловой имидж и подчеркивают статус. Действительно качественная сборка! Первый раз купил что-то полезное, нажав рекламу :) </p>

                            </div>

                            <!-- SINGLE SERVICE -->
                            <!-- SINGLE SERVICE -->
                            <div class="col-md-3">

                                <!-- SERVICES ICON -->
                                <h2 class="placeholder"><i class="fa fa3 fa-user-plus"></i></h2>

                                <!-- SERVICE HEADING -->
                                <h3>Вы<br>&nbsp;</h3>
                                <h5>и Ваши впечатления</h5>

                                <!-- SERVICE DESCRIPTION -->
                                <p><i>Мы будем очень признательны, если Вы отправите Ваш отзыв, используя форму обратной связи и добавив ссылку на фото. Нам важно Ваше мнение и мы хотим поделиться им с посетителями сайта.</i></p>

                            </div>

                            <!-- SINGLE SERVICE -->
                        </div>






                        <div class="intro wow fadeInDown"
                             data-wow-duration="1s"
                             data-wow-offset="200"
                             data-wow-delay="0s">

                            <!-- TITTLE -->
                            <h2>Закажите Tag Heuer Carrera X<br>прямо сейчас</h2>

                            <!-- BUTTONS -->
                            <a class="btn btn-theme pulse-hover" href="#" modal="zakaz"><i class="fa fa4 fa-shopping-cart"></i>Оформить заказ</a>

                        </div>

                    </div>
                </div>
            </section>
            <!-- SECTION 9 (DOWNLOAD) END -->


            <!-- FOOTER BEGIN -->
            <footer>
                <div class="container">

                    <!-- LOGO -->
                    <div class="logo localScroll-slow pulse-hover">
                        <a href="#home">
                            <img src="img/thlogo_cr.png" alt="">
                        </a>
						
                    </div>
<img src="img/rekvizity-2-3.png"><br />
		<a href="#" modal="polit" >Политика конфиденциальности</a>
                    <!-- SOCIAL ICONS -->

                    <div class="copyright footer_text"></div>







                </div>
            </footer>
            <!-- FOOTER END -->

        </div>
        <!-- GLOBAL WRAP END -->


        <!-- MODAL CONTACT BEGIN -->
        <div class="modal fade in" id="contact" tabindex="-1" role="dialog" aria-hidden="false">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- TITLE -->
                    <h3 class="modal-title">Заказ товара</h3>

                    <!-- FORM -->
                  

                </div>
            </div>
        </div>
        <!-- MODAL CONTACT END -->


        
        <script src="js/bootstrap.min.js"></script>
        <!-- Main JS files END -->


        <!-- SCRIPTS BEGIN -->
        <script src="js/jquery.countdown.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/jquery.nav.js"></script>
        <script src="js/jquery.ajaxchimp.js"></script>
        <script src="js/jquery.scrollto.min.js"></script>
        <script src="js/jquery.localscroll.min.js"></script>
        <script src="js/responsive-accordion.min.js"></script>
        <script src="js/nivo-lightbox.min.js"></script>
        <!--<script src="js/owl.carousel.min.js"></script>-->
        <script src="js/tweetie.js"></script>
        <script src="js/main.js"></script>
        <!--[if lt IE 9]>
                <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
        <!-- SCRIPTS END -->
		
		<style>
.modal-block .title {
background: #01c853;
text-shadow: 1px 1px 0 #b2d9c2;
border-bottom: 1px solid #b2d9c2;
</style>
   <div id="zakaz" class="modal">
    <div class="modal-block">
        <div class="icon-close"></div>
        <div class="title">Форма заказа</div>
        <div class="content">
            <div class="padding">
                   <form name="zakazform1" action="./_success_/" method="post" onSubmit="proverka_form1(); return(false);">
			<center>
			<input type="text" name="clientname" placeholder="Имя">
			<input type="text" name="phone" placeholder="Телефон">
			  <input type="submit" value="ЗАКАЗАТЬ"></center>


<input type="hidden" name="s1" class="price_field_s1" value="1990" />
<input type="hidden" name="s2" class="price_field_s2" value="400" />
<input type="hidden" name="s3" class="price_field_s3" value="2390" />
<input type="hidden" name="send" value="ok">
		</form>
            </div>
        </div>
    </div>
</div> 
<div id="polit" class="modal">
    <div class="modal-block">
        <div class="icon-close"></div>
        <div class="title">ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ</div>
        <div class="content">
            <div class="padding">
                <p>Наш интернет-магазин уважительно относится к правам клиента. Соблюдается строгая конфиденциальность
                    при оформлении заказа. Сведения надёжно сохраняются и защищены от передачи. </p>

                <p>Согласием на обработку данных клиента исключительно с целью оказания услуг является размещение заказа
                    на сайте. </p>

                <p>К персональным данным относится личная информация о клиенте: домашний адрес; имя, фамилия, отчество;
                    сведения о рождении; имущественное, семейное положение; личные контакты (телефон, электронная почта)
                    и прочие сведения, которые

                    перечислены в Законе РФ № 152-ФЗ «О персональных данных» от 27 июля 2006 г. </p>

                <p>Клиент вправе отказаться от обработки персональных данных. Нами в данном случае гарантируется
                    удаление с сайта всех персональных данных в трёхдневный срок в рабочее время. Подобный отказ клиент
                    может оформить простым электронным

                    письмом на адрес, указанный на странице нашего сайта. </p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"><!--
    //-->
</script>

 </body>
</html>
