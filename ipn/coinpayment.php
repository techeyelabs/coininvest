<?php   //date_default_timezone_set("Europe/London");
date_default_timezone_set('Etc/GMT');
        require '../include/db.php';
        
    // Fill these in with the information from your CoinPayments.net account. 
    $cp_merchant_id = '31d257c75d9277766ed7690187b860f0'; 
    $cp_ipn_secret = '1ecc9ecdb6ef931433fd9842ae0dc2e2'; 
    $cp_debug_email = 'admin@atq-coins.com'; 
    
    //   date_default_timezone_set("Europe/London");
      date_default_timezone_set('Etc/GMT');
        $conn = mysql_connect($dbhost,$dbuser,$dbpass);
        mysql_select_db( $dbname , $conn );
        

    //These would normally be loaded from your database, the most common way is to pass the Order ID through the 'custom' POST field. 
    $order_currency = 'BTC'; 
    $order_total = 10.00; 
    
    
    
    $dt_time  = date('Y-m-d H:i:s'); 
    $dt_insert = "insert into ipn_response(`response`, `dt`) values('call response ipn blank-01','$dt_time');";
    mysql_query($dt_insert);
    

    function errorAndDie($error_msg) { 
        global $cp_debug_email; 
        if (!empty($cp_debug_email)) { 
            $report = 'Error: '.$error_msg."\n\n"; 
            $report .= "POST Data\n\n"; 
            foreach ($_POST as $k => $v) { 
                $report .= "|$k| = |$v|\n"; 
            } 
            mail($cp_debug_email, 'CoinPayments IPN Error', $report); 
        } 
        die('IPN Error: '.$error_msg); 
    } 

    if (!isset($_POST['ipn_mode']) || $_POST['ipn_mode'] != 'hmac') { 
        errorAndDie('IPN Mode is not HMAC'); 
    } 

    if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) { 
        errorAndDie('No HMAC signature sent.'); 
    } 

    $request = file_get_contents('php://input'); 
    if ($request === FALSE || empty($request)) { 
        errorAndDie('Error reading POST data'); 
    } 

    if (!isset($_POST['merchant']) || $_POST['merchant'] != trim($cp_merchant_id)) { 
        errorAndDie('No or incorrect Merchant ID passed'); 
    } 

    $hmac = hash_hmac("sha512", $request, trim($cp_ipn_secret)); 
    if (!hash_equals($hmac, $_SERVER['HTTP_HMAC'])) { 
    //if ($hmac != $_SERVER['HTTP_HMAC']) { <-- Use this if you are running a version of PHP below 5.6.0 without the hash_equals function 
        errorAndDie('HMAC signature does not match'); 
    } 
     
    // HMAC Signature verified at this point, load some variables. 

    $txn_id = trim($_POST['txn_id']); 
    $item_name = trim($_POST['item_name']); 
    $item_number = trim($_POST['item_number']); 
    $amount1 = floatval($_POST['amount1']); 
    $amount2 = floatval($_POST['amount2']); 
    $currency1 = trim($_POST['currency1']); 
    $currency2 = trim($_POST['currency2']); 
    $status = intval($_POST['status']); 
    $status_text = trim($_POST['status_text']); 
    
    
    
    
    //===== extra
    $no_confim = trim($_POST['received_confirms']);
    
    
    //======= check response
     $respns = json_encode($request);
        $dt_time  = date('Y-m-d H:i:s'); 
        $dt_insert = "insert into ipn_response(`response`, `dt`) values('IPN Data: ". $respns  ." | st:". $status ." = item:". $item_number . "' ,'$dt_time');";
        mysql_query($dt_insert);

    //depending on the API of your system, you may want to check and see if the transaction ID $txn_id has already been handled before at this point 
    // Check the original currency to make sure the buyer didn't change it. 
    //if ($currency1 != $order_currency) {   errorAndDie('Original currency mismatch!'); }     
    // Check amount against order total 
    //if ($amount1 < $order_total) {         errorAndDie('Amount is less than order total!');     } 
   
   
     if ($status >= 100 || $status == 2  ) 
     { 
    
    
        
        //  ================================ payment is complete or queued for nightly payout, success  ==========================
        //========================= IPN Payment Complete Block =================================
         
        
        
        $respns = json_encode($request);
        $dt_time  = date('Y-m-d H:i:s'); 
        $dt_insert = "insert into ipn_response(`response`, `dt`) values('Success Data: ". $respns  ."','$dt_time');";
        mysql_query($dt_insert);
   
 
	    
	    $plan_id = $item_name;
		$member_id = $item_number;
		$amount = $amount1;
		$txn_id = $txn_id;
		
		
		
		//========= New block for referal commisions ====== 
		   $userDetStr = "select * from deposit where  member_id='".$userid."' and plan_id='".$plan_id."' and order_no='".$txn_id."'" ;
		   $userDetSql = mysql_fetch_assoc(mysql_query($userDetStr));
		   $userid = $member_id;
           $depositID = $userDetSql['deposit_id']; 
           $p1 =  getParentID($member_id);  
           $depoAmount = $amount ; 
          
            $p2 = getParentID($p1);
            $p3 = getParentID($p2);
            $p4 = getParentID($p3);
	
	       $depCheckStr = "select * from deposit where order_no='".$txn_id."' and deposit_id='".$depositID."' and member_id='".$userid."' and plan_id='".$plan_id."' and status='new'"  ;
	       
	        $dt_insert = "insert into ipn_response(`response`, `dt`) values('". $depCheckStr  ."','$dt_time');";
            mysql_query($dt_insert);
   
	       $depCheckSql = mysql_query($depCheckStr);
	       if(mysql_num_rows($depCheckSql) == 0 ) {
            //====================making deposit active ================================
            $update_deposit = "update deposit set status='active' where order_no='".$txn_id."' and deposit_id='".$depositID."' and member_id='".$userid."' and plan_id='".$plan_id."'"  ;
            mysql_query($update_deposit);
            //======================================= commission calculation =================================
	       }
         
            //=============== for level1 parent01===============================================================================
            $levelComissionStr1 = "SELECT * FROM `level_commission` where plan_id='". $plan_id ."' and level_name='1'" ;
            $levelComissionSql1 = mysql_fetch_assoc(mysql_query($levelComissionStr1));
            $referalLevelComission1 = $levelComissionSql1['level_commission'];
            $actualCommission1 = number_format((($depoAmount * $referalLevelComission1)/100),8);
          
            //=============== for level2 parent02===============================================================================
            $levelComissionStr2 = "SELECT * FROM `level_commission` where plan_id='". $plan_id ."' and level_name='2'" ;
            $levelComissionSql2 = mysql_fetch_assoc(mysql_query($levelComissionStr2));
            $referalLevelComission2 = $levelComissionSql2['level_commission'];
            $actualCommission2 = number_format((($depoAmount * $referalLevelComission2)/100),8);
                
            //=============== for level3 parent03===============================================================================
            $levelComissionStr3 = "SELECT * FROM `level_commission` where plan_id='". $plan_id ."' and level_name='3'" ;
            $levelComissionSql3 = mysql_fetch_assoc(mysql_query($levelComissionStr3));
            $referalLevelComission3 = $levelComissionSql3['level_commission'];
            $actualCommission3 = number_format((($depoAmount * $referalLevelComission3)/100),8);
                
            //=============== for level4 parent04===============================================================================
            $levelComissionStr4 = "SELECT * FROM `level_commission` where plan_id='". $plan_id ."' and level_name='4'" ;
            $levelComissionSql4 = mysql_fetch_assoc(mysql_query($levelComissionStr4));
            $referalLevelComission4 = $levelComissionSql4['level_commission'];
            $actualCommission4 = number_format((($depoAmount * $referalLevelComission4)/100),8);
                
                
                
                
                  //echo "user:". $userid . "<br/>parent1:".$p1."<br/>comm:".$actualCommission1.             "<br/>parent2:".$p2.      "<br/>com:". $actualCommission2 .       "<br/>parent3:".$p3.                "<br/>com:". $actualCommission3    ."<br/>parent4:".$p4.                "<br/>com:". $actualCommission4  ;
          


				 $checkStr01 = "select * from history where deposit_id='". $depositID ."' and user_id='". $p1 ."' and type='commissions' ";	
				  $checkSql01 =mysql_query( $checkStr01);

                if(mysql_num_rows( $checkSql01) ==0 ) {
                  $transaction_id1 = "REF".rand(0,9999999);
                     $referalEarnedDate1 = date('Y-m-d');            
                     $desc1='Referral commission earned '. $actualCommission1;
                    
                     $hsql1 = "insert into history(`user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) 
    							values ('$p1','$depositID','$actualCommission1','commissions','$desc1','$referalEarnedDate1',38,0,'','$transaction_id1','1')";
    					 if($p1 != '' || $p1 != '0') {
    					  if($p1 != 0 ){
    					      mysql_query($hsql1);
    					  }
    				  
                     }
                }
					
					
					
					 $checkStr02 = "select * from history where deposit_id='". $depositID ."' and user_id='". $p2 ."' and type='commissions' ";	
				  $checkSql02 =mysql_query( $checkStr02);

                if(mysql_num_rows( $checkSql02) ==0 ) {	
				 $transaction_id2 = "REF".rand(0,9999999);
                 $referalEarnedDate2 = date('Y-m-d');            
                 $desc2='Referral commission earned '. $actualCommission2;
                 $hsql2 = "insert into history(`user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) 
							values ('$p2','$depositID','$actualCommission2','commissions','$desc2','$referalEarnedDate2',38,0,'','$transaction_id2','1')";
				  if($p2 != '' || $p2 != '0') {
				      if($p2 != 0 ) {
				          mysql_query($hsql2);	
				      }
				     
				  }
                }
					
					
					
					 $checkStr03 = "select * from history where deposit_id='". $depositID ."' and user_id='". $p3 ."' and type='commissions' ";	
				  $checkSql03 =mysql_query( $checkStr03);

                if(mysql_num_rows( $checkSql03) ==0 ) {		
				 $transaction_id3 = "REF".rand(0,9999999);
                 $referalEarnedDate3 = date('Y-m-d');            
                 $desc3='Referral commission earned '. $actualCommission3;
                 $hsql3 = "insert into history(`user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) 
							values ('$p3','$depositID','$actualCommission3','commissions','$desc3','$referalEarnedDate3',38,0,'','$transaction_id3','1')";
							if($p3!= ''  || $p3 != '0') {
							    if($p3 != 0 ){
							        mysql_query($hsql3);
							    }
				                
							}
                }
						
						
					 $checkStr04 = "select * from history where deposit_id='". $depositID ."' and user_id='". $p4 ."' and type='commissions' ";	
				  $checkSql04 =mysql_query( $checkStr04);

                if(mysql_num_rows( $checkSql04) ==0 ) {		
						
				 $transaction_id4 = "REF".rand(0,9999999);
                 $referalEarnedDate4 = date('Y-m-d');            
                 $desc4='Referral commission earned '. $actualCommission4;
                 $hsql4 = "insert into history(`user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) 
							values ('$p4','$depositID','$actualCommission4','commissions','$desc4','$referalEarnedDate4',38,0,'','$transaction_id4','1')";
							
				  			if($p4 != ''  || $p4 != '0') {
				  			    if($p4 != 0 ) {
				  			        mysql_query($hsql4);	
				  			    }
				            
				  			}
                }
                
          
                   
        
        
        
        
        
    } 
    else if ($status < 0) 
    { 
        //payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent 
    } 
    else 
    { 
        //==================================== payment is pending, you can optionally add a note to the order page  ============================================
        
        $respns = json_encode($request);
        $dt_time  = date('Y-m-d H:i:s'); 
        $dt_insert = "insert into ipn_response(`response`, `dt`) values('process02-". $respns  ." Blank','$dt_time');";
        mysql_query($dt_insert);
   
 
	    
	    $plan_id = $item_name;
		$member_id = $item_number;
		$amount = $amount1;
		$txn_id = $txn_id;
		
		
		
		
		//========= New block for referal commisions ====== 
		   $userDetStr = "select * from deposit where  member_id='".$userid."' and plan_id='".$plan_id."' and order_no='".$txn_id."'" ;
		   $userDetSql = mysql_fetch_assoc(mysql_query($userDetStr));
		   $userid = $member_id;
           $depositID = $userDetSql['deposit_id']; 
           $p1 =  getParentID($member_id);  
           $depoAmount = $amount ; 
          
            $p2 = getParentID($p1);
            $p3 = getParentID($p2);
            $p4 = getParentID($p3);
	
	       $depCheckStr = "select * from deposit where order_no='".$txn_id."' and deposit_id='".$depositID."' and member_id='".$userid."' and plan_id='".$plan_id."' and status='new'"  ;
	       
	        $dt_insert = "insert into ipn_response(`response`, `dt`) values('". $depCheckStr  ."','$dt_time');";
            mysql_query($dt_insert);
   
	       $depCheckSql = mysql_query($depCheckStr);
	       if(mysql_num_rows($depCheckSql) == 0 ) {
            //====================making deposit active ================================
            $update_deposit = "update deposit set status='active' where order_no='".$txn_id."' and deposit_id='".$depositID."' and member_id='".$userid."' and plan_id='".$plan_id."'"  ;
            mysql_query($update_deposit);
            //======================================= commission calculation =================================
	       }
         
            //=============== for level1 parent01===============================================================================
            $levelComissionStr1 = "SELECT * FROM `level_commission` where plan_id='". $plan_id ."' and level_name='1'" ;
            $levelComissionSql1 = mysql_fetch_assoc(mysql_query($levelComissionStr1));
            $referalLevelComission1 = $levelComissionSql1['level_commission'];
            $actualCommission1 = number_format((($depoAmount * $referalLevelComission1)/100),8);
          
            //=============== for level2 parent02===============================================================================
            $levelComissionStr2 = "SELECT * FROM `level_commission` where plan_id='". $plan_id ."' and level_name='2'" ;
            $levelComissionSql2 = mysql_fetch_assoc(mysql_query($levelComissionStr2));
            $referalLevelComission2 = $levelComissionSql2['level_commission'];
            $actualCommission2 = number_format((($depoAmount * $referalLevelComission2)/100),8);
                
            //=============== for level3 parent03===============================================================================
            $levelComissionStr3 = "SELECT * FROM `level_commission` where plan_id='". $plan_id ."' and level_name='3'" ;
            $levelComissionSql3 = mysql_fetch_assoc(mysql_query($levelComissionStr3));
            $referalLevelComission3 = $levelComissionSql3['level_commission'];
            $actualCommission3 = number_format((($depoAmount * $referalLevelComission3)/100),8);
                
            //=============== for level4 parent04===============================================================================
            $levelComissionStr4 = "SELECT * FROM `level_commission` where plan_id='". $plan_id ."' and level_name='4'" ;
            $levelComissionSql4 = mysql_fetch_assoc(mysql_query($levelComissionStr4));
            $referalLevelComission4 = $levelComissionSql4['level_commission'];
            $actualCommission4 = number_format((($depoAmount * $referalLevelComission4)/100),8);
                
                
                
                
                  //echo "user:". $userid . "<br/>parent1:".$p1."<br/>comm:".$actualCommission1.             "<br/>parent2:".$p2.      "<br/>com:". $actualCommission2 .       "<br/>parent3:".$p3.                "<br/>com:". $actualCommission3    ."<br/>parent4:".$p4.                "<br/>com:". $actualCommission4  ;
          


				 $checkStr01 = "select * from history where deposit_id='". $depositID ."' and user_id='". $p1 ."' and type='commissions' ";	
				  $checkSql01 =mysql_query( $checkStr01);

                if(mysql_num_rows( $checkSql01) ==0 ) {
                  $transaction_id1 = "REF".rand(0,9999999);
                     $referalEarnedDate1 = date('Y-m-d');            
                     $desc1='Referral commission earned '. $actualCommission1;
                     $hsql1 = "insert into history(`user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) 
    							values ('$p1','$depositID','$actualCommission1','commissions','$desc1','$referalEarnedDate1',38,0,'','$transaction_id1','1')";
    					
    				 if($p1 !=''  || $p1 != '0') {
    				     if($p1 != 0 ) {
    				       mysql_query($hsql1);
    				     }
    				 }
                }
					
					
					
					 $checkStr02 = "select * from history where deposit_id='". $depositID ."' and user_id='". $p2 ."' and type='commissions' ";	
				  $checkSql02 =mysql_query( $checkStr02);

                if(mysql_num_rows( $checkSql02) ==0 ) {	
				 $transaction_id2 = "REF".rand(0,9999999);
                 $referalEarnedDate2 = date('Y-m-d');            
                 $desc2='Referral commission earned '. $actualCommission2;
                 $hsql2 = "insert into history(`user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) 
							values ('$p2','$depositID','$actualCommission2','commissions','$desc2','$referalEarnedDate2',38,0,'','$transaction_id2','1')";
    				if($p2 !=''  || $p2 != '0') {	
    				    if($p2 != 0 ) {
    				        mysql_query($hsql2);
    				    }
    				     
    				}
                }
					
					
					
					 $checkStr03 = "select * from history where deposit_id='". $depositID ."' and user_id='". $p3 ."' and type='commissions' ";	
				  $checkSql03 =mysql_query( $checkStr03);

                if(mysql_num_rows( $checkSql03) ==0 ) {		
				 $transaction_id3 = "REF".rand(0,9999999);
                 $referalEarnedDate3 = date('Y-m-d');            
                 $desc3='Referral commission earned '. $actualCommission3;
                 $hsql3 = "insert into history(`user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) 
							values ('$p3','$depositID','$actualCommission3','commissions','$desc3','$referalEarnedDate3',38,0,'','$transaction_id3','1')";
							if($p3 !=''  || $p3 != '0') {	
							    if($p3 != 0 ) {
							        mysql_query($hsql3);
							    }
				                
							}
                }
						
						
					 $checkStr04 = "select * from history where deposit_id='". $depositID ."' and user_id='". $p4 ."' and type='commissions' ";	
				  $checkSql04 =mysql_query( $checkStr04);

                if(mysql_num_rows( $checkSql04) ==0 ) {		
						
				 $transaction_id4 = "REF".rand(0,9999999);
                 $referalEarnedDate4 = date('Y-m-d');            
                 $desc4='Referral commission earned '. $actualCommission4;
                 $hsql4 = "insert into history(`user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) 
							values ('$p4','$depositID','$actualCommission4','commissions','$desc4','$referalEarnedDate4',38,0,'','$transaction_id4','1')";
							
				  			if($p4 !=''  || $p4 != '0') {	
				  			    if($p4 != 0 ) {
				  			        mysql_query($hsql4);
				  			    }
				                	
				  			}
                }
        
    } 
    die('IPN OK'); 
    
    ?>





<?php

/*
    date_default_timezone_set("Europe/London");
    require '../include/db.php';
    
    //echo $dbhost;
    //date_default_timezone_set("Europe/London");

    date_default_timezone_set("Europe/London");
    $conn = mysql_connect($dbhost,$dbuser,$dbpass);
    mysql_select_db( $dbname , $conn );
    //if( $conn ) { echo "paise";  }
   
 

    $respns = json_encode($_REQUEST);
    $dt_time  = date('Y-m-d H:i:s'); 
    $dt_insert = "insert into ipn_response(`response`, `dt`) values('". $respns  ."','$dt_time');";
    mysql_query($dt_insert);
  





  
    function getParentID($userid) {
        $test = "select intro_id from members where member_id=". $userid."";
        $parentSql = mysql_fetch_assoc(mysql_query($test));
        return $parentID = $parentSql['intro_id'];    
        //print_r($parentID);
     }  

		
	if(!empty($_REQUEST)) {
	    
	    $plan_id = trim($_REQUEST['item_name']);
		$member_id = trim($_REQUEST['item_number']);
		$amount = trim($_REQUEST['amount']);
		$txn_id = trim($_REQUEST['txn_id']);
		
		//========= New block for referal commisions ====== 
		   $userDetStr = "select * from deposit where  member_id='".$userid."' and plan_id='".$plan_id."' and order_no='".$txn_id."'" ;
		   $userDetSql = mysql_fetch_assoc(mysql_query($userDetStr));
		   $userid = $member_id;
           $depositID = $userDetSql['deposit_id']; 
           $p1 =  getParentID($member_id);  
           $depoAmount = $amount ; 
          
            $p2 = getParentID($p1);
            $p3 = getParentID($p2);
            $p4 = getParentID($p3);
          
	
            //====================making deposit active ================================
            $update_deposit = "update deposit set status='active' where order_no='".$txn_id."' and deposit_id='".$depositID."' and member_id='".$userid."' and plan_id='".$plan_id."'"  ;
            mysql_query($update_deposit);
            //======================================= commission calculation =================================
         
         
            //=============== for level1 parent01===============================================================================
            $levelComissionStr1 = "SELECT * FROM `level_commission` where plan_id='". $plan_id ."' and level_name='1'" ;
            $levelComissionSql1 = mysql_fetch_assoc(mysql_query($levelComissionStr1));
            $referalLevelComission1 = $levelComissionSql1['level_commission'];
            $actualCommission1 = number_format((($depoAmount * $referalLevelComission1)/100),8);
          
            //=============== for level2 parent02===============================================================================
            $levelComissionStr2 = "SELECT * FROM `level_commission` where plan_id='". $plan_id ."' and level_name='2'" ;
            $levelComissionSql2 = mysql_fetch_assoc(mysql_query($levelComissionStr2));
            $referalLevelComission2 = $levelComissionSql2['level_commission'];
            $actualCommission2 = number_format((($depoAmount * $referalLevelComission2)/100),8);
                
            //=============== for level3 parent03===============================================================================
            $levelComissionStr3 = "SELECT * FROM `level_commission` where plan_id='". $plan_id ."' and level_name='3'" ;
            $levelComissionSql3 = mysql_fetch_assoc(mysql_query($levelComissionStr3));
            $referalLevelComission3 = $levelComissionSql3['level_commission'];
            $actualCommission3 = number_format((($depoAmount * $referalLevelComission3)/100),8);
                
            //=============== for level4 parent04===============================================================================
            $levelComissionStr4 = "SELECT * FROM `level_commission` where plan_id='". $plan_id ."' and level_name='4'" ;
            $levelComissionSql4 = mysql_fetch_assoc(mysql_query($levelComissionStr4));
            $referalLevelComission4 = $levelComissionSql4['level_commission'];
            $actualCommission4 = number_format((($depoAmount * $referalLevelComission4)/100),8);
                
                
                
                
                  //echo "user:". $userid . "<br/>parent1:".$p1."<br/>comm:".$actualCommission1.             "<br/>parent2:".$p2.      "<br/>com:". $actualCommission2 .       "<br/>parent3:".$p3.                "<br/>com:". $actualCommission3    ."<br/>parent4:".$p4.                "<br/>com:". $actualCommission4  ;
          


				 $checkStr01 = "select * from history where deposit_id='". $depositID ."' and user_id='". $p1 ."' and type='commissions' ";	
				  $checkSql01 =mysql_query( $checkStr01);

                if(mysql_num_rows( $checkSql01) ==0 ) {
                  $transaction_id1 = "REF".rand(0,9999999);
                     $referalEarnedDate1 = date('Y-m-d');            
                     $desc1='Referral commission earned '. $actualCommission1;
                     $hsql1 = "insert into history(`user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) 
    							values ('$p1','$depositID','$actualCommission1','commissions','$desc1','$referalEarnedDate1',38,0,'','$transaction_id1','1')";
    					
    					
    				  mysql_query($hsql1);
                }
					
					
					
					 $checkStr02 = "select * from history where deposit_id='". $depositID ."' and user_id='". $p2 ."' and type='commissions' ";	
				  $checkSql02 =mysql_query( $checkStr02);

                if(mysql_num_rows( $checkSql02) ==0 ) {	
				 $transaction_id2 = "REF".rand(0,9999999);
                 $referalEarnedDate2 = date('Y-m-d');            
                 $desc2='Referral commission earned '. $actualCommission2;
                 $hsql2 = "insert into history(`user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) 
							values ('$p2','$depositID','$actualCommission2','commissions','$desc2','$referalEarnedDate2',38,0,'','$transaction_id2','1')";
				
				     mysql_query($hsql2);	
                }
					
					
					
					 $checkStr03 = "select * from history where deposit_id='". $depositID ."' and user_id='". $p3 ."' and type='commissions' ";	
				  $checkSql03 =mysql_query( $checkStr03);

                if(mysql_num_rows( $checkSql03) ==0 ) {		
				 $transaction_id3 = "REF".rand(0,9999999);
                 $referalEarnedDate3 = date('Y-m-d');            
                 $desc3='Referral commission earned '. $actualCommission3;
                 $hsql3 = "insert into history(`user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) 
							values ('$p3','$depositID','$actualCommission3','commissions','$desc3','$referalEarnedDate3',38,0,'','$transaction_id3','1')";
				   mysql_query($hsql3);
                }
						
						
					 $checkStr04 = "select * from history where deposit_id='". $depositID ."' and user_id='". $p4 ."' and type='commissions' ";	
				  $checkSql04 =mysql_query( $checkStr04);

                if(mysql_num_rows( $checkSql04) ==0 ) {		
						
				 $transaction_id4 = "REF".rand(0,9999999);
                 $referalEarnedDate4 = date('Y-m-d');            
                 $desc4='Referral commission earned '. $actualCommission4;
                 $hsql4 = "insert into history(`user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) 
							values ('$p4','$depositID','$actualCommission4','commissions','$desc4','$referalEarnedDate4',38,0,'','$transaction_id4','1')";
							
				  			
				  mysql_query($hsql4);	
                }
                
          
                   
            
     
          
          
          die('IPN OK'); 
          
		
	    
	    
	    
	}	
		
		
		
		
		
		*/
		
		
		
//============================================== RESPONSE SAMPLE ============================================================================================================================
 /*
              [amount] => 0.01000000 [txn_id] 
             CPDB7IUGTEY160VRAV4Z7R1CQF [address] => 3G9xt5RWardFovHFgxgLrr77og5NB93wwc [confirms_needed] => 2 [timeout] => 10800
             [status_url] => https://www.coinpayments.net/index.php?cmd=status&id=CPDB7IUGTEY160VRAV4Z7R1CQF&key=d293604cef7b36413a92bf428f13c879
             [qrcode_url] => https://www.coinpayments.net/qrgen.php?id=CPDB7IUGTEY160VRAV4Z7R1CQF&key=d293604cef7b36413a92bf428f13c879 ) ) 
             INSERT INTO `deposit`(`deposit_id`, `member_id`, `plan_id`,`order_no`,`user_wallet`,`wallet`, `amount`, `compound_amount`, `invest_date`, 
             `maturity_date`, `status`, `intrest_alloted`, `payment_thro`, `intrest_earned`, `intrest_earned_date`, `compound_rate`, `transaction_id`, `cron_date`)
             VALUES('0','7','12','CPDB7IUGTEY160VRAV4Z7R1CQF','3G9xt5RWardFovHFgxgLrr77og5NB93wwc','','0.01','0.01','2019-02-08',DATE_ADD(STR_TO_DATE( '2019-02-08', '%Y-%m-%d') , 
             INTERVAL DAY),'new','no','38','0','0000-00-00 00:00:00','0','DEP3637783','0000-00-00 00:00:00')block -02
             	$data = [
        			'version' => 1,
        			'key' => '0ea2a56f9a86453d2324ef986d1b15afa88fd9c747554307dc32e06a55a36810' ,
        			'cmd' => 'create_transaction',
        			'amount' => $amount,
        			'currency1' => 'BTC',
        			'currency2' => 'BTC',
        			'amountf' => $amount ,
        			'item_name' => $plan_id, 
        			'item_number' => $item_number,
         			// 'order_no'  => $order_no,
        			'buyer_email' => 'admin@atq-coins.com',//$user_email,
        			'ipn_url' => 'https://atq-coins.com/ipn/bitcoin.php',
        			'format' => 'json'
        		];
        		$response = apiCall($data);
             */
             
//=============================================================================================================================================================================================             
		
	?>
		
		
