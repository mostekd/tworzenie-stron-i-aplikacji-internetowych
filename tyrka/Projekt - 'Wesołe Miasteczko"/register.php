<?php
require_once 'config.php';
require_once 'header.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imie = $conn->real_escape_string($_POST['imie']);
    $nazwisko = $conn->real_escape_string($_POST['nazwisko']);
    $email = $conn->real_escape_string($_POST['email']);
    $haslo = password_hash($_POST['haslo'], PASSWORD_DEFAULT); // Secure password hashing
    $rola = 'klient'; // Default role

    // Check if email already exists
    $check_email = $conn->query("SELECT * FROM Uzytkownicy WHERE email = '$email'");
    if ($check_email->num_rows > 0) {
        $error = "Ten adres email jest już zarejestrowany.";
    } else {
        $sql = "INSERT INTO Uzytkownicy (imie, nazwisko, email, haslo, rola) 
                VALUES ('$imie', '$nazwisko', '$email', '$haslo', '$rola')";
        
        if ($conn->query($sql)) {
            $success = "Rejestracja zakończona pomyślnie! Możesz się teraz zalogować.";
        } else {
            $error = "Wystąpił błąd podczas rejestracji: " . $conn->error;
        }
    }
}
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Rejestracja</h2>
                    
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    
                    <?php if ($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>

                    <form method="POST" action="register.php">
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

<?php require_once 'footer.php'; ?>
