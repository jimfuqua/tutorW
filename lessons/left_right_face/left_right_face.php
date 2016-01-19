<?php
// Secure log in
require_once '../../includes/db_connect.php';
require_once '../../includes/functions.php';
sec_session_start();
// End Secure log in

require_once "/var/www/tutor/lib/lib_lesson_header.php";
//require_once "/var/www/tutor/scripts/check_required_session_variables.php";
$_SESSION['page'] = "LeftRight.php";
// $log_file = fopen("/var/www/tutor/logs/LeftRight.php.txt", "w");
// $string="\nLeftRight.php";
// fwrite  ( $log_file, $string . "\n");
// $string="\$_SESSION['tC_ServerTimeStarted'] = " . $_SESSION["tC_ServerTimeStarted"] ;
// fwrite  ( $log_file, $string . "\n");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
<title>Left and Right</title>
<meta http-equiv="content-Type" content="text/html; charset=iso-8859-1"/>
<!-- Author: Jim Fuqua  Jim@Jim-Fuqua.com
ToDo:     -->
<link rel="stylesheet" type="text/css" href="http://localhost/tutor/css/quit_valid.css"/>
<link rel="stylesheet" type="text/css" href="./css/LeftRightFace.css"/>
<link rel="stylesheet" type="text/css" href="http://localhost/tutor/scripts/jquery.alerts.css"/>
<script type="text/javascript" src="../../scripts/jquery.js"></script>
<script type="text/javascript" src="../../scripts/jquery.alerts.js"></script>
<script type="text/javascript" src="./scripts/LeftRightFace_js.php"></script>

</head>

<body>
<div>
    <a id='quit_button_top_left' href='javascript:window.close()'>
    <img id='image-exit' src='/tutor/images/stop_sign4.svg' alt='Quit'/></a>
    <a id="help_button" href="fHelp()">
    <img id="image-help" src="/tutor/images/Help.png" alt="help"/></a>
</div>
<div class="CenterDiv">
    <h1 id="heading_title">Left and Right</h1>
    <h2 id="student_identifier_div">
    <?php
        if (isset($_SESSION['tA_StudentName'])) {
            echo $_SESSION['tA_StudentName'];
        }
    ?>
</h2>
</div>

<div id="answer_block">
<p id="face">
<img id="face_pic" src = "http://localhost/tutor/images/jim.jpg"
alt = "Picture of a face." />
</p>
    <div  id="left" ></div>

    <div  id="right" ></div>
</div>

<audio id ='c3' 
src='http://localhost/tutor/sounds/c3.ogg' autoload>
</audio>
<audio id ='ohoh' 
src='http://localhost/tutor/sounds/ohohS1.wav' autoload>
</audio>
<div id="results"></div>
</body>
</html>
