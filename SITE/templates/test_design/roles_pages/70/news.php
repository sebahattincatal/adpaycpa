
<h1><?php echo $loc['news.php']['t02']; ?></h1>

<?php 
// Обработка ситуации, когда новость вызвана на редактирование
// Handle the situation, when the news due to editing
if (isset($_GET['edit']) && $_GET['edit']!='')
	{
	$news_id=htmlentities($_GET['edit']);
	// Если новость действительно есть в базе, то выводим ее на редактирование
	// If the news really is in the database, then displays it on the edit
	$sql_news= "SELECT id,DATE_FORMAT(date, '%d.%m.%Y / %H:%i:%s') as date,user_tip,news_zagolovok,news,public_news FROM news WHERE `id`='$news_id'";		
	$result_news = $mysqli->query($sql_news);
	if (mysqli_num_rows($result_news)>0) 
		{
		$res_news=mysqli_fetch_array($result_news);
		$news_user_tip=htmlentities($res_news['user_tip']);
		$news_date=htmlentities($res_news['date']);
		$news_zagolovok=htmlentities($res_news['news_zagolovok']);
		$news=htmlentities($res_news['news']);
		$public_news=htmlentities($res_news['public_news']);
		// Выводим форму добавления новостей
		// Display the form of adding news
		include './templates/'.$template.'/blocks/edit_news_form.php';
		}
	}
else
	{
	?>
	<p>
		<?php
		if (isset($_GET['vyvesti']) && $_GET['vyvesti']!='')
			{
			if ($_GET['vyvesti']=='all')
				{
				$vyvesti="all";
				$result = $mysqli->query( "SELECT COUNT(id) AS count FROM `news`" );
				}
			else
				{
				$vyvesti=htmlentities($_GET['vyvesti']);
				$result = $mysqli->query( "SELECT COUNT(id) AS count FROM `news` WHERE `user_tip`='$vyvesti'" );
				}	
			}
		else
			{
			$vyvesti="all";
			$result = $mysqli->query( "SELECT COUNT(id) AS count FROM `news`" );
			}
		function build_pagination_url( $page ) 
			{
			$parameters = array('page' => $page);
			global $vyvesti;
			return '?' . http_build_query( $parameters ).'&vyvesti='.$vyvesti;
			}		
		?>
	</p>
	
	<p>
		<?php
		// Выводим форму добавления новостей
		// Display the form of adding news
		include './templates/'.$template.'/blocks/add_news_form.php';
		?>
	</p>
	
	<p>
		&nbsp;
	</p>
	
	<p>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
		<b><?php echo $loc['news.php']['t03']; ?>&nbsp;</b>
		<select name="vyvesti" onchange="this.form.submit();">
			<?php
			// Вывести только те роли, которые активны на данный момент
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
					<option value="<?php echo $role_tip; ?>" <?php if (!isset($vyvesti) || $vyvesti=='') {$vyvesti=$user_tip;} if ($role_tip==$vyvesti) {echo 'selected="selected"';} ?>><?php echo $role_title; ?></option>
					<?php
					}
				}
			?>
			<option value="all" <?php if (!isset($vyvesti) || $vyvesti=='') {$vyvesti=$user_tip;} if ($vyvesti=='all') {echo 'selected="selected"';} ?>><?php echo $loc['news.php']['t04']; ?></option>
		</select>
		</form>
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
			if (!isset($vyvesti) || $vyvesti=='') {$vyvesti=$user_tip;}
			if ($vyvesti=='all') 
				{
				$sql = "SELECT DATE_FORMAT(date, '%d.%m.%Y / %H:%i:%s') as date,news_zagolovok,news,id,user_tip,public_news FROM news ORDER BY `id` DESC LIMIT $offset, $show_pages";
				}
				else
				{
				$sql = "SELECT DATE_FORMAT(date, '%d.%m.%Y / %H:%i:%s') as date,news_zagolovok,news,id,public_news FROM news WHERE `user_tip`='$vyvesti' ORDER BY `id` DESC LIMIT $offset, $show_pages";
				}
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
					if (!isset($vyvesti) || $vyvesti=='') {$vyvesti=$user_tip;}
					if ($vyvesti=='all') 
						{
						$uznat_rol=htmlentities($res['user_tip']);
						$sql_textrole = "SELECT title FROM users_roles_tpl WHERE `tip`='$uznat_rol'";		
						}
					else
						{
						$sql_textrole = "SELECT title FROM users_roles_tpl WHERE `tip`='$vyvesti'";		
						}
					$result_textrole = $mysqli->query($sql_textrole);
					$res_textrole=mysqli_fetch_array($result_textrole);
					$role_title=htmlentities($res_textrole['title']);
					$news_id=htmlentities($res['id']);
					$news_date=htmlentities($res['date']);
					$news_zagolovok=htmlentities($res['news_zagolovok']);
					$news=htmlentities($res['news']);
					$public_news=htmlentities($res['public_news']);
					?>
					<table class="newsone_table">
						<tr>
							<td>
								<?php 
								echo $news_date;
								if ($public_news=='1')
									{
									echo '&nbsp; <font style="background: yellow;">'.$loc['news.php']['t05'].'</font>';
									}
								echo '&nbsp;&nbsp;'.$loc['news.php']['t06'].'&nbsp;'.$role_title;
								echo '<br /><b>'.html_entity_decode($news_zagolovok, ENT_QUOTES, 'utf-8').'</b>'; 
								?>
							</td>
						</tr>
						<tr>
							<td style="padding-top: 8px;">
								<?php echo html_entity_decode($news, ENT_QUOTES, 'utf-8'); ?>
								<div align="right"><a href="./news.php?edit=<?php echo $news_id; ?>"><?php echo $loc['news.php']['t07']; ?></a> | <a href="./news.php?del=<?php echo $news_id; ?>" onclick="if (!confirm('<?php echo $loc['news.php']['t08']; ?>'))return false;"><?php echo $loc['news.php']['t09']; ?></a></div>
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
	
	
	<?php
	}
?>
	
<p>
	&nbsp;
</p>

<p>
	&nbsp;
</p>



