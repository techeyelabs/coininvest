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
				$insert=mysql_query("update history set type='withdrawal',date='".date('Y-m-d h:i:s')."' where id=".$cnid);
			}
			
			
		$value = $_POST['chkSub'];
				
				foreach($value as $value)
				{
				
				$date=date('Y-m-d h:i:s');
				$query2 = mysql_fetch_array(mysql_query("select * from history where id='$value'")); 
				
					 $query 	= "SELECT * FROM members WHERE member_id = '".$query2['user_id']."'";  
					 $result 	= mysql_query($query);
					 $fetch		= mysql_fetch_array($result);
					 
					  $mem_mail = $fetch['member_email']; 
					 $first_name= $fetch['username'];
					 $mem_id    = $fetch['member_id'];
					 
					 $query1    =mysql_fetch_array(mysql_query("select * from history where user_id = '".$mem_id."'"));
					 $amt       = $query2['amount'];
					 //$date      = $query2['date'];
					 $trans     = $query2['transaction_id'];
					 
					 $sitename	= mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '3'"));
			 		 $from_id   = $sitename['set_value']; 
					 $message   = 'Your Payment Paid Successfully...!';
					 
					 //echo '<pre>'; print_r($query1); exit;
					 	$current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
						$current_url=str_replace("administrator/withdraw","login",$current_url);
					 	
						$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
						$sitename=$sitename['set_value'];
						
						$admin_mail_id = mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
						$admin_mail = $admin_mail_id['set_value'];
											
						$names=$_POST['nametitle'].'.'.$_POST['first_name'];
						$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =10"));
					
						$mail_from_id = $mail_fetch['from_id'];

					$mailsubject =$mail_fetch['mailsubject'];

					$message = html_entity_decode($mail_fetch['message']);

					$message=str_replace('[FIRSTNAME]',$first_name,$message);

					$message=str_replace('[TXTAMT]',number_format($amt,5),  str_replace('USD','&#x0e3f;',$message));

					$message=str_replace('[transid]',$trans,$message);			

					$message=str_replace('[WITHDRAWDATE]',$date,$message);

					$message=str_replace('[ADMINEMAIL]',$admin_mail,$message);
					$message=str_replace('#sitelogo',$sitelogo,$message);
				    $message=str_replace('#siteurl',$site_url,$message);
					$message=str_replace('#sitename',$sitename,$message);
					$message=str_replace('#adminemill',$admin_mail,$message); 
					$message=str_replace('#verfyurl',$current_url,$message);
				    $message=str_replace('#adminmail',$mail_from_id,$message);  
					$headers  = "MIME-Version: 1.0\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\n";
	  	    		$headers .= 'From: '.$from_id.' <'.$from_id.'>' . "\r\n"; 	
					mail($mem_mail,$mailsubject,$message,$headers);
					
				} 	
			$_SESSION['succ_dir']="<font color='#004000'><b>Successfully paid out</b></font>";
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
			$_SESSION['succ_dir']="<font color='#004000'><b>Successfully payout Cancelled</b></font>";
			echo '<meta http-equiv="refresh" content="0;url=withdraw.php" />';
			exit();
		}
		else
		{
			$insert=mysql_query("update history set type='withdrawal' where id=".$_GET['id']);
			if($member[0]== $_SESSION['userid'])
		{	
	
		$sql=mysql_query("select * from members");
		while($fetch=mysql_fetch_array($sql))
		{
			$member_mail=$fetch['member_email'];
			
			$headers  = "MIME-Version: 1.0\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";
	  	    $headers .= 'From: '.$mail_from_id.' <'.$mail_from_id.'>' . "\r\n"; 	
			/*echo "<br>".$member_mail;
			echo "<br>".$subject;
			echo "<br>".$mailmessage;
			echo "<br>".$headers;*/
			 @mail($member_mail,$subject,$mailmessage,$headers);
			/*if($mail)
			{
				echo "<br>1";
			}*/
		}
		
		$_SESSION['succ_dir']="<font color='#004000'><b>Successfully NewsLetter Send to Users</b></font>";
		echo '<meta http-equiv="refresh" content="0;url=send_letter.php">';
		exit();
		}

			$_SESSION['succ_dir']="<font color='#004000'><b>Successfully paid out</b></font>";
			echo '<meta http-equiv="refresh" content="0;url=withdraw.php" />';
			exit();
		}		
	}
?>

	<div id="primary_right">
                <div class="inner" >

				<?php require 'include/top/financial_management.php'; ?>

					 <!-- end dashboard items -->
					<hr />

                    <h1  style="color:#fff"><?php if($_GET['act']=="paid") echo "Paid Payouts"; else echo "Pending Payouts"; ?></h1>

                    

                    <?php if($_GET['act'] == "paid")

					{

					?>

                    <form id="frm" name="frm" method="get" action="">

                   

                   <table class="normal tablesorter fullwidth">

                    <tbody><tr>

                    <td><b>Search</b></td>

                    <td>

                    <input type="text" value="Transaction Id" onfocus="if(this.value=='Transaction Id') this.value='';" onblur="if(this.value=='') this.value='Transaction Id';" name="tranid">

                    

               </td>

                                   <td>

                    <input type="text" value="User Name" onfocus="if(this.value=='User Name') this.value='';" onblur="if(this.value=='') this.value='User Name';" name="username">

                    

               </td>

               

                 <td>

                    <input type="text" value="Email Id" onfocus="if(this.value=='Email Id') this.value='';" onblur="if(this.value=='') this.value='Email Id';" name="email"   >

                                

               </td>

               

                  <td>

                    <input type="text" value="Payment Mode" onfocus="if(this.value=='Payment Mode') this.value='';" onblur="if(this.value=='') this.value='Payment Mode';" name="paymode">

                    

               </td>

               

             

                    

               </td>

               

               <td><input style="color:#888" type="submit" id="search" value="Search" name="search">

               <input type="hidden" id="action" value="<?php echo $_GET['act']; ?>" name="act"></td>

                    </tr></tbody></table>

                   

                    </form>

                    <?php

					}

					?>

                    

           

           

        

  <form name="frm1" method="post" action="withdraw.php">  

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



				?>

					

					<div align="right"><input type="hidden" name="cana" value="1" /><input style="color:#888" class="button" type="submit" name="update" value="Pay Now" /></div>

                  

               <?php

			   

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

				  

				  if(isset($_GET['search']))

							{

								if(trim($_GET['tranid']) != 'Transaction Id')

								{

									$tranid=trim($_GET['tranid']);

								}

								else

								{

									$tranid='';

									

								}

								

								if(trim($_GET['username']) != 'User Name')

								{

									$username=trim($_GET['username']);

								}

								else

								{

									$username='';

								}

								

								if(trim($_GET['email']) != 'Email Id')

								{

									

									$email=trim($_GET['email']);

									

								}

								else

								{

									$email='';

								}

								

								if(trim($_GET['paymode']) != 'Payment Mode')

								{

									

									$paymode=trim($_GET['paymode']);

								}

								else

								{

									$paymode='';

								}

								

								

								if($username != '')

								{	

									$user_id = mysql_fetch_array(mysql_query("select member_id from members where username='".$username."'"));							 

									$addsql.=" and user_id=".$user_id['member_id']."";

								}

								if($tranid != '')

								{

									

									$addsql.=" AND transaction_id='".$tranid."'";

								}

								if($email != '')

								{

									$user_id11 = mysql_fetch_array(mysql_query("select member_id from members where member_email='".$email."'"));							 

									$addsql.=" and user_id=".$user_id11['member_id']."";

									

								}

								if($paymode != '')

								{

									$pay_id = mysql_fetch_array(mysql_query("select payment_id from payment_process where payment_name='".trim(ucfirst($paymode))."'"));

									$addsql.=" and payment_thro ='".$pay_id['payment_id']."'";

								}

							}

							

				



				  	if($_GET['act']=="paid")



					{



						$select_company = "select * from history where type='withdrawal' ".$addsql."";



					}

					/*else if($_GET['act']=="paid" && isset($_GET['search']))

					{

						$select_company = "select * from history where type='withdrawal'";

					}*/



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
			$acc = $company['pm_num'];
			}
			if ($acc == '')
			{

				$acc = 'Not Updated';

			}



				?>



                  



                <tr class="<?php echo $class; ?>">
		<?php if($_GET['act'] !='paid') { ?>
	<td width="3%" ><input name="chkSub[]" id="chkSub" type="checkbox" class="check" value="<?php echo $fetch['id'];  ?>">
  </td>
<?php
				}
	?>
	<td ><?php echo $fetch['transaction_id']; ?></a></td>
	<td ><div class="fade_hover tooltip" title="Click to view the <?php echo $company['first_name']; ?> detail">
 <a href="view_users.php?id=<?php echo $fetch['user_id']; ?>&type=payouts" style="text-decoration:none;color:#353535;"><?php echo ucfirst($company['username']); ?></a></div></td>
           <td ><?php echo ucfirst($company['member_email']); ?></a></td>
                 <td align="center" ><?php if($payment['payment_name']=='Paypal'){ echo 'Bit Coin'; }else{ echo $payment['payment_name']; } ?></td>
                  <td ><?php echo $acc; ?></a></td>
                  <td >&#x0e3f;<?php echo $fetch['amount']; ?></td>
                  <td ><?php echo $fetch['description']; ?></td>
                  <td align="center" ><?php echo $fetch['reference_number']; ?></td>
                  <td align="left" nowrap="nowrap" >				  
  <?php	   if($_GET['act']!='paid')  {
	//echo '<a href="withdraw.php?id='.$fetch['id'].'" title="Click to Pay" class="tooltip table_icon">
	//	<img src="assets/icons/small_icons/Ok.png" alt=""Edit" />		
	//	</a>
 echo '	<a href="withdraw.php?id='.$fetch['id'].'&process=cancel" title="Cancel Payouts" class="tooltip table_icon" onClick="javascript:return condelete();">
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
   } else {				?>         
                <tr>
                  <td colspan="11"  align="center">No Records found</td>
      </tr>     
                 <?php
	 }				 ?>
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

<script language="javascript1.1">
function condelete()
{
var confrm;
var output = "Are You sure you want to Cancel this Payout Request ";
confrm=window.confirm(output);
return confrm;
}
</script>

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
