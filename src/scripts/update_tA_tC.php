<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/**
 * @file
 * Accepts AJAX call from JavaScript and updates tAssignments and tCompleted.
 *
 * File name: update_tA_tC.php.
 */
/*
use tutor\classes;
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$log_file = fopen("../../logs/update_tA_tC.php.log", "w");
$v = var_export($_SESSION, TRUE);
$string = __LINE__ . ' ($_SESSION = ' . $v . "\n\n";
fwrite($log_file, $string);*/
require_once "../classes/CompletedClass.inc";
require_once '../classes/AssignmentsClass.inc';
echo 19;
$v = var_export($_POST, TRUE);
$string = __LINE__ . ' $_POST = ' . $v . "\n\n";
fwrite($log_file, $string);


$session_id = session_id();

// Check for existence of required data.
if (isset($_POST['tA_id']) === FALSE) {
  $string = "\n" . __LINE__ . ' ERROR NO tA_id in a $_POST array . ' . "\n";
  fwrite($log_file, $string);
}

if (!isset($_POST["tA_S_ID"])) {
  // Serious Error..
  $string = "\n" . __LINE__ . " Session must have a tA_S_ID to record data to database.  Serious Error.";
  fwrite($log_file, $string);
}
else {
  $student_id = $_POST["tA_S_ID"];
}

if (!isset($_POST["tA_StudentName"])) {
  // Serious Error..
  $string = "\n" . __LINE__ . " Session must have a tA_StudentName to record data to database.  Serious Error.";
  fwrite($log_file, $string);
}
else {
  $tA_StudentName = $_POST["tA_StudentName"];
}

if (!isset($_POST["tG_AssignmentName"])) {
  // Serious Error..
  $string = "\n" . __LINE__ . " Session must have a tG_AssignmentName ";
  $string .= "to record data to database.  Serious Error.";
  fwrite($log_file, $string);
}

if (!isset($_POST["tC_tGStartRec"])) {
  // Serious Error..
  $string = "\n" . __LINE__ . ' $_POST must have a tC_tGStartRec to record data to database.';
  fwrite($log_file, $string);
}

if (!isset($_POST['tC_ClientTimeStarted'])) {
  // Serious Error..
  $string = "_POST must have a tC_ClientTimeStarted to record data to database.  Serious Error.";
  fwrite($log_file, $string);
}

if (!isset($_POST['tA_RepsTowardM']) === TRUE) {
  // Serious Error..
  $string = "_POST must have a tA_RepsTowardM to record data to database.  Serious Error.";
  fwrite($log_file, $string);
}
if ($_POST['tA_RepsTowardM'] === 'Plus1') {
  $tA_RepsTowardM = 'tA_RepsTowardM + 1';
}
elseif (gettype($_POST['tA_RepsTowardM']) === 'integer') {
  if ($_POST['tA_RepsTowardM'] === 0) {
    $tA_RepsTowardM = 0;
  }
}
else {
  $string = __LINE__ . '$_POST["tA_RepsTowardM"] = ' .  $_POST["tA_RepsTowardM"] . "\n";
  $string .= " Should be 'Plus1' or an integer";
  fwrite($log_file, $string);
}

// Now set up to post date based on reps.
$v = var_export($_POST, TRUE);
$string = __LINE__ . ' $_POST = ' . $v . "\n\n";
fwrite($log_file, $string);
$tA_RepsTowardM = (int) $tA_RepsTowardM;
$tA_RepsTowardM = $tA_RepsTowardM + 1;
switch ($tA_RepsTowardM) {
  case 1:
        // Add 20 seconds.  Returned value was 0.
        $post_date_time = 20;
    break;

  case 2:
        $post_date_time = 60;
    // One minute.
    break;

  case 3:
        $post_date_time = 450;
    // 7.5 minutes.
    break;

  case 4:
        $post_date_time = 3200;
    // 1 hour.
    break;

  case 5:
        $post_date_time = 24000;
    // 6.6 hours.
    break;

  case 6:
        $post_date_time = 180000;
    // 2.1 days.
    break;

  case 7:
        $post_date_time = 1350000;
    // 16 days.
    break;

  case 8:
        $post_date_time = 10000000;
    // 115 Days.
    break;

  default:
         $post_date_time = 8;
}

if (!isset($_POST['tA_ErrorsMade']) === TRUE) {
  // Serious Error..
  $string = "Session must have a tA_ErrorsMade to record data to database.  Serious Error.";
  fwrite($log_file, $string);
}
else {
  if ($_POST['tA_ErrorsMade'] === 'Plus1') {
    $value_array['tA_ErrorsMade'] = 'tA_ErrorsMade + 1';
  }
  elseif (($_POST['tA_ErrorsMade'] === '0')) {
    // Take no action.
  }
  else {
    // Serious Error..
    $string = "\n" . __LINE__ . " tA_ErrorsMade must be 'Plus1' or '0'.";
    fwrite($log_file, $string);
  }
}

if (isset($_POST['tA_LocalDateTime']) === FALSE) {
  // Serious Error..
  $string = "\n" . __LINE__ . " _POST must have a tA_LocalDateTime to record data to database.  Serious Error.";
  fwrite($log_file, $string);
}
else {
  $value_array['tA_LocalDateTime'] = $_POST['tA_LocalDateTime'];
}

if (isset($_POST['tC_Correct']) === FALSE) {
  // Serious Error..
  $string = "\n" . __LINE__ . " _POST must have a tC_Correct to record data to database.  Serious Error.";
  fwrite($log_file, $string);
}
else {
  $tC_Correct = $_POST['tC_Correct'];
}


/* Essential data for tC from db structure.
tA_S_ID
tA_StudentName
tC_Session
tC_gA
tC_tAStartRec
tC_tAStopRec
tC_CompletedTimestamp
tC_ServerTimeStarted
tC_ClientTimeStarted
tC_Time_client_processed_answer
tC_Correct
tC_Question_and_Response
tC_More_data_about_response
 */
$date = new DateTime();
$tC_CompletedTimestamp = date('Y-m-d H:i:s');
//$string = __LINE__ . ' $tC_CompletedTimestamp = ' . $tC_CompletedTimestamp . "\n\n";
//fwrite($log_file, $string);
$tC_Param_array['tA_S_ID'] = $_POST['tA_S_ID'];
$tC_Param_array['tA_StudentName'] = $_POST['tA_StudentName'];
$tC_Param_array['tC_Session'] = $_POST['session_id'];
$tC_Param_array['tC_gA'] = $_POST["tG_AssignmentName"];
$tC_Param_array['tC_tAStartRec'] = $_POST['tA_StartRec'];
$tC_Param_array['tC_tAStopRec'] = $_POST['tA_StopRec'];
$tC_Param_array['tC_CompletedTimestamp'] = 'NOW( )';
$tC_Param_array['tC_ServerTimeStarted'] = $_POST['tC_ServerTimeStarted'];
$tC_Param_array['tC_ClientTimeStarted'] = $_POST['tC_ClientTimeStarted'];
$tC_Param_array['tC_Time_client_processed_answer'] = $_POST['tC_Time_client_processed_answer'];
$tC_Param_array['tC_Correct'] = $_POST['tC_Correct'];
$tC_Param_array['tC_Question_and_Response'] = $_POST['tC_Question_and_Response'];
$tC_Param_array['tC_More_data_about_response'] = $_POST['tC_More_data_about_response'];


$v = var_export($tC_Param_array, TRUE);
$string = __LINE__ . ' $tC_Param_array = ' . $v . "\n\n";
fwrite($log_file, $string);

// Sender is not a field in tA and should not be in the query.
// Sender is a good source of info to detect tampering with input data.;
// $sender = $_POST['sender'];

$classInstance = new tutor\src\CompletedClass();

// To tCompleted using the class method.
// returns count of rows affected.
$returnedValue = $classInstance->recordData($tC_Param_array);

$string = __LINE__ . ' $returnedValue = ' . $returnedValue . "\n\n";
fwrite($log_file, $string);
$string = __LINE__ . ' gettype($returnedValue) = ' . gettype($returnedValue) . "\n\n";
fwrite($log_file, $string);

if ($returnedValue !== 1) {
  $string = "\n" . __LINE__ . " Serious Error. update_tA_TC.php failed to record data in tCompleted." . "\n";
  // Serious Error.
   fwrite($log_file, $string);
}

// NOW ALTER tAssignments.
unset($where_array);
$where_array = array(
  'tA_S_ID' => $_POST['tA_S_ID'],
  'tA_id'   => $_POST['tA_id'],
);
$v = var_export($where_array, TRUE);
$string = __LINE__ . ' $where_array = ' . "$v\n\n";
fwrite($log_file, $string);

$tA_LastModifiedDateTime = time();
$value_array['tA_Post_date'] = $tA_LastModifiedDateTime + $post_date_time;
$string = "\n" . __LINE__ . '$tA_LastModifiedDateTime = ' . $tA_LastModifiedDateTime;
fwrite($log_file, $string);
$v = var_export($value_array, TRUE);
$string = "\n" . __LINE__ . '$value_array["tA_Post_date"] = ' . $v;
fwrite($log_file, $string);
$value_array["tA_RepsTowardM"] = $tA_RepsTowardM;
// Set at lines 75-85
// $value_array['tA_ErrorsMade'] set at line 145

$value_array['tA_LastModifiedDateTime'] = $tA_LastModifiedDateTime;
$v = var_export($value_array, TRUE);
$string = __LINE__ . ' $value_array = ' . "$v\n\n";
fwrite($log_file, $string);

$classInstance = new tutor\src\classes\AssignmentsClass();
$returnedValue = $classInstance->updateFields($value_array, $where_array);

$string = __LINE__ . ' $returnedValue = ' . $returnedValue . "\n\n";
fwrite($log_file, $string);
$string = __LINE__ . ' gettype($returnedValue) = ' . gettype($returnedValue) . "\n\n";
fwrite($log_file, $string);

// Returns count of rows affected.
if ($returnedValue !== 1) {
  // Serious Error..
  $string = "\n" . __LINE__ . " update_tA_TC.php failed to record data in tAssignments.";
  fwrite($log_file, $string);
}

/**
 * Clone and instert a lesson incremented by one in some lessons.
 *
 * Applies to Spelling or typing or some types of math with many parameters.
 */
function clone_and_increment_lesson() {
  // Not done yet.
}
