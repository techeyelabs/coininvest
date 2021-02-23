<!--Content Portion Start-->
<?php	
	$fetch=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 7"));
	
	$fetch1=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 8"));
	
	$fetch2=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 13"));
	
	$fetch3=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 21"));
	
	$select_payment_details = mysql_query("select * from payment_process");
	while($fetch_details = mysql_fetch_array($select_payment_details))
	{
		$arr_details[$fetch_details['payment_id']] = $fetch_details['account_id'];
		
	}

	if($_POST['submit'])
	{
		
	
		$alertpay_id = $_POST['alertpay_id'];
		$alertpay_status = $_POST['alertpay_status'];
		$lr_id = $_POST['lr_id'];
		$lr_status = $_POST['lr_status'];
		$acc_name = $_POST['acc_name'];
		$acc_name_status = $_POST['acc_name_status'];
		$cboCountry = $_POST['cboCountry'];
		
		
		
		
		$update=mysql_query("update payment_process set account_id='$alertpay_id' where payment_id = 7 ");
		$update1=mysql_query("update payment_process set account_id='$lr_id' where payment_id = 8 ");
		$update2=mysql_query("update payment_process set  account_id='$acc_name' where payment_id = 13 ");
		$update3=mysql_query("update payment_process set account_id='$cboCountry' where payment_id = 21 ");
		
		for($i=14;$i<=20;$i++)
		{
			
			$update = mysql_query("update payment_process set account_id='".$_POST[$i]."' where payment_id = ".$i);
		}
		
		
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
      
       
					<fieldset>
						<legend><font color="#FF0000">*</font> = Required Fields</legend>
                        
                        
                       
                        
                        <p>
							<label>Liberty Reserve ID  <font color="#FF0000">*</font></label>
							: 
                   <input name="lr_id" type="text" class="mf" id="plan_name" value="<?=$fetch1['account_id']; ?>" />&nbsp;<!--Status : <input type="radio" name="lr_status" value="on" <? if($fetch1['status'] == 'on') echo 'checked="checked"'; ?> 	/>On &nbsp;<input type="radio" name="lr_status" value="off" <? if($fetch1['status'] == 'off') echo 'checked="checked"'; ?> />Off --><br /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                             
						</p>
                        
                         <p>
							<label>AlertPay E-mail Address  <font color="#FF0000">*</font></label>
							: 
                             
                             <input name="alertpay_id" type="text" class="mf" id="plan_name" value="<?=$fetch['account_id']; ?>" />&nbsp;<!--Status : <input type="radio" name="alertpay_status" value="on" <? if($fetch['status'] == 'on') echo 'checked="checked"'; ?> 	/>On &nbsp;<input type="radio" name="alertpay_status" value="off" <? if($fetch['status'] == 'off') echo 'checked="checked"'; ?> />Off --><br /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                              
                             
						</p>
                        
                        
                          <p>
							<label>Beneficiary Account Name <font color="#FF0000">*</font></label>
							: 
          
     <input name="acc_name" type="text" class="mf" id="plan_name" value="<?=$fetch2['account_id']; ?>" />&nbsp;<!--Status : <input type="radio" name="acc_name_status" value="on" <? if($fetch2['status'] == 'on') echo 'checked="checked"'; ?> 	/>On &nbsp;<input type="radio" name="acc_name_status" value="off" <? if($fetch2['status'] == 'off') echo 'checked="checked"'; ?> />Off --><br /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
						</p>
                        
                        
                         <p>
							<label>Beneficiary Account Name <font color="#FF0000">*</font></label>
							: 
          
     <input name="acc_name" type="text" class="mf" id="plan_name" value="<?=$fetch2['account_id']; ?>" />&nbsp;<!--Status : <input type="radio" name="acc_name_status" value="on" <? if($fetch2['status'] == 'on') echo 'checked="checked"'; ?> 	/>On &nbsp;<input type="radio" name="acc_name_status" value="off" <? if($fetch2['status'] == 'off') echo 'checked="checked"'; ?> />Off --><br /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
						</p>
                        
                        
                          <p>
							<label> Beneficiary Account Number <font color="#FF0000">*</font></label>
							: 
          
     <input name="14" type="text" class="mf" id="plan_name" value="<?=$arr_details[14]; ?>" />
						</p>
                           <p>
							<label>   Beneficiary Bank Name  <font color="#FF0000">*</font></label>
							: 
 <input name="15" type="text" class="mf" id="plan_name" value="<?=$arr_details[15]; ?>" />
						</p>
                        
                          <p>
							<label> SWIFT  Code (BIC) <font color="#FF0000">*</font></label>
							: 
<input name="16" type="text" class="mf" id="plan_name" value="<?=$arr_details[16]; ?>" />
						</p>
                        
                        
                         <p>
							<label>  Bank Address  <font color="#FF0000">*</font></label>
							: 
  <input name="17" type="text" class="mf" id="plan_name" value="<?=$arr_details[17]; ?>" />				
  		</p>
                            <p>
							<label>    Bank City  <font color="#FF0000">*</font></label>
							: 
  <input name="18" type="text" class="mf" id="plan_name" value="<?=$arr_details[18]; ?>" />  
  		</p>
         <p>
							<label>  Bank State/Province <font color="#FF0000">*</font></label>
							: 
<input name="19" type="text" class="mf" id="plan_name" value="<?=$arr_details[19]; ?>" />  		</p>
  <p>
							<label> Bank Zip/Postal Code <font color="#FF0000">*</font></label>
							: 
<input name="20" type="text" class="mf" id="plan_name" value="<?=$arr_details[20]; ?>" /> 
		</p>
 <p>
							<label>  Bank Country  <font color="#FF0000">*</font></label>
							: 
<? CreateOption('Country',$fetch3['account_id'],'country_master')?>		</p>

  <div class="clearboth"></div>
						
						<p align="center" >
                          <input type="hidden" name="submit" value="1" />
                          
                            <input class="button" type="submit" id="update" name="update" value="Update" />
                        </p>
                        
                        </fieldset>
        </form>
           </table>
   
    <div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
<!--Content Portion End-->
<?php
unset($_SESSION['succ_dir']);
?>