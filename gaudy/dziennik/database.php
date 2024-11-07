<?php
$servername = "localhost"; // lub "127.0.0.1" zależnie od konfiguracji
$username = "root"; // zmień na nazwę użytkownika bazy danych
$password = ""; // zmień na hasło bazy danych
$dbname = "dziennik";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}
?>
