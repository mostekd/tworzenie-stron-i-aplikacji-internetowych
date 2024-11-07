<?php
include 'database.php';

$sql = "SELECT imie, nazwisko, data_urodzenia FROM nauczyciel ORDER BY data_urodzenia DESC";
$result = $conn->query($sql);

echo "<h2>Lista nauczycieli</h2>";
echo "<table border='1'>";
echo "<tr><th>Imię</th><th>Nazwisko</th><th>Data urodzenia</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . htmlspecialchars($row['imie']) . "</td><td>" . htmlspecialchars($row['nazwisko']) . "</td><td>" . htmlspecialchars($row['data_urodzenia']) . "</td></tr>";
}
echo "</table>";

$conn->close();
?>
