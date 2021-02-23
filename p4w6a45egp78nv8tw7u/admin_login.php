<?php
ob_start();
session_start();
error_reporting(1);
//To Pull 7 Unique Random Values Out Of AlphaNumeric

//removed number 0, capital o, number 1 and small L
//Total: keys = 32, elements = 33
$characters = array(
"A","B","C","D","E","F","G","H","J","K","L","M",
"N","P","Q","R","S","T","U","V","W","X","Y","Z");

//make an "empty container" or array for our keys
$keys = array();

//first count of $keys is empty so "1", remaining count is 1-6 = total 7 times
while(count($keys) < 3) {
    //"0" because we use this to FIND ARRAY KEYS which has a 0 value
    //"-1" because were only concerned of number of keys which is 32 not 33
    //count($characters) = 33
    $x = mt_rand(0, count($characters)-1);
    if(!in_array($x, $keys)) {
       $keys[] = $x;
    }
}

foreach($keys as $key){
   $random_chars .= $characters[$key];
}
$rand = rand(0,99999);
$ex_code = $random_chars.date('his').$rand;
?>
<?php
	require 'include/connect.php';
	

	$uname= mysql_real_escape_string($_POST['username']);
	$pwd=  mysql_real_escape_string($_POST['userpwd']);
	$turningcode = $_POST['turningcode'];
	$security_code = $_SESSION['security_code'];
	
	
	$sql=mysql_query("select * from admin where username='$uname'");
	$ft=mysql_fetch_array($sql);
	$pswd=crypt($pwd,$ft['admin_password']);
	
	if($uname == '' || $pwd == '')
	{
		$_SESSION['message']="Please Enter the Username or Password";
		echo '<meta http-equiv="refresh" content="0;url=index.php">';
		exit();
	}
	
	if($turningcode != $security_code)
	{
		$_SESSION['message']="Please Enter the Correct Captcha Code Number";
		echo '<meta http-equiv="refresh" content="0;url=index.php">';
		exit();
	}

	$sql="select * from admin where username='".$uname."' and admin_password='".md5($pwd)."'";
	 //exit();	
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
    $dynamic_receiver = mysql_fetch_assoc($res);
	if($num>0)
	{
	    // echo '<meta http-equiv="refresh" content="0;url=home.php">';
		// exit();
		$id = trim($ft['admin_id']);
		// echo($id);
		// exit;
		$_SESSION['aid']=$id;
		 
		//===== direct
 		 $_SESSION['adminuser']=$uname;
 		 $_SESSION['permission']=$ft['permission'];
 		
		/**********************************
		 *  2-Step Block
		 * *******************************/
		 $randomStringLength = 12;
         $randomString = "AtKinSonsEFGHIJKLMNOPQRSTUVWXYZAtKinSonsefghijklmnopqrstuvwxyz0123456789";
         $randomStringCode = substr(str_shuffle($randomString), 0, $randomStringLength);
         
 		 $updateStr = "update admin set two_step_code='".$randomStringCode ."' where admin_id='". $id."'";
		 mysql_query($updateStr);
		
		 
        // // ======================== Mail with verification code======================================		

		$site_url=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '37'"));
		$site_url=$site_url['set_value'];
		
		$site_logo=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '20'"));
		$site_logo=$site_logo['set_value'];
		
		$sitelogo=$site_url.'/'.$site_logo;
		
		$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
		$sitename=$sitename['set_value'];
				
		$adminmail=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
		$adminmail=  $adminmail['set_value']; // $adminmail['set_value'];
	 
		$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =1"));
		$mail_from_id =  $mail_fetch['from_id'];
	    $mailsubject = "AtKinSons 2-Step Verification Code";
	    $mailMessage = 'Your two step verification code:   '.$randomStringCode ."<br/><br/>";
	    $mailMessage .= 'Thanks,<br/>';
	    $mailMessage .= 'AtKinSons';
	    
	    
	    
	    $to_mail =  $dynamic_receiver['email']; // $dynamic_receiver['email'];
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$sitename.' <'.$mail_from_id.'>' . "\r\n"; 
		mail($to_mail ,$mailsubject,$mailMessage,$headers);
		 
		 
		 $_SESSION['message'] = '2-step verification code send into your email. Check your registered email address';
		 echo '<meta http-equiv="refresh" content="0;url=twostep.php">'; 
 		// echo '<meta http-equiv="refresh" content="0;url=home.php">';
 		 exit();
	}
	else
	{
		$_SESSION['message']="Username and password doesnt match";
		echo '<meta http-equiv="refresh" content="0;url=index.php">';
		exit();
	}

?>
