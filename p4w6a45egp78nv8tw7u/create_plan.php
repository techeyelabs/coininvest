<?php  
// date_default_timezone_set("Europe/London");
date_default_timezone_set('Etc/GMT');
session_start();
require 'include/connect.php';
if(empty ($_SESSION['adminuser']))
{
 echo '<meta http-equiv="refresh" content="0; url=index.php" />';
 exit();
 }

/* if($my > 0)
 {
 	$_SESSION['success_flag']='<font color="#006600">You have already created the Interest rate for today</font>';
 	 echo '<meta http-equiv="refresh" content="0; url=view_interest.php" />';
	 exit();
 }
 */
 require 'include/header.php';
 require 'templates/create_plan.php';
 require 'include/footer.php';
 ?>