
<?php
	// Выводим форму добавления лендинга или сайта
	// Display the form or add a landing or website
	include ('./templates/'.$template.'/blocks/landings_form.php');
?>

<div class="passive-income-list">

		<div class="table-responsive">
			<table class="list-table display table" width="100%" >
		        <thead>
		          <tr>
		            <th><?php echo $loc['landings.php']['t07']; ?></th>
		            <th><?php echo $loc['landings.php']['t08']; ?></th>
		            <th><?php echo $loc['landings.php']['t09']; ?></th>
		          </tr>
		        </thead>
		        <tbody>
		          	<?php
						$sql_landings = "SELECT * FROM landings WHERE `owner_id`='$user_id' ORDER BY `id` DESC";
						$result_landings = $mysqli->query($sql_landings);
						$cvet=0;
						if (mysqli_num_rows($result_landings) > 0) 
							{
							while($res_landings=mysqli_fetch_array($result_landings)) 
								{
								$landing_id=htmlentities($res_landings['id']);
								$landing_name=htmlentities($res_landings['name']);
								$landing_url=htmlentities($res_landings['url']);
								$landing_offer_id=htmlentities($res_landings['offer_id']);
								?> 
								<tr class="<?php if ( $cvet & 1 ) {echo 'col2';} else {echo '';} $cvet++; ?>">
									<td><?php echo html_entity_decode($landing_name, ENT_QUOTES, 'utf-8'); ?></td>
									<td><a target="_blank" href="<?php echo $landing_url; ?>"><?php echo $landing_url; ?></a></td>
									<td>
										<?php
										// Получаем буквенное название оффера
										// Get the name of the letter offer
										$sql_viewoffer = "SELECT id,name FROM offers WHERE `id`='$landing_offer_id'";
										$result_viewoffer = $mysqli->query($sql_viewoffer);
										if (mysqli_num_rows($result_viewoffer) > 0) 
											{
											$res_viewoffer=mysqli_fetch_array($result_viewoffer);
											$id_of=htmlentities($res_viewoffer['id']);
											$name_of=htmlentities($res_viewoffer['name']);
											echo '<a target="_blank" href="./offers.php?offer='.$id_of.'">'.html_entity_decode($name_of, ENT_QUOTES, 'utf-8').'</a>';
											}
										else
											{
											echo $loc['landings.php']['t10'];
											}
										?>
									</td>
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
</aside><!-- widget -->