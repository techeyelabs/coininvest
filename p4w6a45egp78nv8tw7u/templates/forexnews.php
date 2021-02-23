<!--Content Portion Start-->

<?

	if($_GET['mem_id'])
	{
		$mem_id = (int)$_GET['mem_id'];
		$delte=mysql_query("delete from forexnews where news_id='$mem_id'");
		$_SESSION['success_flag']="<font color='#004000'><b>News Successfully Deleted</b></font>";
		echo '<meta http-equiv="refresh" content="0;url=forexnews.php">';
		exit();
	}
	
?>

<!--Content Portion Start-->

<div id="primary_right">

			
                <div class="inner" style="width:900px">

<?php require 'include/top/content_management.php'; ?>
					 <!-- end dashboard items -->

					<hr />
                    <h1>Forex News Management</h1>
                    
                    
                     <?php if($_SESSION['success_flag'] != '')
					  { 
					  echo '<div class="notification success"> 
							<span></span> 
							<div class="text"> 
							<p><strong>Success!</strong>'.$_SESSION['success_flag'].'</p> 
							</div> 
						 </div>';
						} ?>
    
                     <div align="right"> <a class="button_link" href="add_forexnews.php">Add</a></div><br />
                        <table width="800" height="92" class="normal tablesorter fullwidth">

						<thead>


                  
                  
			     <tr>
                  <th width="4%%"><strong>Sno</strong></th>
                  <th width="14%" ><strong>Date</strong></th>
                  <th width="28%"><strong>News Header</strong></th>
                  <th width="40%" ><strong>News Description</strong></th>
				   <th width="14" ><strong>Options</strong></th>
                 
                </tr>

						</thead>
						<tbody>
   

                <?

					$select_company = mysql_query("SELECT * FROM forexnews ORDER BY dt DESC");
					
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
                  <td style="padding-bottom:500px" valign="top"><?=$i; ?></td>
                  <td style="padding-bottom:500px" valign="top"><?=$fetch['dt']; ?></td>
                  <td style="padding-bottom:500px" valign="top"><?=$fetch['news_header']; ?></td>
                  <td ><?=$fetch['news_description']; ?></td>
                  <td style="padding-bottom:500px" valign="top">
                   <a  href="edit_forexnews.php?id=<?=$fetch['news_id'];?>" title="Edit this News" class="tooltip table_icon">
                  <img src="assets/icons/actions_small/Pencil.png" alt="Edit Plans" /></a>
                  &nbsp;&nbsp;<a  href="forexnews.php?mem_id=<?=$fetch['news_id'];?>" title="Delete this News" class="tooltip table_icon" onClick="javascript:return condelete();"><img src="assets/icons/actions_small/Trash.png" alt="Delete Plans" /></a>
              </td>
                </tr>
                <?
				
				}
				
					} else {
				?>
                 <tr>
                  <td  align="center" colspan="6">No Records Found</td>
                  </tr>
                <?
				}
				?>
                
                <tr>
                  <td colspan="11" class="bottom_line">&nbsp;</td>
                  </tr>
                <!--<tr>
                  <td colspan="11" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="77%" align="left" class="pagination_bar"><a href="#">?</a> <a href="#" class="current">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">7</a> <a href="#">8</a> <a href="#">?</a></td>
                      <td width="23%" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="51%" align="center" class="page_10">Results Per Page:</td>
                          <td width="18%" align="center" valign="bottom" class="page_25"><a href="#" class="current">25</a></td>
                          <td width="16%" align="center" valign="bottom" class="page_50"><a href="#">50</a></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                  </tr>-->
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
</div>
<!--Content Portion End-->