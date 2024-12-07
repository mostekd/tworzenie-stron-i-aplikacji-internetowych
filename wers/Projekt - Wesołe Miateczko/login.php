<?php
// Włącz raportowanie błędów
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Rozpocznij sesję
session_start();
include 'db.php'; // Plik z konfiguracją połączenia z bazą danych

// Sprawdź, czy formularz został wysłany
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pobierz dane z formularza
    $email = $_POST['email'];
    $haslo = $_POST['haslo'];

    // Przygotowanie zapytania SQL do wyszukania użytkownika po emailu
    $stmt = $conn->prepare("SELECT * FROM Uzytkownicy WHERE email = ?");
    $stmt->bind_param("s", $email); // Dodano "s"
    $stmt->execute();

    $result = $stmt->get_result();

    // Sprawdzenie, czy użytkownik istnieje
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Weryfikacja hasła
        if (password_verify($haslo, $user['haslo'])) {
            // Logowanie udane, ustawienie sesji
            $_SESSION['user_id'] = $user['id_uzytkownika'];
            header('Location: index.php'); // Przekierowanie na stronę główną
            exit;
        } else {
            // Hasło jest niepoprawne
            echo "Błędne hasło.";
        }
    } else {
        // Nie znaleziono użytkownika o podanym emailu
        echo "Użytkownik z takim emailem nie istnieje.";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie - Wesołe Miasteczko</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Logowanie</h1>
        <nav>
            <a href="index.php">Strona główna</a>
            <a href="login.php">Logowanie</a>
            <a href="register.php">Rejestracja</a>
        </nav>
    </header>
    <main>
        <form method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="haslo">Hasło:</label>
            <input type="password" name="haslo" id="haslo" required>
            <button type="submit">Zaloguj się</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Wesołe Miasteczko</p>
    </footer>
</body>
</html>
