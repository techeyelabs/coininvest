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

					<?
                     require 'include/top/support.php'; 
					?>
					 <!-- end dashboard items -->
					<hr />
		  
					<h1>Ticket Management</h1>
<!-- search start-->
					
<!-- <form id="myform" name="myform" method="post" action="">
  <table class="normal tablesorter fullwidth">
    <tbody>
      <tr>

        <td><input type="text" value="" placeholder="Enter Ticket No" name="ticketno">
        </td>
        <td><input type="text" value="" placeholder="Enter User Name" name="username">
        </td>
        <td><input type="text" value="" placeholder="Enter Mailid" name="mailid">
        </td>
        <td><input type="text" value="" placeholder="Enter Ticket Status" name="ticketstatus">
        </td>
          
       </td>
       
               <td><input type="submit" id="search" value="Search" name="search">

               <input type="hidden" id="action" value="<?=$_GET['status']; ?>" name="action"></td>
      </tr>
    </tbody>
  </table>
</form> -->

<!--search end-->
			<?
						     echo '<div align="right">
                <form method="post" action="templates/ticket_excel.php">
                <input type="image"  border="0" style="border-width:0px;" src="assets/images/excel.jpeg" name="excelexport" id="excelexport" />
            
                <input type="hidden" name="excel" value="submit" />

            
                </form> </div>'; 
						
							  
					$select_company = mysql_query("SELECT * FROM tickets ORDER BY `tickets`.`postdate` DESC");
					
					
					
		?>
                    
                   
                    <table class="normal tablesorter fullwidth" width="100%">
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
						
						
				if(isset($_POST['search']))
				{	 
					if(isset($_POST['username']))
					{
					$queryCondition .= "AND username LIKE '%" . $_POST['username'] . "%'";
					
					}
					if(isset($_POST['mailid']))
					{
					$queryCondition .= "AND member_email LIKE '%" . $_POST['mailid'] . "%'";
					}
					


				if($queryCondition ){
					//echo "select username,member_email from members where member_id=".$fetch['userid']." ". $queryCondition."";
 				$username = mysql_fetch_array(mysql_query("select username,member_email from members where member_id=".$fetch['userid']." ". $queryCondition.""));
						
				}
					}
					else{
						//echo "select username,member_email from members where member_id=".$fetch['userid']."";
						$username = mysql_fetch_array(mysql_query("select username,member_email from members where member_id=".$fetch['userid'].""));
					}
						if($username){


						
						
				?>

							<tr class="<?=$class; ?>">
								<td width="15%"><a href="ticketdetails.php?tktid=<?=$fetch['id']; ?>" style="text-decoration:none"><font color="#339900"><?=$fetch['ticket_no']; ?></font></a></td>
                                <td width="10%"><?=$username['username']; ?></td>
								<td width="15%"><?=$fetch['subject']; ?></td>
                                
								<td width="13%"><!--<a href="" onclick="return hs.htmlExpand(this,{ headingText: \''.$fetch['subject'].'\' })">
								<?=substr($fetch['message'],0,10); ?></a>
								<div class="highslide-maincontent">-->
								<?=substr($fetch['message'],0,10); ?><!--</div>--></td>
                                
								<td width="15%"><?=$username['member_email']; ?></td>
								<td width="10%"><?=$fetch['ticket_status']; ?></td>
								<td width="22%"><?=date("j F, Y ",strtotime($fetch['postdate'])); ?></td>
								<!--<td><?=$payment_settings['payment_name']; ?></td>-->
								
							</tr>
							
							 <?
							}
				
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
confrm=window.confirm("Are You sure you want to delete this User");
return confrm;
}

			</script>
<!--Content Portion End-->