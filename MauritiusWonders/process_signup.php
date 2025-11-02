<?php
// Include database connection file
include 'db_connect.php';

// Check if all required fields are set
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['email'])) {

    // Get form data from POST request
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $email = $_POST['email'];

    // Check if none of the fields are empty
    if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($confirmpassword)) {

        // Check if email already exists in the database
        $sql = "SELECT email FROM user WHERE email = '$email'";
        $result = $conn->query($sql);

        // Check if passwords match
        if ($password == $confirmpassword) {
            // If email already exists
            if ($result->num_rows > 0) {
                echo "Email already exists!";
                exit();
            }
            else {
                // Insert new user into the database
                $conn->query("INSERT INTO user(id, firstname, lastname, username, email, password) VALUES('', '$firstname', '$lastname', '$firstname', '$email', '$password')");

                // Check if insertion was successful
                if ($conn) {
                    echo "Your Username : $firstname";
                    exit();
                }
            }
        }
        else {
            // Passwords do not match
            echo "incorrect password!";
            exit();
        }
    }
    else {
        // One or more fields are empty
        echo "Some fields are empty!";
    }
}
else {
    // POST request did not include required fields
    echo "not good";
}
?>
