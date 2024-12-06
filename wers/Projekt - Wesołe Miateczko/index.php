<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wesołe Miasteczko</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Wesołe Miasteczko</h1>
        <nav>
            <a href="index.php">Strona główna</a>
            <a href="attractions.php">Atrakcje</a>
            <a href="tickets.php">Kup bilet</a>
            <a href="faq.php">FAQ</a>
            <a href="login.php">Logowanie</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>Witaj w naszym wesołym miasteczku!</h2>
            <p>Przeżyj niesamowite przygody na naszych atrakcjach, od szybkich kolejek po relaksujące karuzele.</p>
        </section>
        <section>
            <h2>Nasze atrakcje</h2>
            <?php
                $result = $conn->query('SELECT * FROM Atrakcje');
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='attraction'>";
                    echo "<h3>" . htmlspecialchars($row['nazwa']) . "</h3>";
                    echo "<p>" . htmlspecialchars($row['opis']) . "</p>";
                    echo "</div>";
                }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Wesołe Miasteczko</p>
    </footer>
</body>
</html>
