<?php // echo phpinfo();
error_reporting(1);
//echo 'line-1';
date_default_timezone_set("Europe/London");
$sitename = 'AtKinSons';
$dbhost =  'localhost';
$dbname ='biovax_demo';
$dbuser =  'root';
$dbpass = '';
$adminmail = 'info@covid19.com';


$conn = mysql_connect('localhost' , 'root' , '') or die(mysql_error());
 $db_sel = mysql_select_db('biovax_demo' , $conn) or die(mysql_error());

// $conn = mysql_connect('localhost' , 'root' , '') or die(mysql_error());
// $db_sel = mysql_select_db('goldcoin' , $conn) or die(mysql_error());

//print_r($db_sel);
 if(!$db_sel) {
    echo "<h1>Unable to Connect to the Database</h1><hr noshade size='2' color='#000000'>";
    exit();
 } 
 
//  else {
//      echo 'connected';
//  }

 $tm = date('Y-m-d H:i:s');
  
?>
