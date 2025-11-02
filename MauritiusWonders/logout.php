<?php
// Start the session
session_start();

// Check if the logout button is clicked

    session_destroy();

    // Redirect to the login page
    header("Location: login.php");
    exit();

?>