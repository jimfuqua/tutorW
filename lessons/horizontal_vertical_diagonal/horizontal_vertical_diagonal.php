<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//require_once "/var/www/tutorW/lib/lib_lesson_header.php";
//$_SESSION['page'] = "horizontal_vertical_diagonal.php";
//$log_file = fopen("/var/www/html/jimfuqua/tutorW/logs/horizontal_vertical_diagonal.php.txt", "w");
//$string="\n horizontal_vertical_diagonal.php";
//fwrite  ( $log_file, $string . "\n");
//$v = var_export($_SESSION, true);
//$string= __LINE__ . ' $_SESSION = ' . $v ;
//fwrite  ( $log_file, $string . "\n");
?>
<!DOCTYPE html>
<html>
<head>
<title>Horizontal, Vertical and Diagonal</title>
<meta charset="UTF-8">
<!-- Author: Jim Fuqua  Jim@Jim-Fuqua.com
ToDo:     -->
<link rel="stylesheet" type="text/css" href="http://localhost/jimfuqua/tutorW/css/quit_valid.css"/>
<link rel="stylesheet" type="text/css" href="./css/horizontal_vertical_diagonal.css"/>
<script src="http://localhost/jimfuqua/tutorW/scripts/jquery.js"></script>
<script><?php require 'scripts/horizontal_vertical_diagonal.js.php'; ?></script>

</head>

<body>
<div>
    <a id='quit_button_top_left' href='javascript:window.close()'>
    <img id='image-exit' src='/jimfuqua/tutorW/images/stop2.gif' alt='Quit'/></a>

    <a id="help_button" href="fHelp()">
    <img id="image-help" src="/jimfuqua/tutorW/images/Help.png" alt="help"/></a>
</div>


<div id="line_block">
<canvas id="myCanvas" width="260" height="260">
<!--style="border:1px solid #5F9EA0;">-->
</canvas>
</div>
<div id="error_message"></div>
<audio id='audio1' src='./sounds/is_the_line_horizontal_vertical_or_diagonal.ogg'></audio>
<audio id ='c3'
    src='http://localhost/jimfuqua/tutorW/sounds/c3.ogg' preload="auto">
</audio>
<audio id ='ohoh'
    src='http://localhost/jimfuqua/tutorW/sounds/ohoh.ogg' preload="auto">
</audio>

<div id = "problem" >Report problem.</div>
<div id="answer_buttons">
    <button id="horizontal" class="a_buttons" >Horizontal</button>
    <button id="vertical"   class='a_buttons' >Vertical</button>
    <button id="diagonal"   class='a_buttons' >Diagonal</button>
</div>
<audio class ='ohoh'
src='/jimfuqua/tutorW/sounds/ohoh.ogg' preload="auto">
</audio>
<dialog id = "dialog" class="dialog">
<h3>Error</h3>
    <p class='ErrorMsg'>You’ve pressed a big red button. It might do… something.</p>
    <div>
        <button class = "okay">Okay, I've got it.</button>
    </div>
</dialog>
</body>
</html>
