<?php 
    session_start();
    require( __DIR__ .'/connect.php');
    if(isset($_SESSION['password_reset_status'])||$_SESSION['password_reset_uid']||$_SESSION['password_reset_email']){
        echo json_encode(['status'=>true]);
        unset($_SESSION['password_reset_status']);
        unset($_SESSION['password_reset_uid']);
        unset($_SESSION['password_reset_email']);
    }else{
        echo json_encode(['status'=>false]);
    } 
?>