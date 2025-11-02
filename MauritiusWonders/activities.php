<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include "db_connect.php";

// Fetch sea activities (type = 1) and nature activities (type = 2)
$sql = "SELECT * FROM activity WHERE activity_type = 1";
$sql_0 = "SELECT * FROM activity WHERE activity_type = 2";
$results = $conn->query($sql);
$results_0 = $conn->query($sql_0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities | MauritiusWonders</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>

    <!-- Navigation Bar -->
    <header>
        <nav class="navbar">
            <a href="main_page.php" class="logo">MauritiusWonders</a>
            <ul>
                <li><a href="hotels.php">Hotels</a></li>
                <!-- Activities dropdown menu -->
                <li class="dropdown">
                    <a class="dropbtn" href="activities.php">Activities</a>
                    <div class="dropdown-content">
                        <a href="activities.php?type=1">Sea</a> <!-- type=1: Sea -->
                        <a href="activities.php?type=2">Nature</a> <!-- type=2: Nature -->
                    </div>
                </li>
                <li><a href="cuisine.php">Cuisine</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="feedback.php">Feedback</a></li>
            </ul>
        </nav>
    </header>

    <!-- Activities Section -->
    <section class="activities">

        <h1>Exciting Activities in Mauritius</h1>
       

<?php
        // Check if a specific activity type was selected via GET parameter
        if (isset($_GET['type'])) {
            $type = $_GET['type'];

            if ($type == 1) {
                // If type=1, show Sea Activities
        ?>
                <h2>Sea Activities</h2>
                <div class="activities-grid">
                    <?php
                    if ($results->num_rows == 0) {
                        die("<h2>No activities available</h2>");
                    }
                    foreach ($results as $result) { ?>
                        <div class="activity-card">
                            <img src="<?php echo $result['img_src']; ?>" alt="<?php echo $result['name']; ?>">
                            <h3><?php echo $result['name']; ?></h3>
                            <h6><?php echo $result['picture_src']; ?></h6>
                            <p><?php echo $result['description']; ?></p>
                            <p>For More Activities, Visit</p>
                            <a href="<?php echo $result['vist_web']; ?>" target="_blank" class="activity-link">Book now</a>
                        </div>
                    <?php } ?>
                </div>
        <?php
            } else {
                // Otherwise, show Nature Activities
        ?>
                <h2>Nature Activities</h2>
                <div class="activities-grid">
                    <?php
                    if ($results_0->num_rows == 0) {
                        die("<h2>No activities available</h2>");
                    }
                    foreach ($results_0 as $result_0) { ?>
                        <div class="activity-card">
                            <img src="<?php echo $result_0['img_src']; ?>" alt="<?php echo $result_0['name']; ?>">
                            <h3><?php echo $result_0['name']; ?></h3>
                            <h6><?php echo $result_0['picture_src']; ?></h6>
                            <p><?php echo $result_0['description']; ?></p>
                            <p>For More Activities, Visit</p>
                            <a href="<?php echo $result_0['vist_web']; ?>" target="_blank" class="activity-link">Book now</a>
                        </div>
                    <?php } ?>
                </div>
        <?php
            }
        } else {
            // If no type is set, display both Sea and Nature Activities
        ?>

            <div id="activities-container" class="activities-grid">
            <p>Loading activities...</p>
        </div>

        <script src="main.js"></script>

        <?php } ?>

        <!-- Notice Section -->
        <div class="notice">
            <p>These prices are more reflective of current market rates but can vary, so it’s always good to check local providers for the most accurate and up-to-date information.</p>
        </div>
    </section>
      
    
    

    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <div class="social-media">
                <p>Follow us on social media:</p>
                <a class="social-icon">
                    <img src="https://th.bing.com/th/id/OIP.ENIq-U2iyx2c51zh5Hv5aAAAAA?rs=1&pid=ImgDetMain" alt="Facebook">
                </a>
                <a class="social-icon">
                    <img src="https://dailytrojan.com/wp-content/uploads/2017/11/instagram1.jpg" alt="Instagram">
                </a>
                <a class="social-icon">
                    <img src="https://logohistory.net/wp-content/uploads/2023/02/Twitter-Log%D0%BE.svg" alt="Twitter">
                </a>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 MauritiusWonders. All rights reserved.</p>
            </div>
        </div>
        </footer>



</body>
</html>
