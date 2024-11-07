<?php
include 'database.php';

$sql_count = "SELECT COUNT(*) AS count FROM nauczyciel WHERE data_urodzenia < '1950-01-01'";
$result = $conn->query($sql_count);
$count = $result->fetch_assoc()['count'];

$sql_delete = "DELETE FROM nauczyciel WHERE data_urodzenia < '1950-01-01'";
if ($conn->query($sql_delete) === TRUE) {
    echo "<p>Liczba nauczycieli urodzonych przed 1950 rokiem, którzy zostali usunięci: $count</p>";
    echo "<p>Nauczyciele zostali pomyślnie usunięci z bazy danych.</p>";
} else {
    echo "Błąd podczas usuwania nauczycieli: " . $conn->error;
}

$conn->close();
?>
