<!--Content Portion Start-->
<div id="primary_right">
 <div class="inner" style="width:900px">
<?php require 'include/top/plan_management.php'; ?>
					 <!-- end dashboard items -->

					<hr />
                    <h1>List of Daily Interest</h1>
                    
                    
                     <?php if($_SESSION['success_flag'] != '')
					  { 
					  echo '<div class="notification success"> 
							<span></span> 
							<div class="text"> 
							<p><strong>Success!</strong>'.$_SESSION['success_flag'].'</p> 
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

<div align="right"><a href="add_interest.php" class="button_link">
Add</a></div><br />
  <table width="800" height="92" class="normal tablesorter fullwidth">
   
 <tr><td colspan="6"></td></tr>
						<thead>
 <tr>

                  <th width="17%" ><strong>DATE</strong></th>
                  <th width="15%" ><strong>BASIC PLAN</strong></th>
                  <th width="16%" ><strong>ADVANCED PLAN</strong></th>
                  <th width="17%" ><strong>PROFESSIONAL PLAN</strong></th>
				   <th width="13%" ><strong>SENIOR PLAN</strong></th>
				  <th width="9%" ><strong>Options</strong></th>
                </tr>
                </thead>
               
                                  <?php
if($_GET['count'] == '')
{	
	$count= 7;
}
else
{
	$count = (int)$_GET['count'];
}
if($count == '')
	$count = 7;

for($j=0; $j<=$count;$j++)
{
		$value = $j % 2;
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

<?php	
	$date = date('Y-m-d');
	$dd = mysql_fetch_array(mysql_query("SELECT DATE_SUB('".$date."', INTERVAL ".$j." DAY) as hc"));
	$ex = explode("-",$dd['hc']);
?>
<td><?php echo date('l, m/d/y', mktime(0, 0, 0, $ex[1], $ex[2], $ex[0])); ?></td>
<?php	
	//echo "SELECT * FROM `daily_interest` where change_date ='".$dd['hc']."' ORDER BY `daily_interest`.`plan_id` ASC";
	
	$select_date1 = mysql_query("SELECT * FROM `daily_interest` where change_date ='".$dd['hc']."' ORDER BY `daily_interest`.`plan_id` ASC");
	$i=0;
	if(mysql_num_rows($select_date1) > 0)
	{
	while($fetch_date1 = mysql_fetch_array($select_date1))
	{
		$i++;
		
		if($i ==1) $class = 'bgcolor="#ffe7c0"';
		if($i ==2) $class = 'bgcolor="#e9fcee"';
		if($i ==3) $class = 'bgcolor="#fff6d8"';
		if($i ==4) $class = 'bgcolor="#ffe5eb"';
		if($i ==5) $class = 'bgcolor="#fff9cc"';
?>



<td ><?php echo $fetch_date1['interest']; ?>%</td>
<?php
}
}	
else
{
	$ch = 1;
?>
<td  colspan="5"><a href="add_interest.php">Click here</a> to Create New Interest Rates</td>
<?php
}
if($ch != 1 && (date('Y-m-d') == $dd['hc']))
{
?>
<td >

<a  href="edit_interest.php?id=<?php echo $dd['hc'];?>" title="Edit this Interest" class="tooltip table_icon"><img src="assets/icons/actions_small/Pencil.png" alt="Edit this Interest" /></a>

 </td>
</tr>
<?php
}

$ch ='';
}

?> 
                
               </tr></tbody></table>
                 <div class="clearboth"></div>
</div> <!-- inner -->
</div>
<!--Content Portion End-->
<?php 
if($_SESSION['empty_pass'] != '')
unset($_SESSION['empty_pass']);
if($_SESSION['success_flag'] != '')
unset($_SESSION['success_flag']);
?>
		<script language="javascript1.1">
			function condelete()
{
var confrm;
confrm=window.confirm("Are You sure you want to delete this User");
return confrm;
}

			</script>