<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "todo";

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}
?>
