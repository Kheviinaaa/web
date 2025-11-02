
<?php
session_start();
if (!isset($_SESSION['adm_username'])){
    header("location: adm_login.php");
    exit();
}



	include 'db_connect.php';

	$sql = "SELECT * FROM cuisine ";
	$results = $conn->query($sql);

	if($results->num_rows == 0)
	{
		die("<h2>No cuisine available</h2>");
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cuisine | MauritiusWonders</title>
		<link rel="stylesheet" href="css/styles.css">
		<style>
            body {
	 font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

/* Dropdown Menu */
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

.dropdown-content a:hover {background-color: black;}

.dropdown:hover .dropdown-content {display: block;}

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
/* End Of Navigation Bar */

.overlay {
	background-image: url('mauritiuss.jpg');
    background-size: fit;
	background-color: rgba(0, 0, 0, 0.5);
    color: white;
    text-align: center;
	min-height: 100vh;
	padding: 80px 20px 20px;
}

h1, h2, h3 {
	margin: 0;
	padding: 10px 0;
}

h1 {
	font-size: 48px;
	margin-top: 0;
	text-shadow: 2px 2px 4px #000;
}

h2 {
	font-size: 36px;
}

h3 {
	font-size: 24px;
}

p {
	font-size: 18px;
	margin: 0 20px;
}

.section {
	margin: 40px 0;
}

.explore-grid {
	display: flex;
	justify-content: center;
	flex-wrap: wrap;
}

.explore {
	background-color: #fff;
	color: #333;
	border-radius: 8px;
	box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
	margin: 15px;
	padding: 20px;
	text-align: center;
	width: 300px;
}

.explore img {
	width: 100%;
	border-radius: 8px;
}

.explore h2 {
    font-size: 2.5rem;
    margin-bottom: 2rem;
    color: #333;
}

.attraction {
	background-color: #fff;
	color: #333;
	border-radius: 8px;
	box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
	margin: 15px;
	padding: 20px;
	text-align: left;
	display: inline-block;
	width: calc(33% - 60px);
	vertical-align: top;
}

.attraction img {
	width: 100%;
	border-radius: 8px;
}

.attraction h3 {
	margin-top: 10px;
	font-size: 22px;
}

.attraction p {
	font-size: 16px;
}

@media (max-width: 768px) {
	h1 {
		font-size: 36px;
	}

	p {
		font-size: 16px;
	}

	.attraction, .explore {
		width: calc(100% - 40px);
		margin: 20px;
	}
}

/* Footer Styles */
footer {
    background: #333; /* Dark background color */
    color: #f4f4f4; /* Light text color */
    padding: 20px 0;
    font-family: 'Poppins', sans-serif;
}

.footer-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-container div {
    flex: 1;
    text-align: center;
}

.more-on-us h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.more-on-us ul {
    list-style-type: none;
    padding: 0;
}

.more-on-us ul li {
    margin: 5px 0;
}

.more-on-us ul li a {
    color: #f4f4f4;
    text-decoration: none;
    font-weight: 400;
}

.more-on-us ul li a:hover {
    color: #ffd700; /* Add hover effect with a gold color */
}

.social-media p {
    margin-bottom: 10px;
}

.social-icon img {
    width: 24px;
    height: 24px;
    margin: 0 10px;
    transition: transform 0.2s;
}

.social-icon img:hover {
    transform: scale(1.2);
}

.footer-bottom {
    margin-top: 20px;
    font-size: 0.9rem;
}

.footer-bottom p {
    margin: 0;
}



/* Hotels Section */
.hotels {
    padding: 60px 20px;
    text-align: center;
    background-color: #f9f9f9;
}

.hotels-grid {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.hotel-card {
    background-color: #fff;
    padding: 20px;
    margin: 10px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    width: 30%;
    transition: transform 0.3s ease;
}

.hotel-card img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

.hotel-card h3 {
    margin-top: 15px;
    font-size: 24px;
    color: #333;
}

.hotel-card p {
    font-size: 16px;
    margin-top: 10px;
    color: #666;
}

.hotel-link {
    display: inline-block;
    margin-top: 15px;
    background-color: #4fc3f7;
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.hotel-link:hover {
    background-color: #333;
    color: #fff;
}

.hotel-card:hover {
    transform: scale(1.05);
}

.stars {
            color: gold;
            font-size: 1.2em;
        }

.hotels, .activities, .cuisine {
    padding: 60px 20px;
    text-align: center;
    background-color: #f9f9f9;
}

.hotels-grid, .activities-grid, .cuisine-grid {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.hotel-card, .activity-card, .cuisine-card {
    background-color: #fff;
    padding: 20px;
    margin: 10px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

/* Activities section */
.activities-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

.activity-card {
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 15px;
    text-align: center;
    background-color: #f9f9f9;
    transition: transform 0.3s;

}

.activity-card img {
    width: 100%; /* Make the image responsive */
    max-height: 200px; /* Set a maximum height */
    object-fit: cover; /* Ensure the image covers the area without distortion */
    border-radius: 10px; /* Add rounded corners to the images */
}

.activity-card:hover {
    transform: scale(1.05);
}

.notice {
    margin-top: 20px;
    font-size: 0.9em;
    color: #666;
    text-align: center;
}

.activity-link {
    display: inline-block;
    margin-top: 15px;
    background-color: #4fc3f7;
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.activity-link:hover {
    background-color: #333;
    color: #fff;
}

.activity-card:hover {
    transform: scale(1.05);
}

/* Cuisine section */
.cuisine-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
    padding: 20px;
    margin: 0 auto;
    max-width: 1200px;
}

.cuisine-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s;
    text-align: center;
}

.cuisine-card:hover {
    transform: scale(1.05);
}

.cuisine-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-bottom: 5px solid #f4a261;
}

.cuisine-card h3 {
    font-size: 1.5em;
    margin: 10px 0;
    color: #264653;
}

.cuisine-card p {
    padding: 0 15px 20px;
    text-align: justify;
    color: #666;
    line-height: 1.5em;
}

/* Restaurant Info Styling */
.restaurant-info {
    background-color: #f4f4f4;
    padding: 10px;
    margin-top: 10px;
    border-radius: 5px;
}

.restaurant-info p {
    margin: 5px 0;
    font-size: 0.9em;
    color: #333;
}

.restaurant-info strong {
    color: #264653;
}

/* login Styles */
.login {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    justify-content: center;
    align-items: center;
}

.login-content {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    width: 400px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.5);
}

.login h2 {
    margin-bottom: 20px;
    font-size: 24px;
    text-align: center;
}

.login form input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
}

.login button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
}

.login button:hover {
    background-color: #0056b3;
}

.close {
    color: black;
    position: absolute;
    top: 10px;
    right: 20px;
}
            </style>
	</head>
	<body>
		<!-- Navigation Bar -->
		<header>
			 <nav class="navbar">
            <ul>
                 <li><a href="adm_home.php">Home</a></li>
                <li class="dropdown">
					<a  class="dropbtn" href = "adm_hotel.php">Hotel</a>
					<div class="dropdown-content">
						<a href="add_hotel.php">Add Hotel</a>
					</div>
				</li>
               <li class="dropdown">
					<a  class="dropbtn" href = "adm_activity.php">Activities</a>
					<div class="dropdown-content">
						<a href="adm_activity.php?type=1">Sea</a>
						<a href="adm_activity.php?type=2">Nature </a>
						<a href="add_activities.php">Add Activities </a>

					</div>
				</li>
                 <li class="dropdown">
					<a  class="dropbtn" href = "adm_cuisine.php">Cuisine</a>
					<div class="dropdown-content">
						<a href="add_cuisine.php">Add Cuisine</a>
					</div>
				</li>
                <li><a href="adm_user.php">Users</a></li>
                <li><a href="adm_feedback.php">Feedback</a></li>
                <li><a href="adm_contact.php">Contact</a></li>
            </ul>
        </nav>
		</header>

		<!-- Cuisine Section -->
		<section class="cuisine">
			<h1>Authentic Mauritian Cuisine</h1>
				<div class="cuisine-grid">
					<?php foreach ($results as $result){ ?><div class="cuisine-card">
						<img src = <?php echo $result['img_src'] ;?> alt=<?php echo $result['name'] ;?>>
						<h3><?php echo $result['name'] ;?></h3>
						<p><?php echo $result['description'] ;?></p>
						<div class="restaurant-info">
							<p><strong>Restaurant:</strong> <?php echo $result['restaurant'] ;?></p>
							<p><strong>Dish tried:</strong> <?php echo $result['dish'] ;?></p>
						</div>
                        <a href="edit_cuisine.php?id=<?php echo $result['id'] ;?>" class="activity-link">Edit </a>
						<a href="delete.php?id=<?php echo $result['id'] ;?>&from=cuisine" id = "delete" class="activity-link">Delete </a>

					</div><?php }?>
				</div>
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
<!----End of Footer-->
	</body>
</html>
