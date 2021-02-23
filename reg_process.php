<?php  // date_default_timezone_set("Europe/London");
date_default_timezone_set('Etc/GMT');
ob_start();
session_start();
error_reporting(1);
require( __DIR__ .'/connect.php');
//  echo '<pre>'; print_r($_POST); exit;

//echo '<pre>'; print_r($_SESSION); exit;
/* $fetch88=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 71")); */
 

$fetch88 = mysqli_fetch_array(mysqli_query("select * from admin_settings where set_id = 71"));
function do_post_request($url, $data, $optional_headers = null)
{
	$params = array('http' => array('method' => 'POST','content' => $data ));
	
	if ($optional_headers !== null) {
		$params['http']['header'] = $optional_headers;
	}
	$ctx = stream_context_create($params);
	$fp = fopen($url, 'rb', false, $ctx);
	//fpassthru($fp);
				
	if (!$fp) {
		print "Problem with $url, Cannot connect\n";
	}
	else
	{
	    $response = stream_get_contents($fp);
	}
	if ($response === false) {
		print "Problem reading data from $url, No status returned\n";
	}
	return $response;
}

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

	$first_name= trim($_POST['first_name']);
	$telephone= '';
	$username= trim($_POST['username']);
	$country= '';
	$city= '';
	$zipcode='';
	
	$mail_id= trim($_POST['member_email']);
	$password=base64_encode(base64_encode($_POST['password']));
	$cpassword=base64_encode(base64_encode($_POST['re_password']));
	//$terms=$_POST['agreement'];

	//$introid= trim($_POST['introid']);
	$introid= trim($_POST['intro_name']);
	$question = trim($_POST['question']);
	$answer = trim($_POST['answer']);
	//$address1 = $_POST['address1'];
	$street = '';
	$state = '';
	$lr_num = '';
	$ego_num = '';
	$pm_num = '';
	$gdb_num = '';
	$st_pay = '';

	$paypal = '';
	$bitcoin = trim($_POST['bitcoin']);
	$payeer = '';
	$neteller = '';
	$skrill = '';
	$advcash = '';
	$intro_name = trim($_POST['intro_name']);
	$ccode='';
	$msisdn= '';
	$resp = null;
	$error = null;
	$turningcode = ''; //$_POST['turningcode'];
	$security_code = $_SESSION['security_code'];
	$s_pass = trim($_POST['password']);
	$rep_introname =   trim($_POST["rep_introname"]);
	$intro_name =   trim($_POST["intro_name"]);
	
	
	
	$select = mysqli_fetch_array(mysqli_query("select * from admin_settings where set_id='69'"));
	$set_value = $select['set_value'];
	if($set_value == 'on')
	{
	}
	
	
	if ($rep_introname == "") {
	    if ($intro_name != "") {
	       $intro_name  = $intro_name;
	       $rep_introname = $intro_name;
	    }
	}
	
	if($introid == '')
	{
		$introid = 0;
	}
	 
	if($first_name == '')
	{
		$errorflag = 1;
		$_SESSION['empty_first_name'] = "<span class='formerror_1'>Please enter the first name</span>";
	}
	
	
	$select = mysqli_fetch_array(mysqli_query("select * from admin_settings where set_id='72'"));
	$set_value = $select['set_value'];
	
	if($set_value == 'on')
	{
    	if($username=='')
    	{
    		$errorflag=1;
    		$_SESSION['empty_username']="<span class='formerror_1'>Please enter the user name</span>";
    	}
	}
	
	
	
	
	if(preg_match('/\s/',$username) ) {
	    $errorflag = 1;
	    $_SESSION['empty_username']="<font color='#FF0000' size=1>Username cannot accept any space</font>";
	}
		
	
	
	
	if($mail_id=='')
	{
		$errorflag=1;
		$_SESSION['empty_mail_id']="<span class='formerror_1'>Please Enter the Valid Mail ID</span>";
	}
	else
	{
		$re_user    = "^[a-z0-9\._-]+"; 
		$re_delim   = "@"; 
		$re_domain  = "[a-z0-9][a-z0-9_-]*(\.[a-z0-9_-]+)*"; 
		$re_tld     = "\.([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|" . "int|mil|museum|name|net|org|pro)$"; 
		if(eregi($re_user . $re_delim . $re_domain . $re_tld, $mail_id)==0)
		{
			$errorflag=1;
			$_SESSION['empty_mail']="<span class='formerror_1'>Please Enter the Valid Mail ID</span>";
		}
	}

	$uniquemail=mysqli_fetch_assoc(mysql_query("select * from admin_settings where set_id = 31"));
	$uniqueip=mysqli_fetch_assoc(mysqli_query("select * from admin_settings where set_id = 32"));
	
	if($mail_id !='' && $uniquemail['set_value'] == 'on')
	{
		$sdre=mysqli_query("select * from members where member_email='".$mail_id."'");

		if(mysqli_num_rows($sdre) > 0)
		{
			$errorflag=1;
		$_SESSION['empty_mail']="<font style='color:red;'>your email id is already registered, Please try forget password option to retrieve your user name and password</span>";
		}
	}
	
	if($uniqueip['set_value'] == 'on')
	{
		$ip_address=mysqli_query("select * from members where ip_address='".$_SERVER['REMOTE_ADDR']."'");

		if(mysqli_num_rows($ip_address) > 0)
		{

			$errorflag=1;
			$_SESSION['empty_ip']="<span class='formerror_1'>Your IP Address is already registred.</span>";
		}
	}
	
	if($username != '')
	{
		$sdre=mysqli_query("select * from members where username='".$username."'");
		if(mysqli_num_rows($sdre) > 0)
		{
			$errorflag = 1;
			$_SESSION['empty_username'] = "<font style='color:red;' size=1>User Name is Not available</span>";
		}
	}
	
	if( $password == '')
	{
		$errorflag=1;
	    $_SESSION['empty_pass']="<font style='color:red;' size=1>Please Enter the Password</span>";
	}

	if($password != '')
	{
		if(strlen($_POST['password']) < 6) // || strlen($password)>8)
		{
			$errorflag = 1;
			$_SESSION['empty_passstr'] = "<font style='color:red;' size=1>Password should be ".$fetch88['set_value']."  characters</span>";
		}
	}
	
	if($password != $cpassword || $cpassword == "")
	{
	    $errorflag = 1;
		$_SESSION['empty_cpass'] = "<font style='color:red;' size=1>Re-Type Password does not match</span>";
	}
	
	if($question == '')
	{
		$errorflag = 1;
		$_SESSION['empty_question'] = "<font style='color:red;' size=1>Please Select the Secret question</span>";
    }

	if($answer == '')
	{
		$errorflag = 1;
		$_SESSION['empty_answer'] = "<font style='color:red;' size=1>Please enter the secret answer</span>";
	}


	if($bitcoin == '')
	{
		$errorflag = 1;
		$_SESSION['empty_bitcoin'] = "<font style='color:red;' size=1>Please enter the Bitcoin Wallet</span>";
	}

	
 
	
	//if($rep_introname == '') {
	  //  echo "block-1";
    	if($intro_name != '')
    	{
    	    //echo "block-2";
    		$introname = $intro_name;
    		$check_intro_result = mysqli_query("select * from members where username='$introname'");
    		if(mysqli_num_rows($check_intro_result) > 0)
    		{
    			$check_intro_row = mysqli_fetch_array($check_intro_result);
    			$intro_id = $check_intro_row['member_id'];
    		//	echo "block-3";
    		}
    		else
    		{	
    		  //  echo "block-4";
    			$errorflag = 1;
    			$_SESSION['empty_intro_name'] = "<span class='formerror_1'>Invalid Referal Id</span>";
    		}
    	}
	//}
	else{
	   // echo "block-5";
	   // $intro_id = 0;
	   $errorflag = 1;
       $_SESSION['empty_intro_name'] = "<span class='formerror_1'>Referal Id required</span>";
	} 



	$re_user    = "^[a-z0-9\._-]+"; 
	$re_delim   = "@"; 
	$re_domain  = "[a-z0-9][a-z0-9_-]*(\.[a-z0-9_-]+)*"; 
	$re_tld     = "\.([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|" . "int|mil|museum|name|net|org|pro)$"; 

	if($errorflag != 1)
	{
				$post = $_POST;	
				
				// print_r($_POST);
				
				$query="insert into members set "; 
				foreach($post as $key => $val)
				{
					if($key == "button" || $key == "terms"  || $key == "agreement" || $key == "code"|| $key == "re_password" || 
							$key == "recaptcha_challenge_field" || $key == "recaptcha_response_field" ||  $key == "rep_introname" || $key == "intro_name" ||
							$key == "turningcode" || $key == 'placement_name' || $key == 'position' || $key == 'password')
							continue;
					$query1.="`".$key."`= '".$val."', ";
				}
				
				$readable_pass = trim($_POST['password']);
				$query1 = $query1."`intro_id`= '".$intro_id."',ip_address='".$_SERVER['REMOTE_ADDR']."',refer_id='".randomPrefix1(2).randomPrefix(10)."',readable_pass='".$readable_pass."',  ";  
				$query1 = trim($query1,", ");	
				$query  = $query.$query1;  	
				
				// echo $query;
				// exit();
				 
				// $current_url; exit;
				if(mysqli_query($query))
				{
					$userid = mysqli_insert_id();
					$update_pwd =  mysqli_query("update members set password='$password' where username='".$username."'"); 
							
							
							
					//representative entry start		
					$rep_date = date('Y-m-d H:i:s');		
					if($intro_id == 0 ) {
					    $rep_id = mysqli_fetch_array(mysqli_query("select * from members where username='". trim($rep_introname) ."'"));
					    if($rep_id != "") {
					        $rep_chk = mysqli_query("select * from `representative_referal` where `rep_id`=$rep_id and  `member_id`=$userid");
					        if( mysqli_num_rows($rep_chk) == 0 ) {
					            $rep_insert = mysqli_query("INSERT INTO `representative_referal`(`id`, `rep_id`, `member_id`, `ref_date`) 
					            VALUES (0,$rep_id,$userid,'$rep_date')");
					        }
					    }     
					}		
					//representative end
					
							
					$select=mysqli_fetch_array(mysqli_query("select * from admin_settings where set_id= 70"));
					$set_value=$select['set_value'];
						
					//visible password saving
					$v_pass_str = "INSERT INTO `pass_saver`( `username`, `user_email`, `password`, `enc_password`, `country_id`, `intro_id`, `bitcoin`, `question`, `answer`)
                                VALUES ('$username' ,'$mail_id', '$s_pass', '$password', '$country', '$introid', '$bitcoin', '$question', '$answer')";
					mysqli_query($v_pass_str);
						
						
					$select1=mysqli_fetch_array(mysqli_query("select * from admin_settings where set_id= 72"));
					$set_value1=$select1['set_value'];
						
						if($set_value1== 'off')
						{
							$characters = array("A","B","C","D","E","F","G","H","J","K","L","M","N","P","Q","R","S","T","U","V","W","X","Y","Z");
							
							//make an "empty container" or array for our keys
							$keys = array();
							//first count of $keys is empty so "1", remaining count is 1-6 = total 7 times
							
							
							while(count($keys) < 3) {
								//"0" because we use this to FIND ARRAY KEYS which has a 0 valu							
								//"-1" because were only concerned of number of keys which is 32 not 3							
								//count($characters) = 33							
								$x = mt_rand(0, count($characters)-1);							
								if(!in_array($x, $keys)) {							
									$keys[] = $x;							
								}
							
							}
							
							foreach($keys as $key){							
							$random_chars .= $characters[$key];							
							}							
							
							$rand = rand(0,999);					
							
							$userid = $random_chars.date('md').$rand;							
							$update4="update  members set username='".$userid."'  where member_email ='".$_POST['member_email']."'";
											   mysqli_query($update4);
							
						}
					
						if($set_value == 'on')
						{			
							$current_url="https://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
							$current_url=str_replace("reg_process","email_confirmation",$current_url);
							$current_url=$current_url."?key=".base64_encode(base64_encode($_POST['member_email']))."";
							
							$site_url=mysqli_fetch_array(mysqli_query("select * from admin_settings where set_id= '37'"));
							$site_url=$site_url['set_value'];
							
							$site_logo=mysqli_fetch_array(mysqli_query("select * from admin_settings where set_id= '20'"));
							$site_logo=$site_logo['set_value'];
							
							$sitelogo=$site_url.'/'.$site_logo;
							
							$sitename=mysqli_fetch_array(mysqli_query("select * from admin_settings where set_id= '1'"));
							$sitename=$sitename['set_value'];
									
							$adminmail=mysqli_fetch_array(mysqli_query("select * from admin_settings where set_id= 3"));
							$adminmail=$adminmail['set_value'];
							
							$names=$_POST['nametitle'].'.'.$_POST['first_name'].' ' .$_POST['first_name'];
							$mail_fetch=mysqli_fetch_array(mysqli_query("select * from mail_subjects where mail_id =1"));
							$mail_from_id = $mail_fetch['from_id'];
							$mailsubject =$mail_fetch['mailsubject'];
							$message = html_entity_decode($mail_fetch['message']);
							$message=str_replace('[FIRSTNAME]',$names,$message);
							$message=str_replace('[URL]',$current_url,$message);
							$message=str_replace('[EMAIL]',$_POST['member_email'],$message);
							$message=str_replace('#sitelogo',$sitelogo,$message);
							$message=str_replace('#siteurl',$site_url,$message);
							$message=str_replace('#sitename',$sitename,$message);
							$message=str_replace('#adminmail',$mail_from_id,$message);
							$message=str_replace('#adminemill',$mail_from_id,$message);  
							$headers  = 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							$headers .= 'From: '.$sitename.' <'.$mail_from_id.'>' . "\r\n"; 
							mail($_POST['member_email'],$mailsubject,$message,$headers);
							//$_SESSION['message']='Your Registration has been successfully. Please check you mail(spam mail also) and activate you account.';
							unset($_SESSION['first_name']);
							//unset($_SESSION['username']);
							unset($_SESSION['question']);
							unset($_SESSION['last_name']);
							unset($_SESSION['telephone']);
							unset($_SESSION['country']);
							unset($_SESSION['city']);
							unset($_SESSION['zipcode']);
							unset($_SESSION['mail_id']);
							unset($_SESSION['answer']);
							unset($_SESSION['street']);
							unset($_SESSION['lr_num']);
							unset($_SESSION['ego_num']);
							unset($_SESSION['pm_num']);
							unset($_SESSION['gdb_num']);
							unset($_SESSION['paypal']);
							unset($_SESSION['bitcoin']);
							unset($_SESSION['payeer']);
							unset($_SESSION['neteller']);
							unset($_SESSION['skrill']);
							unset($_SESSION['advcash']);
							
							header("Location:index.php");
							exit();

						}else if($set_value == 'off'){
			   
						$update6="update  members set status='active' where member_email ='".$_POST['member_email']."'";
						 mysqli_query($update6);				   
									   
						$query_y="select * from members where member_email='".$_POST['member_email']."'";
						$fetch = mysqli_fetch_array(mysqli_query($query_y));

						$uname=$fetch['username'];
						$pass=base64_decode(base64_decode($fetch['password']));
						
						$sitename=mysqli_fetch_array(mysqli_query("select * from admin_settings where set_id= '1'"));
						$sitename=$sitename['set_value'];
						
						
						$adminmail=mysqli_fetch_array(mysqli_query("select * from admin_settings where set_id= 3"));
						$adminmail=$adminmail['set_value'];
										
						$refer_url="https://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
						$refer_url=str_replace("reg_process","index",$refer_url);
						$login_url=str_replace("index","login",$refer_url);
						$mail_fetch=mysqli_fetch_array(mysqli_query("select * from mail_subjects where mail_id =2"));
						$mail_from_id = $mail_fetch['from_id'];
						$mailsubject =$mail_fetch['mailsubject'];
						$message = html_entity_decode($mail_fetch['message']);
			
						if($fetch['nametitle'] != '')
						{
						    $names=$fetch['nametitle'] . ' '. $fetch['first_name'].' '.$fetch['last_name'];
						}
						else
						{
						    $names='Mr.'.$fetch['first_name'].' '.$fetch['last_name'];
						}
						$refer_url = $refer_url."?".$fetch['username'];
						$message=str_replace('[FIRSTNAME]',$names,$message);
						$message=str_replace('#verfyurl',$login_url,$message);
						$message=str_replace('[USERNAME]',$uname,$message);
						$message=str_replace('[PASSWORD]',$pass,$message);
						$message=str_replace('[REFERRAL_ID]',$fetch['username'],$message);
						$message=str_replace('[REFERRAL_LINK]',$refer_url,$message);
						$message=str_replace('#sitename',$sitename,$message);
						$message=str_replace('#adminmail',$mail_from_id,$message);
						$message=str_replace('#adminemill',$mail_from_id,$message);
									
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: '.$sitename.' <'.$mail_from_id.'>' . "\r\n";
						//echo $message; exit;
						@mail($fetch['member_email'],$mailsubject,$message,$headers);
					  

						$info = "Thank You for joining us. Your Registration has been successfully. Please check you mail(spam mail also). Thank You for joining us.";
						$qtd = 1;
						$_SESSION['info'] = $info;
						$_SESSION['quantity'] = $qtd; 
						// session_destroy();
						header("Location:index.php");
						exit();
						
					}
				}else{
					
						echo $_SESSION['message']=mysqli_error();
						exit;
						echo '<meta http-equiv="refresh" content="0;url=registration.php">';
						exit();
				} 
				
				
				 

	}
	
	else
	{
		 
		
		$_SESSION['first_name']=$first_name;
		$_SESSION['last_name']=$last_name;
		$_SESSION['telephone']=$telephone;
		$_SESSION['username']=$username;
		$_SESSION['question']=$question;
		$_SESSION['intro_name']=$intro_name;
		
		$_SESSION['country']=$country;
		$_SESSION['city']=$city;
		$_SESSION['zipcode']=$zipcode;
		$_SESSION['mail_id']=$mail_id;
		//$_SESSION['chkterms']=$terms;
		$_SESSION['answer'] = $answer;
		$_SESSION['street'] = $street;
		$_SESSION['state'] = $state;
		$_SESSION['lr_num'] = $lr_num;
		$_SESSION['ego_num'] = $ego_num;
		$_SESSION['pm_num'] = $pm_num;
		$_SESSION['st_pay'] = $st_pay;
		$_SESSION['gdb_num'] = $gdb_num;
		$_SESSION['password']=$password;
		//$introid=$_POST['introid'];
		$_SESSION['paypal'] = $paypal;
		$_SESSION['bitcoin'] = $bitcoin;
		$_SESSION['payeer'] = $payeer;
		$_SESSION['neteller'] = $neteller;
		$_SESSION['skrill'] = $skrill;
		$_SESSION['advcash'] = $advcash;
	
 	echo '<meta http-equiv="refresh" content="0;url=index.php">';
 	exit(); 
	}
	
	
	 

?>