<?php
/**
 * @file
 * Lesson clockwise_counterclockwise.php.
 *
 * This lesson projects a rotating windmill and queries the user as to
 *  the direction of rotation.
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
    (at your option) any later version.

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
 * @link http://pear.php.net/package/PackageName
 *
 * @see NetOther, Net_Sample::Net_Sample()
 *
 * @since File available since Release 1.2.0
*/

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$sess    = session_id();
// $log_file = fopen('/var/www/html/jimfuqua/tutor/logs/clockwise-counterclockwise.php_log', 'w');
// $string  = 'clockwise-counterclockwise.php';
// fwrite($log_file, $string . "\n");
//$v = var_export($_SESSION, true);
//fwrite($log_file, __LINE__.' $_SESSION = '.$v." \n");
//fwrite($log_file, __LINE__.' $sess = ' . $sess);

$filename = '/var/www/html/jimfuqua/tutor/lessons/clockwise_counterclockwise/css/clockwisecounterclockwise.css';
if (file_exists($filename) === FALSE) {
  $string = 'Missing critical file -- ./css/clockwisecounterclockwise.css';
  trigger_error($string, E_USER_ERROR);
}

$filename = '/var/www/html/jimfuqua/tutor/src/scripts/jquery.js';
if (file_exists($filename) === FALSE) {
  $string = 'Missing critical file -- jquery.js';
  trigger_error($string, E_USER_ERROR);
}

$filename = '/var/www/html/jimfuqua/tutor/lessons/clockwise_counterclockwise/scripts/clockwise_counterclockwise.js.php';
if (file_exists($filename) === false) {
    $string = 'Missing critical file -- clockwise_counterclockwise.js.php';
    trigger_error($string, E_USER_ERROR);
}

$_SESSION['session_path'] = session_save_path();
$_SESSION['session_id']   = session_id();

?>
<DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Clockwise-Counterclockwise</title>
<link rel='stylesheet' type='text/css' href='http://localhost/jimfuqua/tutor/css/quit_valid.css'/>
<link rel='stylesheet' type='text/css' href='./css/clockwisecounterclockwise.css'  media='screen' />
<script src='/jimfuqua/tutor/src/scripts/jquery.js'></script>
<script><?php require 'scripts/clockwise_counterclockwise.js.php';?></script>
</head>

<body>
<?php require_once '/var/www/html/jimfuqua/tutor/lessons/quit_help_buttons.php'; ?>
<div id='Title1' class="Title1" >Clockwise or Counterclockwise?</div>
<div id='student_identifier' class="student_identifier"></div>
<!-- Next div is used for vertical centering of contents.-->
<div id='horizon' class="horizon">
<div id='center_div' class="center_div">
<dialog id='dialog'>
<p id = 'error_title' class="error_title">Error</p>
<p id='ErrorMsg' class="ErrorMsg">You’ve pressed a big red button. It might do… something.</p>
    <div>
        <button id='okay'>"Okay, I've got it."</button>
    </div>
</dialog>
<button id='bClockwise' type='button' class="bClockwise" >Clockwise?</button>
<?php
$x = rand(0, 100);
if ($x >= 50) {
  echo '<object id = "rotator" data = "./images/clockwise.svg" type = "image/svg+xml" ></object>';
  echo '<input type = "hidden" id = "rotation" class= "rotation" value = "clockwise" tabindex = "100" />';
}
else {
  echo '<object id = "rotator" class="rotator" data = "./images/counterclockwise.svg" type = "image/svg+xml" ></object>';
  echo '<input  = "hidden" id = "rotation" value = "counterclockwise" tabindex = "100" />';
}
?>
<button id='bCounterclockwise' type='button' class="bCounterclockwise" >Counter-Clockwise?</button>
</div><!-- center_div -->
</div><!--id='horizon'  This div is used for vertical centering of contents.-->

<div id='results'></div>
    <audio id ='c3' src='/jimfuqua/tutor/sounds/c3.ogg' preload='auto'></audio>
    <audio id ='ohoh' src='/jimfuqua/tutor/sounds/ohoh.ogg' preload='auto'></audio>

</body>
</html>
