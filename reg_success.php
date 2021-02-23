<?php 
// date_default_timezone_set("Europe/London");
date_default_timezone_set('Etc/GMT');
session_start();
require( __DIR__ .'/connect.php');

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
 
$meta = mysql_fetch_array(mysql_query("select * from meta_info where meta_id=1"));
$pagename = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
$sitevalues = mysql_fetch_array(mysqli_query("select set_value from admin_settings where set_id='44'"));
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>AtKinSons</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />

<meta property="og:title" content="" />
<meta property="og:image" content="" />
<meta property="og:url" content="" />
<meta property="og:site_name" content="" />
<meta property="og:description" content="" />
<meta name="twitter:title" content="" />
<meta name="twitter:image" content="" />
<meta name="twitter:url" content="" />
<meta name="twitter:card" content="" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" href="css/animate.css">

<!-- <link rel="stylesheet" href="css/icomoon.css"> -->
<link rel="stylesheet" href="https://colorlib.com/preview/theme/healthcare/css/icomoon.css">

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/magnific-popup.css">

<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/flexslider.css">

<!-- <link rel="stylesheet" href="css/flaticon.css"> -->
<link rel="stylesheet" href="https://colorlib.com/preview/theme/healthcare/fonts/flaticon/font/flaticon.css" />
<link rel="stylesheet" href="css/style.css">

<script src="js/modernizr-2.6.2.min.js" type="d6f9394fbeecc8fd1d381b06-text/javascript"></script>

<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

    <div class="colorlib-loader"></div>
    <div id="page">

       <?php include('login_top_nav.php') ;
?>



        <div id="colorlib-contact" style="padding: 0px !important;">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12 animate-box">
                        <div class="row">
                            <div class="col-md-12"  style="width: 500px;margin:0 30%;">
                                <h2 style="text-align: center;">Registration Confirmation</h2>
								<p class="msg" style="color: black;">
                                 Thank You for joining us. Your Registration has been successfully. Please check you mail(spam mail also) <br/>                               
                Thank You for joining us.   
                                </p>
                                
                                <br/>
                                <br/>
                                <br/>
                                 <meta http-equiv="refresh" content="3; url=https://atkinsonsbullion-invest.com/login.php" />


                            </div>



 
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <br/>
        </div>

        <div class="row" id="contact">
        <footer id="colorlib-footer" role="contentinfo">
            <div class="overlay"></div>
            
                <?php include("footer.php");?>
            
        </footer>
    </div>


    </div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/jquery.easing.1.3.js" type="d6f9394fbeecc8fd1d381b06-text/javascript"></script>
<script src="js/bootstrap.min.js" type="d6f9394fbeecc8fd1d381b06-text/javascript"></script>
<script src="js/jquery.waypoints.min.js" type="d6f9394fbeecc8fd1d381b06-text/javascript"></script>
<script src="js/jquery.stellar.min.js" type="d6f9394fbeecc8fd1d381b06-text/javascript"></script>
<script src="js/owl.carousel.min.js" type="d6f9394fbeecc8fd1d381b06-text/javascript"></script>
<script src="js/jquery.flexslider-min.js" type="d6f9394fbeecc8fd1d381b06-text/javascript"></script>
<script src="js/jquery.countTo.js" type="d6f9394fbeecc8fd1d381b06-text/javascript"></script>
<script src="js/jquery.magnific-popup.min.js" type="d6f9394fbeecc8fd1d381b06-text/javascript"></script>
<script src="js/magnific-popup-options.js" type="d6f9394fbeecc8fd1d381b06-text/javascript"></script>
<script src="js/sticky-kit.min.js" type="d6f9394fbeecc8fd1d381b06-text/javascript"></script>
<script src="js/main.js" type="d6f9394fbeecc8fd1d381b06-text/javascript"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="d6f9394fbeecc8fd1d381b06-text/javascript"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="d6f9394fbeecc8fd1d381b06-|49" defer=""></script>
 
</body>
</html>
