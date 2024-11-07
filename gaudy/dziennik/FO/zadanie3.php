<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zadanie 1</title>
    </head>
    <body>
        <main class="main">
            <?php
                include('../DB/db_uczniowie.php');
                $baza = new db_uczniowie();
                $baza->databaseConnect();
                $data = $baza->selectImionaZANaKoncu();
                while($row = mysqli_fetch_assoc($totalCount))
                    {
                    if(!empty($data)){
                        echo "Liczba uczniów z imieniem kończącym się na 'a': " . $counts['uczniowie'] . "<br>";
                        echo "Liczba nauczycieli z imieniem kończącym się na 'a': " . $counts['nauczyciele'] . "<br>";
                        echo "Łączna liczba osób z imieniem kończącym się na 'a': " . $counts['total'];
                    }
                    else{
                        echo "Brak osób z a na końcu imienia";
                    }
                }

                $baza->close();
            ?>
        </main>
    </body>
</html>