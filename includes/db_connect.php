<?php
include_once 'psl-config.php';   // As functions.php is not included
$mysqli_connection = new mysqli(HOST, USER, PASSWORD, DATABASE) or die("Error " . mysqli_error($link));
