
<?php
	function build_pagination_url($page) 
		{
		$parameters = array('page' => $page);
		return '?'.http_build_query($parameters);
		}
	$result = $mysqli->query( "SELECT COUNT(id) AS count FROM `finances_log` WHERE `description`='4' AND `status`='1'" );
	// Вывод количества страниц
	// Display the number of pages
	pagination($result,50,11);
?>

<aside class="widget">
	<div class="widget-header">
		<div class="row">
			<div class="widget-title col-sm-6 col-xs-12">
				<h3>Balance</h3>
				<span>ADPAY LATEST STATICS</span>
			</div><!-- widget-title -->
		</div><!-- row -->
	</div><!-- widget-header -->

	<div class="widget-content">
		<div class="row">
			<div class="col-sm-12 col-xs-12">

				<form action="#" class="finance-form">
					<div class="row">

						<div class="form-item col-sm-6 col-xs-12">
							<label>Add funds in the amount of</label>
							<input type="phone" class="form-control" placeholder="Please enter amount">
							<span>Payment method</span>
							<label for="webmoney" class="payment-item"><input type="radio" id="webmoney" name="payment-method">WebMoney</label>
							<label for="other"  class="payment-item"><input type="radio" id="other" name="payment-method">Other Ways</label>
							<div style="width:100%; margin-top:30px;">
								<button type="submit" class="btn">Continue</button>
							</div>
						</div><!-- form-item -->

						<div class="form-item alert col-sm-6 col-xs-12">
							<h4><?php echo $loc['finances.php']['t33']; ?></h4>
							<p><b><?php echo $loc['finances.php']['t34']; ?></b>&nbsp;[<a target="_blank" href="./masspay.php?masspay=ok" class="normal_link" style="font-weight: normal;"><?php echo $loc['finances.php']['t41']; ?></a>&nbsp;|&nbsp;<a href="./finances.php?masspay=success" class="normal_link" style="font-weight: normal;" onclick="if (!confirm('<?php echo $loc['finances.php']['t42']; ?>'))return false;"><?php echo $loc['finances.php']['t43']; ?></a>]</p>
						</div><!-- form-item -->

					</div><!-- row -->
				</form><!-- finance-form -->

			</div>
			
			<div class="finance-list">
				<div class="table-responsive">
					<table class="list-table display table" width="100%" >
				        <thead>
				          <tr>
				            <td><?php echo $loc['finances.php']['t35']; ?></td>	
							<td><?php echo $loc['finances.php']['t36']; ?></td>	
							<td><?php echo $loc['finances.php']['t37']; ?></td>
							<td><?php echo $loc['finances.php']['t38']; ?></td>
							<td><?php echo $loc['finances.php']['t39']; ?></td>		
							<td><?php echo $loc['finances.php']['t40']; ?></td>
				          </tr>
				        </thead>
				        <tbody>
				          <?php
							if (isset($offset) && isset($show_pages))
								{
								$sql_payspisok = "SELECT id,date,user_id,summ FROM finances_log WHERE `description`='4' AND `status`='1' ORDER BY `id` DESC LIMIT $offset, $show_pages";
								}
							else
								{
								$sql_payspisok = "SELECT id,date,user_id,summ FROM finances_log WHERE `description`='4' AND `status`='1' ORDER BY `id` DESC";
								}
							$result_payspisok = $mysqli->query($sql_payspisok);
							$cvet=0; $num_id=0;
							if (mysqli_num_rows($result_payspisok) > 0) 
								{
								while($res_payspisok=mysqli_fetch_array($result_payspisok)) 
									{ 
									$pay_id=htmlentities($res_payspisok['id']);
									$pay_date=htmlentities($res_payspisok['date']);
									$pay_user_id=htmlentities($res_payspisok['user_id']);
									$pay_summ=htmlentities($res_payspisok['summ']);
									?>
									<tr class="<?php if ( $cvet & 1 ) {echo 'col2';} else {echo '';} $cvet++; $num_id++; ?> ?>">
										<td><?php echo $pay_id; ?></td>
										<td><?php echo date('d.m.Y / H:i:s', strtotime($pay_date)); ?></td>
										<td><?php echo $pay_summ; ?>&nbsp;<?php echo $loc['finances.php']['t44']; ?>&nbsp;</td>
										<td>
											<?php
											$sql_userdata = "SELECT id,email,wmr FROM users WHERE `id`='$pay_user_id'";
											$result_userdata = $mysqli->query($sql_userdata);
											$res_userdata=mysqli_fetch_array($result_userdata);
											$email_userdata=htmlentities($res_userdata['email']);
											$wmr_userdata=htmlentities($res_userdata['wmr']);
											?>
											<a href="./users.php?edit=<?php echo $pay_user_id; ?>" target="_blank"><?php echo $email_userdata; ?></a>
										</td>
										<td><?=$wmr_userdata;?></td>		
										<td>
											<a id="go_vyplata<?php echo $num_id; ?>" href="wmk:payto?Purse=<?php echo $wmr_userdata; ?>&Amount=<?php echo $pay_summ; ?>&Desc=<?php echo $settings_zagolovok; ?>:&nbsp;<?php echo $loc['finances.php']['t45']; ?>&nbsp;<?php echo $email_userdata; ?>&nbsp;<?php echo $loc['finances.php']['t46']; ?><?php echo $pay_id; ?>&BringToFront=Y" onclick="document.getElementById('go_vyplata<?php echo $num_id; ?>').style.display='none'; document.getElementById('ok_vyplata<?php echo $num_id; ?>').style.display='inline';"><?php echo $loc['finances.php']['t47']; ?></a>
											<a id="ok_vyplata<?php echo $num_id; ?>" style="display: none;" href="finances.php?ok_vyplata=<?php echo $pay_id; ?>&user=<?php echo $pay_user_id; ?>" onclick="if (!confirm('<?php echo $loc['finances.php']['t48']; ?>&nbsp;<?php echo $pay_summ; ?>&nbsp;<?php echo $loc['finances.php']['t44']; ?>&nbsp;<?php echo $loc['finances.php']['t49']; ?>&nbsp;&quot;<?php echo $email_userdata; ?>&quot;?'))return false;"><?php echo $loc['finances.php']['t50']; ?></a>
											&nbsp;|&nbsp;
											<a href="./finances.php?ne_vyplata=<?php echo $pay_id; ?>&user=<?php echo $pay_user_id; ?>" onclick="if (!confirm('<?php echo $loc['finances.php']['t51']; ?>&nbsp;<?php echo $pay_summ; ?>&nbsp;<?php echo $loc['finances.php']['t44']; ?>&nbsp;<?php echo $loc['finances.php']['t49']; ?>&nbsp;&quot;<?php echo $email_userdata; ?>&quot;?'))return false;"><?php echo $loc['finances.php']['t52']; ?></a>
											&nbsp;|&nbsp;
											<a target="_blank" href="./tickets.php?komu=<?php echo $pay_user_id; ?>"><span class="send_ticket"></span></a>
										</td>
									</tr>
									<?php
									}
								}
							?>	
				        </tbody>
					</table>
				</div>
			</div><!-- finance-list -->

		</div><!-- row -->
	</div><!-- widget-content -->
</aside><!-- widget -->

<div>
	<?php
	// Вывод количества страниц
	// Display the number of pages
	pagination($result,50,11);
	?>
</div>





