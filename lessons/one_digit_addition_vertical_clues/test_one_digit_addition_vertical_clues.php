<?php
namespace jimfuqua\tutorW;
require "../../vendor/autoload.php";
use jimfuqua\tutorW\classes;
use jimfuqua\tutorW\tests;
date_default_timezone_set('UTC');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/**
 * @file Test lesson one_digit_addition_vertical_clues.php.
 *
 * This file initiates the minimum session variables necessary for a
 * lesson to function and record its data in tCompleted and to update
 * tAssignments.  It does this by inserting four tAssignments assignments,
 * and then running one_digit_addition_vertical_clues.php.
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category CategoryName
 *
 * @package PackageName
 *
 * @author Jim Fuqua <jim@jim-fuqua.com>
 *
 * @copyright 1997-2005 The PHP Group
 *
 * @license http://www.php.net/license/3_01.txt  PHP License 3.01
 *
 * @version SVN: $Id$
 *
 * @link http://pear.php.net/package/PackageName
 *
 * @see NetOther, Net_Sample::Net_Sample()
 *
 * @since File available since Release 1.2.0
 **/

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

session_regenerate_id(true);
session_destroy();
session_start();

$_SESSION['session_id']   = session_id();

// Must get tA_id for the lesson to be tested.

require_once "../test_lesson_include.php";

// $log_file = fopen('/var/www/html/jimfuqua/tutor/logs/test_one_digit_addition_vertical_clues.log', 'w');
// $v = var_export($_SESSION, true);
// $string = __LINE__.' $_SESSION = '.$v."\n\n";
// fwrite($log_file, $string);

$target_assignment_name = 'gA_one_digit_addition_vertical_clues';

$class_instance = new AssignmentsClass;

// Get target lesson if it exists.
$result = $class_instance -> getSpecificStudentAssignmentFromDbAsArray(
    $_SESSION['tA_S_ID'],
    $target_assignment_name,
    $_SESSION['tA_StartRec']
);

$_SESSION['tA_id'] = $result['tA_id'];

  // $v = var_export($_SESSION['tA_id'], true);
  // $string = __LINE__.' $_SESSION["tA_id"] = '.$v."\n\n";
  // fwrite($log_file, $string);


// Remove the lesson to be tested.
// Add it back with a 2 second post-date.
//
$class_instance ->delRowsByStudentIdAndAssignmentName($_SESSION['tA_S_ID'], 'gA_one_digit_addition_vertical_clues');
$_SESSION['tG_AssignmentName'] = $target_assignment_name;
$_SESSION['tA_PostDateIncrement'] = 2;
$_SESSION['tA_Post_date'] = round(microtime(true), 3, PHP_ROUND_HALF_EVEN) +
$_SESSION['tA_PostDateIncrement'];

// $string = __LINE__.' $_SESSION["tA_Post_date"] = '.$_SESSION['tA_Post_date']."\n\n";
// fwrite($log_file, $string);
// $s = ' round(microtime(true), 3, PHP_ROUND_HALF_EVEN) = ';
// $string =  __LINE__. $s . round(microtime(true), 3, PHP_ROUND_HALF_EVEN)."\n\n";
// fwrite($log_file, $string);

$result = $class_instance->insertRecord($_SESSION);
// insert the target lesson and get back the tA_id.

// now get back the tA_id for the target lesson.  Get by assignment_name

// $result = $class_instance->insertRecord($var_array);

require('one_digit_addition_vertical_clues.php');
?>
