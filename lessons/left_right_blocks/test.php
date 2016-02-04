<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "5"."<br/>";
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
echo ("59"."<br/>");
