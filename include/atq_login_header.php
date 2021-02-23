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
	    
	    $hover_style = 'style="font-weight:bold;border-bottom: 5px solid #D5B738;background:#D5B738;color:#fff;border-top-left-radius: 1em;border-top-right-radius: 1em;border-bottom-left-radius: 1em;border-bottom-right-radius: 1em;"';
	    
	    $site_start = "2017-02-01";
	    $cur_date = date('Y-m-d');
	    $days_online_str = mysql_query("SELECT datediff('$cur_date','$site_start') as t");
	    $days_online_res = mysql_fetch_array($days_online_str);
	    $days_online =  $days_online_res['t'];
	    
  ?>
  
  <!------ top ---------->

<div id="wrapper" class="topbg" style="background-image:url(./images/bg001.jpg);height:400px" >
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
            <div class="" style="padding-top:25px;display: flex;">
                <div class="logo"style="width:33%">
                    <a href="index.php"><img src="./images/new_logo2_0.png" style="padding-top:1px; border-radius:5px;background-color:#fff"/></a>
                </div>

                <div class="accmemfull" style="width:34% ;padding-top:0px">
                    <div class="userinfo" style="width:100%">
                        <div class="names" style="width:100%;">
                            <div class="details"><b>Welcome <?php echo $_SESSION['username']; ?></b>
                                <?php   if( (int)$_SESSION['userid'] == 25 && ($notSeen ==0)){     ?>
                                <p style="color:#ff0000;margin-top:-21px;margin-left:129px;">Your Last deposit amount was ฿0.185 which is not sufficient! Please deposit additional ฿0.315 to get active your deposit.</p>
                                <?php } ?> 
                            </div>
                        </div>
                    </div>
                    <!--	<div class="names"><div class="details">Last Access : <?php //echo $last_login;?></div></div>-->
                </div>
                <!-- <div class="social" style="display:flex;width:33%">
                    <div style="float:left;margin-left:205px"><img src="images/m-top-icon.png" style="padding-top:1px;"/></div>
                    <div style="float:left;margin-top:5px;color:#000;">info@atq-coins.com</div>
                
                </div> -->
            </div>

             <table class="navigation" style="float: left;
    width: 100%;
    margin-top: 20px;" >
			<?php if($_SESSION['userid']!=''){ 
				include("include/login_header.php");
			} ?>
			</table>
 
			<?php
				$getitems = mysql_fetch_array(mysql_query("SELECT * FROM members WHERE member_id='".$_SESSION['userid']."'"));																		
			    if($getitems['last_login_time'] == '0000-00-00 00:00:00')
				{
					$last_login = '--';
				}
				else
				{
					$last_login = date('Y-m-d H:i:s',strtotime($getitems['last_login_time']));											
					//date('j F, Y ,g:i a',strtotime($getitems['last_login_time']));
				}
			?>
              <td class=line valign="top" width=1><img src=images/q.gif width=1 height=1></td>          
              <td class=bgcolormain valign="top" width=99%>
				<style>
					.log{
						width:33%;
						float:left;
					}
				.accmemfull
				{
				width:100%;
					padding-top: 30px;
				}
				.accmemfull .userinfo
				{
				display:flex;
				justify-content:space-around;
				width:33%;
				}
				.accmemfull .userinfo .names
				{
				   width: 48%;
					/* background: #efefef; */
					height: 50px;
					margin-bottom: 18px;
				}
				.accmemfull .userinfo .names .details
				{
				 width: 100%;
					color: #fff;
					font-size: 30px;
					font-family: 'Roboto', sans-serif;
					padding: 5px;
				}
				.accmemfull .firstpart
				{
				display:flex;
				justify-content:space-around;
				width:100%;
				}
				.accmemfull .firstpart .box1
				{
				width: /*48%*/ 33%;
				background-image:url(images/top-bg.jpg);
				background-repeat:no-repeat;
				height:190px;
					background-position: 0px;
				}
				.accmemfull .firstpart .box1 .inpart
				{
				display:flex;
				width:100%;
				justify-content:space-around;
				}
				.accmemfull .firstpart .box1 .inpart .cons
				{
					/*width: 33%;*/
					text-align: center;
						padding-top: 26px;
				}
				.accmemfull .firstpart .box1 .inpart .cons .totinves
				{
					/*text-transform:uppercase;*/
					font-size: 20px;
					font-family: 'Roboto', sans-serif;
					color: #fff;
						padding-top: 40px;
				}
				.accmemfull .firstpart .box1 .inpart .cons .totinves span
				{
					/*text-transform:uppercase;*/
					font-size: 20px;
					font-family: 'Roboto', sans-serif;
					color: #000;
				}
				.accmemfull .firstpart .box1 .inpart .cons a
				{
				padding: 11px 27px;
					border: 2px solid #fff;
					font-size: 15px;
					text-transform: inherit;
					color: #fff;
					border-radius: 5px;
				}
				.accmemfull .firstpart .box1 .inpart .cons a:hover
				{
					border: 2px solid #fff;
					color: #000;
				}

				.accmemfull .secondpart
				{
				display:flex;
				width:100%;
				justify-content:space-around;
				background:#630;
				height:250px;
				margin-top:20px;
				}
				.accmemfull .secondpart .deps
				{
				width:48%;
					padding: 28px;

				}
				.accmemfull .secondpart .deps .title
				{
					color: #fff;
					font-family: 'Ubuntu', sans-serif;
					font-size: 22px;
					/*text-transform: uppercase;*/
					text-align: left;
					font-weight: 300;
					border-bottom: 1px solid #fff;
					margin-bottom: 20px;
				}
				.accmemfull .secondpart .deps .smallbox
				{
					font-size: 18px;
					font-family: 'Ubuntu', sans-serif;
					color: #000;
					text-transform: inherit;
					/* padding: 10px; */
					/* background: #fff; */
					margin-bottom: 10px;
				}
				.accmemfull .secondpart .deps .smallbox span
				{
				float:right;
				}
				.accmemfull .reffral
				{
					width: 100%;
					background: #027aa7;
					margin-top: 20px;
					height: 44px;
				}
				.accmemfull .reffral .aff
				{
					text-align: center;
					font-size: 18px;
					padding-top: 10px;
					font-family: 'Ubuntu', sans-serif;
					color: #fff;
				}
				</style>



 <!--
<div class="midmail" style="margin-left:-7px;">
   <div class="lficon"><img src="images/telegram_main.png" style="width:22px;height:20px;padding-top:3px;"></div>
    <div class="rftext"><a href="https://telegram.me/atqcoins" target="_blank" style="color:#FFF;margin-left:-5px;" >Telegram News</a></div>
</div>-->
 





<!---social end --->

    <!-- <div class="clear"></div>

    <div class="logocont" >
        <div class="logo" >
            <a href="index.php"><img style="max-width: 80%; padding-left:30px; padding-top: 10px;" src="./images/new_logo2_0.png" /></a>
        </div> -->
        <!--logo end --->
    <!-- </div> -->
    <!--logocont end -->

    <!-- <div class="clear"></div>

    <div class="text" style="float:left;margin-top: 125px;">
    <div class="" style="background-color:#fff;border-radius:50px">
        <div class="maintitle" style="margin-left:10% ; color:#86bc24" ><span style="color:#86bc24">Welcome To</span> Green Yellow</div>
        <div class="subtitle" style="margin-left:14%;color:#f9d058" >Green Yellow TRADING COMPANY</div>
    </div>
    
        <div class="buts">
            <ul>
            <?php// if($_SESSION['userid'] == '') { ?>
                <li ><a style="color:#86bc24" href="login.php">Log in Now</a></li>
                <li ><a style="color:#86bc24" href="signup.php">Register Now</a></li>
            <?php 
        //}else{ ?>
                <li><a href="account.php">My Account</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php// } ?>
            </ul>
        </div> -->
        <!--buts end -->
    
    <!-- </div> -->
    <!----text end -->


</div>
</div>
</div>


<div class="clear"></div>

<!------ top ---------->