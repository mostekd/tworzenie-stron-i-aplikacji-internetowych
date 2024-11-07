<?php
include 'database.php';

$sql = "SELECT imie, nazwisko FROM uczen 
        JOIN klasa ON uczen.klasa_id = klasa.id 
        WHERE klasa.numer = 3 AND klasa.oznaczenie = 'TI'
        ORDER BY nazwisko ASC";


echo "<h2>Lista uczniów z klasy 3 TI</h2>";
echo "<ol>";

    echo "<li>" . htmlspecialchars($row['nazwisko']) . " " . htmlspecialchars($row['imie']) . "</li>";
}
echo "</ol>";

$conn->close();
?>
