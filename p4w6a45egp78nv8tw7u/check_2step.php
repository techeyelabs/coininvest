<?php ob_start();
session_start();

require 'include/connect.php';
//require 'Captcha.php';

$admin_id = $_SESSION['aid'] ;
$code = trim($_POST['security_code']);

  $checkStr = "select * from admin where admin_id='".$admin_id."' and two_step_code='". $code ."'";
$checkSql = mysql_query($checkStr);

//print_r($_POST);
//echo mysql_num_rows($checkSql) ;

if(empty($code)) {
    $_SESSION['message'] = 'Verification code cannot be empty';
    echo '<meta http-equiv="refresh" content="0;url=twostep.php">';
	exit();  
}

else if( mysql_num_rows($checkSql) > 0 ) {
     $ft = mysql_fetch_assoc($checkSql);
     
    $uname = $ft['username'];
    $id = trim($ft['admin_id']);
	$_SESSION['aid'] = $id;
	$_SESSION['adminuser'] = $uname;
	$_SESSION['permission'] = $ft['permission'];
   echo '<meta http-equiv="refresh" content="0;url=home.php">';
	exit();
}

else{
    $_SESSION['message'] = 'Wrong verification code';
    echo '<meta http-equiv="refresh" content="0;url=twostep.php">';
	exit();   
}
?>