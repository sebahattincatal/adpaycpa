
<?php
// Подключаем дополнительные функции для работы статистики
// Connect additional functions for statistics
include './includes/stats/index.php';
?>

<script type="text/javascript" src="./templates/<?php echo $template; ?>/js/moment.min.js"></script>
<script src="./templates/<?php echo $template; ?>/js/range.js"></script>
<link rel="stylesheet" type="text/css" href="./templates/<?php echo $template; ?>/css/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="./templates/<?php echo $template; ?>/css/bootstrap.css" />


<aside class="widget">
	<div class="widget-header">
		<div class="row">
			<div class="widget-title col-sm-6 col-xs-12">
				<h3>Statistics</h3>
				<span>ADPAY statistics Summary</span>
			</div><!-- widget-title -->
		</div><!-- row -->
	</div><!-- widget-header -->

	<div class="widget-content">
		<div class="row">

			<div class="statics-table-form-filter">
				<div class="asd">
					<div class="row">
						<form id="filter" method="post" action="./stats.php">
							<div class="col-sm-6 form-filter-item">
								<label><?php echo $loc['stats.php']['t02']; ?></label>
								<select class="form-control" name="date1" id="datepicker">
									<option value="0">Today</option>
									<option value="1">Yesterday</option>
									<option value="2" selected="selected">7 Days</option>
									<option value="3">Last 30 Days</option>
									<option value="4">This Month</option>
									<option value="5">Last Month</option>
									<option value="6">Arbitrarily</option>
								</select>
							</div>
							<div class="col-sm-6 form-filter-item">
								<label><?php echo $loc['stats.php']['t03']; ?></label>
								<select name="offer" class="form-control">
									<option class="options" value="0" <?php if (isset($_POST['offer']) && $_POST['offer']=="0") { ?>selected="selected"<?php } ?>><?php echo $loc['stats.php']['t04']; ?></option>
									<?php
									// Получаем и выводим список офферов
									// Get and display a list of offers
									$offers = get_offers($user_id);
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
							</div>
							
							<div class="col-sm-8 form-filter-item last-item">
								<button class="btn" name="submit" value="<?php echo $loc['button']['t02']; ?>" type="submit"><?php echo $loc['button']['t02']; ?></button>
								<a href="./stats.php"><?php echo $loc['stats.php']['t08']; ?></a>
							</div>
						</form><!-- form -->
					</div><!-- row -->
				</div>
			</div><!-- statics-table-form-filter -->
			
			<div class="statics-table text-center">

				<div class="table-responsive">
					<table class="list-table display table" width="100%" >
				        <thead>
				          <tr>
			                  <th colspan="3"><?php echo $loc['stats.php']['t10']; ?></th>
			                  <th colspan="4"><?php echo $loc['stats.php']['t11']; ?></th>
			                  <th colspan="4"><?php echo $loc['stats.php']['t12']; ?></th>
							  <th colspan="2"><?php echo $loc['stats.php']['t13']; ?></th>
			              </tr>
				          <tr>
				            <th><?php echo $loc['stats.php']['t14']; ?></th>
							<th width="66"><?php echo $loc['stats.php']['t15']; ?></th>
							<th width="66"><?php echo $loc['stats.php']['t16']; ?></th>
							<th width="85"><?php echo $loc['stats.php']['t17']; ?></th>
							<th width="85"><?php echo $loc['stats.php']['t18']; ?></th>
							<th width="85"><?php echo $loc['stats.php']['t19']; ?></th>
							<th width="85"><?php echo $loc['stats.php']['t20']; ?></th>
							<th width="85"><?php echo $loc['stats.php']['t17']; ?></th>
							<th width="85"><?php echo $loc['stats.php']['t18']; ?></th>
							<th width="85"><?php echo $loc['stats.php']['t19']; ?></th>
							<th width="85"><?php echo $loc['stats.php']['t20']; ?></th>
							<th width="50" title="<?php echo $loc['stats.php']['t21']; ?>"><?php echo $loc['stats.php']['t23']; ?></th>
							<th width="50" title="<?php echo $loc['stats.php']['t22']; ?>"><?php echo $loc['stats.php']['t24']; ?></th>
				          </tr>
				        </thead>
				        <tbody>
				          <?php  
							$recs = array();
							$recs[$dat2] = array('hosts'=>0, 'visits' => 0, 'zakaz_ok' => 0, 'zakaz_hold' => 0, 'zakaz_wait' => 0, 'zakaz_cancel' => 0, 'comission_ok' => 0, 'comission_hold' => 0, 'comission_wait' => 0, 'comission_cancel' => 0);
							if (isset($tdat1) && isset($tdat2)) 
								{
								for ($i = $tdat2; $i>=$tdat1; $i--) 
									{
									if (!checkdate(substr($i,4,2),substr($i,6,2),substr($i,0,4)))
									continue;
									$j=date('Y-m-d',strtotime($i));
									$recs[$j] = array('hosts'=>0, 'visits' => 0, 'zakaz_ok' => 0, 'zakaz_hold' => 0, 'zakaz_wait' => 0, 'zakaz_cancel' => 0, 'comission_ok' => 0, 'comission_hold' => 0, 'comission_wait' => 0, 'comission_cancel' => 0);
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
							$comission_ok_all = 0;
							$comission_hold_all = 0;		
							$comission_wait_all = 0;	
							$comission_cancel_all = 0;	
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
								$comission_ok=htmlentities($rec['comission_ok']);
								$comission_hold=htmlentities($rec['comission_hold']);
								$comission_wait=htmlentities($rec['comission_wait']);
								$comission_cancel=htmlentities($rec['comission_cancel']);	
									
								// Назначаем переменные для вывода сводных данных (итого)
								// Assign variables to display summary data (total)
								$visits_all+=$visits;
								$hosts_all+=$hosts;
								$zakaz_ok_all+=$zakaz_ok;
								$zakaz_hold_all+=$zakaz_hold;
								$zakaz_wait_all+=$zakaz_wait;
								$zakaz_cancel_all+=$zakaz_cancel;
								$comission_ok_all+=$comission_ok;
								$comission_hold_all+=$comission_hold;
								$comission_wait_all+=$comission_wait;
								$comission_cancel_all+=$comission_cancel;
								
								?>
								<tr class="<?php if ( $cvet & 1 ) {echo 'col2';} else {echo '';} $cvet++; ?>">
									<td><nobr><?php $qdata = strtotime( $date ); echo date( 'd.m.Y', $qdata ); ?></nobr></td>
									<th><nobr><?php echo $visits; ?></nobr></th>
									<th><nobr><?php echo $hosts; ?></nobr></th>
									<th><nobr><?php echo $zakaz_ok; ?></nobr></th>
									<th><nobr><?php echo $zakaz_hold; ?></nobr></th>
									<th><nobr><?php echo $zakaz_wait; ?></nobr></th>
									<th><nobr><?php echo $zakaz_cancel; ?></nobr></th>
									<th><nobr><?php echo $comission_ok; ?>&nbsp;<?php echo $loc['stats.php']['t26']; ?>&nbsp;</nobr></th>
									<th><nobr><?php echo $comission_hold; ?>&nbsp;<?php echo $loc['stats.php']['t26']; ?>&nbsp;</nobr></th>
									<th><nobr><?php echo $comission_wait; ?>&nbsp;<?php echo $loc['stats.php']['t26']; ?>&nbsp;</nobr></th>
									<th><nobr><?php echo $comission_cancel; ?>&nbsp;<?php echo $loc['stats.php']['t26']; ?>&nbsp;</nobr></th>
									<th><nobr><?php if ($hosts!='0') {echo round($zakaz_ok/$hosts*100, 0);} else {echo '0';} ?></nobr></th>
									<th><nobr><?php if ($hosts!='0') {echo round($comission_ok/$hosts, 0);} else {echo '0';} ?></nobr></th>
								</tr>
								<?php
								}  
							?>			          
				        </tbody>
				        <tfoot>
				          <tr>
				            <th><nobr><b><?php echo $loc['stats.php']['t27']; ?></b></nobr></th>
							<th width="66"><nobr><?php echo $visits_all; ?></nobr></th>
							<th width="66"><nobr><?php echo $hosts_all; ?></nobr></th>
							<th width="85"><nobr><?php echo $zakaz_ok_all; ?></nobr></th>
							<th width="85"><nobr><?php echo $zakaz_hold_all; ?></nobr></th>
							<th width="85"><nobr><?php echo $zakaz_wait_all; ?></nobr></th>
							<th width="85"><nobr><?php echo $zakaz_cancel_all; ?></nobr></th>
							<th width="85"><nobr><?php echo $comission_ok_all; ?>&nbsp;<?php echo $loc['stats.php']['t26']; ?>&nbsp;</nobr></th>
							<th width="85"><nobr><?php echo $comission_hold_all; ?>&nbsp;<?php echo $loc['stats.php']['t26']; ?>&nbsp;</nobr></th>
							<th width="85"><nobr><?php echo $comission_wait_all; ?>&nbsp;<?php echo $loc['stats.php']['t26']; ?>&nbsp;</nobr></th>
							<th width="85"><nobr><?php echo $comission_cancel_all; ?>&nbsp;<?php echo $loc['stats.php']['t26']; ?>&nbsp;</nobr></th>
							<th width="50"><nobr><?php if ($hosts_all!='0'){echo round($zakaz_ok_all/$hosts_all*100, 0);} else {echo '0';}?></nobr></th>
							<th width="50"><nobr><?php if ($hosts_all!='0'){echo round($comission_ok_all/$hosts_all, 0);} else {echo '0';}?></nobr></th>
				          </tr>
				        </tfoot>
					</table>
				</div>

			</div><!-- statics-table -->

		</div><!-- row -->
	</div><!-- widget-content -->
</aside><!-- widget -->

<?php
include ('./templates/'.$template.'/checkform/datepicker_addscript.php');
?>




			