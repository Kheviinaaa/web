<?php
// Start the session
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cuisine Form</title>

    <!-- Inline CSS for page styling -->
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

        /* Contact form styling */
        .contact-form {
            width: 750px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .contact-form header {
            background-color: #3E8EDE;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            font-size: 1.2em;
        }

        .contact-form .form-group {
            padding: 15px;
        }

        .contact-form .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9em;
        }

        .contact-form .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .contact-form .form-group input:focus {
            border-color: #888;
            outline: none;
        }

        .contact-form .form-actions {
            text-align: center;
            padding: 15px;
        }

        .contact-form .form-actions button {
            background-color: #FFD700;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 4px;
        }

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

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: black;
        }

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

        .navbar p {
            font-size: 1.5rem;
            text-decoration: none;
            color: white;
            text-align: left;
            font-weight: bold;
        }

        .navbar a:hover {
            text-decoration: underline;
        }
        /* End of Navigation Bar */
    </style>

    <!-- jQuery library and external JS file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="my_jquery_functions.js"></script>
</head>

<!-- Navigation Bar -->
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
    <!-- Cuisine Form -->
    <div class="contact-form">
        <header>Cuisine Details</header>

        <div class="form-group">
            <label>Image Source</label>
            <input type="text" id="img_src" placeholder="Enter cuisine's image source">
        </div>

        <div class="form-group">
            <label>Cuisine Name</label>
            <input type="text" id="name" placeholder="Enter your cuisine name">
        </div>

        <div class="form-group">
            <label>Cuisine Description</label>
            <input type="text" id="description" placeholder="Enter your cuisine's description">
        </div>

        <div class="form-group">
            <label>Restaurant Name</label>
            <input type="text" id="visit_web" placeholder="Enter restaurant name">
        </div>

        <div class="form-group">
            <label>Dish Name</label>
            <input type="text" id="book" placeholder="Enter your dish Name">
        </div>

        <div class="form-actions">
            <button type="submit">Submit</button>
        </div>
    </div>
</body>

<!-- jQuery Script to handle form submission -->
<script>
    $(document).ready(function(){
        $("button").click(function(){
            // Fetch input values
            var img_src = $("#img_src").val();
            var name = $("#name").val();
            var description = $("#description").val();
            var visit_web = $("#visit_web").val();
            var book = $("#book").val();

            // Check if any field is empty
            if(img_src == "" || name == "" || description == "" || visit_web == "" || book == "") {
                alert("Some fields are empty");
            } else {
                // Send POST request to process the cuisine addition
                $.post("process_edit_cuisine.php", {
                    img_src: img_src,
                    name: name,
                    description: description,
                    visit_web: visit_web,
                    book: book,
                    table: "cuisine"
                }, function(data){
                    // Handle the response
                    if(data == "success") {
                        location.reload();
                    } else {
                        alert(data);
                    }
                });
            }
        });
    });
</script>

</html>
