
<?php
// Если баланс был успешно пополнен, то выводим сообщение об этом
// If the balance has been successfully topped up, the message about this
if (isset($_GET['success']))
	{
	echo '<p><b><font color="green">'.$loc['finances.php']['t02'].'</font></b></p>';
	}
// Если баланс НЕ был успешно пополнен, то выводим сообщение об этом
// If the balance has not been successfully topped up, the message about this
if (isset($_GET['fail']))
	{
	echo '<p><b><font color="red">'.$loc['finances.php']['t03'].'</font></b></p>';
	}	
?>

		
<aside class="widget">
	<div class="widget-header">
		<div class="row">
			<div class="widget-title col-sm-6 col-xs-12">
				<h3>Finances</h3>
				<span>Balance replenishment</span>
			</div><!-- widget-title -->
		</div><!-- row -->
	</div><!-- widget-header -->

	<div class="widget-content">
		<div class="row">
			<div class="col-sm-12 col-xs-12">

				<form name="paybalance_form" action="./finances.php?act=make_invoice" method="post" class="finance-form">
					<div class="row">

						<div class="form-item col-sm-6 col-xs-12">
							<label><?php echo $loc['finances.php']['t05']; ?></label>
							<input type="text" class="form-control" name="amount" maxlength="6" value="" required>&nbsp;<?php echo $loc['finances.php']['t06']; ?>
							
							<span><?php echo $loc['finances.php']['t07']; ?></span>
							<label style="cursor: pointer;" class="payment-item">
								<input type="radio" name="paysys" id="webmoney" value="wm" checked style="cursor: pointer;">&nbsp;<?php echo $loc['finances.php']['t08']; ?>
							</label> 
							<label style="cursor: pointer;" class="payment-item">
								<input type="radio" name="paysys" id="other" value="yk" style="cursor: pointer;">&nbsp;<?php echo $loc['finances.php']['t09']; ?>
							</label>			
							<div style="width:100%; margin-top:30px;">
								<input type="submit" name="submit_paybalance" value="<?php echo $loc['button']['t03']; ?>" class="btn others_button_dalee">
							</div>
						</div><!-- form-item -->

						<div class="form-item col-sm-6 col-xs-12">
							<?php
								// Если сумма на балансе равна или больше минимальной суммы разрешенной для вывода, то выводим блок. Иначе сообщаем об ошибке.
								// If the amount on the balance sheet is equal to or more than the minimum amount authorized for output, the output unit. Otherwise, we report an error.
								if ($user_balance>=$settings_min_vyvod)
									{
									?>
									<form method="post" action="./finances.php?<?php echo @$_SERVER['QUERY_STRING']?>">
										<p>
											<label><?php echo $loc['finances.php']['t18']; ?></label>
											<input type="text" class="form-control" name="sum_vyvod" maxlength="6" value="<?php echo $user_balance; ?>">&nbsp;<?php echo $loc['finances.php']['t06']; ?>&nbsp;
										</p>
										<input type="hidden" name="vyvod" value="ok">
										<span><?php echo $loc['finances.php']['t19']; ?></span>
										<div style="width:100%; margin-top:30px;">
											<button type="submit" name="submit" value="<?php echo $loc['button']['t03']; ?>" class="btn others_button_dalee" onclick="if (!confirm('<?php echo $loc['finances.php']['t20']; ?>'))return false;">More</button>
										</div>
									</form>
									<?php
									}
								else
									{
									echo '<p><font color=red>'.$loc['finances.php']['t21'].'&nbsp;'.$settings_min_vyvod.'&nbsp;'.$loc['finances.php']['t06'].'&nbsp;</font></p>';
									}
								?>
						</div><!-- form-item -->

					</div><!-- row -->
				</form><!-- finance-form -->

			</div>
			
			<div class="finance-list">
				<div class="table-responsive">
					<table class="list-table display table" width="100%" >
				        <thead>
				          <tr>
				            <th><?php echo $loc['finances.php']['t22']; ?></th>
				            <th><?php echo $loc['finances.php']['t23']; ?></th>
				            <th><?php echo $loc['finances.php']['t24']; ?></th>
				            <th><?php echo $loc['finances.php']['t25']; ?></th>
				            <th><?php echo $loc['finances.php']['t26']; ?></th>
				            <th><?php echo $loc['finances.php']['t27']; ?></th>
				            <th><?php echo $loc['finances.php']['t28']; ?></th>
				          </tr>
				        </thead>
				        <tbody>
				          	<?php
								if (isset($offset) && isset($show_pages))
									{
									$sql_finances = "SELECT * FROM finances_log WHERE `user_id`='$user_id' ORDER BY `id` DESC LIMIT $offset, $show_pages";
									}
								else
									{
									$sql_finances = "SELECT * FROM finances_log WHERE `user_id`='$user_id' ORDER BY `id` DESC";
									}
								$result_finances = $mysqli->query($sql_finances);
								$cvet=0;
								if (mysqli_num_rows($result_finances) > 0) 
									{
									while($res_finances=mysqli_fetch_array($result_finances)) 
										{ 
										$finances_id=htmlentities($res_finances['id']);
										$finances_date=htmlentities($res_finances['date']);
										$finances_operation=htmlentities($res_finances['operation']);
										$finances_summ=htmlentities($res_finances['summ']);
										$finances_description=htmlentities($res_finances['description']);
										$finances_balance=htmlentities($res_finances['balance']);
										$finances_status=htmlentities($res_finances['status']);
											
										// Определяем буквенное название статуса
										// Determine the literal name of the status
										if ($finances_status=='1') {$finances_status_text='&nbsp;'; $finances_status_style="background: yellow; color: red;";}
										elseif ($finances_status=='2') {$finances_status_text=$loc['finances.php']['t29']; $finances_status_style="background: green; color: white;";}
										elseif ($finances_status=='3') {$finances_status_text=$loc['finances.php']['t30']; $finances_status_style="background: red; color: white;";}
											
										// Определяем буквенное название описания транзакции
										// Determine the literal name of the transaction description
										$sql_finances_tpl = "SELECT description FROM finances_tpl WHERE `id`='$finances_description'";
										$result_finances_tpl = $mysqli->query($sql_finances_tpl);
										$res_finances_tpl=mysqli_fetch_array($result_finances_tpl);
										$finances_description=htmlentities($res_finances_tpl['description']);
										
										// Определяем буквенное название типа операции
										// Determine the literal name of the type of operation
										if ($finances_operation=='1') {$finances_operation_text=$loc['finances.php']['t31'];}
										elseif ($finances_operation=='2') {$finances_operation_text=$loc['finances.php']['t32'];}
											
										?>
										<tr>
											<td><?php echo $finances_id; ?></td>
											<td width="200"><?php echo date('d.m.Y / H:i:s', strtotime($finances_date)); ?></td>
											<?php
											if ($finances_operation=='1') {echo '<td>'.$finances_operation_text.'</td><td>&nbsp;</td>';}
											elseif ($finances_operation=='2') {echo '<td width="70">&nbsp;</td><td width="70">'.$finances_operation_text.'</td>';}
											?>
											<td width="150"><?php echo $finances_summ; ?></td>
											<td width="300"><?php echo $finances_description; ?></td>
											<td width="150"><?php echo $finances_balance; ?></td>
											<td style="<?php echo $finances_status_style; ?>"><?php echo $finances_status_text; ?></td>
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



<!--<?php
	include './templates/'.$template.'/in_footer.php';
	exit;
?>-->