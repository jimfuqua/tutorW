<?php
require '../../scripts/basic_vars_lesson_js_PHP';
require '../../scripts/f_exit_from_lesson_js_PHP';
require '../../scripts/f_record_answer_js_PHP';
?>

function dragstart_handler(ev) {
    console.log("dragStart");
    console.log("dragStart: dropEffect = " + ev.dataTransfer.dropEffect + " ; effectAllowed = " + ev.dataTransfer.effectAllowed);
    // Add the target element's id to the data transfer object
    ev.dataTransfer.setData("text/html", ev.target.id);
    ev.dataTransfer.dropEffect = "copy";
}

function dragover_handler(ev) {
    console.log("drop: dropEffect = " + ev.dataTransfer.dropEffect + " ; effectAllowed = " + ev.dataTransfer.effectAllowed);
    ev.preventDefault();
    // Set the dropEffect to copy.
    ev.dataTransfer.dropEffect = "copy"
}

function drop_handler(ev) {
    ev.preventDefault();
    // Get the id of the target and add the moved element to the target's DOM
    var data = ev.dataTransfer.getData("text/html");
    //ev.target.appendChild(document.getElementById('Button_/b/'));
    var nodeCopy = document.getElementById(data).cloneNode(true);
    nodeCopy.id = "newId"; /* We cannot use the same ID */
    ev.target.appendChild(nodeCopy);
}
