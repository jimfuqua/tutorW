<?php
// Purpose of this script is to get a message from javascript and log it to the PHP log folder.

// Information for message is contained in the PHP $_GET global variable.

$v = var_export($_GET, true);
$logFile=fopen("/var/www/tutor/logs/js_logger.log", "a");
fwrite($logFile, $v . "\n");

// The javascript doing the logging should disclose its name plus any info it desires to log.
