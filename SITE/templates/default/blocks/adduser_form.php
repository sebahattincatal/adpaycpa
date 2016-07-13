
<?php
include ('./templates/'.$template.'/checkform/jquery.proverka.adduser.form.php');
?>
		
<aside class="widget">
	<div class="widget-header">
		<div class="row">
			<div class="widget-title col-sm-6 col-xs-12">
				<h3>Adding new user</h3>
			</div><!-- widget-title -->
		</div><!-- row -->
	</div><!-- widget-header -->

	<div class="widget-content">
		<div class="row">

			<div class="col-sm-12 col-xs-12">

				<form class="finance-form landing-form" name="adduser_form" method="post" action="./adduser.php?<?php echo @$_SERVER['QUERY_STRING']?>">
					<div class="row">

						<div class="form-item col-sm-6 col-xs-12">
							<label><?php echo $loc['adduser.php']['t10']; ?></label>
							<input type="text" class="form-control marginBottom10" name="email" placeholder="<?php echo $loc['adduser.php']['t18']; ?>" value="" maxlength="50"  />

							<label><?php echo $loc['adduser.php']['t11']; ?></label>
							<input type="password" class="form-control marginBottom10" id="password1" name="password1" placeholder="<?php echo $loc['adduser.php']['t19']; ?>" value="" maxlength="50"  />

							<label><?php echo $loc['adduser.php']['t12']; ?></label>
							<input type="password" class="form-control marginBottom10" name="password2" placeholder="<?php echo $loc['adduser.php']['t20']; ?>" value="" maxlength="50"  />

							<label><?php echo $loc['adduser.php']['t13']; ?></label>
							<select name="active" class="form-control form-select marginBottom10">
								<option value="0"><?php echo $loc['adduser.php']['t14']; ?></option>
								<option value="1"><?php echo $loc['adduser.php']['t15']; ?></option>			
								<option value="5"><?php echo $loc['adduser.php']['t16']; ?></option>
							</select>

							<label><?php echo $loc['adduser.php']['t17']; ?></label>
							<select name="tip" class="form-control form-select marginBottom10">
								<?php
								$sql_uroven = "SELECT tip,title FROM users_roles_tpl WHERE active='1'";
								$result_uroven = $mysqli->query($sql_uroven);
								if (mysqli_num_rows($result_uroven) > 0) 
									{
									while($res_uroven=mysqli_fetch_array($result_uroven)) 
										{ 
										?>
										<option value="<?php echo htmlentities($res_uroven['tip']);?>"><?php echo htmlentities($res_uroven['title']);?></option>
										<?php
										}
									}
								?>
							</select>

							<div style="width:100%; margin-top:30px;">
								<button name="submit_new_user" value="<?php echo $loc['button']['t01']; ?>" class="others_button_sohranit btn"btn type="submit">Save User</button>
							</div>

						</div><!-- form-item -->

						<div class="form-item alert col-sm-6 col-xs-12">
							
						</div><!-- form-item -->

					</div><!-- row -->
				</form><!-- finance-form -->

			</div>

		</div><!-- row -->
	</div><!-- widget-content -->
</aside><!-- widget -->