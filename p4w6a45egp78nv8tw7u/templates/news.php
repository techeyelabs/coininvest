<!--Content Portion Start-->

<?php
 if(!in_array("Preferences",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }

	if($_GET['mem_id'])
	{
		$mem_id = (int)$_GET['mem_id'];
		$delte=mysql_query("delete from news where news_id='$mem_id'");
		$_SESSION['success_flag']="<font color='#004000'><b>News Successfully Deleted</b></font>";
		echo '<meta http-equiv="refresh" content="0;url=news.php">';
		exit();
	}
	
?>
<div id="primary_right">
				<div class="inner" style="width:900px">

					<?php require 'include/top/preferences.php'; ?>

					 <!-- end dashboard items -->
					<hr />
		
					<h1>View Site News</h1>
					<div style="padding-bottom:20px" align="right"><a href="add_news.php" class="button_link">Add News</a></div>
					  
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
					<table width="897" class="normal tablesorter fullwidth">
						<thead>
							<tr>
								<th width="28"><strong>Sno</strong></th>
								<th width="143"><strong>Date</strong></th>
								<th width="171"><strong>News Header</strong></th>
								<th width="451"><strong>News Description</strong></th>
								<th width="80"><strong>Action</strong></th>
							</tr>
						</thead>
						
						
						<tbody>
						     <?php

					$select_company = mysql_query(" SELECT * FROM `news` ORDER BY `news`.`dt` DESC");
					
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
								<td><?php echo $fetch['dt']; ?></td>
								<td><?php echo $fetch['news_header']; ?></td>
								<td><?php echo $fetch['news_description']; ?></td>
								
								<td>
									<a href="edit_news.php?id=<?php echo $fetch['news_id'];?>" title="Edit this News" class="tooltip table_icon"><img src="assets/icons/actions_small/Pencil.png" alt="" /></a> 
									<a href="news.php?mem_id=<?php echo $fetch['news_id'];?>" title="Delete this News" class="tooltip table_icon" onClick="javascript:return condelete();"><img src="assets/icons/actions_small/Trash.png" alt="" /></a>
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
confrm=window.confirm("Are You sure you want to delete this News");
return confrm;
}

			</script>
<!--Content Portion End-->
