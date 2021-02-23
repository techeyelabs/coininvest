<?php 
//echo '<pre>'; print_r($_POST); exit;
$mode = $_GET['mode'];
$acchange_ip=$_SERVER['REMOTE_ADDR'];
	if($mode!='ac' && $mode!='cp') $mode='ac';

	if($mode=='ac') {

		$userid = $_SESSION['userid'];
		
		$edit_profile_query="select * from members where member_id=$userid";
		$edit_profile_result=mysql_query($edit_profile_query);
		$edit_profile_row=mysql_fetch_array($edit_profile_result);
	
		$userid1=$edit_profile_row['username'];

		$first_name=$edit_profile_row['first_name'];
		$mail_id=$edit_profile_row['member_email'];

		$country = mysql_fetch_array(mysql_query("select * from country_master where country_id='".$edit_profile_row['country']."'"));

		$country = $country['country'];

		$address1=$edit_profile_row['address1'];

		$city=$edit_profile_row['city'];

		$state=$edit_profile_row['state'];

		$phone=$edit_profile_row['phone'];

		$zipcode=$edit_profile_row['zipcode'];

		$question=$edit_profile_row['question'];


		$answer=$edit_profile_row['answer'];

		$liberty =$edit_profile_row['lr_num'];

		$alerypay_num=$edit_profile_row['payza_num'];
		
		$ego_num=$edit_profile_row['ego_num'];
		
		$perfect=$edit_profile_row['pm_num'];
		
		
		$st_pay=$edit_profile_row['st_pay'];

		$paypal=$edit_profile_row['paypal'];
		$bitcoin=$edit_profile_row['bitcoin'];
		$payeer=$edit_profile_row['payeer'];
		$neteller=$edit_profile_row['neteller'];
		$skrill=$edit_profile_row['skrill'];
		$advcash=$edit_profile_row['advcash'];






		$bank_name=$edit_profile_row['bank_name'];
		$accnum=$edit_profile_row['accnum'];
		$bank_code=$edit_profile_row['bank_code'];
		$bank_branch=$edit_profile_row['bank_branch'];
		$bank_city=$edit_profile_row['bank_city'];
		$bank_state=$edit_profile_row['bank_state'];
		$bank_country=$edit_profile_row['bank_country'];
		$bank_zipcode=$edit_profile_row['bank_zipcode'];

	}	

	$canSave=$_POST['canSave'];

	if($canSave==1) 
	{

/*	echo "<pre>";

print_r($_POST);

	exit();


*/
		/*if($_FILES['bank_wire']['name'] !='')
		{

			if($_FILES['bank_wire']['type'] == 'application/pdf')
			{

			$uploads=$_FILES['bank_wire']['name'];

			$uploads = date('YmdHis').$_SESSION['userid'].$uploads;
				$uploads1="uploadimages/withdrawforms/".$uploads;
		move_uploaded_file($_FILES["bank_wire"]["tmp_name"],$uploads1);
				$add_bank = ", bank_wire ='$uploads1'";

			}
		else

		{

			$_SESSION['old_cpass']="<span class='formerror'>Please Upload the PDF file</span>";

			echo '<meta http-equiv="refresh" content="0;url=profile.php?mode=ac">';

				exit();
			}







		}*/







		










		
		$accnum=$_POST['accnum'];
		$bank_name=$_POST['bank_name'];
		$bank_code=$_POST['bank_code'];
		$bank_state=$_POST['bank_state'];
		$bank_city=$_POST['bank_city'];
		$bank_branch=$_POST['bank_branch'];
		$bank_country=$_POST['bank_country'];
		$bank_zipcode=$_POST['bank_zipcode'];

		







		







		$first_name=$_POST['first_name'];







		$mail_id=$_POST['member_email'];







		$country=$_POST['Country'];







		$street=$_POST['street'];







		$city=$_POST['city'];







		$state=$_POST['state'];







		$phone=$_POST['phone'];







		$zip_code=$_POST['zip_code'];







		$question=$_POST['question'];







		$answer=$_POST['answer'];



		$liberty=$_POST['lr_num'];

		$ego_num=$_POST['ego_num'];
		
		$perfect=$_POST['pm_num'];

	    $st_pay = $_POST['st_pay'];

	    $paypal = $_POST['paypal'];
	    $bitcoin = $_POST['bitcoin'];
	    $payeer = $_POST['payeer'];
	    $neteller = $_POST['neteller'];
	    $neteller_key = $_POST['neteller_key'];
	    $skrill = $_POST['skrill'];
	    $advcash = $_POST['advcash'];



		/*$lr_num=$_POST['lr_num'];

		$alerypay_num=$_POST['alerypay_num'];
*/


		$oldpassword = base64_encode(base64_encode($_POST['oldpassword']));



		



		$password = base64_encode(base64_encode($_POST['password']));



		$cpassword = base64_encode(base64_encode($_POST['cpassword']));



		



		



		if($oldpassword == '')



		{



			$oldpasswordflag=1;







			$_SESSION['empty_oldpassword']="<span class='formerror'>Please enter your Current Password</span>";



		}



		



		if($oldpassword != '')



		{



			$check_dupuser_query="select * from members where member_id='".$_SESSION['userid']."'";



			$check_dupuser_result=mysql_query($check_dupuser_query);



			$fetch=mysql_fetch_array($check_dupuser_result);



			if($oldpassword!=$fetch['password'])



			{



				$oldpasswordflag=1;



				$_SESSION['empty_oldpassword']="<span class='formerror'>Your Password is invalid. Please enter correct password</span>";



			}



		}



		



		if($country=='')







		{







			$countryflag=1;







			$_SESSION['empty_country']="<span class='formerror'>Please Select the Country</span>";







			







		}







		if($first_name=='')







		{







			$firstnameflag=1;







			$_SESSION['empty_first_name']="<span class='formerror'>Please enter the first name</span>";







			







		}



		



		if($password != '')



		{



				











			if(strlen($password)<3 && $password!='') // || strlen($password)>8)



		



			{



		



				$passstrflag=1;



		



				$_SESSION['empty_passstr']="<span class='formerror'>Please Enter the Password Minimum 4 characters</span>";



		



			}







			if($password != $cpassword || $cpassword=="")



		



			{



		



				$cpassflag=1;



		



				$_SESSION['empty_cpass']="<span class='formerror'>Confirm Password does not match</span>";



		



			}



		}







		/*if($mail_id=='')







		{







			$mailflag=1;







			$_SESSION['empty_mail_id']="<span class='formerror'>Please Enter the Valid Mail ID</span>";







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







				$_SESSION['empty_mail']="<span class='formerror'>Please Enter the Valid Mail ID</span>";







			}







		}*/







	







		/*if($mail_id !='')







		{







			$sdre=mysql_query("select * from members where member_email='$mail_id' and member_id <> ".$_SESSION['user_id']."");







			if(mysql_num_rows($sdre) > 0)







			{







				$mailflag=1;







				$_SESSION['empty_mail']="<span class='formerror'>Mail ID is Not available</span>";







			}







		}*/















		/*if($question=='')







		{







			$questionflag=1;







			$_SESSION['empty_question']="<span class='formerror'>Please Select the Secret question</span>";







		}*/







		







		/*if($answer=='')







		{







			$answerflag=1;







			$_SESSION['empty_answer']="<span class='formerror'>Please enter the secret answer</span>";







		}*/





		

		if($paypal=='' && $payeer==''  && $perfect=='' && $st_pay == '' && $skrill == '' && $neteller == '' && $bitcoin == '' && $advcash == '')
		{

		$errorflag=1;
		$_SESSION['empty_pay']="<font style='color:red;'>Please enter atleast One E Currency Account number</span>";
		}

		/// For payment email validate
		$re_user    = "^[a-z0-9\._-]+"; 
		$re_delim   = "@"; 
		$re_domain  = "[a-z0-9][a-z0-9_-]*(\.[a-z0-9_-]+)*"; 
		$re_tld     = "\.([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|" . "int|mil|museum|name|net|org|pro)$"; 
	

	// if($paypal != '')
	// {
		
	// 	if(eregi($re_user . $re_delim . $re_domain . $re_tld, $paypal)==0)
	// 	{
	// 		$errorflag=1;
	// 		$_SESSION['empty_paypal']="<span class='formerror'>Please Enter the Valid Mail ID</span>";
	// 	}
	// }
	// if($bitcoin != '')
	// {
		
	// 	if(eregi($re_user . $re_delim . $re_domain . $re_tld, $bitcoin)==0)
	// 	{
	// 		$errorflag=1;
	// 		$_SESSION['empty_bitcoin']="<span class='formerror'>Please Enter the Valid Mail ID</span>";
	// 	}
	// }
	// if($payeer != '')
	// {
		
	// 	if(eregi($re_user . $re_delim . $re_domain . $re_tld, $payeer)==0)
	// 	{
	// 		$errorflag=1;
	// 		$_SESSION['empty_payeer']="<span class='formerror'>Please Enter the Valid Mail ID</span>";
	// 	}
	// }
	// if($neteller != '')
	// {
		
	// 	if(eregi($re_user . $re_delim . $re_domain . $re_tld, $neteller)==0)
	// 	{
	// 		$errorflag=1;
	// 		$_SESSION['empty_neteller']="<span class='formerror'>Please Enter the Valid Mail ID</span>";
	// 	}
		
	// 	if($neteller_key == '')
	// 		{
	// 		$errorflag=1;
	// 		$_SESSION['empty_neteller_key']="<span class='formerror'>Please Enter the Neteller key</span>";
	// 	}
	
	// }
	// if($skrill != '')
	// {
		
	// 	if(eregi($re_user . $re_delim . $re_domain . $re_tld, $skrill)==0)
	// 	{
	// 		$errorflag=1;
	// 		$_SESSION['empty_skrill']="<span class='formerror'>Please Enter the Valid Mail ID</span>";
	// 	}
	// }







		//if($firstnameflag!=1 && $mailflag!=1 && $questionflag!=1 && $answerflag!=1 && $countryflag!=1)







		if($firstnameflag!=1 && $countryflag!=1 && $oldpasswordflag != 1 && $passstrflag!=1 && $cpassflag!=1 && $errorflag!= 1)







		{







				$update_members_query.="update members set first_name='".$first_name."',question='".$question."',answer='".$answer."',country='".$country."',street ='".$street."',city='".$city."',state='".$state."',zipcode='".$zip_code."',phone='".$phone."',lr_num='".$liberty."',ego_num='".$ego_num."',pm_num='".$perfect."',st_pay='".$st_pay."',paypal='".$paypal."',bitcoin='".$bitcoin."',payeer='".$payeer."',neteller='".$neteller."',neteller_key='".base64_encode($neteller_key)."',skrill='".$skrill."',advcash='".$advcash."',
				accnum='".$accnum."', bank_name='".$bank_name."', bank_code='".$bank_code."', bank_branch='".$bank_branch."', bank_city='".$bank_city."', bank_state='".$bank_state."', bank_country='".$bank_country."', bank_zipcode='".$bank_zipcode."'";

				if($password != '')
				{

					$update_members_query.=", password='$password'";

				}
			

				$update_members_query.=" where member_id=$userid";

				$update_members_result=mysql_query($update_members_query);

			if($update_members_result)
			{


				//SEDN MAIL//
				$current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
				$current_url=str_replace("profile","login",$current_url); 
				
				
				$select_user_mail  = mysql_fetch_array(mysql_query("select * from members where member_id=".$userid));
				$mail_fin = $select_user_mail['member_email'];		
				$admin_mail_id = mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
				$admin_mail = $admin_mail_id['set_value'];

				$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =4"));
				$mail_from_id = $mail_fetch['from_id'];

				$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
				$sitename=$sitename['set_value'];
				
				$mailsubject =$mail_fetch['mailsubject'];

				$message = html_entity_decode($mail_fetch['message']);
	
				$message=str_replace('[FIRSTNAME]',$first_name,$message);
				$message=str_replace('#verfyurl',$current_url,$message);
				$message=str_replace('#sitename',$sitename,$message);
				$message=str_replace('#adminmail',$admin_mail,$message);
				$message=str_replace('#adminemill',$admin_mail,$message);	
				$message=str_replace('[ADMINMAIL]',$admin_mail,$message);

				$headers  = 'MIME-Version: 1.0' . "\r\n";



				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


$headers .= 'From: '.$sitename.' <'.$admin_mail.'>' . "\r\n";
			



				mail($mail_fin,$mailsubject,$message,$headers);







				$_SESSION['succ_dir']="<font color='#004000'><b><center>Successfully Updated</center></b></font>";







				echo '<meta http-equiv="refresh" content="0;url=profile.php?mode=ac">';







				exit();







			}







			else







			{







				$_SESSION['old_cpass']="<span class='formerror'>Please try again later</span>";







				echo '<meta http-equiv="refresh" content="0;url=profile.php?mode=ac">';







				exit();







			}







		}







		else 







		{







			echo '<meta http-equiv="refresh" content="0;url=profile.php?mode=ac">';







			exit();







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







