<!--Content Portion Start-->
<?php
	
	$fetch=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 33"));
	
	if($_POST['submit'])
	{
				
		
		if(isset($_POST['status']) && $_POST['status'] != '' )
		{	
			$update1=mysql_query("update admin_settings set set_value='on' where set_id = 33");
		}
		else
		{
			$update1=mysql_query("update admin_settings set set_value='off' where set_id =33");
		}
				
	
				
		$_SESSION['succ_dir']='<font color="#006600">Successfully Updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=level_status.php" />';
		exit();
	}
	
	
?>

<div id="primary_right">
				<div class="inner" style="width:70%">
<?php require 'include/top/referral.php'; ?>

					 <!-- end dashboard items -->
					  <!-- sortable end -->
					<hr />

					<h1>Referral Status</h1>
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
                        
                         <form name='form1' method='post' action="level_status.php" >
                        
					<fieldset>
						<legend>Manage your Referral Status</legend>
						
						
						<p>
							<label>Referral Status:</label>
                            
                            <input type="checkbox" <? if($fetch['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="status" />
						                           
                           						
						</p>
					
						
                       
                       					
						<div class="clearboth"></div>
						
					<p align="center" style="padding-right:400px">
                    
                         <input type="hidden" name="submit" value="1" />
                       <input class="button" type="submit" value="Submit" name="update" /></p>
					</fieldset>	
                    </form>
				</div> <!-- inner -->
			</div>
