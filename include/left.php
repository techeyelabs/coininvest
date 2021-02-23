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
<div class="left-col">

      <div class="latest-news">

        <h1>Member login</h1>

        <div class="news-box">

          <div class="news">
			<form name="myform"  id="myform" method="post" action="login_validate.php" onSubmit="this.canLogin.value=1;">
           <div class="login">

        	<p style="padding:0px; text-align:left">User ID:<input name="txtUsername" type="text" /></p>

            <p style="padding:0px; text-align:left">Password:<input name="txtPassword" type="password" /></p>
			 <p style="padding:0px; text-align:left"><img width="139" height="50" name="captcha" id="captcha" src="Captcha.php"/><br /><a onclick="javascript:shuffle();" href="#register" linkindex="9" set="yes" style="color:#000000"><font size="-2">Try another one</font></a><input name="turningcode" type="text" /></p>
            <p><input type="image" src="img/login-btn.png" width="58" height="23" alt="login" /></p>

       </div>
			</form>
          </div>

          <!--<div class="news"><p><span class="news-date" style="padding:0px; text-align:left">Click here to register</span></p></div>-->

          <div class="news" style="padding-bottom:15px;"><p><span class="news-date"><a style="color:#555555;" href="forgot.php" >Forgot Password ?</a></span></p></div>

        </div>

      

      </div>

     <!--<div class="latest-news">

        <h1>Forex Trading Chart</h1>

        <div class="news-box">

          <div class="news">
<p class="news-cont"><A HREF="http://www.kitco.com/connectfx.html">
  <IMG SRC="http://www.weblinks247.com/exrate/24hr-euro-small.gif" BORDER="0" ALT="[Most Recent Exchange Rate from www.kitco.com]">
</A></p>
            

            
          </div>

          <div class="news">
		  <p class="news-cont"><A HREF="http://www.kitco.com/connectfx.html">
  <IMG SRC="http://www.weblinks247.com/exrate/24hr-brl-small.gif" BORDER="0" ALT="[Most Recent Exchange Rate from www.kitco.com]">
</A></p></div>

          <div class="news" style="padding-bottom:15px;"><p class="news-cont"><A HREF="http://www.kitco.com/connectfx.html">
  <IMG SRC="http://www.weblinks247.com/exrate/24hr-aud-small.gif" BORDER="0" ALT="[Most Recent Exchange Rate from www.kitco.com]">
</A></p></div>

        </div>

      

      </div>-->

    </div>
    