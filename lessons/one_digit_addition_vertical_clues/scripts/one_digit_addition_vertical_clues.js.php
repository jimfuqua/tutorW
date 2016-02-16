<?php
require '../../scripts/basic_vars_lesson_js_PHP';
require '../../scripts/f_exit_from_lesson_js_PHP';
require '../../scripts/f_record_answer_js_PHP';
?>

var sum;
var answer_entered;
var correct_answer;
var time_lesson_started;
var time_lesson_displayed;
var time_lesson_answered;
var LessonsDone = 0;
var last_addend_1;
var errors_made = 0;
var post_string;
var tA_RepsTowardM = '';

function close_window() {
    alert('Press Alt-F4 to close this window.');
}

function insert_image_block(image_block_JSON){
    var i = image_block_JSON.items;
    var rows = Math.ceil(image_block_JSON.items/image_block_JSON.cols);
        //console.log("rows = " + rows);
    var row_start_string = "";;
    var row_content_string = "";
    var row_end_string = "</tr>";
    var row_append_string;
    var i = image_block_JSON.items;
    $('#'+image_block_JSON.container).empty(); // Empty the container.
        for (r=1; r <= rows; r++){
            row_start_string = "<tr id = 'r" + r + "'>";
            //console.log("13 row_start_string =" + row_start_string);
            for (c=1; c<=image_block_JSON.cols; c++){
                if (i > 0) {
                    row_content_string += "<td><img src='" + image_block_JSON.img + "' /></td>";
                    //console.log(row_content_string);
                    i--;
                }
            }
            row_append_string = row_start_string + row_content_string + row_end_string;
            console.log(row_append_string);
            $('#'+image_block_JSON.container).append(row_append_string);
            row_content_string = '';
        }
}

function random_number(upper_limit,lower_limit){
var rand_no = Math.floor((upper_limit-(lower_limit-1))*Math.random()) + lower_limit;
return rand_no;
}

function insert_images(UnitsDigitOne,UnitsDigitTwo){
var image_block_1 = { "container" : "clues_1",
                    "items"     : UnitsDigitOne,
                    "cols"      : 3,
                    "img"       : "../../images/Bug.svg"
                    };
    insert_image_block(image_block_1);
    var image_block_2 = { "container" : "clues_2",
                    "items"     : UnitsDigitTwo,
                    "cols"      : 3,
                    "img"       : "../../images/Bug.svg"
                    };
    insert_image_block(image_block_2);
}

function generate_lesson(){
	$('#smiley').fadeOut(800);  // milliseconds
	time_lesson_started = new Date();
	time_lesson_started = time_lesson_started.getTime();
	$('#UnitsDigitOne').text('');
	$('#UnitsDigitTwo').text('');
	$('#container').hide();
	var UnitsDigitOne = random_number(9,0);
	while (UnitsDigitOne == last_addend_1)
  	{
  		UnitsDigitOne = random_number(2,0);
  	}
	last_addend_1 = UnitsDigitOne;
	var UnitsDigitTwo = random_number(2,0);
	$('#UnitsDigitOne').text(UnitsDigitOne);
	$('#UnitsDigitTwo').text(UnitsDigitTwo);
    insert_images(UnitsDigitOne,UnitsDigitTwo);
	sum = UnitsDigitOne + UnitsDigitTwo;
	time_lesson_displayed = new Date();
	time_lesson_displayed = time_lesson_displayed.getTime();
	$("#SumDigit").html('?');
}

$(document).ready(function() {
	$( '.number_button').bind( "click", buttonClicks );
	generate_lesson();
	$('#bottom_line').fadeIn(2);
 });

//function update_tCompleted(post_string){
//    var post_to = "http://localhost/jimfuqua/tutor/src/scripts/update_tCompleted.php";
//    // this creates a new entry in tCompleted.
//    var update_tCompleted = $.post(post_to, post_string );
//}//

function flash_smiley(){
	$("SumDigit").fadeOut(800);  // milliseconds
	$('#smiley').fadeIn(800);
}

function buttonClicks(){
    time_lesson_answered = new Date();
    time_lesson_answered = time_lesson_answered.getTime();
    answer_entered = this.value;
    correct_answer = (answer_entered == sum);
    if (correct_answer) {
		// Display the correct answer.
		// Using AJAX record the correct answer.
		// Color the counter.
		// If counter is full return to php else do another lesson.
		$("#SumDigit").html(sum);
		LessonsDone++;
		switch(LessonsDone)
		{
			case 1:
  				//execute code block 1
				$('#Lesson1').css('background-color','yellow');
				flash_smiley();
				record_answer(correct_answer);
				generate_lesson();
  				break;
			case 2:
  				//execute code block 1
				$('#Lesson2').css('background-color','yellow');
				flash_smiley();
				record_answer(correct_answer);
				generate_lesson();
  				break;
			case 3:
  				//execute code block 1
				$('#Lesson3').css('background-color','yellow');
				flash_smiley();
				record_answer(correct_answer);
				generate_lesson();
  				break;
			case 4:
  				//execute code block 1
				$('#Lesson4').css('background-color','yellow');
				flash_smiley();
				record_answer(correct_answer);
				generate_lesson();
  				break;
			case 5:
  				//execute code block 1
				$('#Lesson5').css('background-color','yellow');
				flash_smiley();
				record_answer(correct_answer);
				if (!errors_made){  // leave the start rec unchanged if the student made an error.
					tA_RepsTowardM = 'Plus1';
				};
				//Terminate lesson NEXT by going to a new lesson.
				exit_from_lesson();
  				break;
			default:
				//code to be executed if n is different from case 1 - 5
			}
	} else {
            time_lesson_answered = new Date();
            time_lesson_answered = time_lesson_answered.getTime();
            answer_entered = this.value;
            record_answer(correct_answer);
			$('#container').html('<p>The correct answer is ' + sum + '</p><p>  \n \n Please try again. \n </p>')
			$('#container').show();
			errors_made = errors_made + 1;
			$.post( "http://localhost/jimfuqua/tutor/src/scripts/tA_set RepsTowardM_to_zero.php" );
	}
}
