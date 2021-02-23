<?php   
// date_default_timezone_set("Europe/London");
date_default_timezone_set('Etc/GMT');
error_reporting(0); 

require "connect.php";

   //$conn=mysql_connect($dbhost,$dbuser,$dbpass);

$qry=mysql_query("select * from admin_settings where set_id=1");
$result=mysql_fetch_array($qry);
$strsite=$result['set_value'];

function diplay_plans($plan_id)
{
	$plan_select_query="select * from plan ORDER BY `plan`.`plan_id` ASC";
	$plan_select_result=mysql_query($plan_select_query);
	$length=1;
	$i =0;

	while($plan_select_row=mysql_fetch_array($plan_select_result)) 
	{
		$i++;$k = $i % 2;
		
		if($k == 0)
		{
			$class = 'row2';
		}
		else
		{
			$class = 'row1';
		}
		
		$planid=$plan_select_row['plan_id'];		
		$planname=$plan_select_row['plan_type'];		
		$scheme=$plan_select_row['scheme'];		
		$spend_min_amount=$plan_select_row['spend_min_amount'];		
		$spend_max_amount=$plan_select_row['spend_max_amount'];		
		$period=$plan_select_row['period'];		
		$period_type=$plan_select_row['period_type'];
		
		if($period_type==1) 
		{ 			
			$periodtype='Days';			
			$val = "daily";		
		}
		
		else if($period_type==2) { $periodtype='Weeks'; $val = "weekly"; }		
		else if($period_type==3) { $periodtype='Months'; $val = "monthly"; }		
		else if($period_type==4) { $periodtype='Years'; $val = "yearly"; }		
		//$intrest=rtrim($plan_select_row['interest'],'.00');
		
		$intrest=$plan_select_row['interest'];		
		$max_interest=$plan_select_row['max_interest'];
		
		?>		
		<tr class="<?php echo $class; ?>" >		
		  <td align="center"><?php echo $planname;?></td>
		  <td style="padding-left:20px;text-align:center;text-decoration:none;">&#x0e3f;<?php echo $spend_min_amount ; ?></td>	
		  <td style="padding-left:20px;text-align:center;text-decoration:none;">&#x0e3f;<?php echo $spend_max_amount; ?></td>	
		  <td align="center"><?php echo $max_interest;?>%</td>		
		  <td class="bdrnone" align="center" ><?php echo $period.' '.$periodtype; ?></td>		
		</tr>		
		<?php
			$length+=1;		
	     }
	}

	$canSave=$_POST['canSave'];






	if($canSave==1) 
	{
		$plan_id=$_POST['rdPlans'];
		$payid=$_POST['cboPayment'];
		$amount=$_POST['txtAmount'];
		$_SESSION['plan_id'] = $plan_id;		
		$_SESSION['payid'] = $payid;		
		$_SESSION['amount'] = $amount;
		$_SESSION['compound_rate'] = $_POST['compound'];

		/*if($amount=="")
		header("location:?err=2");
		elseif(!numericcheck($amount))
		header("location:?err=1");*/

		if($payid=="") 
		{
			$payment_flag=1;
			$_SESSION['errror_payment']="<span class='formerror'>Please Select the Payment Gateway</span>";
		}
		if($amount=="") 
		{
			$amount_flag=1;
			$_SESSION['errror_amt']="<span class='formerror'>Please enter the Amount to make the deposit</span>";
		}
		if($amount != '')
		{
			if(!is_numeric($amount)) 
			{
				$amount_flag=1;
				$_SESSION['errror_amt']="<span class='formerror'>Please enter the Amount in Numberic Value</span>";
			}
			else
			{
				$plan_select_qry=mysql_fetch_assoc(mysql_query("select * from plan where plan_id='".$plan_id."'"));

			 

				if($amount < $plan_select_qry['spend_min_amount'] || $amount > $plan_select_qry['spend_max_amount'])
				{
						$amount_flag=1;
				$_SESSION['errror_amt']="<span class='formerror'>You can't deposit less than ".$plan_select_qry['spend_min_amount']." &#x0E3F;</span>";
				}				
				if($amount > $plan_select_qry['spend_max_amount'])
				{
						$amount_flag=1;
				$_SESSION['errror_amt']="<span class='formerror'>You can't deposit more than ".$plan_select_qry['spend_max_amount']." &#x0E3F;</span>";
				}		

			}
		}
	

	       $select=mysql_fetch_array(mysql_query("select * from site_statistics where stat_id='14'"));
	       $status=$select['status'];
	       if($status == 'on')
	       {
		  if($_POST['compound']=="") 
		  {
		    $compound_rate_flag=1;
		    $_SESSION['errror_compound']="<span class='formerror'>Please Select the Compound Rate</span>";
		  }
		}

		$site_sql="select * from admin_settings where set_id=1";
		$site_res=mysql_query($site_sql);
		$site_row=mysql_fetch_array($site_res);
		$yoursite=$site_row['set_value'];
	

	        $siteurl=mysql_fetch_assoc(mysql_query("SELECT set_value FROM  admin_settings WHERE set_id='37'"));
		$yoursite=$siteurl['set_value'];
		$egold_sql="select * from admin_settings where set_id=4";
		$egold_res=mysql_query($egold_sql);
		$egold_row=mysql_fetch_array($egold_res);
		$egoldno=$egold_row['set_value'];

		
		$egold_sql="select * from admin_settings where set_id=5";
		$egold_res=mysql_query($egold_sql);
		$egold_row=mysql_fetch_array($egold_res);
		$egoldname=$egold_row['set_value'];

		$intgold_sql="select * from admin_settings where set_id=10";
		$intgold_res=mysql_query($intgold_sql);
		$intgold_row=mysql_fetch_array($intgold_res);
		$intgoldno=$intgold_row['set_value'];

		$paypal_sql="select * from admin_settings where set_id=11";
		$paypal_res=mysql_query($paypal_sql);
		$paypal_row=mysql_fetch_array($paypal_res);
		$paypalno=$paypal_row['set_value'];


		$strom_sql="select * from admin_settings where set_id=12";
		$strom_res=mysql_query($strom_sql);
		$strom_row=mysql_fetch_array($strom_res);
		$stormpayno=$strom_row['set_value'];


		$ebull_sql="select * from admin_settings where set_id=13";
		$ebull_res=mysql_query($ebull_sql);
		$ebull_row=mysql_fetch_array($ebull_res);
		$ebull_no=$ebull_row['set_value'];
	

		$ebull_sql="select * from admin_settings where set_id=18";
		$ebull_res=mysql_query($ebull_sql);
		$ebull_row=mysql_fetch_array($ebull_res);
		$ebull_name=$ebull_row['set_value'];

		$moneybooker_sql="select * from admin_settings where set_id=14";
		$moneybooker_res=mysql_query($moneybooker_sql);
		$moneybooker_row=mysql_fetch_array($moneybooker_res);
		$moneybooker=$moneybooker_row['set_value'];



		$alert_sql="select * from admin_settings where set_id=27";
		$alert_res=mysql_query($alert_sql);
		$alert_row=mysql_fetch_array($alert_row);
		$alert=$alert_row['set_value'];
		

		$safe_sql="select * from admin_settings where set_id=29";
		$safe_res=mysql_query($safe_sql);
		$safe_row=mysql_fetch_array($safe_res);
		$safe=$safe_row['set_value'];

		//echo "select * from payment_process where payment_id=8"; exit;

		$lib_sql="select * from payment_process where payment_id=8";
		$lib_res=mysql_query($lib_sql);
		$lib_row=mysql_fetch_array($lib_res);
		$lib=$lib_row['account_id'];

		$lr_storename=mysql_fetch_array(mysql_query("select * from payment_process where payment_id='24'"));
		$lr_storename=$lr_storename['account_id'];
		

		$ego_sql="select * from payment_process where payment_id=30";
		$ego_res=mysql_query($ego_sql);
		$ego_row=mysql_fetch_array($ego_res);
		$ego_id=$ego_row['account_id'];

		$perfect_sql="select * from admin_settings where set_id=30";
		$perfect_res=mysql_query($perfect_sql);
		$pefect_row=mysql_fetch_array($perfect_res);
		$perfectno=$pefect_row['set_value'];

		$min_spend_amount=$plan_check_row['spend_min_amount'];
		$max_spend_amount=$plan_check_row['spend_max_amount'];
		if($pay_flag!=1 && $amount_flag!=1 && $payment_flag !=1 && $compound_rate_flag !=1)
		{
		$select_members_deposit = mysql_fetch_array(mysql_query("select sum(compound_amount) as amt from deposit 
			where member_id='".$_SESSION['userid']."' and 	status='active'"));

		$select_members_deposit_amt = $select_members_deposit['amt'];
		$total_plan_amount = $select_members_deposit_amt + $amount;
		$_SESSION['total_amount'] = $total_plan_amount;

	if(!isset($_SESSION['plan_id']))
	{
		$select_plan = mysql_query("select * from plan");
		while($fetch_plan = mysql_fetch_array($select_plan))
		{
			if($fetch_plan['spend_min_amount'] <=$total_plan_amount && $fetch_plan['spend_max_amount'] >=$total_plan_amount)
			{
				$interest = $fetch_plan['interest'];
				$plan_id = $fetch_plan['plan_id'];
				break;
			}	
		}
	}
		
	if($payid == '12')
	{

	        $total_earning_query="select sum(amount) as tot_earnings from history where user_id='".$userid."' and 
                       (type='intrest_earned' or type='bonus' or type='commissions' or type='release_deposit' or type='internal_transaction_receive')";

			$total_earning_result=mysql_query($total_earning_query);
			$total_earning_row=mysql_fetch_array($total_earning_result);
			$total_earnings=$total_earning_row['tot_earnings'];
			if(intval($total_earnings) == 0)
				 $total_earnings=0;	 
	 

			$tesql="select sum(amount) as total_with from history where user_id='".$userid."' and (type='withdrawal' or type='withdraw_pending' 
				or type='penality' or type='internal_transaction_spend') order by type";
			$teres=mysql_query($tesql);
			if(mysql_num_rows($teres)>0)
			{
					$terow=mysql_fetch_array($teres);
					$total_withdraw=$terow['total_with'];
			}
			else
					$total_withdraw=0;


                      $total_earning_query="select sum(amount) as tot_earnings from history where user_id=$userid and (type='intrest_earned' 
			or type='bonus' or type='commissions' or type='release_deposit' or type='internal_transaction_receive')";
			
			/*echo $total_withdraw;echo '<br />';
			echo $total_earnings;echo '<br />';*/
                      
			  $total_earning_result=mysql_query($total_earning_query);
			$total_earning_row=mysql_fetch_array($total_earning_result);
			$total_earnings=$total_earning_row['tot_earnings'];					  

			if(!$total_earnings) $total_earnings=0;
			$tesql="select sum(amount) as total_with from history where user_id=".$userid." and (type='withdrawal' or type='withdraw_pending' 
			or type='penality' or type='internal_transaction_spend') order by type";

			$teres=mysql_query($tesql);
			if(mysql_num_rows($teres)>0)
			{
				$terow=mysql_fetch_array($teres);
				$total_withdraw=$terow['total_with'];
			}
			else
				$total_withdraw=0;
				
				$tesql1="select sum(amount) as witth from history where user_id=".$userid." and type='reinvest' order by type";
				$teres1=mysql_query($tesql1);
				$terow1=mysql_fetch_array($teres1);
				$witttth=$terow1['witth']; 
			
				$available = $total_earnings - $total_withdraw - $witttth;
					
				if(!$available) $available=0;

			if($amount > $available)
			{
				$_SESSION['errror_amt']="<span class='formerror'>Insufficient Amount in your Account Balance</span>";
				echo '<meta http-equiv="refresh" content="0;url=deposit.php">';
				exit();
			}

		}

	  $_SESSION['planid']=$plan_id;

	 $plan_sql="select * from plan where plan_id=$plan_id";
	 $plan_exe=mysql_query($plan_sql);
	 $plan_ret=mysql_fetch_array($plan_exe);
	 $pack_id=$plan_ret['package_id'];

	 $pack_sql="select * from plan_master where id=$pack_id";
	 $pack_exe=mysql_query($pack_sql);
	 $pack_ret=mysql_fetch_array($pack_exe);
	 $dep_package_id=$pack_ret['withdrawal_deposit_package'];

	if($dep_package_id==0)
		$dep_status=1;
	else
	{
		$dpsql="select * from plan where package_id=".$dep_package_id;
		$dpres=mysql_query($dpsql);
		$pcnt=0;
		while($dprow=mysql_fetch_array($dpres))
		{
		$pplan[$pcnt]=$dprow['plan_id'];
		$pcnt++;
		}
		$dep_status=0;
		for($i=0;$i<$pcnt;$i++)
		{
			$testsql="select * from deposit where member_id=".$_SESSION['userid']." and plan_id=".$pplan[$i];
			$testres=mysql_query($testsql);
			if(mysql_num_rows($testres)>0)
			{
			$dep_status=1;
			break;
			}
		}

	    }



			if($dep_status!=0)
			{
				$_SESSION['payid']=$payid;
				$member_det_query="select * from members where member_id=$userid";		
				$member_det_result=mysql_query($member_det_query);
				$member_det_row=mysql_fetch_array($member_det_result);
				$lr = $member_det_row['lr_num']; if($lr == '') $lr = "Not Set";
				$pm = $member_det_row['payza_num']; if($pm == '') $pm = "Not Set";				
				$ego = $member_det_row['ego_num']; if($ego == '') $ego = "Not Set";				
				$pm_num = $member_det_row['pm_num']; if($pm_num == '') $pm_num = "Not Set";
				$gdp_num = $member_det_row['gdb_num']; if($gdp_num == '') $gdp_num = "Not Set";				
				$st_pay = $member_det_row['st_pay']; if($st_pay == '') $st_pay = "Not Set";
				$paypal_num = $member_det_row['paypal']; if($paypal_num == '') $paypal_num = "Not Set";
				$bitcoin_num = $member_det_row['bitcoin']; if($bitcoin_num == '') $bitcoin_num = "Not Set";
				$payeer_num = $member_det_row['payeer']; if($payeer_num == '') $payeer_num = "Not Set";
				$neteller_num = $member_det_row['neteller']; if($neteller_num == '') $neteller_num = "Not Set";
				$skrill_num = $member_det_row['skrill']; if($skrill_num == '') $skrill_num = "Not Set";
				$adcash_num = $member_det_row['advcash']; if($adcash_num == '') $adcash_num = "Not Set";

		if($payid==8)
		{

			/* 
			---------Payment Option Selected is alertpay	--------------------
			------------	alertpay Payment Processings Starts Here---------------	
			*/

		?>


  <div id="contents">
			 <h2>Payment Process</h2>
			 <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center" style="padding:10px">

              <tr class="row1" >
                <td width="55%" style="height:35px">Your Liberty Reserve Account  : </td>
                <td width="45%" class="orange"><?=$lr; ?></td>
              </tr>
              <tr class="row2">
                <td style="height:35px">Amount </td>
                <td class="orange">&#x0E3F;<?= number_format($amount,8); ?></td>
              </tr> 
             <?php
                 $fetch48=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 76"));
                 $fetch49=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 77")); 
                 //echo '<pre>';print_r($fetch48);exit;
             ?>
            <?php
		  $select=mysql_query("select * from site_statistics where stat_id='14'");
		  $status=$select['status'];
		  if($status=='on')
		  {
		  ?>
          
		<tr class="row2">
              	<td style="height:35px">Select your new Compound Rate:<span class="mandatory">*</span></td>             
              <td class="orange">
                  <select name="compound" id="compound">                  
                   <option value="select">Select compound</option>                  
                   <?php 
		                $i=$fetch48['set_value'];
				while($i<=$fetch49['set_value'])
				{
				echo '<option value="'.$i.'">'.$i.'%</option>';
				$i+=5;
				}


				  ?>
                 
                </select>
				<br />
				<? if($_SESSION['errror_compound'])	{ echo $_SESSION['errror_compound'];  $_SESSION['errror_compound']=''; } ?>
              </td>
            </tr>
         <?
		}
      
        else
		{
		
		}
		?>


              <tr class="row1" >



                <td style="height:35px" colspan="2" align="center"><img src="images/liberty_reser.jpg" /><br />



                  <br></td>



              </tr>



              <tr class="row2" >



                <td style="height:35px" colspan="2" align="center">
                
                  
    <?php  $lr_merchant_ref=$_SESSION['userid'].','.$amount.','.$_SESSION['planid'].','.$_SESSION['compound_rate'].','.$payid;		  ?>
      <form action="https://sci.libertyreserve.com/" method="POST">
	<input type="hidden" name="lr_acc" value="<?=$lib;?>" />
    <input type="hidden" name="lr_store" value="<?=$lr_storename;?>" />
	<input type="hidden" name="lr_amnt" value="<?=$amount;?>" />
	<input type="hidden" name="lr_currency" value="LRUSD" />
	<input type="hidden" name="lr_merchant_ref" value="<?=$lr_merchant_ref;?>" />
    <input type="hidden" name="lr_comments" value="Deposit from <?=$_SESSION['username']; ?>" />
    <input type="hidden" name="order_id" value="HYIP" />
     <input type="hidden" name="item_name" value="HYIP" /> 
    <input type="submit" name="button" id="button" value="Deposit" class="btn" />
      <input type="button" name="button" id="button" onclick="window.location='deposit.php'" value="Cancel" class="btn" />
    </form>
   </td>



              </tr>



            </table>

</div>
          
				
 
     
      


<?	

	}	

			/*if($payid==7)
				{
						/* ---------Payment Option Selected is alertpay	--------------------
								------------	alertpay Payment Processings Starts Here---------------
								*/
					/*	?>
  <div id="contents">
	 <h1>Payment Process</h1>      
            <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center" style="padding:10px">
              <tr class="row1" >
                <td width="55%" style="height:35px">Your Payza Account  : </td>
                <td width="45%" class="orange"><?=$pm; ?></td>
              </tr>
              <tr class="row2">
                <td style="height:35px">Amount (&#x0E3F;)</td>
                <td class="orange">&#x0E3F; <?=number_format($amount,5); ?></td>
              </tr>
	<?php
		  $select=mysql_query("select * from site_statistics where stat_id='14'");
		  $status=$select['status'];
		  if($status=='on')
		  {
		  ?>
	  <tr class="row2">
              <td style="height:35px">Select your new Compound Rate:<span class="mandatory">*</span></td>             
              <td class="orange">
                  <select name="compound" id="compound">
                  <option value="select">Select compound</option>
                  <option value="0" <? if($compounding_interest == 0) echo ' selected="selected"'; ?> >0 %</option>
                  <option value="5" <? if($compounding_interest == 5) echo ' selected="selected"'; ?> >5 %</option>
                  <option value="10" <? if($compounding_interest == 10) echo ' selected="selected"'; ?> >10 %</option>
                  <option value="15" <? if($compounding_interest == 15) echo ' selected="selected"'; ?> >15 %</option>
                  <option value="20" <? if($compounding_interest == 20) echo ' selected="selected"'; ?> >20 %</option>
                  <option value="25" <? if($compounding_interest == 25) echo ' selected="selected"'; ?> >25 %</option>
                  <option value="30" <? if($compounding_interest == 30) echo ' selected="selected"'; ?> >30 %</option>
                  <option value="35" <? if($compounding_interest == 35) echo ' selected="selected"'; ?> >35 %</option>
                  <option value="40" <? if($compounding_interest == 40) echo ' selected="selected"'; ?> >40 %</option>
                  <option value="45" <? if($compounding_interest == 45) echo ' selected="selected"'; ?> >45 %</option>
                  <option value="50" <? if($compounding_interest == 50) echo ' selected="selected"'; ?> >50 %</option>
                  <option value="55" <? if($compounding_interest == 55) echo ' selected="selected"'; ?> >55 %</option>
                  <option value="60" <? if($compounding_interest == 60) echo ' selected="selected"'; ?> >60 %</option>
                  <option value="65" <? if($compounding_interest == 65) echo ' selected="selected"'; ?> >65 %</option>
                  <option value="70" <? if($compounding_interest == 70) echo ' selected="selected"'; ?> >70 %</option>
                  <option value="75" <? if($compounding_interest == 75) echo ' selected="selected"'; ?> >75 %</option>
                  <option value="80" <? if($compounding_interest == 80) echo ' selected="selected"'; ?> >80 %</option>
                  <option value="85" <? if($compounding_interest == 85) echo ' selected="selected"'; ?> >85 %</option>
                  <option value="90" <? if($compounding_interest == 90) echo ' selected="selected"'; ?> >90 %</option>
                  <option value="95" <? if($compounding_interest == 95) echo ' selected="selected"'; ?> >95 %</option>
                  <option value="100" <? if($compounding_interest == 100) echo ' selected="selected"'; ?> >100 %</option>
                </select>
				<br />
				<? if($_SESSION['errror_compound'])	{ echo $_SESSION['errror_compound'];  $_SESSION['errror_compound']=''; } ?>
              </td>
            </tr>
         <?
		}
        else		{
		}
		?>
              <tr class="row1" >
                <td style="height:35px" colspan="2" align="center"><img src="./images/alertpay.gif.png" /><br />
                  <br></td>
              </tr>
              <tr class="row2" >
                <td style="height:35px" colspan="2" align="center">
		<?php
			$select_alertpay = mysql_fetch_array(mysql_query("select * from payment_process where payment_id=7"));
			$alert_id = $select_alertpay['account_id'];
		  ?>

                  <form action='https://secure.payza.com/checkout' method='post'>
                    <input type='hidden' name='ap_purchasetype' value='Item'>
                    <input type='hidden' name='ap_merchant' value='<?=$alert_id;?>'>
                    <input type='hidden'  name='ap_itemname' value='Deposit from <?=$_SESSION['username']; ?>'>
                    <input type='hidden'  name='ap_currency' value='USD'>
                    <input type='hidden'  name='ap_returnurl' value='<?=$yoursite?>/success.php'>
                    <input type='hidden' src='https://www.payza.com/images/payza-buy-now.png'>
                    <input type='hidden'  name='ap_quantity' value='1'>
                    <input type='hidden' name='ap_description' value=''>
                    <input type='hidden'  name='ap_amount' value='<?=$amount?>'>
                    <input type='hidden'  name='apc_1' value='<?=$_SESSION['userid']?>'>
                    <input type='hidden'  name='apc_2' value='<?=$amount;?>'>
                    <input type='hidden'  name='apc_3' value='<?=$_SESSION['planid'];?>'>
                     <input type='hidden'  name='apc_4' value='<?=$_SESSION['compound_rate'];?>'>
                      <input type='hidden'  name='apc_5' value='<?=$payid;?>'>                               
                   <input type='hidden'  name='ap_cancelurl' value='<?=$yoursite?>/failure.php'>
                   <input type="submit" name="button" id="button" value="Deposit" class="btn" />
                    &nbsp;&nbsp;&nbsp; <input type="button" name="button" id="button" onclick="window.location='deposit.php'" value="Cancel" class="btn" />
                 </form></td>
              </tr>
            </table>
           </div>
		<div class="corner_bc"><div class="corner_bl"><div class="corner_br"></div></div></div>
	</div>
</div>
<?
	}*/
		
		if($payid==30)
		{
			/* ---------Payment Option Selected is Egopay	--------------------
				------------	EGOPOAy Payment Processings Starts Here---------------			*/
?>
	<div id="contents">
	 <h2>Payment Process</h2>
	 <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center" style="padding:10px">
              <tr class="row1" >
                <td width="55%" style="height:35px">Your Egopay Email Address : </td>
                <td width="45%" class="orange"><?=$ego; ?></td>
              </tr>
              <tr class="row2">
                <td style="height:35px">Amount (&#x0E3F;)</td>
                <td class="orange">&#x0E3F;
                  <?=number_format($amount,8); ?></td>
              </tr>
		<?php			
		  $select=mysql_query("select * from site_statistics where stat_id='14'");
		  $status=$select['status'];
		  if($status=='on')
		  {
		  ?>
          
		<tr class="row2">
              <td style="height:35px">Select your new Compound Rate:<span class="mandatory">*</span></td>             
              <td class="orange">

                  <select name="compound" id="compound">
                  <option value="select">Select compound</option>
                  <option value="0" <? if($compounding_interest == 0) echo ' selected="selected"'; ?> >0 %</option>
                  <option value="5" <? if($compounding_interest == 5) echo ' selected="selected"'; ?> >5 %</option>
                  <option value="10" <? if($compounding_interest == 10) echo ' selected="selected"'; ?> >10 %</option>
                  <option value="15" <? if($compounding_interest == 15) echo ' selected="selected"'; ?> >15 %</option>
                  <option value="20" <? if($compounding_interest == 20) echo ' selected="selected"'; ?> >20 %</option>
                  <option value="25" <? if($compounding_interest == 25) echo ' selected="selected"'; ?> >25 %</option>
                  <option value="30" <? if($compounding_interest == 30) echo ' selected="selected"'; ?> >30 %</option>
                  <option value="35" <? if($compounding_interest == 35) echo ' selected="selected"'; ?> >35 %</option>
                  <option value="40" <? if($compounding_interest == 40) echo ' selected="selected"'; ?> >40 %</option>
                  <option value="45" <? if($compounding_interest == 45) echo ' selected="selected"'; ?> >45 %</option>
                  <option value="50" <? if($compounding_interest == 50) echo ' selected="selected"'; ?> >50 %</option>
                  <option value="55" <? if($compounding_interest == 55) echo ' selected="selected"'; ?> >55 %</option>
                  <option value="60" <? if($compounding_interest == 60) echo ' selected="selected"'; ?> >60 %</option>
                  <option value="65" <? if($compounding_interest == 65) echo ' selected="selected"'; ?> >65 %</option>
                  <option value="70" <? if($compounding_interest == 70) echo ' selected="selected"'; ?> >70 %</option>
                  <option value="75" <? if($compounding_interest == 75) echo ' selected="selected"'; ?> >75 %</option>
                  <option value="80" <? if($compounding_interest == 80) echo ' selected="selected"'; ?> >80 %</option>
                  <option value="85" <? if($compounding_interest == 85) echo ' selected="selected"'; ?> >85 %</option>
                  <option value="90" <? if($compounding_interest == 90) echo ' selected="selected"'; ?> >90 %</option>
                  <option value="95" <? if($compounding_interest == 95) echo ' selected="selected"'; ?> >95 %</option>
                  <option value="100" <? if($compounding_interest == 100) echo ' selected="selected"'; ?> >100 %</option>
                </select>
				<br />
				<? if($_SESSION['errror_compound'])	{ echo $_SESSION['errror_compound'];  $_SESSION['errror_compound']=''; } ?>
              </td>
            </tr>
         <?php	}else{		
		}
		?>

              <tr class="row1" >
                <td style="height:35px" colspan="2" align="center">  <img src="https://www.egopay.com/images/ego_88x31_ob.jpg" /><br />
              <br></td>
              </tr>
              <tr class="row2" >
                <td style="height:35px" colspan="2" align="center">       
                     <?php
	 	require('include/EgoPaySci.php');	
		$fetch_ego2=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 32"));
		$fetch_ego3=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 31"));
        		
		$desp='DEPOSIT,'.$_SESSION['userid'].','.number_format($amount,2).','.$_SESSION['planid'].','.$_SESSION['compound'];
		$pbase = new EgoPaySci(array(
			'store_id'          => $fetch_ego2['account_id'],
			'store_password'    => $fetch_ego3['account_id']
		));		
		
		$sConfirmationUrl = $pbase->getConfirmationUrl(array(
			'amount'    => number_format($amount,2),
			'currency'  => 'USD',
			'description' => $desp
		));    
		
?>

<form action="<?php echo $sConfirmationUrl; ?>" method="post" target="_blank">
	  <input type="submit" name="button" id="button" value="Deposit" class="btn" />
      <input type="button" name="button" id="button" onclick="window.location='deposit.php'" value="Cancel" class="btn" />
</form>

   </td>
        </tr>
           </table>
</div>
<?	
	}	
				
				if($payid==11)
				{
						/* ---------Payment Option Selected is Perfect Money	--------------------
							------------	Perfect Money Payment Processings Starts Here---------------
							*/
		?>
  <div id="contents">
	 <h2>Payment Process</h2>
	 <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center" style="padding:10px">
              <tr class="row1" >
                <td width="55%" style="height:35px">Your Perfect Money Account  : </td>
                <td width="45%" class="orange"><?=$pm_num; ?></td>
              </tr>
              <tr class="row2">
                <td style="height:35px">Amount (&#x0E3F;)</td>
                <td class="orange">&#x0E3F;
                  <?=number_format($amount,5); ?></td>
              </tr>              
              <?php
		  $select=mysql_query("select * from site_statistics where stat_id='14'");
		  $status=$select['status'];
		  if($status=='on')
		  {
		  ?>
	    <tr class="row2">
              <td style="height:35px">Select your new Compound Rate:<span class="mandatory">*</span></td>             
              <td class="orange">
                  <select name="compound" id="compound">
                  <option value="select">Select compound</option>
                  <option value="0" <? if($compounding_interest == 0) echo ' selected="selected"'; ?> >0 %</option>
                  <option value="5" <? if($compounding_interest == 5) echo ' selected="selected"'; ?> >5 %</option>
                  <option value="10" <? if($compounding_interest == 10) echo ' selected="selected"'; ?> >10 %</option>
                  <option value="15" <? if($compounding_interest == 15) echo ' selected="selected"'; ?> >15 %</option>
                  <option value="20" <? if($compounding_interest == 20) echo ' selected="selected"'; ?> >20 %</option>
                  <option value="25" <? if($compounding_interest == 25) echo ' selected="selected"'; ?> >25 %</option>
                  <option value="30" <? if($compounding_interest == 30) echo ' selected="selected"'; ?> >30 %</option>
                  <option value="35" <? if($compounding_interest == 35) echo ' selected="selected"'; ?> >35 %</option>
                  <option value="40" <? if($compounding_interest == 40) echo ' selected="selected"'; ?> >40 %</option>
                  <option value="45" <? if($compounding_interest == 45) echo ' selected="selected"'; ?> >45 %</option>
                  <option value="50" <? if($compounding_interest == 50) echo ' selected="selected"'; ?> >50 %</option>
                  <option value="55" <? if($compounding_interest == 55) echo ' selected="selected"'; ?> >55 %</option>
                  <option value="60" <? if($compounding_interest == 60) echo ' selected="selected"'; ?> >60 %</option>
                  <option value="65" <? if($compounding_interest == 65) echo ' selected="selected"'; ?> >65 %</option>
                  <option value="70" <? if($compounding_interest == 70) echo ' selected="selected"'; ?> >70 %</option>
                  <option value="75" <? if($compounding_interest == 75) echo ' selected="selected"'; ?> >75 %</option>
                  <option value="80" <? if($compounding_interest == 80) echo ' selected="selected"'; ?> >80 %</option>
                  <option value="85" <? if($compounding_interest == 85) echo ' selected="selected"'; ?> >85 %</option>
                  <option value="90" <? if($compounding_interest == 90) echo ' selected="selected"'; ?> >90 %</option>
                  <option value="95" <? if($compounding_interest == 95) echo ' selected="selected"'; ?> >95 %</option>
                  <option value="100" <? if($compounding_interest == 100) echo ' selected="selected"'; ?> >100 %</option>
                </select>
				<br />
				<? if($_SESSION['errror_compound'])	{ echo $_SESSION['errror_compound'];  $_SESSION['errror_compound']=''; } ?>
              </td>
            </tr>
         <?
		}
      
        else
		{
		
		}
		?>



              <tr class="row1" >
                <td style="height:35px" colspan="2" align="center"><img src="images/payment04.gif" /><br />
                  <br></td>
             </tr>
              <tr class="row2" >            
                <td style="height:35px" colspan="2" align="center"><?
			$select_alertpay = mysql_fetch_array(mysql_query("select * from payment_process where payment_id=11"));
			$pm_id = $select_alertpay['account_id'];
		   ?>
		  <form action="https://perfectmoney.is/api/step1.asp" method="POST">
                    <input type="hidden" name="PAYEE_ACCOUNT" value="<?=$pm_id; ?>" >
                    <input type="hidden" name="PAYEE_NAME" value="<?=$pm_id; ?>">
                    <input type="hidden" name="PAYMENT_AMOUNT" value="<?=$amount; ?>">
                    <input type="hidden" name="PAYMENT_UNITS" value="USD">
                    <input type="hidden" name="STATUS_URL" value='<?=$yoursite?>/success.php'>
                    <input type="hidden" name="PAYMENT_URL" value='<?=$yoursite?>/success.php'>
                    <input type="hidden" name="NOPAYMENT_URL" value='<?=$yoursite?>/failure.php'>
                    <input type="hidden" name="BAGGAGE_FIELDS" value="Deposit from <?=$_SESSION['username']; ?>">
                    <input type="hidden" name="MEMO" value="Deposit from <?=$_SESSION['username']; ?>">
                    <input type="hidden" name="ORDER_NUM" value="<?=$_SESSION['userid']; ?>">
                    <input type="hidden" name="CUST_NUM" value="<?=$_SESSION['payid']; ?>">
                   
                    <input type="hidden" name="PAYMENT_ID"  class="apc_1"  value="<?php echo $_SESSION['userid'].','.$_SESSION['planid'].','.$_SESSION['payid']; ?>">
                    <input type="submit" name="button" id="button" value="Deposit" class="button" />
		<input type="button" name="button" id="button" onclick="window.location='deposit.php'" value="Cancel" class="button" />

                        </p>
                  </form></td>
              </tr>
            </table>
</div>
         <!-- <div class="corner_bc"><div class="corner_bl"><div class="corner_br"></div></div></div>-->
	</div>
</div>
<?php
	}
		if($payid==3)
		{
					/* ---------Payment Option Selected is Paypal	--------------------
							------------	Paypal Payment Processings Starts Here---------------
								*/
			?>

			  <div id="contents">
			 <h2>Payment Process</h2>
			 <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center" style="padding:10px">
	              <tr class="row1" >
                <td width="55%" style="height:35px">Your Paypal Account  : </td>
                <td width="45%" class="orange"><?=$paypal_num; ?></td>
              </tr>
              <tr class="row2">
                <td style="height:35px">Amount (&#x0E3F;)</td>
                <td class="orange">&#x0E3F;
                  <?=number_format($amount,5); ?></td>
              </tr>              
              <?php
		  $select=mysql_query("select * from site_statistics where stat_id='14'");
		  $status=$select['status'];
		  if($status=='on')
		  {
		  ?>
		<tr class="row2">
              <td style="height:35px">Select your new Compound Rate:<span class="mandatory">*</span></td>             
              <td class="orange">
                  <select name="compound" id="compound">
                  <option value="select">Select compound</option>
                  <option value="0" <? if($compounding_interest == 0) echo ' selected="selected"'; ?> >0 %</option>
                  <option value="5" <? if($compounding_interest == 5) echo ' selected="selected"'; ?> >5 %</option>
                  <option value="10" <? if($compounding_interest == 10) echo ' selected="selected"'; ?> >10 %</option>
                  <option value="15" <? if($compounding_interest == 15) echo ' selected="selected"'; ?> >15 %</option>
                  <option value="20" <? if($compounding_interest == 20) echo ' selected="selected"'; ?> >20 %</option>
                  <option value="25" <? if($compounding_interest == 25) echo ' selected="selected"'; ?> >25 %</option>
                  <option value="30" <? if($compounding_interest == 30) echo ' selected="selected"'; ?> >30 %</option>
                  <option value="35" <? if($compounding_interest == 35) echo ' selected="selected"'; ?> >35 %</option>
                  <option value="40" <? if($compounding_interest == 40) echo ' selected="selected"'; ?> >40 %</option>
                  <option value="45" <? if($compounding_interest == 45) echo ' selected="selected"'; ?> >45 %</option>
                  <option value="50" <? if($compounding_interest == 50) echo ' selected="selected"'; ?> >50 %</option>
                  <option value="55" <? if($compounding_interest == 55) echo ' selected="selected"'; ?> >55 %</option>
                  <option value="60" <? if($compounding_interest == 60) echo ' selected="selected"'; ?> >60 %</option>
                  <option value="65" <? if($compounding_interest == 65) echo ' selected="selected"'; ?> >65 %</option>
                  <option value="70" <? if($compounding_interest == 70) echo ' selected="selected"'; ?> >70 %</option>
                  <option value="75" <? if($compounding_interest == 75) echo ' selected="selected"'; ?> >75 %</option>
                  <option value="80" <? if($compounding_interest == 80) echo ' selected="selected"'; ?> >80 %</option>
                  <option value="85" <? if($compounding_interest == 85) echo ' selected="selected"'; ?> >85 %</option>
                  <option value="90" <? if($compounding_interest == 90) echo ' selected="selected"'; ?> >90 %</option>
                  <option value="95" <? if($compounding_interest == 95) echo ' selected="selected"'; ?> >95 %</option>
                  <option value="100" <? if($compounding_interest == 100) echo ' selected="selected"'; ?> >100 %</option>
                </select>
				<br />
				<? if($_SESSION['errror_compound'])	{ echo $_SESSION['errror_compound'];  $_SESSION['errror_compound']=''; } ?>
              </td>
            </tr>
         <?php		}else{		
		}
		?>
              <tr class="row1" >
                <td style="height:35px" colspan="2" align="center"><img src="images/paypal.png" /><br />
                <br></td>
              </tr>
              <tr class="row2" >
                <td style="height:35px" colspan="2" align="center"><?
			$select_paypal = mysql_fetch_array(mysql_query("select * from payment_process where payment_id=3"));
			$pp_id = $select_paypal['account_id'];
		   ?>

		  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_self" id='Paypal' >
                    <input type="hidden" name="cmd" value="_xclick" />
                    <input type="hidden" name="business" value="<?=$pp_id; ?>" />
                    <input type="hidden" name="item_name" value="Product Purchase">
                    <input type="hidden" name="currency_code" value="USD" />
                    <input type="hidden" name="amount" value="<?=$amount; ?>">
                    <input type="hidden" name="cancel_return" value="<?=$yoursite?>/failure.php"/>
                    <input type="hidden" name="return" value="<?=$yoursite?>/success.php"/>
                    <input type="hidden" name="notify_url" value="<?=$yoursite?>/ipn/paypal.php">
                    <input type="hidden" name="custom"  class="custom" value="Deposit from <?=$_SESSION['username']; ?>-id-<?php echo $_SESSION['userid'];?>" id="custom">
                    <input type="hidden" name="charset" value="UTF%252d8"/>
                    <input type="submit" name="button" id="button" value="Deposit" class="button" />
		<input type="button" name="button" id="button" onclick="window.location='deposit.php'" value="Cancel" class="button" />
	</form></td>
              </tr>
            </table>
</div>
         <!-- <div class="corner_bc"><div class="corner_bl"><div class="corner_br"></div></div></div>-->
</div>
</div>  
 <?php
		}
		
		
		
	 
		
		if($payid==38)
		{
					/* ---------Payment Option Selected is Paypal	--------------------
							------------	Paypal Payment Processings Starts Here---------------
							*/
		$select_bitcoin = mysql_fetch_array(mysql_query("select * from payment_process where payment_id=38"));
		$bitcoin_id = $select_bitcoin['account_id'];
		$pri_key  =   $select_bitcoin['batch_id'];	
		
		
		
		$mem = mysql_fetch_array(mysql_query("select * from members where member_id=$userid"));
		$first_name = $mem['first_name'];
		$last_name = $mem['last_name'];
		if($last_name==""){
			    $last_name = $first_name;			
		}
		$fullname = $first_name." ".$last_name;
		$user_email = $mem['member_email'];	
		$sel_planid = $_SESSION['planid'];
		$plan_det = mysql_fetch_array(mysql_query("select * from plan where plan_id=$sel_planid"));
		$item_name = $plan_det['plan_type']; 	  	
		$planID = $plan_det['plan_id'];
        $member_address = $mem['bitcoin'];
	   // include("faucet.php");
       
?>
  
  <div id="wrapper" class="contanierbg">
	<div class="wrap">
		<div class="alls1" style="border:0px solid; width: 100%; vertical-align:top; display:inline-block;">
	
	
	
			<div class="navigation">
			<?php if($_SESSION['userid']!=''){ 
						include("include/login_header.php");
			} ?>
			</div>
   
         <br/><br/>   
         <br/>
        <table width="70%" border="0" cellspacing="0"  cellpadding="0" align="center" >
	      <tr>
	      <td colspan="2"><h2 style="text-align:center;">Payment Process</h2></td>
	      </tr> 
	      <tr>
	      <td style="border-top:1px solid #ccc;border-bottom:1px solid #ccc;background:#edf3f1;">
	      <p style="margin-left:10px;">
	       <span style="font-size:20px;"><?php echo ucfirst($plan_det['plan_type']); ?> Package</span><br/>	      
	        <strong style="font-style:italic;font-size:9px;text-align:left;">Antique Coins Limited</strong>
	      </p>
	      </td>
	       <td   style="text-align:right;border-top:1px solid #ccc;border-bottom:1px solid #ccc;background:#edf3f1;">3846856&nbsp;&nbsp;</td>
	      </tr>
	      
	      
	      
	      <!--
	       <tr>
	      <td colspan="2">&nbsp;</td>
	      </tr> 
	      <tr>
                <td colspan="2" style="text-align:center;"><?php // echo $first_name; ?></td>
              </tr>  
               <tr >
                <td colspan="2" style="text-align:center;"><?php //echo $user_email; ?></td>
              </tr> 
               <tr>
	            <td colspan="2">&nbsp;</td>
	        </tr> 
	        
	        -->
	        
	           <?php
 
  
     function apiCall(	$data =  [])
	{
	    
    	      // Fill these in from your API Keys page 
        $public_key = '0ea2a56f9a86453d2324ef986d1b15afa88fd9c747554307dc32e06a55a36810'; 
        $private_key = '2039e17a134824d9f9cC844E22Ca72d65F2e2b38980591B3B1B10852Fc351A77'; 
         
        
         
        // Generate the query string 
        $post_data = http_build_query($data, '', '&'); 
         
        // Calculate the HMAC signature on the POST data 
        $hmac = hash_hmac('sha512', $post_data, $private_key); 
    
    
 		$api_url = 'https://www.coinpayments.net/api.php';
		$ch = curl_init();

		$post_fields = http_build_query($data, '', '&');
		$hmac = hash_hmac('sha512', $post_fields, '2039e17a134824d9f9cC844E22Ca72d65F2e2b38980591B3B1B10852Fc351A77' );
		// dd($data,$post_fields, $hmac);

		$curl_handle = curl_init($api_url);
		curl_setopt($curl_handle, CURLOPT_FAILONERROR, TRUE);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl_handle, CURLOPT_POST, TRUE);

		curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array('HMAC:' . $hmac));
		curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $post_fields);

		// curl_setopt($ch, CURLOPT_URL, $url);
		// curl_setopt($ch, CURLOPT_POST, 1);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		// 	'Content-Type:' => 'application/x-www-form-urlencoded',
		// 	'HMAC:' => $hmac
		// ));

		// In real life you should use something like:
		// curl_setopt($ch, CURLOPT_POSTFIELDS, 
		//          http_build_query(array('postvar1' => 'value1')));

		// Receive server response ...
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($curl_handle);
		curl_close ($ch);

		if ($response !== FALSE) {
			$result = false;
			// Check the requested format
			if ($data['format'] == 'json') {
				// Prepare json result
				if (PHP_INT_SIZE < 8 && version_compare(PHP_VERSION, '5.4.0') >= 0) {
					// We are on 32-bit PHP, so use the bigint as string option.
					// If you are using any API calls with Satoshis it is highly NOT recommended to use 32-bit PHP
					$decoded = json_decode($response, TRUE, 512, JSON_BIGINT_AS_STRING);
				} else {
					$decoded = json_decode($response, TRUE);
				}
				// Check the json decoding and set an error in the result if it failed
				if ($decoded !== NULL && count($decoded)) {
					$result = $decoded;
				} else {
					$result = ['error' => 'Unable to parse JSON result (' . json_last_error() . ')'];
				}
			} else {
				// Set the result to the response
				$result = $response;
			}
		} else {
			// Throw an error if the response of the cURL session is false
			$result = ['error' => 'cURL error: ' . curl_error($this->curl_handle)];
		}
		return $result;

		// return $server_output;
	}

		  // $userid = 7;
		 //  $amount = 0.01;
		  // $plan_id = 12;
		     //$_REQUEST['item_name']; 
             //   $item_number = 29; 
                
                
                
               /* $txn_id = $_REQUEST['txn_id']; 
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
                */
                
                //item_name is plan_id
                //item_number is member_id
                 
		   ?>   
                    
		   <?php
		     $planStr = "select * from plan where plan_id='".$_SESSION['planid']."'";
		   $planSql = mysql_query($planStr);
		   $planDet = mysql_fetch_assoc($planSql);  
		   
		   
		     $mat_days = $planDet['period'];
		 //print_r($planDet);
		   
		   
		   $amounts = number_format($amount , 8); 
		   
		$data = [
			'version' => 1,
			'key' => '0ea2a56f9a86453d2324ef986d1b15afa88fd9c747554307dc32e06a55a36810' ,
			'cmd' => 'create_transaction',
			'amount' => $amounts,
			'currency1' => 'BTC',
			'currency2' => 'BTC',
			'amountf' => $amounts ,
			'item_name' => $_SESSION['planid'], 
			'item_number' => $userid ,
 			// 'order_no'  => $order_no,
			'buyer_email' => 'admin@atq-coins.com',//$user_email,
			'ipn_url' => 'https://atq-coins.com/ipn/coinpayment.php',
			'format' => 'json'
		];
		$response = apiCall($data);
		
		$dd =  json_encode($response);
        $r = json_decode($dd);
		
		
		
		if($r->error != 'ok'){
		    echo '<meta http-equiv="refresh" content="0;url=deposit.php">';
        	exit();
		}else{
		       $invest_date = date('Y-m-d');
		       $order_no  = $r->result->txn_id;
		       $transaction_id = "DEP".rand(0,9999999);
		       $memberWallet = $r->result->address ;
		       
     	       //  echo 'mat_days:'.$mat_days;
     	          $invest_sql = "INSERT INTO `deposit`(`deposit_id`, `member_id`, `plan_id`,`order_no`,`user_wallet`,`wallet`, `amount`, `compound_amount`, `invest_date`, `maturity_date`, `status`, `intrest_alloted`, `payment_thro`, `intrest_earned`, `intrest_earned_date`, `compound_rate`, `transaction_id`, `cron_date`) 
        		VALUES('0','".$userid."','". $_SESSION['planid'] ."','$order_no','$memberWallet','','".$amounts."','".$amounts."','". $invest_date ."',DATE_ADD(STR_TO_DATE( '".$invest_date."', '%Y-%m-%d') , INTERVAL ".$mat_days." DAY),'new','no','38','0','0000-00-00 00:00:00','0','".$transaction_id."','0000-00-00 00:00:00')";
            	mysql_query($invest_sql);
            	
            //	echo "block-003" ;
            $qr_address = $r->result->address;
		    
		}
		   
		   ?>
		   
	        
	        
            <tr>
                <td style="text-align:left;border-top:1px solid #ccc;border-bottom:1px solid #ccc;background:#edf3f1;">&nbsp;&nbsp;You have to pay</td>
                <td style="text-align:right;border-top:1px solid #ccc;border-bottom:1px solid #ccc;color:#f8b032;font-weight:bold;font-size:18px;background:#edf3f1;"><?php echo number_format($amount,8); ?>&#x0E3F;&nbsp;&nbsp;</td>
            </tr>
            
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
                <td colspan="2" align="center">
                     <?php //$qr_link =  "bitcoin:35aTRWaCmcBVzR8jxPDiyab3pBedupKN3o?amount=".$amount; 
                     $qr_link =  "bitcoin:". $qr_address ."?amount=".$amount;
                     ?>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo $qr_link;?>&amp;size=260x260" alt="<?php echo $qr_link; ?>"/>
                    
                </td>
            </tr>   
            
            
            
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr><td align="center" colspan="2">to:&nbsp;<?php echo '<b>'.$qr_address.'</b>';//$bitcoin_id;?><br/></td></tr>
            <tr><td colspan="2">&nbsp;<br/></td></tr>
            <tr>
                <td style="height:35px" colspan="2" align="center">
                    
                 		
		<?php   
		   
			$data['cmd'] = '_pay';
			$data['reset'] = '1';
			$data['merchant'] = $bitcoin_id;
			$data['currency'] = 'BTC'; 
			$data['amount'] = $amount;
			$data['item_name'] = $_SESSION['planid'];
			$data['item_number'] =  $userid;
			$data['userid'] = $userid;
			$data['user_name'] =$first_name;
			$data['user_email'] =$user_email;
			$data['on1'] = $userid;
			$data['allow_currencies'] = 'BTC';
			$data['want_shipping'] = '0';
			$data['success_url'] = 'success.php';
			$data['cancel_url'] = 'deposit.php';
			$data['button'] = 'Deposit';
			$post_data = json_encode($data);
			$private_key = $pri_key;
			// $hmac = hash_hmac('sha512', $post_data, $private_key); 	
		?><br/>
                  
		    
		   
		 <form method="post" name="money" action="https://atq-coins.com/confirm_deposit.php" role="form" id="coform" > 
		     <input type="hidden" name="cmd" value="_pay">
			<input type="hidden" name="merchant"   value="<?php echo $bitcoin_id; ?>">
			<input type="hidden" name="address"    value="<?php echo $address; ?>">
			<input type="hidden" name="order_no"    value="<?php echo $uid; ?>">
			<input type="hidden" name="currency"   value="BTC">
			<input type="hidden" name="amount"     value="<?php echo $amount;?>">
			<input type="hidden" name="amountf" value="<?php echo $amount;?>">
			<input type="hidden" name="item_name" value="<?php echo $item_name;?>">
	        <input type="hidden" name="item_number" value="<?php echo $planID; ?>">
			<input type="hidden" name="plan_id"    value="<?php echo $_SESSION['planid']; ?>">
			<input type="hidden" name="member_id"  value="<?php echo $userid; ?>">			
			<input type="hidden" name="first_name" value="<?php echo $first_name;?>">
			<input type="hidden" name="user_email" value="<?php echo $user_email;?>">
			<input type="hidden" name="success_url" value="https://atq-coins.com/success.php">
	        <input type="hidden" name="cancel_url" value="https://atq-coins.com/cancel.php">
	        <input type="hidden" name="ipn_url" value="https://atq-coins.com/ipn/coinpayment.php">
            <input type="submit" name="money" style="font-size:14px;margin-top:-20px;height:60px;width:130px;color:#000;" id="button" value="Done" class="button" />
            <input type="button" name="button" style="width:130px;margin-top:-20px;font-size:14px;height:60px;color:#000;" id="button" onclick="window.location='deposit.php'" value="Cancel" class="button" />

		    </form>
		    
		    
		    
		</td>
        </tr>
        </table>
    </div>
    <br/>
    <br/>   
    <br/>
</div>
</div>
</div>	 

    
<?php
	}
	
	
	
	if($payid==39)
	{
		/* ---------Payment Option Selected is Paypal	--------------------
			------------	Paypal Payment Processings Starts Here---------------*/
?>
  <div id="contents">
	 <h2>Payment Process</h2>
	 <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center" style="padding:10px">
              <tr class="row1" >
                <td width="55%" style="height:35px">Your Payeer Account  : </td>
                <td width="45%" class="orange"><?=$payeer_num; ?></td>
              </tr>
              <tr class="row2">
                <td style="height:35px">Amount (USD)</td>
                <td class="orange">$<?=number_format($amount,2); ?></td></tr>
              
              <?php
		  $select=mysql_query("select * from site_statistics where stat_id='14'");
		  $status=$select['status'];
		  if($status=='on')
		  {
		  ?>
		<tr class="row2">
              <td style="height:35px">Select your new Compound Rate:<span class="mandatory">*</span></td>             
              <td class="orange">
                  <select name="compound" id="compound">
                  <option value="select">Select compound</option>
                  <option value="0" <? if($compounding_interest == 0) echo ' selected="selected"'; ?> >0 %</option>
                  <option value="5" <? if($compounding_interest == 5) echo ' selected="selected"'; ?> >5 %</option>
                  <option value="10" <? if($compounding_interest == 10) echo ' selected="selected"'; ?> >10 %</option>
                  <option value="15" <? if($compounding_interest == 15) echo ' selected="selected"'; ?> >15 %</option>
                  <option value="20" <? if($compounding_interest == 20) echo ' selected="selected"'; ?> >20 %</option>
                  <option value="25" <? if($compounding_interest == 25) echo ' selected="selected"'; ?> >25 %</option>
                  <option value="30" <? if($compounding_interest == 30) echo ' selected="selected"'; ?> >30 %</option>
                  <option value="35" <? if($compounding_interest == 35) echo ' selected="selected"'; ?> >35 %</option>
                  <option value="40" <? if($compounding_interest == 40) echo ' selected="selected"'; ?> >40 %</option>
                  <option value="45" <? if($compounding_interest == 45) echo ' selected="selected"'; ?> >45 %</option>
                  <option value="50" <? if($compounding_interest == 50) echo ' selected="selected"'; ?> >50 %</option>
                  <option value="55" <? if($compounding_interest == 55) echo ' selected="selected"'; ?> >55 %</option>
                  <option value="60" <? if($compounding_interest == 60) echo ' selected="selected"'; ?> >60 %</option>
                  <option value="65" <? if($compounding_interest == 65) echo ' selected="selected"'; ?> >65 %</option>
                  <option value="70" <? if($compounding_interest == 70) echo ' selected="selected"'; ?> >70 %</option>
                  <option value="75" <? if($compounding_interest == 75) echo ' selected="selected"'; ?> >75 %</option>
                  <option value="80" <? if($compounding_interest == 80) echo ' selected="selected"'; ?> >80 %</option>
                  <option value="85" <? if($compounding_interest == 85) echo ' selected="selected"'; ?> >85 %</option>
                  <option value="90" <? if($compounding_interest == 90) echo ' selected="selected"'; ?> >90 %</option>
                  <option value="95" <? if($compounding_interest == 95) echo ' selected="selected"'; ?> >95 %</option>
                  <option value="100" <? if($compounding_interest == 100) echo ' selected="selected"'; ?> >100 %</option>
                </select>
		<br />
		<? if($_SESSION['errror_compound'])	{ echo $_SESSION['errror_compound'];  $_SESSION['errror_compound']=''; } ?>
              </td>
            </tr>
         <?
	}else{
	}
		?>
              <tr class="row1" >
                <td style="height:35px" colspan="2" align="center"><img src="images/payeer.png" /><br />
                  <br></td>
              </tr>
             <tr class="row2" >            
                <td style="height:35px" colspan="2" align="center">
                <?php
		    $insert1 = mysql_query("insert into deposit(member_id,plan_id,payment_thro,amount,compound_amount,compound_rate,invest_date,status) 
	values('".$_SESSION['userid']."','".$_SESSION['planid']."','".$_SESSION['payid']."','".$amount."','".$amount."','".$_POST['compound']."','".date('Y-m-d H:i:s')."','new')");
    $last_id=mysql_insert_id();
    $sel2=mysql_fetch_array(mysql_query("SELECT * FROM deposit WHERE deposit_id='".$last_id."'"));    
	$select_payeer = mysql_fetch_array(mysql_query("select * from payment_process where payment_id=39"));
	$payeer_id = $select_payeer['account_id'];
	$payeer_password = $select_payeer['batch_id'];
	$uid=$sel2['deposit_id'];
	?>
   <?php
		$payid = 39;
		$m_shop = $payeer_id; 
		$m_orderid = $uid;
		$m_amount = number_format($amount, 5);
		$m_curr = USD; 
										
		$m_desc = base64_encode('Amount Deposit'); 
		$m_key = $payeer_password; 

		$arHash = array($m_shop,$m_orderid,$m_amount,$m_curr,$m_desc,$m_key);								
		$sign	 = strtoupper(hash('sha256', implode(':', $arHash)));
?>									
          	<form method="GET" action="//payeer.com/merchant/">
			<input type="hidden" name="m_shop" value="<?php echo $m_shop; ?>">
			<input type="hidden" name="m_orderid" value="<?php echo $m_orderid; ?>">
			<input type="hidden" name="m_amount" value="<?php echo $m_amount; ?>">
			<input type="hidden" name="m_curr" value="USD">
			<input type="hidden" name="m_desc" value="<?php echo $m_desc; ?>">
			<input type="hidden" name="m_sign" value="<?php echo $sign; ?>">
          	<input type="submit" name="button" id="button" value="<?php echo "Deposit";?>" class="button" />
   		  	<input type="button" name="button" id="button" onclick="window.location='deposit.php'" value="<?php echo "Cancel"; ?>" class="button" />
			</form></td>
            </tr>
            </table>
</div>
         <!-- <div class="corner_bc"><div class="corner_bl"><div class="corner_br"></div></div></div>-->
</div>
</div>        
<?
	}
		if($payid==40)
		{
			/* ---------Payment Option Selected is Paypal	--------------------
					------------	Paypal Payment Processings Starts Here---------------
			*/
?>
  <div id="contents">
	 <h2>Payment Process</h2>
	 <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center" style="padding:10px">
              <tr class="row1" >
                <td width="55%" style="height:35px">Your Neteller Account  : </td>
                <td width="45%" class="orange"><?=$neteller_num; ?></td>
              </tr>
              <tr class="row2">
                <td style="height:35px">Amount (USD)</td>
                <td class="orange">$ <?=number_format($amount,2); ?></td>
              </tr>              
              <?php
		  $select=mysql_query("select * from site_statistics where stat_id='14'");
		  $status=$select['status'];
		  if($status=='on')
		  {
		  ?>
		<tr class="row2">
              <td style="height:35px">Select your new Compound Rate:<span class="mandatory">*</span></td>             
              <td class="orange">
                  <select name="compound" id="compound">
                  <option value="select">Select compound</option>
                  <option value="0" <? if($compounding_interest == 0) echo ' selected="selected"'; ?> >0 %</option>
                  <option value="5" <? if($compounding_interest == 5) echo ' selected="selected"'; ?> >5 %</option>
                  <option value="10" <? if($compounding_interest == 10) echo ' selected="selected"'; ?> >10 %</option>
                  <option value="15" <? if($compounding_interest == 15) echo ' selected="selected"'; ?> >15 %</option>
                  <option value="20" <? if($compounding_interest == 20) echo ' selected="selected"'; ?> >20 %</option>
                  <option value="25" <? if($compounding_interest == 25) echo ' selected="selected"'; ?> >25 %</option>
                  <option value="30" <? if($compounding_interest == 30) echo ' selected="selected"'; ?> >30 %</option>
                  <option value="35" <? if($compounding_interest == 35) echo ' selected="selected"'; ?> >35 %</option>
                  <option value="40" <? if($compounding_interest == 40) echo ' selected="selected"'; ?> >40 %</option>
                  <option value="45" <? if($compounding_interest == 45) echo ' selected="selected"'; ?> >45 %</option>
                  <option value="50" <? if($compounding_interest == 50) echo ' selected="selected"'; ?> >50 %</option>
                  <option value="55" <? if($compounding_interest == 55) echo ' selected="selected"'; ?> >55 %</option>
                  <option value="60" <? if($compounding_interest == 60) echo ' selected="selected"'; ?> >60 %</option>
                  <option value="65" <? if($compounding_interest == 65) echo ' selected="selected"'; ?> >65 %</option>
                  <option value="70" <? if($compounding_interest == 70) echo ' selected="selected"'; ?> >70 %</option>
                  <option value="75" <? if($compounding_interest == 75) echo ' selected="selected"'; ?> >75 %</option>
                  <option value="80" <? if($compounding_interest == 80) echo ' selected="selected"'; ?> >80 %</option>
                  <option value="85" <? if($compounding_interest == 85) echo ' selected="selected"'; ?> >85 %</option>
                  <option value="90" <? if($compounding_interest == 90) echo ' selected="selected"'; ?> >90 %</option>
                  <option value="95" <? if($compounding_interest == 95) echo ' selected="selected"'; ?> >95 %</option>
                  <option value="100" <? if($compounding_interest == 100) echo ' selected="selected"'; ?> >100 %</option>
                </select>
		<br />
		<? if($_SESSION['errror_compound'])	{ echo $_SESSION['errror_compound'];  $_SESSION['errror_compound']=''; } ?>
              </td>
            </tr>
         <?
	}else{		
		}
		?>
              <tr class="row1" >
                <td style="height:35px" colspan="2" align="center"><img src="images/neteller.png" /><br />
                  <br>
                  </td>
              </tr>
              <tr class="row2" >
                <td style="height:35px" colspan="2" align="center"><?
               		//Merchant details
			$select_m_neteller = mysql_fetch_array(mysql_query("select * from payment_process where payment_id=40"));
			$merchant_id = $select_m_neteller['account_id'];
			$merchant_key = $select_m_neteller['batch_id'];

			//user details
			$select_u_neteller = mysql_fetch_array(mysql_query("select * from members where member_id='".$_SESSION['userid']."'"));

			$net_id = $select_u_neteller['neteller'];
			$net_key = base64_decode($select_u_neteller['neteller_key']);

	   ?>
	<!--https://test.api.neteller.com/netdirect    ipn/neteller.php -->
	 <form method="post" action="ipn/neteller.php">
          <input type="hidden" name="version" value=" 4.1">
          <input type="hidden" name="amount" size="5" value="<?php echo $amount; ?>" maxlength="10">
          <input type="hidden" name="currency" value="USD" size="10" maxlength="3">
          <input type="hidden" name="net_account" size="20" maxlength="100" value="<?php echo $net_id; ?>">
          <input type="hidden" name="secure_id" size="10" maxlength="6" value="<?php echo $net_key; ?>">
          <input type="hidden" name="merchant_id" value="<?php echo $merchant_id; ?>">
          <input type="hidden" name="merch_key" value="<?php echo $merchant_key; ?>">
          <input type="hidden" name="merch_transid" value="" maxlength="50">
          <input type="hidden" name="language_code" value="EN">
          <input type="hidden" name="merch_name" value="">
          <input type="hidden" name="merch_account" value="451723625565" maxlength="50">
          <input type="hidden" name="custom_1" value="<?php echo base64_encode($_SESSION['userid'].','.$amount); ?>" maxlength="50">
          <input type="submit" name="button" id="button" value="Deposit" class="button" />
	  <input type="button" name="button" id="button" onclick="window.location='deposit.php'" value="Cancel" class="button" />
	</form></td>
       </tr>
           </table>
</div>
         <!-- <div class="corner_bc"><div class="corner_bl"><div class="corner_br"></div></div></div>-->
</div>
</div>      
<?php
	}if($payid==41)
	{
		/* ---------Payment Option Selected is Paypal	--------------------
			------------	Paypal Payment Processings Starts Here---------------	*/
?>
  <div id="contents">
	 <h2>Payment Process</h2>
	 <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center" style="padding:10px">
              <tr class="row1" >
                <td width="55%" style="height:35px">Your Skrill Account  : </td>
                <td width="45%" class="orange"><?=$skrill_num; ?></td>
              </tr>
              <tr class="row2">
                <td style="height:35px">Amount (USD)</td>
                <td class="orange">$ <?=number_format($amount,2); ?></td>
              </tr>              
              <?php
		  $select=mysql_query("select * from site_statistics where stat_id='14'");
		  $status=$select['status'];
		  if($status=='on')
		  {
		  ?>
	     <tr class="row2">
              <td style="height:35px">Select your new Compound Rate:<span class="mandatory">*</span></td>             
              <td class="orange">
                  <select name="compound" id="compound">
                  <option value="select">Select compound</option>
                  <option value="0" <? if($compounding_interest == 0) echo ' selected="selected"'; ?> >0 %</option>
                  <option value="5" <? if($compounding_interest == 5) echo ' selected="selected"'; ?> >5 %</option>
                  <option value="10" <? if($compounding_interest == 10) echo ' selected="selected"'; ?> >10 %</option>
                  <option value="15" <? if($compounding_interest == 15) echo ' selected="selected"'; ?> >15 %</option>
                  <option value="20" <? if($compounding_interest == 20) echo ' selected="selected"'; ?> >20 %</option>
                  <option value="25" <? if($compounding_interest == 25) echo ' selected="selected"'; ?> >25 %</option>
                  <option value="30" <? if($compounding_interest == 30) echo ' selected="selected"'; ?> >30 %</option>
                  <option value="35" <? if($compounding_interest == 35) echo ' selected="selected"'; ?> >35 %</option>
                  <option value="40" <? if($compounding_interest == 40) echo ' selected="selected"'; ?> >40 %</option>
                  <option value="45" <? if($compounding_interest == 45) echo ' selected="selected"'; ?> >45 %</option>
                  <option value="50" <? if($compounding_interest == 50) echo ' selected="selected"'; ?> >50 %</option>
                  <option value="55" <? if($compounding_interest == 55) echo ' selected="selected"'; ?> >55 %</option>
                  <option value="60" <? if($compounding_interest == 60) echo ' selected="selected"'; ?> >60 %</option>
                  <option value="65" <? if($compounding_interest == 65) echo ' selected="selected"'; ?> >65 %</option>
                  <option value="70" <? if($compounding_interest == 70) echo ' selected="selected"'; ?> >70 %</option>
                  <option value="75" <? if($compounding_interest == 75) echo ' selected="selected"'; ?> >75 %</option>
                  <option value="80" <? if($compounding_interest == 80) echo ' selected="selected"'; ?> >80 %</option>
                  <option value="85" <? if($compounding_interest == 85) echo ' selected="selected"'; ?> >85 %</option>
                  <option value="90" <? if($compounding_interest == 90) echo ' selected="selected"'; ?> >90 %</option>
                  <option value="95" <? if($compounding_interest == 95) echo ' selected="selected"'; ?> >95 %</option>
                  <option value="100" <? if($compounding_interest == 100) echo ' selected="selected"'; ?> >100 %</option>
                </select>
		<br />
		<? if($_SESSION['errror_compound'])	{ echo $_SESSION['errror_compound'];  $_SESSION['errror_compound']=''; } ?>
              </td>
            </tr>
         <?
		}
              else
		{	
		}
		?>
              <tr class="row1" >
                <td style="height:35px" colspan="2" align="center"><img src="images/skrill.png" /><br />
                  <br></td>
              </tr>
             <tr class="row2" >
              <td style="height:35px" colspan="2" align="center"><?
			 $skrill = mysql_fetch_array(mysql_query("select * from payment_process where payment_id='37'")); ?>
		<?php
			$transaction_id= "txn".rand(5,99999);
			$session_id= "sec".rand(5,99999);
			$_SESSION['secid'] = $session_id;
			$_SESSION['trn_id'] = $transaction_id;
			$_SESSION['amount'] = $amount;
			//print_r($_SESSION);
		?>
		<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
	        <input type="hidden" name="pay_to_email" value="<?php echo $skrill['account_id']; ?>">
		<input type="hidden" name="transaction_id" value="<?php echo $transaction_id; ?>">
	        <input type="hidden" name="return_url" value="<?=$yoursite; ?>/ipn/strill.php">
        	<input type="hidden" name="cancel_url" value="<?=$yoursite; ?>/failure.php">
	        <input type="hidden" name="status_url" value="<?=$yoursite; ?>/success.php">
        	<input type="hidden" name="language" value="EN">
	        <input type="hidden" name="currency" value="USD">
        	<input type="hidden" name="merchant_fields" value="customer_number, session_id">
	        <input type="hidden" name="session_ID" value="<?php echo $session_id; ?>">
        	<input type="hidden" name="amount" value="<?php echo $amount; ?>">
	        <input type="submit" name="button" id="button" value="Deposit" class="button" />
   		<input type="button" name="button" id="button" onclick="window.location='deposit.php'" value="Cancel" class="button" />
		</form></td>
             </tr>
            </table>
</div>
         <!-- <div class="corner_bc"><div class="corner_bl"><div class="corner_br"></div></div></div>-->
</div>
</div>
<?php
	}if($payid==42)
	{
		/* ---------Payment Option Selected is Paypal	--------------------
				------------	Paypal Payment Processings Starts Here---------------
		*/
?>
  <div id="contents">
	 <h2>Payment Process</h2>
	<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center" style="padding:10px">
             <tr class="row1" >
               <td width="55%" style="height:35px">Your Advcash Account  : </td>
                <td width="45%" class="orange"><?=$adcash_num; ?></td>
             </tr>
              <tr class="row2">
               <td style="height:35px">Amount (USD)</td>
                <td class="orange">$ <?=number_format($amount,2); ?></td>
              </tr>             
              <?php
		  $select=mysql_query("select * from site_statistics where stat_id='14'");
		  $status=$select['status'];
		  if($status=='on')
		  {
		  ?>
	    <tr class="row2">
              <td style="height:35px">Select your new Compound Rate:<span class="mandatory">*</span></td>             
              <td class="orange">
                  <select name="compound" id="compound">
                  <option value="select">Select compound</option>
                  <option value="0" <? if($compounding_interest == 0) echo ' selected="selected"'; ?> >0 %</option>
                  <option value="5" <? if($compounding_interest == 5) echo ' selected="selected"'; ?> >5 %</option>
                  <option value="10" <? if($compounding_interest == 10) echo ' selected="selected"'; ?> >10 %</option>
                  <option value="15" <? if($compounding_interest == 15) echo ' selected="selected"'; ?> >15 %</option>
                  <option value="20" <? if($compounding_interest == 20) echo ' selected="selected"'; ?> >20 %</option>
                  <option value="25" <? if($compounding_interest == 25) echo ' selected="selected"'; ?> >25 %</option>
                  <option value="30" <? if($compounding_interest == 30) echo ' selected="selected"'; ?> >30 %</option>
                  <option value="35" <? if($compounding_interest == 35) echo ' selected="selected"'; ?> >35 %</option>
                  <option value="40" <? if($compounding_interest == 40) echo ' selected="selected"'; ?> >40 %</option>
                  <option value="45" <? if($compounding_interest == 45) echo ' selected="selected"'; ?> >45 %</option>
                  <option value="50" <? if($compounding_interest == 50) echo ' selected="selected"'; ?> >50 %</option>
                  <option value="55" <? if($compounding_interest == 55) echo ' selected="selected"'; ?> >55 %</option>
                  <option value="60" <? if($compounding_interest == 60) echo ' selected="selected"'; ?> >60 %</option>
                  <option value="65" <? if($compounding_interest == 65) echo ' selected="selected"'; ?> >65 %</option>
                  <option value="70" <? if($compounding_interest == 70) echo ' selected="selected"'; ?> >70 %</option>
                  <option value="75" <? if($compounding_interest == 75) echo ' selected="selected"'; ?> >75 %</option>
                  <option value="80" <? if($compounding_interest == 80) echo ' selected="selected"'; ?> >80 %</option>
                  <option value="85" <? if($compounding_interest == 85) echo ' selected="selected"'; ?> >85 %</option>
                  <option value="90" <? if($compounding_interest == 90) echo ' selected="selected"'; ?> >90 %</option>
                  <option value="95" <? if($compounding_interest == 95) echo ' selected="selected"'; ?> >95 %</option>
                  <option value="100" <? if($compounding_interest == 100) echo ' selected="selected"'; ?> >100 %</option>
                </select>
		<br />
		<? if($_SESSION['errror_compound'])	{ echo $_SESSION['errror_compound'];  $_SESSION['errror_compound']=''; } ?>
              </td>
            </tr>
         <?
	} else{
		}
		?>
             <tr class="row1" >
               <td style="height:35px" colspan="2" align="center"><img src="images/advcash.png" /><br />
                 <br></td>
             </tr>
              <tr class="row2" >
                <td style="height:35px" colspan="2" align="center">
	<?php
		$advcash = mysql_fetch_array(mysql_query("select * from payment_process where payment_id='42'"));
		$advcash_mail = $advcash['account_id'];
		$advcash_id = $advcash['batch_id'];
		$advcash_pwd = $advcash['spwd'];
		$transaction_id= rand(5,99999);

		$sign_hash = hash('sha256', implode(":", array( $advcash_mail, $advcash_id, $amount, 'USD', $advcash_pwd, $transaction_id  )));						
		// $transaction_id= "txn".rand(5,99999);
		// $session_id= "sec".rand(5,99999);
		// $_SESSION['secid'] = $session_id;
		// $_SESSION['trn_id'] = $transaction_id;
		// $_SESSION['amount'] = $amount;
		//print_r($_SESSION);
	?>

	<form method="post" action="https://wallet.advcash.com/sci/">
         <input type="hidden" name="ac_account_email" value="<?php echo $advcash_mail; ?>" />
         <input type="hidden" name="ac_sci_name" value="<?php echo $advcash_id; ?>" />
         <input type="hidden" name="ac_amount" value="<?php echo $amount; ?>" />
         <input type="hidden" name="ac_currency" value="USD" />
         <input type="hidden" name="ac_order_id" value="<?php echo $_SESSION['planid']; ?>" />
         <input type="hidden" name="ac_sign" value="<?php echo $sign_hash; ?>" />
         <!-- Optional Fields -->
         <input type="hidden" name="ac_success_url" value="<?=$yoursite; ?>/success.php" />
         <input type="hidden" name="ac_success_url_method" value="POST" />
         <input type="hidden" name="ac_fail_url" value="<?=$yoursite; ?>/failure.php" />
         <input type="hidden" name="ac_fail_url_method" value="POST" />
         <input type="hidden" name="ac_status_url" value="<?=$yoursite; ?>/ipn/advcash.php" />
         <input type="hidden" name="ac_status_url_method" value="POST" />
         <input type="hidden" name="ac_comments" value="Comment" />
         <input type="hidden" name="operation_id" value="<?php echo $_SESSION['userid']; ?>">
         <input type="submit" name="button" id="button" value="Deposit" class="button" />
   	 <input type="button" name="button" id="button" onclick="window.location='deposit.php'" value="Cancel" class="button" />
	</form>
    </td>
    </tr>
   </table>
</div>
         <!-- <div class="corner_bc"><div class="corner_bl"><div class="corner_br"></div></div></div>-->
</div>
</div>        
<?php
	}
		if($payid==12)
		{
			$total_earning_query="select sum(amount) as tot_earnings from history where user_id=$userid and 
			(type='intrest_earned' or type='bonus' or type='commissions' or type='release_deposit' or type='internal_transaction_receive')";

			$total_earning_result=mysql_query($total_earning_query);
			$total_earning_row=mysql_fetch_array($total_earning_result);
			$total_earnings=$total_earning_row['tot_earnings'];

			if(!$total_earnings) $total_earnings=0;

			$tesql="select sum(amount) as total_with from history where user_id=".$userid." and 
			(type='withdrawal' or type='withdraw_pending' or type='penality' or type='deposit' or type='internal_transaction_spend') order by type";
			$teres=mysql_query($tesql);
			if(mysql_num_rows($teres)>0)
			{
			$terow=mysql_fetch_array($teres);
			$total_withdraw=$terow['total_with'];
			}
			else
			$total_withdraw=0;

 		        $tesql1="select sum(amount) as witth from history where user_id=".$userid." and type='reinvest' order by type";
			$teres1=mysql_query($tesql1);
			$terow1=mysql_fetch_array($teres1);
			$witttth=$terow1['witth']; 
	
			$total_earnings=$total_earnings-$total_withdraw-$witttth;

			/* ---------Payment Option Selected is alertpay	--------------------
							------------	alertpay Payment Processings Starts Here---------------
				*/
			 //require 'include/memberleft.php';
?>

  <div id="contents">
	 <h2>Payment Process</h2>
	 <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center" style="padding:10px">
              <tr class="row1" >
                <td width="55%" style="height:35px">Your Account Balance  : </td>
                <td width="45%" class="orange">$
                  <?=number_format($available,2); ?></td>
              </tr>
              <tr class="row2">
                <td style="height:35px">Amount (USD)</td>
                <td class="orange">$
                  <?=number_format($amount,5); ?></td>
              </tr>                              
              <?php
		  $select=mysql_query("select * from site_statistics where stat_id='14'");
		  $status=$select['status'];
		  if($status=='on')
		  {
		  ?>
          
          <tr class="row2">
              <td style="height:35px">Select your new Compound Rate:<span class="mandatory">*</span></td>
             
              <td class="orange">

                  <select name="compound" id="compound">
                  <option value="select">Select compound</option>
                  <option value="0" <? if($compounding_interest == 0) echo ' selected="selected"'; ?> >0 %</option>
                  <option value="5" <? if($compounding_interest == 5) echo ' selected="selected"'; ?> >5 %</option>
                  <option value="10" <? if($compounding_interest == 10) echo ' selected="selected"'; ?> >10 %</option>
                  <option value="15" <? if($compounding_interest == 15) echo ' selected="selected"'; ?> >15 %</option>
                  <option value="20" <? if($compounding_interest == 20) echo ' selected="selected"'; ?> >20 %</option>
                  <option value="25" <? if($compounding_interest == 25) echo ' selected="selected"'; ?> >25 %</option>
                  <option value="30" <? if($compounding_interest == 30) echo ' selected="selected"'; ?> >30 %</option>
                  <option value="35" <? if($compounding_interest == 35) echo ' selected="selected"'; ?> >35 %</option>
                  <option value="40" <? if($compounding_interest == 40) echo ' selected="selected"'; ?> >40 %</option>
                  <option value="45" <? if($compounding_interest == 45) echo ' selected="selected"'; ?> >45 %</option>
                  <option value="50" <? if($compounding_interest == 50) echo ' selected="selected"'; ?> >50 %</option>
                  <option value="55" <? if($compounding_interest == 55) echo ' selected="selected"'; ?> >55 %</option>
                  <option value="60" <? if($compounding_interest == 60) echo ' selected="selected"'; ?> >60 %</option>
                  <option value="65" <? if($compounding_interest == 65) echo ' selected="selected"'; ?> >65 %</option>
                  <option value="70" <? if($compounding_interest == 70) echo ' selected="selected"'; ?> >70 %</option>
                  <option value="75" <? if($compounding_interest == 75) echo ' selected="selected"'; ?> >75 %</option>
                  <option value="80" <? if($compounding_interest == 80) echo ' selected="selected"'; ?> >80 %</option>
                  <option value="85" <? if($compounding_interest == 85) echo ' selected="selected"'; ?> >85 %</option>
                  <option value="90" <? if($compounding_interest == 90) echo ' selected="selected"'; ?> >90 %</option>
                  <option value="95" <? if($compounding_interest == 95) echo ' selected="selected"'; ?> >95 %</option>
                  <option value="100" <? if($compounding_interest == 100) echo ' selected="selected"'; ?> >100 %</option>
                </select>
				<br />
				<? if($_SESSION['errror_compound'])	{ echo $_SESSION['errror_compound'];  $_SESSION['errror_compound']=''; } ?>
              </td>
            </tr>
         <?
		}
      
        else
		{
		
		}
		?>





              <tr class="row1" >
                <td style="height:35px" colspan="2" align="center"><img src="images/reinvest.jpg" width="136px" height="36px"/><br />
                 <br></td>
              </tr>
              <tr class="row2" >
                <td style="height:35px" colspan="2" align="center">               
                <form action='success.php' method='post'>
                    <input type='hidden' name='ap_purchasetype' value='Item'>
                    <input type='hidden' name='ap_merchant' value='<?=$adminmail;?>'>
                    <input type='hidden'  name='ap_itemname' value='PTYW'>
                    <input type='hidden'  name='ap_currency' value='USD'>
                    <input type='hidden'  name='ap_returnurl' value='<?=$yoursite?>/success.php'>
                    <input type='hidden' src='https://www.payza.com/images/BuyNow/big_pay_03.gif'>
                    <input type='hidden'  name='ap_quantity' value='1'>
                    <input type='hidden' name='ap_description' value='PTYW'>
                    <input type='hidden'  name='ap_amount' value='<?=$amount?>'>
                    <input type='hidden'  name='ap_cancelurl' value='<?=$yoursite?>/failure.php'>
                    <input type="submit" name="button" id="button" value="Deposit" class="btn" />
                    &nbsp;&nbsp;&nbsp; <input type="button" name="button" id="button" onclick="window.location='deposit.php'" value="Cancel" class="btn" />
                 </form></td>
              </tr>
            </table>
</div>          
<?	}
	if($payid==13)
	{
			/* ---------Payment Option Selected is alertpay	--------------------
					------------	alertpay Payment Processings Starts Here---------------
				*/
?>
  <div id="contents">
	 <h2>Payment Process</h2>
	 <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center" style="padding:10px">
             <tr class="row1" >
                <td width="55%" style="height:35px">Your Bank  Account  : </td>
               <td width="45%" class="orange"><?=$pm; ?></td>
              </tr>
              <tr class="row2">
                <td style="height:35px">Amount (USD)</td>
                <td class="orange">$ <?=number_format($amount,2); ?></td>
              </tr>
<?php
		  $select=mysql_query("select * from site_statistics where stat_id='14'");
		  $status=$select['status'];
		  if($status=='on')
		  {
		  ?>         
          <tr class="row2">
              <td style="height:35px">Select your new Compound Rate:<span class="mandatory">*</span></td>             
              <td class="orange">
                  <select name="compound" id="compound">
                  <option value="select">Select compound</option>
                  <option value="0" <? if($compounding_interest == 0) echo ' selected="selected"'; ?> >0 %</option>
                  <option value="5" <? if($compounding_interest == 5) echo ' selected="selected"'; ?> >5 %</option>
                  <option value="10" <? if($compounding_interest == 10) echo ' selected="selected"'; ?> >10 %</option>
                  <option value="15" <? if($compounding_interest == 15) echo ' selected="selected"'; ?> >15 %</option>
                  <option value="20" <? if($compounding_interest == 20) echo ' selected="selected"'; ?> >20 %</option>
                  <option value="25" <? if($compounding_interest == 25) echo ' selected="selected"'; ?> >25 %</option>
                  <option value="30" <? if($compounding_interest == 30) echo ' selected="selected"'; ?> >30 %</option>
                  <option value="35" <? if($compounding_interest == 35) echo ' selected="selected"'; ?> >35 %</option>
                  <option value="40" <? if($compounding_interest == 40) echo ' selected="selected"'; ?> >40 %</option>
                  <option value="45" <? if($compounding_interest == 45) echo ' selected="selected"'; ?> >45 %</option>
                  <option value="50" <? if($compounding_interest == 50) echo ' selected="selected"'; ?> >50 %</option>
                  <option value="55" <? if($compounding_interest == 55) echo ' selected="selected"'; ?> >55 %</option>
                  <option value="60" <? if($compounding_interest == 60) echo ' selected="selected"'; ?> >60 %</option>
                  <option value="65" <? if($compounding_interest == 65) echo ' selected="selected"'; ?> >65 %</option>
                  <option value="70" <? if($compounding_interest == 70) echo ' selected="selected"'; ?> >70 %</option>
                  <option value="75" <? if($compounding_interest == 75) echo ' selected="selected"'; ?> >75 %</option>
                  <option value="80" <? if($compounding_interest == 80) echo ' selected="selected"'; ?> >80 %</option>
                  <option value="85" <? if($compounding_interest == 85) echo ' selected="selected"'; ?> >85 %</option>
                  <option value="90" <? if($compounding_interest == 90) echo ' selected="selected"'; ?> >90 %</option>
                  <option value="95" <? if($compounding_interest == 95) echo ' selected="selected"'; ?> >95 %</option>
                  <option value="100" <? if($compounding_interest == 100) echo ' selected="selected"'; ?> >100 %</option>
                </select>
				<br />
				<? if($_SESSION['errror_compound'])	{ echo $_SESSION['errror_compound'];  $_SESSION['errror_compound']=''; } ?>
              </td>
            </tr>
         <?
	}else{		
		}
		?>
              <tr class="row1" >
                <td style="height:35px" colspan="2" align="center"><img src="images/bank_wire.jpg" /><br />
                  <br></td>
              </tr>
              <tr class="row2" >
                <td style="height:35px" colspan="2" align="center"><form action='success.php' method='post'>
                    <div>
                      <div class="roll_container deposit">
                        <h3>Bank Account Details</h3>
                        <table cellspacing="0" cellpadding="5" border="0" width="100%" class="dataGrid">
                          <tbody>
                            <?php
				//$seelct_fetch_bank = mysql_query("select * from payment_process where payment_id >=13");
			$seelct_fetch_bank = mysql_query("select * from payment_process where payment_id IN(13,14,15,16,17,18,19,20,21)");
			while($fetch_bank = mysql_fetch_array($seelct_fetch_bank))
			{
				if($fetch_bank['payment_id'] == '21')
				{
				$country = mysql_fetch_array(mysql_query("select * from country_master where country_id=".$fetch_bank['account_id']));
				$acc = $country['country'];
				}else{
				$acc = $fetch_bank['account_id'];
				}
				$payment_name = $fetch_bank['payment_name'];
	?>
                         <tr>
                              <td align="left"><strong>
                                <?=$payment_name; ?>
                                </strong></td>
                              <td align="left"><?=$acc; ?></td>
                            </tr>
                            <?
		}
		?>
                         </tbody>
                        </table>
                      </div>
                      <div class="dottedSeparator"></div>
                    </div>
                    <br />
                    <input type="submit" name="button" id="button" value="Deposit" class="btn" />
                    &nbsp;&nbsp;&nbsp; <input type="button" name="button" id="button" onclick="window.location='deposit.php'" value="Cancel" class="btn" />
                  </form></td>
              </tr>
            </table>
  </div>
          <div class="corner_bc"><div class="corner_bl"><div class="corner_br"></div></div></div>
</div>
</div>   
<?php	}
		if($payid==28)
		{
			/* ---------Payment Option Selected is Global Digital Pay	--------------------
						------------	Global Digitial Pay Payment Processings Starts Here---------------

			*/
?>
<div id="inner_top"></div>
    <div id="inner_center">          

   	  <!-- <div class="navi_div"><a href="index.php">Home</a> Deposit</div>-->
	<div class="deposit01_bg"><h2>Payment Proces</h2></div>           
      <div id="finacial_div">
      	<div class="finacial_top"></div>
        <div class="finacial_center">    	 
		 	 
             <!--<div class="registration">
			<div class="corner_tc"><div class="corner_tl"><div class="corner_tr"></div></div></div>
                       <div class="reg_content">-->

           <table width="95%" border="0" cellspacing="0" cellpadding="0" class="table">
              <tr class="row1" >
                <td width="55%" style="height:35px">Your STP Account  : </td>
                <td width="45%" class="orange"><?=$st_pay; ?></td>
              </tr>
              <tr class="row2">
                <td style="height:35px">Amount (USD)</td>
                <td class="orange">$<?=number_format($amount,2); ?></td>
              </tr>
              <tr class="row1" >
                <td style="height:35px" colspan="2" align="center"><img src="images/accept/solid_trustpay.gif" /><br />
                  <br></td>
              </tr>
		 <tr class="row2" >
                <td style="height:35px" colspan="2" align="center"><?
			$select_alertpay = mysql_fetch_array(mysql_query("select * from payment_process where payment_id=28"));
			$stp_id = $select_alertpay['account_id'];		
								
			$stp_button_name = mysql_fetch_array(mysql_query("select * from payment_process where payment_id=37"));
		   ?>
                      <img src="https://solidtrustpay.com/images/buttons/purchase1.gif" /> </br></br>

	<?	echo '<form method="post" action="https://solidtrustpay.com/handle.php">
			 <input type=hidden name=merchantAccount value="'.$stp_id.'">
			 <input type="hidden" name="sci_name" value="'.$stp_button_name['account_id'].'">
			 <input type=hidden name="amount" value="'.$amount.'">
			 <input type=hidden name="testmode" value="ON">
			 <input type=hidden name="item_id" value="Deposit from '.$_SESSION['username'].'">
			 <input type=hidden name="return_url" value="'.$yoursite.'/stpsuccess.php?flag=1">
			 <input type=hidden name="notify_url" value="'.$yoursite.'/stpipn.php">
			 <input type=hidden name="cancel_url" value="'.$yoursite.'/failure.php">
			 <input type=hidden name="SUGGESTED_MEMO" value="Deposit from '.$_SESSION['username'].'">
			 <input type=hidden name="user1" value="'.$_SESSION['userid'].'">
			 <input type=hidden name="user2" value="'.$amount.'">
			 <input type=hidden name="user3" value="'.$_SESSION['payid'].'">
			 <input type=hidden name="user4" value="'.$_SESSION['planid'].'">
			 <input type=hidden name="user5" value="'.$_SESSION['amount'].'">
			 <input type=hidden name="user6" value="'.$_SESSION['username'].'">';
		?>
		 <input type="submit" name="button" id="button" value="Deposit" class="button" />
		  &nbsp;&nbsp;&nbsp;<input type="button" class="button" value="Cancel" onclick="window.location='deposit.php'" id="button" name="button">
		</form>  
              </a>
             </p>
               </form></td>
             </tr>
            </table>
          <!--</div>
          <div class="corner_bc"><div class="corner_bl"><div class="corner_br"></div></div></div>
				</div>-->

      </div>
        <div class="finacial_down"></div>
      </div>

    </div>
    <div id="inner_bottom"></div>  
<?
	}
	if($payid==23)
	{
		/* ---------Payment Option Selected is Global Digital Pay	--------------------
				------------	Global Digitial Pay Payment Processings Starts Here---------------
		*/
?>
  <div id="contents">
	 <h2>Payment Process</h2>
	 <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center" style="padding:10px">
              <tr class="row1" >
                <td width="55%" style="height:35px">Your GDP Account  : </td>
                <td width="45%" class="orange"><?=$gdp_num; ?></td>
              </tr>
              <tr class="row2">
                <td style="height:35px">Amount (USD)</td>
                <td class="orange">$<?=number_format($amount,2); ?></td>
              </tr>
<?php
		  $select=mysql_query("select * from site_statistics where stat_id='14'");
		  $status=$select['status'];
		  if($status=='on')
		  {
		  ?>
          
          <tr class="row2">
              <td style="height:35px">Select your new Compound Rate:<span class="mandatory">*</span></td>             
              <td class="orange">
                  <select name="compound" id="compound">
                  <option value="select">Select compound</option>
                  <option value="0" <? if($compounding_interest == 0) echo ' selected="selected"'; ?> >0 %</option>
                  <option value="5" <? if($compounding_interest == 5) echo ' selected="selected"'; ?> >5 %</option>
                  <option value="10" <? if($compounding_interest == 10) echo ' selected="selected"'; ?> >10 %</option>
                  <option value="15" <? if($compounding_interest == 15) echo ' selected="selected"'; ?> >15 %</option>
                  <option value="20" <? if($compounding_interest == 20) echo ' selected="selected"'; ?> >20 %</option>
                  <option value="25" <? if($compounding_interest == 25) echo ' selected="selected"'; ?> >25 %</option>
                  <option value="30" <? if($compounding_interest == 30) echo ' selected="selected"'; ?> >30 %</option>
                  <option value="35" <? if($compounding_interest == 35) echo ' selected="selected"'; ?> >35 %</option>
                  <option value="40" <? if($compounding_interest == 40) echo ' selected="selected"'; ?> >40 %</option>
                  <option value="45" <? if($compounding_interest == 45) echo ' selected="selected"'; ?> >45 %</option>
                  <option value="50" <? if($compounding_interest == 50) echo ' selected="selected"'; ?> >50 %</option>
                  <option value="55" <? if($compounding_interest == 55) echo ' selected="selected"'; ?> >55 %</option>
                  <option value="60" <? if($compounding_interest == 60) echo ' selected="selected"'; ?> >60 %</option>
                  <option value="65" <? if($compounding_interest == 65) echo ' selected="selected"'; ?> >65 %</option>
                  <option value="70" <? if($compounding_interest == 70) echo ' selected="selected"'; ?> >70 %</option>
                  <option value="75" <? if($compounding_interest == 75) echo ' selected="selected"'; ?> >75 %</option>
                  <option value="80" <? if($compounding_interest == 80) echo ' selected="selected"'; ?> >80 %</option>
                  <option value="85" <? if($compounding_interest == 85) echo ' selected="selected"'; ?> >85 %</option>
                  <option value="90" <? if($compounding_interest == 90) echo ' selected="selected"'; ?> >90 %</option>
                  <option value="95" <? if($compounding_interest == 95) echo ' selected="selected"'; ?> >95 %</option>
                  <option value="100" <? if($compounding_interest == 100) echo ' selected="selected"'; ?> >100 %</option>
                </select>
				<br />
				<? if($_SESSION['errror_compound'])	{ echo $_SESSION['errror_compound'];  $_SESSION['errror_compound']=''; } ?>
              </td>
            </tr>
         <?
	}else{		
		}
	?>
              <tr class="row1" >
                <td style="height:35px" colspan="2" align="center"><img src="images/payment01.gif" /><br />
                  <br></td>
              </tr>
              <tr class="row2" >
                <td style="height:35px" colspan="2" align="center"><?
			$select_gdp = mysql_fetch_array(mysql_query("select * from payment_process where payment_id=23"));
			$admin_gdp_id = $select_gdp['account_id'];
		   ?>
		<form action="https://www.globaldigitalpay.com/process.htm" method="post">  
			<input name="member" value="<?=$admin_gdp_id; ?>" type="hidden">  
			<input name="action" value="service" type="hidden">  
			<input name="product" value="Deposit" type="hidden">  
			<input name="price" value="<?=$amount; ?>" type="hidden">  
			<input name="currency" value="USD" type="hidden">  
			<input name="nocheck" value="1" type="hidden">  
			<input name="store_id" value="2224" type="hidden">  
			<input name="comments" value="Deposit" type="hidden">  
			 <input type="submit" name="button" id="button" value="Deposit" class="btn" />
		  &nbsp;&nbsp;&nbsp;<input type="button" class="btn" value="Cancel" onclick="window.location='deposit.php'" id="button" name="button">
		</form>            
         </a>
           </p>
             </form></td>
             </tr>
            </table>
</div>
          <div class="corner_bc"><div class="corner_bl"><div class="corner_br"></div></div></div>
</div>
</div>         
<?	}
	if($payid>55)
	{
		 $sql_pg="select * from payment_process where payment_id=$payid";
		 $res_pg=mysql_query($sql_pg);
		$row_pg=mysql_fetch_array($res_pg);
?>
<table border=0 align=center cellpadding=5 cellspacing=2 width=75%  class="subtable">
  <tr>
    <td class="bluecolour"> Please Click the Button Below to Make your Payment through
      <?=$row_pg['payment_name']?>
    </td>
  </tr>
  <tr>
    <td align=center class="style8"><?php echo $row_pg['buy_form_code']; ?> </td>
  </tr>
</table>
<?php	}
}
else	{
		$npsql="select * from plan where plan_id=".$plan_id;
		$npres=mysql_query($npsql);
		if(!$npres)
		echo "<br>error in sql";
		$nprow=mysql_fetch_array($npres);
		echo "<br><center><font color=red><b>If you want to invest in plan <u>".$nprow['plan_type'].
			"</u> you must be deposited in any one of the following plans</b> </span></center><br>";
		echo '<table border="0" align="center" cellpadding="5" cellspacing="2" width="50%"  bgcolor=#FFFFFF>';
		echo '<tr><td class=tdmain align=center class="style8">Deposit Plans</td></tr>';
		for($i=0;$i<$pcnt;$i++)
		{
			$npsql="select * from plan where plan_id=".$pplan[$i];
			$npres=mysql_query($npsql);
			$nprow=mysql_fetch_array($npres);
			echo "<tr><td>".$nprow['plan_type']."</td></tr>";
		}
		echo "</table>";
}		

	//require 'include/footer.php';
       require 'include/atq_footer.php';
	exit();
}
else
{
	echo '<meta http-equiv="refresh" content="0;url=deposit.php">';
	exit();
}

}?>
