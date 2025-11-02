<?php
// Start the session to manage user login state
session_start();

// Include database connection
include 'db_connect.php';

// Check if username and password are set via POST request
if(isset($_POST["username"]) && isset($_POST["password"])) {

    // Get the username and password from the POST request
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password are not empty
    if (!empty($username) && !empty($password)) {

        // Prepare SQL query to check for matching username and password
        $sql = "SELECT username, password FROM admin WHERE username = '$username' AND '$password' = password";
        $result = $conn->query($sql);

        // Check if a matching record is found
        if ($result->num_rows > 0) {
            // Store the username in session and return true for successful login
            $_SESSION["adm_username"] = $username;
            echo "true";
            exit();  // Exit to stop further execution

        } else {
            // If no matching record is found, return "Error"
            echo "Error";
        }

    } else {
        // If username or password is empty, return "not good"
        echo "not good";
    }
}

?>
