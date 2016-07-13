
<p>
	<?php
	$result = $mysqli->query( "SELECT COUNT(id) AS count FROM `news` WHERE `user_tip`='$user_tip'" );
	function build_pagination_url($page) 
		{
		$parameters = array('page' => $page);
		return '?'.http_build_query($parameters);
		}
	?>
</p>

<p>
	<b><?php echo $loc['news.php']['t01']; ?></b>
</p>

<p>
	<?php
	// Вывод количества страниц
	// Display the number of pages
	pagination($result,10,11);
	?>
</p>

<p style="margin-top: 35px;">
	<?php
	if (isset($offset) && isset($show_pages))
		{
		$sql = "SELECT DATE_FORMAT(date, '%d.%m.%Y / %H:%i:%s') as date,news_zagolovok,news,id FROM news WHERE `user_tip`='$user_tip' ORDER BY `id` DESC LIMIT $offset, $show_pages";
		$result = $mysqli->query($sql);
		if (mysqli_num_rows($result)>0) 
			{
			while($res=mysqli_fetch_array($result)) 
				{
				?>
				<div style="height: 20px;"></div>
				<?php
				// Определяем текстовое название роли
				// Define a text title role
				$sql_textrole = "SELECT title FROM users_roles_tpl WHERE `tip`='$user_tip'";		
				$result_textrole = $mysqli->query($sql_textrole);
				$res_textrole=mysqli_fetch_array($result_textrole);
				$role_title=htmlentities($res_textrole['title']);
				$news_id=htmlentities($res['id']);
				$news_date=htmlentities($res['date']);
				$news_zagolovok=htmlentities($res['news_zagolovok']);
				$news=htmlentities($res['news']);
				?>
				<table class="newsone_table">
					<tr>
						<td>
							<?php echo $news_date.'<br /><b>'.html_entity_decode($news_zagolovok, ENT_QUOTES, 'utf-8').'</b>'; ?>
						</td>
					</tr>
					<tr>
						<td style="padding-top: 8px;">
							<?php echo html_entity_decode($news, ENT_QUOTES, 'utf-8'); ?>
						</td>
					</tr>
				</table>
				<?php
				}
			} 
		}
	?>
</p>
	
<p>
	<?php
	// Вывод количества страниц
	// Display the number of pages
	pagination($pagination_fetched_row,10,11);
	?>
</p>

<p>
	&nbsp;
</p>

<p>
	&nbsp;
</p>
