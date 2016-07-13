<?php
if (isset($_GET['ob']) && ($_GET['ob']!=''))
	{
	$ob=htmlentities($_GET['ob']);
	// Получаем данные о свойствах текущего заказа
	// Get the data on the properties of the current order
	$sql_zakaz = "SELECT * FROM zakaz WHERE `id`='$ob'";
	$result_zakaz = $mysqli->query($sql_zakaz);
	$res_zakaz=mysqli_fetch_array($result_zakaz);

	// Получаем данные из профиля пользователя
	// Get the data from the user profile
	$sql_profile = "SELECT * FROM users WHERE id = $user_id";
	$result_profile = $mysqli->query($sql_profile);
	$res_profile=mysqli_fetch_array($result_profile);
	}
?>

<div class="content">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.mi n.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 
<script language="JavaScript" type="text/JavaScript"> 
<!-- 
function w(theURL,winName,features) { //v2.0 
window.open(theURL,winName,features); 
} 
//--> 
</script>

<p>
	<h1><?php echo $loc['nalojka.php']['t01']; ?></h1> 
</p>
<p>
    <div class="container-fluid">
    <form action="" method="POST" class="form-horizontal" target="w('window')">
        <?php require "templates/form_fieldset_reciever.php"; ?>
        <?php require "templates/form_fieldset_sender.php"; ?>
        <?php require "templates/form_fieldset_org.php"; ?>
		<?php require "templates/form_fieldset_sum.php"; ?>
		<input type="checkbox" name="chb_pay_deliv" checked="checked" style="display: none;">

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" name="submit_nalojka" class="others_button_dalee"></button>
            </div>
        </div>    
    </form>
    </div>
</p>    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<br />
</div>