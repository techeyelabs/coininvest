 <?php
	session_start();
require 'include/connect.php';
	
	
	//print_r($_POST);
//	print_r($_FILES);
	
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
         $coin_image = $_FILES['coin_image']['name'];
        

        include("../DYReImage/autoload.php");
        include("../DYReImage/DYReImage.php");
       /// $cs = mysql_fetch_array(mysql_query("select * from atq_coins where title='$title'"));    
        
        if($coin_image != "") {
            if(move_uploaded_file($_FILES['coin_image']['tmp_name'], "../images/shop/". trim($coin_image) )) {
                //echo "image upload";
                $source_img =   '../images/shop/'.trim($coin_image);
                $destination_img =   '../images/shop/thumb/'.trim($coin_image);
                $option = array(
                		"height" => 200,
                		"width" =>  200 ,//"auto",
                		"quality" => 80
                );
                
                try {
                	//echo "block1";
                	$obj = new  DYReImage\DYReImage($source_img, $destination_img, $option);
                	$obj->resize();
                	
                	/*
                	echo "Source: " . $obj->getSource() . "<br>";
                	echo "Destination: " . $obj->getDestination() . "<br>";
                	echo "Option: " . print_r($obj->getOption()) . "<br>";
                	echo "SourceImageDetail: " . print_r($obj->getSourceDetail()) . "<br>";
                	echo "RequiredImageDetail: " . print_r($obj->getRequiredImageDetail()) . "<br>";
                	echo "Done!";*/
                	
                } catch(\Exception $e) {
                    echo "block2";
                	//die("Error: " . $e->getMessage());
                }
                
            }else{
                //echo "not upload";
            }
            
            $in = "INSERT INTO `atq_coins`(`img`,`price`, `title`,`description`, `ask_price`, `issued_year`, `issued_country`, `manufaturer`, `issued_nos`, `quality`, `weight`, `diameter`, `thickness`, `tag`, `status`) 
            VALUES ('$coin_image', '$coin_price','$title','$description','$asking_price','$issued_year','$issued_country','$manufacturer','$issued_nos','$quality','$weight','$diameter','$thickness','','active')";
            //echo $in;
            mysql_query($in);
        }

	 
		$_SESSION['succ_dir']='<font color="#006600">Successfully Updated</font>';
	    echo '<meta http-equiv="refresh" content="0; url=coin_info.php" />';
 	    exit();
	
	
 

	
	
?>