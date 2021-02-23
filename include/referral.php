<?php  
	// date_default_timezone_set("Europe/London");
	date_default_timezone_set('Etc/GMT');
	$qry=mysql_query("select * from admin_settings where set_id=1");
	$result=mysql_fetch_array($qry);
	$strsite=$result['set_value'];


	function getReferral_details($userid,$level) {
		$select_referral_query="select * from members where intro_id=$userid";
		$select_referral_result=mysql_query($select_referral_query);

		$select_level_query="select max(level_id) from level_commission";
		$select_level_result=mysql_query($select_level_query);
		$select_level_row=mysql_fetch_array($select_level_result);
		$level_limit=$select_level_row[0];

		if(mysql_num_rows($select_referral_result)>0) {
		  $level+=1;


		   while($select_referral_row=mysql_fetch_array($select_referral_result)) {
			echo "<tr class=bodytxt2><td>$level</td><td>".$select_referral_row['username']."</td><td>".$select_referral_row['date_of_join']."</td></tr>";
			$intro_id=$select_referral_row['member_id'];
			getReferral_details($intro_id,$level);
		  }
		}else {
			//echo "<tr><td colspan=3>No Users found in your Downline</td></tr>";
		}
	}

	$select_level_query="select max(level_id) from level_commission";
	$select_level_result=mysql_query($select_level_query);
	$select_level_row=mysql_fetch_array($select_level_result);
	$level_limit=$select_level_row[0];


	$level_limit=100;
	$total_referrals=0;
	$intro_id=$userid;

	for($i=1;$i<=$level_limit;$i++) {
		$select_referral_query="select * from members where intro_id=$intro_id";
		$select_referral_result=mysql_query($select_referral_query);
		if(mysql_num_rows($select_referral_result)>0) {
			$level+=1;
			$total_referrals += mysql_num_rows($select_referral_result);
			$select_referral_row=mysql_fetch_array($select_referral_result);
			$intro_id=$select_referral_row['member_id'];
		}
	}	


 	$select_commission_query="select * from history where type='commissions' and user_id='".$_SESSION['userid']."'";
	$select_commission_result=mysql_query($select_commission_query);
	while($select_commission_row=mysql_fetch_array($select_commission_result)) {
		$total_commission += $select_commission_row['amount'];
	}






        //sending referral mail
	if($mode=='t')  {
		$canSend=$_POST['canSend'];
		if($canSend==1) {
			$name = $_POST['txtName'];
			$useremail = $_SESSION['useremail'];
			if($name=="" || $name=="Your Friend\'s Name") 
			$nameflag=1;
			$email=$_POST['txtEmail'];
			if($email=='') {
			   $mailflag=1;
			}


			$re_user    = "^[a-z0-9\._-]+"; 
			$re_delim   = "@"; 
			$re_domain  = "[a-z0-9][a-z0-9_-]*(\.[a-z0-9_-]+)*"; 
			$re_tld     = "\.([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|" . "int|mil|museum|name|net|org|pro)$"; 


			if(eregi($re_user . $re_delim . $re_domain . $re_tld, $email)==0){
				$mailflag=1;
			}

			$subject=stripslashes($_POST['txtSubject']);
			if($subject=="" || $subject=="Your Subject Here") $subjectflag=1;
			$message=stripslashes($_POST['txtMessage']);
			if($message=='') $messageflag=1;
			
			$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
			$sitename=$sitename['set_value'];

			if($nameflag!=1 && $mailflag!=1 && $subjectflag!=1 && $messageflag!=1) {
				//$message.="<br><a href='".$strsite."?".$username."'>".$strsite."?".$username."</a>";
				$headers  = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
				$headers .= 'From: '.$sitename.' <'.$useremail.'>' . "\r\n";		
				mail($email,$subject,$message,$headers);
				if($mail) $sucess_flag=1;
				else $failure_flag=1;							

			}

		}
	}		

?>
