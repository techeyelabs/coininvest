<div id="primary_right">
				<div class="inner" style="width:70%">
<?
		  	$fetch = mysql_fetch_array(mysql_query("select * from members_table where member_id=".$_GET['id']));
		  	
		  ?>
					<h1>User Management</h1>

					<ul class="dash">
				
						<li class="fade_hover tooltip" title="Create a New User">
							<a href="create_user.php">
								<img src="assets/icons/dashboard/46.png" alt="" />
								<span>Create User</span>
							</a>
						</li>
						
						<li class="fade_hover tooltip" title="Manage Your Free user">
							<a href="user.php?status=free">
								<img src="assets/icons/dashboard/53.png" alt="" /> 
								<span>View Free user</span>
							</a>
						</li>

						<li class="fade_hover tooltip" title="Manage Your Active user">
							
							<a href="user.php?status=active">
								<img src="assets/icons/dashboard/54.png" alt="" />
								<span>Active users</span>
							</a>
						</li>

						<li class="fade_hover tooltip" title="Manage Your Inactive user">
							<a href="user.php?status=inactive">
								<img src="assets/icons/dashboard/47.png" alt="" />
								<span>Inactive users</span>
							</a>
						</li>
						
						<li class="fade_hover tooltip" title="Manage Your Suspend user">
							<a href="user.php?status=suspend">
								<img src="assets/icons/dashboard/49.png" alt="" />
								<span>Suspend users</span>
							</a>
						</li>

						

						

					</ul> <!-- end dashboard items -->
					
					<!-- YOUR CONTENT GOES HERE -->
					
					
					<hr />

					<h1>Edit User</h1>
					    <? if($_SESSION['succ_dir']) { 
	?>
	 <div class="notification success"> 
					<span></span> 
					<div class="text"> 
						<p><strong>Success!</strong>  <? echo $_SESSION['succ_dir']; $_SESSION['succ_dir']=''; ?></p> 
					</div> 
					</div>
    
    <?
    } ?>

	 <? if($_SESSION['errror_msg'])  { ?>
	 <div class="notification error"> 
						<span></span> 
						<div class="text"> 
							<p><strong>Error!</strong><? echo $_SESSION['errror_msg']; $_SESSION['errror_msg']='';?></p> 
						</div> 
					</div>

    
    <?
  } ?>
					<form name='form1' method='post' action="user_validate.php" > 
					<input type="hidden" name="id" value="<?=$fetch['member_id']; ?>" /> 
					<fieldset>
						<legend><font color="#FF0000">*</font> = Required Fields</legend>
						
						<h2>Account Information</h2>
						

						<p>
							<label>Username <font color="#FF0000">*</font></label>
							: <input type="text" value="<?=$fetch['username']; $_SESSION['post_user']=''; ?>" name="txtname" class="sf">
							 <? if($_SESSION['empty_user']) { echo $_SESSION['empty_user']; $_SESSION['empty_user']=''; } ?>
                                                  <? if($_SESSION['empty_userstr']) { echo $_SESSION['empty_userstr']; $_SESSION['empty_userstr']=''; } ?>
                                                  <? if($_SESSION['empty_userexist']) { echo $_SESSION['empty_userexist']; $_SESSION['empty_userexist']=''; } ?>
						</p>
						
						<p>
							<label>Password <font color="#FF0000">*</font></label>
							: <input type="Password" name="txtpass" class="sf" value="<?=$_SESSION['post_pass']; $_SESSION['post_pass']=''; ?>">      <? if($_SESSION['empty_pass']) { echo $_SESSION['empty_pass']; $_SESSION['empty_pass']=''; } ?>
                                                  <? if($_SESSION['empty_passstr']) { echo $_SESSION['empty_passstr']; $_SESSION['empty_passstr']=''; } ?>
						</p>
						
						<p>
							<label>Confirm Password <font color="#FF0000">*</font></label>
							: <input type="Password" name="txtcpass" class="sf" value="<?=$_SESSION['post_cpass']; $_SESSION['post_cpass']=''; ?>"><? if($_SESSION['empty_cpass']) { echo $_SESSION['empty_cpass']; $_SESSION['empty_cpass']=''; } ?>
						</p>
						<p>
							<label>Email Id <font color="#FF0000">*</font></label>
							: <input type="text" name="txtmail" class="sf" value="<?=$fetch['mail_id']; $_SESSION['post_mail']=''; ?>" /> <? if($_SESSION['empty_mail']) { echo $_SESSION['empty_mail']; $_SESSION['empty_mail']=''; } ?>
                 <? if($_SESSION['invaild_mailflag']) { echo $_SESSION['invaild_mailflag']; $_SESSION['invaild_mailflag']=''; } ?>
						</p>
						
						<hr />
						
						<h2>Personal Information</h2>
						<p>
							<label>First Name <font color="#FF0000">*</font></label>
							: <input type="text" name="txtfname"  class="sf" value="<?=$fetch['first_name']; $_SESSION['post_fname']=''; ?>"><? if($_SESSION['empty_fname']) { echo $_SESSION['empty_fname']; $_SESSION['empty_fname']=''; } ?>  
						</p>

						<p>
							<label>Last Name :</label>
							: <input type="text" name="txtlname" class="tbox1" value="<?=$fetch['last_name']; $_SESSION['post_lname']=''; ?>">
						</p>
						
						<p>
							<label>Address 1 </label>
							: <input name="add1" type="text" class="tbox1" id="add1" value="<?=$fetch['address1']; ?>" /><? if($_SESSION['empty_add1']) { echo $_SESSION['empty_add1']; $_SESSION['empty_add1']=''; } ?>
						</p>
						
						<p>
							<label>Address 2 </label>
						: <input name="add2" type="text" class="tbox1" id="add2" value="<?=$fetch['address2']; ?>"  /><? if($_SESSION['empty_add2']) { echo $_SESSION['empty_add2']; $_SESSION['empty_add2']=''; } ?>
						</p>
						<p>
							<label>City  </label>
							: <input name="city" type="text" class="tbox1" id="city" value="<?=$fetch['city']; ?>"  /><? if($_SESSION['empty_city']) { echo $_SESSION['empty_city']; $_SESSION['empty_city']=''; } ?>
						</p>
						<p>
							<label>State  </label>
							: <input name="state" type="text" class="tbox1" id="state" value="<?=$fetch['state']; ?>"   /><? if($_SESSION['empty_state']) { echo $_SESSION['empty_state']; $_SESSION['empty_state']=''; } ?>
						</p>
						<p>
							<label>Country  </label>
							: <? CreateOption('Country',$fetch['country'],'country_master')?><? if($_SESSION['empty_Country']) { echo $_SESSION['empty_Country']; $_SESSION['empty_Country']=''; } ?>
						</p>
						
						<p>
							<label>Member Status  </label>
							: <input type="radio"  name="status" value="active" <? if($fetch['member_status'] =='active') echo 'checked="checked"'; ?>/> Active &nbsp;&nbsp;<input type="radio"  name="status"  value="inactive"<? if($fetch['member_status'] =='inactive') echo 'checked="checked"'; ?>/> Inactive &nbsp;&nbsp;<input type="radio"  name="status"  value="suspend"<? if($fetch['member_status'] =='suspend') echo 'checked="checked"'; ?>/> Suspend &nbsp;&nbsp;
						</p>
						
						
						<div class="clearboth"></div>
						
						<p><input class="button" type="submit" value="Submit" /> <!--<input class="button" type="reset" value="Reset" />--></p>
					</fieldset>
					</form>
					<div class="clearboth"></div>
				</div> <!-- inner -->
			</div>