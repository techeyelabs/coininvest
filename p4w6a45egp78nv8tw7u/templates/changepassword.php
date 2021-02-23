<!--Content Portion Start-->
<?php

 if(!in_array("Settings",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }

?>

 <form name='form1' method='post' action="changepassword_validate.php" >
<div id="primary_right">
				<div class="inner" style="width:70%">
<?php require 'include/top/site_settings.php'; ?>

					 <!-- end dashboard items -->
					  <!-- sortable end -->
					<hr />

					<h1>Change Password</h1>
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
					
					 <?php if($_SESSION['empty_pass']) 

					 { 

					?>

					<div class="notification error"> 

						<span></span> 

						<div class="text"> 

							<p><strong>Error!</strong> <?php echo $_SESSION['empty_pass']; $_SESSION['empty_pass']=''; ?></p> 

						</div> 

					</div>

					<?php

					

					}

					?>
					<fieldset>
						<legend>Manage your Administrator Password</legend>
						
						
						<p>
							<label>Current Password:</label>
							<input name="txtopass" type="password" class="mf" id="txtopass" /><?php if($_SESSION['old_cpass']) { echo $_SESSION['old_cpass']; $_SESSION['old_cpass']=''; } ?>
							
						</p>
						
						<p>
							<label>New Password:</label>
							<input name="txtnpass" type="password" class="mf" id="txtnpass" /><?php if($_SESSION['empty_newstr']) { echo $_SESSION['empty_newstr']; $_SESSION['empty_newstr']=''; } ?>
							
						</p>
						
						<p>
							<label>Confirm Password:</label>
							<input name="txtcpass" type="password" class="mf" id="txtcpass" /><?php if($_SESSION['empty_cpass']) { echo $_SESSION['empty_cpass']; $_SESSION['empty_cpass']=''; } ?>
							
						</p>
						
							<div class="clearboth"></div>
						
						<p style="padding-left:170px;"><input type="hidden" name="canChangePassword" value=1><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>


	<form name='form1' method='post' action="changepassword_validate1.php" >
<div id="primary_right">
				<div class="inner" style="width:70%">

					 <!-- end dashboard items -->
					  <!-- sortable end -->
					<hr />

					<h1>Change Transaction Password</h1>
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
					
					 <?php if($_SESSION['empty_pass1']) 

					 { 

					?>

					<div class="notification error"> 

						<span></span> 

						<div class="text"> 

							<p><strong>Error!</strong> <?php echo $_SESSION['empty_pass1']; $_SESSION['empty_pass1']=''; ?></p> 

						</div> 

					</div>

					<?php

					

					}

					?>
					<fieldset>
						<legend>Manage your Administrator Password</legend>
						
						
						<p>
							<label>Current Password:</label>
							<input name="txtopass1" type="password" class="mf" id="txtopass1" /><?php if($_SESSION['empty_old']) { echo $_SESSION['empty_old']; $_SESSION['empty_old']=''; } ?>
							
						</p>
						
						<p>
							<label>New Password:</label>
							<input name="txtnpass1" type="password" class="mf" id="txtnpass1" /><?php if($_SESSION['empty_new']) { echo $_SESSION['empty_new']; $_SESSION['empty_new']=''; } ?>
							
						</p>
						
						<p>
							<label>Confirm Password:</label>
							<input name="txtcpass1" type="password" class="mf" id="txtcpass1" /><?php if($_SESSION['empty_con']) { echo $_SESSION['empty_con']; $_SESSION['empty_con']=''; } ?>
							
						</p>
						
							<div class="clearboth"></div>
						
						<p style="padding-left:170px;"><input type="hidden" name="canChangePassword1" value=2><input class="button" type="submit" value="Submit" name="submit1" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>
