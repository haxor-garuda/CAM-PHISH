<?php
// Include the IP logging script
include 'ip.php';

// Redirect to the specified HTML page
header('Location: forwarding_link/index2.html');

// Ensure no further code is executed after the redirect
exit();
?>
