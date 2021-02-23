<?php
error_reporting(0);  
//date_default_timezone_set("Europe/London");
//  date_default_timezone_set("Europe/London");
 date_default_timezone_set('Etc/GMT');
require 'include/db.php';
$conn=mysql_connect($dbhost,$dbuser,$dbpass);
if(!$conn) {
echo '<meta http-equiv="refresh" content="0; url=../install/install.php" />';
	//echo "<h1>Unable to Establish Connection to the Server</h1><hr noshade size=2 color=#000000>";
	exit();}
$db_sel=mysql_select_db($dbname,$conn);
if(!$db_sel) {
 
echo "<h1>Unable to Connect to the Database</h1><hr noshade size=2 color=#000000>";
exit();
}
?>
