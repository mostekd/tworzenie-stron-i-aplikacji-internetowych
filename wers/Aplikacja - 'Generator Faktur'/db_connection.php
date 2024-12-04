<?php
// Dane połączenia z bazą danych
$servername = "localhost";   // Zwykle 'localhost'
$username = "root";          // Nazwa użytkownika bazy danych
$password = "";              // Hasło użytkownika bazy danych
$dbname = "invoice_db";      // Nazwa bazy danych

// Tworzymy połączenie
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzamy, czy połączenie jest poprawne
if ($conn->connect_error) {
    // Jeśli połączenie się nie udało, wyświetlamy błąd
    die("Connection failed: " . $conn->connect_error);
}

// Ustawiamy kodowanie na UTF-8, aby poprawnie obsługiwać polskie znaki
$conn->set_charset("utf8");

// Połączenie działa poprawnie, można korzystać z $conn w aplikacji
?>
