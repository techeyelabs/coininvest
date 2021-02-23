<?php session_start();
// date_default_timezone_set("Europe/London");
date_default_timezone_set('Etc/GMT');
error_reporting(0);
require( __DIR__ .'/connect.php');
if(empty ($_SESSION['userid']))
{
 echo '<meta http-equiv="refresh" content="0; url=index.php" />';
 exit();
 }
$userid = $_SESSION['userid'];
require 'include/memberstat.php';

//require 'recaptcha/recaptchalib.php';
// Get a key from https://www.google.com/recaptcha/admin/create

$publickey = "6Ld5p70SAAAAAACp9WiouDRAdbEIasylYIoNzyP7";
$privatekey = "6Ld5p70SAAAAAEJC-8PXaN0v9j8RvDhGHfUQAC0k";

# the response from reCAPTCHA
$resp = null;

# the error code from reCAPTCHA, if any
$error = null;
 
function CreateOption( $cboname , $curid , $tablename ) 
{
        echo '<select name='.ucwords($cboname).' class="txtbx" id="select2" title="Choose your country" style="width:180px" >';
        echo '<option value="">Select</option>';
        $optSql = "select * from $tablename";
        
        if($cboname == 'Directory')
        $optSql .= " where status=1";
                
        $optResult = mysqli_query($optSql);
            
        while( $optRow = mysqli_fetch_array($optResult)) 
        {
                if($cboname == 'plan')
                {
                    if($optRow[0] == $curid)
                        echo '<option value='.$optRow[0].' selected="selected">'. $optRow[2] .'</option>';
                    else
                        echo '<option value='.$optRow[0].'>'. $optRow[2] .'</option>';
                }
                else
                {
                    if( $optRow[0] == $curid )
                        echo '<option value='.$optRow[0].' selected>'. $optRow[1] .'</option>';
                    else
                        echo '<option value='.$optRow[0].'>'. $optRow[1] .'</option>';
                }
            }
            echo '</select>';
    }
 
$meta = mysqli_fetch_array(mysqli_query("select * from meta_info where meta_id=1"));
$pagename = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
$sitevalues = mysqli_fetch_array(mysqli_query("select set_value from admin_settings where set_id='44'"));
?>

<?php// echo $_SESSION['current_password']?>

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
                        style="min-height: 850px; padding: 0px;  background-image:url('images/gold_coin_home.jpg');">
                        <div class="container-fluid mt-3 p-0">
                            <div class="container">
                                <div class="container p-0" style="background-color: rgba(0,0,0,.8);">
                                    <div class="my-account-table-block col " style="margin-top:24px; padding: 2rem 0rem 3rem 1rem; width: 95%;min-height:450px;max-height:1050px;color: #c69b5f; ">
                                        <p class="msg" >
                                            <ul  style="list-style: none; text-align:center;padding-left: 0;">
                                                <?php 
                                                    if(!empty($_SESSION['empty_current_password'])) { 
                                                        echo $_SESSION['empty_current_password']; 
                                                        echo '<li>';
                                                        $_SESSION['empty_current_password']=''; 
                                                        echo '</li>';
                                                        unset($_SESSION['empty_current_password']);
                                                    } 
                                                
                                                    if($_SESSION['empty_new_password']) { 
                                                        echo '<li >';
                                                        echo $_SESSION['empty_new_password'];  
                                                        $_SESSION['empty_new_password']='';
                                                        echo '</li>';
                                                        unset($_SESSION['empty_new_password']);
                                                        }  
                                                                                    
                                                    
                                                    if($_SESSION['empty_new_password_confirmation']) {
                                                        echo '<li >';
                                                        echo $_SESSION['empty_new_password_confirmation']; 
                                                        $_SESSION['empty_new_password_confirmation']=''; 
                                                        echo '</li>';
                                                        unset($_SESSION['empty_new_password_confirmation']);
                                                    }  
                                            
                                                    if($_SESSION['old_password_not_matched']) {
                                                        echo '<li >';
                                                        echo $_SESSION['old_password_not_matched']; 
                                                        $_SESSION['old_password_not_matched']=''; 
                                                        echo '</li>';
                                                        unset($_SESSION['old_password_not_matched']);
                                                    }  
                                                    
                                                    if($_SESSION['new_confirm_new_password_not_matched']) {
                                                        echo '<li >';
                                                        echo $_SESSION['new_confirm_new_password_not_matched']; 
                                                        $_SESSION['new_confirm_new_password_not_matched']=''; 
                                                        echo '</li>';
                                                        unset($_SESSION['new_confirm_new_password_not_matched']);
                                                    }  
                                                ?> 
                                            </ul>
                                        </p>
                                        <div >
                                            <form name="myform" action="password_change.php" id="myform" method="post">
                                                <p><?php if(isset($_SESSION['success_pass_change'])){
                                                    echo $_SESSION['success_pass_change'];
                                                    unset($_SESSION['success_pass_change']);
                                                }?></p>
                                                <p class="msg" style="color: red;"></p>

                                                <div class="row form-group">
                                                    <div class="col-md-3">
                                                        <lable> Current Password </lable>
                                                    </div>
                                                    <div class="col-md-9 col-sm-10">                                            
                                                        <input type="password" id="current_password" name="current_password" autocomplete="false" class="form-control inpBox" placeholder="Current Password"
                                                        
                                                        >
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col-md-3">
                                                        <lable> New Password </lable>
                                                    </div>
                                                    <div class="col-md-9 col-sm-10">                                            
                                                        <input type="password" id="new_password" name="new_password" autocomplete="false" class="form-control inpBox" placeholder="New Password">
                                                    </div>
                                                </div>    
                                                    
                                                <div class="row form-group">
                                                    <div class="col-md-3">
                                                        <lable> Confirm Password </lable>
                                                    </div>
                                                    <div class="col-md-9 col-sm-10">                                            
                                                        <input type="password" id="new_password_confirm" name="new_password_confirm" autocomplete="false" class="form-control inpBox" placeholder="Confirm Password">
                                                    </div>
                                                </div>

                                                <div class="form-group text-center" >
                                                        <input type="submit" value="Submit" class="btn btn-secondry login-submit-btn"  style="">
                                                </div>
                                            </form>   
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