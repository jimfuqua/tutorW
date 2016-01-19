<?php
session_start();
$_SESSION["tA_StudentName"] = "Tim Test";
$_SESSION['student_name']  = "Tim Test";
$_SESSION["tA_S_ID"] = "TestID";
$_SESSION["tG_AssignmentName"] = 'LeftRight';
$_SESSION["tA_StartRec"] = 1;
$_SESSION["tG_Immediate_Loops"] = 1;
$_SESSION["ServerTimeStarted"] = time();
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
 include('LeftRightFace.php');
?>