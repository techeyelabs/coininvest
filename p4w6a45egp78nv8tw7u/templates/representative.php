<script type="text/javascript" src="../js/highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="../js/highslide/highslide.css" />
<script type="text/javascript">
	hs.graphicsDir = '../js/highslide/graphics/';
	hs.outlineType = 'rounded-white';
	hs.showCredits = false;
	hs.wrapperClassName = 'draggable-header';
</script>
<!--Content Portion Start-->
<?php
if(isset($_GET['member_id']) && isset($_GET['status']) )
{

	mysql_query("update representative set status='".intval($_GET['status'])."' where rep_id='".intval($_GET['member_id'])."'");

	$_SESSION['succ_dir']='<font color="#006600">Successfully Updated</font>';
	echo '<meta http-equiv="refresh" content="0; url=representative.php" />';
	exit();
}
if(isset($_GET['member_id']) && isset($_GET['displaystatus']) )
{

	mysql_query("update representative set 	display_status='".intval($_GET['displaystatus'])."' where rep_id='".intval($_GET['member_id'])."'");

	$_SESSION['succ_dir']='<font color="#006600">Successfully Updated</font>';
	echo '<meta http-equiv="refresh" content="0; url=representative.php" />';
	exit();
}
?>
<?php error_reporting(1);?>
 <?php require 'include/page1.php'; ?>

<div id="primary_right">

				<div class="inner" style="width:900px">

  <form id="frm" name="frm" method="get" action="">

					<h1>User Management</h1>

<?php require 'include/top/user.php'; ?>

					 <!-- end dashboard items -->

					<hr />

		  

					<h1>View <?php echo ucfirst($_GET['status']); ?> Users</h1>

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

      

      

     

                   

<table class="normal tablesorter" width="80%">

                    <tbody><tr>

                    <td><b>Search</b></td>

                    <td>

                    <input type="text" value="Name" onfocus="if(this.value=='Name') this.value='';" onblur="if(this.value=='') this.value='Name';" name="name">

                    

               </td>

                                   <td>

                    <input type="text" value="E-Mail ID" onfocus="if(this.value=='E-Mail ID') this.value='';" onblur="if(this.value=='') this.value='E-Mail ID';" name="email">

                    

               </td>

                         

               <td><input type="submit" id="search" value="Search" name="search">

                 

              </td>

                    </tr></tbody></table>

                   

                  



 					<table border="1" class="normal tablesorter" width="100%">

				  <thead>

							<tr>

                            
<th width="15%"><strong>user id</strong></th>
                           		<th width="12%"><strong>Name</strong></th>

							  <th width="13%"><strong>Email Id</strong></th>

							  <th width="10%" nowrap="nowrap"><strong>Country</strong></th>

                              <th width="15%" nowrap="nowrap"><strong> Address</strong></th>
                              <th width="10%" nowrap="nowrap"><strong>Contact Number</strong></th>
                              <th width="13%" nowrap="nowrap"><strong>Chat Id</strong></th>
                               <th width="12%" nowrap="nowrap"><strong>Date</strong></th>
                                <th width="10%" nowrap="nowrap"><strong>Approve</strong></th>
                                   <th width="10%" nowrap="nowrap"><strong>Display</strong></th>

							 

					</tr>

						</thead>

					

                       <?php

					   

					   if(isset($_GET['search']))

							{

								if(trim($_GET['name']) != 'Name')
								{
									$name=trim($_GET['name']);
								}
								else
								{
									$name='';
								}

								

								if(trim($_GET['email']) != 'E-Mail ID')
								{
									$email=trim($_GET['email']);
								}
								else
								{
									$email='';
								}

								

								if($name != '')
								{	
									$addsql.=" AND name ='".$name."'";
								}

								if($email != '')
								{

									$addsql.=" AND email_id ='".$email."'";

								}

							}

							

							



					 


				//$select_company = mysql_query("select * from members where status= '".$status."'");

				$sql = "select * from representative where name != ''";

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

								

							

								

							$query = $query." order by date_time  desc limit $start, $limit";

							$select_company = mysql_query($query);

								

							//$link=$_SERVER['PHP_SELF'];

							$link='http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'?page=';

							

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


							  
							  $select_spon=mysql_fetch_assoc(mysql_query("select member_id,country from members where username='".$fetch['userid']."'"));
							  
						$country = mysql_fetch_array(mysql_query("select * from country_master where country_id='".$select_spon['country']."'"));


		  
					
				echo '<tr class="'.$class.'">';
				 echo ' <td width="15%"> <a href="view_users.php?id='.$select_spon['member_id'].'" style="text-decoration:none;color:green;">'.$fetch['userid'].'</a></td>';

				  echo ' <td width="15%">'.$fetch['name'].'</td>

                  <td width="15%">'.$fetch['email_id'].'</td>
				  <td width="15%">'.$country['country'].'</td>

                  <td width="15%">'.$fetch['address'].'</td>

                  <td width="10%">'.$fetch['phone'].'</td>';
		 
		  
		  echo '<td width="10%" nowrap="nowrap"><a href="" onclick="return hs.htmlExpand(this,{ headingText: \'Chart Ids\' })">
								Chart Ids</a>
								<div class="highslide-maincontent">';
								
								
								if($fetch['yim'] != '' )
								{
									echo 'YIM &nbsp;&nbsp;:&nbsp;'.$fetch['yim'].'<br />';
								}
								
								if($fetch['aim'] != '' )
								{
									echo 'AIM &nbsp;&nbsp;:&nbsp;'.$fetch['aim'].'<br />';
								}
								
								if($fetch['skype'] != '' )
								{
									echo 'Skype &nbsp;:&nbsp;'.$fetch['skype'].'<br />';
								}
								
								
								echo '</div></td>';
		  

				echo '  <td width="15%" nowrap="nowrap">'.date("j F, Y ,g:i a",strtotime($fetch['date_time'])).'</td>';
			
			
			echo '<td>';
			if(intval($fetch['status']) == 0)
			echo '<a href="representative.php?member_id='.$fetch['rep_id'].'&status=1"><img title="click to change active status" src="assets/icons/actions_small/cross-circle.png" /></a>';
			else
			echo '<a href="representative.php?member_id='.$fetch['rep_id'].'&status=0"><img title="click to change suspend status" src="assets/icons/actions_small/tick-circle.png" /></a>';
			
		
				  
				echo '</td>';
				
				
					echo '<td>';
					if(intval($fetch['display_status']) == 0)
			echo '<a href="representative.php?member_id='.$fetch['rep_id'].'&displaystatus=1"><img title="click to change suspend status" src="assets/icons/actions_small/cross-circle.png" /></a>';
			else
			echo '<a href="representative.php?member_id='.$fetch['rep_id'].'&displaystatus=0"><img title="click to change suspend status"src="assets/icons/actions_small/tick-circle.png" /></a>';
			
			echo '</td>';
				
				echo '</tr>
				';
	}

	} else {

		

    echo ' <tr>

    <td class="alert_stxt" valign="top" align="center" colspan="6">No Records Found</td>

    </tr>';

 	}

	?>





        

                     </tr></tbody></table>

      </div>

  </form>                 <div class="clearboth"></div>

</div> <!-- inner -->

</div>

					

			 <!-- inner -->

			

			<script language="javascript1.1" type="text/javascript">

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