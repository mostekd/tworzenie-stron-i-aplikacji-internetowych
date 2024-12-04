<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ustaw kolory</title>
</head>
<body>
    <h2>Wybierz kolory</h2>
    <form action="kolory.php" method="POST">
        <label for="bg_color">Kolor tła (hex):</label>
        <input type="text" id="bg_color" name="bg_color" required><br><br>

        <label for="text_color">Kolor tekstu (hex):</label>
        <input type="text" id="text_color" name="text_color" required><br><br>

        <input type="submit" value="Zastosuj kolory">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $bg_color = $_POST['bg_color'];
        $text_color = $_POST['text_color'];

        // Sprawdzamy poprawność kolorów hex
        if (preg_match('/^#[a-fA-F0-9]{6}$/', $bg_color) && preg_match('/^#[a-fA-F0-9]{6}$/', $text_color)) {
            echo "<div style='height: 50%; width: 50%; margin: 50px auto; border: 2px dashed red; background-color: $bg_color; color: $text_color; text-align: center;'>";
            echo "<p>Twoje imię i nazwisko</p>";
            echo "</div>";
        } else {
            echo "<p>Wprowadź poprawny kolor w formacie #RRGGBB.</p>";
        }
    }
    ?>
</body>
</html>
