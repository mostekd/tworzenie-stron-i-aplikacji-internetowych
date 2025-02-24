<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "climbing_gym";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM difficulties";
$result = $conn->query($sql);

$difficulties = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $difficulties[] = $row;
    }
}

$conn->close();

echo json_encode($difficulties);
?>
