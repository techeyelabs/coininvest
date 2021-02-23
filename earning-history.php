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

<?php  
    //date_default_timezone_set("Europe/London");
    date_default_timezone_set('Etc/GMT');
    $fetch = mysql_fetch_assoc(mysql_query("select * from cms_table where cms_id='1'"));
    // CHART FOR LAST WEEK JOINERS
    $yesterday = date("Y-m-d", strtotime("-7 day"));
    //'Monday', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'
    $day1  = date("D", strtotime("-7 day"));
    $date1 = date("Y-m-d", strtotime("-7 day"));
    $no1 = mysql_num_rows(mysql_query("select * from members where date_of_join='".$date1."'"));
    $amt1 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where date ='".$date1." 00:00:00' and user_id='".$_SESSION['userid']."'"));
    
    if($amt1['amt'] == '') 
    $amt11 = 0; 
    else 
    $amt11 = $amt1['amt']; 
    
    
    $day2 = date("D", strtotime("-6 day"));
    $date2 = date("Y-m-d", strtotime("-6 day"));
    $no2 = mysql_num_rows(mysql_query("select * from members where date_of_join='".$date2."'"));
    $amt2 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where date ='".$date2." 00:00:00' and user_id='".$_SESSION['userid']."'"));
    if($amt2['amt'] == '') 
    $amt12=0; 
    else 
    $amt12 = $amt2['amt']; 
    
    
    $day3 = date("D", strtotime("-5 day"));
    $date3 = date("Y-m-d", strtotime("-5 day"));
    $no3 = mysql_num_rows(mysql_query("select * from members where date_of_join='".$date3."'"));
    $amt3 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where date ='".$date3." 00:00:00' and user_id='".$_SESSION['userid']."'"));
    
    if($amt3['amt'] == '') 
    $amt13 = 0; 
    else 
    $amt13 = $amt3['amt']; 
    
    $day4 = date("D", strtotime("-4 day"));
    $date4 = date("Y-m-d", strtotime("-4 day"));
    $no4 = mysql_num_rows(mysql_query("select * from members where date_of_join='".$date4."'"));
    $amt4 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where date ='".$date4." 00:00:00' and user_id='".$_SESSION['userid']."'"));
    
    if($amt4['amt'] == '') 
    $amt14 = 0; 
    else 
    $amt14 = $amt4['amt']; 
    
    $day5 = date("D", strtotime("-3 day"));
    $date5 = date("Y-m-d", strtotime("-3 day"));
    $no5 = mysql_num_rows(mysql_query("select * from members where date_of_join='".$date5."'"));
    $amt5 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where date ='".$date5." 00:00:00' and user_id='".$_SESSION['userid']."'"));
    
    
    if($amt5['amt'] == '') 
    $amt15 = 0; 
    else 
    $amt15 = $amt5['amt']; 
    
    
    $day6 = date("D", strtotime("-2 day"));
    $date6 = date("Y-m-d", strtotime("-2 day"));
    $no6 = mysql_num_rows(mysql_query("select * from members where date_of_join='".$date6."'"));
    $amt6 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where date ='".$date6." 00:00:00' and user_id='".$_SESSION['userid']."'"));
    
    if($amt6['amt'] == '') 
    $amt16 = 0; 
    else 
    $amt16 = $amt6['amt']; 
    
    $day7 = date("D", strtotime("-1 day"));
    $date7 = date("Y-m-d", strtotime("-1 day"));
    $no7 = mysql_num_rows(mysql_query("select * from members where date_of_join='".$date7."'"));
    $amt7 = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where date ='".$date7." 00:00:00' and user_id='".$_SESSION['userid']."'"));
    
    if($amt7['amt'] == '') 
    $amt17 = 0; 
    else 
    $amt17 = $amt7['amt']; 
    
    $final_days = "'".$day1."','".$day2."','".$day3."','".$day4."','".$day5."','".$day6."','".$day7."'";
    $final_date = $no1.",".$no2.",".$no3.",".$no4.",".$no5.",".$no6.",".$no7;
    $final_amount = $amt11.",".$amt12.",".$amt13.",".$amt14.",".$amt15.",".$amt16.",".$amt17;
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
                    <div class="col-lg-2 p-0" style="background-color: #6c757d;">
                        <?php include('side_menu.php')?>
                    </div>
                    <div class="col-lg-10 col-md-12 col-sm-12"
                        style="min-height: 850px; max-height:1100px; padding: 0px;  background-image:url('images/gold_coin_home.jpg');">
                        <div class="container-fluid mt-3 p-0">
                            <div class="colorlib-pricing">
                                <div class="" >
                                    <div class=" animate-box">
                                        <div class="">
                                            <div class="after-login-table-block">
                                                <div class="pl-3 pr-3" style="color: #c69b5f!important;padding-top:10px;padding-bottom:30px;width: 100%; ">
                                                    <h5 style="font-size: 20px;font-weight: bold; padding-top:3rem;padding-bottom:1rem">
                                                        Earning History
                                                    </h5>
                                                    <div class="col-md-12 mobile-withdraw p-0 outer-border" style="color:#c69b5f;  width: 100%;">
                                                        <div class="col-md-12 mobile-withdraw p-0 inner-border" style="color:#c69b5f; max-height:900px; width:100%; ">
                                                            <table border="0" cellpadding="5" cellspacing="5" class="table table-lg-responsive investment-plans-table" style="background-color: #000;" >
                                                                <?php  
                                                                    $select_history = "SELECT * FROM `history` where type not in('withdraw_pending') and user_id='".$_SESSION['userid']."' ORDER BY `history`.`date` DESC LIMIT 0 , 365 ";
                                                                    $select_history12 = mysql_query($select_history);
                                                                ?>   
                                                                <thead>
                                                                    <tr>
                                                                        <th style="border:1px solid #fff;color:#c69b5f;text-align: center;min-width: 150px;">Transaction ID</th>          
                                                                        <th style="border:1px solid #fff;color:#c69b5f;text-align: center;min-width: 120px;">Amount</th>
                                                                        <th style="border:1px solid #fff;color:#c69b5f;text-align: center;min-width: 150px;">Maturity Date</th>
                                                                        <th style="border:1px solid #fff;color:#c69b5f;text-align: center;min-width: 350px;">Description</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody> 
                                                                    <?php 
                                                                        if(mysql_num_rows($select_history12) > 0)
                                                                        {
                                                                            $i=0;
                                                                            while($fetch111 = mysql_fetch_array($select_history12))
                                                                            {
                                                                                $i++;
                                                                                $k = $i % 2;
                                                                                if($k == 0)
                                                                                {
                                                                                    $color = '#BDD6EE';
                                                                                }
                                                                                else
                                                                                {
                                                                                    $color = '#DEEAF6';
                                                                                }
                                                                    ?>

                                                                    <tr>
                                                                        <td style="border:1px solid #fff;color:#c69b5f;text-align: center;min-width: 150px;"><?php echo $fetch111['transaction_id']; ?></td>
                                                                        <td style="border:1px solid #fff;color:#c69b5f;text-align: center;min-width: 120px;">฿<?php echo  $fetch111['amount']; ?></td>
                                                                            <?php 
                                                                                $matureSql = mysql_fetch_assoc(mysql_query("select * from deposit where deposit_id=".$fetch111['deposit_id']."" ));
                                                                                $matureDate = $matureSql['maturity_date'];
                                                                            ?>
                                                                        <td style="border:1px solid #fff;color:#c69b5f;text-align: center;min-width: 150px;"><?php echo $matureDate; ?></td>
                                                                        <td style="border:1px solid #fff;color:#c69b5f;text-align: center;min-width: 350px;"><?php echo ucfirst($fetch111['description']); ?></td>         
                                                                    </tr>
                                                                    <?php }
                                                                        }
                                                                    ?>
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