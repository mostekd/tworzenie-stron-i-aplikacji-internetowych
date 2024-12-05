<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zadanie 3</title>
    </head>
    <body>
        <main class="main">
            <?php
                include('../DB/db_uczniowie.php');
                $baza = new db_uczniowie();
                $baza->databaseConnect();
                $data = $baza->selectImionaZANaKoncu();
                if (!empty($data)) {
                    echo "Liczba uczniów z imieniem kończącym się na 'a': " . $data['uczniowie'] . "<br>";
                    echo "Liczba nauczycieli z imieniem kończącym się na 'a': " . $data['nauczyciele'] . "<br>";
                    echo "Łączna liczba osób z imieniem kończącym się na 'a': " . $data['total'];
                } else {
                    echo "Brak osób z a na końcu imienia";
                }
                $baza->close();
            ?>
        </main>
    </body>
</html>
