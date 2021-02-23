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
require 'include/validation.php';
// require 'include/investment.php';
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
    <!-- <div class="site-wrap" id="home-section"> -->
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
                //                             and (type='intrest_earned' ) 
                //                             or deposit_id in(select deposit_id from deposit where status='active' and member_id='".$userid."')";
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
                
                $depositCheckSql2 = mysql_query($depositCheckStr2);
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
                
                
            
                $tesql1="select sum(amount) as witth from history where user_id=".$userid."     and type='reinvest' order by type";
                $teres1=mysql_query($tesql1);
                $terow1=mysql_fetch_array($teres1);
                $witttth = $terow1['witth']; 
                //$available =   $total_earnings  -  $total_withdraw - $witttth;
            //  $available =   ($total_earnings  +  $user_total_matured_balance) -  $total_matured_withdraw_amount ;
            
                $available = ($tot_mature_depsit_amounts + $tot_earning_amounts)  - $total_matured_withdraw_amount;
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
                    <div class="col-md-2 col-sm-3 col-lg-2 p-0" style="background-color: #6c757d;">
                        <?php include('side_menu.php')?>
                    </div>
                    <div class="col-lg-10 col-md-12 col-sm-12"
                        style="min-height: 850px; padding: 0px;  background-image:url('images/gold_coin_home.jpg');">
                        <div class="container-fluid mt-3 p-0">
                            <div class="colorlib-pricing">
                                <div class="container" >
                                    <div class="row animate-box">
                                        <div class="col-md-12 mobile-withdraw">
                                            <div class="after-login-table-block">
                                                <?php if (isset($_SESSION['error_amt'])) { ?>
                                                    <p class = "error_message" style="text-align:center;">
                                                        <?php echo $_SESSION['planName']; echo $_SESSION['error_amt']; ?>
                                                    </p>
                                                <?php
                                                    unset($_SESSION['error_amt']);
                                                    unset($_SESSION['planName']);
                                                } ?>
                                                <div class="container" style="background-color: rgba(0, 0, 0, .8);color: #c69b5f!important;padding-top:10px;padding-bottom:30px">
                                                    <h5 style="font-size: 20px;font-weight: bold; padding-top:3rem;">
                                                        My Investment
                                                    </h5>
                                                    <div class="">
                                                        <div class="row mb-3 mb-md-0">
                                                            <div class="col-md-3">Last Investment</div>
                                                            <div class="col-md-9">฿<?php echo  number_format($last_dep,8); ?></div>
                                                        </div>
                                                        <div class="row mb-3 mb-md-0">
                                                            <div class="col-md-3">Active Investment</div>
                                                            <div class="col-md-9">฿<?php echo  number_format($total_deposit_made,8);?></div>
                                                        </div>
                                                        <div class="row mb-3 mb-md-0">
                                                            <div class="col-md-3">Total Investment</div>
                                                            <div class="col-md-9">฿<?php echo number_format($selectTotalDeposit['total_deposit'],8);?></div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div style="color: #c69b5f!important;">
                                                    <div class="mt-1">&nbsp;</div>
                                                    <div class="row ">
                                                        <?php 
                                                            $fetch = mysql_query("select * from plan order by plan_id ASC LIMIT 0,6"); 
                                                            $i = 1;   
                                                            // exit;
                                                            while($result = mysql_fetch_assoc($fetch))                            
                                                            {
                                                                if ($i %2==0) {   
                                                                    $color = '#BDD6EE';
                                                                }
                                                                else
                                                                {
                                                                    $color = '#DEEAF6';
                                                                } 
                                                                $period = mysql_fetch_array(mysql_query("select * from pay_period where pay_period_id='".$result['period_type']."'"));          
                                                                $pay_period   = $period['period'];              
                                                                $period_type  = $result['period_type'];             
                                                                $iperiod_type = $result['iperiod_type'];
                                                                if($period_type == 1)
                                                                {
                                                                    $periods_type = 1;
                                                                    $periods_status = 'Days';
                                                                }
                                                                else if($period_type == 2)
                                                                {
                                                                    $periods_type = 7;
                                                                    $periods_status = 'Weeks';
                                                                }
                                                                else if($period_type == 3)
                                                                {
                                                                    $periods_type = 30;
                                                                    $periods_status = 'Months';
                                                                }
                                                                else if($period_type == 4)
                                                                {
                                                                    $periods_type = 365;
                                                                    $periods_status = 'Year';
                                                                }
                                                                else if($period_type == 5)
                                                                {
                                                                    $periods_type = 5;
                                                                    $periods_status = 'Hours';
                                                                }
                                                                else
                                                                {
                                                                    $periods_type=1;
                                                                    $periods_status='Days';
                                                                }       
                                                                    
                                                                if($iperiod_type == 1)
                                                                {
                                                                    $iperiods_status = 'Days';
                                                                }
                                                                else if($iperiod_type == 2)
                                                                {
                                                                    $iperiods_status = 'Weeks';
                                                                }
                                                                else if($iperiod_type == 3)
                                                                {
                                                                    $iperiods_status = 'Months';
                                                                }
                                                                else if($iperiod_type == 4)
                                                                {
                                                                    $iperiods_status = 'Year';
                                                                }
                                                                else if($iperiod_type == 5)
                                                                {
                                                                    $iperiods_status = 'Hours';
                                                                }
                                                                else
                                                                {
                                                                    $iperiods_status = 'Days';
                                                                }   
                                                            
                                                                $pricipal_return = $result['release_status'];       
                                                                
                                                                if( $pricipal_return == 'on')
                                                                {
                                                                    $pricipal_return_status = 'Returned';
                                                                }
                                                                else
                                                                {
                                                                    $pricipal_return_status = 'Not Returned';
                                                                }
                                                                if( $result['period_type'] == "1" ){
                                                                    $period = Daily;
                                                                }
                                                                elseif( $result['period_type'] == "2" ) {
                                                                    $period = Weekly;
                                                                }
                                                                elseif( $result['period_type'] == "3" ) {
                                                                    $period = Monthly;
                                                                }
                                                                elseif( $result['period_type'] == "4" ) {
                                                                    $period = Yearly;
                                                                }
                                                                elseif( $result['period_type'] == "5" ) {
                                                                    $period = Hourly;
                                                                }
                                                        ?>

                                                    
                                                        <div class="col-lg-6 col-md-6 mb-3 p-0 pl-md-3 pr-md-3" data-aos="fade-up">
                                                        <!-- <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up"> -->
                                                            <div class="block-team-member-1 text-center rounded" style="padding:18px!important; background-color: rgba(0, 0, 0, 1);">
                                                                <h3 class="font-size-20 text-black" style="color:#e8b166!important"><?php echo $result['plan_type']; ?></h3>
                                                                <p class=" mb-0">Interest Rate : <span
                                                                        style="color:#c69b5f;font-size: 20px;"><?php echo $result['max_interest']; ?>%</span>
                                                                </p>
                                                                <p class="px-3 mb-0">Duration : <?php echo $result['period']; ?> Days</p>
                                                                <p class="px-3 mb-0">MinINV :฿<?php echo $result['spend_min_amount'];?></p>
                                                                <p class="px-3 ">MaxINV : ฿<?php echo $result['spend_max_amount']; ?></p>
                                                                <p class="px-3 mb-0">
                                                                    <form action="investment_payment.php" method="post">
                                                                        <?php $_SESSION['invest_index'] = mt_rand(111111,77100065);?>
                                                                        <input type="hidden" name="rdPlans" value="<?php echo $result['plan_id']; ?>"/>
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-md-8">
                                                                                <input name="txtAmount" placeholder="amount" class="mobile-input col-md-12" style="border:1px solid gray; border-radius:4px;padding-left:10px; height:38px;" type="text" name="txtAmount" value="<?php //echo $_SESSION['amount']; ?>"/> 
                                                                                
                                                                            </div>
                                                                            <div class="col-md-4 col-5 pl-md-0 mt-2 mt-md-0">
                                                                                <div class="" style="">
                                                                                    <input type="hidden" name="cboPayment" value="38" />
                                                                                    <input type="hidden" name="canSave" value="1" />
                                                                                    <input type="submit" style="width:100%;background-color: #b59966; border: 1px solid #b59966" value="Submit" class="btn btn-primary" >      
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </p>
                                                            </div>
                                                        </div>
                                                            <?php 
                                                                $i++; 
                                                            } 
                                                            ?>
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