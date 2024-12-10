<?php
include 'connection.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imie = mysqli_real_escape_string($conn, $_POST['imie']);
    $nazwisko = mysqli_real_escape_string($conn, $_POST['nazwisko']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefon = mysqli_real_escape_string($conn, $_POST['telefon']);

    $check_query = "SELECT * FROM klienci WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $error = "Ten email jest już zarejestrowany";
    } else {
        $query = "INSERT INTO klienci (imie, nazwisko, email, telefon) 
                 VALUES ('$imie', '$nazwisko', '$email', '$telefon')";
        
        if (mysqli_query($conn, $query)) {
            $success = "Rejestracja zakończona pomyślnie";
            header("Location: login.php");
            exit();
        } else {
            $error = "Błąd podczas rejestracji: " . mysqli_error($conn);
        }
    }
}
?>

<main class="registration-container">
    <section class="registration-form">
        <h2>Rejestracja</h2>
        <?php 
        if(isset($error)) echo "<p class='error'>$error</p>";
        if(isset($success)) echo "<p class='success'>$success</p>";
        ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="imie">Imię:</label>
                <input type="text" id="imie" name="imie" required>
            </div>

            <div class="form-group">
                <label for="nazwisko">Nazwisko:</label>
                <input type="text" id="nazwisko" name="nazwisko" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="telefon">Telefon:</label>
                <input type="tel" id="telefon" name="telefon">
            </div>

            <button type="submit" class="submit-btn">Zarejestruj się</button>
        </form>

        <p>Masz już konto? <a href="login.php">Zaloguj się</a></p>
    </section>
</main>

<?php include 'footer.php'; ?>