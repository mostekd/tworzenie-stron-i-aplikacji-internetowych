<?php
    include('../DB/db_uczniowie.php');

    $baza = new db_uczniowie();
    $baza->databaseConnect();

    $data = $baza->usunNauczycieliPrzed1950();

    if ($data > 0) {
        echo "Usunięto $data nauczycieli urodzonych przed 1950 rokiem.";
    } elseif ($data === 0) {
        echo "Nie znaleziono nauczycieli urodzonych przed 1950 rokiem do usunięcia.";
    } else {
        echo "Wystąpił błąd podczas usuwania nauczycieli.";
    }

    $baza->close();
?>
