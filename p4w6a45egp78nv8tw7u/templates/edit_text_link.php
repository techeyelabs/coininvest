<? 
	
	$fetch=mysql_fetch_array(mysql_query("select * from text_link where text_id =".$_GET['id']));
	
	if($_POST['submit'])
	{

		$plan_name = $_POST['plan_name'];
		
		$pcdesc = $_POST['month_sub'];

		if($pcdesc != '' && $plan_name != '')
		{
		
			$update=mysql_query("update text_link set text_content = '$plan_name',text_status = '$pcdesc' where text_id ='".$_GET['id']."'");
			$_SESSION['success_flag']='<font color="#006600">Promotional Tools Text Link Updated Successfully</font>';
			echo '<meta http-equiv="refresh" content="0; url=text_link.php" />';
			exit();
		}
		else
		{
			$_SESSION['empty_pass']="<font color='#FF0000'>Please Enter the Text Links Content</font>";
			echo '<meta http-equiv="refresh" content="0;url=edit_text_link.php?id="'.$_GET['id'].'>';
			exit();
		}
	}
	
	
?>

<form name='form1' method='post' action="edit_text_link.php?id=<?=$_GET['id']; ?>" >
<div id="primary_right">
				<div class="inner" style="width:70%">


					<? require 'include/top/promotional.php'; ?>				<hr />

					<h1>Edit Text Links</h1>
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
						<legend>Edit Text Links</legend>
						
						
						<p>
							<label>Text Link Content <font color="#FF0000">*</font></label>
							:
							<textarea class="editor" name="plan_name">
							<?=$fetch['text_content']; ?>
						</textarea> <br /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
						</p>
						
						<p>
							<label>Status<font color="#FF0000">*</font></label>
							
						: <input type="radio" name="month_sub" value="active" <? if($fetch['text_status'] == 'active')  echo 'checked="checked"' ?> />Active&nbsp;&nbsp;<input type="radio" name="month_sub" value="suspend"  <? if($fetch['text_status'] == 'suspend')  echo 'checked="checked"' ?>/>Suspend&nbsp;&nbsp; 
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