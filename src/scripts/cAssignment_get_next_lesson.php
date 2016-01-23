<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/**
 * @file
 * Gets next lesson.
 *
 *  File cAssignment_get_next_lesson.php.
 *
 * PHP version 5
 *
 * @package Tutor
 *
 * @subpackage Helps_Pick_An_Assignment.
 *
 * @author Jim Fuqua <jimfuqua@gmail.com>
 *
 * @copyright 2011-2015 Jim Fuqua.
 *
 *
 *   This program is free software: you can redistribute it and/or modify
 *   it under the terms of the latest version of the GNU General Public License
 *   as published by the Free Software Foundation.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 * @license GPL v 3
 *
 * @version SVN: <svn_id>
 * @link http://wwww.jim-fuqua.com
 */
session_start();
// This:/hsphere/local/home/jimfuqua/jim-fuqua.com/tutorW/src/scripts/cAssignment_get_next_lesson.php'
date_default_timezone_set('UTC');
$file = '../../logs/cAssignment_get_next_lesson.php_log';
$log_file = fopen($file, 'w');
$v       = var_export($_POST, TRUE);
$string  = __LINE__ . '  $_POST = ' . $v . "\n\n";
fwrite($log_file, $string);
use tutor\src\classes;

require_once '../../src/classes/AssignmentsClass.inc';
require_once '../../src/classes/GenericAClass.inc';
require_once '../classes/PersonClass.inc';
require_once '../../src/classes/db_include.php';



$_SESSION['tC_ServerTimeStarted'] = microtime(TRUE);
$_SESSION['from']                 = __LINE__ . '  ' . __FILE__;
$v      = var_export($_SESSION, TRUE);
$string = __LINE__ . '  $_SESSION = ' . $v . "\n\n";
fwrite($log_file, $string);

// $_POST variables with the same key overwrite $_SESSION variables.
$_data  = array_merge($_SESSION, $_POST);
$v      = var_export($_data, TRUE);
$string = __LINE__ . '  $_data = ' . $v . "\n\n";
fwrite($log_file, $string);

// This file requires, as input,  a student id.
// Insure the student identifier is present. Error if not found.
if (empty($_data['tA_S_ID']) === TRUE) {
  $string = "\n" . __LINE__ . ' $_data["tA_S_ID"] = ' . $_data['tA_S_ID'];
  fwrite($log_file, $string . "\n\n");
  fwrite($log_file, __LINE__ . ' microtime(TRUE) = ' . microtime(TRUE) . "\n");
  $msg = ' cAssignment_get_next_lesson.php  Must have "tA_S_ID" in $_data.';
  $msg = $msg . "\n" . __LINE__ . ' Missing $_data["tA_S_ID"] can not proceed';
  trigger_error($msg, E_USER_ERROR);
}

// Now find a lesson.
$loops = 0;
// See while ($loops < 6 ); near end.
do {
  // Now get the student information and set all session variables.
  $_data['tA_S_ID'] = filter_var($_data['tA_S_ID'], FILTER_UNSAFE_RAW);
  $string = "\n" . __LINE__ . ' $_data["tA_S_ID"] = ' . $_data['tA_S_ID'];
  fwrite($log_file, $string . "\n\n");
  $last_lesson_id   = $_data['tA_id'];
  $_data['last_gA'] = NULL;

  if (isset($_data['lesson_id']) === TRUE) {
    $last_lesson_id = $_data['lesson_id'];
  }
  else {
    $last_lesson_id = '';
  }

  // START NEW session with the existing relevant data.
  $v      = var_export($_data, TRUE);
  $string = "\n" . __LINE__ . ' $_data = ' . $v . "\n\n";
  fwrite($log_file, $string . "\n");

  $_SESSION = $_data;

  $v      = var_export($_SESSION, TRUE);
  $string = "\n" . __LINE__ . ' $_SESSION = ' . $v . "\n\n";
  fwrite($log_file, $string . "\n");

  // Get next assignment to do from the login data.
  $next_lesson = new tutor\src\classes\AssignmentsClass();
  // Return a single lesson as a tAssignments row.
  $lesson = $next_lesson->getNextAssignmentToDo($_data['tA_S_ID'], $last_lesson_id);
  $v      = var_export($lesson, TRUE);
  $string = "\n" . __LINE__ . ' $lesson = ' . $v . "\n\n";
  fwrite($log_file, $string . "\n");

  // Assign the lessons variables to the $_SESSION variable.
  // $next_lesson->setSessionVariablesFromLesson($lesson);
  // From the assignment name retrieve the generic assignment and assign
  // its variables  to the $_SESSION variable.
  require_once '../../src/classes/GenericAClass.inc';
  $my_next_ga = new tutor\src\classes\GenericAClass();
  $my_next_ga->setSessionVariablesFromTGAssignmentName($lesson['tG_AssignmentName']);
  fwrite($log_file, __LINE__ . ' microtime(TRUE) = ' . microtime(TRUE) . "\n\n");
  $v      = var_export($_SESSION, TRUE);
  $string = "\n" . __LINE__ . ' $_SESSION = ' . $v . "\n\n";
  fwrite($log_file, $string . "\n");

  // We should now have the data to prepare the next lesson.
  fwrite($log_file, __LINE__ . ' microtime(TRUE) = ' . microtime(TRUE) . "\n\n");
  $_SESSION['tG_path_to_lesson'] = trim($_SESSION['tG_path_to_lesson']);
  $_SESSION['tG_FormName']       = trim($_SESSION['tG_FormName']);
  $file   = $_SESSION['tG_path_to_lesson'] . $_SESSION['tG_FormName'];
  $string = "\n" . __LINE__ . ' $file = ' . $file;
  fwrite($log_file, $string . "\n");

  // Build the URL to the next lesson.
  $go_next = '';
  $go_next = 'http://jim-fuqua.com/' . $file;
  $string = "\n" . __LINE__ . ' cA go_next = ' . $go_next;
  fwrite($log_file, $string . "\n");

  // Check to see that we really have a file to go to.
  //if (file_exists($go_next) === FALSE) {
  //  $msg = $msg . "\n" . __LINE__ . ' File to go to does not exist.';
  //  trigger_error($msg, E_USER_ERROR);
  //}
  // Following line is the exit from this php file.
  // Following line is the exit from this php file.
  // Following line is the exit from this php file.
  // echo header("Location:$go_next");
  echo $go_next;
  exit;
  // Preceding line is the exit from this php file.
  $loops++;
} while ($loops < 6);
