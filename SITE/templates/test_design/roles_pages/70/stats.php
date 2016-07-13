
<?php
// Подключаем дополнительные функции для работы статистики
// Connect additional functions for statistics
include './includes/stats/index.php';
?>

<script type="text/javascript" src="./templates/<?php echo $template; ?>/js/moment.min.js"></script>
<script src="./templates/<?php echo $template; ?>/js/range.js"></script>
<link rel="stylesheet" type="text/css" href="./templates/<?php echo $template; ?>/css/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="./templates/<?php echo $template; ?>/css/bootstrap.css" />

<h1><?php echo $loc['stats.php']['t01']; ?></h1>

<p>
	<!-- Блок с фильтром -->
	<!-- Block filter -->
	<form id="filter" method="post" action="./stats.php">
		<div class="v_odin_ryad">
			<p>
				<span>
					<b><?php echo $loc['stats.php']['t02']; ?>&nbsp;</b>
					<input type="text" name="date1" id="datepicker" style="text-align: center; width: 169px; height: 18px;" readonly />
				</span>
			</p>
			<p>
				<span>
					<b><?php echo $loc['stats.php']['t03']; ?>&nbsp;</b>
					<select name="offer" style="text-align: left; width: 300px; height: 25px;">
						<option class="options" value="0" <?php if (isset($_POST['offer']) && $_POST['offer']=="0") { ?>selected="selected"<?php } ?>><?php echo $loc['stats.php']['t04']; ?></option>
						<?php
						// Получаем и выводим список офферов
						// Get and display a list of offers
						$offers = get_offers_admin();
						if ($offers!=null)
							{
							foreach($offers as $offer)
								{
								$of_id=htmlentities($offer['id']);
								$of_name=htmlentities($offer['name']);
								echo '<option value="'.$of_id.'" ';
								if (isset($_POST['offer']) && $_POST['offer'] == $of_id) echo 'selected';
								echo '>'.html_entity_decode($of_name, ENT_QUOTES, 'utf-8').'</option>';
								}
							}
						?>
					</select>
				</span>
			</p>
		</div>
		<div class="v_odin_ryad">
			<p>
				<input name="submit" value="<?php echo $loc['button']['t02']; ?>" class="others_button_vyvesti" type="submit" style="margin-bottom: 2px;"><br />
				<a href="./stats.php"><?php echo $loc['stats.php']['t08']; ?></a>
			</p>
		</div>
	</form>
	<!-- Конец блока с фильтром -->
	<!-- End block with filter -->
</p>

<p>
	<table class="stats_table" width="100%">
		<tr class="table_zagolovki">
			<td colspan="13"><?php echo $loc['stats.php']['t09']; ?></td>
		</tr>		
		<tr style="background: #e1ecf5;">
			<td>&nbsp;</td>
			<td colspan="2"><?php echo $loc['stats.php']['t10']; ?></td>
			<td colspan="4"><?php echo $loc['stats.php']['t11']; ?></td>
			<td colspan="4"><?php echo $loc['stats.php']['t32']; ?></td>
			<td colspan="2"><?php echo $loc['stats.php']['t13']; ?></td>
		</tr>	
		<tr style="font-weight: bold; background: #e1ecf5;">
			<td><?php echo $loc['stats.php']['t14']; ?></td>
			<td width="66"><?php echo $loc['stats.php']['t15']; ?></td>
			<td width="66"><?php echo $loc['stats.php']['t16']; ?></td>
			<td width="85"><?php echo $loc['stats.php']['t17']; ?></td>
			<td width="85"><?php echo $loc['stats.php']['t18']; ?></td>
			<td width="85"><?php echo $loc['stats.php']['t19']; ?></td>
			<td width="85"><?php echo $loc['stats.php']['t20']; ?></td>
			<td width="85"><?php echo $loc['stats.php']['t17']; ?></td>
			<td width="85"><?php echo $loc['stats.php']['t18']; ?></td>
			<td width="85"><?php echo $loc['stats.php']['t19']; ?></td>
			<td width="85"><?php echo $loc['stats.php']['t20']; ?></td>
			<td width="50" title="<?php echo $loc['stats.php']['t21']; ?>"><?php echo $loc['stats.php']['t23']; ?></td>			
			<td width="50" title="<?php echo $loc['stats.php']['t22']; ?>"><?php echo $loc['stats.php']['t24']; ?></td>
		</tr>

		<?php  
		$recs = array();
		$recs[$dat2] = array('hosts'=>0, 'visits' => 0, 'zakaz_ok' => 0, 'zakaz_hold' => 0, 'zakaz_wait' => 0, 'zakaz_cancel' => 0, 'comission_cpa_ok' => 0, 'comission_cpa_hold' => 0, 'comission_cpa_wait' => 0, 'comission_cpa_cancel' => 0);
		if (isset($tdat1) && isset($tdat2)) 
			{
			for ($i = $tdat2; $i>=$tdat1; $i--) 
				{
				if (!checkdate(substr($i,4,2),substr($i,6,2),substr($i,0,4)))
				continue;
				$j=date('Y-m-d',strtotime($i));
				$recs[$j] = array('hosts'=>0, 'visits' => 0, 'zakaz_ok' => 0, 'zakaz_hold' => 0, 'zakaz_wait' => 0, 'zakaz_cancel' => 0, 'comission_cpa_ok' => 0, 'comission_cpa_hold' => 0, 'comission_cpa_wait' => 0, 'comission_cpa_cancel' => 0);
				}
			} 
		else echo $loc['stats.php']['t25'];
		
		include('stats_sql.php');
		
		$visits_all = 0;
		$hosts_all = 0;
		$zakaz_ok_all = 0;	
		$zakaz_hold_all = 0;
		$zakaz_wait_all = 0;
		$zakaz_cancel_all = 0;
		$comission_cpa_ok_all = 0;
		$comission_cpa_hold_all = 0;		
		$comission_cpa_wait_all = 0;	
		$comission_cpa_cancel_all = 0;	
		$cvet=0;
		foreach ( $recs as $date => $rec ) 
			{
			// Назначаем переменные для вывода в ежедневных данных	
			// Assign variables to display in daily data
			$visits=htmlentities($rec['visits']);
			$hosts=htmlentities($rec['hosts']);
			$zakaz_ok=htmlentities($rec['zakaz_ok']);
			$zakaz_hold=htmlentities($rec['zakaz_hold']);
			$zakaz_wait=htmlentities($rec['zakaz_wait']);
			$zakaz_cancel=htmlentities($rec['zakaz_cancel']);
			$comission_cpa_ok=htmlentities($rec['comission_cpa_ok']);
			$comission_cpa_hold=htmlentities($rec['comission_cpa_hold']);
			$comission_cpa_wait=htmlentities($rec['comission_cpa_wait']);
			$comission_cpa_cancel=htmlentities($rec['comission_cpa_cancel']);	
				
			// Назначаем переменные для вывода сводных данных (итого)
			// Assign variables to display summary data (total)
			$visits_all+=$visits;
			$hosts_all+=$hosts;
			$zakaz_ok_all+=$zakaz_ok;
			$zakaz_hold_all+=$zakaz_hold;
			$zakaz_wait_all+=$zakaz_wait;
			$zakaz_cancel_all+=$zakaz_cancel;
			$comission_cpa_ok_all+=$comission_cpa_ok;
			$comission_cpa_hold_all+=$comission_cpa_hold;
			$comission_cpa_wait_all+=$comission_cpa_wait;
			$comission_cpa_cancel_all+=$comission_cpa_cancel;
			
			?>
			<tr class="<?php if ( $cvet & 1 ) {echo 'col2';} else {echo '';} $cvet++; ?>">
				<td><nobr><?php $qdata = strtotime( $date ); echo date( 'd.m.Y', $qdata ); ?></nobr></td>
				<td><nobr><?php echo $visits; ?></nobr></td>
				<td><nobr><?php echo $hosts; ?></nobr></td>
				<td><nobr><?php echo $zakaz_ok; ?></nobr></td>
				<td><nobr><?php echo $zakaz_hold; ?></nobr></td>
				<td><nobr><?php echo $zakaz_wait; ?></nobr></td>
				<td><nobr><?php echo $zakaz_cancel; ?></nobr></td>
				<td><nobr><?php echo $comission_cpa_ok; ?>&nbsp;<?php echo $loc['stats.php']['t26']; ?>&nbsp;</nobr></td>
				<td><nobr><?php echo $comission_cpa_hold; ?>&nbsp;<?php echo $loc['stats.php']['t26']; ?>&nbsp;</nobr></td>
				<td><nobr><?php echo $comission_cpa_wait; ?>&nbsp;<?php echo $loc['stats.php']['t26']; ?>&nbsp;</nobr></td>
				<td><nobr><?php echo $comission_cpa_cancel; ?>&nbsp;<?php echo $loc['stats.php']['t26']; ?>&nbsp;</nobr></td>
				<td><nobr><?php if ($hosts!='0') {echo round($zakaz_ok/$hosts*100, 0);} else {echo '0';} ?></nobr></td>
				<td><nobr><?php if ($hosts!='0') {echo round($comission_cpa_ok/$hosts, 0);} else {echo '0';} ?></nobr></td>
			</tr>
			<?php
			}  
		?>	
		</table>
		<br />
		<table class="stats_table" width="100%">
		<tr style="background: #e1ecf5;">
			<td><nobr><b><?php echo $loc['stats.php']['t27']; ?></b></nobr></td>
			<td width="66"><nobr><?php echo $visits_all; ?></nobr></td>
			<td width="66"><nobr><?php echo $hosts_all; ?></nobr></td>
			<td width="85"><nobr><?php echo $zakaz_ok_all; ?></nobr></td>
			<td width="85"><nobr><?php echo $zakaz_hold_all; ?></nobr></td>
			<td width="85"><nobr><?php echo $zakaz_wait_all; ?></nobr></td>
			<td width="85"><nobr><?php echo $zakaz_cancel_all; ?></nobr></td>
			<td width="85"><nobr><?php echo $comission_cpa_ok_all; ?>&nbsp;<?php echo $loc['stats.php']['t26']; ?>&nbsp;</nobr></td>
			<td width="85"><nobr><?php echo $comission_cpa_hold_all; ?>&nbsp;<?php echo $loc['stats.php']['t26']; ?>&nbsp;</nobr></td>
			<td width="85"><nobr><?php echo $comission_cpa_wait_all; ?>&nbsp;<?php echo $loc['stats.php']['t26']; ?>&nbsp;</nobr></td>
			<td width="85"><nobr><?php echo $comission_cpa_cancel_all; ?>&nbsp;<?php echo $loc['stats.php']['t26']; ?>&nbsp;</nobr></td>
			<td width="50"><nobr><?php if ($hosts_all!='0'){echo round($zakaz_ok_all/$hosts_all*100, 0);} else {echo '0';}?></nobr></td>
			<td width="50"><nobr><?php if ($hosts_all!='0'){echo round($comission_cpa_ok_all/$hosts_all, 0);} else {echo '0';}?></nobr></td>		
		</tr>  		
	</table>
</p>

<?php
include ('./templates/'.$template.'/checkform/datepicker_addscript.php');
?>
