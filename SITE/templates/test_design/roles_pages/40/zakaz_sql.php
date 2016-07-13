<?php

if (sizeof($result_to_display)) 
	{
	$cvet=0;
	foreach($result_to_display as $res) 
		{
		// Получаем данные о свойствах заказа и оффера к которому он относится
		// Get the data on the properties and offer order to which he belongs
		$offer_id=htmlentities($res['offer_id']);

		// Получаем буквенное имя оффера
		// Get the name of the letter offer
		$sql_offers_name = "SELECT name,deystvie FROM offers WHERE id = $offer_id";
		$result_offers_name = $mysqli->query($sql_offers_name);
		$res_offers_name=mysqli_fetch_array($result_offers_name);
		$offer_name=htmlentities($res_offers_name['name']);		
		$offer_deystvie=htmlentities($res_offers_name['deystvie']);		

		// Назначаем необходимые переменные
		// Assign the required variables
		$zakaz_id=htmlentities($res['id']);
		$zakaz_user_id=htmlentities($res['user_id']);
		$zakaz_number=htmlentities($res['zakaz_number']);
		$zakaz_cena=htmlentities($res['cena']);
		$zakaz_kolvo=htmlentities($res['kolvo']);
		$zakaz_status=htmlentities($res['status']);
		$zakaz_date=date('d.m.Y H:i:s', strtotime(htmlentities($res['date'])));
		$zakaz_date_obrabotka=htmlentities($res['date_obrabotka']);
		$zakaz_comments=htmlentities($res['comments']);
	
		$zakaz_date=date('d.m.Y', strtotime(htmlentities($res['date']))).'<br />'.date('H:i:s', strtotime(htmlentities($res['date'])));
		if ($res['date_obrabotka']!='') 
			{
			$zakaz_date_obrabotka=date('d.m.Y', strtotime(htmlentities($res['date_obrabotka']))).'<br />'.date('H:i:s', strtotime(htmlentities($res['date_obrabotka'])));
			}
		else
			{
			if ($offer_deystvie!=5)
				{
				$zakaz_date_obrabotka='<center>'.$loc['zakaz.php']['t137'].'<br />'.$loc['zakaz.php']['t138'].'</center>';
				}
			}
		$zakaz_comments=htmlentities($res['comments']);
		$zakaz_clientname=htmlentities($res['name']);
		$zakaz_clientphone=htmlentities($res['phone']);
		$zakaz_tracking_number=htmlentities($res['tracking_number']);
		$zakaz_zipcode=htmlentities($res['zipcode']);
		$zakaz_country=htmlentities($res['country']);
		$zakaz_short_country=htmlentities($res['short_country']);
		$zakaz_region=htmlentities($res['region']);
		$zakaz_town=htmlentities($res['town']);
		$zakaz_street=htmlentities($res['street']);
		$zakaz_dom=htmlentities($res['dom']);
		$zakaz_kvartira=htmlentities($res['kvartira']);
		$zakaz_client_address=htmlentities($res['client_address']);
		$zakaz_email=htmlentities($res['email']);
		$zakaz_ip=htmlentities($res['ip']);
		$zakaz_artikul=htmlentities($res['artikul']);
		?>
		
		<table class="zakaz_table_view">
			<tr>
				<td class="zakaz_table_view_number">
					<font color=gray><?php echo $loc['zakaz.php']['t139']; ?></font><br /><?php echo $zakaz_number; ?>
				</td>
				<td class="zakaz_table_view_name">
					<?php 
					if ($zakaz_status=='0') {echo '<div class="zakaz_table_view_status_0">'.$loc['zakaz.php']['t08'].'</div>';}
					if ($zakaz_status=='1') {echo '<div class="zakaz_table_view_status_1">'.$loc['zakaz.php']['t07'].'</div>';}
					if ($zakaz_status=='2') {echo '<div class="zakaz_table_view_status_2">'.$loc['zakaz.php']['t09'].'</div>';}
					if ($zakaz_status=='3') {echo '<div class="zakaz_table_view_status_3">'.$loc['zakaz.php']['t10'].'</div>';}

					// Проверка, назначено ли промо для оффера. Если не назначено, то выводим сообщение об этом
					// Check if the promo is scheduled to offer. If not set, the message about this
					if (file_exists('./tmp/offer'.$offer_id.'.jpg')) 
						{
						?>
						<a style="border: 0; text-decoration: none;" href="./zakaz.php?ob=<?php echo $zakaz_id; ?>"><img class="zakaz_table_view_imgoffer" src="./tmp/offer<?php echo $offer_id; ?>.jpg"></a>
						<?php
						}
					else
						{
						?>
						<a style="border: 0; text-decoration: none;" href="./zakaz.php?ob=<?php echo $zakaz_id; ?>"><div class="zakaz_table_view_imgoffer"></div></a>
						<?php
						}							
					?>
					<div class="zakaz_table_view_nametext">
						<a href="./zakaz.php?ob=<?php echo $zakaz_id; ?>"><b><?php echo html_entity_decode($offer_name, ENT_QUOTES, 'utf-8'); ?></b></a><br />
						<font color=gray><?php echo $loc['zakaz.php']['t26']; ?>&nbsp;<?php echo $zakaz_cena; ?>&nbsp;<?php echo $loc['zakaz.php']['t140']; ?>&nbsp;,&nbsp;<?php echo $loc['zakaz.php']['t27']; ?>&nbsp;<?php echo $zakaz_kolvo; ?>,&nbsp;<?php echo $loc['zakaz.php']['t141']; ?>&nbsp;<?php echo $zakaz_cena*$zakaz_kolvo; ?>&nbsp;<?php echo $loc['zakaz.php']['t140']; ?>&nbsp;</font>
					</div>
				</td>
				<td class="zakaz_table_view_date">
					<?php echo $zakaz_date; ?>
				</td>
				<td class="zakaz_table_view_date" style="<?php if ($res['date_obrabotka']=='' && $offer_deystvie!=5) {echo 'background: yellow; color: red;';} ?>">
					<?php echo $zakaz_date_obrabotka; ?>
				</td>				
				<td width="285" class="zakaz_table_view_comments">
					<a href="./zakaz.php?ob=<?php echo $zakaz_id; ?>"><?php echo TrimText($zakaz_comments,130); ?></a>
				</td>
				<td class="zakaz_table_view_geo">
					<?php echo '<b>'.$loc['zakaz.php']['t142'].'&nbsp;</b>'.$zakaz_ip;
					$zakaz_short_country=strtolower($zakaz_short_country);
					// Проверка, есть ли в наличии картинка под определяемую страну
					// Check whether there is a presence of the picture under the defined country
					if (file_exists('./modules/detectclient/SxGeo/img/'.$zakaz_short_country.'.png')) 
						{
						echo '<br /><img src=./modules/detectclient/SxGeo/img/'.$zakaz_short_country.'.png> ';
						echo $zakaz_country;
						}
					else
						{
						echo '<br />'.$zakaz_country;
						}
					if ($zakaz_user_id!='0') 
						{
						echo '<br /><b>'.$loc['zakaz.php']['t143'].'&nbsp;</b>'.$zakaz_user_id;
						}
					else
						{
						echo '<br /><b>'.$loc['zakaz.php']['t144'].'</b>';	
						}
					?>
				</td>
			</tr>
		</table>
		<?php
		}
	}	
	
?>