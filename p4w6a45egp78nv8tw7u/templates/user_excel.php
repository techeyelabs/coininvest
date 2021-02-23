<?


header("Content-type: application/vnd-ms-excel");
 

header("Content-Disposition: attachment; filename=user-export.xls");

?>


<table border="1">
    <tr>
    	
		<th>USER NAME</th>
		<th> Email Id</th>
 		<th >Name</th>
  		<th>Country</th>
 		<th>Sponsor Name </th>
 		<th >Total Deposit</th>
 		<th>Member Since</th>



	</tr>
	<?php

	mysql_connect("localhost", "root", "admin"); 
	mysql_select_db("HYIPNPAY");
			



	
	$sql = mysql_query("SELECT * FROM members ORDER BY member_id ASC");
	
		$i=0;
					if(mysql_num_rows($sql) > 0)
					{
					while($fetch = mysql_fetch_array($sql))
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

				$country = mysql_fetch_array(mysql_query("select * from country_master where country_id=".$fetch['country']));

				$select_spon=mysql_fetch_array(mysql_query("select * from members where member_id=".$fetch['intro_id']));
	
				$total_earning_query="select sum(amount) as tot_earnings from history where user_id=".$fetch['member_id']." and (type='intrest_earned' or type='bonus' or type='commissions' or type='release_deposit' or type='internal_transaction_receive')";

						$total_earning_result=mysql_query($total_earning_query);

						$total_earning_row=mysql_fetch_array($total_earning_result);

						$total_earnings=$total_earning_row['tot_earnings'];

					

						if(!$total_earnings) { $total_earnings=0; }

					

						$tesql="select sum(amount) as total_with from history where user_id=".$fetch['member_id']." and (type='withdrawal' or type='withdraw_pending' or type='penality') order by type";

						$teres=mysql_query($tesql);

					

						if(mysql_num_rows($teres)>0)

						{

							$terow=mysql_fetch_array($teres);

							$total_withdraw=$terow['total_with'];

						}

						else

						{

							$total_withdraw=0;

						}

						

						$available = number_format($total_earnings - $total_withdraw,2);


						$total_deposit=mysql_fetch_array(mysql_query("select sum(amount) as tot_deposit from deposit where member_id=".$fetch['member_id']));

						$total_deposit = $total_deposit['tot_deposit'];

						if(!$total_deposit) $total_deposit =0;

				//$total_deposit = $total_deposit['tot_deposit'];
	
?>
	      <tr>
                <td><?=$fetch['username']; ?></td>
                <td><?=$fetch['member_email']; ?></td>
               <td ><?=$fetch['first_name']."&nbsp;".$fetch['last_name'];?></td>
                                
       
                <td><?=$country['country'];?></td>
       			<td><?=$select_spon['username'];?></td>
                                
	  <td><?='$'.number_format($total_deposit,2)."USD";?></td>

				   <td ><?=$fetch['date_of_join'];?></td>
               
               
<?
				
				}
				
					} else {
				?>
                 <tr class="odd">
                  <td valign="top" align="center" colspan="7">No Records Found</td>
                  </tr>
                <?
				}
				?>
         


</table>


</form>

