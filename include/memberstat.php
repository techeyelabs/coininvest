<?php   date_default_timezone_set('Europe/London');

	$member_det_query = "select * from members where member_id=$userid";
	$member_det_result = mysql_query($member_det_query);
	$member_det_row = mysql_fetch_array($member_det_result);
	$member_since = $member_det_row['date_of_join'];
	$member_since = explode('-',$member_since);
	$member_since = date('M-d-Y',mktime(0,0,0,$member_since[1] , $member_since[2] , $member_since[0]));


    $member_username = $member_det_row['username'];
    $member_bitcoin = $member_det_row['bitcoin']; 
    $member_email = $member_det_row['member_email'];
    $member_full_name = $member_det_row['first_name'].' '.$member_det_row['last_name'];         
    $member_city = $member_det_row['city'];
    $member_country_id= $member_det_row['country'];

    $member_country_str = "select * from country_master where country_id=$member_country_id";
    $member_country_sql = mysql_query($member_country_str);
    $member_country_det = mysql_fetch_array($member_country_sql);
    $member_country = $member_country_det['country'];


	$mbsql="select sum(amount) as member_earnings from history where user_id=$userid and 
                   (type='intrest_earned' or type='bonus' or type='commissions' or type='internal_transaction_receive')";

	$mbres = mysql_query($mbsql);
	$mbrow = mysql_fetch_array($mbres);
	$member_earnings = $mbrow['member_earnings'];


	if(!$member_earnings)
	$member_earnings = 0.00;


	$total_earning_query = "select sum(amount) as tot_earnings from history where user_id=$userid and (type='intrest_earned' or type='bonus' or type='commissions' or type='release_deposit' 
	                                or type='internal_transaction_receive')";

	$total_earning_result = mysql_query($total_earning_query);
	$total_earning_row = mysql_fetch_array($total_earning_result);
	$total_earnings = $total_earning_row['tot_earnings'];


	if(!$total_earnings) $total_earnings = 0;

	$tesql = "select sum(amount) as total_with from history where user_id=".$userid." and (type='withdrawal' or type='withdraw_pending' or type='penality' or type='internal_transaction_spend') order by type";
    $teres=mysql_query($tesql);

    if(mysql_num_rows($teres) > 0)
    {
	    $terow = mysql_fetch_array($teres);
	    $total_withdraw = $terow['total_with'];
	}
	else
	$total_withdraw = 0;
	$available = $total_earnings - $total_withdraw;


	if(!$available) 
	$available = 0;

	$deposit_query = "select sum(amount) as amt from deposit where status ='active' and member_id=$userid";
	$deposit_result = mysql_query($deposit_query);
	$deposit_row = mysql_fetch_array($deposit_result);
	$total_deposit_made = $deposit_row['amt'];


	if(!$total_deposit_made) 
	$total_deposit_made = 0;

	//SUB Deposit
	//echo "select * from deposit where status ='active' and member_id=$userid";
	
 	$select_all_deposit = mysql_query("select * from deposit where status ='active' and member_id=$userid");
	$total_deposit_made_original = 0;
	$total_deposit_made_bonus = 0;

	if(mysql_num_rows($select_all_deposit) > 0)
	{
		while($query_wec = mysql_fetch_array($select_all_deposit))
		{
			$select_sub_deposit = mysql_fetch_array(mysql_query("select deposit_amt from sub_deposit where deposit_desc LIKE '%Deposit%' and deposit_id=".$query_wec['deposit_id']));
			$total_deposit_made_original = $total_deposit_made_original + $select_sub_deposit['deposit_amt'];
			$select_sub_deposit1 = mysql_fetch_array(mysql_query("select deposit_amt from sub_deposit where deposit_desc LIKE '%Bonus%' and deposit_id=".$query_wec['deposit_id']));
			$total_deposit_made_bonus = $total_deposit_made_bonus + $select_sub_deposit1['deposit_amt'];
		}
	}
	else
	{
		$total_deposit_made_original = 0;
		$total_deposit_made_bonus = 0;	
	}	
	
	$deposit_query1 = "select sum(compound_amount) as amt1 from deposit where status ='active' and member_id=$userid";
	$deposit_result1 = mysql_query($deposit_query1);
	$deposit_row1 = mysql_fetch_array($deposit_result1);
	$total_deposit_made1 = $deposit_row1['amt1'] ;


	if(!$total_deposit_made1) 
	$total_deposit_made1 = 0;

	$deposit_query = "select sum(amount) from deposit where status = 'matured' and member_id=$userid";
	$deposit_result = mysql_query($deposit_query);
	$deposit_row = mysql_fetch_array($deposit_result);

	$matured_deposit_made = $deposit_row[0];

	if(!$matured_deposit_made) 
	$matured_deposit_made = 0;

	$deposit_query_compound = mysql_fetch_array(mysql_query("select * from deposit where status = 'active' and member_id=$userid"));
	$compounding_interest = $deposit_query_compound['compound_rate'];

	if($compounding_interest == '')
	{
		$compounding_interest = "0.00";
	}

	$matured_deposit_made = $deposit_row[0];

	if(!$matured_deposit_made) 
	$matured_deposit_made = 0;

	$released_deposit_query = "select sum(amount) as amt from deposit where member_id=$userid and status='released'";
	$released_deposit_result = mysql_query($released_deposit_query);
	$released_deposit_row = mysql_fetch_array($released_deposit_result);

	$total_released_deposit = $released_deposit_row['amt'];


	if(!$total_released_deposit) 
	$total_released_deposit = 0;

	$intrest_earned_query = "select sum(amount) from history where user_id=$userid and type='intrest_earned'";
	$intrest_earned_result = mysql_query($intrest_earned_query);
	$intrest_earned_row = mysql_fetch_array($intrest_earned_result);
	$total_intrest_earned = $intrest_earned_row[0];


	if(!$total_intrest_earned) 
	$total_intrest_earned = 0;

	$withdrawals_query = "select sum(amount) from history where type='withdrawal' and user_id=$userid";
	$withdrawals_result = mysql_query($withdrawals_query);
	$withdrawals_row = mysql_fetch_array($withdrawals_result);
	$withdrawals = $withdrawals_row[0] ;


	$pending_withdrawals_query = "select sum(amount) from history where type='withdraw_pending' and user_id=$userid";
	$pending_withdrawals_result = mysql_query($pending_withdrawals_query);
	$pending_withdrawals_row = mysql_fetch_array($pending_withdrawals_result);
	$pending_withdrawals = $pending_withdrawals_row[0];

	$select_level_query = "select max(level_id) from level_commission";
	$select_level_result = mysql_query($select_level_query);
	$select_level_row = mysql_fetch_array($select_level_result);
	$level_limit = $select_level_row[0];
	$total_referrals = 0;
	$intro_id = $userid;


	for($i = 1 ; $i <= 100 ; $i++ ) {
		$select_referral_query = "select * from members where intro_id=$intro_id";
		$select_referral_result  = mysql_query($select_referral_query);

		if(mysql_num_rows($select_referral_result) > 0 ) {
			$level += 1;
			$total_referrals += mysql_num_rows($select_referral_result);
			$select_referral_row = mysql_fetch_array($select_referral_result);
			$intro_id = $select_referral_row['member_id'];
		}
	}	


	$select_commission_query = "select * from history where type='commissions' and user_id=".$_SESSION['userid'];
	$select_commission_result = mysql_query($select_commission_query);
	$total_commission  = 0;

	while($select_commission_row = mysql_fetch_array($select_commission_result)) {
	    $total_commission += $select_commission_row['amount'];
	}



?>
