/*<?php
session_start();
header('Content-type: text/javascript');
$_SESSION['tC_ClientTimeStarted'] = time()+0;
$_SESSION["tC_ServerTimeStarted"] = time()+0;
//$logFile = fopen("/var/www/tutor/logs/LeftRight_js", "w");
$v = var_export($_SESSION, true);
//fwrite($logFile, "5 LeftRight_js\n\n \$_SESSION below:\n " .  $v . " \n");
?> */
// if got here from roster $_SESSION["tA_StudentName"] will not be set and
// must be set from post data.
var Answer_Correct,
    errors_made = 0,
    tC_ClientTimeStarted = (new Date()).getTime(),
    server_time_started = <?php echo $_SESSION["tC_ServerTimeStarted"] ?>,
    today = new Date(),
    tC_Question_and_Response,
    tC_Time_client_processed_answer = today.getTime(),
    tC_More_data_about_response = "",
    first_pass = true;

function construct_question() {
    'use strict';
    var randomnumber;
    tC_ClientTimeStarted = new Date().getTime();
    Answer_Correct = null;
    randomnumber = Math.floor(Math.random() * 2);
    //alert("randomnumber = " + randomnumber);
    if (randomnumber === 1) {  // left is the correct answer.
        $("#instructions").html('Click your left mouse button.');
        tC_Question_and_Response = "Left";
    } else {  // right is the correct answer and randomunumber === 0
        $("#instructions").html('Click your right mouse button.');
        tC_Question_and_Response = "Right";
    }
}

function exit_from_lesson() {
    'use strict';
    // THIS IS THE EXIT FROM THIS LESSON
    document.location.href = "/tutor/scripts/cAssignment_get_next_lesson.php";
}

function adjust_tARepsTowardM(new_value) {
    'use strict';
    var post_to = "http://localhost/tutor/scripts/update_tAssignments.php",
        post_string = {"tA_RepsTowardM" : new_value,
                        "lesson_id" : lesson_id,
                        "sender" : "horizontal_vertical_diagnonal"};
    $.post(post_to, post_string);
}

function record_correct() {
    'use strict';
    var post_to = "http://localhost/tutor/scripts/update_tCompleted.php",
        Answer_Correct = true,
        post_string = {
            "tC_Correct" : Answer_Correct,
            "tC_ClientTimeStarted": tC_ClientTimeStarted,
            "tC_Time_client_processed_answer" : (new Date()).getTime(),
            "tC_Question_and_Response" : tC_Question_and_Response,
            "tC_More_data_about_response" : "none",
            "tA_ErrorsMade" : errors_made
        };
    $.post(post_to, post_string);
    // this creates a new entry in tCompleted.
    adjust_tARepsTowardM("Plus1");
    exit_from_lesson();
}

function record_error() {
    'use strict';
    $("#ohoh").each(function () {
        this.play();
        alert('Error - You clicked the right mouse button. Try again.');
    });
    Answer_Correct = 0;
    $.post("http://localhost/tutor/scripts/increment_tA_ErrorsMade.php");
    adjust_tARepsTowardM(Answer_Correct)
}

$(document).ready(function () {
    'use strict';
    // kill context menu.
    $('body').bind('contextmenu', function (e) {
        e.preventDefault();
    });
    construct_question();
    $('body').mousedown(function (event) {
        switch (event.which) {
        case 1:
            //alert('Left mouse button pressed');
            if (tC_Question_and_Response === "Left") {
                Answer_Correct = true;
                record_correct();
            } else {
                Answer_Correct = false;
                record_error();
            }
            break;
        case 2:
            alert('Middle mouse button pressed');
            break;
        case 3:
            //alert('Right mouse button pressed');
            if (tC_Question_and_Response === "Right") {
                Answer_Correct = true;
                record_correct();
            } else {
                Answer_Correct = false;
                record_error();
            }
            break;
        default:
            alert('You have a strange mouse');
        }
        if (Answer_Correct === true) {
            //alert('correct');
            /*    $("#c3").each(function () {
                this.play();
                // will not play without a delay.  Alert will cause a delay.
                // Sound not essential for a correct answer.
                //alert('Correct!');
                });
            tCompleted_entry();
            adjust_tARepsTowardM("Plus1");
            //$.get("http://localhost/tutor/scripts/js_log_session_variables.php");
            exit_from_lesson();
            }
            return false;*/
        } else {
            //alert("error");
        }
    });
});

