<?php
// Start a new session or resume the existing one
session_start();

// Include database connection file
include 'db_connect.php';

// Check if username and password are set in POST request
if (isset($_POST["username"]) && isset($_POST["password"])) {

    // Retrieve username and password from POST request
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password are not empty
    if (!empty($username) && !empty($password)) {

        // Query to check if the username and password match in the database
        $sql = "SELECT username, password FROM user WHERE username = '$username' AND '$password' = password";
        $result = $conn->query($sql);

        // If a matching record is found
        if ($result->num_rows > 0) {
            // Set session variable with username
            $_SESSION["username"] = $username;
            echo "true";
            exit();
        }
        else {
            // Invalid credentials
            echo "Error";
        }
    }
    else {
        // Username or password field is empty
        echo "not good";
    }
}
?>
