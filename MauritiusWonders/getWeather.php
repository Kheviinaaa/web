<?php
error_reporting(0);
ini_set('allow_url_fopen', 1);
header('Content-Type: application/json');

// Replace this with your actual OpenWeather API key
$apiKey = "e73e87cdfdc1cbeec4e7dbc205f9fe99";

// Get the city name from the request (POST or GET) 
if (isset($_POST['city'])) {
    $city = trim($_POST['city']);
} elseif (isset($_GET['city'])) {
    $city = trim($_GET['city']);
} else {
    $city = "Port Louis"; // default city
}

// Encode safely for URL
$encodedCity = urlencode($city);

// Build API URL (metric = °C)
$url = "https://api.openweathermap.org/data/2.5/weather?q={$encodedCity},MU&appid={$apiKey}&units=metric";

// Fetch data
$response = @file_get_contents($url);
if ($response === FALSE) {
    echo json_encode(["error" => "Unable to fetch weather data for {$city}."]);
} else {
    echo $response;
}
?>
