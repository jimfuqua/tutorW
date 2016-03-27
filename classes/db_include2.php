<?php
//$file = '../logs/db_include2.log';
//$log_file = fopen($file, 'w');
$file = __FILE__;
$file2 = substr($file,1,7);
//$string  = __LINE__ . '  $file = ' . $file . "\n\n";
//fwrite($log_file, $string);
//$string  = __LINE__ . '  $file2 = ' . $file2 . "\n\n";
//fwrite($log_file, $string);

if ($file2 === "hsphere") {
  $host = "mysql:host=mysql507.ixwebhosting.com";
  $db_user = 'JimFuqu_jim';
  $db_password = 'Carbon3';
  $db_dsn = "mysql:host=mysql507.ixwebhosting.com;dbname=JimFuqu_jlfEDU;charset=utf8mb4;";
} elseif ($file === "/var/www/html/jimfuqua/tutorW/classes/db_include2.php") {
  $database = 'jlfEDU';
  //$host = "localhost"; // This did not work.
  $host = "127.0.0.1";
  $db_user = 'root';
  $db_password = 'pasword';
  $db_dsn = "mysql:host=127.0.0.1;dbname=jlfEDU;charset=utf8mb4";
}
