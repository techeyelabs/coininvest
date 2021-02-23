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


<form name='form1' method='post' action="edit_board_validate.php" enctype="multipart/form-data">

<div id="primary_right">

				<div class="inner" style="width:70%">
<? require 'include/top/matrix_management.php'; ?>

					<hr />
					<h1>Edit Board (Cycle)</h1>

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
					
					<? $fetch = mysql_fetch_array(mysql_query("select * from board where board_id=".$_GET['id'])); ?>
					
					<fieldset>

						<legend>Edit Board</legend>

						
						<p>

							<label>Rank Name <font color="#FF0000">*</font></label>

							: <input type="text" name="rank_name"  class="sf" value="<?=$fetch['rank_name']; $_SESSION['rank_name']=''; ?>"><? if($_SESSION['empty_rank_name']) { echo $_SESSION['empty_rank_name']; $_SESSION['empty_rank_name']=''; } ?>  

						</p>
						
						<p>

							<label>Board Width <font color="#FF0000">*</font></label>

							: <input type="text" name="board_width"  class="sf" value="<?=$fetch['board_width']; $_SESSION['board_width']=''; ?>"><? if($_SESSION['empty_board_width']) { echo $_SESSION['empty_board_width']; $_SESSION['empty_board_width']=''; } ?>  

						</p>
						<p>

							<label>Board Depth <font color="#FF0000">*</font></label>

							: <input type="text" name="board_depth"  class="sf" value="<?=$fetch['board_depth']; $_SESSION['board_depth']=''; ?>"><? if($_SESSION['empty_board_depth']) { echo $_SESSION['empty_board_depth']; $_SESSION['empty_board_depth']=''; } ?>  

						</p>
						
						<p>

							<label>Board Fee (EPin Fee)</label>

							: <input type="text" name="epin_amount"  class="sf" value="<?=$fetch['epin_amount']; $_SESSION['epin_amount']=''; ?>"><? if($_SESSION['empty_epin_amount']) { echo $_SESSION['empty_epin_amount']; $_SESSION['empty_epin_amount']=''; } ?>  

						</p>
						
						<p>

							<label>Board Income (Earnings)</label>

							: <input type="text" name="board_income"  class="sf" value="<?=$fetch['board_income']; $_SESSION['board_income']=''; ?>"><? if($_SESSION['empty_board_income']) { echo $_SESSION['empty_board_income']; $_SESSION['empty_board_income']=''; } ?>  

						</p>
						
						<p>

							<label>Ebook Image</label>

							: <input type="file" name="ebook_image"  class="sf" value=""><? if($_SESSION['empty_ebook_image']) { echo $_SESSION['empty_ebook_image']; $_SESSION['empty_ebook_image']=''; } ?>  

						</p>
						
						<p>

							<label>Upload Ebook (Product) </label>

							: <input type="file" name="ebook_path"  class="sf" value=""><? if($_SESSION['empty_ebook_path']) { echo $_SESSION['empty_ebook_path']; $_SESSION['empty_ebook_path']=''; } ?>  

						</p>
						
						<p>

							<label>Ebook Description <font color="#FF0000">*</font></label>

							: <textarea class="editor" name="ebook_desc">
<?=$fetch['ebook_desc']; ?>
							

						</textarea><? if($_SESSION['empty_ebook_desc']) { echo $_SESSION['empty_ebook_desc']; $_SESSION['empty_ebook_desc']=''; } ?>  

						</p>
						<p>

							<label>Board Status</label>

							: <input type="radio" name="board_status" value="on" <? if($fetch['board_status']=='on') echo 'checked="checked"'; ?> />On &nbsp;&nbsp;
							<input type="radio" name="board_status" value="off" <? if($fetch['board_status']=='off') echo 'checked="checked"'; ?> />Off &nbsp;&nbsp; <? if($_SESSION['empty_ebook_image']) { echo $_SESSION['empty_ebook_image']; $_SESSION['empty_ebook_image']=''; } ?>  

						</p>
						
												
							

						<hr />
						<div class="clearboth"></div>
						<p><input type="hidden" name="id" value="<?=$_GET['id']; ?>"  /><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
</form>