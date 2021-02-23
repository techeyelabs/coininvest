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
            $last_invest_str = "SELECT * FROM deposit WHERE member_id=".$userid." ORDER BY deposit_id DESC LIMIT 1";
            $last_invests = mysql_fetch_array(mysql_query($last_invest_str));
            $last_dep = $last_invests['amount'];
            
            $last_payout_str = "SELECT * FROM history WHERE user_id=".$userid." AND type='withdrawal' ORDER BY id DESC LIMIT 1";
            $last_payouts_sql = mysql_fetch_array(mysql_query($last_payout_str));
            $last_payouts = $last_payouts_sql['amount'];
            
            $m_str = "select * from members where member_id=".$userid."";
            $m_res = mysql_fetch_array(mysql_query($m_str));
            $member_status = $m_res['status'];
        ?>

        <?php  
            
            //========= user total prematured interest earning =========================
            if($userid == 32) {
                    $prematureInterestEarningStr = "select sum(amount) as premature_interest_earning from history where user_id='".$userid."' 
                                        and (type='intrest_earned' ) 
                                        or deposit_id in(select deposit_id from deposit where status='active' and user_id='".$userid."')";
            }
            else if($userid == 34) {
                    $prematureInterestEarningStr = "select sum(amount) as premature_interest_earning from history where user_id='".$userid."' 
                                        and (type='intrest_earned' ) 
                                        or deposit_id in(select deposit_id from deposit where status='active' and user_id='".$userid."')";
            }
            else if($userid == 36) {
                    $prematureInterestEarningStr = "select sum(amount) as premature_interest_earning from history where user_id='".$userid."' 
                                        and (type='intrest_earned' ) 
                                        or deposit_id in(select deposit_id from deposit where status='active' and user_id='".$userid."')";
            }
            else{
                //  $prematureInterestEarningStr = "select sum(amount) as premature_interest_earning from history where user_id='".$userid."' 
            //          and (type='intrest_earned' ) 
            //          or deposit_id in(select deposit_id from deposit where status='active' and member_id='".$userid."')";
                    $prematureInterestEarningStr = "select sum(amount) as premature_interest_earning from history where type='intrest_earned' and user_id = '".$userid."'";
                                        
            }  
                // echo $prematureInterestEarningStr; exit;
            $prematureInterestEarningSql =  mysql_query($prematureInterestEarningStr);
            $premature_interest_earnings_total = 0;
            while( $prematureInterestEarningRes = mysql_fetch_assoc($prematureInterestEarningSql) ) 
            {
                    $premature_interest_earnings_total += $prematureInterestEarningRes['premature_interest_earning'];
            }
            
            
            
            
            
            
            //=== 1btc bonus problem solving==================
            if($_SESSION['userid'] > 25) {
                $prematureCommissionEarningStr = "select  sum(`history`.`amount`) as premature_commissio_earning,`history`.`deposit_id` from history where 
                                        (type='commissions' or type='bonus') and `history`.`user_id`='". $userid ."'  group by deposit_id";   

            }else{
                $prematureCommissionEarningStr = "select sum(amount) as premature_commissio_earning,deposit_id from history where user_id='".$userid."' 
                                        and (type='commissions' ) or (type='bonus') group by deposit_id";
            }                                    

            $prematureCommissionEarningSql = mysql_query($prematureCommissionEarningStr);
            $premature_commission_earning_total = 0;
            while($prematureCommissionEarningRes = mysql_fetch_assoc($prematureCommissionEarningSql)) 
            {
                $premature_commission_earnings = $prematureCommissionEarningRes['premature_commissio_earning'];
                $premature_commission_earnings_dep_id = $prematureCommissionEarningRes['deposit_id'];
                    //$depositCheckStr2 = "select * from deposit where and status='active' and deposit_id='".$premature_commission_earnings_dep_id."'" ;
                $depositCheckSql2 = mysqli_query($depositCheckStr2);
                //echo mysql_num_rows($depositCheckSql2);
                //if(mysql_num_rows($depositCheckSql2) > 0 ) {
                $premature_commission_earning_total += $premature_commission_earnings;
                // }
            }
            
            $prematureCommissionWithdrawStr = "select sum(amount) as premature_commissio_earning,deposit_id from history where user_id='".$userid."' 
                                        and (type='withdrawal' ) group by deposit_id";
            $prematureCommissionWithdrawSql = mysql_query($prematureCommissionWithdrawStr);
            $premature_withdrawal_total = 0;
            while($prematureCommissionWithdrawRes = mysql_fetch_assoc($prematureCommissionWithdrawSql) ) {
                $premature_withdrawal_total += $prematureCommissionWithdrawRes['premature_commissio_earning'];
            }
            
            $total_premature_earning = $premature_interest_earnings_total+$premature_commission_earning_total;
            
            $total_deposit = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where member_id = ".$mem_mmm." and status='active'"));
            
            //"select deposit_id from deposit where member_id='".$userid."'";
            
            function getTotalEarning($deposit_id , $member_id) {
                    $userMat  = "select amount from history where user_id=".$member_id." and deposit_id=".$deposit_id." and type='intrest_earned'";
                $userMatSql = mysql_query($userMat);
                
                $totalEarn = 0;
                while($rrr = mysql_fetch_assoc($userMatSql) ) {
                    $totalEarn += $rrr['amount'];
                }
                return $totalEarn;
            }
            
            $maturedDeposStr1 = "select deposit_id,member_id,amount   from deposit where member_id=".$userid." and status='matured'";
            $maturedDeposSql1 = mysql_query($maturedDeposStr1);
            
            $tot_mature_depsit_amounts = 0;
            $tot_earning_amounts = 0;
            while($rrres = mysql_fetch_assoc($maturedDeposSql1) ) {
                //echo $rrres['deposit_id'] ."<br/>";
                $tot_mature_depsit_amounts += $rrres['amount'];
                $tot_earning_amounts +=  getTotalEarning($rrres['deposit_id'] , $rrres['member_id']);
            }
            //echo $tot_mature_depsit_amounts.' = ' . $tot_earning_amounts ;
            $user_total_matured_balance = $maturedDeposSql['total_matured'];
            //$user_total_matured_deposit = 0;//$maturedDeposSql['total_matured'];
            $maturedDeposStr = "select sum(amount) as total_matured from deposit where member_id=".$userid." and status='matured'";
            $maturedDeposSql = mysql_fetch_assoc(mysql_query($maturedDeposStr));
            //$maturedDeposStr = "select depsit_id,member_id,amount as total_matured from deposit where member_id=".$userid." and status='matured'";
            $user_total_matured_balance = $maturedDeposSql['total_matured'];
            //$user_total_matured_deposit = 0;//$maturedDeposSql['total_matured'];
            
            //while($maturedDeposSql = mysql_fetch_assoc(mysql_query($maturedDeposStr))) {
                //  $user_total_matured_deposit += $maturedDeposSql['amount'];
                //  $user_total_earning_amount =  getTotalEarning($maturedDeposSql['deposit_id'] , $maturedDeposSql['member_id']);
            //}
            $userMaturedDepoWithdrawStr = "select sum(amount) as withdraw_amount from history where user_id=".$userid." and type='withdrawal'";
            $userMaturedDepoWithdrawSql = mysql_fetch_assoc(mysql_query($userMaturedDepoWithdrawStr));
            $total_matured_withdraw_amount = $userMaturedDepoWithdrawSql['withdraw_amount'];
            
             //==============Raisul withdrawl change =================//

            $userMaturedDepoPanddingWithdrawStr = "select sum(amount) as withdraw_pandding_amount from history where user_id=".$userid." and type='withdraw_pending'";
            $userMaturedDepoPanddingWithdrawSql = mysql_fetch_assoc(mysql_query($userMaturedDepoPanddingWithdrawStr));
            $total_matured_withdraw_pandding_amount = $userMaturedDepoPanddingWithdrawSql['withdraw_pandding_amount'];
            
            
        
            $tesql1="select sum(amount) as witth from history where user_id=".$userid."     and type='reinvest' order by type";
            $teres1=mysql_query($tesql1);
            $terow1=mysql_fetch_array($teres1);
            $witttth = $terow1['witth']; 
            //$available =   $total_earnings  -  $total_withdraw - $witttth;
            //  $available =   ($total_earnings  +  $user_total_matured_balance) -  $total_matured_withdraw_amount ;
            $available = ($tot_mature_depsit_amounts + $tot_earning_amounts)  - $total_matured_withdraw_amount - $total_matured_withdraw_pandding_amount ;
            //if($userid == 106){
                //$available += 11.61;
                // $tot_earning_amounts -= 11.61;
            //}
            //   echo  $tot_mature_depsit_amounts ;
            $selectDepositSql = mysql_query("select * from deposit where status = 'matured' and member_id=".$_SESSION['userid']);
            $selectDeposit = mysql_fetch_assoc($selectDepositSql);
            //print_r($selectDeposit);
            $selectTotalDepositSql = mysql_query("select sum(amount) as total_deposit from deposit where member_id=".$_SESSION['userid']);
            $selectTotalDeposit = mysql_fetch_assoc($selectTotalDepositSql);
        ?>

        <div class="container-fluid jumpingNav" >
            <div class="" style="max-width: 1100px; margin: 0 auto;">
                <div class="row mt-3">
                    <div class=" col-lg-2 p-0" style="background-color: #6c757d;">
                        <?php include('side_menu.php')?>
                    </div>
                    <div class="col-lg-10 col-md-12 "
                        style="min-height: 850px; padding: 0px 0px 15px 0px;  background-image:url('images/gold_coin_home.jpg');">
                        <div class="container-fluid mt-3 p-0">
                            <div class="container " >
                                <div class="container p-0 pb-5" style="background-color: rgba(0,0,0,.8);min-height:550px;max-height:1050px; color: #c69b5f!important;">
                                    <div class="my-account-table-block col " style="">
                                        <h5 style="font-size: 20px;font-weight: bold; padding-top:3rem;">
                                            My Account
                                        </h5>
                                        <div class="row mb-3 mb-md-0">
                                            <div class="col-md-3">Username</div>
                                            <div class="col-md-9"><?php echo $member_username;?></div>
                                        </div>
                                        <div class="row mb-3 mb-md-0">
                                            <div class="col-md-3">Email</div>
                                            <div class="col-md-9"><?php echo $member_email;?></div>
                                        </div>
                                        <div class="row mb-3 mb-md-0">
                                            <div class="col-md-3">Full Name</div>
                                            <div class="col-md-9"><?php echo $member_full_name;?></div>
                                        </div>
                                        <div class="row mb-3 mb-md-0">
                                            <div class="col-md-3">Bitcoin Wallet</div>
                                            <div class="col-md-9"><?php echo $member_bitcoin;?></div>
                                        </div>
                                        <div class="row mb-3 mb-md-0">
                                            <div class="col-md-3">Member Since</div>
                                            <div class="col-md-9"><?php echo $member_since;?></div>
                                        </div>
                                        <div class="row mb-2 mb-md-0">
                                            <div class="col-md-12">&nbsp;</div>
                                        </div>
                                        <div class="row mb-2 mb-md-0">
                                            <div class="col-md-3">My Investment Amount</div>
                                            <div class="col-md-9">฿<?php echo number_format($total_deposit_made,8); ?></div>
                                        </div>
                                        <div class="row mb-2 mb-md-0">
                                            <div class="col-md-3">My Balance Amount</div>
                                            <div class="col-md-9">฿<?php 
                                                if( mysql_num_rows($selectDepositSql) > 0 )
                                                { 
                                                echo  number_format($available,8); 
                                                }
                                                else{ echo '0.00000000';  }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row mb-2 mb-md-0">
                                            <div class="col-md-3">Pre-Mature Earning</div>
                                            <div class="col-md-9">฿<?php echo  number_format($total_premature_earning,8);?></div>
                                        </div>
                                        <div class="row mb-2 mb-md-0">
                                            <div class="col-md-12">&nbsp;</div>
                                        </div>
                                        <!--<div class="row mb-2 mb-md-0">-->
                                        <!--    <div class="col-md-12">Referrals Information</div>-->
                                        <!--</div>-->
                                        <?php 
                                        // <!--    $refid=mysql_fetch_assoc(mysql_query("SELECT username FROM  members WHERE member_id='".$_SESSION['userid']."'"));-->
                                        // <!--    $siteurl=mysql_fetch_assoc(mysql_query("SELECT set_value FROM  admin_settings WHERE set_id='37'"));-->
                                        // <!--    $refurl='https://atkinsonsbullion-invest.com/index.php?'.$refid['username']; -->
                                        // <!--    $_SESSION['userName'] = $refid['username'];-->
                                        ?>
                                        <!--<div class="row mb-2 mb-md-0">-->
                                        <!--    <div class="col-md-3">Total Referral Commission</div>-->
                                        <!--    <div class="col-md-9">฿<?php  //echo number_format($total_commission,8); ?></div>-->
                                        <!--</div>-->
                                       
                                        <!--<div class="row mb-2 mb-md-0">-->
                                        <!--    <div class="col-md-3 text-left">Referral Link</div>-->
                                        <!--</div>-->
                                        <!--<div class="row">-->
                                        <!--    <div class="col-md-9 pr-md-0"> <input type="text" id="referalLink" class="my-referal-input" style="width:100%" readonly="readonly" value="<?php echo $refurl;?>"/></div>-->
                                        <!--    <div class="col-md-3 text-left mt-md-0 mt-2"><button style="" onclick="copyReferralLink()">Copy</button></div>-->
                                        <!--</div>-->
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

<!-- Custom scripts -->
<script src="js/request.js"></script>
<script>
    function copyReferralLink() {
        var copyText = document.getElementById("referalLink");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
    }
</script>
</html>