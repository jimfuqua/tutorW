//  stuff cut out of typing js
function save_data() { // THIS IS THE EXIT FROM THIS LESSON
    'use strict';
    1051 /*var tC_Time_client_processed_answer = getTime(),
        tC_Correct = "",
        tC_Question_and_Response,
        tC_More_data_about_response,
        errors_made,
        post_string,
        post_to,
        average_speed;*/
    // Here we must collect and save the data to tCompleted.
    // To do this we must call a script on the server with a jQuery.post.
    // Use jQuery.post( url, [ data ], [ success(data, textStatus, XMLHttpRequest) ], [ dataType ] )
    // get the data together:
    //  var heterogenousMap = {"one": 1, "two": "two",  "three": 3.0};

    // Calculate tC_Correct

    if (($("#KSSecond").val() <= 1) || ($("#t_err").val() > 8)) { tC_Correct = 0; } else { tC_Correct = 1; }
        //  still need tC_Question_and_Response & tC_More_data_about_response
    tC_Question_and_Response = $("#displayLine1").val();
        //var tC_More_data_about_response  need errors and elapsed time in a map
        {"employees":[
            {"firstName":"John", "lastName":"Doe"},
            {"firstName":"Anna", "lastName":"Smith"},
            {"firstName":"Peter", "lastName":"Jones"}
        ]}
    var j;
    j = '{';
    j = j + '"tC_More_data_about_response"';
    j = j + ":";
    j = j + "[";
    j = j + '"errors":"';
    j = j + '"' + $("#t_err").val() + '",'
    j = j + '"elapsedTime":"';
    j = j +  '"' + $("#Time_Working").val() + '",'
    j = j + '"average_speed":"';
    j = j +  '"' + $('#AverageSpeed').val() + '"';
    j = j +  ']}';
    tC_More_data_about_response = j;
    //  "errors": + $("#t_err").val() + ',
    //  "elapsedTime":"' + $("#Time_Working").val() +
    //  ',"average_speed":" + $('#AverageSpeed').val()
    //  }';
    console.log (tC_More_data_about_response);
    errors_made = $("#t_err").val();
        // Put togeter the JSON formatted data.
    //post_string = {
    //    "tC_Correct" : tC_Correct,
    //    "tC_ClientTimeStarted" : tC_ClientTimeStarted,
    //    "tC_Time_client_processed_answer" : tC_Time_client_processed_answer,
    //    "tC_Question_and_Response" : tC_Question_and_Response,
    //    "tC_More_data_about_response" : tC_More_data_about_response,
    //    "tA_ErrorsMade" : errors_made,
        "tA_RepsTowardM" = 'Plus1',
    //    "tA_id" : tA_id,
    //    "sender" : "typing_lessons_cl"
    //};

//    // this creates a new entry in tCompleted.
//    post_to = "http://localhost/jimfuqua/tutor/src/scripts/update_tCompleted.php";
//    $.post(post_to, post_string); // update_tCompleted
//    post_to = "http://localhost/jimfuqua/tutor/src/scripts/update_tAssignments.php";  // this updates tAssignments.
//    $.post(post_to, post_string); // update_tAssignments
//    // THIS IS THE EXIT FROM THIS LESSON
//    average_speed = $('#AverageSpeed').val();
    $('#BottomData').show();
    record_answer(1);
}   // This updates the completed table.
