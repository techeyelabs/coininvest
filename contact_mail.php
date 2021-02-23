<?php session_start();
	require (__DIR__.'/connect.php');

	/*	
	echo "<pre>";
	print_r($_POST);
	exit(); 
	*/
	
    $name		= trim($_POST['name']);
	$mail_id 	= trim($_POST['member_email']);
	$message	= trim($_POST['message']);	
		 
	// print_r($_POST);

	if($name=='')
	{
		$nameflag=1;
		$_SESSION['empty_first_name']="<span class='formerror' style='color: #fff;'>Please enter the Name</span>";		
	}
	 
	if($message=='')
	{
		$messageflag=1;
		$_SESSION['empty_message']="<span class='formerror' style='color: #fff;'>Please enter the Message</span>";
	}
	if($mail_id=='')
	{
		$mailflag=1;
		$_SESSION['empty_mail_id']="<span class='formerror' style='color: #fff;'>Please Enter the Valid Mail ID</span>";
	}
	else
	{
		$re_user    = "^[a-z0-9\._-]+"; 
		$re_delim   = "@"; 
		$re_domain  = "[a-z0-9][a-z0-9_-]*(\.[a-z0-9_-]+)*"; 
		$re_tld     = "\.([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|" . "int|mil|museum|name|net|org|pro)$"; 
		if(eregi($re_user . $re_delim . $re_domain . $re_tld, $mail_id)==0)
		{
			$mailflag=1;
			$_SESSION['empty_mail_id']="<span class='formerror'  style='color: #fff;'>Please Enter the Valid Mail ID</span>";
		}
	}		

			if( $nameflag != 1   && $messageflag != 1 && $mailflag != 1  )
			{
				$sitename = mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
				$sitename = $sitename['set_value'];
			
				$adminmail=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
				// $adminmail= "service.atkinsons@gmail.com";  
				$adminmail= "info@atkinsonsbullion-invest.com";
				$mailfrom= $_POST['member_email'];
				
				$sql_query_fetch1=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 37")); 
				$strsite=$sql_query_fetch1['set_value'];
				$mailsubject = 'Support Message';
				$message  =$_POST['name'] . "<br/>" . $_POST['member_email'] . "<br/>". nl2br($_POST['message']);						

				$headers  = "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\n";
				$headers .= 'From: '.$sitename.' <'.$mailfrom.'>' . "\r\n";
				$mail=mail($adminmail,$mailsubject,$message,$headers);			

				$_SESSION['con_name']			= '';
				$_SESSION['con_mail_id'] 		= '';
				$_SESSION['con_message'] 		= '';
				// SEND MAIL TO USRES
				
				$mailsubject1 = "Re:".$mailsubject;
				$message1 = "Dear Sir, <br><br/>Thank you for contacting AtKinSons Support team!  <br>
				              This is an automated response confirming the receipt of your mail.
							  <br/><br/><br/>
							  One of our staff will get back to you as soon as possible.
							  <br/><br/>
							  Thanks and Regards,<br/>AtKinSons Support Team";
				
				$headers  = "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\n";
				$headers .= 'From: '.$sitename.' <'.$adminmail.'>' . "\r\n";
				$mail=mail($mailfrom,$mailsubject1,$message1,$headers);

				echo json_encode(["status"=>1001,"msgs"=> $info = "Your Message has successfully forward to AtKinSons Support Team"]);
				// $_SESSION['success']="<center><font color='#fff'><strong>Your Mail has  successfully forward to AtKinSons Support Team</strong></font></center>";
				// echo '<meta http-equiv="refresh" content="0;url=index.php#contact">';
				// exit();
			}
			else
			{
				//$introid=$_POST['introid'];
				$_SESSION['con_name']			= $_POST['name'];
				$_SESSION['con_mail_id'] 		= $_POST['member_email'];
				$_SESSION['con_message'] 		= $_POST['message'];
				echo json_encode(["status"=>1002,"msg"=> $info = "Your Message doesn't forward to AtKinSons Support Team"]);
				// echo '<meta http-equiv="refresh" content="0;url=index.php#contact">';
				// exit();			
			}	

?>
