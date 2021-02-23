<?php // require_once('include/connect.php');
error_reporting(0);
function CreateOption($cboname,$curid,$tablename) {
		echo '<select name='.ucwords($cboname).' class="txtbx" id="select2" style="margin-left:79px;margin-top:20px;height:40px;width:250px;" title="Choose your country" style="width:180px" >';
		echo '<option value="">Select</option>';
		$optSql="select * from $tablename";
		if($cboname=='Directory')
				$optSql.=" where status=1";
		$optResult=mysql_query($optSql);
			
		while($optRow=mysql_fetch_array($optResult)) {
				if($cboname=='plan')
				{
					if($optRow[0]==$curid)
					echo '<option value='.$optRow[0].' selected="selected">'.$optRow[2].'</option>';
					else
					echo '<option value='.$optRow[0].'>'.$optRow[2].'</option>';
				}
				else
				{
					if($optRow[0]==$curid)
					echo '<option value='.$optRow[0].' selected>'.$optRow[1].'</option>';
					else
					echo '<option value='.$optRow[0].'>'.$optRow[1].'</option>';
				}
			}
			echo '</select>';
	}
?>
<?php
$meta=mysql_fetch_array(mysql_query("select * from meta_info where meta_id=1"));
$pagename=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
$sitevalues=mysql_fetch_array(mysql_query("select set_value from admin_settings where set_id='44'"));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
	<title><?php echo  $meta['meta_title']; ?></title>
	<meta name="keywords" content="<?php echo $meta['meta_keyword']; ?>" />
	<meta name="description" content="<?php echo $meta['meta_desc']; ?>" />
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
   	
    <link rel="stylesheet" type="text/css" href="static/css/jquery-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="static/fonts/stylesheet.css"/>
    <link rel="stylesheet" type="text/css" href="static/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="static/css/qfx_style.css"/>

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

    <script type="text/javascript" src="static/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="static/js/jquery.reject.js"></script>
    <script type="text/javascript" src="static/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="static/js/owl.carousel.min.js"></script>
    <script src="static/js/clipboard.min.js"></script>
    <script type="text/javascript" src="static/js/script.js"></script>
	
	
	
	<script>
	$(document).ready(function() {		
		var options = {};	
		if (document.location.search) {
			var array = document.location.search.split('=');
			var param = array[0].replace('?', '');
			var value = array[1];			
			if (param == 'animation') {
				options.animation = value;
			}
			else if (param == 'type_navigation') {
				options[value] = true;
				if (value == 'dots') $('.border_box').css({'marginBottom': '40px'});
			}
		}		
		$('.box_skitter_large').skitter(options);
		
		// Highlight
		$('pre.code').highlight({source:1, zebra:1, indent:'space', list:'ol'});		
	});
	</script>	
	
  </head>
  <body>
  
  
  
    <header class="indexHead2">
    <div class="lineTop">
        <div class="container">
            <div class="linkInfo" style="margin-right:75px;">
                <a href="tel:+242" style="display:none;">353</a>
                <a href="mailto:support@bat24x.com">support@bat24x.com</a>
            </div>
            <a href="index.php" style="margin-left:185px;margin-right:185px;" class="logo">
                <img src="images/bat_logo.png"/>
                <p>Bitcoin Arbitrage Trading</p> 
            </a>
            <div class="social" style="display:none;">
                <a href="https://www.facebook.com/QFXOptions/" target="_blank"><img src="static/img/social1.png" alt=""></a>
                <a href="https://vk.com/public131957848" target="_blank"><img src="static/img/social2.png" alt=""></a>
                <a href="https://twitter.com/QFXoptions" target="_blank"><img src="static/img/social3.png" alt=""></a>
                <a href="https://www.youtube.com/channel/UCTC2PIOsK6pDRYKfmDid87w" target="_blank"><img src="static/img/social4.png" alt=""></a>
                <a href="#"><img src="static/img/social5.png" alt=""></a>
                <a href="#"><img src="static/img/social6.png" alt=""></a>
            </div>
            <div class="language" style="display:none;">
                <a href="login.html?lang=ru" class="active">
                    <div style="background-image: url('static/img/rus.jpg')"></div>
                    <span>rus</span>
                </a>
                <a href="login.html?lang=en">
                    <div style="background-image: url('static/img/eng.jpg')"></div>
                    <span>eng</span>
                </a>
            </div>
			<div class="buttons">
	                <a href="register.php" class="reg">Sign up </a>
	        </div>
        </div>
    </div>
    <div class="menu">
        <div class="container">
            <div class="menuCenter">
                <ul class="cfix">

						 <li><a href="index.php">Home</a></li>
                                                <li class="active"><a href="aboutus.php">About us</a></li>
                                                <li><a href="fund_management.php">Plans</a></li>

                                                <li><a href="rateus.php">Terms</a></li>
						 <li><a href="affiliate.php">Affiliate</a></li>
                                                <li><a href="faq.php">FAQ</a></li>
                                                <li><a href="contactus.php">Contact Us</a></li>
                                                <?php if($_SESSION['userid'] == ''){ ?>
                                                <li ><a  href="login.php">Login</a></li>
                                                <?php }else{ ?>
                                                <li   ><a href="memberhome.php">Account</a></li>
                                                <li><a href="logout.php">Logout</a></li>

                                                <?php } ?>


                </ul>
            </div>
        </div>
    </div>

<?php if($_SESSION['userid']!=''){ ?>
<div class="menulk">
	        <div class="container">
	            <ul class="cfix">
	            <li>&nbsp;</li>
	            <li>&nbsp;</li>
	           <li><a href="statistics.php">Statistics</a></li>
                    <li><a href="deposit.php">Make Deposit</a></li>
                    <li><a href="withdraw.php">Withdrawal</a></li>
                    <li><a href="referral.php">My Referrals</a></li>
                    <li><a href="deposit_list.php?status=all">Deposit History</a></li>
                    <li><a href="tellafriend.php">Tell A Friend</a></li>
                    <li><a href="history.php">Transaction History</a></li>
                    <li><a href="fundtransfer.php">Fund Transfer</a></li>
 
			<li><a href="changepassword.php">Change Password</a></li>
	            </ul>
	            <!-- <div class="blockMail">
	                <span>0</span>
	            </div>   -->
	        </div>
	    </div>

<?php } ?>
</header>  

  



