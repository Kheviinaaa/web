<?php
// Include database connection
include 'db_connect.php';

// Check if 'name', 'email', and 'message' fields are set in the POST request
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {

    // Retrieve values from POST request
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Check if none of the fields are empty
    if (!empty($name) && !empty($email) && !empty($message)) {

        // Escape special characters to prevent SQL injection
        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $message = htmlspecialchars($message);

        // Insert contact message into the 'contact' table
        $sql = "INSERT INTO contact(id, name, email, message) VALUES('', '$name', '$email', '$message')";

        // Execute the query and check if successful
        if ($conn->query($sql)) {
            echo "success";
        } else {
            echo "sql problem";
        }
    }
    else {
        // One or more fields are empty
        echo "empty";
    }
}
else {
    // Else block for feedback form submission

    // Retrieve values from POST request
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['feedback'];

    // Check if none of the fields are empty
    if (!empty($name) && !empty($email) && !empty($message)) {

        // Escape special characters to prevent SQL injection
        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $message = htmlspecialchars($message);

        // Insert feedback into the 'feedback' table
        $sql = "INSERT INTO feedback(id, name, email, message) VALUES('', '$name', '$email', '$message')";

        // Execute the query and check if successful
        if ($conn->query($sql)) {
            echo "success";
        } else {
            echo "sql problem";
        }
    }
    else {
        // One or more fields are empty
        echo "empty";
    }
}
?>
