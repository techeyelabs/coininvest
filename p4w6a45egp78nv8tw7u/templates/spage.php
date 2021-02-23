<!--Content Portion Start-->

<?

	if($_GET['mem_id'])
	{
		$mem_id = (int)$_GET['mem_id'];
		$select_info = mysql_fetch_array(mysql_query("select * from splash_pages where page_id=".$mem_id));
		$page_url = "../".$select_info['page_url']; 
		
		rmdir($page_url);
	
		$delte=mysql_query("delete from splash_pages where page_id='$mem_id'");
		$_SESSION['success_flag']="<font color='#004000'><b>Splash pages Successfully Deleted</b></font>";
		echo '<meta http-equiv="refresh" content="0;url=spage.php">';
		exit();
	}
	
?>
<div id="primary_right">
				<div class="inner" style="width:900px">

					<? require 'include/top/preferences.php'; ?><!-- end dashboard items -->
					<hr />
		
					<h1>View Lead Captures Page</h1>
					<div style="padding-bottom:20px" align="right"><a href="add_spage.php" class="button_link">Create Lead page</a></div>
					  
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
								<th width="28"><strong>Sno</strong></th>
								<th width="143"><strong>Page Title</strong></th>
								<th width="533"><strong>Page Link</strong></th>
								<th width="89"><strong>Status</strong></th>
								<th width="80"><strong>Action</strong></th>
							</tr>
						</thead>
						
						
						<tbody>
						     <? 
					$sql_query_fetch=mysql_fetch_array(mysql_query("select * from admin_settings where admin_settings_id =1"));
				
					$site_name =$sql_query_fetch['site_name'];
					
					
						$select_company = mysql_query("select * from splash_pages");
					
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
								<td><?=$fetch['page_title']; ?></td>
								<td><A href="<?=$site_name.$fetch['page_url']; ?>" target="_blank" style="text-decoration:none"><?=$site_name.$fetch['page_url']; ?></A></td>
								<td><?=ucfirst($fetch['status']); ?></td>
								
								<td>
									
									<a href="spage.php?mem_id=<?=$fetch['page_id'];?>" title="Delete this Lead page" class="tooltip table_icon" onClick="javascript:return condelete();"><img src="assets/icons/actions_small/Trash.png" alt="" /></a>
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
confrm=window.confirm("Are You sure you want to delete this Lead Page ");
return confrm;
}

			</script>
<!--Content Portion End-->