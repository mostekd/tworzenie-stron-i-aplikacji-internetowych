<?php
require_once 'connect.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize_input($_POST['email']);
    $haslo = $_POST['haslo'];

    $query = "SELECT * FROM klienci WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($haslo, $user['haslo'])) {
            $_SESSION['user_id'] = $user['id_klienta'];
            $_SESSION['user_name'] = $user['imie'];
            header("Location: index.php");
            exit();
        }
    }
    $error = "Nieprawidłowy email lub hasło";
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie - Wesołe Miasteczko</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Logowanie</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required class="form-input">
            </div>
            <div class="form-group">
                <label for="haslo">Hasło:</label>
                <input type="password" id="haslo" name="haslo" required class="form-input">
            </div>
            <button type="submit" class="btn btn-primary">Zaloguj się</button>
        </form>
        <p>Nie masz konta? <a href="register.php">Zarejestruj się</a></p>
    </div>
    <script src="script.js"></script>
</body>
</html>
