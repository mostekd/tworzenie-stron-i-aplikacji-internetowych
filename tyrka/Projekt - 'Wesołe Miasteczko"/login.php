<?php
require_once 'config.php';
require_once 'header.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $haslo = $_POST['haslo'];

    $sql = "SELECT * FROM Uzytkownicy WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($haslo, $user['haslo'])) {
            $_SESSION['user_id'] = $user['id_uzytkownika'];
            $_SESSION['user_role'] = $user['rola'];
            $_SESSION['user_name'] = $user['imie'];
            header('Location: index.php');
            exit();
        } else {
            $error = "Nieprawidłowe hasło.";
        }
    } else {
        $error = "Nie znaleziono użytkownika o podanym adresie email.";
    }
}
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Logowanie</h2>
                    
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form method="POST" action="login.php">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="haslo" class="form-label">Hasło</label>
                            <input type="password" class="form-control" id="haslo" name="haslo" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">Zaloguj się</button>
                    </form>
                    
                    <div class="text-center mt-3">
                        <p>Nie masz konta? <a href="register.php">Zarejestruj się</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>
