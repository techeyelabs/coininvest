 <td align="left" valign="top" width="20%">
 
 <style>
 .livestat td
 {
 	font-size:12px;
	padding-top:20px; 
	line-height: 5px;
 }

 </style>
 <div class="body_left">
 
  <?php
	if(isset($_SESSION['userid']))
	{
		/*echo '<div class="">
              <div class=""></div>
              <div class="">
			  	<br>
                <div class="weacceptbg"><h1 class="weacc_icon"><a href="statistics.php" style="color:white;text-transform:none;">Statistics</a></h1></div>
		<div class="weacceptbg"><h1 class="weacc_icon"><a href="deposit.php" style="color:white;text-transform:none;">Make Deposit</a></h1></div>
		<div class="weacceptbg"><h1 class="weacc_icon"><a href="withdraw.php" style="color:white;text-transform:none;">My Withdrawals</a></h1></div>
		<div class="weacceptbg"><h1 class="weacc_icon"><a href="referral.php" style="color:white;text-transform:none;">My Referrals</a></h1></div>
	<div class="weacceptbg"><h1 class="weacc_icon"><a href="deposit_list.php?status=all" style="color:white;text-transform:none;">Deposit History</a></h1></div>
	<div class="weacceptbg"><h1 class="weacc_icon"><a href="testimonials.php" style="color:white;text-transform:none;">Testimonial</a></h1></div>
	<div class="weacceptbg"><h1 class="weacc_icon"><a href="promotional.php" style="color:white;text-transform:none;">Promotional Tools</a></h1></div>
        <div class="weacceptbg"><h1 class="weacc_icon"><a href="tellafriend.php" style="color:white;text-transform:none;">Tell A Friend</a></h1></div>
	<div class="weacceptbg"><h1 class="weacc_icon"><a href="fundtransfer.php" style="color:white;text-transform:none;">Fund Transfer</a></h1></div>
	<div class="weacceptbg"><h1 class="weacc_icon"><a href="history.php" style="color:white;text-transform:none;">Transaction History</a></h1></div>
	<div class="weacceptbg"><h1 class="weacc_icon"><a href="viewprofile.php?mode=ac" style="color:white;text-transform:none;">My Profile</a></h1></div>
	<div class="weacceptbg"><h1 class="weacc_icon"><a href="changepassword.php" style="color:white;text-transform:none;">Change Password</a></h1></div>
	<div class="weacceptbg"><h1 class="weacc_icon"><a href="tickets.php?flag=view" style="color:white;text-transform:none;">Support</a></h1></div>
	<div class="weacceptbg"><h1 class="weacc_icon"><a href="logout.php?mode=ac" style="color:white;text-transform:none;">Logout</a></h1></div>
              </div>
              <div class=""></div>
            </div>';
			*/
			
			
			
			
		/*echo '<div class="box">
            	<ul class="menu">
               		<li><a href="statistics.php"><span style="color:#fff">Statistics</span></a> </li>
                  	<li><a href="deposit.php"><span style="color:#fff">Make Deposit</span></a> </li>
                  	<li><a href="withdraw.php"><span style="color:#fff">My Withdrawals</span></a> </li>
                    <li><a href="referral.php"><span style="color:#fff">My Referrals</span></a> </li>
		<li><a href="testimonials.php"><span style="color:#fff">Testimonial</span></a> </li>
                     <li><a href="promotional.php"><span style="color:#fff">Promotional Tools</span></a> </li>
		 <li><a href="tellafriend.php"><span style="color:#fff">Tell A Friend</span></a> </li>
		  <li><a href="fundtransfer.php"><span style="color:#fff">Fund Transfer</span></a> </li>
                      <li><a href="deposit_list.php?status=all"><span style="color:#fff">Deposits</span></a> </li>
                       <li><a href="history.php"><span style="color:#fff">Transaction History</span></a> </li>
                       <li><a href="viewprofile.php?mode=ac"><span style="color:#fff">My Profile</span></a> </li>
                       <li><a href="changepassword.php"><span style="color:#fff">Change Password</span></a> </li>
                         <li><a href="tickets.php?flag=view"><span style="color:#fff">Support</span></a> </li>
                       <li class="last"><a href="logout.php"><span style="color:#fff">Logout</span></a> </li>
             	 </ul>
            	</div>';*/
				
				
				
				echo '<div class="cat_hdr">
						  <div class="cat_top"></div>
						  <div class="cat_center">
							<div class="title_bg">
							  <h1 class="news_icon" style="color:#333;font-size:16px;"><center>My Account</center></h1>
							</div>
							
							
							
							<ul class="news_list new_list">
							 	<li><a href="statistics.php" class="allnews1" style="font-size:16px;">Statistics</a> </li>
								<li><a href="deposit.php" class="allnews1"  style="font-size:16px;">Make Deposit</a> </li>
								<li><a href="withdraw.php" class="allnews1"  style="font-size:16px;">My Withdrawals</a> </li>
								<li><a href="referral.php" class="allnews1"  style="font-size:16px;">My Referrals</a> </li>
							<li><a href="deposit_list.php?status=all" class="allnews1"  style="font-size:16px;">Deposit History</a> </li>
								<li><a href="testimonials.php" class="allnews1"  style="font-size:16px;">Testimonial</a> </li>
								<li><a href="promotional.php" class="allnews1"  style="font-size:16px;">Promotional Tools</a> </li>
								<li><a href="tellafriend.php" class="allnews1"  style="font-size:16px;">Tell A Friend</a> </li>
								<li><a href="fundtransfer.php" class="allnews1"  style="font-size:16px;">Fund Transfer</a> </li>
								<li><a href="history.php" class="allnews1"  style="font-size:16px;">Transaction History</a> </li>
								<li><a href="viewprofile.php?mode=ac" class="allnews1"  style="font-size:16px;">My Profile</a> </li>
								<li><a href="changepassword.php" class="allnews1"  style="font-size:16px;">Change Password</a> </li>
								<li><a href="tickets.php?flag=view" class="allnews1"  style="font-size:16px;">Support</a> </li>
								<li><a href="logout.php" class="allnews1"  style="font-size:16px;">Logout</a> </li>
							</ul>
							
							
						  </div>
						  <div class="cat_bottom"></div>
						</div>';
			
			
			
	}
	
	else
	{
	
	?>
 
       <div class="red_hdr" style="background-color:#e8e8e8; border-radius:10px; padding:15px; margin-top:15px;">
      <div class="red_center">
  <h1 class="left-title"><center>Login</center></h1>

				
         <!--    <div class="cat_hdr">
              <div class="cat_top"></div>
              <div class="cat_center">
                <div class="title_bg">
                  <h1 class="login_icon">Login</h1>
                </div> -->
				
                <ul class="login_form">
				<form action="" method="post" id="loginvalid" autocomplete="off"> 
                  <li>
				  	<span id="invalid_login"></span>
                    <input type="text" class="input_bx"  placeholder="User Name" id="username" name="username"/>
					<span id="error_username"></span>
                  </li>
				  
                  <li>
                    <input type="password" class="input_bx" placeholder="Password"  id="password" name="password"/>
					<span id="error_password"></span>
                  </li>
				  
                  <li>
                    <input type="submit" class="login_btn" value="Login" />
                   </li>
                  <li><a href="forgot.php">Forgot Password?</a></li>
                  <li><a href="register.php">New User? Signup here</a></li>
				  </form>
                </ul>
              </div>
      <!--         <div class="cat_bottom"></div> -->
            </div>
			
            
		<!-- 	<div class="cat_hdr">

              <div class="cat_top"></div>
              <div class="cat_center">
                <div class="title_bg">
                  <h1 class="news_icon">News</h1>
                </div>
                <ul class="news_list"> -->
                	<div class="cat_hdr">
              <div class="cat_top"></div>
              <div class="cat_center">
                <div class="title_bg">
                  <h1 class="left-title1" style="padding-right:15px;"><center>News</center></h1>
                </div>
                <ul class="news_list" style="margin-top:10px;">
				
				<?php
				
				$select_news = mysql_query("select * from news order by news_id desc limit 0,2");
				
				if(mysql_num_rows($select_news) > 0)
				{
					while($fetchnews = mysql_fetch_array($select_news))
					{
						$desc = $fetchnews['news_description'];
						
						$explode = explode(' ',$desc);
						
						$slice = array_slice($explode,0,14);
						
						$implode = implode(' ',$slice);
						
						//December 17, 2012
						
 						echo '<li><span style="color:#000;">'.date('F d , Y',strtotime($fetchnews['dt'])).'</span>
                    			<p><a href="news.php">'.$implode.'</a></p>
                  			  </li>';
				  
				  
				  	}
				}
				else
				{
					echo '<p>No Records Found</p>';
				}
				
                 
				  
				  ?>
				  
                  <a href="news.php" class="allnews">All News</a>
                </ul>
              </div>
       <!--        <div class="cat_bottom"></div> -->
            </div>
	        <?php
		
						 $select_startdate = mysql_fetch_array(mysql_query("select * from site_statistics where stat_id='1'"));
						 $live_site=mysql_fetch_array(mysql_query("select * from live_statistics where id='1'"));


						
						$select_all = mysql_fetch_array(mysql_query("select count(*) as allm from members"));
						$select_active = mysql_fetch_array(mysql_query("select count(*) as acti from members where status = 'active'"));
						$select_susd = mysql_fetch_array(mysql_query("select count(*) as sus from members where status = 'suspended'"));
						$select_new = mysql_fetch_array(mysql_query("select count(*) as new from members where status = 'new'"));
						$getdatetime= mysql_fetch_array(mysql_query("SELECT CURRENT_TIMESTAMP AS getdatetime"));
						$date = date('Y-m-d 00:00:00');	
						$to_date = $getdatetime['getdatetime'];
						//echo "select count(*) as reg from members where date_of_join >= '$date' and date_of_join <= '$to_date'";
						                                   		
						$select_date = mysql_fetch_array(mysql_query("select count(*) as reg from members where date_of_join >= '$date' and date_of_join <= '$to_date'"));
						$history = mysql_fetch_array(mysql_query("select sum(amount) as inco from deposit"));
						$select_flagged = mysql_fetch_array(mysql_query("select count(*) as flagged from members where is_flag = '1'"));
						$history_date = mysql_fetch_array(mysql_query("select sum(amount) as incodate from deposit where invest_date='$date'"));
						if($history_date['incodate'] =='')
						$history_date['incodate'] = "0.00";

						if($history['inco'] =='')
						$history['inco'] = "0.00";

												

						$pending_with = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='withdraw_pending'"));
						$paid_with = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='withdrawal'"));
						$deposit_with = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit"));
						$balance = $deposit_with['amt'] - ($pending_with['amt'] + $paid_with['amt']);
						
						?>

 		<?php
 
		  $select=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='63'"));
		  $set_value=$select['set_value'];
		  if($set_value == 'on')
		  {
		  ?>
		  
		  
	<!-- 	  			
            <div class="cat_hdr">
              <div class="cat_top"></div>
              <div class="cat_center">
                <div class="title_bg">
                  <h1 class="plan_icon">Site Statistics</h1>
                </div> -->
             <div class="cat_hdr">
              <div class="cat_top"></div>
              <div class="cat_center">
                <div class="title_bg">
                  <h1 class="left-title1"><center>Site Statistics</center></h1>
                </div>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="livestat" style=" color: #7B7B7B;font-size: 11px;">

 <?php
 
 
		  $select=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='52'"));
		  $set_value=$select['set_value'];
		  if($set_value == 'on')
		  {
		  ?>




  <tr>
    <td align="left" valign="top" width="60%">Started</td>
    
    
    <td align="left" valign="top" width="40%"><?php echo date("Y-m-d",strtotime($live_site['started'])); ?> </td>
  </tr>
  
  <?php } ?>
    <?php 
	 $date = date('Y-m-d 00:00:00');	
$history = mysql_fetch_array(mysql_query("select sum(amount) as inco from deposit"));

$to_date = $getdatetime['getdatetime'];
	$select_startdate = mysql_fetch_array(mysql_query("select * from site_statistics where stat_id='1'"));
	$lifetimes=mysql_fetch_assoc(mysql_query("SELECT DATEDIFF(now(),'".$select_startdate['site_val']."') as lifetime from site_statistics where stat_id='1'"));
    $deposit_with = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit"));
					
						if($deposit_amount=$deposit_with['amt']== '') 
						{
						
						  $deposit_amount = '0';
						}
						
						else 						
						{
						  $deposit_amount=$deposit_with['amt'];
						
						}
						
						 $paid_with = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='withdrawal'"));
						
								if($withdraw_amount=$paid_with['amt']== '') 
						{
						
						  $withdraw_amount = '0';
						}
						
						else 						
						{
						  $withdraw_amount=$paid_with['amt'];
						
						}
			

	 $history_date = mysql_fetch_array(mysql_query("select sum(amount) as incodate from deposit where DATE(invest_date)='".$date."'"));
	 if($history_date['incodate'] =='')
						$history_date['incodate'] = "0.00";

						if($history['inco'] =='')
						$history['inco'] = "0.00";
						
	$new_mem=mysql_fetch_array(mysql_query("select count(date_of_join) as mem from `members`"));
	
	//echo "select sum(amount) as amt from history where type='withdrawal' and DATE(date)='$date'";exit;
	$withdraw=mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='withdrawal' and DATE(date)='$date'"));
	
	 if($withdraw['amt'] =='')
						$withdraw['amt'] = "0.00";
	 ?>
 <?php
        
           $date_one=date("Y-m-d");
 
			$start = strtotime($live_site['started']);
			$end = strtotime($date_one);
			
			$days_between = ceil(abs($end - $start) / 86400);
 
 
		  $select=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='53'"));
		  $set_value=$select['set_value'];
		  if($set_value == 'on')
		  {
		  ?>
  
  <tr>
    <td align="left" valign="top">Running Days</td>    
    <td align="left" valign="top"><?php	
	if($live_site['editrunning']=='1')
	{	
		echo $days_between;
	}
	else if($live_site['editrunning']=='2')
	{	
		echo $live_site['runningdays'];
	}	
	
	else if($live_site['editrunning']=='3')
	{
		echo $runn_new=$days_between+$live_site['runningdays'];
	}
		
		?>
		</td>
  </tr>
  <?php } ?>
  
   <?php
              
		  $deposit_query=mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where status ='active'"));
		  $total_deposit_made=number_format($deposit_query['amt'],2); 
		  $select=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='54'"));
		  $set_value=$select['set_value'];
		  if($set_value == 'on')
		  {
		  ?>
  
  
   <tr>
    <td align="left" valign="top">Total Deposited</td>
    
    <td align="left" valign="top">&#x0e3f;<?php 	
	 if($live_site['editdeposit']=='1')
	{	
		echo $total_deposit_made; 
	}
	else if($live_site['editdeposit']=='2')
	{	
		echo $live_site['totdep'];
	}	
	
	else if($live_site['editdeposit']=='3')
	{
		echo $tot_acc=$total_deposit_made+$live_site['totdep'];
	}
	 ?></td>
  </tr>
  <?php } ?>
  
  
   <?php
   
          $withdrawals_query=mysql_fetch_array(mysql_query("select sum(amount) as amt  from history where type='withdrawal'"));
		$withdrawals=number_format($withdrawals_query['amt'],2);
		  $select=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='55'"));
		  $set_value=$select['set_value'];
		  if($set_value == 'on')
		  {
		  ?>
  
   <tr>
    <td align="left" valign="top">Total withdrawal</td>
    
    <td align="left" valign="top">&#x0e3f;<?php
	  if($live_site['editwithdraw']=='1')
	{	
		echo $withdrawals; 
	}
	else if($live_site['editwithdraw']=='2')
	{	
		echo $live_site['totwithdraw'];
	}	
	
	else if($live_site['editwithdraw']=='3')
	{
		echo $tot_acc1=$withdrawals+$live_site['totwithdraw'];
	}
	 
	 ?></td>
  </tr>
  
  <?php } ?>
     <?php
		  $select=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='56'"));
		  $set_value=$select['set_value'];
		  if($set_value == 'on')
		  {
		  ?>
  
  
  <tr>
    <td align="left" valign="top">Today deposit</td>    
    <td align="left" valign="top">&#x0e3f;<?php  if($live_site['editlastdeposit']=='1')
	{	
		echo $history_date['incodate']; 
	}
	else if($live_site['editlastdeposit']=='2')
	{	
		echo $live_site['lastdep'];
	}	
	
	else if($live_site['editlastdeposit']=='3')
	{
		echo $tot_with=$history_date['incodate']+$live_site['lastdep'];
	}
	
	 ?></td>
  </tr>   
  <?php } ?>
    
   <?php
		  $select=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='57'"));
		  $set_value=$select['set_value'];
		  if($set_value == 'on')
		  {
		  ?>
  
    <tr>
    <td align="left" valign="top">Today withdraw</td>
    
    <td align="left" valign="top">&#x0e3f; 	
	<?php  if($live_site['editlastwithdraw']=='1')
	{	
		echo $withdraw['amt']; 
	}
	else if($live_site['editlastwithdraw']=='2')
	{	
		echo $live_site['lastwithdraw'];
	}		
	else if($live_site['editlastwithdraw']=='3')
	{
		echo $tot_with=$withdraw['amt']+$live_site['lastwithdraw'];
	}	
 ?>
	
	 </td>
  </tr>
  <?php } ?>
  
  
   <?php
   
          $fetch_members=mysql_num_rows(mysql_query("select * from members"));
		  $select=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='58'"));
		  $set_value=$select['set_value'];
		  if($set_value == 'on')
		  {
		  ?>
  
   <tr>
    <td align="left" valign="top">Total members </td>
    
    <td align="left" valign="top">
	
	<?
	if($live_site['editaccounts']=='1')
	{	
		echo $fetch_members;
	}
	else if($live_site['editaccounts']=='2')
	{	
		echo $live_site['totacc'];
	}	
	
	else if($live_site['editaccounts']=='3')
	{
		echo $tot_comm=$fetch_members+$live_site['totacc'];
	}	
	 ?>
	
	</td>
  </tr> 
  
  <?php } ?>
  
  
   <?php
   
          $fetch_members_last=mysql_fetch_array(mysql_query("select * from members order by member_id DESC"));
		  
		  if($fetch_members_last['username'] =='')
						$fetch_members_last['username'] = "None";
		  $select=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='60'"));
		  $set_value=$select['set_value'];
		  if($set_value == 'on')
		  {
		  ?>

    <tr>
    <td align="left" valign="top">Newest members </td>
    
    <td align="left" valign="top">
    
    <?
	
	 if($live_site['editnewmember']=='1')
	{	
	 echo $fetch_members_last['username']; 
	}
	else if($live_site['editnewmember']=='2')
	{	
		echo $live_site['newmember'];
	}	
	
	 ?>
	
	
	</td>
  </tr>
  
  <?php } ?>
  
  
   <?php
          $fetch_members_active=mysql_num_rows(mysql_query("select * from members where status='active'"));
		  $select=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='59'"));
		  $set_value=$select['set_value'];
		  if($set_value == 'on')
		  {
		  ?>

   <tr>
    <td align="left" valign="top">Active members </td>
    
    <td align="left" valign="top"> <? if($live_site['editactaccounts']=='1')
	{	
		echo $fetch_members_active; 
	}
	else if($live_site['editactaccounts']=='2')
	{	
		echo $live_site['actacc'];
	}	
	

	else if($live_site['editactaccounts']=='3')
	{
		echo $tot_acc=$fetch_members_active+$live_site['actacc'];
	}
	 ?></td>
  </tr>

  <?php } ?>

</table>


              </div>
          <!--     <div class="cat_bottom"></div> -->
            </div>
			
			<?php } ?>
			
			<!--
            <div class="cat_hdr">
              <div class="cat_top"></div>
              <div class="cat_center">
                <div class="weacceptbg">
                  <h1 class="left-title1"><center>WE ACCEPT</center></h1>
                </div>
                  <ul class="weacc" style="line-height:5px;">
                  <li><a href="#"><img src="images/accept/solid_trustpay.gif" alt="bankwire" /></a></li>
                  <li><a href="#"><img src="images/paypal.png"  alt="liberty reserve" /></a></li>
                  <li><a href="#"><img src="images/bitcoin.jpeg"  alt="Bitcoin" /></a></li>
                  <li><a href="#"><img src="images/skrill.png"  alt="Neteller" /></a></li>
                  <li><a href="#"><img src="images/payeer.png"  alt="Neteller" /></a></li>
                  <li><a href="#"><img src="images/neteller.png"  alt="Neteller" /></a></li>
                  <li><a href="#"><img src="images/accept/pm.gif"  alt="Perfect Money" /></a></li>

                </ul>
              </div>

            </div>-->
			
          </div>
		  
	<?php } ?>	  
  </td>
		  
		  
		  <script type="text/javascript">		  
		  $("#loginvalid").submit(function(){		  
		  	var username = $("#username").val();			
			var password = $("#password").val();			
			$("#error_username").html("");			
			$("#error_password").html("");			
			$("#invalid_login").html("");			
			if(username == '')
			{
				$("#error_username").html("<p>Enter The User Name</p>");
				$("#username").focus();
				return false;
			}			
			if(password == '')
			{
				$("#error_password").html("<p>Enter The Password</p>");
				$("#password").focus();
				return false;
			}		
			
			$.post("valid.php",{username : username,password:password},function(data){			
			$value = $.trim(data);			
				if($value == 'error')
				{
					$("#invalid_login").html("<p>Invalid Username and Password</p>");
					return false;
				}
				else
				{
					window.location.href='memberhome.php';
				}
			});			
			return false;			
		  });
		  </script>
