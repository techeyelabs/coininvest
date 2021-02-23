<!--Content Portion Start-->
<? 
	
	$fetch=mysql_fetch_array(mysql_query("select * from news where news_id =".$_GET['id']));
	
	
	
	if($_POST['submit'])
	{

		$plan_name = $_POST['plan_name'];
		
		$pcdesc = $_POST['month_sub'];

		if($pcdesc != '' && $plan_name != '')
		{
			$dt = date('Y-m-d H:i:s');	
			$update=mysql_query("update news set news_header = '$plan_name',news_description = '$pcdesc',dt = '$dt' where news_id ='".$_GET['id']."'");
			$_SESSION['success_flag']='<font color="#006600">News Updated Successfully</font>';
			echo '<meta http-equiv="refresh" content="0; url=news.php" />';
			exit();
		}
		else
		{
			$_SESSION['empty_pass']="<font color='#FF0000'>Please enter the both values</font>";
			echo '<meta http-equiv="refresh" content="0;url=edit_news.php?id="'.$_GET['id'].'>';
			exit();
		}
	}
	
	
?>

<form name='form1' method='post' action="edit_news.php?id=<?=$_GET['id']; ?>" >
<div id="primary_right">
				<div class="inner" style="width:70%">
<? require 'include/top/preferences.php'; ?>
					<hr />

					<h1>Site News</h1>
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
						<legend>Edit Site News</legend>
						
						
						<p>
							<label>News Header <font color="#FF0000">*</font></label>
							: <input class="mf" name="plan_name" type="text" value="<?=$fetch['news_header']; ?>" /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
							
						</p>
						
						<p>
							<label>News Description <font color="#FF0000">*</font></label>
							
						: <textarea class="editor" name="month_sub">
							<?=$fetch['news_description']; ?>
						</textarea><input type="hidden" name="id" value="<?=$_GET['id']; ?>" />
							
						</p>
						<div class="clearboth"></div>
						
						<p style="padding-left:150px;"><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>