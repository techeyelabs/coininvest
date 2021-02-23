<!--Content Portion Start-->
<?php
	//$fetch=mysql_fetch_array(mysql_query("select * from admin_settings where admin_settings_id = 1"));

	if($_POST['submit'])

	{

$plan_name = $_POST['1'];
if($_POST['1'] != '' && $_POST['2'] != '' && $_POST['3'] != '' && $_POST['4'] != ''){

			$date = date('Y-m-d');
			$update1 = mysql_query("update daily_interest set interest = '".$_POST['1']."' where plan_id='1' and change_date='".date('Y-m-d')."'");

			$update2 = mysql_query("update daily_interest set interest = '".$_POST['2']."' where plan_id='2' and change_date='".date('Y-m-d')."'");

			$update3 = mysql_query("update daily_interest set interest = '".$_POST['3']."' where plan_id='3' and change_date='".date('Y-m-d')."'");

			$update4 = mysql_query("update daily_interest set interest = '".$_POST['4']."' where plan_id='4' and change_date='".date('Y-m-d')."'");

			//$update5 = mysql_query("update daily_interest set interest = '".$_POST['5']."' where plan_id='5' and change_date='".date('Y-m-d')."'");

/*$update1=mysql_query("insert into daily_interest(plan_id,interest,change_date) values('1','".$_POST['1']."','".$date."')");

			$update2=mysql_query("insert into daily_interest(plan_id,interest,change_date) values('2','".$_POST['2']."','".$date."')");

			$update3=mysql_query("insert into daily_interest(plan_id,interest,change_date) values('3','".$_POST['3']."','".$date."')");

			$update4=mysql_query("insert into daily_interest(plan_id,interest,change_date) values('4','".$_POST['4']."','".$date."')");

			$update5=mysql_query("insert into daily_interest(plan_id,interest,change_date) values('5','".$_POST['5']."','".$date."')");*/
		$_SESSION['success_flag']='<font color="#006600">Interest Rates updated Successfully</font>';

			echo '<meta http-equiv="refresh" content="0; url=view_interest.php" />';

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


<div id="primary_right">
 <div class="inner" style="width:900px">
<?php require 'include/top/plan_management.php'; ?>
					 <!-- end dashboard items -->

					<hr />
                    <h1>Edit Interest Rate</h1>
                    
                    
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
                        
                          <?php	
	$select1 = mysql_fetch_array(mysql_query("select * from daily_interest where change_date='".date('Y-m-d')."' and plan_id = 1"));
	$select2 = mysql_fetch_array(mysql_query("select * from daily_interest where change_date='".date('Y-m-d')."' and plan_id = 2"));
	$select3 = mysql_fetch_array(mysql_query("select * from daily_interest where change_date='".date('Y-m-d')."' and plan_id = 3"));
	$select4 = mysql_fetch_array(mysql_query("select * from daily_interest where change_date='".date('Y-m-d')."' and plan_id = 4"));
 ?>
   <form name='form1' method='post' action="edit_interest.php?id=<?=$_GET['id']; ?>" >
<fieldset>
						<legend><font color="#FF0000">*</font> = Required Fields</legend>
                        <h2>Interest Information</h2>
                        
                        <p>
							<label>BASIC PLAN  <font color="#FF0000">*</font></label>
							: 
                            <input name="1" type="text" class="sf" id="plan_name" value="<?=$select1['interest']; ?>" />
                            
							<?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                            
						</p>
                        
                        <p>
							<label>ADVANCED PLAN  <font color="#FF0000">*</font></label>
							: 
                            <input name="2" type="text" class="sf" id="plan_name" value="<?=$select2['interest']; ?>" /><br /><?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                            
						</p>
                        
                                
                        <p>
							<label>PROFESSIONAL PLAN  <font color="#FF0000">*</font></label>
							: 
                            <input name="3" type="text" class="sf" id="plan_name" value="<?=$select3['interest']; ?>" /><br /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                            
						</p>
                        
                             <p>
							<label>SENIOR PLAN  <font color="#FF0000">*</font></label>
							: 
                          <input name="4" type="text" class="sf" id="plan_name" value="<?=$select4['interest']; ?>" /><br /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                            
						</p>
                        <div class="clearboth"></div>
						
						<p><input class="button" name="submit" type="submit" value="Submit" /> <!--<input class="button" type="reset" value="Reset" />--></p>
                                         
                        
</fieldset>
</form>
<div class="clearboth"></div>
</div> <!-- inner -->
</div>


<!--Content Portion End-->