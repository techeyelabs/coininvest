<!--Content Portion Start-->



<?



	if($_GET['mem_id'])

	{

		$mem_id = (int)$_GET['mem_id'];

		$delte=mysql_query("delete from board where board_id='$mem_id'");

		$_SESSION['success_flag']="<font color='#004000'><b>Board Successfully Deleted</b></font>";

		echo '<meta http-equiv="refresh" content="0;url=board.php">';

		exit();

	}

	

?>

<div id="primary_right">

				<div class="inner" style="width:900px">

<? require 'include/top/matrix_management.php'; ?>
					 <!-- end dashboard items -->

					<hr />

		

					<h1>View Boards</h1>

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

					<table width="771" class="normal tablesorter fullwidth">

						<thead>

							<tr>

								<th width="28"><strong>Sno</strong></th>

								<th width="87"><strong>Rank Name</strong></th>
								
								<th width="89"><strong>Matrix Type</strong></th>

								<th width="121"><strong>E-Book</strong></th>
								<th width="121"><strong>E-Book Image</strong></th>
								
								<th width="92"><strong>E-Pin Fee</strong></th>
								<th width="115"><strong>Board Income</strong></th>
								<th width="82"><strong>Action</strong></th>

							</tr>

						</thead>
						<tbody>

						     <?



					$select_company = mysql_query("SELECT * FROM `board` ORDER BY `board`.`board_id` ASC");

					

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
							<tr class="<?=$class; ?>">

								<td><?=$i; ?></td>

								<td><?=$fetch['rank_name']; ?></td>
								<td style="padding-left:30px"><?=$fetch['board_width']; ?> X <?=$fetch['board_depth']; ?></td>
								<td><a href="../<?=$fetch['ebook_path']; ?>" style="text-decoration:none"><img src="assets/download.png" alt="download" border="0"></a></td>
								<td><img src="../<?=$fetch['ebook_image']; ?>" width="110px" height="110px" /></td>
								<td>$<?=$fetch['epin_amount']; ?> USD</td>
								<td>$<?=$fetch['board_income']; ?> USD</td>


								
								<td>

									<a href="edit_board.php?id=<?=$fetch['board_id'];?>" title="Edit this Board" class="tooltip table_icon" onClick="javascript:return conedit();"><img src="assets/icons/actions_small/Pencil.png" alt="" /></a> 

									<a href="products.php?mem_id=<?=$fetch['products_id'];?>" title="Delete this Products" class="tooltip table_icon" onClick="javascript:return condelete();"><img src="assets/icons/actions_small/Trash.png" alt="" /></a>

								</td>

							</tr>

							

							 <?

				

				}

				

					} else {

				?>

                 <tr class="odd">

                  <td valign="top" align="center" colspan="9">No Records Found</td>

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

confrm=window.confirm("Are You sure you want to delete this Products");

return confrm;

}
function conedit()

{

var confrm;

confrm=window.confirm("If you Edit this Board, Genealogy Structure will collasped. Click Ok to continue");

return confrm;

}



			</script>

<!--Content Portion End-->