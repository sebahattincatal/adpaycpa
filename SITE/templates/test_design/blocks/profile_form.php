
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
	<p>
		<form name="profile_rekvizit_form" class="profile_rekvizit_form" method="post">
			<p><b><?php echo $loc['profile.php']['t08']; ?></b></p>	
			<table style="width: 700px;">
				<tr height="30">
					<td style="width: 180px;"><?php echo $loc['profile.php']['t09']; ?></td><td><input disabled name="profile_email" type="text" placeholder="<?php echo $loc['profile.php']['t10']; ?>" class="profile_input_text" value="<?php echo $user_email; ?>" maxlength="50" style="background: #cacaca;" /></td>
				</tr>
				<tr height="30">
					<td><?php echo $loc['profile.php']['t11']; ?></td><td><input name="profile_wmr" type="text" placeholder="<?php echo $loc['profile.php']['t12']; ?>" class="profile_input_text" value="<?php echo $user_wmr; ?>" maxlength="50"  /></td>
				</tr>	
				<tr height="30">
					<td><?php echo $loc['profile.php']['t13']; ?></td><td><input name="profile_name" type="text" placeholder="<?php echo $loc['profile.php']['t14']; ?>" class="profile_input_text" value="<?php echo $user_name; ?>" maxlength="50"  /></td>
				</tr>	
				<tr height="30">
					<td><?php echo $loc['profile.php']['t15']; ?></td><td><input name="profile_phone" type="text" placeholder="<?php echo $loc['profile.php']['t16']; ?>" class="profile_input_text" value="<?php echo $user_phone; ?>" maxlength="50"  /></td>
				</tr>	
				<tr height="30">
					<td><?php echo $loc['profile.php']['t17']; ?></td><td><input name="profile_skype" type="text" placeholder="<?php echo $loc['profile.php']['t18']; ?>" class="profile_input_text" value="<?php echo $user_skype; ?>" maxlength="50"  /></td>
				</tr>	
				<tr height="30">
					<td><?php echo $loc['profile.php']['t19']; ?></td><td><input name="profile_icq" type="text" placeholder="<?php echo $loc['profile.php']['t20']; ?>" class="profile_input_text" value="<?php echo $user_icq; ?>" maxlength="50"  /></td>
				</tr>

				<?php 
				if ($user_tip=='10')
					{
					?>
					<tr height="30">
						<td><?php echo $loc['profile.php']['t21']; ?></td>
						<td>
							<?php
							$sql_uroven = "SELECT tip_account, uroven_dostupa, opisanie FROM uroven_tpl WHERE `uroven_dostupa`='$user_uroven_dostupa' AND `tip_account`='10'";
							$result_uroven = $mysqli->query($sql_uroven);
							$res_uroven=mysqli_fetch_array($result_uroven);
							echo htmlentities($res_uroven['opisanie']);
							?>
						</td>
					</tr>		
					<?php
					}
				?>
			</table>
			<p>
				<input name="profile_rekvizit_submit" type="submit" class="others_button_sohranit" value="<?php echo $loc['button']['t01']; ?>" onclick="if (!confirm('<?php echo $loc['profile.php']['t22']; ?>'))return false;">
			</p>
		</form>
	</p>

	<p>
		&nbsp;
	</p>
	
	<?php
	include ('./templates/'.$template.'/checkform/jquery.proverka.profile-password.form.php');
	?>
	
	<p>
		<form name="profile_changepassword_form" class="profile_changepassword_form" method="post">
			<p><b><?php echo $loc['profile.php']['t23']; ?></b></p>
			<table style="width: 700px;">
				<tr height="30">
					<td style="width: 180px;"><?php echo $loc['profile.php']['t24']; ?></td><td><input name="profile_password_1" id="profile_password_1" class="profile_input_text" type="password" placeholder="<?php echo $loc['profile.php']['t25']; ?>" value="" maxlength="50"  /></td>
				</tr>
				<tr height="30">
					<td><?php echo $loc['profile.php']['t26']; ?></td><td><input name="profile_password_2" class="profile_input_text" type="password" placeholder="<?php echo $loc['profile.php']['t27']; ?>" value="" maxlength="50"  /></td>
				</tr>	
			</table>
			<p>
				<input name="profile_changepassword_submit" type="submit" class="others_button_sohranit" value="<?php echo $loc['button']['t01']; ?>" onclick="if (!confirm('<?php echo $loc['profile.php']['t28']; ?>'))return false;">
			</p>
		</form>
	</p>
	<?php
	}
?>