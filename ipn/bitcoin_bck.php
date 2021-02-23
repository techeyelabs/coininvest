<?php
error_reporting(E_ALL);
echo"Sdf";
	
require ('include/connect.php');
	
	echo"sdfs";
	/*$connect   = mysql_connect($hostname,$hostuser,$hostpass);
	
	$database  = mysql_select_db($dbname,$connect);
	
	require ('../include/definevalues.php');
	
	require('../include/sendmail.php');*/
	echo "insert into deposit(wwwuserid,plan_id,gateway_id,amount,compound,compound_rate,investor_date,status) 
	values('".$_POST['userid']."','".$_POST['planid']."','".$_POST['payid']."','".$_POST['amount']."','".$_POST['amount']."','".$_POST['compound']."','".date('Y-m-d H:i:s')."','new')";
exit;
	
	$insert = mysql_query("insert into deposit(wwwuserid,plan_id,gateway_id,amount,compound,compound_rate,investor_date,status) 
	values('".$_POST['userid']."','".$_POST['planid']."','".$_POST['payid']."','".$_POST['amount']."','".$_POST['amount']."','".$_POST['compound']."','".date('Y-m-d H:i:s')."','new')");


	/*$insert = mysql_query("insert into  deposit_request(wwwuserid,plan_id,gateway_id,amount,investor_date) 
	values('".$_POST['userid']."','".$_POST['planid']."','".$_POST['payid']."','".$_POST['amount']."','".date('Y-m-d H:i:s')."')");*/
	
	if($insert)
	{
		echo '<meta content="0;url=../success.php" http-equiv="refresh">';
		exit();
	}


?>