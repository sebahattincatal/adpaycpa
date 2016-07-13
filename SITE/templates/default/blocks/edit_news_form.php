
<?php
include ('./templates/'.$template.'/checkform/jquery.proverka.add_news.form.php');
?>


<aside class="widget">
	<div class="widget-header">
		<div class="row">
			<div class="widget-title col-sm-6 col-xs-12">
				<h3>Adpay News</h3>
				<span>You can add news for the selected user roles</span>
			</div><!-- widget-title -->
		</div><!-- row -->
	</div><!-- widget-header -->

	<div class="widget-content">
		<div class="row">
			
			<div class="col-sm-12 col-xs-12">

				<form name="editnews_form" method="post" action="./news.php?<?php echo @$_SERVER['QUERY_STRING']?>" class="finance-form news-form">
					<div class="row">

						<div class="form-item col-sm-6 col-xs-12">
							<label><?php echo $loc['news.php']['t11']; ?></label>
							<input type="text" class="form-control" name="news_date" maxlength="90" value="<?php echo $news_date; ?>" style="width: 150px;" readonly>

							<label><?php echo $loc['news.php']['t13']; ?></label>
							<textarea ></textarea>

							<textarea name="news_full" class="form-control" maxlength="900" required><?php echo html_entity_decode($news, ENT_QUOTES, 'utf-8'); ?></textarea>
						</div><!-- form-item -->

						<div class="form-item col-sm-6 col-xs-12">
							<div class="row">
								<div class="col-sm-12 col-xs-12">
									<label><?php echo $loc['news.php']['t14']; ?></label>
									<select id="select01" class="form-control">
										<option value="webmaster">Webmaster</option>
										<option value="advertiser">Advertiser</option>
										<option value="call_center_network">Call Centre Network</option>
										<option value="network_adminstrator" selected>Network Adminstrator</option>
										<option value="trainer">Trainer</option>
									</select>
								</div>
								<div class="col-sm-12 col-xs-12">
									<select id="select02" class="form-control" disabled="disabled">
										<option value="no">No</option>
										<option value="yes">Yes</option>
									</select>
								</div>
							</div><!-- row -->
						</div><!-- form-item -->

						<div class="form-item col-sm-12 col-xs-12">
							<div style="width:100%; margin-top:30px;">
								<button type="submit" class="btn">Continue</button>
							</div>
						</div><!-- form-item -->

						<div class="form-item col-sm-6 col-xs-12">
									<label>Print the news group</label>
									<select id="komu" class="form-control" name="komu" onchange="
										if($('#komu').val()=='10' || $('#komu').val()=='40')
											{
											$('#public_news').prop('disabled', false);
											}
										else
											{
											$('#public_news [value=0]').attr('selected', 'selected');
											$('#public_news').prop('disabled', true);
											}						
										">
										<?php
										// Выводим только те роли, которые активны на данный момент
										// Display only those roles that are active at the moment
										$sql_rolespisok = "SELECT * FROM users_roles_tpl WHERE `active`='1'";		
										$result_rolespisok = $mysqli->query($sql_rolespisok);
										if (mysqli_num_rows($result_rolespisok)>0) 
											{
											while($res_rolespisok=mysqli_fetch_array($result_rolespisok)) 
												{
												$role_tip=htmlentities($res_rolespisok['tip']);
												$role_title=htmlentities($res_rolespisok['title']);
												?>
												<option value="<?php echo $role_tip; ?>" <?php if ($role_tip==$news_user_tip) {echo 'selected="selected"';} ?>><?php echo $role_title; ?></option>
												<?php
												}
											}
										?>
										</select>
										&nbsp;&nbsp;<?php echo $loc['news.php']['t15']; ?>&nbsp;
										<select id="public_news" name="public_news" style="width: 70px;" disabled="disabled">
											<option value="0" <?php if ($public_news=='0') {echo 'selected';} ?>><?php echo $loc['news.php']['t16']; ?></option>
											<option value="1" <?php if ($public_news=='1') {echo 'selected';} ?>><?php echo $loc['news.php']['t17']; ?></option>
										</select>					

										<script>
											if($('#komu').val()=='10' || $('#komu').val()=='40')
											{
											$('#public_news').prop('disabled', false);
											}
										else
											{
											$('#public_news [value=0]').attr('selected', 'selected');
											$('#public_news').prop('disabled', true);
											}						
										</script>

						</div><!-- form-item -->

						<input type="hidden" name="editnews" value="ok">
						<input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
						<input type="submit" name="submit" value="<?php echo $loc['button']['t01']; ?>" class="others_button_sohranit" onclick="if (!confirm('<?php echo $loc['news.php']['t18']; ?>'))return false;">

					</div><!-- row -->
				</form><!-- finance-form -->

			</div>

		</div><!-- row -->
	</div><!-- widget-content -->
</aside><!-- widget -->