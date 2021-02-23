<?php  
	//date_default_timezone_set("Europe/London");
	date_default_timezone_set('Etc/GMT');
 
    error_reporting(E_ALL);
    session_start();

	$conn = mysql_connect('217.174.149.74' , 'atkinsonsbull' , 'FT71-^^#aWkr') or die(mysql_error());
	$db_sel = mysql_select_db('atkinson_gold' , $conn) or die(mysql_error());
	
function MySQLDateOffset($dt,$year_offset='',$month_offset='',$day_offset='')
{
	date_default_timezone_set('Etc/GMT');
	// $timezone  = 0; 
	// gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I")));
	return ($dt=='0000-00-00') ? '' :date ("Y-m-d", mktime(0,0,0,substr($dt,5,2)+$month_offset,substr($dt,8,2)+$day_offset,substr($dt,0,4)+$year_offset));
}


$tm = date('Y-m-d H:i:s');
//==================== cron test log =================
$tmss = "insert into test(test,tm) values('test log-".$tm  ."','".$tm."')";
mysql_query($tmss);


function getDifference($startDate,$endDate,$format)
{
	// date_default_timezone_set('Europe/London');
	$timezone  = 0; 
	gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I")));

    list($date,$time) = explode(' ',$endDate);
    $startdate = explode("-",$date);
    $starttime = explode(":",$time);

    list($date,$time) = explode(' ',$startDate);
    $enddate = explode("-",$date);
    $endtime = explode(":",$time);

    $secondsDifference =
      mktime($endtime[0],$endtime[1],$endtime[2],$enddate[1],$enddate[2],$enddate[0]) - mktime($starttime[0],$starttime[1],$starttime[2],$startdate[1],$startdate[2],$startdate[0]);
    
    switch($format){
        // Difference in Minutes
        case 1: 
            return floor($secondsDifference/60);
        // Difference in Hours    
        case 2:
            return floor($secondsDifference/60/60);
        // Difference in Days    
        case 3:
            return floor($secondsDifference/60/60/24);
        // Difference in Weeks    
        case 4:
            return floor($secondsDifference/60/60/24/7);
        // Difference in Months    
        case 5:
            return floor($secondsDifference/60/60/24/7/4);
        // Difference in Years    
        default:
            return floor($secondsDifference/365/60/60/24);
    }                
}

	$current_date = date('Y-m-d'); 
	$date = MySQLDateOffset($current_date,0,0,0);
	
	$date1 = MySQLDateOffset($current_date);
	$ex = explode("-",$date);
	$current_day = date("l",mktime(0,0,0,$ex[1],$ex[2],$ex[0]));
  
	  
	$date = MySQLDateOffset($current_date,0,0,0);
	$ex = explode("-",$date);
	 $current_day = date("l",mktime(0,0,0,$ex[1],$ex[2],$ex[0]));  
	
	$business_day=mysql_fetch_array(mysql_query("select * from admin_settings where set_id ='51'"));
		
	if($business_day['set_value'] == 'on' && ($current_day == 'Saturday' || $current_day == 'Sunday'))
	{
	
	      //main script was $bus_status =0  
 	      //$buss_status = 0 ;  
 	      $buss_status = 1 ;
	}
	else
	{
  	      $buss_status = 1 ; 
	}

 

if($buss_status== '1')
{	
		$users="select b.* from members a, deposit b where a.member_id=b.member_id and b.status='active' and b.invest_date <> '".$current_date."'";   
		$select_deposit = mysql_query($users);
		while($fetch = mysql_fetch_array($select_deposit))
		{
			$int_status = 0;
			//echo '<pre>';print_r($fetch);exit;
			
			if($fetch['cron_date'] == '0000-00-00 00:00:00')
			{
				$cron_date=$fetch['invest_date'];
				$cron_date=$cron_date;
			}
			else
			{		  
				$cron_date=$fetch['cron_date'];				
			}			
		
			$plan_id = $fetch['plan_id'];
			$user_id = $fetch['member_id'];  
			$deposit_id = $fetch['deposit_id'];
			$compound_amount = $fetch['compound_amount'];
			$current_amount = $fetch['compound_amount'];
		    $compound_rate = $fetch['compound_rate'];
			$invest_date = $fetch['invest_date'];
			$maturity_date = $fetch['maturity_date'];
			$amount=$fetch['amount'];
			//did calculation in this page
			
			$plansql="select * from plan where plan_id = '".$plan_id."'";
			$select_plan_minimum = mysql_fetch_array(mysql_query($plansql));
			$interest = $select_plan_minimum['max_interest'];
			$period_type   = $select_plan_minimum['period_type'];
			$interest_type = $select_plan_minimum['interest_type'];
			
		    //$cron_date ; echo '<br>';	
			$cdates = date('Y-m-d 13:10:10'); echo '<br>';	
			
			
			
		    //echo "Current :".$cdates='2013-02-27 17:37:33';echo '<br>';	
		    // period_type=1(day) , period_type=2(week) , period_type=3(month) , period_type=4(year) , period_type=5(hour) 
		       
		       
		       
		    //daily 
			if($period_type == 1)
			{		
			    $hour_difference=getDifference($cdates,$cron_date,2);  
			    //if($hour_difference >= 24 && $interest_type == 0)
			    //============= hide at 12-feb-2019 ======if($hour_difference >= 24 && $interest_type == 2)
			    if($hour_difference >= 13 && $interest_type == 2)
				{
				    $totaldy = $hour_difference / 24 ;
				    $tolin   = intval($totaldy);
				    $int_status=1;
				}
				else
				{				    
					$int_status=0;
				}
			}
			else if($period_type == 2 && $interest_type == 0)
			{				
				$date_alt=$current_date;
				
				$hour_difference=getDifference($cdates,$cron_date,3);
				if($hour_difference >= 7)
				{
				    $totalwek = $hour_difference / 7 ;
				    $tolin   = intval($totalwek);
				    $int_status=1;
				}
				else
				{
				    $int_status=0;
				}	
			}
			
			else if($period_type == 3 && $interest_type == 0)
			{				
				$date_alt=$current_date;
				
				$hour_difference=getDifference($cdates,$cron_date,4);
				if($hour_difference >= 4)
				{
				    $totalmon = $hour_difference / 4 ;
				    $tolin   = intval($totalmon);
				    $int_status=1;
				}
				else
				{
				    $int_status=0;
				}	
			}
			
			
			else if($period_type == 4 && $interest_type == 0)
			{				
				$date_alt = $current_date;
				$hour_difference = getDifference($cdates , $cron_date , 5);
				
				if($hour_difference >= 12)
				{
				    $totalyr = $hour_difference / 12 ;
				    $tolin   = intval($totalyr);
				    $int_status = 1;
				}
				else
				{
				   $int_status = 0;
				}	
			}
			
			 
			
			
			else if($period_type == 5 && $interest_type == 0)
			{
		 
			 	$hour_difference=getDifference($cdates,$cron_date,1);
			
				if($hour_difference >= 60)
				{
 				    $totalhr = $hour_difference / 60;
				    $tolin   = intval($totalhr);					
				    $int_status='1';   				 
				}
				else
				{				   
				    $int_status=0; 
				}					
			}
			
			
			//new block
			else if($period_type == 5 && $interest_type == 2)
			{
		 
			 	$hour_difference=getDifference($cdates,$cron_date,1);
			
				if($hour_difference >= 60)
				{
 				    $totalhr = $hour_difference / 60 ;
				    $tolin   = intval($totalhr);					
				    $int_status='1';   				 
				}
				else
				{				   
				    $int_status=0; 
				}					
			}
			
			
//================ new block interest for next day
// 			if (date('Y-m-d', strtotime($invest_date)) == date('Y-m-d', strtotime($current_date))) {
// 				$int_status = 0; 
// 			} 
			
// 			if (date('Y-m-d', strtotime($current_date)) > date('Y-m-d', strtotime($maturity_date))) {
// 				$int_status = 0;
// 			}

			
			echo "Tolin :".$tolin;echo '<br>';
			echo "<br> int Status :".$int_status;
			  //exit();
			 // $int_status = 0;
			if($int_status == 1)
			{
			    
			    //=================================================== check duplicate =====================================================================
			    $ajker_date = date('Y-m-d');
				$deposit_check_str = "select * from deposit where deposit_id='".$deposit_id."' and date_format(cron_date,'%Y-%m-%d')='". $ajker_date ."'" ;
				$deposit_check_sql = mysql_query($deposit_check_str);
				if(mysql_num_rows($deposit_check_sql) == 0 ) {
    			    mysql_query("UPDATE members SET cron_date='".$cdates."' WHERE member_id='".$fetch['member_id']."'");
    			    mysql_query("UPDATE deposit SET cron_date='".$cdates."' WHERE deposit_id='".$deposit_id."'");
				}  
		 		  
		 		$cdates = date("Y-m-d", strtotime($cdates));
				$desc = "Interest Earned on ".  $cdates  . " deposit id:".$deposit_id ;
				//$dt = $date_alt.' '.date('H:i:s');
				$final_interest = 0;
					
				//for($i=1;$i<=$tolin;$i++)
				//{	
					$interest_amount = $compound_amount * $interest / 100;
					$compound_level = $interest_amount * $compound_rate / 100;
					$final_interest1 = $interest_amount - $compound_level;
					$final_compound_amount = number_format($compound_amount + $compound_level, 8);
					//$compound_amount   =  $final_compound_amount;
					$final_interest   = number_format($final_interest+$final_interest1 , 8);
				//}	
									
					
					//============================================= check history duplicate  ===================================================================
	                $history_check_str = "select * from history where user_id='".$user_id."' and deposit_id='".$deposit_id."' and date_format(date,'%Y-%m-%d')='". $ajker_date ."'";
    				$history_check_sql = mysql_query($history_check_str);
					if(mysql_num_rows($history_check_sql) == 0 ) {
					    // if ( $user_id == 106 ) {
					    //      $transcation_id = "INT".rand(0,9999999);
					    //      $special_interest = 0.80070000; //$amount * 1.57 / 100;
        				//      $interestsql="insert into history(user_id,deposit_id,amount,type,description,date,payment_thro,no_withdraw,reference_number,transaction_id,status) 
        				// 	   values('".$user_id."','". $deposit_id  ."','".$special_interest."','intrest_earned','".$desc."','".$cdates."','38','0','','".$transcation_id."','1')";  
        					 
        				//     //  $insert_interest = mysql_query($interestsql);
        				//     //  $iupdate_depos = mysql_query("update deposit set compound_amount=".$special_interest." where deposit_id='".$deposit_id."'");
					    // }
					    
					    // else if ( $user_id == 107 ) {
					    //      $transcation_id = "INT".rand(0,9999999);
					    //      $special_interest = $compound_amount * 1.20 / 100;
        				//      $interestsql="insert into history(user_id,deposit_id,amount,type,description,date,payment_thro,no_withdraw,reference_number,transaction_id,status) 
        				// 	   values('".$user_id."','". $deposit_id  ."','".$special_interest."','intrest_earned','".$desc."','".$cdates."','38','0','','".$transcation_id."','1')";  
        					 
        				//      $insert_interest = mysql_query($interestsql);
        				//      $iupdate_depos = mysql_query("update deposit set compound_amount=".$special_interest." where deposit_id='".$deposit_id."'");
					    // }
					    //else {
					         $transcation_id = "INT".rand(0,9999999);
        				     $interestsql="insert into history(user_id,deposit_id,amount,type,description,date,payment_thro,no_withdraw,reference_number,transaction_id,status) 
        					   values('".$user_id."','". $deposit_id  ."','".$final_interest."','intrest_earned','".$desc."','".$cdates."','38','0','','".$transcation_id."','1')";  
        					 
        				     $insert_interest = mysql_query($interestsql);
        				     $iupdate_depos = mysql_query("update deposit set compound_amount=".$final_compound_amount." where deposit_id='".$deposit_id."'");   
					    //}
					}
				     
						 
						
						//  INTEREST TABLE DETAILS
						$user_id	 	= $user_id;
						$deposit_id 		= $deposit_id;
						$interest_date 		= date('M j, Y');
						$interest_date_rec 	= date('Y-m-d H:i:s');
						$principal_amount 	= number_format($current_amount,8);
						$interest_earned	= number_format($interest_amount,8);
						$interest_rate		= $interest;
						//khokon2015
						
						$compound_rate		= $compound_rate;
						$compound_interest_amt	= number_format($compound_level,8);
						$compound_amount	= number_format($principal_amount + $compound_interest_amt,8);
						
						
						//$insert_record = mysql_query("insert into interest_table(user_id,deposit_id,transcation_id,interest_date,principal_amount,interest_earned,interest_rate,compound_rate,compound_interest_amt,compound_amount) values ('".$user_id."','".$deposit_id."','".$transcation_id."','".$interest_date_rec."','".$principal_amount."','".$interest_earned."','".$interest_rate."','".$compound_rate."','".$compound_interest_amt."','".$final_compound_amount."')");
						
						//END
						
						
				 
						$userdata=mysql_fetch_array(mysql_query("select * from members where member_id ='".$user_id."'"));
						 
						$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
						$sitename=$sitename['set_value'];
						
						$adminmail=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
						$adminmail=$adminmail['set_value'];
						
						
						$select_mail_message = mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id=16"));
						
						$mailsubject=$select_mail_message['mailsubject'].'-'.date('Y-m-d');
						$message=$select_mail_message['message'];
						
						
						$message=str_replace('[FIRSTNAME]',$userdata['first_name'],$message);
						$message=str_replace('[DATE]',$interest_date,$message);
						$message=str_replace('[INTERESTAMOUNT]',$interest_earned, $message);
						$message=str_replace('[PRINCIPALAMOUNT]', $principal_amount,$message);
						$message=str_replace('[NEWPRINCIPALAMOUNT]',number_format($final_compound_amount,5),  $message);
						$message=str_replace('[INTERESTRATE]',$interest_rate,$message);
						$message=str_replace('[COMPOUNDRATE]',$compound_rate,$message);
						$message=str_replace('[ADDEDAMOUNT]', $compound_interest_amt,$message);
						$message=str_replace('[REMAININGDAYS]', $remaining_days,$message);
						$message=str_replace('#sitename',$sitename,$message);
						
						$message=str_replace('#adminemill',$mail_from_id,$message);  
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: '.$select_mail_message['mailfrom'].' <'.$select_mail_message['from_id'].'>' . "\r\n"; 
						//mail($userdata['member_email'],$mailsubject,$message,$headers);
			}
	
		}
}

else
{

	echo "Today no transaction";
}


// MATURED DEPOSIT //

$cu_date_mature = mysql_query("select * from deposit where maturity_date='".$date."' and status='active'");
if(mysql_num_rows($cu_date_mature) > 0)
{
	
	$dt = $date.' '.date('H:i:s');
	while($fetch_mature = mysql_fetch_array($cu_date_mature))
	{
		
				$amount_deposit = $fetch_mature['amount'];
				$deposit_id = $fetch_mature['deposit_id'];
				$member_id = $fetch_mature['member_id'];
				$user_id = $fetch['member_id'];
				$plan_id = $fetch_mature['plan_id'];
				$deposit_id = $fetch_mature['deposit_id'];
				$invest_date = $fetch_mature['invest_date'];
				$amount=$fetch_mature['amount'];
				
				$plansql="select * from plan where plan_id = '".$plan_id."'";
				$select_plan_minimum = mysql_fetch_array(mysql_query($plansql));
				$interest = $select_plan_minimum['max_interest'];
				$period_type = $select_plan_minimum['period_type'];
				$interest_type = $select_plan_minimum['interest_type'];
											
			     $ajker_date = date('Y-m-d');
			     $cdatex = date('Y-m-d' , strtotime($dt));
				
				if($interest_type == 2)
				{
					$desc = "Interest Earned on ". $cdatex . " deposit id:". $deposit_id;
					$dt = $date.' '.date('H:i:s');
					$interest_amount = $amount * $interest / 100;
					$transcation_id = "INT".rand(0,9999999);
					
					$history_check_str = "select * from history where user_id='".$user_id."' and deposit_id='".$deposit_id."' and date_format(date,'%Y-%m-%d')='". $ajker_date ."'";
					$history_check_sql = mysql_query($history_check_str);
					if(mysql_num_rows($history_check_sql) == 0 ) {
					    // if ( $user_id == 106 ) {
					    //     $special_interest_amount = 0.80070000; // $amount * 1.57 / 100;
					    //     $special_desc = "Interest Earned on ". $cdatex . " deposit id:". $deposit_id;
					    // 	$interestsql="insert into history(user_id,deposit_id,amount,type,description,date,payment_thro,no_withdraw,reference_number,transaction_id)
    					//      values('".$member_id."','". $deposit_id ."','".$special_interest_amount."','intrest_earned','".$special_desc."','".$date."','38','0','','".$transcation_id."')"; 
    					//     // $insert_interest = mysql_query($interestsql);
					    // }
					    
					    // else if ( $user_id == 107 ) {
					    //     $special_interest_amount = $amount * 1.20 / 100;
					    //     $special_desc = "Interest Earned on ". $cdatex . " deposit id:". $deposit_id;
					    // 	$interestsql="insert into history(user_id,deposit_id,amount,type,description,date,payment_thro,no_withdraw,reference_number,transaction_id)
    					//      values('".$member_id."','". $deposit_id ."','".$special_interest_amount."','intrest_earned','".$special_desc."','".$date."','38','0','','".$transcation_id."')"; 
    					//     $insert_interest = mysql_query($interestsql);
					    // }
					    
					    // else {
					        	$interestsql="insert into history(user_id,deposit_id,amount,type,description,date,payment_thro,no_withdraw,reference_number,transaction_id)
        					  values('".$member_id."','". $deposit_id ."','".$interest_amount."','intrest_earned','".$desc."','".$date."','38','0','','".$transcation_id."')"; 
        					$insert_interest = mysql_query($interestsql);
					    // }
    				
					}
				
			     }
			
			
				$update_uery = mysql_query("update deposit set status='matured' where deposit_id='".$deposit_id."'");
				if($select_plan_minimum['release_status'] == 'on')
				{
					$decri = 'Deposit amount is Matured '. " deposit id:". $deposit_id;
					$transcation_id = "RDP".rand(0,9999999);
					
					$history_insert = mysql_query("insert into history(user_id,deposit_id,amount,type,description,date,payment_thro,no_withdraw,reference_number,transcation_id) values('".$member_id."','".$deposit_id ."','".$amount_deposit."','release_deposit','".$decri."','".$dt."','38','0','','".$transcation_id."')");
				}
				
	
	}


}
 

?>