
<?php
include ('./templates/'.$template.'/checkform/jquery.proverka.add_news.form.php');
?>

<p>
	<b><?php echo $loc['news.php']['t10']; ?></b>
</p>

<p>
	<form name="editnews_form" method="post" action="./news.php?<?php echo @$_SERVER['QUERY_STRING']?>">
		<table class="addnews_table">
			<tr>
				<td><?php echo $loc['news.php']['t11']; ?>&nbsp;</td>
				<td><input type="text" name="news_date" maxlength="90" value="<?php echo $news_date; ?>" style="width: 150px;" readonly></td>
			</tr>
			<tr>
				<td><?php echo $loc['news.php']['t12']; ?>&nbsp;</td>
				<td><input type="text" name="news_small" maxlength="90" value="<?php echo html_entity_decode($news_zagolovok, ENT_QUOTES, 'utf-8'); ?>" required ></td>
			</tr>
			<tr>
				<td><?php echo $loc['news.php']['t13']; ?>&nbsp;</td>
				<td><textarea name="news_full" maxlength="900" required><?php echo html_entity_decode($news, ENT_QUOTES, 'utf-8'); ?></textarea></td>
			</tr>
			<tr>
				<td><?php echo $loc['news.php']['t14']; ?>&nbsp;</td>
				<td>
					<select id="komu" name="komu" onchange="
					if($('#komu').val()=='10' || $('#komu').val()=='40')
						{
						$('#public_news').prop('disabled', false);
						}
					else
						{
						$('#public_news [value=0]').attr('selected', 'selected');
						$('#public_news').prop('disabled', true);
						}						
					">
					<?php
					// Выводим только те роли, которые активны на данный момент
					// Display only those roles that are active at the moment
					$sql_rolespisok = "SELECT * FROM users_roles_tpl WHERE `active`='1'";		
					$result_rolespisok = $mysqli->query($sql_rolespisok);
					if (mysqli_num_rows($result_rolespisok)>0) 
						{
						while($res_rolespisok=mysqli_fetch_array($result_rolespisok)) 
							{
							$role_tip=htmlentities($res_rolespisok['tip']);
							$role_title=htmlentities($res_rolespisok['title']);
							?>
							<option value="<?php echo $role_tip; ?>" <?php if ($role_tip==$news_user_tip) {echo 'selected="selected"';} ?>><?php echo $role_title; ?></option>
							<?php
							}
						}
					?>
					</select>
					&nbsp;&nbsp;<?php echo $loc['news.php']['t15']; ?>&nbsp;
					<select id="public_news" name="public_news" style="width: 70px;" disabled="disabled">
						<option value="0" <?php if ($public_news=='0') {echo 'selected';} ?>><?php echo $loc['news.php']['t16']; ?></option>
						<option value="1" <?php if ($public_news=='1') {echo 'selected';} ?>><?php echo $loc['news.php']['t17']; ?></option>
					</select>					

					<script>
						if($('#komu').val()=='10' || $('#komu').val()=='40')
						{
						$('#public_news').prop('disabled', false);
						}
					else
						{
						$('#public_news [value=0]').attr('selected', 'selected');
						$('#public_news').prop('disabled', true);
						}						
					</script>
					
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="editnews" value="ok">
					<input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
					<input type="submit" name="submit" value="<?php echo $loc['button']['t01']; ?>" class="others_button_sohranit" onclick="if (!confirm('<?php echo $loc['news.php']['t18']; ?>'))return false;">
				</td>
			</tr>
		</table>
	</form>
</p>


