<?php 
// date_default_timezone_set("Europe/London");
date_default_timezone_set('Etc/GMT');


	$url=$_GET['url'];



	$canLogin=$_POST['canLogin'];



	$login_ip=$_SERVER['REMOTE_ADDR'];



	



	



	if($canLogin==1) {







	$username=$_POST['txtUsername'];







	$userempty=clear($username);



	$usercheck=alphanumericcheck($username);	



		$sql="select * from mandatory_list where id=6";



		$res=mysql_query($sql);



		$prow=mysql_fetch_array($res);



		if($prow['status']==1)



		{



		$password=$_POST['txtPassword'];



			$passempty=clear($password);



			$passcheck=alphanumericcheck($password);		



		if($password=='') $passflag=1;



		}



		



		$sql="select * from mandatory_list where id=4";



		$res=mysql_query($sql);



		$erow=mysql_fetch_array($res);



		if($prow['status']==0 && $erow['status']==1)



		{



		$email=$_POST['txtMail'];



		if($email=='')



		$emailflag=1;



		}



		



		$seccode=$_POST['txtSeccode'];



			$turingempty=clear($seccode);



			$turingcheck=alphanumericcheck($seccode);



		$scode=$_POST['scode'];



		$url=$_POST['url'];



		



	



		



		if($username=='') $userflag=1;



		



		if($seccode!=$scode) $secflag=1;



		



			



	if($usercheck!=0 and  $passcheck!=0 and  $turingcheck!=0)



	{	



		if($userflag!=1 && $passflag!=1 && $secflag!=1 && $emailflag!=1) {



		$tsql="select * from members where username='$username'";



		$tres=mysql_query($tsql);



		$trow=mysql_fetch_array($tres);



		if($prow['status']==1)



		{



				$pwd=crypt($password,$trow['password']);



				$validuser_check_query="select * from members where username='$username' and password='$password'";



		}



		else if($erow['status']==1)



		{



				$validuser_check_query="select * from members where username='$username' and member_email='$email'";



		}



			$validuser_check_result=mysql_query($validuser_check_query);



			if(mysql_num_rows($validuser_check_result)>0) {



				$validuser_check_row=mysql_fetch_array($validuser_check_result);



				$userid=$validuser_check_row['member_id'];



				$user_ip=$validuser_check_row['ip_address'];



				if($validuser_check_row['verified']=='no') {



					$verified_flag=1;



				}



				else if($validuser_check_row['status']=='suspended'){



					$suspend_flag=1;



				}



				else if($validuser_check_row['status']=='duplicate'){



					$duplicate_flag=1;



				}



				else {



				



			/*	$ipsql="select * from site_manager where feature_id=11";



				$ipres=mysql_query($ipsql);



				$iprow=mysql_fetch_array($ipres);



				if($iprow['status']=='yes')



				{



					



					if($login_ip!=$user_ip)



					{



						$_SESSION['userid']=$validuser_check_row['member_id'];



						$_SESSION['useremail']=$validuser_check_row['member_email'];



						$_SESSION['username']=$username;



						$invalid_ip=1;	



						$ipsql="update members set new_ip='$login_ip' where member_id=$userid";		



						$ipres=mysql_query($ipsql);



					}



					else



					{	



					$_SESSION['userid']=$validuser_check_row['member_id'];



					$_SESSION['useremail']=$validuser_check_row['member_email'];					



					$_SESSION['username']=$username;



					if($url)



					echo '<meta http-equiv="refresh" content="0;url='.$url.'">';



					else 



					echo '<meta http-equiv="refresh" content="0;url=members/index.php">';



				



				?>



			Please Wait , you will be Redirected to your Home page<br>



			If not Please <a href=members/index.php>Click here</a>



				<?



					exit();



						



					}



				}



				else*/



				//{



				



					//$_SESSION['username']=$username;



					//$_SESSION['useremail']=$validuser_check_row['member_email'];



					//$_SESSION['userid']=$validuser_check_row['member_id'];



					if($url)



					echo '<meta http-equiv="refresh" content="0;url='.$url.'">';



					else 



					echo '<meta http-equiv="refresh" content="0;url=index.php">';



				



				?>



				<!--<div style="margin-left:500px; margin-top:200px"><img src="images/ajax-loader.gif" /></div>-->



			Please Wait , you will be Redirected to your Home page<br>



			If not Please <a href="members/index.php">Click here</a>



				<?



					exit();



					//}



				}



			}



			else {



				$login_failed=1;



						if($_SESSION['lcnt'])



						{



						$lcnt=$_SESSION['lcnt']+1;



						}



						else



						{



						$lcnt=1;



						}



						$_SESSION['lcnt']=$lcnt;



					$lsql="select * from admin_settings where set_id=18";



					$lres=mysql_query($lsql);



					$lrow=mysql_fetch_array($lres);



					if($lcnt>($lrow['set_value']-1))



					{



					//	echo "<br>login count ".$_SESSION['lcnt'];



					//	exit;



					$lsql="update members set  status='suspended' where username='$username'";



					$lres=mysql_query($lsql);



					echo '<br><center><font style="color:red;"><strong>Your Account was suspended by login counter. Please contact admin to activate your account</strong></font></center>';



					exit;



						}



			}



		}



}



else



{



	$script_exists=1;



	//echo "Please Provide correct Informations";



	



}



}



?>