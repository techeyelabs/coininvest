<?php
if(!in_array("SubAdmin",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
	if($_POST['submit'])

	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$menu=implode(",",$_POST['menu']);
		$mail_id = $_POST['emailid'];
		
		
		if($mail_id=='')
		{
			$userflag=1;
			$_SESSION['empty_mail']="<font color='#FF0000'>Please Enter the Valid Mail ID</font>";
		}
		else
		{
			$re_user    = "^[a-z0-9\._-]+"; 
			$re_delim   = "@"; 
			$re_domain  = "[a-z0-9][a-z0-9_-]*(\.[a-z0-9_-]+)*"; 
			$re_tld     = "\.([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|" . "int|mil|museum|name|net|org|pro)$"; 
			if(eregi($re_user . $re_delim . $re_domain . $re_tld, $mail_id)==0)
			{
				$userflag=1;
				$_SESSION['empty_mail']="<font color='#FF0000'>Please Enter the Valid Mail ID</font>";
			}
		}
	
		if($mail_id !='')
		{
			$sdre=mysql_query("select * from admin where email ='$mail_id'");
			if(mysql_num_rows($sdre) > 0)
			{
				$userflag=1;
				$_SESSION['empty_mail']="<font color='#FF0000'>Mail ID is Not available</font>";
			}
		}
		
		
		
		if($username == '')
		{
			$_SESSION['empty_username']="<font color='#FF0000'>Please enter the username</font>";
			$userflag =1;
		}
		else
		{
			$select_user = mysql_query("select * from admin where username = '".$username."'");
			if(mysql_num_rows($select_user) > 0)
			{
				$_SESSION['empty_username']="<font color='#FF0000'>Usernmae is not available</font>";
				$userflag =1;
			}
		}
		
		if($password == '')
		{
			$_SESSION['empty_password']="<font color='#FF0000'>Please enter the Password</font>";
			$userflag = 1;
		}
		
		if($userflag != '1')
		{
			$update=mysql_query("insert into admin(username,admin_password,permission,email) values('$username','".md5($password)."','".$menu."','$mail_id')");
			$_SESSION['succ_dir']='<font color="#006600">Sub Admin Created Successfully</font>';
			echo '<meta http-equiv="refresh" content="0; url=subadmin.php" />';
			exit();
		}
		else
		{
			$_SESSION['empty_pass']="<font color='#FF0000'>Please check below input</font>";
			echo '<meta http-equiv="refresh" content="0;url=create_subadmin.php">';
			exit();

		}

	}
?>
<!--Content Portion Start-->
<form name='form1' method='post' action="">

<div id="primary_right">
				<div class="inner" style="width:70%">
<?php require 'include/top/subadmin.php'; ?>
					<hr />

					<h1>Create a New Sub Admin</h1>



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



						<legend>Add a New sub Admin</legend>



						

						<p>



							<label>User Name <font color="#FF0000">*</font></label>



							: <input type="text" name="username"  class="sf" value="<?php echo $_SESSION['username']; $_SESSION['username']=''; ?>"><?php if($_SESSION['empty_username']) { echo $_SESSION['empty_username']; $_SESSION['empty_username']=''; } ?>  



						</p>

						

						<p>



							<label>Password <font color="#FF0000">*</font></label>



							: <input type="password" name="password"  class="sf" value="<?php echo $_SESSION['board_width']; $_SESSION['board_width']=''; ?>"><?php if($_SESSION['empty_password']) { echo $_SESSION['empty_password']; $_SESSION['empty_password']=''; } ?>  



						</p>
                        
                        <p>



							<label>Email Id <font color="#FF0000">*</font></label>



							: <input type="text" name="emailid"  class="sf" value="<?php echo $_SESSION['board_width']; $_SESSION['board_width']=''; ?>"><?php if($_SESSION['empty_mail']) { echo $_SESSION['empty_mail']; $_SESSION['empty_mail']=''; } ?>  



						</p>

						<p>



							<label>Set Privilege <font color="#FF0000">*</font></label>



							: <label>Enable/Disable</label>



						</p>

						

						<p>
							<label>&nbsp;</label>
                            
                          
							<input type="checkbox" name="menu[]" value="User" class="iphone"  /> &nbsp;User Management &nbsp;&nbsp;
                            

						</p>
                        <p>
							<label>&nbsp;</label>
                            <input type="checkbox" name="menu[]" value="Investment" class="iphone"  /> &nbsp;Investments &nbsp;&nbsp;
                            
						</p>
                        
                        
                        
                        <p>
							<label>&nbsp;</label>
                            <input type="checkbox" name="menu[]" value="Plan" class="iphone"  /> &nbsp;Plan Management &nbsp;&nbsp;
                            
						</p>
                        <p>
							<label>&nbsp;</label>
                            <input type="checkbox" name="menu[]" value="Content" class="iphone"  /> &nbsp;Content Management &nbsp;&nbsp;
                            
						</p>
                        
                        <p>
							<label>&nbsp;</label>
                            <input type="checkbox" name="menu[]" value="Financials" class="iphone"  /> &nbsp;Financials Management &nbsp;&nbsp;
                            
						</p>
                        <p>
							<label>&nbsp;</label>
                           <input type="checkbox" name="menu[]" value="Preferences" class="iphone"  /> &nbsp;Preferences&nbsp;&nbsp;
                            
						</p>
                        <p>
							<label>&nbsp;</label>
                            <input type="checkbox" name="menu[]" value="Settings" class="iphone"  /> &nbsp;Settings&nbsp;&nbsp;
                            
						</p>
                        
                        <p>
							<label>&nbsp;</label>
                            <input type="checkbox" name="menu[]" value="Support" class="iphone"  /> &nbsp;Support&nbsp;						
                        </p>
                        
              			<p>
							<label>&nbsp;</label>
	                        <input type="checkbox" name="menu[]" value="Referral" class="iphone"  /> &nbsp;Referral&nbsp;&nbsp;

						</p>
                        <p>
							<label>&nbsp;</label>

						</p>

						

						<hr />

						<div class="clearboth"></div>

						<p><input class="button" type="submit" value="Submit" name="submit" /></p>

					</fieldset>

					<div class="clearboth"></div>

				</div> <!-- inner -->

			</div>

</form>
