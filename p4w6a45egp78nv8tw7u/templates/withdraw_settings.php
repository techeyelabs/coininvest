<!--Content Portion Start-->
<?php	
 if(!in_array("Settings",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
 //echo "select * from admin_settings where set_id = 73"; exit;
 $fetch99=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 73"));	
 $fetch100=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 74"));
 
 
 if(isset($_POST['transactwithdraw']) && $_POST['transactwithdraw'] != '' )
		{
			$transactwithdraw = 'on';
		}
		else
		{
			$transactwithdraw = 'off';
		}	


	$releasedcomm=$_POST['releasedcomm'];
	$fetch=mysql_query("select * from admin_settings");
	while($info = mysql_fetch_array($fetch))
	{
			$vari[] = $info['set_id']; 
			$values[] = $info['set_value']; 
	}
	
	
	
	if($_POST['submit'])
	{

		mysql_query("update admin_settings set set_value='".$_POST['6']."' where set_id = 6");
		mysql_query("update admin_settings set set_value='".$_POST['7']."' where set_id = 7");
		mysql_query("update admin_settings set set_value='".$_POST['8']."' where set_id = 8");
		mysql_query("update admin_settings set set_value='".$_POST['15']."' where set_id = 15");
		mysql_query("update admin_settings set set_value='".$_POST['43']."' where set_id = '43'");
		//echo "update admin_settings set set_value='$releasedcomm' where set_id = 73"; exit;
	   $update30=mysql_query("update admin_settings set set_value='$releasedcomm' where set_id = 73");
	   $update31=mysql_query("update admin_settings set set_value='$transactwithdraw' where set_id = 74");

		$_SESSION['succ_dir']='<font color="#006600">Successfully Updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=withdraw_settings.php" />';
		exit();
	}
	
	
?>
<div id="primary_right">
 <div class="inner" style="width:900px">
<?php require 'include/top/site_settings.php'; ?>
					 <!-- end dashboard items -->

					<hr />
                    <h1>Withdraw Settings</h1>
                    
                    
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

  <form name='form1' method='post' action="withdraw_settings.php" >
  <fieldset>
						<legend><font color="#FF0000">*</font> = Required Fields</legend>
                       
                           <p >
							<label style="width:248px;" >Minimum Withdraw Amount <font color="#FF0000">*</font></label>
							: 
          
    <input name="<?php echo $vari[5]; ?>" type="text" class="mf" id="plan_name" value="<?php echo number_format($values[5],2); ?>" onkeyup="numchk (this)" onkeydown="numvalchk (this)" /> &#x0e3f; &nbsp;<?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
						</p>
                        
                   <p>
				   <label style="width:248px;" > Maximum Withdraw Amount <font color="#FF0000">*</font></label>
				    : 
                   <input name="<?php echo $vari[6]; ?>" type="text" class="mf" id="month_sub" value="<?php echo number_format($values[6],2); ?>"  onkeyup="numchk (this)" onkeydown="numvalchk (this)"  /> &#x0e3f;                   <?php if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
                   &nbsp;    
				  </p>
                        
                  <p>
				  <label style="width:248px;" > Number of Withdraw Allowed in a Month <font color="#FF0000">*</font></label>
				  : 
                  <input name="<?php echo $vari[7]; ?>" type="text" class="mf" id="month_sub" value="<?php echo $values[7]; ?>"   onkeyup="numchk (this)" onkeydown="numvalchk (this)"/> NOS
                  &nbsp;
                  <?php if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
				 </p>
                        
                 <p>
				 <label style="width:248px;" >Admin Withdraw Commission in % <font color="#FF0000">*</font></label>
				 : 
                 <input name="<?php echo $vari[14]; ?>" type="text" class="mf" id="month_sub" value="<?php echo $values[14]; ?>" onkeyup="numchk (this)" onkeydown="numvalchk (this)"  /> 
                 &nbsp;
                 <?php  if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
				</p>
                        
                <p>
				<label style="width:248px;" >Admin Release Deposit Commission in % <font color="#FF0000">*</font></label>
                :
				<input name="releasedcomm" type="text" class="mf" id="releasedcomm" value="<?php echo $fetch99['set_value']; ?>" /> 
                <?php if($_SESSION['empty_releasedcomm']) { echo $_SESSION['empty_releasedcomm']; $_SESSION['empty_releasedcomm']=''; } ?>
				</p>
                        
                        
                <p>
				<label style="width:248px;" >Transaction Code For Withdraw<font color="#FF0000">*</font></label>
				: 
                <input name="transactwithdraw" type="checkbox" class="iphone" id="transactwithdraw" <?php if($fetch100['set_value'] == 'on') echo ' checked="checked"'; ?> /> 
                <?php if($_SESSION['empty_transactwithdraw']) { echo $_SESSION['empty_transactwithdraw']; $_SESSION['empty_transactwithdraw']=''; } ?>
			    </p>                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                         <div class="clearboth"></div>
						
						<p align="center" style="padding-right:230px;" >
                          <input type="hidden" name="submit" value="1" />
                          
                            <input class="button" type="submit" id="update" name="update" value="Update" />
                        </p>
                        
                        </fieldset>
                        
  </form>
   
   
    <div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
<!--Content Portion End-->
<!--Content Portion End-->
<?php
unset($_SESSION['succ_dir']);
unset($_SESSION['empty_pass']);

?>


<!--Content Portion End-->
<script language="javascript">
function numchk (tag)
{       
	var1=tag.value; // tval is textbox (element) checking for characters only
   	s=var1.substr(var1.length-1,1); 	 
	m=s.charCodeAt(0); 
	           
	if (!((m>=48 && m<=57 )||(m==32) || isNaN(m)))
	{
		//alert ("Invalid input");	
		ch=var1.substr(0,var1.length-1);		
		tag.value=ch;						
	}
}
function numvalchk (tag)
{       
	var1=tag.value; // tval is textbox (element) checking for characters only
s=var1.substr(var1.length-1,1); 	 
	m=s.charCodeAt(0);            
	if (!((m>=48 && m<=57 )||(m==32) || isNaN(m)))
	{		
		ch=var1.substr(0,var1.length-1);		
		tag.value=ch;						
	}
}
</script>








<?php	
 if(!in_array("Settings",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
 
$fetch86=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 68"));
$fetch87=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 69"));
$fetch88=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 70"));
$fetch89=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 71"));
$fetch90=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 72"));


if($_POST['submit1'])
	{
	
	$passwordlength = $_POST['passwordlength'];
	if(isset($_POST['keyboard']) && $_POST['keyboard'] != '' )
		{
			$keyboard = 'on';
		}
		else
		{
			$keyboard = 'off';
		}
		
	if(isset($_POST['emailactivation']) && $_POST['emailactivation'] != '' )
		{
			$emailactivation = 'on';
		}
		else
		{
			$emailactivation = 'off';
		}
		
	if(isset($_POST['captcha']) && $_POST['captcha'] != '' )
		{
			$captcha = 'on';
		}
		else
		{
			$captcha = 'off';
		}
		
	if(isset($_POST['username']) && $_POST['username'] != '' )
		{
			$username = 'on';
		}
		else
		{
			$username = 'off';
		}
		
		
		
$update21=mysql_query("update admin_settings set set_value='$keyboard' where set_id = 68");	
$update22=mysql_query("update admin_settings set set_value='$captcha' where set_id = 69");	
$update23=mysql_query("update admin_settings set set_value='$emailactivation' where set_id = 70");		
$update24=mysql_query("update admin_settings set set_value='$passwordlength' where set_id = 71");	
$update25=mysql_query("update admin_settings set set_value='$username' where set_id = 72");		
	

	
		
		$_SESSION['succ_dir']='<font color="#006600">Successfully Updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=withdraw_settings.php" />';
		exit();
		
		
		
		
	}	








?>

<div id="primary_right">
 <div class="inner" style="width:900px">

					 <!-- end dashboard items -->

                    <h1>Registration Settings</h1>
                    
                    
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



<form name='form1' method='post' action="withdraw_settings.php" >


					<fieldset>
						<legend>Manage your Registration</legend>
						 <p>
							<label>Keyboard :</label>
                      
                      
                      
                    
                     <input type="checkbox" <?php if($fetch86['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="keyboard" />
                                                   
                                                   
                          <?php if($_SESSION['keyboard']) { echo $_SESSION['keyboard']; $_SESSION['keyboard']=''; } ?>
							
						</p>
                        
                         <p>
							<label>Email Activation :</label>
                      
                      
                      
                    
                     <input type="checkbox" <?php if($fetch88['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="emailactivation" />
                                                   
                                                   
                          <?php if($_SESSION['emailactivation']) { echo $_SESSION['keyboard']; $_SESSION['emailactivation']=''; } ?>
							
						</p>
                        
                          <p>
							<label>Minimum Password Length:</label>
			<input name="passwordlength" type="text" class="mf" id="passwordlength" value="<?php echo $fetch89['set_value']; ?>"  /> <?php if($_SESSION['empty_passwordlength']) { echo $_SESSION['empty_passwordlength']; $_SESSION['empty_passwordlength']=''; } ?>
							
						</p>
                        
                        
                        <p>
							<label>Captcha :</label>
                      
                      
                      
                    
                     <input type="checkbox" <?php if($fetch87['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="captcha" />
                                                   
                                                   
                          <?php if($_SESSION['captcha']) { echo $_SESSION['captcha']; $_SESSION['captcha']=''; } ?>
							
						</p>
                        
                        
                         <p>
							<label>User Name :</label>
                      
                      
                      
                    
                     <input type="checkbox" <?php if($fetch90['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="username" />
                                                   
                                                   
                          <?php if($_SESSION['username']) { echo $_SESSION['username']; $_SESSION['username']=''; } ?>
							
						</p>
	
                        
                        
	
						<hr />
						
						<div class="clearboth"></div>
						
						<p align="center" style="padding-right:230px;" >
                          <input type="hidden" name="submit1" value="1" />
                          
                            <input class="button" type="submit" id="update" name="update" value="Update" />
                        </p>
                        
					</fieldset>
            
</form>


 <div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
<!--Content Portion End-->
<!--Content Portion End-->
<?php
unset($_SESSION['succ_dir']);
unset($_SESSION['empty_pass']);

?>







  
