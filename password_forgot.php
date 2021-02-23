<?php 
date_default_timezone_set('Etc/GMT');
// date_default_timezone_set("Europe/London");
session_start();
require( __DIR__ .'/connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require(__DIR__ . "/mail/mailer/src/Exception.php");
require(__DIR__ . "/mail/mailer/src/SMTP.php");
require(__DIR__ . "/mail/mailer/src/PHPMailer.php");


// print_r($_POST);
$userid = trim($_SESSION['userid']);
$email = trim($_POST['email']);


	if($email=='')
	{
		$flag=1;
		$_SESSION['empty_mail_id']="<span class='formerror_1'>Enter the Valid Mail ID</span>";
	}
	/*else
	{
		$re_user    = "^[a-z0-9\._-]+"; 
		$re_delim   = "@"; 
		$re_domain  = "[a-z0-9][a-z0-9_-]*(\.[a-z0-9_-]+)*"; 
		$re_tld     = "\.([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|" . "int|mil|museum|name|net|org|pro)$"; 
		if(eregi($re_user . $re_delim . $re_domain . $re_tld, $email)==0)
		{
			$flag=1;
			$_SESSION['empty_mail_id']="<span class='formerror_1'>Enter the Valid Mail ID</span>";
		}
	}*/
	$query= "select * from members where member_email = '". $email ."' ";
	$row =  mysql_fetch_array(mysql_query($query));
	// print_r($query);
	// exit();
	if ($row['member_email'] == '') {
			$flag=1;
			$_SESSION['mail_not_matched']="<span class='formerror_1'>Invalid Mail ID</span>";
		
	}
	//	   print_r($_SESSION);
	//	   echo $flag;


	if ($flag != 1) {
		// mail sending
		$mail_from_id = "service.atkinsons@gmail.com";
		$mailsubject = 'Password reset';
		
		$uid = $row['member_id'].time();
		
		$date = date('Y-m-d H:i:s');
		$link = "https://atkinsonsbullion-invest.com/index.php?code=$uid";
		$insert = "INSERT INTO `password_reset`( `email`, `uid`, `created_at`,`status`) VALUES('". $email ."','". $uid ."','". $date ."','0')";
		mysql_query($insert);
		
		$mail_fetch = "Dear ".$row['first_name'].",<br/>
							You requested to reset<br/><br/>
							Don't worry, we all forget sometimes<br/>

							Hi ".$row['first_name'].",<br/>
							You've recently asked to reset the password for this AtKinSons account: $email<br/>
							To update your password, click the link below:<br/>
		
		<a href='". $link ."' style='text-decoration:none;'>'".$link."'</a>
		<br/>
		Cheers,<br/>
		Support Team<br/>

		This message was sent to you by AtKinSons";
		$sitename=  'AtKinSons';
		$message = html_entity_decode($mail_fetch);

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$sitename.' <'.$mail_from_id.'>' . "\r\n"; 
		$headers .= 'Reply-To: '.$sitename.' <'.$mail_from_id.'>' . "\r\n"; 
		
		@mail($email,$mailsubject,$message,$headers);	
		// password_reset_mail($email, $row['first_name'], $mailsubject, $mail_fetch);
		
		//mail($email,$mailsubject,$message,$headers);
		
		// $_SESSION['mail_check']="Password reset link sent into mail";	
				// echo '<meta http-equiv="refresh" content="0;url=forgot_password.php">';
		echo json_encode(["status"=>1002,"msg"=> $info = "Password reset link sent into mail","url"=> "index.php"]);
		// exit(); 
	}else {
		
		echo json_encode(["status"=>1001,"msg"=> $info = "Your email is Invalid"]);
		// echo '<meta http-equiv="refresh" content="0;url=forgot_password.php">';
			// exit();
	}
?>
<?php






function password_reset_mail($user_email, $user_name,$subject, $content) {
	// echo "From password_reset_mail function=> ".$user_email ." = ".  $user_name ." = ". $subject ." = ". $content ;
    try{
		$mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPDebug  = 0;  
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 465;//587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "support@benri.com.bd";
        $mail->Password   = "Benri@3754";
        $mail->IsHTML(true);
        //$mail->AddAddress("john4apps27@gmail.com", "Bashar Vay");
        $mail->AddAddress($user_email, $user_name);
        
        $mail->SetFrom("support@benri.com.bd", "AtKinSons");
        
        // $mail->SetFrom("service.atkinsons@gmail.com", "AtKinSons");
        
        $mail->AddReplyTo("service.atkinsons@gmail.com", "AtKinSons");
        //$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
        $mail->Subject = $subject; //"Password Reset";
        // $content = "<b>This is a Test Email sent via SMTP .</b>";
        $mail->MsgHTML($content);
        $mail->Send();
        
        //var_dump($mail);
        
      /*  if(!$mail->Send()) {
          echo "Error while sending Email.";
         //  var_dump($mail);
        } else {
          echo "Email sent successfully";
        }*/
    
    }catch (Exception $e)
    {
       echo $e->errorMessage();
    }
    catch (\Exception $e)
    {
       echo $e->getMessage();
    }

}

