<?PHP session_start();
	//error_reporting(0);
	require 'include/connect.php';
	
	$id=$_GET['id'];
	
	$status=$_GET['status'];
	
	$member_id=mysql_fetch_array(mysql_query("select * from members where member_id='$id'"));


$res=$member_id['member_email'];
	
	
	$subject=$_POST['txtsub'];
	$to=$_POST['to']; 
	$mailmessage=$_POST['txtcontent'];
	$email_fetch=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='3'"));
    $email=$email_fetch['set_value']; 
	
	$email1='admin@gmail.com';
	
	if($subject == '' || $mailmessage == '' )
	{
		$_SESSION['empty_pass']="<font color='#FF0000'>Please enter the Subject/Message</font>";
		echo '<meta http-equiv="refresh" content="0;url=sendmail1.php?id='.$id.'&status='.$status.'">';
		exit();
	}
	
	else
	{	
			$headers  = "MIME-Version: 1.0\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";
	  	    $headers .= "From: ".$email. "\n"; 	
			/*echo "<br>".$member_mail;
			echo "<br>".$subject;
			echo "<br>".$mailmessage;
			echo "<br>".$headers;*/
			
			 $mail=mail($res,$subject,$mailmessage,$headers);
			/*if($mail)
			{
				echo "<br>1";
			}*/
	
		
		$_SESSION['succ_dir']="<font color='#004000'><b>Mail Send To User Successfully</b></font>";
		echo '<meta http-equiv="refresh" content="0;url=user.php?status='.$status.'">';
		exit();
	}
	
?>
