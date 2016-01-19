<?php
if(session_id() == '') {
    session_start();
}
/**
   * PHP Version 5
   *  This file contains a standard header for every lesson.
   *
   * @category  Header_For_Every_Lesson.
   * @package   Tutor
   * @author    Jim Fuqua <jimfuqua@gmail.com>
   * @copyright 2011 Jim Fuqua
   *
   *
   *   This program is free software: you can redistribute it and/or modify
   *   it under the terms of the GNU General Public License as published by
   *   the Free Software Foundation, either version 3 of the License, or
   *  (at your option) any later version.
   *
   *   This program is distributed in the hope that it will be useful,
   *   but WITHOUT ANY WARRANTY; without even the implied warranty of
   *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   *   GNU General Public License for more details.
   *
   *   You should have received a copy of the GNU General Public License
   *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
   * @license   GPL v 3
   * @version   SVN: <svn_id>
   * @link      http://wwww.jim-fuqua.com
   * ToDo:
   *  1.   Function to read db given a timestamp and return an array recordset.
   *  2.   Function to delete a record given a timestamp and userID.
   *  3.   Add docbook type comments to each function and internal comments
   *       in each function.
   *
   */
if (!isset($_SESSION)){
        session_start();
    }

$logFile = fopen("/var/www/jimfuqua/tutor/logs/lib_lesson_header.log", "w");
$v = var_export($_SESSION, true);
$string = __LINE__ . " lib_lesson_header: _SESSION = \n" . $v . "   \n";
fwrite($logFile, $string);
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

    $_SESSION['session_id']='testID';
    $_SESSION["student_name"] = "Tim Test";
    $_SESSION["tA_S_ID"] = "qqq4q3q";
    $_SESSION['views'] = 1;
    $_SESSION['page'] = 'standard_lesson_php_header.php ';
    $_SESSION['time_session_started'] = '1234567';
    $_SESSION['last_gA'] = 'none';
    $_SESSION['tG_AssignmentName'] = 'test';
    $_SESSION['$tA_StartRec'] = '99';
    $_SESSION['tA_Consequtive_Reps_OK'] = '1';
    $_SESSION['tA_StartRec'] = '1';
    $_SESSION['tA_StopRec'] = '2';
    $_SESSION['tA_Reps_to_master'] = '30';
    $_SESSION['tA_RepsTowardM'] = '0';
    $_SESSION['tA_ErrorsMade'] = '0';
    $_SESSION['tG_path_to_lesson'] = '';
    $_SESSION['tG_FormName'] = '';
    $_SESSION['tG_TableName'] = '';
    $_SESSION['tG_Consequtive_Reps_OK'] = '0';
    $_SESSION['tG_StartRec'] = '1';
    $_SESSION['tG_StopRec'] = '1';
    $_SESSION['tG_Immediate_Loops'] = '1';
    $_SESSION['tG_RepsPerRecord'] = '20';
    $_SESSION['tG_RecordsPerSet'] = '2';
    $_SESSION['tG_Lesson_if_Correct'] = '';
    $_SESSION['tG_Record_if_Correct'] = '';
    $_SESSION['tG_Lesson_if_Error'] = '';
    $_SESSION['tG_Record_if_Error'] = '';
    $_SESSION['tC_ServerTimeStarted'] = '23456789';

    if (!session_id()) {  // Trigger fatal error.
        $string = "Must be in a session to record data to database.";
        trigger_error($string, E_USER_ERROR);
    }
     if (!isset($_SESSION['student_name'])) {  // Trigger fatal error.
         $string = "Session must have a student_name to record data to database.";
         trigger_error($string, E_USER_ERROR);
     }
    if (!isset($_SESSION["tA_S_ID"])) {  // Trigger fatal error.
        $string = "Session must have a tA_S_ID to record data to database.";
        trigger_error($string, E_USER_ERROR);
    }
    if (!isset($_SESSION["tG_AssignmentName"])) {  // Trigger fatal error.
        $string = "Session must have a tG_AssignmentName ";
        $string .= "to record data to database.";
        trigger_error($string, E_USER_ERROR);
    }
    if (!isset($_SESSION["tA_StartRec"])) {  // Trigger fatal error.
        $string = "Session must have a tA_StartRec to record data to database.";
        trigger_error($string, E_USER_ERROR);
    }

    $string = "\n" . __LINE__ . ' lib_lesson_header.php.log';
    fwrite($logFile, $string  . "\n");
    $v = var_export($_SESSION, true);
    $string = "\n" . __LINE__ . ' $_SESSION = ' . $v;
    fwrite($logFile, $string . "\n\n");
