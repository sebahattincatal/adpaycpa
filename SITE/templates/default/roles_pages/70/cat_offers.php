

	
		<?php
		// Выводим форму добавления категорий
		// Display the form of adding categories
		include ('./templates/'.$template.'/blocks/cat_offers_form.php');
		?>
	

	<span><?php echo $loc['cat_offers.php']['t06']; ?></span>
		<div class="finance-list">
			<div class="table-responsive">
				<table class="list-table display table" width="100%" >
			        <thead>
			          <tr>
			            <th><?php echo $loc['cat_offers.php']['t07']; ?></th>
			            <th><?php echo $loc['cat_offers.php']['t08']; ?></th>
			          </tr>
			        </thead>
			        <tbody>
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
			        </tbody>
				</table>
			</div>
		</div><!-- finance-list -->
	</div><!-- row -->
</div><!-- widget-content -->
</aside><!-- widget -->