<!--Content Portion Start-->

<?
 if(!in_array("Plan",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
	

	if($_GET['mem_id'])
	{
		$mem_id = (int)$_GET['mem_id'];
		$delte=mysql_query("delete from plan where plan_id='$mem_id'");
		$_SESSION['success_flag']="<font color='#004000'><b>Plan Successfully Deleted</b></font>";
		echo '<meta http-equiv="refresh" content="0;url=plan.php">';
		exit();
	}
	
?>
<div id="primary_right">
				<div class="inner" style="width:900px">

					<h1>Settings</h1>

					<ul class="dash">
				
						<li class="fade_hover tooltip" title="Manage your Site Settings">
							<a href="site_settings.php">
								<img src="assets/icons/dashboard/21.png" alt="" />
								<span>Site Settings</span>
							</a>
						</li>
						
						<li class="fade_hover tooltip" title="Manage Your Payment Settings">
							<a href="payment_settings.php">
								<img src="assets/icons/dashboard/86.png" alt="" /> 
								<span>Payment Settings</span>
							</a>
						</li>

						<li class="fade_hover tooltip" title="Manage Your Network Settings">
							
							<a href="network_settings.php">
								<img src="assets/icons/dashboard/30.png" alt="" />
								<span>Network Settings</span>
							</a>
						</li>
						<li class="fade_hover tooltip" title="Manage Your General Settings">
							
							<a href="general_settings.php">
								<img src="assets/icons/dashboard/122.png" alt="" />
								<span>General Settings</span>
							</a>
						</li>
						<li class="fade_hover tooltip" title="Manage Your Plan Settings">
							
							<a href="plan.php">
								<img src="assets/icons/dashboard/123.png" alt="" />
								<span>Plan Management </span>
							</a>
						</li>
					</ul> <!-- end dashboard items -->
					<hr />
		
					<h1>View Plans</h1>
					<div style="padding-bottom:20px" align="right"><a href="add_plan.php" class="button_link">Add New Plan</a></div>
					  
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
								<th width="143"><strong>Plan Name</strong></th>
								<th width="171"><strong>Register Amount (USD)</strong></th>
								<th width="171"><strong>Admin Fee (USD)</strong></th>
								<th width="171"><strong>No: of Referrals</strong></th>
								<th width="80"><strong>Action</strong></th>
							</tr>
						</thead>
						
						
						<tbody>
						     <?

					$select_company = mysql_query(" SELECT * FROM `plan` ORDER BY `plan`.`plan_id` ASC");
					
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
								<td><?=$fetch['plan_name']; ?></td>
								<td>$<?=$fetch['register_amt']; ?></td>
								<td>$<?=$fetch['admin_amount']; ?></td>
								<td><?=$fetch['no_downline']; ?> Nos</td>
								
								<td>
									<a href="edit_plan.php?id=<?=$fetch['plan_id'];?>" title="Edit this Plan" class="tooltip table_icon"><img src="assets/icons/actions_small/Pencil.png" alt="" /></a> 
									<a href="plan.php?mem_id=<?=$fetch['plan_id'];?>" title="Delete this Plan" class="tooltip table_icon" onClick="javascript:return condelete();"><img src="assets/icons/actions_small/Trash.png" alt="" /></a>
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
confrm=window.confirm("Are You sure you want to delete this Plan");
return confrm;
}

			</script>
<!--Content Portion End-->