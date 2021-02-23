<!--Content Portion Start-->

<?php
if(!in_array("SubAdmin",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }

	if($_GET['mem_id'])
	{
		$mem_id = (int)$_GET['mem_id'];

		$delte=mysql_query("delete from admin where admin_id='$mem_id'");

		$_SESSION['succ_dir']="<font color='#004000'><b>Sub Admin Successfully Deleted</b></font>";

		echo '<meta http-equiv="refresh" content="0;url=subadmin.php">';

		exit();

	}

	

?>

<div id="primary_right">

				<div class="inner" style="width:900px">



					<?php require 'include/top/subadmin.php'; ?>



					 <!-- end dashboard items -->

					<hr />

		

					<h1>View Site Sub Admin</h1>

					<div style="padding-bottom:20px" align="right"><a href="create_subadmin.php" class="button_link">Add New Sub Admin</a></div>

					  

 <?php if($_SESSION['succ_dir']) { 

	?>

	 <div class="notification success"> 

					<span></span> 

					<div class="text"> 

			<p><strong>Success!</strong> <?php echo $_SESSION['succ_dir']; $_SESSION['succ_dir']=''; ?> </p> 

					</div> 

				  </div>

    <?php

    } ?>

					<table width="897" class="normal tablesorter fullwidth">

						<thead>

							<tr>

								<th width="28"><strong>Sno</strong></th>

								<th width="143"><strong>Username</strong></th>

								<th width="471"><strong>Privilege</strong></th>
								<th width="80"><strong>Action</strong></th>

							</tr>

						</thead>

						

						

						<tbody>

						     <?php



					$select_company = mysql_query(" SELECT * FROM `admin` where admin_id <> 1 ORDER BY `admin`.`admin_id` ASC");

					

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

												

				?>

                

							<tr class="<?php echo $class; ?>">

								<td><?php echo $i; ?></td>

								<td><?php echo $fetch['username']; ?></td>

								<td><?php echo $fetch['permission']; ?></td>

								<td>

				<a href="edit_subadmin.php?id=<?php echo $fetch['admin_id'];?>" title="Edit this Sub Admin" class="tooltip table_icon"><img src="assets/icons/actions_small/Pencil.png" alt="" /></a> 

				<a href="subadmin.php?mem_id=<?php echo $fetch['admin_id'];?>" title="Delete this Sub Admin" class="tooltip table_icon" onClick="javascript:return condelete();"><img src="assets/icons/actions_small/Trash.png" alt="" /></a>

								</td>

							</tr>

							

				 <?php			

				}

				

					} else {

				?>

                 <tr class="odd">

                  <td valign="top" align="center" colspan="7">No Records Found</td>

                  </tr>

                <?php

				}

				?>

						</tbody>

				  </table>

         

					<div class="clearboth"></div>



					

				</div> <!-- inner -->

			</div>

			<script language="javascript1.1">

			function condelete()

{

var confrm;

confrm=window.confirm("Are You sure you want to delete this Sub Admin ?");

return confrm;

}



			</script>

<!--Content Portion End-->
