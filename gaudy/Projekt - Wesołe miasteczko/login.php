<?php
include 'connection.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['haslo'];

    $query = "SELECT id_klienta, email FROM klienci WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id_klienta'];
        $_SESSION['email'] = $row['email'];
        header("Location: index.php");
        exit();
    } else {
        $error = "Nieprawidłowy email lub hasło";
    }
}
?>

<main class="login-container">
    <section class="login-form">
        <h2>Logowanie</h2>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Hasło:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="submit-btn">Zaloguj się</button>
        </form>

        <p>Nie masz konta? <a href="registration.php">Zarejestruj się</a></p>
    </section>
</main>

<?php include 'footer.php'; ?>