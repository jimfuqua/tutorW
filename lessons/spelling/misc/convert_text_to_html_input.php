<?php

$log_file = fopen('/var/www/html/jimfuqua/tutor/logs/convert_text_to_html_input.log', 'w');
$string  = 'convert_text_to_html_input.php';
fwrite($log_file, $string."\n\n");

$input_sentence = "An apple is of type @#fruit@#.";
$input_insert_front = '<input type = "text" id ="input_1" name = "';
$input_insert_rear =  '" value = "">';

$delimiter = "@#";
$delimeter_length = strlen($delimiter);

$string  = '$delimiter = ' . $delimiter;
fwrite($log_file, $string . "\n\n");

$string  = '$input_sentence = ' . $input_sentence;
fwrite($log_file, $string . "\n\n");

$first_delimiter = strpos( $input_sentence, $delimiter, 0);
$string  = '$first_delimiter = ' . $first_delimiter;
fwrite($log_file, $string . "\n\n");

$word_start = $first_delimiter + 2;
$string  = '$word_start = ' . $word_start;
fwrite($log_file, $string . "\n\n");

$second_delimiter = strpos( $input_sentence, $delimiter, $word_start);
$string  = '$second_delimiter = ' . $second_delimiter;
fwrite($log_file, $string . "\n\n");

$length = $second_delimiter - $word_start;
$string  = '$length = ' . $length;
fwrite($log_file, $string . "\n\n");

$target_word = substr($input_sentence, $word_start, $length);
$string  = '$target_word = ' . $target_word;
fwrite($log_file, $string . "\n\n");

$replacement = $insert1 . $target_word . $insert2;
$string  = '$replacement = ' . $replacement;
fwrite($log_file, $string . "\n\n");

$sentence_start = substr ($input_sentence, 0, $first_delimiter);
$string  = '$sentence_start = ' . $sentence_start;
fwrite($log_file, $string . "\n\n");

$sentence_end = substr ($input_sentence, $second_delimiter + 2, strlen($input_sentence) - 2 * $delimeter_length);
$string  = '$sentence_end = ' . $sentence_end;
fwrite($log_file, $string . "\n\n");

$quiz_string = "'" . $sentence_start . $input_insert_front . $target_word . $input_insert_rear . $sentence_end . "'";
$replacement . $sentence_end;
$string  = '$quiz_string = ' . $quiz_string;
fwrite($log_file, $string . "\n\n");



echo "done";
