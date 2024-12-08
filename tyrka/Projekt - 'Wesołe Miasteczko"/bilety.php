<?php
require_once 'config.php';
require_once 'header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $typ_biletu = $conn->real_escape_string($_POST['typ_biletu']);
    $user_id = $_SESSION['user_id'];
    
    // Określ cenę biletu
    $cena = match($typ_biletu) {
        'dzień' => 50.00,
        'noc' => 70.00,
        'sezonowy' => 200.00,
        default => 0.00
    };

    $sql = "INSERT INTO Bilety (id_uzytkownika, typ_biletu, cena) 
            VALUES ('$user_id', '$typ_biletu', '$cena')";
    
    if ($conn->query($sql)) {
        $message = "Bilet został zakupiony pomyślnie!";
    } else {
        $error = "Wystąpił błąd podczas zakupu biletu.";
    }
}
?>

<div class="container mt-4">
    <h2>Kup Bilet</h2>
    
    <?php if (isset($message)): ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php endif; ?>
    
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="bilety.php">
        <div class="mb-3">
            <label for="typ_biletu" class="form-label">Wybierz typ biletu</label>
            <select class="form-control" id="typ_biletu" name="typ_biletu" required>
                <option value="dzień">Bilet dzienny (50 zł)</option>
                <option value="noc">Bilet nocny (70 zł)</option>
                <option value="sezonowy">Bilet sezonowy (200 zł)</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Kup bilet</button>
    </form>

    <h3 class="mt-4">Twoje bilety</h3>
    <?php
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM Bilety WHERE id_uzytkownika = '$user_id' ORDER BY czas_zakupu DESC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0):
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>Typ biletu</th>
                <th>Cena</th>
                <th>Data zakupu</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while($bilet = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($bilet['typ_biletu']); ?></td>
                <td><?php echo number_format($bilet['cena'], 2); ?> zł</td>
                <td><?php echo date('d.m.Y H:i', strtotime($bilet['czas_zakupu'])); ?></td>
                <td><?php echo htmlspecialchars($bilet['status']); ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>Nie masz jeszcze żadnych biletów.</p>
    <?php endif; ?>
</div>

<?php require_once 'footer.php'; ?>
