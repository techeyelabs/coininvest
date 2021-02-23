<?php 
	date_default_timezone_set('Etc/GMT');
	// date_default_timezone_set("Europe/London");
	session_start();
    require_once(__DIR__ . '/connect.php');
    //print_r($_POST);
    
    
	$username  = trim(mysql_real_escape_string($_POST['txtUsername'])); 
	$password  = trim(mysql_real_escape_string($_POST['txtPassword']));	

	if($username=='')
	{
		$userflag=1;
		echo json_encode(["status"=> 1001, "msg" => "Please Enter the Username"]);
	}
	if($password=='')
	{
		$passflag=1;
		echo json_encode(["status"=> 1001, "msg" => "Please Enter the Password"]);
	}
	
	
	if($userflag!=1 && $passflag!=1 )	{
		$current_time = date('Y-m-d H:i:s');
		$validuser_check_query="select * from members where username='".$username."' and password='".base64_encode(base64_encode($password))."' and status='active'";
		$validuser_check_result=mysql_query($validuser_check_query);
		
		if(mysql_num_rows($validuser_check_result) > 0) {
			$validuser_check_row=mysql_fetch_array($validuser_check_result);
			if($validuser_check_row['suspend_time'] == '0000-00-00 00:00:00' || $validuser_check_row['suspend_time'] < $current_time)
			{
				$_SESSION['userid']   = $validuser_check_row['member_id'];
				$_SESSION['username_real'] = $validuser_check_row['username'];
				unset($_SESSION['introname']);
			//	mysql_query("UPDATE members SET last_login_time='". $validuser_check_row['current_login_time'] . "',current_login_time='". date('Y-m-d H:i:s') 
			//	. "',last_asscess_ip='". $validuser_check_row['current_asscess_ip'] . "',current_asscess_ip='"
			//	. $_SERVER['REMOTE_ADDR']."' WHERE member_id='".$validuser_check_row['member_id']."'");
		 	  
				echo json_encode(["status"=> 1002, "msg"=>"Your Account loggedin successfully", "url"=> "account.php"]);
			}else{
				echo json_encode(["status"=> 1001, "msg"=>"Your Account has suspended for next 24 hours"]);
			}
		}else 	{		 
        		echo json_encode(["status"=> 1001, "msg" => "Invalid user"]);
        }
	}else{		 
		echo json_encode(["status"=> 1001, "msg" => "Please check your username and password"]);
	}
?>