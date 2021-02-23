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
	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0" />-->
	<meta name="keywords" content="<?php echo $meta['meta_keyword']; ?>" />
	<meta name="description" content="<?php echo $meta['meta_desc']; ?>" />
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
   	
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
var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
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
	    
	   // $hover_style = 'style="font-weight:bold;border-bottom: 5px solid #D5B738;background:#D5B738;color:#fff;border-top-left-radius: 1em;border-top-right-radius: 1em;border-bottom-left-radius: 1em;border-bottom-right-radius: 1em;"';
	    
	    $site_start = "2017-02-01";
	    $cur_date = date('Y-m-d');
	    $days_online_str = mysql_query("SELECT datediff('$cur_date','$site_start') as t");
	    $days_online_res = mysql_fetch_array($days_online_str);
	    $days_online =  $days_online_res['t'];
	    
  ?>
  
  <!------ top ---------->

<div id="wrapper" class="topbg" style="background-image:url(./images/slide07.jpg)" >
<div class="wrap">
<div class="topcontainer">



<!--
<div class="lefttop">
<div class="smallstat1" style="margin-left:10px;">
<div class="lficon"><img src="images/s-top1.png" /></div>
<div class="rftext">
    <script type="text/javascript">
    document.write ('<p><span id="date-time">', new Date().toLocaleString(), '<\/span><\/p>')
    if (document.getElementById) onload = function () {
    	setInterval ("document.getElementById ('date-time').firstChild.data = new Date().toLocaleString()", 50)
    }
    </script>
</div>
</div>

<div class="smallstat2" style="margin-left:-10px;">
    <div class="lficon"><img src="images/s-top2.png" /></div>
    <div class="rftext">Days Online:<?php //echo $days_online;?></div>
</div>

<div class="smallstat2">
    <div class="lficon"><img src="images/s-top3.png" /></div>
    <div class="rftext">Visitors Online: <?php //echo rand(11,50); ?> </div>
</div>
</div>
-->







 <!--
<div class="midmail" style="margin-left:-7px;">
   <div class="lficon"><img src="images/telegram_main.png" style="width:22px;height:20px;padding-top:3px;"></div>
    <div class="rftext"><a href="https://telegram.me/atqcoins" target="_blank" style="color:#FFF;margin-left:-5px;" >Telegram News</a></div>
</div>-->
 





<!---social end --->

    <div class="clear"></div>

   <div class="logocont" >
        <div class="logo" >
            <a href="index.php"><img style="max-width: 80%; padding-left:30px; padding-top: 10px;" src="./images/new_logo2_0.png" /></a>
        </div><!--logo end --->
        <div class="menus" style="width:50%">
                <ul>
                <li><b><a href="index.php"     <?php if( $page_name == "index.php" || $page_name == "" ) ?> >Home</a></b></li>
                <li><b><a href="aboutus.php"   <?php if( $page_name == "aboutus.php" ) {  echo $hover_style; } ?>>About us</a></b></li>
                <li><b><a href="plans.php"     <?php if( $page_name == "plans.php")    {  echo $hover_style; } ?>>Plans</a></b></li>
                <li><b><a href="affiliate.php" <?php if( $page_name == "affiliate.php"){  echo $hover_style; } ?>>Affiliate </a></b></li> 
                <li><b><a href="faq.php"       <?php if( $page_name == "faq.php" )     {  echo $hover_style; } ?>>FAQ</a></b></li>
                <li><b><a href="banner.php"    <?php if( $page_name == "banner.php" )  {  echo $hover_style; } ?>>Banners</a></b></li>
                <!-- <li><b><a href="representatives.php"     <?php //if( $page_name == "representatives.php" )   {  echo $hover_style; } ?>>REPRESENTATIVES</a></b></li> -->
                <li><b><a href="support.php"   <?php if( $page_name == "support.php" ) {  echo $hover_style; } ?> >Support</a></b></li>
                <!-- <li><b><a href="shop.php"   <?php //if( $page_name == "shop.php" ) {  echo $hover_style; } ?> >Shop</a></b></li>    -->
                <!-- <li><b><a href="https://www.coingecko.com/en" target="_blank" <?php // if($page_name == "" && $page_name != "index.php") {  echo $hover_style; }  ?> >Rate </a></li>  -->
                </ul>
        </div><!--menus end -->
        <div class="menus" style="width:17%;float:right" >
			<ul>
				<?php if($_SESSION['userid'] == '') { ?>
						<li ><b><a style="color:#86bc24" href="login.php">Log in </a></b></li>
						<li ><b><a style="color:#86bc24" href="signup.php">Register </a></b></li>
					<?php }else{ ?>
						<li><b><a style="color:#86bc24" href="account.php">My Account</a></b></li>
						<li><b><a style="color:#86bc24;padding:20px 16px;" href="logout.php">Logout</a></b></li>
					<?php } ?>
			</ul>
		</div>
    </div><!--logocont end -->

    <div class="clear"></div>

    <div class="text" style="margin-top: 50px;margin-left: 17%;">
		<div class="" style="background-color:#1d2f36;border-radius:10px;opacity: 0.85">
			<div class="maintitle" style="margin-left:12% ; color:#fff" ><span style="color:#86bc24"></span> Green Yellow Minning Company</div>
			<div class="subtitle" style="margin-left:32%;color:#fff;padding:5px 0px 0px 0px;font-size:18px">Green Energy - Green Mining</div>
			<div class="subtitle" style="margin-left:5%;color:#fff" >
			<!-- <p> -->
				<b> How it works:</b>
					<!-- <br> -->
				<div style="font-size:18px;padding-bottom:15px"> Wind Power Stations → Mining and BTC Investment → Wind Park Development</div>
				<!-- </p> -->
			<!-- <p> -->
				<!-- <br> -->
				<b> We have:</b>
					<!-- <br> -->
				<div style="font-size: 18px"> - 3 wind power stations</div>
					<!-- <br> -->
				<div style="font-size: 18px"> - Renewable electricity producer</div>
					<!-- <br> -->
				<div style="font-size: 18px; padding-bottom:25px"> - 3 MW installed power</div>
				<!-- </p> -->
				
			</div>
		</div><!--buts end -->
    </div><!----text end -->


</div>
</div>
</div>


<div class="clear"></div>

<!------ top ---------->