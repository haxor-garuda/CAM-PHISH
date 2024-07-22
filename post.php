<?php

// Get the current timestamp for unique file naming
$date = date('dMYHis');

// Retrieve the base64 encoded image data from the POST request
$imageData = $_POST['cat'];

// Log a message to a file if data is received
if (!empty($_POST['cat'])) {
    error_log("Received" . "\r\n", 3, "Log.log");
}

// Remove the data URL scheme (data:image/png;base64,) from the base64 data
$filteredData = substr($imageData, strpos($imageData, ",") + 1);

// Decode the base64 data to binary data
$unencodedData = base64_decode($filteredData);

// Define the file name with the current timestamp
$fileName = 'cam' . $date . '.png';

// Open the file for writing (binary mode)
$fp = fopen($fileName, 'wb');

// Write the binary data to the file
fwrite($fp, $unencodedData);

// Close the file
fclose($fp);

// End the script execution
exit();
?>
