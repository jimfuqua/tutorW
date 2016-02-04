<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$logFile = fopen("/var/www/tested_script.php.log", "w");

$v = var_export($_SESSION, TRUE);
$string = __LINE__ . ' $_SESSION = ' . $v . "\n\n";
fwrite($logFile, $string);

$v = var_export($_POST, TRUE);
$string = __LINE__ . ' $_POST = ' . $v . "\n\n";
fwrite($logFile, $string);

?>
