<?php
session_start();
if (!isset($_SESSION['username']))// check if SESSION has a variable name username
{
    header("location: login.php");
    exit();
}
	include 'db_connect.php';
	$sql = "SELECT * FROM hotel ";
	$results = $conn->query($sql);
	if($results->num_rows == 0)
	{
		die("<h2>No hotel available</h2>");
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Hotels</title>
        <link rel="stylesheet" href="styles.css">

	</head>
	<body style = " background-image: url('https://www.bing.com/videos/riverview/relatedvideo?&q=live+wallpaper+for+desktop+of+a+moving+seaside+from+the+top&&mid=F574419E7198DEF46391F574419E7198DEF46391&&FORM=GVRPTV'); background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: #fff;">
		<!-- Navigation Bar -->
		<header>
			<nav class="navbar">
				<a href="main_page.php" class="logo">MauritiusWonders</a>
				<ul>
					<li><a href="hotels.php">Hotels</a></li>
					<li class="dropdown">
					<a  class="dropbtn" href = "activities.php">Activities</a>
					<div class="dropdown-content">
						<a href="activities.php?type=1">Sea</a>
						<a href="activities.php?type=2">Nature </a>
					</div>
				</li>
					<li><a href="cuisine.php">Cuisine</a></li>
					<li><a href="contact.php">Contact Us</a></li>
					<li><a href="feedback.php">Feedback</a></li>
				</ul>
			</nav>
		</header>

		<!-- Hotels Section -->
		 <section class="hotels">
   			 <h1>Hotels</h1>
    		<div id="hotels-container" class="hotels-grid">
       		 <p>Loading hotels...</p>
		
   		 </div>
	<script src="hotel.js"></script>
</section>



		

		<!-- Footer Section -->
		<footer>
			<div class="footer-container">
				<div class="social-media">
					<p>Follow us on social media:</p>
					<a href="" class="social-icon"><img src="https://th.bing.com/th/id/OIP.ENIq-U2iyx2c51zh5Hv5aAAAAA?rs=1&pid=ImgDetMain" alt="Facebook"></a>
					<a href="#" class="social-icon"><img src="https://dailytrojan.com/wp-content/uploads/2017/11/instagram1.jpg" alt="Instagram"></a>
					<a href="#" class="social-icon"><img src="https://logohistory.net/wp-content/uploads/2023/02/Twitter-Log%D0%BE.svg" alt="Twitter"></a>
				</div>

				<div class="footer-bottom">
					<p>&copy; 2024 MauritiusWonders. All rights reserved.</p>
				</div>
			</div>
		</footer>

	</body>
</html>
<?php


 $conn->close(); ?>