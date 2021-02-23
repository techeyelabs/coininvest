<!--Content Portion Start-->

<div id="primary_right">

 <div class="inner" style="width:900px">

<?php require 'include/top/plan_management.php'; ?>

					 <!-- end dashboard items -->



					<hr />

                    <h1>Create Plans</h1>

                    

                    

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

   

    <?

		$fetch = mysql_fetch_array(mysql_query("select * from plan where plan_id=".$_GET['id']));

	?>

  <form name='form1' method='post' action="plans_validate.php" >

      

       

					<fieldset>

						<legend><font color="#FF0000">*</font> = Required Fields</legend>

                        

                          <p>

							<label>Plan Name  <font color="#FF0000">*</font></label>

							: 

                           <input name="plan_type" type="text" class="mf" id="plan_type" value="<?=$fetch['plan_type']; $_SESSION['plan_type']='';?>" />

						   <? if($_SESSION['empty_plan_type']) { echo $_SESSION['empty_plan_type']; $_SESSION['empty_plan_type']=''; } ?>                        

                             

						</p>

                        

                          <p>

							<label>Minimum Amount  <font color="#FF0000">*</font></label>

							: 

                          <input name="spend_min_amount" type="text" class="mf" id="spend_min_amount" value="<?=$fetch['spend_min_amount']; $_SESSION['spend_min_amount']='';?>" onkeyup="numchk(this)" onkeydown="numvalchk(this)" /> 

                  ($)<? if($_SESSION['empty_spend_min_amount']) { echo $_SESSION['empty_spend_min_amount']; $_SESSION['empty_spend_min_amount']=''; } ?>

                             

						</p>

                        

                          <p>

							<label>Maximum Amount <font color="#FF0000">*</font></label>

							: 

                         <input name="spend_max_amount" type="text" class="mf" id="spend_max_amount" value="<?=$fetch['spend_max_amount']; ?>" onkeyup="numchk(this)" onkeydown="numvalchk(this)"   /> 

                  ($)

                  <? if($_SESSION['empty_spend_max_amount']) { echo $_SESSION['empty_spend_max_amount']; $_SESSION['empty_spend_max_amount']=''; } ?>

                             

						</p>

                        

                        

                        <p>

							<label>Profit (Daily) <font color="#FF0000">*</font></label>

							: 

                       <input name="max_interest" type="text" class="mf" id="max_interest" style="width:50px" value="<?=$fetch['max_interest']; ?>" onkeyup="numchk(this)" onkeydown="numvalchk(this)"  />&nbsp;(%)<? if($_SESSION['empty_interest']) { echo $_SESSION['empty_interest']; $_SESSION['empty_interest']=''; } ?> 

                             

						</p>

                        

                         <p>

						               <table width="50%" border="1">

                <tr>

                <td align="left" width="21%%"><label>Bouns <font color="#FF0000">*</font></label></td>

                 <td align="right" width="2%%">:</td>

                <td align="left" width="10%" onclick="setbouns()" style="padding-left:5px;" >

                 <?php 

				 

				if($fetch['bonus_status'] == 'yes')

				{

					echo ' <input type="checkbox" checked="checked" class="iphone" name="bouns" id="bonus" value="yes"/>';

				}

				else

				{

					echo ' <input type="checkbox"  class="iphone" name="bouns" id="bonus" value="yes"/>';

				}

				?>

               

                  

               </td>

                     <?php 

               if($fetch['bonus_status'] == 'yes')

				{

					echo '<td width="15%" style="visibility:visible;" id="perbouns">

               

                <input  type="text"  value="'.$fetch['bonus_per'].'" name="perbouns" />&nbsp;(%)&nbsp;</td>';

				}

				else

				{

					echo '<td width="15%" style="visibility:hidden;" id="perbouns">

               

               <input  type="text"  value="'.$fetch['bonus_per'].'" name="perbouns" />&nbsp;(%)&nbsp;</td>';

				}

				?>

                

               

                </tr>

                </table>

                

               

                </p>

                

                

                        

                             <p>

							<label>Terms <font color="#FF0000">*</font></label>

							: 

                       <input name="period" type="text" class="mf" id="period" value="<?=$fetch['period']; ?>"  onkeyup="numchk(this)" onkeydown="numvalchk(this)"  />&nbsp;Days<input name="period_type" type="hidden" class="mf" id="period_type" value="1"/><!--<select name="period_type"><option value="1">Days</option><option value="2">Weeks</option><option value="3">Months</option><option value="4">Years</option></select>--><? if($_SESSION['empty_period']) { echo $_SESSION['empty_period']; $_SESSION['empty_period']=''; } ?>

                             

						</p>

                        

                          <!-- <p>

							<label>Withdrawal <font color="#FF0000">*</font></label>

							: 

                            	Instant Withdrawal-->

                        

                         

                             <?php 

              /* if($fetch['withdrawal_type'] == 'Instant')

				{

					echo '<input checked="checked" type="radio" name="Withdrawal" id="Withdrawal" value="Instant" />';

				}

				else

				{

				echo '<input type="radio" name="Withdrawal" id="Withdrawal" value="Instant" />';

				}*/

				?>

             <!--   Manual Withdrawal-->

                <?php 

              /* if($fetch['withdrawal_type'] == 'Manual')

				{

					echo ' <input type="radio" checked="checked"  name="Withdrawal" id="geWithdrawalnder" value="Manual" />';

				}

				else

				{

				echo ' <input type="radio" name="Withdrawal" id="geWithdrawalnder" value="Manual" />';

				}*/

				?>

              

						<!--</p>-->

                        

                         <p>

                         

                         <?php 
						 
						 $select_plan_level = mysql_query("select * from level_commission where plan_id=".$_GET['id']);
						echo $count_level = mysql_num_rows($select_plan_level);
						 $plan_level=$fetch['plan_level'];

						 $planarray=explode(',',$plan_level);

						 if(count($planarray))

						 {

							 $newout.='<input type="hidden" value="'.count($planarray).'" id="noofbid" name="noofbid">

							 <input type="hidden" id="theValue" value="bouns">';

							 $i=1;

							 foreach($planarray as $items)

							 {

								 $planinnerarray=explode('-',$items);

				

				

				if($i == 1)

				{

					$newout.='<table width="100%" >

                <tr>

                <td align="left" width="16%"><label>Level '.$planinnerarray[0].' <font color="#FF0000">*</font></label></td>

                 <td align="right" width="2%">:</td>

                <td align="left"  style="padding-left:5px;" >

               <div class="txt9" id="my1Div"> 

         <input type="text" id="bonuslevel" class="mf"  value="'.$planinnerarray[1].'" style="margin:5px;" onkeyup="numchk(this)" name="bonuslevel[]">&nbsp;(%)

         		

        <a href="javascript:;" onclick="addEvent();" class="txt9">Add</a>

		</div>

                  

               </td>

               

                </tr>

                </table>';

				}

				else

				{

					$newout.='<div id="olddiv'.$i.'"><table width="100%" >

                <tr>

                <td align="left" width="16%"><label>Level '.$planinnerarray[0].' </label></td>

                 <td align="right" width="2%">:</td>

                <td align="left"  style="padding-left:5px;" >

               <div class="txt9" id="my1Div"> 

         <input type="text" id="bonuslevel" class="mf"  value="'.$planinnerarray[1].'" style="margin:5px;" onkeyup="numchk(this)" name="bonuslevel[]">&nbsp;(%)

         		

       <a class="txt9" href="javascript:;" onclick="removeEvent(\'olddiv'.$i.'\')">Remove</a>

		</div>

                  

               </td>

               

                </tr>

                </table></div>';

				}

				

				

				$i++;

				

								

							 }

						 }

						

						

						 ?>

							

							

				  

             

                 <div id="myDiv"> 

                 <?php 

				 echo $newout;

				 ?>

                   </div>

                

               

                </p>

                        

                        <div class="clearboth"></div>

						

						<p align="center" style="padding-right:300px;" >

                         <input name="intrest_period" type="hidden" class="mf" id="intrest_period" value="1"/>

                  <input name="iperiod_type" type="hidden" class="mf" id="iperiod_type" value="1"/>

                  <input type="hidden" name="id" value="<?=$fetch['plan_id']; ?>" />

                          

                            <input class="button" type="submit" id="update" name="update" value="Update" />

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