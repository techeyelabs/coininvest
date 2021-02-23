<!--Content Portion Start-->

<? 
 if(!in_array("Settings",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
	
	
	if($_POST['submit'])
	{
		/*echo "<pre>";
		print_r($_POST);
		exit();*/
		
		$txtcontent = htmlentities($_POST['txtcontent']);
		
	
		$update = mysql_query("update analytics_code set content = '".$txtcontent."' where id = 1");
			
		$_SESSION['succ_dir']='<font color="#006600">Your Analytics Code has Successfully Updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=analytics_code.php" />';
		exit();

		
		
	}
	
	
	
	$select_analytics_code = mysql_fetch_array(mysql_query("select * from  analytics_code order by id asc limit 0,1"));
	
	
?>
<form name='form1' method='post' action="" id="form1" >
<div id="primary_right">
				<div class="inner" style="width:70%">
                <? require 'include/top/site_settings.php';
 ?>
									
					<hr />

					<h1>Analytics Code</h1>
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
					
					unset($_SESSION['succ_dir']);
					
					?>
					<fieldset>
						<legend>Analytics Code</legend>
						
						
						
						
						
						
						<p>
							<label>Code :</label>
						<textarea  class="mf" name="txtcontent" rows="10" cols="30" id="txtcontent"><?php echo $select_analytics_code['content'];?></textarea> 
                  <br />
                 		<span id="error_content" style="padding-left:160px; color:#FF0000; font-weight:bold;"></span>
							
						</p>
						
						<p>
						
						<hr />
						
						<div class="clearboth"></div>
						
						<p><input type="hidden" name="submit" value="1" /><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
$("#form1").submit(function(){

	var content = $("#txtcontent").val();
	
	if(content == '')
	{
		$("#error_content").html("Please Enter The Content");
		return false;
	}
	
});
</script>