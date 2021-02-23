<!--footer start here-->
<?php

  $fetch=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 7"));
  $fetch1=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 8"));
  $fetch11=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 11"));  
  $fetch28=mysql_fetch_array(mysql_query("select * from payment_process where payment_id = 28"));

?>

<style>

footer {
    background-image: url("../images/bgfooter.jpg");
    background-position: center top;
    box-sizing: border-box;
    margin: 0 auto;
    padding-top: 45px;
    position: relative;
    width: 100%;
}

footer .item {
    float: left;
    margin-right: 120px;
}

footer .logo {
    margin: 0 0 25px;
}
.logo {
    display: inline-block;
    margin-left: 22px;
    margin-right: 10px;
    vertical-align: middle;
    width: 175px;
}

footer .logo {
    margin: 0 0 25px;
}
.logo {
    display: inline-block;
    margin-left: 22px;
    margin-right: 10px;
    vertical-align: middle;
    width: 175px;
}



footer .item .linkInfo a {
    display: table;
    margin: 0 0 8px;
    padding-left: 36px;
}
.linkInfo a:nth-child(2) {
    background-image: url("../images/iconemail.png");
    margin-left: 40px;
    padding-left: 30px;
    width: 240px;
}
.linkInfo a {
    background-image: url("../images/iconphone.png");
    background-position: left center;
    background-repeat: no-repeat;
    box-sizing: border-box;
    color: #afbae5;
    display: inline-block;
    font-size: 16px;
    font-weight: bold;
    min-width: 180px;
    padding-left: 20px;
}

 
footer p.fotText {
    color: #fff;
    display: table;
    font-size: 12px;
    line-height: 20px;
    width: 380px;
}

 
.cfix::after, ul::after {
    clear: both;
    content: " ";
    display: table;
}
.container {
    margin: 0 auto;
    padding: 0 15px;
    position: relative;
    width: 1200px;
}

.botFooter {
    background-color: #465aab;
    height: 70px;
    line-height: 70px;
    margin-top: 20px;
    width: 100%;
}



footer .item:nth-child(3) {
    margin: 0 0 0 75px;
}
 
 
 
.linkInfo {
    display: inline-block;
    vertical-align: middle;
}
footer ul li a::before {
    content: "-";
    margin-right: 5px;
}
footer ul li a {
    color: #fff;
    font-size: 14px;
    font-weight: bold;
    position: relative;
    text-transform: uppercase;
}


footer .item .social {
    display: table;
    left: -10px;
    margin: 11px 0 0;
    position: relative;
}
.social {
    display: inline-block;
    vertical-align: middle;
}



.pays {
    background-color: #fff;
    margin-top: 30px;
    padding: 35px 0;
}
.cfix::after, ul::after {
    clear: both;
    content: " ";
    display: table;
}
.pays ul {
    margin: 0 -15px -30px;
    text-align: center;
}

.pays li {
    display: inline-block;
    margin: 0 15px 30px;
    vertical-align: middle;
}

</style>




<div class="pays">
        <div class="container">



            <ul>
		<li><a href="#"><img src="images/partners/eco-pay.jpg"  alt="alert pay" /> </a></li>
		<li><a href="#"><img src="images/partners/perfect_money.gif"  alt="perfet money" /> </a></li>
		<li><a href="#"><img src="images/partners/solid_trustpay.gif"  alt="sold trust" /> </a></li>
		<li><a href="#"><img src="images/partners/eco-pay.jpg"  alt="eco pay" /> </a></li>
		<li><a href="#"><img src="images/partners/perfect_money.gif"  alt="perfet money" /> </a></li>
		<li><a href="#"><img src="images/partners/solid_trustpay.gif"  alt="sold trust" /> </a></li>
		<li><a href="#"><img src="images/advcash.png"  alt="Advcash" /></a></li>
            </ul> 
        </div>
    </div>


<footer>
    <div class="container cfix">
        <div class="item">
            <a href="home" class="logo">
                <img style="width:112px;height:65px;" src="images/bat_logo.png">
                <p>Bitcoin Arbitrage Trading</p>
            </a>
            <p class="fotText">
            	Bitcoin Arbitrage Trading Ltd, registered in England &amp; Wales,  Company number 10387426<br>
                Address: 71-75 Shelton Street, Covent Garden, London, United Kingdom, WC2H 9JQ<br>
                <br>
                The card is issued by Wave Crest Holdings Limited pursuant to a license from MasterCard Europe. MasterCard is a registered trademark of MasterCard International Incorporated.  Wave Crest Holdings Limited is a licensed electronic money institution by the Financial Services Commission, Gibraltar.
            </p>
        </div>
        <div class="item">
            <ul>

                <li class="active"><a href="index.php">Home</a></li>
                <li ><a href="faq.php">faq</a></li>
                <li><a href="privacy.php">privacy policy</a></li>
                <li><a href="risk_disclosure.php">Risk Disclosure</a></li>
                <li><a href="money_laundering.php">Money Laundering</a></li>
                <li><a href="testimonial.php">Testimonial</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>

           </ul>
        </div>
        <div class="item">
            <div class="linkInfo">
                <a href="tel:+4402038686378">(+44) 020 3868 6378</a>
                <a href="mailto:support@qfxo.com">support@qfxo.com</a>
            </div>
            <div class="social">

            </div>
            <br>

        </div>
    </div>
    <div class="botFooter">
        <div class="container">
            <p>
                &copy; 2016 Bitcoin Arbitrage Trading Option. All rights reserved.
                <span style="width: 800px; float: right; line-height: 1; font-style: 12px; color: white; line-height: 1.2; margin-top: 5px;">
                    Trading leveraged products such as Bitcoin Arbitrage Trading may not be suitable for all investors as they carry a high degree of risk to your capital. Please ensure that you fully understand the risks involved, taking into account your investments objectives and level of experience, before trading, and if necessary seek independent advice. Please read the full Risk Disclosure. Qfx Options does not accept clients from the U.S., Canada, Japan, and North Korea.
                </span>
            </p>
        </div>
    </div>
</footer>





<!--
<footer>
<div id="ftr">
	<div class="container">
        <div class="partners">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" valign="top" width="17%"><h6>Our Partners</h6></td>
              <td align="left" valign="top"><div class="marquee" id="mycrawler2">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="center" valign="middle" width="25%"><a href="#"><img src="images/partners/eco-pay.jpg"  alt="alert pay" /></a></td>
                      <td align="center" valign="middle" width="25%"><a href="#"><img src="images/partners/perfect_money.gif"  alt="perfet money" /></a></td>
                      <td align="center" valign="middle" width="25%"><a href="#"><img src="images/partners/solid_trustpay.gif"  alt="sold trust" /></a></td>
                      <td align="center" valign="middle" width="25%"><a href="#"><img src="images/partners/lr.jpg"  alt="Liberty Reserve" /></a></td>
                      <td align="center" valign="middle" width="25%"><a href="#"><img src="images/partners/eco-pay.jpg"  alt="eco pay" /></a></td>
                      <td align="center" valign="middle" width="25%"><a href="#"><img src="images/partners/perfect_money.gif"  alt="perfet money" /></a></td>
                      <td align="center" valign="middle" width="25%"><a href="#"><img src="images/partners/solid_trustpay.gif"  alt="sold trust" /></a></td>
                      <td align="center" valign="middle" width="25%"><a href="#"><img src="images/partners/lr.jpg"  alt="Liberty Reserve" /></a></td>
                      <td align="center" valign="middle" width="25%"><a href="#"><img src="images/advcash.png"  alt="Advcash" /></a></td>
                    
                    </tr>
                  </table>
                </div></td>
            </tr>
          </table>
          <script type="text/javascript">
marqueeInit({
	uniqueid: 'mycrawler2',
	style: {
		'width': '1000px',
		'height': '70px',
		'float': 'left',
		'margin-top': '3px'
	},
	inc: 1, //speed - pixel increment for each iteration of this marquee's movement
	mouse: false, //mouseover behavior ('pause' 'cursor driven' or false)
	moveatleast: 2,
	neutral: 150,
	savedirection: true
});
</script>
       </div>
    </div>


    <div class="container">    
    <div class="row-fluid">
   	<div id="line" style="color:#000;"> 
                <a style="color:#000;" href="faq.php">FAQ </a>|                
                <a href="privacy.php" style="color:#000;">Privacy Policy</a>|
                 <a href="risk_disclosure.php" style="color:#000;">Risk Disclosure</a>|
                 <a href="money_laundering.php"  style="color:#000;">Money Laundering</a>|
                 <a href="testimonial.php"  style="color:#000;">Testimonial</a>|
                 <a href="contactus.php"  style="color:#000;">Contact us</a>
		<?php $fetch=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 45")); ?> 
		<p style="color:#fff;"><?php echo $fetch['set_value']; ?></p></div>
	</div>   
    </div>
     </div>


  </footer>
  <div class="clear"></div>
  </div>

-->




<!--footer end here-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript">
var slideshow=new TINY.slider.slide('slideshow',{
	id:'slider',
	auto:4,
	resume:false,
	vertical:false,
	navid:'pagination',
	activeclass:'current',
	position:0,
	rewind:false,
	elastic:true,
	left:'slideleft',
	right:'slideright'
});
</script>




  </body>
</html>
