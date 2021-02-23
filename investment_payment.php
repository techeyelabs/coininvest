

<?php   
session_start();
date_default_timezone_set("Europe/London");
error_reporting(1); 
if(empty ($_SESSION['userid']))
{
 echo '<meta http-equiv="refresh" content="0; url=index.php" />';
 exit();
 }
$userid = $_SESSION['userid'];
	include('connect.php');

	$qry=mysql_query("select * from admin_settings where set_id=1");
	$result=mysql_fetch_array($qry);
	
	
	$strsite=$result['set_value'];

	function diplay_plans($plan_id)
	{
		$plan_select_query="select * from plan ORDER BY `plan`.`plan_id` ASC";
		$plan_select_result=mysql_query($plan_select_query);
		$length=1;
		$i =0;
		while($plan_select_row=mysql_fetch_array($plan_select_result)) 
		{
			$i++;$k = $i % 2;
			
			if($k == 0)
			{
				$class = 'row2';
			}
			else
			{
				$class = 'row1';
			}
			
			$planid=$plan_select_row['plan_id'];		
			$planname=$plan_select_row['plan_type'];		
			$scheme=$plan_select_row['scheme'];		
			$spend_min_amount=$plan_select_row['spend_min_amount'];		
			$spend_max_amount=$plan_select_row['spend_max_amount'];		
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
			//$intrest=rtrim($plan_select_row['interest'],'.00');
			
			$intrest=$plan_select_row['interest'];		
			$max_interest=$plan_select_row['max_interest'];
		
?>		
			<tr class="<?=$class; ?>" >		
				<td><?=$planname?></td>
				<td style="padding-left:20px;text-decoration:none;">&#x0e3f;<?= $spend_min_amount ; ?></td>	
				<td style="padding-left:20px;text-decoration:none;">&#x0e3f;<?= $spend_max_amount; ?></td>	
				<td><?=$max_interest?>%</td>		
				<td class="bdrnone" align="center" ><?=$period.' '.$periodtype; ?></td>		
			</tr>		
<?php
		$length+=1;		
		}
	}

	$canSave=$_POST['canSave'];
	//  print_r($_POST);
	//  exit();
	if($canSave==1) 
	{
		$plan_id=trim($_POST['rdPlans']);
		$payid=$_POST['cboPayment'];
		$amount=trim($_POST['txtAmount']);
		$_SESSION['plan_id'] = $plan_id;		
		$_SESSION['payid'] = $payid;		
		$_SESSION['amount'] = $amount;
		$_SESSION['compound_rate'] = $_POST['compound'];
		
		if ($plan_id == "") {
		    $payment_flag=1;
		    $_SESSION['error_plan']="<span style='color: #ff0000;'>Please Select the Plan</span>";
		}
		
		if($payid=="") 
		{
			$payment_flag=1;
			$_SESSION['error_payment']="<span style='color: #ff0000;'>Please Select the Payment Method</span>";
		}
		if($amount=="") 
		{
			$amount_flag=1;
			$_SESSION['error_amt']="<span style='color: #ff0000;'>Please enter the Amount to make the deposit</span>";
		}
		
		
		if($amount != '')
		{
			
			if(!is_numeric($amount)) 
			{
				$amount_flag=1;
				$_SESSION['error_amt']="<span style='color: #ff0000;'>Please enter the Amount in Numberic Value</span>";
			}
			else
			{
				//echo "select * from plan where plan_id='".$plan_id."'";
				$plan_select_qry=mysql_fetch_array(mysql_query("select * from plan where plan_id='".$plan_id."'"));
				
				if($amount < $plan_select_qry['spend_min_amount'] || $amount > $plan_select_qry['spend_max_amount'])
				{
					$amount_flag=1;
					$_SESSION['error_amt']="<span style='color: #ff0000;'>You can't deposit less than ".$plan_select_qry['spend_min_amount']." &#x0E3F;</span>";
					$_SESSION['planName']="<span style='color: #ff0000;'>You choose ".$plan_select_qry['plan_type']."</span> <br>";
				}	
				if($amount > $plan_select_qry['spend_max_amount'])
				{
					$amount_flag=1;
					$_SESSION['error_amt']="<span style='color: #ff0000;'>You can't deposit more than ".$plan_select_qry['spend_max_amount']." &#x0E3F;</span>";
					$_SESSION['planName']="<span style='color: #ff0000;'>You choose ".$plan_select_qry['plan_type']."</span> <br>";
				}		

			}
		}
	
		$select=mysql_fetch_array(mysql_query("select * from site_statistics where stat_id='14'"));
				
		$status=$select['status'];
		if($status == 'on')
		{
			if($_POST['compound']=="") 
			{
				$compound_rate_flag=1;
				$_SESSION['errror_compound']="<span style='color: #ff0000;'>Please Select the Compound Rate</span>";
			}
		}
		$min_spend_amount=$plan_check_row['spend_min_amount'];
		$max_spend_amount=$plan_check_row['spend_max_amount'];
		
		if($pay_flag!=1 && $amount_flag!=1 && $payment_flag !=1 && $compound_rate_flag !=1)
		{
			
			$select_members_deposit = mysql_fetch_array(mysql_query("select sum(compound_amount) as amt from deposit 
				where member_id='".$_SESSION['userid']."' and 	status='active'"));

			$select_members_deposit_amt = $select_members_deposit['amt'];
			$total_plan_amount = $select_members_deposit_amt + $amount;
			$_SESSION['total_amount'] = $total_plan_amount;

			if(!isset($_SESSION['plan_id']))
			{
				$select_plan = mysql_query("select * from plan");
				while($fetch_plan = mysqli_fetch_array($select_plan))
				{
					if($fetch_plan['spend_min_amount'] <=$total_plan_amount && $fetch_plan['spend_max_amount'] >=$total_plan_amount)
					{
						$interest = $fetch_plan['interest'];
						$plan_id = $fetch_plan['plan_id'];
						break;
					}	
				}
			}
		
			$_SESSION['planid']=$plan_id;

			$plan_sql="select * from plan where plan_id=$plan_id";
			$plan_exe=mysql_query($plan_sql);
			$plan_ret=mysql_fetch_array($plan_exe);
			$pack_id=$plan_ret['package_id'];

			$pack_sql="select * from plan_master where id=$pack_id";
			$pack_exe=mysql_query($pack_sql);
			$pack_ret=mysql_fetch_array($pack_exe);
			$dep_package_id=$pack_ret['withdrawal_deposit_package'];

			if($dep_package_id==0)
				$dep_status=1;
			else
			{
				$dpsql="select * from plan where package_id=".$dep_package_id;
				$dpres=mysql_query($dpsql);
				$pcnt=0;
				while($dprow=mysql_fetch_array($dpres))
				{
					$pplan[$pcnt]=$dprow['plan_id'];
					$pcnt++;
				}
				$dep_status=0;

				for($i=0;$i<$pcnt;$i++)
				{
					$testsql="select * from deposit where member_id=".$_SESSION['userid']." and plan_id=".$pplan[$i];
					$testres=mysql_query($testsql);
					if(mysql_num_rows($testres)>0)
					{
						$dep_status=1;
						break;
					}
				}

			}

			if($dep_status!=0)
			{
				$_SESSION['payid']=$payid;
				$member_det_query="select * from members where member_id=$userid";		
				$member_det_result=mysql_query($member_det_query);
				$member_det_row=mysql_fetch_array($member_det_result);
				$bitcoin_num = $member_det_row['bitcoin']; 

				if($bitcoin_num == '') $bitcoin_num = "Not Set";

				if($payid==38)
				{
					
				    $select_bitcoin = mysql_fetch_array(mysql_query("select * from payment_process where payment_id=38"));
					$bitcoin_id = $select_bitcoin['account_id'];
					$pri_key  =   $select_bitcoin['batch_id'];	
					
					
					
					$mem = mysql_fetch_array(mysql_query("select * from members where member_id=$userid"));
					$first_name = $mem['first_name'];
					$last_name = $mem['last_name'];
					if($last_name==""){
						    $last_name = $first_name;			
					}
					$fullname = $first_name." ".$last_name;
					$user_email = $mem['member_email'];	
					$sel_planid = $_SESSION['planid'];
					$plan_det = mysql_fetch_array(mysql_query("select * from plan where plan_id=$sel_planid"));
					$item_name = $plan_det['plan_type']; 	  	
					$planID = $plan_det['plan_id'];
			        $member_address = $mem['bitcoin'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>AtKinSons</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <!-- <div class="site-wrap" id="home-section"> -->
	
		
    <?php include('top_nav.php'); ?>
        <div class="container-fluid jumpingNav" >
            <div class="" style="max-width: 1100px; margin: 0 auto;">
                <div class="row mt-3">
                    <div class="col-md-2 col-sm-3 col-lg-2 p-0" style="background-color: #6c757d;">
					    <?php include('side_menu.php')?>
                    </div>
                    <div class="col-lg-10 col-md-12 col-sm-12"
                        style="min-height: 850px; padding: 0px;  background-image:url('images/gold_coin_home.jpg');">
                        <div class="container-fluid mt-3 p-0">
                            <div class="colorlib-pricing">
                                <div class="container" >
                                    <div class="row animate-box">
                                        <div class="col-md-12 mobile-withdraw">
                                            <div class="after-login-table-block">
											<div class="container" style="background-color: rgba(0, 0, 0, .8);color: #c69b5f!important;padding-top:10px;padding-bottom:30px">
		  <div id="contents" style="width:100%;"><br/><br/>
			 
			<div width="70%" border="0" cellspacing="0"  cellpadding="0" align="center" >		
				<h2 style="text-align:center;">Payment Process</h2>  
				<div class="row justify-content-center ">
					<div class="col-md-6" style="border-top:1px solid #ccc;border-bottom:1px solid #ccc;">
						<p style="margin-left:10px;">
							<span style="font-size:20px;"><?php echo ucfirst($plan_det['plan_type']); ?> Package</span><br/>	 
						</p>
					</div>
					<div class="col-md-6" style="text-align:center;border-top:1px solid #ccc;border-bottom:1px solid #ccc;">3846856</div>
				</div>                     
				<!-- <table width="70%" border="0" cellspacing="0"  cellpadding="0" align="center" > -->
					<!-- <tr>
						<td colspan="2"><h2 style="text-align:center;">Payment Process</h2></td>
					</tr>  -->
					<!-- <tr>
						<td style="border-top:1px solid #ccc;border-bottom:1px solid #ccc;">
							<p style="margin-left:10px;">
								<span style="font-size:20px;"><?php //echo ucfirst($plan_det['plan_type']); ?> Package</span><br/>	      
								<strong style="font-style:italic;font-size:9px;text-align:left;">AtKinSons</strong>
							</p>
						</td>
						<td   style="text-align:right;border-top:1px solid #ccc;border-bottom:1px solid #ccc;">3846856&nbsp;&nbsp;</td>
					</tr>			        -->
					<?php
						function apiCall(	$data =  [])
						{
						
							// Fill these in from your API Keys page 
							$public_key = '0ea2a56f9a86453d2324ef986d1b15afa88fd9c747554307dc32e06a55a36810'; 
							$private_key = '2039e17a134824d9f9cC844E22Ca72d65F2e2b38980591B3B1B10852Fc351A77'; 
							
							
							
							// Generate the query string 
							$post_data = http_build_query($data, '', '&'); 
							
							// Calculate the HMAC signature on the POST data 
							$hmac = hash_hmac('sha512', $post_data, $private_key); 
						
						
							$api_url = 'https://www.coinpayments.net/api.php';
							$ch = curl_init();

							$post_fields = http_build_query($data, '', '&');
							$hmac = hash_hmac('sha512', $post_fields, '2039e17a134824d9f9cC844E22Ca72d65F2e2b38980591B3B1B10852Fc351A77' );
							// dd($data,$post_fields, $hmac);

							$curl_handle = curl_init($api_url);
							curl_setopt($curl_handle, CURLOPT_FAILONERROR, TRUE);
							curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
							curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, 0);
							curl_setopt($curl_handle, CURLOPT_POST, TRUE);

							curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array('HMAC:' . $hmac));
							curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $post_fields);

							// curl_setopt($ch, CURLOPT_URL, $url);
							// curl_setopt($ch, CURLOPT_POST, 1);
							// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
							// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							// 	'Content-Type:' => 'application/x-www-form-urlencoded',
							// 	'HMAC:' => $hmac
							// ));

							// In real life you should use something like:
							// curl_setopt($ch, CURLOPT_POSTFIELDS, 
							//          http_build_query(array('postvar1' => 'value1')));

							// Receive server response ...
							// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

							$response = curl_exec($curl_handle);
							curl_close ($ch);

							if ($response !== FALSE) {
								$result = false;
								// Check the requested format
								if ($data['format'] == 'json') {
									// Prepare json result
									if (PHP_INT_SIZE < 8 && version_compare(PHP_VERSION, '5.4.0') >= 0) {
										// We are on 32-bit PHP, so use the bigint as string option.
										// If you are using any API calls with Satoshis it is highly NOT recommended to use 32-bit PHP
										$decoded = json_decode($response, TRUE, 512, JSON_BIGINT_AS_STRING);
									} else {
										$decoded = json_decode($response, TRUE);
									}
									// Check the json decoding and set an error in the result if it failed
									if ($decoded !== NULL && count($decoded)) {
										$result = $decoded;
									} else {
										$result = ['error' => 'Unable to parse JSON result (' . json_last_error() . ')'];
									}
								} else {
									// Set the result to the response
									$result = $response;
								}
							} else {
								// Throw an error if the response of the cURL session is false
								$result = ['error' => 'cURL error: ' . curl_error($this->curl_handle)];
							}
							return $result;

							// return $server_output;
						}

						// $userid = 7;
						//  $amount = 0.01;
						// $plan_id = 12;
							//$_REQUEST['item_name']; 
							//   $item_number = 29; 
								
								
								
						/* $txn_id = $_REQUEST['txn_id']; 
							$item_name = $_REQUEST['item_name']; 
							$item_number = $_REQUEST['item_number']; 
							$amount1 = (float)$_REQUEST['amount1']; 
							$amount2 = (float)$_REQUEST['amount2']; 
							$currency1 = $_REQUEST['currency1']; 
							$currency2 = $_REQUEST['currency2']; 
							$status = intval($_REQUEST['status']); 
							$status_text = $_REQUEST['status_text'];
							$amount = (float)$_REQUEST['amount1']; 
							$payid= '38';
							*/
							
							//item_name is plan_id
							//item_number is member_id
								
					?>   
			                    
					<?php
						$planStr = "select * from plan where plan_id='".$_SESSION['planid']."'";
						$planSql = mysql_query($planStr);
						$planDet = mysql_fetch_assoc($planSql);  
						$mat_days = $planDet['period'];
					 	//print_r($planDet);
					   
					   
						$amounts = number_format($amount , 8); 		   
						$data = [
							'version' => 1,
							'key' => '0ea2a56f9a86453d2324ef986d1b15afa88fd9c747554307dc32e06a55a36810' ,
							'cmd' => 'create_transaction',
							'amount' => $amounts,
							'currency1' => 'BTC',
							'currency2' => 'BTC',
							'amountf' => $amounts ,
							'item_name' => $_SESSION['planid'], 
							'item_number' => $userid ,
							// 'order_no'  => $order_no,
							'buyer_email' => 'service.atkinsons@gmail.com',//$user_email,
							'ipn_url' => '',//'https://green-yellows.com/ipn/coinpayment.php',
							'format' => 'json'
						];
						$response = apiCall($data);		
						$dd =  json_encode($response);
						$r = json_decode($dd);
			        
			        
			        
			       
			        
					?>
					<div class="row justify-content-center ">
						<div class="col-md-6" style="border-bottom:1px solid #ccc;">
							<span style="font-size:20px;">You have to pay</span><br/>	 
						</div>
						<div class="col-md-6" style="text-align:center;border-bottom:1px solid #ccc;color:#f8b032;font-weight:bold;font-size:18px;"><?php echo number_format($amount,8); ?>&#x0E3F;</div>
					</div>     
					<!-- <tr>
						<td style="text-align:left;border-top:1px solid #ccc;border-bottom:1px solid #ccc;;">&nbsp;&nbsp;You have to pay</td>
						<td style="text-align:right;border-top:1px solid #ccc;border-bottom:1px solid #ccc;color:#f8b032;font-weight:bold;font-size:18px;"><?php echo number_format($amount,8); ?>&#x0E3F;&nbsp;&nbsp;</td>
					</tr> -->
					
					<!-- <tr><td colspan="2">&nbsp;</td></tr> -->
					<div class="row justify-content-center ">
						<div class="col-md-12 " style="padding: 25px 15px">
							<?php //$qr_link =  "bitcoin:35ax76JgFLTfN8BDs8caBgUPavuV9oeTBo?amount=".$amount; 
							
								$qr_addresss = "15VDfUGGXBRiDjq5jVayP6nq2TsG9B6AgG"; 
								$_SESSION['qrChck'] = 1;
								// blocked- 03-06-2020  "1K5ZYc6UerRshn69To7shFXnDiMnyp8kDW";//"1Ar7TgLuGMsBJfnQ19ud8i8LpWS5g2QL82";
								$qr_link =  "bitcoin:". $qr_addresss ."?amount=".$amount;
								?>
							<img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo $qr_link;?>&amp;size=260x260" alt="<?php echo $qr_link; ?>"/>	 
						</div>
					</div>
					<!-- <tr>
						<td colspan="2" align="center">
								<?php //$qr_link =  "bitcoin:35aTRWaCmcBVzR8jxPDiyab3pBedupKN3o?amount=".$amount; 
								//$qr_addresss = "19DSJLjvK7gtoAdRYYedW7DWSFCY46C"; 
								
							// blocked- 03-06-2020  "1K5ZYc6UerRshn69To7shFXnDiMnyp8kDW";//"1Ar7TgLuGMsBJfnQ19ud8i8LpWS5g2QL82";
								//$qr_link =  "bitcoin:". $qr_addresss ."?amount=".$amount;
								?>
							<img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php //echo $qr_link;?>&amp;size=260x260" alt="<?php// echo $qr_link; ?>"/>
							
						</td>
					</tr>    -->
								
					<!-- <tr><td colspan="2">&nbsp;</td></tr> -->
					<div class="row justify-content-center ">
						<div class="col-md-12 " style="">
							to:&nbsp;<?php echo '<b style="word-break:break-word;">'.$qr_addresss.'</b>';//$bitcoin_id;?>
						</div>
					</div>
					<!-- <tr><td align="center" colspan="2">to:&nbsp;<?php echo '<b>'.$qr_addresss.'</b>';//$bitcoin_id;?><br/></td></tr> -->
					<tr><td colspan="2">&nbsp;<br/></td></tr>
					<div class="row justify-content-center ">
						<div class="col-md-12 " style="">
			                    
							<?php   
							
								$data['cmd'] = '_pay';
								$data['reset'] = '1';
								$data['merchant'] = $bitcoin_id;
								$data['currency'] = 'BTC'; 
								$data['amount'] = $amount;
								$data['item_name'] = $_SESSION['planid'];
								$data['item_number'] =  $userid;
								$data['userid'] = $userid;
								$data['user_name'] =$first_name;
								$data['user_email'] =$user_email;
								$data['on1'] = $userid;
								$data['allow_currencies'] = 'BTC';
								$data['want_shipping'] = '0';
								$data['success_url'] = 'success.php';
								$data['cancel_url'] = 'investment.php';
								$data['button'] = 'Deposit';
								$post_data = json_encode($data);
								$private_key = $pri_key;
								// $hmac = hash_hmac('sha512', $post_data, $private_key); 	
							?><br/>
			                  
					    
					   
							<form method="post" name="money" action="https://atkinsonsbullion-invest.com/investment-history.php" role="form" id="coform" > 
								
								<input type="hidden" name="checkqrcode" value="<?php echo $_SESSION['qrChck'];?>">
								<input type="hidden" name="cmd" value="_pay">
								<input type="hidden" name="merchant"   value="<?php echo $bitcoin_id; ?>">
								<input type="hidden" name="address"    value="<?php echo $address; ?>">
								<input type="hidden" name="order_no"    value="<?php echo $uid; ?>">
								<input type="hidden" name="currency"   value="BTC">
								<input type="hidden" name="amount"     value="<?php echo $amount;?>">
								<input type="hidden" name="amountf" value="<?php echo $amount;?>">
								<input type="hidden" name="item_name" value="<?php echo $item_name;?>">
								<input type="hidden" name="item_number" value="<?php echo $planID; ?>">
								<input type="hidden" name="plan_id"    value="<?php echo $_SESSION['planid']; ?>">
								<input type="hidden" name="member_id"  value="<?php echo $userid; ?>">			
								<input type="hidden" name="first_name" value="<?php echo $first_name;?>">
								<input type="hidden" name="user_email" value="<?php echo $user_email;?>">
								<input type="hidden" name="success_url" value="https://atkinsonsbullion-invest.com/success.php">
								<input type="hidden" name="cancel_url" value="https://atkinsonsbullion-invest.com/cancel.php">
								<input type="hidden" name="ipn_url" value="https://atkinsonsbullion-invest.com/ipn/coinpayment.php">
								<div class="row justify-content-center">
									<div class="pr-2">
										<input type="submit" name="money" style="font-size:14px;margin-top:-20px;height:60px;width:130px;color:#000;" id="button" value="Done" class="button" />
									</div>
									<div class="">
										<input type="button" name="button" style="width:130px;margin-top:-20px;font-size:14px;height:60px;color:#000;" id="button" onclick="window.location='investment.php'" value="Cancel" class="button" />
									</div>
								</div>

							</form>
						</div>
			        </div>
				<!-- </table><br/><br/><br/> -->
			</div>
		</div>       
		
	<?php
			 //print_r($data);
			 //print_r($_POST);
			   //     exit();
		}
		if($payid>55)
			{
			$sql_pg="select * from payment_process where payment_id=$payid";
			$res_pg=mysql_query($sql_pg);
			$row_pg=mysql_fetch_array($res_pg);
	?>
		<table border=0 align=center cellpadding=5 cellspacing=2 width=75%  class="subtable">
			<tr>
				<td class="bluecolour"> Please Click the Button Below to Make your Payment through
				<?=$row_pg['payment_name']?>
				</td>
			</tr>
			<tr>
				<td align=center class="style8"><?php echo $row_pg['buy_form_code']; ?> </td>
			</tr>
		</table>
	<?php	
		}
	}
	else{
		$npsql="select * from plan where plan_id=".$plan_id;
		$npres=mysql_query($npsql);
		if(!$npres)
		echo "<br>error in sql";
		$nprow=mysql_fetch_array($npres);
		echo "<br><center><font color=red><b>If you want to invest in plan <u>".$nprow['plan_type'].
			"</u> you must be deposited in any one of the following plans</b> </span></center><br>";
		echo '<table border="0" align="center" cellpadding="5" cellspacing="2" width="50%"  bgcolor=#FFFFFF>';
		echo '<tr><td class=tdmain align=center class="style8">Deposit Plans</td></tr>';
		for($i=0;$i<$pcnt;$i++)
		{
			$npsql="select * from plan where plan_id=".$pplan[$i];
			$npres=mysql_query($npsql);
			$nprow=mysql_fetch_array($npres);
			echo "<tr><td>".$nprow['plan_type']."</td></tr>";
		}
		echo "</table>";
	}		

	//require 'include/footer.php';
       //require 'include/qfx_footer.php';
	// exit();
	}
	else
	{
		echo '<meta http-equiv="refresh" content="0;url=investment.php">';
		exit();
	}

}?>
</div>
</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<?php include('footer.php')?>
    </div>
</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/aos.js"></script>

<script src="js/main.js"></script>

</html>
 