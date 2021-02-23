<!--Content Portion Start-->
<script type="text/javascript" src="js/ajax.js"></script>

<script type="text/javascript">

function changeAmt(val)

{

	url1="sub_cat.php?id="+val;

	divid1="chk4";

	ajax(url1,divid1);



}



</script>
<?

	$fetch=mysql_fetch_array(mysql_query("select * from products where products_id =".$_GET['id']));
?>

<form name='form1' method='post' action="products_validate.php" enctype="multipart/form-data">
<input type="hidden" name="edit_button" value="1" />
<input type="hidden" name="id" value="<?=$_GET['id']; ?>" />

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
					<h1>Edit Prodcuts</h1>

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

						<legend>Edit a New Products</legend>

						
						<p>

							<label>Select Category Name <font color="#FF0000">*</font></label>

							: <select name="cat_id"  onchange="changeAmt(this.value)">
							<option value="0">-Select-</option>
							<?
								$select = mysql_query("select * from category where cat_status='on'");
								while($cat_info = mysql_fetch_array($select))
								{
									if($fetch['cat_id'] == $cat_info['cat_id'])
									{
							?>
								<option value="<?=$cat_info['cat_id']; ?>" selected="selected"><?=$cat_info['cat_name']; ?></option>
							<?		} else {
							?>
								<option value="<?=$cat_info['cat_id']; ?>"><?=$cat_info['cat_name']; ?></option>
							<?
							}
							}
							?>
							</select> 
							<? if($_SESSION['empty_cat_id']) { echo $_SESSION['empty_cat_id']; $_SESSION['empty_cat_id']=''; } ?>

							

						</p>
						

						<p>

							<label>Sub Category Name <font color="#FF0000">*</font></label>

							: <span id="chk4"><select name="sub_cat_id"  onchange="changeAmt(this.value)">
							<option value="0">-Select-</option>
							<?
								$select1 = mysql_query("select * from sub_category where sub_cat_id='".$fetch['sub_cat_id']."'");
								while($cat_info1 = mysql_fetch_array($select1))
								{
									if($fetch['sub_cat_id'] == $cat_info1['cat_id'])
									{
							?>
								<option value="<?=$cat_info1['sub_cat_id']; ?>" selected="selected"><?=$cat_info1['sub_cat_name']; ?></option>
							<?		} else {
							?>
								<option value="<?=$cat_info1['sub_cat_id']; ?>"><?=$cat_info1['sub_cat_name']; ?></option>
							<?
							}
							}
							?>
							</select> </span>
							<? if($_SESSION['empty_sub_cat_id']) { echo $_SESSION['empty_sub_cat_id']; $_SESSION['empty_sub_cat_id']=''; } ?>

							

						</p>

						<p>

							<label>Product Name <font color="#FF0000">*</font></label>

							: <input type="text" name="products_name"  class="sf" value="<?=$fetch['products_name']; $_SESSION['products_name']=''; ?>"><? if($_SESSION['empty_products_name']) { echo $_SESSION['empty_products_name']; $_SESSION['empty_products_name']=''; } ?>  

						</p>
						
						<p>

							<label>Product Image<font color="#FF0000">*</font></label>

							: <input type="file" name="products_image"  class="sf" value=""><? if($_SESSION['empty_products_image']) { echo $_SESSION['empty_products_image']; $_SESSION['empty_products_image']=''; } ?>  

						</p>
						
						<p>

							<label>Product Description <font color="#FF0000">*</font></label>

							: <textarea class="editor" name="products_desc">

							<?=$fetch['products_desc']; ?>

						</textarea><? if($_SESSION['empty_products_desc']) { echo $_SESSION['empty_products_desc']; $_SESSION['empty_products_desc']=''; } ?>  

						</p>
						
												
						<p>

							<label>Products Strike Price &euro; <font color="#FF0000">*</font></label>

							: <input type="text" name="products_mr_price"  class="sf" value="<?=$fetch['products_mr_price']; $_SESSION['products_mr_price']=''; ?>"><? if($_SESSION['empty_products_mr_price']) { echo $_SESSION['empty_products_mr_price']; $_SESSION['empty_products_mr_price']=''; } ?>  

						</p>
						
						<p>

							<label>Products Price &euro; <font color="#FF0000">*</font></label>

							: <input type="text" name="products_price"  class="sf" value="<?=$fetch['products_price']; $_SESSION['products_price']=''; ?>"><? if($_SESSION['empty_products_price']) { echo $_SESSION['empty_products_price']; $_SESSION['empty_products_price']=''; } ?>  

						</p>	

						<hr />

						

						<div class="clearboth"></div>

						

						<p><input class="button" type="submit" value="Submit" name="submit" /></p>

					</fieldset>

					<div class="clearboth"></div>

					

				</div> <!-- inner -->

			</div>

</form>