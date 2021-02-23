<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Covid 19</title>
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
<link rel="stylesheet" href="css/faq.css">

<script src="js/modernizr-2.6.2.min.js" type="24ec00aca7e005466b2d083d-text/javascript"></script>

<!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

<style type="text/css">
.owl-controls {
 display: none;
}
</style>
</head>
<body>
    
    <div id="page">

      <?php include('top_nav.php') ; ?>



 
  <!-- aside start -->
  <!--
        <aside id="colorlib-hero-about-use">
            <div style="background-size:100% 100%;background-repeat:no-repeat;background-image: url('images/about_us_banner.jpg');height: 258px;min-height: 260px !important;">
                
            </div>
        </aside>-->
        <!-- aside end -->
 


<br/>
      
        <!-- colorlib choose start -->
        <div id="colorlib-choose">
            <div class="container-fluid">
                <div class="row">
                    <table align="center" border="0" width="100%">
                        <tr>
                            <td>
                                <h2 style="text-align: 14px;">Congratulatins!</h2>
                                <p style="text-align:center;"><?php echo "Thanks for your payment.";?> </p>
                            </td>
                        </tr>
                    </table>
                   
                </div>
            </div>
        </div>
        <!-- colorlib choose end -->

<br/>
 
        <!-- footer start -->
        <div class="row" id="contact" style="margin-top: -25px;">
        <footer id="colorlib-footer" role="contentinfo" >
            <div class="overlay"></div>
            
                <?php include("footer.php");?>

            
        </footer>
        </div>
        <!-- footer end -->
        
        
</div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop">
            <i class="fa fa-arrow-up"></i>
        </a>
    </div>



<script src="js/jquery.min.js" type="24ec00aca7e005466b2d083d-text/javascript"></script>
<script src="js/jquery.easing.1.3.js" type="24ec00aca7e005466b2d083d-text/javascript"></script>
<script src="js/bootstrap.min.js" type="24ec00aca7e005466b2d083d-text/javascript"></script>
<script src="js/jquery.waypoints.min.js" type="24ec00aca7e005466b2d083d-text/javascript"></script>
<script src="js/jquery.stellar.min.js" type="24ec00aca7e005466b2d083d-text/javascript"></script>
<script src="js/owl.carousel.min.js" type="24ec00aca7e005466b2d083d-text/javascript"></script>
<script src="js/jquery.flexslider-min.js" type="24ec00aca7e005466b2d083d-text/javascript"></script>
<script src="js/jquery.countTo.js" type="24ec00aca7e005466b2d083d-text/javascript"></script>
<script src="js/jquery.magnific-popup.min.js" type="24ec00aca7e005466b2d083d-text/javascript"></script>
<script src="js/magnific-popup-options.js" type="24ec00aca7e005466b2d083d-text/javascript"></script>
<script src="js/sticky-kit.min.js" type="24ec00aca7e005466b2d083d-text/javascript"></script>
<script src="js/main.js" type="24ec00aca7e005466b2d083d-text/javascript"></script>
<script src="js/covid-19.js" type="text/javascript" charset="utf-8" async></script>
<script>
function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="24ec00aca7e005466b2d083d-|49" defer=""></script></body>
</html>
