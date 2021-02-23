<?php
	
	$fetch=mysql_fetch_array(mysql_query("select * from faq where faq_id =".$_GET['id']));
	
	
	
	if($_POST['submit'])
	{


		$faq_question = $_POST['faq_question'];
		
		$faq_answer = $_POST['faq_answer'];

		if($faq_question != '' && $faq_answer != '')
		{
			
			$update=mysql_query("update faq set question = '".$faq_question."',answer ='".$faq_answer."' where faq_id ='".$_GET['id']."'");
			$_SESSION['success_flag']='<font color="#006600">FAQ Updated Successfully</font>';
			echo '<meta http-equiv="refresh" content="0; url=faq.php" />';
			exit();
		}
		else
		{
			$_SESSION['empty_pass']="<font color='#FF0000'>Please enter the both values</font>";
			echo '<meta http-equiv="refresh" content="0;url=edit_faq.php?id='.$_GET['id'].'>';
			exit();
		}
	}
	
	
?>

<form name='form1' method='post' action="edit_faq.php?id=<?=$_GET['id']; ?>" >
<div id="primary_right">
				<div class="inner" style="width:70%">
<? require 'include/top/content_management.php'; ?>
					<hr />

					<h1>Frequently Asked Questions</h1>
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
						<legend>Edit FAQ</legend>
						
						
						<p>
							<label>Question <font color="#FF0000">*</font></label>
							: <input class="mf" name="faq_question" type="text" value="<?=$fetch['question']; ?>" /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
							
						</p>
						
						<p>
							<label>Answer <font color="#FF0000">*</font></label>
							
						: <textarea class="editor" name="faq_answer"><?=$fetch['answer']; ?></textarea>
                        <input type="hidden" name="id" value="<?=$_GET['id']; ?>" />
							
						</p>
						
				<div class="clearboth"></div>
						
						<p style="padding-left:150px;"><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>