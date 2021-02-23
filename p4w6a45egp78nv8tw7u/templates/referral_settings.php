<!--Content Portion Start-->
<?php
	
	$fetcha1=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 1"));
	$fetcha2=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 3"));
	$fetcha3=mysql_fetch_assoc(mysql_query("select * from admin_settings where set_id = 31"));
	$fetcha4=mysql_fetch_assoc(mysql_query("select * from admin_settings where set_id = 32"));
	
	$fetch1=mysql_fetch_array(mysql_query("select * from meta_info where meta_id = 1"));
	
	
	
	if($_POST['submit'])
	{
		//print_r($_POST);exit;

		
		
		$site_name = $_POST['site_name'];
		$admin_mail = $_POST['admin_mail'];
		$meta_title = $_POST['meta_title'];
		$meta_keyword = $_POST['meta_keyword'];
		$meta_desc = $_POST['meta_desc'];
		$unique_email = $_POST['unique_email'];
		$unique_ip = $_POST['unique_ip'];
		
		$update1=mysql_query("update admin_settings set set_value='$site_name' where set_id = 1 ");
		
		$update2=mysql_query("update admin_settings set set_value='$admin_mail' where set_id = 3 ");
		
			$update2=mysql_query("update admin_settings set set_value='$unique_email' where set_id = 31");
				$update2=mysql_query("update admin_settings set set_value='$unique_ip' where set_id = 32");
		
		$update3=mysql_query("update meta_info set meta_title='$meta_title', meta_keyword='$meta_keyword', meta_desc = '$meta_desc'");
		
		$_SESSION['succ_dir']='<font color="#006600">Successfully Updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=site_settings.php" />';
		exit();
	}
	
	
?>
 <form name='form1' method='post' action="site_settings.php" >
<div id="primary_right">
				<div class="inner" style="width:70%">
<?php require 'include/top/referral.php'; ?>

					 <!-- end dashboard items -->
					  <!-- sortable end -->
					<hr />

					<h1>Site Settings</h1>
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
                        
                        
                        
					<fieldset>
						<legend>Manage your Site Settings</legend>
						
						
						<p>
							<label>Site Name:</label>
						                           
                            <input name="site_name" type="text" class="mf" id="plan_name" value="<?=$fetcha1['set_value']; ?>" />
							<? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
							
						</p>
						
                 	<p>
							<label>Admin Mail Id:</label>
						<input name="admin_mail" type="text" class="mf" id="month_sub" value="<?=$fetcha2['set_value']; ?>"  />     <? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
							
						</p>
						
                          
						<p>
							<label>Site Meta Title:</label>
							<input name="meta_title" type="text" class="mf" id="plan_name" value="<?=$fetch1['meta_title']; ?>" /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
							
						</p>
                        
              <p>
							<label>Site Meta Keywords:</label>
						<input name="meta_keyword" type="text" class="mf" id="setup" value="<?=$fetch1['meta_keyword']; $_SESSION['setup']='';?>"  /> 
                  <?php if($_SESSION['empty_setup']) { echo $_SESSION['empty_setup']; $_SESSION['empty_setup']=''; } ?>
							
						</p>
                        
                    			
						<p>
							<label>Site MetaDescription:</label>
							<textarea rows="5" cols="50" class="mf" name="meta_desc"><?=$fetch1['meta_desc']; ?></textarea><? if($_SESSION['empty_pdesc']) { echo $_SESSION['empty_pdesc']; $_SESSION['empty_pdesc']=''; } ?>
                           
							
						</p>
                        
                        <p>
							<label>Unique email Id :</label>
                            <input name="unique_email" type="text" class="mf" id="unique_email" value="<?=$fetcha3['set_value']; $_SESSION['unique_email']='';?>"  /> 
                            <? if($_SESSION['unique_email']) { echo $_SESSION['unique_email']; $_SESSION['unique_email']=''; } ?>
                            
							
							
						</p>
      
		
                          <p>
							<label>Check Ip  :</label>
                            <input name="unique_ip" type="text" class="mf" id="unique_ip" value="<?=$fetcha4['set_value']; $_SESSION['unique_ip']='';?>"  /> 
                            
							 <? if($_SESSION['unique_ip']) { echo $_SESSION['unique_ip']; $_SESSION['unique_ip']=''; } ?>
							
						</p>
                       					
						<div class="clearboth"></div>
						
					<p align="center" style="padding-right:400px">
                    
                         <input type="hidden" name="submit" value="1" />
                       <input class="button" type="submit" value="Submit" name="update" /></p>
					</fieldset>	
				</div> <!-- inner -->
			</div>
</form>