<?php
// Start the session
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['username'])){
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MauritiusWonders</title>

		<!-- Link to Google Fonts -->
		<link  rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap">

		<!-- Link to CSS -->
		<link rel="stylesheet" href="styles.css">

		<link rel="icon" type="image/x-icon" href="img/logo.ico">

	</head>
	<body>

		<!-- Navigation Bar -->
		<nav class="navbar">
            <div class="logo-title">
				<img src="img/logo.png" alt="Logo" class="logo">
				<span class="site-name">MauritiusWonders</span>
			</div>

            <ul>
                <li><a href="hotels.php" >Hotels</a></li>
                <li class="dropdown">
					<a  class="dropbtn" href = "activities.php">Activities</a>
					<div class="dropdown-content">
						<a href="activities.php?type=1">Sea</a>
						<a href="activities.php?type=2">Nature </a>
					</div>
				</li>
                <li><a href="cuisine.php" >Cuisine</a></li>
				<li class="dropdown">
					<a  class="dropbtn">More</a>
					<div class="dropdown-content">
						<a href="main_page.php">Home</a>
						<a href="contact.php">Contact Us</a>
						<a href="feedback.php">Feedback</a>
					</div>
				</li>
            <li class="dropdown">
					<a  class="dropbtn"><?php echo $_SESSION['username'];?></a>
					<div class="dropdown-content">
						<a href="logout.php">Log out</a>
					</div>
				</li>

            </ul>
        </nav>

		<!-- Main content -->
		<div  class="overlay">
			<h1 id="home">Welcome to MauritiusWonders</h1>
			<p>Your guide to exploring the beauty, culture, and attractions of Mauritius.</p>
		
		
			<section id="weather-section">
				<h2>🌦️ Live Weather in Mauritius</h2>
				<div class="weather-search">
					<input type="text" id="cityInput" placeholder="Enter location (e.g. Curepipe)">
					<button id="searchWeather">Search</button>
				</div>
						<script src="jquery-3.7.1.min.js"></script>
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
						<script src="weather.js"></script>
				<div id="weather" class="weather-box">
					Loading current weather...
				</div>
			</section>

			<!-- Exploring Mru Section -->
			<div class="section" id="explore">
				<h2>Explore Mauritius</h2>
				<div class="explore-grid">
					<div class="explore">
						<div class="carousel">
							<img src="img/IMG-20250316-WA0016.jpg" class="carousel-image active">
							<img src="img/la-combuse.jpeg" class="carousel-image">
							<img src="img/night.jpeg" class="carousel-image">
							<img src="img/sunset.jpg" class="carousel-image">
							<img src="img/sun.jpg" class="carousel-image">
							<img src="img/beauty.jpg" class="carousel-image">
						</div>
						<h3>Stunning Beaches</h3>
						<p>Relax on Mauritius' pristine beaches with golden sands and clear turquoise waters.</p>
					</div>
					<div class="explore">
						<div class="carousel">
							<img src="img/IMG-20250316-WA0018.jpg" class="carousel-image active">
							<img src="img/IMG-20250420-WA0007.jpg" class="carousel-image">
							<img src="img/IMG-20250420-WA0010.jpg" class="carousel-image">
							<img src="img/pieton.jpeg" class="carousel-image">
							<img src="img/pilrin.jpeg" class="carousel-image">
							<img src="img/sophie.jpeg" class="carousel-image">
							<img src="img/nat.jpeg" class="carousel-image">
						</div>
						<h3>Nature Reserves</h3>
						<p>Discover the lush landscapes and unique wildlife of Mauritius' nature reserves.</p>
					</div>
					<div class="explore">
						<div class="carousel">
							<img src="img/IMG-20250316-WA0011.jpg" class="carousel-image active">
							<img src="img/ganesh.jpg" class="carousel-image">
							<img src="img/tooket.jpeg" class="carousel-image">
							<img src="img/cap.jpeg" class="carousel-image">
							<img src="img/mosque.jpg" class="carousel-image">
						</div>
						<h3>Vibrant Culture</h3>
						<p>Experience the rich cultural heritage and lively festivals that make Mauritius special.</p>
					</div>
				</div>
			</div>

			<!-- Attractions Section -->
			<div class="section" id="attractions">
				<h2>Featured Attractions</h2>
				<div class="explore-grid">
					<div class="explore">
						<div class="carousel">
							<img src="img/ssr.jpg" class="carousel-image active">
							<img src="img/ducks.jpg" class="carousel-image">
							<img src="img/deers.jpg" class="carousel-image">
							<img src="img/tortoise.jpg" class="carousel-image">
						</div>
						<h3>Sir Seewoosagur Ramgoolam Botanical Garden</h3>
						<p>Discover exotic plants, giant water lilies, and rich history at Mauritius’ oldest botanical garden in Pamplemousses.</p>
					</div>
					<div class="explore">
						<div class="carousel">
							<img src="img/la-vanille.jpg" class="carousel-image active">
							<img src="img/turtle.jpg" class="carousel-image">
							<img src="img/butter.jpg" class="carousel-image">
							<img src="img/snake.jpg" class="carousel-image">
							<img src="img/waterfall.jpg" class="carousel-image">
							<img src="img/croco.jpg" class="carousel-image">
						</div>
						<h3>La Vanille Nature Park</h3>
						<p>Explore rare animals, giant tortoises, and a fascinating insect museum in this tropical nature park.</p>
					</div>
					<div class="explore">
						<div class="carousel">
							<img src="img/bato.jpg" class="carousel-image active">
							<img src="img/ile.jpg" class="carousel-image">
							<img src="img/grse.jpg" class="carousel-image">
						</div>
						<h3>Catamaran Tour To GRSE Waterfall & Île Aux Cerfs</h3>
						<p>Enjoy a catamaran cruise to GRSE Waterfall and relax on the stunning beaches of Île aux Cerfs.</p>
					</div>
				</div>
			</div>

			<!-- Shopping and Markets Section -->
			<div class="section" id="shopping-markets">
				<h2>Shopping and Markets</h2>
				<div class="explore-grid">
					<div class="explore">
						<div class="carousel">
							<img src="img/maha1.jpg" class="carousel-image active">
							<img src="img/maha2.jpg" class="carousel-image">
							<img src="img/maha3.jpg" class="carousel-image">
							<img src="img/maha4.jpg" class="carousel-image">
							<img src="img/maha5.jpg" class="carousel-image">
						</div>
						<h3>Mahagony Shopping Promenade</h3>
						<p>Shop, dine, and unwind by the lake at Mahogany Promenade in Beau Plan.</p>
					</div>
					<div class="explore">
						<div class="carousel">
							<img src="img/port-louis.jpg" class="carousel-image active">
							<img src="img/caudan.jpg" class="carousel-image">
							<img src="img/caudan2.jpeg" class="carousel-image">
							<img src="img/pl.jpeg" class="carousel-image">
							<img src="img/pl1.jpeg" class="carousel-image">
							<img src="img/pl2.jpeg" class="carousel-image">
							<img src="img/pl3.jpeg" class="carousel-image">
						</div>
						<h3>Port Louis Market</h3>
						<p>Visit the bustling Port Louis Market & Caudan WaterFront to experience local crafts, foods, and culture.</p>
					</div>
					<div class="explore">
						<div class="carousel">
							<img src="img/gb.jpg" class="carousel-image active">
							<img src="img/la-croisette.jpeg" class="carousel-image">
							<img src="img/la-croisette2.jpeg" class="carousel-image">
							<img src="img/crois3.jpeg" class="carousel-image">
							<img src="img/crois4.jpeg" class="carousel-image">
							<img src="img/crois5.jpeg" class="carousel-image">
						</div>
						<h3>Grand Baie</h3>
						<p>Grand Baie is a lively beach town in northern Mauritius, known for its vibrant nightlife and beautiful ocean views.</p>
					</div>
				</div>
			</div>


			<!-- History of Mauritius Section -->
			<div class="section" id="history">
				<h2>History of Mauritius</h2>
				<div class="explore-grid">
					<div>
						<img src="img/history3.jpg">
					</div>
					<div>
						<img src="img/history2.jpg">
					</div>
						<div>
							<h3>Pre-Colonial Era</h3>
							<p>•Uninhabited Before the 16th Century: Mauritius was unknown to humans until the Arabs
							and Malays likely visited in the 10th century. It remained uninhabited until the arrival of the Europeans.</p>
							<br/>
							<p>•Arab & Portuguese Sailors: Arab maps from around the 10th century mention an island in the region,
							and Portuguese sailors made brief stops in the early 1500s.</p>
						</div>
						<div>
							<h3>Dutch Period (1598–1710)</h3>
							<p>•The Dutch were the first to colonize Mauritius.</p>
							<p>•Named the island after Prince Maurice of Nassau.</p>
							<p>•Introduced sugar cane, domestic animals, and deer.</p>
							<p>•Exploited the ebony forests.</p>
							<p>•The Dutch abandoned the island in 1710 due to harsh conditions.</p>
						</div>
						<div>
							<h3>French Rule (1715–1810)</h3>
							<p>•The French took control and renamed the island Île de France.</p>
							<p>•Developed Port Louis as a naval base and administrative center.</p>
							<p>•Introduced African slaves to work on sugar plantations.</p>
							<p>•French cultural influence remains strong to this day.</p>
						</div>
						<div>
							<h3>British Rule (1810–1968)</h3>
							<p>•The British captured Mauritius during the Napoleonic Wars in 1810 but allowed the French settlers to keep their language, religion, and legal system.</p>
							<p>•Abolished slavery in 1835, which led to the arrival of indentured laborers, mainly from India.</p>
							<p>•This drastically changed the demographic and cultural landscape.</p>
						</div>

				</div>
			</div>

			<!-- Independence of Mauritius Section -->
			<div class="section" id="independence">
				<h2>Independence of Mauritius</h2>
				<div class="explore-grid">
					<div>
						<img src="img/indep.jpg">
					</div>

					<div>
						<h3>Path to Independence:</h3>
						<p>•After World War II, movements for self-governance and independence gained momentum.</p>
						<p>•Political parties like the Mauritius Labour Party (led by Sir Seewoosagur Ramgoolam) advocated for independence.</p>
						<p>•A constitutional conference was held in London in 1965, and after several discussions and a national referendum, the path to independence was agreed upon.</p>
					</div>
					<div>
						<h3>Independence Day – March 12, 1968:</h3>
						<p>•Mauritius officially became an independent nation within the Commonwealth.</p>
						<p>•Sir Seewoosagur Ramgoolam became the first Prime Minister.</p>
						<p>•The national flag of Mauritius was raised for the first time, featuring four horizontal stripes: red, blue, yellow, and green.</p>
					</div>
					<div>
						<h3>Republic Status:</h3>
						<p>•Mauritius later became a republic on March 12, 1992, with a president as the head of state, although it remained in the Commonwealth.</p>
						<p>•March 12 is celebrated annually as Independence and Republic Day, a national holiday marked by parades, cultural events, and flag-raising ceremonies.</p>
					</div>
				</div>
			</div>

			<!-- Cultural Heritage Section -->
			<div class="section" id="cultural-heritage">
				<h2>Cultural Heritage</h2>
				<div class="explore-grid">
					<div class="explore">
						<div class="carousel">
							<img src="img/national-history-museum.jpg">
						</div>
						<h3>Mahebourg Historical Naval Museum - Around 1772</h3>
						<p>Mahebourg is a historic coastal village in the southeast of Mauritius.
						Established by the French during colonial times, it was once the main port of the island.
						The town reflects colonial-era architecture and is known for its rich maritime history.</p>
					</div>
					<div class="explore">
						<div class="carousel">
							<img src="img/la-citadelle.jpg">
						</div>
						<h3>La Citadelle - 1840</h3>
						<p>La Citadelle, also known as Fort Adelaide, is a military fort built by the British in Port Louis.
						Constructed with basalt stones, it was designed to protect the city from rebellion and potential invasion.
						Today, it offers panoramic views of Port Louis and serves as a cultural heritage site.</p>
					</div>
					<div class="explore">
						<div class="carousel">
							<img src="img/aapravasi-ghat.jpg">
						</div>
						<h3>Aapravasi Ghat - 1849</h3>
						<p>Located in Port Louis, Aapravasi Ghat is a UNESCO World Heritage Site that marks the landing point of indentured laborers brought
						from India to work on sugar plantations after the abolition of slavery.
						It’s a key symbol of the island’s multicultural heritage.</p>
					</div>
					<div class="explore">
						<div class="carousel">
							<img src="img/chateau-de-labourdonnais.jpg">
						</div>
						<h3>Chateau De Labourdonnais - 1859</h3>
						<p>Built in the north of Mauritius, the Château de Labourdonnais is a grand colonial mansion surrounded by orchards and gardens.
						It showcases 19th-century architecture and today functions as a museum,
						offering insights into the lifestyle of wealthy sugar estate owners.</p>
					</div>
					<div class="explore">
						<div class="carousel">
							<img src="img/the-natural-history-museum.jpg">
						</div>
						<h3>The Natural History Museum - Around 1880</h3>
						<p>Located in Port Louis, this museum is one of the oldest in Mauritius.
						It houses collections of native flora and fauna, fossils, and cultural artifacts,
						including a famous dodo skeleton,
						highlighting the island’s unique biodiversity and history.</p>
					</div>
					<div class="explore">
						<div class="carousel">
							<img src="img/sugar-museum.jpg">
						</div>
						<h3>The Sugar Museum - 2002</h3>
						<p>This museum is located in an old sugar factory in Pamplemousses. Opened in 2002, it takes visitors
						through the history of the sugar industry in Mauritius and its socio-economic impact.
						It also includes interactive exhibits and tastings of local sugar-based products.</p>
					</div>
					<div>
						→ View More  <a href="https://mauritiusattractions.com/10-best-historical-heritage-places-you-must-visit-mauritius-i-434.html">Here</a>
					</div>
				</div>
			</div>

			<!-- Travel Essentials Section -->
			<div class="section" id="travel-essentials">
				<h2>Travel Essentials</h2>
				<div class="explore-grid">
					<div>
						<h3>1. Travel Documents</h3>
						<p>Passport: Ensure it’s valid for at least 6 months from your date of arrival.</p>
						<p>Visa: Most visitors don’t require a visa for short stays (up to 60 days), but check the specific requirements based on your nationality.</p>
						<p>Travel Insurance: Recommended for coverage of medical emergencies, cancellations, and lost belongings.</p>
					</div>
					<div>
						<h3>2. Currency</h3>
						<p>Currency: The Mauritian Rupee (MUR) is the local currency. It’s helpful to have some cash, but credit cards are widely accepted.</p>
						<p>Currency Exchange: Exchange currency at banks or authorized currency exchange offices in major areas. ATMs are available throughout the island.</p>
					</div>
					<div>
						<h3>3. Electrical Items</h3>
						<p>Power Adapters: Mauritius uses the British-style three-pin plug (Type G), so if your devices use a different plug type, bring a suitable adapter.</p>
						<p>Voltage: 230V at 50Hz, so ensure your devices can support this voltage.</p>
						<p>Chargers: Bring chargers for all your electronic devices (phone, camera, etc.).</p>
					</div>
					<div>
						<h3>4. Local SIM Card & Internet</h3>
						<p>SIM Card: Consider buying a local SIM card for cheaper data and calls. You can purchase them at the airport or at local stores.</p>
						<p>Wi-Fi: Available in most hotels, resorts, and cafes, but speeds can vary in more remote areas.</p>
					</div>
					<div>
						<h3>5. Excursions & Activities</h3>
						<p>Booking Tours: Plan excursions in advance, especially for popular activities like snorkeling, diving, or island hopping.</p>
						<p>Snorkel Gear: If you plan on exploring the coral reefs, bring your own snorkel gear, though it can also be rented locally.</p>
					</div>
					<div>
						<h3>6. Transport</h3>
						<p>Car Hire: Renting a car is a convenient way to explore the island. Ensure you have an international driving permit if needed.</p>
						<p>Public Transport: Buses are available but might be slow. Taxis can be hired for day trips, and many resorts offer shuttle services.</p>
					</div>
					<div>
						<h3>7. Emergency Numbers</h3>
						<p>Police: 999</p>
						<p>Ambulance: 114</p>
						<p>Fire Department: 115</p>
					</div>
					<div>
						<h3>8. Time Zone</h3>
						<p>Mauritius operates on Mauritius Standard Time (MST), which is UTC +4.</p>
					</div>
				</div>
			</div>

			<!-- Rodrigues Island Section -->
			<div class="section" id="rodrigues-island">
				<h2>Rodrigues Island</h2>
					<div class="gallery-section">
						<div class="gallery-grid">
							<img src="img/r1.jpeg">
							<img src="img/r2.jpeg">
							<img src="img/r3.jpeg">
							<img src="img/r4.jpeg">
							<img src="img/r5.jpeg">
							<img src="img/r6.jpeg">
							<img src="img/r7.jpeg">
							<img src="img/r8.jpeg">
							<img src="img/r9.jpeg">
							<img src="img/r10.jpeg">
							<img src="img/r11.jpeg">
							<img src="img/r12.jpeg">
							<img src="img/r13.jpeg">
							<img src="img/r14.jpeg">
							<img src="img/r20.jpg">
							<img src="img/r21.jpg">
							<img src="img/r22.jpg">
							<img src="img/r15.jpeg">
							<img src="img/r16.jpeg">
							<img src="img/r17.jpeg">
							<img src="img/r18.jpeg">
							<img src="img/r19.jpeg">
						</div>
					</div>
					<p>Uncover the serene beauty and peaceful lifestyle of Rodrigues Island.</p>
				</div>
			</div>

			<button onclick="topFunction()" id="backToTop" title="Go to top">↑</button>

			
			<!-- Footer Section -->
			<footer >
				<div class="footer-container">
					<div class="more-on-us">
						<h3>More On Us</h3>
						<ul>

							<li><a href="contact.php">Contact Us</a></li>
							<li><a href="feedback.php">Feedback</a></li>
						</ul>
					</div>

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
		</div>

	<!-- Scripts -->
	<script src="main.js"></script>
	</body>
</html>

