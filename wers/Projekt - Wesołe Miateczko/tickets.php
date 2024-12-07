<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_uzytkownika = 1;  
    $rodzaj_biletu = $_POST['rodzaj_biletu'];
    $data_uzycia = $_POST['data_uzycia'];
    $cena = ($rodzaj_biletu == 'normalny') ? 50.00 : 30.00;

    $stmt = $conn->prepare("INSERT INTO Bilety (id_uzytkownika, rodzaj_biletu, cena, data_uzycia) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isds", $id_uzytkownika, $rodzaj_biletu, $cena, $data_uzycia);
    $stmt->execute();

    echo "Bilet zakupiony!";
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kup Bilet - Wesołe Miasteczko</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Kup bilet</h1>
        <nav>
            <a href="index.php">Strona główna</a>
            <a href="attractions.php">Atrakcje</a>
            <a href="tickets.php">Kup bilet</a>
            <a href="faq.php">FAQ</a>
            <a href="login.php">Logowanie</a>
        </nav>
    </header>
    <main>
        <form method="POST">
            <label for="rodzaj_biletu">Rodzaj biletu:</label>
            <select name="rodzaj_biletu" id="rodzaj_biletu">
                <option value="normalny">Normalny</option>
                <option value="ulgowy">Ulgowy</option>
            </select>
            <label for="data_uzycia">Data wizyty:</label>
            <input type="date" name="data_uzycia" required>
            <button type="submit">Kup bilet</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Wesołe Miasteczko</p>
    </footer>
</body>
</html>
