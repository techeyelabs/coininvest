<?php require( __DIR__ .'/connect.php'); 
    session_start();    
    // print_r($_SESSION);
    // exit();
    if(isset($_SESSION['password_reset_status']) && $_SESSION['password_reset_status']==0){
        echo json_encode(['status'=>true, 'dialog' => 'password_reset']);
    }
    else if(isset($_SESSION['introname']) && !empty($_SESSION['introname'])){
        // unset($_SESSION['userid']);
        // unset($_SESSION['username_real']);
        // unset($_SESSION['userName']);
        // echo '<meta http-equiv="refresh" content="0;url=index.php">'; 
        echo json_encode(['status'=>true, 'dialog' => 'introReg']);
    }
    else{
        echo json_encode(['status'=>false, 'dialog' => '']);
    }
?>