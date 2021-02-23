<!--Content Portion Start-->
<?php	
 if(!in_array("Settings",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
	
	$fetch=mysql_query("select * from admin_settings");
	while($info = mysql_fetch_array($fetch))
	{
			$vari[] = $info['set_id']; 
			$values[] = $info['set_value']; 
	}
	
	
	
	if($_POST['submit'])
	{

		mysql_query("update admin_settings set set_value='".$_POST['6']."' where set_id = 6");
		mysql_query("update admin_settings set set_value='".$_POST['7']."' where set_id = 7");
		mysql_query("update admin_settings set set_value='".$_POST['8']."' where set_id = 8");
		mysql_query("update admin_settings set set_value='".$_POST['15']."' where set_id = 15");
		mysql_query("update admin_settings set set_value='".$_POST['43']."' where set_id = '43'");
		$_SESSION['succ_dir']='<font color="#006600">Successfully Updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=general_settings.php" />';
		exit();
	}
	
	
?>
<div id="primary_right">
 <div class="inner" style="width:900px">
<?php require 'include/top/site_settings.php'; ?>
					 <!-- end dashboard items -->

					<hr />
                    <h1>General Settings</h1>
                    
                    
                     <?php if($_SESSION['succ_dir'] != '')
					  { 
					  echo '<div class="notification success"> 
							<span></span> 
							<div class="text"> 
							<p><strong>Success!</strong>'.$_SESSION['succ_dir'].'</p> 
							</div> 
						 </div>';
						} ?>


                     <?php if($_SESSION['empty_pass'] != '')
					  { 
					  echo '<div class="notification error" style="cursor: auto;"> 
						<span></span> 
						<div class="text"> 
							<p><strong><cufon class="cufon cufon-canvas" alt="Error!" style="width: 52px; height: 22px;"><canvas width="70" height="23" style="width: 70px; height: 23px; top: -1px; left: -1px;"></canvas><cufontext>Error!</cufontext></cufon></strong><font size="1" color="#ff0000">'.$_SESSION['empty_pass'].'</font></p> 
						</div> 
					</div>';
						} ?>

  <form name='form1' method='post' action="general_settings.php" >
  <fieldset>
						<legend><font color="#FF0000">*</font> = Required Fields</legend>
                       
                           <p >
							<label style="width:248px;" >Minimum Withdraw Amount <font color="#FF0000">*</font></label>
							: 
          
    <input name="<?=$vari[5]; ?>" type="text" class="mf" id="plan_name" value="<?=$values[5]; ?>" onkeyup="numchk (this)" onkeydown="numvalchk (this)" /> USD &nbsp;<? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
						</p>
                        
                          <p>
							<label style="width:248px;" > Maximum Withdraw Amount <font color="#FF0000">*</font></label>
							: 
      <input name="<?=$vari[6]; ?>" type="text" class="mf" id="month_sub" value="<?=$values[6]; ?>"  onkeyup="numchk (this)" onkeydown="numvalchk (this)"  /> USD &nbsp; <? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
						</p>
                        
                          <p>
							<label style="width:248px;" > Number of Withdraw Allowed in a Month <font color="#FF0000">*</font></label>
							: 
      <input name="<?=$vari[7]; ?>" type="text" class="mf" id="month_sub" value="<?=$values[7]; ?>"   onkeyup="numchk (this)" onkeydown="numvalchk (this)"/> NOS
                 &nbsp;
                  <? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
						</p>
                        
                           <p>
							<label style="width:248px;" >Admin Withdraw Commission in % <font color="#FF0000">*</font></label>
							: 
                            
      <input name="<?=$vari[14]; ?>" type="text" class="mf" id="month_sub" value="<?=$values[14]; ?>" onkeyup="numchk (this)" onkeydown="numvalchk (this)"  /> 
                  &nbsp;
                  <? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
						</p>
                        
                        
                         <p>
							<label style="width:248px;" >Representative commission<font color="#FF0000">*</font></label>
							: 
                            
      <input name="<?=$vari[35]; ?>" type="text" class="mf" id="rep_commission" value="<?=$values[35]; ?>"  /> 
                  &nbsp;
                  <? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
						</p>
                        
                        
                        
                         <div class="clearboth"></div>
						
						<p align="center" style="padding-right:230px;" >
                          <input type="hidden" name="submit" value="1" />
                          
                            <input class="button" type="submit" id="update" name="update" value="Update" />
                        </p>
                        
                        </fieldset>
                        
  </form>
    </table>
   
    <div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
<!--Content Portion End-->
<!--Content Portion End-->
<?php
unset($_SESSION['succ_dir']);
unset($_SESSION['empty_pass']);

?>
  
<!--Content Portion End-->
<script language="javascript">
function numchk (tag)
{       
	var1=tag.value; // tval is textbox (element) checking for characters only
   	s=var1.substr(var1.length-1,1); 	 
	m=s.charCodeAt(0); 
	           
	if (!((m>=48 && m<=57 )||(m==32) || isNaN(m)))
	{
		//alert ("Invalid input");	
		ch=var1.substr(0,var1.length-1);		
		tag.value=ch;						
	}
}
function numvalchk (tag)
{       
	var1=tag.value; // tval is textbox (element) checking for characters only
s=var1.substr(var1.length-1,1); 	 
	m=s.charCodeAt(0);            
	if (!((m>=48 && m<=57 )||(m==32) || isNaN(m)))
	{		
		ch=var1.substr(0,var1.length-1);		
		tag.value=ch;						
	}
}
</script>
