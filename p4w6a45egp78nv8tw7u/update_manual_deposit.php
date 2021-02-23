<?php
date_default_timezone_set("Europe/London");
error_reporting(0);

session_start();


//echo '<pre>';print_r($_POST);exit;
require 'include/connect.php';


function do_post_request($url, $data, $optional_headers = null)
{

			$params = array('http'      => array(
					'method'       => 'POST',
					'content'      => $data,
						   ));

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
					$response=stream_get_contents($fp);
									}



				if ($response === false) {
					print "Problem reading data from $url, No status returned\n";
				}
				return $response;
}


 function calculateMature($start_date,$days)
{

	$i=1;

	$j=1;
	
		$business= mysql_fetch_array(mysql_query("select * from admin_settings where set_id='51' and set_name='business_day' "));
	
		$business_day_status = $business['set_value'];
		
	while($i<=$days)

	{

			$select_mature = mysql_fetch_array(mysql_query("SELECT ADDDATE('".$start_date."', INTERVAL ".$j." DAY) as line_date"));

			$date = $select_mature['line_date'];

			$ex = explode("-",$date);

			$current_day = date("l",mktime(0,0,0,$ex[1],$ex[2],$ex[0]));

			if($business_day_status == 'on')
			{
				if($current_day == 'Saturday' || $current_day == 'Sunday' || $current_day == 'Monday' || $current_day == 'Tuesday' || $current_day == 'Wednesday' || $current_day == 'Thursday' || $current_day == 'Friday')
	
				{
	
					$i++;
	
				}
	
			}
			else
			{
					$i++;
			}


			$j++;

	}

	return $date;
}





if(empty ($_SESSION['adminuser']))
{
	 echo '<meta http-equiv="refresh" content="0; url=index.php" />';
	exit(); 
}

	$plan_id=$_POST['rdPlans'];
	$user_name_post = $_POST['cboUser'];
	$amount = $_POST['txtAmount'];
	$history_amount = $_POST['txtAmount'];
	$payment_id = $_POST['cboPayment'];
	$deposit_date=date('Y-m-d H:i:s');	
	
	
	$st_r = "SELECT DATE_ADD('$deposit_date', INTERVAL 24 HOUR) as dt";
 	$sql_r = mysql_fetch_array(mysql_query($st_r)); 
	$crons_date = $sql_r['dt'];



	$payid=$payment_id ;



	if($user_name_post == '')

	{



		$useridflag=1;



		$_SESSION['empty_userid']="<span class='validate_error'>Please enter the Username</span>";

	}





	if($user_name_post != '')

	{



		$msql="select * from members where username='".$user_name_post."'";



		$mres=mysql_query($msql);



		if(mysql_num_rows($mres) > 0)

		{

			$user_d = mysql_fetch_array($mres);



			$user_id = $user_d['member_id'];



			$member_id=$user_id;

		}

		else

		{



			$useridflad=1;



			$_SESSION['empty_userid']="<span class='validate_error'>Invalid Username</span>";



		}



	}



	if($amount == '')

	{

		$useridflad=1;

		$_SESSION['empty_amount']="<span class='validate_error'>Please enter the Amount</span>";

	

	}

	if($amount != '')

	{

		if(!is_numeric($amount))

		{

			$useridflad=1;

			$_SESSION['empty_amount']="<span class='validate_error'>Please enter the Only Numberic Values</span>";

		}

		else

		{

			$plan_select_qry=mysql_fetch_assoc(mysql_query("select * from plan where plan_id='".$plan_id."'"));

			if($amount < $plan_select_qry['spend_min_amount'])

			{

				$useridflad=1;

				$_SESSION['empty_amount']="<font color='#FF0000'>You can't deposit less than ".$plan_select_qry['spend_min_amount']." USD</font>";

			}

		}

	

	}



	if($payment_id == 0)

	{

			$useridflad=1;

			$_SESSION['empty_paymentid']="<span class='validate_error'>Please Select the Payment Mode</span>";

	}

	

	if($payment_id != 0 && $user_name_post !=0)

	{

		if($payment_id == '12')

		{

			$total_earning_query="select sum(amount) as tot_earnings from history where user_id=$user_id and (type='intrest_earned' or type='bonus' or type='commissions' or type='release_deposit' or type='internal_transaction_receive')";

			$total_earning_result=mysql_query($total_earning_query);

			$total_earning_row=mysql_fetch_array($total_earning_result);

			$total_earnings=$total_earning_row['tot_earnings'];

	

			if(!$total_earnings) $total_earnings=0;

				$tesql="select sum(amount) as total_with from history where user_id=".$user_id." and (type='withdrawal' or type='withdraw_pending' or type='penality' or type='deposit' or type='internal_transaction_spend') order by type";

				$teres=mysql_query($tesql);

				if(mysql_num_rows($teres)>0)

				{

					$terow=mysql_fetch_array($teres);

					$total_withdraw=$terow['total_with'];

				}

				else

					$total_withdraw=0;

				$total_earnings-=$total_withdraw;

				if($amount > $total_earnings)

				{

					$useridflad=1;

					$_SESSION['empty_paymentid']="<span class='validate_error'>Insufficient Amount in Account Balance</font>";

				}

		}

	}

	

	if($useridflad != 1)

	{

		$select_plan = mysql_query("select * from plan where plan_id = $plan_id");
		$view_B = mysql_fetch_array($select_plan);

		if(mysql_num_rows($select_plan) > 0)
		{
			$plan_name = $view_B['plan_type'];
			if($view_B['bonus_status'] == 'yes')
			{
				$bonus_info = $view_B['bonus_per'];
				$bonus_flag =1;		

				if($bonus_info != '' && $bonus_info != 0)
				{

					$bonus_income = $amount * $bonus_info / 100;
					$final_amount = $amount + $bonus_income;
				}
				else
				{
					$final_amount = $amount;
				}
			}
			else
			{
				$final_amount = $amount;
			}
		}
		else
		{
			$final_amount = $amount;
		}

		$days = $view_B['period'];
		
				if($view_B['iperiod_type'] == 1)
				$days =$days;
				else if($view_B['iperiod_type'] == 2)
				$days = $days * 7; 
				else if($view_B['iperiod_type'] == 3)
				$days = $days * 30;
				else if($view_B['iperiod_type'] == 4)
				$days = $days * 365;
				
				if($view_B['iperiod_type'] == 5)
				{
					$mat_date = date('Y-m-d H:i:s ',strtotime($deposit_date. ' + '.$days.' hours'));
				}
				else
				{				 
				 	$mat_date = calculateMature($deposit_date,$days);
				}


		
		$transaction_id = "DEP".rand(0,9999999);
		$insert_deposit_query="insert into deposit (member_id,plan_id,amount,compound_amount,invest_date,status,payment_thro,maturity_date,transaction_id) values($member_id,$plan_id,$final_amount,$final_amount,'$deposit_date','active',$payid,'$mat_date','$transaction_id')";

		$insert_deposit_result=mysql_query($insert_deposit_query);
		$deposit_id=mysql_insert_id($conn);

		 $dep_str_date = mysql_fetch_array(mysql_query("select invest_date from deposit where deposit_id=".$deposit_id.""));
                            $dep_str_dates = $dep_str_date['invest_date'];	

		$psql="select * from payment_process where payment_id=$payid";
		$pres=mysql_query($psql);
		$prow=mysql_fetch_array($pres);
		

		$mail_transid=$transaction_id;
		$desc='Deposit made through '.$prow['payment_name'];
		$hsql="insert into history(user_id,amount,type,description,date,payment_thro,transaction_id) 
		values($member_id,$amount,'deposit','$desc','$dep_str_dates',$payid,'$transaction_id')";
		$hres=mysql_query($hsql);
		
			
		if($bonus_flag == 1)
		{
			$desc1='Deposit made through '.$prow['payment_name'];
			$desc2='Bonus for making deposit of '.$amount.' BTC';
			$insert_sub_deposit = mysql_query("insert into sub_deposit(deposit_id,deposit_amt,deposit_desc) values('".$deposit_id."','".$amount."','".$desc1."')");
			$insert_sub_deposit1 = mysql_query("insert into sub_deposit(deposit_id,deposit_amt,deposit_desc) values('".$deposit_id."','".$bonus_income."','".$desc2."')");
		}
		else
		{
			$desc1='Deposit made through '.$prow['payment_name'];
			$insert_sub_deposit = mysql_query("insert into sub_deposit(deposit_id,deposit_amt,deposit_desc) values('".$deposit_id."','".$amount."','".$desc1."')");	
		}		

		$sql1=mysql_query("select * from members where member_id=$member_id");
		$in_sql=mysql_fetch_array($sql1);
		$introid=$in_sql['intro_id'];
		$first_name = $in_sql['first_name'];			
		
		if($introid!='') 
		{
			$level_select_query="select max(level_id) as level from level_commission";
			$level_select_result=mysql_query($level_select_query);
			$level_select_row=mysql_fetch_array($level_select_result);
			$level_pos=$level_select_row['level'];			

			function get_levelcommission($introid,$amount,$level,$userid,$plan_id) 
			{
				$intro_member_query="select * from members where member_id=$introid";
				$intro_member_result=mysql_query($intro_member_query);
				if(mysql_num_rows($intro_member_result)>0) 
				{
					$intro_member_row=mysql_fetch_array($intro_member_result);

					$intro_name=$intro_member_row['username'];
					$intro_id=$intro_member_row['intro_id'];
					$user_name=$intro_member_row['username'];
					$level_commision_query="select * from level_commission where level_name='$level' and plan_id='$plan_id'";

					$level_commission_result=mysql_query($level_commision_query);
					$level_commission_row=mysql_fetch_array($level_commission_result);
					$level_commission=$level_commission_row['level_commission'];
					$comm=$amount*$level_commission/100;

					

					$namsql="select * from members where member_id=$userid";
					$namqry=mysql_fetch_array(mysql_query($namsql));

					

					$description="Referral Commission Earned";

					$cur_date=date('Y-m-d H:i:s');
					$transaction_id = "REF".rand(0,9999999);
					$insert_commission_query="insert into history (user_id,amount,type,description,date,transaction_id) 
					values ($introid,$comm,'commissions','$description','$cur_date','$transaction_id')";

					$insert_commission_result=mysql_query($insert_commission_query);
					$level+=1;

					get_levelcommission($intro_id,$amount,$level,$introid,$plan_id);
				}
			}	

			get_levelcommission($introid,$amount,1,$member_id,$plan_id);	

		}			

		//SEND MAIL//
		$admin_mail_id = mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
		$admin_mail = $admin_mail_id['set_value'];
		$org_amt =$_SESSION['enter_amount'];
		$_SESSION['enter_amount'] = '';
		
		$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
		$sitename=$sitename['set_value'];
		
		
		$current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		$current_url=str_replace("administrator/update_manual_deposit","login",$current_url);
		

		$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =5"));

		$mail_from_id = $mail_fetch['from_id'];
		$mailsubject =$mail_fetch['mailsubject'];
		$message = html_entity_decode($mail_fetch['message']);
		$message=str_replace('[FIRSTNAME]',$first_name,$message);
		$message=str_replace('[AMT]',$amount,$message);
		$message=str_replace('[PLAN]',$plan_name,$message);
		$message=str_replace('[PAYMENT]',$prow['payment_name'],$message);
		$message=str_replace('[transid]',$mail_transid,$message);		
		$message=str_replace('#adminemill',$admin_mail,$message);		
		$message=str_replace('#sitename',$sitename,$message);		
		$message=str_replace('#verfyurl',$current_url,$message);
		 $message=str_replace('[ADMINMAIL]',$admin_mail,$message);  
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";		
		$headers .= 'From: '.$sitename.' <'.$admin_mail.'>' . "\r\n";
		mail($mails_id,$mailsubject,$message,$headers);
		mail($admin_mail,$mailsubject,$message,$headers);
		

		$sucess_flag=1;
		

		$_SESSION['success_flag']="<font color='#004000'><b><center>Successfully Deposited</center></b></font>";
		echo '<meta http-equiv="refresh" content="0;url=deposit.php?act=active">';
		exit();
	}
	else
	{
		$_SESSION['val_userid'] = $user_id;
		$_SESSION['val_amount'] = $amount;
		$_SESSION['val_payment_id'] = $payment_id;
		$_SESSION['val_compound'] = $compound;
		echo '<meta http-equiv="refresh" content="0;url=manualdeposit.php">';
		exit();
	}
 ?>

