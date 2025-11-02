<?php
// Start the session to track admin login
session_start();

// Redirect to the login page if admin username is not set in the session
if (!isset($_SESSION['adm_username'])){
    header("location: adm_login.php");
    exit();
}

// Include database connection file
include 'db_connect.php';

// SQL query to fetch all hotels from the database
$sql = "SELECT * FROM hotel";

// Execute the query and get the results
$results = $conn->query($sql);

// Check if any hotel data exists, if not, display a message
if($results->num_rows <= 0) {
    echo "<h2>No hotels found </h2>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags and Title -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Page</title>

    <!-- Link to external CSS file for styling -->
    <link rel="stylesheet" href="css/adm_hotel.css">
</head>
<body>
    <!-- Background Section -->
    <div class="background">
        <!-- Navbar (Navigation Bar) -->
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
            </ul>
        </nav>

        <!-- Hotels Section (Displays the list of hotels) -->
        <section class="hotels">
            <h1>Hotels</h1>
            <div class="hotels-grid">

                <!-- Loop through the hotels results from database and display each hotel -->
                <?php foreach ($results as $result){ ?>
                <div class="hotel-card">
                    <!-- Hotel Image -->
                    <img src=<?php echo $result['img_src']; ?> alt=<?php echo $result['name']; ?>>

                    <!-- Hotel Name -->
                    <h3><?php echo $result['name']; ?></h3>

                    <!-- Hotel Picture Source -->
                    <h6><?php echo $result['picture_src']; ?></h6>

                    <!-- Hotel Star Rating -->
                    <p class="stars"><?php echo $result['star']; ?></p>

                    <!-- Hotel Description -->
                    <p><?php echo $result['description']; ?></p>

                    <!-- Visit Hotel Website Link -->
                    <div>
                        <a href=<?php echo $result['visit_web']; ?> target="_blank">Visit Hotel's Website</a>
                    </div>

                    <!-- Booking Link -->
                    <a href=<?php echo $result['book']; ?> target="_blank" class="hotel-link">Book on Booking.com</a>

                    <!-- Edit Hotel Link -->
                    <a class="hotel-link" href="edit_hotel.php?id=<?php echo $result['id']; ?>&action=edit" id="edit">Edit</a>

                    <!-- Delete Hotel Link -->
                    <a class="hotel-link" href="edit_hotel.php?id=<?php echo $result['id']; ?>&action=delete" id="delete">Delete</a>
                </div>
                <?php }?>

            </div>
        </section>


    </div>
</body>
</html>
