<?php
$host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'wesolemiasteczko';

$conn = mysqli_connect($host, $db_user, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

function sanitize_input($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars(trim($data)));
}
?>
