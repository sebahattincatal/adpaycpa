
			<aside class="widget">
				<div class="widget-header">
					<div class="row">
						<div class="widget-title col-sm-6 col-xs-12">
							<h3><?php echo $loc['help.php']['t01']; ?></h3>
							<span><?php echo $loc['help.php']['t02']; ?></span>
						</div><!-- widget-title -->
					</div><!-- row -->
				</div><!-- widget-header -->

				<div class="widget-content">
					<div class="row">
						<div class="support-content">
							<ul>
								<li><b>1.</b>&nbsp;<?php echo $loc['help.php']['t03']; ?>&nbsp;&quot;<a href=./offers.php><?php echo $loc['help.php']['t04']; ?></a>&quot;&nbsp;<?php echo $loc['help.php']['t05']; ?>
								</li>
								<li><b>2.</b>&nbsp;<?php echo $loc['help.php']['t06']; ?>&nbsp;&quot;<?php echo $loc['help.php']['t07']; ?>&quot;&nbsp;<?php echo $loc['help.php']['t08']; ?>
								</li>
								<li><b>3.</b>&nbsp;<?php echo $loc['help.php']['t09']; ?>&nbsp;&quot;<a href=./stats.php><?php echo $loc['help.php']['t10']; ?></a>&quot;.&nbsp;<?php echo $loc['help.php']['t11']; ?>
								</li>
								<li><b>4.</b>&nbsp;<?php echo $loc['help.php']['t12']; ?>&nbsp;&quot;<a href=./finances.php><?php echo $loc['help.php']['t13']; ?></a>&quot;.
								</li>
							</ul>
							<h4><?php echo $loc['help.php']['t14']; ?></h4>
							<p><?php echo $loc['help.php']['t15']; ?><br />
							</p>
							<p><strong><?php echo $loc['help.php']['t16']; ?></strong>: 
									http://<?php echo $loc['help.php']['t17']; ?>/?p=aS8wuQj&<font color="green">subid1</font>=<?php echo $loc['help.php']['t18']; ?>&<font color="green">subid2</font>=<?php echo $loc['help.php']['t18']; ?>&<font color="green">subid3</font>=<?php echo $loc['help.php']['t18']; ?>
							</p>
							<p><?php echo $loc['help.php']['t19']; ?></p>
							<h4><?php echo $loc['help.php']['t20']; ?></h4>
							<p><?php if (isset($settings_icq) && $settings_icq!='') {echo $loc['help.php']['t21'].'&nbsp;'.$settings_icq.'<br />';} ?>
							</p>
							<p><?php if (isset($settings_skype) && $settings_skype!='') {echo $loc['help.php']['t22'].'&nbsp;<a href="skype:'.$settings_skype.'?add">'.$settings_skype.'</a><br />';} ?>
							</p>
							<p><?php if (isset($settings_email) && $settings_email!='') {echo $loc['help.php']['t23'].'&nbsp;<a href="mailto:'.$settings_email.'">'.$settings_email.'</a><br />';} ?>
							</p>
							<p style="color:red;"><?php if (isset($settings_phone) && $settings_phone!='') {echo $loc['help.php']['t24'].'&nbsp;'.$settings_phone.'<br />';} ?>
							</p>
							<p style="color: red;">
								<?php echo $loc['help.php']['t25']; ?>
							</p>
						</div><!-- support-content -->
					</div><!-- row -->
				</div><!-- widget-content -->
			</aside><!-- widget -->
