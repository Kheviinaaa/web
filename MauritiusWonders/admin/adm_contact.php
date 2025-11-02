<?php
// Start the session
session_start();

// Check if admin is logged in
if (!isset($_SESSION['adm_username'])) {
    header("location: adm_login.php");
    exit();
}

// Include database connection
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Cards</title>

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

        /* Container for all cards */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            max-width: 1000px;
            margin: 0 auto;
        }

        /* Individual feedback card */
        .feedback-card {
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Header of each card */
        .card-header {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .card-header .name {
            font-weight: bold;
            font-size: 1.1em;
            margin: 0;
        }

        .card-header .email {
            font-size: 0.9em;
            color: #555;
            margin: 5px 0 0;
        }

        /* Content of each card */
        .card-content {
            padding: 20px;
            text-align: center;
            font-size: 1em;
            color: #333;
        }

        /* Response section */
        .card-response {
            padding: 15px;
            border-top: 1px solid #ddd;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .card-response label {
            font-size: 0.9em;
            color: #555;
        }

        .card-response input {
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .card-response button {
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9em;
        }

        .card-response button:hover {
            background-color: #0056b3;
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

        /* Navigation Bar */
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
    </style>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Custom jQuery functions -->
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
    <?php
    // Query to select all messages from contact table
    $sql = "SELECT * FROM contact";
    $result = $conn->query($sql);

    // If no message found
    if ($result->num_rows <= 0) {
        die("No message found");
    }
    ?>

    <!-- Container for feedback cards -->
    <div class="card-container">
        <?php foreach($result as $row) { ?>
            <div class="feedback-card">
                <div class="card-header">
                    <p class="name"><?php echo $row['name']; ?></p>
                    <p class="email"><?php echo $row['email']; ?></p>
                </div>
                <div class="card-content">
                    <p><?php echo $row['message']; ?></p>
                </div>
                <div class="card-response">
                    <label>Your Response:</label>
                    <input type="text" id="response" placeholder="Enter your response">
                    <button>
                        <a id="delete" href="delete.php?id=<?php echo $row['id']; ?>&from=contact">Submit Response</a>
                    </button>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

<!-- jQuery to validate the response field -->
<script>
    $(document).ready(function() {
        $("#delete").click(function(event) {
            if ($("#response").val() == "") {
                alert("response field is empty");
                event.preventDefault();
            }
        });
    });
</script>

</html>
