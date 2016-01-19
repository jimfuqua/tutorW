<?php
/**
* test_LeftRightBlocks.php
*
* PHP versions 5
*
* @category  Manipulates_Db_And_Tests_A_Lesson
* @package   Tutor
* @author    Jim Fuqua <jimfuqua@gmail.com>
* @copyright 2013 Jim Fuqua
* @license   GPL v 3
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
*
* @version   SVN: <svn_id>
* @link      http://wwww.jim-fuqua.com
*/
//session_destroy();
session_start();
$_SESSION = array();
$_SESSION['lesson_to_test'] = "gA_LeftRightMouse";
include "/var/www/tutor/lib/lib_lesson_header.php";
include "left_right_mouse.php";
?>
