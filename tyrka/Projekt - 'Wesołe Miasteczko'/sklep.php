<?php
require_once 'config.php';
require_once 'header.php';

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $produkt_id = (int)$_POST['produkt_id'];
    $ilosc = (int)$_POST['ilosc'];
    
    // Add to cart logic here
    $sql = "INSERT INTO Sklep_pamiatki (id_uzytkownika, nazwa_produktu, ilosc, cena) 
            VALUES ('{$_SESSION['user_id']}', 
                    (SELECT nazwa_produktu FROM Sklep_pamiatki WHERE id_transakcji = $produkt_id),
                    $ilosc,
                    (SELECT cena FROM Sklep_pamiatki WHERE id_transakcji = $produkt_id))";
    
    if ($conn->query($sql)) {
        $message = "Produkt dodany do koszyka!";
    } else {
        $error = "Wystąpił błąd podczas dodawania produktu.";
    }
}

// Get all products
$sql = "SELECT DISTINCT nazwa_produktu, cena FROM Sklep_pamiatki";
$result = $conn->query($sql);
$produkty = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Sklep z pamiątkami</h2>

    <?php if ($message): ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <div class="row">
        <?php foreach ($produkty as $produkt): ?>
            <div class="col-md-4 mb-4">
                <div class="card product-card">
                    <img src="images/products/<?php echo strtolower(str_replace(' ', '-', $produkt['nazwa_produktu'])); ?>.jpg" 
                         class="card-img-top" 
                         alt="<?php echo htmlspecialchars($produkt['nazwa_produktu']); ?>"
                         onerror="this.src='images/placeholder.jpg'">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($produkt['nazwa_produktu']); ?></h5>
                        <p class="card-text">
                            <strong>Cena: </strong><?php echo number_format($produkt['cena'], 2); ?> zł
                        </p>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <form method="POST" action="sklep.php" class="d-flex flex-column">
                                <input type="hidden" name="produkt_id" value="<?php echo $produkt['id_transakcji']; ?>">
                                <div class="mb-2">
                                    <label for="ilosc_<?php echo $produkt['id_transakcji']; ?>" class="form-label">Ilość:</label>
                                    <input type="number" 
                                           class="form-control" 
                                           id="ilosc_<?php echo $produkt['id_transakcji']; ?>" 
                                           name="ilosc" 
                                           min="1" 
                                           max="10" 
                                           value="1">
                                </div>
                                <button type="submit" class="btn btn-primary">Dodaj do koszyka</button>
                            </form>
                        <?php else: ?>
                            <a href="login.php" class="btn btn-outline-primary">Zaloguj się aby kupić</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="mt-5">
            <h3>Twój koszyk</h3>
            <?php
            $sql = "SELECT * FROM Sklep_pamiatki WHERE id_uzytkownika = {$_SESSION['user_id']} ORDER BY czas_zakupu DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0):
            ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produkt</th>
                                <th>Ilość</th>
                                <th>Cena jednostkowa</th>
                                <th>Suma</th>
                                <th>Data zakupu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($item = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item['nazwa_produktu']); ?></td>
                                    <td><?php echo $item['ilosc']; ?></td>
                                    <td><?php echo number_format($item['cena'], 2); ?> zł</td>
                                    <td><?php echo number_format($item['cena'] * $item['ilosc'], 2); ?> zł</td>
                                    <td><?php echo date('d.m.Y H:i', strtotime($item['czas_zakupu'])); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p>Twój koszyk jest pusty.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<?php require_once 'footer.php'; ?>
