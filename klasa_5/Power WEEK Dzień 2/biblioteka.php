<?php
    $conn = new mysqli("localhost","root","","biblioteka");
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biblioteka publiczna</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <h1>Biblioteka w Książkowicach Wielkich</h1>
        </header>

        <div id="lewy">
            <h3>Polecamy dzieła autorów:</h3>
            <ol>
                <?php
                    // Skrypt #1
                    $sql = "SELECT imie, nazwisko FROM autorzy ORDER BY nazwisko;";
                    $result = $conn->query($sql);

                    while($row = $result -> fetch_array()) {
                        echo "<li>$row[0] $row[1]</li>";
                    }
                    
                ?>
            </ol>
        </div>

        <div id="srodkowy">
            <h3>ul. Czytelnicza 25, Książkowice&nbsp;Wielkie</h3>
            <a href="mailto:sekretariat@biblioteka.pl"><p>Napisz do nas</p></a>
            <img src="biblioteka.png" alt="książki">
        </div>

        <div id="prawy-gora">
            <h3>Dodaj czytelnika</h3>
            <form action="biblioteka.php" method="post">
                <label for="imie">imię: </label>
                <input type="text" name="imie" id="imie"><br>

                <label for="imie">nazwisko: </label>
                <input type="text" name="nazwisko" id="nazwisko"><br>

                <label for="symbol">symbol: </label>
                <input type="number" name="symbol" id="symbol"><br>

                <button type="submit" name="dodaj">DODAJ</button>
            </form>
        </div>

        <div id="prawy-dol">
            <?php
                // Skrypt #2
                if(isset($_POST["dodaj"]) && isset($_POST["imie"]) && isset($_POST["nazwisko"])) {
                    $imie = $_POST["imie"];
                    $nazwisko = $_POST["nazwisko"];
                    $symbol = $_POST["symbol"];

                    $sql = "INSERT INTO `czytelnicy`(`imie`, `nazwisko`, `kod`) VALUES ('$imie', '$nazwisko', '$symbol');";
                    $result = $conn->query($sql);

                    echo "Czytelnik $imie $nazwisko został(a) dodany do bazy danych";
                }
            ?>
        </div>

        <footer>
            <p>Projekt strony: Dawid Mostowski</p>
        </footer>
    </body>
</html>

<?php
    $conn -> close();
?>