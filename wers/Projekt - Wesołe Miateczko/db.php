<?php
$host = 'localhost';  // Adres serwera bazy danych
$user = 'root';  // Nazwa użytkownika
$pass = '';  // Hasło użytkownika
$db = 'WesoleMiasteczko';  // Nazwa bazy danych

// Połączenie z bazą danych
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}
?>
