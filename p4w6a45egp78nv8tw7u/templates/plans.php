<!--Content Portion Start-->

<div id="primary_right">

			
                <div class="inner" >

<?php require 'include/top/plan_management.php'; ?>
					 <!-- end dashboard items -->

					<hr />
                    <h1 style="color:#fff">  List of Plans</h1>
                    
                    
                     <?php if($_SESSION['success_flag'] != '')
					  { 
					  echo '<div class="notification success"> 
							<span></span> 
							<div class="text"> 
							<p><strong>Success!</strong>'.$_SESSION['success_flag'].'</p> 
							</div> 
						 </div>';
						} ?>
    
        <table width="800" height="92" class="normal tablesorter fullwidth">
	<thead>
	     <tr>
                  <th width="14%"><strong>Plan Name</strong></th>
                  <th width="21%" ><strong>Minimum Amount (&#x0E3F;)</strong></th>
                  <th width="18%"><strong>Maximum Amount (&#x0E3F;)</strong></th>
                  <th width="19%" ><strong>Profit (%)</strong></th>
		   <th width="14%" ><strong>Terms</strong></th>
                  <th width="14%" ><strong>Options</strong></th>
                </tr>
	</thead>
	<tbody>                                            
        
              
                  <?php
					$select_company = mysql_query("select * from plan");
					
					$i=0;
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
						if($fetch['period_type']==1) $p_type='Daily';
						if($fetch['period_type']==2) $p_type='Weekly';
						if($fetch['period_type']==3) $p_type='Monthly';
						if($fetch['period_type']==4) $p_type='Yearly';
						if($fetch['period_type']==5) $p_type='Hourly';
						
						if($fetch['iperiod_type']==1) $pi_type='Day';
						if($fetch['iperiod_type']==2) $pi_type='Week';
						if($fetch['iperiod_type']==3) $pi_type='Month';
						if($fetch['iperiod_type']==4) $pi_type='Year';
						if($fetch['iperiod_type']==5) $pi_type='Hour';
						
				?>
                  
                <tr class="<?php echo $class; ?>">
                  <td ><!--<a href="view_plans.php?id=<?php echo $fetch['plan_id']; ?>">--><?php echo $fetch['plan_type']; ?><!--</a>--></td>
                  <td >&#x0E3F; <?php echo $fetch['spend_min_amount']; ?></td>
                  <td>&#x0E3F; <?php echo $fetch['spend_max_amount']; ?></td>
                  <td ><?php //echo $fetch['interest']; ?> <? echo number_format($fetch['max_interest'],2); ?>% <?php echo $p_type;?></td>
                  <td ><?php echo $fetch['period']." ".$pi_type; ?></td>
                 <td ><a  href="edit_plans.php?id=<?php echo $fetch['plan_id'];?>" title="Edit this Plan" class="tooltip table_icon">
                <img src="assets/icons/actions_small/Pencil.png" alt="Edit Plans" />
                 </a>&nbsp;&nbsp;<a href="plans_validate.php?mem_id=<?php echo $fetch['plan_id'];?>" title="Delete this Plan" class="tooltip table_icon" onClick="javascript:return condelete();"><img src="assets/icons/actions_small/Trash.png" alt="Delete Plans" /></a>
</td>
                </tr>
                
                <?php
				}
				?>
                
                 </tr></tbody></table>
                 <div class="clearboth"></div>
</div> <!-- inner -->
</div>
<!--Content Portion End-->
	<script language="javascript1.1">
			function condelete()
{
var confrm;
confrm=window.confirm("Are You sure you want to delete this Plan");
return confrm;
}

			</script>
