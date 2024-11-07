<?php
include 'database.php';

$sql = "UPDATE ocena SET wartosc = wartosc + 1";
if ($conn->query($sql) === TRUE) {
    echo "<p>Wartości ocen zostały zwiększone o 1.</p>";
} else {
    echo "Błąd podczas aktualizacji ocen: " . $conn->error;
}

$conn->close();
?>
