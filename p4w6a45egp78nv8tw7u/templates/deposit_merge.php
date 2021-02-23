<!--Content Portion Start-->
<?php
 if(!in_array("Investment",$permission)) 
 {  
	 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
	 exit(); 
 }
?>
<style>
.merge_btn {
    color: #888;
    text-decoration: none;
    font-size: 14px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    /* text-shadow: 0 1px 1px #2b7b0c; */
    letter-spacing: 0px;
    text-transform: uppercase;
    padding: 8px 12px 6px 12px;
    margin: 0 10px 5px 0;
    /* background: #6ae63a; */
    /* background: -moz-linear-gradient(top, #a4ee87, #6ae63a 2%, #42e802); */
    /* background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #a4ee87), color-stop(.01, #6ae63a), to(#42e802)); */
    /* border: 1px solid #3bd500; */
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    outline: none;
    }
</style>
 <?php require 'include/page1.php'; ?>
<?php
unset($count);


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

	if($_GET['id'])
	{
		$select_plan = mysql_query("select * from deposit where deposit_id=".$_GET['id']);
		if(mysql_num_rows($select_plan) > 0)
		{
			$ciew = mysql_fetch_array($sselect_plan);

			if($ciew['status'] =='active')
			{
				echo '<meta http-equiv="refresh" content="0;url=deposit.php?act=new">';
				exit();
			}
		}
		else
		{
			echo '<meta http-equiv="refresh" content="0;url=deposit.php?act='.$_GET['act'].'">';
			exit();
		}
		$deposit_date=date('Y-m-d');
		$plan_duration = 180;
		
		
		
//		$select_mature = mysql_fetch_array(mysql_query("SELECT ADDDATE('".$deposit_date."', INTERVAL ".$plan_duration." DAY) as matured_date"));
	//	$mat_date = $select_mature['matured_date'];
		$mat_date = calculateMature($deposit_date);
	//	$update = mysql_query("update deposit set status='active',invest_date='$deposit_date',maturity_date='$mat_date' where deposit_id=".(int)$_GET['id']);
		
	//	$update = mysql_query("update deposit set status='active',invest_date='$deposit_date' where deposit_id=".(int)$_GET['id']);
		
		
		//========= New block for referal commisions ====== 
		$userDetStr = "select * from deposit where deposit_id='". trim($_GET['id']) . "'";
		$userDetSql = mysql_fetch_assoc(mysql_query($userDetStr));
		$userid = $userDetSql['member_id'];
        
        //==parentID    
        $p1 =  getParentID($userid);  
        
        //$dep = "select deposit_id,plan_id,amount from deposit where member_id=". $userid." and status='active' order by deposit_id desc limit 1";
        //$tt = mysql_fetch_assoc(mysql_query($dep));
        $depositID = trim($_GET['id']); //$tt['deposit_id'];
        $plan_id = $userDetSql['plan_id'] ;//$tt['plan_id'] ;
        $depoAmount = $userDetSql['amount'] ;// $tt['amount'];
        
          $ll = getlist1($p1,0);
          $dd =  json_encode($ll);
          $r = json_decode($dd);
           
            // echo "<br/>";
          
          $p2 = getParentID($p1);
          $p3 = getParentID($p2);
          $p4 = getParentID($p3);
          
         
          
          
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
                
                
                
            //     echo '<br/>';
                 //echo 'Referral Commison:<br/>';
                 // echo "user:". $userid . "<br/>parent1:".$p1."<br/>comm:".$actualCommission1.    "<br/>parent2:".$p2.      "<br/>com:". $actualCommission2 .       "<br/>parent3:".$p3.                "<br/>com:". $actualCommission3    ."<br/>parent4:".$p4.                "<br/>com:". $actualCommission4  ;
                //exit();



				 $checkStr01 = "select * from history where deposit_id='". $depositID ."' and user_id='". $p1 ."' and type='commissions' ";	
				  $checkSql01 =mysql_query( $checkStr01);

                if(mysql_num_rows( $checkSql01) ==0 ) {
                  $transaction_id1 = "REF".rand(0,9999999);
                     $referalEarnedDate1 = date('Y-m-d');            
                     $desc1='Referral commission earned '. $actualCommission1;
                     $hsql1 = "insert into history(`user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) 
    							values ('$p1','$depositID','$actualCommission1','commissions','$desc1','$referalEarnedDate1',38,0,'','$transaction_id1','1')";
    					
    				  if($p1!='' || $p1 != '0') {
    				    if($p1 != 0 )  {
    				       // mysql_query($hsql1);
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
				     if($p2!='' || $p2 != '0') {
				         if($p2 != 0 ) {
				           // mysql_query($hsql2);	
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
							if($p3 != ''  || $p3 != '0') {
							    if($p3 != 0) {
				               // mysql_query($hsql3);
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
				        //mysql_query($hsql4);	
				      }
				  }
                }
                
                
          
          
        //  echo "<br/>";
         // print_r($r);
         /* 
		 foreach($r as $rr) {
            $member_name = trim($rr->member_id);
            $memberStr = "select member_id from members where username='". $member_name ."'"  ; 
            $memberSql = mysql_fetch_assoc(mysql_query($memberStr));
            $member_level = $rr->level_id;
            //print_r($memberSql);
            $memberID = $memberSql['member_id'];
            //if($userid == $memberID) {
                echo $member_level ."<br/>";
                //====================== level Commision===================
                $levelComissionStr = "SELECT * FROM `level_commission` where plan_id='". $plan_id ."' and level_name='". $member_level ."'" ;
                $levelComissionSql = mysql_fetch_assoc(mysql_query($levelComissionStr));
          echo      $referalLevelComission = $levelComissionSql['level_commission'];
                $actualCommission = number_format((($depoAmount * $referalLevelComission)/100),8);
                
                
                
                
                 //===================== commission log ========================
                 $transaction_id = "REF".rand(0,9999999);
                 $referalEarnedDate = date('Y-m-d');            
                 $desc='Referral commission earned '. $actualCommission;
                 $hsql = "insert into history(`user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) 
							values ('$p1','$depositID','$actualCommission','commissions','$desc','$referalEarnedDate',38,0,'','$transaction_id','1')";
							
				// mysql_query($hsql);			
                 echo "<br/>";
                 echo $hsql; 
                //echo "<br/>";
                 echo  $member_name." = ". $member_level." = ". $memberID ." = ".$referalLevelComission ." = ".$depoAmount ." = ". $actualCommission."   ==paise <br/>";
            //}
           
        }*/
		
		$_SESSION['success_flag']="<font color='#004000'><b>Deposit Activated Successfully </b></font>";
	    echo '<meta http-equiv="refresh" content="0;url=deposit.php?act=active">';
		exit();
	}

	if($_GET['del_id'])
	{
		$delte=mysql_query("delete from deposit where deposit_id=".$_GET['del_id']);
		$_SESSION['success_flag']="<font color='#004000'><b>Deposit Successfully Deleted</b></font>";
		echo '<meta http-equiv="refresh" content="0;url=deposit.php?act='.$_GET['act'].'">';
		exit();
	}

	if(isset($_POST['excel']) && trim($_POST['excel']) == 1)
	{		
					if($_GET['act'] == 'active')
						{
							 $cat = 'active';
						}
						else if($_GET['act'] =='new')
						{
							$cat = 'new';
						}
						else
						{
							 $cat = 'matured';
						}
					$select_export = mysql_query("SELECT a.*,b.username,c.plan_type,d.payment_name FROM `deposit` a, members b,plan c,payment_process d where a.member_id=b.member_id and a.plan_id = c.plan_id and a.payment_thro = d.payment_id and a.status='$cat'");
					$i=0;
					if(mysql_num_rows($select_export) > 0)
					{
						$exportdata='<table width="771" class="normal tablesorter fullwidth">
						<thead>
							<tr>
								<th width="10%"><strong>Username</strong></th>
								<th width="10%"><strong>Wallet</strong></th>
								<th width="10%"><strong>TrnxID</strong></th>
								<th width="10%"><strong>Plan Name</strong></th>
								<th width="10%"><strong>Amount ( &#x0E3F; )</strong></th>
                                <th width="13%"><strong>Compound Amount ( &#x0E3F; ) </strong></th>
                                <th width="13%"><strong>Compound Rate</strong></th>
				                <th width="13%"><strong>Deposit Date</strong></th>							
			                    <th width="10%"><strong>Maturity Date</strong></th>
			                    <th width="10%"><strong>Payment Mode</strong></th>  
	                        </tr>
	                    </thead>
		                <tbody>';

			while($fetch = mysql_fetch_array($select_export))
			{
				$i++;
					if($fetch['payment_name'] == 'Beneficiary Account Name')
					{
						$fetch['payment_name'] = 'Bank Wire';
					}

				 
					  
					  
			 $exportdata.='<tr>
					  <td width="10%">'.$fetch['username'].'</td>
					  <td width="10%">'.$fetch['user_wallet'].'</td>
					  <td width="10%">'.$fetch['order_no'].'</td>
					  <td width="10%">'.$fetch['plan_type'].'</td>
					  <td width="13%" >  &#x0E3F; '.number_format($fetch['amount'],5).'</td>
					  <td width="10%">'.   $fetch['invest_date']  .'</td>';
					  
				  
					if($_GET['act'] == 'new')
					{ 
					 $exportdata.='<td width="10%">None</td>';
				  } 
				  else 
				  { 
				   $exportdata.='<td width="10%">'.$fetch['maturity_date'].'</td>';
				  }
				  $exportdata.='<td width="10%">'.$fetch['payment_name'].'</td>';
				  $exportdata.='</tr>';

				}

				}
 
				$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
				$sitename=$sitename['set_value'];
				 $filename = $sitename."_invesmentdetails_" .date('Ymd') .".xls"; 
			  file_put_contents($filename, $exportdata);
			 echo '<meta http-equiv="refresh" content="0;url=' . $filename . '"';
	}
				?>

<div id="primary_right">
                <div class="inner" >
                <?php require 'include/top/matrix_management.php'; ?>
					 <!-- end dashboard items -->
					<hr />
                    <h1>  <?php if($_GET['act']=='active') echo "Active"; else if($_GET['act']=='matured') echo "Matured"; else if($_GET['act']=='new') echo "New (Pending)"; ?> Investment  </h1>

                    <input type="text"  id="merge_amnt" class="merge_btn" readonly="readonly" />
                    <input type="button" value="Merge Deposit" id="merge_btn" class="merge_btn"/>
                    
                    <span id="merge_result"></span>
                    <?php
				 
						$cur_link = $_SERVER['PHP_SELF'].'?act='.$_GET['act'];
					?>

                    <form id="frm" name="frm" method="get" action="">
                   <table class="normal tablesorter fullwidth">
                    <tbody>
                        <tr>
                    <td><b>Search</b></td>
                    <td>
                    <input type="text" value="User Name" onfocus="if(this.value=='User Name') this.value='';" onblur="if(this.value=='') this.value='User Name';" name="username">
                       </td>
        
                        <td>
                            <input type="text" value="Plan Name" onfocus="if(this.value=='Plan Name') this.value='';" onblur="if(this.value=='') this.value='Plan Name';" name="planname">
                       </td>
                         <td>
                            <input type="text" value="Investment Date" onfocus="if(this.value=='Investment Date') this.value='';" onblur="if(this.value=='') this.value='Investment Date';" name="inv_date"  class="datepicker" >
                       </td>
                          <td>
                            <input type="text" value="TRNXID" onfocus="if(this.value=='TRNXID') this.value='';" onblur="if(this.value=='') this.value='TRNXID';" name="trnxid">
                       </td>
                       </td>
                       <td><input type="submit" id="search" value="Search" name="search">
                       <input type="hidden" id="action" value="<?=$_GET['act']; ?>" name="action"></td>
                    </tr>
                    </tbody>
                    </table>

                    </form>
                     <?php if($_SESSION['success_flag'] != '')
					  { 
					  echo '<div class="notification success"> 
							<span></span> 
							<div class="text"> 
							<p><strong>Success!</strong>'.$_SESSION['success_flag'].'</p> 
							</div> 
						 </div>';
						} 
						?>

                <?php
					if(isset($_GET['search']))
					{
								if(trim($_GET['username']) != 'User Name')
								{
									$username=trim($_GET['username']);
								}
								else
								{
									$username='';
								}

								

								if(trim($_GET['planname']) != 'Plan Name')
								{
									$planname=trim($_GET['planname']);
								}

								else
								{
									$ref_name='';
								}

								

								if(trim($_GET['inv_date']) != 'Investment Date')
								{
									$invdate=trim($_GET['inv_date']);
								}
								else
								{
									$invdate='';
								}

								

								if(trim($_GET['trnxid']) != 'TRNXID')

								{
									$paymode=trim($_GET['trnxid']);
								}
								else
								{
									$paymode='';
								}
								

								if($username != '')
								{	
									$user_id = mysql_fetch_array(mysql_query("select member_id from members where username='".$username."'"));
									$addsql.=" and a.member_id=".$user_id['member_id']."";
								}

								if($planname != '')
								{
								    $addsql.=" AND c.plan_type='".strtoupper($planname)."'";
								}

								if($invdate != '')
								{
									$investdate = date("Y-m-d",strtotime($invdate));
									$addsql.=" and a.invest_date ='".$investdate."'";
								}

								if($paymode != '')
								{

								///	$pay_id = mysql_fetch_array(mysql_query("select payment_id from payment_process where payment_name='".trim(ucfirst($paymode))."'"));
									$addsql.=" and a.order_no ='".$paymode."'";
								}
							}

							

				// 		if(isset($_GET['action']) && $_GET['action'] == 'active')
				// 		{
				// 			 $cat = 'active';
				// 		}

				// 		else if(isset($_GET['act']) && $_GET['act'] == 'active')
				// 		{
				// 			 $cat = 'active';
				// 		}

				// 		else if(isset($_GET['action']) && $_GET['action'] =='new')
				// 		{
				// 			$cat = 'new';
				// 		}

				// 		else if(isset($_GET['act']) && $_GET['act'] =='new')
				// 		{
				// 		    $cat = 'new';
				// 		}
				// 		else
				// 		{
				// 			 $cat = 'matured';
				// 		}

						$sql = "SELECT a.*,b.username,b.first_name,c.plan_type,d.payment_name FROM `deposit` a, members b,plan c,payment_process d where a.member_id=b.member_id and a.plan_id = c.plan_id and a.payment_thro = d.payment_id ";
						$query =  $sql.$addsql;
						
						
						//echo $query;
						$total_pages = mysql_num_rows(mysql_query($query));
							$limit = 25; 	
							if(isset($_GET['page']))
							{
								$page=intval(trim($_GET['page']));
							}

							else
							{
								$page=1;
							}

							if($page) 
								$start = ($page - 1) * $limit; 		
							else

								$start = 0;	
								
								

							//$select_company = mysql_query($query);
							$query = $query." order by a.invest_date desc limit $start, $limit";
							//echo $query;
							$select_company = mysql_query($query);
							//$link=$_SERVER['PHP_SELF'];
							$link='http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'] . '?act='. $cat.'&username='.$_GET['username'].'&invdate='.$_GET['inv_date'].'&paymethod='. $_GET['paymode'] .'&plan='.$_GET['planname'].'&search='.$_GET['search'].'&page=';
							$paging=newpage($page,$total_pages,$limit,$link);
						//	echo $paging;
							
						//	echo  $cat;
					?>

                    

                    
                    <table width="771" class="normal tablesorter fullwidth">
						<thead>
							<tr>
				<th width="10%"><strong>Username</strong></th>
				<th width="10%"><strong> Wallet</strong></th>
				<th width="10%"><strong>Trxn ID</strong></th>
 			       <th width="10%"><strong>Plan Name</strong></th>
 			       <th width="10%"><strong>Amount ( &#x0E3F; )</strong></th>
 	 
				<th width="13%"><strong>Deposit Date</strong></th>
				<th width="10%"><strong>Maturity Date</strong></th>
				<th width="10%"><strong>Payment Mode</strong></th>
				<th width="13%"><strong>Action</strong></th>
	</tr>
						</thead>
						<tbody>
                    <?php
	 				$i=0;
					if(mysql_num_rows($select_company) > 0)
					{
					while($fetch = mysql_fetch_array($select_company))
					{
						$i++;
						$value = $i % 2;
						if($value ==0)
						{
							$class = "odd";
						}
						else
						{
							$class = "";
						}

						if($fetch['payment_name'] == 'Beneficiary Account Name')
						{
							$fetch['payment_name'] = 'Bank Wire';
						}

				?>



                <tr class="<?php echo  $class; ?>">

                  <td width="10%"><div class="fade_hover tooltip" title="Click to view the <?=$fetch['first_name']; ?> detail">
				 <a href="view_users.php?id=<?=$fetch['member_id']; ?>&type=deposit" style="text-decoration:none;color:#353535;"><?php echo  $fetch['username']; ?></a></div></td>
				 <td width="10%"><?php echo $fetch['user_wallet']; ?>  </td>
			      <td width="10%"><?php echo $fetch['order_no']; ?>  </td>
                  <td width="10%"><?php echo  $fetch['plan_type']; ?></td>
                  <td width="13%" >&#x0E3F; <?php echo  number_format($fetch['amount'],5); ?></td>
 
                  <td width="10%"><?php echo  date('Y-m-d', strtotime($fetch['invest_date'])); ?></td>
				  <?php

				   if($_GET['act'] == 'new')
				    { 
              	  echo '<td width="10%">None</td>';
				  } 
				  else 
				  { 
				  echo ' <td width="10%">'.$fetch['maturity_date'].'</td>';
				  }
				 echo ' <td width="10%">'.$fetch['payment_name'].'</td>';
				  ?>
                   <?php 
				   if($_GET['act'] == 'new') 				   { 

 					echo '<td width="13%">
					<a href="deposit.php?act=active&id='.$fetch['deposit_id'].'" class="tooltip table_icon" ><img src="assets/icons/actions_small/Preferences.png" alt="" />
				<a href="deposit.php?act=active&del_id='.$fetch['deposit_id'].'" class="tooltip table_icon" ><img src="assets/icons/actions_small/Trash.png" alt="" /></td>';
				  } 
				  else if( $_GET['action']=='new') {
				      	echo '<td width="13%">
					<a href="deposit.php?act=active&id='.$fetch['deposit_id'].'" class="tooltip table_icon" ><img src="assets/icons/actions_small/Preferences.png" alt="" />
				<a href="deposit.php?act=active&del_id='.$fetch['deposit_id'].'" class="tooltip table_icon" ><img src="assets/icons/actions_small/Trash.png" alt="" /></td>';
				  }
				  else 
				  { 
				 echo '<td width="13%"><input type="checkbox" name="depid[]" id="depid'. $fetch['deposit_id'] .'" value="'. $fetch['deposit_id']._. $fetch['amount'] .'_'.$fetch['member_id']  .'"/></td>';
				 }
              echo '  </tr>';
				}
				}
				else 
				{
				echo '<tr><td class="alert_stxt" valign="top" align="center" colspan="9">No Records Found</td></tr>';
				}
				?>
          </tr></tbody></table>
<div class="clearboth"></div>
</div> <!-- inner -->
</div>




<script language="javascript1.2">


function condelete()
{
var confrm;
confrm=window.confirm("Are You sure you want to delete this Deposit ?");
return confrm;
}

function payment()
{
	var confrm;
confrm=window.confirm("Are You sure you want to confirm this Deposit ?");
return confrm;
}
</script>
 <script>
   //deposit merge
   document.getElementById("merge_btn").addEventListener("click", function(){
        var ids = Array();
        var userid = Array();
        var chk_arr =  document.getElementsByName("depid[]");
        var chklength = chk_arr.length;             
        var strs = "";
        var total = 0;
        var t = 0;
        
        for(k = 0 ; k < chklength ; k++ ){
            if(chk_arr[k].checked == true) {
                ids.push(chk_arr[k].value);
                var user_id = (chk_arr[k].value).split('_')[2];
                var deposit_amount= parseFloat((chk_arr[k].value).split('_')[1]);
                total += parseFloat(deposit_amount);
                userid[t++] = user_id;
                //if(ids.indexOf()) 
                strs += 'deposit amounts:'+ deposit_amount ;
            }
        } 
        console.log('==', total);
        console.log(ids);
        console.log(userid);
        if(ids.length <2 ){
            strs = "You should minimum 2 deposits for merge";
        }else {
            var cnfd = confirm('Are you sure want to merge deposit?');
            // === merge and delete
            if(cnfd) {
                var formData = new FormData(); 
                formData.append('deposit_ids', ids);
                formData.append('user_id', userid[0] );
                
                var xmlHttp = new XMLHttpRequest();
                xmlHttp.onreadystatechange = function()
                {
                    if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
                    {
                        console.log('atq-server response=> ', xmlHttp.responseText);
                        if(xmlHttp.responseText ) {
                            alert('Merged successfully');
                            location.reload();
                        // } else {
                        //     alert('Merged Error');
                        }
                    }
                }
                xmlHttp.open("post", "deposit_merge_save.php"); 
                xmlHttp.send(formData); 
            }
        }
         
        document.getElementById("merge_result").innerHTML = strs+ ' '+total;
        document.getElementById("merge_amnt").value = total;
   }); 
</script>

<!--Content Portion End-->
