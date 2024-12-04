<?php
require 'db_connection.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=faktury.csv');

$output = fopen('php://output', 'w');
fputcsv($output, ['Numer', 'Klient', 'Data wystawienia', 'Termin płatności', 'Status']);

$query = "SELECT invoices.*, clients.name AS client_name FROM invoices JOIN clients ON invoices.client_id = clients.id";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    fputcsv($output, [
        $row['invoice_number'],
        $row['client_name'],
        $row['issue_date'],
        $row['due_date'],
        $row['paid'] ? 'Opłacona' : 'Nieopłacona'
    ]);
}

fclose($output);
exit();
