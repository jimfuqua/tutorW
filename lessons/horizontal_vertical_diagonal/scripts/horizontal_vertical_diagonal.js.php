<?php
$_SESSION["tC_ClientTimeStarted"] = time()+0;
$_SESSION["tC_ServerTimeStarted"] = time()+0;
//$logFile = fopen("/var/www/html/jimfuqua/tutor/logs/horizontal_vertical_diagnonal_js", "w");
// This data is erroneous on first lesson after login.
//$v = var_export($_SESSION, true);
//    fwrite($logFile, "\n" .  __LINE__ . ' horizontal_vertical_diagnonal_js $_SESSION =:' .  $v . " \n");
$random_mnumber = rand (1 , 6);
?>
/*eslint-env browser, jquery */
/*eslint camelcase: 0 no-alert:1 */
/*global $:0, Dialog:0 */
var Answer_Correct;
var tC_ClientTimeStarted = new Date().getTime();
// PHP insertions must be quoted.
var tA_StudentName =  "<?php echo $_SESSION['tA_StudentName']; ?>";
var session_id = "<?php echo session_id(); ?>";
var tC_ServerTimeStarted = "<?php echo $_SESSION['tC_ServerTimeStarted']; ?>";
var tA_StopRec = "<?php echo $_SESSION['tA_StopRec']; ?>";
var tA_StartRec = "<?php echo $_SESSION['tA_StartRec']; ?>";
var tG_AssignmentName = "<?php echo $_SESSION['tG_AssignmentName']; ?>";
var tA_id   = "<?php echo $_SESSION['tA_id']; ?>";
var tC_More_data_about_response = "";
var tC_Question_and_Response = "";
var direction="";
var errors_made = 0;
var data_out =[];
var c;
var ctx;
var CorrectAnswer;


function exit_from_lesson() {
    'use strict';
    // THIS IS THE EXIT FROM THIS LESSON
    $.post(
    "http://localhost/jimfuqua/tutor/src/scripts/cAssignment_get_next_lesson.php", data_out).
    done(function( returned_data ) {
         // alert( "returned_data Loaded: " + returned_data );
         document.location.href = returned_data;
     });
}

function record_answer(result) {
    'use strict';
    // data_out will have fields for both tCompleted and tAssignments.
    // Those programs should ignore unneeded data fields.
    data_out = {
            tA_S_ID : "<?php echo $_SESSION['tA_S_ID']; ?>",
            tA_id : "<?php echo $_SESSION['tA_id']; ?>",
            tA_StudentName: "<?php echo $_SESSION['tA_StudentName']; ?>",
            session_id: "<?php echo $_SESSION['session_id']; ?>",
            tG_AssignmentName: 'gA_GearsRotationDirection',
            tA_StartRec: "<?php echo $_SESSION['tA_StartRec']; ?>",
            tA_StopRec: "<?php echo $_SESSION['tA_StopRec']; ?>",
            tC_ServerTimeStarted: "<?php echo $_SESSION['tC_ServerTimeStarted']; ?>",
            sender : "GearsRotationDirection.php",
            tC_Correct : result,
            tC_ClientTimeStarted : tC_ClientTimeStarted,
            tC_Time_client_processed_answer : Date.now(),
            tC_Question_and_Response : tC_Question_and_Response,
            tC_More_data_about_response : tC_More_data_about_response,
            tA_ErrorsMade : errors_made,
            tA_LocalDateTime : Math.floor(Date.now() / 1000) // Get rid of milliseconds.
        };

    if (result === 1) {
        data_out.tA_RepsTowardM = "Plus1";
    } else {
        data_out.tA_RepsTowardM = "0";
        data_out.tA_ErrorsMade = "Plus1";
    }

// Update tCompleted and tAssignments.php.
    var post_to_update_tA_tC = "http://localhost/jimfuqua/tutor/src/scripts/update_tA_tC.php";
    $.post(post_to_update_tA_tC, data_out, function post_to_update_tA_tC (data, status) {
        // alert("Data: " + data_out + "\nStatus: " + status);
    });

}// end function record_answer

$("#quit_button_top_left").click(function quit_button () {
    "use strict";
    alert("Press Alt-F4 to close any window. ");
});

function onClick(event) {
    "use strict";
    var AnswerCorrect;
    var buttonClicked = event.target.id;
    console.log("buttonClicked = " + buttonClicked);
    AnswerCorrect = (buttonClicked === CorrectAnswer);
    if (AnswerCorrect === true) {
        record_answer(AnswerCorrect);
        exit_from_lesson();
    } else {
      $(".ohoh").each(function check_answer_error () {
          //$(".error_notice_div").html("<p>The rotation is " + $(".rotation").val() + "</p>");
          $(".ErrorMsg").html("<p>The orientation is " + CorrectAnswer + ".</p>");
          dialog.showModal();
          this.play();
      });
      record_answer(AnswerCorrect);
    }
    return false;
}

function shuffleButtons() {
    "use strict";
    var randomNumber = Math.floor((Math.random() * 4) + 1);
     //  Default is H,V,D
    console.log("randomNumber = " + randomNumber);
    if (randomNumber === 1) { // vertical first
        $("#horizontal_button").insertAfter("#vertical_button"); // V,H,D
        $("#diagonal_button").insertAfter("#horizontal_button");
    }
    if (randomNumber === 2) { //
        $("#horizontal_button").insertAfter("#diagonal_button"); // V,D,H
        $("#diagonal_button").insertAfter("#vertical_button");
    }
    if (randomNumber === 3) { //
        $("#horizontal_button").insertAfter("#diagonal_button"); // D,H,V
        $("#vertical_button").insertAfter("#vertical_horizontal");
    }
}

function drawVerticalLine() {
    "use strict";
    // Draw a vertical line.
    //var ctx;
    ctx.beginPath();
    ctx.moveTo(130, 0);
    ctx.lineTo(130, 260);
    ctx.strokeStyle = "#FF0000";
    ctx.lineWidth = 5;
    ctx.stroke();
    CorrectAnswer = "vertical";
}

function drawHorizontalLine() {
    "use strict";
    // Draw a horizontal line.
    //var ctx;
    ctx.beginPath();
    ctx.moveTo(0, 130);
    ctx.lineTo(260, 130);
    ctx.strokeStyle = "#FF0000";
    ctx.lineWidth = 5;
    ctx.stroke();
    CorrectAnswer = "horizontal";
}

function drawDiagonalBackslashLine() {
    "use strict";
    // Draw a diagonal backslash line.
    //var ctx;
    ctx.beginPath();
    ctx.moveTo(0, 0);
    ctx.lineTo(260, 260);
    ctx.strokeStyle = "#FF0000";
    ctx.lineWidth = 5;
    ctx.stroke();
    CorrectAnswer = "diagonal";
}

function drawDiagonalFrontslashLine() {
    "use strict";
        // Draw a diagonal front slash line.
        //var ctx;
        ctx.beginPath();
        ctx.moveTo(260, 0);
        ctx.lineTo(0, 260);
        ctx.strokeStyle = "#FF0000";
        ctx.lineWidth = 5;
        ctx.stroke();
        CorrectAnswer = "diagonal";
}

function displayLesson(randomNumber) {
    "use strict";
    console.log("146 randomNumber = " + randomNumber);

    ctx.fillStyle = "#5F9EA0"; /*CadetBlue*/
    ctx.fillStyle = "#9ea7b8";

    if (randomNumber === 1) {        // vertical is the correct answer.
        drawVerticalLine();
    } else if (randomNumber === 2) { // vertical is the correct answer.
        drawVerticalLine();
    } else if (randomNumber === 3) { // horizontal is the correct answer.
        drawHorizontalLine();
    } else if (randomNumber === 4) { // horizontal is the correct answer.
        drawHorizontalLine();
    } else if (randomNumber === 5) { // diagonal is the correct answer.
        drawDiagonalBackslashLine();
    } else if (randomNumber === 6) { // diagonal is the correct answer.
        drawDiagonalFrontslashLine();
    }
}

$(document).ready(function documentReady () {
    "use strict";
    c = document.getElementById("myCanvas"),
    ctx = c.getContext("2d");
    displayLesson(parseInt('<?php echo $random_mnumber ?>'));
    $("#audio1").attr("src", "./sounds/is_the_line_horizontal_vertical_or_diagonal.ogg");
    $("#audio1").attr("autoplay", "true");
    $("#answer_buttons").click(this, onClick);
    $(".okay").click(
        function close_dialog() {
            dialog.close();
        }
    );
    shuffleButtons();
});
