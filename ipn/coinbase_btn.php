<?php
    include "include/connect.php";
    
    
     $rawData = file_get_contents("php://input");

    // this returns null if not valid json
    $d = json_decode($rawData);
    
    
    $r = $_POST;    
    $res_time = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];
    
    $str = "INSERT INTO `cb_response`( `res_text`, `res_time`, `ip`)  VALUES ('$rawData','$res_time','ip')";    
    mysql_query($str);
    
    
    // https://techblog.bozho.net/how-to-accept-bitcoin-payments/

?>