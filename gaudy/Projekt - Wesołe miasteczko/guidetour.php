<?php require_once 'connect.php';
include 'header.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przewodnik - Wesołe Miasteczko</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Przewodnik po parku</h1>

        <section class="guide-section">
            <h2>Plan parku</h2>
            <div class="park-map">
                <!-- Add your park map image here -->
                <img src="images/park-map.jpg" alt="Plan parku">
            </div>
        </section>

        <section class="guide-section">
            <h2>Informacje praktyczne</h2>
            <div class="info-cards">
                <div class="card">
                    <h3>Transport</h3>
                    <p>Jak dotrzeć do parku, parking, komunikacja miejska</p>
                </div>
                <div class="card">
                    <h3>Udogodnienia</h3>
                    <p>Szafki, wypożyczalnia wózków, punkty pierwszej pomocy</p>
                </div>
                <div class="card">
                    <h3>Gastronomia</h3>
                    <p>Restauracje, kawiarnie, punkty z przekąskami</p>
                </div>
            </div>
        </section>

        <section class="guide-section">
            <h2>Zasady bezpieczeństwa</h2>
            <ul class="safety-rules">
                <li>Przestrzegaj instrukcji obsługi atrakcji</li>
                <li>Zachowaj bezpieczną odległość w kolejkach</li>
                <li>Pilnuj dzieci</li>
                <li>Nie wnoś niebezpiecznych przedmiotów</li>
            </ul>
        </section>
    </div>
    <script src="script.js"></script>
</body>
</html>
