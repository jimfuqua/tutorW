<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../scripts/basic_vars_lesson_js_PHP';
require '../../scripts/f_exit_from_lesson_js_PHP';
require '../../scripts/f_record_answer_js_PHP';
?>

$(document).ready(function () {
    'use strict';

    var randomnumber, soundHandleCorrect, soundHandleError;
    tC_ClientTimeStarted = new Date().getTime();
    Answer_Correct = null;

    // Generate Lesson
    randomnumber = Math.floor(Math.random() * 2);
    if (randomnumber === 1) {  // left is the correct answer.
        $("#instruction_h1").html('Click in the block on the left side of the screen.');
        tC_Question_and_Response = "Left";
    } else {  // right is the correct answer and randomunumber === 0
        $("#instruction_h1").html('Click in the block on the right side of the screen.');
        tC_Question_and_Response = "Right";
    }

    soundHandleCorrect = document.getElementById('soundHandleCorrect');
    soundHandleError = document.getElementById('soundHandleError');

    $('#error_notice_div').click(function () {
        $('#error_notice_div').hide();
        $("#outer_error_notice_div").hide();
        $('#error_notice_div').empty();
    });

    $('#left').click(function () {
        if (randomnumber === 1) { // correct
            soundHandleCorrect.src = "../../sounds/c3.wav";
            soundHandleCorrect.play();
            Answer_Correct = 1;  // MySQL stores true as 1 or anything but 0.
            errors_made = 0;
            record_answer(Answer_Correct);
            exit_from_lesson();
        } else {  // error
            $("#error_notice_div").append(
            "<p>Error - You clicked on the box on the <b>left</b> side.</p><p>Click me to close me.</p>");
            $("#error_notice_div").show();
            $("#outer_error_notice_div").show();
            soundHandleError.src = "../../sounds/ohoh.wav";
            soundHandleError.play();
            Answer_Correct = 0;  // MySQL stores true as 1 or anything but 0.
            record_answer(Answer_Correct);
            $.post("../../src/scripts/increment_tA_ErrorsMade.php");
        }
        record_answer(Answer_Correct);
    });//function

   $('#right').click(function () {
        if (randomnumber === 1) {
            // error
            $("#error_notice_div").append(
            "<p>Error - You clicked on the box on the <b>right</b> side.</p></p><p>Click me to close me.</p>");
            $("#error_notice_div").show();
            $("#outer_error_notice_div").show();
            soundHandleError.src = "../../sounds/ohoh.wav";
            soundHandleError.play();
            Answer_Correct = 0;  // MySQL stores true as 1 or anything but 0.
            record_answer(Answer_Correct);
        } else {
            if (randomnumber === 0) {
                // correct
                soundHandleCorrect.src = "../../sounds/c3.wav";
                soundHandleCorrect.play();
                // MySQL stores true as 1 or anything but 0.
                Answer_Correct = 1;
                record_answer(Answer_Correct);
                exit_from_lesson();
            }//if
        } //else
    });  //function
}); //ready
