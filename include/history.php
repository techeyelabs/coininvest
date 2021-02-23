<?php 
	$acchange_ip=$_SERVER['REMOTE_ADDR'];
	if($mode!='ac' && $mode!='cp') $mode='ac';
	if($mode=='ac') {
		$edit_profile_query="select * from members where member_id=$userid";
		$edit_profile_result=mysql_query($edit_profile_query);
		$edit_profile_row=mysql_fetch_array($edit_profile_result);
		$firstname=$edit_profile_row['member_name'];
		$tfname=$firstname;
		$_SESSION['tfname']=$tfname;
		$lastname=$edit_profile_row['lastname'];
		$email=$edit_profile_row['member_email'];
		$temail=$email;
		$_SESSION['temail']=$temail;
		$address1=$edit_profile_row['address1'];
		$address2=$edit_profile_row['address2'];
		$city=$edit_profile_row['city'];
		$state=$edit_profile_row['state'];
		$zipcode=$edit_profile_row['zipcode'];
		if($zipcode==0) $zipcode=' ';
		$phone=$edit_profile_row['phone'];
		if($phone==0) $phone=' ';
		$country=$edit_profile_row['country'];
		$payid=$edit_profile_row['payment_method'];
		$payment=$edit_profile_row['account_no'];
	}	
	$canSave=$_POST['canSave'];
	if($canSave==1) 
	{
		/*echo "<pre>";
		print_r($_POST);
		exit;*/
		$firstname=$_POST['txtFirstname'];
		//if($firstname=="") $nameflag=1;
		$lastname=$_POST['txtLastname'];
		$new_password=$_POST['txtNpassword'];
		$confirm_password=$_POST['txtCpassword'];
		$lr = $_POST['lr'];
		$pm = $_POST['pm'];
		
		
		if(!alphacheck($firstname))
			$firstnameerrmsg = "Only Alphabetic characters can be allowed";

		if(!alphacheck($lastname))
			$lastnameerrmsg = "Only Alphabetic characters can be allowed";
			
		if(!alphanumericcheck($new_password))
			$new_passworderrmsg = "Only Alphanumeric values can be allowed";

		if(!alphanumericcheck($confirm_password))
			$confirm_passworderrmsg = "Only Alphanumeric values can be allowed";
		

		if(empty($firstnameerrmsg) && empty($lastnameerrmsg) && empty($old_passworderrmsg) && empty($new_passworderrmsg) && empty($confirm_passworderrmsg))
		{
		
			if(strlen($new_password)<4 && $new_password != '') // || strlen($password)>8)
			{
				$new_error=1;
			}
			if(strlen($confirm_password)<4 && $confirm_password != '') // || strlen($password)>8)
			{
				$confirm_error=1;
			}
			else if($new_password!=$confirm_password) $confirm_error=1;
		    	  
			if($new_error!=1 && $confirm_error!=1) 
			{
				$update_members_query="update members set member_name='$firstname',lastname='$lastname',lr_num='$lr',pm_num='$pm' where member_id=$userid";
				$update_members_result=mysql_query($update_members_query);
				if($update_members_result) $sucess_flag=1;
				else $failure_flag=1;
				
				if($new_password!='' && $confirm_password!='')
				{
					$update_members_query="update members set password='$new_password' where member_id=$userid";
					$update_members_result=mysql_query($update_members_query);
				}
				
				
				  /*$mail_subject_query="select * from mail_subjects where mail_id=6";
					$mail_subject_result=mysql_query($mail_subject_query);
					$mail_subject_row=mysql_fetch_array($mail_subject_result);
					$mailfrom=$mail_subject_row['mailfrom'];
					$mailsubject=$mail_subject_row['mailsubject'];
					$message=$mail_subject_row['message'];
					
					$tfname=$_SESSION['tfname'];
					$temail=$_SESSION['temail'];
					
					$message=ereg_replace("#name#",$tfname,$message);
					$message=ereg_replace("#ip#",$acchange_ip,$message);
									$message=ereg_replace("#password#","Not Changed",$message);
									$message=ereg_replace("#egold#",$payment,$message);
									$message=ereg_replace("#email#",$email,$message);
					$headers  = "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					$headers .= "From: ". $mailfrom."\r\n";
					
					//				$mail=mail($mailto,$mailsubject,$message,$headers);*/
				
			}
			
		}
	}
	if($mode=='cp') 
	{
		$canChange=$_POST['canChange'];
		if($canChange==1) 
		{
			$old_password=$_POST['txtOpassword'];
			$new_password=$_POST['txtNpassword'];
			$confirm_password=$_POST['txtCpassword'];

			if(!alphanumericcheck($old_password))
				$old_passworderrmsg = "Only Alphanumeric values can be allowed";

			if(!alphanumericcheck($new_password))
				$new_passworderrmsg = "Only Alphanumeric values can be allowed";

			if(!alphanumericcheck($confirm_password))
				$confirm_passworderrmsg = "Only Alphanumeric values can be allowed";
				
			if(empty($old_passworderrmsg) && empty($new_passworderrmsg) && empty($confirm_passworderrmsg))
			{
	
				if(strlen($new_password)<4) // || strlen($password)>8)
				{
					$new_error=1;
				}
				if(strlen($confirm_password)<4) // || strlen($password)>8)
				{
					$confirm_error=1;
				}
				if($old_password=="") $old_error=1;
				else if($new_password=="") $new_error=1;
				else if($new_password!=$confirm_password) $confirm_error=1;
					
				if($oldpasscheck!=0 and  $newpasscheck!=0 and  $conpasscheck!=0)
				{
					if($old_error!=1 && $new_error!=1 && $confirm_error!=1)
					{
						$qry=mysql_query("select * from members where member_id=$userid");
						$result=mysql_fetch_array($qry);
						
						$old_password=crypt($old_password,$result['password']);
						
						$new_password=crypt($_POST['txtNpassword']);
						$check_password_query="select * from members where member_id=$userid and password='$old_password'";
		
						$check_password_result=mysql_query($check_password_query);
						if(mysql_num_rows($check_password_result)>0) 
						{
							$check_password_row=mysql_fetch_array($check_password_result);
							$firstname=$check_password_row['member_name'];
							 $mail_subject_query="select * from mail_subjects where mail_id=6";
							$mail_subject_result=mysql_query($mail_subject_query);
							$mail_subject_row=mysql_fetch_array($mail_subject_result);
							$mailfrom=$mail_subject_row['mailfrom'];
							$mailsubject=$mail_subject_row['mailsubject'];
							$message=$mail_subject_row['message'];
											
							$message=ereg_replace("#name#",$firstname,$message);
							$message=ereg_replace("#ip#",$acchange_ip,$message);
							$message=ereg_replace("#password#",$_POST['txtNpassword'],$message);
							$message=ereg_replace("#egold#","Not Changed",$message);
							$message=ereg_replace("#email#","Not Changed",$message);
							$headers  = "MIME-Version: 1.0\r\n";
							$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
							$headers .= "From: ". $mailfrom."\r\n";
							
							//				$mail=mail($mailto,$mailsubject,$message,$headers);
							
								$change_password_query="update members set password='$new_password' where member_id=$userid";
								$change_password_result=mysql_query($change_password_query);
								if($change_password_result) $sucess_flag=1;
								else $failure_flag=1;
						}
						else 
						{
							$wrong_flag=1;
						}			
					}
					
				}
				else
				{
					$script_exist=1;
				}

			}
	
		}
	}
?>
