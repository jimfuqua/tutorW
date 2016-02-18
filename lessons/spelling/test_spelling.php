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
 * @file Test lesson spelling.php.
 *
 * This file initiates the minimum session variables necessary for a
 * lesson to function and record its data in tCompleted and to update
 * tAssignments.  It does this by inserting four tAssignments assignments,
 * and then running spelling.php.
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
 * @author Jim Fuqua <jim@jim-fuqua.com>
 * @copyright 1997-2005 The PHP Group
 * @license http://www.php.net/license/3_01.txt  PHP License 3.01
 *
 * @version SVN: $Id$
 *
 * @link http://pear.php.net/package/PackageName
 * @see NetOther, Net_Sample::Net_Sample()
 * @since File available since Release 1.2.0
 **/

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

session_regenerate_id(true);
session_destroy();
session_start();
$_SESSION['tA_StartRec']=2;

//$_SESSION['session_path'] = session_save_path();
$_SESSION['session_id']   = session_id();
// Must get tA_id for the lesson to be tested.
require_once "../test_lesson_include.php";

$target_assignment_name = 'gA_spelling';
$class_instance = new AssignmentsClass;

// Get target lesson if it exists.
$result = $class_instance->getSpecificStudentAssignmentFromDbAsArray(
    $_SESSION['tA_S_ID'],
    $target_assignment_name,
    $_SESSION['tA_StartRec']);

$_SESSION['tA_id'] = $result['tA_id'];

// Remove the lesson to be tested.
// Add it back with a 2 second post-date.
//
$class_instance ->delRowsByStudentIdAndAssignmentName($_SESSION['tA_S_ID'], 'gA_spelling');
$_SESSION['tG_AssignmentName'] = $target_assignment_name;
$_SESSION['tA_PostDateIncrement'] = 2;
$_SESSION['tA_Post_date'] = round(microtime(true), 3, PHP_ROUND_HALF_EVEN) +
   $_SESSION['tA_PostDateIncrement'];

$result = $class_instance->insertRecord($_SESSION);

require 'spelling.php';
