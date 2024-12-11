<?php
require_once 'connect.php';
include 'header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ticket_type = sanitize_input($_POST['ticket_type']);
    $visit_date = sanitize_input($_POST['visit_date']);
    $user_id = $_SESSION['user_id'];

    // Set price based on ticket type
    $price = [
        'Normalny' => 50.00,
        'Ulgowy' => 30.00,
        'VIP' => 100.00
    ][$ticket_type];

    $query = "INSERT INTO bilety (id_klienta, typ_biletu, cena, data_zakupu) 
              VALUES ($user_id, '$ticket_type', $price, NOW())";

    if (mysqli_query($conn, $query)) {
        $success = "Bilet został pomyślnie zakupiony!";
    } else {
        $error = "Błąd podczas zakupu biletu: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potwierdzenie zakupu - Wesołe Miasteczko</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php if (isset($success)): ?>
            <div class="success-message">
                <h2>Potwierdzenie zakupu</h2>
                <p><?php echo $success; ?></p>
                <div class="ticket-details-card">
                    <h3>Szczegóły biletu:</h3>
                    <p>Typ biletu: <?php echo $ticket_type; ?></p>
                    <p>Cena: <?php echo $price; ?> zł</p>
                    <p>Data wizyty: <?php echo $visit_date; ?></p>
                </div>
                <a href="tickets.php" class="btn btn-primary">Powrót do biletów</a>
            </div>
        <?php elseif (isset($error)): ?>
            <div class="error-message">
                <p><?php echo $error; ?></p>
                <a href="tickets.php" class="btn btn-secondary">Spróbuj ponownie</a>
            </div>
        <?php endif; ?>
    </div>
    <script src="script.js"></script>
</body>
</html>
