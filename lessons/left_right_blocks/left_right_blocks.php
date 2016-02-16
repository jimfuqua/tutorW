<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['page'] = "LeftRight.php";
$log_file = fopen("../../logs/LeftRight.php.log", "w");
$string="\nLeftRight.php";
fwrite($log_file, $string . "\n");
$v = var_export($_SESSION, true);
$string = '$_SESSION = ' . $v ;
fwrite($log_file, $string . "\n");
?>
<!DOCTYPE html>
<html>
<head>
<title>Left and Right</title>
<meta http-equiv="content-Type" content= "text/html; charset=utf-8"/>
<!-- Author: Jim Fuqua  Jim@Jim-Fuqua.com
ToDo:     -->
<link rel="stylesheet" type="text/css" href="http://jim-fuqua.com/tutorW/css/quit_valid.css"/>
<link rel="stylesheet" type="text/css" href="./css/left_right_blocks.css"/>
<script src='../../scripts/jquery.js'></script>
<script><?php require 'scripts/left_right_blocks.js.php';?></script>

</head>

<body>
<?php require_once('../../lessons/quit_help_buttons.php');?>
<div class="CenterDiv">
    <h1 id="heading_title">Left and Right</h1>
    <h2 id="student_identifier_div"><?php echo $_SESSION['tA_StudentName'];?></h2>
</div>

<div id="answer_block">
    <input  id="left"  type="button" class="answer_buttons" value="?"  tabindex="1" />
    <input  id="right" type="button" class="answer_buttons" value="?"  tabindex="2" />
	<div id='instruction_div' class="CenterDiv"><h1 id="instruction_h1"></h1></div>
</div>
<div id = "outer_error_notice_div">
    <div id = "error_notice_div"></div>
</div>
<audio id='correct' src="../../sounds/c3.wav" preload="auto"></audio>
<audio id='click_error' src="../../sounds/ohoh.wav" preload="auto"></audio>
<audio id="soundHandleCorrect" style="display: none;"></audio>
<audio id="soundHandleError" style="display: none;"></audio>

<div id="results"></div>
</body>
</html>
