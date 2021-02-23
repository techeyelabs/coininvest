<?php

session_start();

error_reporting(0);

require 'include/connect.php';

//echo '<pre>';print_r($_GET);exit;
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
echo $days;echo '<br>';
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
				if($current_day == 'Monday' || $current_day == 'Tuesday' || $current_day == 'Wednesday' || $current_day == 'Thursday' || $current_day == 'Friday')
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
		function get_levelcommission($introid,$amount,$level,$userid,$planid) 
		{

					$intro_member_query="select * from members where member_id=$introid";
					$intro_member_result=mysql_query($intro_member_query);
					if(mysql_num_rows($intro_member_result)>0) 
					{
						
						$intro_member_row=mysql_fetch_array($intro_member_result);
						$intro_name=$intro_member_row['username'];
						$intro_id=$intro_member_row['intro_id'];
						$user_name=$intro_member_row['username'];
						
						
						
						//echo "select * from level_commission where level_name='$level' and plan_id='$planid'";exit;
						
						$level_commision_query="select * from level_commission where level_name='$level' and plan_id='$planid'";
						$level_commission_result=mysql_query($level_commision_query);
						$level_commission_row=mysql_fetch_array($level_commission_result);
						$level_commission=$level_commission_row['level_commission'];
						
						$comm=$amount*$level_commission/100;
						
						
						$namsql="select * from members where member_id=$userid";
						$namqry=mysql_fetch_array(mysql_query($namsql));
						
						$description="Referral Commission Earned";
						$cur_date=date('Y-m-d h:i:s');
						$transaction_id = "REF".rand(0,9999999);
						//echo "insert into history (user_id,amount,type,description,transaction_id) values ('$introid','$comm','commissions','$description','$transaction_id')";exit;
						
						$insert_commission_query="insert into history (user_id,amount,type,description,transaction_id) values ('$introid','$comm','commissions','$description','$transaction_id')";
						$insert_commission_result=mysql_query($insert_commission_query);
						
						
						$rsql="select * from representative where member_id='".$introid."' and status='1'";
						$rqry=mysql_query($rsql);
						
						
						if(mysql_num_rows($rqry) > 0)
						{
							$avalues=mysql_fetch_assoc(mysql_query("select set_value from admin_settings where set_id ='43'"));
							$rcomm=$amount*($avalues['set_value']/100);
							$rdescription="Representative Referral Commission Earned";
							$rtransaction_id = "RREF".rand(0,9999999);
							
							
							$rinsert_commission_query="insert into history (user_id,amount,type,description,transaction_id) values (
							'".$introid."','".$rcomm."','commissions','".$rdescription."','".$rtransaction_id."')";
							mysql_query($rinsert_commission_query);
						
						}
						
						
						
						$level+=1;
						
						get_levelcommission($intro_id,$amount,$level,$introid,$planid);
						
					}	
				}

		$sql=mysql_query("select * from deposit_req where member_id = '".intval($_GET['membid'])."' and status='0' and req_id='".$_GET['reqid']."'");
		
		if(mysql_num_rows($sql) == '1')
		{
				$fetch=mysql_fetch_array($sql);
				
		$amount=$fetch['amount'];
		$payid=$fetch['payid'];
		$planid=$fetch['planid'];
		$compound=$fetch['compound'];
		$deposit_date=date('Y-m-d H:i:s');
		$member_id=$fetch['member_id'];
				
				
				$status='active';
				$trans_date=date('Y-m-d');	

			$select_plan = mysql_query("select * from plan where plan_id = $planid");
			$view_B = mysql_fetch_array($select_plan);


	
			if(mysql_num_rows($select_plan) > 0)
			{

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

		$insert_deposit_query="insert into deposit (member_id,plan_id,amount,compound_amount,invest_date,status,payment_thro,maturity_date,transaction_id,compound_rate) values($member_id,$planid,$final_amount,$final_amount,'$deposit_date','$status',$payid,'$mat_date','$transaction_id','".$compound."')";
		$insert_deposit_result=mysql_query($insert_deposit_query);
		$deposit_id=mysql_insert_id($conn);
 		$psql="select * from payment_process where payment_id=$payid";
		$pres=mysql_query($psql);
		$prow=mysql_fetch_array($pres);
		$transaction_id = "DEP".rand(0,9999999);
		$mail_transid=$transaction_id;
		$desc='Deposit made through '.$prow['payment_name'];
		$hsql="insert into history(user_id,amount,type,description,payment_thro,transaction_id) values ($member_id,$amount,'deposit','$desc',$payid,'$transaction_id')";

			$hres=mysql_query($hsql);
			if($bonus_flag == 1)
			{
				$desc1='Deposit made through '.$prow['payment_name'];
				$desc2='Bonus for making deposit of '.$amount.' USD';

				$insert_sub_deposit = mysql_query("insert into sub_deposit(deposit_id,deposit_amt,deposit_desc) values('".$deposit_id."','".$amount."','".$desc1."')");
				$insert_sub_deposit1 = mysql_query("insert into sub_deposit(deposit_id,deposit_amt,deposit_desc) values('".$deposit_id."','".$bonus_income."','".$desc2."')");
			}
			else
			{
				$desc1='Deposit made through '.$prow['payment_name'];
				$insert_sub_deposit = mysql_query("insert into sub_deposit(deposit_id,deposit_amt,deposit_desc) values('".$deposit_id."','".$amount."','".$desc1."')");
			}
			

			if($payid == 12)
			{
				$desc1111='Amount deducted for '.$prow['payment_name'];
				$penty =mysql_query("insert into history(user_id,amount,type,description,payment_thro) values ($member_id,$amount,'reinvest','$desc1111',$payid)");
			}
			

			$sql1=mysql_query("select * from members where member_id=$member_id");


			$in_sql=mysql_fetch_array($sql1);

 

			$introid=$in_sql['intro_id'];
			$first_name=$in_sql['first_name'];
			$mails_id=$in_sql['member_email'];
		
					
						if($introid!='') 
			{
				
				
				$level_select_query="select max(level_id) as level from level_commission";
				$level_select_result=mysql_query($level_select_query);
				$level_select_row=mysql_fetch_array($level_select_result);
				$level_pos=$level_select_row['level'];
			
				
				get_levelcommission($introid,$amount,1,$user_id,$planid);
				
						
			}
		 
		


			$sql=mysql_query("update deposit_req set status='1' where member_id = '".intval($_GET['membid'])."' and status='0' and req_id='".$_GET['reqid']."'");

			//SEND MAIL//








						
						$admin_mail_id = mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
						$admin_mail = $admin_mail_id['set_value'];
						$adminmail=$admin_mail;
						
						$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
						$sitename=$sitename['set_value'];
						
						$site_url=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '37'"));
						$site_url=$site_url['set_value'];
						
						$site_logo=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '20'"));
						$site_logo=$site_logo['set_value'];
					
					$sitelogo=$site_url.'/'.$site_logo;
					$org_amt =$_SESSION['enter_amount'];	
				
				$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =5"));
				$mail_from_id = $mail_fetch['from_id'];
				$mailsubject =$mail_fetch['mailsubject'];
				$message = html_entity_decode($mail_fetch['message']);
				$message=str_replace('[FIRSTNAME]',$first_name,$message);
				$message=str_replace('[AMT]',$amount,$message);
				//$message=str_replace('[RATE]',$_SESSION['compound_rate'],$message);
				$message=str_replace('[PLAN]',$view_B['plan_type'],$message);
				$message=str_replace('[PAYMENT]',$prow['payment_name'],$message);
				$message=str_replace('[transid]',$mail_transid,$message);
				$message=str_replace('[ADMINMAIL]',$admin_mail,$message);
				$message=str_replace('#sitelogo',$sitelogo,$message);
				$message=str_replace('#siteurl',$site_url,$message);
				$message=str_replace('#adminmail',$mail_from_id,$message);
				$message=str_replace('#adminemill',$mail_from_id,$message);
				$message=str_replace('#sitename',$sitename,$message);
				$message=str_replace('#verfyurl',$site_url,$message);  
				$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
				$sitename=$sitename['set_value'];
				$headers  = "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\n";
				$headers .= 'From: '.$sitename.' <'.$admin_mail.'>' . "\r\n";
				@mail($mails_id,$mailsubject,$message,$headers);
				@mail($admin_mail,$mailsubject,$message,$headers);
				$sucess_flag=1;
				$_SESSION['enter_amount'] = '';
				$_SESSION['amount']='';
				$_SESSION['planid']='';
				$_SESSION['payid']=''; 
				$_SESSION['compound_rate'] =''; 

			$_SESSION['succ_dir']="<font color='#004000'><b>Deposit Successfully  Activated</b></font>";
				
			echo '<meta http-equiv="refresh" content="0;url=req_deposit.php">';

			exit();
		
		}
		else
		{
			echo '<meta http-equiv="refresh" content="0;url=req_deposit.php">';

			exit();
		}
?>