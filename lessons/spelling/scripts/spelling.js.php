<?php
//$log_file = fopen('/var/www/html/jimfuqua/tutor/logs/spelling_js.php.log', 'w');
//$v = var_export($_SESSION, true);
//$string = __LINE__.' $_SESSION = '.$v."\n\n";
//fwrite($log_file, $string);
?>
<?php
require '/var/www/html/jimfuqua/tutor/src/scripts/basic_vars_lesson_js_PHP';
require '/var/www/html/jimfuqua/tutor/src/scripts/f_exit_from_lesson_js_PHP';
require '/var/www/html/jimfuqua/tutor/src/scripts/f_record_answer_js_PHP';
?>
var okay;
var src = ($('#src1').attr('src'));

function get_word_from_src (src) {
    'use strict';
    var last_slash,
        start_extention,
        res;
    last_slash = src.lastIndexOf("/") + 1;
    start_extention = src.lastIndexOf(".");
    res = src.slice(last_slash,start_extention);
    return res;
}

function register_error() {
    "use strict";
    // display modal error message;
    var Dialog_Error = document.getElementById("Dialog_Error");
    $(".correct_spelling").html("<b>"+ get_word_from_src(src)+"</b>");
    Dialog_Error.showModal();
    $('#spelling_word_input').val('');
}

function play_sentence () {
  document.getElementById('audio2').play();
  $('#spelling_word_input').focus();
}

$(document).ready(function () {
    'use strict';
    var spoken_word;
    var typed_word;

    var sayWord = $("#play_word");
    $("#play_word").click(
      function() {
        document.getElementById('audio1').play();
        $('#spelling_word_input').focus();
    });

    var saySentence = $("#play_sentence");
    $("#play_sentence").click(
      function() {
        document.getElementById('audio2').play();
        $('#spelling_word_input').focus();
    });

    var okayError = document.getElementById("okayError");
    $("#okayError").click(
        function () {
            document.getElementById('Dialog_Error').close();
        }
    );

    var dialog_error = document.getElementById('Dialog_Error');
    //okay.onclick = function(){ dialog_error.close(); };

    var dialog_exit = document.getElementById('Dialog_Exit');
    //okay.onclick = function(){ dialog_exit.close(); };

    document.getElementById('image-exit').onclick = function() {
      dialog_exit.show();
    };
    document.getElementById('closeExitDialog').onclick = function() {
        dialog_exit.close();
    };
     var dialog_help = document.getElementById('Dialog_Help');
    document.getElementById('image-help').onclick = function() {
    dialog_help.show();
    };
    document.getElementById('closeHelpDialog').onclick = function() {
        dialog_help.close();
    };
    tC_ClientTimeStarted = Date.now();  // milliseconds
    $('#spelling_word_input').val('');
    $('#spelling_word_input').focus();
    $("#spelling_word_input").keyup(function (event) {
        if (event.keyCode === 13) {
            src = ($('#src1').attr('src'));
            // alert(src);
            spoken_word = get_word_from_src(src);
            typed_word = $('#spelling_word_input').val();
             //alert('typed_word = ' + typed_word);
             //alert('spoken_word = ' + spoken_word);
            if (typed_word === spoken_word) {
              //alert('answer correct 61');
                Answer_Correct = 1;
                record_answer(Answer_Correct);
                exit_from_lesson();
            } else {
                errors_made = errors_made + 1;
                register_error();
            }
        } // if (event.keyCode === 13)
    });  // keyup

    //$('#spelling_word_input').bind('click', register_answer())

    document.getElementById('audio1').addEventListener('ended', function () {
        this.currentTime = 0;
        this.pause();
        //document.getElementById('audio2').play();
    }, false);

});  // document.ready

/*
Must deliver parameter range of words to this lesson
Must tell student spelling on error.
*/
