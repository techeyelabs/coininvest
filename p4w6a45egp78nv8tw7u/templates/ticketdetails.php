
<div id="primary_right">
				<div class="inner" style="width:70%">

					<?
                     require 'include/top/support.php'; 
					?> <!-- end dashboard items -->
					
					<!-- YOUR CONTENT GOES HERE -->
					
					
					<hr />

					<h1>Ticket Details</h1>
					    <? if($_SESSION['success']) { 
						?>
                 <div class="notification success"> 
                                <span></span> 
                                <div class="text"> 
                                    <p><strong>Success!</strong>  <? echo $_SESSION['success']; $_SESSION['success']=''; ?></p> 
                                </div> 
                                </div>
    
                <?
                } ?>

	
					<form name='form1' method='post' action="tkt_valid.php" > 
					
					<fieldset>
						<legend>Manage Tickets</legend>
						
                        <?php 
                        	$tkt_det = mysql_fetch_array(mysql_query("select * from tickets where id=".$_GET['tktid']));
                        	$username = mysql_fetch_array(mysql_query("select username from members where member_id=".$tkt_det['userid']));
                        ?>
						
						<p>
							<label>User Name</label>
							: 
							<label><?=$username['username']; ?></label>
						</p>
						
						<p>
							<label >Ticket Id</label>
							: <label><?=$tkt_det['ticket_no']; ?></label>
						</p>
						
						<p>
							<label>Ticket Subject</label>
							: <label><?=$tkt_det['subject']; ?></label>
						</p>
						<p>
							<label>Ticket Message</label>
							: <label><?=$tkt_det['message']; ?></label>
						</p>
						
                        <p>
							<label>Ticket Post Date</label>
							: <label><?=date("j F, Y ,g:i a",strtotime($tkt_det['postdate'])); ?></label>
						</p>
                                                
                      
					
						<p>
							<label>Ticket Status</label>
							: <label><select class="select option" name="ticket_status" style="width:100px;height:30px;">
                            	 <option value="" >Status</option>
                                <option value="0" <?php if($tkt_det['status'] == 0) echo "selected"; ?>>New</option>
                                <option value="1" <?php if($tkt_det['status'] == 1) echo "selected"; ?>>Onhold</option>
                                <option value="2" <?php if($tkt_det['status'] == 2) echo "selected"; ?>>Fixed</option>
                                <option value="3" <?php if($tkt_det['status'] == 3) echo "selected"; ?>>Reopen</option>
                                <option value="4" <?php if($tkt_det['status'] == 4) echo "selected"; ?>>Closed</option></select><br /><? /* if($_SESSION['empty_status']) { echo $_SESSION['empty_status']; $_SESSION['empty_status']=''; } */?>
                                </label>
                               
						</p>
                        
						<?php
						if($tkt_det['ticket_status'] != 'close')
						{
						?>
						<p>
							<label>Reply to User </label>
							: <textarea name="reply_msg" rows="6" cols="40"></textarea><br /><? if($_SESSION['empty_message']) { echo $_SESSION['empty_message']; $_SESSION['empty_message']=''; } ?>
						</p>
                        <?php
						}
						?>
						
						
						
						<div class="clearboth"></div>
						
						<p align="center"><input class="button" type="submit" value="Submit" /> 
                        <input name="mem_id" type="hidden" value="<?=$tkt_det['userid']; ?>" />
                        <input name="tkt_id" type="hidden" value="<?=$_GET['tktid']; ?>" />
                       </p>
					</fieldset>
					</form>
                    <?php 
					
//					echo "select * from ticket_conversation where userid=".$tkt_det['userid']." and ticket_no='".$tkt_det['ticket_no']."' order by con_date desc";
					$conversation = mysql_query("select * from ticket_conversation where userid=".$tkt_det['userid']." and ticket_no='".$tkt_det['ticket_no']."' order by con_date desc");
					$i=0;
					if(mysql_num_rows($conversation) > 0)
					{
					?>
                     <fieldset >
						<legend>Conversation Between User And Admin</legend>
                    <?php
					
					while($fetch = mysql_fetch_array($conversation))
					{
						
						if($fetch['adminid'] == 1)
						{
							$name = "Admin";
						}
						else
						{
							$name1 = mysql_fetch_array(mysql_query("select username from members where member_id=".$fetch['userid'].""));
							$name = $name1['username'];
						}
						
						
						
					?>
                    <?=ucfirst($fetch['tkt_message']); ?> 
                                    
                        <p>
                        <label><?=$name; ?><br />Status : <?=ucfirst($fetch['ticket_status']); ?> <br />Message :<?=ucfirst(substr($fetch['tkt_message'],0,13)); ?>.. <br /><?=date("j F, Y ,g:i a",strtotime($fetch['con_date'])); ?></label>
                        </p>
                        <?php
						}
						?>
                       <!-- <table width="100%">
                        <tr>
                       
                        <td width="80%" valign="top" align="left">#username<br/>status<br/>
                      
                        </td>
                       
                       
                        </tr>
                        </table>-->
                        
                        </fieldset>
                        <?php
						}
						?>
                    
                    
					<div class="clearboth"></div>
				</div> <!-- inner -->
			</div>