<?php 
 if(!in_array("Settings",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
 						$fetch71=mysql_fetch_assoc(mysql_query("select set_value from admin_settings where set_id = 47"));
						$fetch72=mysql_fetch_array(mysql_query("select set_value from admin_settings where set_id = 48"));
						$fetch73=mysql_fetch_array(mysql_query("select set_value from admin_settings where set_id = 49"));
						$fetch74=mysql_fetch_array(mysql_query("select set_value from admin_settings where set_id = 50"));
						$fetch75=mysql_fetch_array(mysql_query("select set_value from admin_settings where set_id = 51"));
						$fetchcom=mysql_fetch_array(mysql_query("select set_value from admin_settings where set_id = 76"));
						$fetchcom1=mysql_fetch_array(mysql_query("select set_value from admin_settings where set_id = 77"));

	
	if($_POST['submit'])
	{
	$compoundrange=$_POST['compoundrange'];
	$compoundrange1=$_POST['compoundrange1'];
		
		foreach($_POST as $key => $val)
		{
			if($key != 'status' && $key !='submit')
			{
				if($_POST['status'][$key] == '')
				{
					$status_val = 'off';
				}
				else
				{
					$status_val = $_POST['status'][$key];
				}
				$update = mysql_query("update site_statistics set site_val='".$val."',status='".$status_val."' where stat_id = '".$key."'");

			}
		}
		
	
		
		
		if(isset($_POST['calc']) && $_POST['calc'] != '' )
		{
			$calc = 'on';
		}
		else
		{
			$calc ='off';
		}
		
		if(isset($_POST['payout']) && $_POST['payout'] != '' )
		{
			$payout = 'on';
		}
		else
		{
			$payout ='off';
		}
		
		if(isset($_POST['last']) && $_POST['last'] != '' )
		{
			$last = 'on';
		}
		else
		{
			$last ='off';
		}
		
		if(isset($_POST['top']) && $_POST['top'] != '' )
		{
			$top = 'on';
		}
		else
		{
			$top ='off';
		}
		if(isset($_POST['business_day']) && $_POST['business_day'] != '' )
		{
			$business_day = 'on';
		}
		else
		{
			$business_day ='off';
		}
		
		
		
		$update6=mysql_query("update admin_settings set set_value='$calc' where set_id = 47");
		$update7=mysql_query("update admin_settings set set_value='$payout' where set_id = 48");
		$update8=mysql_query("update admin_settings set set_value='$last' where set_id = 49");
		$update9=mysql_query("update admin_settings set set_value='$top' where set_id = 50");
		$update10=mysql_query("update admin_settings set set_value='$business_day' where set_id = 51");
		$update55=mysql_query("update admin_settings set set_value='$compoundrange' where set_id = 76");
		$update56=mysql_query("update admin_settings set set_value='$compoundrange1' where set_id = 77");
		
/*if(isset($_POST['bankwire']))
{
	$status_val='on';
	$update = mysql_query("update payment_settings set status='".$status_val."' where payment_id = '2");
}
else
{
	$status_val='off';
	$update = mysql_query("update payment_settings set status='".$status_val."' where payment_id = '2'");
}


if(isset($_POST['cheque']))
{
	$status_val='on';
	$update = mysql_query("update payment_settings set status='".$status_val."' where payment_id = '3'");
}
else
{
	$status_val='off';
	$update = mysql_query("update payment_settings set status='".$status_val."' where payment_id = '3'");
}
*/



		$_SESSION['succ_dir']='<font color="#006600"> Successfully Updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=compound.php" />';
		exit();
	}
	
	
?>
<form name='form1' method='post' action="compound.php" >
<div id="primary_right">
				<div class="inner" style="width:70%">


<?php require 'include/top/site_settings.php'; ?>

					  <!-- sortable end -->
					<hr />

					<h1>Compounding</h1>
				 <?php if($_SESSION['succ_dir']) 
					 { 
					?>
					<div class="notification success"> 
					<span></span> 
					<div class="text"> 
						<p><strong>Success!</strong> <?php echo $_SESSION['succ_dir']; $_SESSION['succ_dir']=''; ?> </p> 
					</div> 
					</div>
					<?php
					
					}
					?>
					<fieldset>
						<legend>Manage your Compound</legend>
						
						<?php
							$select_stat= mysql_query("select * from site_statistics where stat_id='14'");
							
							while($fetch = mysql_fetch_array($select_stat))
							{
							?>
						
							<p>
							<label><?php echo $fetch['site_stat']; ?> :</label>
							<input class="mf" name="<?php echo $fetch['stat_id']; ?>" type="text" value="<?php echo $fetch['site_stat']; ?>" /><label>Status :</label><input type="checkbox" <?php if($fetch['status'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="status[<?php echo $fetch['stat_id']; ?>]" />
							
							</p>
                                              
						
						<?php
						}
						//echo '<pre>'; print_r($fetchcom['set_value']); exit;
						?>
                        
                        <p>
                        <label>Compounding Range : </label>
                        <td>
                        <select name="compoundrange" id="compoundrange">
                  <option value="select">Select compound</option>
                  <option value="0"  <?php if($fetchcom['set_value'] == 0) echo ' selected="selected"'; ?> >0 %</option>
                  <option value="5" <?php if($fetchcom['set_value'] == 5) echo ' selected="selected"'; ?> >5 %</option>
                  <option value="10" <?php if($fetchcom['set_value'] == 10) echo ' selected="selected"'; ?> >10 %</option>
                  <option value="15" <?php if($fetchcom['set_value'] == 15) echo ' selected="selected"'; ?> >15 %</option>
                  <option value="20" <?php if($fetchcom['set_value'] == 20) echo ' selected="selected"'; ?> >20 %</option>
                  <option value="25" <?php if($fetchcom['set_value'] == 25) echo ' selected="selected"'; ?> >25 %</option>
                  <option value="30" <?php if($fetchcom['set_value'] == 30) echo ' selected="selected"'; ?> >30 %</option>
                  <option value="35" <?php if($fetchcom['set_value'] == 35) echo ' selected="selected"'; ?> >35 %</option>
                  <option value="40" <?php if($fetchcom['set_value'] == 40) echo ' selected="selected"'; ?> >40 %</option>
                  <option value="45" <?php if($fetchcom['set_value'] == 45) echo ' selected="selected"'; ?> >45 %</option>
                  <option value="50" <?php if($fetchcom['set_value'] == 50) echo ' selected="selected"'; ?> >50 %</option>
                  <option value="55" <?php if($fetchcom['set_value'] == 55) echo ' selected="selected"'; ?> >55 %</option>
                  <option value="60" <?php if($fetchcom['set_value'] == 60) echo ' selected="selected"'; ?> >60 %</option>
                  <option value="65" <?php if($fetchcom['set_value'] == 65) echo ' selected="selected"'; ?> >65 %</option>
                  <option value="70" <?php if($fetchcom['set_value'] == 70) echo ' selected="selected"'; ?> >70 %</option>
                  <option value="75" <?php if($fetchcom['set_value'] == 75) echo ' selected="selected"'; ?> >75 %</option>
                  <option value="80" <?php if($fetchcom['set_value'] == 80) echo ' selected="selected"'; ?> >80 %</option>
                  <option value="85" <?php if($fetchcom['set_value'] == 85) echo ' selected="selected"'; ?> >85 %</option>
                  <option value="90" <?php if($fetchcom['set_value'] == 90) echo ' selected="selected"'; ?> >90 %</option>
                  <option value="95" <?php if($fetchcom['set_value'] == 95) echo ' selected="selected"'; ?> >95 %</option>
                  <option value="100" <?php if($fetchcom['set_value'] == 100) echo ' selected="selected"'; ?> >100 %</option>
                </select>
                </td>
                <td> To
                <select name="compoundrange1" id="compoundrange1">
                  <option value="select">Select compound</option>
                  <option value="0"  <?php if($fetchcom1['set_value'] == 0) echo ' selected="selected"'; ?> >0 %</option>
                  <option value="5" <?php if($fetchcom1['set_value'] == 5) echo ' selected="selected"'; ?> >5 %</option>
                  <option value="10" <?php if($fetchcom1['set_value'] == 10) echo ' selected="selected"'; ?> >10 %</option>
                  <option value="15" <?php if($fetchcom1['set_value'] == 15) echo ' selected="selected"'; ?> >15 %</option>
                  <option value="20" <?php if($fetchcom1['set_value'] == 20) echo ' selected="selected"'; ?> >20 %</option>
                  <option value="25" <?php if($fetchcom1['set_value'] == 25) echo ' selected="selected"'; ?> >25 %</option>
                  <option value="30" <?php if($fetchcom1['set_value'] == 30) echo ' selected="selected"'; ?> >30 %</option>
                  <option value="35" <?php if($fetchcom1['set_value'] == 35) echo ' selected="selected"'; ?> >35 %</option>
                  <option value="40" <?php if($fetchcom1['set_value'] == 40) echo ' selected="selected"'; ?> >40 %</option>
                  <option value="45" <?php if($fetchcom1['set_value'] == 45) echo ' selected="selected"'; ?> >45 %</option>
                  <option value="50" <?php if($fetchcom1['set_value'] == 50) echo ' selected="selected"'; ?> >50 %</option>
                  <option value="55" <?php if($fetchcom1['set_value'] == 55) echo ' selected="selected"'; ?> >55 %</option>
                  <option value="60" <?php if($fetchcom1['set_value'] == 60) echo ' selected="selected"'; ?> >60 %</option>
                  <option value="65" <?php if($fetchcom1['set_value'] == 65) echo ' selected="selected"'; ?> >65 %</option>
                  <option value="70" <?php if($fetchcom1['set_value'] == 70) echo ' selected="selected"'; ?> >70 %</option>
                  <option value="75" <?php if($fetchcom1['set_value'] == 75) echo ' selected="selected"'; ?> >75 %</option>
                  <option value="80" <?php if($fetchcom1['set_value'] == 80) echo ' selected="selected"'; ?> >80 %</option>
                  <option value="85" <?php if($fetchcom1['set_value'] == 85) echo ' selected="selected"'; ?> >85 %</option>
                  <option value="90" <?php if($fetchcom1['set_value'] == 90) echo ' selected="selected"'; ?> >90 %</option>
                  <option value="95" <?php if($fetchcom1['set_value'] == 95) echo ' selected="selected"'; ?> >95 %</option>
                  <option value="100" <?php if($fetchcom1['set_value'] == 100) echo ' selected="selected"'; ?> >100 %</option>
                </select>
                </td>
                        
                         <?php if($_SESSION['compoundrange']) { echo $_SESSION['compoundrange']; $_SESSION['compoundrange']=''; } ?>
                        </p>
                         <p>
							<label>Calculator :</label>
                      
                      
                      
                    
                     <input type="checkbox" <?php if($fetch71['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="calc" />
                                                   
                                                   
                          <?php if($_SESSION['calc']) { echo $_SESSION['calc']; $_SESSION['calc']=''; } ?>
							
						</p>
                        
                        <p>
							<label>Payouts :</label>
                            
                     <input type="checkbox" <?php if($fetch72['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="payout" />
                                                   
                                                   
                          <?php if($_SESSION['payout']) { echo $_SESSION['payout']; $_SESSION['payout']=''; } ?>
							
						</p>
                        
                         <p>
							<label>Last Investors :</label>
                            
                     <input type="checkbox" <?php if($fetch73['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="last" />
                                                   
                                                   
                          <?php if($_SESSION['last']) { echo $_SESSION['last']; $_SESSION['last']=''; } ?>
							
						</p>
                        
                         <p>
							<label>Top Investors :</label>
                            
                     <input type="checkbox" <?php if($fetch74['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="top" />
                                                   
                                                   
                          <?php if($_SESSION['top']) { echo $_SESSION['top']; $_SESSION['top']=''; } ?>
							
						</p>
                        <p>
							<label>business Day :</label>
                            
                     <input type="checkbox" <?php if($fetch75['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="business_day" />
                                                   
                                                   
                          <? if($_SESSION['business_day']) { echo $_SESSION['business_day']; $_SESSION['business_day']=''; } ?>
							
						</p>
                       					

                        
                        
                        
                       
                        <?php
						//$select_payment2 = mysql_fetch_assoc(mysql_query("select * from payment_settings where payment_id='2'"));
						?>
                       <!-- <p>
							<label><?php //echo $select_payment2['payment_name']; ?> :</label>-->
                            
                            <?php
							/*if($select_payment2['status'] == 'on')
							{
								echo '<strong>Status</strong>&nbsp;&nbsp;<input type="checkbox" checked="checked" class="iphone" value="1" name="bankwire" />';
							}
							else
							{
								echo '<strong>Status</strong>&nbsp;&nbsp;<input type="checkbox"  class="iphone" value="1" name="bankwire" />';
							}*/
							?>
				
							<!--</p>-->
                            
                              <?php
					//	$select_payment3 = mysql_fetch_assoc(mysql_query("select * from payment_settings where payment_id='3'"));
						?>
                     <!--   <p>
							<label><?php //echo $select_payment3['payment_name']; ?> :</label>
                            
                            <?php
							/*if($select_payment3['status'] == 'on')
							{
								echo '<strong>Status</strong>&nbsp;&nbsp;<input type="checkbox" checked="checked" class="iphone" value="1" name="cheque" />';
							}
							else
							{
								echo '<strong>Status</strong>&nbsp;&nbsp;<input type="checkbox"  class="iphone" value="1" name="cheque" />';
							}*/
							?>
				
							</p>-->
                      
<hr />
						
						<div class="clearboth"></div>
						
						<p><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>
						
						

<?php 
 if(!in_array("Settings",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
 
 
 $fetch76=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 52"));
 $fetch77=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 53"));
 $fetch78=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 54"));
 $fetch79=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 55"));
 $fetch80=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 56"));
 $fetch81=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 57"));
 $fetch82=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 58"));
 $fetch83=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 59"));
 $fetch84=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 60"));
 $fetch85=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 63"));
 
 if($_POST['submit1'])
	{
	if(isset($_POST['statistics']) && $_POST['statistics'] != '' )
		{
			$statistics = 'on';
		}
		else
		{
			$statistics = 'off';
		}
	
	if(isset($_POST['started']) && $_POST['started'] != '' )
		{
			$started = 'on';
		}
		else
		{
			$started = 'off';
		}
		
	if(isset($_POST['runningdays']) && $_POST['runningdays'] != '' )
		{
			$runningdays = 'on';
		}
		else
		{
			$runningdays = 'off';
		}
		
	if(isset($_POST['totaldeposited']) && $_POST['totaldeposited'] != '' )
		{
			$totaldeposited = 'on';
		}
		else
		{
			$totaldeposited = 'off';
		}
     if(isset($_POST['totalwithdrawal']) && $_POST['totalwithdrawal'] != '' )
		{
			$totalwithdrawal = 'on';
		}
		else
		{
			$totalwithdrawal = 'off';
		}
		
      if(isset($_POST['todaydeposit']) && $_POST['todaydeposit'] != '' )
		{
			$todaydeposit = 'on';
		}
		else
		{
			$todaydeposit = 'off';
		}
 	 if(isset($_POST['todaywithdraw']) && $_POST['todaywithdraw'] != '' )
		{
			$todaywithdraw = 'on';
		}
		else
		{
			$todaywithdraw = 'off';
		}
		
	if(isset($_POST['totalmembers']) && $_POST['totalmembers'] != '' )
		{
			$totalmembers = 'on';
		}
		else
		{
			$totalmembers = 'off';
		}
		
	if(isset($_POST['activemembers']) && $_POST['activemembers'] != '' )
		{
			$activemembers = 'on';
		}
		else
		{
			$activemembers = 'off';
		}
		
	if(isset($_POST['newmembers']) && $_POST['newmembers'] != '' )
		{
			$newmembers = 'on';
		}
		else
		{
			$newmembers = 'off';
		}
 
 
 
 
 $update11=mysql_query("update admin_settings set set_value='$started' where set_id = 52");
 $update12=mysql_query("update admin_settings set set_value='$runningdays' where set_id = 53");
 $update13=mysql_query("update admin_settings set set_value='$totaldeposited' where set_id = 54");
 $update14=mysql_query("update admin_settings set set_value='$totalwithdrawal' where set_id = 55");
 $update15=mysql_query("update admin_settings set set_value='$todaydeposit' where set_id = 56");
 $update16=mysql_query("update admin_settings set set_value='$todaywithdraw' where set_id = 57");
 $update17=mysql_query("update admin_settings set set_value='$totalmembers' where set_id = 58");
 $update18=mysql_query("update admin_settings set set_value='$activemembers' where set_id = 59");
 $update19=mysql_query("update admin_settings set set_value='$newmembers' where set_id = 60");
 $update20=mysql_query("update admin_settings set set_value='$statistics' where set_id = 63");
 
 
 
 
 
 $_SESSION['succ_dir']='<font color="#006600"> Successfully Updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=compound.php" />';
		exit();
 
 
 }
 
 
 
 ?>



<form name='form1' method='post' action="compound.php" >

<div id="primary_right">
				<div class="inner" style="width:70%">

					<h1>Statistics</h1>
				 <?php if($_SESSION['succ_dir']) 
					 { 
					?>
					<div class="notification success"> 
					<span></span> 
					<div class="text"> 
						<p><strong>Success!</strong> <?php echo $_SESSION['succ_dir']; $_SESSION['succ_dir']=''; ?> </p> 
					</div> 
					</div>
					<?php					
					}
					?>
					<fieldset>
						<legend>Manage your Statistics</legend>
						 <p>
							<label>Statistics :</label>
                      
                      
                      
                    
                     <input type="checkbox" <?php if($fetch85['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="statistics" />
                                                   
                                                   
                          <?php if($_SESSION['statistics']) { echo $_SESSION['statistics']; $_SESSION['statistics']=''; } ?>
							
						</p>
                        
                        
                         <p>
							<label>Started :</label>
                      
                      
                      
                    
                     <input type="checkbox" <?php if($fetch76['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="started" />
                                                   
                                                   
                          <?php if($_SESSION['started']) { echo $_SESSION['started']; $_SESSION['started']=''; } ?>
							
						</p>
                        
                        
                          <p>
							<label>Running Days :</label>
                      
                      
                      
                    
                     <input type="checkbox" <?php if($fetch77['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="runningdays" />
                                                   
                                                   
                          <?php if($_SESSION['runningdays']) { echo $_SESSION['runningdays']; $_SESSION['runningdays']=''; } ?>
							
						</p>
                        
                         <p>
							<label>Total Deposited :</label>
                      
                      
                      
                    
                   <input type="checkbox" <?php if($fetch78['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="totaldeposited" />
                                 
                                                   
                       <?php if($_SESSION['totaldeposited']) { echo $_SESSION['totaldeposited']; $_SESSION['totaldeposited']=''; } ?>
							
						</p>
                        
                          <p>
							<label>Total Withdrawal :</label>
                      
                      
                      
                    
                     <input type="checkbox" <?php if($fetch79['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="totalwithdrawal" />
                                                   
                                                   
                          <?php if($_SESSION['totalwithdrawal']) { echo $_SESSION['totalwithdrawal']; $_SESSION['totalwithdrawal']=''; } ?>
							
						</p>
                        
                         <p>
							<label>Today Deposit :</label>
                      
                      
                      
                    
                     <input type="checkbox" <?php if($fetch80['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="todaydeposit" />
                                                   
                                                   
                          <?php if($_SESSION['todaydeposit']) { echo $_SESSION['todaydeposit']; $_SESSION['todaydeposit']=''; } ?>
							
						</p>
                        
                      <p>
							<label>Today Withdraw :</label>
                      
                      
                      
                    
                     <input type="checkbox" <?php if($fetch81['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="todaywithdraw" />
                                                   
                                                   
                          <?php if($_SESSION['todaywithdraw']) { echo $_SESSION['todaywithdraw']; $_SESSION['todaywithdraw']=''; } ?>
							
						</p>
                        
                        
                         <p>
							<label>Total Memebers :</label>
                      
                      
                      
                    
                     <input type="checkbox" <?php if($fetch82['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="totalmembers" />
                                                   
                                                   
                          <?php if($_SESSION['totalmembers']) { echo $_SESSION['totalmembers']; $_SESSION['totalmembers']=''; } ?>
							
						</p>
                        
                         <p>
							<label>Active Memebers :</label>
                      
                      
                      
                    
                     <input type="checkbox" <?php if($fetch83['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="activemembers" />
                                                   
                                                   
                          <?php  if($_SESSION['activemembers']) { echo $_SESSION['activemembers']; $_SESSION['activemembers']=''; } ?>
							
						</p>
                        
                          <p>
							<label>New Memebers :</label>
                      
                      
                      
                    
                     <input type="checkbox" <?php  if($fetch84['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="newmembers" />
                                                   
                                                   
                          <?php  if($_SESSION['newmembers']) { echo $_SESSION['newmembers']; $_SESSION['newmembers']=''; } ?>
							
						</p>
                        
                       
                        <?php
						//$select_payment2 = mysql_fetch_assoc(mysql_query("select * from payment_settings where payment_id='2'"));
						?>
                       <!-- <p>
							<label><?php //echo $select_payment2['payment_name']; ?> :</label>-->
                            
                            <?php
							/*if($select_payment2['status'] == 'on')
							{
								echo '<strong>Status</strong>&nbsp;&nbsp;<input type="checkbox" checked="checked" class="iphone" value="1" name="bankwire" />';
							}
							else
							{
								echo '<strong>Status</strong>&nbsp;&nbsp;<input type="checkbox"  class="iphone" value="1" name="bankwire" />';
							}*/
							?>
				
							<!--</p>-->
                            
                              <?php
					//	$select_payment3 = mysql_fetch_assoc(mysql_query("select * from payment_settings where payment_id='3'"));
						?>
                     <!--   <p>
							<label><?php //echo $select_payment3['payment_name']; ?> :</label>
                            
                            <?php
							/*if($select_payment3['status'] == 'on')
							{
								echo '<strong>Status</strong>&nbsp;&nbsp;<input type="checkbox" checked="checked" class="iphone" value="1" name="cheque" />';
							}
							else
							{
								echo '<strong>Status</strong>&nbsp;&nbsp;<input type="checkbox"  class="iphone" value="1" name="cheque" />';
							}*/
							?>
				
							</p>-->
                      

					
						
						<hr />
						
						<div class="clearboth"></div>
						
						<p><input class="button" type="submit" value="Submit" name="submit1" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>



