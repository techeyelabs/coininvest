<?PHP
error_reporting(0);
session_start();
require 'include/connect.php';

/*echo "<pre>";
print_r($_SESSION);
exit;*/

$sendmessage = $_POST['reply_msg'];	
$status = $_POST['ticket_status'];	
$userid = $_POST['mem_id'];
$tktid = $_POST['tkt_id'];


$usermail = mysql_fetch_array(mysql_query("select member_email from members where member_id=".$userid.""));

$adminmail=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
$adminmail=$adminmail['set_value'];
				
				
$txtdetails = mysql_fetch_array(mysql_query("select * from tickets where id=".$tktid));



if($txtdetails['contact_mailid'] != '')
{

		$useremail = $txtdetails['contact_mailid'];
}
else
	$useremail = $usermail['member_email'];
$subject = $txtdetails['subject'];

if($_POST['ticket_status'] == '0')
	$tkt_status = 'new';
if($_POST['ticket_status'] == '1')
	$tkt_status = 'onhold';
if($_POST['ticket_status'] == '2')
	$tkt_status = 'fixed';
if($_POST['ticket_status'] == '3')
	$tkt_status = 'reopen';
if($_POST['ticket_status'] == '4')
	$tkt_status = 'close';
	

$flag =0;
if($sendmessage == '')
{
	$flag = 1;
	$_SESSION['empty_message'] = "<font color='#FF0000'>Please Enter Your Reply</font>";
}
if($status == '')
{
	$flag = 1;
	$_SESSION['empty_status'] = "<font color='#FF0000'>Please Select Status</font>";
}

	if($flag != 1)
	{
			/*	INSERT INTO `rnmdemo1_elpro`.`ticket_conversation` (
`con_id` ,
`userid` ,
`ticket_no` ,
`from` ,
`to` ,
`tkt_massage` ,
`date` ,
`ip_address` ,
`status`
)
VALUES (
NULL , '1', '#003307480961', 'memberA@memberA.com', 'admin@23232.com', 'hbgthb hbgh ghbg hgyh', '2011-04-23 16:13:41', '127.0.0.1', '2'
);
*/

		$sql="INSERT INTO ticket_conversation(adminid,userid,to_id,from_id,ticket_no,tkt_message,con_date,ip_address,status,ticket_status) VALUES(1,'".$userid."',
				'".$useremail."',
				'".$adminmail."',
				'".$txtdetails['ticket_no']."',
				'".$sendmessage."',
				'".date('Y-m-d H:i:s')."',
				'".$_SERVER['REMOTE_ADDR']."','".$status."','".$tkt_status."')";
				mysql_query($sql);
				
				$sql=mysql_query("update tickets set ticket_status='".$tkt_status."',ticket_no='".$txtdetails['ticket_no']."',status='".$tkt_status."' WHERE id='".$tktid."'");
				
				$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
				$sitename=$sitename['set_value'];
				
				
					
				        $current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
						$current_url=str_replace("updatetranspwd","tran_verification",$current_url);
						$mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =14"));
						$mail_from_id = $mail_fetch['from_id'];
						$mailsubject =$mail_fetch['mailsubject'];
						//$tkt_status='new';
						$adminmessage= html_entity_decode($mail_fetch['message']);
					    $adminmessage=str_replace('#subject',$subject,$adminmessage);
					    $adminmessage=str_replace('#content',$sendmessage,$adminmessage);
					    $adminmessage=str_replace('#status',ucfirst($tkt_status),$adminmessage);
						$adminmessage=str_replace('#sitename',$sitename,$adminmessage);
						$adminmessage=str_replace('#ticketno',$txtdetails['ticket_no'],$adminmessage);
					   
					   
						/*$sqls="select admin_mail from admin_settings";
							$data=mysql_fetch_array(mysql_query($sqls));*/
							
					   
							    $headers  = "MIME-Version: 1.0\n";
								$headers .= "Content-type: text/html; charset=iso-8859-1\n";
								$headers .= 'From: '.$sitename.' <'.$useremail.'>' . "\r\n";
								//echo $adminmessage; exit;	
								$mail=mail(trim($adminmail),$subject,$adminmessage,$headers);
								
								
								
			$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
		    $sitename=$sitename['set_value'];
		
			
							   $current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
						       $current_url=str_replace("updatetranspwd","tran_verification",$current_url);
						       $mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =14"));
						       $mail_from_id = $mail_fetch['from_id'];
						       $mailsubject =$mail_fetch['mailsubject'];
						       //$tkt_status='new';
						       $message= html_entity_decode($mail_fetch['message']);
							   $message=str_replace('#subject',$subject,$message);
							   $message=str_replace('#content',$sendmessage,$message);
							   $message=str_replace('#status',ucfirst($tkt_status),$message);
							   $message=str_replace('#sitename',$sitename,$message);
							   $message=str_replace('#ticketno',$txtdetails['ticket_no'],$message);
							
							   
								/*$sqls="select admin_mail from admin_settings";
									$data=mysql_fetch_array(mysql_query($sqls));*/
									
							 
							   $headers  = "MIME-Version: 1.0\n";
							   $headers .= "Content-type: text/html; charset=iso-8859-1\n";
							   $headers .= 'From: '.$sitename.' <'.$adminmail.'>' . "\r\n";	
							   //echo $message; exit;
							   @mail($useremail,$subject,$message,$headers);
							
								
				
				/*$insertid=mysql_insert_id();
				$ticketno='#00'.rand().$insertid;
				
				$sql=mysql_query("update tickets set ticket_status='new',ticket_no='".$ticketno."' WHERE id='".$insertid."'");*/
				
				
			$_SESSION['success']="<font color='#00CC33'>Your Reply has been send successfully</font>";
			echo '<meta http-equiv="refresh" content="0;url=ticketdetails.php?tktid='.$tktid.'">';

			exit();

				

			

		}

		else

		{

			echo '<meta http-equiv="refresh" content="0;url=ticketdetails.php?tktid='.$tktid.'">';

			exit();

		}

        
?>