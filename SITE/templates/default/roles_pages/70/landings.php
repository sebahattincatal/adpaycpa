

	<?php
	// Выводим форму добавления лендинга
	// Display the form of adding landing
	include ('./templates/'.$template.'/blocks/landings_form.php');
	?>


<span><?php echo $loc['landings.php']['t16']; ?></span>

	<div class="finance-list">
		<div class="table-responsive">
			<table class="list-table display table" width="100%" >
		        <thead>
		          <tr>
		            <th><?php echo $loc['landings.php']['t17']; ?></th>
					<th><?php echo $loc['landings.php']['t07']; ?></th>	
					<th><?php echo $loc['landings.php']['t08']; ?></th>
					<th><?php echo $loc['landings.php']['t09']; ?></th>
					<th width="140"><?php echo $loc['landings.php']['t18']; ?></th>
					<th><?php echo $loc['landings.php']['t19']; ?></th>
		          </tr>
		        </thead>
		        <tbody>
		          	<?php
						$sql_landings = "SELECT * FROM landings ORDER BY `id` DESC";
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
									<td><?php echo $landing_id; ?></td>
									<td><?php echo html_entity_decode($landing_name, ENT_QUOTES, 'utf-8'); ?></td>
									<td><a target="_blank" href="<?php echo $landing_url; ?>"><?php echo $landing_url; ?></a></td>
									<td>
										<?php
										// Получаем буквенное название оффера и его статус
										// Get the name of the letter and its status offer
										$sql_viewoffer = "SELECT id,name,active FROM offers WHERE `id`='$landing_offer_id'";
										$result_viewoffer = $mysqli->query($sql_viewoffer);
										if (mysqli_num_rows($result_viewoffer) > 0) 
											{
											$res_viewoffer=mysqli_fetch_array($result_viewoffer);
											$id_of=htmlentities($res_viewoffer['id']);
											$name_of=htmlentities($res_viewoffer['name']);
											$active_of=htmlentities($res_viewoffer['active']);
											echo '<a target="_blank" href="./offers.php?offer='.$id_of.'">'.html_entity_decode($name_of, ENT_QUOTES, 'utf-8').'</a>';
											}
										else
											{
											echo '<font color=red>'.$loc['landings.php']['t10'].'</font>';
											}
										?>
									</td>
									<?php
									if (isset($active_of))
										{
										if ($active_of=='0') {echo '<td style="background: red; color: white;">'.$loc['landings.php']['t20'].'</td>';}
										if ($active_of=='1') {echo '<td style="background: green; color: white;">'.$loc['landings.php']['t21'].'</td>';}
										if ($active_of=='2') {echo '<td style="background: yellow; color: red;">'.$loc['landings.php']['t22'].'</td>';}
										}
									else
										{
										echo '<td style="background: red; color: white;">'.$loc['landings.php']['t23'].'</td>';
										}
									?>
									</td>
									<td><a href="./landings.php?delete=<?php echo $landing_id; ?>" onclick="if (!confirm('<?php echo $loc['landings.php']['t24']; ?>&nbsp;<?php echo html_entity_decode($landing_name, ENT_QUOTES, 'utf-8'); ?>?'))return false;"><?php echo $loc['landings.php']['t25']; ?></a></td> 
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