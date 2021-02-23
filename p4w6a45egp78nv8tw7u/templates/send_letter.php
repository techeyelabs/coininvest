<?php
 if(!in_array("Preferences",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }

?>

<script type="text/javascript" src="js/ajax.js"></script>

<script type="text/javascript">

function changeAmt(val)

{

	url1="sendmail.php?status="+val;


	divid1="chk4";

	ajax(url1,divid1);



}



</script>

<form name='form1' method='post' action="send_letter_validate.php" >
<div id="primary_right">
				<div class="inner" style="width:70%">
<?php require 'include/top/preferences.php'; ?>

					<hr />

					<h1>Send Mail to Users (News Letter)</h1>
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
						<legend>Send Mail</legend>
						
						
						
						
						<p>
							<label style="vertical-align:top">Select Users <font color="#FF0000">*</font></label>
							:<span id="chk4"> 
							  <?php
								$select=mysql_query("select * from members");
							  ?>
							<select name="txtmmember[]" multiple="multiple" size="7" style="width:200px">
                  <option value="all" selected="selected">All</option>
                  <?php if(mysql_num_rows($select) > 0)
				  {
				  	while($fetch=mysql_fetch_array($select))
					{
				  ?>
                  <option value="<?php echo $fetch['member_email']; ?>"><?php echo $fetch['member_email']; ?></option>
                  <?php
				  }
				  }
				  ?>
                  
                  </select><br /><?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?></span>
						</p>
                        
                        
						
						<p>
							<label>Subject <font color="#FF0000">*</font></label>
							: <input name="txtsub" type="text" class="mf" id="txtsub" value="<?php echo $fetch['admin_mail']; ?>"  />&nbsp;&nbsp;<?php if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
							
						</p>
						
						<p>
							<label>Message<font color="#FF0000">*</font></label>
							: <textarea  class="editor" id="txtcontent" name="txtcontent"></textarea><br /><?php  if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
							
						</p>
						
										
											
						<p align="center" style="padding-right:400px"><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>
