<?php
session_start();
unset($_SESSION);
session_start();
use tutor\classes;
$_SESSION["tA_S_ID"] = 'Test Student';
$_SESSION["tA_id"] = '345';
require_once('./scripts/cAssignment_get_next_lesson.php');
//require_once('../classes/Assignmentsclass.php');
//$logFile = fopen("/var/www/tutor/cAssignment_get_next_lessonTest_log.txt", "w"); // File handle used for debugging messages.
//$string = "cAssignment_get_next_lessonTest.class.php";
//fwrite($logFile, $string . "\n");



class test extends PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        $GLOBALS['$_SESSION'] = Array();
        $this->_SESSION['tG_AssignmentName'] = "gA_clockwise_counterclockwise";
        $_GET['student_id'] ='qqq4q3q';
    }

}
