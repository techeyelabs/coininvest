<!--Content Portion Start-->

<? 

	

	$fetch=mysql_fetch_array(mysql_query("select * from sub_category where sub_cat_id =".$_GET['id']));

	

	

	

	if($_POST['submit'])

	{



		$cate_name = $_POST['cboCategory'];
		$plan_name = $_POST['plan_name'];
		$pcdesc = $_POST['status'];
		if($pcdesc == '')
		{
			$pcdesc = 'off';
		}
		else
		{
			$pcdesc = 'on';
		}

		if($plan_name != '' && $cate_name != '')

		{

			$update=mysql_query("update sub_category set cat_id = '$cate_name',sub_cat_name = '$plan_name',sub_cat_status = '$pcdesc' where sub_cat_id ='".$_GET['id']."'");

			$_SESSION['success_flag']='<font color="#006600">Sub Category Updated Successfully</font>';

			echo '<meta http-equiv="refresh" content="0; url=sub_category.php" />';

			exit();

		}

		else

		{

			$_SESSION['empty_pass']="<font color='#FF0000'>Please check All the values</font>";

			echo '<meta http-equiv="refresh" content="0;url=edit_sub_category.php?id="'.$_GET['id'].'>';

			exit();

		}

	}

	

	

?>



<form name='form1' method='post' action="edit_sub_category.php?id=<?=$_GET['id']; ?>" >

<div id="primary_right">

				<div class="inner" style="width:70%">

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




					 

					<hr />



					<h1>Sub Category</h1>

				 <? if($_SESSION['succ_dir']) 

					 { 

					?>

					<div class="notification success"> 

					<span></span> 

					<div class="text"> 

						<p><strong>Success!</strong> <? echo $_SESSION['succ_dir']; $_SESSION['succ_dir']=''; ?> </p> 

					</div> 

					</div>

					<?

					

					}

					?>

					

					 <? if($_SESSION['empty_pass']) 

					 { 

					?>

					<div class="notification error"> 

						<span></span> 

						<div class="text"> 

							<p><strong>Error!</strong> <? echo $_SESSION['empty_pass']; $_SESSION['empty_pass']=''; ?></p> 

						</div> 

					</div>

					<?

					

					}

					?>

					<fieldset>

						<legend>Edit Sub Category</legend>

						
						<p>

							<label>Select Category Name <font color="#FF0000">*</font></label>

							: <? CreateOption('Category',$fetch['cat_id'],'category')?><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>

							

						</p>
						

						<p>

							<label>Sub Category Name <font color="#FF0000">*</font></label>

							: <input class="mf" name="plan_name" type="text" value="<?=$fetch['sub_cat_name']; ?>" /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>

							

						</p>

						

						<p>

							<label>Category Status <font color="#FF0000">*</font></label>

							: <input type="checkbox" class="iphone" <? if($fetch['sub_cat_status'] =='on') { ?> checked="checked" <? } ?>  name="status" />

							

						</p>

						

						

					

						

						<hr />

						

						<div class="clearboth"></div>

						

						<p><input class="button" type="submit" value="Submit" name="submit" /></p>

					</fieldset>

					<div class="clearboth"></div>

					

				</div> <!-- inner -->

			</div>

</form>