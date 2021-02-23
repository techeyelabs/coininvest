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
    <td class="alert_stxt" valign="top" align="center" colspan="10">No Records Found</td>
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
                <div class="inner" >
                <?php //require 'include/top/financial _management.php'; ?>
                <?php require 'include/page1.php'; ?>

			 <!-- end dashboard items -->
					<hr />
                    <h1 style="color:#fff" >Representatives Details</h1>

                    <form id="frm" name="frm" method="get" action="transactions.php">
                   <table class="normal tablesorter fullwidth">                <tbody><tr>                    <td><b>Search</b></td>
                    <td>
                    <input type="text" value="User Name" onfocus="if(this.value=='User Name') this.value='';" onblur="if(this.value=='') this.value='User Name';" name="username">
               </td>                                   <td>
                    <input type="text" value="Transaction ID" onfocus="if(this.value=='Transaction ID') this.value='';" onblur="if(this.value=='') this.value='Transaction ID';" name="transid">
               </td><td>
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

				        if(isset($_GET['id']))
				        {
				            $rep_id  = trim($_GET['id']);
				               	$sql = "delete from representatives where id ='" . $rep_id ."'";
                            mysql_query($sql);
                            //exit();
                            
				            /*
				            $sq = "update representatives set status='ACTIVE' where id=$rep_id";
				            mysql_query($sq);
				            
				            $fh  =  mysql_fetch_array(mysql_query("select * from representatives where id=$rep_id"));
				            $full_name = $fh['full_name'];
				            $mailto = $fh['email_atq'];
				            $admin_mail = "info@atq-coins.com";
				            $site_name = "Antique Coins";
				            
				            // SEND MAIL TO USER			
                			$mailsubject1 = "Representative Request Confirmation";
                			$message1 = "Dear Sir, <br>Representative request is active now.Your referral link: https://atq-coins.com/index.php?".$full_name  ." <br/> Regards,<br>Antique Coins";
                			$headers  = "MIME-Version: 1.0\n";
                			$headers .= "Content-type: text/html; charset=iso-8859-1\n";
                			$headers .= 'From: '. $site_name .' <'. $admin_mail .'>' . "\r\n";
                			$mail=mail($mailto,$mailsubject1,$message1,$headers);
                			*/
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
							 
							}

							$sql = "select * from representatives where id != ''";
							$query =  $sql ;
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
                  <th width="14%"><strong>Country</strong></th>
                  <th width="15%" ><strong>Green Yellow Email</strong></th>
                  <th width="15%"><strong>Contact Email</strong></th>
                  <th width="19%" ><strong>Skype</strong></th>
				   <th width="14%" ><strong>Facebook</strong></th>
				   <th width="14%" ><strong>Message</strong></th>
                    <th width="10%" ><strong>&nbsp;</strong></th>
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


                        if( $fetch['status']== 'INACTIVE'){
                            $s = '<a href="representatives.php?id='. $fetch['id'] .'">Done</a>';
                        }else{
                            $s = 'ACTIVE';
                        }






                    $out.='<tr class="'.$class.'"><td>'.$fetch['full_name'].'</td>
				            <td>'.$fetch['country'].'</td>
                            <td >'.$fetch['email_atq'].'</td>
                            <td >'.$fetch['contact_email'].'</td>
                            <td>'.$fetch['skype'].'</td>
				            <td>'.$fetch['facebook'].'</td>
				            <td>'. $fetch['other_messenger'] .'</td> 
				            <td>'.$s.'</td>
                        </tr>';

				}
			}
			else
			{
				 $out='<tr ><td colspan="10">No Records found</td></tr>';
			}
			echo  $out;
		?>
       </tr></tbody></table>
     <div class="clearboth"></div>

</div> <!-- inner -->

</div>

 

<!--Content Portion End-->

<!--Content Portion End-->
