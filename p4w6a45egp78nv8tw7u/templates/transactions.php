<?php
 if(!in_array("Financials",$permission)) 
 {  
	 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
	 exit(); 
 }
	if(isset($_POST['excel']) && $_POST['excel'] == 1 )
	{
		$exportuserids='';				
		$sql =mysql_query("select * from history where user_id != '' and  user_id!='0'");	

		$exceloutput='<table width="1%" border="1" >				
		<tr>
                           <th width="14%"><strong>Transaction Id</strong></th>
                		  <th width="14%"><strong>Date</strong></th>
                	  <th width="15%" ><strong>User Name</strong></th>
                	  <th width="15%"><strong>Amount(&#x0E3F;)</strong></th>
					   <th width="19%" ><strong>Descriptions</strong></th>
					   <th width="14%" ><strong>Payment Gateway</strong></th>
               		     <th width="10%" ><strong>Batch Number</strong></th>                               
							</tr>';
		if(mysql_num_rows($sql) > 0)
		{
			while($data=mysql_fetch_assoc($sql))
			{				
			$company=mysql_fetch_array(mysql_query("select * from members where member_id=".$data['user_id']));
			$payment=mysql_fetch_array(mysql_query("select * from payment_process where payment_id=".$data['payment_thro']));
			
			$exceloutput.='<tr><td>'.$data['transaction_id'].'</td>
				<td>'.$data['date'].'</td>
	                        <td >'.ucfirst($company['username']).'</td>
             		        <td >&#x0E3F;'.$data['amount'].'</td>
                                <td >'.$data['description'].'</td>
                                <td>'.$payment['payment_name'].'</td>
		                <td>'.$payment['reference_number'].'</td></tr>';
		}
	}else{
		 $exceloutput.=' <tr>
    <td class="alert_stxt" valign="top" align="center" colspan="7">No Records Found</td>
    </tr>';

			}

			$exceloutput.='</table>';

			

			$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
				$sitename=$sitename['set_value'];


			 $filename = $sitename."_transactiondetails_" .date('Ymd') .".xls"; 

			  file_put_contents($filename, $exceloutput);

			 echo '<meta http-equiv="refresh" content="0;url=' . $filename . '"';
				
			

	}




?><!--Content Portion Start-->

<div id="primary_right">



			

                <div class="inner">


<?php require 'include/top/financial_management.php'; ?>

 <? require 'include/page1.php'; ?>

					 <!-- end dashboard items -->



					<hr />

                    <h1 style="color:#fff" >Transactions Details</h1>
                    
                 <?php /* ?>   <?php 				
		
								echo '<div align="right">
								 <form name="frm1" method="post" action="transactions.php">
								<input type="image"  border="0" style="border-width:0px;" src="assets/images/excel.jpeg" name="excelexport" id="excelexport" />
						
								<input type="hidden" name="excel" value="1" />
						
							   </div>';


		?>
        <?php */?>
        
        
        
        <!-- excel hide
        <div align="right">

    <form name="frm1" method="post" action=""> 

		<input type="image"  border="0" style="border-width:0px;" src="assets/images/excel.jpeg" name="excelexport" id="excelexport" />

		<input type="hidden" name="excel" value="1" />

        </form>

       </div> -->
        
        
        
        
        
        

                    <form id="frm" name="frm" method="get" action="transactions.php">

                   

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

                    <!--<input type="text" value="Type" onfocus="if(this.value=='Type') this.value='';" onblur="if(this.value=='') this.value='Type';" name="transtype">-->

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

               

               <td><input style="color:#888" type="submit" id="search" value="Search" name="search"></td>

                    </tr></tbody></table>

                   

                    </form>

                    

                                          

                     

                     <?php

				//$select_company = mysql_query("select * from history");

				

				

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

									$user_id = mysql_fetch_array(mysql_query("select member_id from members where username='".$username."'"));							 

									$addsql.=" AND user_id='".$user_id['member_id']."'";

								}

								if($transid != '')

								{

									$addsql.=" AND transaction_id ='".$transid."'";

								}

								if($paymethod != '')

								{

									$pay_id = mysql_fetch_array(mysql_query("select payment_id from payment_process where payment_name='".trim(ucfirst($paymethod))."'"));

									$addsql.=" AND payment_thro ='".$pay_id['payment_id']."'";

								}

								if($transtype != '')

								{

									$addsql.=" AND type ='".trim($transtype)."'";

								}

							}

							

							

							

							$sql = "select * from history where user_id != ''";

							$query =  $sql.$addsql;

							//$query =  $sql;

							$total_pages = mysql_num_rows(mysql_query($query));

								

							$limit = 25; 	

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

								

							$query = $query." order by date desc limit $start, $limit";

							$select_company = mysql_query($query);

								

							//$link=$_SERVER['PHP_SELF'];

							$link='http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'?username='.$_GET['username'].'&transid='.$_GET['transid'].'&transtype='.$_GET['transtype'].'&paymethod='.$_GET['paymethod'].'&search='.$_GET['search'].'&page=';

							

							$paging=newpage($page,$total_pages,$limit,$link);

							echo $paging;

							

					

						

					 ?>

                     

                      

                     <table width="889" height="92" class="normal tablesorter fullwidth">

                  

						<thead>



			     <tr>

				 <th width="14%"><strong>Transaction Id</strong></th>

                  <th width="14%"><strong>Date</strong></th>

                  <th width="15%" ><strong>User Name</strong></th>

                  <th width="15%"><strong>Amount(&#x0E3F;)</strong></th>

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

						

						

			

                  

               $out.='<tr class="'.$class.'"><td>'.$fetch['transaction_id'].'</td>

				<td>'.$fetch['date'].'</td>

                  <td ><div class="fade_hover tooltip" title="Click to view the '.ucfirst($company['first_name']).' details">

				 <a href="view_users.php?id='.$fetch['user_id'].'&type=transaction" style="text-decoration:none;color:#353535;">'.ucfirst($company['username']).'</a></div></td>

                  <td >&#x0E3F;'.$fetch['amount'].'</td>

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
