<?
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

	

	$tesql="select sum(amount) as total_with from history where user_id=".$userid." and (type='withdrawal' or type='withdraw_pending' or type='penality') order by type";

$teres=mysql_query($tesql);

if(mysql_num_rows($teres)>0)

{

	$terow=mysql_fetch_array($teres);

	$total_withdraw=$terow['total_with'];

	}

	else

	$total_withdraw=0;

	

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

			
                <div class="inner" style="width:900px">

<?php require 'include/top/userprofile.php'; ?>
					 <!-- end dashboard items -->

					<hr />
                    <h1>User Details</h1>
                    
                    
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
		  	$fetch = mysql_fetch_array(mysql_query("select * from members where member_id=".$_GET['id']));
			$country = mysql_fetch_array(mysql_query("select * from country_master where country_id='".$fetch['country']."'"));
			//$language = mysql_fetch_array(mysql_query("select * from  language_details where language_id='".$fetch['language_id']."'"));
		  	

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
		
				
				  
               $out.='<table><tr>
                  <td colspan="2" align="right" class="formtext1">&nbsp;</td>
                  </tr>
				 
				 <tr>
                  <td width="37%" align="right" class="formtext2"> Registration Date :</td>
                  <td width="63%" align="left" class="formtext2">'.$fetch['date_of_join'].'</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                  <tr>
                  <td align="right" class="formtext2"> <span class="redstar">*</span>Username :</td>
                  <td align="left" class="formtext2">'.$fetch['username'].'</td>
				  </tr>
                
                <tr><td>&nbsp;</td></tr>
                 <tr>
                  <td align="right" class="formtext2"> <span class="redstar">*</span>Email Id :</td>
                  <td align="left" class="formtext2">'.$fetch['member_email'].'</td>
                </tr>
                <tr>
                  <td align="right" class="formtext2"><span class="redstar">*</span> First Name :</td>
                  <td align="left" class="formtext2">'.$fetch['first_name'].'</td>
                </tr>
                <tr>
                  <td align="right" class="formtext2"> Last Name :</td>
                  <td align="left" class="formtext2">'.$fetch['last_name'].'</td>
                </tr>
                 
                <tr>
                  <td align="right" class="formtext2"> Street :</td>
                  <td align="left" class="formtext2">'.$fetch['street'].'</td>
                </tr>
                 <tr>
                  <td align="right" class="formtext2"> City :</td>
                  <td align="left" class="formtext2">'.$fetch['city'].'</td>
                </tr>
               	 <tr>
                  <td align="right" class="formtext2">State/Province :</td>
                  <td align="left" class="formtext2">'.$fetch['state'].'</td>
                </tr>
                <tr>
                  <td align="right" class="formtext2"> Country :</td>
                  <td align="left" class="formtext2">'.$country['country'].'</td>
                </tr>
				
				<tr>
                  <td align="right" class="formtext2">Phone :</td>
                  <td align="left" class="formtext2">'.$fetch['phone'].'</td>
                </tr>
				<tr>
                  <td align="right" class="formtext2">Postal Code/Zip Code  :</td>
                  <td align="left" class="formtext2">'.$fetch['zip_code'].'</td>
                </tr>
				<tr>
                  <td align="right" class="formtext2">Secret question :</td>
                  <td align="left" class="formtext2">'.$fetch['question'].'</td>
                </tr>
				<tr>
                  <td align="right" class="formtext2">Answer :</td>
                  <td align="left" class="formtext2">*************</td>
                </tr>';
			
					if($fetch['lr_num'] == '') 
					$lr_num = 'None';
					else  $lr_num = $fetch['lr_num'];
					
					if($fetch['alerypay_num'] == '')
					$alerypay_num = 'None'; 
					else  
					$alerypay_num = $fetch['alerypay_num'];
					 
					if($fetch['bank_wire'] == '')
					$bank_wire = 'None'; 
					else
					$bank_wire = "<a href='../".$fetch['bank_wire']."'><strong>Click Here</strong></a>";
				
				$out.='<tr>
                  <td align="right" class="formtext2">Liberty Reserve :</td>
                  <td align="left" class="formtext2">'.$lr_num.'</td>
                </tr>
				<tr>
                  <td align="right" class="formtext2">Alert Pay :</td>
                  <td align="left" class="formtext2">'.$alerypay_num.'</td>
                </tr>
				<tr>
                  <td align="right" class="formtext2">Bank Wire :</td>
                  <td align="left" class="formtext2">'.$bank_wire.'</td>
                </tr></table>';
				
				
				
				
				
	}
	echo $out;
?>
           
           
          			
				<?
				
				if($_GET['type'] =='personal' || $_GET['type'] == '')
				{}
				else if($_GET['type'] == 'account')
				{
				?>
				
				
				  
                <tr>
                  <td colspan="2" align="right" class="formtext1">&nbsp;</td>
                  </tr>
				 
				 <tr>
                  <td width="37%" align="right" class="formtext2"> Member Since :</td>
                  <td width="63%" align="left" class="formtext2"><?=$fetch['date_of_join']; ?></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                  <tr>
                  <td align="right" class="formtext2"> Total Earnings :</td>
                  <td align="left" class="formtext2">$ <?=number_format($total_earnings,2);?></td>
                </tr>
                
              
                 <tr>
                  <td align="right" class="formtext2"> Total Deposit Made :</td>
                  <td align="left" class="formtext2">$ <?=$total_deposit_made;?>
                 </td>
                </tr>
                <tr>
                  <td align="right" class="formtext2">Total Matured Deposit :</td>
                  <td align="left" class="formtext2">$ <?=$matured_deposit_made;?></td>
                </tr>
                <tr>
                  <td align="right" class="formtext2"> Total Interest Earned :</td>
                  <td align="left" class="formtext2">$ <?=$total_intrest_earned;?></td>
                </tr>
                 
                <tr>
                  <td align="right" class="formtext2"> Amount Withdrawn :</td>
                  <td align="left" class="formtext2">$ <?=$withdrawals;?></td>
                </tr>
                 <tr>
                  <td align="right" class="formtext2"> Pending Withdrawals :</td>
                  <td align="left" class="formtext2">$ <?=$pending_withdrawals;?></td>
                </tr>
               	 <tr>
                  <td align="right" class="formtext2">Number of Referrals :</td>
                  <td align="left" class="formtext2"> <?=$total_referrals;?> Nos</td>
                </tr>
                <tr>
                  <td align="right" class="formtext2"> Total Referral Commission Earned :</td>
                  <td align="left" class="formtext2">$ <?=$total_commission;?></td>
                </tr>
				
				
				
				<?
				
			
				}
				
				else if($_GET['type'] == 'deposit')
				{
				?>
				
				
				  
                <tr>
                  <td colspan="2" align="right" class="formtext1">&nbsp;</td>
                  </tr>
				 
				<tr>
          <td colspan="3" class=""><div id="main_first2" style="display:block;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td width="2%" class="alert_head">Sno</td>
                  <td width="15%" class="alert_head">Username</td>
                  <td width="13%" class="alert_head">Plan Name</td>
                  <td width="13%" class="alert_head">Amount ($)</td>
                  <td width="15%" class="alert_head"><div align="center">Deposit Date</div></td>
                  <td width="17%" class="alert_head"><div align="center">Maturity Date</div></td>
                  <td width="14%" class="alert_head">Payment Mode</td>
                  <? if($_GET['act'] == 'matured') { ?>
                  <!--<td width="11%" class="alert_head">Action</td>-->
                  <?
				  }
				  ?>
               </tr>
                <tr>
                  <td colspan="11" class="bottom_line"></td>
                  </tr>
                <?
					
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
							$class = "alert_row2";
						}
						else
						{
							$class = "alert_row1";
						}
												
				?>
                
                <tr class="<?=$class; ?>" onmouseover="mouse_event(this, 'listrow_bg');" onmouseout="mouse_event(this, '<?=$class; ?>');">
                  <td class="alert_stxt" valign="top"><?=$i; ?></td>
                  <td class="alert_stxt" valign="top"><?=$fetch['username']; ?></td>
                  <td class="alert_stxt" valign="top"><?=$fetch['plan_type']; ?></td>
                  <td class="alert_stxt" valign="top">$ <?=number_format($fetch['amount'],2); ?></td>
                  <td class="alert_stxt" valign="top" align="center"><?=$fetch['invest_date']; ?></td>
                  <td class="alert_stxt" valign="top" align="center"><?=$fetch['maturity_date']; ?></td>
                  <td class="alert_stxt" valign="top"><?=$fetch['payment_name']; ?></td>
                   <? if($_GET['act'] == 'matured') { ?>
                 <!-- <td class="alert_stxt"><a href="release.php">Release it</a></td>-->
                  <?
				  }
				  ?>
                </tr>
                <?
				
				}
				
					} else {
				?>
                 <tr>
                  <td class="alert_stxt" valign="top" align="center" colspan="6">No Records Found</td>
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
				
				else if($_GET['type'] == 'transaction')
				{
				?>
				
				
				  
                <tr>
                  <td colspan="2" align="right" class="formtext1">&nbsp;</td>
                  </tr>
				 
				<tr>
          <td colspan="3" class=""><div id="main_first2" style="display:block;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
				<td width="16%" align="center" class="alert_head">Date</td>
				<td width="10%" class="alert_head">Type</td>
                 <td width="10%" class="alert_head">Amount</td>
                  <td width="18%" class="alert_head">Descriptions</td>
                  
                  <td width="15%" align="center" class="alert_head">Payment Gateway</td>
                  
                  
                </tr>
                
                <tr>
                  <td colspan="11" class="bottom_line"></td>
                  </tr>
                  <?
					$select_company = mysql_query("select * from history where user_id=".$_GET['id']." ORDER BY date DESC Limit 0,10 ");
					
					$i=0;
					while($fetch = mysql_fetch_array($select_company))
					{
					
						$company=mysql_fetch_array(mysql_query("select * from members where member_id=".$fetch['user_id']));
						
						$payment=mysql_fetch_array(mysql_query("select * from payment_process where payment_id=".$fetch['payment_thro']));
						$i++;
						
						$value = $i % 2;
						if($value ==0)
						{
							$class = "alert_row2";
						}
						else
						{
							$class = "alert_row1";
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
                  
                <tr class="<?=$class; ?>" onmouseover="mouse_event(this, 'listrow_bg');" onmouseout="mouse_event(this, '<?=$class; ?>');">
				<td align="center" class="alert_stxt"><?=$fetch['date']; ?></td>
                  <td class="alert_stxt"><?=ucfirst($type); ?></a></td>
                  <td class="alert_stxt">$<?=$fetch['amount']; ?></td>
                  <td class="alert_stxt"><?=$fetch['description']; ?></td>
                  
                  <td align="center" class="alert_stxt"><?=$payment['payment_name']; ?></td>
                 
                 
                  
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
				
				else if($_GET['type'] == 'payouts')
				{
				?>
				
				
				  
                <tr>
                  <td colspan="2" align="right" class="formtext1">&nbsp;</td>
                  </tr>
				 
				<tr>
          <td colspan="3" class=""><div id="main_first2" style="display:block;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="14%" class="alert_head">Amount</td>
				  <td width="32%" class="alert_head">Descriptions</td>
				   <td width="25%" class="alert_head" align="center">Payment Gateway</td>
				    <td width="11%" class="alert_head">Account ID</td>
                  <td width="18%" align="center" class="alert_head">Status</td>

                  
                </tr>
                
                <tr>
                  <td colspan="11" class="bottom_line"></td>
                  </tr>
                  
                  
                  <?
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
							$class = "alert_row2";
						}
						else
						{
							$class = "alert_row1";
						}
						if($fetch['payment_thro'] == '8')
						{
							$acc = $company['lr_num'];
						}
						else if($fetch['payment_thro'] == '7')
						{
							$acc = $company['alerypay_num'];
						}
						else
						{
							$acc = 'None';
						}
						
						
				?>
                  
                <tr class="<?=$class; ?>" onmouseover="mouse_event(this, 'listrow_bg');" onmouseout="mouse_event(this, '<?=$class; ?>');">
                  <td class="alert_stxt">$<?=$fetch['amount']; ?></td>
                  <td class="alert_stxt"><?=$fetch['description']; ?></td>
                 <td align="center" class="alert_stxt"><?=$payment['payment_name']; ?></td>
                  <td class="alert_stxt"><?=$acc; ?></td>
				 
                  <td align="center" class="alert_stxt"><? if($fetch['type']=='withdraw_pending') { ?><a href="withdraw.php?id=<?=$fetch['history_id']; ?>">Click to Pay</a><? } else { echo "Paid"; }?></td>
                  
                  
                </tr>
                
                <?
					}
				} else {
				?>
                
                <tr>
                  <td colspan="11" class="alert_stxt" align="center">No Records found</td>
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
                <tr>
                  <td align="right" class="formtext2">&nbsp;</td>
                  <td align="left"  class="backlink"><a href="user.php?status=active">Back</a></td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
            </table></td>
        </tr>
        <tr>
          <td class="lbox_botl">&nbsp;</td>
          <td class="lbox_botbg">&nbsp;</td>
          <td class="lbox_botr">&nbsp;</td>
        </tr>
      </table>
      </form>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
  </table>
</div>
<!--Content Portion End-->