<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use tutorW\classes;

$var_array = [];
// in left_right_blocks.  Must go up to lessons then up to tutorW
// before going down to logs.
$logFile=fopen("../../logs/test_lesson_include.php.log",
"w");

// Create array of necessary variables.
date_default_timezone_set('UTC');
//date.timezone("America/Chicago");
$current_time = time();

fwrite($logFile, __LINE__ .  ' $current_time = ' . $current_time . "\n");
$microtime = microtime();
fwrite($logFile, __LINE__ .  ' $microtime = ' . $microtime . "\n");
$date_mt = date("Y-m-d H:i:s:u", time());
fwrite($logFile, __LINE__ . ' $date_mt = ' . $date_mt . "\n");
 $t = microtime($get_as_float = true);
 fwrite($logFile, __LINE__ . ' microtime ($get_as_float = true) = ' . $t . "\n");
 $tt = round($t, 3, PHP_ROUND_HALF_EVEN);
 fwrite($logFile, __LINE__ . ' $tt = ' . $tt . "\n");

$var_array['tA_id'] = '';
$var_array['tA_S_ID']                 = 'Abcdxyz';
$var_array['tA_StudentName']          = 'Tim T. Test';
//$var_array['tG_AssignmentName']       = 'gA_clockwise_counterclockwise';
$var_array['tA_Parameter']            = 'none';
$var_array['tA_Immediate_Loops']      = '2';
$var_array['tA_StartRec']             = '1';
$var_array['tA_StopRec']              = '3';
$var_array['tG_Reps_to_master']       = '30';
$var_array['tG_Errors_Allowed']       = '3';
$var_array['tA_RepsTowardM']          = '3';
$var_array['tA_ErrorsMade']           = '4';
$var_array['tA_PercentTime']          = '55';
$var_array['tA_SumPercent']           = '66';
$var_array['tA_QueOrder']             = '7';
$var_array['tA_SavedAssignment']      = 'Test 2';
$var_array['tA_SavedStartRec']        = '8';
$var_array['tA_PostDateIncrement']    = '0';
$var_array['tA_Post_date']            = time() + $var_array['tA_PostDateIncrement'];
$var_array['tA_iterations_to_do']     = '9';
$var_array['tA_OriginalTimestamp']    = $current_time;
$var_array['tA_LastModifiedDateTime'] = '';
$var_array['tA_LocalDateTime']        = date("Y-m-d H:i:s", time());
if (count($var_array) !== 22) {
    trigger_error('Wrong number of variables.', E_USER_ERROR);
}
 fwrite($logFile, __LINE__ .  ' $var_array["tA_Post_date"]    = ' . $var_array['tA_Post_date']   . "\n");
 $v = $v = var_export($var_array, true);
 fwrite($logFile, __LINE__ .  ' $var_array    = ' . $v   . "\n");

// Create a new user and prime tA with six lessons.
// Prime global session variable in next statements.
date_default_timezone_set('America/Chicago');

$tC_ServerTimeStarted = round(microtime(true), 3, PHP_ROUND_HALF_EVEN);
$_SESSION['tA_StudentName']       = $var_array['tA_StudentName'];
$_SESSION['tA_S_ID']              = $var_array['tA_S_ID'];
$_SESSION['session_id']           = session_id();
// $_SESSION['tG_AssignmentName']    = $var_array['tG_AssignmentName'];
$_SESSION['tC_ServerTimeStarted'] = $tC_ServerTimeStarted;
$_SESSION['tA_StartRec']          = $var_array['tA_StartRec'];
$_SESSION['tA_StopRec']           = $var_array['tA_StopRec'];
$_SESSION['tA_RepsTowardM']       = $var_array['tA_RepsTowardM'];
$_SESSION['tG_Reps_to_master']    = $var_array['tG_Reps_to_master'];
$_SESSION['tA_PercentTime']       = $var_array['tA_PercentTime'];
$_SESSION['tA_LocalDateTime']     = $var_array['tA_LocalDateTime'];
// End priming of global session variable.

$lesson_list_array = array(
  '1' => 'gA_left_right_blocks',
  '2' => 'gA_clockwise_counterclockwise',
  '3' => 'gA_typing_lessons_cl',
  '4' => 'gA_spelling',
  '5' => 'gA_horizontal_vertical_diagonal',
  '6' => 'gA_one_digit_addition_vertical_clues'
);

// in left_right_blocks.  Must go up to lessons then up to tutorW
// before going down to src.

/*

$class_instance = new tutor\src\classes\AssignmentsClass;
// Cleanup previous insertions.
$result = $class_instance->delRowsByStudentId($var_array['tA_S_ID']);

foreach ($lesson_list_array as $key => $value) {
    $_SESSION['tG_AssignmentName'] = $value;
    $_SESSION['tA_PostDateIncrement'] = 0;
    $_SESSION['tA_Post_date'] = round(microtime(true), 3, PHP_ROUND_HALF_EVEN) +
        $var_array['tA_PostDateIncrement'];
    $result = $class_instance->insertRecord($_SESSION);
}
*/
