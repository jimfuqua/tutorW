<?php
$handle = @fopen("/var/www/tutor/lessons/spelling2/WordLists/Words100.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        echo $buffer;
        $str=trim($buffer);
        $myfilename="./L100/".$str.".txt";
        $myfile = fopen("$myfilename", "w") or die("Unable to open file!");
        $txt = $str;
        fwrite($myfile, $txt);
        fclose($myfile);
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}
?>
