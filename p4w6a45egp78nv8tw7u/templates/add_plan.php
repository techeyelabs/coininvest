<!--Content Portion Start-->

<? 
	
	
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
<form name='form1' method='post' action="add_plan.php" >
<div id="primary_right">
				<div class="inner" style="width:70%">
<h1>Settings</h1>

					<ul class="dash">
				
						<li class="fade_hover tooltip" title="Manage your Site Settings">
							<a href="site_settings.php">
								<img src="assets/icons/dashboard/21.png" alt="" />
								<span>Site Settings</span>
							</a>
						</li>
						
						<li class="fade_hover tooltip" title="Manage Your Payment Settings">
							<a href="payment_settings.php">
								<img src="assets/icons/dashboard/86.png" alt="" /> 
								<span>Payment Settings</span>
							</a>
						</li>

						<li class="fade_hover tooltip" title="Manage Your Network Settings">
							
							<a href="network_settings.php">
								<img src="assets/icons/dashboard/30.png" alt="" />
								<span>Network Settings</span>
							</a>
						</li>
						<li class="fade_hover tooltip" title="Manage Your General Settings">
							
							<a href="general_settings.php">
								<img src="assets/icons/dashboard/122.png" alt="" />
								<span>General Settings</span>
							</a>
						</li>
						<li class="fade_hover tooltip" title="Manage Your Plan Settings">
							
							<a href="plan.php">
								<img src="assets/icons/dashboard/123.png" alt="" />
								<span>Plan Management </span>
							</a>
						</li>
					</ul> <!-- end dashboard items -->

					  <!-- sortable end -->
					<hr />

					<h1>Add new Plan</h1>
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
						<legend>Create Your New Plan</legend>
						
						
						<p>
							<label>Plan Name:</label>
							<input class="mf" name="plan_name" type="text" value="<?=$_SESSION['plan_name']; ?>" /> <? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
							
						</p>
						<p>
							<label>Registration Amount:</label>
							<input class="mf" name="register_amt" type="text" value="<?=$_SESSION['register_amt'];?>" /> USD <? if($_SESSION['empty_register_amt']) { echo $_SESSION['empty_register_amt']; $_SESSION['empty_register_amt']=''; } ?>
							
						</p>
						
						<p>
							<label>Admin Amount :</label>
							<input class="mf" name="admin_amount" type="text" value="<?=$_SESSION['admin_amount']; ?>" /> USD <? if($_SESSION['empty_admin_amount']) { echo $_SESSION['empty_admin_amount']; $_SESSION['empty_admin_amount']=''; } ?>
							
						</p>
						
						<p>
							<label>Referral Limits :</label>
							<input class="mf" name="no_downline" type="text" value="<?=$_SESSION['no_downline']; ?>" /> Nos <? if($_SESSION['empty_no_downline']) { echo $_SESSION['empty_no_downline']; $_SESSION['empty_no_downline']=''; } ?>
							
						</p>
						
						<p>
						
						<hr />
						
						<div class="clearboth"></div>
						
						<p><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>