<?php
include 'db_connect.php';

// Check if the necessary POST data is set and perform update operation
if(isset($_POST['data']) && isset($_POST['id']) && isset($_POST['column']) && isset($_POST['table'])) {
    // Sanitize input data
    $data = htmlspecialchars($_POST['data']);
    $id = $_POST['id'];
    $column = $_POST['column'];
    $table = $_POST['table'];

    // Construct SQL query to update the specified column in the specified table
    $sql = "UPDATE $table SET $table.$column =  '$data' WHERE id = '$id'";

    // Execute the query and check if successful
    if($conn->query($sql)) {
        echo "success";
    } else {
        echo "sql error"; // Return error message if query fails
    }
}

// Check if the necessary POST data is set to insert a new hotel record
if(isset($_POST['img_src']) && isset($_POST['name']) && isset($_POST['picture_src']) && isset($_POST['star']) && isset($_POST['description']) && isset($_POST['visit_web']) && isset($_POST['book'])) {
    // Sanitize input data
    $img_src = htmlspecialchars($_POST['img_src']);
    $name = htmlspecialchars($_POST['name']);
    $picture_src = htmlspecialchars($_POST['picture_src']);
    $star = htmlspecialchars($_POST['star']);
    $description = htmlspecialchars($_POST['description']);
    $visit_web = htmlspecialchars($_POST['visit_web']);
    $book = htmlspecialchars($_POST['book']);

    // Construct SQL query to insert a new hotel record into the database
    $sql = "INSERT INTO hotel (img_src, name, picture_src, star, description, visit_web, book)
            VALUES('$img_src', '$name', '$picture_src', '$star', '$description', '$visit_web', '$book')";

    // Execute the query and check if successful
    if($conn->query($sql)) {
        echo "success";
    } else {
        echo "sql error"; // Return error message if query fails
    }
}

// Check if the necessary POST data is set to insert a new activity record
if(isset($_POST['img_src']) && isset($_POST['name']) && isset($_POST['picture_src']) && isset($_POST['description']) && isset($_POST['visit_web']) && isset($_POST['type'])) {
    // Sanitize input data
    $img_src = htmlspecialchars($_POST['img_src']);
    $name = htmlspecialchars($_POST['name']);
    $picture_src = htmlspecialchars($_POST['picture_src']);
    $description = htmlspecialchars($_POST['description']);
    $visit_web = htmlspecialchars($_POST['visit_web']);
    $type = htmlspecialchars($_POST['type']);

    // Construct SQL query to insert a new activity record into the database
    $sql = "INSERT INTO activity (img_src, name, picture_src, description, vist_web, activity_type)
            VALUES('$img_src', '$name', '$picture_src', '$description', '$visit_web', '$type')";

    // Execute the query and check if successful
    if($conn->query($sql)) {
        echo "success";
    } else {
        echo "sql error"; // Return error message if query fails
    }
}
?>
