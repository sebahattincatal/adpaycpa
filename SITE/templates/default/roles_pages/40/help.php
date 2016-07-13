
<aside class="widget">
	<div class="widget-header">
		<div class="row">
			<div class="widget-title col-sm-6 col-xs-12">
				<h3><?php echo $loc['help.php']['t26']; ?></h3>
				<span>ADPAY SUPPORT</span>
			</div><!-- widget-title -->
		</div><!-- row -->
	</div><!-- widget-header -->

	<div class="widget-content">
		<div class="row">
			<div class="support-content">
				<ul>
					<li><?php echo $loc['help.php']['t03']; ?>&nbsp;"<a href="./offers.php"><?php echo $loc['help.php']['t04']; ?></a>"&nbsp;<?php echo $loc['help.php']['t27']; ?></li>
					<li><?php echo $loc['help.php']['t03']; ?>&nbsp;"<a href="./landings.php"><?php echo $loc['help.php']['t28']; ?></a>"&nbsp;<?php echo $loc['help.php']['t29']; ?></li>
					<li><?php echo $loc['help.php']['t30']; ?></li>
					<li><?php echo $loc['help.php']['t31']; ?>&nbsp;"<a href="./zakaz.php"><?php echo $loc['help.php']['t32']; ?></a>"&nbsp;<?php echo $loc['help.php']['t33']; ?>&nbsp;"<a href="./stats.php"><?php echo $loc['help.php']['t34']; ?></a>"&nbsp;<?php echo $loc['help.php']['t35']; ?></li>
				</ul>
				<h4><?php echo $loc['help.php']['t36']; ?></h4>
				<p><?php echo $loc['help.php']['t37']; ?></p>
				<p><?php echo $loc['help.php']['t38']; ?></p>
				<h4><?php echo $loc['help.php']['t20']; ?></h4>
				<p><?php if (isset($settings_icq) && $settings_icq!='') {echo $loc['help.php']['t21'].'&nbsp;'.$settings_icq.'<br />';} ?></p>
				<p><?php if (isset($settings_skype) && $settings_skype!='') {echo $loc['help.php']['t22'].'&nbsp;<a href="skype:'.$settings_skype.'?add">'.$settings_skype.'</a><br />';} ?></p>
				<p><?php if (isset($settings_email) && $settings_email!='') {echo $loc['help.php']['t23'].'&nbsp;<a href="mailto:'.$settings_email.'">'.$settings_email.'</a><br />';} ?></p>
				<p><?php if (isset($settings_phone) && $settings_phone!='') {echo $loc['help.php']['t24'].'&nbsp;'.$settings_phone.'<br />';} ?></p>
				<p style="color:red;"><?php echo $loc['help.php']['t25']; ?></p>
			</div><!-- support-content -->
		</div><!-- row -->
	</div><!-- widget-content -->
</aside><!-- widget -->