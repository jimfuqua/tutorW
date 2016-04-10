<?php
/**
 * @file Test lesson horizontal_vertical_diagonal.php.
 *
 * This file initiates the minimum session variables necessary for a
 * lesson to function and record its data in tCompleted and to update
 * tAssignments.  It does this by inserting four tAssignments assignments,
 * and then running horizontal_vertical_diagonal.php.
 *
 * PHP version 5
 *
 * LICENSE: TThis file is part of jlfEDU.

    jlfEDU is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.

    jlfEDU is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Foobar.  If not, see <http://www.gnu.org/licenses/>.

 *
 * @category CategoryName
 *
 * @package PackageName
 *
 * @author Jim Fuqua <jim@jim-fuqua.com>
 *
 * @copyright 1997-2005 The PHP Group
 *
 * @license <http://www.gnu.org/licenses/>  GPL License v. 3
 *
 * @version SVN: $Id$
 *
 * @link http://pear.php.net/package/PackageName
 *
 * @see NetOther, Net_Sample::Net_Sample()
 *
 * @since File available since Release 1.2.0
 */

namespace jimfuqua\tutorW;
// Use Monolog\Logger;
// use Monolog\Handler\StreamHandler;.
require "../../vendor/autoload.php";
date_default_timezone_set('UTC');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

session_regenerate_id(TRUE);
session_destroy();
session_start();

// Must get tA_id for the lesson to be tested.
require_once "../test_lesson_include.php";
$_SESSION['tA_S_ID'] = "zxcvb";
$_SESSION['tA_StartRec'] = 1;
$class_instance = new AssignmentsClass();
$class_instance->delRowsByStudentId($_SESSION['tA_S_ID']);
$target_assignment_name = 'gA_horizontal_vertical_diagonal';
// $secondary_assignment_name = 'gA_left_right_blocks';.
$lessons_to_ta = array(
  array(
    'ga' => 'gA_left_right_blocks',
    'tA_PostDateIncrement' => 0,
  ),
  array(
    'ga' => 'gA_typing_lessons_cl',
    'tA_PostDateIncrement' => 0,
  ),
  array(
    'ga' => 'gA_spelling',
    'tA_PostDateIncrement' => 0,
  ),
  array(
    'ga' => 'gA_horizontal_vertical_diagonal',
    'tA_PostDateIncrement' => 0,
  ),
  array(
    'ga' => 'gA_one_digit_addition_vertical_clues',
    'tA_PostDateIncrement' => 0,
  ),
  array(
    'ga' => 'gA_clockwise_counterclockwise',
    'tA_PostDateIncrement' => 2,
  ),
);

foreach ($lessons_to_ta as $v1) {
  $_SESSION['tG_AssignmentName'] = $v1["ga"];
  $_SESSION['tA_PostDateIncrement'] = $v1['tA_PostDateIncrement'];
  $_SESSION['tA_Post_date']
    = round(microtime(TRUE), 3, PHP_ROUND_HALF_EVEN) +
    $_SESSION['tA_PostDateIncrement'];
  $result = $class_instance->insertRecord($_SESSION);
}

$result = $class_instance->getSpecificStudentAssignmentFromDbAsArray(
    $_SESSION['tA_S_ID'],
    $target_assignment_name,
    $_SESSION['tA_StartRec']
);

$_SESSION['tA_id'] = $result['tA_id'];

// Load the lesson to test.
require 'horizontal_vertical_diagonal.php';
