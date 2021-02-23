<div class="welcme_div">
          <!--     <h2>Our Investment Plans</h2> -->
			  
              <!--<table width="100%" border="0">
                <tr>
                  <td align="left" valign="top"><div class="box_div">
                      <h4>Silver</h4>
                      
                      
                      <div class="ratebg">
                      <ul>
                      	<li><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" width="50%"><p class="rate">Rate of <br/>Interest</p>
                              <h5>3.0%</h5></td>
    <td align="left" valign="top" width="50%"><p class="rate">package<br/> Tenure</p>
                              <h5>150 <sup>Days</sup></h5></td>
  </tr>
</table>
</li>
                      	<li><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" width="50%"><p class="rate">Cashout Term</p>
                              <h6>Daily</h6></td>
    <td align="left" valign="top" width="50%"><p class="principal_txt">Principal</p>
                              <h6 class="return_txt">Not <br/> Returned</h6></td>
  </tr>
</table>
</li>
                      </ul>
                      </div>
                      <h3><span>($/&euro;)</span> 500 - <b>1000</b></h3>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div></td>
                  <td align="left" valign="top"><div class="box_div">
                      <h4 class="boxbg2">diamond</h4>
                      <div class="ratebg">
                        <ul>
                      	<li><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" width="50%"><p class="rate">Rate of <br/>Interest</p>
                              <h5>3.0%</h5></td>
    <td align="left" valign="top" width="50%"><p class="rate">package<br/> Tenure</p>
                              <h5>150 <sup>Days</sup></h5></td>
  </tr>
</table>
</li>
                      	<li><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" width="50%"><p class="rate">Cashout Term</p>
                              <h6>Daily</h6></td>
    <td align="left" valign="top" width="50%"><p class="principal_txt">Principal</p>
                              <h6 class="return_txt">Not <br/> Returned</h6></td>
  </tr>
</table>
</li>
                      </ul>
                      </div>
                      <h3><span>($/&euro;)</span> 500 - <b>1000</b></h3>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div></td>
                  <td align="left" valign="top"><div class="box_div">
                      <h4 class="boxbg3">Platinum</h4>
                      <div class="ratebg">
                        <ul>
                      	<li><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" width="50%"><p class="rate">Rate of <br/>Interest</p>
                              <h5>3.0%</h5></td>
    <td align="left" valign="top" width="50%"><p class="rate">package<br/> Tenure</p>
                              <h5>150 <sup>Days</sup></h5></td>
  </tr>
</table>
</li>
                      	<li><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" width="50%"><p class="rate">Cashout Term</p>
                              <h6>Daily</h6></td>
    <td align="left" valign="top" width="50%"><p class="principal_txt">Principal</p>
                              <h6 class="return_txt">Not <br/> Returned</h6></td>
  </tr>
</table>
</li>
                      </ul>
                      </div>
                      <h3><span>($/&euro;)</span> 500 - <b>1000</b></h3>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div></td>
                  <td align="left" valign="top"><div class="box_div">
                      <h4 class="boxbg4">Affiliates</h4>
                      <div class="ratebg">
                        <ul>
                      	<li><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" width="50%"><p class="rate">Rate of <br/>Interest</p>
                              <h5>3.0%</h5></td>
    <td align="left" valign="top" width="50%"><p class="rate">package<br/> Tenure</p>
                              <h5>150 <sup>Days</sup></h5></td>
  </tr>
</table>
</li>
                      	<li><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" width="50%"><p class="rate">Cashout Term</p>
                              <h6>Daily</h6></td>
    <td align="left" valign="top" width="50%"><p class="principal_txt">Principal</p>
                              <h6 class="return_txt">Not <br/> Returned</h6></td>
  </tr>
</table>
</li>
                      </ul>
                      </div>
                      <h3><span>($/&euro;)</span> 500 - <b>1000</b></h3>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div></td>
                </tr>
              </table>-->
		<h3>test </h3>	  
			  
			  <table width="100%" border="0">
                <tr>
                
           <?php 
		   
			$fetch=mysql_query("select * from plan order by plan_id DESC LIMIT 0,3");
			
			$i=1;
			
			while($result=mysql_fetch_assoc($fetch))
			{
			
				$period = mysql_fetch_array(mysql_query("select * from pay_period where pay_period_id='".$result['period_type']."'"));
				
				$pay_period = $period['period'];
				
				$period_type = $result['period_type'];
				
				$iperiod_type = $result['iperiod_type'];
				
				if($i=='1')
				{
					$class = 'yellbx';
				}
				else if($i=='2')
				{
					$class = 'redbx';
				}
				else if($i=='3')
				{
					$class = 'greenbx';
				}
				// else if($i=='4')
				// {
				// 	$class = 'blackbx';
				// }
				// else
				// {
				// 	$class = 'greenbx';
				// }
				
				
				
			if($period_type == 1)
			{
				$periods_type=1;
				$periods_status='Days';
			}
			else if($period_type == 2)
			{
				$periods_type=7;
				$periods_status='Weeks';
			}
			else if($period_type == 3)
			{
				$periods_type=30;
				$periods_status='Months';
			}
			else if($period_type == 4)
			{
				$periods_type=365;
				$periods_status='Year';
			}
			else if($period_type == 5)
			{
				$periods_type=5;
				$periods_status='Hours';
			}
			else
			{
				$periods_type=1;
				$periods_status='Days';
			}
					
				
			if($iperiod_type == 1)
			{
				$iperiods_status='Days';
			}
			else if($iperiod_type == 2)
			{
				$iperiods_status='Weeks';
			}
			else if($iperiod_type == 3)
			{
				$iperiods_status='Months';
			}
			else if($iperiod_type == 4)
			{
				$iperiods_status='Year';
			}
			else if($iperiod_type == 5)
			{
				$iperiods_status='Hours';
			}
			else
			{
				$iperiods_status='Days';
			}					
				
			$pricipal_return = $result['release_status'];			
			if($pricipal_return == 'on')
			{
				$pricipal_return_status = 'Returned';
			}
			else
			{
				$pricipal_return_status = 'Not Returned';
			}
			if($result['period_type']=="1"){
          $period = Daily;
        }
        elseif ($result['period_type']=="2") {
           $period = Weekly;
        }
        elseif ($result['period_type']=="3") {
           $period = Monthly;
        }
        elseif ($result['period_type']=="4") {
           $period = Yearly;
        }
        elseif ($result['period_type']=="5") {
           $period = Hourly;
        }					
?>
                
                 <td align="left" valign="top"><div class="<?=$class;?>">
                  <div class="whline"><img src="images/whline.png" alt="line" /></div>
                      <h1><?php echo $result['plan_type']; ?> X</h1>                            
                      <ul>
		      <ul class="plist">
            		<li>XDuration : <?php echo $result['period']; ?> Days</li>
            		<li>Minimum Invest:: &#x0E3F;<?php echo number_format($result['spend_min_amount']); ?></li>
            		<li>Maximum Invest : &#x0E3F;<?php echo number_format($result['spend_max_amount']); ?></li>
            		<li>Interest : <?php echo $result['max_interest']; ?>% </li>
            		<li>Interest paid : <?php echo $period; ?></li>
            	      </ul>
                      
<!--                       
                      <div class="ratebg">
                      <ul>
                      	<li><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td align="left" valign="top" width="50%"><p class="rate">Rate of <br/>Interest</p>
                              <h5><?php echo $result['max_interest']; ?>%</h5></td>
			    <td align="left" valign="top" width="50%"><p class="rate">package<br/> Tenure</p>
                              <h5><?php echo $result['period']; ?> <sup><?php echo $iperiods_status; ?></sup></h5></td>
			  </tr>
			</table>
			</li>
                      	<li><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td align="left" valign="top" width="50%"><p class="rate">Cashout Term</p>
                              <h6><?php echo $periods_status;?></h6></td>
				    <td align="left" valign="top" width="50%"><p class="principal_txt">Principal</p>
                              <h6 class="return_txt"><?php echo $pricipal_return_status;?></h6></td>
			  </tr>
			</table>
			</li>
                      </ul>
                      </div>
                      <h3><span>($)</span>
					   <span style="font-size:13px;"><?php echo number_format($result['spend_min_amount']); ?></span> -
					   <b style="font-size:13px;"><?php echo number_format($result['spend_max_amount']); ?></b></h3>                     
                    </div> -->
                 </td>                    
           <?php
		   $i++;
		}
 	?>                 
                </tr>
              </table>
			  
            </div>
