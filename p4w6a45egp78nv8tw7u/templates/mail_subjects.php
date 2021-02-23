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
		
					<h1>View Mail Management</h1>
					
					  
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
								<th width="48"><strong>Sno</strong></th>
								<th width="238"><strong>From Id</strong></th>
								<th width="188"><strong>Mail From</strong></th>
								<th width="329"><strong>Subject</strong></th>
								
								<th width="70"><strong>Action</strong></th>
							</tr>
						</thead>
						
						
						<tbody>
						     <?php

					$select_company = mysql_query(" SELECT * FROM `mail_subjects` ORDER BY `mail_subjects`.`mail_id` ASC");
					
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
								<td><?php echo $fetch['from_id']; ?></td>
								<td><?php echo $fetch['mailfrom']; ?></td>
								<td><?php echo $fetch['mailsubject']; ?></td>
								
								
								<td>
									<a href="edit_mail_subjects.php?id=<?php echo $fetch['mail_id'];?>" title="Edit this Mail Content" class="tooltip table_icon"><img src="assets/icons/actions_small/Pencil.png" alt="" /></a> 
									
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
