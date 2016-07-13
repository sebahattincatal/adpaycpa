
<p style="font-weight: bold; color: green;">
	<?php
	// Проверяем, требуется ли выводить сервисные сообщения
	// Check if the display service messages required
	if (isset($errortext_profile) && $errortext_profile!='') 
		{echo $errortext_profile;}
	elseif (isset($_GET['success'])) 
		{echo $loc['profile.php']['t02'];}
	elseif (isset($_GET['successpasswd'])) 
		{echo $loc['profile.php']['t03'];}
	?>
</p>

<aside class="widget">
	<div class="widget-header">
		<div class="row">
			<div class="widget-title col-sm-6 col-xs-12">
				<h3>Registration information</h3>
				<span>ADPAY LATEST STATICS</span>
			</div><!-- widget-title -->
		</div><!-- row -->
	</div><!-- widget-header -->


<?php
// Если аккаунт не был активирован, то выводим только форму активации. Если был активирован, то выводим поля профиля.
// If the account has not been activated, the output is only activated form. If activated, the output profile fields.
if ($user_active=='0') 
	{
	?>

	<?php
	include ('./templates/'.$template.'/checkform/jquery.proverka.profile-activation.form.php');
	?>

	<p>
		<form name="profile_activation_form" class="profile_rekvizit_form" method="post">
			<p style="color: red;"><b><?php echo $loc['profile.php']['t04']; ?></b><br /><?php echo $loc['profile.php']['t05']; ?></p>			
			<table style="width: 700px;">
				<tr>
					<td style="width: 180px;"><?php echo $loc['profile.php']['t06']; ?></td><td><input name="activation_code" type="text" placeholder="<?php echo $loc['profile.php']['t07']; ?>" class="profile_input_text" value="" maxlength="100" /></td>
				</tr>
			</table>
			<p>
				<input name="profile_activation_submit" type="submit" class="others_button_dalee" value="<?php echo $loc['button']['t03']; ?>">
			</p>
		</form>
	</p>
	<?php
	}
else
	{
	?>


	<div class="widget-content">
		<div class="row">
			<div class="profile-content col-sm-6 col-xs-12">
				<form name="profile_rekvizit_form" class="profile_rekvizit_form" method="post">
					<div class="row">
						<div class="form-item col-sm-12 col-xs-12">
							<label><?php echo $loc['profile.php']['t09']; ?></label>
							<input type="email" class="form-control" placeholder="<?php echo $loc['profile.php']['t10']; ?>" disabled="disabled" value="<?php echo $user_email; ?>" disabled name="profile_email" maxlength="50">
						</div><!-- form-item -->
						<div class="form-item col-sm-6 col-xs-12">
							<label><?php echo $loc['profile.php']['t11']; ?></label>
							<input name="profile_wmr" type="text" placeholder="<?php echo $loc['profile.php']['t12']; ?>" class="form-control" placeholder="Please enter VMR Wallet" value="<?php echo $user_wmr; ?>" maxlength="50">
						</div><!-- form-item -->
						<div class="form-item col-sm-6 col-xs-12">
							<label><?php echo $loc['profile.php']['t13']; ?></label>
							<input name="profile_name" type="text" placeholder="<?php echo $loc['profile.php']['t14']; ?>" class="form-control" placeholder="Please enter name" value="<?php echo $user_name; ?>" maxlength="50">
						</div><!-- form-item -->
						<div class="form-item col-sm-6 col-xs-12">
							<label><?php echo $loc['profile.php']['t15']; ?></label>
							<input name="profile_phone" type="text" placeholder="<?php echo $loc['profile.php']['t16']; ?>" class="form-control" placeholder="Please enter phone number" value="<?php echo $user_phone; ?>" maxlength="50">
						</div><!-- form-item -->
						<div class="form-item col-sm-6 col-xs-12">
							<label><?php echo $loc['profile.php']['t17']; ?></label>
							<input name="profile_skype" type="text" placeholder="<?php echo $loc['profile.php']['t18']; ?>" class="form-control" placeholder="Please enter skype name" value="<?php echo $user_skype; ?>" maxlength="50">
						</div><!-- form-item -->
						<div class="form-item col-sm-12 col-xs-12">
							<label><?php echo $loc['profile.php']['t19']; ?></label>
							<input name="profile_icq" type="text" placeholder="<?php echo $loc['profile.php']['t20']; ?>" class="form-control" placeholder="Please enter ICQ number" value="<?php echo $user_icq; ?>" maxlength="50">
						</div><!-- form-item -->

						<?php 
							if ($user_tip=='10')
							{
							?>
							<div class="form-item col-sm-12 col-xs-12">
								<span class="access-off">Access offers:</span><span><?php echo $loc['profile.php']['t21']; ?></span>
								<div>
									<?php
									$sql_uroven = "SELECT tip_account, uroven_dostupa, opisanie FROM uroven_tpl WHERE `uroven_dostupa`='$user_uroven_dostupa' AND `tip_account`='10'";
									$result_uroven = $mysqli->query($sql_uroven);
									$res_uroven=mysqli_fetch_array($result_uroven);
									echo htmlentities($res_uroven['opisanie']);
									?>
								</div>
							</div>		
							<?php
							}
						?>

						<div class="form-item col-sm-12 col-xs-12">
							<input name="profile_rekvizit_submit" type="submit" class="others_button_sohranit" value="<?php echo $loc['button']['t01']; ?>" onclick="if (!confirm('<?php echo $loc['profile.php']['t22']; ?>'))return false;">
						</div><!-- form-item -->
					</div><!-- row -->
				</form>
			</div><!-- profile-content -->	

			<?php
			include ('./templates/'.$template.'/checkform/jquery.proverka.profile-password.form.php');
			?>

			<div class="password-content col-sm-6 col-xs-12">
						<h3><?php echo $loc['profile.php']['t23']; ?></h3>
						<form name="profile_changepassword_form" class="profile_changepassword_form" method="post">
							<div class="row">
								<div class="form-item col-sm-12 col-xs-12">
									<label><?php echo $loc['profile.php']['t24']; ?></label>
									<input name="profile_password_1" id="profile_password_1" type="password" class="form-control" placeholder="<?php echo $loc['profile.php']['t25']; ?>" value="" maxlength="50">
								</div><!-- form-item -->
								<div class="form-item col-sm-12 col-xs-12">
									<label><?php echo $loc['profile.php']['t26']; ?></label>
									<input name="profile_password_2" type="password" class="form-control" placeholder="<?php echo $loc['profile.php']['t27']; ?>" value="" maxlength="50" >
								</div><!-- form-item -->
								<div class="form-item col-sm-12 col-xs-12">
									<input name="profile_changepassword_submit" type="submit" class="others_button_sohranit" value="<?php echo $loc['button']['t01']; ?>" onclick="if (!confirm('<?php echo $loc['profile.php']['t28']; ?>'))return false;">
								</div><!-- form-item -->
							</div><!-- row -->
						</form>
					</div><!-- password-content -->
				</div><!-- row -->
			</div><!-- widget-content -->
			<?php
				}
			?>
		</aside><!-- widget -->




				

				
						
			