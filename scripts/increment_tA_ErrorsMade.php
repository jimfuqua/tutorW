<?php
session_start();
// Test for essential session variables and trigger an error if they do not exist.
$session_id=session_id();
$str = __LINE__ . " tA_set RepsTowardM_to_zero.php Must be in a session to record data to database ";
if (!isset($session_id)) {  // Trigger fatal error.
    trigger_error("$str", E_USER_ERROR);
}

$str = __LINE__ . " increment_tA_ErrorsMade.php Session must have a tA_S_ID to record data to database.";
if (!isset($_SESSION["tA_S_ID"])){  // Trigger fatal error.
    trigger_error("Session must have a tA_S_ID to record data to database.", E_USER_ERROR);
}

$str = __LINE__ . " increment_tA_ErrorsMade.php Session must have a tG_AssignmentName to record data to database.";
if (!isset($_SESSION["tG_AssignmentName"])){  // Trigger fatal error.
    trigger_error("$str", E_USER_ERROR);
}
$str = __LINE__ . "  increment_tA_ErrorsMade.php Session must have a lesson_id to record data to database.";
if (!isset($_SESSION["lesson_id"])){  // Trigger fatal error.
    trigger_error("$str", E_USER_ERROR);
}

//$log_file = fopen("/var/www/tutor/tA_set RepsTowardM_to_zero.php", "a");
//$string="\ntA_set RepsTowardM_to_zero.php"."\n";
//fwrite  ( $log_file, $string);

require( "../classes/Assignment.class.php");

 // Here we start to update the assignment.
$a = new AssignmentsClass;  // Here we start to update the assignment.
$y = $a->increment_tA_ErrorsMade(
        $_SESSION['tA_S_ID'] ,
        $_SESSION["tA_AssignmentsName"],
        $_SESSION["lesson_id"]
        );
?>
