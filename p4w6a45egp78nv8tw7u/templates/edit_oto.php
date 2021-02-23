<? 
	
	$id=(int)$_GET['id'];
	$fetch=mysql_fetch_array(mysql_query("select * from cms_table where cms_id=$id"));
	
	
	
	if($_POST['txtcontent'])
	{
		$con=$_POST['txtcontent'];
		$title = $_POST['txt_title']; 
		$update=mysql_query("update cms_table set content='$con' where cms_id=$id");
		$_SESSION['succ_msg']='<font color="#006600">'.$title.' Content has successfully updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=cms.php?id='.$id.'" />';
		exit();
	}
	
	
?>
 <form name="form1" method="post" action="cms.php?id=<?=$id; ?>" >
<div id="primary_right">
				<div class="inner">

					
					
					<!-- YOUR CONTENT GOES HERE -->
					<hr />

					<h1>Content Management System</h1>
					 <? if($_SESSION['succ_msg']) 
					 { 
					?>
					<div class="notification success"> 
					<span></span> 
					<div class="text"> 
						<p><strong>Success!</strong> <? echo $_SESSION['succ_msg']; $_SESSION['succ_msg']=''; ?> </p> 
					</div> 
					</div>
					<?
					
					}
					?>
					<fieldset>
						
						
						<hr />
						
						<h2 style="clear:both;"><? echo $fetch['title'];  ?><input type="hidden" name="txt_title" value="<? echo $fetch['title'];  ?>" /></h2>
						
						<textarea class="editor" name="txtcontent">
							<?=$fetch['content']; ?>
						</textarea>
						
						<div class="clearboth"></div>
						
						<p><input class="button" type="submit" value="Submit" /> </p>
					</fieldset>
					<div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
			</form>