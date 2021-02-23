<!--Content Portion Start-->
<? 
	
	if($_POST['submit'])
	{

		$plan_name = $_POST['plan_name'];
		$pcdesc = $_POST['month_sub'];
		
		if(strlen($plan_name) >'15')
		{
		
			$update=mysql_query("insert into video_table(video_source,video_status) values('$plan_name','$pcdesc')");
			$_SESSION['success_flag']='<font color="#006600">New Promtional Tool Videos added Successfully</font>';
			echo '<meta http-equiv="refresh" content="0; url=videos.php" />';
			exit();
		}
		else
		{
			$_SESSION['empty_pass']="<font color='#FF0000'>Please Enter the Embedded tag for Videos</font>";
			echo '<meta http-equiv="refresh" content="0;url=add_videos.php">';
			exit();
		}
	}
	
	
?>

<form name='form1' method='post' action="add_videos.php" >
<div id="primary_right">
				<div class="inner" style="width:70%">
<? require 'include/top/promotional.php'; ?>
									<hr />

					<h1>Add New Videos</h1>
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
					
					 <? if($_SESSION['empty_pass']) 
					 { 
					?>
					<div class="notification error"> 
						<span></span> 
						<div class="text"> 
							<p><strong>Error!</strong> <? echo $_SESSION['empty_pass']; $_SESSION['empty_pass']=''; ?></p> 
						</div> 
					</div>
					<?
					
					}
					?>
					<fieldset>
						<legend>Add a New Videos</legend>
						
						
						<p>
							<label>Videos Embedded Tag Content <font color="#FF0000">*</font></label>
							:
							<textarea class="editor" name="plan_name">
							
						</textarea> <br /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?><br /><font size="-2">Make sure that Width = 250px and Height = 175px respectively.</font>
						</p>
						
						<p>
							<label>Status<font color="#FF0000">*</font></label>
							
						: <input type="radio" name="month_sub" value="active" checked="checked" />Active&nbsp;&nbsp;<input type="radio" name="month_sub" value="suspend" />Suspend&nbsp;&nbsp;
                  <br />
                  <? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
							
						</p>
						
						
					
						
						<hr />
						
						<div class="clearboth"></div>
						
						<p><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>