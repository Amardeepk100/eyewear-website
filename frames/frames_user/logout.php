<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

echo <<<alert
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> Successfully </strong>Logged out
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
alert;

// Redirect the user to the desired page
header("Location: home.php");
exit();
?>