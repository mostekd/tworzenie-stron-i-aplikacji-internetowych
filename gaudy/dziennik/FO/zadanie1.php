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
                $data = $baza->selectUczenWhereKlasa3TI();
                ?>
            <div class="tresc">
                <ol>
                    <?php
                        while($row = mysqli_fetch_assoc($data))
                        {
                            if(!empty($data)){
                                echo "<li id='wpis' class='uczen'>
                                Nazwisko: ".$row['nazwisko']."
                                <br>Imię: ".$row['imie']."
                                </li>";
                            }
                            else{
                                echo "Brak uczniów";
                            }
                        }
                        $baza->close();
                    ?>
                </ol>
            </div>
        </main>
    </body>
</html>