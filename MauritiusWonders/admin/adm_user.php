<?php
// Start session to manage user login state
session_start();

// Check if admin username is set in session, otherwise redirect to login page
if (!isset($_SESSION['adm_username'])){
    header("location: adm_login.php");  // Redirect to admin login page
    exit();  // Stop further execution
}

// Include the database connection
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include jQuery and custom JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="my_jquery_functions.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        /* Basic styling for body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        /* User card styling */
        .user-card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }
        
        .user-card h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        
        .user-card p {
            margin: 5px 0;
            color: #666;
        }

        /* Navbar styling */
        .navbar {
            position: fixed;
            width: 100%;
            top: 0;
            background: rgba(0, 0, 0, 0.8); /* Semi-transparent background */
            padding: 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
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
            transition: color 0.3s;
        }

        .navbar ul li a:hover {
            color: #FFD700; /* Golden color on hover */
        }

        /* Table styling for user details */
        .container {
            width: 80%;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Dropdown styling */
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
    </style>
</head>
<body>
    <!-- Navbar Section -->
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

    <!-- Main content for displaying user details -->
    <?php
        // Query to fetch all user data from the database
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);

        // Check if there are no users in the database
        if ($result->num_rows <= 0) {
            die("No user found"); // Display message if no users are found
        }
    ?>

    <!-- Container for displaying user details in a table -->
    <div class="container">
        <h1>User Details</h1>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through user data and display each user's details -->
                <?php foreach($result as $row) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <!-- Link to delete user -->
                        <td><a href="delete.php?id=<?php echo $row['id']; ?>&from=user" id="delete">Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
