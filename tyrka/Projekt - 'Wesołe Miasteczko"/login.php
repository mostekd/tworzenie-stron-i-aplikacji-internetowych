<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM Uzytkownicy WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // W rzeczywistej aplikacji należy używać password_hash() i password_verify()
        $_SESSION['user_id'] = $user['id_uzytkownika'];
        $_SESSION['user_role'] = $user['rola'];
        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Logowanie - Wesołe Miasteczko</title>
    <?php require_once 'header.php'; ?>
</head>
<body>
<div class="container mt-4">
    <h2>Logowanie</h2>
    <form method="POST" action="login.php">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Hasło</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Zaloguj</button>
    </form>
</div>
</body>
</html>
