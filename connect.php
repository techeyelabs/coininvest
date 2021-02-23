<?php 

error_reporting(0);
// date_default_timezone_set("Europe/London");
date_default_timezone_set('Etc/GMT');
//server database connection

$conn = mysql_connect('localhost' , 'root' , '') or die(mysql_error());
$db_sel = mysql_select_db('biovax_demo' , $conn) or die(mysql_error());

//localhost database connection

// $conn = mysql_connect('localhost' , 'root' , '') or die(mysql_error());
// $db_sel = mysql_select_db('goldcoin' , $conn) or die(mysql_error());



 if(!$db_sel) {
    echo "<h1>Unable to Connect to the Database</h1><hr noshade size='2' color='#000000'>";
    exit();
 }
 
//  else {
//      echo 'connected';
//  }



?>



































