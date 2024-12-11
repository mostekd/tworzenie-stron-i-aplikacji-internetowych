<?php
require_once 'connect.php';
include 'header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM bilety WHERE id_klienta = " . $_SESSION['user_id'];
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilety - Wesołe Miasteczko</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Kup Bilet</h2>
        <form action="booking.php" method="POST" class="form-container">
            <div class="form-group">
                <label for="ticket_type">Rodzaj biletu:</label>
                <select name="ticket_type" id="ticket_type" class="form-input" required>
                    <option value="Normalny">Normalny - 50 zł</option>
                    <option value="Ulgowy">Ulgowy - 30 zł</option>
                    <option value="VIP">VIP - 100 zł</option>
                </select>
            </div>
            <div class="form-group">
                <label for="visit_date">Data wizyty:</label>
                <input type="date" id="visit_date" name="visit_date" class="form-input" required>
            </div>
            <button type="submit" class="btn btn-primary">Kup bilet</button>
        </form>

        <h3>Twoje bilety:</h3>
        <div class="tickets-list">
            <?php while($ticket = mysqli_fetch_assoc($result)): ?>
                <div class="card">
                    <h4>Bilet <?php echo $ticket['typ_biletu']; ?></h4>
                    <p>Data zakupu: <?php echo $ticket['data_zakupu']; ?></p>
                    <p>Cena: <?php echo $ticket['cena']; ?> zł</p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
