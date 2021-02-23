<?php
    error_reporting(0);


		require '../include/db.php';

    $conn=mysql_connect($dbhost,$dbuser,$dbpass);
    if(!$conn) {
        echo '<meta http-equiv="refresh" content="0; url=install/install.php" />';
		exit();
    }
    $db_sel=mysql_select_db($dbname,$conn);
    if(!$db_sel) {
        echo "<h1>Unable to Connect to the Database</h1><hr noshade size=2 color=#000000>";
        exit();
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


        function get_levelcommission($introid,$amount,$level,$userid,$planid,$mem_id) 
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
                        
                        $nams="select * from members where member_id=$mem_id";
                        $namqy=mysql_fetch_array(mysql_query($nams));
                        $description="Referral Commission Earned From ".$namqy['username'];
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
                        
                        get_levelcommission($intro_id,$amount,$level,$introid,$planid,$mem_id);
                        
                    }   

        }


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
	
	$testing = mysql_query("INSERT INTO `ipn_handle` (`handle_id`,`user_id`,`amount`,`order_date`,`transaction_id`,`post_contents`,`pay_id`,`returncontent`) VALUES ('0','".$_POST['m_orderid']."','".$_POST['m_amount']."','".date('Y-m-d H:i:s')."','".$_POST['m_operation_id']."','".$postcontent."','39','".json_encode($_POST)."')");
	
	//Functionality


	if (isset($_POST['m_operation_id']) && isset($_POST['m_sign']))
	{
		$select_payeer = mysql_fetch_array(mysql_query("select * from payment_process where payment_id=39"));
		
		$m_key = $select_payeer['batch_id'];
		
		$arHash = array($_POST['m_operation_id'],
            $_POST['m_operation_ps'],
            $_POST['m_operation_date'],
            $_POST['m_operation_pay_date'],
            $_POST['m_shop'],
            $_POST['m_orderid'],
            $_POST['m_amount'],
            $_POST['m_curr'],
            $_POST['m_desc'],
            $_POST['m_status'],
            $m_key);
	
	
		$sign_hash = strtoupper(hash('sha256', implode(':', $arHash))); 
		
		if ($_POST['m_sign'] == $sign_hash && $_POST['m_status'] == 'success')
		{
			 	$depoid 		= $_POST['m_orderid'];
				$payid 			= 39;
				$transactionid  = $_POST['m_operation_id'];
				$amount         = $_POST['m_amount'];


        $select_dep= mysql_query("select * from deposit where deposit_id='".$depoid."'");
        $ciew = mysql_fetch_array($select_dep);
        $amount= $ciew['amount'];

        $select_plan = mysql_query("select * from plan where plan_id = '".$ciew['plan_id']."'");
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
                $deposit_date=date('Y-m-d H:i:s');
                if($view_B['iperiod_type'] == 5)
                {
                
                
                    $mat_date = date('Y-m-d H:i:s ',strtotime($deposit_date. ' + '.$days.' hours'));
                }
                else
                {
                 
                    $mat_date = calculateMature($deposit_date,$days);
                }

/*
        $plan_duration = 180;

        $mat_date = calculateMature($deposit_date);*/


        $update = mysql_query("update deposit set status='active',invest_date='$deposit_date',maturity_date='$mat_date' where deposit_id='".$depoid."'");
        if($update)
        {
        $payid=39;
        $_SESSION['payid']=$payid;
        $dsel=mysql_fetch_assoc(mysql_query("SELECT * FROM deposit where deposit_id='".$depoid."' and status='active'"));
        $member_id=$dsel['member_id'];
        $amount=$dsel['amount'];
        $planid=$dsel['plan_id'];
        $transaction_id = "DEP".rand(0,9999999);
        $desc='Deposit made through Payeer';
        $hsql="insert into history(user_id,amount,type,description,payment_thro,transaction_id) values ($member_id,$amount,'deposit','$desc',$payid,'$transaction_id')";
        $hres=mysql_query($hsql);

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
            
                $amount=$dsel['amount'];

                $test=get_levelcommission($introid,$amount,1,$member_id,$planid,$member_id);
              
                
                        
            }
         



        $_SESSION['success_flag']="<font color='#004000'><b>Deposit Activated Successfully </b></font>";

       

        exit();
    }

    	echo $_POST['m_orderid'].'|success';


		exit;
		}
		echo $_POST['m_orderid'].'|error';
	}

	




?>