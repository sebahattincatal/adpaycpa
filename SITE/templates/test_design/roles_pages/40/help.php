
<h1><?php echo $loc['help.php']['t01']; ?></h1>

<p>
	<b><?php echo $loc['help.php']['t26']; ?></b>
</p>
<p>
	<b>1.</b>&nbsp;<?php echo $loc['help.php']['t03']; ?>&nbsp;"<a href="./offers.php"><?php echo $loc['help.php']['t04']; ?></a>"&nbsp;<?php echo $loc['help.php']['t27']; ?> 	
</p>
<p>
	<b>2.</b>&nbsp;<?php echo $loc['help.php']['t03']; ?>&nbsp;"<a href="./landings.php"><?php echo $loc['help.php']['t28']; ?></a>"&nbsp;<?php echo $loc['help.php']['t29']; ?>
</p>
<p>
	<b>3.</b>&nbsp;<?php echo $loc['help.php']['t30']; ?>
</p>
<p>
	<b>4.</b>&nbsp;<?php echo $loc['help.php']['t31']; ?>&nbsp;"<a href="./zakaz.php"><?php echo $loc['help.php']['t32']; ?></a>"&nbsp;<?php echo $loc['help.php']['t33']; ?>&nbsp;"<a href="./stats.php"><?php echo $loc['help.php']['t34']; ?></a>"&nbsp;<?php echo $loc['help.php']['t35']; ?>
</p>

<p>
	&nbsp;
</p>

<p>
	<b><?php echo $loc['help.php']['t36']; ?></b>
</p>

<p>
	<?php echo $loc['help.php']['t37']; ?>
</p>

<p>
	<?php echo $loc['help.php']['t38']; ?>
</p>

<p>
	&nbsp;
</p>

<p>
	<b><?php echo $loc['help.php']['t20']; ?></b>
</p>
	<?php if (isset($settings_icq) && $settings_icq!='') {echo $loc['help.php']['t21'].'&nbsp;'.$settings_icq.'<br />';} ?>
	<?php if (isset($settings_skype) && $settings_skype!='') {echo $loc['help.php']['t22'].'&nbsp;<a href="skype:'.$settings_skype.'?add">'.$settings_skype.'</a><br />';} ?>
	<?php if (isset($settings_email) && $settings_email!='') {echo $loc['help.php']['t23'].'&nbsp;<a href="mailto:'.$settings_email.'">'.$settings_email.'</a><br />';} ?>
	<?php if (isset($settings_phone) && $settings_phone!='') {echo $loc['help.php']['t24'].'&nbsp;'.$settings_phone.'<br />';} ?>
</p>

<p>
	&nbsp;
</p>

<p style="color: red;">
	<?php echo $loc['help.php']['t25']; ?>
</p>

<p>
	&nbsp;
</p>