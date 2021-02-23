<style>
p label {
    display: inline-block;
    font-size: 11px;
    vertical-align: middle;
    width: 160px;
}
</style><!--Content Portion Start-->
<?php
 if(!in_array("Settings",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }

	
	$fetch=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 7"));
	
	
	$fetch1=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 8"));
	
	$fetch11=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 11"));
	
	$bank=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 13"));
	
	$fetch3=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 21"));
	
	$fetchgdb=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 23"));
	
	$fetchstp=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 28"));
	
	$stp_hashword=mysql_fetch_array(mysql_query("select * from payment_process where payment_id ='29'"));
	
	$stp_button = mysql_fetch_array(mysql_query("select * from payment_process where payment_id ='37'"));
	
	
	$lrstore=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = '24'"));
	$lrstoresecurityword=mysql_fetch_array(mysql_query("select * from payment_process where payment_id ='25'"));
	
	$pm_hashword=mysql_fetch_array(mysql_query("select * from payment_process where payment_id ='26'"));
	
	$alert_word=mysql_fetch_array(mysql_query("select * from payment_process where payment_id ='27'"));
	
	$fetch_ego=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 30"));
	$fetch_ego1=mysql_fetch_array(mysql_query("select * from payment_process where payment_id =33"));
			
	$fetch_ego2=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 31"));
	$fetch_ego3=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 32"));
	
	$fetch_egoapi1=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 34"));
	$fetch_egoapi2=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 35"));
	$fetch_egoapi3=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 36"));

	$fetch_paypal=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 3"));
	$fetch_bitcoin=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 38"));
	$fetch_payeer=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 39"));
	$fetch_neteller=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 40"));
	$fetch_skrill=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 41"));
	$fetch_advcash=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 42"));
	
	
	 
	$bwacc=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = '14'"));
	$bankname=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = '15'"));
	$routing=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = '16'"));
	$bankaddress=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = '17'"));
	$bankcity=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = '18'"));
	$bankstate=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = '19'"));
	$bankcountry=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = '21'"));
    $bankzipcode=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = '20'"));




	
	
	$select_payment_details = mysql_query("select * from payment_process");
	while($fetch_details = mysql_fetch_array($select_payment_details))
	{
		$arr_details[$fetch_details['payment_id']] = $fetch_details['account_id'];
		
	}

	if($_POST['submit'])
	{
		
	
		//INSTANT PAYMENT//
	
		//$update_instant1 = mysql_query("update instant_pay set payout_info='".$_POST['instant_pay1']."' where pay_id=1");
		//$update_instant2 = mysql_query("update instant_pay set payout_info='".$_POST['instant_pay2']."' where pay_id=2");
		$update_instant3 = mysql_query("update instant_pay set payout_info='".$_POST['instant_pay3']."' where pay_id=3");
		$update_instant4 = mysql_query("update instant_pay set payout_info='".$_POST['instant_pay4']."' where pay_id=4");
		$update_instant5 = mysql_query("update instant_pay set payout_info='".$_POST['instant_pay5']."' where pay_id=5");
		$update_instant6 = mysql_query("update instant_pay set payout_info='".$_POST['instant_pay6']."' where pay_id=6");
        
        $update_instant8 = mysql_query("update instant_pay set payout_info='".$_POST['instant_pay8']."' where pay_id=8");
		$update_instant9 = mysql_query("update instant_pay set payout_info='".$_POST['instant_pay9']."' where pay_id=9");
		$update_instant10 = mysql_query("update instant_pay set payout_info='".$_POST['instant_pay10']."' where pay_id=10");
		

		
		$update_instant7 = mysql_query("update admin_settings set set_value='".$_POST['ins_withdraw_min']."' where set_id=34");
		$update_instant8 = mysql_query("update admin_settings set set_value='".$_POST['ins_withdraw_max']."' where set_id=35");
		
		if(isset($_POST['lr_store']))
		mysql_query("update payment_process set account_id='".$_POST['lr_store']."' where payment_id=24");

		if(isset($_POST['lr_store_securityword']))
		mysql_query("update payment_process set account_id='".$_POST['lr_store_securityword']."' where payment_id =25");
		
		if(isset($_POST['pm_hash']))
		mysql_query("update payment_process set account_id='".$_POST['pm_hash']."' where payment_id =26");
		
		//if(isset($_POST['alert_word']))
		//mysql_query("update payment_process set account_id='".$_POST['alert_word']."' where payment_id =27");
		
		if(isset($_POST['stp_hash']))
		mysql_query("update payment_process set account_id='".$_POST['stp_hash']."' where payment_id =29");
		
	
		if(isset($_POST['stp_button']))
		mysql_query("update payment_process set account_id='".$_POST['stp_button']."' where payment_id =37");


		if(isset($_POST['bank_name']))
		mysql_query("update payment_process set account_id='".$_POST['bank_name']."' where payment_id=15");
		 
                       
		if(isset($_POST['routing_num']))
		mysql_query("update payment_process set account_id='".$_POST['routing_num']."' where payment_id=16"); 
		
		if(isset($_POST['bank_address']))
		mysql_query("update payment_process set account_id='".$_POST['bank_address']."' where payment_id=17"); 
		
		if(isset($_POST['bank_city']))
		mysql_query("update payment_process set account_id='".$_POST['bank_city']."' where payment_id=18"); 
		
		if(isset($_POST['bank_state']))
		mysql_query("update payment_process set account_id='".$_POST['bank_state']."' where payment_id=19"); 
		
		if(isset($_POST['bank_country']))
		mysql_query("update payment_process set account_id='".$_POST['bank_country']."' where payment_id=21"); 
		
		if(isset($_POST['bank_zip']))
		mysql_query("update payment_process set account_id='".$_POST['bank_zip']."' where payment_id=20"); 
					   
					  
/*		$_POST['Withdrawal']=1=> Instant  $_POST['Withdrawal']=2=> Manual  */
			//mysql_query("update admin_settings set set_value='".$_POST['Withdrawal']."' where set_id=40");

		
		$egopay_id = $_POST['egopay_id'];
	
	
		$egopay_pwd = $_POST['egopay_pwd'];

		$egopay_status = $_POST['egopay_status'];
		
		
			
			
		$egopay_storename=$_POST['egopay_storename'];
		$egopay_storeid=$_POST['egopay_storeid'];
	
		$egopay_apiid=$_POST['egopay_apiid'];
		$egopay_apipwd=$_POST['egopay_apipwd'];
		$egopay_apiname=$_POST['egopay_apiname'];
		$bw_acc=$_POST['bw_acc'];
		//$alertpay_id = $_POST['alertpay_id'];
		//$alertpay_status = $_POST['alrstatus'];
		/*if($alertpay_status != '')
		{
			$alertpay_status='on';
		}
		else
		{
		$alertpay_status='off';
		}*/
		
		$lr_id = $_POST['lr_id'];
		$lr_status = $_POST['lrstatus'];
		if($lr_status != '')
		{
			$lr_status='on';
		}
		else
		{
		$lr_status='off';
		}
		
		$paypal_id = $_POST['paypal_id'];
		$paypalstatus = $_POST['paypalstatus'];
		
		if($paypalstatus != '')
		{
			$paypalstatus='on';
		}
		else
		{
		$paypalstatus='off';
		}

		$bitcoin_id = $_POST['bitcoin_id'];
		$batch_id = $_POST['batch_id'];
		$buy_form_code = $_POST['buy_form_code'];
		$bitcoinstatus = $_POST['bitcoinstatus'];
		
		if($bitcoinstatus != '')
		{
			$bitcoinstatus='on';
		}
		else
		{
		$bitcoinstatus='off';
		}

		$payeer_id = $_POST['payeer_id'];
		$payeerstatus = $_POST['payeerstatus'];
		
		if($payeerstatus != '')
		{
			$payeerstatus='on';
		}
		else
		{
		$payeerstatus='off';
		}

		$neteller_id = $_POST['neteller_id'];
		$netellerstatus = $_POST['netellerstatus'];
		
		if($netellerstatus != '')
		{
			$netellerstatus='on';
		}
		else
		{
		$netellerstatus='off';
		}


		$skrill_id = $_POST['skrill_id'];
		$skrillstatus = $_POST['skrillstatus'];
		
		if($skrillstatus != '')
		{
			$skrillstatus='on';
		}
		else
		{
		$skrillstatus='off';
		}


		$pm_id = $_POST['pm_id'];
		$pm_status = $_POST['perstatus'];
		
		if($pm_status != '')
		{
			$pm_status='on';
		}
		else
		{
		$pm_status='off';
		}

		$advcash_email = $_POST['advcash_email'];
		$advcash_id = $_POST['advcash_id'];
		$advcash_key = $_POST['advcash_key'];
		$adv_status = $_POST['advcashstatus'];
		$adv_withdraw = $_POST['withdraw_option_advcash'];
		
		if($adv_status != '')
		{
			$adv_status='on';
		}
		else
		{
		$adv_status='off';
		}


		$stpstatus = $_POST['stpstatus'];
		if($stpstatus != '')
		{
			$stpstatus='on';
		}
		else
		{
		$stpstatus='off';
		}
		
		$grbstatus = $_POST['grbstatus'];
		if($grbstatus != '')
		{
			$grbstatus='on';
		}
		else
		{
		$grbstatus='off';
		}

	if(isset($_POST['bankwire']) && $_POST['bankwire'] != '' )
		{
			$bankwire = 'on';
		}
		else
		{
			$bankwire = 'off';
		}
		
		
		
		$cboCountry = $_POST['cboCountry'];
		$stp_id = $_POST['stp_id'];
		$gdb_id = $_POST['gdb_id'];
		$withdraw_option_lr = $_POST['withdraw_option_lr'];
		$withdraw_option_alert = $_POST['withdraw_option_alert'];
		$withdraw_option_pm = $_POST['withdraw_option_pm'];
		$withdraw_option_gdb = $_POST['withdraw_option_gdb'];
		$withdraw_option_stp = $_POST['withdraw_option_stp'];
		$withdraw_option_bw = $_POST['withdraw_option_bw'];

		$withdraw_option_paypal = $_POST['withdraw_option_paypal'];
		$withdraw_option_bitcoin = $_POST['withdraw_option_bitcoin'];
		$withdraw_option_payeer = $_POST['withdraw_option_payeer'];
		$withdraw_option_neteller = $_POST['withdraw_option_neteller'];
		$withdraw_option_skrill = $_POST['withdraw_option_skrill'];

		$payeer_key = $_POST['payeer_key'];
		$neteller_key = $_POST['neteller_key'];
		$skrill_key = $_POST['skrill_key'];

		

		
	
		
		//$update=mysql_query("update payment_process set account_id='".$alertpay_id."',status='".$alertpay_status."',withdraw_option='".$withdraw_option_alert."' where payment_id = 7 ");
		//echo "update payment_process set account_id='".$egopay_id."',status='".$egopay_status."',withdraw_option='".$withdraw_option_alert."' where payment_id = 30 ";exit;
		/*$update_ego=mysql_query("update payment_process set account_id='".$egopay_id."',status='".$egopay_status."',withdraw_option='".$withdraw_option_alert."' where payment_id = 30 ");
			
			
			$update_ego1=mysql_query("update payment_process set account_id='".$egopay_pwd."' where payment_id = 31");
			
			
			$update_ego2=mysql_query("update payment_process set account_id='".$egopay_storeid."' where payment_id = 32");
			
			paypal---3
Bitcoin --38
Payeer --39
Neteller--40
Skrill--41
			
			$update_ego3=mysql_query("update payment_process set account_id='".$egopay_storename."' where payment_id = 33");
			
			$update_ego3=mysql_query("update payment_process set account_id='".$egopay_apiname."' where payment_id = 34");
			$update_ego3=mysql_query("update payment_process set account_id='".$egopay_apiid."' where payment_id = 35");
			$update_ego3=mysql_query("update payment_process set account_id='".$egopay_apipwd."' where payment_id = 36");
			*/

		$update3=mysql_query("update payment_process set account_id='".$paypal_id."',status='".$paypalstatus."',withdraw_option='".$withdraw_option_paypal."' where payment_id = 3 ");

		$update38=mysql_query("update payment_process set account_id='".$bitcoin_id."',status='".$bitcoinstatus."',withdraw_option='".$withdraw_option_bitcoin."',batch_id='".$batch_id."',buy_form_code='".$buy_form_code."' where payment_id = 38 ");
		
		/*$update38=mysql_query("update payment_process set account_id='".$bitcoin_id."',status='".$bitcoinstatus."',withdraw_option='".$withdraw_option_bitcoin."' where payment_id = 38 ");
*/
		$update39=mysql_query("update payment_process set account_id='".$payeer_id."',batch_id='".$payeer_key."',status='".$payeerstatus."',withdraw_option='".$withdraw_option_payeer."' where payment_id = 39 ");

		$update40=mysql_query("update payment_process set account_id='".$neteller_id."',batch_id='".$neteller_key."',status='".$netellerstatus."',withdraw_option='".$withdraw_option_neteller."' where payment_id = 40 ");

		$update41=mysql_query("update payment_process set account_id='".$skrill_id."',batch_id='".$skrill_key."',status='".$skrillstatus."',withdraw_option='".$withdraw_option_skrill."' where payment_id = 41 ");
        
        $update42=mysql_query("update payment_process set account_id='".$advcash_email."',batch_id='".$advcash_id."',spwd='".$advcash_key."',status='".$adv_status."',withdraw_option='".$adv_withdraw."' where payment_id = 42 ");
				
		$update1=mysql_query("update payment_process set account_id='".$lr_id."',status='".$lr_status."',withdraw_option='".$withdraw_option_lr."' where payment_id = 8 ");
	//echo "update payment_process set status='$bankwire' where payment_id = 13"; exit;
		$updatebank=mysql_query("update payment_process set status='$bankwire' where payment_id = 13");	

		


		$update11=mysql_query("update payment_process set account_id='".$pm_id."',status='".$pm_status."',withdraw_option='".$withdraw_option_pm."' where payment_id = 11 ");
	
		
		$updategdb=mysql_query("update payment_process set account_id='".$gdb_id."',status='".$grbstatus."',withdraw_option='".$withdraw_option_gdb."' where payment_id = 23 ");
		$updatestp=mysql_query("update payment_process set account_id='".$stp_id."',status='".$stpstatus."',withdraw_option='".$withdraw_option_stp."' where payment_id = 28 ");
		
		
	    $updateacc=mysql_query("update payment_process set account_id='$bw_acc' where payment_id = 14");

		
	/*	for($i=14;$i<=20;$i++)
		{
			$update = mysql_query("update payment_process set account_id='".$_POST[$i]."' where payment_id = ".$i);
		}
		*/
		
		$_SESSION['succ_dir']='<font color="#006600">Successfully Updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=payment_settings.php" />';
		exit();
	}
	
	
?>
<!--Content Portion Start-->
<div id="primary_right">
 <div class="inner" style="width:900px">
<?php require 'include/top/site_settings.php'; ?>
					 <!-- end dashboard items -->

					<hr />
                    <h1>Payment Information</h1>
                    
                    
                     <?php if($_SESSION['succ_dir'] != '')
					  { 
					  echo '<div class="notification success"> 
							<span></span> 
							<div class="text"> 
							<p><strong>Success!</strong>'.$_SESSION['succ_dir'].'</p> 
							</div> 
						 </div>';
						} ?>


                     <?php if($_SESSION['empty_pass'] != '')
					  { 
					  echo '<div class="notification error" style="cursor: auto;"> 
						<span></span> 
						<div class="text"> 
							<p><strong><cufon class="cufon cufon-canvas" alt="Error!" style="width: 52px; height: 22px;"><canvas width="70" height="23" style="width: 70px; height: 23px; top: -1px; left: -1px;"></canvas><cufontext>Error!</cufontext></cufon></strong><font size="1" color="#ff0000">'.$_SESSION['empty_pass'].'</font></p> 
						</div> 
					</div>';
						} ?>

     <form name='form1' method='post' action="payment_settings.php" >
      
       
					<!--<fieldset>
						<legend>Liberty Reserve &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font> = Required Fields</legend>
                        
                          <p>
							<label>Liberty Reserve ID  <font color="#FF0000">*</font></label>
							: 
                 <input name="lr_id" type="password" class="mf" id="plan_name" value="<?php echo $fetch1['account_id']; ?>" />&nbsp;Status : <input type="checkbox" <?php  if($fetch1['status'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="lrstatus" />&nbsp;Withdraw Option : <input type="radio" name="withdraw_option_lr" value="0" <?php  if($fetch1['withdraw_option'] == '0') echo 'checked="checked"'; ?> 	/>Manual  &nbsp;<input type="radio" name="withdraw_option_lr" value="1" <?php if($fetch1['withdraw_option'] == '1') echo 'checked="checked"'; ?> />Instant <br /><?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                             
						</p>
                   
                         <p>
							<label>Liberty Reserve Store Name  <font color="#FF0000">*</font></label>
							: 
               			  <input name="lr_store" type="password" class="mf" id="lr_store" value="<?php echo $lrstore['account_id']; ?>" />
                             
						</p>
                        
                         <p>
							<label>Liberty Reserve Store Security Word  <font color="#FF0000">*</font></label>
							: 
               			  <input name="lr_store_securityword" type="password" class="mf" id="lr_store_securityword" value="<?php echo $lrstoresecurityword['account_id']; ?>" />
                             
                            
						</p>
                        

                        
                         

                             
						
                        
                          <p>
							<label style="width:168px;"><strong>Instant Payment Settings</strong></label>
							                         
						</p>
                        <?php
					$seelct_ins1 = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=1"));
					$seelct_ins2 = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=2"));
					$seelct_ins3 = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=3"));
					$seelct_ins4 = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=4"));
					$seelct_ins5 = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=5"));
					$seelct_ins6 = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=6"));
					
				?>
                       
                       <p>
							<label><?php echo $seelct_ins5['payment_info']; ?></label>
							: <input name="instant_pay5" type="password" class="mf" id="instant_pay5" value="<?php echo $seelct_ins5['payout_info']; ?>" />                        
						</p>
                        
                           <p>
							<label style="width:168px;"><?php echo $seelct_ins6['payment_info']; ?></label>
							: <input name="instant_pay6" type="password" class="mf" id="instant_pay6" value="<?php echo $seelct_ins6['payout_info']; ?>" />                        
						</p>
        
               
                 </fieldset>-->
    
      
        
      
       
					<fieldset>
						<legend>Perfect Money &nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font> = Required Fields</legend>
                        
                          <p>
							<label>Perfect Money ID  <font color="#FF0000">*</font></label>
							: 
             <input name="pm_id" type="password" class="mf" id="plan_name" value="<?php echo $fetch11['account_id']; ?>" />&nbsp;Status : <input type="checkbox" <?php if($fetch11['status'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="perstatus" />&nbsp;Withdraw Option : <input type="radio" name="withdraw_option_pm" value="0" <?php if($fetch11['withdraw_option'] == '0') echo 'checked="checked"'; ?> 	/>Manual  &nbsp;<input type="radio" name="withdraw_option_pm" value="1" <?php if($fetch11['withdraw_option'] == '1') echo 'checked="checked"'; ?> />Instant<br /><?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                             
						</p>
                   
                         <p>
							<label>Perfect Money Phrase Hash <font color="#FF0000">*</font></label>
							: 
             <input name="pm_hash" type="password" class="mf" id="pm_hash" value="<?php echo $pm_hashword['account_id']; ?>" />
                             
						</p>
                           
                        <!--<p>
							<label>Withdrawal <font color="#FF0000">*</font></label>
							: 
                            	Instant Withdrawal
                        
                         
                             <?php 
               if($Withdrawal['set_value'] == '1')
				{
					//echo '<input checked="checked" type="radio" name="Withdrawal" id="Withdrawal" value="1" />';
				}
				else
				{
				//echo '<input type="radio" name="Withdrawal" id="Withdrawal" value="1" />';
				}
				?>
                Manual Withdrawal
                <?php 
               if($Withdrawal['set_value'] == '2')
				{
				//	echo ' <input type="radio" checked="checked"  name="Withdrawal" id="geWithdrawalnder" value="2" />';
				}
				else
				{
				//echo ' <input type="radio" name="Withdrawal" id="geWithdrawalnder" value="2" />';
				}
				?>
              
						</p>-->

                        
                         

                             
						
                        
                          <p>
							<label style="width:168px;"><strong>Instant Payment Settings</strong></label>
							                         
						</p>
                        <?php
					$seelct_ins1 = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=1"));
					$seelct_ins2 = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=2"));
					$seelct_ins3 = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=3"));
					$seelct_ins4 = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=4"));
					$seelct_ins5 = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=5"));
					$seelct_ins6 = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=6"));
					
				?>
                
                <!--/*<p>
					<label><?php echo $seelct_ins1['payment_info']; ?></label>
							: 
					<input name="instant_pay1" type="password" class="tbox1" id="instant_pay1" value="<?php echo $seelct_ins1['payout_info']; ?>" />                           
						</p>
                        
                         <p>
							<label ><?php echo $seelct_ins2['payment_info']; ?></label>

							: <input name="instant_pay2" type="password" class="tbox1" id="instant_pay2" value="<?php echo $seelct_ins2['payout_info']; ?>" />                        
						</p>*/-->
                       
                       <p>
							<label><?php echo $seelct_ins3['payment_info']; ?></label>
							: <input name="instant_pay3" type="password" class="mf" id="instant_pay3" value="<?php echo $seelct_ins3['payout_info']; ?>" />                        
						</p>
                           <p>
							<label style="width:168px;"><?php echo $seelct_ins4['payment_info']; ?></label>
							: <input name="instant_pay4" type="password" class="mf" id="instant_pay4" value="<?php echo $seelct_ins4['payout_info']; ?>" />                        
						</p>
                        
               
                 </fieldset>
 
        		
					<fieldset>
						<legend>Paypal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font> = Required Fields</legend>
                        
                          <p>
							<label>paypal Merchant ID  <font color="#FF0000">*</font></label>
							: 
             <input name="paypal_id" type="password" class="mf" id="paypal_id" value="<?php echo $fetch_paypal['account_id']; ?>" />&nbsp;Status : <input type="checkbox" <?php if($fetch_paypal['status'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="paypalstatus" />&nbsp;Withdraw Option : <input type="radio" name="withdraw_option_paypal" value="0" <?php if($fetch_paypal['withdraw_option'] == '0') echo 'checked="checked"'; ?> 	/>Manual  &nbsp;<input type="radio" name="withdraw_option_paypal" value="1" <?php if($fetch_paypal['withdraw_option'] == '1') echo 'checked="checked"'; ?> />Instant<br /> <?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                             
						</p>
						
						<!-- 
                    	 <p>
							<label>paypal Password <font color="#FF0000">*</font></label>: 
             				<input name="stp_hash" type="password" class="mf" id="stp_hash" value="<?php echo $stp_hashword['account_id']; ?>" />
						</p> 
						
						
						
                    	 <p>
							<label>Button Name<font color="#FF0000">*</font></label>: 
             				<input name="stp_button" type="password" class="mf" id="stp_button" value="<?php echo $stp_button['account_id']; ?>" />
						</p>-->


						
						
                 </fieldset>


                 <fieldset>
						<legend>Bitcoin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font> = Required Fields</legend>
                        
                          <p>
							<label>Bitcoin Merchant ID  <font color="#FF0000">*</font></label>
							: 
             <input name="bitcoin_id" type="password" class="mf" id="bitcoin_id" value="<?php echo $fetch_bitcoin['account_id']; ?>" />&nbsp;Status : <input type="checkbox" <?php if($fetch_bitcoin['status'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="bitcoinstatus" />&nbsp;Withdraw Option : <input type="radio" name="withdraw_option_bitcoin" value="0" <?php if($fetch_bitcoin['withdraw_option'] == '0') echo 'checked="checked"'; ?> 	/>Manual  &nbsp;<input type="radio" name="withdraw_option_bitcoin" value="1" <?php if($fetch_bitcoin['withdraw_option'] == '1') echo 'checked="checked"'; ?> />Instant<br /><?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                             
						</p>
								    <p>
					<label>Bitcoin Private  Key</label>
							: 
             <input name="batch_id" type="text" class="mf" id="batch_id" value="<?php echo $fetch_bitcoin['batch_id']; ?>" />

						</p>

								    <p>
					<label>Bitcoin Secret Key</label>
							: 
             <input name="buy_form_code" type="text" class="mf" id="buy_form_code" value="<?php echo $fetch_bitcoin['buy_form_code']; ?>" />

                             
						</p>
						<!-- 
						
                    	 <p>
							<label>Bitcoin Password <font color="#FF0000">*</font></label>: 
             				<input name="stp_hash" type="password" class="mf" id="stp_hash" value="<?php echo $stp_hashword['account_id']; ?>" />
						</p>
						
						
						
                    	 <p>
							<label>Button Name<font color="#FF0000">*</font></label>: 
             				<input name="stp_button" type="password" class="mf" id="stp_button" value="<?php echo $stp_button['account_id']; ?>" />
						</p>

 -->

						
						
                 </fieldset>


                 <fieldset>
						<legend>Payeer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font> = Required Fields</legend>
                        
                          <p>
							<label>Payeer Merchant ID  <font color="#FF0000">*</font></label>
							: 
             <input name="payeer_id" type="password" class="mf" id="payeer_id" value="<?php echo $fetch_payeer['account_id']; ?>" />&nbsp;Status : <input type="checkbox" <?php if($fetch_payeer['status'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="payeerstatus" />&nbsp;Withdraw Option : <input type="radio" name="withdraw_option_payeer" value="0" <?php if($fetch_payeer['withdraw_option'] == '0') echo 'checked="checked"'; ?> 	/>Manual  &nbsp;<input type="radio" name="withdraw_option_payeer" value="1" <?php if($fetch_payeer['withdraw_option'] == '1') echo 'checked="checked"'; ?> />Instant<br />  <?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                             
						</p>
						
						
                    	 <p>
							<label>Payeer Merchant Key/Password <font color="#FF0000">*</font></label>: 
             				<input name="payeer_key" type="password" class="mf" id="payeer_key" value="<?php echo $fetch_payeer['batch_id']; ?>" />
						</p>
						
						<!-- 
						
                    	 <p>
							<label>Button Name<font color="#FF0000">*</font></label>: 
             				<input name="stp_button" type="password" class="mf" id="stp_button" value="<?php echo $stp_button['account_id']; ?>" />
						</p> -->



						
						
                 </fieldset>


                 <fieldset>
						<legend>Neteller &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font> = Required Fields</legend>
                        
                          <p>
							<label>Neteller Merchant ID  <font color="#FF0000">*</font></label>
							: 
             <input name="neteller_id" type="password" class="mf" id="neteller_id" value="<?php echo $fetch_neteller['account_id']; ?>" />&nbsp;Status : <input type="checkbox" <?php if($fetch_neteller['status'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="netellerstatus" />&nbsp;Withdraw Option : <input type="radio" name="withdraw_option_neteller" value="0" <?php if($fetch_neteller['withdraw_option'] == '0') echo 'checked="checked"'; ?> 	/>Manual  &nbsp;<input type="radio" name="withdraw_option_neteller" value="1" <?php if($fetch_neteller['withdraw_option'] == '1') echo 'checked="checked"'; ?> />Instant<br /><?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                             
						</p>
						
						
                    	 <p>
							<label>Neteller Merchant Key/Password <font color="#FF0000">*</font></label>: 
             				<input name="neteller_key" type="password" class="mf" id="neteller_key" value="<?php echo $fetch_neteller['batch_id']; ?>" />
						</p>
						
						<!-- 
						
                    	 <p>
							<label>Button Name<font color="#FF0000">*</font></label>: 
             				<input name="stp_button" type="password" class="mf" id="stp_button" value="<?php echo $stp_button['account_id']; ?>" />
						</p>
 -->


						
						
                 </fieldset>


                 <fieldset>
						<legend>Skrill &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font> = Required Fields</legend>
                        
                          <p>
							<label>Skrill Merchant ID  <font color="#FF0000">*</font></label>
							: 
             <input name="skrill_id" type="password" class="mf" id="skrill_id" value="<?php echo $fetch_skrill['account_id']; ?>" />&nbsp;Status : <input type="checkbox" <?php if($fetch_skrill['status'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="skrillstatus" />&nbsp;Withdraw Option : <input type="radio" name="withdraw_option_skrill" value="0" <?php if($fetch_skrill['withdraw_option'] == '0') echo 'checked="checked"'; ?> 	/>Manual  &nbsp;<input type="radio" name="withdraw_option_skrill" value="1" <?php if($fetch_skrill['withdraw_option'] == '1') echo 'checked="checked"'; ?> />Instant<br />  <?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                             
						</p>
						
						
                    	 <p>
							<label>Skrill Merchant Key/Password <font color="#FF0000">*</font></label>: 
             				<input name="skrill_key" type="password" class="mf" id="skrill_key" value="<?php echo $fetch_skrill['batch_id']; ?>" />
						</p>
						
						<!-- 
						
                    	 <p>
							<label>Button Name<font color="#FF0000">*</font></label>: 
             				<input name="stp_button" type="password" class="mf" id="stp_button" value="<?php echo $stp_button['account_id']; ?>" />
						</p>


 -->
						
						
                 </fieldset>


     
      
       
					<fieldset>
						<legend>STP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font> = Required Fields</legend>
                        
                          <p>
							<label>STP ID  <font color="#FF0000">*</font></label>
							: 
             <input name="stp_id" type="password" class="mf" id="stp_id" value="<?php echo $fetchstp['account_id']; ?>" />&nbsp;Status : <input type="checkbox" <?php if($fetchstp['status'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="stpstatus" />&nbsp;Withdraw Option : <input type="radio" name="withdraw_option_stp" value="0" <?php if($fetchstp['withdraw_option'] == '0') echo 'checked="checked"'; ?> 	/>Manual  &nbsp;<input type="radio" name="withdraw_option_stp" value="1" <?php if($fetchstp['withdraw_option'] == '1') echo 'checked="checked"'; ?> />Instant<br /><?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                             
						</p>
						
						
                    	 <p>
							<label>Solid Trust Pay Secondary Password <font color="#FF0000">*</font></label>: 
             				<input name="stp_hash" type="password" class="mf" id="stp_hash" value="<?php echo $stp_hashword['account_id']; ?>" />
						</p>
						
						
						
                    	 <p>
							<label>Button Name<font color="#FF0000">*</font></label>: 
             				<input name="stp_button" type="password" class="mf" id="stp_button" value="<?php echo $stp_button['account_id']; ?>" />
						</p>



						
						
                 </fieldset>


					<fieldset>
						<legend>Advcash &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font> = Required Fields</legend>
                        
                          <p>
							<label>Advcash Merchant Email  <font color="#FF0000">*</font></label>
							: 
             <input name="advcash_email" type="password" class="mf" id="advcash_email" value="<?php echo $fetch_advcash['account_id']; ?>" />&nbsp;Status : <input type="checkbox" <?php if($fetch_advcash['status'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="advcashstatus" />&nbsp;Withdraw Option : <input type="radio" name="withdraw_option_advcash" value="0" <?php if($fetch_advcash['withdraw_option'] == '0') echo 'checked="checked"'; ?> 	/>Manual  &nbsp;<input type="radio" name="withdraw_option_advcash" value="1" <?php if($fetch_advcash['withdraw_option'] == '1') echo 'checked="checked"'; ?> />Instant<br /><?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                             
						</p>
						
						
                    	 <p>
							<label>Advcash Merchant ID<font color="#FF0000">*</font></label>: 
             				<input name="advcash_id" type="password" class="mf" id="advcash_id" value="<?php echo $fetch_advcash['batch_id']; ?>" />
						</p>
						
						
						
                    	 <p>
							<label>Advcash Merchant Key/Password<font color="#FF0000">*</font></label>: 
             				<input name="advcash_key" type="password" class="mf" id="advcash_key" value="<?php echo $fetch_advcash['spwd']; ?>" />
						</p>


                   <p>
							<label style="width:168px;"><strong>Instant Payment Settings</strong></label>
							                         
						</p>
                        <?php
					$seelct_ins8 = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=8"));
					$seelct_ins9 = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=9"));
					$seelct_ins10 = mysql_fetch_array(mysql_query("select * from instant_pay where pay_id=10"));
					
					
				?>
				  <p>
							<label><?php echo $seelct_ins8['payment_info']; ?></label>
							: <input name="instant_pay8" type="password" class="mf" id="instant_pay8" value="<?php echo $seelct_ins8['payout_info']; ?>" />                        
						</p>
                           <p>
							<label style="width:168px;"><?php echo $seelct_ins9['payment_info']; ?></label>
							: <input name="instant_pay9" type="password" class="mf" id="instant_pay9" value="<?php echo $seelct_ins9['payout_info']; ?>" />                        
						</p>
						<p>
							<label style="width:168px;"><?=$seelct_ins10['payment_info']; ?></label>
							: <input name="instant_pay10" type="password" class="mf" id="instant_pay10" value="<?php echo $seelct_ins10['payout_info']; ?>" />                        
						</p>
						
						
                 </fieldset>
                 
                 
                 <fieldset>
						<legend>Bank Wire &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font> = Required Fields</legend>
                        
                        
                          <p>
							<label>Bank Wire <font color="#FF0000">*</font></label>
							: 
                          <input type="checkbox" <?php if($bank['status'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="bankwire" /> 
						</p>
                   
                         <p>
							<label>Benificiary Account Number<font color="#FF0000">*</font></label>
							: 
               			 <input name="bw_acc" type="password" class="mf" id="bw_acc" value="<?php echo $bwacc['account_id']; ?>" /> 
                             
						</p>
                        
                         <p>
							<label>Beneficiary Bank Name <font color="#FF0000">*</font></label>
							: 
               			  <input name="bank_name" type="password" class="mf" id="bank_name" value="<?php echo $bankname['account_id']; ?>" />
                             
                            
						</p>
                        
                   
   
                         <p>
							<label>Routing Transfer Number (or) SWIFT Code (BIC)<font color="#FF0000">*</font></label>
							: 
               			  <input name="routing_num" type="password" class="mf" id="routing_num" value="<?php echo $routing['account_id']; ?>" />
                             
                            
						</p>
                        
                        <p>
							<label>Bank Address<font color="#FF0000">*</font></label>
							: 
               			  <input name="bank_address" type="password" class="mf" id="bank_address" value="<?php echo $bankaddress['account_id']; ?>" />
                             
                            
						</p>
                        
                         <p>
							<label>Bank City<font color="#FF0000">*</font></label>
							: 
               			  <input name="bank_city" type="password" class="mf" id="bank_city" value="<?php echo $bankcity['account_id']; ?>" />
                             
                            
						</p>
                        
                    <p>
							<label>Bank State/Province<font color="#FF0000">*</font></label>
							: 
               			  <input name="bank_state" type="password" class="mf" id="bank_state" value="<?php echo $bankstate['account_id']; ?>" />
                             
                            
						</p>
                        
                        
                         <p>
							<label>Bank Country<font color="#FF0000">*</font></label>
							: 
               			  <input name="bank_country" type="password" class="mf" id="bank_country" value="<?php echo $bankcountry['account_id']; ?>" />
                             
                            
						</p>
                        
                        <p>
							<label>Bank Zip/Postal Code<font color="#FF0000">*</font></label>
							: 
               			  <input name="bank_zip" type="password" class="mf" id="bank_zip" value="<?php echo $bankzipcode['account_id']; ?>" />
                             
                            
						</p>
                        
                         
                         
                          <div class="clearboth"></div>
						
						<p style="padding-left:200px;">
                        <input type="hidden" name="submit" value="1" />
                        
                        <input class="button" type="submit" value="UPDATE"  name="update" id="update"/> <!--<input class="button" type="reset" value="Reset" />--></p>
                        
                 
                         
               
                 </fieldset>
                 
                 
                 
                 
                 
        </form>
          
   
    <div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
<!--Content Portion End-->
<?php
unset($_SESSION['succ_dir']);
unset($_SESSION['empty_pass']);

?>
