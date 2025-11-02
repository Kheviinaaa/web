<?php
include 'db_connect.php';

// Check if the necessary POST data is set to perform an update operation
if(isset($_POST['data']) && isset($_POST['id']) && isset($_POST['column'])) {
    // Retrieve the POST data
    $data = $_POST['data'];
    $id = $_POST['id'];
    $column = $_POST['column'];

    // Construct the SQL query to update the specified column in the 'cuisine' table
    $sql = "UPDATE cuisine SET cuisine.$column = '$data' WHERE id = '$id'";

    // Execute the query and check if it was successful
    if($conn->query($sql)) {
        echo "success";
    } else {
        echo "sql error"; // Return error message if query fails
    }
}

// Check if the necessary POST data is set to insert a new cuisine record
if(isset($_POST['table']) && isset($_POST['img_src']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['visit_web']) && isset($_POST['book'])) {
    // Retrieve and sanitize the POST data
    $img_src = $_POST['img_src'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $visit_web = $_POST['visit_web'];
    $book = $_POST['book'];

    // Construct the SQL query to insert a new cuisine record into the 'cuisine' table
    $sql = "INSERT INTO cuisine (img_src, name, description, restaurant, dish)
            VALUES('$img_src', '$name', '$description', '$visit_web', '$book')";

    // Execute the query and check if it was successful
    if($conn->query($sql)) {
        echo "success";
    } else {
        echo "sql error"; // Return error message if query fails
    }
}
?>
