
<h1><?php echo $loc['cat_offers.php']['t01']; ?></h1>

<p>
	<?php
	if (isset($_GET['xtext']) && $_GET['xtext']=='1') {echo '<font color=red><b>'.$loc['cat_offers.php']['t02'].'</b></font>';}
	elseif (isset($_GET['xtext']) && $_GET['xtext']=='2') {echo '<font color=green><b>'.$loc['cat_offers.php']['t03'].'</b></font>';}
	elseif (isset($_GET['xtext']) && $_GET['xtext']=='3') {echo '<font color=green><b>'.$loc['cat_offers.php']['t04'].'</b></font>';}
	elseif (isset($_GET['xtext']) && $_GET['xtext']=='4') {echo '<font color=red><b>'.$loc['cat_offers.php']['t05'].'</b></font>';}
	?>
</p>

<p>
	<?php
	// Выводим форму добавления категорий
	// Display the form of adding categories
	include ('./templates/'.$template.'/blocks/cat_offers_form.php');
	?>
</p>

<p>
	&nbsp;
</p>

<p>
	<p>
		<b><?php echo $loc['cat_offers.php']['t06']; ?></b>
	</p>
	<table class="stats_table">
		<tr class="table_zagolovki">
			<td><?php echo $loc['cat_offers.php']['t07']; ?></td>	
			<td><?php echo $loc['cat_offers.php']['t08']; ?></td>
		</tr>
		<?
		$sql = "SELECT * FROM category_tpl ORDER BY `name` ASC";
		$result = $mysqli->query($sql);
		$cvet=0;
		if (mysqli_num_rows($result) > 0) 
			{
			while($res=mysqli_fetch_array($result)) 
				{
				$id_category=htmlentities($res['id']);
				$name_category=htmlentities($res['name']);
				?> 
				<tr class="<?php if ( $cvet & 1 ) {echo 'col2';} else {echo '';} $cvet++; ?>">
					<td><?php echo html_entity_decode($name_category, ENT_QUOTES, 'utf-8'); ?></td>
					<td><a href="./cat_offers.php?delete=<?php echo $id_category; ?>" onclick="if (!confirm('<?php echo $loc['cat_offers.php']['t09']; ?>&nbsp;<?php echo html_entity_decode($name_category, ENT_QUOTES, 'utf-8'); ?>?'))return false;"><?php echo $loc['cat_offers.php']['t10']; ?></a></td> 
				</tr>
				<?php
				}
			}
		?>  
	</table>
</p>

<p>
	&nbsp;
</p>
