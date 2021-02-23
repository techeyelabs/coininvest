<div id="primary_right">
  <div class="inner">
    <h1>Dashboard Elements</h1>
	<?
		if($_SESSION['aid'] == 1)
		{
	?>
    <ul class="dash">
	 <li class="fade_hover tooltip" title="Manage Users "> 
     
     <a href="user.php?status=active"> <img src="assets/icons/dashboard/54.png" alt="" /> <span>Users</span> </a>
      </li>
      <li class="fade_hover tooltip" title="Write a Contents">
       <a href="cms.php?id=1"> <img src="assets/icons/dashboard/2.png" alt="" /> <span>CMS</span> </a>
       </li>
     
      <li class="fade_hover tooltip" title="Plans"> 
      <a href="plans.php"> <img src="assets/icons/dashboard/81.png" alt="" /> <span>plans</span> </a> 
      </li>
      <li class="fade_hover tooltip" title="Manage your Site Settings">
      <a href="site_settings.php"> <img src="assets/icons/dashboard/21.png" alt="" /> <span>Site Settings</span> </a>
       </li>
     
    <!--  <li class="fade_hover tooltip" title="Manage your Member Plan Settings"> 
      <a href="#"> <img src="assets/icons/dashboard/42.png" alt="" /> <span>Members Plan</span> </a> 
      </li>
      <li class="fade_hover tooltip" title="Manage your Auto Responder Page">
       <a href="#"> <img src="assets/icons/dashboard/27.png" alt="" /> <span>Auto Responder</span> </a> 
       </li>-->
    
       
    
         <li class="fade_hover tooltip" title="end Mail to Your Users">
      <a href="send_letter.php"> <img src="assets/icons/dashboard/75.png" alt="" /> <span>Send Mail</span> </a>
       </li>
       
       
        
      <li class="fade_hover tooltip" title="View your Transactions"> 
      <a href="transactions.php"> <img src="assets/icons/dashboard/123.png" alt="" /> <span>Transactions</span> </a>
       </li>
      
      
      <li class="fade_hover tooltip" title="Manage your Payouts Management">
	<a href="withdraw.php?act=paid"> <img src="assets/icons/dashboard/80.png" alt="" /> <span>Payouts</span> </a>
     </li>
      <li class="fade_hover tooltip" title="Manage your Promotional Tools">
      <a href="promotional.php"> <img src="assets/icons/dashboard/18.png" alt="" /> <span>Promotional</span> </a>
       </li>

      <li class="fade_hover tooltip dialog_link" title="Close your Sessions">
       <a href="logout.php"> <img src="assets/icons/dashboard/118.png" alt="" /> <span>Logout</span> </a>
        </li>
    </ul>
	<?
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
    <h1>Alerts</h1>
    
    <table class="normal tablesorter fullwidth" > 
      <thead>
        <tr>
          <th>Time Stamp</th>
          <th>Username</th>
          <th>Description</th>
          <th>Amount (USD)</th>
        
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
             <tr class="<?=$class; ?>">
          <td><?=$fetch['date']; ?></td>
          <td><?=ucfirst($company['username']); ?></td>
          <td><?=$fetch['description']; ?></td>
          <td>$ <?=number_format($fetch['amount'],2);  ?></td>
         
        </tr>
         <?
				
				}
			}
			else
			{
				 echo '<tr ><td colspan="4">No Records found</td></tr>';
			}
				?>
        
      </tbody>
    </table>
	<?
		if($_SESSION['aid'] == 1)
		{
	?>
    <div align="right"><a href="transactions.php" target="_blank" class="button_link" >View More</a></div>
	<?
	}
	?>
    <hr />
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
    
	
    <div class="one_half column">
	<hr />
    <h1>Statistics</h1>
      <div class="portlet">
        <div class="portlet-header">MEMBER STATISTICS</div>
        <div class="portlet-content" style="display: block;">
          <?PHP
						
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

						
$total_deposits = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='deposit'"));
						

						$pending_with = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='withdraw_pending'"));

						

						$paid_with = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='withdrawal'"));

						

						$deposit_with = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit"));

						

						

						$balance = $deposit_with['amt'] - ($pending_with['amt'] + $paid_with['amt']);
						?>
          <p>
          <!--<table class="normal tablesorter fullwidth" style="height:330px">
            <tbody>
              <tr>
                <td>Total Members</td>
                <td>: <?=$select_all['allm']; ?> </td>
              </tr>
                                              
			  <tr>
                <td>Total Active Members</td>
                <td>: <?=number_format($select_active['acti']); ?> </td>
              </tr>
			  <tr>
                <td>Total Suspended Members</td>
                <td>: <?=number_format($select_susp['sus']);?> </td>
                                
              </tr>
			  <tr>
                <td>Today's Registered Members</td>
                <td>: <?=number_format($select_date['reg']); ?> </td>
              </tr>
			  <tr>
                <td>Today Income</td>
                <td>: <?=number_format($history_date['incodate'],2); ?> USD</td>
              </tr>
			  <tr>
                <td>Monthly Income (USD)</td>
                <td>: <?=number_format($history['inco'],2); ?> USD</td>
              </tr>
              
                <tr>
                <td>Total Pending Withdrawals (USD)</td>
                <td>: <?=number_format($pending_with['amt'],2); ?> USD</td>
              </tr>
              
               <tr>
                <td>Total Payments Made  (USD)</td>
                <td>: <?=number_format($paid_with['amt'],2); ?> USD</td>
              </tr>
              
               <tr>
                <td>Total Balance Available (USD)</td>
                <td>: <?=number_format($balance,2); ?> USD</td>
              </tr>
              
           
			  
            </tbody>
          </table>-->
		  <table class="normal tablesorter fullwidth" style="height:330px">
            <tbody>
			<tr>
                <td>Today's Registered Members</td>
                <td>: <?=number_format($select_date['reg']); ?> </td>
              </tr>
              <tr>
                <td>Total Members</td>
                <td>: <?=$select_all['allm']; ?> </td>
              </tr>
               <tr>
                <td>Today Invest Amount</td>
                <td>: <?=number_format($total_deposits['amt'],2); ?> USD</td>
              </tr>  
			  <tr>
                <td>Total Payments Made  (USD)</td>
                <td>: <?=number_format($paid_with['amt'],2); ?> USD</td>
              </tr>  
			  <tr>
                <td>Total Pending Withdrawals (USD)</td>
                <td>: <?=number_format($pending_with['amt'],2); ?> USD</td>
              </tr>                        
			 
            </tbody>
          </table>
          </p>
        
        
        </div>
      </div>
    </div>
    <!-- half -->
    <!-- half -->
    <div class="one_half last column">
	<hr />
    <h1>Last 10 Members</h1>
      <div class="portlet">
        <div class="portlet-header">RECENT MEMBERS</div>
        <div class="portlet-content" style="display: block;">
          <p>
          <table class="normal tablesorter fullwidth">
            <thead>
              <tr>
                <th><strong>Name</strong></th>
                <th><strong>Time Stamp</strong></th>
              </tr>
            </thead>
            <tbody>
              <?php

			$seelct_last = mysql_query("SELECT * FROM `members` ORDER BY `members`.`date_of_join` DESC LIMIT 0 , 10 ");
			if(mysql_num_rows($seelct_last) > 0)
			{
					while($fetch_rec = mysql_fetch_array($seelct_last))
					{
			
					  echo '<tr>
						<td>'. $fetch_rec['first_name'].'</td>
						<td>'.$fetch_rec['date_of_join'].'</td>
					  </tr>';
					  
			  }
			}
			else
			{
				echo '<tr>
                <td colspan="3">No users Found.</td>
             
            	</tr>';
			}
			   ?>
            </tbody>
          </table>
          </p>
        </div>
      </div>
    </div>
    <!-- half -->
	
    <div class="one_half  column">
	<hr />
    <h1>News</h1>
      <div class="portlet">
        <div class="portlet-header">SITE NEWS</div>
        <div class="portlet-content" style="display: block;">
        <table class="normal tablesorter fullwidth">
            <thead>
              <tr>
                <th><strong>Sno</strong></th>
                <th><strong>Title</strong></th>
                <th><strong>News</strong></th>
                 <th><strong>Date</strong></th>
              </tr>
            </thead>
            <tbody>
            
          <?php
							  	$select_news = mysql_query(" SELECT * FROM `news` ORDER BY `news`.`dt` ASC LIMIT 0 , 4 ");
								$newsout='';
								if(mysql_num_rows($select_news) > 0)
								{
								
									 
								$i=0;
								while($fetch_rec11 = mysql_fetch_array($select_news))
								{
											$i++;
									
										$newsout.='<tr>
										<td>'.$i.'</td>
										<td>'.$fetch_rec11['news_header'].'</td>
										<td>'.substr($fetch_rec11['news_description'],0,15).'...</td>
										<td>'.$fetch_rec11['dt'].'</td>
										</tr>';
             
			   
								}
			   $newsout.='</tbody>
          </table><div align="right"><a href="news.php" class="button_link" >View More</a></div><br />';
			}
			else
			{
				$newsout.='<tr>
                <td colspan="3">No News Found.</td>
             
            	</tr></tbody>
          </table>';
			}
			
			echo $newsout;
						
								?>
        </div>
      </div>
    </div>
    <!--<div class="one_half last  column">
	<hr />
    <h1>UTILITIES</h1>
      <div class="portlet">
        <div class="portlet-header">UTILITIES</div>
        <div class="portlet-content" style="display: block;">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                <tr>

                                  <td align="left" class="utility_link"><a href="news.php">News Management</a></td>

                                </tr>

                                <tr>

                                  <td align="left" class="utility_link"><a href="site_settings.php">Site Settings</a></td>

                                </tr>

                                <tr>

                                  <td align="left" class="utility_link"><a href="cms.php?id=1">Manage Contents</a></td>

                                </tr>

                                <tr>

                                  <td align="left" class="utility_link"><a href="transactions.php">Transactions</a></td>

                                </tr>

                              </table>
        </div>
      </div>
    </div>-->
    
    <div class="one_half last column">
	<hr />
    <h1>Frequently Asked Questions</h1>
      <div class="portlet">
        <div class="portlet-header">FAQ</div>
        <div class="portlet-content" style="display: block;">
          <p>
          <table class="normal tablesorter fullwidth">
            <thead>
              <tr>
                <th><strong>Sno</strong></th>
                <th><strong>Questions</strong></th>
                <th><strong>Answer</strong></th>
              </tr>
            </thead>
            <tbody>
              <?php
			$seelct_last111 = mysql_query("SELECT * FROM `faq` LIMIT 0 , 10");
			
			if(mysql_num_rows($seelct_last111) > 0)
			{
				$out='';
				 $out.=' <tbody>';
				$i=0;
				while($fetch_rec11 = mysql_fetch_array($seelct_last111))
				{
				$i++;
		
             	$out.='<tr>
                <td>'.$i.'</td>
                <td>'.$fetch_rec11['question'].'</td>
                <td>'.substr($fetch_rec11['answer'],0,15).'...</td>
            	</tr>';
             
			   
			   }
			   $out.='</tbody>
          </table><div align="right"><a href="faq.php" class="button_link" >View More</a></div><br />';
			}
			else
			{
				$out.='<tr>
                <td colspan="3">No FAQ Found.</td>
             
            	</tr></tbody>
          </table>';
			}
			echo $out;
			   ?>
            
        
          <br>
          </p>
        </div>
      </div>
    </div>
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

        var raw_data = [[<?=$final_date; ?>],

                        ];

        

        var years = [<?=$final_days; ?>];

                        

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

        var raw_data = [[<?=$final_amount; ?>],

                        ];

        

        var years = [<?=$final_days; ?>];

                        

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