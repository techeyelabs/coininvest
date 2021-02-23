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

$filename = backup_tables($dbhost,$dbuser,$dbpass,$dbname);

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


$data = chunk_split(base64_encode($data)); 



	$select_mail = mysql_fetch_array(mysql_query("select * from admin_settings where set_id='3'"));

    $to = $select_mail['set_value']; 
    $from = $email_from;
    $subject = $subject; 
	
	
	/*echo 'To '.$to; echo '<br>';
	
	echo 'From '.$from; echo '<br>';
	
	echo 'Subject '.$subject; echo '<br>';*/
	
	

    //define the subject of the email 
    $separator = md5(time());

    // carriage return type (we use a PHP end of line constant)
    $eol = PHP_EOL;

    // attachment name
    $filename = 'backup.sql';

    $attachment = $data;

    // main header
    $headers  = "From: ".$from.$eol;
    $headers .= "MIME-Version: 1.0".$eol; 
    $headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

    $body = "--".$separator.$eol;
    $body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
    $body .= $email_message.$eol;

    // message
    $body .= "--".$separator.$eol;
    $body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
    $body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
    $body .= $message.$eol;

    // attachment
    $body .= "--".$separator.$eol;
    $body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
    $body .= "Content-Transfer-Encoding: base64".$eol;
    $body .= "Content-Disposition: attachment".$eol.$eol;
    $body .= $attachment.$eol;
    $body .= "--".$separator."--";

    // send message
	
	mail('farith@arminfotech.com', $subject, $body, $headers);
	
    if (mail($to, $subject, $body, $headers)) {
        echo "email sent";
    } else {
        echo "error sending email";
    }


		$_SESSION['succ_dir']="<font color='#004000'><b>Mail Send Successfully</b></font>";
		echo '<meta http-equiv="refresh" content="0;url=db_back.php">';
		exit();

 
?>