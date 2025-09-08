<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>pilka nożna</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "egzamin");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>

    <header id="baner">
        <h3>Reprezentacja Polski w piłce nożnej</h3>
        <img src="obraz1.jpg" alt="reprezentacja">
    </header>

    <section id="blok-lewy">
        <form method="post" action="">
            <select name="pozycja">
                <option value="1">Bramkarze</option>
                <option value="2">Obrońcy</option>
                <option value="3">Pomocnicy</option>
                <option value="4">Napastnicy</option>
            </select>
            <input type="submit" value="Zobacz">
        </form>
        
        <img src="zad2.png" alt="piłka" id="pilka">
        
        <p>Autor: Dawid Mostowski 5ATi</p> 
    </section>

    <section id="blok-prawy">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pozycja'])) {
            $pozycja_id = $_POST['pozycja'];
            $query = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $pozycja_id";
            $result = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result) > 0) {
                echo "<ol>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li>" . $row['imie'] . " " . $row['nazwisko'] . "</li>";
                }
                echo "</ol>";
            } else {
                echo "<p>Brak zawodników na wybranej pozycji.</p>";
            }
        }
        ?>
    </section>

    <main id="blok-glowny">
        <h3>Liga mistrzów</h3>
    </main>

    <section id="blok-liga">
        <?php
        $query2 = "SELECT zespol, punkty, grupa FROM liga ORDER BY punkty DESC";
        $result2 = mysqli_query($conn, $query2);
        
        if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {
                echo "<section class='druzyna'>";
                echo "<h2>" . $row['zespol'] . "</h2>";
                echo "<h1>" . $row['punkty'] . "</h1>";
                echo "<p>grupa: " . $row['grupa'] . "</p>";
                echo "</section>";
            }
        } else {
            echo "<p>Brak danych o drużynach.</p>";
        }
        
        mysqli_close($conn);
        ?>
    </section>
</body>
</html>