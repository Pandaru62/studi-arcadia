<?php

// Define the path to your .env file
$dotenvFilePath = '../.env';

if (file_exists($dotenvFilePath)) {
    $dotenvFileContents = file_get_contents($dotenvFilePath);
    $dotenvLines = preg_split('/\R/', $dotenvFileContents);

    foreach ($dotenvLines as $line) {
        if (strpos($line, '=') !== false && substr($line, 0, 1) !== '#') {
            list($key, $value) = explode('=', $line, 2);
            // Remove quotes on password
            $value = trim($value, "\"'");
            $_ENV[$key] = $value;
        }
    }
}

$host = $_ENV['SMTP_HOST'] ?? getenv('SMTP_HOST');
$port = $_ENV['SMTP_PORT'] ?? getenv('SMTP_PORT');
$user = $_ENV['SMTP_USER'] ?? getenv('SMTP_USER');
$pass = $_ENV['SMTP_PASS'] ?? getenv('SMTP_PASS');

define('MAILHOST', $host);
define('USERNAME', $user);
define('PASSWORD', $pass);
define('SEND_FROM', $user);
define('SEND_FROM_NAME', 'Arcadia');
define('REPLY_TO', $user);
define('REPLY_TO_NAME', 'Arcadia Zoo');
define('PORT', $port);
