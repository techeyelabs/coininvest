<?php ob_start();
session_start();

if( !empty($_SESSION['aid']) )   
{
    require 'include/connect.php';
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
	
	<style>
	 .login_cancel {
	        color: #fff;
    text-decoration: none;
    font-size: 14px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    text-shadow: 0 1px 1px #2b7b0c;
    letter-spacing: 0px;
    text-transform: uppercase;
    padding: 8px 12px 6px 12px;
    /*margin: 0 10px 5px 0;*/
    margin: 0 -85px 5px 0;
    /* background: #6ae63a; */
    /* background: -moz-linear-gradient(top, #a4ee87, #6ae63a 2%, #42e802); */
    /* background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #a4ee87), color-stop(.01, #6ae63a), to(#42e802)); */
    border: 1px solid #3bd500;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    outline: none;
	 }
	</style>
	
</head>
<body>
	<div id="background">
		<div id="container">
			<div id="logo">
            <?php// $fetch=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 44")); ?>	
            
				<!-- <img  border="0" src="../<?php //echo $fetch['set_value'];?>"/> -->
			</div>
			<div id="box" style="padding-bottom:50px;padding-top:50px"> 
				<?php if($_SESSION['message']){?>
					<div class="success_message" style="text-align:center;margin-top:4%" >
						<span class=" mt-5" style=" width:100%;"><?php echo $_SESSION['message'];  $_SESSION['message'] = ''; ?></span>
					</div>
				<?php }?>
				<br/><br/>
				<form name="frmlogin" action="check_2step.php" method="post" style="margin-left:25%;margin-top:5%">
				    <table align="center">
						<tr>
							<td>	<div class="one_half">
									<p><input name="security_code" id="security_code"  type="text" class="field"  placeholder="2-Step Code" /></p>
								</div>
						</td>
						</tr>
						<tr>
							<td style="padding-left:25px;">
								<input type="submit" style="color:#fff; background-color:#1f1f1f!important;border-color:#1f1f1f;width:100px;" value="Submit" class="login_cancel" /> 
								<input type="button" style="color:#fff; background-color:#1f1f1f!important;border-color:#1f1f1f;width:100px;" value="Cancel" class="login_cancel" onclick="window.location='index.php'" />      
							</td>
						</tr>
				    </table>
				</form> 
			</div> 
		</div>
	</div>
</body>
</html>
<?php }else{
        session_destroy();
		echo '<meta http-equiv="refresh" content="0;url=index.php">';
		exit();  
}
?>
