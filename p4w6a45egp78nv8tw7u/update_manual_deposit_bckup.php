<?php
session_start();
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
	


if(empty ($_SESSION['adminuser']))

{

 echo '<meta http-equiv="refresh" content="0; url=index.php" />';

 exit(); }

/*echo "<pre>";
print_r($_POST);
exit();*/

	$plan_id=$_POST['rdPlans'];
	$user_name_post = $_POST['cboUser'];

	$amount = $_POST['txtAmount'];
	
	$history_amount = $_POST['txtAmount'];

	$payment_id = $_POST['cboPayment'];
	$payid=$payment_id ;
	
	
	


//	$compound = $_POST['compound'];
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
			$useridflag=1;
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

						$amount_flag=1;
						$_SESSION['empty_amount']="<font color='#FF0000'>You can't deposit less than ".$plan_select_qry['spend_min_amount']." USD</font>";
				}
			}
	}
if($payment_id == 0)
 	{
		$useridflad=1;
		$_SESSION['empty_paymentid']="<span class='validate_error'>Please Select the Payment Mode</span>";
	}
	/*if($compound == '')
	{
		$useridflad=1;
		$_SESSION['empty_compound']="<span class='validate_error'>Please Select the Compound Rate</span>";

	}
*/
	

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

	

		$select_members_deposit = mysql_fetch_array(mysql_query("select sum(compound_amount) as amt from deposit where member_id='".$user_id."' and	status='active'"));

		$select_members_deposit_amt = $select_members_deposit['amt'];

		$total_plan_amount = $select_members_deposit_amt + $amount;

		$select_plan = mysql_query("select * from plan");

		while($fetch_plan = mysql_fetch_array($select_plan))

		{

			

			if($fetch_plan['spend_min_amount'] <=$total_plan_amount && $fetch_plan['spend_max_amount'] >=$total_plan_amount)

			{

				$interest = $fetch_plan['interest'];

				$planid = $fetch_plan['plan_id'];

				break;

			}	

		}





		$status='active';

		$trans_date=date('Y-m-d');	

		$paid_amount=$amount; 

	//	$amount = $total_plan_amount;
		
		//echo $amount;exit;

		$plan_date = mysql_fetch_array(mysql_query("select * from plan where plan_id='".$planid."'"));

		$period_type = $plan_date['period_type'];

		$period = $plan_date['period'];

		if($period_type == 4)

		{

			$plan_duration = $period * 365;

		}

		else if($period_type == 3)

		{

			$plan_duration = $period * 30;

		}

		else if($period_type == 2)

		{

			$plan_duration = $period * 7;

		}

		else

		{

			$plan_duration = $period;

		}



		$deposit_date=date('Y-m-d');



		$select_mature = mysql_fetch_array(mysql_query("SELECT ADDDATE('".$deposit_date."', INTERVAL '".$plan_duration."' DAY) as matured_date"));



		$mat_date = calculateMature($deposit_date);



		$final_status = 'active';
		$select_member_dep = mysql_num_rows(mysql_query("select * from deposit where member_id='".$user_id."' and status='active'"));
		
		
		

		/*if($select_member_dep > 0)

		{



			$insert_deposit_query="update deposit set plan_id = '$planid',amount = '$amount',compound_amount = '$amount',invest_date='$deposit_date',status='$final_status',payment_thro='$payment_id',maturity_date='$mat_date',compound_rate='".$compound."' where member_id = $user_id and status = 'active'";



		}

		else

		{*/
			
	$plan_levels=mysql_fetch_assoc(mysql_query("select * from plan where plan_id='".$plan_id."'"));
	
									$newlevelarray=explode(',',$plan_levels['plan_level']);
									if(count($newlevelarray) > 0)
									{
											foreach($newlevelarray as $levelitems)
											{
												$getnewvalues=explode('-',$levelitems);
												$planlevel[]=$getnewvalues[0];
												$plancomminterest[]=$getnewvalues[1];
											}
			
									}
			
		
			
			

						$bonus_status=$plan_levels['bonus_status'];
						if($bonus_status == 'yes')
						{
							$bonus_per=$plan_levels['bonus_per'];
						$bonus_per_amt=$amount*($bonus_per/100);
							$finaltotalamt=$amount+$bonus_per_amt;
							
						}
						else
						{
							$finaltotalamt=$amount;
						}
						
						
			
						
					$insert_deposit_query="insert into deposit (member_id,plan_id,amount,compound_amount,invest_date,status,payment_thro,maturity_date,compound_rate) values('".$member_id."','".$plan_id."','".$finaltotalamt."','".$amount."','".$deposit_date."','".$final_status."','".$payid."','".$mat_date."','".$compound."')";
			
			
						$insert_deposit_result=mysql_query($insert_deposit_query);
			
						$deposit_id=mysql_insert_id($conn);
						
						
/*echo '<pre>';print_r($finaltotalamt);
	exit();*/




	/*	}*/
	
	$batch_number = rand(0,99999999);
$insert_depdet_query="insert into pay_transaction(deposit_id,trans_amount,trans_userid,trans_batchnumber,trans_date) values('".$deposit_id."','".$amount."','".$member_id."','".$batch_number."','".date('Y-m-d')."')";	
			
						$insert_depdet_result=mysql_query($insert_depdet_query);
			
						$psql="select * from payment_process where payment_id='".$payid."'";
			
						$pres=mysql_query($psql);
			
							$prow=mysql_fetch_array($pres);
			
							$desc='Deposit made through Manual';
							
							$transaction_id = "DEP".rand(0,9999999);
							$mail_transid=$transaction_id;
										
							$hsql="insert into history(user_id,amount,type,description,payment_thro,reference_number,transaction_id) values ('".$member_id."','".$amount."','deposit','".$desc."','".$payid."','".$batch_number."','".$transaction_id."')";
							$hres=mysql_query($hsql);
							
							$transaction_id = "BON".rand(0,9999999);
							$bsql="insert into history(user_id,amount,type,description,payment_thro,transaction_id) values ('".$member_id."','".$bonus_per_amt."','bonus','Deposit Bonus','".$payid."','".$transaction_id."')";
						mysql_query($bsql);
							
							
					


		$sql1=mysql_query("select * from members where member_id='".$member_id."'");

		$in_sql=mysql_fetch_array($sql1);		
			$introid=$in_sql['intro_id'];
			$first_name = $in_sql['first_name'];
						$mails_id = $in_sql['member_email'];
						
							$msisdn='+'.$in_sql['ccode'].trim($in_sql['phone']);


	if($introid!='')
	 {

			$plancountlevel=count($planlevel);
			function get_levelcommission($introid,$amount,$level,$plancountlevel,$plancomminterest) 
			{
				
			
						 $intro_member_query="select * from members where member_id='".$introid."'";
						$intro_member_result=mysql_query($intro_member_query);
						if(mysql_num_rows($intro_member_result)>0)
						 {
							$intro_member_row=mysql_fetch_array($intro_member_result);
							$intro_name=$intro_member_row['username'];
							$intro_id=$intro_member_row['intro_id'];
							$user_name=$intro_member_row['username'];
							if($plancountlevel >= $level)
							{
									
								$keylevel=$level-1;													
								$level_commission=$plancomminterest[$keylevel];
								$comm=$amount*$level_commission/100;
								$description="Referral Commission Earned through Referring $user_name";
								$cur_date=date('Y-m-d h:i:s');
								$transaction_id = "COM".rand(0,9999999);
							 $insert_commission_query="insert into history (user_id,amount,type,description,date,transaction_id) values ('".$introid."','".$comm."','commissions','".$description."','".$cur_date."','".$transaction_id."')";
							$insert_commission_result=mysql_query($insert_commission_query);
							$check_earnings_query="select * from history where type='earning' and user_id=$introid";
							$check_earnings_result=mysql_query($check_earnings_query);
							$level+=1;
							get_levelcommission($intro_id,$amount,$level,$plancountlevel,$plancomminterest);
			
													
						}			
					}
				}
				get_levelcommission($introid,$finaltotalamt,1,$plancountlevel,$plancomminterest);
														
		}
		
		//SEND MAIL//
			
						$admin_mail_id = mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
			
			
						$admin_mail = $admin_mail_id['set_value'];
						
						$paln_det = mysql_fetch_array(mysql_query("select * from plan where plan_id='".$plan_id."'"));
						
						
			
						$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =5"));
			
						$mail_from_id = $mail_fetch['from_id'];
			
			
						$mailsubject =$mail_fetch['mailsubject'];
			
						$message = html_entity_decode($mail_fetch['message']);
			
						$message=str_replace('[FIRSTNAME]',$first_name,$message);
			
						$message=str_replace('[AMT]',$amount,$message);
			
						$message=str_replace('[PLAN]',$paln_det['plan_type'],$message);
			
						$message=str_replace('[PAYMENT]','Manual Deposit',$message);
							$message=str_replace('[transid]',$mail_transid,$message);
						
									
						$message=str_replace('[ADMINMAIL]',$admin_mail,$message);
			
			
			$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
				$sitename=$sitename['set_value'];
				
				
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
function calculateMature($start_date)

	{

		$i=1;

		$j=1;

		while($i<=180)

		{

			$select_mature = mysql_fetch_array(mysql_query("SELECT ADDDATE('".$start_date."', INTERVAL ".$j." DAY) as line_date"));

	

			$date = $select_mature['line_date'];

	

			$ex = explode("-",$date);

	

			$current_day = date("l",mktime(0,0,0,$ex[1],$ex[2],$ex[0]));

	

			if($current_day == 'Monday' || $current_day == 'Tuesday' || $current_day == 'Wednesday' || $current_day == 'Thursday' || $current_day == 'Friday')

			{

				//echo "<br>".$i." : ".$date." : ".$current_day;

	

				$i++;

			}

			$j++;

		}

		return $date;

	}

 ?>
 <!--
<span class='validate_error'>Please Enter the Username</span>-->