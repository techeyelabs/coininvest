<?php
session_start();
require 'include/connect.php';
if(empty ($_SESSION['adminuser']))
{
 echo '<meta http-equiv="refresh" content="0; url=index.php" />';
 exit();
 }
 $my = mysql_num_rows(mysql_query("SELECT * FROM `daily_interest` where change_date ='".date('Y-m-d')."' ORDER BY `daily_interest`.`plan_id` ASC"));
/* if($my > 0)
 {
 	$_SESSION['success_flag']='<font color="#006600">You have already created the Interest rate for today</font>';
 	 echo '<meta http-equiv="refresh" content="0; url=view_interest.php" />';
	 exit();
 }
 */
 require 'include/header.php';
 require 'templates/add_interest.php';
 require 'include/footer.php';
 ?>