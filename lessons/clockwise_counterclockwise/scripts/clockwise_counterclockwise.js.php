<?php
require '/var/www/html/jimfuqua/tutor/src/scripts/basic_vars_lesson_js_PHP';
require '/var/www/html/jimfuqua/tutor/src/scripts/f_exit_from_lesson_js_PHP';
require '/var/www/html/jimfuqua/tutor/src/scripts/f_record_answer_js_PHP';
?>
var direction="";

function check_answer( direction ) {
    "use strict";
    var dialog = document.getElementById("dialog"),
        okay = document.getElementById("okay");

    okay.onclick = function(){ dialog.close(); };

    if ( $( "#rotation" ).val() === direction ) {  // Correct answer.
        $( "#c3" ).each( function() {
            this.play();
            Answer_Correct = 1;  // MySQL stores TRUE as 1 or anything but 0.
            record_answer( Answer_Correct );
            exit_from_lesson();
        } );
    } else {
        $( "#ohoh" ).each( function() {
            $( "#ErrorMsg" ).html( "<p>The rotation is " + $( "#rotation" ).val() + "</p>" );
            this.play();
            dialog.showModal();
        } );
        Answer_Correct = 0;  // MySQL stores TRUE as 1 or anything but 0.
        record_answer( Answer_Correct );
        //exit_from_lesson();

    }
}  // end function check_answer

$( document ).ready( function() {
    "use strict";
    //var dialog = document.getElementById("Dialog").style.visibility = "hidden";
    $( "#student_identifier" ).html( tA_StudentName );
    direction = $( "#rotation" ).val();  // Stored by PHP in main page.
    tC_Question_and_Response = direction;
    tC_ClientTimeStarted = new Date().getTime();
    Answer_Correct = null;

    $( "#okay" ).click(
        function () {
            Dialog.close();
        }
    );

    $("#bClockwise").click(
        function () {
            check_answer("clockwise");
        }
    );
    $( "#bCounterclockwise" ).click(
        function () {
            check_answer("counterclockwise");

        }
    );

}
);
