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
$difficulty_id = $_POST['difficulty'];
$description = $_POST['description'];
$location = $_POST['location'];

$sql = "INSERT INTO routes (name, difficulty_id, description, location) VALUES ('$name', '$difficulty_id', '$description', '$location')";

$response = array();

if ($conn->query($sql) === TRUE) {
    $response['success'] = true;
} else {
    $response['success'] = false;
}

$conn->close();

echo json_encode($response);
?>
