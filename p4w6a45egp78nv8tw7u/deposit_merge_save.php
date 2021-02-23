<?php 

session_start();
error_reporting(0);

$dbhost='localhost';
$dbname='greenyellows2020_hyip';
$dbuser= 'greenyellows2020'; # 'atqcoin_sam';
$dbpass= '@[HAfc49]PBQ';  #'RibrIl.G.g!E' ;
$conn = mysql_connect('localhost' , 'root' , '') or die(mysql_error());
 $db_sel = mysql_select_db('goldcoin' , $conn) or die(mysql_error());

//  $conn = mysql_connect('78.128.43.129' , 'atkinsonsbullion_hyip' , 'atkinsonsbullion@2020#clorin') or die(mysql_error());
//  $db_sel = mysql_select_db('atkinsonsbullion_hyip' , $conn) or die(mysql_error());


 $user_id = $_POST['user_id'];
$ids = $_POST['deposit_ids'];
echo "<br/>";
//echo ($ids);
echo "<br/>";
$response_list = explode(",", $ids);

$total_amount = 0;
foreach($response_list as $k=>$di)  {
    $id_parsing = explode("_", $di);
    $deposit_id = $id_parsing[0];
    $deposit_amount = $id_parsing[1];
    $total_amount += $deposit_amount;
    
    if(!empty($deposit_id)) {
      $remove_deposit = "delete from deposit where deposit_id=$deposit_id and member_id=$user_id";
      echo $remove_deposit;
      mysql_query($remove_deposit);
    }
    //echo $k.' => '.$di."<br/>";
}
$date = date('Y-m-d');
if(!empty($user_id) && !empty($total_amount)) {
    
    echo "select * from plan where $total_amount >= spend_min_amount and $total_amount <= spend_max_amount";
    echo "<br/>";
    $plan_det = mysql_query("select * from plan where $total_amount >= spend_min_amount and $total_amount <= spend_max_amount");
    
    if(mysql_num_rows($plan_det) > 0 ) {
        $plan = mysql_fetch_array($plan_det);
        $w = '4k0tUGJGJHJFHSoy04w2GTirKsajQD5KGy9'. mt_rand(1,99999);
        $plan_id = $plan['plan_id'];
        $mature_date = date('Y-m-d', strtotime($date. ' +'. $plan['period'] .' days'));
echo        $dep = "INSERT INTO `deposit` (  `member_id`, `plan_id`, `order_no`, `user_wallet`, `wallet`, `hash_code`, `amount`, `compound_amount`, `invest_date`, `maturity_date`, `status`, `intrest_alloted`, `payment_thro`, `intrest_earned`, `intrest_earned_date`, `compound_rate`, `transaction_id`, `cron_date`) 
        VALUES ( $user_id , $plan_id, '".$w."', 'FHJGJGSLJFSrKWtc9IIyNg1pYuOvpOfej0v6dfeiufnkdsj', '".$w."', NULL, '".$total_amount."', '".$total_amount."', '".$date."', '$mature_date', 'active', 'no', '38', NULL, NULL, NULL, '4k0tUGJGJHJFHSoy04w2GTirKsajQD5KGy9', now());";
       
        mysql_query($dep);
        echo 1;
        //echo "<br/>". $user_id." => ". $total_amount;
    }else{
        echo 0;
        //echo "no plan";
    }
}

?>


