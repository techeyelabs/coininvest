<?php 
 if(!in_array("Plan",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
?>
 
<div id="primary_right">
 <div class="inner" style="width:900px">
<?php require 'include/top/plan_management.php'; ?>
					 

					<hr />
                    <h1 style="color:#fff">Create Plans</h1>
                    
                    
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
    
   
  <form name='form1' method='post' action="plans_validate.php" >
      
       
					<fieldset>
						<legend><font color="#FF0000">*</font> = Required Fields</legend>
                        
                          <p>
							<label>Plan Name  <font color="#FF0000">*</font></label>
							: 
                           <input name="plan_type" type="text" class="mf" id="plan_type" value="<?php echo $_SESSION['plan_type']='';?>" />
						   <?php if($_SESSION['empty_plan_type']) { echo $_SESSION['empty_plan_type']; $_SESSION['empty_plan_type']=''; } ?>                        
                             
						</p>
                        
                          <p>
							<label>Minimum Investment <font color="#FF0000">*</font></label>
							: 
                          <input name="spend_min_amount" type="text" class="mf" id="spend_min_amount" value="<?php echo $_SESSION['spend_min_amount']='';?>" onkeyup="numchk(this)" onkeydown="numvalchk(this)" /> 
                  (&#x0E3F;)<?php if($_SESSION['empty_spend_min_amount']) { echo $_SESSION['empty_spend_min_amount']; $_SESSION['empty_spend_min_amount']=''; } ?>
                             
						</p>
                        
                          <p>
							<label>Maximum Investment <font color="#FF0000">*</font></label>
							: 
                         <input name="spend_max_amount" type="text" class="mf" id="spend_max_amount" value="" onkeyup="numchk(this)" onkeydown="numvalchk(this)"   /> 
                  (&#x0E3F;)
                  <?php if($_SESSION['empty_spend_max_amount']) { echo $_SESSION['empty_spend_max_amount']; $_SESSION['empty_spend_max_amount']=''; } ?>
                             
						</p>
                        
                        
                        <p>
							<label>Profit  <font color="#FF0000">*</font></label>
							: 
                        <input name="max_interest" type="text" class="mf" id="max_interest" style="width:50px" value="" onkeyup="numchk(this)" onkeydown="numvalchk(this)"  />&nbsp;(%)<?php if($_SESSION['empty_interest']) { echo $_SESSION['empty_interest']; $_SESSION['empty_interest']=''; } ?> 
                             
						</p>
                        
                             <p>
							<label>Interest Period Type   <font color="#FF0000">*</font></label>
							: 
                            
                       <select name="period_type">
<option value="">Select</option>
<option value="5">Hourly</option>
<option value="1">Day</option>
<option value="2">Week</option>
<option value="3">Month</option>
<option value="4">Year</option>
</select>

<?php if($_SESSION['empty_period_type']) { echo $_SESSION['empty_period_type']; $_SESSION['empty_period_type']=''; } ?> 
                             
                             
						</p>
                        
                        
        <p>
							
			  <input type="hidden"  class="iphone" name="interest" id="interest" value="1"/>			
		  <!--
                <table width="50%" border="1">
                <tr>
                <td align="left" width="37%"><label>Interest After Matured <font color="#FF0000">* </font></label></td>                 
                <td align="left" width="63%" onclick="_setbouns()" style="padding-left:5px;" >
                <input type="checkbox"  class="iphone_" name="interest_" id="interest_" value="1"/>                  
               </td>         
           
                </tr>
                </table>
                -->
               
                </p> 
                                          
                        
                <p>							
		<input type="hidden"  class="iphone" name="bouns" id="bonus" value="no"/>				
		
		 <!-- add underscore formake backup 
                <table width="50%" border="1">
                <tr>
                <td align="left" width="21%%"><label>Bouns <font color="#FF0000">*</font></label></td>
                 <td align="right" width="2%%">:</td>
                <td align="left" width="10%" onclick="_setbouns()" style="padding-left:5px;" >
                <input type="checkbox"  class="_iphone" name="_bouns" id="_bonus" value="yes"/>                  
               </td>
               <td width="15%" style="visibility:hidden;" id="perbouns"> <input  type="text"  value="" name="_perbouns" />&nbsp;(%)&nbsp;</td>
                </tr>
                </table>
                -->
                
               
                </p>
                <p>
							
							
				  
                <table width="50%" border="1">
                <tr>
                <td align="left" width="21%%"><label>Release Deposit <font color="#FF0000">*</font></label></td>
                 <td align="right" width="2%%">:</td>
                <td align="left" width="10%"  style="padding-left:5px;" >
                <input type="checkbox"  class="iphone" name="release_status" id="release_status" value="yes"/>
                  
               </td>
               <td width="15%" style="visibility:hidden;" id="perbouns"> <input  type="text" />&nbsp;(%)&nbsp;</td>
                </tr>
                </table>
                
               
                </p>
                        
                <p>
		<label>Duration <font color="#FF0000">*</font></label>: 
                       <input name="period" type="text" class="mf" id="period" value=""  onkeyup="numchk(this)" onkeydown="numvalchk(this)"  />
                      <?php if($_SESSION['empty_period']) { echo $_SESSION['empty_period']; $_SESSION['empty_period']=''; } ?>                             
		</p>
                        
                        <!-- <p>
			<label>Withdrawal <font color="#FF0000">*</font></label>: 
                       	:Instant Withdrawal <input checked="checked" type="radio" name="Withdrawal" id="Withdrawal" value="Instant" />
                        Manual Withdrawal <input type="radio" name="Withdrawal" id="geWithdrawalnder" value="Manual" /> 
			</p>-->
                     
                        
                 <p>
			<label>Duration Type<font color="#FF0000">*</font></label>:                             
                       <select name="iperiod_type">
                        <option value="">Select</option>
                        <option value="5">Hourly</option>
                        <option value="1">Daily</option>
                        <option value="2">Weekly</option>
                        <option value="3">Monthly</option>
                        <option value="4">Yearly</option>
                        </select>
			<?php if($_SESSION['empty_iperiod_type']) { echo $_SESSION['empty_iperiod_type']; $_SESSION['empty_iperiod_type']=''; } ?>                             
                       
		</p>
                        
                        
                        
                        
                         <p>
							
							
				  
                <table width="100%" >
                <tr>
                <td align="left" width="16%"><label>Level 1 <font color="#FF0000">*</font></label></td>
                 <td align="right" width="2%">:</td>
                <td align="left"  style="padding-left:5px;" >
               <div class="txt9" id="my1Div"> 
         		<input type="text" id="bonuslevel" class="mf"  style='margin:5px;' onkeyup="numchk(this)" name="bonuslevel[]">&nbsp;(%)
         		<input type="hidden" id="theValue" value="bouns">
			<input type="hidden" value="1" id="noofbid" name="noofbid">
        		<a href="javascript:;" onclick="addEvent();" class="txt9">Add</a>
		</div>
                  
               </td>
               
                </tr>
                </table>
                 <div id="myDiv"> 
                   </div>
                
               
                </p>
                     
                                             
                      
        <div class="clearboth"></div>						
	                    <p align="center" style="padding-right:300px;" >
                         <input name="intrest_period" type="hidden" class="mf" id="intrest_period" value="1"/>
                            <input type="hidden" name="type" value="insert" />
                            <input class="button admin-btn" type="submit" id="update" name="update" value="submit" />
                        </p>
                        
                        </fieldset>
    
                 <!--<tr>
                  <td align="right" class="formtext2"> <span class="redstar">*</span>Interest Period :</td>
                  <td align="left" class="formtext2"><input name="intrest_period" type="text" class="mf" id="intrest_period" value="
				  <?//=$fetch['intrest_period']; ?>"   onkeyup="numchk(this)" onkeydown="numvalchk(this)" />&nbsp;<select name="iperiod_type"><option value="1">Days</option><option value="2">Weeks</option><option value="3">Months</option><option value="4">Years</option></select>
				  <? //if($_SESSION['empty_intrest_period']) { echo $_SESSION['empty_intrest_period']; $_SESSION['empty_intrest_period']=''; } ?></td>
                </tr>-->
                 </form>
                </table>
  
    <div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
<script language="javascript">
function numchk (tag)
{       
	var1=tag.value; // tval is textbox (element) checking for characters only
   	s=var1.substr(var1.length-1,1); 	 
	m=s.charCodeAt(0);            
	if (!((m>=48 && m<=57 )||(m==46) || isNaN(m)))
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
	if (!((m>=48 && m<=57 )||(m==46) || isNaN(m)))
	{		
		ch=var1.substr(0,var1.length-1);		
		tag.value=ch;						
	}
}

function setbouns()
{
	var chkstatus=document.getElementById("bonus").checked;
	if(chkstatus == true)
	{	
		document.getElementById("perbouns").style.visibility="visible";
	}
	else
	{
		document.getElementById("perbouns").style.visibility="hidden";
	}
}
</script>
<script type="text/javascript" language="javascript">

function addEvent(id)
{
var noofsam = parseFloat(document.getElementById("noofbid").value);
noofsam = noofsam + 1;
document.getElementById("noofbid").value = noofsam;
var levelcount=noofsam ;
var lstid=id;
var ni = document.getElementById('myDiv');
var numi = document.getElementById('theValue');
var num = (document.getElementById("theValue").value - lstid)+ 2;
numi.value = num;
var divIdName = "my"+num+"Div"+noofsam;

var newdiv = document.createElement('div');
newdiv.setAttribute("id",divIdName);
noofsam = noofsam - 1;

  
  
  newdiv.innerHTML = "<table width='100%'><tbody><tr><td width='16%' align='left'><label>Level "+levelcount+"</label></td><td width='2%' align='right'>:</td><td align='left' style='padding-left: 5px;'><input type=\"text\" onkeyup=\"numchk(this)\" name=\"bonuslevel[]\"  class=\"mf\" id=\"bonuslevel\">(%)&nbsp;<a class=\"txt9\" href=\"javascript:;\" onclick=\"removeEvent(\'"+divIdName+"\')\">Remove</a></td></tr></tbody></table>";
				
				
  
//newdiv.innerHTML = "<input type=\"text\" name=\"bonuslevel[]\"  style='margin:5px;' class=\"mf\" id=\"bonuslevel\"><a class=\"txt9\" href=\"javascript:;\" onclick=\"removeEvent(\'"+divIdName+"\')\">Remove</a>";

ni.appendChild(newdiv);
num++;
}


function removeEvent(divNum,ansid)
{
  var noofsam = parseFloat(document.getElementById("noofbid").value);
	noofsam = noofsam - 1;
	document.getElementById("noofbid").value = noofsam;

//var del=confirm("Are you want to delete this Answer");
 //if(del==true){
	var d = document.getElementById('myDiv');
	var olddiv = document.getElementById(divNum);
	d.removeChild(olddiv);
// }
}



</script>


<!--Content Portion End-->
 <?php 
unset($_SESSION['succ_dir']);
unset($_SESSION['errror_msg']);
unset($_SESSION['empty_pass']);
?>
