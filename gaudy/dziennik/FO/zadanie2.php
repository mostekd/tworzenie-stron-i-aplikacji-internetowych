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
                $data = $baza->selectNauczycielByDataUrodzenia();
                while($row = mysqli_fetch_assoc($data))
                    {
                    if(!empty($data)){
                        echo "<h2>Lista nauczycieli</h2>";
                        echo "<table border='1'>";
                        echo "<tr><th>Imię</th><th>Nazwisko</th><th>Data urodzenia</th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>" . ($row['imie']) . "</td>
                                <td>" . ($row['nazwisko']) . "</td>
                                <td>" . ($row['data_urodzenia']) . "</td>
                            </tr>";
                        }
                        echo "</table>";
                    }
                    else{
                        echo "Brak nauczycieli";
                    }
                }

                $baza->close();
            ?>
        </main>
    </body>
</html>