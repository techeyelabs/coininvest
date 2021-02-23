<?PHP session_start();
error_reporting(0);
	require 'include/connect.php';
	
	$old=$_POST['txtopass'];
	$new=$_POST['txtnpass'];
	$con=$_POST['txtcpass'];

	if($old=='' || $new=='' || $con=='')
	{
		$passflag=1;
		$_SESSION['empty_pass']="<font color='#FF0000'>Please Enter the Vaild Password</font>";
	}

	if(strlen($new)<4 && $new!='') // || strlen($password)>8)
	{
		$newstrflag=1;
		$_SESSION['empty_newstr']="<font color='#FF0000'>Please Enter the Password Minimum 4 characters</font>";
	}
	if($new != $con || $con=="")
	{
		$cpassflag=1;
		$_SESSION['empty_cpass']="<font color='#FF0000'>Confirm Password does not match</font>";
	}
	if($passflag!=1 && $newstrflag!=1 && $cpassflag!=1)
	{
		$user_id=$_SESSION['userid'];
		
		
		$sql_query=mysql_query("select * from admin where admin_password='".md5($old)."' and admin_id=1");
		if(mysql_num_rows($sql_query) > 0)
		{
			$sql=mysql_query("update admin set admin_password='".md5($new)."' where admin_id=1");
			$_SESSION['succ_dir']="<font color='#004000'><strong>Successfully Updated</strong></font>";
			echo '<meta http-equiv="refresh" content="0;url=changepassword.php">';
			exit();
		}
		else
		{
			$_SESSION['old_cpass']="<font color='#FF0000'>Password does not match</font>";
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