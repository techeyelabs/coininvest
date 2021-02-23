<?php $hover_style2 =  'color: #black none repeat scroll 0 0;"';   ?>

<?php 
$investmentHistory = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS total FROM deposit WHERE member_id='".$_SESSION['userid']."' LIMIT 1"));				
$totalInvestment=$investmentHistory['total'];


$earningHistory=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS total FROM history WHERE user_id='".$_SESSION['userid']."' LIMIT 1"));
$totalEarning=$earningHistory['total'];
// print_r($totalInvestment);


$withdrawHistory=mysql_fetch_array(mysql_query("select COUNT(*) AS total from  history where (type = 'withdrawal' or type = 'withdraw_pending') and user_id='".$_SESSION['userid']."'"));
$totalWithdraw=$withdrawHistory['total'];
// print_r($totalWithdraw);

function getlist_prev($n,$level)
							{
								static $count = 0;
								$id="intro_id 	";
								
								$sql = "select * from members where ".$id."=".$n;
								$result = mysql_query($sql);
								if(mysql_num_rows($result)==0)
									$level--;
								else
									$level++;
									
								if($level == 0) 
								$level = 1;
								while($row = mysql_fetch_array($result))
								{								
									if($level <= 4)
									{
										// $count++;
										$name = $row["username"];	
										$fname=$row['first_name'];
										$mail = $row["mail_id"];
										$mem_mmm = $row["member_id"];
										
                    $total_deposit = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where member_id = ".$mem_mmm." and status='active'"));
										for($j=1;$j<=$level*3;$j++) 
										
										if( $total_deposit['amt'] > 0  ) {
                        $count++;
									 	}				
                     getlist_prev($row["member_id"],$level);
									}
								}
								return $count;
              }
$user = $_SESSION['userid'];
$count = getlist_prev($user ,0);	
$totalreferrel= $count/3;
?>

<tr style="padding-inline-start: 0px;">
   <!-- <td style="display: inline-block;
    width: 19%;
    text-align: center;
    padding: 0px /*0*/15px 15px 0px;" >
    
    <a style="color: #8dad2f;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
   background: #fff;
    padding: 16px 0;
    border-radius:10px;
    /* width: 180px; */
    display: block;" href="account.php"       -->
    
    <?php
    $page_uri =  $_SERVER['REQUEST_URI']; 
    $pages_uri = explode("/",$page_uri);
   $page_name = $pages_uri[1];
     if( $page_name == "account.php" )
     { 
        echo '<td style="display: inline-block;
        width:383px;
        text-align: center;
        padding: 0px /*0*/15px 15px 0px;" >
        <div style="width:72px; float:left;background-color:#fff;height:72px; ">
        <img src="./images/logo_dash72.png" height="72px"/>
        </div>
        <div style="width:81%;float:left">
        <a 
        style="color:#fff;
        text-align:left;
        padding-left:25px;
        background-color:#38482c;
        font-size: 15px;
        height:50px;
        padding-top:22px;
        font-weight: 500;
      //   padding: 16px 0;
        display: block; href="account.php"><b> My Account</b></div>
        </a> </div></td>';
      }
      else
      {
         echo '  <td style="display: inline-block;
         width:383px;
         text-align: center;
         padding: 0px /*0*/15px 15px 0px;" >
         <div style="width:72px; float:left;background-color:#fff;height:72px; ">
        <img src="./images/logo_dash72.png" height="72px"/>
        </div>
        <div style="width:81%;float:left">
         <a 
         style="color: #8dad2f;
         font-size: 15px;
         text-align:left;
         padding-left:25px;
         font-weight: 500;
         height:50px;
         padding-top:22px;
         background: #fff;
          //padding: 16px 0;
          //border-radius:10px;
         /* width: 180px; */
         display: block;" href="account.php"><b> My Account</b></div>
         </a> </div></td>';
      } 
      ?>  
        <?php
    $page_uri =  $_SERVER['REQUEST_URI']; 
    $pages_uri = explode("/",$page_uri);
   $page_name = $pages_uri[1];
     if( $page_name == "deposit.php" )
     { 
        echo '<td style="display: inline-block;
        width:383px;
        text-align: center;
        padding: 0px /*0*/15px 15px 0px;" >
        <div style="width:72px; float:left;background-color:#fff;height:72px; ">
        <img src="./images/logo_dash72.png" height="72px"/>
        </div>
        <div style="width:81%;float:left">
        <a 
        style="color:#fff;
        background-color:#38482c;
        font-size: 15px;
        text-align:left;
        padding-left:25px;
        font-weight: 500; 
        height:50px;
        padding-top:22px;
      //   padding: 16px 0;
      //   border-radius:10px;
        display: block; href="deposit.php"><b> Investment</b></div>
        </a> </div></td>';
      }
      else
      {
         echo '  <td style="display: inline-block;
         width:383px;
         text-align: center;
         padding: 0px /*0*/15px 15px 0px;" >
         <div style="width:72px; float:left;background-color:#fff;height:72px; ">
         <img src="./images/logo_dash72.png" height="72px"/>
         </div>
         <div style="width:81%;float:left">
         <a 
         style="color: #8dad2f;
         font-size: 15px;
         text-align:left;
         padding-left:25px;
         font-weight: 500;
         height:50px;
padding-top:22px;
        background: #fff;
         // padding: 16px 0;
         // border-radius:10px;
         /* width: 180px; */
         display: block;" href="deposit.php"><b> Investment</b></div>
         </a> </div></td>';
      } 
      ?>  
   <!-- <td style="display: inline-block;
    width: 19%;
    text-align: center;
    padding: 0px /*0*/15px 15px 0px;" > <a style="color: #8dad2f;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
    border-radius:10px;
   background: #fff;
    padding: 16px 0;
    /* width: 180px; */
    display: block;" href="deposit.php"      <?php //if( $page_name == "deposit.php" ){  echo $hover_style2; } ?> >Investment</a></td> -->
    <?php
//     $page_uri =  $_SERVER['REQUEST_URI']; 
//     $pages_uri = explode("/",$page_uri);
//    $page_name = $pages_uri[1];
//      if( $page_name == "deposit_list.php" )
//      { 
//         echo '<td style="display: inline-block;
//  width:31%;
//         text-align: center;
//         padding: 0px /*0*/15px 15px 0px;" >
//         <a 
//         style="color:#fff;
//         background-color:#38482c;
//         font-size: 15px;
//         height:50px;
// padding-top:22px;
//         text-transform: uppercase;
//         font-weight: 500;
//       //   padding: 16px 0;
//       //   border-radius:10px;
//         display: block; href="deposit_list.php"><b> Active Invest</b></a></td>';
//       }
//       else
//       {
//          echo '  <td style="display: inline-block;
//          width: 19%;
//          text-align: center;
//          padding: 0px /*0*/15px 15px 0px;" >
         
//          <a 
//          style="color: #8dad2f;
//          font-size: 15px;
//          text-transform: uppercase;
//          font-weight: 500;
//         background: #fff; 
//         height:50px;
//         padding-top:22px;
//          // padding: 16px 0;
//          // border-radius:10px;
//          /* width: 180px; */
//          display: block;" href="deposit_list.php"><b> Active Invest</b></a></td>';
//       } 
      ?>  
   <!-- <td style="display: inline-block;
    width: 19%;
    text-align: center;
    padding: 0px /*0*/15px 15px 0px;" > <a style="color: #8dad2f;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
    border-radius:10px;
   background: #fff;
    padding: 16px 0;
    /* width: 180px; */
    display: block;" href="deposit_list.php" <?php //if( $page_name == "deposit_list.php" ){ echo $hover_style2; } ?> >Active Invest</a></td> -->
   
   <!-- <td style="display: inline-block;
    width: 19%;
    text-align: center;
    padding: 0px /*0*/15px 15px 0px;" > <a style="color: #8dad2f;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
    border-radius:10px;
   background: #fff;
    padding: 16px 0;
    /* width: 180px; */
    display: block;" href="deposit_history.php?status=all"  -->

    <?php
    $page_uri =  $_SERVER['REQUEST_URI']; 
    $pages_uri = explode("/",$page_uri);
   $page_name = $pages_uri[1];
     if( $page_name == "withdraw.php" )
     { 
        echo '<td style="display: inline-block;
        width:384px;
        text-align: center;
        padding: 0px /*0*/15px 15px 0px;" >
        <div style="width:72px; float:left;background-color:#fff;height:72px; ">
                  <img src="./images/logo_dash72.png" height="72px"/>
                  </div>
                  <div style="width:81%;float:left">
        <a 
        style="color:#fff;
        background-color:#38482c;
        font-size: 15px;
        text-align:left;
        padding-left:25px;
        font-weight: 500;
        height:50px;
        padding-top:22px;
       // padding: 16px 0;
        //border-radius:10px;
        display: block; href="withdraw.php"><b> Withdraw</b></div>
        </a> </div></td>';
      }
      else
      {
         echo '  <td style="display: inline-block;
         width:384px;
         text-align: center;
         padding: 0px /*0*/15px 15px 0px;" >
         <div style="width:72px; float:left;background-color:#fff;height:72px; ">
                  <img src="./images/logo_dash72.png" height="72px"/>
                  </div>
                  <div style="width:81%;float:left">
         <a 
         style="color: #8dad2f;
         font-size: 15px;
         font-weight: 500;
         background: #fff;
         text-align:left;
         padding-left:25px;
         height:50px;
         padding-top:22px;
         //padding: 16px 0;
         //border-radius:10px;
         /* width: 180px; */
         display: block;" href="withdraw.php"><b> Withdraw</b></div>
         </a> </div></td>';
      } 
      ?>


     <?php if ( $page_name == "deposit_history.php?status=all" || 
                $page_name == "deposit_history.php?status=released" ||  
                $page_name == "deposit_history.php?status=matured" || 
                $page_name == "deposit_history.php?status=active"   )   { 
                  echo '<td style="display: inline-block;
                  width:284px;
                  text-align: center;
                  padding: 0px /*0*/15px 15px 0px;" >
                  <div style="width:25%; float:left;background-color:#fff;height:72px; ">
                  <img src="./images/logo_dash72.png" height="72px"/>
                  </div>
                  <div style="width:75%;float:left">
                  <a 
                  style="color:#fff;
                  background-color:#38482c;
                  font-size: 15px;
                  text-align: left;
                  padding-left:25px;
                  font-weight: 500;
                  height:50px;
                  padding-top:22px;
                  // padding: 16px 0;
                  // border-radius:10px;
                  display: block; href="deposit_history.php"><b> Investment History</b><div style="color:#eabe2d;font-size:22px;"><span> '.$totalInvestment.'</span></div>
                  </a> </div></td>';
	 }else{
      echo '  <td style="display: inline-block;
      width:284px;
      text-align: center;
      padding: 0px /*0*/15px 15px 0px;" >
      <div style="width:25%; float:left;background-color:#fff;height:72px; ">
      <img src="./images/logo_dash72.png" height="72px"/>
      </div>
      <div style="width:75%;float:left">
      <a 
      style="color: #8dad2f;
      font-size: 15px;
      text-align: left;
      font-weight: 500;
     background: #fff;
     padding-left:25px;
     height:50px;
     padding-top:22px;
      // padding: 16px 0;
      // border-radius:10px;
      /* width: 180px; */
      display: block;" href="deposit_history.php?status=all"><b> Investment History</b><div style="color:#eabe2d;font-size:22px;"><span> '.$totalInvestment.' </span></div>
      </a> </div></td>';
    }
     ?> 
     
     <?php
    $page_uri =  $_SERVER['REQUEST_URI']; 
    $pages_uri = explode("/",$page_uri);
   $page_name = $pages_uri[1];
     if( $page_name == "earnings.php" )
     { 
        echo '<td style="display: inline-block;
        width:284px;
        text-align: center;
        padding: 0px /*0*/15px 15px 0px;" >
        <div style="width:25%; float:left;background-color:#fff;height:72px; ">
        <img src="./images/logo_dash72.png" height="72px"/>
        </div>
        <div style="width:75%;float:left">
        <a 
        style="color:#fff;
        background-color:#38482c;
        text-align: left;
        padding-left:25px;
        font-size: 15px;
        font-weight: 500;
        height:50px;
        padding-top:22px;
      //   padding: 16px 0;
      //   border-radius:10px;
        display: block; href="earnings.php"><b> Earnings History</b> <div style="color:#eabe2d;font-size:22px;"><span> '.$totalEarning.' </span></div>
        </a>  </div></td>';
      }
      else
      {
         echo '  <td style="display: inline-block;
         width:284px;
         text-align: center;
         padding: 0px /*0*/15px 15px 0px;" >
         <div style="width:25%; float:left;background-color:#fff;height:72px; ">
        <img src="./images/logo_dash72.png" height="72px"/>
        </div>
        <div style="width:75%;float:left">
         <a 
         style="color: #8dad2f;
         text-align: left;
         font-size: 15px;
         padding-left:25px;
         font-weight: 500;
        background: #fff;
        height:50px;
        padding-top:22px;
         //padding: 16px 0;
         //border-radius:10px;
         /* width: 180px; */
         display: block;" href="earnings.php"><b> Earnings History</b> 
         <div style="color:#eabe2d;font-size:22px;"><span> '.$totalEarning.' </span></div>
         </a> 
         </div>
         </td>';
      } 
      ?>

   <!-- <td style="display: inline-block;
    width: 19%;
    text-align: center;
    padding: 0px /*0*/15px 15px 0px;" > <a style="color: #8dad2f;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
    border-radius:10px;
   background: #fff;
    padding: 16px 0;
    /* width: 180px; */
    display: block;" href="earnings.php"          <?php //if( $page_name == "earnings.php" ){          echo $hover_style2; } ?> >Earnings History</a></td> -->
   <!-- <td> <a style="color: #fff;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
    background: #00a5e2;
    padding: 16px 0;
    /* width: 180px; */
    display: block;" href="referals_history.php"  <?php //if( $page_name == "referals_history.php" ){  echo $hover_style2; } ?> >Referrals History</a></td> -->

    

   <!-- <td style="display: inline-block;
    width: 19%;
    text-align: center;
    padding: 0px /*0*/15px 15px 0px;" > <a style="color: #8dad2f;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
    border-radius:10px;
   background: #fff;
    padding: 16px 0;
    /* width: 180px; */
    display: block;" href="withdraw.php"          <?php //if( $page_name == "withdraw.php" ){          echo $hover_style2; } ?> >Withdraw</a></td> -->

    <?php
    $page_uri =  $_SERVER['REQUEST_URI']; 
    $pages_uri = explode("/",$page_uri);
   $page_name = $pages_uri[1];
     if( $page_name == "withdraw_history.php" )
     { 
        echo '<td style="display: inline-block;
        width:284px;
        text-align: center;
        padding: 0px /*0*/15px 15px 0px;" >
        <div style="width:25%; float:left;background-color:#fff;height:72px; ">
        <img src="./images/logo_dash72.png" height="72px"/>
        </div>
        <div style="width:75%;float:left">
        <a 
        style="color:#fff;
        background-color:#38482c;
        font-size: 15px;
        text-align: left;
        padding-left:25px;
        font-weight: 500;
        height:50px;
        padding-top:22px;
        //padding: 16px 0;
        //border-radius:10px;
        display: block; href="withdraw_history.php"><b> Withdraw History</b><div style="color:#eabe2d;font-size:22px;"><span style="color:#eabe2d;font-size:22px;"> '.$totalWithdraw.' </span></div>
        </a>
        </div>
        </td>';
      }
      else
      {
         echo '  <td style="display: inline-block;
         width:284px;
        
         padding: 0px /*0*/15px 15px 0px;" >
         <div style="width:25%; float:left;background-color:#fff;height:72px; ">
         <img src="./images/logo_dash72.png" height="72px" width="72px"/>
         </div>
         <div style="width:75%;float:left">
         <a 
       
         style="color: #8dad2f;
         font-size: 15px;
         text-align: left;
         padding-left:25px;
         font-weight: 500;
        background: #fff;
        height:50px;
padding-top:22px;
        // padding: 16px 0;
         //border-radius:10px;
         /* width: 180px; */
         display: block;" href="withdraw_history.php"><b> Withdraw History</b><div style="color:#eabe2d;font-size:22px;"><span> '.$totalWithdraw.' </span></div>
         </a>
         </div>
         </td>';
      } 
      ?>

   <!-- <td style="display: inline-block;
    width: 19%;
    text-align: center;
    padding: 0px /*0*/15px 15px 0px;" > <a style="color: #8dad2f;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
   background: #fff;
    border-radius:10px;
    padding: 16px 0;
    /* width: 180px; */
    display: block;" href="withdraw_history.php"  <?php //if( $page_name == "withdraw_history.php" ){  echo $hover_style2; } ?> >Withdraw History</a></td> -->

    <?php
    $page_uri =  $_SERVER['REQUEST_URI']; 
    $pages_uri = explode("/",$page_uri);
   $page_name = $pages_uri[1];
     if( $page_name == "referals.php" )
     { 
        echo '<td style="display: inline-block;
      width:283px;
        text-align: center;
        padding: 0px /*0*/15px 15px 0px;" >
        <div style="width:25%; float:left;background-color:#fff;height:72px; ">
        <img src="./images/logo_dash72.png" height="72px" width="72px"/>
        </div>
        <div style="width:75%;float:left">
        <a 
        style="color:#fff;
        background-color:#38482c;
        font-size: 15px;
        text-align: left;
        padding-left:25px;
        font-weight: 500;
        height:50px;
        padding-top:22px;
        //padding: 16px 0;
        //border-radius:10px;
        display: block; href="referals.php"><b> My Referrals</b><div style="color:#eabe2d;font-size:22px;"><span> '.$totalreferrel.' </span></div>
        </a>
        </div></td>';
      }
      else
      {
         echo '  <td style="display: inline-block;
         width:283px;
         text-align: center;
         padding: 0px /*0*/15px 15px 0px;" >
         <div style="width:25%; float:left;background-color:#fff;height:72px; ">
         <img src="./images/logo_dash72.png" height="72px" width="72px"/>
         </div>
         <div style="width:75%;float:left">
         <a 
         style="color: #8dad2f;
         font-size: 15px;
         text-align: left;
         padding-left:25px;
         font-weight: 500;
        background: #fff;
        height:50px;
        padding-top:22px;
         //padding: 16px 0;
         //border-radius:10px;
         /* width: 180px; */
         display: block;" href="referals.php"><b> My Referrals</b><div style="color:#eabe2d;font-size:22px;"><span> '.$totalreferrel.' </span></div>
         </a>
         </div></td>';
      } 
      ?>

   <!-- <td style="display: inline-block;
    width: 19%;
    text-align: center;
    padding: 0px /*0*/15px 15px 0px;" > <a style="color: #8dad2f;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
   background: #fff;
    padding: 16px 0;
    border-radius:10px;
    /* width: 180px; */
    display: block;" href="referals.php"          <?php //if( $page_name == "referals.php" ){          echo $hover_style2; } ?> >My Referrals</a></td> -->

    <?php
    $page_uri =  $_SERVER['REQUEST_URI']; 
    $pages_uri = explode("/",$page_uri);
   $page_name = $pages_uri[1];
     if( $page_name == "referal_link.php" )
     { 
        echo '<td style="display: inline-block;
        width:383px;
        text-align: center;
        padding: 0px /*0*/15px 15px 0px;" >
        <div style="width:72px; float:left;background-color:#fff;height:72px; ">
        <img src="./images/logo_dash72.png" height="72px" width="72px"/>
        </div>
        <div style="width:81%;float:left">
        <a 
        style="color:#fff;
        background-color:#38482c;
        padding-left:25px;
        text-align:left;
        font-size: 15px;
        font-weight: 500;
        height:50px;
padding-top:22px;
        //padding: 16px 0;
        //border-radius:10px;
        display: block; href="referal_link.php"><b> Affiliate Promo</b>
        </a>
        </div></td>';
      }
      else
      {
         echo '  <td style="display: inline-block;
         width:383px;
         text-align: center;
         padding: 0px /*0*/15px 15px 0px;" >
         <div style="width:72px; float:left;background-color:#fff;height:72px; ">
         <img src="./images/logo_dash72.png" height="72px" width="72px"/>
         </div>
         <div style="width:81%;float:left">
         <a 
         style="color: #8dad2f;
         padding-left:25px;
         text-align:left;
         font-size: 15px;
         font-weight: 500;
         background: #fff;
         height:50px;
         padding-top:22px;
         //padding: 16px 0;
         //border-radius:10px;
         /* width: 180px; */
         display: block;" href="referal_link.php"><b> Affiliate Promo</b></div>
         </a>
         </div></td>';
      } 
      ?>


   <!-- <td style="display: inline-block;
    width: 19%;
    text-align: center;
    padding: 0px /*0*/15px 15px 0px;" > <a style="color: #8dad2f;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
    border-radius:10px;
   background: #fff;
    padding: 16px 0;
    /* width: 180px; */
    display: block;" href="referal_link.php"      <?php //if( $page_name == "referal_link.php" ){      echo $hover_style2; } ?> >Affiliate Promo</a></td>  -->
   
   
   <?php  
    $userid = $_SESSION['userid'];
    //echo "select * from members where member_id=$userid";
    $uif =  mysql_fetch_array(mysql_query("select * from members where member_id=$userid"));
    
    if($uif['username']!="") 
    {
        $member_email = $uif['member_email'];
        $mr = mysql_fetch_array(mysql_query("select * from representatives where member_id='$userid' and status!='INACTIVE'"));
       // print_r($mr);
       if($mr['email_atq']!=""){
    ?>

<?php
    $page_uri =  $_SERVER['REQUEST_URI']; 
    $pages_uri = explode("/",$page_uri);
   $page_name = $pages_uri[1];
     if( $page_name == "representativess.php" )
     { 
        echo '<td style="display: inline-block;
      width:383px;
        text-align: center;
        padding: 0px /*0*/15px 15px 0px;" >
        <div style="width:72px; float:left;background-color:#fff;height:72px; ">
        <img src="./images/logo_dash72.png" height="72px" width="72px"/>
        </div>
        <div style="width:81%;float:left">
        <a 
        style="color:#fff;
        background-color:#38482c;
        font-size: 15px;
        padding-left:25px;
        text-align:left;
        font-weight: 500;
        height:50px;
        padding-top:22px;
       // padding: 16px 0;
       // border-radius:10px;
        display: block; href="representativess.php"><b> Representatives</b></div>
        </a>
        </div></td>';
      }
      else
      {
         echo '  <td style="display: inline-block;
       width:383px;
         text-align: center;
         padding: 0px /*0*/15px 15px 0px;" >
         <div style="width:72px; float:left;background-color:#fff;height:72px; ">
         <img src="./images/logo_dash72.png" height="72px" width="72px"/>
         </div>
         <div style="width:81%;float:left">
         <a 
         style="color: #8dad2f;
         font-size: 15px;
         font-weight: 500;
         background: #fff;
         padding-left:25px;
         text-align:left;
         height:50px;
         padding-top:22px;
         //padding: 16px 0;
         //border-radius:10px;
         /* width: 180px; */
         display: block;" href="representativess.php"><b> Representatives</b></div>
         </a>
         </div></td>';
      } 
      ?>

            <!-- <td style="display: inline-block;
    width: 19%;
    text-align: center;
    padding: 0px /*0*/15px 15px 0px;" > <a style="color: #8dad2f;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
    border-radius:10px;
   background: #fff;
    padding: 16px 0;
    /* width: 180px; */
    display: block;" href="representativess.php" <?php // if($page_name =="representativess.php") {       echo $hover_style2;    } ?> >Representatives</a></td> -->
    <?php
       }
    }
   ?>
  
  <?php
    $page_uri =  $_SERVER['REQUEST_URI']; 
    $pages_uri = explode("/",$page_uri);
   $page_name = $pages_uri[1];
     if( $page_name == "change_password.php" )
     { 
        echo '<td style="display: inline-block;
        width:383px;
        text-align: center;
        padding: 0px /*0*/15px 15px 0px;" >
        <div style="width:72px; float:left;background-color:#fff;height:72px; ">
         <img src="./images/logo_dash72.png" height="72px" width="72px"/>
         </div>
         <div style="width:81%;float:left">
        <a 
        style="color:#fff;
        background-color:#38482c;
        font-size: 15px;
        font-weight: 500;
        padding-left:25px;
        text-align:left;
        height:50px;
        padding-top:22px;
        //padding: 16px 0;
        //border-radius:10px;
        display: block; href="change_password.php"><b> Change Password</b></div>
        </a>
        </div></td>';
      }
      else
      {
         echo '  <td style="display: inline-block;
         width:383px;
         text-align: center;
         padding: 0px /*0*/15px 15px 0px;" >
         <div style="width:72px; float:left;background-color:#fff;height:72px; ">
         <img src="./images/logo_dash72.png" height="72px" width="72px"/>
         </div>
         <div style="width:81%;float:left">
         <a 
         style="color: #8dad2f;
         font-size: 15px;
         font-weight: 500;
         padding-left:25px;
        text-align:left;
        background: #fff;
        height:50px;
        padding-top:22px;
         //padding: 16px 0;
         //border-radius:10px;
         /* width: 180px; */
         display: block;" href="change_password.php"><b> Change Password</b></div>
         </a>
         </div></td>';
      } 
      ?>

   <!-- <td style="display: inline-block;
    width: 19%;
    text-align: center;
    padding: 0px /*0*/15px 15px 0px;" > <a style="color: #8dad2f;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
   background: #fff;
    border-radius:10px;
    padding: 16px 0;
    /* width: 180px; */
    display: block;" href="change_password.php">Change Password</a></td> -->


<?php
    $page_uri =  $_SERVER['REQUEST_URI']; 
    $pages_uri = explode("/",$page_uri);
   $page_name = $pages_uri[1];
     if( $page_name == "logout.php" )
     { 
        echo '
        <td style="display: inline-block;
        width:384px;
        text-align: center;
        padding: 0px /*0*/15px 15px 0px;" >
        <div style="width:72px; float:left;background-color:#fff;height:72px; ">
         <img src="./images/logo_dash72.png" height="72px" width="72px"/>
         </div>
         <div style="width:81%;float:left">
        <a 
        style="color:#fff;
        background-color:#38482c;
        font-size: 15px;
        padding-left:25px;
        text-align:left;
        font-weight: 500;
        height:50px;
        padding-top:22px;
      //  padding: 16px 0;
       // border-radius:10px;
        display: block; href="logout.php"><b> Logout</b></div>
        </a>
        </div></td>';
      }
      else
      {
         echo '  <td style="display: inline-block;
         width:384px;
         text-align: center;
         padding: 0px /*0*/15px 15px 0px;" >
         <div style="width:72px; float:left;background-color:#fff;height:72px; ">
         <img src="./images/logo_dash72.png" height="72px" width="72px"/>
         </div>
         <div style="width:81%;float:left">
         <a 
         style="color: #8dad2f;
         font-size: 15px;
         font-weight: 500;
        background: #fff;
        padding-left:25px;
        text-align:left;
        height:50px;
padding-top:22px;
        // padding: 16px 0;
        // border-radius:10px;
         /* width: 180px; */
         display: block;" href="logout.php"><b> Logout</b></div>
         </a>
         </div></td>';
      } 
      ?>

    <!-- <td style="display: inline-block;
    width: 19%;
    text-align: center;
    padding: 0px /*0*/15px 15px 0px;" > <a style="color: #8dad2f;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
   background: #fff;
    border-radius:10px;
    padding: 16px 0;
    /* width: 180px; */
    display: block;" href="logout.php">Logout</a></td> -->
   </tr>

 <!-- <td><a href="tellafriend.php"  <?php //if( $page_name == "tellafriend.php" ){       echo $hover_style2; } ?>    >Tell a Friend</a></td> -->