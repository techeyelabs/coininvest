<?PHP
session_start();
error_reporting(E_ALL);
require 'include/connect.php';


if(empty ($_SESSION['adminuser']))
{
 echo '<meta http-equiv="refresh" content="0; url=index.php" />';
 exit();
 }



	$payments = $_POST['payments'];

	
	$chkSub=$_POST['chkSub'];
	
		$errorflag=0;
		if($payments == 0 )
		{
			$errorflag=1;
			$_SESSION['empty_payments']="<font color='#FF0000' size=1>Please select any one payment gateway</font>";
			
		}
	
	
		
		if(count($_POST['chkSub'])== 0)
		{
			$errorflag=1;
			$_SESSION['empty_chkSub']="<font color='#FF0000' size=1>Please selct any one withdaraw</font>";
		}

		
		if($errorflag!=1)
		{
			if($payments == 7)
			{
					if(count($_POST['chkSub']) > 0)
					{	
						foreach($_POST['chkSub'] as $items)
						{
						
							$historystatus=mysql_query("select * from history where id='".$items."' and type='withdraw_pending'");
							if(mysql_num_rows($historystatus) > 0)
							{
								$paymentdetails=mysql_fetch_array(mysql_query("select * from history where id='".$items."'"));
							
								$account=mysql_fetch_array(mysql_query("select * from members where member_id ='".$paymentdetails['user_id']."'"));
							
								$emailid=$account['alerypay_num'];
								$historyid=$items;
								$amount=number_format($paymentdetails['amount'],2);
							
								$newarray['receiver']=$emailid;
								$newarray['note']=$historyid;
								$newarray['amount']=$amount;
								$lastarray[]=$newarray;
							}

						}
						
					}
					
					
					
				$select_ins1 = mysql_fetch_array(mysql_query("select payout_info from instant_pay where pay_id=1"));
				$select_ins2 = mysql_fetch_array(mysql_query("select payout_info from instant_pay where pay_id=2"));
				
				include 'mass_alertpay.php';
				$newobj=new MassPayClient();
				$newobj->index($select_ins1['payout_info'],$select_ins2['payout_info']);
				$getvalues=$newobj->buildPostVariables($lastarray,'USD',$select_ins1['payout_info'], 1);
				$responsess=$newobj->send();
				$newobj->parseResponse($responsess);
				$getresponses=$newobj->getResponse();
				
				if($getresponses['DESCRIPTION'] == 'Transaction was completed successfully')
				{
					foreach($_POST['chkSub'] as $items)
					{
						mysql_query("update history set type='withdrawal',reference_number='".$getresponses['REFERENCENUMBER']."' where id='".$items."'");
					}
				}
				else
				{
					$_SESSION['empty_chkSub']='Payment procss are failed. Plese try again.';
					echo '<meta http-equiv="refresh" content="0;url='.$_SERVER['HTTP_REFERER'].'">';
					exit();
				}
				
			$_SESSION['succ_dir']="<font color='#004000'><b><center>'Transaction was completed successfully. Your Reference number is ".$getresponses['REFERENCENUMBER']."</center></b></font>";
			echo '<meta http-equiv="refresh" content="0;url='.$_SERVER['HTTP_REFERER'].'">';
			exit();
			}
			
			else if($payments == 8)
			{
			//	require 'include/functions.php';
				if(count($_POST['chkSub']) > 0)
				{	
					$_SESSION['chkSub'] = $_POST['chkSub'];
					foreach($_POST['chkSub'] as $items)
					{
							$historystatus=mysql_query("select * from history where id='".$items."' and type='withdraw_pending'");
							if(mysql_num_rows($historystatus) > 0)
							{
								$paymentdetails=mysql_fetch_array(mysql_query("select * from history where id='".$items."'"));
							
								$account=mysql_fetch_array(mysql_query("select lr_num from members where member_id ='".$paymentdetails['user_id']."'"));
							
								$emailid=$account['lr_num'];
								$amount=number_format($paymentdetails['amount'],2);
								$trsferlist.=$emailid.",".$amount.",not-private,memo \n";
							}
						}
					$trsferlist;
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
					
					
					$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
				$sitename=$sitename['set_value'];
$admin_mail_id = mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
							$admin_mail = $admin_mail_id['set_value'];


					
					require 'pay/lr/lr.php';
					
					if($instantflag != '1')
					{
						/*echo "success";
						exit();*/
						foreach($_POST['chkSub'] as $items)
						{
							$transaction_id = "WIT".rand(0,9999999);
							mysql_query("update history set type='withdrawal' where id='".$items."'");
							
							//$SEND MAIL//
							
			
							
							$user_withdraw_query=mysql_fetch_array(mysql_query("select * from members where member_id=$userid"));	
							$first_name = $user_withdraw_query['first_name'];
							$mails_id = $user_withdraw_query['member_email'];
							$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =6"));
							$mail_from_id = $mail_fetch['from_id'];
							$mailsubject =$mail_fetch['mailsubject'];
							$message = html_entity_decode($mail_fetch['message']);
							$message=str_replace('[FIRSTNAME]',$first_name,$message);
							$message=str_replace('[TXTAMT]',$_POST['txtAmount'],$message);
							$message=str_replace('[transid]',$transids,$message);			
							$message=str_replace('[WITHDRAWDATE]',$withdraw_date,$message);
							$message=str_replace('[ADMINEMAIL]',$admin_mail,$message);
							$headers  = 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							$headers .= 'From: '.$sitename.' <'.$mail_from_id.'>' . "\r\n";
			
							//mail($mails_id,$mailsubject,html_entity_decode($message),$headers);
							
							//mail($admin_mail,$mailsubject,html_entity_decode($message),$headers);
						}
						$_SESSION['succ_dir']="<font color='#004000'><b><center>Your Payouts Successfully Made</center></b></font>";
						echo '<meta http-equiv="refresh" content="0;url=withdraw.php">';
						exit();
	
			}	
				}
			}
			else if($payments == 11)
			{
					if(count($_POST['chkSub']) > 0)
					{	
						foreach($_POST['chkSub'] as $items)
						{
						
							$historystatus=mysql_query("select * from history where id='".$items."' and type='withdraw_pending'");
							if(mysql_num_rows($historystatus) > 0)
							{
								$paymentdetails=mysql_fetch_array(mysql_query("select * from history where id='".$items."'"));
							
								$account=mysql_fetch_array(mysql_query("select * from pm_num where member_id ='".$paymentdetails['user_id']."'"));
							
								$pm_num=$account['pm_num'];
								$historyid=$items;
								$amount=number_format($paymentdetails['amount'],2);
								$select_ins1 = mysql_fetch_array(mysql_query("select payout_info from instant_pay where pay_id=3"));
								$select_ins2 = mysql_fetch_array(mysql_query("select payout_info from instant_pay where pay_id=4"));
							
								$f=fopen('https://perfectmoney.com/acct/confirm.asp?AccountID='.$select_ins1['payout_info'].'&PassPhrase='.$select_ins2['payout_info'].'&Payer_Account='.$select_ins1['payout_info'].'&Payee_Account='.$account['pm_num'].'&Amount='.$amount.'&PAY_IN=1&PAYMENT_ID=1223', 'rb');
							}
							if($f!=false)
							{
							  $out=array(); $out="";
								while(!feof($f)) $out.=fgets($f);
								
								fclose($f);
							}
							if(preg_match_all("/<input name='(.*)' type='hidden' value='(.*)'>/", $out, $result, PREG_SET_ORDER))
							{
						 	mysql_query("update history set type='withdrawal' where id='".$items."'");
							}
							
						}
					}
			}
 		}
		else
		{
			
			echo '<meta http-equiv="refresh" content="0;url='.$_SERVER['HTTP_REFERER'].'">';
			exit();
		}
 
 ?>