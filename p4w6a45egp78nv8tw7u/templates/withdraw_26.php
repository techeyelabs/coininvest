<!--Content Portion Start-->
<?php
if($_POST['cana'] == 1)

	{

		if(isset($_POST['update']))

		{

			$coid=$_POST['chkSub'];

			if(count($coid) > 0)

			{

			for($i=0;$i<count($coid);$i++) 

			{

				$cnid=$coid[$i];

				$insert=mysql_query("update history set type='withdrawal' where id=".$cnid);

			}

			$_SESSION['succ_dir']="<font color='#004000'><b><center>Successfully paid out</center></b></font>";

			echo '<meta http-equiv="refresh" content="0;url=withdraw.php" />';

			exit();

			}

		}

		

		

	}

	if($_GET['id'])

	{

		if($_GET['process']=='cancel')

		{
			
			$insert=mysql_query("DELETE FROM `history` WHERE `history`.`id` = ".$_GET['id']);
			//$insert=mysql_query("update history set type='bonus',description='Payout Cancelled' where id=".$_GET['id']);

			$_SESSION['succ_dir']="<font color='#004000'><b><center>Successfully payout Cancelled</center></b></font>";

			echo '<meta http-equiv="refresh" content="0;url=withdraw.php" />';

			exit();

		}

		else

		{

			$insert=mysql_query("update history set type='withdrawal' where id=".$_GET['id']);

			$_SESSION['succ_dir']="<font color='#004000'><b><center>Successfully paid out</center></b></font>";

			echo '<meta http-equiv="refresh" content="0;url=withdraw.php" />';

			exit();

		}		

	}



?>

<div id="primary_right">

			
                <div class="inner" style="width:900px">

<?php require 'include/top/financial _management.php'; ?>
					 <!-- end dashboard items -->

					<hr />
                    <h1><? if($_GET['act']=="paid") echo "Paid Payouts"; else echo "Pending Payouts"; ?></h1>
                    
                    
           
           
        
  <form name="frm1" method="post" action="masspay.php">  
  <?php if($_SESSION['succ_dir'] != '')
					  { 
					  echo '<div class="notification success"> 
							<span></span> 
							<div class="text"> 
							<p><strong>Success!</strong>'.$_SESSION['succ_dir'].'</p> 
							</div> 
						 </div>';
						} 
						
						if($_SESSION['empty_payments'] != '' || $_SESSION['empty_chkMain'] != '' ||  $_SESSION['empty_chkSub'] != '') 
						{
								echo '	<div class="notification error"> 
						<span></span> 
						<div class="text"> 
							<p><strong>Error!</strong> '.$_SESSION['empty_payments'].'</p> 
							<p>'.$_SESSION['empty_chkMain'].'</p> 
							<p>'.$_SESSION['empty_chkSub'].'</p> 
						</div> 
					</div>';
						}
						
						unset($_SESSION['empty_payments']);
						unset($_SESSION['empty_chkMain']);
						unset($_SESSION['empty_chkSub']);
						unset($_SESSION['succ_dir']);
						?>
                        
                      
                        
                        
                        <?php
						 if($_GET['act'] !='paid')
						 {

$sql=mysql_query("SELECT * FROM `history` WHERE `type`='withdraw_pending' GROUP BY`payment_thro`");
while($getrow=mysql_fetch_array($sql))
{
			$paymentgate=mysql_fetch_array(mysql_query("select payment_name from payment_process where payment_id=".$getrow['payment_thro']));
			if($getrow['payment_thro'] == intval($_GET['payid']))
			{
			$option.='<option selected="selected" value="'.$getrow['payment_thro'].'">'.$paymentgate['payment_name'].'</option>';
			}
			else
			{
			$option.='<option value="'.$getrow['payment_thro'].'">'.$paymentgate['payment_name'].'</option>';
			}
			
}

					
						
						
						echo '<table class="normal tablesorter fullwidth">
                    <tbody><tr>
                  
                    <td nowrap="nowrap" width="80%">
                  
					<div align="right"><select name="payments" onchange="searchpay(this.value)" id="payments" ><option value="0">--Filter--</option>'.$option.'</select><input type="hidden" name="cana" value="1" /><input class="button" type="submit" name="update" value="Pay Now" /></div>
                  
               </td>
               
           
                    </tr>
                    
                    </tbody></table>';

		 				} ?>
     
     
                        
                        

  <table width="1229" class="normal tablesorter fullwidth">
  
<thead>
                <tr>

				<?php
				if($_GET['act'] !='paid') 
				{
				echo ' <td style="background: -moz-linear-gradient(center top , #FBFBFB, #F5F5F5) repeat scroll 0 0 transparent;
    border-bottom: 1px solid #CCCCCC;" width="5%">	<input type="checkbox" name="chkMain" onClick="chkall();" class="check" value="1"></td>';
				}

				?>
		         <th width="10%"><strong>Transcation Id</strong></th>
                 <th width="10%"><strong>Username</strong></th>
                  <th width="15%" ><strong>Email ID</strong></th>
                  <th width="10%"><strong>Payment Gateway</strong></th>
                  <th width="10%" ><strong>Account ID</strong></th>
				   <th width="10%" ><strong>Amount</strong></th>
                   	<th width="20%" ><strong>Descriptions</strong></th>
                     <th  width="10%" ><strong>Batch Number</strong></th>
                    <th  width="10%" ><strong>Action</strong></th>
                    
        </tr>

      </thead>

                <tr>

                  <td colspan="11" class="bottom_line"></td>

      </tr>

                  

                  

                  <?php

				  	if($_GET['act']=="paid")

					{

						$select_company = "select * from history where type='withdrawal'";

					}

					else

					{
						if(isset($_GET['payid']) && intval($_GET['payid']) > 0)
						{
												$select_company = "select * from history where type='withdraw_pending' and payment_thro='".intval($_GET['payid'])."'";

						}
						else
						{
												$select_company = "select * from history where type='withdraw_pending'";

						}
						

					}
					
					
		
		$query =  $select_company;
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
		
				
		$query = $query." ORDER BY id DESC LIMIT $start, $limit";
		$select_company = mysql_query($query);
		
		
	$link='http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'?payid='.$_GET['payid'].'&page=';

		
		$paging=newpage($page,$total_pages,$limit,$link);
					
		 echo $paging;	
		 
		

					
					
					
					
					

			$i=0;
					if(mysql_num_rows($select_company) > 0)
					{
						while($fetch = mysql_fetch_array($select_company))
						{
						$company=mysql_fetch_array(mysql_query("select * from members where member_id=".$fetch['user_id']));
						$payment=mysql_fetch_array(mysql_query("select * from payment_process where payment_id=".$fetch['payment_thro']));
						
						$value = $i % 2;
$i++;
						if($value ==0)
					{

							$class = "odd";

						}

						else

						{

							$class = "";

						}

						

						if($fetch['payment_thro'] == '8')
						{
							$acc = $company['lr_num'];
						}
						else if($fetch['payment_thro'] == '7')
						{
							$acc = $company['alerypay_num'];
						}
						else
						{
							$acc = 'None';
						}

				?>

                  

                <tr class="<?=$class; ?>">

				<?php if($_GET['act'] !='paid') { ?>

				<td width="3%" ><input name="chkSub[]" id="chkSub" type="checkbox" class="check" value="<?php echo $fetch['id'];  ?>">

	  </td>

				<?php

				}

				?>
				<td ><?=$fetch['transaction_id']; ?></a></td>
				<td ><?=ucfirst($company['username']); ?></a></td>

                  <td ><?=ucfirst($company['member_email']); ?></a></td>

                  <td align="center" ><?=$payment['payment_name']; ?></td>

                  <td ><?=$acc; ?></a></td>

				  

                  <td >$<?=$fetch['amount']; ?></td>

                  <td ><?=$fetch['description']; ?></td>


                  <td align="center" ><?=$fetch['reference_number']; ?></td>

                  

                  <td align="left" nowrap="nowrap" >
				  
				  <?php
				   if($_GET['act']!='paid')
				  {

	//echo '<a href="withdraw.php?id='.$fetch['id'].'" title="Click to Pay" class="tooltip table_icon">
				//	<img src="assets/icons/small_icons/Ok.png" alt=""Edit" />
					
				//	</a>
					
				echo '	<a href="withdraw.php?id='.$fetch['id'].'" title="Cancel Payouts" class="tooltip table_icon" onClick="javascript:return condelete();">
				
					<img src="assets/icons/small_icons/No.png" alt="Delete" /> </a>';

					  } 
					  else
					   { echo "Paid";
					  
					  
					   }
					  
					  
					  ?>
                  </td>
 </tr>
 <?php

					}

				} else {

				?>

                

                <tr>

                  <td colspan="11"  align="center">No Records found</td>

      </tr>

                 

                 <?php

				 

				 }

				 ?>

                 <tr>

                  <td colspan="11" class="bottom_line">&nbsp;</td>

      </tr>

                

              

    </table>

          </div></td>

        </tr>

        <tr>

          <td class="lbox_botl">&nbsp;</td>

          <td class="lbox_botbg">&nbsp;</td>

          <td class="lbox_botr">&nbsp;</td>

        </tr>

      </table></td>

    </tr>

    <tr>

      <td align="left" valign="top">&nbsp;</td>

    </tr>

  </table>

  </form>

</div>

<script language="JavaScript">

function searchpay(getvalues)
{
	window.location='withdraw.php?payid='+getvalues;
}

function chkall() {

	len=document.frm1.chkSub.length;

	if(len > 1) {

	for(i=0;i<len;i++) {

		if(document.frm1.chkMain.checked==true) {

			document.frm1.chkSub[i].checked=true;

		}

		else {

			document.frm1.chkSub[i].checked=false;

		}

	}

	}

	else {

		if(document.frm1.chkMain.checked==true) {

			document.frm1.chkSub.checked=true;

		}

		else {

			document.frm1.chkSub.checked=false;

		}

	

	}

	}

	</script>

<!--Content Portion End-->