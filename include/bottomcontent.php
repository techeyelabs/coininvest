<?php
if($pagename == 'index.php')
{


echo '
<div class="content_box">';

$sql=mysql_query("SELECT * FROM plan ORDER BY plan_id ASC");
$i=1;
while($result=mysql_fetch_assoc($sql))
{
	
						$value = $i % 2;
						if($value ==0)
						{
							$class = "content_box2";
						}
						else
						{
							$class = "content_box1";
						}
			$period_type = $result['period_type'];
			$period = $result['period'];

						if($period_type == 4)
			{
				$plan_duration = $period * 365;
				$plantitle='Yearly';
			}
			else if($period_type == 3)
			{
					$plan_duration = $period * 30;
					$plantitle='Monthly';
					
			}
			else if($period_type == 2)
			{
				$plan_duration = $period * 7;
				$plantitle='Weekly Plan';
				
			}
			else if($period_type == 1)
			{
				$plan_duration = $period;
				$plantitle='Days';
				
			}
			
			else if($period_type == 4)
			{
				$plan_duration = $period;
				$plantitle='Hourly';
				
			}
			else
			{
				$plan_duration = $period;
				$plantitle='Plan';
			}

	echo '<div class="'.$class.'"  style="margin-right: 10px;">
           <h2>'.$result['plan_type'].'</h2>
	        <div class="box_txt" style="height:150px;">

<table>
<tr>
<td>Plans</td>
<td>:</td>
<td>'.$result['plan_type'].'</td>
</tr>

<tr>
<td>Minimum Invesment</td>
<td>:</td>
<td>$'.$result['spend_min_amount'].'</td>
</tr>
<tr>
<td>Maximum Invesment</td>
<td>:</td>
<td>$'.$result['spend_max_amount'].'</td>
</tr>
<tr>
<td>Percentage</td>
<td>:</td>
<td>'.$result['max_interest'].' %</td>
</tr>

<tr>
<td>Days</td>
<td>:</td>
<td>'.$period.' '.$plantitle.'</td>
</tr>
<tr>';
?>




<td>Principal back</td>
<td>:</td>
<td><?php if($result['release_status']=='on') { echo 'Yes'; } else { echo 'No'; } ?> </td>
</tr>


</table>
          </div>
            </div>
	<?php		$i++;
}



echo '<div class="clear"></div></div>';
}
?>
			
