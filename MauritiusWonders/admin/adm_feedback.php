<?php
// Start the session
session_start();

// Redirect to admin login page if session is not set
if (!isset($_SESSION['adm_username'])){
    header("location: adm_login.php");
    exit();
}

// Include database connection file
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags and page title -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Cards</title>

    <!-- Internal CSS Styling -->
    <style>
        /* General Body Styling */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container for feedback cards */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Individual Feedback Card Styling */
        .feedback-card {
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative; /* For positioning delete button */
        }

        /* Header inside feedback card */
        .card-header {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        /* Name text styling */
        .card-header .name {
            font-weight: bold;
            font-size: 1.1em;
            margin: 0;
        }

        /* Email text styling */
        .card-header .email {
            font-size: 0.9em;
            color: #555;
            margin: 5px 0 0;
        }

        /* Content inside feedback card */
        .card-content {
            padding: 20px;
            text-align: center;
            font-size: 1em;
            color: #333;
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

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Navigation Bar Styling */
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

        /* Styling for delete button inside feedback card */
        .delete-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            color: red;
            cursor: pointer;
            background: transparent;
            border: none;
        }

        .delete-btn:hover {
            color: darkred;
        }
    </style>
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
    <?php
    // Fetch feedback from database
    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);

    // If no feedback found, display error
    if($result->num_rows <= 0) {
        die("No feedback found");
    }
    ?>

    <!-- Display all feedbacks inside cards -->
    <div class="card-container">
        <?php foreach($result as $row){ ?>
            <div class="feedback-card">
                <div class="card-header">
                    <!-- Delete button (red cross) -->
                    <a class="delete-btn" href="delete.php?id=<?php echo $row['id']; ?>&from=feedback">X</a>

                    <!-- User Name -->
                    <p class="name"><?php echo $row['name']; ?></p>

                    <!-- User Email -->
                    <p class="email"><?php echo $row['email']; ?></p>
                </div>

                <!-- Feedback Message -->
                <div class="card-content">
                    <p><?php echo $row['message']; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>
