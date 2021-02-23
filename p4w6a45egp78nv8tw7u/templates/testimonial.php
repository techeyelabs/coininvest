<script type="text/javascript" src="../js/highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="../js/highslide/highslide.css" />
<script type="text/javascript">
	hs.graphicsDir = '../js/highslide/graphics/';
	hs.outlineType = 'rounded-white';
	hs.showCredits = false;
	hs.wrapperClassName = 'draggable-header';
</script>
<!--Content Portion Start-->
<div id="primary_right">
				<div class="inner" style="width:900px">
         <?php
if(isset($_GET['test_id']) && isset($_GET['status']) )
{

	mysql_query("update testimonial set test_status='".intval($_GET['status'])."' where test_id='".intval($_GET['test_id'])."'");

	$_SESSION['succ_dir']='<font color="#006600">Successfully Updated</font>';
	echo '<meta http-equiv="refresh" content="0; url=testimonial.php" />';
	exit();
}

if($_GET['mem_id'])
	{
		$mem_id = (int)$_GET['mem_id'];
		$delte=mysql_query("delete from testimonial where test_id='$mem_id'");
		$_SESSION['success_flag']="<font color='#004000'><b>Testimonial Successfully Deleted</b></font>";
		echo '<meta http-equiv="refresh" content="0;url=testimonial.php">';
		exit();
	}
?>

					<?php
                     require 'include/top/preferences.php'; ?>
					 
					  <?php require 'include/page1.php'; ?>
					
					 <!-- end dashboard items -->
					<hr />
		  
				  <h1>Testimonial</h1>

					
					<?php
				 $select_company = mysql_query("SELECT * FROM testimonial ORDER BY `date_time`");
					
					?>
                    
                    
                    <?php
					
					$sql = "SELECT * FROM testimonial";

							$query =  $sql.$addsql;

							//$query =  $sql;

							$total_pages = mysql_num_rows(mysql_query($query));

								

							$limit = 10; 	

							if(isset($_GET['page']))

							{

								$page=intval(trim($_GET['page']));

							}

							else

							{

								$page=1;

							}

							if($page) 

								$start = ($page - 1) * $limit; 		

							else

								$start = 0;	

								

							$select_company = mysql_query($sql);

								

							$query = $query." order by date_time desc limit $start, $limit";
							

							$select_company = mysql_query($query);

								

							//$link=$_SERVER['PHP_SELF'];

							$link='http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'?page=';

							

							$paging=newpage($page,$total_pages,$limit,$link);

							echo $paging;
					?>
                    
                   
              <table class="normal tablesorter fullwidth" width="100%">
						<thead>
							<tr>
								<th width="10%"><strong>SNo</strong></th>
                              <th width="15%"><strong>User Name</strong></th>
							  <th width="13%"><strong>Subject</strong></th>
							  <th width="13%"><strong>Message</strong></th>
                              <th width="27%"><strong>Date</strong></th>
							  <th width="12%"><strong>Actions</strong></th>
                                <th width="10%"><strong>status</strong></th>

                                
							  <!--<th><strong>Payment Mode</strong></th>-->
								
								
							</tr>
						</thead>
						
						
						<tbody>
                        
                      
				<?php
				
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
						
						
						
						
						$username1 = "select username from members where member_id='".$fetch['userid']."'";
						$username=mysql_fetch_array(mysql_query($username1));
											//$select_company = mysql_query("SELECT * FROM testimonial ORDER BY `testimonial`.`date_time` DESC");

						
						
				?>

							<tr class="<?php echo $class; ?>">
								<td width="10%"><?php echo $i;?></td>
                                <td width="15%"><?php echo $username['username']; ?></td>
							  <td width="13%"><?php echo $fetch['test_title']; ?></td>
                                
							  <td width="13%"><!--<a href="" onclick="return hs.htmlExpand(this,{ headingText: \''.$fetch['subject'].'\' })">
								<?php echo substr($fetch['test_desc'],0,10); ?></a>
								<div class="highslide-maincontent">-->
								<?php echo substr($fetch['test_desc'],0,10); ?><!--</div>--></td>
                              <td width="27%"><?php echo date("j F, Y ",strtotime($fetch['date_time'])); ?></td>
                              <td>
                                <a href="edit_testimonial.php?id=<?php echo $fetch['test_id'];?>" title="Edit Testimonial" class="tooltip table_icon"><img src="assets/icons/actions_small/Pencil.png" alt="" /></a>
                                <a href="testimonial.php?mem_id=<?php echo $fetch['test_id'];?>" title="Delete this Testimonial" class="tooltip table_icon" onClick="javascript:return condelete();"><img src="assets/icons/actions_small/Trash.png" alt="" /></a>
                                </td>
                               
		<?php echo '<td>';
			if(intval($fetch['test_status']) == 1)
			echo '<a href="testimonial.php?test_id='.$fetch['test_id'].'&status=0"><img title="click to change active status" src="assets/icons/actions_small/tick-circle.png" /></a>';
			else
			echo '<a href="testimonial.php?test_id='.$fetch['test_id'].'&status=1"><img title="click to change suspend status" src="assets/icons/actions_small/cross-circle.png" /></a>';
				echo '</td>';?>
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
confrm=window.confirm("Are You sure you want to delete this Testimonial");
return confrm;
}

			</script>
<!--Content Portion End-->
