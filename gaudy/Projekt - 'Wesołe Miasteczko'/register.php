<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imie = $conn->real_escape_string($_POST['imie']);
    $nazwisko = $conn->real_escape_string($_POST['nazwisko']);
    $email = $conn->real_escape_string($_POST['email']);
    $haslo = password_hash($_POST['haslo'], PASSWORD_DEFAULT);
    $rola = 'klient'; // Default role

    // Check if email already exists
    $check_query = "SELECT * FROM Uzytkownicy WHERE email = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "Ten adres email jest już zarejestrowany.";
    } else {
        // Insert new user
        $insert_query = "INSERT INTO Uzytkownicy (imie, nazwisko, email, haslo, rola) VALUES (?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("sssss", $imie, $nazwisko, $email, $haslo, $rola);

        if ($insert_stmt->execute()) {
            $success = "Rejestracja zakończona pomyślnie! Możesz się teraz zalogować.";
            header("refresh:2;url=login.php"); // Redirect to login page after 2 seconds
        } else {
            $error = "Wystąpił błąd podczas rejestracji: " . $conn->error;
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card registration-card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Rejestracja</h2>
                        
                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        
                        <?php if ($success): ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>

                        <form method="POST" action="register.php" class="registration-form">
                            <div class="mb-3">
                                <label for="imie" class="form-label">Imię</label>
                                <input type="text" class="form-control" id="imie" name="imie" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="nazwisko" class="form-label">Nazwisko</label>
                                <input type="text" class="form-control" id="nazwisko" name="nazwisko" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="haslo" class="form-label">Hasło</label>
                                <input type="password" class="form-control" id="haslo" name="haslo" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100">Zarejestruj się</button>
                        </form>
                        
                        <div class="text-center mt-3">
                            <p>Masz już konto? <a href="login.php">Zaloguj się</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
