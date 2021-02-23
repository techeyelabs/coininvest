<?php 
// date_default_timezone_set("Europe/London");
date_default_timezone_set('Etc/GMT');
session_start();
require( __DIR__ .'/connect.php');

$userid = trim($_SESSION['userid']);
$current_password = trim($_POST['current_password']);
$new_password = trim($_POST['new_password']);
$new_password_confirm = trim($_POST['new_password_confirm']);


$row = mysql_fetch_array(mysql_query("select * from members where member_id=". $userid));

$old_pass = $row['password'];
//echo '<br/>';
//echo base64_encode(base64_encode($current_password));
//echo '<br/>';

if ($old_pass == '') {
    $flag = 1;
    $_SESSION['empty_current_password']="<p class='error_message'style='margin-bottom:0px;'>Current password required</p>";
}

if ($new_password == '') {
    $flag = 1;
    $_SESSION['empty_new_password']="<p class='error_message'style='margin-bottom:0px;'>Current password required</p>";
}

if ($new_password_confirm == '') {
    $flag = 1;
    $_SESSION['empty_new_password_confirmation']="<p class='error_message'style='margin-bottom:0px;'>Current password required</p>";
}

if($old_pass != base64_encode(base64_encode($current_password))) {
    $flag = 1;
    $_SESSION['old_password_not_matched']="<p class='error_message'style='margin-bottom:0px;'>Current password not matched</p>";
} 
if ($new_password != $new_password_confirm) {
     $flag = 1;
    $_SESSION['new_confirm_new_password_not_matched']="<p class='error_message' style='margin-bottom:0px;'><span>New password and new confirm password not matched</span></p>";
}
//print_r($row);


if ($flag != 1) {
    
    	$password = base64_encode(base64_encode($_POST['new_password']));
    	$p = "update members set password='".$password."', readable_pass='". $new_password ."' where member_id=". $userid ;
       mysql_query($p);
         $_SESSION['success_pass_change']='<p class="success_message" style="text-align:center;margin-bottom:0px;">Password changed successfully</p>';
        echo '<meta http-equiv="refresh" content="0;url=change_password.php">';
		exit();
}
	else
		{		
			 
			 echo '<meta http-equiv="refresh" content="0;url=change_password.php">';
			exit(); 
		}
		 


?>