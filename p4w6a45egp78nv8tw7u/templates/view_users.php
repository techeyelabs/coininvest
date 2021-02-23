<?php
	$userid = $_GET['id'];
	$member_det_query="select * from members where member_id=$userid";

	$member_det_result=mysql_query($member_det_query);

	$member_det_row=mysql_fetch_array($member_det_result);

	$member_since=$member_det_row['date_of_join'];

	$member_since=explode('-',$member_since);

	$member_since=date('M-d-Y',mktime(0,0,0,$member_since[1],$member_since[2],$member_since[0]));

	

	$mbsql="select sum(amount) as member_earnings from history where user_id=$userid and (type='intrest_earned' or type='bonus' or type='commissions' or type='internal_transaction_receive')";

	$mbres=mysql_query($mbsql);

	$mbrow=mysql_fetch_array($mbres);

	$member_earnings=number_format($mbrow['member_earnings'],2);

	if(!$member_earnings)

	$member_earnings=0;

	

	$total_earning_query="select sum(amount) as tot_earnings from history where user_id=$userid and (type='intrest_earned' or type='bonus' or type='commissions' or type='release_deposit' or type='internal_transaction_receive')";

	$total_earning_result=mysql_query($total_earning_query);

	$total_earning_row=mysql_fetch_array($total_earning_result);

	$total_earnings=$total_earning_row['tot_earnings'];

	if(!$total_earnings) $total_earnings=0;

	

		$tesql="select sum(amount) as total_with from history where user_id=".$userid." and (type='withdrawal' or type='withdraw_pending' or type='penality' or type='internal_transaction_spend') order by type";
$teres=mysql_query($tesql);

if(mysql_num_rows($teres)>0)

{

	$terow=mysql_fetch_array($teres);

	$total_withdraw=$terow['total_with'];

	}

	else

	$total_withdraw=0;

	$available = $total_earnings - $total_withdraw;


	if(!$available) $available=0;

	//$total_earnings-=$total_withdraw;

	$deposit_query="select sum(amount) from deposit where status ='active' and member_id=$userid";

	$deposit_result=mysql_query($deposit_query);

	$deposit_row=mysql_fetch_array($deposit_result);

	$total_deposit_made=number_format($deposit_row[0],2);

	if(!$total_deposit_made) $total_deposit_made=0;



	$deposit_query="select sum(amount) from deposit where status = 'matured' and member_id=$userid";

	$deposit_result=mysql_query($deposit_query);

	$deposit_row=mysql_fetch_array($deposit_result);

	$matured_deposit_made=$deposit_row[0];

	if(!$matured_deposit_made) $matured_deposit_made=0;





	$released_deposit_query="select sum(amount) as amt from deposit where member_id=$userid and status='released'";

	$released_deposit_result=mysql_query($released_deposit_query);

	$released_deposit_row=mysql_fetch_array($released_deposit_result);

	$total_released_deposit=$released_deposit_row['amt'];

	if(!$total_released_deposit) $total_released_deposit=0;





	

	$intrest_earned_query="select sum(amount) from history where user_id=$userid and type='intrest_earned'";

	$intrest_earned_result=mysql_query($intrest_earned_query);

	$intrest_earned_row=mysql_fetch_array($intrest_earned_result);

	$total_intrest_earned=number_format($intrest_earned_row[0],2);

	if(!$total_intrest_earned) $total_intrest_earned=0;

	

	$withdrawals_query="select sum(amount) from history where type='withdrawal' and user_id=$userid";

	$withdrawals_result=mysql_query($withdrawals_query);

	$withdrawals_row=mysql_fetch_array($withdrawals_result);

	$withdrawals=number_format($withdrawals_row[0],2);



	$pending_withdrawals_query="select sum(amount) from history where type='withdraw_pending' and user_id=$userid";

	$pending_withdrawals_result=mysql_query($pending_withdrawals_query);

	$pending_withdrawals_row=mysql_fetch_array($pending_withdrawals_result);

	$pending_withdrawals=number_format($pending_withdrawals_row[0],2);

	

	

	

	

	$select_level_query="select max(level_id) from level_commission";

	$select_level_result=mysql_query($select_level_query);

	$select_level_row=mysql_fetch_array($select_level_result);

	$level_limit=$select_level_row[0];

	$total_referrals=0;

	$intro_id=$userid;

	for($i=1;$i<=100;$i++) {


		$select_referral_query="select * from members where intro_id=$intro_id";

		$select_referral_result=mysql_query($select_referral_query);

		if(mysql_num_rows($select_referral_result)>0) {

			$level+=1;

			$total_referrals+=mysql_num_rows($select_referral_result);

			$select_referral_row=mysql_fetch_array($select_referral_result);

			$intro_id=$select_referral_row['member_id'];

		}

	}	



	

	$select_commission_query="select * from history where type='commissions' and user_id=".$userid;

	$select_commission_result=mysql_query($select_commission_query);

	$total_commission=0;

	while($select_commission_row=mysql_fetch_array($select_commission_result)) {

	$total_commission+=$select_commission_row['amount'];

	}

?>


<div id="primary_right">

			
                <div class="inner" >
   <h1 style="color:#fff">User Details</h1>
<?php require 'include/top/userprofile.php'; ?>
					 <!-- end dashboard items -->

					<hr />
                 
                    
                    
                     <?php if($_SESSION['success_flag'] != '')
					  { 
					  echo '<div class="notification success"> 
							<span></span> 
							<div class="text"> 
							<p><strong>Success!</strong>'.$_SESSION['success_flag'].'</p> 
							</div> 
						 </div>';
						} ?>
                        
                        <?php if($_SESSION['errror_msg'] != '')
					  { 
					  echo '<div class="notification error" style="cursor: auto;"> 
						<span></span> 
						<div class="text"> 
							<p><strong><cufon class="cufon cufon-canvas" alt="Error!" style="width: 52px; height: 22px;"><canvas width="70" height="23" style="width: 70px; height: 23px; top: -1px; left: -1px;"></canvas><cufontext>Error!</cufontext></cufon></strong><font size="1" color="#ff0000">'.$_SESSION['errror_msg'].'</font></p> 
						</div> 
					</div>';
						} ?>
                        
                
                  
<?php 
	if(isset($_GET['type']) && trim($_GET['type']) == 'account')
	{
		echo  '<h1>Account Information</h1>';
	}
	else if(isset($_GET['type']) && trim($_GET['type']) == 'deposit')
	{
		echo '<h1>Deposit History</h1>';
	}
	else if(isset($_GET['type']) && trim($_GET['type']) == 'transaction')
	{
		echo '<h1>Last 10 Transaction History</h1>';
	}
	else if(isset($_GET['type']) && trim($_GET['type']) == 'payouts')
	{
		echo '<h1>Payouts History </h1>';
	}
	else
	{
		echo '<h1>Personal Profile</h1>';
		
				
				
				
	}
	 
?>
<div align="right"><a class="button_link" href="javascript: history.go(-1)">Back</a></div><br />
           
          <?php
		  	$fetch = mysql_fetch_array(mysql_query("select * from members where member_id=".$_GET['id']));
			$country = mysql_fetch_array(mysql_query("select * from country_master where country_id='".$fetch['country']."'"));
			//$language = mysql_fetch_array(mysql_query("select * from  language_details where language_id='".$fetch['language_id']."'"));
		  	
		  ?>
		  	  			<table width="100%" border="0" class="normal tablesorter fullwidth">	
				<?
				
				if($_GET['type'] =='personal' || $_GET['type'] == '')
				{
				?>
				  
                  
             
				 
				 <tr>
                  <td > Registration Date :</td>
                  <td ><?=$fetch['date_of_join']; ?></td>
                </tr>
              
                <tr class="odd">
                  <td >Username :</td>
                  <td ><?=$fetch['username'];  ?>
                </tr>
                  <tr>
                  <td >Email Id :</td>
                  <td ><?=$fetch['member_email']; ?>
                 </td>
                </tr>
               <tr class="odd">
                  <td > First Name :</td>
                  <td ><?=$fetch['first_name'];?>  </td>
                </tr>
                <tr>
                  <td > Last Name :</td>
                  <td ><?=$fetch['last_name']; ?></td>
                </tr>
                 
              <!-- <tr class="odd">
                  <td > Street :</td>
                  <td ><?=$fetch['street']; ?></td>
                </tr>
                 <tr>
                  <td > City :</td>
                  <td ><?=$fetch['city']; ?></td>
                </tr>
               <tr class="odd">
                  <td >State/Province :</td>
                  <td ><?=$fetch['state']; ?></td>
                </tr>
				
				<tr class="odd">
                  <td >Phone :</td>
                  <td ><?=$fetch['phone']; ?></td>
                </tr>
				-->
                
                <tr class="odd">
                  <td > Country :</td>
                  <td ><?=$country['country']; ?></td>
                </tr>
				
				<tr>
                  <td >Postal Code/Zip Code  :</td>
                  <td ><?=$fetch['zip_code']; ?></td>
                </tr>
			<tr class="odd">
                  <td >Secret question :</td>
                  <td ><?=$fetch['question']; ?></td>
                </tr>
				<tr>
                  <td >Answer :</td>
                  <td >*************</td>
                </tr>
				<?
					if($fetch['lr_num'] == '') $lr_num = 'None'; else  $lr_num = $fetch['lr_num'];
					if($fetch['pm_num'] == '') $pm_num = 'None'; else  $pm_num = $fetch['pm_num'];
					if($fetch['ego_num'] == '') $ego_num = 'None'; else  $ego_num = $fetch['ego_num'];
					if($fetch['st_pay'] == '') $st_pay = 'None'; else  $st_pay = $fetch['st_pay'];
					if($fetch['paypal'] == '') $paypal = 'None'; else  $paypal = $fetch['paypal'];
					if($fetch['bitcoin'] == '') $bitcoin = 'None'; else  $bitcoin = $fetch['bitcoin'];
					if($fetch['payeer'] == '') $payeer = 'None'; else  $payeer = $fetch['payeer'];
					if($fetch['neteller'] == '') $neteller = 'None'; else  $neteller = $fetch['neteller'];
					if($fetch['skrill'] == '') $skrill = 'None'; else  $skrill = $fetch['skrill'];
                    if($fetch['advcash'] == '') $advcash = 'None'; else  $advcash = $fetch['advcash'];					
					//if($fetch['bank_wire'] == '') $bank_wire = 'None'; else  $bank_wire = "<a href='../".$fetch['bank_wire']."'><strong>Click Here</strong></a>";
				?>
				<!--<tr class="odd">
                  <td >Liberty Reserve :</td>
                  <td ><?=$lr_num; ?></td>
                </tr>-->
				
				<tr class="odd">
                  <td >Ego Pay :</td>
                  <td ><?=$ego_num; ?></td>
                </tr>
				<tr >
                  <td >Perfect Money :</td>
                  <td ><?=$pm_num; ?></td>
                </tr>
				 <tr class="odd">
                  <td >paypal :</td>
                  <td ><?=$paypal; ?></td>
                </tr>
                <tr >
                  <td >bitcoin:</td>
                  <td ><?=$bitcoin; ?></td>
                </tr>
				 <tr class="odd">
                  <td >Solid Trust Pay :</td>
                  <td ><?=$st_pay; ?></td>
                </tr>
                <tr >
                  <td >Payeer :</td>
                  <td ><?=$payeer; ?></td>
                </tr>
				 <tr class="odd">
                  <td >Neteller :</td>
                  <td ><?=$neteller; ?></td>
                </tr>
                <tr >
                  <td >Skrill:</td>
                  <td ><?=$skrill; ?></td>
                </tr>
                 <tr >
                  <td >Advcash:</td>
                  <td ><?=$advcash; ?></td>
                </tr>





                 <tr class="odd">
                  <td >Benificiary Account Number :</td>
                  <td ><?=$fetch['accnum']; ?></td>
                </tr>
                <tr >
                  <td >Beneficiary Bank Name:</td>
                  <td ><?=$fetch['bank_name']; ?></td>
                </tr>
                  <tr class="odd">
                  <td >Routing TransferNumber (or) SWIFT Code (BIC) :</td>
                  <td ><?=$fetch['bank_code']; ?></td>
                </tr>
                <tr >
                  <td >Bank Address :</td>
                  <td ><?=$fetch['bank_branch']; ?></td>
                </tr>
                  <tr class="odd">
                  <td >Bank City :</td>
                  <td ><?=$fetch['bank_city']; ?></td>
                </tr>
                <tr >
                  <td >Bank State/Province:</td>
                  <td ><?=$fetch['bank_state']; ?></td>
                </tr>
                  <tr class="odd">
                  <td >Bank Country :</td>
                  <td ><?=$fetch['bank_country']; ?></td>
                </tr>
                <tr >
                  <td >Bank Zip/Postal Code :</td>
                  <td ><?=$fetch['bank_zipcode']; ?></td>
                </tr>
				 
				 
				
				<?
				
					}
				else if($_GET['type'] == 'account')
				{
				?>
				
				
			
				 
				 <tr>
                  <td width="37%" > Member Since :</td>
                  <td width="63%" ><?=$fetch['date_of_join']; ?></td>
                </tr>
               
                  <tr class="odd">
                  <td > Total Earnings :</td>
                  <td >$ <?=number_format($total_earnings,2);?></td>
                </tr>
                
              
                 <tr>
                  <td > Total Deposit Made :</td>
                  <td >$ <?=$total_deposit_made;?>
                 </td>
                </tr>
                <tr class="odd">
                  <td >Total Matured Deposit :</td>
                  <td >$ <?=$matured_deposit_made;?></td>
                </tr>
                <tr>
                  <td > Total Interest Earned :</td>
                  <td >$ <?=$total_intrest_earned;?></td>
                </tr>
                 
                <tr class="odd">
                  <td > Amount Withdrawn :</td>
                  <td >$ <?=$withdrawals;?></td>
                </tr>
                 <tr>
                  <td > Pending Withdrawals :</td>
                  <td >$ <?=$pending_withdrawals;?></td>
                </tr>
                <tr class="odd">
                  <td >Number of Referrals :</td>
                  <td > <?=$total_referrals;?> Nos</td>
                </tr>
                <tr>
                  <td > Total Referral Commission Earned :</td>
                  <td >$ <?=$total_commission;?></td>
                </tr>
<?php $tesql1="select sum(amount) as witth from history where user_id=".$userid." and type='reinvest' order by type";
	

$teres1=mysql_query($tesql1);
$terow1=mysql_fetch_array($teres1);
$witttth=$terow1['witth']; 
$available=$total_earnings-$total_withdraw-$witttth;
?>                
                
				<tr>
                  <td > <strong>Available Balance</strong> :</td>
                  <td ><strong>$ <?=number_format($available,2);?></strong></td>
                </tr>
				 <!--<tr class="odd">
				<td colspan="2">&nbsp;</td>-->
				
				<?
				
			
				}
				
				else if($_GET['type'] == 'deposit')
				{
				?>
                	<thead>

			     <tr>
                  <th width="14%"><strong>Sno</strong></th>
                  <th width="21%" ><strong>Username</strong></th>
                  <th width="18%"><strong>Plan Name</strong></th>
                  <th width="19%" ><strong>Deposited Amount$ </strong></th>
                  <th width="19%" ><strong>Compounded Amount$</strong></th>
                  <th width="19%" ><strong>Compound Rate </strong></th>
				   <th width="14%" ><strong>Deposit Date</strong></th>
                  <th width="14%" ><strong>Maturity Date</strong></th>
                  <th width="14%" ><strong>Payment Mode</strong></th>
                   <? if($_GET['act'] == 'matured')
				    { 
                 //echo <td width="11%" class="alert_head">Action</td>';
					}
				  ?>
                </tr>

						</thead>
                        
      
                <tr>
                  <td colspan="11" class="bottom_line"></td>
                  </tr>
                <?php
					
							 $cat = 'active';
						
					$select_company = mysql_query("SELECT a.*,b.username,c.plan_type,d.payment_name FROM `deposit` a, members b,plan c,payment_process d where b.member_id='".$_GET['id']."' and a.member_id=b.member_id and a.plan_id = c.plan_id and a.payment_thro = d.payment_id and a.status='$cat'");
					
					
					
					$i=0;
					if(mysql_num_rows($select_company) > 0)
					{
					while($fetch = mysql_fetch_array($select_company))
					{
						$i++;
						
						$value = $i % 2;
						if($value ==0)
						{
							$class = "add";
						}
						else
						{
							$class = "";
						}
												
				?>
                
                <tr class="<?=$class; ?>">
                  <td ><?=$i; ?></td>
                  <td ><?=$fetch['username']; ?></td>
                  <td ><?=$fetch['plan_type']; ?></td>
                  <td >$ <?=number_format($fetch['amount'],2); ?></td>
                  <td >$ <?=number_format($fetch['compound_amount'],2); ?></td>
                  <td > <?=number_format($fetch['compound_rate'],2); ?>%</td>
                  <td  align="center"><?=$fetch['invest_date']; ?></td>
                  <td  align="center"><?=$fetch['maturity_date']; ?></td>
                  <td ><?=$fetch['payment_name']; ?></td>
                   <?php if($_GET['act'] == 'matured') 
				   {
                 // <td ><a href="release.php">Release it</a></td>';
               		 }
				  ?>
                </tr>
                <?
				
				}
				
					} else {
				?>
                 <tr>
                  <td  align="center" colspan="10">No Records Found</td>
                  </tr>
                <?
				}
				?>
                
        		
				<?
				
			
				}
				
				else if($_GET['type'] == 'transaction')
				{
				?>
				<thead>
			     <tr>
                  <th width="14%"><strong>Date</strong></th>
                  <th width="21%" ><strong>Type</strong></th>
                  <th width="18%"><strong>Amount</strong></th>
                  <th width="18%"><strong>Compounded Amount</strong></th>
                  <th width="18%"><strong>Compound Rate</strong></th>
                  <th width="19%" ><strong>Descriptions</strong></th>
				   <th width="14%" ><strong>Payment Gateway</strong></th>
             
                </tr>

						</thead>
				 
			
                  <?php
					$select_company = mysql_query("select * from history where user_id=".$_GET['id']." ORDER BY date DESC Limit 0,10 ");
					
					$i=0;
					if(mysql_num_rows($select_company) > 0)
					{
					while($fetch = mysql_fetch_array($select_company))
					{
					
						$company=mysql_fetch_array(mysql_query("select * from members where member_id=".$fetch['user_id']));
						
						$payment=mysql_fetch_array(mysql_query("select * from payment_process where payment_id=".$fetch['payment_thro']));
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
						
						if($fetch['type'] == 'intrest_earned')
						{
							$type = 'Interest Earned';
						}
						else if($fetch['type'] == 'withdraw_pending')
						{
							$type = 'Withdraw Pending';
						}
						else
						{
							$type= $fetch['type'];
						}
						
						
						
				?>
                  
                <tr class="<?=$class; ?>">
				<td ><?=$fetch['date']; ?></td>
                  <td><?=ucfirst($type); ?></a></td>
                  <td >$<?=$fetch['amount']; ?></td>
                  <td></td>
                  <td></td>
                  <td ><?=$fetch['description']; ?></td>
                  
                  <td ><?=$payment['payment_name']; ?></td>
                 
                 
                  
                </tr>
                
                <?
				}
					}
					else
					{
						echo '<tr class="odd">
                  <td  align="center" colspan="10">No Records Found</td>
                  </tr>';
					}
				?>
                
               		
				
				<?
				
			
				}
				
				else if($_GET['type'] == 'payouts')
				{
				?>
				
				
				  
        <thead>
			     <tr>
                  <th width="14%"><strong>Amount</strong></th>
                  <th width="21%" ><strong>Descriptions</strong></th>
                  <th width="18%"><strong>Payment Gateway</strong></th>
                  <th width="19%" ><strong>Account ID</strong></th>
				   <th width="14%" ><strong>Status</strong></th>
             
                </tr>

						</thead>
                     
                  
                  <?php
				  	$select_company = mysql_query("select * from history where user_id='".$_GET['id']."' and (type='withdraw_pending' or type='withdrawal') ORDER BY date DESC");
					
					$i=0;
					if(mysql_num_rows($select_company) > 0)
					{
						while($fetch = mysql_fetch_array($select_company))
						{
					
						$company=mysql_fetch_array(mysql_query("select * from members where member_id=".$fetch['user_id']));
						
						$payment=mysql_fetch_array(mysql_query("select * from payment_process where payment_id=".$fetch['payment_thro']));
						$i++;
						
						$value = $i % 2;
						if($value ==0)
						{
							$class = "odd";
						}
						else
						{
							$class = "s";
						}
						if($fetch['payment_thro'] == '8')
						{
							$acc = $company['lr_num'];
						}
						else if($fetch['payment_thro'] == '30')
						{
							$acc = $company['ego_num'];
						}
						else if($fetch['payment_thro'] == '11')
						{
							$acc = $company['pm_num'];
						}
						else if($fetch['payment_thro'] == '28')
						{
							$acc = $company['st_pay'];
						}
						else
						{
							$acc = 'None';
						}
						
						
				?>
                  
                <tr class="<?=$class; ?>">
                  <td >$<?=$fetch['amount']; ?></td>
                  <td ><?=$fetch['description']; ?></td>
                 <td align="center" ><?=$payment['payment_name']; ?></td>
                  <td ><?=$acc; ?></td>
				 
                  <td align="center" ><? if($fetch['type']=='withdraw_pending') { ?><a href="withdraw.php?id=<?=$fetch['history_id']; ?>">Click to Pay</a><? } else { echo "Paid"; }?></td>
                  
                  
                </tr>
                
                <?
					}
				} else {
				?>
                
                <tr>
                  <td colspan="11"  align="center">No Records found</td>
                 </tr>
                 
                 <?
				 
				 }
				 ?>
                 <tr>
                  <td colspan="11" class="bottom_line">&nbsp;</td>
                  </tr>
                
               
              </table>
          </div></td>
        </tr>
				
				
				<?
				
			
				}
				
				?>
     </table>
                 <div class="clearboth"></div>
</div> <!-- inner -->
</div>
<!--Content Portion End-->