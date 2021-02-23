<?php



session_start();



require 'include/connect.php';



if(empty ($_SESSION['adminuser']))



{



 echo '<meta http-equiv="refresh" content="0; url=index.php" />';



 exit();



 }



 



 require 'include/header.php';



 require 'templates/edit_subadmin.php';



 require 'include/footer.php';



 ?>