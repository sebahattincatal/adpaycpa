
<h1><?php echo $loc['landings.php']['t01']; ?></h1>

<p>
	<?php
	if (isset($_GET['xtext']) && $_GET['xtext']=='1') {echo '<font color=green><b>'.$loc['landings.php']['t02'].'</b></font>';}
	elseif (isset($_GET['xtext']) && $_GET['xtext']=='2') {echo '<font color=red><b>'.$loc['landings.php']['t03'].'</b></font>';}
	elseif (isset($_GET['xtext']) && $_GET['xtext']=='3') {echo '<font color=green><b>'.$loc['landings.php']['t04'].'</b></font>';}	
	?>
</p>

<p>
	<?php
	// Выводим форму добавления лендинга
	// Display the form of adding landing
	include ('./templates/'.$template.'/blocks/landings_form.php');
	?>
</p>

<p>
	&nbsp;
</p>

<p>
	<p>
		<b><?php echo $loc['landings.php']['t16']; ?></b>
	</p>
	<table class="stats_table" width="100%">
		<tr class="table_zagolovki">
			<td><?php echo $loc['landings.php']['t17']; ?></td>
			<td><?php echo $loc['landings.php']['t07']; ?></td>	
			<td><?php echo $loc['landings.php']['t08']; ?></td>
			<td><?php echo $loc['landings.php']['t09']; ?></td>
			<td width="140"><?php echo $loc['landings.php']['t18']; ?></td>
			<td><?php echo $loc['landings.php']['t19']; ?></td>
		</tr>
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
	</table>
</p>
