<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['page'] = 'Typing_lessons_cl.php in frame in container.php ';
$_SESSION['tC_ServerTimeStarted'] = time() + 0;
$logFile = fopen('/var/www/html/jimfuqua/tutor/logs/typing_lessons_cl.txt', 'w');
$str = "\nTyping_lessons_cl.php \n";
fwrite($logFile, $str);
$str = "\$_SESSION['session_id']=".session_id()."\n";
fwrite($logFile, $str);
$v = var_export($_SESSION, true);
$string = "\n".__LINE__.' $_SESSION = '.$v;
fwrite($logFile, $string."\n\n");
 // Insure that include files are included. ***************************

$filename = '../../css/quit_valid.css';
if (!file_exists($filename)) {
    $string = 'Missing critical file -- quit_valid.css';
    trigger_error($string, E_USER_ERROR);
}
$filename = '../../src/scripts/jquery.js';
if (!file_exists($filename)) {
    $string = 'Missing critical file -- jquery.js';
    trigger_error($string, E_USER_ERROR);
}

//require_once "/var/www/tutor/lib/lib_lesson_header.php";
// End -- Insure that include files are included. ***************************

$selected_student = $_SESSION['tA_StudentName'];
//$_SESSION['views'] = $_SESSION['views'] + 1;
$lesson_no = $_SESSION['tA_StartRec'];
//$gA_assignment_name=$_SESSION['gA_assignment_name']
?>
<!DOCTYPE html>
<html>
<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<title>Typing Lesson</title>
<!-- Author: Jim Fuqua  Jim@Jim-Fuqua.com
ToDo:     -->
<link rel="stylesheet" type="text/css" href="./css/master.css" media='screen'/>
<link rel="stylesheet" type="text/css" href="../../css/quit_valid.css" media='screen' />
<link rel="stylesheet" type="text/css" href="./css/typing_lessons_cl.css"  media='screen' />
<script src="http://localhost/jimfuqua/tutor/src/scripts/jquery.js" ></script>
<!--<script src="./scripts/xxxxxxxxxxxxxxxxxxjquery.url.js" type="text/javascript"></script>
<script src="/tutor/scripts/jquery.form.js" ></script>
<script src="./scripts/typing_single_template_js.php"></script>-->
<script><?php require 'scripts/typing_single_template.js.php';?></script>
</head>

<body>

<div>
    <span>
    <a id='quit_button_top_left' href='javascript:close_window()'>
      <img id='image-exit' src='./images/stop2.gif' alt='Quit'/></a>
    <a id="help_button" href="javascript:fHelp()">
      <img id="image-help" src="./images/help.png" alt="help"/></a>
    </span>
</div>

<div id="Title1" >Title</div>
<div id="student_identifier"><p><?php if (isset($_SESSION['tA_StudentName'])) {
    echo $_SESSION['tA_StudentName'];
} else {
    echo 'Unknown Student';
}?></p></div>
<form id="myform" autocomplete="off"  method="post" action="dummy.php">
<!--<form id="myform" method="post" action="dummy.php">-->
<div id="center_div" >
    <table id="typing_lesson_display"> <!--Encloses six typing lines contained in divs.-->
        <tr class="line_display">
            <td class='displayLine'>
            <input type="text"
                   class="InputLines" id="displayLine1" name="displayLine1"  tabindex="0" maxlength="44" /></td>
            <td><input type="text"
                       class="Labels"     id="WPM"          tabindex="0" value="WPM" maxlength="3"    /></td>
            <td class='Errors'>
                <input type="text"
                       class="Labels"     id="Error"        tabindex="0" value="Error" maxlength="5"  /></td>
        </tr>
        <tr class="line_display">
            <td class='displayLine'>
              <input type="text"
                     class="InputLines"  id="txt1a" name="txt1a" tabindex="1"          maxlength="44" /></td>
            <td class='td_WPM'>
              <input type="text"
                     class="WPM" id="wpm1a" name="wpm1a" tabindex="0"  value='' maxlength="3"  /></td>
            <td class='td_Errors'>
              <input type="text"
                     class="Errors_made" id="err1a" name="err1a" tabindex="0"  value="" maxlength="3"  /></td>
        </tr>
        <tr class="line_display">
            <td class='displayLine'>
              <input type="text"
                     class="InputLines"
                     id="txt1b"
                     name="txt1b"
                     tabindex="1"
                     maxlength="44"
                     />
            </td>
            <td class='td_WPM'>
              <input type="text"
                     class="WPM"
                     id="wpm1b"
                     name="wpm1b"
                     tabindex="0"
                     value=""
                     maxlength="3"
              />
          </td>
            <td class='td_Errors'>
              <input type="text"
                     class="Errors_made"
                     id="err1b"
                     name="err1b"
                     tabindex="0"
                     value=""
                     maxlength="3"
                     />
           </td>
        </tr>
        <tr class="line_display">
            <td class='displayLine'>
              <input type="text"
                     class="InputLines"
                     id="txt1c"
                     name="txt1c"
                     tabindex="1"
                     maxlength="44"
              />
            </td>
            <td class='td_WPM'>
              <input type="text"
                     class="WPM"
                     id="wpm1c"
                     name="wpm1c"
                     tabindex="0"
                     value=''
                     maxlength="3"
              />
            </td>
            <td class='td_Errors'>
              <input type="text"
                     class="Errors_made"
                     id="err1c"
                     name="err1c"
                     tabindex="0"
                     value=""
                     maxlength="3"
              />
           </td>
        </tr>
        <tr class="line_display">
            <td class='displayLine'>
              <input type="text"
                     class="InputLines"
                     id="txt1d"
                     name="txt1d"
                     tabindex="1"
                     maxlength="44"
              />
            </td>
            <td class='td_WPM'>
              <input type="text"
                     class="WPM"
                     id="wpm1d"
                     name="wpm1d"
                     tabindex="0"
                     value=''
                     maxlength="3"
              />
            </td>
            <td class='td_Errors'>
              <input type="text"
                     class="Errors_made"
                     id="err1d"
                     name="err1d"
                     tabindex="0"
                     value=""
                     maxlength="3"
              />
            </td>
        </tr>
        <tr class="line_display">
            <td class='displayLine'>
              <input type="text"
                     class="InputLines"
                     id="txt1e"
                     name="txt1e"
                     tabindex="1"
                     maxlength="44"
              />
            </td>
            <td class='td_WPM'>
              <input type="text"
                     class="WPM"
                     id="wpm1e"
                     name="wpm1e"
                     tabindex="0"
                     value=''
                     maxlength="3"
              />
            </td>
            <td class='td_Errors'>
              <input type="text"
                     class="Errors_made"
                     id="err1e"
                     name="err1e"
                     tabindex="0"
                     value=""
                     maxlength="3"
              />
          </td>
        </tr>
    </table><!--typing_lesson_display-->

<div id="BottomData" >
    <div id='bottom_line_1'>
            <label id="cklabel"  for="CorrectKeyStrokes" >Correct key strokes:</label>
            <input type="text"
                   class="data centered"
                   id="CorrectKeyStrokes"
                   name="CorrectKeyStrokes"
                   tabindex="0"
                   value='0'
                   maxlength="3"
            />
            <label id="KSSlabel" for="KSSecond" >Strokes/sec:</label>
            <input type="text"
                   class="data centered"
                   id="KSSecond"
                   name="KSSecond"
                   tabindex="0"
                   value=''
                   maxlength="1"
            />
            <label id="WPMLabel" for="AverageSpeed" >WPM:</label>
            <input type="text"
                   class="data centered"
                   id="AverageSpeed"
                   name="AverageSpeed"
                   tabindex="0"
                   value=''
                   maxlength="3"
            />
            <label id="TErrorslabel" for="t_err" >Errors:</label>
            <input type="text"
                   class="data centered"
                   id="t_err"
                   name="t_err"
                   tabindex="0"
                   value=''
                   maxlength="2"
            />
    </div>
    <div id='bottom_line_2'>
            <label id="ElapsedTimeLabel"  for="Time_Working">Elapsed Time:</label>
            <input type="text"
                   class="data centered"
                   id="Time_Working"
                   name="Time_Working"
                   tabindex="0"
                   value=''
                   maxlength="4"
            />
            <label id="Date_DisplayLabel"  for="Date_Display">Date Time:</label>
            <input type="text"
                   class="data centered"
                   id="Date_Display"
                   name="Date_Display"
                   tabindex="0"
                   value=''
                   maxlength="24"
            />
        </div>
</div> <!--id="BottomData"-->
</div><!--id="center_div"-->
<div id="modal_window">

</div>

<div><span id="myspan">&#160;</span></div>

<div id="Hide">
    <input type="text" class="park" id="park" name="park" tabindex="1" />
    <input type="hidden" id="LineNo" name="LineNo" tabindex="100" value="" />
    <input type="hidden" id="L1_WPM"  tabindex="100" />
    <input type="hidden" id="L2_WPM"  tabindex="100" />
    <input type="hidden" id="L3_WPM"  tabindex="100" />
    <input type="hidden" id="L4_WPM"  tabindex="100" />
    <input type="hidden" id="L5_WPM"  tabindex="100" />
    <input type="hidden" id="L1_err"  tabindex="100" />
    <input type="hidden" id="L2_err"  tabindex="100" />
    <input type="hidden" id="L3_err"  tabindex="100" />
    <input type="hidden" id="L4_err"  tabindex="100" />
    <input type="hidden" id="L5_err"  tabindex="100" />
    <input type="hidden" id="Student_Id" value="" tabindex="100" />
    <input type="hidden" id="tA_StudentName" value="" tabindex="100" />
    <input type="hidden" id="Data_Form" value="Typing_Single_Template.html" tabindex="100" />
    <input type="hidden" id="Data_File" value="" tabindex="100" />
    <input type="hidden" id="Answer_Correct" value="" tabindex="100" />
    <input type="hidden" id="Date_Done" value="" tabindex="100" />
    <input type="hidden" id="Time_In" value="" tabindex="100" />
    <input type="hidden" id="Teacher" value="Ellen Fuqua" tabindex="100" />
    <input type="hidden" id="State" value="TN" tabindex="100" />
    <input type="hidden" id="County" value="" tabindex="100" />
    <input type="hidden" id="School" value="" tabindex="100" />
    <input type="hidden" id="School_System" value="" tabindex="100" />
    <input type="hidden" id="lesson_index" value='<?php $_SESSION['tA_StartRec'] ?>' tabindex="100" />
  </div><!--id="Hide"-->
 </form>
 <div id="next_lesson" ><button id='bnext_lesson'>Next Lesson</button></div>
</body>
</html>
