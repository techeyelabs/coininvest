<footer>
    <div class="container cfix">
        <div class="item">
            <a style="padding-top:55px;"   href="index.php" class="logo">
                <img src="images/bat_logo.png"/>
                <p>Bitcoin Arbitrage Trading</p> 
            </a>
            <p class="fotText">
            	<!--   BAT24X LIMITED.<br/>
		   No. 5 Cork Street,<br/>
		   P. O. Box 1701,<br/>
	   	   BELIZE CITY, Belize C.A.<br/> -->
   
        </p>
        </div>
        <div class="item">
            <ul>
                <li><a href="index.php">main</a></li>
                <li><a href="aboutus.php">about us</a></li>
                <li><a href="privacy.php">privacy policy</a></li>
               <li    class="active"><a href="faq.php">faq</a></li>
                <li><a href="money_laundering.php">Money Laundering</a></li>               
                <li><a href="contactus.php">contact us</a></li>
               <?php if($_SESSION['userid']!=''){  ?>
                     <li><a href="memberhome.php">account</a></li>
                <?php } ?>

            </ul>
        </div>
        <div class="item">
            <div class="linkInfo">
                <a href="tel:+4402038686378" style="display:none;">(+123) 020 3868 6378</a>
                <a href="mailto:support@bat24x.com">support@bat24x.com</a>
            </div>
             <p  style="padding-top:20px;padding-left:34px;color:#fff;line-height: 20px;display: table;font-size: 12px; ">
             BAT24X LIMITED.<br/>
		   No. 5 Cork Street,<br/>
		   P. O. Box 1701,<br/>
	   	   BELIZE CITY, Belize C.A.<br/> 
            
            </p>
            
            
            
            
            
            <div class="social" style="display:none;">
                <a href="#" target="_blank"><img src="static/img/social1.png" alt=""></a>
                <a href="#" target="_blank"><img src="static/img/social2.png" alt=""></a>
                <a href="#" target="_blank"><img src="static/img/social3.png" alt=""></a>
                <a href="#" target="_blank"><img src="static/img/social4.png" alt=""></a>
                <a href="#"><img src="static/img/social5.png" alt=""></a>
                <a href="#"><img src="static/img/social6.png" alt=""></a>
            </div>

            <br/>
<!--
            <img src="static/img/logo_1.png" width="230px" alt=""><br/>
            <img src="static/img/logo_2.png" width="230px" alt=""> -->
        </div>
    </div>
    <div class="botFooter">
        <div class="container">
           <!-- <p>
                © 2016 Developed & Maintenance by Excel Solutions, Dhaka, Bangladesh
                <span style="width: 800px; float: right; line-height: 1; font-style: 12px; color: white; line-height: 1.2; margin-top: 5px;display:none;">
                    
                </span>
            </p> -->
        </div>
    </div>
</footer>

