
						<center>

							<?php
							include ('./templates/'.$template.'/checkform/jquery.proverka.recover.form.php');
							?>

							<?php if (isset($errortext_recover) && $errortext_recover!='') {echo $errortext_recover;} ?>
				
							<form name="recover_form" method="post">
							<p>
								<div class="e-container4">
									<input type="text" name="recover_email" placeholder="<?php echo $loc['recover.php']['t08']; ?>" maxlength="40" value=""><i></i>
								</div>
								</p>
								<p><input type="submit" name="recover_submit" class="others_button_dalee" value="<?php echo $loc['button']['t03']; ?>"></p>
							</form>
							
						</center>
						