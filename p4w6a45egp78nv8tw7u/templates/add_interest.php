<!--Content Portion Start-->

<?php
	
	//$fetch=mysql_fetch_array(mysql_query("select * from admin_settings where admin_settings_id = 1"));
	if(isset($_POST['submit']))
	{

		$plan_name = $_POST['1'];
		
		
		if($_POST['1'] != '' && $_POST['2'] != '' && $_POST['3'] != '' && $_POST['4'] != '')
		{
			$date = date('Y-m-d');
			
			$update1=mysql_query("insert into daily_interest(plan_id,interest,change_date) values('1','".$_POST['1']."','".$date."')");
			$update2=mysql_query("insert into daily_interest(plan_id,interest,change_date) values('2','".$_POST['2']."','".$date."')");
			$update3=mysql_query("insert into daily_interest(plan_id,interest,change_date) values('3','".$_POST['3']."','".$date."')");
			$update4=mysql_query("insert into daily_interest(plan_id,interest,change_date) values('4','".$_POST['4']."','".$date."')");
			//$update5=mysql_query("insert into daily_interest(plan_id,interest,change_date) values('5','".$_POST['5']."','".$date."')");
			
			$_SESSION['succ_dir']='<font color="#006600">New Interest Rates Created Successfully</font>';
			echo '<meta http-equiv="refresh" content="0; url=add_interest.php" />';
			exit();
		}
		else
		{
			$_SESSION['empty_pass']="<font color='#FF0000'>Please enter the all the  values</font>";
			//echo '<meta http-equiv="refresh" content="0;url=add_faq.php">';
			//exit();
		}
	}
	
	
?>
<!--Content Portion Start-->
<div id="primary_right">
 <div class="inner" style="width:900px">
<?php require 'include/top/plan_management.php'; ?>
					 <!-- end dashboard items -->

					<hr />
                    <h1>Add Interest Rate</h1>
                    
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
                        
                        <form name="form1" action="add_interest.php" method="post">
					<fieldset>
						<legend><font color="#FF0000">*</font> = Required Fields</legend>
                        
                        <p>
							<label>BASIC PLAN <font color="#FF0000">*</font></label>
							: 
                              
                              <input name="1" type="text" class="tbox1" id="plan_name" value="<?=$_POST['1']; ?>" /><?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                              
                             
						</p>
                        
                        <p>
							<label>ADVANCED PLAN<font color="#FF0000">*</font></label>
							: 
                              
                              <input name="2" type="text" class="tbox1" id="plan_name" value="<?=$_POST['2']; ?>" /><?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                              
                             
						</p>
                         <p>
							<label>PROFESSIONAL PLAN<font color="#FF0000">*</font></label>
							: 
                              
                             <input name="3" type="text" class="tbox1" id="plan_name" value="<?=$_POST['3']; ?>" /><?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                              
                             
						</p>
                        
                          <p>
							<label>SENIOR PLAN<font color="#FF0000">*</font></label>
							: 
                              <input name="4" type="text" class="tbox1" id="plan_name" value="<?=$_POST['4']; ?>" /><?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                              
                             
						</p>
                        
                        <div class="clearboth"></div>
						
						<p align="center" style="padding-right:400px"><input class="button" type="submit" name="submit" value="Submit" /></p>
					
                        
                        
                        
                        
                        </fieldset>
                        </form>

    <div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
<!--Content Portion End-->
 <?php 
unset($_SESSION['succ_dir']);
unset($_SESSION['errror_msg']);
unset($_SESSION['empty_pass']);
?>