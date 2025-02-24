<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "climbing_gym";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM routes";
$result = $conn->query($sql);

$routes = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $routes[] = $row;
    }
}

$conn->close();

echo json_encode($routes);
?>
