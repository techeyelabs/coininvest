<!--Content Portion Start-->
<?php
error_reporting(0);
 if(!in_array("Settings",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
	
 
 
	
	
	if($_POST['submit'])
	{
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

        $cs = mysql_fetch_array(mysql_query("select * from atq_coins where title='$title'"));    
        
        if($cs["title"]=="")
        {
            $in = "INSERT INTO `atq_coins`(`price`, `title`,`description`, `ask_price`, `issued_year`, `issued_country`, `manufaturer`, `issued_nos`, `quality`, `weight`, `diameter`, `thickness`, `tag`, `status`) 
            VALUES ('$coin_price','$title','$description','$asking_price','$issued_year','$issued_country','$manufacturer','$issued_nos','$quality','$weight','$diameter','$thickness','','active')";

            mysql_query($in);
        }
        else
        {
            $rowid = $cs["id"];
            $up = "update atq_coins set 
                            `price`='$coin_price',`title`='$title',`description`='$description',`ask_price`='$asking_price',
                            `issued_year`='$issued_year',`issued_country`='$issued_country',
                            `manufaturer`='$manufacturer',`issued_nos`='$issued_nos',`quality`='$quality',`weight`='$weight',
                            `diameter`='$diameter',`thickness`='$thickness'     where id=$rowid";
            mysql_query($up);            
        }

	  
		$_SESSION['succ_dir']='<font color="#006600">Successfully Updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=coin_info.php" />';
		exit();
	}
	
 



    //==================== for delete ===================================================
    if(isset($_GET['del'])) {
        $delID = trim($_GET['del']);
          $del_sql = "delete from atq_coins where id=". $delID."" ;
        mysql_query($del_sql);
        	echo '<meta http-equiv="refresh" content="0; url=coin_info.php" />';
		exit();
    
    }

 
	
	
?>
 

<div id="primary_right">
				<div class="inner" style="width:70%">
				    
				    
				    
                <?php require 'include/top/coin_sell_management.php'; ?>

					 
					<hr />

				<!-- 	<h1>Site Settings</h1> -->
                      <?php if($_SESSION['succ_dir'] != '')
					  { 
					  echo '<div class="notification success"> 
							<span></span> 
							<div class="text"> 
							<p><strong>Success!</strong>'.$_SESSION['succ_dir'].'</p> 
							</div> 
						 </div>';
						} ?>
                        
              <?php if($_SESSION['empty_pass'] != '')
					  { 
					     echo '<div class="notification error" style="cursor: auto;"> 
					        	<span></span> 
						        <div class="text"> 
							        <p><strong><cufon class="cufon cufon-canvas" alt="Error!" style="width: 52px; height: 22px;">
							        <canvas width="70" height="23" style="width: 70px; height: 23px; top: -1px; left: -1px;"></canvas>
							        <cufontext>Error!</cufontext></cufon></strong><font size="1" color="#ff0000">'.$_SESSION['empty_pass'].'</font></p> 
						        </div> 
					            </div>';
						} 
						
                        $rid = trim($_GET["pid"]);
						$ress = mysql_fetch_array(mysql_query("select * from atq_coins where id=$rid"));
						$ex_title = $ress["title"];
						$ex_description = $ress["description"];
						$ex_price = $ress["price"];
						$ex_ask_price = $ress["ask_price"];
						$ex_issued_year = $ress["issued_year"];
						$ex_issued_country = $ress["ex_issued_country"];
						
						$ex_manufaturer = $ress["manufaturer"];
						$ex_issued_nos = $ress["issued_nos"];
						$ex_quality = $ress["quality"];
						$ex_weight  = $ress["weight"];
						$ex_diameter  = $ress["diameter"];
						$ex_thickness  = $ress["thickness"];
						
						?>
 
					    
					    
					    
					    
					    
			    <table width="889" height="92" class="normal tablesorter fullwidth">
				<thead>
			     <tr>
				 <th width="20%"><strong>Title</strong></th>
                  <th width="60%"><strong>Description</strong></th>
                  <th width="5%" ><strong>Quality</strong></th>
                  <th width="5%"><strong>Weight</strong></th>
                  <th width="5%" ><strong>Diameter</strong></th>
                  <th width="5%" ><strong>Action</strong></th>
                </tr>
				</thead>
				<tbody>
                  <?php
                            $sql = "select * from atq_coins where id != ''";
							$query =  $sql ;
							$total_pages = mysql_num_rows(mysql_query($query));
							$limit = 25; 	
							if(isset($_GET['page']))
							{
								$page = intval(trim($_GET['page']));
							}
							else
							{
								$page = 1;
							}
							if($page) 
								$start = ($page - 1) * $limit; 	
							else
								$start = 0;	
								
					$select_company = mysql_query("select * from atq_coins");
						if(mysql_num_rows($select_company)  >  0)
						{
						    $i = 0;
						    while( $fetch = mysql_fetch_array($select_company) )
						    {
					             
        						$i++;
        						$value = $i % 2;
        						if($value == 0)
        						{
        							$class = "odd";
        						}
        						else
        						{
        							$class = "";
        						}
        						
                                $out .= '<tr class="'.$class.'">
                                            <td>'.$fetch['title'].'</td>
                                            <td>'. $fetch['description'] .'</td>
                                            <td>'.$fetch['quality'].'</td>
                                            <td>'.$fetch['weight'].'</td>
                				            <td>'.$fetch['diameter'].'</td>
                				            <td>
                				            <a href="coin_edit.php?pid='. trim($fetch['id'])  .'">Edit</a>
                				            <a href="coin_info.php?del='. trim($fetch['id']) .'">Delete</a>
                				            </td>
                                        </tr>';
				            }
			            }
			            else
			            {
				            $out='<tr ><td colspan="6">No Records found</td></tr>';
			            }
			            echo  $out;
		?>
       </tr></tbody>       </table>
				    </div> 
			</div>

