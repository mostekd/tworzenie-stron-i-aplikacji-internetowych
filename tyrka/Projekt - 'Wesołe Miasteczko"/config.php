<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'tyrka');
define('DB_PASS', '123');
define('DB_NAME', 'miasteczkotyrksos');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
?>
