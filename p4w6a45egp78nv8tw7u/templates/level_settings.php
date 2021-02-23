<!--Content Portion Start-->
<?php

	if($_GET['mem_id'])
	{
		$mem_id = (int)$_GET['mem_id'];
		$delte=mysql_query("delete from level_commission where level_id='$mem_id'");
		$_SESSION['success_flag']="<font color='#004000'><b>Level Successfully Deleted</b></font>";
		echo '<meta http-equiv="refresh" content="0;url=level_settings.php">';
		exit();
	}
	
?>
<div id="primary_right">
				<div class="inner" style="width:70%">
<?php require 'include/top/referral.php'; ?>

					<hr />

					<h1>View Level Settings</h1>
                    
                    
                      <?php if($_SESSION['succ_dir'] != '')
					  { 
					  echo '<div class="notification success"> 
							<span></span> 
							<div class="text"> 
							<p><strong>Success!</strong>'.$_SESSION['succ_dir'].'</p> 
							</div> 
						 </div>';
						} ?>
                        
              <?php if($_SESSION['empty_pass'] != '')
					  { 
					  echo '<div class="notification error" style="cursor: auto;"> 
						<span></span> 
						<div class="text"> 
							<p><strong><cufon class="cufon cufon-canvas" alt="Error!" style="width: 52px; height: 22px;"><canvas width="70" height="23" style="width: 70px; height: 23px; top: -1px; left: -1px;"></canvas><cufontext>Error!</cufontext></cufon></strong><font size="1" color="#ff0000">'.$_SESSION['empty_pass'].'</font></p> 
						</div> 
					</div>';
						} ?>
                        <div align="right" style="width:80%"><a class="button_link"  href="add_level.php">Add</a></div><br />
                        
                         <table  height="92" class="normal tablesorter fullwidth" style="width:80%">

						<thead>
 <tr>

                  <th width="10%" ><strong>Sno</strong></th>
                  <th width="20" ><strong>Level Name</strong></th>
                  <th width="20%" ><strong>Commission (%)</strong></th>
                   <th width="20%" ><strong>Status</strong></th>
                  <th width="30%" ><strong>Options</strong></th>
				
                </thead>
                <tr>
                  <td colspan="11" class="bottom_line"></td>
                  </tr>
                <?php

					$select_company = mysql_query("select * from level_commission");
					 $out='';
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
												
			
                
                $out.='<tr class="'.$class.'">
                  <td>'.$i.'</td>
                  <td>'.$fetch['level_name'].'</td>
                  <td>'.$fetch['level_commission'].'</td>';
				  if($fetch['status'] == 1)
				  {
					  $out.=' <td> <div class="iPhoneCheckContainer" style="width: 45px;"><input type="checkbox" value="1" name="status" class="iphone" checked="checked"><label class="iPhoneCheckLabelOff" style="width: 40px;"><span style="margin-right: -26px;">off</span></label><label class="iPhoneCheckLabelOn" style="width: 40px;"><span>on</span></label><div class="iPhoneCheckHandle" style="left: 25px;"></div></div></td>';
				  }
				  else
				  {
					   $out.=' <td><div class="iPhoneCheckContainer" style="width: 45px;"><input type="checkbox" value="yes" id="bonus" name="bouns" class="iphone"><label class="iPhoneCheckLabelOff" style="width: 40px;"><span>off</span></label><label class="iPhoneCheckLabelOn" style="width: 0px;"><span style="margin-left: -26px;">on</span></label><div class="iPhoneCheckHandle"></div></div></td>';
				  }
				 
				  
                 $out.=' <td>
				  	<a href="edit_level.php?id='.$fetch['level_id'].'" title="Edit this level" class="tooltip table_icon">
					<img src="assets/icons/actions_small/Pencil.png" alt=""Edit" /></a>
					
					<a href="level_settings.php?mem_id='.$fetch['level_id'].'" title="Delete this level" class="tooltip table_icon" onClick="javascript:return condelete();"><img src="assets/icons/actions_small/Trash.png" alt="Delete" />
</td>
                </tr>';
				
				}
				echo $out;
				
					} else {
				
                echo ' <tr>
                  <td colspan="4">No Records Found</td>
                  </tr>';
               
				}
				?>
               <?php
			  
			   unset($_SESSION['empty_pass']);
			   unset($_SESSION['succ_dir']);
			   ?>
              
<!--Content Portion End-->
		<script language="javascript1.1">
function condelete()
{
var confrm;
confrm=window.confirm("Are You sure you want to delete this User");
return confrm;
}

			</script>