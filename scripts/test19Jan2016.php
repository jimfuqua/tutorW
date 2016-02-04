<?php
/**
 * @file
 * Accepts AJAX call from JavaScript and updates tAssignments and tCompleted.
 *
 * File name: update_tA_tC.php.
 */
echo "8"."<br/>";
use tutor\classes;
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$log_file = fopen("../../logs/test19Jan2016.log", "w");
$v = var_export($_SESSION, TRUE);
$string = __LINE__ . ' ($_SESSION = ' . $v . "\n\n";
fwrite($log_file, $string);
echo strval(__FILE__) . "<br/>";
echo __DIR__ ."<br/>";
require_once "../classes/class_test_target.php";
//require_once "../classes/CompletedClass.php";
//require_once '/var/www/html/jimfuqua/tutor/src/classes/AssignmentsClass.inc';
echo 20;
