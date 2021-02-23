<?php


$url = 'https://api.neteller.com/netdirect';
//<!--test -https://test.api.neteller.com/netdirect   live- https://api.neteller.com/netdirect -->
//get the vars from POST request and set an array with all the required vars
$fields = array(
    'version' => $_POST['version'],
    'amount' => urlencode($_POST['amount']),
    'currency' => $_POST['currency'],
    'net_account' => urlencode($_POST['net_account']),
    'secure_id' => urlencode($_POST['secure_id']),
    'merchant_id' => urlencode($_POST['merchant_id']),
    'merch_key' => urlencode($_POST['merch_key']),
    'merch_transid' => urlencode($_POST['merch_transid']),
    'language_code' => $_POST['language_code'],
    'merch_name' => urlencode($_POST['merch_name']),
    'merch_account' => urlencode($_POST['merch_account']),
    'custom_1' => urlencode($_POST['custom_1']),
    'button' => 'Make Transfer'
);

//open curl connection
$ch = curl_init($url);

//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

//execute post
$output = curl_exec($ch);

$info = curl_getinfo($ch);
$error = '';
$approval = '';
$det = simplexml_load_string($output);

//print_r($det);exit;
//check if curl request processed or not
if(($output == false) or ($output == '') or($det->approval =='no'))
{
    $curlerror = curl_error($ch); 
    $error = $det->error_message;
	echo '<meta http-equiv="refresh" content="0;url=../failure.php">';
	 exit();
}
else
{
    $response = simplexml_load_string($output); 
	
    $approval = $response->approval;
	
	$_SESSION['send']='<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">x</button><strong>Success! </strong>
						Successfully Deposited.</div>';
	
	 echo '<meta http-equiv="refresh" content="0;url=../success.php">';
	 exit();
}
//close curl connection
curl_close($ch);

?>