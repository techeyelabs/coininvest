<!--Content Portion Start-->
<?php
	
	//$fetch=mysql_fetch_array(mysql_query("select * from admin_settings where admin_settings_id = 1"));
	
	
	
	if($_POST['submit'])
	{

		$plan_name = $_POST['plan_name'];
		
		$pcdesc = $_POST['month_sub'];
		
		if(isset($_POST['status']))
		{
		$status = $_POST['status'];
		}
		else
		{
			$status = 0;
		}
		
		if($pcdesc != '' && $plan_name != '' )
		{
		
			$update=mysql_query("insert into level_commission(level_name,level_commission,status) values('$plan_name','$pcdesc','".$status."')");
			$_SESSION['success_flag']='<font color="#006600">New Level Created Successfully</font>';
			echo '<meta http-equiv="refresh" content="0; url=level_settings.php" />';
			exit();
		}
		else
		{
			$_SESSION['empty_pass']="<font color='#FF0000'>Please enter the both values</font>";
			echo '<meta http-equiv="refresh" content="0;url=add_level.php">';
			exit();
		}
	}
	
	
?>
<div id="primary_right">
 <div class="inner" style="width:900px">
<?php require 'include/top/referral.php'; ?>
					 <!-- end dashboard items -->

					<hr />
                    <h1>Add Level Settings</h1>
                    
                    
                     <?php if($_SESSION['success_flag'] != '')
					  { 
					  echo '<div class="notification success"> 
							<span></span> 
							<div class="text"> 
							<p><strong>Success!</strong>'.$_SESSION['success_flag'].'</p> 
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


      <form name='form1' method='post' action="add_level.php" >
      <fieldset>
						<legend><font color="#FF0000">*</font> = Required Fields</legend>
                        
                          <p>
							<label>Level Name <font color="#FF0000">*</font></label>
							: 
                            <input name="plan_name" type="text" class="mf" id="plan_name" value="" /><br /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
 
						</p>
                        
                          <p>
							<label>Commission (%)<font color="#FF0000">*</font></label>
							: 
                          <input name="month_sub" type="text" class="mf" id="month_sub" value=""  /> 
                  <br />
                  <? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
                           
                              
                             
						</p>
                        <p>
							<label>Referral Status</label>
                            
                           : <input type="checkbox" class="iphone" name="status" value="1" />
						                           
                           						
						</p>
                        
                        
                         <div class="clearboth"></div>
						
						<p align="center" style="padding-right: 310px;">
                           <input type="hidden" name="submit" value="1" />
                            <input class="button" type="submit" name="update" value="Submit" />
                        </p>
      
                               
              
           
                </fieldset>
                        </form>
      
      
      
   
    <div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
<!--Content Portion End-->
<?php 
unset($_SESSION['success_flag']);
unset($_SESSION['empty_pass']);
?>