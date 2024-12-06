<?php
$host = 'localhost';  // Adres serwera bazy danych
$user = 'root';  // Nazwa użytkownika
$pass = '';  // Hasło użytkownika
$db = 'WesoleMiasteczko';  // Nazwa bazy danych

// Połączenie z bazą danych
$conn = new mysqli($host, $user, $pass, $db);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}
?>
