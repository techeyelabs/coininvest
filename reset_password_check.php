<?php 
// date_default_timezone_set("Europe/London");
date_default_timezone_set('Etc/GMT');
session_start();
require( __DIR__ .'/connect.php');

$uid = trim($_POST['uid']);
$email = trim($_POST['email']);
$new_password = trim($_POST['new_password']);
$new_confirm_password = trim($_POST['new_confirm_password']);

// print_r($_POST);

if ($new_password != $new_confirm_password) {
   $flag=1;
   $_SESSION['password_matched']="<span class='formerror_1'>Password not matched</span>";
}
if (!empty($email)) {
   $query = "select * from members where member_email='". $email ."'";
   $row =  mysql_fetch_array(mysql_query($query));
   if (empty($row['member_email'])) {
      $flag=1;
      $_SESSION['mail_not_matched']="<span class='formerror_1'>Invalid Mail ID</span>";
   }   
   $check_uid= mysql_fetch_array(mysql_query("select * from password_reset where uid='".$uid."' and status='0' "));
 
   if ($check_uid['uid'] != $uid) {
      echo json_encode(["status"=>1001,"msg"=> $info = "User doesn't match."]);
   }else{   
      $link = "https://atkinsonsbullion-invest.com/index.php?code=$uid";
   
      if ($flag !=1) {
         $password = base64_encode(base64_encode($_POST['new_password']));
         $p = "update members set password='".$password."', readable_pass='". $new_password ."' where member_id=". $row['member_id'] ;
         mysql_query($p);
            
         $e = "update password_reset set status='1' where email='".$email."' and uid='".$uid."'";
         mysql_query($e);
         
         echo json_encode(["status"=>1002,"msg"=> $info = "Password Reset Successful."]);
         unset($_SESSION['introname']);
         unset($_SESSION['password_reset_status']);
      }
   }
} 

 



/*else {
   $_SESSION['mail_not_matched']="<span class='formerror_1'>Invalid Mail ID</span>";
    echo '<meta http-equiv="refresh" content="0;url='. $link .'">';
	exit();
}*/

?>

