<?php

// get an array from the txt file and store as a php array in a php file

    $file_p = fopen("Words.txt", "r");
    if($file_p) {
        while (($buffer = fgets($file_p, 4096)) !== false) {
        echo "\n<br/>";
        trim($buffer," \t\n\r\0\x0B" );
        $str = substr($buffer,0,-2);
        echo $str;
        //echo strlen($str);
        $words_array[] = $str;
        }
   }
    if (!feof($file_p)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($file_p);

    $logFile = fopen('/var/www/tutor/logs/get_words.php.log', 'w');
    $v = var_export($words_array, true);
    $string = "\n" . __LINE__ . $v;
    fwrite($logFile, $string . "\n");
?>
