<?php
    include('../DB/db_uczniowie.php');
    $baza = new db_uczniowie();
    $baza->databaseConnect();
    $data = $baza->zwiekszOceny();

    if ($data) {
        echo "Wszystkie oceny zostały zwiększone o 1.";
    } else {
        echo "Wystąpił błąd podczas zwiększania ocen.";
    }

    $baza->close();
?>
