<?php
error_reporting(0);
function CreateOption( $cboname , $curid , $tablename ) 
{
		echo '<select name='.ucwords($cboname).' class="txtbx" id="select2" title="Choose your country" style="width:180px" >';
		echo '<option value="">Select</option>';
		$optSql = "select * from $tablename";
		
		if($cboname == 'Directory')
		$optSql .= " where status=1";
				
		$optResult = mysql_query($optSql);
			
		while( $optRow = mysql_fetch_array($optResult)) 
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
?>
<?php
$meta = mysql_fetch_array(mysql_query("select * from meta_info where meta_id=1"));
$pagename = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
$sitevalues = mysql_fetch_array(mysql_query("select set_value from admin_settings where set_id='44'"));
?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     
	<title><?php echo  $meta['meta_title']; ?></title>
	<meta name="keywords" content="<?php echo $meta['meta_keyword']; ?>" />
	<meta name="description" content="<?php echo $meta['meta_desc']; ?>" />
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="images/favicon.ico.png" rel="shortcut icon" type="image/x-icon"/>
   	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,700,500italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300italic,300,400italic,500,700,500italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Ravi+Prakash" rel="stylesheet">

    <!-- 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="dist/jquery.floating-social-share.min.css" />
    -->
  
  
    <link rel="stylesheet" type="text/css" href="dist/jquery.floating-social-share.min.css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="tabsstyle.css" type="text/css" />
    <link rel="stylesheet" href="faqstyle.css" type="text/css" />
    <!--- banner tab script --->

 <script src='cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="images/js/prefixfree.min.js"></script>

<!--- banner tab script --->

<!---- calc script --->


<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="images/js/calculator.js"></script>	
 
 

    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="static/css/ie.css"/>
    <![endif]-->
    <!--[if !IE]>
    <script>
        if (/*@cc_on!@*/false) {
            document.documentElement.className += ' ie10';
        }
    </script>
    <!--<![endif]-->
    <script>
        navigator.sayswho = (function () {
            var ua = navigator.userAgent, tem,
                    M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*([\d\.]+)/i) || [];
            if (/trident/i.test(M[1])) {
                tem = /\brv[ :]+(\d+(\.\d+)?)/g.exec(ua) || [];
                return 'IE ' + (tem[1] || '');
            }
            M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion, '-?'];
            if ((tem = ua.match(/version\/([\.\d]+)/i)) != null) M[2] = tem[1];
            return M.join(' ');
        })();
        if (navigator.sayswho == 'IE 11.0') {
            document.documentElement.className += ' ie11';
        }
    </script>
 
 
  
<script type="text/javascript"> //<![CDATA[ 
var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.comodo.com/" : "http://www.trustlogo.com/");
document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
//]]>
</script>
 



  </head>
  <body id="socialside">
    <!--<a  href="https://www.positivessl.com/" id="comodoTL">Positive SSL</a>-->
  
  
  <?php $page_uri =  $_SERVER['REQUEST_URI']; 
        $pages_uri = explode("/",$page_uri);
	    $page_name = $pages_uri[1];
	    
	    
	    //$hover_style = 'style="font-weight:bold;border-bottom: 5px solid #e5a90a;background:#e5a90a;color:#fff;"';	    
//	    $hover_style = 'style="font-weight:bold;border-bottom: 5px solid #E1B823;background:#E1B823;color:#fff;box-shadow: 10px 10px 5px #888888;"';
	    
	    $hover_style = 'style="font-weight:bold;border-bottom: 5px solid #D5B738;background:#D5B738;color:#fff;border-top-left-radius: 1em;border-top-right-radius: 1em;border-bottom-left-radius: 1em;border-bottom-right-radius: 1em;"';
	    
	    
	    
  ?>
  
  <!------ top ---------->

<div id="wrapper" class="topbg">
<div class="wrap">
<div class="topcontainer">

<div class="lefttop">

<div class="smallstat1">
<div class="lficon"><img src="images/s-top1.png" /></div>
<div class="rftext">

<script type="text/javascript">
document.write ('<p><span id="date-time">', new Date().toLocaleString(), '<\/span><\/p>')
if (document.getElementById) onload = function () {
	setInterval ("document.getElementById ('date-time').firstChild.data = new Date().toLocaleString()", 50)
}
</script>
</div>
</div><!---smallstat end --->

<div class="smallstat2">
<div class="lficon"><img src="images/s-top2.png" /></div>
<div class="rftext">Days Online:2281  </div>
</div><!---smallstat end --->

<div class="smallstat2">
<div class="lficon"><img src="images/s-top3.png" /></div>
<div class="rftext">Visitors Online: 4 </div>
</div><!---smallstat end --->
</div><!--leftop end -->

<div class="midmail">
<div class="lficon"><img src="images/m-top-icon.png" /></div>
<div class="rftext"> info@green-yellows.com</div>
</div><!--midmail end --->

<!--
<div class="social">
<ul>
<li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true" style="color:#0e57aa;"></i></a></li>
<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true" style="color:#0ac3f1;"></i></a></li>
</ul>
</div>
-->
<!---social end --->
<div class="clear"></div>

<div class="logocont">
<div class="logo" >
<a href="index.php"><img  src="images/atq-logo.png" /></a>
</div><!--logo end --->
<div class="menus">
        <ul>
        <li><a href="index.php"  <?php if( $page_name == "index.php" || $page_name == "" ){  echo $hover_style; } ?> >Home</a></li>
        <li><a href="aboutus.php" <?php if( $page_name == "aboutus.php" ){  echo $hover_style; } ?>>About us</a></li>
        <li><a href="plans.php" <?php if( $page_name == "plans.php"){  echo $hover_style; } ?>>Plans</a></li>
        <li><a href="affiliate.php" <?php if( $page_name == "affiliate.php" ){  echo $hover_style; } ?>>Affiliate </a></li>
        <li><a href="faq.php" <?php if( $page_name == "faq.php" ){  echo $hover_style; } ?>>FAQ</a></li>
        <li><a href="banner.php" <?php if( $page_name == "banner.php" ){  echo $hover_style; } ?>>BANNERS</a></li>
        <li><a href="rules.php" <?php if( $page_name == "rules.php" ){  echo $hover_style; } ?>>TERMS & CONDITIONS</a></li>
        <li><a href="support.php" <?php if( $page_name == "support.php" ){  echo $hover_style; } ?> >Support Center</a></li>
        </ul>
</div><!--menus end -->
</div><!--logocont end -->
<div class="clear"></div>

<div class="text">
<div class="maintitle"><span>Welcome To</span> atq-coins.com</div>
<div class="subtitle">ANTIQUE COIN TRADING COMPANY</div>

<div class="buts">
<ul>
<?php if($_SESSION['userid'] == ''){ ?>
<li><a href="login.php">Log in Now</a></li>
<li><a href="signup.php">Register Now</a></li>
<?php }else{ ?>
<li><a href="account.php">Account</a></li>
<li><a href="logout.php">Logout</a></li>
<?php } ?>
</ul>
</div><!--buts end -->

</div><!----text end -->


</div>
</div>
</div>


<div class="clear"></div>

<!------ top ---------->