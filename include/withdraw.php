<?php 
	
	date_default_timezone_set('Etc/GMT');

	// var_dump($_POST);
	// print_r($_POST);


	$instantflag=0;
	$bulk_amount=0;

	$canWithdraw=$_POST['canWithdraw'];
	$selectDepositSql = mysql_query("select * from deposit where status = 'matured' and member_id=".$_SESSION['userid']."");
    $selectDeposit = mysql_fetch_assoc($selectDepositSql);
    
    // echo  mysql_num_rows($selectDepositSql);
	// echo $_SESSION['userid'];
	// echo $selectDeposit;
    // print_r($_POST);
    // exit();
    
 


	$total_earning_query="select sum(amount) as tot_earnings from history where user_id=$userid and 
			(type='intrest_earned' or type='bonus' or type='commissions'  
			or type='release_deposit' or type='internal_transaction_receive')";

	$tesql1="select sum(amount) as witth from history where user_id=".$userid." and type='reinvest' order by type";
	$teres1=mysql_query($tesql1);
	$terow1=mysql_fetch_array($teres1);
	$witttth=$terow1['witth']; 

	//echo "<br/>Rev: ". $witttth;


	//add by khokon
    $matured_depo_str = mysql_query("select sum(amount) as matured_amount from deposit where status='matured' and member_id=".$_SESSION['userid']."");
    if(mysql_num_rows($matured_depo_str)>0){
        $matured_depo_res = mysql_fetch_array($matured_depo_str);
        $matured_amount = $matured_depo_res['matured_amount'];
    }else{
       $matured_amount = 0;
    }
        


	$total_earning_result=mysql_query($total_earning_query);
	if($total_earning_result)
	{
    	$total_earning_row=mysql_fetch_array($total_earning_result);
    	$total_earn=  $total_earning_row['tot_earnings'] + $matured_amount;
    	$total_earnings=number_format($total_earning_row['tot_earnings'],8) + $matured_amount;
	}
	else
	    $total_earnings=0;



	//echo "<br/>Total Earn1:" . $total_earn;
	//echo "<br/>Total Earn:" . $total_earnings;


	$no_withdraw_query="select * from admin_settings where set_id=8";
	$no_withdraw_result=mysql_query($no_withdraw_query);
	$no_withdraw_row=mysql_fetch_array($no_withdraw_result);
	$no_withdraw=$no_withdraw_row['set_value'];

	$tesql1="select sum(amount) as total_pending from history where user_id=".$userid." and type='withdraw_pending' order by type";
	$teres1=mysql_fetch_array(mysql_query($tesql1));	
	$withdraw_pening = $teres1['total_pending'];	
	$tesql="select sum(amount) as total_with from history where user_id=".$userid." and description!='Withdraw paid' and 
	(type='withdrawal' or type='penality' or type='withdraw_pending' or type='internal_transaction_spend') order by type";
	$teres=mysql_query($tesql);
	
	if(mysql_num_rows($teres)>0)
	{
		$terow=mysql_fetch_array($teres);
		$total_withdraw=number_format($terow['total_with'],8);
		$total_withdraw=$terow['total_with'];
	}
	else
		$total_withdraw=0;
		if($total_earn>0)
		 $total_earn1=$total_earn-$total_withdraw-$witttth;
		 
		 
		// echo "<br/>Tot E:". $total_earn1;
		// echo "<br/>Total withdraw: " . $total_withdraw;
        // print_r($_POST);
    //    exit();
	if($canWithdraw==1) 
	{

	    //echo "<br/>can withdraw block";
	    $amount=trim($_POST['txtAmount']);
		$payment_method = $_POST['payment_method'];
        //echo "<br/>Tot Earn:" . $total_earn1;
        // echo "<br/>Amount:" . $amount;
        // echo "<br/>Amount:" . $payment_method;

		if(!is_numeric($amount) || $amount=='' || $amount == 0) 
		$amount_flag=1;
		$fl_amount= $amount;
		
	    if($total_earn1<$amount || !$total_earn1 || $total_earn1==0) $invalid_flag=1;
		
		// echo mysql_num_rows($selectDepositSql);
	    if(mysql_num_rows($selectDepositSql) ==0){
			$invalid_flag=1;
			// echo $invalid_flag;
	    }
	     // echo "<br/> do<br/>";
		  //echo "<br/>Invalid: ".$invalid_flag;
		
	    
	
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
		$no_withdraw_query="select * from admin_settings where set_id=8";
		$no_withdraw_result=mysql_query($no_withdraw_query);
		$no_withdraw_row=mysql_fetch_array($no_withdraw_result);
		$no_withdraw=$no_withdraw_row['set_value'];	
		if($no_withdraw <= $moretime) $wrong_flag=1;
		
        //	if(floatval($amount) < floatval($min_withdraw_amount) || floatval($amount) > floatval($max_withdraw_amount)) $bulk_amount=1;		
		if((float)$amount < (float)$min_withdraw_amount){
			//echo "<br/>bulk1";
		    $bulk_amount=1;
			// echo $bulk_amount;
		} else if((float)$amount > (float)$max_withdraw_amount){
		     $bulk_amount=1;	
		    // echo "<br/>bulk2";
		}

	        if($payment_method == 13)
		{
			if(number_format($amount,8) <= number_format(500,8))
			{
				$bankflag =1;
			}
		}

		//	if($amount_flag!=1 && $bulk_amount!=1 && $wrong_flag!=1 && $invalid_flag!=1 && $bankflag!=1)
		if($amount_flag!=1 && $bulk_amount!=1 && $wrong_flag!=1 && $invalid_flag!=1 )
		{		
			
			//CHECK WHETHER INSTANT OR MANUAL	
			$select_process = mysql_fetch_array(mysql_query("select * from payment_process where payment_id='".$payment_method."'"));
			$withdrawtype=$select_process['withdraw_option'];

		 	if($withdrawtype == 1)
			{
				//Instant
			    $withdrawflag='instant';
			}
			else
			{
				//Manual
				$withdrawflag='manual';
			}
		
			//echo $withdrawflag;
			//echo "<br/>1. Admin Comission:".$admin_commission."<br/>";

			if($withdrawflag == 'instant')
			{
				$member_id=$_SESSION['userid'];
				$description="Withdraw Request for ". number_format($amount,8)." by ".$_SESSION['username'];
				$withdraw_date=date('Y-m-d h:i:s');	

				if($admin_commission>0)
				{
                    //echo "<br/>".$amount."*".$admin_commission."<br/>";
					$admin_earning=$amount*($admin_commission/100);
					$admin_earning2=($amount*$admin_commission)/100;

					$amount1=$amount-$admin_earning2;
					$amount1 = number_format($amount1,8);
				 	$aesql="insert into admin_commission(amount,description,date) 
					values (".$admin_earning.",'earning from member withdrawal ".$userid."','".date("Y-m-d")."')";

                        //echo "<br/> ";
					//$aeres=mysql_query($aesql);
					
					$transaction_id = "WIT".rand(0,9999999);
					
			        /*	echo	$aesql="insert into history (user_id,amount,type,description,date,no_withdraw,payment_thro,transaction_id) 
		            values ($member_id,$admin_earning2,'withdrawal','withdraw commission paid','$withdraw_date',1,'$payment_method','$transaction_id')";
		            */
                    //echo  "<br/>";
			 	        $aesql="insert into history (user_id,amount,type,description,date,no_withdraw,payment_thro,transaction_id) 
		                values ($member_id,$amount1 ,'withdrawal','withdraw paid','$withdraw_date',1,'$payment_method','$transaction_id')";
		
                    echo $aesql;
                    exit();
                        //echo "proc-01 " . $amount1;
					    //$aeres=mysql_query($aesql);
				}
				else
				{
					$amount1=$amount;
					//echo "proc-02 ". $amount1;
				}


				//INSTANT PAYOUTS//

				//*******ALERT PAY INSTANT PAYOUTS*************//
				$select_plan = mysql_fetch_array(mysql_query("select * from deposit where member_id='".$_SESSION['userid']."'"));
				$plan_name = mysql_fetch_array(mysql_query("select * from plan where plan_id='".$select_plan['plan_id']."'"));
				$plans = $plan_name['plan_type'];
				$note = " Withdrawal  to ".$_SESSION['username'];								
				
				if($payment_method == '30')
				{

					//Merchant Requirements

						$fetch_ego2=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 34"));
						$fetch_ego3=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 35"));
						$fetch_ego4=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 36"));
						
					
					//Receiver Requirements
					
					
					 
					$rect = mysql_fetch_array(mysql_query("select * from members where member_id=".$_SESSION['userid']));

 					$receiverEmail  = $rect['ego_num'];

 					$sAccountName = $fetch_ego2['account_id']; 
					$sApiId = $fetch_ego3['account_id']; 
					$sSecurityWord = $fetch_ego4['account_id']; 

					require_once 'API_GetTransferJsonSample.php';
			 					
					
					if($output_egopay != '')
					{
						$instantflag = 1;
					}
					

				}
				
				
				if($payment_method == '7')

				{

					//Merchant Requirements
				
					$alert_merchant_username = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=1"));

					$alert_merchant_password = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=2"));
					$alert_user = $alert_merchant_username['payout_info'];
					$alert_pass = $alert_merchant_password['payout_info'];

					//Receiver Requirements

					$rect = mysql_fetch_array(mysql_query("select * from members where member_id=".$_SESSION['userid']));
					$receiverEmail  = $rect['alerypay_num'];
					require 'pay/alert/SendMoneyClient.php';
					$oj = new SendMoneyClient($alert_user,$alert_pass);
					$oj->buildPostVariables($amount1,'USD',$receiverEmail,$alert_user,1,$note,0);
					$fin = $oj->send($alert_user,$alert_pass);
					$ex = explode("&",$fin);
					$ag_ex = explode("=",$ex[0]);

					/*if($ag_ex[1] != '100')

					{

						$instantflag = 1;

					}*/

				}

				

				//*******PERFECT MONEY INSTANT PAYOUTS*************//

	

				if($payment_method == '11')

				{

	

				//Merchant Requirements

	

					$pm_merchant_username = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=3"));
					$pm_merchant_password = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=4"));
					$pm_user = $pm_merchant_username['payout_info'];
					$pm_pass = $pm_merchant_password['payout_info'];
					$admin_pm = mysql_fetch_array(mysql_query("select * from payment_process where payment_id=11"));
					$admin_pm_id  = $admin_pm['account_id'];	
					//Receiver Requirements
					$rect = mysql_fetch_array(mysql_query("select * from members where member_id=".$_SESSION['userid']));
					$receiverEmail  = $rect['pm_num'];
					$url_pathe = 'AccountID='.$pm_user.'&PassPhrase='.$pm_pass.'&Payer_Account='.$admin_pm_id.'&Payee_Account='.
					$receiverEmail.'&Amount='.$amount1.'&PAY_IN=1&PAYMENT_ID=1223';
	
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, 'https://perfectmoney.com/acct/confirm.asp?');
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $url_pathe);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_HEADER, false);
					curl_setopt($ch, CURLOPT_TIMEOUT, 30);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					$response = curl_exec($ch);
					curl_close($ch);

					$fin_val =  $response;

				}

	

				//*******LIBERTY RESERVE INSTANT PAYOUTS*************//

				if($payment_method == '42')
				{
						//Merchant Requirements
								$with_op = mysql_fetch_array(mysql_query("select * from payment_process where payment_id=42"));

						$with_op_status  = $with_op['withdraw_option'];
						if($with_op_status==1){
							$adv_merchant_mail = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=8"));
							$adv_merchant_username = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=9"));
							$adv_merchant_password = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=10"));
							$api_mail = $adv_merchant_mail['payout_info'];
							$apiName = $adv_merchant_username['payout_info'];
							$securityWord = $adv_merchant_password['payout_info'];
							

							error_reporting(E_ALL);
						ini_set('display_errors', '1');
						ini_set('max_execution_time', 0);
						require_once("MerchantWebService.php");
						$merchantWebService = new MerchantWebService();

						$arg0 = new authDTO();
						$arg0->apiName = $apiName;
						$arg0->accountEmail = $api_mail;
						$arg0->authenticationToken = $merchantWebService->getAuthenticationToken($securityWord);

						$arg1 = new withdrawToEcurrencyRequest();
						$arg1->amount = $amount;
						//$arg1->btcAmount = 0.01;
						$arg1->currency = "USD";
						$arg1->ecurrency = "PAYEER";
						//$arg1->ecurrency = "BITCOIN";U 6090 0349 0708
						$arg1->receiver = "P33860849";
						$arg1->note = "note";
						$arg1->savePaymentTemplate = true;

						$validationSendMoneyToEcurrency = new validationSendMoneyToEcurrency();
						$validationSendMoneyToEcurrency->arg0 = $arg0;
						$validationSendMoneyToEcurrency->arg1 = $arg1;

						$sendMoneyToEcurrency = new sendMoneyToEcurrency();
						$sendMoneyToEcurrency->arg0 = $arg0;
						$sendMoneyToEcurrency->arg1 = $arg1;

						try {
							$merchantWebService->validationSendMoneyToEcurrency($validationSendMoneyToEcurrency);
							$sendMoneyToEcurrencyResponse = $merchantWebService->sendMoneyToEcurrency($sendMoneyToEcurrency);
							echo $sendMoneyToEcurrencyResponse->return."<br/><br/>";
							//Receiver Requirements
							
							
						} catch (Exception $e) {
							echo "ERROR MESSAGE => " . $e->getMessage() . "<br/>";
							echo $e->getTraceAsString();
							exit();

						}
					}
					}
				
		
					if($payment_method == '8')
					{
						//Merchant Requirements
							$lr_merchant_username = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=5"));
							$lr_merchant_password = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=6"));
							$apiName = $lr_merchant_username['payout_info'];
							$securityWord = $lr_merchant_password['payout_info'];
							$admin_lr = mysql_fetch_array(mysql_query("select * from payment_process where payment_id=8"));
							$admin_lr_id  = $admin_lr['account_id'];
							//Receiver Requirements
							
							$rect = mysql_fetch_array(mysql_query("select * from members where member_id='".$_SESSION['userid']."'"));
							$receiverEmail  = ucfirst($rect['lr_num']);
							require 'pay/lr/lr.php';
					}

					//ENDS//



				if($instantflag != '1')
				{          
			        $transaction_id = "WIT".rand(0,9999999);
			
			
	
                    	/*		echo			$insert_withdraw_query="insert into history (user_id,amount,type,description,date,no_withdraw,payment_thro,reference_number,transaction_id) 
                                              values($member_id,$amount1,'withdrawal','$description','$withdraw_date',1,'$payment_method','".$transaction_id."','$transaction_id')";
                    */
			
					//echo  "<br/>";
		        	$amount = number_format($amount,8);
 		            $insert_withdraw_query="insert into history (user_id,amount,type,description,date,no_withdraw,payment_thro,reference_number,transaction_id) 
                          values($member_id,$amount,'withdrawal','$description','$withdraw_date',1,'$payment_method','".$transaction_id."','$transaction_id')";
                          
                        //  echo "block-01";

					$insert_withdraw_result=mysql_query($insert_withdraw_query);
					if($insert_withdraw_result) $sucess_flag=1;
					else $failure_flag=1;

					//$SEND MAIL//
	
						 
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

					$user_withdraw_query=mysql_fetch_array(mysql_query("select * from members where member_id=$userid"));	
					$first_name = $user_withdraw_query['first_name'];
					$mails_id = $user_withdraw_query['member_email'];
				
					$current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
					$current_url=str_replace("withdraw","login",$current_url);

					$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =6"));
					$mail_from_id = $mail_fetch['from_id'];
					$mailsubject =$mail_fetch['mailsubject'];
					$message = html_entity_decode($mail_fetch['message']);
					$message=str_replace('[FIRSTNAME]',$first_name,$message);
					$message=str_replace('[TXTAMT]',$_POST['txtAmount'],str_replace('USD','&#x0e3f;',$message));
					$message=str_replace('[transid]',$transaction_id,$message);			
					$message=str_replace('[WITHDRAWDATE]',$withdraw_date,$message);
					$message=str_replace('[ADMINEMAIL]',$admin_mail,$message);
					$message=str_replace('#sitelogo',$sitelogo,$message);
					$message=str_replace('#siteurl',$site_url,$message);
					$message=str_replace('#adminmail',$mail_from_id,$message);
					$message=str_replace('#adminemill',$mail_from_id,$message);
					$message=str_replace('#sitename',$sitename,$message);
					$message=str_replace('#verfyurl',$current_url,$message);
					
					$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
					$sitename=$sitename['set_value'];
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'From: '.$sitename.' <'.$admin_mail.'>' . "\r\n";	

					mail($mails_id,$mailsubject,html_entity_decode($message),$headers);			
					mail($admin_mail,$mailsubject,html_entity_decode($message),$headers);
					$_SESSION['succ_dir'] = "<font color='#ff0000'><b><center>Your Payouts Successfully Made</center></b></font>";

					echo '<meta http-equiv="refresh" content="0;url=withdraw.php">';
				exit(); 
			   }
			}

			else
			{				

				$member_id=$_SESSION['userid'];

				$description="Withdraw Request for $amount by ".$_SESSION['username'];
				$transaction_id = "WIT".rand(0,9999999);
		 
				// echo($amount);

				$insert_withdraw_query="insert into history (user_id,amount,type,description,date,no_withdraw,payment_thro,transaction_id) 
						values('".$member_id."','". number_format($amount,8) ."','withdraw_pending','".$description."','".date('Y-m-d h:i:s')."',1,'".$payment_method."','".$transaction_id."')";

				//==============Raisul withdrawl change =================//

				// $insert_withdraw_query="insert into history (user_id,amount,type,description,date,no_withdraw,payment_thro,transaction_id) 
				// 		values('".$member_id."','". number_format($amount,8) ."','withdrawal','".$description."','".date('Y-m-d h:i:s')."',1,'".$payment_method."','".$transaction_id."')";


				// echo $insert_withdraw_query ."<br/>";
					//echo "block -02";
				// exit();
				 if(mysql_query($insert_withdraw_query))
				{
					//$SEND MAIL//
					$withdraw_date=date('Y-m-d h:i:s');
						
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
					$current_url="https://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
					$current_url=str_replace("withdraw","login",$current_url);

					$user_withdraw_query=mysql_fetch_array(mysql_query("select * from members where member_id=$userid"));	
					$first_name = $user_withdraw_query['first_name'];
					$mails_id = $user_withdraw_query['member_email'];
					$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =6"));
					$mail_from_id = $mail_fetch['from_id'];
					$mailsubject =$mail_fetch['mailsubject'];
					$message = html_entity_decode($mail_fetch['message']);
					$message=str_replace('[FIRSTNAME]',$first_name,$message);
					$message=str_replace('[TXTAMT]',$_POST['txtAmount'],str_replace('USD','&#x0e3f;',$message));
					$message=str_replace('[transid]',$transaction_id,$message);			
					$message=str_replace('[WITHDRAWDATE]',$withdraw_date,$message);
					$message=str_replace('[ADMINEMAIL]',$admin_mail,$message);
					$message=str_replace('#sitelogo',$sitelogo,$message);
					$message=str_replace('#siteurl',$site_url,$message);
					$message=str_replace('#adminmail',$mail_from_id,$message);
					$message=str_replace('#adminemill',$mail_from_id,$message);
					$message=str_replace('#sitename',$sitename,$message);
					$message=str_replace('#verfyurl',$current_url,$message);		

					$headers  = 'MIME-Version: 1.0' . "\r\n";

					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'From: '.$sitename.' <'.$admin_mail.'>' . "\r\n";

					mail($mails_id,$mailsubject,html_entity_decode($message),$headers);				
					mail($admin_mail,$mailsubject,html_entity_decode($message),$headers);

					// echo json_encode(["status"=> 1001, "msg"=>"Your withdraw request has been placed"]);
					$_SESSION['succ_dir_withdraw']="<p class='success_message' style='text-align:center'><span >Your withdraw request send successfully</span></p>";
					echo '<meta http-equiv="refresh" content="0;url=withdraw-history.php">';
 				     exit();
				}
				else
				{
					$_SESSION['succ_dir']="<font color='red'><b><center>Your withdraw request not send successfully.</center></b></font>";
					echo '<meta http-equiv="refresh" content="0;url=withdraw.php">';
  				       exit();
				}	 		
			}
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