<!--Content Portion Start-->

<?

	if($_GET['mem_id'])
	{
		$mem_id = (int)$_GET['mem_id'];
		$delte=mysql_query("delete from video_table where video_id='$mem_id'");
		$_SESSION['success_flag']="<font color='#004000'><b>Promotional Videos Successfully Deleted</b></font>";
		echo '<meta http-equiv="refresh" content="0;url=videos.php">';
		exit();
	}
	
?>

<div id="primary_right">
				<div class="inner" style="width:900px">

					<? require 'include/top/promotional.php'; ?>

					 <!-- end dashboard items -->
					<hr />
		
					<h1>View Promotional Videos</h1>
					
					  
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
					<table width="897" class="normal tablesorter fullwidth">
						<thead>
							<tr>
								<th width="61"><strong>Sno</strong></th>
								<th width="519"><strong>Videos</strong></th>
								<th width="162"><strong>Status</strong></th>
								<th width="135"><strong>Action</strong></th>
							</tr>
						</thead>
						
						
						<tbody>
						     <?

					$select_company = mysql_query("select * from video_table");
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
								<td><?=$fetch['video_source']; ?></td>
								<td><?=ucfirst($fetch['video_status']); ?></td>
								<td>
									<a href="edit_videos.php?id=<?=$fetch['video_id'];?>" title="Edit this Videos" class="tooltip table_icon"><img src="assets/icons/actions_small/Pencil.png" alt="" /></a> 
									<a href="videos.php?mem_id=<?=$fetch['video_id'];?>" title="Delete this Videos" class="tooltip table_icon" onClick="javascript:return condelete();"><img src="assets/icons/actions_small/Trash.png" alt="" /></a>
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
confrm=window.confirm("Are You sure you want to delete this Videos");
return confrm;
}

			</script>
