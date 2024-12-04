<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require './db_connection.php';

// Sprawdzenie, czy ID faktury zostało przekazane
if (isset($_GET['id'])) {
    $invoice_id = (int)$_GET['id'];  // Pobranie ID faktury z URL

    // Zapytanie SQL do zaktualizowania statusu na opłacony
    $updateQuery = "UPDATE invoices SET paid = 1 WHERE id = $invoice_id";

    if ($conn->query($updateQuery) === TRUE) {
        // Jeśli zapytanie wykonało się pomyślnie, przekieruj z powrotem na stronę z fakturami
        header("Location: index.php?status=success");
        exit();
    } else {
        echo "Błąd aktualizacji statusu: " . $conn->error;
    }
} else {
    echo "Nie podano ID faktury.";
}
?>
