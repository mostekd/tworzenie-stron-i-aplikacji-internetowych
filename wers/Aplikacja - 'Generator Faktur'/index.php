<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require './db_connection.php';

// Pobierz faktury i powiązanych klientów
$query = "SELECT invoices.*, clients.name AS client_name FROM invoices JOIN clients ON invoices.client_id = clients.id";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lista faktur</title>
</head>
<body>
    <h1>Lista faktur</h1>
    <a href="add_invoice.php" class="button">Dodaj nową fakturę</a>
    <table>
        <thead>
            <tr>
                <th>Numer</th>
                <th>Klient</th>
                <th>Data wystawienia</th>
                <th>Termin płatności</th>
                <th>Status</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['invoice_number']) ?></td>
                <td><?= htmlspecialchars($row['client_name']) ?></td>
                <td><?= htmlspecialchars($row['issue_date']) ?></td>
                <td><?= htmlspecialchars($row['due_date']) ?></td>
                <td><?= $row['paid'] ? 'Opłacona' : 'Nieopłacona' ?></td>
                <td>
                    <a href="edit_invoice.php?id=<?= $row['id'] ?>" class="button">Edytuj</a>
                    <?php if (!$row['paid']): ?>
                        <a href="mark_paid.php?id=<?= $row['id'] ?>" class="button">Oznacz jako opłaconą</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="export_csv.php" class="button">Pobierz CSV</a>
</body>
</html>
