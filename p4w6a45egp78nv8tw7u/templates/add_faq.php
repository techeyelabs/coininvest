<?php

	if($_POST['submit'])
	{
 
		$faq_qus = trim($_POST['faq_qus']);
		
		$faq_ans = trim($_POST['faq_ans']);
		if($faq_qus != '' && $faq_ans != '')
		{
			
			$update=mysql_query("insert into faq(question,answer) values('".$faq_qus."','".$faq_ans."')");
			$_SESSION['success_flag']='<font color="#006600">FAQ Created Successfully</font>';
			echo '<meta http-equiv="refresh" content="0; url=faq.php" />';
			exit();
		}
		else
		{
			$_SESSION['empty_pass']="<font color='#FF0000'>Please enter the both values</font>";
			echo '<meta http-equiv="refresh" content="0;url=add_faq.php">';
			exit();
		}
	}
	
	
?>

<form name='form1' method='post' action="add_faq.php" >
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
						<legend>Add a New FAQ</legend>
						
						
						<p>
							<label>Question <font color="#FF0000">*</font></label>
							: <input class="mf" name="faq_qus" type="text" value="" />
							<? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
							
						</p>
						
						<p>
							<label>Answer<font color="#FF0000">*</font></label>
							 
						: <textarea class="editor" name="faq_ans">
							
						</textarea>
							
						</p>
												
						<p align="center" style="padding-right:400px"> <input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>