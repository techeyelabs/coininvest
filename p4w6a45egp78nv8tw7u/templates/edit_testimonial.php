<!--Content Portion Start-->
<? 
	
	$fetch=mysql_fetch_array(mysql_query("select * from testimonial where test_id =".$_GET['id']));
	
	
	if($_POST['submit'])
	{
	
		

		$sub = $_POST['subject'];
		
		$msg = trim($_POST['message']);

		if($msg != '' && $sub != '')
		{
			$dt = date('Y-m-d H:i:s');	
			
			$update=mysql_query("update testimonial set test_title = '$sub',test_desc = '$msg' where test_id ='".$_GET['id']."'");
			$_SESSION['success_flag']='<font color="#006600">Testimonial Updated Successfully</font>';
			echo '<meta http-equiv="refresh" content="0; url=testimonial.php" />';
			exit();
		}
		else
		{
			$_SESSION['empty_pass']="<font color='#FF0000'>Please enter both values</font>";
			echo '<meta http-equiv="refresh" content="0;url=edit_testimonial.php?id="'.$_GET['id'].'>';
			exit();
		}
	}
	
	
?>

<form name='form1' method='post' action="edit_testimonial.php?id=<?=$_GET['id']; ?>" >
<div id="primary_right">
				<div class="inner" style="width:70%">
<? require 'include/top/preferences.php'; ?>
					<hr />

					<h1>Testimonial</h1>
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
						<legend>Edit Testimonial</legend>
						
					
                        
						<p>
							<label>Subject <font color="#FF0000">*</font></label>
							: <input class="mf" name="subject" type="text" value="<?=$fetch['test_title']; ?>" /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
							
						</p>
						
						<p>
							<label>Message <font color="#FF0000">*</font></label>
							
						: <textarea class="editor" name="message">
							<?=$fetch['test_desc']; ?>
						</textarea><input type="hidden" name="id" value="<?=$_GET['id']; ?>" />
							
						</p>
						<div class="clearboth"></div>
						
						<p style="padding-left:150px;"><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>