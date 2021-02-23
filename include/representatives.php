<?php





if(isset($_SESSION['username'])) 
{
 if(isset($_POST['rep_save'])) 
 {
    $rep_id  = trim($_POST["rep_id"]);    
 	$full_name  = trim($_POST["full_name"]);
    $country  = trim($_POST["country"]);
	$email  = trim($_POST["email"]);
	$contact_email  = trim($_POST["contact_email"]);
	$phone_number  = trim($_POST["phone_number"]);
	$skype  = trim($_POST["skype"]);
	$facebook  = trim($_POST["facebook"]);
	$other_messengers  = trim($_POST["other_messengers"]);
	$your_experiences  = trim($_POST["your_experiences"]);
	
	$flag = 1;
	
	if(empty($full_name)) {
	    $_SESSION["msg"]  = "Please Enter Full Name";
	    $_SESSION["success"] = "";
	    $flag = 0;
	}
	if(empty($country))
	{
	    $_SESSION["msg"]  = "Please Select Country";
	    $_SESSION["success"] = "";
	    $flag = 0;
	}
	if(empty($email))
	{
	    $_SESSION["msg"]  = "Please Enter Email";
	    $_SESSION["success"] = "";
	    $flag = 0;
	}	
	

	$dep_det = mysql_query("select sum(amount) as total_depo from deposit where member_id=$rep_id and status='ative'");
	$total_deposit = $dep_det["total_depo"];
	if($total_deposit < 1) {
	     $_SESSION["msg"]  = "Please Invest Minimum 1BTC for becoming representative.";
	    $_SESSION["success"] = "";
	    $flag = 0;
	}
	
	
/*	$re_user    = "^[a-z0-9\._-]+"; 
	$re_delim   = "@"; 
	$re_domain  = "[a-z0-9][a-z0-9_-]*(\.[a-z0-9_-]+)*"; 
	$re_tld     = "\.([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|" . "int|mil|museum|name|net|org|pro)$"; 
	if(eregi($re_user . $re_delim . $re_domain . $re_tld, $email)==0)
	{
		$errorflag=1;
		$_SESSION['empty_mail']="<span class='formerror_1'>Please Enter the Valid Mail ID</span>";
	}
	
	if(empty($contact_email))
	{
	    $_SESSION["msg"]  = "Please Enter Contact Email";
	    $_SESSION["success"] = "";
	    $flag = 0;
	}	
	if(empty($phone_number))
	{
	    $_SESSION["msg"]  = "Please Enter Phone Number";
	    $_SESSION["success"] = "";
	    $flag = 0;
	}*/
	
	
	if( $flag == 1 )
	{
	   $sql1 = mysql_query("select * from  `representatives` where  member_id='$rep_id'");     
	    if(mysql_num_rows($sql1)==0)	    {
	    
    	    $entry_date = date('Y-m-d H:i:s');
    	    $rep =    "INSERT INTO `representatives`( `full_name`, `country`, `email_atq`, `contact_email`, `phone`, `skype`, `facebook`, `other_messenger`, `your_experience`, `intro_id`, `status`, `entry_date`,`member_id`) 
    	    VALUES ('$full_name','$country','$email','$contact_email','$phone_number','$skype','$facebook','$other_messengers','$your_experiences','0','INACTIVE','$entry_date','$rep_id')";
            
            
            
            echo $rep;
            exit();
            /*mysql_query($rep);
            
            
            $sitename = mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
			$sitename = $sitename['set_value'];
			
			$adminmail = mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
			$adminmail = $adminmail['set_value'];
			$mailto = $email;
				

			// SEND MAIL TO USRES				
			$mailsubject1 = "Representative request receive";
			$message1 = "Dear Sir, <br>This is to confirm that, We received a Representative registration request from your<br>account. After verification a `Representative` tab will be appear in your dashboard.<br/>
			<br/>If you have any questions about your account or any other matter,<br/>please feel free to contact us at<br/>support@atq-coins.com<br/><br/>
			    Thanks and Regards,<br>Support Team<br/>Atq-coins.com";
			$headers  = "MIME-Version: 1.0\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";
			$headers .= 'From: '.$sitename.' <'.$adminmail.'>' . "\r\n";
			$mail = mail($mailto,$mailsubject1,$message1,$headers);
            
            
            // SEND MAIL TO ADMIN				
			$mailsubject1 = "Request for Representative";
			$message1 = "Dear Admin, <br>Representative request from Full Name:".$full_name.",".
			"Atq Email:". $email .",Contact Email:". $contact_email .",Country:". $country .",Request Time:". $entry_date ."<br> Regards,<br>Green Yellow";
			$headers  = "MIME-Version: 1.0\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";
			$headers .= 'From: '.$full_name.' <'.$mailto.'>' . "\r\n";
			$mail = mail($adminmail,$mailsubject1,$message1,$headers);*/
            
    	    $_SESSION["success"] = "";
    	    $_SESSION["msg"] = "Your representative request forward to Green Yellow Support.Please check Your Mail";
    	    
	    } 
	}
	
 }else{
    $_SESSION["success"] = "";
	$_SESSION["msg"] = "";
 }
}else{
    $_SESSION["success"] = "";
    $_SESSION["success"] = "Please Login with your username and password for creating representative request.";
}		        

?>