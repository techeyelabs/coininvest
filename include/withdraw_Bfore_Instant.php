<?php //date_default_timezone_set("Europe/London");
date_default_timezone_set('Etc/GMT');






	$canWithdraw=$_POST['canWithdraw'];







	$total_earning_query="select sum(amount) as tot_earnings from history where user_id=$userid and (type='intrest_earned' or type='bonus' or type='commissions' or type='internal_transaction_receive')";







	$total_earning_result=mysql_query($total_earning_query);







	if($total_earning_result)







	{







	$total_earning_row=mysql_fetch_array($total_earning_result);







	$total_earn=$total_earning_row['tot_earnings'];







	$total_earnings=number_format($total_earning_row['tot_earnings'],2);







	







	}







	else







	$total_earnings=0;







		$no_withdraw_query="select * from admin_settings where set_id=8";







		$no_withdraw_result=mysql_query($no_withdraw_query);







		$no_withdraw_row=mysql_fetch_array($no_withdraw_result);







		 $no_withdraw=$no_withdraw_row['set_value'];







		 







		 $tesql1="select sum(amount) as total_pending from history where user_id=".$userid." and type='withdraw_pending' order by type";







$teres1=mysql_fetch_array(mysql_query($tesql1));







$withdraw_pening = $teres1['total_pending'];	







		 







		 







	$tesql="select sum(amount) as total_with from history where user_id=".$userid." and (type='withdrawal' or type='penality' or type='withdraw_pending' or type='internal_transaction_spend') order by type";







$teres=mysql_query($tesql);







if(mysql_num_rows($teres)>0)







{







	$terow=mysql_fetch_array($teres);







	$total_withdraw=number_format($terow['total_with'],2);







	$total_withdraw=$terow['total_with'];







	}







	else







	$total_withdraw=0;







	







	if($total_earn>0)







	 $total_earn1=$total_earn-$total_withdraw;







	if($canWithdraw==1) 







	{







	/*print_r($_POST);



	exit();*/







		$amount=$_POST['txtAmount'];



		$payment_method = $_POST['payment_method'];







		if(!is_numeric($amount) || $amount=='') $amount_flag=1;







		$fl_amount=number_format($amount,2);



		







		if($total_earn1<$amount || !$total_earn1 || $total_earn1==0) $invalid_flag=1;







		// "tot".$total_earn;







		







		$min_withdraw_query="select * from admin_settings where set_id=6";







		$min_withdraw_result=mysql_query($min_withdraw_query);







		$min_withdraw_row=mysql_fetch_array($min_withdraw_result);







		$min_withdraw_amount=$min_withdraw_row['set_value'];	







	







	







		$admin_withdraw_query="select * from admin_settings where set_id=15";







		$admin_withdraw_result=mysql_query($admin_withdraw_query);







		$admin_withdraw_row=mysql_fetch_array($admin_withdraw_result);







		$admin_commission=$admin_withdraw_row['set_value'];	







	







		 $max_withdraw_query="select * from admin_settings where set_id=7";







		$max_withdraw_result=mysql_query($max_withdraw_query);







		$max_withdraw_row=mysql_fetch_array($max_withdraw_result);







		$max_withdraw_amount=$max_withdraw_row['set_value'];























		$today_date=date('m');







		$year=date('Y');







		$moretime=0;







		//echo "select * from history where user_id=$userid and date like '%-$today_date-%'";







 	    $sql="select * from history where date like '$year-$today_date-%' and no_withdraw=1 and user_id=$userid";   







		$sql1=mysql_query($sql);







		







		while($ss=mysql_fetch_array($sql1))







		{







		//echo "date".$ss['date']."<br>";







		if(($ss['type']=='withdrawal') or ($ss['type']=='withdraw_pending'))







		  $moretime=$moretime+1;







		}















 		$moretime=round($moretime/2);























		/*$user_withdraw_query="select * from members where member_id=$userid";		







		$user_withdraw_result=mysql_query($user_withdraw_query);







		if($user_withdraw_result)







		{







		$user_withdraw_row=mysql_fetch_array($user_withdraw_result);







		$user_withdraw=$user_withdraw_row['no_withdraw'];







		}*/







		







		$no_withdraw_query="select * from admin_settings where set_id=8";







		$no_withdraw_result=mysql_query($no_withdraw_query);







		$no_withdraw_row=mysql_fetch_array($no_withdraw_result);







		$no_withdraw=$no_withdraw_row['set_value'];	







		if($no_withdraw <= $moretime) $wrong_flag=1;







		







		if($amount < $min_withdraw_amount || $amount > $max_withdraw_amount) $bulk_amount=1;







	/*	echo "<br>A :".$amount_flag;



		echo "<br>B: ".$bulk_amount;



		echo "<br>C: ".$wrong_flag;



		echo "<br>D: ".$invalid_flag;*/



		if($payment_method == 13)



		{



			if(number_format($amount,2) <= number_format(500,2))



			{



				$bankflag =1;



			}



			



		}



		



		



		if($amount_flag!=1 && $bulk_amount!=1 && $wrong_flag!=1 && $invalid_flag!=1 && $bankflag!=1) {







				



			$member_id=$_SESSION['userid'];







			$description="Withdraw Request for $amount by ".$_SESSION['username'];







			$withdraw_date=date('Y-m-d h:i:s');







			







			if($admin_commission>0)







			{







			$admin_earning=$amount*($admin_commission/100);







			$amount1=$amount-$admin_earning;







			







			$aesql="insert into admin_commission(amount,description,date) values (".$admin_earning.",'earning from member withdrawal ".$userid."','".date("Y-m-d")."')";







			$aeres=mysql_query($aesql);







			







			$aesql="insert into history (user_id,amount,type,description,date,no_withdraw,payment_thro) values ($member_id,$admin_earning,'withdrawal','withdraw commission paid','$withdraw_date',1,'$payment_method')";







			$aeres=mysql_query($aesql);







			







			}







			else







			$amount1=$amount;







			$insert_withdraw_query="insert into history (user_id,amount,type,description,date,no_withdraw,payment_thro) values($member_id,$amount1,'withdraw_pending','$description','$withdraw_date',1,'$payment_method')";







			$insert_withdraw_result=mysql_query($insert_withdraw_query);







			







			







			















			if($insert_withdraw_result) $sucess_flag=1;







			else $failure_flag=1;







			







			//$SEND MAIL//







			







			$admin_mail_id = mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));







			$admin_mail = $admin_mail_id['set_value'];







			$user_withdraw_query=mysql_fetch_array(mysql_query("select * from members where member_id=$userid"));	







			$first_name = $user_withdraw_query['first_name'];



			$mails_id = $user_withdraw_query['member_email'];







			$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =6"));



			$mail_from_id = $mail_fetch['from_id'];



			$mailsubject =$mail_fetch['mailsubject'];



			$message = html_entity_decode($mail_fetch['message']);



			



			$message=str_replace('[FIRSTNAME]',$first_name,$message);



			$message=str_replace('[TXTAMT]',$_POST['txtAmount'],$message);



			$message=str_replace('[WITHDRAWDATE]',$withdraw_date,$message);



			$message=str_replace('[ADMINMAIL]',$admin_mail,$message);



			



			
$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
				$sitename=$sitename['set_value'];


			$headers  = 'MIME-Version: 1.0' . "\r\n";



			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


$headers .= 'From: '.$sitename.' <'.$admin_mail.'>' . "\r\n";
			




			mail($mails_id,$mailsubject,$message,$headers);



			







			







			







			$_SESSION['succ_dir']="<font color='#004000'><b><center>Your Payouts Successfully Made</center></b></font>";







			echo '<meta http-equiv="refresh" content="0;url=withdraw.php">';







			exit();







		}



		







	}







	







	$min_withdraw_query="select * from admin_settings where set_id=6";







	$min_withdraw_result=mysql_query($min_withdraw_query);







	$min_withdraw_row=mysql_fetch_array($min_withdraw_result);







	$min_withdraw_amount=$min_withdraw_row['set_value'];	























	$max_withdraw_query="select * from admin_settings where set_id=7";







	$max_withdraw_result=mysql_query($max_withdraw_query);







	$max_withdraw_row=mysql_fetch_array($max_withdraw_result);







	$max_withdraw_amount=$max_withdraw_row['set_value'];	















	$admin_withdraw_query="select * from admin_settings where set_id=15";







	$admin_withdraw_result=mysql_query($admin_withdraw_query);







	$admin_withdraw_row=mysql_fetch_array($admin_withdraw_result);







	$admin_commission=$admin_withdraw_row['set_value'];	







?>