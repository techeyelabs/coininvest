<?php
// $timezone  = 0; 
// echo gmdate("Y/m/j H:i:s", time() + 3600*($timezone+0));
// echo'<br>';
// echo(date("I"));
// echo'<br>';

date_default_timezone_set('UTC');
echo date('m/d/Y g:i:s A');
echo('<br>');
echo date('H:i:s');
// echo date('m/d/Y g:i:s A', strtotime("$offset hours"));

// echo date('m/d/Y g:i:s A', time() + ($offset * 60 * 60));

// $date = new DateTime;
// $date->modify("$offset hours");
// echo $date->format('m/d/Y g:i:s A');

// date_default_timezone_set('Europe/London');
// echo date('m/d/Y g:i:s A');
?>