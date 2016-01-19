/*<?php
session_start();
header('Content-type: text/javascript');
$_SESSION['tC_ClientTimeStarted'] = time()+0;
$_SESSION["tC_ServerTimeStarted"] = time()+0;
//$logFile = fopen("/var/www/tutor/logs/LeftRight_js", "w");
$v = var_export($_SESSION, true);
//fwrite($logFile, "5 LeftRight_js\n\n \$_SESSION below:\n " .  $v . " \n");
?>
*/
// if got here from roster $_SESSION["tA_StudentName"] will not be set and
// must be set from post data.
var Answer_Correct,
    errors_made = 0,
    tC_ClientTimeStarted = (new Date()).getTime(),
    server_time_started = <?php echo $_SESSION["tC_ServerTimeStarted"] ?>,
    today = new Date(),
    tC_Question_and_Response,
    tC_Time_client_processed_answer = today.getTime(),
    tC_More_data_about_response = "";

$(document).ready(function () {
    'use strict';
    //$.get("http://localhost/tutor/scripts/js_logger.php", { info: "line49 LeftRight_js.php"} );
    var randomnumber;
    tC_ClientTimeStarted = new Date().getTime();
    Answer_Correct = null;
    randomnumber = Math.floor(Math.random() * 2);
    if (randomnumber === 1) {  // left is the correct answer.
        $("#instruction_h1").html('Click in the block on the left side of the screen.');
        tC_Question_and_Response = "Left";
    } else {  // right is the correct answer and randomunumber === 0
        $("#instruction_h1").html('Click in the block on the right side of the screen.');
        tC_Question_and_Response = "Right";
    }

    $('#quit_button_top_left').click(function () {
        alert('Press Alt-F4 to close any window. ');
    });

    function exit_from_lesson() {
        // THIS IS THE EXIT FROM THIS LESSON
        document.location.href = "/tutor/scripts/cAssignment_get_next_lesson.php";
    }

    function tCompleted_entry() {
        var question_and_response, post_string, post_to;
        question_and_response = $("#instruction_h1").text();
        post_string = {
            "tC_Correct" : Answer_Correct,
            "tC_ClientTimeStarted": tC_ClientTimeStarted,
            "tC_Time_client_processed_answer" : (new Date()).getTime(),
            "tC_Question_and_Response" : question_and_response,
            "tC_More_data_about_response" : "none",
            "tA_ErrorsMade" : errors_made
        };
        post_to = "http://localhost/tutor/scripts/update_tCompleted.php";
        // this creates a new entry in tCompleted.
        $.post(post_to, post_string);
        //$.get("http://localhost/tutor/scripts/js_logger.php", "info:'line56 LeftRight_js.php'");
    }

    function adjust_tARepsTowardM($new_value) {
        var post_to = "http://localhost/tutor/scripts/update_tAssignments.php",
            post_string = {"tA_RepsTowardM" : $new_value};
        // Change tA_RepsTowardM.  Increment by 1 or reset to 0.
        $.post(post_to, post_string);
    }

    $('#left').click(function () {
        if (randomnumber === 1) {  // correct
            Answer_Correct = 1;
            $("#c3").each(function () {
                //this.play();  // won't happen because exit is too fast.
                //alert('Correct!');  // delay for sound to complete.
            });
            tCompleted_entry();
            adjust_tARepsTowardM("Plus1");
            $.get("http://localhost/tutor/scripts/js_log_session_variables.php");
            exit_from_lesson();
        } else {  // error
            $("#ohoh").each(function () {
                this.play();
                alert('Error - You clicked on the box on the left block. Try again.');
            });
            Answer_Correct = 0;
            $.post("http://localhost/tutor/scripts/increment_tA_ErrorsMade.php");
            $.post("http://localhost/tutor/scripts/tA_set_RepsTowardM_to_zero.php");
        }
    });

    $('#right').click(function () {
        if (randomnumber === 1) { // error
            $("#ohoh").each(function () {
                this.play();
                alert('Error - You clicked on the box on the right box. Try again.');
            });
            Answer_Correct = 0;
            $.post("http://localhost/tutor/scripts/increment_tA_ErrorsMade.php");
            $.post("http://localhost/tutor/scripts/tA_set_RepsTowardM_to_zero.php");
        } else {  // correct
            Answer_Correct = 1;
            $("#c3").each(function () {
                //this.play();
                // will not play without a delay.  Alert will cause a delay.
                // Sound not essential for a correct answer.
                // alert('Correct!');
            });
            tCompleted_entry();
            adjust_tARepsTowardM("Plus1");
            //$.get("http://localhost/tutor/scripts/js_log_session_variables.php");
            exit_from_lesson();
        }
    });
});

