
<aside class="widget">
	<div class="widget-header">
		<div class="row">
			<div class="widget-title col-sm-6 col-xs-12">
				<h3>Short Links</h3>
				<span>ADPAY LATEST STATICS</span>
			</div><!-- widget-title -->
		</div><!-- row -->
	</div><!-- widget-header -->


	<div class="widget-content">
		<div class="row">
			<div class="passive-income-form">
				<span class="green">Short link successfully added and can be used.</span>
				<form name="add_shortlink" class="report" method="post" action="./shortlinks.php?<?php echo @$_SERVER['QUERY_STRING']; ?>">
					<div class="row">
						<div class="form-item col-sm-5 col-xs-12">
							<label><?php echo $loc['shortlinks.php']['t07']; ?></label>
							<input type="text" name="link" class="form-control" value="" maxlength="100" style="width: 300px; padding: 0px 8px 0px 8px;" placeholder="<?php echo $loc['shortlinks.php']['t08']; ?>" />
						</div><!-- form-item -->
						
						<div class="form-item col-sm-12 col-xs-12">
							<input name="submit_shortlinks" value="<?php echo $loc['button']['t01']; ?>" class="btn" type="submit" style="top: -9px;">
						</div><!-- form-item -->

					</div><!-- row -->
				</form>
			</div><!-- passive-income-form -->
			<div class="passive-income-list">

				<div class="table-responsive">
					<table class="list-table display table" width="100%" >
				        <thead>
				          <tr>
				            <th><?php echo $loc['shortlinks.php']['t09']; ?></th>
				            <th><?php echo $loc['shortlinks.php']['t10']; ?></th>
				            <th><?php echo $loc['shortlinks.php']['t11']; ?></th>
				            <th><?php echo $loc['shortlinks.php']['t12']; ?></th>
				          </tr>
				        </thead>
				        <tbody>
				          <?php
							// Определяем какой домен используется для витрины
							// Determine which domain is used for showcase
							$sql_domain = "SELECT * FROM domains WHERE `active`='2'";
							$result_domain = $mysqli->query($sql_domain);
							$res_domain=mysqli_fetch_array($result_domain);
							
							// Назначаем переменную для полученного домена
							// Assign a variable to the resulting domain
							$domain=htmlentities($res_domain['domain']);
							
							// Запрашиваем необходимые данные из таблицы с короткими ссылками
							// Request the necessary data from the table with short links
							$sql = "SELECT * FROM shortlinks WHERE `user_id`='$user_id' ORDER BY `id` DESC";
							$result = $mysqli->query($sql);
							if (mysqli_num_rows($result) > 0) 
								{
								while($res=mysqli_fetch_array($result)) 
									{ 
									// Назначаем переменные
									// Assign variables
									$shortlink_id=htmlentities($res['id']);
									$shortlink_link=htmlentities($res['link']);
									$shortlink_date=htmlentities($res['date']);
									?>  
									<tr>
										<td><?php echo 'http://'.$domain.'/'.$shortlink_id; ?></td>
										<td><?php echo $shortlink_link; ?></td>
										<td><?php echo $shortlink_date; ?></td>
										<td>&nbsp;<a href="shortlinks.php?delete=<?php echo $shortlink_id; ?>" onclick="if (!confirm('<?php echo $loc['shortlinks.php']['t13']; ?>'))return false;"><?php echo $loc['shortlinks.php']['t14']; ?></a>&nbsp;</td>
									</tr>  
									<?php
									}
								}
							?>  
				        </tbody>
					</table>
				</div>

			</div><!-- passive-income-list -->
		</div><!-- row -->
	</div><!-- widget-content -->

</aside>

