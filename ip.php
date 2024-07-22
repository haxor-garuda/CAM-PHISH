<?php
// Retrieve IP address
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ipaddress = $_SERVER['REMOTE_ADDR'];
}

// Retrieve User Agent
$useragent = $_SERVER['HTTP_USER_AGENT'];

// Prepare data to be logged
$logData = "IP: " . $ipaddress . "\r\n" .
           "User-Agent: " . $useragent . "\r\n" .
           "-------------------------\r\n";

// File to write logs
$file = 'ip.txt';

// Open the file in append mode and write data
if (file_put_contents($file, $logData, FILE_APPEND | LOCK_EX) === false) {
    // Handle error if file write fails
    error_log("Failed to write log data to " . $file);
}

// Optional: Send a header to indicate success
header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
