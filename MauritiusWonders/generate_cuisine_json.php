<?php
header("Content-Type: application/json; charset=UTF-8");
error_reporting(0);

// Database connection
$conn = new mysqli("localhost", "root", "", "mauritiuswonders");

if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed"]);
    exit();
}

// Query cuisine table
$sql = "SELECT * FROM cuisine";
$result = $conn->query($sql);

$data = ["cuisine" => []];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data["cuisine"][] = [
            "image" => $row["img_src"],
            "name" => $row["name"],
            "description" => $row["description"],
            "restaurant" => $row["restaurant"],
            "dish_tried" => $row["dish"]
        ];
    }
}

// ✅ Save to a JSON file
file_put_contents(__DIR__ . "/cuisine.json", json_encode($data, JSON_PRETTY_PRINT));

// ✅ Output JSON to browser / AJAX
echo json_encode($data);

$conn->close();
?>
