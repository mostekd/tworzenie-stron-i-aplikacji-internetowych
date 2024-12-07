<?php
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$db = 'WesoleMiasteczko';  


$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}
?>
