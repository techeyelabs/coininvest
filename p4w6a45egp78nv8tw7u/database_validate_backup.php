<?PHP session_start();
	//error_reporting(0);
	require 'include/connect.php';
	
	$subject=$_POST['txtsub'];
	$member=$_POST['txtmmember'];
	$mailmessage=$_POST['txtcontent'];



/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{
  
  $link = mysql_connect($host,$user,$pass);
  mysql_select_db($name,$link);
  
  //get all of the tables
  if($tables == '*')
  {
    $tables = array();
    $result = mysql_query('SHOW TABLES');
    while($row = mysql_fetch_row($result))
    {
      $tables[] = $row[0];
    }
  }
  else
  {
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }
  
  //cycle through
  foreach($tables as $table)
  {
    $result = mysql_query('SELECT * FROM '.$table);
    $num_fields = mysql_num_fields($result);
    
    $return.= 'Drop table if exists  '.$table.';';
    $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
    $return.= "\n\n".$row2[1].";\n\n";
    
    for ($i = 0; $i < $num_fields; $i++) 
    {
      while($row = mysql_fetch_row($result))
      {
        $return.= 'INSERT INTO '.$table.' VALUES(';
        for($j=0; $j<$num_fields; $j++) 
        {
          $row[$j] = addslashes($row[$j]);
          $row[$j] = ereg_replace("\n","\\n",$row[$j]);
          if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
          if ($j<($num_fields-1)) { $return.= ','; }
        }
        $return.= ");\n";
      }
    }
    $return.="\n\n\n";
  }
  
  //save file
 $filename='dbbackup/db-backup-'.time().'.sql'; 
	 $handle = fopen($filename,'w+');
  fwrite($handle,$return);
  fclose($handle);
  
  return $filename;
}
//echo $dbhost.','.$dbuser.','.$dbpass.','.$dbname;exit;

 $filename=backup_tables($dbhost,$dbuser,$dbpass,$dbname);
?>

 
	
	
	
	
	<?php
$fileatt = $filename; // Path to the file
$fileatt_type = "application/octet-stream"; // File Type
$fileatt_name = "db.sql"; // Filename that will be used for the file as the attachment

$email_from = "Admin"; // Who the email is from
$email_subject = $_POST['txtsub']; // The Subject of the email
$email_message = $_POST['txtcontent'];

 
$email_take=mysql_fetch_array(mysql_query("select * from admin_settings where set_id =1"));
//$email_to = $email_take['db_mail']; // Who the email is to

 

$email_to = $email_take['admin_mail'];

$headers = "From: ".$email_from;


$file = fopen($fileatt,'rb');
$data = fread($file,filesize($fileatt));
fclose($file);

$select_mail = mysql_fetch_array(mysql_query("select * from admin_settings where set_id='3'"));

$headers = 'From: '.$select_mail['set_value']. "\r\n";


$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

$headers .= "\nMIME-Version: 1.0\n" .
"Content-Type: multipart/mixed;\n" .
" boundary=\"{$mime_boundary}\"";



$email_message .= "This is a multi-part message in MIME format.\n\n" .
"--{$mime_boundary}\n" .
"Content-Type:text/html; charset=\"iso-8859-1\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" .
$email_message .= "\n\n";

$data = chunk_split(base64_encode($data)); 

$email_message .= "--{$mime_boundary}\n" .
"Content-Type: {$fileatt_type};\n" .
" name=\"{$fileatt_name}\"\n" .
//"Content-Disposition: attachment;\n" .
//" filename=\"{$fileatt_name}\"\n" .
"Content-Transfer-Encoding: base64\n\n" .
$data .= "\n\n" .
"--{$mime_boundary}--\n";
 

$ok = @mail($select_mail['set_value'], $email_subject, $email_message, $headers);

$_SESSION['succ_dir']="<font color='#004000'><b>Mail Send Successfully</b></font>";
		echo '<meta http-equiv="refresh" content="0;url=db_back.php">';
		exit();

 
?>