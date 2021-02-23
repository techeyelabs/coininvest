<?php
 if(!in_array("Financials",$permission)) 
 {  
	 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
	 exit(); 
 }
 




?><!--Content Portion Start-->

<div id="primary_right">
                <div class="inner" style="width:900px">
                <?php require 'include/top/coin_sell_management.php'; ?>
                <?php require 'include/page1.php'; ?>

			 <!-- end dashboard items -->
					<hr />
                   <h1>Coin Sells Details</h1>

                    <form id="frm" name="frm" method="get" action="transactions.php">
                   <table class="normal tablesorter fullwidth">                
                   <tbody>
                       <tr><td><b>Search</b></td>
                       <td>
                        <input type="text" value="User Name" onfocus="if(this.value=='User Name') this.value='';" onblur="if(this.value=='') this.value='User Name';" name="username">
                       </td>
                      <td>
                        <input type="text" value="Transaction ID" onfocus="if(this.value=='Transaction ID') this.value='';" onblur="if(this.value=='') this.value='Transaction ID';" name="transid">
                    </td><td>
                     <select name="transtype" style="height:28px;">
                    <option value="Type" selected="selected">--Type--</option>
                    <option value="deposit">Deposit</option>
                    <option value="bonus">Bonus</option>
                     <option value="earning">Earnings</option>
                      <option value="withdrawal">Withdraw</option>
                       <option value="commissions">Commissions</option>
                        <option value="withdraw_pending">Withdraw Pendings</option>
                         <option value="intrest_earned">Interest Earned</option>
                    </select>
               </td>
                  <td>
                    <input type="text" value="Payment Method" onfocus="if(this.value=='Payment Method') this.value='';" onblur="if(this.value=='') this.value='Payment Method';" name="paymethod">
               </td>
               </td>
               <td><input type="submit" id="search" value="Search" name="search"></td>
                    </tr></tbody></table>                    </form>
                     <?php
                     
                        if(isset($_GET['ps']))
                        {
                            $rowID = $_GET["ps"];
                            mysql_query("update coin_sell set status='10' where id=".$rowID."");
                        }
                     
                     
							if(isset($_GET['search']))
							{
								if(trim($_GET['username']) != 'User Name')
								{
									$username = trim($_GET['username']);
								}
								else
								{
									$username = '';
								}
							}
							$sql = "select * from coin_sell where id != ''";
							$query =  $sql ;
							$total_pages = mysql_num_rows(mysql_query($query));
							$limit = 25; 	
							if(isset($_GET['page']))
							{
								$page = intval(trim($_GET['page']));
							}
							else
							{
								$page = 1;
							}
							if($page) 
								$start = ($page - 1) * $limit; 	
							else
								$start = 0;	


							$select_company = mysql_query($sql);
							$query = $query." order by id desc limit $start, $limit";
							$select_company = mysql_query($query);
							//$link=$_SERVER['PHP_SELF'];

							$link='http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'?username='.$_GET['username'].'&transid='.$_GET['transid'].'&transtype='.$_GET['transtype'].'&paymethod='.$_GET['paymethod'].'&search='.$_GET['search'].'&page=';
							$paging=newpage($page,$total_pages,$limit,$link);
							echo $paging;
					 ?>
             <table width="889" height="92" class="normal tablesorter fullwidth">
				<thead>
			     <tr>
				 <th width="14%"><strong>Full Name</strong></th>
                  <th width="14%"><strong>Email</strong></th>
                  <th width="15%" ><strong>Phone</strong></th>
                  <th width="15%"><strong>Address</strong></th>
                  <th width="19%" ><strong>Post Code</strong></th>
				   <th width="14%" ><strong>Amount</strong></th>
				   <th width="14%" ><strong>Status</strong></th>
                    <th width="10%" ><strong>Date</strong></th>
                    <th width="10%" ><strong>Delivery Status</strong></th>
                </tr>
				</thead>
				<tbody>
                  <?php
					//$select_company = mysql_query("select * from history LIMIT $offset, $rowsPerPage");
						if(mysql_num_rows($select_company) > 0)
						{
						    $i = 0;
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
        						
        						if($fetch['status'] == 5){
        						    $del_link =   '<a href="coin_sells.php?ps='. $fetch['id']  .'"><b>MAKE DELIVERY</b></a>';
        						}else{
        						     $del_link = "<b>DELIVERED</b>";   
        						}
						
                                $out.='<tr class="'.$class.'">
                                            <td>'.utf8_decode(urlencode($fetch['full_name'])).'</td>
                				            <td>'.$fetch['email'].'</td>
                                            <td>'.$fetch['phone'].'</td>
                                            <td>'.utf8_decode(urlencode($fetch['address'])).'</td>
                                            <td>'.$fetch['post_code'].'</td>
                				            <td>'.$fetch['amount'].'</td>
                				            <td>'. $fetch['pay_status'].'</td>
                				            <td>'.$fetch['pay_time'].'</td>
                				            <td>'. $del_link .'</td>
                                        </tr>';
				            }
			            }
			            else
			            {
				            $out='<tr ><td colspan="4">No Records found</td></tr>';
			            }
			            echo  $out;
		?>
       </tr></tbody></table>
     <div class="clearboth"></div>

</div> <!-- inner -->

</div>

<!--Content Portion End-->

<!--Content Portion End-->
