<?php
 if(!in_array("Financials",$permission)) 
 {  
     echo '<meta http-equiv="refresh" content="0; url=home.php" />';
     exit(); 
 }
 error_reporting(1);
 if(!in_array("User",$permission)) 
 { 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit(); 
 }
 require 'include/page1.php'; 
 ?>
 
 
<div id="primary_right">
    <div class="inner" style="width:900px">
	  <?php require 'include/top/user.php';?>
	<?php
 	$userID = trim($_GET['userid']);
	$user_sql = mysql_fetch_array(mysql_query("select * from members where member_id=". $userID ));
//	print_r($user_sql);
	$userDet = $user_sql['username'];
	?><h1>View  <?php	echo ucfirst($userDet); ?> Reffered Users</h1>
  <?php 
  if($_SESSION['success_flag']) { 
	?>

	 <div class="notification success"> 
		<span></span> 
		<div class="text"> 
			<p>
			    <strong>Success!</strong> 
			<?php 
			echo $_SESSION['success_flag']; 
			$_SESSION['success_flag']=''; 
			?> 
			</p> 
		</div> 
	  </div>
	  
    <?php
    } 
    ?>
 
 
     <div>           
<?php
	 //print_r($_GET['act']);
		$cur_link = $_SERVER['PHP_SELF'].'?act='.$_GET['act'];
	if($_SESSION['success_flag'] != '')
	{ 
		echo '<div class="notification success"> 
				<span></span> 
				<div class="text"> 
					<p><strong>Success!</strong>'.$_SESSION['success_flag'].'</p> 
				</div> 
			 </div>';
	} 
?>

 <table class="normal fullwidth table table-striped table-hover table-bordered"  ><tbody> 
<thead>
	<tr>
	    <th width="102" nowrap="nowrap"><strong>User </strong></th>						
		<th width="75" nowrap="nowrap"><strong>Level</strong></th>
		<th width="98"  nowrap="nowrap"><strong>Deposit</strong></th>
		<th width="98"  nowrap="nowrap"><strong>Active Deposit</strong></th>
		<th width="98"  nowrap="nowrap"><strong>Withdrawal</strong></th>
	</tr>
</thead> 

<?php

function getTotalActiveDeposit($n,$level)
{
    static $totalActiveDeposit = 0;
    $id="intro_id 	";
     $sql_one = "select * from members where ".$id."=".$n;
	$result_one = mysql_query($sql_one);
    while($row_one = mysql_fetch_array($result_one))
	{			
		$mem_mmm = $row_one["member_id"];
		$total_deposit = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where member_id = ".$mem_mmm." and status='active'"));
		$totalActiveDeposit += $total_deposit['amt'];
		getTotalActiveDeposit($row_one["member_id"],$level);
	}
	return $totalActiveDeposit;
}


function getTotalWithdrawDeposit($n,$level) 
{
    static $totalWithdralDeposit = 0;
    $id="intro_id 	";
     $sql_one = "select * from members where ".$id."=".$n;
	$result_one = mysql_query($sql_one);
    while($row_one = mysql_fetch_array($result_one))
	{			
		$mem_mmm = $row_one["member_id"];
		$total_deposit = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where user_id = ".$mem_mmm." and type='withdrawal'"));
		$totalWithdralDeposit += $total_deposit['amt'];
		getTotalWithdrawDeposit($row_one["member_id"],$level);
	}
	return $totalWithdralDeposit;
}


?>



<?php 
                            function getTotalDeposit($n,$level)
                            {
                                static $totalDeposit = 0;
                                $id="intro_id 	";
                                $sql_one = "select * from members where ".$id."=".$n;
                            	$result_one = mysql_query($sql_one);
                                while($row_one = mysql_fetch_array($result_one))
                            	{			
                            		$mem_mmm = $row_one["member_id"];
                            		$total_deposit = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where member_id = ".$mem_mmm));
                            		$totalDeposit += $total_deposit['amt'];
                            		getTotalDeposit($row_one["member_id"],$level);
                            	}
                            	return $totalDeposit;
                            }
                              
                            

							function getlist($n,$level)
							{
								static $count = 0;
								static $totalDeposit = 0;
								$id="intro_id 	";
								
								$sql = "select * from members where ".$id."=".$n;
								$result = mysql_query($sql);
								if(mysql_num_rows($result)==0)
									$level--;
								else
									$level++;
									
								if($level == 0) 
								$level = 1;								 
								
								$total_active_deposit_amount = [];
								$total_withdraw_deposit_amount = [];
								while($row = mysql_fetch_array($result))
								{								
									if($level <= 8)
									{
										$count++;
										$name = $row["username"];	
										$fname=$row['first_name'];
										$mail = $row["mail_id"];
										$mem_mmm = $row["member_id"];
										
										$total_deposit = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where member_id = ".$mem_mmm));
										$total_active_deposit = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where member_id = ".$mem_mmm."  and status='active'"));
										$total_withdraw_deposit = mysql_fetch_array(mysql_query("select sum(amount) as amts from history where user_id = ".$mem_mmm."  and type='withdrawal'"));
										
										for($j=1;$j<=$level*3;$j++) 
										echo "";
										
										
										echo "<tr >";
										echo "<td style='font-size:14px;text-align:left;'>".$name."</td>";
										echo "<td style='font-size:14px;text-align:left;'>".$level."</td>";
								
									    //$totalDeposit += $total_deposit['amt'];
										echo "<td style='font-size:14px;text-align:left;'><b>&#x0e3f;". number_format($total_deposit['amt'],8)  ."</b></td>";
										echo "<td style='font-size:14px;text-align:left;'><b>&#x0e3f;". number_format($total_active_deposit['amt'] , 8) ."</b></td>
										<td style='font-size:14px;text-align:left;'><b>&#x0e3f;". number_format($total_withdraw_deposit['amts'],8) ."</b></td>";
										echo "</tr>";
										
										
									//	echo "<tr><th>Total Deposit: &#x0e3f;". $totalDeposit  ." </th></tr>";
														
										getlist($row["member_id"],$level);
									}
								}
								return $count;
							}
				
						$memid = trim($_GET['userid']); //$_SESSION['userid']; 
						$count = getlist($memid ,0);	
						
						//echo  'CO:'. $total_active_deposit_amount;
						
						
						
						?>                 
<tr>
     <th>&nbsp;</th>
    <th align="left">Total Deposit:<?php echo  number_format(getTotalDeposit($memid , 0)    ,8); ?></th>
    <th align="left">Total Active:<?php echo  number_format( getTotalActiveDeposit($memid,0) ,8); ?></th>
    <th align="left">Total Withdraw:<?php echo  number_format( getTotalWithdrawDeposit($memid,0) ,8); ?></th>
</tr>
          
  </tbody>
         </table>
          
    
  
<div class="clearboth"></div>
</div> <!-- inner -->
</div>
       

