<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $haslo = password_hash($_POST['haslo'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO Uzytkownicy (email, haslo) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $haslo);
    $stmt->execute();

    echo "Rejestracja zakończona sukcesem.";
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja - Wesołe Miasteczko</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Rejestracja</h1>
        <nav>
            <a href="index.php">Strona główna</a>
            <a href="login.php">Logowanie</a>
        </nav>
    </header>
    <main>
        <form method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="haslo">Hasło:</label>
            <input type="password" name="haslo" required>
            <button type="submit">Zarejestruj się</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Wesołe Miasteczko</p>
    </footer>
</body>
</html>
