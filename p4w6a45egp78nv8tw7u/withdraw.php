<?php  
// date_default_timezone_set("Europe/London");
date_default_timezone_set('Etc/GMT');
session_start();
require 'include/connect.php';
if(empty ($_SESSION['adminuser']))
{
 echo '<meta http-equiv="refresh" content="0; url=index.php" />';
 exit();
 }
 
 require 'include/header.php';
  require 'include/page1.php';
 require 'templates/withdraw.php';
 require 'include/footer.php';
 ?>