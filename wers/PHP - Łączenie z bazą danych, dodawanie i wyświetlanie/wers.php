<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'wers';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}

if (isset($_POST['nazwa'], $_POST['cena'], $_POST['opis'])) {
    $nazwa = $conn->real_escape_string($_POST['nazwa']);
    $cena = (float)$_POST['cena'];
    $opis = $conn->real_escape_string($_POST['opis']);

    $sql_insert = "INSERT INTO produkty (nazwa, cena, opis) VALUES ('$nazwa', '$cena', '$opis')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Nowy produkt został dodany.<br>";
    } else {
        echo "Błąd podczas dodawania produktu: " . $conn->error;
    }
}
?>

<form method="POST" action="">
    <label for="nazwa">Nazwa produktu:</label><br>
    <input type="text" id="nazwa" name="nazwa" required><br>
    <label for="cena">Cena:</label><br>
    <input type="number" step="0.01" id="cena" name="cena" required><br>
    <label for="opis">Opis:</label><br>
    <textarea id="opis" name="opis" required></textarea><br><br>
    <input type="submit" value="Dodaj produkt">
</form>

<?php
$sql_select = "SELECT id, nazwa, cena, opis FROM produkty";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    echo "<h2>Lista produktów:</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Cena</th>
                <th>Opis</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['nazwa'] . "</td>
                <td>" . $row['cena'] . "</td>
                <td>" . $row['opis'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Brak produktów w bazie danych.";
}

$conn->close();
?>
