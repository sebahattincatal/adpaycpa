
<aside class="widget">
	<div class="widget-header">
		<div class="row">
			<div class="widget-title col-sm-6 col-xs-12">
				<h3><?php echo $loc['multiacc.php']['t01']; ?></h3>
			</div><!-- widget-title -->
			<?php
				$sql_detect_multiacc = "SELECT `id`,`email`,`user_session` FROM `users` WHERE `user_session` IN (SELECT `user_session` FROM `users` GROUP BY `user_session` HAVING count(*)>1) ORDER BY `id` ASC";
				$result_detect_multiacc = $mysqli->query($sql_detect_multiacc);
				$multiacc_kolvo=0;
				$multiacc_number=1;
				$multiacc_emails='';
				$id_cur_check_user_session='';
				if (mysqli_num_rows($result_detect_multiacc) > 0) 
					{
					while($res_detect_multiacc=mysqli_fetch_array($result_detect_multiacc)) 
						{
						echo '<div>';
						$id_cur_acc=htmlentities($res_detect_multiacc['id']);
						$email_cur_acc=htmlentities($res_detect_multiacc['email']);
						$id_cur_user_session=htmlentities($res_detect_multiacc['user_session']);
						if ($id_cur_user_session!=$id_cur_check_user_session && $id_cur_check_user_session!='') {$multiacc_emails.='<br /><br />'; $multiacc_number='1';}
						$id_cur_check_user_session=htmlentities($res_detect_multiacc['user_session']);
						$multiacc_kolvo++;
						if ($multiacc_number=='1')
							{
							$multiacc_emails.=' <a target="_blank" href="./users.php?edit='.$id_cur_acc.'" style="background: green; color: white; border: 1px dashed white;">'.$email_cur_acc.'</a> ';
							}
						else
							{
							$multiacc_emails.=' <a target="_blank" href="./users.php?edit='.$id_cur_acc.'">'.$email_cur_acc.'</a> ';
							}
						$multiacc_number++;
						echo '</div>';
						}
					}
				?>
		</div><!-- row -->
	</div><!-- widget-header -->

	<div class="widget-content">
		<div class="row">
			<div class="multiaccount-content">
				<span><strong><?php echo $loc['multiacc.php']['t02']; ?></strong>: <?php echo $multiacc_kolvo; ?></span>
				<h3><?php echo $loc['multiacc.php']['t03']; ?> </h3>
				<div class="users-ml">
					<a class="featured" href="#"><?php echo $multiacc_emails; ?></a>
					<a href="#"><?php echo $multiacc_emails; ?></a>
				</div><!-- users-ml -->
				<span><?php echo $loc['multiacc.php']['t04']; ?></span>
			</div><!-- multiaccount-content -->
		</div><!-- row -->
	</div><!-- widget-content -->
</aside><!-- widget -->