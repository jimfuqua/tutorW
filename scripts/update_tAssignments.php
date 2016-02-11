<?php
/**
 * @file
 * Accepts an AJAX call from JavaScript and updates tAssignments.
 */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
use tutor\classes;
$logFile = fopen("/var/www/jimfuqua/tutor/logs/update_tAssignments.php.log", "w");
$v = var_export($_POST, true);
$string = __LINE__.' $_POST = '.$v."\n\n";
fwrite($logFile, $string);
$v = var_export($_SESSION, true);
$string = __LINE__.' $_SESSION = '.$v."\n\n";
fwrite($logFile, $string);

if (isset($_SESSION['tA_S_ID']) === FALSE) {
  $string = "\n" . __LINE__ . ' ERROR NO tA_S_ID in $_SESSION) array . ' . "\n";
  trigger_error($string, E_USER_ERROR);
}

if (isset($_SESSION['tA_id']) === FALSE) {
  $string = "\n" . __LINE__ . ' ERROR NO tA_id in a $_SESSION array . ' . "\n";
  trigger_error($string, E_USER_ERROR);
}

//if (file_exists($_POST['sender']) === FALSE) {
//  $string = "\n" . __LINE__ . ' ERROR NO file exits with the name $_POST["sender"] .  update_tAssignments . php' . "\n";
//  trigger_error($string, E_USER_ERROR);
//}

$value_array = [];
$where_array = [];
$where_array = array(
  'tA_S_ID' => $_SESSION['tA_S_ID'],
  'tA_id'   => $_SESSION['tA_id']
);
if (isset($_POST['tA_RepsTowardM']) === TRUE) {
  if ($_POST['tA_RepsTowardM'] === 'Plus1') {
    $value_array['tA_RepsTowardM'] = 'tA_RepsTowardM + 1';
  }
  else {
    $value_array['tA_RepsTowardM'] = 0;
  }
}

if (isset($_POST['tA_ErrorsMade']) === 'Plus1') {
  $value_array['tA_ErrorsMade'] = 'tA_ErrorsMade + 1';
}

if (isset($_POST['tA_LocalDateTime']) === TRUE) {
  $value_array['tA_LocalDateTime'] = $_POST['tA_LocalDateTime'];
}

$value_array['tA_Post_date'] = time() + 20;  // Add seconds to now.

$sender = $_POST['sender'];
// Sender is not a field in tA and should not be in the query.
// Sender is a good source of info to detect tampering with input data.;

$v = var_export($value_array, true);
$string = __LINE__.' $value_array = '."$v\n\n";
fwrite($logFile, $string);
$v = var_export($where_array, true);
$string = __LINE__.' $where_array = '."$v\n\n";
fwrite($logFile, $string);
$result = $classInstance = new tutor\src\classes\AssignmentsClass();

$result = $classInstance->updateFields($value_array, $where_array);
$v = var_export($result, true);
$string = __LINE__.' $result = '."$v\n\n";
fwrite($logFile, $string);
return $result;
