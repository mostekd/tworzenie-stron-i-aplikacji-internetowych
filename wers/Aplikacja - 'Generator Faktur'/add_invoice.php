<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_id = $_POST['client_id'];
    $issue_date = $_POST['issue_date'];
    $due_date = $_POST['due_date'];
    $items = $_POST['items'];

    $last_invoice = $conn->query("SELECT MAX(id) AS max_id FROM invoices")->fetch_assoc();
    $next_id = $last_invoice['max_id'] + 1;
    $invoice_number = sprintf("INV-%s-%03d", date('Y'), $next_id);

    $stmt = $conn->prepare("INSERT INTO invoices (invoice_number, client_id, issue_date, due_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $invoice_number, $client_id, $issue_date, $due_date);
    $stmt->execute();
    $invoice_id = $stmt->insert_id;

    $stmt = $conn->prepare("INSERT INTO invoice_items (invoice_id, description, quantity, unit_price, vat_rate) VALUES (?, ?, ?, ?, ?)");
    foreach ($items as $item) {
        $stmt->bind_param("isidd", $invoice_id, $item['description'], $item['quantity'], $item['unit_price'], $item['vat_rate']);
        $stmt->execute();
    }

    header('Location: index.php');
    exit();
}

$clients = $conn->query("SELECT * FROM clients");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Dodaj fakturę</title>
</head>
<body>
    <h1>Dodaj fakturę</h1>
    <form action="" method="post">
        <label for="client_id">Klient:</label>
        <select name="client_id" id="client_id" required>
            <?php while ($client = $clients->fetch_assoc()): ?>
                <option value="<?= $client['id'] ?>"><?= htmlspecialchars($client['name']) ?></option>
            <?php endwhile; ?>
        </select>
        <br>
        <label for="issue_date">Data wystawienia:</label>
        <input type="date" name="issue_date" id="issue_date" required>
        <br>
        <label for="due_date">Termin płatności:</label>
        <input type="date" name="due_date" id="due_date" required>
        <br>
        <h2>Pozycje faktury</h2>
        <div id="items">
            <div class="item">
                <input type="text" name="items[0][description]" placeholder="Opis" required>
                <input type="number" name="items[0][quantity]" placeholder="Ilość" required>
                <input type="number" step="0.01" name="items[0][unit_price]" placeholder="Cena jedn." required>
                <input type="number" step="0.01" name="items[0][vat_rate]" placeholder="VAT (%)" required>
                <button type="button" onclick="removeItem(this)">Usuń</button>
            </div>
        </div>
        <button type="button" onclick="addItem()">Dodaj pozycję</button>
        <br>
        <button type="submit">Zapisz fakturę</button>
    </form>
    <script src="script.js"></script>
</body>
</html>
