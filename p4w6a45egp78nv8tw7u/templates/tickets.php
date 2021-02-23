<?php

header("Content-type: application/vnd-ms-excel");
 

header("Content-type:attachment; filename=tickets-excel.xls");


 if(!in_array("Support",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }

?><!--Content Portion Start-->
<div id="primary_right">
				<div class="inner" style="width:900px">

					<?php
                     require 'include/top/support.php'; 
					?>
					 <!-- end dashboard items -->
					<hr />
		  
					<h1>Ticket Management</h1>

					
						   <?php
						   
									     echo '<div align="right">
                <form method="post" action="templates/ticket_excel.php">
                <input type="image"  border="0" style="border-width:0px;" src="assets/images/excel.jpeg" name="excelexport" id="excelexport" />
            
                <input type="hidden" name="excel" value="submit" />

            
                </form> </div>'; 
							  
					$select_company = mysql_query("SELECT * FROM tickets ORDER BY `tickets`.`postdate` DESC");
					
					
					
					?>
   <table class="normal tablesorter fullwidth table table-striped table-hover table-bordered" id="editable-sample">
                    
						<thead>
							<tr>
								<th width="15%"><strong>Ticket No</strong></th>
                                <th width="12%"><strong>User Name</strong></th>
								<th width="13%"><strong>Subject</strong></th>
								<th width="10%"><strong>Message</strong></th>
								<th width="15%"><strong>Contact Mail-Id</strong></th>
								<th width="10%"><strong>Status</strong></th>
								<th width="25%"><strong>Date</strong></th>
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
						
						
						$username = mysql_fetch_array(mysql_query("select username,member_email from members where member_id=".$fetch['userid'].""));
						
						
				?>

							<tr class="<?php echo $class; ?>">
							<td width="15%"><a href="ticketdetails.php?tktid=<?php echo  $fetch['id']; ?>" style="text-decoration:none"><font color="#339900"><?php echo $fetch['ticket_no']; ?></font></a></td>
                                <td width="10%"><?php echo $username['username']; ?></td>
								<td width="15%"><?php echo $fetch['subject']; ?></td>
                                
								<td width="13%"><!--<a href="" onclick="return hs.htmlExpand(this,{ headingText: \''.$fetch['subject'].'\' })">
								<?php echo substr($fetch['message'],0,10); ?></a>
								<div class="highslide-maincontent">-->
								<?php echo  substr($fetch['message'],0,10); ?><!--</div>--></td>
                                
								<td width="15%"><?php echo $username['member_email']; ?></td>
								<td width="10%"><?php echo $fetch['ticket_status']; ?></td>
								<td width="22%"><?php echo date("j F, Y ",strtotime($fetch['postdate'])); ?></td>
								<!--<td><?php echo $payment_settings['payment_name']; ?></td>-->
								
							</tr>
							
							 <?php
				
				}
				
			} 
			else {
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
confrm=window.confirm("Are You sure you want to delete this User");
return confrm;
}

			</script>
<!--Content Portion End-->


	<script type='text/javascript'>


(function(document) {
	'use strict';

	var LightTableFilter = (function(Arr) {

		var _input;

		function _onInputEvent(e) {
			_input = e.target;
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}

		function _filter(row) {
			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
			}
		};
	})(Array.prototype);

	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
	});

})(document);


</script>
