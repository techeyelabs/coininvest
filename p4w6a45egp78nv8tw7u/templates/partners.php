<!--Content Portion Start-->

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

                            

                           <th width="56"><strong>Name</strong></th>

							  <th width="20%"><strong>Email Id</strong></th>

							  <th width="20%" nowrap="nowrap"><strong>EXNESS Accoun</strong></th>

                              <th width="20%" nowrap="nowrap"><strong>IB Application</strong></th>
                              <th width="20%" nowrap="nowrap"><strong>Date</strong></th>
                              <th width="20%" nowrap="nowrap"><strong>IP Address</strong></th>

							 

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

				$sql = "select * from parterners where name != ''";

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

					
				echo '<tr class="'.$class.'">';

				  echo ' <td width="20%">'.$fetch['name'].'</td>

                  <td width="20%">'.$fetch['email_id'].'</td>

                  <td width="20%">'.$fetch['eexness_account'].'</td>

                  <td width="20%">'.$fetch['ib_application'].'</td>

				  <td width="20%" nowrap="nowrap">'.date("j F, Y ,g:i a",strtotime($fetch['date_time'])).'</td>
		
				   <td width="20%">'.$fetch['ip_address'].'</td>
				</tr>
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