<?php
/**
 * @file
 * Lesson GearsRotationDirection.php.
 *
 * This lesson projects a rotating windmill and queries the user as to
 *  the direction of rotation.
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
//$log_file = fopen('/var/www/html/jimfuqua/tutor/logs/GearsRotationDirection.php_log', 'w');
//$string = 'GearsRotationDirection.php';
//fwrite($log_file, $string."\n");
//$v = var_export($_SESSION, true);
//fwrite($log_file, __LINE__.' $_SESSION = '.$v." \n");
//fwrite($log_file, __LINE__.' $sess = ' . $sess);

$filename = '/var/www/html/jimfuqua/tutor/lessons/gears_rotation_direction/css/GearsRotationDirection.css';
if (file_exists($filename) === false) {
    $string = 'Missing critical file -- ./css/GearsRotationDirection.css';
    trigger_error($string, E_USER_ERROR);
}
$filename = '/var/www/html/jimfuqua/tutor/src/scripts/jquery.js';
if (file_exists($filename) === false) {
    $string = 'Missing critical file -- jquery.js';
    trigger_error($string, E_USER_ERROR);
}

$filename = '/var/www/html/jimfuqua/tutor/lessons/gears_rotation_direction/scripts/GearsRotationDirection.js.php';
if (file_exists($filename) === false) {
    $string = 'Missing critical file -- GearsRotationDirection.js.php';
    trigger_error($string, E_USER_ERROR);
}

$_SESSION['session_path'] = session_save_path();
$_SESSION['session_id']   = session_id();

$x = rand(0, 100);
if ($x >= 50) {
    $rotation_direction = 'clockwise';
} else {
    $rotation_direction = 'counterclockwise';
}

?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gears</title>
<link rel="stylesheet" type="text/css" href="http://localhost/jimfuqua/tutor/css/quit_valid.css"/>
<link rel="stylesheet" type="text/css" href="./css/GearsRotationDirection.css"  media='screen' />
<link rel="stylesheet" type="text/css"
href="http://localhost/jimfuqua/tutor/lessons/gears_rotation_direction/css/GearsRotationDirection.css"
media="screen" />
<script src="/jimfuqua/tutor/src/scripts/jquery.js"></script>
<script><?php require 'scripts/GearsRotationDirection.js.php'; ?></script>
</head>

<body>
<?php require_once '/var/www/html/jimfuqua/tutor/lessons/quit_help_buttons.php';?>
<div class = "Title1" >Gear Rotation</div>
<div class = "student_identifier"><?php echo $_SESSION['tA_StudentName'] ?></div>
<img class="image1_maroon" class="image1_maroon"
    src="./images/gg_gear N16 D4 P4 PA27 @100_maroon.svg"
    alt="gear" width="100" height="120">
<img class="image2_saddlebrown" class="image2_saddlebrown"
    src="./images/gg_gear N16 D4 P4 PA27 @100_saddlebrown.svg"
    alt="gear" width="120" height="120">
<div class ="target1"></div>
<div class = target2></div>
<!--<button id="cd">Change directions.</button>-->
<dialog id = "dialog" class="dialog">
<h3>Error</h3>
    <p class='ErrorMsg'>You’ve pressed a big red button. It might do… something.</p>
    <div>
        <button class = "okay">Okay, I've got it.</button>
    </div>
</dialog>
<audio class ='c3'
src='/jimfuqua/tutor/sounds/c3.ogg' preload="auto">
</audio>
<audio class ='ohoh'
src='/jimfuqua/tutor/sounds/ohoh.ogg' preload="auto">
</audio>
<div class = "message"></div>
<input type="hidden" id ="rotation"  class="rotation" value=<?php echo $rotation_direction ?> />;
</body>
</html>
