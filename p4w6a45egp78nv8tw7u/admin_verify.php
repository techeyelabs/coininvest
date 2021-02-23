<?php ob_start();
session_start();

require 'include/connect.php';
//require 'Captcha.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=us-ascii" />
	<title>Admin Control Panel</title>
	
	<link type="text/css" href="style.css" rel="stylesheet" />
	<link type="text/css" href="css/login.css" rel="stylesheet" />
	
	<script type='text/javascript' src='js/jquery-1.4.2.min.js'></script>	<!-- jquery library -->
	<script type='text/javascript' src='js/iphone-style-checkboxes.js'></script> <!-- iphone like checkboxes -->

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
	<div id="line"><!-- --></div>
	<div id="background">
		<div id="container">
			<div id="logo">
				<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="236px" height="73px" id="OF" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="movie" value="assets/images/logo.swf" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#ffffff" />	<embed src="assets/images/logo.swf" quality="high" wmode="transparent" bgcolor="#ffffff" width="236px" height="73px" name="OF" align="middle" allowScriptAccess="sameDomain" allowFullScreen="true" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>
			</div>
			<div id="box" style="padding-bottom:150px"> 
			<div class="validate_error" style="text-align:center; width:100%;"><? echo $_SESSION['message'];  $_SESSION['message'] = ''; ?></div>
				 <form name="frmlogin" action="admin_confirm.php" method="post" >
                 <div class="one_half">
						<p></p>
											
						<!--<p><input type="checkbox" class="iphone" /><label class="fix">Remember me</label></p> -->
					</div>
					<div class="one_half" style="width:100%">
                    <table width="100%" border="0" cellpadding="0"  cellspacing="0">
                    <tr>
                    		<td width="30%" align="right"><p><strong>Verification Code</strong> :</p></td>
                    		<td width="50%" align="left">	<p><input name="userpwd" id="userpwd" type="password" value="" class="field" onBlur="if (jQuery(this).val() == &quot;&quot;) { jQuery(this).val(&quot;username&quot;); }" onClick="jQuery(this).val(&quot;&quot;);" /></p>
						</p></td>
                    </tr>
                     </table>
					
					</div>
                    <div class="one_half last" style="width:100%">
						 <table width="100%" border="0" cellpadding="0"  cellspacing="0">
                    <tr>
                    		<td width="50%" align="right"><input type="submit" value="VERIFY" class="login" /></td>
                    		<td width="30%" align="center"></td>
                    </tr>
                     </table>
						
					</div>
					
			</form> 
		</div> 
		
		</div>
	</div>
	<script type="text/javascript" language="javascript">
var presh = -1;
/*
function shuffle()
{
		curr = Math.ceil(Math.random()*100);
		document.getElementById('captcha').src="?do=captcha&"+ (curr==presh ? Math.ceil(Math.random()*100) : curr);				
		presh = curr;
//document.getElementById('captcha').src = "?do=captcha";
}
*/

function shuffle()
{
		curr = Math.ceil(Math.random()*100);
		document.getElementById('captcha').src="Captcha.php?"+ (curr==presh ? Math.ceil(Math.random()*100) : curr);				
		presh = curr;
//document.getElementById('captcha').src = "Captcha.php";
}
</script>
</body>
</html>