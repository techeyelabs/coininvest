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


<? 
	$id=$_GET['id'];
	 	$status=$_GET['status'];  	
	
	$member_id=mysql_fetch_array(mysql_query("select * from members where member_id='$id'"));
	
	

	?>


<form name='form1' method='post' action="sendmail_validate.php" >
<div id="primary_right">
				<div class="inner" style="width:70%">
                  <ul class="dash">
<li class="fade_hover tooltip" title="Send Mail to your Users">
		<a href="sendmail1.php">
			<img src="assets/icons/dashboard/70.png" alt="" />
			<span>Contact User</span>
		</a>
	</li>    </ul>
					<hr />

					<h1>Contact Users</h1>
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
						<legend>Send Message</legend>
						
						
						
						
						<p>
							<label style="vertical-align:top">To<font color="#FF0000">*</font></label>
							:<span id="chk4"> 
							 <input  name="to" type="text" class="mf" id="txtsub" disabled="disabled" value="<?=$member_id['member_email']; ?>"  />
						</p>
                        
                        
						
						<p>
							<label>Subject <font color="#FF0000">*</font></label>
							: <input name="txtsub" type="text" class="mf" id="txtsub" value="<?=$fetch['admin_mail']; ?>"  />&nbsp;&nbsp;<? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
							
						</p>
						
						<p>
							<label>Message<font color="#FF0000">*</font></label>
							: <textarea  class="editor" id="txtcontent" name="txtcontent"></textarea><br /><? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
							
						</p>
						
										
											
						<p align="center" style="padding-right:400px"><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>