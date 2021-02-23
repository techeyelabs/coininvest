<?php session_start();
require('phpmailer/class.phpmailer.php');


function getMail($mail_id,$mailsubject,$message,$headers)
{

	$select_info = mysql_fetch_array(mysql_query("select * from mail_settings where smtp_id=1"));
	if($select_info['mail_mode'] == 1)
	{
		
		$smtp_host  = $select_info['smtp_host'];
		$smtp_username = $select_info['smtp_username'];
		$smtp_pass = $select_info['smtp_pass'];
		$from_id  = $select_info['from_id'];
		$from_name  = $select_info['from_name'];
		
		
		$mail = new phpmailer();

		$mail->IsSMTP();
		$mail->SMTPAuth = true; // enable SMTP authentication
		$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
		
		
		
		$mail->Host = "$smtp_host"; // sets GMAIL as the SMTP server
		//$mail->Port = 465; // set the SMTP port
		$mail->Username = "$smtp_username"; // GMAIL username
		$mail->Password = "$smtp_pass"; // GMAIL password
		
		
		
		$mail->IsHTML(true);
		$mail->From =  "$from_id";
		$mail->FromName = "$from_name";
		$mail->AddAddress("$mail_id");
		$mail->AddReplyTo("noreply@domainname.com","no-reply");
		//$mail->AddAttachment("e:\smile.jpg","Smile_image.jpg");
		//$mail->AddAttachment("e:\orange.jpg","Orange_image.jpg");
		//$mail->AddEmbeddedImage("e:\orange.jpg","cid1","Orange_Image.jpg");
		$mail->Subject = "$mailsubject";
		$mail->Body = "$message";
		
		if($mail->send())
			echo "";
		else
			echo "mail error: ".$mail->ErrorInfo;
	
	}
	else
	{
		$mail = mail($mail_id,$mailsubject,$message,$headers);
	}

}
		
?>
