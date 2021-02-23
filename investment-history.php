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
                                        <div class="mobile-withdraw">
                                            <div class="after-login-table-block">
                                                <div class="pl-3 pr-3 " style="color: #c69b5f!important;padding-top:10px;padding-bottom:30px;width: 100%; ">
                                                    
                                                <?php
                                                    //  print_r($_POST);                  
                                                    if(isset($_POST['money'])&& !empty($_SESSION['invest_index']))
                                                    {
                                                        $member_id = trim($_POST["user_email"]);
                                                        $member_id = trim($_POST["member_id"]);
                                                        $plan_id = trim($_POST["plan_id"]);
                                                        $amount = trim($_POST["amount"]);
                                                        $address1 = trim($_POST["address"]);
                                                        $order_no = trim($_POST["order_no"]);
                                                        

                                                        $user_det = mysql_fetch_array(mysql_query("select * from members where member_id=$member_id"));
                                                        $member_wallet = $user_det['bitcoin'];

                                                        if($_POST['amount'] != "")
                                                        {
                                                            $transaction_id = "DEP".rand(0,9999999);
                                                            
                                                            $planQuery = mysql_query("select period from plan where plan_id=".$plan_id.""); 
                                                            $planDetail = mysql_fetch_row($planQuery);
                                                            $planDuration = $planDetail[0];
                                                            
                                                            $invest_date = date('Y-m-d');
                                                            $mature_date = date('Y-m-d', strtotime($invest_date . ' +'.$planDuration.' day'));
                                                            
                                                            
                                                            $insert_deposit_result = "INSERT INTO `deposit`(`deposit_id`, `member_id`, `plan_id`,`order_no`,`user_wallet`,`wallet`, `amount`, `compound_amount`, `invest_date`, `maturity_date`, `status`, `intrest_alloted`, `payment_thro`, `intrest_earned`, `intrest_earned_date`, `compound_rate`, `transaction_id`, `cron_date`) 
                                                                VALUES('0','".$member_id."','".$plan_id."','$order_no','$member_wallet','$address1','".$amount."','".$amount."','".$invest_date."','". $mature_date . "','new','no','38','0',null,'0','".$transaction_id."',null)";
                                                                mysql_query($insert_deposit_result);
                                                            
                                                            echo "<p class='success_message' style='margin-bottom:-1rem;'><span style='text-align:center;'> Your Amount: $amount BTC Deposited  successfully. Amount will added into your AtKinSons Account. After confirmation of BTC payment.</span></p>";
                                                            
                                                            unset($_SESSION['invest_index']);
                                                            unset($_SESSION['error_amt']);
                                                            unset($_SESSION['error_plan']);
                                                            unset($_SESSION['error_payment']);
                                                            unset($_SESSION['plan_id']);		
                                                            unset($_SESSION['payid']);		
                                                            unset($_SESSION['amount']);
                                                            unset($_SESSION['compound_rate']);
                                                            
                                                            //print_r($_POST);
                                                            // exit();
                                                    
                                                            // echo '<meta http-equiv="refresh" content="15; url=investment-history.php" />';
                                                            // exit();
                                                            
                                                        }else{
                                                            //echo "block -1";
                                                            echo '<meta http-equiv="refresh" content="0; url=investment-history.php" />';
                                                            // exit();
                                                        }
                                                    }
                                                ?>
                                                
                                                    <h5 style="font-size: 20px;font-weight: bold; padding-bottom:1rem;padding-top:3rem">
                                                        Investment History
                                                    </h5>
                                                    <div class="col-md-12 mobile-withdraw p-0 outer-border" style="color:#c69b5f; width: 100%;">
                                                        <div class="col-md-12 mobile-withdraw p-0 inner-border" style="color:#c69b5f;max-height:900px; width:100%;">
                                                            <table  border="0" cellpadding="5" cellspacing="5" class="table investment-plans-table " style="background-color: #000; table-layout:fixed;max-width:900px;min-width:720px;">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="border:1px solid #fff;color:#c69b5f;text-align: center; width: 180px; ">Plan</th>          
                                                                        <th style="border:1px solid #fff;color:#c69b5f;text-align: center;">Amount</th>
                                                                        <th style="border:1px solid #fff;color:#c69b5f;text-align: center;">Date</th>
                                                                        <th style="border:1px solid #fff;color:#c69b5f;text-align: center;">Maturity Date</th>
                                                                        <th style="border:1px solid #fff;color:#c69b5f;text-align: center;">Status</th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                    
                                                                    $select_withdraw1 = "select * from deposit where member_id='".$_SESSION['userid']."' ";
                                                                        $select_withdraw = mysql_query($select_withdraw1);                 
                                                                        if(mysql_num_rows($select_withdraw) > 0)
                                                                        {
                                                                            while($fetch = mysql_fetch_array($select_withdraw))
                                                                            {
                                                                                $plan_id = mysql_fetch_array(mysql_query("select * from plan where plan_id =".$fetch['plan_id']));
                                                                                if($fetch['payment_thro'] == 13)
                                                                                {
                                                                                    $payment_mode = 'Bank Wire';
                                                                                }
                                                                                else
                                                                                {
                                                                                    $payment_id = mysql_fetch_array(mysql_query("select * from  payment_process where  payment_id =".$fetch['payment_thro']));
                                                                                    $payment_mode = $payment_id['payment_name'];
                                                                                }
                                                                                $i++;
                                                                                $y = $i % 2;
                                                                                if ($y %2==0)
                                                                                {   
                                                                                    $color = '#BDD6EE';
                                                                                }
                                                                                else
                                                                                {
                                                                                    $color = '#DEEAF6';
                                                                                } 
                                                                                $temp = date('Y-m-d', strtotime($fetch['date']));
                                                                        ?>
                                                                        <tr>
                                                                            <td style="border:1px solid #fff;color:#c69b5f;text-align: center; width: 180px; "><?php echo $plan_id['plan_type']; ?></td>
                                                                            <td style="border:1px solid #fff;color:#c69b5f;text-align: center; width: 180px; ">฿<?php echo number_format($fetch['amount'],8); ?></td>
                                                                            <td style="border:1px solid #fff;color:#c69b5f;text-align: center; width: 180px!important;"><?php echo $fetch['invest_date']; ?></td>
                                                                            <td style="border:1px solid #fff;color:#c69b5f;text-align: center; width: 180px; ">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fetch['maturity_date']; ?></td> 
                                                                            <td style="border:1px solid #fff;color:#c69b5f;text-align: center;width: 80px;"><?php echo $fetch['status'] == 'new' ? 'Pending' :  $fetch['status']; ?></td>         
                                                                        </tr>
                                                                    <?php }
                                                                    } 
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="row mb-5">
                                                        <div class="col-12">
                                                            <div class="block-heading-1">
                                                                <h2>Investors</h2>
                                                            </div>
                                                        </div>
                                                    </div> -->

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