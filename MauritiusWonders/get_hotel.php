<?php
header("Content-Type: application/json; charset=UTF-8");
error_reporting(0);

// Database connection
$conn = new mysqli("localhost", "root", "", "mauritiuswonders");

if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed"]);
    exit();
}

// Fetch hotel data
$sql = "SELECT * FROM hotel";
$result = $conn->query($sql);

$data = ["hotels" => []];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data["hotels"][] = [
            "image" => $row["img_src"],
            "name" => $row["name"],
            "photo_source" => $row["picture_src"],
            "rating" => $row["star"],
            "description" => $row["description"],
            "website" => $row["visit_web"],
            "book" => $row["book"]
        ];
    }
}

// Save JSON to file
//file_put_contents(__DIR__ . "/hotels.json", json_encode($data, JSON_PRETTY_PRINT));

// Output JSON response
echo json_encode($data, JSON_PRETTY_PRINT);

$conn->close();
?>
