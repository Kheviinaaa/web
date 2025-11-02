<?php
session_start(); // Start the session

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("location: login.php"); // Redirect to login page if user is not authenticated
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cuisine | MauritiusWonders</title>
		<link rel="stylesheet" href="styles.css"> <!-- Link to external stylesheet -->

	</head>
	<body>
		<!-- Navigation Bar -->
		<header>
			<nav class="navbar">
				<a href="main_page.php" class="logo">MauritiusWonders</a> <!-- Website logo linking to main page -->
				<ul>
					<li><a href="hotels.php">Hotels</a></li> <!-- Link to Hotels page -->
					<li class="dropdown"> <!-- Activities dropdown menu -->
						<a class="dropbtn" href="activities.php">Activities</a>
						<div class="dropdown-content">
							<a href="activities.php?type=1">Sea</a> <!-- Link to Sea Activities -->
							<a href="activities.php?type=2">Nature</a> <!-- Link to Nature Activities -->
						</div>
					</li>
					<li><a href="cuisine.php">Cuisine</a></li> <!-- Link to Cuisine page -->
					<li><a href="contact.php">Contact Us</a></li> <!-- Link to Contact page -->
					<li><a href="feedback.php">Feedback</a></li> <!-- Link to Feedback page -->
				</ul>
			</nav>
		</header>

		<section class="cuisine">
    		<h1>Cuisine</h1>
    		<div id="cuisine-container" class="cuisine-grid"></div>
			<!-- reading the main.js file -->
			<script src="main.js"></script>
		</section>

			

		<!-- Footer Section -->
		<footer>
			<div class="footer-container">
				<div class="social-media">
					<p>Follow us on social media:</p>
					<!-- Social media icons -->
					<a href="" class="social-icon"><img src="https://th.bing.com/th/id/OIP.ENIq-U2iyx2c51zh5Hv5aAAAAA?rs=1&pid=ImgDetMain" alt="Facebook"></a>
					<a href="#" class="social-icon"><img src="https://dailytrojan.com/wp-content/uploads/2017/11/instagram1.jpg" alt="Instagram"></a>
					<a href="#" class="social-icon"><img src="https://logohistory.net/wp-content/uploads/2023/02/Twitter-Log%D0%BE.svg" alt="Twitter"></a>
				</div>

				<div class="footer-bottom">
					<p>&copy; 2024 MauritiusWonders. All rights reserved.</p> <!-- Copyright -->
				</div>
			</div>
		</footer>
		
	</body>
</html>
