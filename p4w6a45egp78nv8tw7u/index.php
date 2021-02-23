<?php ob_start();
session_start();

require 'include/connect.php';
//require 'Captcha.php';
?>
<!--//xmlns="http://www.w3.org/1999/xhtml"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<title>Admin Control Panel</title>
	
	<link type="text/css" href="style.css" rel="stylesheet" />
	<link type="text/css" href="css/login.css" rel="stylesheet" />
	
	<script type='text/javascript' src='js/jquery-1.4.2.min.js'></script>
	<!-- jquery library -->
	<script type='text/javascript' src='js/iphone-style-checkboxes.js'></script> 
	<!-- iphone like checkboxes -->

	<script type='text/javascript'>
		jQuery(document).ready(function() {
			jQuery('.iphone').iphoneStyle();
		});
	</script>
	
	<!--[if IE 8]>
		<script type='text/javascript' src='js/excanvas.js'></script>
		<link rel="stylesheet" href="css/loginIEfix.css" type="text/css" media="screen" />
	<![endif]--> 
 
	<!--[if IE 7]>
		<script type='text/javascript' src='js/excanvas.js'></script>
		<link rel="stylesheet" href="css/loginIEfix.css" type="text/css" media="screen" />
	<![endif]--> 
	
</head>
<body>
	<!-- <div id="line"></div> -->
	<div id="background">
		<div id="container">
			<div id="logo">
            <?php $fetch=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 44")); ?>	
                <h2 style="font-size: 40px;text-align:center;color:#C5642B;">AtKinSons</h2>
				<!--<img  border="0" src="./assets/new_logo2_0.png"/>-->
			</div>
			<div id="box" style="padding-bottom:50px"> 
				<?php if($_SESSION['message']){?>
					<div class="error_message" style="text-align:center;">
						<span class="" style=" width:100%;"><?php echo $_SESSION['message'];  $_SESSION['message'] = ''; ?></span>
					</div>
				<?php }?>
				 <form name="frmlogin" action="admin_login.php" method="post" >
					<div class="one_half" style="width:100%;margin-right:0%;margin-top:6%;text-align:center">
						<p><input name="username" id="username" value="username" class="field" onBlur="if (jQuery(this).val() == &quot;&quot;) { jQuery(this).val(&quot;username&quot;); }" onClick="jQuery(this).val(&quot;&quot;);" /></p>
						<p><input type="password" name="userpwd" id="userpwd" value="asdf1234" class="field" onBlur="if (jQuery(this).val() == &quot;&quot;) { jQuery(this).val(&quot;asdf1234&quot;); }" onClick="jQuery(this).val(&quot;&quot;);">	</p>
						
						<!--<p><input type="checkbox" class="iphone" /><label class="fix">Remember me</label></p> -->

						<div style="margin-bottom:5px"><img style="background-color:#ccc!important;margin-right:17px" width="250" height="40" name="captcha" id="captcha" src="Captcha.php"/><br /></div>
						
						<div><input type="text" name="turningcode" value="captcha" class="field" onBlur="if (jQuery(this).val() == &quot;&quot;) { jQuery(this).val(&quot;captcha&quot;); }" onClick="jQuery(this).val(&quot;&quot;);">	</div><span  style="padding-right:150px"><a class="boldunderline" onclick="javascript:shuffle();" href="#register" linkindex="9" set="yes" style="text-decoration:none;color:#fff">Try another one</a></span>
						
						<p><input type="submit" value="Login" class="login admin-btn" style="color:#fff; background-color:#1f1f1f!important;border-color:#1f1f1f;width:130px;" /></p>
					</div>
					<div class="one_half last" >
						</div>
				</form> 
			</div> 
		
		</div>
	</div>
	<script type="text/javascript" language="javascript">
var presh = -1;
 

function shuffle()
{
		curr = Math.ceil(Math.random()*100);
		document.getElementById('captcha').src="Captcha.php?"+ (curr==presh ? Math.ceil(Math.random()*100) : curr);				
		presh = curr;
 
}
</script>
</body>
</html>
