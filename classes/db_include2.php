<?php
$file = __FILE__;
$file2 = substr($file,1,7);
//echo $file."<br />";
//echo $file2;
///var/www/html/jimfuqua/tutorW/classes/db_include2.php

if ($file2 === "hsphere") {
  $host = "mysql:host=mysql507.ixwebhosting.com";
  $db_user = 'JimFuqu_jim';
  $db_password = 'Carbon3';
  $db_dsn = "mysql:host=mysql507.ixwebhosting.com;dbname=JimFuqu_jlfEDU;";
} elseif ($file === "/var/www/html/jimfuqua/tutorW/classes/db_include2.php") {
  //echo __LINE__ . "<br />";
  $database = 'jlfEDU';
  //$host = "localhost";
  $host = "127.0.0.1";
  $db_user = 'root';
  $db_password = 'Pasword333';
  $db_dsn = "mysql:host=127.0.0.1;dbname=jlfEDU";
}
//echo $host;
/*
User: JimFuqu_jim@127.0.0.1
JimFuqu_jlfEDU
mysql507.ixwebhosting.com (98.130.0.88)
Host Name	mysql507.ixwebhosting.com (98.130.0.88)
Port number	3306
Current user	JimFuqu_jim
PW Carbon3
 */
