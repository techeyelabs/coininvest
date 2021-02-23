<!--Content Portion Start-->
<div id="primary_right">

			
                <div class="inner" style="width:900px">

<?php require 'include/top/financial_management.php'; ?>
 <? require 'include/page1.php'; ?>
					 <!-- end dashboard items -->

					<hr />
                    <h1>Transactions Details</h1>
                                          
                     <form id="frm" name="frm" method="get" action="../Desktop/transactions.php">
                   
                   <table class="normal tablesorter fullwidth">
                    <tbody><tr>
                    <td><b>Search</b></td>
                    <td>
                    <input type="text" value="User Name" onfocus="if(this.value=='User Name') this.value='';" onblur="if(this.value=='') this.value='User Name';" name="username">
                    
               </td>
                                   <td>
                    <input type="text" value="Transaction ID" onfocus="if(this.value=='Transaction ID') this.value='';" onblur="if(this.value=='') this.value='Transaction ID';" name="transid">
                    
               </td>
               
                 <td>
                    <input type="text" value="Type" onfocus="if(this.value=='Type') this.value='';" onblur="if(this.value=='') this.value='Type';" name="transtype">
                    
               </td>
               
                  <td>
                    <input type="text" value="Payment Method" onfocus="if(this.value=='Payment Method') this.value='';" onblur="if(this.value=='') this.value='Payment Method';" name="paymethod">
                    
               </td>
               
               
                         <!-- <td>
                 <select name="paymethod">
                    <option value="0">Payment Method</option>
                   <option value="7">AlertPay</option>
                   <option value="8">Liberty Reserve</option>
                   <option value="11">Perfect Money</option>
                   <option value="12">Reinvestment</option>
                   </select>
                    
               </td>
                            
               
                <td>
                   <select id="transtype" name="transtype">
                   <option value="0" selected="">Transaction Type</option>
                   <option value="deposit">Deposit</option>
                   <option value="bonus">Bonus</option>
                  <option value="withdrawal">Withdrawal</option>
                    <option value="intrest_earned">Interest Earned</option>
                    
                   </select>-->
                    
               </td>
               
               <td><input type="submit" id="search" value="Search" name="search"></td>
                    </tr></tbody></table>
                   
                    </form>
                     <?php
				//$select_company = mysql_query("select * from history");
							$sql = "select * from history";
							$query =  $sql;
							$total_pages = mysql_num_rows(mysql_query($query));
								
							$limit = 10; 	
							if(isset($_GET['page']))
							{
								$page=intval(trim($_GET['page']));
							}
							else
							{
								$page=1;
							}
							if($page) 
								$start = ($page - 1) * $limit; 		
							else
								$start = 0;	
								
							$select_company = mysql_query($sql);
								
							$query = $query." LIMIT $start, $limit";
							$select_company = mysql_query($query);
								
							//$link=$_SERVER['PHP_SELF'];
							$link='http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'?page=';
							
							$paging=newpage($page,$total_pages,$limit,$link);
							echo $paging;
							
					
						
					 ?>
                     
                      
                     <table width="889" height="92" class="normal tablesorter fullwidth">
                  
						<thead>

			     <tr>
				 <th width="14%"><strong>Transaction Id</strong></th>
                  <th width="14%"><strong>Date</strong></th>
                  <th width="15%" ><strong>User Name</strong></th>
                  <th width="15%"><strong>Amount</strong></th>
                  <th width="19%" ><strong>Descriptions</strong></th>
				   <th width="14%" ><strong>Payment Gateway</strong></th>
                    <th width="10%" ><strong>Batch Number</strong></th>
                
                </tr>

						</thead>
						<tbody>
    
                  <?php
				  
				 
				  
					//$select_company = mysql_query("select * from history LIMIT $offset, $rowsPerPage");
					
										
						if(mysql_num_rows($select_company) > 0)
						{
						$i=0;
						while($fetch = mysql_fetch_array($select_company))
						{
					
						$company=mysql_fetch_array(mysql_query("select * from members where member_id=".$fetch['user_id']));
						
						$payment=mysql_fetch_array(mysql_query("select * from payment_process where payment_id=".$fetch['payment_thro']));
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
						
			if(isset($_GET['search']))
						{
								if(trim($_GET['username']) != 'User Name')
								{
									$username=trim($_GET['username']);
								}
								else
								{
									$username='';
								}
								
								if(trim($_GET['transid']) != 'Transaction ID')
								{
									$transid=trim($_GET['transid']);
								}
								else
								{
									$transid='';
								}
								
								if(trim($_GET['transtype']) != 'Type')
								{
									$transtype=trim($_GET['transtype']);
								}
								else
								{
									$transtype='';
								}
								
								if(trim($_GET['paymethod']) != 'Payment Method')
								{
									$paymethod=trim($_GET['paymethod']);
								}
								else
								{
									$paymethod='';
								}
								
								
								if($username != '')
								{									 
									$addsql.=" AND member_id='".$username."'";
								}
								if($transid != '')
								{
									$addsql.=" AND transaction_id ='".$transid."'";
								}
								if($paymethod != '')
								{
									$addsql.=" AND payment_thro ='".$paymethod."'";
								}
								if($transtype != '')
								{
									$addsql.=" AND type ='".$transtype."'";
								}
							}			
			
                  
               $out.='<tr class="'.$class.'"><td>'.$fetch['transaction_id'].'</td>
				<td>'.$fetch['date'].'</td>
                  <td >'.ucfirst($company['username']).'</a></td>
                  <td >'.$fetch['amount'].'</td>
                  <td >'.$fetch['description'].'</td>
                   <td>'.$payment['payment_name'].'</td>
				     <td>'.$payment['reference_number'].'</td>
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