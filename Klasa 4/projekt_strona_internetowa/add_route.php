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

$sql = "INSERT INTO routes (name, difficulty, description) VALUES ('$name', '$difficulty', '$description')";

$response = array();

if ($conn->query($sql) === TRUE) {
    $response['success'] = true;
} else {
    $response['success'] = false;
}

$conn->close();

echo json_encode($response);
?>
