<?php
require '../../scripts/basic_vars_lesson_js_PHP';
require '../../scripts/f_exit_from_lesson_js_PHP';
require '../../scripts/f_record_answer_js_PHP';
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
