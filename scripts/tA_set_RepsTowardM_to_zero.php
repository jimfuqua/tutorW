<?php
session_start();
// Test for essential session variables and trigger an error if they do not exist.
$session_id=session_id();
$str = "tA_set RepsTowardM_to_zero.php line 7. Must be in a session to record data to database ";
if (!isset($session_id)) {  // Trigger fatal error.
    trigger_error("$str", E_USER_ERROR);
}

$str = "tA_set RepsTowardM_to_zero.php line 12. Session must have a tA_S_ID to record data to database.";
if (!isset($_SESSION["tA_S_ID"])){  // Trigger fatal error.
    trigger_error("Session must have a tA_S_ID to record data to database.", E_USER_ERROR);
}

$str = "tA_set RepsTowardM_to_zero.php line 17.  Session must have a tG_AssignmentName to record data to database.";
if (!isset($_SESSION["tG_AssignmentName"])){  // Trigger fatal error.
    trigger_error("$str", E_USER_ERROR);
}

$str = "tA_set RepsTowardM_to_zero.php line 22.  Session must have a tA_StartRec to record data to database.";
if (!isset($_SESSION["tA_StartRec"])){  // Trigger fatal error.
    trigger_error("$str", E_USER_ERROR);
}

//$log_file = fopen("/var/www/tutor/tA_set RepsTowardM_to_zero.php", "a");
//$string="\ntA_set RepsTowardM_to_zero.php"."\n";
//fwrite  ( $log_file, $string);

require( "../classes/Assignment.class.php");

 // Here we start to update the assignment.
$a = new AssignmentsClass;  // Here we start to update the assignment.
$y = $a->set_RepsTowardM_to_zero(
        $_SESSION['tA_S_ID'] ,
        $_SESSION["tA_AssignmentsName"],
        $_SESSION["tA_id"]
        );
?>
