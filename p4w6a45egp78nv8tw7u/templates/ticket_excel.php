<?

//require "export.php";

header("Content-type: application/vnd-ms-excel");
 

header("Content-Disposition: attachment; filename=tickets-excel.xls");

?>


<table border="1">
    <tr>
    	
		<th>TICKET NO</th>
		<th>USER NAME</th>
		<th>SUBJECT</th>
		<th>MESSAGE</th>
		<th>CONTACT MAIL-ID</th>
		<th>STATUS</th>
		<th>DATE</th>


	</tr>
	<?php

	mysql_connect("localhost", "root", "admin"); 
	mysql_select_db("HYIPNPAY");
	
	$sql =mysql_query("SELECT * FROM tickets ORDER BY `tickets`.`postdate` DESC");
				
			
				
					$i=0;
					if(mysql_num_rows($sql) > 0)
					{
					while($fetch = mysql_fetch_array($sql))
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
	      <tr>
                <td><?=$fetch['ticket_no']; ?></td>
              <td ><?=$username['username']; ?></td> 
                <td ><?=$fetch['subject']; ?></td>
                                
                <td>
                <?=substr($fetch['message'],0,10); ?>
           
               </td>
              <td><?=$username['member_email']; ?></td> 
             <td><?=$fetch['ticket_status']; ?></td>
                <td><?=date("j F, Y ",strtotime($fetch['postdate'])); ?></td>
               
                
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

</table>


</form>