<?php
$file = __FILE__;
echo "<br  />" ."db_include  " . __LINE__ ;
if ($file = "/var/www/html/jimfuqua/tutorW/classes/db_include.php") {
echo "<br  />" . __LINE__ ;
  $database = 'jlfEDU';
  //$host = "localhost";
  $host = "127.0.0.1";
  $dbUser = 'root';
  $dbPassword = 'Pasword333';
  //$dbDSN = "mysql:host=localhost;dbname=jlfEDU;";
  $dbDSN = "mysql:host=127.0.0.1;dbname=jlfEDU;";
} else {
  echo "<br  />" . __LINE__ ;
  $host = "mysql:host=mysql507.ixwebhosting.com";
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
