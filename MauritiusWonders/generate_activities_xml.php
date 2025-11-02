<?php
error_reporting(0);
header("Content-Type: text/xml; charset=UTF-8");

// Database connection
$conn = new mysqli("localhost", "root", "", "mauritiuswonders");

if ($conn->connect_error) {
    die("<?xml version='1.0'?><error>Database connection failed</error>");
}

$sql = "SELECT * FROM activity";
$result = $conn->query($sql);

// XML structure with header
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><activities></activities>');

// Add DB rows into XML
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $activity = $xml->addChild("activity");
        $activity->addChild("name", htmlspecialchars($row['name']));
        $activity->addChild("image", htmlspecialchars($row['img_src']));
        $activity->addChild("photo_source", htmlspecialchars($row['picture_src']));
        $activity->addChild("description", htmlspecialchars($row['description']));
        $activity->addChild("website", htmlspecialchars($row['visit_web']));
    }
} else {
    echo "<error>No activities found in database</error>";
}

// SAVE XML FILE NEXT TO THIS SCRIPT
$xml->asXML(__DIR__ . "/activities.xml");

// Output XML to AJAX
echo $xml->asXML();

$conn->close();
?>
