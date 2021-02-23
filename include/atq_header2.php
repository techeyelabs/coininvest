<?php
$meta=mysql_fetch_array(mysql_query("select * from meta_info where meta_id=1"));
$pagename=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
$sitevalues=mysql_fetch_array(mysql_query("select set_value from admin_settings where set_id='44'"));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo  $meta['meta_title']; ?></title>
	<meta name="keywords" content="<?php echo $meta['meta_keyword']; ?>" />
	<meta name="description" content="<?php echo $meta['meta_desc']; ?>" />
<link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,700,500italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300italic,300,400italic,500,700,500italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Ravi+Prakash" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="images/favicon.ico.png">
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="tabsstyle.css" type="text/css" />
<link rel="stylesheet" href="faqstyle.css" type="text/css" />



<!--- banner tab script --->

 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="images/js/prefixfree.min.js"></script>

<!--- banner tab script --->

<!---- calc script --->

<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="images/js/calcs.js"></script>

<!---- calc script --->

    



</head>

<body>

<!------ top ---------->

<div id="wrapper" class="topbgall">
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
<div class="rftext">Visitors Online: 7 </div>
</div><!---smallstat end --->
</div><!--leftop end -->

<div class="midmail">
<div class="lficon"><img src="images/m-top-icon.png" /></div>
<div class="rftext"> info@green-yellows.com</div>
</div><!--midmail end --->

<div class="social">
<ul>
<li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true" style="color:#0e57aa;"></i></a></li>
<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true" style="color:#0ac3f1;"></i></a></li>
</ul>
</div><!---social end ---><div class="clear"></div>

<div class="logocont">
<div class="logo">
<a href="home.php"><img src="images/logo.png" /></a>
</div><!--logo end --->
<div class="menus">
        <ul>
		
		 <li><a href="home.php">Home</a></li>
        <li><a href="aboutus.php">     About us   </a></li>
        <li><a href="plans.php">   Plans   </a></li>
        <li><a href="faq.php">          FAQ       </a></li>
        <li><a href="banner.php">        Banners      </a></li>
        <li><a href="representatives.php">    TERMS & CONDITIONS    </a></li>
        <li><a href="support.php">    support center </a></li>
  
              </ul>
</div><!--menus end -->
</div><!--logocont end --><div class="clear"></div>

<div class="textall">
<div class="maintitle"><br/><span>Welcome To</span> green-yellows.com</div>
<!--<div class="subtitle">The BITcOIN Mining And Trading Company </div>-->

<div class="buts">
<ul>
	<?php if($_SESSION['userid'] == ''){ ?>
		<li><a href="login.php">Logout</a></li>
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
</div><div class="clear"></div>

<!------ top ---------->