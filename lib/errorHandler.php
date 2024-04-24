<?php // to use later

error_reporting(E_ALL);
ini_set("display_errors", 0);

function customErrorHandler($errno, $errstr, $errfile,$errline) {
    $message = "Error: [$errno] $errstr - $errfile:$errline";
    error_log($message . PHP_EOL, 3, "error_log.txt"); // will save the errors in the error_log.txt file
}

set_error_handler("CustomErrorHandler");