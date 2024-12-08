<?php
require_once 'config.php';
require_once 'header.php';

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit();
    }

    $typ_biletu = $conn->real_escape_string($_POST['typ_biletu']);
    $ilosc = (int)$_POST['ilosc'];
    $data_wizyty = $conn->real_escape_string($_POST['data_wizyty']);
    
    // Calculate price based on ticket type
    $cena_jednostkowa = [
        'dzień' => 50.00,
        'noc' => 70.00,
        'sezonowy' => 200.00
    ];

    $cena_total = $cena_jednostkowa[$typ_biletu] * $ilosc;

    $sql = "INSERT INTO Bilety (id_uzytkownika, typ_biletu, cena, data_wizyty, ilosc) 
            VALUES ('{$_SESSION['user_id']}', '$typ_biletu', '$cena_total', '$data_wizyty', '$ilosc')";
    
    if ($conn->query($sql)) {
        $message = "Bilety zostały zakupione pomyślnie! Całkowita kwota: $cena_total zł";
    } else {
        $error = "Wystąpił błąd podczas zakupu biletów.";
    }
}

// Get user's tickets if logged in
$user_tickets = [];
if (isset($_SESSION['user_id'])) {
    $sql = "SELECT * FROM Bilety WHERE id_uzytkownika = {$_SESSION['user_id']} ORDER BY czas_zakupu DESC";
    $result = $conn->query($sql);
    if ($result) {
        $user_tickets = $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Kup Bilety</h2>

    <?php if ($message): ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bilet Dzienny</h5>
                    <p class="card-text">
                        <i class="fas fa-sun"></i> Dostęp do wszystkich atrakcji<br>
                        <i class="fas fa-clock"></i> 10:00 - 18:00<br>
                        <strong>50 zł / osoba</strong>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bilet Nocny</h5>
                    <p class="card-text">
                        <i class="fas fa-moon"></i> Dostęp do wybranych atrakcji<br>
                        <i class="fas fa-clock"></i> 18:00 - 22:00<br>
                        <strong>70 zł / osoba</strong>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bilet Sezonowy</h5>
                    <p class="card-text">
                        <i class="fas fa-calendar"></i> Nielimitowany dostęp<br>
                        <i class="fas fa-clock"></i> Cały sezon<br>
                        <strong>200 zł / osoba</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formularz zakupu biletów</h5>
                        <form method="POST" action="bilety.php">
                            <div class="mb-3">
                                <label for="typ_biletu" class="form-label">Rodzaj biletu</label>
                                <select class="form-control" id="typ_biletu" name="typ_biletu" required>
                                    <option value="dzień">Bilet dzienny (50 zł)</option>
                                    <option value="noc">Bilet nocny (70 zł)</option>
                                    <option value="sezonowy">Bilet sezonowy (200 zł)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ilosc" class="form-label">Ilość biletów</label>
                                <input type="number" class="form-control" id="ilosc" name="ilosc" min="1" max="10" required>
                            </div>
                            <div class="mb-3">
                                <label for="data_wizyty" class="form-label">Data wizyty</label>
                                <input type="date" class="form-control" id="data_wizyty" name="data_wizyty" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Kup bilety</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php if (!empty($user_tickets)): ?>
            <div class="mt-4">
                <h3>Twoje bilety</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Typ biletu</th>
                                <th>Ilość</th>
                                <th>Cena</th>
                                <th>Data wizyty</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user_tickets as $ticket): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($ticket['typ_biletu']); ?></td>
                                    <td><?php echo htmlspecialchars($ticket['ilosc']); ?></td>
                                    <td><?php echo number_format($ticket['cena'], 2); ?> zł</td>
                                    <td><?php echo date('d.m.Y', strtotime($ticket['data_wizyty'])); ?></td>
                                    <td><?php echo htmlspecialchars($ticket['status']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="alert alert-info text-center">
            Aby kupić bilet, musisz się <a href="login.php">zalogować</a> lub <a href="register.php">zarejestrować</a>.
        </div>
    <?php endif; ?>
</div>

<?php require_once 'footer.php'; ?>
