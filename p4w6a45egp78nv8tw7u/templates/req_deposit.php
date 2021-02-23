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
               	  <th width="15%"><strong>Amount</strong></th>
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
                		  <td >&#x0e3f;'.$data['amount'].'</td>
	                  <td >'.$data['description'].'</td>
        	           <td>'.$payment['payment_name'].'</td>
				     <td>'.$payment['reference_number'].'</td></tr>';		

			}

		}
			else
			{
				 $exceloutput.=' <tr>
    <td class="alert_stxt" valign="top" align="center" colspan="7">No Records Found</td> </tr>';
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
           <div class="inner" style="width:900px">
<?php require 'include/top/financial _management.php'; ?>
 <?php require 'include/page1.php'; ?>
			 <!-- end dashboard items -->
				<hr />
                    <h1>Deposit Request Details</h1>
                   
                 <?php if($_SESSION['succ_dir']) 
					 { 
					?>
					<div class="notification success"> 
					<span></span> 
					<div class="text"> 
						<p><strong>Success!</strong> <?php echo $_SESSION['succ_dir']; $_SESSION['succ_dir']=''; ?> </p> 
					</div> 
					</div>
					<?php
					
					}
					?>
					
					 <?php if($_SESSION['empty_pass']) 
					 { 
					?>
					<div class="notification error"> 
						<span></span> 
						<div class="text"> 
							<p><strong>Error!</strong> <?php echo $_SESSION['empty_pass']; $_SESSION['empty_pass']=''; ?></p> 
						</div> 
					</div>
					<?php
					
					}
					?>
      <!--  
        <div align="right">

    <form name="frm1" method="post" action=""> 
		<input type="image"  border="0" style="border-width:0px;" src="assets/images/excel.jpeg" name="excelexport" id="excelexport" />
		<input type="hidden" name="excel" value="1" />
        </form>
       </div>-->     

         <form id="frm" name="frm" method="get" action="req_deposit.php">        
                   <table class="normal tablesorter fullwidth">
                    <tbody><tr>
                    <td><b>Search</b></td>
                    <td>
     <input type="text" value="User Name" onfocus="if(this.value=='User Name') this.value='';" onblur="if(this.value=='') this.value='User Name';" name="username">
               </td>                 <td>
                    <!--<input type="text" value="Type" onfocus="if(this.value=='Type') this.value='';" onblur="if(this.value=='') this.value='Type';" name="transtype">-->
                    <select name="planid" style="height:28px;">
                    <option value="Type" selected="selected">Plan Type</option>
				<?php 					
						$select_plan = mysql_query("select * from plan order by plan_id");					
						while($view_B = mysql_fetch_array($select_plan))
						{
							 echo '<option value="'.$view_B['plan_id'].'" >'.$view_B['plan_type'].'</option>';
						}
				?>                 
                    </select>              </td>
              </td>
               <td><input type="submit" id="search" value="Search" name="search"></td>
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
								if(trim($_GET['planid']) != 'Type')
								{
									$planid=intval($_GET['planid']);
								}
								else
								{
									$planid='';
								}

								if($username != '')
							{	
				$user_id = mysql_fetch_array(mysql_query("select member_id from members where username='".$username."'"));							 	$addsql.=" AND member_id='".$user_id['member_id']."'";
								}

								if($planid != '')
								{
									$addsql.=" AND planid ='".$planid."'";
								}		
						}						
						

							$sql = "select * from deposit_req where member_id != '' and status='0'";
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

                  <th width="15%" ><strong>User Name</strong></th>
                  <th width="15%"><strong>Deposit Amount</strong></th>
                  <th width="15%" ><strong>Plan</strong></th>
				   <th width="14%" ><strong>Compounding</strong></th>					
					<th width="14%" ><strong>Payment Gateway</strong></th>					
					<th width="14%"><strong>Date</strong></th>					 
                    <th width="10%" ><strong>Action</strong></th>
                </tr>
		</thead>	<tbody>
                  <?php			  
			//$select_company = mysql_query("select * from history LIMIT $offset, $rowsPerPage");		

						if(mysql_num_rows($select_company) > 0)
						{
						$i=0;

						while($fetch = mysql_fetch_array($select_company))
						{
						$company=mysql_fetch_array(mysql_query("select * from members where member_id=".$fetch['member_id']));
					$payment=mysql_fetch_array(mysql_query("select * from payment_process where payment_id=".$fetch['payid']));	
						$plan=mysql_fetch_array(mysql_query("select * from plan where plan_id=".$fetch['planid']));
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
               $out.='<tr class="'.$class.'"><td>'.ucfirst($company['username']).'</td>
				<td>'.'&#x0e3f;'.$fetch['amount'].'</td>
                  <td >'.$plan['plan_type'].'</td>
                  <td >'.$fetch['compound'].'%'.'</td>
                  <td >'.$payment['payment_name'].'</td>
                   <td>'.$fetch['date'].'</td>';
				if($fetch['status'] == '0')
				{
				   $out.='<td><a href="actdeposit.php?reqid='.$fetch['req_id'].'&membid='.$fetch['member_id'].'">Approve</a>
							</form></td>';
				}
				else
				  $out.='  <td>Completed</td>';
			              $out.='</tr>';         
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

