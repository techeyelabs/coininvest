<?php
session_start();
require 'include/connect.php';
if(empty ($_SESSION['adminuser']))
{
 echo '<meta http-equiv="refresh" content="0; url=index.php" />';
 exit();
 }
 if(date('Y-m-d') !=$_GET['id'])
 {
 	$_SESSION['empty_pass']="<font color='#FF0000'>You cannot edit the Interest rates for Previous Days</font>";
 	 echo '<meta http-equiv="refresh" content="0; url=view_interest.php" />';
	 exit();
 }
 
 require 'include/header.php';
 require 'templates/edit_interest.php';
 require 'include/footer.php';
 ?>