
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
											<input type="text" name="amount" maxlength="6" value="" required>&nbsp;<?php echo $loc['finances.php']['t06']; ?>
										<span><?php echo $loc['finances.php']['t07']; ?></span>
										<label for="webmoney" class="payment-item">
											<input type="radio" name="paysys" value="wm" checked style="cursor: pointer;">&nbsp;<?php echo $loc['finances.php']['t08']; ?>
										</label>
										<label for="other"  class="payment-item">
											<input type="radio" name="paysys" value="yk" style="cursor: pointer;">&nbsp;<?php echo $loc['finances.php']['t09']; ?>
										</label>
										<div style="width:100%; margin-top:30px;">
											<input type="submit" name="submit_paybalance" value="<?php echo $loc['button']['t03']; ?>" class="others_button_dalee">
										</div>
									</div><!-- form-item -->

									<div class="form-item alert col-sm-6 col-xs-12">
										<h4>Money withdrawal</h4>
										<p>Minimum withdrawal amount: 1000 RUB.</p>
									</div><!-- form-item -->

								</div><!-- row -->
							</form><!-- finance-form -->

						</div>

				<?php
					// Подгружаем вывод статистики по операциям связанных с балансом пользователя
					// Loads the display of statistics on transactions related to the user's balance
					include './templates/'.$template.'/blocks/finances_log.php';
				?>

		</div><!-- row -->
	</div><!-- widget-content -->
					
	<!--<?php
		include './templates/'.$template.'/in_footer.php';
		exit;
	?>-->
</aside>