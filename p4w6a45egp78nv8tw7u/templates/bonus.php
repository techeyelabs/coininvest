<script type="text/javascript">
function getcode(){
 
	if(document.getElementById("selbx").value=="1")
    {
		document.getElementById("user").style.display="block";
    }
	else
    {
		document.getElementById("user").style.display="none";

    }
}

</script>



<!--Content Portion Start-->
<?php
 if(!in_array("Financials",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
 
 $fetch101=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 75"));
	if(isset($_POST['submit']))
	{
	
/*		echo "<pre>";
		print_r($_POST);
		exit();
		*/
		
		$username = $_POST['cboUser'];
		$amount = $_POST['amount'];
		$desc = $_POST['desc'];
		$transpass = md5($_POST['transpass']);
		$sendbonus = $_POST['sendbonus']; 

		//$traspas=mysql_query("update admin set transactioncode = '".$transpass."' ");
		//echo "select * from admin where admin_id = 1"; exit;
		$sql=mysql_fetch_array(mysql_query("select * from admin where admin_id = 1"));
		$sql1=$sql['transactioncode'];
		
		
	    if(isset($_POST['mailnotification']) && $_POST['mailnotification'] != '' )
		{
			$mailnotification = 'on';
		}
		else
		{
			$mailnotification = 'off';
		}	
	   $update32=mysql_query("update admin_settings set set_value='$mailnotification' where set_id = 75");

	
		/*if($username == '')
		{
			$userflag =1;
			$_SESSION['empty_userid']="<font color='#FF0000' size='-1'>Please enter the Username</font>";
		
		}*/
		
		
		if($sendbonus != 2)
		{
		
		if($username != '')
		{
			
			$select_username = mysql_query("select * from members where username='".$username."'");
			if(mysql_num_rows($select_username) > 0)
			{
				$get_id = mysql_fetch_array($select_username);
				 $userid = $get_id['member_id']; 
			}
			
			else
			{
				$userflag =1;
				$_SESSION['empty_userid']="<font color='#FF0000' size='-1'>Invalid Username</font>";
			}
		
		}
		}
		if($amount == '')
		{
			$userflag =1;
			$_SESSION['empty_amount']="<font color='#FF0000' size='-1'>Please enter the Amount</font>";
		
		}
		
		if(!is_numeric($amount) && $amount != '')
		{
			$userflag =1;
			$_SESSION['empty_amount']="<font color='#FF0000' size='-1'>Please enter the only numeric values</font>";
		
		}
		if($desc == '')
		{
			$userflag =1;
			$_SESSION['empty_desc']="<font color='#FF0000' size='-1'>Please enter the Description</font>";
		
		}
		if($transpass == '')
		{
			$userflag =1;
			$_SESSION['empty_transpass']="<font color='#FF0000' size='-1'>Please enter the Transaction Password</font>";
		
		}
		if($transpass!='')
	{
		if(md5($_POST['transpass']) != $sql1)
		{
			$userflag =1;
			$_SESSION['empty_transpasstr']="<font style='color:red; padding-left:166px;'>Please Enter the correct Password</font>";
			}
		
	}
	
	
	
	
	
          
          $select_trans = mysql_query("select * from members where username='".$username."'"); 
		  $select_trans1=mysql_fetch_assoc($select_trans);
					$characters = array(
					"A","B","C","D","E","F","G","H","J","K","L","M",
					"N","P","Q","R","S","T","U","V","W","X","Y","Z");
					
					$keys = array();
					while(count($keys) < 3) 
					{
						$x = mt_rand(0, count($characters)-1);
						if(!in_array($x, $keys)) 
						{
						   $keys[] = $x;
						}
					}
					$random_chars='';
					foreach($keys as $key){
					   $random_chars .= $characters[$key];
					
					$rand = rand(0,99999);
					$ex_code = $random_chars.date('his').$rand;
					}
					$ex_code=md5($ex_code);
					
					$update = mysql_query("update members set verification_code='".$ex_code."' where member_id='".$userid."'");
					
					$admin_mail_id = mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
					$admin_mail = $admin_mail_id['set_value'];
					 
					 
					 
					 $select_username1 = mysql_fetch_array(mysql_query("select * from members where username='".$username."'"));
					 $mem_id1=$select_username1['member_id'];
					 $query1    =mysql_fetch_array(mysql_query("select * from history where user_id='$mem_id1'"));
					 $amt       = $query1['amount'];
					
					    
						if($fetch101['set_value'] == 'on')
						{
						
						
						
						$current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
						$current_url=str_replace("updatetranspwd","tran_verification",$current_url);
						$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =12"));
				        $mail_from_id = $mail_fetch['from_id'];
						$mailsubject =$mail_fetch['mailsubject'];
						$mailmessage= html_entity_decode($mail_fetch['message']);
						$mailmessage=str_replace('[FIRSTNAME]',$select_trans1['first_name'],$mailmessage);
						$mailmessage=str_replace('[AMT]',number_format($amount,2),$mailmessage);
						$mailmessage=str_replace('[adminmail]',$admin_mail,$mailmessage); 

						$headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: Administrator <'.$mail_from_id.'>' . "\r\n";
						
//echo $mailmessage; exit;
						mail(trim($select_trans1['member_email']),$mailsubject,$mailmessage,$headers);
						}
								
								
								
	
	
	
	if($sendbonus==2 && $userflag != 1)
	{
		$sql=mysql_query("select * from members");
		while($fetch=mysql_fetch_array($sql))
		{
		
		 $userid = $fetch['member_id']; 
		 $emailid =$fetch['member_email']; 
		 
		 if($user_id!='0')
		 {
		 	$transaction_id = "BON".rand(0,9999999);
			$allins==mysql_query("insert into history(user_id,amount,type,description,transaction_id) values('$userid','$amount','bonus','$desc','$transaction_id')");
			           if($fetch101['set_value'] == 'on')
						{
					    $current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
						$current_url=str_replace("updatetranspwd","tran_verification",$current_url);
						$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =12"));
				        $mail_from_id = $mail_fetch['from_id'];
						$mailsubject =$mail_fetch['mailsubject'];
						$mailmessage= html_entity_decode($mail_fetch['message']);
						$mailmessage=str_replace('[FIRSTNAME]',$fetch['username'],$mailmessage);
						$mailmessage=str_replace('[AMT]',number_format($amount,2),$mailmessage);
					    $mailmessage=str_replace('[adminmail]',$admin_mail,$mailmessage); 

						$headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: Administrator <'.$mail_from_id.'>' . "\r\n";

						mail(trim($select_trans1['emailid']),$mailsubject,$mailmessage,$headers);
						}
			
			
		
			
			
		}	
		
		}
		
			$_SESSION['success_flag']='<font color="#006600">Bonus Created Successfully</font>';

			echo '<meta http-equiv="refresh" content="0; url=bonus.php" />';
			exit;
	}
	
	if($sendbonus==3 && $userflag != 1)
	{
	
		$sql1=mysql_query("select * from history where type= 'deposit' group by user_id");
		if(mysql_num_rows($sql1)>0)
		{
		while($fetch=mysql_fetch_array($sql1))
		{
		 $userid = $fetch['user_id']; 
		 $transaction_id = "BON".rand(0,9999999);
		$depins=mysql_query("insert into history(user_id,amount,type,description,transaction_id) values('$userid','$amount','bonus','$desc','$transaction_id')");
		//echo "select * from members where member_id='".$fetch['user_id']."'"; exit;
		$senddep = mysql_fetch_array(mysql_query("select * from members where member_id='".$fetch['user_id']."'"));
		$emailid =$senddep['member_email']; 
		$username = $senddep['username'];
		if($fetch101['set_value'] == 'on')
						{
					    $current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
						$current_url=str_replace("updatetranspwd","tran_verification",$current_url);
						$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =12"));
				        $mail_from_id = $mail_fetch['from_id'];
						$mailsubject =$mail_fetch['mailsubject'];
						$mailmessage= html_entity_decode($mail_fetch['message']);
						$mailmessage=str_replace('[FIRSTNAME]',$username,$mailmessage);
						$mailmessage=str_replace('[AMT]',number_format($amount,2),$mailmessage);
					    $mailmessage=str_replace('[adminmail]',$admin_mail,$mailmessage); 

						$headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: Administrator <'.$mail_from_id.'>' . "\r\n";

						mail(trim($select_trans1['emailid']),$mailsubject,$mailmessage,$headers);
						}
			
		
		
			
		}
	
		$_SESSION['success_flag']='<font color="#006600">Bonus Created Successfully</font>';
	
				echo '<meta http-equiv="refresh" content="0; url=bonus.php" />';
		exit;
		}
		}
		else if($sendbonus==4 && $userflag != 1)
		{
		//echo "select a.member_id, b.* from members a, history b where b.type != 'deposit' and a.member_id = b.user_id";exit;
		//echo "select a.member_id ,a.* from members a where a.member_id not IN ( select b.user_id from history b where b.type = 'deposit' ) order by a.member_id "; exit;


		$sql2=mysql_query("select a.member_id ,a.* from members a where a.member_id not IN ( select b.user_id from history b where b.type = 'deposit' ) order by a.member_id ");  
		//echo 'hi'; exit;
		if(mysql_num_rows($sql2) > 0)
		{
      //echo mysql_num_rows($sql2); exit;
			
		while($fetch=mysql_fetch_array($sql2))
		{
		$transaction_id = "BON".rand(0,9999999);
		
			
			//$var=mysql_fetch_array(mysql_query("select * from members where member_id ='".$fetch['user_id']."'"));
			
			$userid=$fetch['member_id'];
			//echo "select * from members where member_id = '".$fetch['member_id']."'"; exit;
				$nondep=mysql_fetch_array(mysql_query("select * from members where member_id = '".$fetch['member_id']."'"));
				$emailid=$nondep['member_email'];
				
				//echo "insert into history(user_id,amount,type,description,transaction_id) values('$userid','$amount','bonus','$desc','$transaction_id')";exit;
				
			 	$depnins=mysql_query("insert into history(user_id,amount,type,description,transaction_id) values('$userid','$amount','bonus','$desc','$transaction_id')");
				
				if($fetch101['set_value'] == 'on')
						{
					    $current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
						$current_url=str_replace("updatetranspwd","tran_verification",$current_url);
						$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =12"));
				        $mail_from_id = $mail_fetch['from_id'];
						$mailsubject =$mail_fetch['mailsubject'];
						$mailmessage= html_entity_decode($mail_fetch['message']);
						$mailmessage=str_replace('[FIRSTNAME]',$nondep['username'],$mailmessage);
						$mailmessage=str_replace('[AMT]',number_format($amount,2),$mailmessage);
	                    $mailmessage=str_replace('[adminmail]',$admin_mail,$mailmessage); 
						$headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: Administrator <'.$mail_from_id.'>' . "\r\n";

						mail(trim($select_trans1['emailid']),$mailsubject,$mailmessage,$headers);
						}
			
				
				
				
				
				
			
			
		}
	
		$_SESSION['error_flag']='<font color="#006600">Bonus Created Successfully</font>';
	
		echo '<meta http-equiv="refresh" content="0; url=bonus.php" />';
				exit;
		
	
	}
	}
	
	
	
	
	
	
	
	
		if($userflag != 1 && $_POST['submit'] == 1)
		{
			$transaction_id = "BON".rand(0,9999999);
			
			//echo "insert into history(user_id,amount,type,description,transaction_id) values('$userid','$amount','bonus','$desc','$transaction_id')"; exit;
		
			$update=mysql_query("insert into history(user_id,amount,type,description,transaction_id) values('$userid','$amount','bonus','$desc','$transaction_id')");

			$_SESSION['success_flag']='<font color="#006600">Bonus Created Successfully</font>';

			echo '<meta http-equiv="refresh" content="0; url=bonus.php" />';

			exit();

		}
		

		else

		{
		

			echo '<meta http-equiv="refresh" content="0;url=bonus.php">';

			exit();

		}

	}

	

	

?>

<!--Content Portion Start-->
<div id="primary_right">
				<div class="inner" style="width:70%">

					
                       <?php require 'include/top/financial _management.php'; ?>
			<hr />

					<h1>Send Bonus to Users</h1>
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

      <form name='form1' method='post' action="bonus.php" >
      
        <fieldset>
						<legend><font color="#FF0000">*</font> = Required Fields</legend>
                        
                        
                         <p>
							<label>Send Bonus To User<font color="#FF0000">*</font></label>
							: 
                          
                       <select name="sendbonus" id="selbx" onChange="getcode()">
                        <option value="">Select</option>
                        <option value="1">Particular Users</option>
                        <option value="2">All Users</option>
                        <option value="3">All Users who have made a deposit</option>
                        <option value="4">All Users who have not deposit</option>
                        </select>

<?php if($_SESSION['empty_iperiod_type']) { echo $_SESSION['empty_iperiod_type']; $_SESSION['empty_iperiod_type']=''; } ?> 
                             
                             
						</p>           
                        
                  
     <p id="user">
							<label>Username <font color="#FF0000">*</font></label>
							: 
                            <input type="text" id="user"  name="cboUser" class="mf" value="<?php echo $_SESSION['val_userid']; $_SESSION['val_userid'] =''; ?>">
<?php  if($_SESSION['empty_userid']) { echo $_SESSION['empty_userid']; $_SESSION['empty_userid']=''; } ?>
						</p>
                        
                        
                        
                        <p>
							<label>Amount <font color="#FF0000">*</font></label>
							: 
                            <input type="text" name="amount" class="mf" value="<?php echo $_SESSION['val_userid']; $_SESSION['val_userid'] =''; ?>">
 <?php if($_SESSION['empty_amount']) { echo $_SESSION['empty_amount']; $_SESSION['empty_amount']=''; } ?>
                        
						</p>
                        
                        <p>
							<label>Description <font color="#FF0000">*</font></label>
							: 
                           <input type="text" name="desc" class="mf"  />
						   <?php if($_SESSION['empty_desc']) { echo $_SESSION['empty_desc']; $_SESSION['empty_desc']=''; } ?>
						</p>
                        
                        <p>
                         <label>Mail Notification <font color="#FF0000">*</font></label>
                         :
                         <input type="checkbox" name="mailnotification" class="iphone" id="mailnotification" <?php if($fetch101['set_value'] == 'on') echo ' checked="checked"'; ?> /> 
                         <?php if($_SESSION['empty_mailnotification']) { echo $_SESSION['empty_mailnotification']; $_SESSION['empty_mailnotification']=''; } ?>
                         </p>
                         
                         
                        
                         
                           <p>
							<label>Transaction Password <font color="#FF0000">*</font></label>
							: 
                            <input type="text" name="transpass" class="mf" value="<?php echo $_SESSION['val_userid']; $_SESSION['val_userid'] =''; ?>">
 <?php  if($_SESSION['empty_transpass']) { echo $_SESSION['empty_transpass']; $_SESSION['empty_transpass']=''; } ?>
  <?php if($_SESSION['empty_transpasstr']) { echo $_SESSION['empty_transpasstr']; $_SESSION['empty_transpasstr']=''; } ?>

 
                        
						</p>
                      
                        
                        <div class="clearboth"></div>
						
						<p style="padding-left:200px;">
                        
                        
                          <input type="hidden" name="submit" value="1" />
                        
                        <input class="button" type="submit" value="Submit"  name="update" id="update"/> <!--<input class="button" type="reset" value="Reset" />--></p>
					</fieldset>
					</form>
					<div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
            <?php 
unset($_SESSION['succ_dir']);
unset($_SESSION['errror_msg']);
?>
