<?php
require_once 'connect.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imie = sanitize_input($_POST['imie']);
    $nazwisko = sanitize_input($_POST['nazwisko']);
    $email = sanitize_input($_POST['email']);
    $telefon = sanitize_input($_POST['telefon']);
    $haslo = password_hash($_POST['haslo'], PASSWORD_DEFAULT);

    $check_query = "SELECT * FROM klienci WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $error = "Ten email jest już zarejestrowany";
    } else {
        $query = "INSERT INTO klienci (imie, nazwisko, email, telefon, haslo) 
                 VALUES ('$imie', '$nazwisko', '$email', '$telefon', '$haslo')";
        
        if (mysqli_query($conn, $query)) {
            header("Location: login.php");
            exit();
        } else {
            $error = "Błąd podczas rejestracji: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja - Wesołe Miasteczko</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Rejestracja</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="imie">Imię:</label>
                <input type="text" id="imie" name="imie" required class="form-input">
            </div>
            <div class="form-group">
                <label for="nazwisko">Nazwisko:</label>
                <input type="text" id="nazwisko" name="nazwisko" required class="form-input">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required class="form-input">
            </div>
            <div class="form-group">
                <label for="telefon">Telefon:</label>
                <input type="tel" id="telefon" name="telefon" class="form-input">
            </div>
            <div class="form-group">
                <label for="haslo">Hasło:</label>
                <input type="password" id="haslo" name="haslo" required class="form-input">
            </div>
            <button type="submit" class="btn btn-primary">Zarejestruj się</button>
        </form>
        <p>Masz już konto? <a href="login.php">Zaloguj się</a></p>
    </div>
    <script src="script.js"></script>
</body>
</html>
