<!--Content Portion Start-->

<? 
 if(!in_array("Settings",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
	
	
	if($_POST['submit'])
	{
		/*echo "<pre>";
		print_r($_POST);
		exit();
		*/
		$plan_name = $_POST['plan_name'];
		$register_amt = $_POST['register_amt'];
		$admin_amount = $_POST['admin_amount'];
		$no_downline = $_POST['no_downline'];
	
		if($plan_name == '')
		{
			$flad = 1;
			$_SESSION['empty_plan_name'] ="<span class='validate_error'>Please enter the Plan Name</span>";
		}
		if($register_amt == '')
		{
			$flad = 1;
			$_SESSION['empty_register_amt'] ="<span class='validate_error'>Please enter the Register Amount</span>";
		}
		if($register_amt != '' && !is_numeric($register_amt))
		{
			$flad = 1;
			$_SESSION['empty_register_amt'] ="<span class='validate_error'>Please enter the Only Numeric Values</span>";
		}
		
		if($admin_amount == '')
		{
			$flad = 1;
			$_SESSION['empty_admin_amount'] ="<span class='validate_error'>Please enter the Admin Fee</span>";
		}
		if($admin_amount != '' && !is_numeric($admin_amount))
		{
			$flad = 1;
			$_SESSION['empty_admin_amount'] ="<span class='validate_error'>Please enter the Only Numeric Values</span>";
		}
		
		if($no_downline == '')
		{
			$flad = 1;
			$_SESSION['empty_no_downline'] ="<span class='validate_error'>Please enter the Referral Limits</span>";
		}
		if($no_downline != '' && !is_numeric($no_downline))
		{
			$flad = 1;
			$_SESSION['empty_no_downline'] ="<span class='validate_error'>Please enter the Only Numeric Values</span>";
		}
		
		if($flad != 1)
		{
			$insert = mysql_query("insert into plan(plan_name,register_amt,admin_amount,no_downline) values('$plan_name','$register_amt','$admin_amount','$no_downline')");
			$_SESSION['success_flag']='<font color="#006600">Your Plan has Successfully Created</font>';
			echo '<meta http-equiv="refresh" content="0; url=plan.php" />';
			exit();
		}
		else
		{
			$_SESSION['empty_pass']="<font color='#FF0000' size=1>Please check the below details.</font>";
			echo '<meta http-equiv="refresh" content="0;url=add_plan.php">';
			exit();
		}
		
		
		
	}
	
	
?>
<form name='form1' method='post' action="database_validate.php" >
<div id="primary_right">
				<div class="inner" style="width:70%">
                <? require 'include/top/site_settings.php';
 ?>
									
					<hr />

					<h1>Database Backup</h1>
				 <? if($_SESSION['succ_dir']) 
					 { 
					?>
					<div class="notification success"> 
					<span></span> 
					<div class="text"> 
						<p><strong>Success!</strong> <? echo $_SESSION['succ_dir']; $_SESSION['succ_dir']=''; ?> </p> 
					</div> 
					</div>
					<?
					
					}
					?>
					<fieldset>
						<legend>Mail Your Database Backup</legend>
						
						
						<p>
							With this Message the Mail forward to this mail id with the Attachemnt of Database. You need to change the Mail Id, then <a href="site_settings.php">Click Here</a>
						</p>
						
						 <?
	  	$select=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='3'"));
	  ?>
						<p>
							<label>To Mail Id:</label>
							<?=$select['set_value']; ?>
							
						</p>
						
						<p>
							<label>Subject:</label>
							<input class="mf" name="txtsub" type="text" value="" /><? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
							
						</p>
						
						<p>
							<label>Message :</label>
						<textarea  class="mf" name="txtcontent" rows="10" cols="30"></textarea> 
                  <br />
                  <? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
							
						</p>
						
						<p>
						
						<hr />
						
						<div class="clearboth"></div>
						
						<p><input type="hidden" name="submit" value="1" /><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>