<?php
// Start session to manage admin authentication
session_start();

// Check if admin is logged in, if not redirect to login page
if (!isset($_SESSION['adm_username'])) {
    header("location: adm_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for responsive layout and character encoding -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Activity Form</title>

    <!-- Internal CSS for styling the form and navigation bar -->
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }

        /* Contact form container styling */
        .contact-form {
            width: 750px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Form header styling */
        .contact-form header {
            background-color: #3E8EDE;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            font-size: 1.2em;
        }

        /* Form group (label + input) styling */
        .contact-form .form-group {
            padding: 15px;
        }

        /* Label styling inside form */
        .contact-form .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9em;
        }

        /* Input field styling */
        .contact-form .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Input focus effect */
        .contact-form .form-group input:focus {
            border-color: #888;
            outline: none;
        }

        /* Form actions (button) section styling */
        .contact-form .form-actions {
            text-align: center;
            padding: 15px;
        }

        /* Submit button styling */
        .contact-form .form-actions button {
            background-color: #FFD700;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 4px;
        }

        /* Submit button hover effect */
        .contact-form .form-actions button:hover {
            background-color: #e5c600;
        }

        /* Dropdown menu styling */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: black;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        /* Dropdown links styling */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Hover effect for dropdown links */
        .dropdown-content a:hover {
            background-color: black;
        }

        /* Show dropdown on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Navigation bar styling */
        .logo {
            width: 70px;
            height: auto;
            margin-right: 0px;
            vertical-align: middle;
        }

        .navbar p {
            display: inline-block;
            font-size: 24px;
            font-weight: bold;
            margin-left: 0px;
            vertical-align: middle;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 0 0;
        }

        .navbar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        .navbar li {
            margin: 0 15px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }
    </style>

    <!-- jQuery library and custom functions -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="my_jquery_functions.js"></script>
</head>

<!-- Navigation bar section -->
<nav class="navbar">
    <ul>
        <li><a href="adm_home.php">Home</a></li>
        <li class="dropdown">
            <a class="dropbtn" href="adm_hotel.php">Hotel</a>
            <div class="dropdown-content">
                <a href="add_hotel.php">Add Hotel</a>
            </div>
        </li>
        <li class="dropdown">
            <a class="dropbtn" href="adm_activity.php">Activities</a>
            <div class="dropdown-content">
                <a href="adm_activity.php?type=1">Sea</a>
                <a href="adm_activity.php?type=2">Nature</a>
                <a href="add_activities.php">Add Activities</a>
            </div>
        </li>
        <li class="dropdown">
            <a class="dropbtn" href="adm_cuisine.php">Cuisine</a>
            <div class="dropdown-content">
                <a href="add_cuisine.php">Add Cuisine</a>
            </div>
        </li>
        <li><a href="adm_user.php">Users</a></li>
        <li><a href="adm_feedback.php">Feedback</a></li>
        <li><a href="adm_contact.php">Contact</a></li>
    </ul>
</nav>

<body>
    <!-- Contact form for adding activity details -->
    <div class="contact-form">
        <header>Activity Details</header>

        <!-- Input field for Image Source -->
        <div class="form-group">
            <label>Image Source</label>
            <input type="text" id="img_src" placeholder="Enter activity's image source">
        </div>

        <!-- Input field for Activity Name -->
        <div class="form-group">
            <label>Activity Name</label>
            <input type="text" id="name" placeholder="Enter your activity name">
        </div>

        <!-- Input field for Picture Source -->
        <div class="form-group">
            <label>Picture Source</label>
            <input type="text" id="picture_src" placeholder="Enter your picture source">
        </div>

        <!-- Input field for Activity Description -->
        <div class="form-group">
            <label>Activity Description</label>
            <input type="text" id="description" placeholder="Enter your activity's description">
        </div>

        <!-- Input field for Visit Website URL -->
        <div class="form-group">
            <label>Visit Web URL</label>
            <input type="text" id="visit_web" placeholder="Enter URL for visiting website">
        </div>

        <!-- Dropdown menu for selecting Activity Type -->
        <div class="form-group">
            <label>Activity Type</label>
            <select id="type">
                <option value="1">Sea</option>
                <option value="2">Nature</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="form-actions">
            <button type="submit">Submit</button>
        </div>
    </div>
</body>

<!-- jQuery script to handle form submission -->
<script>
$(document).ready(function() {
    // On button click
    $("button").click(function() {
        // Retrieve form values
        var img_src = $("#img_src").val();
        var name = $("#name").val();
        var picture_src = $("#picture_src").val();
        var description = $("#description").val();
        var visit_web = $("#visit_web").val();
        var type = $("#type").val();

        // Check if any field is empty
        if (img_src == "" || name == "" || picture_src == "" || description == "" || visit_web == "" || type == "") {
            alert("Some fields are empty");
        } else {
            // Send POST request to 'process_edit.php'
            $.post("process_edit.php", {
                img_src: img_src,
                name: name,
                picture_src: picture_src,
                description: description,
                visit_web: visit_web,
                type: type
            }, function(data) {
                // If success, reload the page
                if (data == "success") {
                    location.reload();
                } else {
                    // Otherwise, alert the error
                    alert(data);
                }
            });
        }
    });
});
</script>
</html>
