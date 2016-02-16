<?php
//$log_file = fopen('/var/www/html/jimfuqua/tutor/logs/Gears.js.php.log', 'w');
//$v = var_export($_SESSION, true);
//$string = __LINE__.' $_SESSION = '.$v."\n\n";
//fwrite($log_file, $string);
?>
<?php
require '../../scripts/basic_vars_lesson_js_PHP';
require '../../scripts/f_exit_from_lesson_js_PHP';
require '../../scripts/f_record_answer_js_PHP';
?>
var rotation_direction;
var i1;
var direction;

function check_answer(direction) {
    'use strict';
    if (direction === true) {  // Correct answer.
        $(".c3").each(function check_answer_correct () {
            this.play();
            Answer_Correct = 1;  // MySQL stores true as 1 or anything but 0.
            record_answer(Answer_Correct);
            exit_from_lesson();
        });
    } else {
        $(".ohoh").each(function check_answer_error () {
            //$(".error_notice_div").html("<p>The rotation is " + $(".rotation").val() + "</p>");
            $(".ErrorMsg").html("<p>The rotation is " + $(".rotation").val() + "</p>");
            dialog.showModal();
            this.play();
        });
        Answer_Correct = 0;  // MySQL stores true as 1 or anything but 0.
        record_answer(Answer_Correct);

    }
}  // end function check_answer

function change_rotation_direction() {
    'use strict';
    i2 = $(".image2_saddlebrown").css('-webkit-animation');
    i1 = $(".image1_maroon").css('-webkit-animation');

    $(".image1_maroon").css('-webkit-animation', i2);
    $(".image2_saddlebrown").css('-webkit-animation', i1);

    // Changes to opposite rotation.
    if (rotation_direction === "clockwise") {
        rotation_direction = "counter_clockwise";
    } else {
        rotation_direction = "clockwise";
    }
}

$(document).ready(function document_ready () {
    "use strict";
    var message = '';
    var left_rotation_direction;
    var right_rotation_direction;
    $(".student_identifier").html("<?php echo $_SESSION['tA_StudentName']; ?>");

    rotation_direction = $("#rotation").val();
    rotation_direction = rotation_direction.trim();
    tC_Question_and_Response = rotation_direction;
    message = "Click on the gear turning " + rotation_direction + '.';
    message = message.trim();
    $('.message').text(message);

    i1 = $(".image1_maroon").css('-webkit-animation');

    if (i1.substring(0, 5) === 'spinR') {
        left_rotation_direction  = 'counterclockwise';
        right_rotation_direction = 'clockwise';
    } else {
        left_rotation_direction  = 'clockwise';
        right_rotation_direction = 'counterclockwise';
    }

    $(".target1").click(
        function click_target_1 () {
            if (left_rotation_direction === rotation_direction) {
                direction = true;
            } else {
                direction = false;
            }
            check_answer(direction);
        }
    );

    $(".target2").click(
        function click_target_2 () {
            if (right_rotation_direction === rotation_direction) {
                direction = true;
            } else {
                direction = false;
            }
            check_answer(direction);
        }
    );

    //dialog.close();
    $(".okay").click(
        function close_dialog() {
            dialog.close();
        }
    );

    $('.quit_button_top_left').click(function () {
        alert('Press Alt-F4 to close any window.');
    });
});
