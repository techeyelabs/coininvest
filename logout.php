<?php	error_reporting(0);

?>

<!--<div style="margin-left:500px; margin-top:200px"><img src="images/ajax-loader.gif" /></div>-->

<?php

	session_start();

	session_destroy();

	echo '<meta http-equiv="refresh" content="0;url=index.php">';

?>