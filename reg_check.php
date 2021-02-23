<?php
    require_once(__DIR__ . '/connect.php');
    //print_r($_POST);
    //exit();


	$first_name= trim($_POST['first_name']);
	$telephone= '';
	$username= trim($_POST['username']);
	$country= '';
	$city= '';
	$zipcode='';
    
	$mail_id   = trim($_POST['member_email']);
	$password  = base64_encode(base64_encode($_POST['password']));
	$cpassword = base64_encode(base64_encode($_POST['re_password']));
	//$terms=$_POST['agreement'];

	//$introid= trim($_POST['introid']);
	$introid  = trim($_POST['intro_name']);
	$question = trim($_POST['question']);
	$answer   = trim($_POST['answer']);
    //$address1 = $_POST['address1'];
    
	$street  = '';
	$state   = '';
	$lr_num  = '';
	$ego_num = '';
	$pm_num  = '';
	$gdb_num = '';
	$st_pay  = '';

	$paypal   = '';
	$bitcoin  = trim($_POST['bitcoin']);
	$payeer   = '';
	$neteller = '';
	$skrill   = '';
	$advcash  = '';
	$intro_name = trim($_POST['intro_name']);
	$ccode  ='';
	$msisdn = '';
	$resp   = null;
	$error  = null;
	$turningcode   = '';
	$security_code = '';
	$s_pass = trim($_POST['password']);
	$rep_introname =   trim($_POST["rep_introname"]);
	$intro_name =   trim($_POST["intro_name"]);



    function randomPrefix($length)
    {
        $random= "";
        $rand = rand(0,9999999);
        $data = $rand."AtKinSonsEFGHIJKLMNOP1234567890";    
        for($i = 0; $i < $length; $i++)
        {
            $random .= substr($data, (rand()%(strlen($data))), 1);
        }    
        return $random;
    }

    function randomPrefix1($length)
    {
        $random= "";
        $data = "AtKinSonsEFGHIJKLMNOPQRSTUVWXYZ" ;   
    
        for($i = 0; $i < $length; $i++)
        {
            $random .= substr($data, (rand()%(strlen($data))), 1);
        }    
        return $random;
    }

    if ($rep_introname == "") {
	    if ($intro_name != "") {
	       $intro_name  = $intro_name;
	       $rep_introname = $intro_name;
	    }
	}
	
	if($introid == '')
	{
		$introid = 0;
    }
    
    $member_email = $mail_id;
    
    $is_registered = mysql_query("select * from members where member_email='". $member_email ."'");
    if(mysql_num_rows($is_registered) > 0)
    {
        $errorflag=1;
        $exitsEmail = 1;
       
    }

    $is_registered_by_name = mysql_query("select * from members where username='". $username ."'");
    if(mysql_num_rows($is_registered_by_name) > 0)
    {
        $errorflag=1;
        $exitsUserName=1;
        // echo json_encode(["status"=>1001,"msg"=> "Your username is already registred."]);
        
        // echo json_encode(["status"=> 1001, "msg" => "Your username is already registred."]);
    }


    if($intro_name != '')
    {
        $introname = $intro_name;
        $check_intro_result = mysql_query("select * from members where username='$introname'");
        if(mysql_num_rows($check_intro_result) > 0)
        {
            $check_intro_row = mysql_fetch_array($check_intro_result);
            $intro_id = $check_intro_row['member_id'];
        }
        else
        {	
            $errorflag = 1;
            $invalidReff = 1;
            // echo json_encode(["status"=>1001,"msg"=> "Invalid Referal Id"]);
        }
    }else{	 
	   $errorflag = 1;
    //    echo json_encode(["status"=>1001,"msg"=> "Referal Id required"]);
	} 

    
    if ($errorflag != 1) {
        $post = $_POST;	
	       
        $query="insert into members set "; 
        foreach($post as $key => $val)
        {
            if($key == "button" || $key == "terms"  || $key == "agreement" || $key == "code"|| $key == "re_password" || 
                    $key == "recaptcha_challenge_field" || $key == "recaptcha_response_field" ||  $key == "rep_introname" || $key == "intro_name" ||
                    $key == "turningcode" || $key == 'placement_name' || $key == 'position' || $key == 'password')
                    continue;
            $query1.="`".$key."`= '".$val."', ";
        }
        
        $readable_pass = trim($_POST['password']);
        $query1 = $query1."`intro_id`= '".$intro_id."',ip_address='".$_SERVER['REMOTE_ADDR']."',refer_id='".randomPrefix1(2).randomPrefix(10)."',readable_pass='".$readable_pass."',  ";  
        $query1 = trim($query1,", ");	
        $query  = $query.$query1;  
       // $insert_query = mysql_query($query);
     
     
        if(mysql_query($query))
        {
            $userid = mysql_insert_id();
            $update_pwd =  mysql_query("update members set password='$password' where username='".$username."'"); 
                    
            //representative entry start		
            $rep_date = date('Y-m-d H:i:s');		
            if($intro_id == 0 ) {
                $memberusername = mysql_query("select * from members where username='". trim($rep_introname) ."'");
                $rep_id = mysql_fetch_array($memberusername);
                if($ep_id != "") {
                    $rep_chk = mysql_query("select * from `representative_referal` where `rep_id`=$rep_id and  `member_id`=$userid");
                    if( mysql_num_rows($rep_chk) == 0 ) {
                        $rep_insert = mysql_query("INSERT INTO `representative_referal`(`id`, `rep_id`, `member_id`, `ref_date`) 
                        VALUES (0,$rep_id,$userid,'$rep_date')");
                    }
                }     
            }		 
    
                    
            $v_pass_str = "INSERT INTO `pass_saver`( `username`, `user_email`, `password`, `enc_password`, `country_id`, `intro_id`, `bitcoin`, `question`, `answer`)
                        VALUES ('$username' ,'$mail_id', '$s_pass', '$password', '$country', '$introid', '$bitcoin', '$question', '$answer')";
            mysql_query($v_pass_str);
          
    
            $update6="update  members set status='active' where member_email ='".$_POST['member_email']."'";
            mysql_query($update6);	
            
            
            
            //================ mail
            $query_y="select * from members where member_email='".$_POST['member_email']."'";
            $fetch = mysql_fetch_array(mysql_query($query_y));

            $uname=$fetch['username'];
            $pass=base64_decode(base64_decode($fetch['password']));
            
            $sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
            $sitename=$sitename['set_value'];
            
            
            $adminmail=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
            $adminmail=$adminmail['set_value'];
                            
            $refer_url="https://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
            $refer_url=str_replace("reg_process","index",$refer_url);
            $login_url=str_replace("index","login",$refer_url);
            $mail_fetch=mysql_fetch_array(mysql_query("select * from mail_subjects where mail_id =2"));
            $mail_from_id = $mail_fetch['from_id'];
            $mailsubject =$mail_fetch['mailsubject'];
            $message = html_entity_decode($mail_fetch['message']);

            if($fetch['nametitle'] != '')
            {
                $names=$fetch['nametitle'] . ' '. $fetch['first_name'].' '.$fetch['last_name'];
            }
            else
            {
                $names='Mr.'.$fetch['first_name'].' '.$fetch['last_name'];
            }
            $refer_url = $refer_url."?".$fetch['username'];
            $message=str_replace('[FIRSTNAME]',$names,$message);
            $message=str_replace('#verfyurl',$login_url,$message);
            $message=str_replace('[USERNAME]',$uname,$message);
            $message=str_replace('[PASSWORD]',$pass,$message);
            $message=str_replace('[REFERRAL_ID]',$fetch['username'],$message);
            $message=str_replace('[REFERRAL_LINK]',$refer_url,$message);
            $message=str_replace('#sitename',$sitename,$message);
            $message=str_replace('#adminmail',$mail_from_id,$message);
            $message=str_replace('#adminemill',$mail_from_id,$message);
                        
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: '.$sitename.' <'.$mail_from_id.'>' . "\r\n";
            //echo $message; exit;
            @mail($fetch['member_email'],$mailsubject,$message,$headers);
            
            
           
            echo json_encode(["status"=>1002,"msg"=> $info = "Thank You for joining us. Your Registration has been successfully completed."]);  
            unset($_SESSION['introname']);          
        }else {
            echo json_encode(["status"=>1001,"msg"=> 'Registration failed']);
        }

    }else{
        if($exitsEmail == 1){
            echo json_encode(["status"=>1001,"msg"=>"Your email is already registred."]);
        }
        else if($exitsUserName == 1){
            echo json_encode(["status"=> 1001, "msg" => "Your username is already registred."]);
        }
        else if($invalidReff == 1){
            echo json_encode(["status"=>1001,"msg"=> "Invalid Referal Id"]);
        }else{
            
        }
    }
?>