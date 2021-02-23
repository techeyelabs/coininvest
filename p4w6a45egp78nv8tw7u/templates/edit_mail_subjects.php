<!--Content Portion Start-->

<?php 
	
	$fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =".$_GET['id']));
	
	
	
	if($_POST['submit'])
	{
			
		$from_id = $_POST['content_title'];
		$content_from = $_POST['content_from'];
		$content_subject = $_POST['content_subject'];
		$content_message =trim($_POST['content_message']);
		$content_id= $_POST['content_id'];
		
		if($from_id != '' && $content_from != '' && $content_subject != '' && $content_message != '')
		{
			
			$update=mysql_query("update mail_subjects set from_id = '".$from_id."',mailfrom = '".$content_from."', mailsubject = '".$content_subject."', message = '".$content_message."' where mail_id ='".$content_id."'");
			$_SESSION['success_flag']='<font color="#006600">Site Mail Updated Successfully</font>';
			echo '<meta http-equiv="refresh" content="0; url=mail_subjects.php" />';
			exit();
		}
		else
		{
			
			$_SESSION['empty_pass']="<font color='#FF0000'>Please enter the all values</font>";
			
			 
		}
	}
	
	
?>

<form name='form1' method='post' action="edit_mail_subjects.php?id=<?php echo $_GET['id']; ?>" >
<div id="primary_right">
				<div class="inner" style="width:70%">
<?php require 'include/top/preferences.php'; ?> 
					<hr />

					<h1>Site Mail Content</h1>
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
						<legend>Edit Site Mail Content</legend>
						
						
						<p>
							<label>Mail From Id <font color="#FF0000">*</font></label>
							: <input class="mf" name="content_title" type="text" value="<?php echo $fetch['from_id']; ?>" /> <?php if($_SESSION['empty_from_id']) { echo $_SESSION['empty_from_id']; $_SESSION['empty_from_id']=''; } ?>
							
						</p>
						
						<p>
							<label>Mail From <font color="#FF0000">*</font></label>
							: <input name="content_from" type="text" class="mf" id="content_from" value="<?php $fetch['mailfrom']; ?>" /> <?php if($_SESSION['empty_content_from']) { echo $_SESSION['empty_content_from']; $_SESSION['empty_content_from']=''; } ?>
							
						</p>
						<p>
							<label>Mail Subject <font color="#FF0000">*</font></label>
							: <input name="content_subject" type="text" class="mf" id="content_subject" value="<?php echo $fetch['mailsubject']; ?>" /> <?php if($_SESSION['empty_content_subject']) { echo $_SESSION['empty_content_subject']; $_SESSION['empty_content_subject']=''; } ?> 
							
						</p>
						
						<p>
						<label>Mail Message <font color="#FF0000">*</font></label>							
						: <textarea class="editor" name="content_message">
							<?php echo $fetch['message']; ?>
		</textarea><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" /><?php if($_SESSION['empty_content_message']) { echo $_SESSION['empty_content_message']; $_SESSION['empty_content_message']=''; } ?>
							
						</p>
						
					
						
						<hr />
						
						<div class="clearboth"></div>
						
		<p><input type="hidden" name="content_id" value="<?php echo $_GET['id']; ?>" /><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>
