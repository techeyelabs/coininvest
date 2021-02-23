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
    <div class="container-fluid jumpingNav" >
        <div class="" style="max-width: 1100px; margin: 0 auto;">
            <div class="row mt-3">
                <div class="col-md-2 col-sm-3 col-lg-2 p-0" style="background-color: #6c757d;">
                    <?php include('side_menu.php')?>
                </div>
                <div class="col-lg-10 col-md-12 col-sm-12"
                    style="min-height: 850px; max-height:1100px; padding: 0px;  background-image:url('images/gold_coin_home.jpg');">
                    <div class="container-fluid mt-3 p-0">
                        <div class="colorlib-pricing">
                            <div class="" >
                                <div class=" animate-box">
                                    <div class="mobile-withdraw" style="color:#c69b5f;">
                                        <div class="after-login-table-block">
                                            <div class="pl-3 pr-3" style="color: #c69b5f!important;padding-top:10px;padding-bottom:30px;width: 100%;">
                                                <p class="success_message" id="successMessage" style="display:none;text-align:center">
                                                    <?php 
                                                        if(isset($_SESSION['succ_dir_withdraw'])){
                                                            echo $_SESSION['succ_dir_withdraw'];
                                                            unset($_SESSION['succ_dir_withdraw']);
                                                        }
                                                    ?>
                                                </p>
                                                <h5 style="font-size: 20px;font-weight: bold; padding-bottom:1rem;padding-top:3rem">
                                                    Withdraw History
                                                </h5>
                                                <div class="col-md-12 mobile-withdraw p-0 outer-border" style="color:#c69b5f;width:100%;">
                                                    <div class="col-md-12 mobile-withdraw p-0 inner-border" style="color:#c69b5f;max-height:900px; width:100%;">
                                                        <table width="100%" border="0" cellpadding="5" cellspacing="5" class="table investment-plans-table" style="background-color: #000; ">
                                                            <thead>
                                                                <tr>
                                                                    <th style="border:1px solid #fff;color:#c69b5f;text-align: center;min-width: 150px;">Transaction ID</th>          
                                                                    <th style="border:1px solid #fff;color:#c69b5f;text-align: center;min-width: 120px;">Date</th>
                                                                    <th style="border:1px solid #fff;color:#c69b5f;text-align: center;min-width: 120px;">Amount</th>
                                                                    <th style="border:1px solid #fff;color:#c69b5f;text-align: center;min-width: 320px;">Description</th>
                                                                    <th style="border:1px solid #fff;color:#c69b5f;text-align: center;min-width: 100px;">Status</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                    <?php 
            
                                                                        $select_withdraw1 = "select * from  history where (type = 'withdrawal' or type = 'withdraw_pending') and user_id='".$_SESSION['userid']."' ";
                                                                            
                                                                            $select_withdraw1.="ORDER BY `history`.`id` DESC LIMIT 0 , 200";
                                                                                                        
                                                                            $select_withdraw = mysql_query($select_withdraw1);                 
                                                                            if(mysql_num_rows($select_withdraw) > 0)
                                                                            {
                                                                                while($fetch = mysql_fetch_array($select_withdraw))
                                                                                {
                                                                                    if($fetch['type'] =='withdrawal')
                                                                                    {
                                                                                    $status = "Paid";
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                    $status = 'Pending';    
                                                                                    }
                                                                                    $i++;
                                                                                    $y = $i % 2;
                                                                                            
                                                                                    if ($y %2==0) {   
                                                                                        $color = '#BDD6EE';
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        $color = '#DEEAF6';
                                                                                    } 
                                                                                    $temp = date('Y-m-d', strtotime($fetch['date']));
                                                                    ?>
    
                                                                <tr>
                                                                    <td style="border:1px solid #fff;color:#c69b5f;text-align: center; min-width: 150px;"><?php echo $fetch['transaction_id']; ?></td>
                                                                    <td style="border:1px solid #fff;color:#c69b5f;text-align: center; min-width: 120px;"><?php echo ($temp); ?> </td>
                                                                    <td style="border:1px solid #fff;color:#c69b5f;text-align: center; min-width: 120px;">฿<?php echo number_format($fetch['amount'],8); ?></td>
                                                                    <td style="border:1px solid #fff;color:#c69b5f;text-align: center; min-width: 320px;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucfirst($fetch['description']); ?></td> 
                                                                    <td style="border:1px solid #fff;color:#c69b5f;text-align: center; min-width: 100px;"><?php echo $status; ?></td>         
                                                                </tr>
                                                                    <?php }

                                                                    } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="mt-5">&nbsp;</div>
                                                    
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