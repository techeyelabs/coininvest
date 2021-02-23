<?PHP session_start();
error_reporting(0);

	
	require 'include/connect.php';
	
	
	$old=$_POST['txtopass1'];



	$new=$_POST['txtnpass1'];



	$con=$_POST['txtcpass1'];


	if($old=='' )
	{
		$passflag=1;
		$_SESSION['empty_old']="<font color='#FF0000'>Please Enter the Vaild Password</font>";
	}
	
	if($new=='')
	{
		$newstrflag=1;
		$_SESSION['empty_new']="<font color='#FF0000'>Please Enter the New Password</font>";
	}
	if(strlen($new)<3 && $new!='') // || strlen($password)>8)
	{
		$newstrflag=1;
		$_SESSION['empty_new']="<font color='#FF0000'>Please Enter the Password Minimum 4 characters</font>";
	}
	
	
	if($new != $con || $con=="")
	{
		$cpassflag=1;
		$_SESSION['empty_con']="<font color='#FF0000'>Confirm Password does not match</font>";

	}
	
	
	
	
	
	if($passflag!=1 && $newstrflag!=1 && $cpassflag!=1)
	{
	
	
		$user_id=$_SESSION['userid'];
		
		
		
		$sql_query=mysql_query("select * from admin where transactioncode ='".md5($old)."' and admin_id=1");

		if(mysql_num_rows($sql_query) > 0)
		{
		
			//echo "update admin set transactioncode ='".md5($new)."' where admin_id=1"; exit;
			
		
			$sql=mysql_query("update admin set transactioncode ='".md5($new)."' where admin_id=1");
			$_SESSION['succ_dir']="<font color='#004000'><strong>Successfully Updated</strong></font>";
			echo '<meta http-equiv="refresh" content="0;url=changepassword.php">';
			exit();
		}
		else
		{
			$_SESSION['old_cpass1']="<font color='#FF0000'>Password does not match</font>";
			echo '<meta http-equiv="refresh" content="0;url=changepassword.php">';
			exit();
		}
	}
	else
	{
		echo '<meta http-equiv="refresh" content="0;url=changepassword.php">';
			exit();
	}
?>