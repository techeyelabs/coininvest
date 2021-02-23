<?php
error_reporting(0);
function CreateOption($cboname,$curid,$tablename) {

   echo '<select name='.ucwords($cboname).' class="txtbx" id="select2" title="Choose your country" style="width:180px" >';
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
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
 
  <title><?php echo  $meta['meta_title']; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  
  
<meta name="keywords" content="<?php echo $meta['meta_keyword']; ?>" />
<meta name="description" content="<?php echo $meta['meta_desc']; ?>" />
    <meta name="author" content="">

    <!-- Le styles -->

    <link href="images/favicon.ico.png" rel="shortcut icon" type="image/x-icon"/>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css" />

	<script src="js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="slider/style.css" />
    <script type="text/javascript" src="slider/script.js"></script>
    <script type="text/javascript" src="js/crawler.js"></script>

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

	
	<link href="css/styles.css" rel="stylesheet" type="text/css" />
	<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>

  </head>

  <body>


<!--header start here-->

<!--
<div class="container">  -->

<div id="header">
  <table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>

<!--
   <td>   

     <a href="tel:+4402038686378">(+44) 020 3868 6378</a>
                <a href="mailto:support@qfxo.com">support@qfxo.com</a>

</td> -->
    <td colspan="2" align="center" valign="top">
	  <div style="margin-left:350px;" class="logo">
             <img src="images/bat_logo.png"  alt="Company Logo"   width="200" height="69" title="Company Logo"/>
          </div>
    </td>
   </tr>
   <tr>
     <td colspan="2" align="left" valign="top">&nbsp;
       <div style="width:150px;"></div>
    </td>
   </tr>

   <tr>
    <td align="left" valign="top">&nbsp;
       <div style="width:150px;"></div>
    </td>

    <td align="left" valign="top">
    <div class="full_menu">
    <ul class="menu1">
    <ul class="topmenu">
   <?php
//====================== old style
  $url = "https://bitpay.com/api/rates";

  $json = file_get_contents($url);
  $data = json_decode($json, TRUE);

  $rate = $data[1]["rate"];
  $usd_price = 1;     # Let cost of elephant be 10$
  $bitcoin_price = round( $usd_price / $rate , 8 );

?>
    <li><a class="<?php echo ($pagename == 'index.php') ? 'select' : 'unselect';?>" href="index.php" ><span>Home</span></a></li>
    <li><a class="<?php echo ($pagename == 'aboutus.php') ? 'select' : 'unselect';?>" href="aboutus.php" ><span>About Us</span></a></li>
    <li><a class="<?php echo ($pagename == 'fund_management.php') ? 'select' : 'unselect';?>" href="fund_management.php"><span>Plans</span></a></li>
                 
                          
     <?php
			if($_SESSION['userid'] == '')
			{
				if($pagename == 'register.php')
					echo '<li><a class="select" href="register.php"><span>Register</span></a></li>';
				else
				echo '<li><a class="unselect" href="register.php"><span>Register</span></a></li>';
										
				if($pagename == 'login.php')
				echo '<li><a class="select" href="login.php"><span>Login</span></a></li>';
				else
				echo '<li><a class="unselect" href="login.php"><span>Login</span></a></li>';
			}
			else
			{
			if($pagename == 'memberhome.php')
			echo '<li><a class="select" href="memberhome.php"><span>Accounts</span></a></li>';
			else
			echo '<li><a class="unselect" href="memberhome.php"><span>Accounts</span></a></li>';
										
			if($pagename == 'logout.php')
			echo '<li><a class="select" href="logout.php"><span>Logout</span></a></li>';
			else
			echo '<li><a class="unselect" href="logout.php"><span>Logout</span></a></li>';
		}
	?>
						
          <li><a  class="<?php echo ($pagename == 'rateus.php') ? 'select' : 'unselect';?>"  href="rateus.php"><span>Rate Us</span></a></li> 
         <li><a  class="<?php echo ($pagename == 'banner.php') ? 'select' : 'unselect';?>"  href="banner.php"><span>Banners</span></a></li> 			    <li><a  class="<?php echo ($pagename == 'contactus.php') ? 'select' : 'unselect';?>"  href="contactus.php"><span>Contact Us</span></a></li> 	

</ul>
        </div>
        </td>
        <td valign="left" align="right" style="color:#fff;font-size:17px;font-weight:bold;">
		<?php echo '<br/>&#x0E3F;1=&#36;'. $rate; ?>
        </td>
  </tr>
</table>
        
        
<!--      </div>-->


     </div>
   <!-- banner end here-->
   <div class="banbgimg" style="margin-top:-25px;">


   	<div class="container">
      <div id="container">

    
       <!-- banner start here-->

		<div class="sliderbutton" id="slideleft" onclick="slideshow.move(-1)"></div>
		<div id="slider">
			<ul>
				<li><img style="width:960px;height:445px;" src="photos/b1.png"  alt="" /></li>
				 <li><img  style="width:960px;height:445px;" src="photos/b2.png"  alt="" /></li>

				<!-- <li><img src="photos/b2.png"  alt="" /></li>
				<li><img src="photos/b3.png" alt="" /></li>
				<li><img src="photos/b1.png" alt="" /></li>-->
			</ul>
		</div>
		<div class="sliderbutton" id="slideright" onclick="slideshow.move(1)"></div>
		<ul id="pagination" class="pagination">
			<li onclick="slideshow.pos(0)"></li>
			<li onclick="slideshow.pos(1)"></li>
<!--
			<li onclick="slideshow.pos(2)"></li>
			<li onclick="slideshow.pos(3)"></li>  -->
		</ul>


	</div>  
    </div>

    </div>
<!--header end here-->

    <div class="container">
    	
    
    <div class="row-fluid">
    		<div id="plbx">
