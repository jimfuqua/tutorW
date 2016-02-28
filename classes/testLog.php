<?php
//require_once __DIR__ . '/vendor/autoload.php';
require '../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

// Set the format
//$output = "%channel%.%level_name%: %message%";
//$formatter = new LineFormatter($output);

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('/var/www/html/jimfuqua/tutorW/logs/myLog.log', Logger::WARNING));
$log2 = new Logger('name2');
$log2->pushHandler(new StreamHandler('/var/www/html/jimfuqua/tutorW/logs/myLog.log', Logger::WARNING));
$logger = new Logger('my_logger');
$logger->pushHandler(new FirePHPHandler());
$logger->addInfo('My logger is now ready');
// add records to the log
$log->addWarning('Foo');
$log->addError('Bar');
$log2->addWarning('Foo2');
$log2->addError('Bar2');
echo __LINE__;
