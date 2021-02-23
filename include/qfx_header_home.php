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
  
  
  <header class="indexHead">
    <div class="lineTop">
        <div class="container">
            <div class="linkInfo" style="margin-right:75px;">
                <a href="tel:+4402038686378" style="display:none;">(+44) 020 3868 6378</a>
                <a href="mailto:support@bat24x.com">support@bat24x.com</a>
            </div>
            <a href="index.php" class="logo" style="margin-left:185px;margin-right:185px;">
                <img src="images/bat_logo.png"/>
              <p>Bitcoin Arbitrage Trading</p> 
            </a>
            <div   class="social">
                <a href="#" style="display:none;" target="_blank" ><img  src="static/img/social1.png" alt=""></a>
                <a href="#"  style="display:none;"target="_blank"><img src="static/img/social2.png" alt=""></a>
                <a href="#"  style="display:none;"target="_blank"><img src="static/img/social3.png" alt=""></a>
                <a href="#"  style="display:none;"target="_blank"><img src="static/img/social4.png" alt=""></a>
                <a href="#"  style="display:none;"><img src="static/img/social5.png" alt=""></a>
                <a href="#"  style="display:none;"><img src="static/img/social6.png" alt=""></a>
            </div>
            <div class="language" style="display:none;">
                <a href="index.html?lang=ru" class="active">
                    <div style="background-image: url('static/img/rus.jpg')"></div>
                    <span>rus</span>
                </a>
                <a href="index.html?lang=en">
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
						
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="aboutus.php">About us</a></li>
						<li><a href="fund_management.php">Plans</a></li>
						
						<li><a href="rateus.php">Terms</a></li>
						<li><a href="affiliate.php">Affiliate</a></li>
						<li><a href="faq.php">FAQ</a></li>						
						<li><a href="contactus.php">Contact Us</a></li>
						<?php if($_SESSION['userid'] == ''){ ?>
						<li><a href="login.php">Login</a></li>						 
						<?php }else{ ?>
						<li  ><a href="memberhome.php">Account</a></li>
						<li><a href="logout.php">Logout</a></li>
						
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	
	
        <div class="slide">
	        <div class="container">
	            <div class="rewersSlide cfix">
                    
                    <div class="item">
                        <div class="left">
                            <div class="inner">
                                <p> Withdraw your Profit<br/>with MasterCard</p>
                                <div class="link">
                                    <a href="register.php" class="btnBlueArr">to become a partner</a>
                                </div>
                            </div>
                        </div>
                        <div class="right" style="background-image: url('static/photos/b1.png')"></div>
                    </div>
                    
                    <div class="item">
                        <div class="left">
                            <div class="inner">
                                <ul class="slide-list">
                                    <li>
                                        <span class="num">01</span>
                                        <p>INVEST IN BAT24X.COM</p>
                                    </li>
                                    <li>
                                        <span class="num">02</span>
                                        <p>BITCOIN ARBITRAGE TRADING<br/> ON TOP OPTION BROKERS</p>
                                    </li>
                                    <li>
                                        <span class="num">03</span>
                                        <p>PROFIT FOR BAT24X.COM & IT`S INVESTORS</p>
                                    </li>
                                </ul>
                                <div class="link">
                                    <a href="register.php" class="btnBlueArr">to become a partner</a>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="right" style="background-image: url('static/photos/b2.png')"></div>
                    </div>
                    <div class="item">
                        <div class="left">
                            <div class="inner">
                                <p>If you`re looking for.. <br/>
			Arbitrage Bitcoin across exchanges<br/>
			Here is the prominent platform for you.. </p>
                                <div class="link">
                                    <a href="register.php" class="btnBlueArr">to become a partner</a>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="right" style="background-image: url('static/photos/b3.png')"></div>
                    </div>
	            </div>
	        </div>
	    </div>



    <?php    
             $select_startdate = mysql_fetch_array(mysql_query("select * from site_statistics where stat_id='1'"));
             $live_site=mysql_fetch_array(mysql_query("select * from live_statistics where id='1'"));                                             
             //print_r($live_site);
             			 
            $select_all = mysql_fetch_array(mysql_query("select count(*) as allm from members"));
            $select_active = mysql_fetch_array(mysql_query("select count(*) as acti from members where status = 'active'"));
            $select_susd = mysql_fetch_array(mysql_query("select count(*) as sus from members where status = 'suspended'"));
            $select_new = mysql_fetch_array(mysql_query("select count(*) as new from members where status = 'new'"));
            $getdatetime= mysql_fetch_array(mysql_query("SELECT CURRENT_TIMESTAMP AS getdatetime"));
            $date = date('Y-m-d 00:00:00'); 
            $to_date = $getdatetime['getdatetime'];
            //echo "select count(*) as reg from members where date_of_join >= '$date' and date_of_join <= '$to_date'";
                                                  
            $select_date = mysql_fetch_array(mysql_query("select count(*) as reg from members where date_of_join >= '$date' and date_of_join <= '$to_date'"));
            $history = mysql_fetch_array(mysql_query("select sum(amount) as inco from deposit"));
            $select_flagged = mysql_fetch_array(mysql_query("select count(*) as flagged from members where is_flag = '1'"));
            $history_date = mysql_fetch_array(mysql_query("select sum(amount) as incodate from deposit where invest_date='$date'"));
            if($history_date['incodate'] =='')
            $history_date['incodate'] = "0.00";

            if($history['inco'] =='')
            $history['inco'] = "0.00";               

            $pending_with = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='withdraw_pending'"));
            $paid_with = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='withdrawal'"));
            $deposit_with = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit"));
            $balance = $deposit_with['amt'] - ($pending_with['amt'] + $paid_with['amt']);            
            ?>



 <?php 
    $select=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='63'"));
    $set_value=$select['set_value'];
    if($set_value == 'on')
    {
      ?>


      <?php 
					$date = date('Y-m-d 00:00:00');  
					$history = mysql_fetch_array(mysql_query("select sum(amount) as inco from deposit"));

					$to_date = $getdatetime['getdatetime'];
					$select_startdate = mysql_fetch_array(mysql_query("select * from site_statistics where stat_id='1'"));
			$lifetimes=mysql_fetch_assoc(mysql_query("SELECT DATEDIFF(now(),'".$select_startdate['site_val']."') as lifetime from site_statistics where stat_id='1'"));
					$deposit_with = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit"));  
					
			            // print_r($deposit_with);		
			            //echo $deposit_with['amt'];
					   $deposit_amount=$deposit_with['amt'];     
					if($deposit_amount== '') {            
					  $deposit_amount = '0';
					}else{
					  $deposit_amount=$deposit_with['amt'];            
					}            
					
					$paid_with = mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='withdrawal'"));            
					if($withdraw_amount=$paid_with['amt']== '')   {            
					  $withdraw_amount = '0';
					}else{
					  $withdraw_amount=$paid_with['amt'];            
					}      

					$history_date = mysql_fetch_array(mysql_query("select sum(amount) as incodate from deposit where DATE(invest_date)='".$date."'"));
					if($history_date['incodate'] =='')
					$history_date['incodate'] = "0.00";

					if($history['inco'] =='')
					$history['inco'] = "0.00";
					
					$new_mem=mysql_fetch_array(mysql_query("select count(date_of_join) as mem from `members`"));
				  
					//echo "select sum(amount) as amt from history where type='withdrawal' and DATE(date)='$date'";exit;
					$withdraw=mysql_fetch_array(mysql_query("select sum(amount) as amt from history where type='withdrawal' and DATE(date)='$date'"));
				  
					if($withdraw['amt'] =='')
					$withdraw['amt'] = "0.00";
					?>
		
		
	    <div class="headInf">
	        <div class="container">
	            <ul class="cfix">

	                <li style="background-image: url('static/img/iconhead1.png')">
	                    <p>Investors</p>
  <?php		   
			$fetch_members=mysql_num_rows(mysql_query("select * from members"));
			$select=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='58'"));
			$set_value=$select['set_value'];
			if($set_value == 'on')
			{
		  ?>

	              <b>

<?php
			  if($live_site['editaccounts']=='1')
			  { 
				echo $fetch_members;
			  }
			  else if($live_site['editaccounts']=='2')
			  { 
				echo $live_site['totacc'];
			  } 
				  
			  else if($live_site['editaccounts']=='3')
			  {
				echo $tot_comm = (int)$fetch_members + (int)$live_site['totacc'];
			  }
			   ?>

</b>

<?php } ?>	
	                </li>

	                <li style="background-image: url('static/img/iconhead2.png')">
	                    <p>Invested</p>

	  <?php							  
		$deposit_query=mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where status ='active'"));
		$total_deposit_made=number_format($deposit_query['amt'],8); 
		$select=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='54'"));
		$set_value=$select['set_value'];
		if($set_value == 'on')
		{
	  ?>
	           <b>&#x0E3F;<?php   
		   if($live_site['editdeposit']=='1')
		  { 
			echo $total_deposit_made; 
		  }
		  else if($live_site['editdeposit']=='2')
		  { 
			echo $live_site['totdep'];
		  } 						  
		  else if($live_site['editdeposit']=='3')
		 {
			echo $tot_acc= (float)$total_deposit_made + (float)$live_site['totdep'];
		  }
		  ?>
		 </b>
      <?php } ?>

	                </li>


	                <li style="background-image: url('static/img/iconhead3.png')">
	                    <p>Withdrawn</p>
 <?php				   
			$withdrawals_query=mysql_fetch_array(mysql_query("select sum(amount) as amt  from history where type='withdrawal'"));
			$withdrawals=number_format($withdrawals_query['amt'],8);
			$select=mysql_fetch_array(mysql_query("select * from admin_settings where set_id='55'"));
			$set_value=$select['set_value'];
			if($set_value == 'on')
			{
		  ?>	

	                  <b>&#x0E3F;<?php
			if($live_site['editwithdraw']=='1')
			  { 
				echo $withdrawals; 
			  }
			  else if($live_site['editwithdraw']=='2')
			  { 
				echo $live_site['totwithdraw'];
			  } 								  
			  else if($live_site['editwithdraw']=='3')
			  {
				echo $tot_acc1=(float)$withdrawals + (float)$live_site['totwithdraw'];
			  }		   
		?>
		</b>
<?php } ?>
	        </li>




	            </ul>
	        </div>
	    </div>
	

<?php 
 }
?>
	
</header>
 


