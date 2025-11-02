-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2025 at 08:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mauritiuswonders`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `activity_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activity_type`) VALUES
(1, 'Sea'),
(2, 'Nature');

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `img_src` longtext NOT NULL,
  `name` varchar(200) NOT NULL,
  `picture_src` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `vist_web` longtext NOT NULL,
  `activity_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `img_src`, `name`, `picture_src`, `description`, `vist_web`, `activity_type`) VALUES
(5, 'img/IMG-20250316-WA0020.jpg', 'Undersea', 'Picture from Aquacity', 'Experience a perfect combination of flavors with our vindaye octopus, which has moist lobster meat covered in a tangy, glossy sauce that highlights its natura', 'https://www.aquacitymauritius.com/tour/undersea-walk/', 1),
(6, 'https://q-xx.bstatic.com/xdata/images/xphoto/max1200/304820907.jpg?k=56770b9a4513d565ed60e3481150cd54651bc3bb6734bb95e0361e7fabb9c4ea&o=', 'Swim with Dolphins', 'Picture From Booking.com', 'Experience the thrill of swimming with dolphins in their natural habitat.', '\"https://www.booking.com/attractions/mu/prwihjht8sse-full-day-shared-speedboat-tour-south-west-lagoon-dolphin-swim.en-gb.html\"', 1),
(8, 'img/IMG-20250316-WA0013.jpg', 'Kitesurfing at Le Morne', 'Picture From Deals.mu', 'Catch the perfect winds for kitesurfing at the UNESCO World Heritage site of Le Morne.', '\"https://deals.mu/private-or-group-kitesurfing-lessons-le-morne\"', 1),
(9, 'https://media-cdn.tripadvisor.com/media/attractions-splice-spp-674x446/07/73/5a/01.jpg', 'Hiking in Black River Gorges', 'Picture From TripAdvisor', 'Explore the lush forests and scenic trails of Black River Gorges National Park.', '\"https://www.tripadvisor.com/AttractionProductReview-g293816-d17349052-Hiking_in_the_Black_River_Gorges_National_Parc_Native_Forest-Mauritius.html\"', 2),
(10, 'https://media-cdn.tripadvisor.com/media/attractions-splice-spp-674x446/09/2d/da/15.jpg', 'Visit the Chamarel Waterfall', 'Picture From TripAdvisor', 'Experience the beauty of Chamarel Waterfall and its surrounding landscapes.', '\"https://www.tripadvisor.com/AttractionProductReview-g293816-d19146997-Entrance_Ticket_for_Chamarel_7_Coloured_Earth_Geopark-Mauritius.html\"', 2),
(11, 'https://th.bing.com/th/id/OIP.rB4cPvPT5BpyhZZGxWueGwHaE5?rs=1&pid=ImgDetMain', 'Zipline At La Vallée des Couleurs', 'Picture From La Vallée des Couleurs Site', 'La Vallée des Couleurs in Mauritius is a nature park with diverse flora and fauna, including endemic species.', '\"https://www.lvdc.mu/\"', 2),
(16, 'https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_400,h_300/https://www.aquacitymauritius.com/wp-content/uploads/2020/09/21-1-of-1-400x300.jpg', 'Tube Ride', 'Picture from Aquacity', 'One of the most popular exciting water-sports activities with a duration of approximately 5-7 minutes in the mesmerizing lagoon. Bounce on the waves behind a speedboat and get thrilled!', 'https://www.aquacitymauritius.com/tour/tube-ride/', 1),
(17, 'https://dynamic-media.tacdn.com/media/photo-o/2f/0d/95/6a/caption.jpg?w=1100&h=800&s=1', 'Snorkel with Dolphins', 'Picture from Viator', 'Dolphins watch, Swimming and snorkeling with dolphins with all equipment available free on board.Furthermore going ahead,swim close to and also touching the big crystal rock.', 'https://www.viator.com/tours/Mauritius/Snorkel-with-Dolphins-Lunch-on-Benitiers-island-Speedboat/d4463-409080P2', 1),
(18, 'https://mauritiusattractions.com/slir/w311-h171/content/images/activity/1693.jpg', 'Splash and Fun Leisure Park - WaterPark', 'Picture from Booking.com', 'The Black Hole is more for the daring souls, ready to feel the thrill of a launching rocket. Fear not as you’ll soon enjoy a smooth landing into a beautiful pool. ', 'https://mauritiusattractions.com/splash-leisure-park-entrance-waterpark-p-1693.html', 1),
(19, 'https://cdn.getyourguide.com/img/tour/63727a116bddd.jpeg/145.jpg', 'Kayaking', 'Picture from Getyourguide', 'Embark on a kayaking adventure to Amber island and paddle through a floating mangrove forest. Enjoy a guided tour of the island.', 'https://www.getyourguide.com/mauritius-l2105/mauritius-amber-island-kayak-or-small-boat-tour-with-lunch-t391647/?ranking_uuid=724640de-82a0-47d7-98f0-17d4e0626993', 1),
(20, 'https://cdn.getyourguide.com/img/tour/5a69d10dbc13d.jpeg/98.jpg', 'Private Catamaran Charter to Ile aux Cerfs', 'Picture from Getyourguide', 'Climb aboard the Island Hopper catamaran and enjoy a private charter to the breathtaking Ile aux Cerfs. Get the chance to swim in turquoise waters and snorkel.', 'https://www.getyourguide.com/mauritius-l2105/private-charter-to-ile-aux-cerfs-t136580/?ranking_uuid=dd7c89cc-34ef-48a9-bf19-d6d57f1794be', 1),
(21, 'https://cdn.getyourguide.com/img/tour/5e4129ea9002f.jpeg/97.jpg', 'Seabob Diving', 'Picture from Getyourguide', 'Enjoy an exciting sea adventure on a Seabob, which is a self-controlled device allowing you to explore the ocean at high-speed.', 'https://www.getyourguide.com/grand-baie-l2072/mauritius-seabob-diving-experience-t368871/?ranking_uuid=a113a5d2-b89b-48f3-908e-e068964b6b47', 1),
(22, 'https://cdn.getyourguide.com/img/tour/641e99824c253.jpeg/98.jpg', 'Parasailing', 'Picture from Getyourguide', 'Make a splash with an adventure day of waterspont activities in Mauritius. Feel the adrenaline thrill of parasailing.', 'https://www.getyourguide.com/mauritius-l2105/water-sport-combo-package-with-lunch-and-pick-up-from-hotel-t454141/?ranking_uuid=ef55ff38-b197-4bd4-828d-8e95df999ba7', 1),
(23, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2a/47/38/76/presenting-you-our-new.jpg?w=1400&amp;h=-1&amp;s=1', 'Casela Nature Park', 'Picture from TripAdvisor', 'Explore Casela Nature Parks; 350-hectare wonderland divided into 5 zones: Thrill Mountain: For adventure seekers, offering zip-lining and Nepalese Bridge. Predator Kingdom: Get close to lions, tigers, and cheetahs, guided by experts. African Safari: Witness giraffes, zebras, rhinos, and exotic birds in a simulated African environment and Eco-ryder tour.', 'https://www.tripadvisor.com/Attraction_Review-g656263-d645568-Reviews-Casela_Nature_Parks-Cascavelle.html', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'Eshna Nagalingum', 'Eshna', '1234'),
(2, 'Khevina Rameshar', 'Khevina', '0707');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(56, 'Deevesh', 'deevkumar@gmail.com', 'Can you add more hotels?'),
(57, 'Esh', 'ashwinee@gmail.com', 'Would like to have more nature activities'),
(62, 'khevina', 'khevina2207@gmail.com', 'can you please add more hotels'),
(63, 'Rita', 'ritasmith09@gmail.com', 'can you please add more hotels'),
(64, 'Tom', 'tomsmith09@gmail.com', 'Can you please ad more foods'),
(65, 'Tom', 'tomsmith09@gmail.com', 'can you add more activities');

-- --------------------------------------------------------

--
-- Table structure for table `cuisine`
--

CREATE TABLE `cuisine` (
  `id` int(11) NOT NULL,
  `img_src` longtext NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `restaurant` varchar(200) NOT NULL,
  `dish` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuisine`
--

INSERT INTO `cuisine` (`id`, `img_src`, `name`, `description`, `restaurant`, `dish`) VALUES
(1, 'img/IMG-20250316-WA0027.jpg', 'Slizzling Agneau', 'Savor the juicy grilled chicken that has been skillfully seasoned with herbs and spices that are reflective of the island, showcasing the variety of food traditionsSavor a range of delicious non-lamb meals in addition to sizzling agneau, which features delicate lamb seasoned with aromatic spices.', 'Chez Dhiraj, Flacq Super U', 'Slizzling Agneau'),
(2, 'img/IMG-20250316-WA0034.jpg', 'Chicken Grill', 'Savor the juicy grilled chicken that has been skillfully seasoned with herbs and spices that are reflective of the island, showcasing the variety of food traditions in the area.', 'Chez Dhiraj, Flacq Super U', 'Grilled Chicken With Chips & Salade'),
(4, 'img/IMG-20250316-WA0024.jpg', 'Mauritian Biryani', 'A unique blend of Indian and Mauritian flavors, this biryani is cooked with marinated meat and fragrant spices.', 'Briani House in Food Court, Flacq Super U', 'Chicken Biryani'),
(6, 'img\\IMG-20250316-WA0032.jpg', 'Grilled Lobster', 'Enjoy the delicious taste of perfectly seasoned and roasted grilled lobster, which showcases the unique features of the island\'s coast.', 'Green Island, Trou D\'Eau Douce', 'Grilled Lobster WIth Chips'),
(7, 'img/IMG-20250316-WA0029.jpg', 'Thai Chicken Curry', 'Savor the bold flavors of Thai Chicken Curry, which consists of soft chicken simmered in a creamy coconut milk sauce that is flavored with fragrant herbs and spices.', 'Green Island, Trou D\'Eau Douce', 'Thai Chicken Curry'),
(8, 'img/IMG-20250316-WA0033.jpg', 'Mine Bouille', 'A delicious noodle soup served with vegetables, seafood, or meat, perfect for a light meal.', 'Vye Karay, Flacq Super U', 'Mine Bouille with Chicken And Egg'),
(9, 'img/IMG-20250316-WA0031.jpg', 'Paneer Tikka', 'Paneer Tikka is a popular Indian appetizer made of marinated cubes of paneer (Indian cottage cheese) grilled or roasted, often served with mint chutney and garnished with onions and peppers.', 'Kesar Indian Restaurant, Flacq', 'Paneer Tikka'),
(10, 'img/IMG-20250316-WA0025.jpg', 'Safran grilled prawns', 'Experience the exquisite flavors of safran grilled prawns, marinated in aromatic spices and grilled to perfection for a delightful seafood treat.', 'Sitar, Bagatelle', 'Safran grilled prawns'),
(12, 'img/IMG-20250316-WA0026.jpg', 'Chicken Burger', 'A delicious double chicken burger featuring two crispy, lightly fried chicken fillets, served with fresh toppings and a burst of flavor in every bite.', 'Jo&Anne delice, Ecroignard', 'Chicken Burger'),
(13, 'https://th.bing.com/th/id/OIP.9FmC8kpJLgVxoqqc8BviagHaE8?rs=1&pid=ImgDetMain', 'Mauritian 7 curry', 'The most common vegetables used in Mauritian cuisine are tomatoes, onions, lalo (okra), brinzel (eggplants), chou chou (chayote), lay (garlic) and pima (chillies).', 'Sitar', 'Roti And Curry'),
(15, 'https://th.bing.com/th/id/OIP.9FmC8kpJLgVxoqqc8BviagHaE8?rs=1&pid=ImgDetMain', 'Mauritian Cuisine', 'The most common vegetables used in Mauritian cuisine are tomatoes, onions, lalo (okra), brinzel (eggplants), chou chou (chayote), lay (garlic) and pima (chillies).', 'mt ory', '7 carri');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`) VALUES
(4, 'John', 'john@gmail.com', 'Very useful and interesting!!'),
(7, 'Deevesh', 'deevkumar@gmail.com', 'It was really helpful for me to navigate and find the best things.'),
(9, 'khevina', 'khevina2207@gmail.com', 'very nice'),
(10, 'eshna', 'ashwinee@gmail.com', 'very interesting!'),
(15, 'Tom', 'tomsmith09@gmail.com', 'very nice website');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `img_src` longtext NOT NULL,
  `name` longtext NOT NULL,
  `picture_src` longtext NOT NULL,
  `star` longtext NOT NULL,
  `description` longtext NOT NULL,
  `visit_web` longtext NOT NULL,
  `book` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `img_src`, `name`, `picture_src`, `star`, `description`, `visit_web`, `book`) VALUES
(1, 'img/IMG-20250316-WA0017.jpg', 'Lux GrandBaie', 'Picture From Booking.com', '⭐⭐⭐⭐⭐', 'Experience luxury and serenity at LUX Grand Gaube, featuring private beaches, tropical gardens, and a world-class spa. Ideal for couples and families looking for an upscale experience.', '\"https://www.luxresorts.com/en/mauritius/hotel/luxgrandgaube\"', '\"https://www.booking.com/hotel/mu/lux-grand-gaube-resort-amb-villas.html\"'),
(3, 'img/IMG-20250316-WA0008.jpg', 'Constance Belle Mare ', 'Picture From Booking.com', '⭐⭐⭐⭐⭐', 'Known for its pristine beaches and gourmet dining, Constance Belle Mare Plage offers an all-inclusive resort experience with water sports, golf courses, and luxurious amenities.', '\"https://www.constancehotels.com/en/hotels-resorts/mauritius/belle-mare-plage\"', '\"https://www.booking.com/hotel/mu/constance-belle-mare-plage.fr.html\"'),
(4, 'img\\IMG-20250316-WA0019.jpg', 'The Oberoi', 'Picture From Booking.com', '⭐⭐⭐⭐⭐', 'The Oberoi is a luxurious beachfront resort offering exquisite dining, a full-service spa, and breathtaking views. Perfect for both relaxation and adventure.\r\n			', '\"https://www.oberoihotels.com/hotels-in-mauritius\"', '\"https://www.booking.com/hotel/mu/the-oberoi-mauritius.html\"'),
(9, 'https://th.bing.com/th/id/R.24d73b3df4d3dd3b8f33e8cce357abb0?rik=Iwh%2fy%2fUI0kRqbA&riu=http%3a%2f%2fwww.bucketlistpublications.com%2fwp-content%2fuploads%2f2016%2f10%2fRoyal-Palm-Hotel-Mauritius.jpg&ehk=L2lyrRw8uxXmpggcLbOMzVK7B4yRMzKr9oFnWbtSBr8%3d&risl=&pid=ImgRaw&r=0', 'Luxirious Hotel ', 'Picture from Chrome', '⭐⭐⭐⭐⭐⭐', 'Luxuriously Luxirious', 'https://www.bing.com/images/search?view=detailV2&ccid=JNc7PfTT&id=94B731742547BE979E766C6A44D208F5CB7F0823&thid=OIP.JNc7PfTT3TuPM-jM41ersAHaE7&mediaurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.24d73b3df4d3dd3b8f33e8cce357abb0%3Frik%3DIwh%252fy%252fUI0kRqbA%26riu%3Dhttp%253a%252f%252fwww.bucketlistpublications.com%252fwp-content%252fuploads%252f2016%252f10%252fRoyal-Palm-Hotel-Mauritius.jpg%26ehk%3DL2lyrRw8uxXmpggcLbOMzVK7B4yRMzKr9oFnWbtSBr8%253d%26risl%3D%26pid%3DImgRaw%26r%3D0&exph=681&expw=1024&q=picture+of+a+luxurious+hotel+mauritius+mein&simid=608052664510208445&FORM=IRPRST&ck=D6CAF3AD9F361428A0FEBA3413A412D7&selectedIndex=34&itb=0&cw=1375&ch=751&ajaxhist=0&ajaxserp=0', '#booked'),
(10, 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/220313811.jpg?k=2dd32cc0e355da55e3b917ec87ea64b3a957ab9e8a3dd0795b2eaf56e82a5dd4&o=&hp=1', 'Lux* Le Morne Resort', 'Picture from Booking.com', '⭐⭐⭐⭐⭐', 'Situated on a beach, LUX* Le Morne Resort features 5 pools, a spa and 3 restaurants. Activities offered include kite surfing and snorkelling.', 'https://www.bing.com/images/search?view=detailV2&ccid=JNc7PfTT&id=94B731742547BE979E766C6A44D208F5CB7F0823&thid=OIP.JNc7PfTT3TuPM-jM41ersAHaE7&mediaurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.24d73b3df4d3dd3b8f33e8cce357abb0%3Frik%3DIwh%252fy%252fUI0kRqbA%26riu%3Dhttp%253a%252f%252fwww.bucketlistpublications.com%252fwp-content%252fuploads%252f2016%252f10%252fRoyal-Palm-Hotel-Mauritius.jpg%26ehk%3DL2lyrRw8uxXmpggcLbOMzVK7B4yRMzKr9oFnWbtSBr8%253d%26risl%3D%26pid%3DImgRaw%26r%3D0&exph=681&expw=1024&q=picture+of+a+luxurious+hotel+mauritius+mein&simid=608052664510208445&FORM=IRPRST&ck=D6CAF3AD9F361428A0FEBA3413A412D7&selectedIndex=34&itb=0&cw=1375&ch=751&ajaxhist=0&ajaxserp=0', '#booked'),
(11, 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/272353222.jpg?k=7b3f6278f2a18058c43a8ef5cf658d0308425c79aea2b392a43af6296208fe0f&amp;o=&amp;hp=1', 'Paradis Beachcomber Golf Resort &amp; Spa', 'Picture from Booking.com', '⭐⭐⭐⭐⭐', 'Paradis Beachcomber Golf Resort &amp; Spa is located on Mauritius&#039; le Morne Peninsula. Facing an exceptional strip of white sandy beach with turquoise water the hotel features a large pool, 4 restaurants and an 18-hole par 72 championship golf course. Guests can experience an extensive range of water and land sports.', 'https://www.booking.com/searchresults.en-gb.html?aid=2276376&amp;label=msn-JcgDbg8OMZpXYvX_LW_sRg-79852184079294%3Atikwd-79852374378231%3Aloc-118%3Aneo%3Amte%3Alp142533%3Adec%3Aqsa%20lux%20hotel%20in%20mauritius&amp;highlighted_hotels=275786&amp;redirected=1&amp;city=900048488&amp;hlrd=no_dates&amp;source=hotel&amp;expand_sb=1&amp;keep_landing=1&amp;sid=239f765afdfbb5cdfc5d2f3c76aef685', 'https://www.booking.com/hotel/mu/paradis.en-gb.html?aid=2276376&amp;label=msn-JcgDbg8OMZpXYvX_LW_sRg-79852184079294%3Atikwd-79852374378231%3Aloc-118%3Aneo%3Amte%3Alp142533%3Adec%3Aqsa%20lux%20hotel%20in%20mauritius&amp;sid=239f765afdfbb5cdfc5d2f3c76aef685&amp;dest_id=900048488&amp;dest_type=city&amp;dist=0&amp;group_adults=2&amp;group_children=0&amp;hapos=4&amp;hpos=4&amp;no_rooms=1&amp;req_adults=2&amp;req_children=0&amp;room1=A%2CA&amp;sb_price_type=total&amp;sr_order=popularity&amp;srepoch=1744958108&amp;srpvid=df5e2e49123500e1&amp;type=total&amp;ucfs=1&amp;'),
(12, 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/643205824.jpg?k=6b371e429e9152397178fd3b37373fbfa87cc467cc7305ee64d88341346fd7c1&amp;o=&amp;hp=1', 'JW Marriott Mauritius Resort', 'Picture from booking.com', '⭐⭐⭐⭐⭐', 'Experience world-class service at JW Marriott Mauritius Resort The JW Marriott Mauritius Resort includes panoramic Indian Ocean and Le Morne Brabant Mountain views from its beachside location. Stylish accommodation, separate fitness and spa centres and 5 restaurants feature at this 5-star luxury resort.  The villa and suites feature an iPod docking station, 42-inch LCD TVs and free WiFi. The large private bathrooms contain a round stone bath tub, elegant vanity basin and double walk-in shower.', 'https://www.booking.com/hotel/mu/the-st-regis-mauritius-resort.en-gb.html?aid=2276376&amp;label=msn-JcgDbg8OMZpXYvX_LW_sRg-79852184079294%3Atikwd-79852374378231%3Aloc-118%3Aneo%3Amte%3Alp142533%3Adec%3Aqsa%20lux%20hotel%20in%20mauritius&amp;sid=239f765afdfbb5cdfc5d2f3c76aef685&amp;dest_id=900048488&amp;dest_type=city&amp;dist=0&amp;group_adults=2&amp;group_children=0&amp;hapos=5&amp;hpos=5&amp;no_rooms=1&amp;req_adults=2&amp;req_children=0&amp;room1=A%2CA&amp;sb_price_type=total&amp;sr_order=popularity&amp;srepoch=1744961820&amp;srpvid=cd7f357671390325&amp;type=total&amp;ucfs=1&amp;', 'https://www.booking.com/hotel/mu/the-st-regis-mauritius-resort.en-gb.html?aid=2276376&amp;label=msn-JcgDbg8OMZpXYvX_LW_sRg-79852184079294%3Atikwd-79852374378231%3Aloc-118%3Aneo%3Amte%3Alp142533%3Adec%3Aqsa%20lux%20hotel%20in%20mauritius&amp;sid=239f765afdfbb5cdfc5d2f3c76aef685&amp;dest_id=900048488&amp;dest_type=city&amp;dist=0&amp;group_adults=2&amp;group_children=0&amp;hapos=5&amp;hpos=5&amp;no_rooms=1&amp;req_adults=2&amp;req_children=0&amp;room1=A%2CA&amp;sb_price_type=total&amp;sr_order=popularity&amp;srepoch=1744961820&amp;srpvid=cd7f357671390325&amp;type=total&amp;ucfs=1&amp;'),
(13, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2e/d5/88/22/walkway-to-the-retreat.jpg?w=1400&amp;h=800&amp;s=1', 'The Westin Turtle Bay Resort &amp; Spa', 'Picture from TripAdvisor', '⭐⭐⭐⭐', 'The Westin Turtle Bay Resort &amp; Spa in Mauritius is highly acclaimed for its spacious and pristine rooms, with many offering stunning ocean views. Guests are consistently impressed by the immaculate condition of the resort, from the spotless beaches to the well-kept grounds.', 'https://www.tripadvisor.com/Hotel_Review-g488101-d1103726-Reviews-The_Westin_Turtle_Bay_Resort_Spa_Mauritius-Balaclava.html', 'https://www.tripadvisor.com/Hotel_Review-g488101-d1103726-Reviews-The_Westin_Turtle_Bay_Resort_Spa_Mauritius-Balaclava.html');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(4, 'Eshna', 'Nagalingum', 'Eshna', 'Nagalingumeshna@gmail.com', '0907'),
(6, 'John', 'Smith', 'John', 'john@gmail.com', '0009'),
(8, 'Akilesh', 'Moorut', 'Akilesh', 'moorutakilesh@gmail.com', '1001'),
(10, 'khevina', 'rameshar', 'khevina', 'khevina2207@gmail.com', 'khevina2207');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_type` (`activity_type`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuisine`
--
ALTER TABLE `cuisine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `cuisine`
--
ALTER TABLE `cuisine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`activity_type`) REFERENCES `activities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
