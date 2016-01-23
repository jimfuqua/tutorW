<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * @file Test lesson test_left_right_blocks.php.
 *
 * This file initiates the minimum session variables necessary for a
 * lesson to function and record its data in tCompleted and to update
 * tAssignments.  It does this by inserting four tAssignments assignments,
 * and then running left_right_blocks.php.
 *
 * PHP version 5
 *
 * @category CategoryName
 *
 * @package PackageName
 *
 * @author Jim Fuqua <jim@jim-fuqua.com>
 *
 * @copyright 1997-2015 Jim Fuqua
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @license http://www.http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @version SVN: $Id$
 *
 * @link http://pear.php.net/package/PackageName
 *
 * @see NetOther, Net_Sample::Net_Sample()
 *
 * @since File available since Release 1.2.0
 **/

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

session_regenerate_id(true);
session_destroy();
session_start();
if (is_writable(session_save_path()) === false) {
    //echo 'Session path "' . session_save_path() . '" is not writable for PHP!'."<br/><br/>";
}

$_SESSION['session_path'] = session_save_path();
$_SESSION['session_id']   = session_id();

// Must get tA_id for the lesson to be tested.
require_once "../test_lesson_include.php";

 $log_file = fopen('../../../logs/test_left_right_blocks.php.log', 'w');
 $v = var_export($_SESSION, true);
 $string = __LINE__.' $_SESSION = '.$v."\n\n";
 fwrite($log_file, $string);

$target_assignment_name = 'gA_left_right_blocks';

require_once '../../src/classes/AssignmentsClass.inc';

$class_instance = new \tutor\src\classes\AssignmentsClass;

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

//echo (90."<br/>");
// Remove the lesson to be tested.
// Add it back with a 2 second post-date.
//
$class_instance ->delRowsByStudentId_AssignmentName($_SESSION['tA_S_ID'], 'gA_left_right_blocks');
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

require 'left_right_blocks.php';
//echo ("114"."<br/>");
