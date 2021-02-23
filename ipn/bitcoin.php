<?php   //date_default_timezone_set("Europe/London");
//   date_default_timezone_set("Europe/London");
  date_default_timezone_set('Etc/GMT');

$respns = json_encode($_REQUEST);
$dt_time  = date('Y-m-d H:i:s'); 
$dt_insert = "insert into ipn_response(`response`, `dt`) values('". $respns  ."','$dt_time');";
mysql_query($dt_insert);





function calculateMature($start_date,$days)
{
    // date_default_timezone_set("Europe/London");
    date_default_timezone_set('Etc/GMT');
    $i=1;
    $j=1;
    $business= mysql_fetch_array(mysql_query("select * from admin_settings where set_id='46' and set_name='business_day' "));
    
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
 
function get_levelcommission($introid,$amount,$level,$userid,$planid) 
{

    //date_default_timezone_set("Europe/London");
    //   date_default_timezone_set("Europe/London");
      date_default_timezone_set('Etc/GMT');
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
        $cur_date=date('Y-m-d H:i:s');
        $transaction_id = "REF".rand(0,9999999);
        //echo "insert into history (user_id,amount,type,description,transaction_id) values ('$introid','$comm','commissions','$description','$transaction_id')";exit;
        
        $insert_commission_query="insert into history (user_id,amount,type,description,date,transaction_id) 
		values ('$introid','$comm','commissions','$description','$cur_date','$transaction_id')";
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


 function getlist1($n,$level)
	{
		static $count = array();
		$id="intro_id 	";
		
		$sql = "select * from members where ".$id."=".$n;
		$result = mysql_query($sql);
		
		if(mysql_num_rows($result)==0)
			$level--;
		else
			$level++;
			
		if($level == 0) 
		$level = 1;								 
		
		while($row = mysql_fetch_array($result))
		{								
		 
			 
				$name = $row["username"];	
				$fname=$row['first_name'];
				$mail = $row["mail_id"];
				$mem_mmm = $row["member_id"];
				
				$total_deposit = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where member_id = ".$mem_mmm));
				for($j=1;$j<=$level*3;$j++) 
				echo "";
				$count1[] = array('level_id'=> $level , 'member_id'=> $name );			
								
				getlist1($row["member_id"],$level);
		 
		}
		return $count1;
	}

    function getParentID($userid) {
        $test = "select intro_id from members where member_id=". $userid."";
        $parentSql = mysql_fetch_assoc(mysql_query($test));
        return $parentID = $parentSql['intro_id'];    
        //print_r($parentID);
     }



if(isset($_REQUEST)) {
    //require '../include/connect.php';
    require '../include/db.php';
    //date_default_timezone_set("Europe/London");
    //   date_default_timezone_set("Europe/London");
      date_default_timezone_set('Etc/GMT');

    $conn=mysql_connect($dbhost,$dbuser,$dbpass);
    if(!$conn) {
        echo '<meta http-equiv="refresh" content="0; url=install/install.php" />';
        //echo "<h1>Unable to Establish Connection to the Server</h1><hr noshade size=2 color=#000000>";
        exit();
    }
    
    $db_sel=mysql_select_db($dbname,$conn);
    if(!$db_sel) {
        echo "<h1>Unable to Connect to the Database</h1><hr noshade size=2 color=#000000>";
        exit();
    }
    
   // echo '<pre>';print_r($_REQUEST);
    $bitcoin_admin = mysql_fetch_object(mysql_query("SELECT * FROM payment_process WHERE payment_id='38'"));
    

    // Fill these in with the information from your CoinPayments.net account.
    $cp_merchant_id = $bitcoin_admin->account_id;
    $cp_ipn_secret = $bitcoin_admin->buy_form_code;
    // $cp_ipn_secret = 'Priya@12';
    $cp_debug_email = $adminmail;
    
    
    //These would normally be loaded from your database, the most common way is to pass the Order ID through the 'custom' POST field. 
    $order_currency = 'BTC';
    //$order_currency = 'LTCT';

    //echo '<pre>'; print_r($_SERVER);
    // if (isset($_REQUEST['ipn_mode']) && $_REQUEST['ipn_mode'] == 'hmac') {
    if (isset($_SERVER['HTTP_HMAC']) && !empty($_SERVER['HTTP_HMAC'])) 
    {
        $request = file_get_contents('php://input');
        if ($request !== FALSE && !empty($request)) 
        {
            if (isset($_REQUEST['merchant']) && $_REQUEST['merchant'] == trim($cp_merchant_id)) 
            {
                $hmac = hash_hmac("sha512", $request, trim($cp_ipn_secret));
                if ($hmac == $_SERVER['HTTP_HMAC']) {
                    $auth_ok = true;
                } 
                else {
                    $error_msg = 'HMAC signature does not match';
                       $testing = mysql_query("INSERT INTO `ipn_handle` (`handle_id`,`user_id`,`amount`,`order_date`,`transaction_id`,`post_contents`,`pay_id`,`returncontent`,`post_contents1`) 
                	VALUES ('0','".$item_number."','".$amount1."','".date('Y-m-d H:i:s')."','".$txn_id."','".json_encode($_REQUEST)."','38','".$status_text."','".$error_msg."')");

                }
            } 
            else {
                $error_msg = 'No or incorrect Merchant ID passed';
                $testing = mysql_query("INSERT INTO `ipn_handle` (`handle_id`,`user_id`,`amount`,`order_date`,`transaction_id`,`post_contents`,`pay_id`,`returncontent`,`post_contents1`) 
                VALUES ('0','".$item_number."','".$amount1."','".date('Y-m-d H:i:s')."','".$txn_id."','".json_encode($_REQUEST)."','38','".$status_text."','".$error_msg."')");

            }
        } 
        else {
            $error_msg = 'Error reading POST data';
            $testing = mysql_query("INSERT INTO `ipn_handle` (`handle_id`,`user_id`,`amount`,`order_date`,`transaction_id`,`post_contents`,`pay_id`,`returncontent`,`post_contents1`) 
                VALUES ('0','".$item_number."','".$amount1."','".date('Y-m-d H:i:s')."','".$txn_id."','".json_encode($_REQUEST)."','38','".$status_text."','".$error_msg."')");
        }   
    }
    else {

        if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) && 
            $_SERVER['PHP_AUTH_USER'] == trim($cp_merchant_id) && 
            $_SERVER['PHP_AUTH_PW'] == trim($cp_ipn_secret)) {
            $auth_ok = true;
        } else {
            $error_msg = "Invalid merchant id/ipn secret";
             $testing = mysql_query("INSERT INTO `ipn_handle` (`handle_id`,`user_id`,`amount`,`order_date`,`transaction_id`,`post_contents`,`pay_id`,`returncontent`,`post_contents1`) 
           VALUES ('0','".$item_number."','".$amount1."','".date('Y-m-d H:i:s')."','".$txn_id."','".json_encode($_REQUEST)."','38','".$status_text."','".$error_msg."')");
    
        }
    }




    //$auth_ok = true;
    if ($auth_ok) 
    {
        if ($_REQUEST['ipn_type'] == "button") 
        {
            if ($_REQUEST['merchant'] == $cp_merchant_id) 
            {
                if ($_REQUEST['currency1'] == $order_currency) 
                {
                    $txn_id = $_REQUEST['txn_id']; 
                    $item_name = $_REQUEST['item_name']; 
                    $item_number = $_REQUEST['item_number']; 
                    $amount1 = (float)$_REQUEST['amount1']; 
                    $amount2 = (float)$_REQUEST['amount2']; 
                    $currency1 = $_REQUEST['currency1']; 
                    $currency2 = $_REQUEST['currency2']; 
                    $status = intval($_REQUEST['status']); 
                    $status_text = $_REQUEST['status_text'];
                    $amount = (float)$_REQUEST['amount1']; 
                    $payid= '38';
    
                    if ($status >= 100 || $status == 2) 
                    { 
                            if($amount == $amount1) 
                            {                        
                                $select_plan = mysql_query("select * from plan where plan_id = $item_name");
                                $view_B = mysql_fetch_array($select_plan);                            
                        
                                if(mysql_num_rows($select_plan) > 0)
                                {
                                    if($view_B['bonus_status'] == 'yes')
                                    {
                                        $bonus_info = $view_B['bonus_per'];
                                        $bonus_flag = 1;     
                        
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
                                
                                $deposit_date = date('Y-m-d');
                                
                                if($view_B['iperiod_type'] == 5)
                                {
                                    $mat_date = date('Y-m-d H:i:s ',strtotime($deposit_date. ' + '.$days.' hours'));
                                }
                                else
                                {
                                    $mat_date = calculateMature($deposit_date,$days);
                                }
                                // echo "<br/>Days:".$mat_date;
                                
                                $transaction_id = "DEP".rand(0,9999999);
                                $cr_date = date('Y-m-d H:i:s');
                                $st = "SELECT DATE_ADD('$cr_date', INTERVAL 24 HOUR) as dt";
    			                $sql = mysql_fetch_array(mysql_query($st));
    			                $crons_date = $sql['dt'];
                                $investDate = date('Y-m-d H:i:s');
    
    
                                $insert_deposit_result = mysql_query("INSERT INTO `deposit`(`deposit_id`, `member_id`, `plan_id`, `amount`, `compound_amount`, `invest_date`, `maturity_date`, `status`, `intrest_alloted`, `payment_thro`, `intrest_earned`, `intrest_earned_date`, `compound_rate`, `transaction_id`) 
                                VALUES('0','".$item_number."','".$item_name."','".$amount1."','".$amount1."','".$investDate."',DATE_ADD(STR_TO_DATE( '".$investDate."', '%Y-%m-%d') , INTERVAL ".$mat_days." DAY),'active','no','38','0','0000-00-00 00:00:00','0','".$txn_id."')");
                                $deposit_id=mysql_insert_id($conn);
                                           
                                
                                $dep_str_date = mysql_fetch_array(mysql_query("select invest_date from deposit where deposit_id=".$deposit_id.""));
                                $dep_str_dates = $dep_str_date['invest_date'];
                                
                                
                                $psql = "select * from payment_process where payment_id='38'";
                                $pres = mysql_query($psql);
                                $prow = mysql_fetch_array($pres);
                                $transaction_id = "DEP".rand(0,9999999);
                                $mail_transid = $transaction_id;
                                
                                $desc='Deposit made through '.$prow['payment_name'];
                     	        $hsql=mysql_query("insert into history(user_id,deposit_id,amount,type,description,date,payment_thro,transaction_id) 
    							values ('$item_number','$deposit_id','$amount','deposit','$desc','$dep_str_dates',$payid,'$transaction_id')");
    
                                if($bonus_flag == 1)
                                {
                                    $desc1 = 'Deposit made through '.$prow['payment_name'];
                                    $desc2 = 'Bonus for making deposit of '.$amount.' BTC';
    
                                    $insert_sub_deposit = mysql_query("insert into sub_deposit(deposit_id,deposit_amt,deposit_desc) values('".$deposit_id."','".$amount."','".$desc1."')");
                                    $insert_sub_deposit1 = mysql_query("insert into sub_deposit(deposit_id,deposit_amt,deposit_desc) values('".$deposit_id."','".$bonus_income."','".$desc2."')");
                                }
                                else
                                {
                                    $desc1='Deposit made through '.$prow['payment_name'];
                                    $insert_sub_deposit = mysql_query("insert into sub_deposit(deposit_id,deposit_amt,deposit_desc) values('".$deposit_id."','".$amount."','".$desc1."')");
                                }
    
                                $sql1=mysql_query("select * from members where member_id='".$item_number."'");
                                $in_sql=mysql_fetch_array($sql1);
    
                                $introid=$in_sql['intro_id'];
                                $first_name=$in_sql['first_name'];
                                $mails_id=$in_sql['member_email'];
                                $planid=$item_name;
                                $user_id=$item_number;
                                        
                                if($introid!='') 
                                {
                                    $level_select_query="select max(level_id) as level from level_commission";
                                    $level_select_result=mysql_query($level_select_query);
                                    $level_select_row=mysql_fetch_array($level_select_result);
                                    $level_pos=$level_select_row['level'];
                                    get_levelcommission($introid,$amount,1,$user_id,$planid);
                                }
                                
                                
                                
                            
                                //=============================== new referral commission =============================
                                //========= New block for referal commisions ====== 
                                
                        		$userDetStr = "select * from deposit where deposit_id='". $deposit_id . "'";
                        		$userDetSql = mysql_fetch_assoc(mysql_query($userDetStr));
                        		$userid = $userDetSql['member_id'];
                                
                                //==parentID    
                                $p1 =  getParentID($userid);  
                                
                                //$dep = "select deposit_id,plan_id,amount from deposit where member_id=". $userid." and status='active' order by deposit_id desc limit 1";
                                //$tt = mysql_fetch_assoc(mysql_query($dep));
                                $depositID = $deposit_id; //trim($_GET['id']); //$tt['deposit_id'];
                                $plan_id = $userDetSql['plan_id'] ;//$tt['plan_id'] ;
                                $depoAmount = $userDetSql['amount'] ;// $tt['amount'];
                                
                                  $ll = getlist1($p1,0);
                                  $dd =  json_encode($ll);
                                  $r = json_decode($dd);
                                
                        		 foreach($r as $rr) {
                                    $member_name = trim($rr->member_id);
                                    $memberStr = "select member_id from members where username='". $member_name ."'"  ; 
                                    $memberSql = mysql_fetch_assoc(mysql_query($memberStr));
                                    $member_level = $rr->level_id;
                                    //print_r($memberSql);
                                    $memberID = $memberSql['member_id'];
                                    if($userid == $memberID) {
                                        
                                        //====================== level Commision===================
                                        $levelComissionStr = "SELECT * FROM `level_commission` where plan_id='". $plan_id ."' and level_name='". $member_level ."'" ;
                                        $levelComissionSql = mysql_fetch_assoc(mysql_query($levelComissionStr));
                                        $referalLevelComission = $levelComissionSql['level_commission'];
                                        $actualCommission = number_format((($depoAmount * $referalLevelComission)/100),8);
                                        
                                        
                                         //===================== commission log ========================
                                         $transaction_id = "REF".rand(0,9999999);
                                         $referalEarnedDate = date('Y-m-d');            
                                         $desc='Referral commission earned '. $actualCommission;
                                         $hsql = "insert into history(`user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) 
                        							values ('$p1','$depositID','$actualCommission','commissions','$desc','$referalEarnedDate',38,0,'','$transaction_id','1')";
                        							
                        				 mysql_query($hsql);			
                                         //echo "<br/>";
                                         //echo $hsql; 
                                        //echo "<br/>";
                                        //echo  $member_name." = ". $member_level." = ". $memberID ." = ".$referalLevelComission ." = ".$depoAmount ." = ". $actualCommission."   ==paise <br/>";
                                    }
                                   
                                }  
                                
                                /// =============================== end referral commission =============================
                                
                                
                                
                                
                            
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
                                $message=str_replace('[AMT]',$amount, str_replace('USD','BTC',$message));
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
                          
                            }
                              // $insert1 = mysql_query("INSERT INTO `history`(`id`, `user_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) VALUES ('0','".$item_number."','".$amount1."','deposit','".$status_text."','".date('Y-m-d H:i:s')."','38','0','0','".$transaction_id."','".$status."')");
    
    
                    } else if ($status < 0) {
                        $error_msg = "payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent"; 
                        $testing = mysql_query("INSERT INTO `ipn_handle` (`handle_id`,`user_id`,`amount`,`order_date`,`transaction_id`,`post_contents`,`pay_id`,`returncontent`,`post_contents1`) VALUES ('0','".$item_number."','".$amount1."','".date('Y-m-d H:i:s')."','".$txn_id."','".json_encode($_REQUEST)."','38','".$status_text."','".$error_msg."')");
    
                    } else { 
                        $error_msg = "payment is pending, you can optionally add a note to the order page";
                        $testing = mysql_query("INSERT INTO `ipn_handle` (`handle_id`,`user_id`,`amount`,`order_date`,`transaction_id`,`post_contents`,`pay_id`,`returncontent`,`post_contents1`) VALUES ('0','".$item_number."','".$amount1."','".date('Y-m-d H:i:s')."','".$txn_id."','".json_encode($_REQUEST)."','38','".$status_text."','".$error_msg."')");
    
                    }
                    
                }
    
            }
        }
    }
die('IPN OK'); 
}
