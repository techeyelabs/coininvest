<? 
	
	if($_POST['submit'])
	{

		$plan_name = $_FILES['plan_name']['name'];
	
		$pcdesc = $_POST['month_sub'];
		
		if($_FILES['plan_name']['name'] != '')
		{
		
			if($_FILES['plan_name']['type'] == 'image/jpeg' || $_FILES['plan_name']['type'] == 'image/bmp' || $_FILES['plan_name']['type'] == 'image/gif' || $_FILES['plan_name']['type'] == 'image/png')
			{
				$uploadfile = "../uploadimages/homepage/".date("Ymd").$_FILES['plan_name']['name'];
				move_uploaded_file($_FILES['plan_name']['tmp_name'],$uploadfile);
				$upload_path = "uploadimages/homepage/".date("Ymd").$_FILES['plan_name']['name'];
				
				
				$update=mysql_query("insert into homepage(banner_image,banner_status) values('$upload_path','$pcdesc')");
				$_SESSION['success_flag']='<font color="#006600">New home page banner added Successfully</font>';
				echo '<meta http-equiv="refresh" content="0; url=homepage.php" />';
				exit();
				
			}
			else
			{
				$_SESSION['empty_pass']="<font color='#FF0000'>Please upload the Banner Images in this format *.jpg,*.bmp,*.gif,*.png</font>";
				echo '<meta http-equiv="refresh" content="0;url=add_homepage.php">';
				exit();	
			}
		}
		else
		{
			$_SESSION['empty_pass']="<font color='#FF0000'>Please upload the Banner Images</font>";
			echo '<meta http-equiv="refresh" content="0;url=add_homepage.php">';
			exit();
		}
		
	}
	
	
?>

<form name='form1' method='post' action="add_homepage.php" enctype="multipart/form-data" >
<div id="primary_right">
				<div class="inner" style="width:70%">
<?php require 'include/top/content_management.php'; ?>

					 
					<hr />

					<h1>Banners</h1>
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
						<legend>Add a New Banners</legend>
						
						
						<p>
							<label>Banner Image <font color="#FF0000">*</font></label>
							: <input name="plan_name" type="file" class="tbox1" id="plan_name" value="" /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
							
						</p>
						
						<p>
							<label>Status <font color="#FF0000">*</font></label>
							
						: <input type="radio" name="month_sub" value="active" checked="checked" />Active&nbsp;&nbsp;<input type="radio" name="month_sub" value="suspend" />Supend&nbsp;&nbsp;
                  
                  <? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
							
						</p>
				<p align="center" style="padding-right:400px"><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>