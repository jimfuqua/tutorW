<?php
session_start();
use tutor\classes;
require_once "../classes/CompletedClass.inc";
/**
 * update_tCompleted.php.
 *
 * PHP versions 5
 *
 * @category  Manipulates_Db
 * @package   Tutor
 * @author    Jim Fuqua <jimfuqua@gmail.com>
 * @copyright 2011 Jim Fuqua
 *
 *
 *   This program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * @license   GPL v 3
 * @version   SVN: <svn_id>
 * @link      http://wwww.jim-fuqua.com
 */

/**
 *  Take data from an array and use data and tCompleted.class to update db.
 *  This class manipulates the tGenericAssignments table in MySQL.
 *
 *ToDo:
 *  1.   Add docbook type comments to each function and internal comments in
 *  each function.

    See SimpleTest 'GenericA_class_simpletest.php' in 'test' folder
    for more documentation.

    */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$session_id=session_id();

$log_file = fopen("/var/www/jimfuqua/tutor/logs/update_tCompleted.txt", "w");
$string   = "\n".__LINE__." update_tCompleted.php"."\n";
fwrite($log_file, $string);

$v = var_export($_SESSION, true);
fwrite($log_file, __LINE__.' $_SESSION = ' . $v . "   \n");
fwrite($log_file, $string);

$v = var_export($_POST, true);
$string   = "\n".__LINE__.' $_POST = '.$v."\n";
fwrite($log_file, $string);

if (!isset($_SESSION["tA_S_ID"])) {
    // Trigger fatal error.
    trigger_error(
        "Session must have a tA_S_ID to record data to database.",
        E_USER_ERROR
    );
} else {
    $student_id = $_SESSION["tA_S_ID"];
}

if (isset($_SESSION["tA_StudentName"])) {
   $tA_StudentName = $_SESSION["tA_StudentName"];
}

if (!isset($_SESSION["tG_AssignmentName"])) {
    // Trigger fatal error.
    $msg  = "Session must have a tG_AssignmentName ";
    $msg .= "to record data to database.";
    trigger_error($msg, E_USER_ERROR);
} else {
    $tC_gA = $_SESSION["tG_AssignmentName"];
}

if (!isset($_SESSION["tA_StartRec"])) {
    // Trigger fatal error.
    $msg = "Session must have a tA_StartRec to record data to database.";
    trigger_error($msg, E_USER_ERROR);
} else {
    $tA_StartRec = $_SESSION["tA_StartRec"];
}

if (!isset($_POST['tC_ClientTimeStarted'])) {
    // Trigger fatal error.
    $msg = "Session must have a tC_ClientTimeStarted to record data to database.";
    trigger_error($msg, E_USER_ERROR);
} else {
    $tC_ClientTimeStarted = $_POST['tC_ClientTimeStarted'];
}

if (!isset($_POST['tC_Correct'])) {
    // Trigger fatal error.
    trigger_error(
        "Session must have a tC_Correct to record data to database.",
        E_USER_ERROR
    );
} else {
    $tC_Correct = $_POST['tC_Correct'];
}

$classInstance = new tutor\src\CompletedClass;

$incoming_data = array( //get incoming data into an array for tCompleted
// Data from session variables.
    "tC_Session" => session_id(),
    "tC_ServerTimeStarted" => $_SESSION["tC_ServerTimeStarted"],
    "tA_StudentName" => $_SESSION['tA_StudentName'],
    "tA_S_ID" => $_SESSION['tA_S_ID'],
    "tC_gA" => $_SESSION['tG_AssignmentName'],
    "tC_tGStartRec" => $_SESSION['tA_StartRec'],
// Data from post variables
    "tC_ClientTimeStarted" => $_POST['tC_ClientTimeStarted'],
    "tC_Time_client_processed_answer" => $_POST["tC_Time_client_processed_answer"],
    "tC_Correct" => $_POST['tC_Correct'],
    "tC_Question_and_Response" => $_POST["tC_Question_and_Response"],
    "tC_More_data_about_response" => $_POST["tC_More_data_about_response"]
);
$y        = $classInstance->recordData($incoming_data);  // to tCompleted using the class method.
?>
