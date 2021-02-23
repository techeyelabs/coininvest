<?php
  if(isset($POST["shop_form"]))
  {
   
   
   
    $full_name = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $phone_number = trim($_POST["phone_number"]);
    $address = trim($_POST["address"]);
    $country = trim($_POST["country"]);
    $courier = trim($_POST["courier"]);
    
    $flag = 1;
    
    if($full_name == "") {
        $err_msg = "Please Enter Your Full Name";
        $flag = 0 ;
        $_SESSION['err_msg'] = $err_msg;
    }
    if($email == ""){
        $err_msg = "Please Enter Your Email Address";
        $flag = 0 ;        
        $_SESSION['err_msg'] = $err_msg;
    }
    if($phone_number == ""){
        $err_msg = "Please Enter Your Phone Number";
        $flag = 0 ;        
        $_SESSION['err_msg'] = $err_msg;
    }
    if($address == "") {
        $err_msg = "Please Enter Your Address"; 
        $flag = 0;
        $_SESSION['err_msg'] = $err_msg;
    }
    if($country == "") {
        $err_msg = "Please Enter Your Country"; 
        $flag = 0;
        $_SESSION['err_msg'] = $err_msg;
    }
    if($courier == "") {
        $err_msg = "Please Enter Your Courier"; 
        $flag = 0;
        $_SESSION['err_msg'] = $err_msg;
    }


    if($flag != 0){
        
        
        
    }

  
  
  }


?>