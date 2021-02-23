<?php
$fetch=mysql_fetch_array(mysql_query("select * from promotional where banner_id =".$_GET['id']));
	
	if(isset($_POST['submit']))
	{
			if($_FILES['plan_name']['name'] != '')
		{
		
		 $plan_logo = $_FILES['plan_name']['name'];   

	
	
		$image_type = $_FILES['plan_name']['type'];


	
		if($_FILES['plan_name']['name'] != '')
		{
		
			if($_FILES['plan_name']['type'] == 'image/jpeg' || $_FILES['plan_name']['type'] == 'image/bmp' || $_FILES['plan_name']['type'] == 'image/gif' || $_FILES['plan_name']['type'] == 'image/png')
			{
			$pcdesc = $_POST['month_sub'];
			$uploads=$plan_logo;
			$uploads = date('YmdHis').rand(0,999).$uploads;
			$uploads1="uploadimages/".$uploads;
			move_uploaded_file($_FILES["plan_name"]["tmp_name"],$uploads1);
			$new_image = "uploadimages/".$uploads;
		
		}
		else
			{
				$_SESSION['empty_pass']="<font color='#FF0000'>Please upload the Banner Images in this format *.jpg,*.bmp,*.gif,*.png</font>";
				echo '<meta http-equiv="refresh" content="0;url=edit_promotional.php?id='.$_GET['id'].'">';
				exit();	
			}
	}
		$up_image="update promotional set banner_status='$pcdesc',banner_image='$new_image' where banner_id ='".$_GET['id']."'"; 
		
		
		
		mysql_query($up_image);
		
		$_SESSION['succ_dir']='<font color="#006600">Promotional Tools Image  Updated Successfully</font>';
		echo '<meta http-equiv="refresh" content="0; url=promotional.php" />';
		exit();
		
		}
	
	}
	
?>

<form name='form1' method='post' action="edit_promotional.php?id=<?=$_GET['id']; ?>" enctype="multipart/form-data" >
<div id="primary_right">
				<div class="inner" style="width:70%">
<? require 'include/top/referral.php'; ?>

					 
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
						<legend>Edit Promotional Banners</legend>
						
						
						<p>
							<label>Banner Image <font color="#FF0000">*</font></label>
							:<input name="plan_name" type="file" class="tbox1" id="plan_name" value="<?=$fetch['banner_image']; ?>" />
							<? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                            <img  border="0" src="../<?=$fetch['banner_image']; ?>" alt="" height="50" width="50" />
							
						</p>
						
						<p>
							<label>Status <font color="#FF0000">*</font></label>
							
						: <input type="radio" name="month_sub" value="active" <? if($fetch['banner_status'] == 'active')  echo 'checked="checked"' ?> />Active&nbsp;&nbsp;<input type="radio" name="month_sub" value="suspend"  <? if($fetch['banner_status'] == 'suspend')  echo 'checked="checked"' ?>/>Supend&nbsp;&nbsp; 
                  <br />
                  <? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
							
						</p>
									
						<p align="center" style="padding-right:400px"><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>