<?php
session_start();
error_reporting(0);
require 'include/connect.php';
if(empty ($_SESSION['adminuser']))
{
 echo '<meta http-equiv="refresh" content="0; url=index.php" />';
 exit();
 }
 
 require 'include/header.php';
 require 'templates/oto.php';
 require 'include/footer.php';
 ?>