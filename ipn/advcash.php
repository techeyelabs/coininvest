<?


include('include/connect.php');

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

$advcash = mysql_fetch_array(mysql_query("select * from payment_process where payment_id='42'"));
$advcash_pwd = $advcash['spwd'];

$transfer_id = $_POST["ac_transfer"];
$acc_start_date = $_POST["ac_start_date"];
$acc_sci_name = $_POST["ac_sci_name"];
$ac_src_wallet = $_POST["ac_src_wallet"];
$ac_dest_wallet = $_POST["ac_dest_wallet"];
$ac_orederid = $_POST["ac_order_id"];
$acc_amnt = $_POST["ac_amount"];
$currency = $_POST["ac_merchant_currency"];
$user_id = $_POST['operation_id'];
$sci_pwd = $advcash_pwd;

$hash_val = $_POST['ac_hash'];

$sign_hash = hash('sha256', implode(":", array(
               $transfer_id,
               $acc_start_date,
               $acc_sci_name,
               $ac_src_wallet,
               $ac_dest_wallet,
               $ac_orederid,
               $acc_amnt,
               $currency,
               $sci_pwd
            )));

if($hash_val == $sign_hash){

	 $postcontent='<table cellpadding="0" cellspacing="0" border="0" width="549">';
		 
	    foreach($_POST as $key=>$value)
		{
			$postcontent.='<tr>
                			<td valign="top" align="left" width="150"><p style="margin:5px 0; padding:0; font-family:Verdana, Arial, Helvetica,
							 sans-serif; font-size:12px; line-height:22px; color:#555555;">'.$key.'</p></td><td valign="top" align="left" width="10">
							 <p style="margin:5px 0; padding:0; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; line-height:22px; color:#555555;">:</p>
							 </td><td valign="top" align="left" width="440"><p style="margin:5px 0; padding:0; font-family:Verdana, Arial, Helvetica, sans-serif; 
							 font-size:12px; line-height:22px; color:#555555; font-weight:bold;">'.$value.'</p></td>
               </tr>';
		}
		
		$postcontent.='</table>';
		
		$table = html_entity_decode($postcontent);

		$ipn = mysql_query("INSERT INTO `ipn_handle` (`handle_id`,`user_id`,`amount`,`order_date`,`transaction_id`,`post_contents`,`pay_id`,`returncontent`) VALUES ('0','".$_POST['operation_id']."','".$_POST['ac_amount']."','".$_POST['ac_start_date']."','".$_POST['ac_transfer']."','".$table."','1','".json_encode($_POST)."')");
	
		$description = "deposit made through advcash";
		$paymentid = '42';

		$insert = mysql_query("insert into `history` (`user_id`,`amount`,`type`,`description`,`date`,`payment_thro`,`transaction_id`) 
											values('".$user_id."','".$acc_amnt."','deposit_amt','".$description."','".$_POST['ac_start_date']."','".$paymentid."','".$transfer_id."')");
											
		 $select_plan = mysql_query("select * from plan where plan_id = $ac_orederid");
		$view_B = mysql_fetch_array($select_plan);
            
		if(mysql_num_rows($select_plan) > 0)
		{
			$plan_name = $view_B['plan_type'];
			 $deposit_date =  $_POST['ac_start_date'];
			if($view_B['bonus_status'] == 'yes')
			{
				$bonus_info = $view_B['bonus_per'];
				$bonus_flag =1;		

				if($bonus_info != '' && $bonus_info != 0)
				{

					$bonus_income = $acc_amnt * $bonus_info / 100;
					$final_amount = $acc_amnt + $bonus_income;
				}
				else
				{
					$final_amount = $acc_amnt;
				}
			}
			else
			{
				$final_amount = $acc_amnt;
			}
		}
		else
		{
			$final_amount = $acc_amnt;
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

		

		// $transaction_id = "DEP".rand(0,9999999);

		$insert_deposit_query="insert into deposit (member_id,plan_id,amount,compound_amount,invest_date,status,payment_thro,maturity_date,transaction_id) values($user_id,$ac_orederid,$final_amount,$final_amount,'$deposit_date','active',$paymentid,'$mat_date','$transfer_id')";

		$insert_deposit_result=mysql_query($insert_deposit_query);

	$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
									$sitename=$sitename['set_value'];
									
									
									$adminmail=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
									$adminmail=$adminmail['set_value'];

									$username=mysql_fetch_array(mysql_query("select * from members where member_id= '".$user_id."'"));
                                    $u_name = $username['username'];


$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =8"));
							$mail_from_id = $mail_fetch['from_id'];
							$mailsubject =$mail_fetch['mailsubject'];
							$message = html_entity_decode($mail_fetch['message']);
							$message=str_replace('[FIRSTNAME]',$u_name,$message);
							$message=str_replace('#sitename',$sitename,$message);
							$message=str_replace('#amt',$final_amount,$message);
							$message=str_replace('#payement','Advcash',$message);
							$message=str_replace('#adminemill',$adminmail,$message);

							$headers  = 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							$headers .= 'From: '.$sitename.' <'.$mail_from_id.'>' . "\r\n"; 
							mail($username['member_email'],$mailsubject,$message,$headers);


		

	
}



?>