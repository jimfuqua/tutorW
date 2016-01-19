<?php
if(session_id() == '') {
    session_start();
}
$_SESSION['session_id'] = session_id();
$logFile = fopen("/var/www/html/jimfuqua/tutor/logs/one_digit_addition_vertical_clues.log", "w");
$v = var_export($_SESSION , true);
$string='$_SESSION = ' . $v ;
fwrite($logFile, $string . "\n");
 // Insure that include files are included. ***************************

$filename="/var/www/html/jimfuqua/tutor/css/quit_valid.css";
 if(!file_exists($filename)){
        $string = "Missing critical file -- quit_valid.css";
        trigger_error($string, E_USER_ERROR);
    }

$filename="/var/www/html/jimfuqua/tutor/src/scripts/jquery.js";
 if(!file_exists($filename)){
        $string = "Missing critical file -- jquery.js";
        trigger_error($string, E_USER_ERROR);
    }

// End -- Insure that include files are included. ***************************

$_SESSION['tC_ClientTimeStarted'] = time()+0;
if (!isset($_SESSION['views'])){
    $_SESSION['views']=1;
} else {
    $_SESSION['views']=$_SESSION['views']+1;
}
$date = new DateTime();
$_SESSION["tC_ClientTimeStarted"] = $date->getTimestamp();
$_SESSION['page'] = "one_digit_addition_vertical.php in object in container.php ";
// $time_lesson_started=time()+0;
// $_SESSION['tC_ServerTimeStarted']=$time_lesson_started;
$string ="\n".$_SESSION['page']."\n";
fwrite  (  $logFile, $string);
$string="\$_SESSION['views']=".$_SESSION['views']."\n"."\$_SESSION['session_id']=".session_id()."\n";
fwrite  (  $logFile, $string);
$student=$_SESSION["tA_StudentName"];
$string="\$_SESSION['tA_StudentName']=".$_SESSION["tA_StudentName"]."\n";
fwrite  (  $logFile, $string);
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>
<!DOCTYPE html>
<html>
<head>
<title>One Digit Addition</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./css/one_digit_addition_vertical_clues.css"/>
<link rel="stylesheet" type="text/css" href="/jimfuqua/tutor/css/quit_valid.css"/>
<script src="http://localhost/jimfuqua/tutor/src/scripts/jquery.js"></script>
<script><?php require 'scripts/one_digit_addition_vertical_clues.js.php';?></script>

</script>
</head>

<body>
    <div>
        <a id='quit_button_top_left' href='javascript:window.close()'><img id='image-exit' src='/jimfuqua/tutor/images/stop2.gif' alt='Quit'/></a>
        <a id="help_button" href="fHelp()"><img id="image-help" src="/jimfuqua/tutor/images/Help.png" alt="help"/></a>
    </div>
    <div id = 'clues'>
        <div id = 'clues_1'></div>
        <div id = 'clue_operator'>+</div>
        <div id = 'clues_2'></div>
    </div>
    <div  id='MathProblem'>
    <hr   id='bottom_line' />
    <span id='UnitsDigitOne' ></span>
	<span id='operator'	 >+</span>
	<span id='UnitsDigitTwo'  ></span>
	<span id='equal_symbol'	 >=</span>
	<span id='SumDigit'  >?</span>
	<span id='smiley'  >
        <img id="smiley-face2" src="/jimfuqua/tutor/images/smiley-face2.png" alt='smiley-face'/>
	</span>

    </div>
<div id="dialog-message" title="Download complete"></div>

<table id="LessonsDone"  >
<tr><td id='Lesson1' style="background:#CCFFFF  ">&nbsp;</td></tr>
<tr><td id='Lesson2' style="background:#CCFFFF; ">&nbsp;</td></tr>
<tr><td id='Lesson3' style="background:#CCFFFF; ">&nbsp;</td></tr>
<tr><td id='Lesson4' style="background:#CCFFFF; ">&nbsp;</td></tr>
<tr><td id='Lesson5' style="background:#CCFFFF; ">&nbsp;</td></tr>
</table>

<div id='number_pad'>
<div>
<input id='Button_0' tabindex = '6' type='button' value='0'  class='number_button'  />
<input id='Button_1' tabindex = '6' type='button' value='1'  class='number_button'  />
<input id='Button_2' tabindex = '6' type='button' value='2'  class='number_button'  />
<input id='Button_3' tabindex = '6' type='button' value='3'  class='number_button'  />
<input id='Button_4' tabindex = '6' type='button' value='4'  class='number_button'  />
<input id='Button_5' tabindex = '6' type='button' value='5'  class='number_button'  />
<input id='Button_6' tabindex = '6' type='button' value='6'  class='number_button'  />
<input id='Button_7' tabindex = '6' type='button' value='7'  class='number_button'  />
<input id='Button_8' tabindex = '6' type='button' value='8'  class='number_button'  />
<input id='Button_9' tabindex = '6' type='button' value='9'  class='number_button'  />
</div>
<div>
<input id='Button_10' tabindex = '6' type='button' value='10'  class='number_button'  />
<input id='Button_11' tabindex = '6' type='button' value='11'  class='number_button'  />
<input id='Button_12' tabindex = '6' type='button' value='12'  class='number_button'  />
<input id='Button_13' tabindex = '6' type='button' value='13'  class='number_button'  />
<input id='Button_14' tabindex = '6' type='button' value='14'  class='number_button'  />
<input id='Button_15' tabindex = '6' type='button' value='15'  class='number_button'  />
<input id='Button_16' tabindex = '6' type='button' value='16'  class='number_button'  />
<input id='Button_17' tabindex = '6' type='button' value='17'  class='number_button'  />
<input id='Button_18' tabindex = '6' type='button' value='18'  class='number_button'  />
<input id='Button_'   tabindex = '6' type='button' value='?'  class='number_button'   />
</div>
</div>

<div id="container" title="Error"></div>
</body>
</html>
