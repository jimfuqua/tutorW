<?php
echo json_encode(array("name"=>"John","time"=>"2pm"));
$logFile = fopen('/var/www/html/jimfuqua/tutor/logs/test_php.log', 'w');
$v = var_export($_POST, true);
$string  = __LINE__.'  $_POST = '.$v."\n\n";
fwrite($logFile, $string);


// http://localhost/jimfuqua/tutor/lessons/clockwise_counterclockwise/jimfuqua/tutor/src/scripts/test.php
// URL /jimfuqua/tutor/lessons/clockwise_counterclockwise/jimfuqua/tutor/src/scripts/test.php was not found on this server.

// http://localhost/jimfuqua/tutor/src/scripts/test.php works
