<?php  error_reporting(0); ?>
<script type="text/javascript" src="../js/highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="../js/highslide/highslide.css" />
<script type="text/javascript">
	hs.graphicsDir = '../js/highslide/graphics/';
	hs.outlineType = 'rounded-white';
	hs.showCredits = false;
	hs.wrapperClassName = 'draggable-header';
</script>

<div id="primary_right">
  <div class="inner">
    <h1 style="color:#fff">Dashboard Elements</h1>
	<?php
		if($_SESSION['aid'] == 1)
		{
	?>
    <ul class="dash">
	 <li class="fade_hover tooltip" title="Active Representatives"> 
     
     <a href="mainuser.php?status=active"> <img src="assets/icons/dashboard/54.png" alt="" /> <span>Active Rep.</span> </a>
      </li>
      
      
      <!--
      <li class="fade_hover tooltip" title="Write a Contents">
       <a href="cms.php?id=1"> <img src="assets/icons/dashboard/2.png" alt="" /> <span>CMS</span> </a>
       </li>-->
     
      <li class="fade_hover tooltip" title="Plans"> 
      <a href="plans.php"> <img src="assets/icons/dashboard/81.png" alt="" /> <span>plans</span> </a> 
      </li>
      
      
      <!--
      <li class="fade_hover tooltip" title="Manage your Site Settings">
      <a href="site_settings.php"> <img src="assets/icons/dashboard/21.png" alt="" /> <span>Site Settings</span> </a>
       </li>
     
         
    
         <li class="fade_hover tooltip" title="end Mail to Your Users">
      <a href="send_letter.php"> <img src="assets/icons/dashboard/75.png" alt="" /> <span>Send Mail</span> </a>
       </li>-->
       
       
        
      <li class="fade_hover tooltip" title="View your Transactions"> 
      <a href="transactions.php"> <img src="assets/icons/dashboard/123.png" alt="" /> <span>Transactions</span> </a>
       </li>
      
      
      <li class="fade_hover tooltip" title="Manage your Payouts Management">
	<a href="withdraw.php?act=paid"> <img src="assets/icons/dashboard/80.png" alt="" /> <span>Payouts</span> </a>
     </li>
     <!--
      <li class="fade_hover tooltip" title="Manage your Promotional Tools">
      <a href="promotional.php"> <img src="assets/icons/dashboard/18.png" alt="" /> <span>Promotional</span> </a>
       </li>
-->
      <li class="fade_hover tooltip" title="Close your Sessions">
      <a href="logout.php"><img src="assets/icons/dashboard/118.png" alt="" /><span>Logout</span></a>

        </li>
    </ul>
	<?php
	}
	?>
    <!-- end dashboard items -->
    <?php
	// CHART FOR LAST WEEK JOINERS
	$yesterday = date("Y-m-d", strtotime("-7 day"));
	//'Monday', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'
	$day1=date("D", strtotime("-7 day"));
	$date1=date("Y-m-d", strtotime("-7 day"));
	$no1 = mysql_num_rows(mysql_query("select * from members where date_of_join='".$date1."'"));
	$amt1 = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where invest_date ='".$date1."'"));
	if($amt1['amt'] == '') $amt11=0; else $amt11=$amt1['amt']; 
	$day2=date("D", strtotime("-6 day"));
	$date2=date("Y-m-d", strtotime("-6 day"));
	$no2 = mysql_num_rows(mysql_query("select * from members where date_of_join='".$date2."'"));
	$amt2 = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where invest_date ='".$date2."'"));
	if($amt2['amt'] == '') $amt12=0; else $amt12=$amt2['amt']; 
	$day3=date("D", strtotime("-5 day"));

	$date3=date("Y-m-d", strtotime("-5 day"));

	$no3 = mysql_num_rows(mysql_query("select * from members where date_of_join='".$date3."'"));

	$amt3 = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where invest_date ='".$date3."'"));

	if($amt3['amt'] == '') $amt13=0; else $amt13=$amt3['amt']; 

	

	$day4=date("D", strtotime("-4 day"));

	$date4=date("Y-m-d", strtotime("-4 day"));

	$no4 = mysql_num_rows(mysql_query("select * from members where date_of_join='".$date4."'"));

	$amt4 = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where invest_date ='".$date4."'"));

	if($amt4['amt'] == '') $amt14=0; else $amt14=$amt4['amt']; 

	

	$day5=date("D", strtotime("-3 day"));

	$date5=date("Y-m-d", strtotime("-3 day"));

	$no5 = mysql_num_rows(mysql_query("select * from members where date_of_join='".$date5."'"));

	$amt5 = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where invest_date ='".$date5."'"));

	if($amt5['amt'] == '') $amt15=0; else $amt15=$amt5['amt']; 

	

	$day6=date("D", strtotime("-2 day"));

	$date6=date("Y-m-d", strtotime("-2 day"));

	$no6 = mysql_num_rows(mysql_query("select * from members where date_of_join='".$date6."'"));

	$amt6 = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where invest_date ='".$date6."'"));

	if($amt6['amt'] == '') $amt16=0; else $amt16=$amt6['amt']; 

	

	$day7=date("D", strtotime("-1 day"));

	$date7=date("Y-m-d", strtotime("-1 day"));

	$no7 = mysql_num_rows(mysql_query("select * from members where date_of_join='".$date7."'"));

	$amt7 = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where invest_date ='".$date7."'"));
	if($amt7['amt'] == '') $amt17=0; else $amt17=$amt7['amt']; 
	$final_days = "'".$day1."','".$day2."','".$day3."','".$day4."','".$day5."','".$day6."','".$day7."'";
	$final_date = $no1.",".$no2.",".$no3.",".$no4.",".$no5.",".$no6.",".$no7;
	$final_amount = $amt11.",".$amt12.",".$amt13.",".$amt14.",".$amt15.",".$amt16.",".$amt17;
?>


    <hr />
    <h1 style="color:#fff">Alerts</h1>
    
    <table class="normal tablesorter fullwidth" > 
      <thead>
        <tr>
          <th>Time Stamp</th>
          <th>Username</th>
          <th>Description</th>
          <th>Amount (&#x0e3f;)</th>
        
        </tr>
      </thead>
      <tbody>
	   <?php
		$select_company = mysql_query("select * from  history  ORDER BY `id` DESC LIMIT 0 , 10 ");
					
					if(mysql_num_rows($select_company) > 0)
			{
					$i=0;
					while($fetch = mysql_fetch_array($select_company))
					{
						$i++;
						
						$value = $i % 2;
						if($value ==0)
						{
							$class = "odd";
						}
						else
						{
							$class = "";
						}

	$company=mysql_fetch_array(mysql_query("select * from members where member_id=".$fetch['user_id']));
											
						
				?>
             <tr class="<?php echo $class; ?>">
        
           <td><?php echo date("Y-m-d H:i:s",strtotime($fetch['date']));
           
           //date("j F, Y ,g:i a",strtotime($fetch['date']));
           
           ?></td>
          <td><?php echo ucfirst($company['username']); ?></td>
          <td><?php echo $fetch['description']; ?></td>
          <td>&#x0e3f; <?php echo $fetch['amount'];  ?></td>
         
        </tr>
         <?php
				
				}
			}
			else
			{
				 echo '<tr ><td colspan="4">No Records found</td></tr>';
			}
				?>
        
      </tbody>
    </table>
	<?php
		if($_SESSION['aid'] == 1)
		{
	?>
    <div align="right" style="margin-bottom:15px"><a href="transactions.php" target="_blank" class="button_link" >View More</a></div>
	<?php
	}
	?>
    <hr />
    

    
    <!--
    <h1>Tickets Alert</h1>
    <table class="normal tablesorter fullwidth" > 
      <thead>
        <tr>
        <th>Username</th>
          <th>Ticket Number</th>
          <th>subject</th>
          <th>Message</th>
          <th>Date</th>
        
        </tr>
      </thead>
      <tbody>
	   <?php
			$select_company = mysql_query("SELECT * FROM  tickets WHERE status='0'  ORDER BY `id` DESC LIMIT 0 , 10 ");
					
					if(mysql_num_rows($select_company) > 0)
			{
					$i=0;
					while($fetch = mysql_fetch_array($select_company))
					{
						$i++;
						
						$value = $i % 2;
						if($value ==0)
						{
							$class = "odd";
						}
						else
						{
							$class = "";
						}
						
						$usql="select * from members where member_id='".$fetch['userid']."'";
						$userdata=mysql_fetch_array(mysql_query($usql));
											
						
				?>
             <tr class="<?php echo $class; ?>">
              <td><?php echo ucfirst($userdata['username']); ?></td>
              
          <td >
          <a href="ticketdetails.php?tktid=<?php echo $fetch['id']; ?>"  style="text-decoration:none"><BLINK style="color:#FF0000;">
      <?php echo $fetch['ticket_no']; ?></BLINK></a>
          </td>
         
          <td><?php echo $fetch['subject']; ?></td>
          
          
          <td><?php 
		  
		  echo '<a href="" onclick="return hs.htmlExpand(this,{ headingText: \''.$fetch['subject'].'\' })">
								'.substr($fetch['message'],0,50).'</a>
								<div class="highslide-maincontent">'.$fetch['message'].'</div>';
		   ?></td>
          <td><?php echo date("j F, Y ,g:i a",strtotime($fetch['postdate']));?></td>
         
        </tr>
         <?php
				
				}
			}
			else
			{
				 echo '<tr ><td colspan="4">No Records found</td></tr>';
			}
				?>
        
      </tbody>
    </table>
    <div align="right"><a href="tickets.php" target="_blank" class="button_link" >View More Tickets</a></div>
    -->
    
    <!--
    
   <h1>Charts</h1>
    <div style="clearboth"></div>
    <div class="tabs fullwidth" >
      <div class="ui-widget-header"> <span>Chart for Last Week Joiners</span>
              </div>
      
        <div id="visualization" style="display: block;overflow:auto;width:80%;height:265px;" align="center"></div>
     
    </div>
    <div class="clearboth"></div>
    
    
      <div class="tabs fullwidth" >
      <div class="ui-widget-header"> <span>Chart for Past Week Deposit</span>
              </div>
      
        <div id="visualization1" style="display: block;overflow:auto;width:80%;height:265px;" align="center"></div>
     
    </div>
    <div class="clearboth"></div> 
    -->
	
 <div class="tabs fullwidth"> 
	<hr />
    <h1 style="color:#333">Statistics</h1>
      <div class="portlet">
        <div class="portlet-header">MEMBER STATISTICS</div>
        <div class="portlet-content" style="display: block;">
          <?php
						
								$select_all = mysql_fetch_array(mysql_query("select count(*) as allm from members"));

						$select_active = mysql_fetch_array(mysql_query("select count(*) as acti from members where status = 'active'"));

						$select_susd = mysql_fetch_array(mysql_query("select count(*) as sus from members where status = 'suspend'"));

						$date = date('Y-m-d 00:00:00');	$to_date = date('Y-m-d H:i:s');			

						$select_date = mysql_fetch_array(mysql_query("select count(*) as reg from members where date_of_join >= '$date' and date_of_join <= '$to_date'"));

						

						$history = mysql_fetch_array(mysql_query("select sum(amount) as inco from deposit"));

						

						

						$history_date = mysql_fetch_array(mysql_query("select sum(amount) as incodate from deposit where invest_date='$date'"));

						if($history_date['incodate'] =='')

						$history_date['incodate'] = "0.00";

						if($history['inco'] =='')

						$history['inco'] = "0.00";

						$total_matured = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='release_deposit'"));
						$total_matured1 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='release_deposit' and payment_thro='30'"));
						$total_matured2 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='release_deposit' and payment_thro='8'"));
						$total_matured3 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='release_deposit' and payment_thro='11'"));
						$total_matured4 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='release_deposit' and payment_thro='28'"));
						$total_matured5 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='release_deposit' and payment_thro='13'"));
						
						$total_profit = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where (type='intrest_earned' || type='commissions' || type='earning' || type='bonus')"));
					$total_deposits = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='deposit'"));
					
					$total_deposits1 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='deposit' and payment_thro='30'"));
					$total_deposits2 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='deposit' and payment_thro='8'"));
					$total_deposits3 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='deposit' and payment_thro='11'"));
					$total_deposits4 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='deposit' and payment_thro='28'"));
					$total_deposits5 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='deposit' and payment_thro='13'"));
				
				
				$depost_total_str = mysql_query("select sum(amount) as amt from deposit where status='active' and payment_thro='38'");
				$total_deposits12 = mysql_fetch_array($depost_total_str);
				
				
				$matured_total_str = mysql_query("select sum(amount) as amt from deposit where type='matured' and payment_thro='38'");
				$total_matured_deposits123 = mysql_fetch_array($matured_total_str);
				
				
				
				$pending_with = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='withdraw_pending'"));
				

						$paid_with = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='withdrawal'"));

						$deposit_with = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit"));

						$balance = $deposit_with['amt'] - ($pending_with['amt'] + $paid_with['amt']);
						$paid = $total_profit['amt'] - $paid_with['amt'];
						?>
          <p>
        
		  <table class="normal tablesorter fullwidth" style="height:330px">
            <tbody>
            <tr>
                <td><strong>Total Investment</strong></td>
               	 <td> :&#x0e3f; <strong><?php echo number_format($total_deposits12['amt'],8); ?> </strong></td>
                 </tr>
                 <tr>
                 
                     <tr>
                  <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
              
                 
                 
                    <tr>
                <td><strong>Total Matured Investment</strong></td>
                <td>:&#x0e3f; <strong><?php echo number_format($total_matured_deposits123['amt'],8); ?></strong> </td>
              </tr>
                 <!--
                 <td>Ego Pay</td>
                 <td>:&#x0e3f; <?php //echo number_format($total_deposits1['amt'],8); ?></td>
                 </tr>
                 -->
                 
                 <!--<tr>
                 <td>Liberty Reserve</td>
                 <td>:&#x0e3f; <?php //echo number_format($total_deposits2['amt'],8); ?> </td>
                 </tr>-->
                 
                 <!--
                 <tr>
                 <td>Perfect Money</td>
                 <td>:&#x0e3f; <?php //echo number_format($total_deposits3['amt'],8); ?> </td>
                 </tr>
                  <tr>
                 <td>STP</td>
                 <td>:&#x0e3f; <?php //echo  number_format($total_deposits4['amt'],8); ?> </td>
                 </tr>
                 <tr>
                 <td>BankWire</td>
                 <td>:&#x0e3f; <?php //echo number_format($total_deposits5['amt'],8); ?> </td>
                 </tr>
                 --> 
                 
               <!-- <td>:&#x0e3f; <?php //echo number_format($total_deposits['amt'],8); ?> </td>-->
          
           
              
                 <!--<tr>
                 <td>Ego Pay</td>
                 <td>:&#x0e3f; <?php //echo number_format($total_matured1['amt'],8); ?></td>
                 </tr>-->
                 <!--<tr>
                 <td>Liberty Reserve</td>
                 <td>: <?php //echo number_format($total_matured2['amt'],8); ?> </td>
                 </tr>-->
                 <!--
                 <tr>
                 <td>Perfect Money</td>
                 <td>:&#x0e3f; <?php //echo number_format($total_matured3['amt'],8); ?></td>
                 </tr>
                 <tr>
                 <td>STP</td>
                 <td>:&#x0e3f; <?php //echo number_format($total_matured4['amt'],8); ?> </td>
                 </tr>
                   <tr>
                 <td>Bankwire</td>
                 <td>:&#x0e3f; <?php ///echo number_format($total_matured5['amt'],8); ?> </td>
                 </tr>
                  
                 -->
                  <tr>
                  <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
                 
                 
                 <!--
               <tr>
                <td>Total Profit Occured</td>
                <td>:&#x0e3f; <?php //echo number_format($total_profit['amt'],8); ?></td>
              </tr>  
             
               <tr>
                <td>Total Profit Paid</td>
                <td>:&#x0e3f; <?php //echo number_format($paid_with['amt'],8); ?> </td>
              </tr>  
              
              <tr>
                <td>Total Pending Profit To Pay</td>
                <td>:&#x0e3f; <?php //echo number_format($paid,8); ?> </td>
              </tr>  
              -->
              
              <!--  <tr>
                <td>Payout Pending</td>
                <td>:&#x0e3f; <?php //echo number_format($pending_with['amt'],8); ?> </td>
              </tr> --> 
              
			<!--<tr>
                <td>Today's Registered Members</td>
                <td>: <?php //echo number_format($select_date['reg']); ?> </td>
              </tr>
              <tr>
                <td>Total Members</td>
                <td>: <?php //echo $select_all['allm']; ?> </td>
              </tr>
               <tr>
                <td>Today Invest Amount</td>
                <td>:&#x0e3f; <?php //echo number_format($total_deposits['amt'],8); ?> USD</td>
              </tr>  
			  <tr>
                <td>Total Payments Made  (&#x0e3f;)</td>
                <td>:&#x0e3f; <?php //echo number_format($paid_with['amt'],8); ?> </td>
              </tr>  
			  <tr>
                <td>Total Pending Withdrawals (USD)</td>
                <td>: <?php //echo number_format($pending_with['amt'],8); ?> </td>
              </tr>                 -->       
			 
            </tbody>
          </table>
          </p>
        
        
        </div>
      </div>
      
      
     
    </div> 
    <!-- half -->
    
    
    
    
    
    
 
    
    
    
    
    
    
 
    
    
    
    
    
    
    
    
    
    <!-- half -->
  </div>
  <!-- inner -->
</div>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>

    <script type="text/javascript">

      google.load('visualization', '1', {packages: ['corechart']});

    </script>

<script type="text/javascript">

      function drawVisualization() {

        // Create and populate the data table.

        var data = new google.visualization.DataTable();

        var raw_data = [[<?php echo $final_date; ?>],

                        ];

        

        var years = [<?php echo $final_days; ?>];

                        

        data.addColumn('string', 'Year');

        for (var i = 0; i  < raw_data.length; ++i) {

          data.addColumn('number', raw_data[i][0]);    

        }

        

        data.addRows(years.length);

      

        for (var j = 0; j < years.length; ++j) {    

          data.setValue(j, 0, years[j].toString());    

        }

        for (var i = 0; i  < raw_data.length; ++i) {

          for (var j = 1; j  < raw_data[i].length; ++j) {

            data.setValue(j-1, i+1, raw_data[i][j]);    

          }

        }

        

        // Create and draw the visualization.

        new google.visualization.ColumnChart(document.getElementById('visualization')).

            draw(data,

                 {title:" ", width:650, height:250,legend:'none', hAxis: {title: "Last Week"}, vAxis: {title: "No of Members Joined"}}

            );

      }

      



      google.setOnLoadCallback(drawVisualization);

    </script>

	

	  <script type="text/javascript">

      function drawVisualization() {

        // Create and populate the data table.

       /* var data = new google.visualization.DataTable();

        data.addColumn('string', 'x');

        data.addColumn('number', 'Cats');

        data.addColumn('number', 'Blanket 1');

        data.addColumn('number', 'Blanket 2');

        data.addRow(["A", 1, 1, 0.5]);

        data.addRow(["B", 2, 0.5, 1]);

        data.addRow(["C", 4, 1, 0.5]);

        data.addRow(["D", 8, 0.5, 1]);

        data.addRow(["E", 7, 1, 0.5]);

        data.addRow(["F", 7, 0.5, 1]);

        data.addRow(["G", 8, 1, 0.5]);

        data.addRow(["H", 4, 0.5, 1]);

        data.addRow(["I", 2, 1, 0.5]);

        data.addRow(["J", 3.5, 0.5, 1]);

        data.addRow(["K", 3, 1, 0.5]);

        data.addRow(["L", 3.5, 0.5, 1]);

        data.addRow(["M", 1, 1, 0.5]);

        data.addRow(["N", 1, 0.5, 1]);*/

        var data = new google.visualization.DataTable();

        var raw_data = [[<?php echo $final_amount; ?>],

                        ];

        

        var years = [<?php echo $final_days; ?>];

                        

        data.addColumn('string', 'Year');

        for (var i = 0; i  < raw_data.length; ++i) {

          data.addColumn('number', raw_data[i][0]);    

        }

        

        data.addRows(years.length);

      

        for (var j = 0; j < years.length; ++j) {    

          data.setValue(j, 0, years[j].toString());    

        }

        for (var i = 0; i  < raw_data.length; ++i) {

          for (var j = 1; j  < raw_data[i].length; ++j) {

            data.setValue(j-1, i+1, raw_data[i][j]);    

          }

        }

        // Create and draw the visualization.

        new google.visualization.LineChart(document.getElementById('visualization1')).

            draw(data, {curveType: "function", width: 650, height: 250, legand:'none', hAxis: {title: "Past seven Days"}, vAxis: {maxlength: 10, title: "Income (USD)"}}

                );

      }

      



      google.setOnLoadCallback(drawVisualization);

    </script>
