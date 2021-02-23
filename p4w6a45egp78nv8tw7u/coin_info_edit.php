<?php
	session_start();
require 'include/connect.php';


	     $info_id = trim($_POST['pid']);
		$title          = trim($_POST["title"]);
		$description    = trim($_POST["description"]);
		$coin_price     = trim($_POST["coin_price"]);
		$asking_price   = trim($_POST["asking_price"]);
		$issued_year    = trim($_POST["issued_year"]);
		$issued_country = trim($_POST["issued_country"]);
		$manufacturer   = trim($_POST["manufacturer"]);
		$issued_nos     = trim($_POST["issued_nos"]);
		$quality        = trim($_POST["quality"]);
		$weight         = trim($_POST["weight"]);
		$diameter       = trim($_POST["diameter"]);
		$thickness      = trim($_POST["thickness"]);



     
            $rowid = $info_id;
            $up = "update atq_coins set 
                            `price`='$coin_price',`title`='$title',`description`='$description',`ask_price`='$asking_price',
                            `issued_year`='$issued_year',`issued_country`='$issued_country',
                            `manufaturer`='$manufacturer',`issued_nos`='$issued_nos',`quality`='$quality',`weight`='$weight',
                            `diameter`='$diameter',`thickness`='$thickness'     where id=$rowid";
            mysql_query($up);            
      
	    //echo $up;
		$_SESSION['succ_dir']='<font color="#006600">Successfully Updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=coin_info.php" />';
		exit();

?>