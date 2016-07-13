
<aside class="widget">
	<div class="widget-header">
		<div class="row">
			<div class="widget-title col-sm-6 col-xs-12">
				<h3>Settings</h3>
				<span>ADPAY LATEST STATICS</span>
			</div><!-- widget-title -->
		</div><!-- row -->
	</div><!-- widget-header -->

	<div class="widget-content settings-form">
		<div class="row">
			<form class="report" method="post" action="./settings.php?<?php echo @$_SERVER['QUERY_STRING']?>">
				<div class="col-sm-6 col-xs-12 left">

					<div class="setting-form-item">
						<div class="small-title"><h3><?php echo $loc['settings.php']['t03']; ?></h3></div>
						<div class="row">
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t04']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" name="settings_zagolovok" value="<?php echo htmlentities($settings_zagolovok); ?>" maxlength="80" style="width: 200px;" class="form-control">
							</div>
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t05']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_podzagolovok" value="<?php echo htmlentities($settings_podzagolovok); ?>" maxlength="80" style="width: 200px;">
							</div>
						</div><!-- row -->
					</div><!-- setting-form-item -->

					<div class="setting-form-item">
						<div class="small-title"><h3><?php echo $loc['settings.php']['t06']; ?></h3></div>
						<div class="row">
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t07']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<select name="settings_registration_wm" class="form-control">
									<option value="0"<?php if ($settings_registration_wm=='0') {?>selected="selected"<?} ?>><?php echo $loc['settings.php']['t09']; ?></option>
									<option value="1"<?php if ($settings_registration_wm=='1') {?>selected="selected"<?} ?>><?php echo $loc['settings.php']['t10']; ?></option>			
								</select>
							</div>
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t08']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<select name="settings_registration_rk" class="form-control">
									<option value="0"<?php if ($settings_registration_rk=='0') {?>selected="selected"<?} ?>><?php echo $loc['settings.php']['t09']; ?></option>
									<option value="1"<?php if ($settings_registration_rk=='1') {?>selected="selected"<?} ?>><?php echo $loc['settings.php']['t10']; ?></option>			
								</select>
							</div>
						</div><!-- row -->
					</div><!-- setting-form-item -->

					<div class="setting-form-item">
						<div class="small-title"><h3><?php echo $loc['settings.php']['t11']; ?></h3></div>
						<div class="row">
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t12']; ?></label>
							<div class="col-sm-7 col-xs-12 pos-relative">
								<input type="text" class="form-control" name="settings_balance_cpa" value="<?php echo htmlentities($settings_balance_cpa); ?>" maxlength="80" style="width: 200px;">&nbsp;<?php echo $loc['settings.php']['t15']; ?>
								<div class="pos-text">rub</div>
							</div>
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t13']; ?></label>
							<div class="col-sm-7 col-xs-12 pos-relative">
								<input type="text" class="form-control" name="settings_min_vyvod" value="<?php echo htmlentities($settings_min_vyvod); ?>" maxlength="80" style="width: 200px;">&nbsp;<?php echo $loc['settings.php']['t15']; ?>
								<div class="pos-text">rub</div>
							</div>
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t14']; ?></label>
							<div class="col-sm-7 col-xs-12 pos-relative">
								<input type="text" class="form-control" name="settings_refprocent" value="<?php echo htmlentities($settings_refprocent); ?>" maxlength="80" style="width: 200px;">&nbsp;<?php echo $loc['settings.php']['t16']; ?><br /><?php echo $loc['settings.php']['t17']; ?>
								<div class="pos-text">%</div>
							</div>
						</div><!-- row -->
					</div><!-- setting-form-item -->

					<div class="setting-form-item">
						<div class="small-title"><h3><?php echo $loc['settings.php']['t18']; ?></h3></div>
						<div class="row">
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t19']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<select name="settings_sms_ok" class="form-control">
									<option value="0"<?php if ($settings_sms_ok=='0') {?>selected="selected"<?} ?>><?php echo $loc['settings.php']['t20']; ?></option>
									<option value="1"<?php if ($settings_sms_ok=='1') {?>selected="selected"<?} ?>><?php echo $loc['settings.php']['t21']; ?></option>			
								</select>
							</div>

							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t22']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_smslogin" value="<?php echo htmlentities($settings_smslogin); ?>" maxlength="80" style="width: 200px;">
							</div>

							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t23']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_smspassword" value="<?php echo htmlentities($settings_smspassword); ?>" maxlength="80" style="width: 200px;">
							</div>

							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t24']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_smsapikey" value="<?php echo htmlentities($settings_smsapikey); ?>" maxlength="80" style="width: 200px;">
							</div>

							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t25']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="button" name="test_sms" id="test_sms" value="<?php echo $loc['settings.php']['t26']; ?>">
								<script>
									$('#test_sms').click
										(
										function()
											{
											if (confirm('<?php echo $loc['settings.php']['t27']; ?>'))
												{														
												document.getElementById('test_sms').disabled='disabled';
												document.getElementById('test_sms').value='<?php echo $loc['settings.php']['t28']; ?>';
												$.ajax
													(
														{
														type: 'POST',
														url: './sendsms.php', 
														data: 'testsms=ok&apikey=<?php echo $settings_smsapikey; ?>',
														cache: false,  
														timeout: 2000,
														success: function(html)
															{  
															document.getElementById('test_sms').value='<?php echo $loc['settings.php']['t29']; ?>';
															document.getElementById('test_sms').disabled='disabled';
															},
														error: function(html) 
															{
															document.getElementById('test_sms').value='<?php echo $loc['settings.php']['t30']; ?>';
															document.getElementById('test_sms').disabled='disabled';
															}	
														}
													);  
												}
											}
										);
								</script>	
							</div>

							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t31']; ?></label>
							<div class="col-sm-7 col-xs-12 pos-relative">
								<input type="text" class="form-control" name="settings_sms_price" value="<?php echo htmlentities($settings_sms_price); ?>" maxlength="80" style="width: 200px;">&nbsp;<?php echo $loc['settings.php']['t15']; ?>
								<div class="pos-text">Rub</div>
							</div>

						</div><!-- row -->
					</div><!-- setting-form-item -->

					<div class="setting-form-item">
						<div class="small-title"><h3><?php echo $loc['settings.php']['t32']; ?></h3></div>
						<div class="row">
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t33']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<select name="russianpost_ok" class="form-control">
									<option value="0"<?php if ($settings_russianpost_ok=='0') {?>selected="selected"<?} ?>><?php echo $loc['settings.php']['t34']; ?></option>
									<option value="1"<?php if ($settings_russianpost_ok=='1') {?>selected="selected"<?} ?>><?php echo $loc['settings.php']['t35']; ?></option>			
								</select>
							</div>
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t36']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="russianpost_login" value="<?php echo htmlentities($settings_russianpost_login); ?>" maxlength="50" style="width: 200px;">
							</div>
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t37']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="russianpost_password" value="<?php echo htmlentities($settings_russianpost_password); ?>" maxlength="50" style="width: 200px;">
							</div>
						</div><!-- row -->
					</div><!-- setting-form-item -->

				</div>
				<div class="col-sm-6 col-xs-12 right">

					<div class="setting-form-item">
						<div class="small-title"><h3><?php echo $loc['settings.php']['t38']; ?></h3></div>
						<div class="row">
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t39']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_email" value="<?php echo htmlentities($settings_email); ?>" maxlength="80" style="width: 200px;">
							</div>
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t40']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_icq" value="<?php echo htmlentities($settings_icq); ?>" maxlength="80" style="width: 200px;">
							</div>
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t41']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_skype" value="<?php echo htmlentities($settings_skype); ?>" maxlength="80" style="width: 200px;">
							</div>
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t42']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_phone" value="<?php echo htmlentities($settings_phone); ?>" maxlength="80" style="width: 200px;">
							</div>
						</div><!-- row -->
					</div><!-- setting-form-item -->
					
					<div class="setting-form-item">
						<div class="small-title"><h3><?php echo $loc['settings.php']['t43']; ?></h3></div>
						<div class="row">
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t44']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<select name="settings_paysystem_pay" class="form-control">
									<option value="1"<?php if ($settings_paysystem_pay=='1') {?>selected="selected"<?} ?>><?php echo $loc['settings.php']['t45']; ?></option>
								</select>
							</div>
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t46']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<select name="settings_paysystem_landings" class="form-control">
									<option value="1"<?php if ($settings_paysystem_landings=='1') {?>selected="selected"<?} ?>><?php echo $loc['settings.php']['t47']; ?></option>
								</select>
							</div>
						</div><!-- row -->
					</div><!-- setting-form-item -->

					<div class="setting-form-item">
						<div class="small-title"><h3><?php echo $loc['settings.php']['t48']; ?></h3></div>
						<div class="row">
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t49']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_webmoney_wmr" value="<?php echo htmlentities($settings_webmoney_wmr); ?>" maxlength="80" style="width: 200px;">
							</div>
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t50']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_webmoney_key" value="<?php echo htmlentities($settings_webmoney_key); ?>" maxlength="80" style="width: 200px;">
							</div>
						</div><!-- row -->
					</div><!-- setting-form-item -->

					<div class="setting-form-item">
						<div class="small-title"><h3><?php echo $loc['settings.php']['t51']; ?></h3></div>
						<div class="row">
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t52']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_yk_shopid" value="<?php echo htmlentities($settings_yk_shopid); ?>" maxlength="48" style="width: 200px;">
							</div>
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t53']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_yk_shoppassword" value="<?php echo htmlentities($settings_yk_shoppassword); ?>" maxlength="48" style="width: 200px;">
							</div>
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t54']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_yk_scid" value="<?php echo htmlentities($settings_yk_scid); ?>" maxlength="48" style="width: 200px;">
							</div>
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t55']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_yk_obrabotchik" value="<?php echo htmlentities($settings_yk_obrabotchik); ?>" maxlength="48" style="width: 200px;">
							</div>
						</div><!-- row -->
					</div><!-- setting-form-item -->

					<div class="setting-form-item">
						<div class="small-title"><h3><?php echo $loc['settings.php']['t56']; ?></h3></div>
						<div class="row">
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t57']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_account_max_offers" value="<?php echo htmlentities($settings_account_max_offers); ?>" maxlength="2" style="width: 200px;">
							</div>
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t58']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_account_max_landings" value="<?php echo htmlentities($settings_account_max_landings); ?>" maxlength="2" style="width: 200px;">
							</div>
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t59']; ?></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" name="settings_account_max_subacc" value="<?php echo htmlentities($settings_account_max_subacc); ?>" maxlength="2" style="width: 200px;">
							</div>
						</div><!-- row -->
					</div><!-- setting-form-item -->

					<div class="setting-form-item">
						<div class="small-title"><h3><?php echo $loc['settings.php']['t60']; ?></h3></div>
						<div class="row">
							<label class="col-sm-5 col-xs-12"><?php echo $loc['settings.php']['t61']; ?>  (<a href="#otladka" onclick="document.getElementById('settings_ip_otladka').value='<?php echo $_SERVER['REMOTE_ADDR']; ?>'; document.getElementById('settings_ip_otladka').style.color='green';" ><?php echo $loc['settings.php']['t62']; ?></a>):</label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" class="form-control" id="settings_ip_otladka" name="settings_ip_otladka" value="<?php echo htmlentities($settings_ip_otladka); ?>" maxlength="80" style="width: 200px;">
							</div>
						</div><!-- row -->
					</div><!-- setting-form-item -->

				</div>

				<div class="col-sm-12 col-xs-12 submit-button">
					<button type="submit" name="submit_settings" value="<?php echo $loc['button']['t01']; ?>"  onclick="if (!confirm('<?php echo $loc['settings.php']['t63']; ?>'))return false;" class="btn btn-default">Save Settings</button>
				</div>

			</form>
		</div><!-- row -->
	</div><!-- widget-content -->
</aside><!-- widget -->