<?php
require 'db_connection.php';

if (!isset($_GET['id'])) {
    die("Nie podano ID faktury.");
}

$invoice_id = $_GET['id'];

// Pobierz dane faktury
$invoice_query = $conn->prepare("SELECT * FROM invoices WHERE id = ?");
$invoice_query->bind_param("i", $invoice_id);
$invoice_query->execute();
$invoice = $invoice_query->get_result()->fetch_assoc();

if (!$invoice) {
    die("Faktura nie istnieje.");
}

// Sprawdź, czy faktura jest opłacona
if ($invoice['paid']) {
    die("Faktura jest opłacona i nie może być edytowana.");
}

// Pobierz dane klienta
$clients = $conn->query("SELECT * FROM clients");

// Pobierz pozycje faktury
$items_query = $conn->prepare("SELECT * FROM invoice_items WHERE invoice_id = ?");
$items_query->bind_param("i", $invoice_id);
$items_query->execute();
$items = $items_query->get_result()->fetch_all(MYSQLI_ASSOC);

// Obsługa edycji faktury
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_id = $_POST['client_id'];
    $issue_date = $_POST['issue_date'];
    $due_date = $_POST['due_date'];
    $items = $_POST['items'];

    // Aktualizacja danych faktury
    $update_invoice = $conn->prepare("UPDATE invoices SET client_id = ?, issue_date = ?, due_date = ? WHERE id = ?");
    $update_invoice->bind_param("issi", $client_id, $issue_date, $due_date, $invoice_id);
    $update_invoice->execute();

    // Usunięcie istniejących pozycji faktury
    $delete_items = $conn->prepare("DELETE FROM invoice_items WHERE invoice_id = ?");
    $delete_items->bind_param("i", $invoice_id);
    $delete_items->execute();

    // Dodanie nowych pozycji faktury
    $insert_item = $conn->prepare("INSERT INTO invoice_items (invoice_id, description, quantity, unit_price, vat_rate) VALUES (?, ?, ?, ?, ?)");
    foreach ($items as $item) {
        $insert_item->bind_param("isidd", $invoice_id, $item['description'], $item['quantity'], $item['unit_price'], $item['vat_rate']);
        $insert_item->execute();
    }

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Edytuj fakturę</title>
</head>
<body>
    <h1>Edytuj fakturę</h1>
    <form action="" method="post">
        <label for="client_id">Klient:</label>
        <select name="client_id" id="client_id" required>
            <?php while ($client = $clients->fetch_assoc()): ?>
                <option value="<?= $client['id'] ?>" <?= $client['id'] == $invoice['client_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($client['name']) ?>
                </option>
            <?php endwhile; ?>
        </select>
        <br>
        <label for="issue_date">Data wystawienia:</label>
        <input type="date" name="issue_date" id="issue_date" value="<?= $invoice['issue_date'] ?>" required>
        <br>
        <label for="due_date">Termin płatności:</label>
        <input type="date" name="due_date" id="due_date" value="<?= $invoice['due_date'] ?>" required>
        <br>
        <h2>Pozycje faktury</h2>
        <div id="items">
            <?php foreach ($items as $index => $item): ?>
            <div class="item">
                <input type="text" name="items[<?= $index ?>][description]" placeholder="Opis" value="<?= htmlspecialchars($item['description']) ?>" required>
                <input type="number" name="items[<?= $index ?>][quantity]" placeholder="Ilość" value="<?= $item['quantity'] ?>" required>
                <input type="number" step="0.01" name="items[<?= $index ?>][unit_price]" placeholder="Cena jedn." value="<?= $item['unit_price'] ?>" required>
                <input type="number" step="0.01" name="items[<?= $index ?>][vat_rate]" placeholder="VAT (%)" value="<?= $item['vat_rate'] ?>" required>
                <button type="button" onclick="removeItem(this)">Usuń</button>
            </div>
            <?php endforeach; ?>
        </div>
        <button type="button" onclick="addItem()">Dodaj pozycję</button>
        <br>
        <button type="submit">Zapisz zmiany</button>
    </form>
    <script src="script.js"></script>
</body>
</html>
