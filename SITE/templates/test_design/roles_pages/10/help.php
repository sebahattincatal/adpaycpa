
<h1><?php echo $loc['help.php']['t01']; ?></h1>

<p>
	<b><?php echo $loc['help.php']['t02']; ?></b>
</p>
<p>
	<b>1.</b>&nbsp;<?php echo $loc['help.php']['t03']; ?>&nbsp;&quot;<a href=./offers.php><?php echo $loc['help.php']['t04']; ?></a>&quot;&nbsp;<?php echo $loc['help.php']['t05']; ?>
</p>
<p>
	<b>2.</b>&nbsp;<?php echo $loc['help.php']['t06']; ?>&nbsp;&quot;<?php echo $loc['help.php']['t07']; ?>&quot;&nbsp;<?php echo $loc['help.php']['t08']; ?>	
</p>
<p>
	<b>3.</b>&nbsp;<?php echo $loc['help.php']['t09']; ?>&nbsp;&quot;<a href=./stats.php><?php echo $loc['help.php']['t10']; ?></a>&quot;.&nbsp;<?php echo $loc['help.php']['t11']; ?>	
</p>
<p>
	<b>4.</b>&nbsp;<?php echo $loc['help.php']['t12']; ?>&nbsp;&quot;<a href=./finances.php><?php echo $loc['help.php']['t13']; ?></a>&quot;.	
</p>

<p>
	&nbsp;
</p>

<p>
	<b><?php echo $loc['help.php']['t14']; ?></b>
</p>

<p>
	<?php echo $loc['help.php']['t15']; ?><br />
	<?php echo $loc['help.php']['t16']; ?>&nbsp;<b>http://<?php echo $loc['help.php']['t17']; ?>/?p=aS8wuQj&<font color="green">subid1</font>=<?php echo $loc['help.php']['t18']; ?>&<font color="green">subid2</font>=<?php echo $loc['help.php']['t18']; ?>&<font color="green">subid3</font>=<?php echo $loc['help.php']['t18']; ?></b>
</p>

<p>
	<?php echo $loc['help.php']['t19']; ?>
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