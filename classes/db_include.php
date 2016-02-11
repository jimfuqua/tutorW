<?php
$file = __FILE__;
if ($file = "/var/www/html/jimfuqua/tutorW/classes/db_include.php") {
  $database = 'jlfEDU';
  //$host = "localhost";
  $host = "127.0.0.1";
  $dbUser = 'root';
  $dbPassword = 'Pasword333';
  //$dbPassword = 'bAqfTsMnPr4ZatSP';
  //PDO
  //'mysql:host=localhost;dbname=test'

  $dbDSN = "mysql:host=localhost;dbname=jlfEDU;";
  $dbDSN = "mysql:host=127.0.0.1;dbname=jlfEDU;";
} else {
  $dbUser = 'JimFuqu_jim';
  $dbPassword = 'Carbon3';
  $dbDSN = "mysql:host=mysql507.ixwebhosting.com;dbname=JimFuqu_jlfEDU;";
}
/*
User: JimFuqu_jim@127.0.0.1
JimFuqu_jlfEDU
mysql507.ixwebhosting.com (98.130.0.88)
Host Name	mysql507.ixwebhosting.com (98.130.0.88)
Port number	3306
Current user	JimFuqu_jim
PW Carbon3
 */
