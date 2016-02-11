<?php

/**
 * @file
 * LessonsClass.php.
 *
 * @package TutorMio
 *
 * ActiveLessonsClass represents the assigned lesson.
 */

namespace jimfuqua\tutorW;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
 * @file

 *

 *
 * PHP version 5+
 *

 * @subpackage TutorW
 * @author     Jim Fuqua <jim@jim-fuqua.com>
 * @copyright  2015 Jim Fuqua
 * @category   Identifies a specific assigned lesson.
 * @license    GNU General Public License V3+
 *  http://www.gnu.org/copyleft/gpl.html
 * @link       http://www.jim-fuqua.com/
 */

/**
 * ActiveLesson.class.php.
 *
 * A lesson must have or immediately obtain an assignment
 *   from tAssignments and from that obtain a generic
 *   assignment from tGenericAssignments. A lesson must
 *   have a student from the start.
 * It is usefull to know who called. Was it the log-in
 *   process or was it a lesson?
 * The purpose of an "ActiveLesson",  is to encapsulate
 *   a tGenericAssignments row and a tAssignments Row
 *   at the earliest possible time and then represent the current
 *   assignment for a particular student with all of the
 *   relevant attributes and methods for manipulating
 *   data and the student responses.
 */
class ActiveLessonClass {
  private $studentId = 'I must have a student!';
  private $caller = 'Who called me?';

  /**
   * Constructor. Runs on instantiation.
   */
  public function __construct($student_in, $who_called_me) {

    $this->studentId = $student_in;
    $this->caller = $who_called_me;
    // What other mandatory variables?
    // Calling lesson or script? seems reasonable.
    // __FILE__.
    echo '<br />';
    echo $this->student_id;
    echo '<br />';
    echo $this->caller;
    echo '<br />';
  }


  /**
   * Gets the student's next assignment.
   */
  public function getNextLesson() {
    // Formerly cAssignment_get_next_lesson.
    date_default_timezone_set('UTC');
    $file = 'logs/ALC_getNextLesson.log';
    $log_file = fopen($file, 'w');
    $v        = var_export($_POST, TRUE);
    $string   = __LINE__ . '  $_POST = ' . $v . "\n\n";
    fwrite($log_file, $string);
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
      fwrite($log_file, __LINE__ . ' microtime(true) = ' . microtime(TRUE) . "\n");
      $msg = ' cAssignment_get_next_lesson.php    Must have "tA_S_ID" in $_data.';
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
      $last_lesson_id = $_data['tA_id'];
      $_data['last_gA'] = NULL;

      if (isset($_data['lesson_id']) === TRUE) {
        $last_lesson_id = $_data['lesson_id'];
      }
      else {
        $last_lesson_id = '';
      }

      // START NEW session with the existing relevant data.
      $v = var_export($_data, TRUE);
      $string = "\n" . __LINE__ . ' $_data = ' . $v . "\n\n";
      fwrite($log_file, $string . "\n");

      $_SESSION = $_data;

      $v = var_export($_SESSION, TRUE);
      $string = "\n" . __LINE__ . ' $_SESSION = ' . $v . "\n\n";
      fwrite($log_file, $string . "\n");

      // Get next assignment to do from the login data.
      // $next_lesson = new tutor\src\classes\AssignmentsClass();
      $next_lesson = new tutor\classes\AssignmentsClass();
      // Return a single lesson as a tAssignments row.
      $lesson = $next_lesson->getNextAssignmentToDo($_data['tA_S_ID'], $last_lesson_id);
      $v = var_export($lesson, TRUE);
      $string = "\n" . __LINE__ . ' $lesson = ' . $v . "\n\n";
      fwrite($log_file, $string . "\n");

      // Assign the lessons variables to the $_SESSION variable.
      // $next_lesson->setSessionVariablesFromLesson($lesson);
      // From the assignment name retrieve the generic assignment and assign
      // its variables  to the $_SESSION variable.
      require_once '../../src/classes/GenericAClass.inc';
      $my_next_ga = new tutor\src\classes\GenericAClass();
      $my_next_ga->setSessionVariablesFromTGAssignmentName($lesson['tG_AssignmentName']);
      fwrite($log_file, __LINE__ . ' microtime(true) = ' . microtime(TRUE) . "\n\n");
      $v = var_export($_SESSION, TRUE);
      $string = "\n" . __LINE__ . ' $_SESSION = ' . $v . "\n\n";
      fwrite($log_file, $string . "\n");

      // We should now have the data to prepare the next lesson.
      fwrite($log_file, __LINE__ . ' microtime(true) = ' . microtime(FALSE) . "\n\n");
      $_SESSION['tG_path_to_lesson'] = trim($_SESSION['tG_path_to_lesson']);
      $_SESSION['tG_FormName'] = trim($_SESSION['tG_FormName']);
      $file = $_SESSION['tG_path_to_lesson'] . $_SESSION['tG_FormName'];
      $string = "\n" . __LINE__ . ' $file = ' . $file;
      fwrite($log_file, $string . "\n");

      // Build the URL to the next lesson.
      $go_next = '';
      $go_next = 'http://jim-fuqua.com/' . $file;
      $string = "\n" . __LINE__ . ' cA go_next = ' . $go_next;
      fwrite($log_file, $string . "\n");

      // Check to see that we really have a file to go to.
      if (file_exists($go_next) === FALSE) {
        $msg = $msg . "\n" . __LINE__ . ' File to go to does not exist.';
        trigger_error($msg, E_USER_ERROR);
      }
      // Following line is the exit from this php file.
      echo $go_next;
      // Preceding line causes a new lesson to load.
      /* Exit the do while. */
      break 2;
      $loops++;
    } while ($loops < 6);
  }
  // Now should have transmitted a lesson.
}
