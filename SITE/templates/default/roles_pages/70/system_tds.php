
<?php
include ('./templates/'.$template.'/checkform/jquery.proverka.systemtds.form.php');
?>
	
<aside class="widget">
	<div class="widget-header">
		<div class="row">
			<div class="widget-title col-sm-6 col-xs-12">
				<h3>You can create your own rule redirect</h3>
				<span>ADPAY SUPPORT</span>
			</div><!-- widget-title -->
		</div><!-- row -->
	</div><!-- widget-header -->

	<div class="widget-content">
		<div class="row">
			
			<div class="col-sm-12 col-xs-12">

				<form action="" name="addredirect_form" method="post" class="addredirect_form tds-form finance-form">
					<div class="row">

						<div class="form-item col-sm-6 col-xs-12">

							<label><?php echo $loc['system_tds.php']['t03']; ?></label>
							<input type="text" class="form-control" name="description" value="" maxlength="100">

							<label><?php echo $loc['system_tds.php']['t04']; ?></label>
							<input type="text" class="form-control" name="page" value="<?php if (isset($_GET['page']) && $_GET['page']!='') {echo htmlentities($_GET['page']);} ?>" maxlength="250">

							<label><?php echo $loc['system_tds.php']['t05']; ?></label>
							<input type="text" class="form-control" name="referer" value="<?php if (isset($_GET['referer']) && $_GET['referer']!='') {echo htmlentities($_GET['referer']);} ?>" maxlength="250">

							<label><?php echo $loc['system_tds.php']['t06']; ?></label>
							<input type="text" class="form-control" name="ip" class="minipole" value="<?php if (isset($_GET['ip']) && $_GET['ip']!='') {echo htmlentities($_GET['ip']);} ?>" maxlength="20">

						</div><!-- form-item -->

						<div class="form-item col-sm-6 col-xs-12">

							<label><?php echo $loc['system_tds.php']['t07']; ?></label>
							<select name="platform" class="form-control minipole">
								<option value="All" <?php if (!isset($_GET['platform']) || $_GET['platform']=='') {echo 'selected';} ?>><?php echo $loc['system_tds.php']['t08']; ?></option>
								<option value="Windows" <?php if (isset($_GET['platform']) && $_GET['platform']=='Windows') {echo 'selected';} ?>><?php echo $loc['system_tds.php']['t09']; ?></option>
								<option value="Linux" <?php if (isset($_GET['platform']) && $_GET['platform']=='Linux') {echo 'selected';} ?>><?php echo $loc['system_tds.php']['t10']; ?></option>
								<option value="Mac" <?php if (isset($_GET['platform']) && $_GET['platform']=='Mac') {echo 'selected';} ?>><?php echo $loc['system_tds.php']['t11']; ?></option>
								<option value="Android" <?php if (isset($_GET['platform']) && $_GET['platform']=='Android') {echo 'selected';} ?>><?php echo $loc['system_tds.php']['t12']; ?></option>
								<option value="iOS" <?php if (isset($_GET['platform']) && $_GET['platform']=='iOS') {echo 'selected';} ?>><?php echo $loc['system_tds.php']['t13']; ?></option>
							</select>

							<label><?php echo $loc['system_tds.php']['t14']; ?></label>
							<input type="text" class="form-control" name="useragent" value="<?php if (isset($_GET['useragent']) && $_GET['useragent']!='') {echo htmlentities($_GET['useragent']);} ?>" maxlength="250">

							<label><?php echo $loc['system_tds.php']['t15']; ?></label>
							<select name="country" class="form-control minipole">
								<?php
								$sql_spisokstran = "SELECT * FROM sxgeo_country ORDER BY `name_ru` ASC";
								$result_spisokstran=$mysqli->query($sql_spisokstran);
								if (mysqli_num_rows($result_spisokstran) > 0) 
									{
									while ($res_spisokstran=mysqli_fetch_array($result_spisokstran)) 
										{
										$current_country=htmlentities($res_spisokstran['name_ru']);
										$current_iso=htmlentities($res_spisokstran['iso']);
										?>
										<option value="<?php echo $current_country; ?>"<?php 
										if (isset($_GET['country']) && $_GET['country']==$current_country) 
											{
											echo ' selected';
											}
										?>><?php echo $current_country; ?></option>
										<?php
										}
									}
								?>
							</select>

							<label><?php echo $loc['system_tds.php']['t16']; ?></label>
							<input type="text" class="form-control" name="destination" value="" maxlength="250">

						</div><!-- form-item -->

						<div class="form-item col-sm-6 col-xs-12">

							<div style="width:100%; margin-top:30px;">
								<button type="submit" name="submit_redirect" class="btn others_button_sohranit" value="<?php echo $loc['button']['t01']; ?>">Continue</button>

								<input >
							</div>
						</div><!-- form-item -->

						<div class="form-item alert col-sm-6 col-xs-12">

						</div><!-- form-item -->

					</div><!-- row -->
				</form><!-- finance-form -->

			</div>
			
			<div class="finance-list">
				<div class="table-responsive">
					<table class="list-table display table" width="100%" >
				        <thead>
				          <tr>
				            <th><b><?php echo $loc['system_tds.php']['t18']; ?></b></th>
							<th><b><?php echo $loc['system_tds.php']['t19']; ?></b></th>
							<th><b><?php echo $loc['system_tds.php']['t20']; ?></b></th>
							<th><b><?php echo $loc['system_tds.php']['t21']; ?></b></th>
							<th><b><?php echo $loc['system_tds.php']['t22']; ?></b></th>
							<th><b><?php echo $loc['system_tds.php']['t23']; ?></b></th>
							<th><b><?php echo $loc['system_tds.php']['t24']; ?></b></th>
							<th><b><?php echo $loc['system_tds.php']['t25']; ?></b></th>
							<th><b><?php echo $loc['system_tds.php']['t26']; ?></b></th>
							<th><b><?php echo $loc['system_tds.php']['t27']; ?></b></th>
				          </tr>
				        </thead>
				        <tbody>
				          <tr>
				            <?php
								$sql_redirectlist = "SELECT * FROM system_tds ORDER BY `id` DESC";
								$result_redirectlist = $mysqli->query($sql_redirectlist);
								if (mysqli_num_rows($result_redirectlist) > 0) 
									{
									while ($res_redirectlist=mysqli_fetch_array($result_redirectlist)) 
										{
										$redirect_id=htmlentities($res_redirectlist['id']);
										$redirect_description=htmlentities($res_redirectlist['description']);
										$redirect_page=htmlentities($res_redirectlist['page']);
										$redirect_referer=htmlentities($res_redirectlist['referer']);
										$redirect_ip=htmlentities($res_redirectlist['ip']);
										$redirect_platform=htmlentities($res_redirectlist['platform']);
										$redirect_useragent=htmlentities($res_redirectlist['useragent']);
										$redirect_country=htmlentities($res_redirectlist['country']);
										$redirect_destination=htmlentities($res_redirectlist['destination']);
										?>
										<tr>
											<th><nobr><?php echo $redirect_id; ?></nobr></th>
											<th><nobr><?php echo html_entity_decode($redirect_description, ENT_QUOTES, 'utf-8'); ?></nobr></th>
											<th><nobr><?php if ($redirect_page=='All') {echo $loc['system_tds.php']['t28'];} else {echo $redirect_page;} ?></nobr></th>
											<th><nobr><?php if ($redirect_referer=='All') {echo $loc['system_tds.php']['t29'];} else {echo $redirect_referer;} ?></nobr></th>
											<th><nobr><?php if ($redirect_ip=='All') {echo $loc['system_tds.php']['t30'];} else {echo $redirect_ip;} ?></nobr></th>
											<th><nobr><?php if ($redirect_platform=='All') {echo $loc['system_tds.php']['t31'];} else {echo $redirect_platform;} ?></nobr></th>
											<th><nobr><?php if ($redirect_useragent=='All') {echo $loc['system_tds.php']['t30'];} else {echo $redirect_useragent;} ?></nobr></th>
											<th><nobr><?php echo $redirect_country; ?></th>
											<th><nobr><?php echo $redirect_destination; ?></th>
											<th>&nbsp;<a href="system_tds.php?delete=<?php echo $redirect_id; ?>" onclick="if (!confirm('<?php echo $loc['system_tds.php']['t32']; ?>'))return false;"><?php echo $loc['system_tds.php']['t33']; ?></a>&nbsp;</th>
										</tr>			
										<?
										}
									}
								?>
				          </tr>
				        </tbody>
					</table>
				</div>
			</div><!-- finance-list -->

		</div><!-- row -->
	</div><!-- widget-content -->
</aside><!-- widget -->