<?php
session_start();

require 'include/connect.php';

if(empty ($_SESSION['adminuser']))

{

 echo '<meta http-equiv="refresh" content="0; url=index.php" />';

 exit();

 }
		
//echo '<pre>';print_r($_POST);exit;	
		$interest = $_POST['interest'];
		
		if($interest == 1)
		{
			$interest = '2';
		}
		else
		{
			$interest = '0';
		}
	
		$release_status = $_POST['release_status'];
		
		if($release_status != '')
		{
			$release_status = 'on';
		}
		else
		{
			$release_status = 'off';
		}
	

/*	 [plan_type] => MINI

    [spend_min_amount] => 500

    [spend_max_amount] => 999

    [max_interest] => 1.5

    [bouns] => yes

    [perbouns] => 10

    [period] => 100

    [period_type] => 1

    [bonuslevel] => Array

        (

            [0] => 0.5

            [1] => 0.25

            [2] => 0.15

            [3] => 0.10

        )



    [noofbid] => 4

    [intrest_period] => 1

    [iperiod_type] => 1

    [type] => insert

    [update] => submit*/



//

	//$period_type=$_POST['period_type'];

	//$interest=$_POST['interest'];

	

	//echo rtrim($level,',');exit;

	$finallevel=rtrim($level,',');



	$plan_type=$_POST['plan_type'];

	$spend_min_amount=$_POST['spend_min_amount'];

	$spend_max_amount=$_POST['spend_max_amount'];

	$max_interest = $_POST['max_interest'];

	if(isset($_POST['bouns']) && trim($_POST['bouns']) == 'yes')

	{

		$perbouns=trim($_POST['perbouns']);

		$bonus=trim($_POST['bouns']);

	}

	else

	{

		$perbouns=0;

		$bonus='no';

	}
	

	$period=$_POST['period'];

	$intrest_period=$_POST['intrest_period'];

	$iperiod_type=$_POST['iperiod_type'];

	$Withdrawal=$_POST['Withdrawal'];

	$period_type=$_POST['period_type'];

	

	

	

	$_SESSION['plan_type'] = $plan_type;

	$_SESSION['spend_min_amount'] = $spend_min_amount;

	$_SESSION['spend_max_amount'] = $spend_max_amount;

	$_SESSION['period'] = $period;

	$_SESSION['period_type'] = $period_type;

	$_SESSION['interest'] = $interest;

	$_SESSION['max_interest'] = $max_interest;

	$_SESSION['intrest_period'] = $intrest_period;

	$_SESSION['iperiod_type'] = $iperiod_type;

	

	

	if($_POST['id'])

	{

		 $id=$_POST['id'];

	}

	else if($_GET['mem_id'])

		$mem_id=$_GET['mem_id'];

	

	

	

	if($mem_id)

	{	

		$delte=mysql_query("delete from plan where plan_id='$mem_id'");
		$delte=mysql_query("delete from level_commission where plan_id='$mem_id'");

		$_SESSION['success_flag']="<font color='#004000'><b>Plan Successfully Deleted</b></font>";

		echo '<meta http-equiv="refresh" content="0;url=plans.php">';

		exit();

	}

	else if($id)

	{
		
		if($plan_type=='')

		{

			$plan_typeflag=1;

			$_SESSION['empty_plan_type']="<font color='#FF0000' size=1>Please enter the Plan name</font>";

			

		}

		

		if($spend_min_amount=='')

		{

			$spend_min_amountflag=1;

			$_SESSION['empty_spend_min_amount']="<font color='#FF0000' size=1>Please enter the Minimum Amount</font>";

			

		}
		
		

		if($spend_max_amount=='')

		{

			$spend_max_amountflag=1;

			$_SESSION['empty_spend_max_amount']="<font color='#FF0000' size=1>Please enter the Maximum Amount</font>";

			

		}
		
		if($spend_max_amount!='' && $spend_min_amount!='' && $spend_min_amount > $spend_max_amount)
		{
			$spend_max_amountflag=1;

			$_SESSION['empty_spend_max_amount']="<font color='#FF0000' size=1>The Maximum Amount Should be greater then Minimum Amount</font>";
		}

		if($period=='')

		{

			$periodflag=1;

			$_SESSION['empty_period']="<font color='#FF0000' size=1>Please enter the Durations</font>";

			

		}

		

		if($max_interest=='')

		{

			$sinterestflag=1;

			$_SESSION['empty_interest']="<font color='#FF0000' size=1>Please enter the Interest Percentage</font>";

			

		}
		

		if($intrest_period=='')

		{

			$intrest_periodflag=1;

			$_SESSION['empty_intrest_period']="<font color='#FF0000' size=1>Please enter the Interest Period</font>";

			

		}

		


		

		if($plan_typeflag!=1 && $spend_min_amountflag!=1 && $spend_max_amountflag!=1 && $periodflag!=1 && $interestflag!=1 && $intrest_periodflag!=1)

		{

		


	/*		 $insert=mysql_query("insert into plan 	

			(plan_type,

			spend_min_amount,

			spend_max_amount,

			period,

			period_type,

			max_interest,

			intrest_period,

			iperiod_type,

			bonus_status,

			bonus_per,withdrawal_type,plan_level)

			values('".$plan_type."',

			'".$spend_min_amount."',

			'".$spend_max_amount."',

			'".$period."',

			'".$period_type."',

			'".$max_interest."',

			'".$intrest_period."',

			'".$iperiod_type."',

			'".$bonus."',

			'".$perbouns."',

			'".$Withdrawal."',

			'".$finallevel."')");*/
			if(count($_POST['bonuslevel']) > 0 )
			{
				$delte=mysql_query("delete from level_commission where plan_id='$id'");
				$i=1;
				$level='';
				foreach($_POST['bonuslevel'] as $item)
				{
					//echo "insert into level_commission(level_name,level_commission,plan_id) values('".$i."','".$item."','".$id."')";
					$insert = mysql_query("insert into level_commission(level_name,level_commission,plan_id) values('".$i."','".$item."','".$id."')");
					$i++;
				}
			}

			$update_time=mysql_query("update plan set plan_type ='$plan_type',spend_min_amount ='$spend_min_amount',spend_max_amount ='$spend_max_amount',period ='$period',period_type  ='$period_type',max_interest  ='$max_interest',intrest_period  ='$intrest_period',iperiod_type  ='$iperiod_type',bonus_status='".$bonus."',bonus_per='".$perbouns."',withdrawal_type='".$Withdrawal."',plan_level='".$finallevel."',interest_type='".$interest."',release_status='".$release_status."' where plan_id='$id'");

			

			$_SESSION['plan_type'] = '';

			$_SESSION['spend_min_amount'] = '';

			$_SESSION['spend_max_amount'] = '';

			$_SESSION['period'] = '';

			$_SESSION['period_type'] = '';

			$_SESSION['interest'] = '';

			$_SESSION['max_interest'] = '';

			$_SESSION['intrest_period'] = '';

			$_SESSION['iperiod_type'] = '';

			

			$_SESSION['success_flag']="<font color='#004000'><b>Plan Updated Successfully</b></font>";

			echo '<meta http-equiv="refresh" content="0;url=plans.php">';

			exit();

		}

		else

		{

			$_SESSION['errror_msg']="<font color='#FF0000' size=1>Please check the below details.</font>";

			echo '<meta http-equiv="refresh" content="0;url=edit_plans.php?id='.$id.'">';

			exit();

		}

	}

	else

	{	

		if($plan_type=='')

		{

			$plan_typeflag=1;

			$_SESSION['empty_plan_type']="<font color='#FF0000' size=1>Please enter the Plan name</font>";

			

		}



		if($spend_min_amount=='')

		{

			$spend_min_amountflag=1;

			$_SESSION['empty_spend_min_amount']="<font color='#FF0000' size=1>Please enter the Minimum Amount</font>";

			

		}

		if($spend_max_amount=='')

		{

			$spend_max_amountflag=1;

			$_SESSION['empty_spend_max_amount']="<font color='#FF0000' size=1>Please enter the Maximum Amount</font>";

			

		}
		
		if($spend_max_amount!='' && $spend_min_amount!='' && $spend_min_amount > $spend_max_amount)
		{
			$spend_max_amountflag=1;

			$_SESSION['empty_spend_max_amount']="<font color='#FF0000' size=1>The Maximum Amount Should be greater then Minimum Amount</font>";
		}

		if($period=='')

		{

			$periodflag=1;

			$_SESSION['empty_period']="<font color='#FF0000' size=1>Please enter the Durations</font>";

			

		}

		

		if($max_interest=='')

		{

			$interestflag=1;

			$_SESSION['empty_interest']="<font color='#FF0000' size=1>Please enter the Interest Percentage</font>";

			

		}

		if($intrest_period=='')

		{

			$intrest_periodflag=1;

			$_SESSION['empty_intrest_period']="<font color='#FF0000' size=1>Please enter the Interest Period</font>";

			

		}

		

		

		if($period_type=='')

		{

			$period_type=1;

			$_SESSION['empty_period_type']="<font color='#FF0000' size=1>Please select the Interest Period Typ</font>";

			

		}

		



		if($plan_typeflag!=1 && $spend_min_amountflag!=1 && $spend_max_amountflag!=1 && $periodflag!=1 && $interestflag!=1 && $intrest_periodflag!=1)

		{

//plan_level

//withdrawal_type

/*	$finallevel=rtrim($level,',');



	$plan_type=$_POST['plan_type'];

	$spend_min_amount=$_POST['spend_min_amount'];

	$spend_max_amount=$_POST['spend_max_amount'];

	$max_interest = $_POST['max_interest'];

	if(isset($_POST['bouns']) && trim($_POST['bouns']) == 'yes')

	{

		$perbouns=trim($_POST['perbouns']);

		$bonus=trim($_POST['bouns']);

	}

	else

	{

		$perbouns=0;

		$bonus='no';

	}

	$period_type=$_POST['period_type'];

	$period=$_POST['period'];

	c=$_POST['intrest_period'];

	$iperiod_type=$_POST['iperiod_type'];

	$Withdrawal=$_POST['Withdrawal'];*/	
			 $insert=mysql_query("insert into plan (plan_type,spend_min_amount,spend_max_amount,period,period_type,max_interest,intrest_period,iperiod_type,bonus_status,bonus_per,withdrawal_type,plan_level,interest_type,release_status)	values('".$plan_type."','".$spend_min_amount."','".$spend_max_amount."','".$period."','".$period_type."','".$max_interest."','".$intrest_period."','".$iperiod_type."','".$bonus."','".$perbouns."','".$Withdrawal."','".$finallevel."','".$interest."','".$release_status."')");

			$plan_id = mysql_insert_id($conn);
			
			if(count($_POST['bonuslevel']) > 0 )
			{
				$i=1;
				$level='';
				foreach($_POST['bonuslevel'] as $item)
				{
					$insert = mysql_query("insert into level_commission(level_name,level_commission,plan_id) values('".$i."','".$item."','".$plan_id."')");
					$i++;
				}
			}
	

			$_SESSION['plan_type'] = '';

			$_SESSION['spend_min_amount'] = '';

			$_SESSION['spend_max_amount'] = '';

			$_SESSION['period'] = '';

			$_SESSION['period_type'] = '';

			$_SESSION['interest'] = '';

			$_SESSION['max_interest'] = '';

			$_SESSION['intrest_period'] = '';

			$_SESSION['iperiod_type'] = '';

			

			

			$_SESSION['success_flag']="<font color='#004000'><b>New Plan Successfully Added</b></font>";

			echo '<meta http-equiv="refresh" content="0;url=plans.php">';

			exit();

		

		}

		else	

		{

			$_SESSION['errror_msg']="<font color='#FF0000' size=1>Please check the below details.</font>";

			echo '<meta http-equiv="refresh" content="0;url=create_plan.php">';

			exit();

		}



 	}

 

 ?>