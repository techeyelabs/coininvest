<?php session_start();
error_reporting(0);
require( __DIR__ .'/connect.php');
if(empty ($_SESSION['userid']))
{
 echo '<meta http-equiv="refresh" content="0; url=index.php" />';
 exit();
 }
$userid = $_SESSION['userid'];
require 'include/memberstat.php';
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title>AtKinSons</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
        <?php include('top_nav.php'); ?>

        <?php
            unset($_SESSION['totcommission1']);
            unset($_SESSION['totcommission2']);
            unset($_SESSION['totcommission3']);
            unset($_SESSION['totcommission4']);
            unset($_SESSION['totcommission']);

            $qry=mysql_query("select * from admin_settings where set_id=1");
            $result=mysql_fetch_array($qry);
            $strsite=$result['set_value'];
            
            
            function getlevelactive1($n,$level)
            {
                static $count = 0;
                if($level == 0)
                {
                    $count = $count-$count ; 
                }
                $id="intro_id";
                $sql = "SELECT * FROM members WHERE ".$id."='".$n."' AND status='active'" ;
                $result = mysql_query($sql);
                if(mysql_num_rows($result)==0)
                    $level--;
                else
                    $level++;
                if($level == 0) $level = 1;
                        //  echo $sql. "<br/>";   

                while($row=mysql_fetch_array($result))
                {
                    if($level == 1)
                    {
                        $count++;
                        for($j=1;$j<=$level*3;$j++) echo "";                
                    }
                    getlevelactive1($row["member_id"],$level);
                }
                if($level < 0)
                {
                    $count =0;
                }
                return $count;
            }

            function getlevelactive2($n,$level)
            {
                static $count = 0;
                if($level == 0)
                {
                    $count = $count-$count ; 
                }
                $id="intro_id";
                $sql = "SELECT * FROM members WHERE ".$id."='".$n."' AND status='active'" ;
                $result = mysql_query($sql);
                if(mysql_num_rows($result)==0)
                    $level--;
                else
                    $level++;
                if($level == 0) $level = 1;
                //echo $sql. "<br/>";
                while($row=mysql_fetch_array($result))
                {
                    if($level == 2)
                    {
                        $count++;
                        for($j=1;$j<=$level*3;$j++) echo "";                
                    }
                    getlevelactive2($row["member_id"],$level);
                }
                if($level < 0)
                {
                    $count =0;
                }
                return $count;
            }
                
            function getlevelactive3($n,$level)
            {
                static $count = 0;
                if($level == 0)
                {
                    $count = $count-$count ; 
                }
                $id="intro_id";
                $sql = "SELECT * FROM members WHERE ".$id."='".$n."' AND status='active'" ;
                $result = mysql_query($sql);
                if(mysql_num_rows($result)==0)
                    $level--;
                else
                    $level++;
                if($level == 0) $level = 1;


                while($row=mysql_fetch_array($result))
                {
                    if($level == 3)
                    {
                        $count++;
                        for($j=1;$j<=$level*3;$j++) echo "";                
                    }
                    getlevelactive3($row["member_id"],$level);
                }
                if($level < 0)
                {
                    $count =0;
                }
                //echo $sql. "<br/>";  
                return $count;
            }

            function getlevelactive4($n,$level)
            {
                static $count = 0;
                if($level == 0)
                {
                    $count = $count-$count ; 
                }
                $id="intro_id";
                $sql = "SELECT * FROM members WHERE ".$id."='".$n."' AND status='active'" ;
                $result = mysql_query($sql);
                if(mysql_num_rows($result)==0)
                    $level--;
                else
                    $level++;
                if($level == 0) $level = 1;

            
                while($row=mysql_fetch_array($result))
                {
                    if($level == 4)
                    {
                        $count++;
                        for($j=1;$j<=$level*3;$j++) echo "";                
                    }
                    getlevelactive4($row["member_id"],$level);
                }
                if($level < 0)
                {
                    $count =0;
                }
                return $count;
            } 

            function getlevelactive($n,$level)
            {
                static $count = 0;
                if($level == 0)
                {
                    $count = $count-$count ; 
                }
                $id="intro_id";
                $sql = "SELECT * FROM members WHERE ".$id."='".$n."' AND status='active'" ;
                $result = mysql_query($sql);
                if(mysql_num_rows($result)==0)
                    $level--;
                else
                    $level++;
                if($level == 0) $level = 1;

                            
                while($row=mysql_fetch_array($result))
                {
                    if($level <= 4)
                    {
                        $count++;
                        for($j=1;$j<=$level*3;$j++) echo "";
                    }               
                    
                    getlevelactive($row["member_id"],$level);
                }
                if($level < 0)
                {
                    $count =0;
                }
                return $count;
            }
            
            function getlevelinactive1($n,$level)
            {
                static $count = 0;
                if($level == 0)
                {
                    $count = $count-$count ; 
                }
                $id="intro_id";
                $sql = "SELECT * FROM members WHERE ".$id."='".$n."' AND status='new'" ;
                $result = mysql_query($sql);
                if(mysql_num_rows($result)==0)
                    $level--;
                else
                    $level++;
                if($level == 0) $level = 1;


                while($row=mysql_fetch_array($result))
                {
                    if($level == 1)
                    {
                        $count++;
                        for($j=1;$j<=$level*3;$j++) echo "";                
                    }
                    getlevelinactive1($row["member_id"],$level);
                }
                if($level < 0)
                {
                    $count =0;
                }
                return $count;
            }

            function getlevelinactive2($n,$level)
            {
                static $count = 0;
                if($level == 0)
                {
                    $count = $count-$count ; 
                }
                $id="intro_id";
                $sql = "SELECT * FROM members WHERE ".$id."='".$n."' AND status='new'" ;
                $result = mysqli_query($sql);
                if(mysql_num_rows($result)==0)
                    $level--;
                else
                    $level++;
                if($level == 0) $level = 1;


                while($row=mysql_fetch_array($result))
                {
                    if($level == 2)
                    {
                        $count++;
                        for($j=1;$j<=$level*3;$j++) echo "";                
                    }
                    getlevelinactive2($row["member_id"],$level);
                }
                if($level < 0)
                {
                    $count =0;
                }
                return $count;
            }
                
                
            function getlevelinactive3($n,$level)
            {
                static $count = 0;
                if($level == 0)
                {
                    $count = $count-$count ; 
                }
                $id="intro_id";
                $sql = "SELECT * FROM members WHERE ".$id."='".$n."' AND status='new'" ;
                $result = mysql_query($sql);
                if(mysql_num_rows($result)==0)
                    $level--;
                else
                    $level++;
                if($level == 0) $level = 1;


                while($row=mysql_fetch_array($result))
                {
                    if($level == 3)
                    {
                        $count++;
                        for($j=1;$j<=$level*3;$j++) echo "";                
                    }
                    getlevelinactive3($row["member_id"],$level);
                }
                if($level < 0)
                {
                    $count =0;
                }
                return $count;
            }

            function getlevelinactive4($n,$level)
            {
                static $count = 0;
                if($level == 0)
                {
                    $count = $count-$count ; 
                }
                $id="intro_id";
                $sql = "SELECT * FROM members WHERE ".$id."='".$n."' AND status='new'" ;
                $result = mysql_query($sql);
                if(mysql_num_rows($result)==0)
                    $level--;
                else
                    $level++;
                if($level == 0) $level = 1;


                while($row=mysql_fetch_array($result))
                {
                    if($level == 4)
                    {
                        $count++;
                        for($j=1;$j<=$level*3;$j++) echo "";                
                    }
                    getlevelinactive4($row["member_id"],$level);
                }
                if($level < 0)
                {
                    $count =0;
                }
                return $count;
            } 

            function getlevelinactive($n,$level)
            {
                static $count = 0;
                if($level == 0)
                {
                    $count = $count-$count ; 
                }
                $id="intro_id";
                $sql = "SELECT * FROM members WHERE ".$id."='".$n."' AND status='new'" ;
                $result = mysql_query($sql);
                if(mysql_num_rows($result)==0)
                    $level--;
                else
                    $level++;
                if($level == 0) $level = 1;
                while($row=mysql_fetch_array($result))
                {
                    if($level <= 8)
                    {
                        $count++;
                        for($j=1;$j<=$level*3;$j++) echo "";    
                    }           
                    getlevelinactive($row["member_id"],$level);
                }
                if($level < 0)
                {
                    $count =0;
                }
                return $count;
            }
            
            function getTotalReferral( $n , $level )
            {
                static $ref_count = 0;
                $id="intro_id   ";
                
                $sql = "select * from members where ".$id."=".$n." and status='active'";
                $result = mysql_query($sql);
                if(mysql_num_rows($result)==0)
                    $level--;
                else
                    $level++;
                    
                if($level == 0) 
                $level = 1;                              
                
                while($row = mysqli_fetch_array($result))
                {                               
                    if($level <= 8)
                    {
                        $ref_count++;
                        $name = $row["username"];   
                        $fname=$row['first_name'];
                        $mail = $row["mail_id"];
                        $mem_mmm = $row["member_id"];
                        $total_deposit = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where member_id = ".$mem_mmm));
                        getTotalReferral($row["member_id"],$level);
                    }
                }
                return $ref_count;
            }
            $uuID = $_SESSION['userid'];
            $totalReferralNum =   getTotalReferral( $uuID , 0 );
        ?>

        <div class="container-fluid jumpingNav">
            <div class="" style="max-width: 1100px; margin: 0 auto;">
                <div class="row mt-3">
                    <div class="col-md-2 col-sm-3 col-lg-2 p-0" style="background-color: #6c757d;">
                        <?php include('side_menu.php')?>
                    </div>
                    <div class="col-lg-10 col-md-12 col-sm-12"
                        style="min-height: 850px; max-height:1100px; padding: 0px;  background-image:url('images/gold_coin_home.jpg');">
                        <div class="container-fluid mt-3  p-0">
                            <div class="colorlib-pricing">
                                <div class="">
                                    <div class=" animate-box">
                                        <div class="mobile-withdraw" style="color:#c69b5f;">
                                            <div class="after-login-table-block"  >
                                                <div class="pl-3 pr-3" style="color: #c69b5f!important;padding-top:10px;padding-bottom:30px;width: 100%; ">
                                                    <h5 style="font-size: 20px;font-weight: bold; padding-bottom:1rem;padding-top:3rem">
                                                        Referral History
                                                    </h5>
                                                    <div class="col-md-12 mobile-withdraw p-0 outer-border" style="color:#c69b5f;width: 100%;">
                                                        <div class="col-md-12 mobile-withdraw p-0 inner-border" style="color:#c69b5f; max-height:900px; width:100%;">
                                                            <table width="100%" border="0" cellpadding="5" cellspacing="5" class="table investment-plans-table" style="background-color: #000;">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="border:1px solid #fff;color:#c69b5f;text-align: center; min-width: 150px;">Level ID</th>          
                                                                        <th style="border:1px solid #fff;color:#c69b5f;text-align: center; min-width: 150px;">Username</th>
                                                                        <th style="border:1px solid #fff;color:#c69b5f;text-align: center; min-width: 150px;">Full Name</th>
                                                                        <th style="border:1px solid #fff;color:#c69b5f;text-align: center; min-width: 200px;">Invesment Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        function getlist($n,$level)
                                                                        {
                                                                            static $count = 0;
                                                                            static $col = 0;
                                                                            $id="intro_id   ";
                                                                            
                                                                            $sql = "select * from members where ".$id."=".$n;
                                                                            $result = mysql_query($sql);
                                                                            if(mysql_num_rows($result)==0)
                                                                                $level--;
                                                                            else
                                                                                $level++;
                                                                                
                                                                            if($level == 0) 
                                                                            $level = 1;                              
                                                                        
                                                                            while($row = mysql_fetch_array($result))
                                                                            { 
                                                                                if($level <= 4)
                                                                                {
                                                                                    $count++;
                                                                                    $col++;  
                                                                                    $name = $row["username"];   
                                                                                    $fname=$row['first_name'];
                                                                                    $mail = $row["mail_id"];
                                                                                    $mem_mmm = $row["member_id"];
                                                                                    
                                                                                    $total_deposit = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where member_id = ".$mem_mmm." and status='active'"));
                                                                                    for($j=1;$j<=$level*3;$j++) 
                                                                                    echo "";
                                                                                
                                                                                    if( $total_deposit['amt'] > 0  ) 
                                                                                    {
                                                                                        if ($col %2==0) {   
                                                                                            $color = '#BDD6EE';
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            $color = '#DEEAF6';
                                                                                        }   
                                                                                        echo "<tr >";
                                                                                    //  echo "<td>". $count ."</td>";
                                                                                        
                                                                                        echo "<td style='border:1px solid #fff;color:#c69b5f;text-align: center; min-width: 150px;'>". $level."</td>";
                                                                                        echo "<td style='border:1px solid #fff;color:#c69b5f;text-align: center;min-width: 150px;'>".$name."</td>";
                                                                                        echo "<td style='border:1px solid #fff;color:#c69b5f;text-align: center;min-width: 150px;'>".$fname."</td>";
                                                                                        echo "<td style='border:1px solid #fff;color:#c69b5f;text-align: center;min-width: 200px;'><b>฿".number_format($total_deposit['amt'],8) ."</b></td>";
                                                                                        echo "</tr>";
                                                                                    } 
                                                                                    getlist($row["member_id"],$level);
                                                                                }
                                                                            }
                                                                            return $count;
                                                                        }
                                                                        $memid = $_SESSION['userid']; 
                                                                        $count = getlist($memid ,0);    
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('footer.php')?>
    </div>
</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/aos.js"></script>

<script src="js/main.js"></script>

</html>