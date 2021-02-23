<!--Content Portion Start-->

<?php error_reporting(1);?>
<?php

 if(!in_array("User",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
?>
 <? require 'include/page1.php'; ?>



<?php





	if($_POST['cana'] == 1)

	{


		if(isset($_POST['update']))

		{
			$coid=$_POST['chkSub'];
			if(count($coid) > 0)
			{
			
			$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
				$sitename=$sitename['set_value'];
				
				
					$adminmail=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
				$adminmail=$adminmail['set_value'];
				

			for($i=0;$i<count($coid);$i++) 
			{
				$cnid=$coid[$i];
				$query="update  members set suspend_time='0000-00-00 00:00:00' where member_id ='".$cnid."' "; 
				mysql_query($query);
				$query_y="select * from members where member_id ='".$cnid."'";
				$fetch = mysql_fetch_array(mysql_query($query_y));
							$message='<table cellspacing="0" cellpadding="40" border="0" width="98%">
							<tbody>
							<tr>
							<td bgcolor="#f7f7f7" width="100%" style="font-family: lucida grande,tahoma,verdana,arial,sans-serif;">
							<table cellspacing="0" cellpadding="0" border="0" width="620">
							<tbody>
														<tr>
            				<td valign="top" style="background-color: rgb(255, 255, 255); border-bottom: 1px solid rgb(59, 89, 152); border-left: 1px solid rgb(204, 204, 204); border-right: 1px solid rgb(204, 204, 204); font-family: lucida grande,tahoma,verdana,arial,sans-serif; padding: 15px;">
					<table width="100%">
                  <tbody>
                    <tr>
                      <td align="left" width="470px" valign="top" style="font-size: 12px;"><div style="margin-bottom: 15px; font-size: 13px;">Hi '.$fetch['first_name'].',</div>
                        <div style="margin-bottom: 15px;">Your account has been Activated Successfully</div>
                       
                        <div style="margin: 0pt;">Thanks,<br>
                          '.$sitename.'</div></td>
                    </tr>
                  </tbody>
               </table></td>
            </tr>          </tbody>
		  <tr>
             <td style="color:#FFFFFF; height:30px; padding-left:20px; font-family:Arial, Helvetica, sans-serif; font-size:12px">Copyright &copy; '.date('Y').' '.$sitename.'.com</td>
            </tr>
        </table></td>
    </tr>
      </tbody>
</table>';
				$headers  = "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\n";
				$headers .= 'From: '.$sitename.' <'.$adminmail.'>' . "\r\n";
				mail($fetch['member_email'],"Account Information",$message,$headers);
				
			}

			$_SESSION['success_flag']="<font color='#004000'><b><center>Successfully Users Activated</center></b></font>";



			echo '<meta http-equiv="refresh" content="0;url=user.php?status=new" />';



			exit();



			}



		}


	}

	



?>



<div id="primary_right">

				<div class="inner" >



					<h1 style="color:#fff">User Management</h1>

<?php require 'include/top/user.php'; ?>

					 <!-- end dashboard items -->

					<hr />

		  

					<h1 style="color:#fff">View <?php echo ucfirst($_GET['status']); ?> Users</h1>

  <?php if($_SESSION['success_flag']) { 

	?>

	 <div class="notification success"> 

					<span></span> 

					<div class="text"> 

						<p><strong>Success!</strong> <?php echo $_SESSION['success_flag']; $_SESSION['success_flag']=''; ?> </p> 

					</div> 

				  </div>

    <?php

    } ?>

    

    

    

    

<!--    <form name="frm1" method="post" action=""> -->

     

      <div>

      

      

     
  <form id="frm" name="frm" method="get" action="">
                   

<table class="normal tablesorter" width="100%">

                    <tbody><tr>

                    <td><b>Search</b></td>

                    <td>

                    <input type="text" value="User Name" onfocus="if(this.value=='User Name') this.value='';" onblur="if(this.value=='') this.value='User Name';" name="username">

                    

               </td>

                                   <td>

                    <input type="text" value="E-Mail ID" onfocus="if(this.value=='E-Mail ID') this.value='';" onblur="if(this.value=='') this.value='E-Mail ID';" name="email">

                    

               </td>

               

                 <td>

                    <input type="text" value="Country" onfocus="if(this.value=='Country') this.value='';" onblur="if(this.value=='') this.value='Country';" name="country">

                                

               </td>

               

                  <td>

                    <input type="text" value="Sponsor Name" onfocus="if(this.value=='Sponsor Name') this.value='';" onblur="if(this.value=='') this.value='Sponsor Name';" name="sponsor">

                    

               </td>

               

             

                    

               </td>

               

               <td><input style="color:#888" type="submit" id="search" value="Search" name="search">

                   <input type="hidden" id="status" value="<?=$_GET['status']; ?>" name="status">

              </td>

                    </tr></tbody></table>
                    </form>

            <form id="frm" name="frm" method="post" action="">         

                  <?php 									 
						 	echo '<div align="right">

		<input style="color:#888" type="submit" name="update"  value="Active" class="button_link" id="update" /><input type="hidden" name="cana" value="1" />

       </div>';


		?>



 					<table border="1" class="normal tablesorter" width="100%">

				  <thead>

							<tr>

                            

                            <?php 

							if($_GET['status'] == 'new')

							{

									echo '<th width="10%"><input type="checkbox" name="chkMain" onClick="chkall();" class="check" value=1></th>

';

							}

							else

							{

									echo ' <td width="5%" valign="middle" style=" background: -moz-linear-gradient(center top , #FBFBFB, #F5F5F5) repeat scroll 0 0 transparent;

    border-bottom: 1px solid #CCCCCC;">

												<input type="checkbox" name="chkMain" onClick="chkall();" class="check" value="1">				

									</td>';

									echo ' <th width="10%"><strong>Username</strong></th>';

							}



				?>



				 

								

								<th width="56"><strong>Email Id</strong></th>

							  <th width="56"><strong>Name</strong></th>

							  <th width="379"><strong>Country</strong></th>

							
							
                              <th width="75" nowrap="nowrap"><strong>Total Deposit</strong></th>

							  <th width="98"  nowrap="nowrap"><strong>Suspend Time </strong></th>
                              <th width="98"  nowrap="nowrap"><strong>Member Since</strong></th>

                              <th width="52" colspan="2"><strong>Options</strong></th>

					</tr>

						</thead>

					

                       <?php

					   

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

								

								if(trim($_GET['email']) != 'E-Mail ID')

								{

									$email=trim($_GET['email']);

								}

								else

								{

									$email='';

								}

								

								if(trim($_GET['country']) != 'Country')

								{

									$country=trim($_GET['country']);

								}

								else

								{

									$country='';

								}

								

								if(trim($_GET['sponsor']) != 'Sponsor Name')

								{

									

									$sponsor=trim($_GET['sponsor']);

								}

								else

								{

									$sponsor='';

								}

								

								

								if($username != '')

								{	

															 

									$addsql.=" AND username='".$username."'";

								}

								if($email != '')

								{

									$addsql.=" AND member_email ='".$email."'";

								}

								if($country != '')

								{

									$country_id = mysql_fetch_array(mysql_query("select country_id from country_master where country='".trim(ucfirst($country))."'"));

									$addsql.=" AND country ='".$country_id['country_id']."'";

								}

								if($sponsor != '')

								{

									

									$intro_id = mysql_fetch_array(mysql_query("select member_id from members where username='".$sponsor."'"));													

									$addsql.=" AND intro_id='".$intro_id['member_id']."'";

									

								}

							}

							

							



				//$select_company = mysql_query("select * from members where status= '".$status."'");

				$sql = "select * from members where suspend_time > '".date('Y-m-d H:i:s')."'";

				$query = $sql.$addsql;

				

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

				
							$query = $query." order by date_of_join desc limit $start, $limit";

							$select_company = mysql_query($query);

								

							//$link=$_SERVER['PHP_SELF'];

							$link='http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'?status='.$status.'&page=';

							

							$paging=newpage($page,$total_pages,$limit,$link);

							echo $paging;

				$i=0;

				if(mysql_num_rows($select_company) > 0)
				{

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

						if($fetch['intro_id']!='')
						{
							$select_spon=mysql_fetch_array(mysql_query("select * from members where member_id=".$fetch['intro_id']));
							$direct=$select_spon['username'];
						}
						else
						{
							$direct="None";
						}
						$country = mysql_fetch_array(mysql_query("select * from country_master where country_id='".$fetch['country']."'"));
	

						//*********AVAILABLE BALANCE*************//

						

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

		?>

				<?php

				

				echo '<tr class="'.$class.'">';

				if($_GET['status'] =='new') 

				{ 



				echo '<td ><input name="chkSub[]" id="chkSub" type="checkbox" class="check" value="'.$fetch['member_id'].'" />



				  <input type="hidden" name="id" value="'.$fetch['member_id'].'"></td>';



				} 

				else

				{ 

				

				echo '<td ><input name="chkSub[]" id="chkSub" type="checkbox" class="check" value="'.$fetch['member_id'].'" />



				  </td>';

				  

				 echo '<td id="test">

<div class="fade_hover tooltip" title="clik to view the '.$fetch['first_name'].'&nbsp;'.$fetch['last_name'].' details">

				 <a href="view_users.php?id='.$fetch['member_id'].'" style="text-decoration:none;color:#353535;">'.$fetch['username'].'</a>

				  </div>

		</td>';

				 }





                echo ' <td >'.$fetch['member_email'].'</td>

                  <td >'.$fetch['first_name'].'&nbsp;'.$fetch['last_name'].'</td>

                  <td>'.$country['country'].'</td>

               

				  <td>$'.number_format($total_deposit,2).' USD</td>

				  <td >'.$fetch['suspend_time'].'</td>
				

				   <td >'.$fetch['date_of_join'].'</td>';

               

					if($_GET['status'] != 'new')

				 	{

						echo '<td width="5%" ><a href="edit_user.php?id='.$fetch['member_id'].'" title="Edit this user" class="tooltip table_icon"><img src="assets/icons/actions_small/Pencil.png" alt="" /></a></td>';

						}

				

								?>
                                

									<td width="5%" ><a href="user_validate.php?mem_id=<?=$fetch['member_id']; ?>" title="Delete this user" class="tooltip table_icon" onClick="javascript:return condelete('<?=$fetch['username']; ?>');"><img src="assets/icons/actions_small/Trash.png" alt="" /></a>

								</td>

</tr>
<?
  

	}

	} else {

		

    echo ' <tr>

    <td class="alert_stxt" valign="top" align="center" colspan="10">No Records Found</td>

    </tr>';

 	}

	?>





        

                     </tr></tbody></table>

      </div>

  </form>                 <div class="clearboth"></div>

</div> <!-- inner -->

</div>

					

			 <!-- inner -->

			

			<script language="javascript1.1">

			function condelete(a)

{



var confrm;
var output = "Are You sure you want to delete this User "+a;

confrm=window.confirm(output);

return confrm;

}



			</script>

            <script language="JavaScript">



function chkall()

{



	len=document.frm1.chkSub.length;



	if(len > 1) 

	{

			for(i=0;i<len;i++)

			{

				if(document.frm1.chkMain.checked==true) 

				{

						document.frm1.chkSub[i].checked=true;

				}

				else 

				{

					document.frm1.chkSub[i].checked=false;

				}

			}

	}

	else

	{

			if(document.frm1.chkMain.checked==true)

			{

					document.frm1.chkSub.checked=true;

			}

			else

			{

				document.frm1.chkSub.checked=false;

			}

	}



}



	</script>

<!--Content Portion End-->