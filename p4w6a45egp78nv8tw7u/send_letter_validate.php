<?PHP session_start();
	//error_reporting(0);
	require 'include/connect.php';
	$subject=$_POST['txtsub'];
	$member=$_POST['txtmmember'];
	$mailmessage=$_POST['txtcontent'];
	$email_fetch=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='3'"));
    $email=$email_fetch['set_value']; 
	
	if($subject == '' || $mailmessage == '' )
	{
		$_SESSION['empty_pass']="<font color='#FF0000'>Please enter the Subject/Message</font>";
		echo '<meta http-equiv="refresh" content="0;url=send_letter.php">';
		exit();
	}
	
		$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '3'"));
				$mail_from_id = $sitename['set_value'];

	
	if($member[0]=='all')
	{
		$sql=mysql_query("select * from members");
		while($fetch=mysql_fetch_array($sql))
		{
			$member_mail=$fetch['member_email'];			
			$headers  = "MIME-Version: 1.0\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";
	  	        $headers .= 'From: '.$mail_from_id.' <'.$mail_from_id.'>' . "\r\n"; 	
			/*echo "<br>".$member_mail;
			echo "<br>".$subject;
			echo "<br>".$mailmessage;
			echo "<br>".$headers;*/
			 @mail($member_mail,$subject,$mailmessage,$headers);
			/*if($mail)
			{
				echo "<br>1";
			}*/
		}
		
		$_SESSION['succ_dir']="<font color='#004000'><b>Successfully NewsLetter Send to Users</b></font>";
		echo '<meta http-equiv="refresh" content="0;url=send_letter.php">';
		exit();
	}
	else 
	{
		
		for($i=0;$i<count($member);$i++)
		{
			$member_mail=$member[$i];
			
			$headers  = "MIME-Version: 1.0\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";
			//$headers .= 'From: '.$sitename.' <'.$sitename.'>' . "\r\n";
			 $headers .= 'From: '.$mail_from_id.' <'.$mail_from_id.'>' . "\r\n"; 		
		    @mail($member_mail,$subject,$mailmessage,$headers); 
			
		}
		
		
		$_SESSION['succ_dir']="<font color='#004000'><b>Successfully NewsLetter Send to Users</b></font>";
		echo '<meta http-equiv="refresh" content="0;url=send_letter.php">';
		exit();
	}
?>
