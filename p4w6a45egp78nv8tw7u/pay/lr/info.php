<?

phpinfo();

$val = "asdf";
$authString = $val.":2323:1212";
$sha256 = bin2hex(mhash(MHASH_SHA256, $authString));

echo $sha256;

?>