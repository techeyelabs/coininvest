<? 
	$fetch=mysql_fetch_array(mysql_query("select * from cms_table where cms_id=15"));
	
	if($_POST['txtcontent'])
	{
		$con=$_POST['txtcontent'];
		
		$update=mysql_query("update cms_table set content='$con' where cms_id=15");
		$_SESSION['succ_msg']='<font color="#006600">One Time Offer Page Content has successfully updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=oto.php" />';
		exit();
	}
	
?>
 
		
 <form name="form1" method="post" action="oto.php" >
<div id="primary_right">
				<div class="inner">

					<? require 'include/top/preferences.php'; ?>

					
					
					<!-- YOUR CONTENT GOES HERE -->
					<hr />

					<h1>One Time Offer Page</h1>
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
						
						
						<textarea class="editor" name="txtcontent" style="height:400px">
							<?=$fetch['content']; ?>
						</textarea>
						
						<div class="clearboth"></div>
						
						<p><input class="button" type="submit" value="Submit" /> </p>
					</fieldset>
					<div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
			</form>