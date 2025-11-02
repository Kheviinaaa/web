<?php
    // Include database connection
    include 'db_connect.php';

    // Check if 'id' and 'from' parameters are set in the URL
    if (isset($_GET['id']) && isset($_GET['from'])) {
        // Retrieve 'from' and 'id' values from URL
        $from = $_GET['from'];
        $id = $_GET['id'];

        // Delete activity if 'from' is 'act'
        if ($from == "act") {
            // SQL query to delete activity by id
            $sql = "DELETE FROM activity WHERE id = '$id'";
            // Execute the query and check if it's successful
            if ($conn->query($sql)) {
                // Redirect to the activity page after deletion
                header("location:adm_activity.php");
            }
        }

        // Delete cuisine if 'from' is 'cuisine'
        else if ($from == "cuisine") {
            // SQL query to delete cuisine by id
            $sql = "DELETE FROM cuisine WHERE id = '$id'";
            // Execute the query and check if it's successful
            if ($conn->query($sql)) {
                // Redirect to the cuisine page after deletion
                header("location:adm_cuisine.php");
            }
        }

        // Delete user if 'from' is 'user'
        else if ($from == "user") {
            // SQL query to delete user by id
            $sql = "DELETE FROM user WHERE id = '$id'";
            // Execute the query and check if it's successful
            if ($conn->query($sql)) {
                // Redirect to the user management page after deletion
                header("location:adm_user.php");
            }
        }

        // Delete contact if 'from' is 'contact'
        else if ($from == "contact") {
            // SQL query to delete contact by id
            $sql = "DELETE FROM contact WHERE id = '$id'";
            // Execute the query and check if it's successful
            if ($conn->query($sql)) {
                // Redirect to the contact management page after deletion
                header("location:adm_contact.php");
            }
        }

        // Delete feedback if 'from' is 'feedback'
        else if ($from == "feedback") {
            // SQL query to delete feedback by id
            $sql = "DELETE FROM feedback WHERE id = '$id'";
            // Execute the query and check if it's successful
            if ($conn->query($sql)) {
                // Redirect to the feedback management page after deletion
                header("location:adm_feedback.php");
            }
        }
    }
?>
