<?php
session_start();
error_reporting(0);

require 'include/connect.php';
if(empty ($_SESSION['adminuser']))
{
 echo '<meta http-equiv="refresh" content="0; url=index.php" />';
 exit();
 }

 
 function ae_gen_password($syllables = 3, $use_prefix = false)
{
    // Define function unless it is already exists
    if (!function_exists('ae_arr'))
    {
        // This function returns random array element
        function ae_arr(&$arr)
        {
            return $arr[rand(0, sizeof($arr)-1)];
        }
    }

    // 20 prefixes
    $prefix = array('aero', 'anti', 'auto', 'bi', 'bio',
                    'cine', 'deca', 'demo', 'dyna', 'eco',
                    'ergo', 'geo', 'gyno', 'hypo', 'kilo',
                    'mega', 'tera', 'mini', 'nano', 'duo');

    // 10 random suffixes
    $suffix = array('dom', 'ity', 'ment', 'sion', 'ness',
                    'ence', 'er', 'ist', 'tion', 'or'); 

    // 8 vowel sounds 
    $vowels = array('a', 'o', 'e', 'i', 'y', 'u', 'ou', 'oo'); 

    // 20 random consonants 
    $consonants = array('w', 'r', 't', 'p', 's', 'd', 'f', 'g', 'h', 'j', 
                        'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm', 'qu');

    $password = $use_prefix?ae_arr($prefix):'';
    $password_suffix = ae_arr($suffix);

    for($i=0; $i<$syllables; $i++)
    {
        // selecting random consonant
        $doubles = array('n', 'm', 't', 's');
        $c = ae_arr($consonants);
        if (in_array($c, $doubles)&&($i!=0)) { // maybe double it
            if (rand(0, 2) == 1) // 33% probability
                $c .= $c;
        }
        $password .= $c;
        //

        // selecting random vowel
        $password .= ae_arr($vowels);

        if ($i == $syllables - 1) // if suffix begin with vovel
            if (in_array($password_suffix[0], $vowels)) // add one more consonant 
                $password .= ae_arr($consonants);

    }

    // selecting random suffix
    $password .= $password_suffix;

    return $password;
}





// echo "<pre>"; print_r($_POST); exit();
 function randomPrefix($length)

{

$random= "";

$rand = rand(0,9999999);



 $data = $rand."AtKinSonsEFGHIJKLMNOP1234567890";





for($i = 0; $i < $length; $i++)
{
$random .= substr($data, (rand()%(strlen($data))), 1);
}

return $random;
}


function randomPrefix1($length)
{
$random= "";
$data = "AtKinSonsEFGHIJKLMNOPQRSTUVWXYZ" ;
for($i = 0; $i < $length; $i++)
{
$random .= substr($data, (rand()%(strlen($data))), 1);
}
return $random;
}






//echo '<pre>';print_r($_POST);exit;
	$intro_name = $_POST['intro_name'];
	$username=$_POST['txtname'];
	$password= base64_encode(base64_encode($_POST['txtpass']));
	$cpassword = base64_encode(base64_encode($_POST['txtcpass']));
	$mailid=$_POST['txtmail'];
	$firstname=$_POST['txtfname'];
	$address1=$_POST['add1'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$country=$_POST['cboCountry'];
   	$alertpay=$_POST['payza_num'];
	$ego_num=$_POST['ego_num'];
	$lr_num=$_POST['lr_num'];
	$pm_num=$_POST['pm_num'];
	$gdp_num=$_POST['gdp_num'];
	$st_pay =$_POST['st_pay'];
	$paypal =$_POST['paypal'];
	$bitcoin =$_POST['bitcoin'];
	$payeer =$_POST['payeer'];
	$neteller =$_POST['neteller'];
	$skrill =$_POST['skrill'];
	$advcash = $_POST['Advcash'];
	$question=$_POST['question'];
	$sec_ans=$_POST['sec_ans'];
	$zipcode=trim($_POST['zipcode']);
	$day=trim($_POST['day']);
	$month=trim($_POST['month']);
	$year=trim($_POST['year']);
	$gender=trim($_POST['gender']);
	$dob=$year.'-'.$month.'-'.$day;

	$accnum=$_POST['accnum'];
	$bank_name=$_POST['bank_name'];
	$bank_code=$_POST['bank_code'];
	$bank_branch=$_POST['bank_branch'];
	$bank_city=$_POST['bank_city'];
	$bank_state=$_POST['bank_state'];
	$bank_country=$_POST['bank_country'];
	$bank_zipcode=$_POST['bank_zipcode'];
    $is_sufficient=$_POST['is_sufficient'];

	$refer_id=randomPrefix1(2).randomPrefix(10);
	
	
	
	$readable_pass = trim($_POST['txtpass']);

	

	if($_POST['id'])
	{
		 $id=$_POST['id'];
	}

	else if($_GET['mem_id'])
		$mem_id=$_GET['mem_id'];

	
else if($_GET['pass_id'])
	{
	    $pass_id=$_GET['pass_id'];
	}
	


if($pass_id && $_GET['status']=='active' && $_GET['usertype']=='user')
	{?>
 			       
       <?
	 
			$validuser_check_query="select * from members where member_id='".$pass_id."'";
			$validuser_check_result=mysql_query($validuser_check_query);
			if(mysql_num_rows($validuser_check_result)>0) 
			{
				$validuser_check_row=mysql_fetch_array($validuser_check_result);
				$username=$validuser_check_row['username'];
				$password=base64_decode(base64_decode($validuser_check_row['password']));
				$mail=$validuser_check_row['member_email'];
		
		
		        $first_name = $validuser_check_row['first_name'];
				if($validuser_check_row['nametitle'] != '')
				{
					$names=$validuser_check_row['nametitle'].'.'.$validuser_check_row['first_name'];
				}
				else
				{
					$names='Mr.'.$validuser_check_row['first_name'];
				}


				$adminemill=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
				$adminemill=$adminemill['set_value'];


				$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
				$sitename=$sitename['set_value'];
		
		
						$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =3"));
						$mail_from_id = $mail_fetch['from_id'];
						$mailsubject =$mail_fetch['mailsubject'];
						
						
						  $message = html_entity_decode($mail_fetch['message']);  
						
						
						 $message=str_replace('[FIRSTNAME]',$names,$message);
						 $message =str_replace('[USERNAME]',$username,$message);
						 $message =str_replace('[PASSWORD]',$password,$message);
						 $message=str_replace('#siteurl',$site_url,$message);
						 $message=str_replace('#sitename',$sitename,$message);
						 $message=str_replace('#adminmail',$mail_from_id,$message);
						 $message=str_replace('#adminemill',$adminemill,$message);  
						 $headers  = 'MIME-Version: 1.0' . "\r\n";
						 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						 $headers .= 'From: '.$sitename.' <'.$mail_from_id.'>' . "\r\n";
						 mail($mail,$mailsubject,$message,$headers);
		
	

	
	
			$_SESSION['success_flag']=" Password Reset successfully";
				echo '<meta http-equiv="refresh" content="0;url=mainuser.php?status=active">';
				exit();
			}
			else
			{
				$_SESSION['invalid']="<font color='#FF0000' size=2>Invalid Email ID. Please Provide the Correct Mail ID</font>";
				echo '<meta http-equiv="refresh" content="0;url=mainuser.php?status=active">';
				exit();
			}
		
		
	}
	
	
	
		/*if($pass_id && $_GET['status']=='suspended')
	{?>
 			       
       <?
	 
			$validuser_check_query="select * from members where member_id='".$pass_id."'";
			$validuser_check_result=mysql_query($validuser_check_query);
			if(mysql_num_rows($validuser_check_result)>0) 
			{
				$validuser_check_row=mysql_fetch_array($validuser_check_result);
				$username=$validuser_check_row['username'];
				$password=$validuser_check_row['password'];
				$mail=$validuser_check_row['member_email'];
				$sql_query_fetch=mysql_fetch_array(mysql_query("select * from admin_settings"));
			$mailfrom=$sql_query_fetch['admin_mail'];
			$strsite=$sql_query_fetch['site_name'];
	
						$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =3"));
						$mail_from_id = $mail_fetch['from_id'];
						$mailsubject =$mail_fetch['mailsubject'];
						
						
						 $message = html_entity_decode($mail_fetch['message']);
						
						
						
						 $message=str_replace('[FIRSTNAME]',$first_name,$message);
						 $message =str_replace('[USERNAME]',$username,$message);
						 $message =str_replace('[PASSWORD]',$password,$message);
						 $message=str_replace('#siteurl',$site_url,$message);
						 $message=str_replace('#adminmail',$mail_from_id,$message);
						 $message=str_replace('#adminemill',$mail_from_id,$message);  
						 
						
						 
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: '.$sitename.' <'.$mail_from_id.'>' . "\r\n";
						mail($mail,$mailsubject,$message,$headers);
		
				
	
			$_SESSION['success_flag']=" Password Resend successfully";
				echo '<meta http-equiv="refresh" content="0;url=user.php?status=suspended">';
				exit();
			}
			else
			{
				$_SESSION['invalid']="<font color='#FF0000' size=2>Invalid Email ID. Please Provide the Correct Mail ID</font>";
				echo '<meta http-equiv="refresh" content="0;url=user.php?status=suspended">';
				exit();
			}
	}
	*/


	

	if($mem_id)
	{	
		$select_delete = mysql_query("select * from deposit where member_id='$mem_id'");
		while($fetch_delete = mysql_fetch_array($select_delete))
		{
			$deposit_id = $fetch_delete['deposit_id'];
			$delte5=mysql_query("delete from sub_deposit where deposit_id='$deposit_id'"); 
			$delte1=mysql_query("delete from deposit where deposit_id='$deposit_id'");
		}
		
		$delte2=mysql_query("delete from history where user_id='$mem_id'");
		$delte3=mysql_query("delete from members where member_id='$mem_id'");

		$_SESSION['success_flag']="<font color='#004000'><b>User Successfully Deleted</b></font>";
		echo '<meta http-equiv="refresh" content="0;url=mainuser.php?status=active">';
		exit();
	}

	else if($id)
	{
		if($intro_name !='')
		{
			$seelct = mysql_query("select * from members where username ='".$intro_name."'");
			if(mysql_num_rows($seelct) > 0)
			{
				$intros = mysql_fetch_array($seelct);
				$intro_id = $intros['member_id'];
			}
			else
			{
				$intro_id = 0;
				$intro_idflag=1;
				$_SESSION['intro_idflag_sd']="<font color='#FF0000' size=1>Invalid Sponsor</font>";
			}
		}
        
			/*if($firstname=='')
		{
			$firstnameflag=1;
			$_SESSION['empty_fname']="<font color='#FF0000' size=1>Please enter the full name</font>";
		}
		if($mailid=='')
		{
			$mailflag=1;
			$_SESSION['empty_mail']="<font color='#FF0000' size=1>Please Enter the Valid Mail ID</font>";
		}

		$re_user    = "^[a-z0-9\._-]+"; 
		$re_delim   = "@"; 
		$re_domain  = "[a-z0-9][a-z0-9_-]*(\.[a-z0-9_-]+)*"; 
		$re_tld     = "\.([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|" . "int|mil|museum|name|net|org|pro)$"; 
		if(eregi($re_user . $re_delim . $re_domain . $re_tld, $mailid)==0)
		{
			$mailflag=1;
			$_SESSION['empty_mail']="<font color='#FF0000' size=1>Please Enter the Valid Mail ID</font>";
		}

		
		if($mailid !='')
		{
			$sdre=mysql_query("select * from members where member_email='$email' and member_id <> ".$_GET['id']);
			if(mysql_num_rows($sdre) > 0)
			{
				$invaild_mailflag=1;
				$_SESSION['invaild_mailflag']="<font color='#FF0000' size=1>Mail ID is Not available</font>";
			}
		}

		if($username=='')
		{
				$userflag=1;
				$_SESSION['empty_user']="<font color='#FF0000' size=1>Please Enter the Username</font>";
		}

		if(strlen($username)<4 && $username!='') // || strlen($username)>10)
		{
			$userflag=1;
			$_SESSION['empty_userstr']="<font color='#FF0000' size=1>Please Enter the Username Minimum 4 characters</font>";
		}

		
		if($username != '')
		{
			$check_dupuser_query=mysql_query("select * from members where username='$username' and member_id <> ".$_GET['id']);
	 		if(mysql_num_rows($check_dupuser_query) > 0)
			{
				$userflag=1;
				$_SESSION['empty_user']="<font color='#FF0000' size=1>Username is Not Available</font>";
			}
		}

		if($password != '')
		{		
			if(strlen($password)<4 && $password!='') // || strlen($password)>8)
			{
				$passflag=1;
				$_SESSION['empty_passstr']="<font color='#FF0000' size=1>Please Enter the Password Minimum 4 characters</font>";
			}

			if($password != $cpassword || $cpassword=="")
			{
				$cpassflag=1;
				$_SESSION['empty_cpass']="<font color='#FF0000' size=1>Re-Type Password does not match</font>";
			}
		}

		if($country=='')
		{
				$countryflag=1;
				$_SESSION['empty_country']="<font color='#FF0000' size=1>Please select the Country</font>";
		}

		if($question=='')
		{
				$questionflag=1;
				$_SESSION['empty_question']="<font color='#FF0000' size=1>Please select the Security Question </font>";
		}

		if($sec_ans=='')
		{
				$sec_ansflag=1;
				$_SESSION['empty_sec_ans']="<font color='#FF0000' size=1>Please enter the Security answer </font>";
		}*/

    //    print_r($_POST);
		//if($firstnameflag!=1 && $mailflag!=1 && $userflag!=1 && $countryflag!=1 && $passflag!=1 && $questionflag!=1 && $cpassflag!=1 && $invaild_mailflag!=1 && $sec_ansflag!=1 && $intro_idflag!=1)
		if($firstnameflag!=1 && $mailflag!=1 && $userflag!=1 && $countryflag!=1 && $passflag!=1 && $cpassflag!=1 &&  $intro_idflag!=1)
		{
		    //echo 1;

			//$update_time=mysql_query("update members set password='$password',member_email='$mailid',member_name='$firstname',lastname='$lastname' where member_id='$id'");
			$status = $_POST['status'];

			$update_quer.= "update members set username='".$username."', member_email='".$mailid."', first_name='".$firstname."', intro_id='".$intro_id.
			"', street='".$address1."',city='".$city."', state='".$state."', country='".$country."', question='".$question."', answer='".$sec_ans.
			"',status='".$status."',lr_num= '".$lr_num."',gdb_num= '".$gdp_num."',
			st_pay='".$skrill."',advcash='".$advcash."',skrill='".$neteller."',neteller='".$neteller."',payeer='".$payeer.
			"',bitcoin='".$bitcoin."',paypal='".$paypal."',pm_num= '".$pm_num."',payza_num='".$alertpay."',ego_num='".$ego_num."',accnum='".
			$accnum."',bank_name='".$bank_name."',bank_code='".$bank_code."',bank_branch='".$bank_branch."',bank_city='".$bank_city."',bank_state='".
			$bank_state."',bank_country='".$bank_country."',bank_zipcode='".$bank_zipcode."',is_sufficient=".$is_sufficient;

			//if($password != '')
			//{
				$update_quer.=",password='$password',zipcode='".$zipcode."',gender='".$gender."'";
			//}
		
			$update_quer.=" where member_id='$id'";
	//		echo $update_quer;
		$update_time=mysql_query($update_quer);

		$_SESSION['success_flag']="<font color='#004000'><b>User Updated Successfully</b></font>";
			echo '<meta http-equiv="refresh" content="0;url=mainuser.php?status=active">';
			exit();
		}
		else
		{
			$_SESSION['errror_msg']="<font color='#FF0000' size=1>Please check the below details.</font>";
			echo '<meta http-equiv="refresh" content="0;url=edit_user.php?id='.$id.'">';
			exit();
		}
	}
	else
	{	
		if($intro_name !='')
		{
			$seelct = mysql_query("select * from members where username ='".$intro_name."'");
			if(mysql_num_rows($seelct) > 0)
			{
				$intros = mysql_fetch_array($seelct);
				$intro_id = $intros['member_id'];
			}
			else
			{
				$intro_id = 0;
			}
		}

	

		if($firstname=='')
		{
			$firstnameflag=1;
			$_SESSION['empty_fname']="<font color='#FF0000' size=1>Please enter the full name</font>";
		}
		
		
		
	
		

		if($mailid=='')
		{
			$mailflag=1;
			$_SESSION['empty_mail']="<font color='#FF0000' size=1>Please Enter the Valid Mail ID</font>";
		}

		$re_user    = "^[a-z0-9\._-]+"; 
		$re_delim   = "@"; 
		$re_domain  = "[a-z0-9][a-z0-9_-]*(\.[a-z0-9_-]+)*"; 
		$re_tld     = "\.([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|" . "int|mil|museum|name|net|org|pro)$"; 
		if(eregi($re_user . $re_delim . $re_domain . $re_tld, $mailid)==0)
		{
			$mailflag=1;
			$_SESSION['empty_mail']="<font color='#FF0000' size=1>Please Enter the Valid Mail ID</font>";
		}

		

		

		if($mailid !='')
		{
			$sdre=mysql_query("select * from members where member_email='$email'");
			if(mysql_num_rows($sdre) > 0)
			{
				$invaild_mailflag=1;
				$_SESSION['invaild_mailflag']="<font color='#FF0000' size=1>Mail ID is Not available</font>";
			}
		}

		if($username=='')
		{
				$userflag=1;
				$_SESSION['empty_user']="<font color='#FF0000' size=1>Please Enter the Username</font>";
		}



		if($day == 0 || $month == 0 || $year == 0)
		{
				$userflag=1;
				$_SESSION['empty_dateofbirth']="<font color='#FF0000' size=1>Please select valid date of birth</font>";
		}

		

		if(strlen($username)<4 && $username!='') // || strlen($username)>10)
		{
			$userflag=1;
			$_SESSION['empty_userstr']="<font color='#FF0000' size=1>Please Enter the Username Minimum 4 characters</font>";
		}

		
		

		if($password=='')
		{
			$passflag=1;
			$_SESSION['empty_pass']="<font color='#FF0000' size=1>Please Enter the Password</font>";
		}

		
		if(strlen($password)<4 && $password!='') // || strlen($password)>8)
		{
			$passflag=1;
			$_SESSION['empty_passstr']="<font color='#FF0000' size=1>Please Enter the Password Minimum 4 characters</font>";
		}

		if($password != $cpassword || $cpassword=="")
		{
			$cpassflag=1;
			$_SESSION['empty_cpass']="<font color='#FF0000' size=1>Re-Type Password does not match</font>";
		}

		

		if($country=='')
		{
				$countryflag=1;
				$_SESSION['empty_country']="<font color='#FF0000' size=1>Please select the Country</font>";
		}

		if($question=='')
		{
				$questionflag=1;
				$_SESSION['empty_question']="<font color='#FF0000' size=1>Please select the Security Question </font>";
		}

		if($sec_ans=='')
		{
				$sec_ansflag=1;
				$_SESSION['empty_sec_ans']="<font color='#FF0000' size=1>Please enter the Security answer </font>";
		}

		 
		if(preg_match('/\s/',$username) ) {
		    $username_space_flag = 1;
		    $_SESSION['empty_user']="<font color='#FF0000' size=1>Username cannot accept any space</font>";
		}
		

		if($username_space_flag !=1 && $firstnameflag!=1 && $mailflag!=1 && $userflag!=1 && $countryflag!=1 && $passflag!=1 && $questionflag!=1 && $cpassflag!=1 && $invaild_mailflag!=1 && $sec_ansflag!=1)
		{
			$check_dupuser_query="select * from members where username='$username'";
	 		$check_dupuser_result=mysql_query($check_dupuser_query);
			if(mysql_num_rows($check_dupuser_result)<=0)
			{
			    $date=date('Y-m-d');
	            //print_r($_POST);
                //echo $_POST['txtpass'] ."<br/>";
                $member_create_sql = "insert into members (username,password,member_email,first_name,last_name,status,date_of_join,intro_id,street,city,state,country,question,answer,zipcode,gender,dob,refer_id,lr_num,pm_num,gdb_num,st_pay,paypal,bitcoin,payeer,neteller,skrill,advcash,readable_pass) values('".$username."','".$password."','".$mailid."','".$firstname."','".$lastname."','active','".$date."','".$intro_id."','".$address1."','".$city."','".$state."','".$country."','".$question."','".$sec_ans."','". $zipcode."','".$gender."','".$dob."','".$refer_id."','".$lr_num."','".$pm_num."','".$gdp_num."','".$st_pay."','".$paypal."','".$bitcoin."','".$payeer."','".$neteller."','".$skrill."','".$advcash."','". $readable_pass ."')";
                //echo $member_create_sql;
               //exit();

				$insert=mysql_query($member_create_sql);
				//MAIL TO USER

		
		$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
		$sitename=$sitename['set_value'];
		
		$adminmail=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
		$adminmail=$adminmail['set_value'];
						
		$refer_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		$refer_url=str_replace("administrator/user_validate","index",$refer_url);
		$login_url=str_replace("index","login",$refer_url);
		$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =2"));
			$mail_from_id = $mail_fetch['from_id'];
			$mailsubject =$mail_fetch['mailsubject'];
			$message = html_entity_decode($mail_fetch['message']);
			
	
			$refer_url = $refer_url."?".$fetch['username'];
			$message=str_replace('[FIRSTNAME]',$firstname,$message);
			$message=str_replace('#verfyurl',$login_url,$message);
			$message=str_replace('[USERNAME]',$username,$message);
			$message=str_replace('[PASSWORD]',base64_decode(base64_decode($password)),$message);
			$message=str_replace('[REFERRAL_ID]',$username,$message);
			$message=str_replace('[REFERRAL_LINK]',$refer_url,$message);
			$message=str_replace('#sitename',$sitename,$message);
			$message=str_replace('#adminmail',$mail_from_id,$message);
			$message=str_replace('#adminemill',$mail_from_id,$message);
						
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: '.$sitename.' <'.$adminmail.'>' . "\r\n";
			//echo $message; exit;
			@mail($fetch['member_email'],$mailsubject,$message,$headers);
		
				$_SESSION['success_flag']="<font color='#004000'><b>New User Successfully Added</b></font>";
				echo '<meta http-equiv="refresh" content="0;url=mainuser.php?status=active">';
				exit();
			}
			else
			{
				$_SESSION['post_intro_name'] = $intro_name;
				$_SESSION['post_user'] = $username;
				$_SESSION['post_pass'] = $password;
				$_SESSION['post_cpass'] = $cpassword;
				$_SESSION['post_mail'] = $mailid;
				$_SESSION['post_fname'] = $firstname;
				$_SESSION['post_address'] = $address1;
				$_SESSION['post_city'] = $city;
				$_SESSION['post_state'] = $state;
				$_SESSION['post_country'] = $country;
				$_SESSION['post_Payza'] = $alertpay;
				$_SESSION['post_lr_num'] = $lr_num;
				$_SESSION['post_paypal'] = $paypal;
				$_SESSION['post_bitcoin'] = $bitcoin;
				$_SESSION['post_payeer'] = $lr_payeer;
				$_SESSION['post_neteller'] = $neteller;
				$_SESSION['post_skrill'] = $skrill;
				$_SESSION['post_advcash'] = $advcash;
				$_SESSION['post_question'] = $question;
				$_SESSION['post_sec_ans'] = $sec_ans;
				$user_exists=1;

				$_SESSION['empty_userexist']="<font color='#FF0000' size=1>Username is Not Available.</font>";
				echo '<meta http-equiv="refresh" content="0;url=create_user.php">';
				exit();
			}
		}
		else	
		{
			$_SESSION['post_intro_name'] = $intro_name;
			$_SESSION['post_user'] = $username;
			$_SESSION['post_pass'] = $password;
			$_SESSION['post_cpass'] = $cpassword;
			$_SESSION['post_mail'] = $mailid;
			$_SESSION['post_fname'] = $firstname;
			$_SESSION['post_address'] = $address1;
			$_SESSION['post_city'] = $city;
			$_SESSION['post_state'] = $state;
			$_SESSION['post_country'] = $country;
			$_SESSION['post_Payza'] = $alertpay;
			$_SESSION['post_lr_num'] = $lr_num;
			$_SESSION['post_question'] = $question;
			$_SESSION['post_sec_ans'] = $sec_ans;

			$_SESSION['errror_msg']="<font color='#FF0000' size=1>Please check the below details.</font>";
			echo '<meta http-equiv="refresh" content="0;url=create_user.php">';
			exit();
		}
 	}
 ?>