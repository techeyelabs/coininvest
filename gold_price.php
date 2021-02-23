<?php 
    $json = file_get_contents('https://data-asg.goldprice.org/dbXRates/USD,GBP');
    echo('<pre>');
    print_r(json_decode($json));
?>