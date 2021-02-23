<?php	
	date_default_timezone_set("Europe/London");
	session_start();
	require( __DIR__ .'/connect.php');

	$username  = trim(mysqli_real_escape_string($_POST['txtUsername'])); 
	$password  = trim(mysqli_real_escape_string($_POST['txtPassword']));	

	if($username=='')
	{
		$userflag=1;
		$_SESSION['empty_user']="<span class='formerror'>Please Enter the Username</span>";
	}
	if($password=='')
	{
		$passflag=1;
		$_SESSION['empty_pass']="<span class='formerror'>Please Enter the Password</span>";
	}
	

	if($userflag!=1 && $passflag!=1 )
	{
		$current_time = date('Y-m-d H:i:s');
		$validuser_check_query="select * from members where username='".$username."' and password='".base64_encode(base64_encode($password))."' and status='active'";
		// echo('<pre>');
		// print_r($validuser_check_query);
		// exit;
		$validuser_check_result=mysqli_query($validuser_check_query);
		if(mysqli_num_rows($validuser_check_result)>0) 
		{
				
			$validuser_check_row=mysqli_fetch_array($validuser_check_result);
			if($validuser_check_row['suspend_time'] == '0000-00-00 00:00:00' || $validuser_check_row['suspend_time'] < $current_time)
			{
				$_SESSION['userid']   = $validuser_check_row['member_id'];
				$_SESSION['username'] = $validuser_check_row['username'];
				mysqli_query("UPDATE members SET last_login_time='".$validuser_check_row['current_login_time']."',current_login_time='".date('Y-m-d H:i:s')."',last_asscess_ip='".$validuser_check_row['current_asscess_ip']."',current_asscess_ip='".$_SERVER['REMOTE_ADDR']."' WHERE member_id='".$_SESSION['userid']."'");
			echo '<meta http-equiv="refresh" content="0;url=account.php">';
				exit();
			}
			else
			{
				$_SESSION['invalid']="<font color='#FF0000'>Your Account has suspended for next 24 hours</font>";
				echo '<meta http-equiv="refresh" content="0;url=index.php">';
				exit();
			}
		}
		else
		{				
			if($_SESSION['lcnt'])
			{
				$lcnt=$_SESSION['lcnt']+1;
			}
			else
			{
				$lcnt=1;
			}
			$_SESSION['lcnt']=$lcnt;
			
			if($lcnt >= 6)
			{
				$dattime = date('Y-m-d');
				$asl = mysqli_fetch_array(mysqli_query("SELECT DATE_ADD('".$dattime."', INTERVAL 1 DAY) as cnt"));
				$exp  = $asl['cnt']." ".date('H:i:s');
				
				$update = mysqli_query("update members set suspend_time= '$exp' where username='$username'");
				$_SESSION['invalid']="<font color='#FF0000'>Your Account has suspended for next 24 hours due to invalid username or password</font>";
				echo '<meta http-equiv="refresh" content="0;url=index.php">';
				exit();					
			}			
			$_SESSION['user_name_login']=$username; 
			$_SESSION['user_password_login']=$password;
			$_SESSION['invalid']="<font color='#FF0000'>Invalid username or password</font>";
			echo '<meta http-equiv="refresh" content="0;url=index.php">';
			exit(); 
		}
			
	}
	else
	{		 

		echo '<meta http-equiv="refresh" content="0;url=index.php">';
		exit(); 
	}
		 
?>