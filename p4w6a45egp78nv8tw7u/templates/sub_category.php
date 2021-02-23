<!--Content Portion Start-->



<?



	if($_GET['mem_id'])

	{

		$mem_id = (int)$_GET['mem_id'];

		$delte=mysql_query("delete from sub_category where sub_cat_id='$mem_id'");

		$_SESSION['success_flag']="<font color='#004000'><b>Sub Category Successfully Deleted</b></font>";

		echo '<meta http-equiv="refresh" content="0;url=sub_category.php">';

		exit();

	}

	

?>

<div id="primary_right">

				<div class="inner" style="width:900px">

<h1>Products Management</h1>



					<ul class="dash">

				
						<li class="fade_hover tooltip" title="Create a New Category">

							<a href="add_category.php">

								<img src="assets/icons/dashboard/15.png" alt="" />

								<span>Create Category</span>

							</a>

						</li>
						
						<li class="fade_hover tooltip" title="Manage your Product Category">

							<a href="category.php">

								<img src="assets/icons/dashboard/13.png" alt="" />

								<span>Manage Category</span>

							</a>

						</li>

					
						<li class="fade_hover tooltip" title="Create a New Sub Category">

							<a href="add_sub_category.php">

								<img src="assets/icons/dashboard/11.png" alt="" />

								<span>Add SubCategory</span>

							</a>

						</li>
						
					<li class="fade_hover tooltip" title="Manage your Sub Category">

							<a href="sub_category.php">

								<img src="assets/icons/dashboard/4.png" alt="" />

								<span>Sub Category</span>

							</a>

						</li>

						<li class="fade_hover tooltip" title="Add a New Product">

							<a href="add_products.php">

								<img src="assets/icons/dashboard/76.png" alt="" />

								<span>Add Products</span>

							</a>

						</li>

					
						<li class="fade_hover tooltip" title="Manage your Products">

							<a href="products.php">

								<img src="assets/icons/dashboard/78.png" alt="" />

								<span>Manage Prodcuts</span>

							</a>

						</li>

					</ul> 

					 <!-- end dashboard items -->

					<hr />

		

					<h1>View Sub Category</h1>

					<!--<div style="padding-bottom:20px" align="right"><a href="add_news.php" class="button_link">Add News</a></div>-->

					  

 <? if($_SESSION['success_flag']) { 

	?>

	 <div class="notification success"> 

					<span></span> 

					<div class="text"> 

						<p><strong>Success!</strong> <? echo $_SESSION['success_flag']; $_SESSION['success_flag']=''; ?> </p> 

					</div> 

				  </div>

    <?

    } ?>

					<table width="771" class="normal tablesorter">

						<thead>

							<tr>

								<th width="30"><strong>Sno</strong></th>

								<th width="194"><strong>Category Name</strong></th>
								
								<th width="240"><strong>Sub Category Name</strong></th>

								<th width="193"><strong>Sub Category Status</strong></th>

								<th width="90"><strong>Action</strong></th>

							</tr>

						</thead>
						<tbody>

						     <?



					$select_company = mysql_query(" SELECT * FROM `sub_category` ORDER BY `sub_category`.`sub_cat_id` DESC");

					

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
						
						$select_main = mysql_fetch_array(mysql_query("select * from category where cat_id=".$fetch['cat_id']));
				?>
							<tr class="<?=$class; ?>">

								<td><?=$i; ?></td>

								<td><?=$select_main['cat_name']; ?></td>
								<td><?=$fetch['sub_cat_name']; ?></td>

								<td><?=$fetch['sub_cat_status']; ?></td>
								<td>

									<a href="edit_sub_category.php?id=<?=$fetch['sub_cat_id'];?>" title="Edit this Sub Category" class="tooltip table_icon"><img src="assets/icons/actions_small/Pencil.png" alt="" /></a> 

									<a href="sub_category.php?mem_id=<?=$fetch['sub_cat_id'];?>" title="Delete this Sub Category" class="tooltip table_icon" onClick="javascript:return condelete();"><img src="assets/icons/actions_small/Trash.png" alt="" /></a>

								</td>

							</tr>

							

							 <?

				

				}

				

					} else {

				?>

                 <tr class="odd">

                  <td valign="top" align="center" colspan="7">No Records Found</td>

                  </tr>

                <?

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

confrm=window.confirm("Are You sure you want to delete this sub category");

return confrm;

}



			</script>

<!--Content Portion End-->