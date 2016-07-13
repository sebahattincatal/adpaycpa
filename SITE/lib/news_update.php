<?php

// Что будет если вызвано удаление новости
// What if caused by the removal of the news
if ($user_tip=='70' && isset($_GET['del']) && $_GET['del']!='')
	{
	$delnews=htmlentities($_GET['del']);
	$mysqli->query("DELETE FROM `news` WHERE `id`='$delnews'");
	header('location:' . $_SERVER['PHP_SELF']);
	exit;
	}

// Что будет если добавляется новость
// What happens if you add news
if ($user_tip=='70' && isset($_POST['addnews']) && $_POST['addnews']=='ok')
	{
	if (isset($_POST['news_small']) && isset($_POST['news_full']))
		{
		if ($_POST['news_small']!='' && $_POST['news_full']!='')
			{
			if ($_POST['komu']!='' && $_POST['komu']!='')
				{
				$news_small=htmlentities($_POST['news_small']); $news_full=htmlentities($_POST['news_full']); $komu=htmlentities($_POST['komu']);
				
				if (isset($_POST['public_news']) && $_POST['public_news']=='1')
					{
					$public_news=htmlentities($_POST['public_news']);
					}
				else
					{
					$public_news='0';
					}
				$mysqli->query("INSERT INTO `news` (`user_tip`,`news_zagolovok`,`news`,`public_news`) VALUES ('$komu','$news_small','$news_full','$public_news')");
				header('location:' . $_SERVER['PHP_SELF']);
				exit;
				}
			}
		}
	}

// Что будет если редактируется новость
// What if the news is edited
if ($user_tip=='70' && (isset($_POST['editnews']) && $_POST['editnews']=='ok') && isset($_POST['news_id']))
	{
	if (isset($_POST['news_small']) && isset($_POST['news_full']))
		{
		if ($_POST['news_small']!='' && $_POST['news_full']!='')
			{
			if ($_POST['komu']!='' && $_POST['komu']!='')
				{
				$news_id=htmlentities($_POST['news_id']);
				$news_small=htmlentities($_POST['news_small']); 
				$news_full=htmlentities($_POST['news_full']); 
				$komu=htmlentities($_POST['komu']);
				
				if (isset($_POST['public_news']) && $_POST['public_news']=='1')
					{
					$public_news=htmlentities($_POST['public_news']);
					}
				else
					{
					$public_news='0';
					}
				$mysqli->query("UPDATE `news` SET `user_tip`='$komu',`news_zagolovok`='$news_small',`news`='$news_full',`public_news`='$public_news' WHERE `id`='$news_id'");
				header('location:' . $_SERVER['PHP_SELF']);
				exit;
				}
			}
		}
	}

?>