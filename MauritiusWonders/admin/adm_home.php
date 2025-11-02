<?php
// Start the session
session_start();

// Redirect to login page if admin username is not set
if (!isset($_SESSION['adm_username'])){
    header("location: adm_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

    <!-- Internal CSS Styling -->
    <style>
        /* Reset margin and padding for body and html */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        /* Background Styling */
        body {
            background-color: lightblue; /* Sets a background color */
            background-image: url('https://wallpapercave.com/wp/wp2173794.jpg'); /* Sets background image */
            background-repeat: no-repeat; /* No repeating of background */
            background-size: cover; /* Background covers full screen */
            background-position: center; /* Center the background image */
        }

        /* Navigation Bar Styling */
        .navbar {
            position: fixed;
            width: 100%;
            top: 0;
            background: rgba(0, 0, 0, 0.8); /* Semi-transparent black background */
            padding: 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); /* Shadow effect */
        }

        .navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .navbar ul li {
            margin: 0 15px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
            transition: color 0.3s; /* Smooth color transition */
        }

        .navbar ul li a:hover {
            color: #FFD700; /* Golden color on hover */
        }

        /* Dropdown Menu Styling */
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

        /* Show dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>

<head>
    <!-- Meta tags and Title -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <!-- External CSS file (not used here because CSS is inside <style> tag, but still linked) -->
    <link rel="stylesheet" href="css/adm_home.css">
</head>

<body>
    <div class="background">
        <!-- Navigation Bar -->
        <nav class="navbar">
            <ul>
                <!-- Home Link -->
                <li><a href="adm_home.php">Home</a></li>

                <!-- Hotel Dropdown Menu -->
                <li class="dropdown">
                    <a class="dropbtn" href="adm_hotel.php">Hotel</a>
                    <div class="dropdown-content">
                        <a href="add_hotel.php">Add Hotel</a>
                    </div>
                </li>

                <!-- Activities Dropdown Menu -->
                <li class="dropdown">
                    <a class="dropbtn" href="adm_activity.php">Activities</a>
                    <div class="dropdown-content">
                        <a href="adm_activity.php?type=1">Sea</a>
                        <a href="adm_activity.php?type=2">Nature</a>
                        <a href="add_activities.php">Add Activities</a>
                    </div>
                </li>

                <!-- Cuisine Dropdown Menu -->
                <li class="dropdown">
                    <a class="dropbtn" href="adm_cuisine.php">Cuisine</a>
                    <div class="dropdown-content">
                        <a href="add_cuisine.php">Add Cuisine</a>
                    </div>
                </li>

                <!-- Users Page Link -->
                <li><a href="adm_user.php">Users</a></li>

                <!-- Feedback Page Link -->
                <li><a href="adm_feedback.php">Feedback</a></li>

                <!-- Contact Page Link -->
                <li><a href="adm_contact.php">Contact</a></li>

                <!-- Admin Username Dropdown (for logout) -->
                <li class="dropdown">
                    <a class="dropbtn"><?php echo $_SESSION['adm_username']; ?></a>
                    <div class="dropdown-content">
                        <a href="adm_logout.php">Log out</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</body>

</html>
