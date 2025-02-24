<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "climbing_gym";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$difficulty = $_POST['difficulty'];
$description = $_POST['description'];
$location_lat = $_POST['location_lat'];
$location_lng = $_POST['location_lng'];

$sql = "INSERT INTO routes (name, difficulty, description, location_lat, location_lng) VALUES ('$name', '$difficulty', '$description', '$location_lat', '$location_lng')";

$response = array();

if ($conn->query($sql) === TRUE) {
    $response['success'] = true;
} else {
    $response['success'] = false;
}

$conn->close();

echo json_encode($response);
?>
