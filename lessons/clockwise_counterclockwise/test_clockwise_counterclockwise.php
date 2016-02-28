<?php
/**
 * @file
 * Test lesson clockwise_counterclockwise.php.
 *
 * This file initiates the minimum session variables necessary for a
 * lesson to function and record its data in tCompleted and to update
 * tAssignments.  It does this by inserting four tAssignments assignments,
 * and then running clockwise_counterclockwise.php.
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
 */

namespace jimfuqua\tutorW;

//use Monolog\Logger;
//use Monolog\Handler\StreamHandler;
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
$_SESSION['tA_S_ID']="zxcvb";
$_SESSION['tA_StartRec'] = 1;
$class_instance = new AssignmentsClass();
$class_instance->delRowsByStudentId($_SESSION['tA_S_ID']);
$target_assignment_name = 'gA_clockwise_counterclockwise';
//$secondary_assignment_name = 'gA_left_right_blocks';

$lessons_to_ta = array
  (
  array(
    'ga'=>'gA_left_right_blocks',
    'tA_PostDateIncrement'=>0),
  array(
    'ga'=>'gA_typing_lessons_cl',
    'tA_PostDateIncrement'=>0),
  array(
    'ga'=>'gA_spelling',
    'tA_PostDateIncrement'=>0),
  array(
    'ga'=>'gA_horizontal_vertical_diagonal',
    'tA_PostDateIncrement'=>0),
  array(
    'ga'=>'gA_one_digit_addition_vertical_clues',
    'tA_PostDateIncrement'=>0),
  array(
    'ga'=>'gA_clockwise_counterclockwise',
    'tA_PostDateIncrement'=>2)
);

foreach ($lessons_to_ta as $v1) {
      $_SESSION['tG_AssignmentName'] = $v1["ga"];
      $_SESSION['tA_PostDateIncrement'] = $v1['tA_PostDateIncrement'];
      $_SESSION['tA_Post_date'] =
          round(microtime(true), 3, PHP_ROUND_HALF_EVEN) +
          $_SESSION['tA_PostDateIncrement'];
      $result = $class_instance->insertRecord($_SESSION);
}

$result = $class_instance -> getSpecificStudentAssignmentFromDbAsArray(
    $_SESSION['tA_S_ID'],
    $target_assignment_name,
    $_SESSION['tA_StartRec']
);

//echo $_SESSION['tG_AssignmentName'];
$_SESSION['tA_id'] = $result['tA_id'];
//echo $_SESSION['tA_id'];
// Load the lesson to test.
require 'clockwise_counterclockwise.php';
