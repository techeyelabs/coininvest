<?php
 if(!in_array("Investment",$permission)) 
 {  
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit(); 
 }
require 'include/validation.php';
?>
<script language="JavaScript" src="calendar_us.js"></script>
<link rel="stylesheet" href="calendar.css">
<body onLoad="ajax('manual_depositplans.php?pln_id='+<?=$_POST['cboPlan']?>,'plandis')">
<?php
//echo "<pre>";
//print_r($_POST);
//exit;

function checkDateFormat($date)
{
  if (preg_match ("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $date, $parts))
 {
if(checkdate($parts[2],$parts[3],$parts[1]))
  return true;
 else
return false;
}
else
 return false;
}
$save=$_POST['canSave'];
if($save==1)
{
$userid=$_POST['cboUser'];
$planid=$_POST['cboPlan'];
$payid=$_POST['cboPayment'];
$amount=$_POST['txtAmount'];
$date=$_POST['testinput'];
$status=$_POST['cboStatus'];
$batchid=$_POST['txtBatchid'];
$date_ex = explode("/",$date);
$date = date('Y-m-d', mktime(0,0,0,$date_ex[0],$date_ex[1],$date_ex[2]));
$date = $date." ".date('H:i:s');

if($userid == 0)
$usererrmsg = "Required Field Cannot Be Blank";
if($planid == 0)
$planerrmsg = "Required Field Cannot Be Blank";
if($payid == 0)
$payerrmsg = "Required Field Cannot Be Blank";
if($status == 0)
$statuserrmsg = "Required Field Cannot Be Blank";
if(!clear($amount))
{
$amounterrmsg= "Required Field Cannot Be Blank";
}
elseif(!numericcheck($amount))
{
$amounterrmsg1 = "Only Numeric values can be allowed"; 
}
if(!clear($date))
{
	$dateerrmsg= "Required Field Cannot Be Blank";
}

/*elseif(!checkDateFormat($date))
{
$dateerrmsg1 = "Only YYY-MM-DD Format can be allowed"; 
}*/
	/*if(!clear($batchid))
			{
		$batchiderrmsg= "Required Field Cannot Be Blank";
	}
elseif(!numericcheck($batchid))
{
	$batchiderrmsg1 = "Only Numeric values can be allowed"; 
}*/

	if(empty($amounterrmsg) && empty($dateerrmsg))
	{
	if($userid==0)
	$userflag=1;
	if($planid==0)
	$planflag=1;
	if($payid==0)
$payflag=1;

if($amount=='')
$amountflag=1;
if($date=='')
$dateflag=1;
if($status==0)
$statusflag=1;

/*if($batchid=='')
$batchidflag=1;*/
if($userflag==1 || $planflag==1 || $payflag==1 || $payflag==1 || $amountflag==1 || $dateflag==1 || $statusflag==1)
$errorflag=1;

if($status==1)
$status="new";
else if($status==2)
$status="active";
else if($status==3)
$status="matured";
else if($status==4)
$status="released";
if($errorflag==1)
$message = "<center>Some of your datas are missing please check the data";
else
{
	$msql="select * from plan where plan_id = ".$planid;
	$mres=mysql_query($msql);
	$mrow=mysql_fetch_array($mres);
	if($amount < $mrow['spend_min_amount'])
{
$message = "Enter above Minimum Amount";
$amountflag=1;
}
if($amount > $mrow['spend_max_amount'])
{

$message = "Enter below Maxmum Amount";
$amountflag=1;
}

if($amountflag!=1)
{
	$plan_date = mysql_fetch_array(mysql_query("select * from plan where plan_id=".$planid));
$period_type = $plan_date['period_type'];
$period = $plan_date['period'];
if($period_type == 4)
{
}
else if($period_type == 3)
{
$plan_duration = $period * 30;
}
else if($period_type == 2)
{
$plan_duration = $period * 7;
}
else
{
		$plan_duration = $period;
}

$select_mature = mysql_fetch_array(mysql_query("SELECT ADDDATE('".$date."', INTERVAL ".$plan_duration." DAY) as matured_date"));
$mat_date = $select_mature['matured_date'];
 $dsql="insert into deposit (member_id,plan_id,amount,compound_amount,invest_date,status,payment_thro,intrest_alloted,maturity_date) values($userid,$planid,$amount,$amount,'$date','$status',$payid,'no','$mat_date')";
				//echo "<br>sql ".$dsql;
				 $dres=mysql_query($dsql);
				 //Matured Date
				 if($batchid == '')
				 {
				 	$batchid = rand(0,99999999);
				 }

				$depositid=mysql_insert_id();


				$tsql="insert into pay_transaction (deposit_id,trans_amount,trans_userid,trans_batchnumber,trans_date) values($depositid,$amount,$userid,'$batchid','$date')";
				$tres=mysql_query($tsql);

				//echo "<br>sql ".$tsql;

				$psql="select * from payment_process where payment_id=$payid";

				$pres=mysql_query($psql);
				$prow=mysql_fetch_array($pres);
				$desc='deposit made through '.$prow['payment_name'];
				$transaction_id = "DEP".rand(0,9999999);
				
				$hsql="insert into history(user_id,amount,type,description,date,payment_thro,transaction_id) values ($userid,$amount,'deposit','$desc','$date',$payid,'$transcation_id')";

				$hres=mysql_query($hsql);


				$sql1=mysql_query("select * from members where member_id=$userid");

						$in_sql=mysql_fetch_array($sql1);

						$introid=$in_sql['intro_id'];

			if($introid!='')
			 {

				$level_select_query="select max(level_id) as level from level_commission";
				$level_select_result=mysql_query($level_select_query);
				$level_select_row=mysql_fetch_array($level_select_result);
				$level_pos=$level_select_row['level'];
			function get_levelcommission($introid,$amount,$level)
			{
				$intro_member_query="select * from members where member_id=$introid";
				$intro_member_result=mysql_query($intro_member_query);
			
					if(mysql_num_rows($intro_member_result)>0)
					{
						$intro_member_row=mysql_fetch_array($intro_member_result);
						$intro_name=$intro_member_row['username'];
						$intro_id=$intro_member_row['intro_id'];
						$user_name=$intro_member_row['username'];
						$level_commision_query="select * from level_commission where level_id=$level";
						$level_commission_result=mysql_query($level_commision_query);
						$level_commission_row=mysql_fetch_array($level_commission_result);
						$level_commission=$level_commission_row['level_commission'];
						$comm=$amount*$level_commission/100;
						$description="Referral Commission Earned";
						$cur_date=date('Y-m-d h:i:s');
						$transaction_id = "REF".rand(0,9999999);
						$insert_commission_query="insert into history (user_id,amount,type,description,transaction_id) 
						values ($introid,$comm,'commissions','$description','$transaction_id')";
						$insert_commission_result=mysql_query($insert_commission_query);
						$check_earnings_query="select * from history where type='earning' and user_id=$introid";
							$check_earnings_result=mysql_query($check_earnings_query);
							$transaction_id = "COM".rand(0,9999999);
						$description="Earnings through Referral Commission";
						if(mysql_num_rows($check_earnings_result)>0)
							$insert_earnings_query="update history set amount=amount+$comm where user_id=$introid and type='earning'";
						else
						$insert_earnings_query="insert into history (user_id,amount,type,description,date,transaction_id) 
						values ($introid,$comm,'earning','$description','$cur_date','$transaction_id')";
										
						$insert_earnings_result=mysql_query($insert_earnings_query);
						$level+=1;
						get_levelcommission($intro_id,$amount,$level);
			}
}
get_levelcommission($introid,$amount,1);
}


				$_SESSION['success_flag']="<font color='#004000'><b><center>New Deposit Made Successfully</center></b></font>";

				echo '<meta http-equiv="refresh" content="0;url=deposit.php?act=active">';
				exit();

				}

			}

		}
	}
?>


<!--Content Portion Start-->
<div id="primary_right">

			
                <div class="inner" style="width:900px">

<?php require 'include/top/matrix_management.php'; ?>
					 <!-- end dashboard items -->

		<hr />
                <h1>  Manual Deposit</h1>                            
            <form name="frmSignup" action="update_manual_deposit.php" method="post">
		<fieldset>
		<legend><font color="#FF0000">*</font> = Required Fields</legend>                                           
   <?php		
		$plan_select_query="select * from plan";
		$plan_select_result=mysql_query($plan_select_query);
?>        
<?php
		$length=1;
		while($plan_select_row=mysql_fetch_array($plan_select_result)) {
		$planid=$plan_select_row['plan_id'];
		$planname=$plan_select_row['plan_type'];
		
		$spend_min_amount=$plan_select_row['spend_min_amount'];
		$spend_max_amount=$plan_select_row['spend_max_amount'];
		
		if($length == 1)
		{
			unset($_COOKIE['minamt']);
			setcookie("minamt",$spend_min_amount, time()+3600*24);
		}
		
		$period=$plan_select_row['period'];
		$period_type=$plan_select_row['period_type'];
		if($period_type==1)
		{ 
			$periodtype='Days';
			$val = "daily";
		}
		else if($period_type==2) { $periodtype='Weeks'; $val = "weekly"; }
		else if($period_type==3) { $periodtype='Months'; $val = "monthly"; }
		else if($period_type==4) { $periodtype='Years'; $val = "yearly"; }	
		
		if($iperiod_type==1)
		{ 
			$iperiod_type='Days';
			$val1 = "daily";
		}
		else if($iperiod_type==2) { $iperiod_type='Weeks'; $val1 = "weekly"; }
		else if($iperiod_type==3) { $iperiod_type='Months'; $val1 = "monthly"; }
		else if($iperiod_type==4) { $iperiod_type='Years'; $val1= "yearly"; }		
		
//		$intrest=rtrim($plan_select_row['interest'],'.00');
		$intrest=$plan_select_row['interest'];
		$max_interest=$plan_select_row['max_interest'];
?>
<p>
<?php 
if($length == 1)
{
	echo '<label>Choose yor Plan</label>';
}
else
{
	echo '<label>&nbsp;</label>';
}
?>
	
     <input type="radio" name="rdPlans" onClick="stamt('<?php echo $spend_min_amount;?>')" value="<?php echo $planid?>" <?php if($length==1) echo 'Checked';else if($planid==$plan_id) echo 'Checked';?>>&nbsp;&nbsp;<?php echo $planname;?>&nbsp;&nbsp;<?php echo $max_interest;?>% <?php echo $val; ?> for <?php echo $period.' '.$iperiod_type;?> </td>
	</p>
<?
		$length+=1;
		}
		
?>


					
						<p>
							<label>Username <font color="#FF0000">*</font></label>
							: 
                              
  <input type="text" name="cboUser" class="tbox1" value="<?=$_SESSION['val_userid']; $_SESSION['val_userid'] =''; ?>">
<? if($_SESSION['empty_userid']) { echo $_SESSION['empty_userid']; $_SESSION['empty_userid']=''; } ?>
                             
						</p>
                        
                   				
						<p>
							<label>Amount to Deposit <font color="#FF0000">*</font></label>
							: <input type="text" name="txtAmount" class="tbox1" value="<?=$_SESSION['val_amount']; $_SESSION['val_amount'] =''; ?>"><? if($_SESSION['empty_amount']) { echo $_SESSION['empty_amount']; $_SESSION['empty_amount']=''; } ?> <span id="plandis"></span> 
						</p>
                        
                        <?php                            
 		$fetch=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 7"));
		$fetch1=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 8"));
		$fetch11=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 11"));
		$fetch13=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 13"));
		$fetch28=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 28"));

		$fetch3=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 3"));
		$fetch38=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 38"));
		$fetch39=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 39"));
		$fetch40=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 40"));
		$fetch41=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 41"));
        $fetch42=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 42"));	

    ?>
                        
                        
                        
                          
                        
                        	<p>
							<label>Payment Through  <font color="#FF0000">*</font></label>
							: <select id="cboPayment" name="cboPayment" title="Select the Payment Method">
                        <option value="0" <? if($_SESSION['payid'] == '') echo 'selected="selected"'; ?> >Select Payment Method </option>
                  
<?php          
/*if($fetch1['status'] == 'on')
{

	$selected=($_SESSION['payid'] == '8') ? 'selected="selected"':'';

    	echo '<option value="8" '.$selected.'>Liberty Reserve</option>';
}*/


/*
  if($fetch11['status'] == 'on')
{

	$selected=($_SESSION['payid'] == '11') ? 'selected="selected"':'';

    	echo '<option value="11" '.$selected.'>Perfect Money</option>';
}

  if($fetch28['status'] == 'on')
{

	$selected=($_SESSION['payid'] == '28') ? 'selected="selected"':'';

    	echo '<option value="28" '.$selected.'>STP</option>';
}

if($fetch3['status'] == 'on')
{

	$selected=($_SESSION['payid'] == '3') ? 'selected="selected"':'';

    	echo '<option value="3" '.$selected.'>Paypal</option>';
}
*/
if($fetch38['status'] == 'on')
{

	$selected=($_SESSION['payid'] == '38') ? 'selected="selected"':'';

    	echo '<option value="38" '.$selected.'>Bitcion</option>';
}
/*
if($fetch39['status'] == 'on')
{

	$selected=($_SESSION['payid'] == '39') ? 'selected="selected"':'';

    	echo '<option value="39" '.$selected.'>Payeer</option>';
}
if($fetch40['status'] == 'on')
{

	$selected=($_SESSION['payid'] == '40') ? 'selected="selected"':'';

    	echo '<option value="40" '.$selected.'>Neteller</option>';
}
if($fetch41['status'] == 'on')
{

	$selected=($_SESSION['payid'] == '41') ? 'selected="selected"':'';

    	echo '<option value="41" '.$selected.'>Skrill</option>';
}
if($fetch42['status'] == 'on')
{

	$selected=($_SESSION['payid'] == '42') ? 'selected="selected"':'';

    	echo '<option value="42" '.$selected.'>Advcash</option>';
}

$selected=($_SESSION['payid'] == '12') ? 'selected="selected"':'';
	
	
  echo '<option value="12" '.$selected.'>Account Balance (Reinvestment)</option>';
  
 if($fetch13['status'] == 'on')
{

	$selected=($_SESSION['payid'] == '13') ? 'selected="selected"':'';

    	echo '<option value="13" '.$selected.'>Bank Wire</option>';
}

*/
                        
?>
                         
                       
                          </select>
<? if($_SESSION['empty_paymentid']) { echo $_SESSION['empty_paymentid']; $_SESSION['empty_paymentid']=''; } ?>
						</p>
                        
              	<div class="clearboth"></div>
						
						<p><input class="button" type="submit" value="Submit" /> </p>
					</fieldset>
					</form>
                    
                    



<div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
<?php if($amounterrmsg1) 
{ ?>
 <tr>
<td class="style5"></td>
 <td  align="center" class="style5"><b><font color="#FF0000"><?=$amounterrmsg1?></font></b></td>
 </tr>
<?php	}	?>
<?php if($dateerrmsg1) 
{ ?>
<tr>
 <td class="style5"></td>
 <td   align="center" class="style5"><b><font color="#FF0000"><?=$dateerrmsg1?></font></b></td>
</tr>
 <?php	}	?>
<?php if($batchiderrmsg1) 
{ ?>
 <tr>
 <td class="style5"></td>
 <td   align="center" class="style5"><b><font color="#FF0000"><?=$batchiderrmsg1?></font></b></td>
</tr>
<?php	}	?>

<script src="ajax.js">
</script>

<script language="javascript1.2">

/**

 * DHTML date validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)

 */

// Declaring valid date character, minimum year and maximum year

var dtCh= "-";
var minYear=1900;
var maxYear=2100;

function isInteger(s){
var i;
 for (i = 0; i < s.length; i++){   
  // Check that current character is number.
  var c = s.charAt(i);
 if (((c < "0") || (c > "9"))) return false;
 }
 // All characters are numbers.
 return true;
}

function stripCharsInBag(s, bag){
var i;
var returnString = "";
 // Search through string's characters one by one.
// If character is not in bag, append to returnString.
 for (i = 0; i < s.length; i++){   
  var c = s.charAt(i);
 if (bag.indexOf(c) == -1) returnString += c;
 }
 return returnString;

}

function daysInFebruary (year){

	// February has 29 days in any year evenly divisible by four,


    // EXCEPT for centurial years which are not also divisible by 400.

    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );

}

unction DaysArray(n) {







	for (var i = 1; i <= n; i++) {







		this[i] = 31







		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}







		if (i==2) {this[i] = 29}







   } 







   return this







}


function isDate(dtStr){


	var daysInMonth = DaysArray(12)


	var pos1=dtStr.indexOf(dtCh)


	var pos2=dtStr.indexOf(dtCh,pos1+1)



	var strYear=dtStr.substring(0,pos1)

	var strMonth=dtStr.substring(pos1+1,pos2)


	var strDay=dtStr.substring(pos2+1)


	strYr=strYear


	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)

	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)

	for (var i = 1; i <= 3; i++) {


		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)

	}

	month=parseInt(strMonth)
day=parseInt(strDay)

	year=parseInt(strYr)
	if (pos1==-1 || pos2==-1){

		alert("The date format should be : YYYY-MM-DD")

		return false

	}

	if (strMonth.length<1 || month<1 || month>12){
	alert("Please enter a valid month")

	return false
}

if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){







		alert("Please enter a valid day")







		return false







	}







	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){







		alert("Please enter a valid 4 digit year between "+minYear+" and "+maxYear)







		return false







	}







	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){







		alert("Please enter a valid date")







		return false







	}







return true







}







</script>















